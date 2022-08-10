<?php

/**
 * Work with post
 */
class Wpil_Post
{
    public static $advanced_custom_fields_list = null;

    /**
     * Register services
     */
    public function register()
    {
        add_filter('wp_insert_post_data', [$this, 'addLinksToContent'], 9999, 2);
        add_action('wp_ajax_wpil_editor_reload', [$this, 'editorReload']);
        add_action('wp_ajax_wpil_is_outbound_links_added', [$this, 'isOutboundLinksAdded']);
        add_action('wp_ajax_wpil_is_inbound_links_added', [$this, 'isInboundLinksAdded']);
        add_action('wp_ajax_wpil_ignore_orphaned_post', [$this, 'ajaxIgnoreOrphanedPost']);
        add_action('draft_to_published', [$this, 'updateStatMark']);
        add_action('save_post', [$this, 'updateStatMark']);
        add_action('before_delete_post', [$this, 'deleteReferences']);
        add_action('save_post', [$this, 'addLinkToAdvancedCustomFields'], 9999, 1);
    }

    /**
     * Add links to content before post update
     */
    public static function addLinksToContent($data, $post)
    {
        //get links from DB
        $meta = get_post_meta($post['ID'], 'wpil_links', true);

        if (is_null($data)) {
            $data = get_post($post['ID'], ARRAY_A);
            $data['post_content'] = addslashes($data['post_content']);
            $data_null = true;
        }

        if (!empty($meta)) {
            //update post text
            foreach ($meta as $link) {
                $changed_sentence = self::getSentenceWithAnchor($link);
                $link['sentence'] = Wpil_Word::removeQuotes($link['sentence']);

                if (strpos($data['post_content'], $link['sentence']) === false) {
                    $sentence = addslashes($link['sentence']);
                } else {
                    $sentence = $link['sentence'];
                }

                Wpil_Editor_Kadence::insertLink($data['post_content'], $sentence, $changed_sentence);

                if (strpos($data['post_content'], $sentence) !== false) {
                    $changed_sentence = self::changeByACF($data['post_content'], $link['sentence'], $changed_sentence);
                    self::insertLink($data['post_content'], $sentence, $changed_sentence);
                }
            }

            self::editors('addLinks', [$meta, $post['ID']]);

            if (!empty($data_null)) {
                Wpil_Word::addSlashesToNewLine($data['post_content']);
                $update = [
                    'ID' => $post['ID'],
                    'post_content' => $data['post_content']
                ];

                wp_update_post($update);
            }

            if (WPIL_STATUS_LINK_TABLE_EXISTS){
                Wpil_Report::update_post_in_link_table($post['ID']);
            }
        }

        //return updated post data
        return $data;
    }

    /**
     * Check if it need to force page reload
     */
    function editorReload(){
        if (!empty($_POST['post_id'])) {
            $meta = get_post_meta((int)$_POST['post_id'], 'wpil_gutenberg_restart', true);
            if (!empty($meta)) {
                delete_post_meta((int)$_POST['post_id'], 'wpil_gutenberg_restart');
                echo 'reload';
            }
        }

        wp_die();
    }

    /**
     * Check if outbound links were added to show dialog box
     */
    function isOutboundLinksAdded(){
        if (!empty($_POST['id']) && !empty($_POST['type'])) {
            if ($_POST['type'] == 'term') {
                $meta = get_term_meta((int)$_POST['id'], 'wpil_is_outbound_links_added', true);
            } else {
                $meta = get_post_meta((int)$_POST['id'], 'wpil_is_outbound_links_added', true);
            }
            if (!empty($meta)) {
                if ($_POST['type'] == 'term') {
                    delete_term_meta((int)$_POST['id'], 'wpil_is_outbound_links_added');
                } else {
                    delete_post_meta((int)$_POST['id'], 'wpil_is_outbound_links_added');
                }
                echo 'success';
            }
        }

        wp_die();
    }

    /**
     * Check if inbound links were added to show dialog box
     */
    function isInboundLinksAdded(){
        if (!empty($_POST['id']) && !empty($_POST['type'])) {
            if ($_POST['type'] == 'term') {
                $meta = get_term_meta((int)$_POST['id'], 'wpil_is_inbound_links_added', true);
            } else {
                $meta = get_post_meta((int)$_POST['id'], 'wpil_is_inbound_links_added', true);
            }
            if (!empty($meta)) {
                if ($_POST['type'] == 'term') {
                    delete_term_meta((int)$_POST['id'], 'wpil_is_inbound_links_added');
                } else {
                    delete_post_meta((int)$_POST['id'], 'wpil_is_inbound_links_added');
                }
                echo 'success';
            }
        }

        wp_die();
    }

    /**
     * Ignores the selected orphaned post on the orphaned post view.
     **/
    function ajaxIgnoreOrphanedPost(){
        $post_id = (int)$_POST['post_id'];
        if(empty($post_id)){
            wp_send_json(array('error' => array('title' => __('Post id empty', 'wpil'),'text' => __('The post id was missing from the ignore orphaned post request.', 'wpil'))));
        }

        if(empty(wp_verify_nonce($_POST['nonce'], 'ignore-orphaned-post-' . $post_id))){
            wp_send_json(array('error' => array('title' => __('Expired data', 'wpil'),'text' => __('Some of hte data was too old to process, please reload the page and try again.', 'wpil'))));
        }

        // get the post
        $post = new Wpil_Model_Post($post_id, sanitize_text_field($_POST['type']));

        // get the ignored orphaned posts
        $ignored = Wpil_Settings::getIgnoreKeywordsPosts();

        // if the post is ignored, send back that the post is on the list
        if(in_array($post->type . '_' . $post_id, $ignored, true)){
            wp_send_json(array('success' => true));
        }

        $ignored_posts = get_option('wpil_ignore_orphaned_posts', '');

        $ignored_posts .= "\n" . $post->getLinks()->view;

        update_option('wpil_ignore_orphaned_posts', $ignored_posts);

        wp_send_json(array('success' => true));
    }

    /**
     * Insert links into sentence
     *
     * @param $sentence
     * @param $anchor
     * @param $url
     * @param $to_post_id
     * @return string
     */
    public static function getSentenceWithAnchor($link) {
        if (!empty($link['custom_sentence'])) {
            return $link['custom_sentence'];
        }

        //get URL
        preg_match('/<a href="([^\"]+)"[^>]+>(.*)<\/a>/i', $link['sentence_with_anchor'], $matches);

        if (empty($matches[1])) {
            return $link['sentence'];
        }

        $url = $matches[1];

        //get anchor from source sentence
        $words = [];
        $word_start = false;
        $word_end = 0;
        preg_match_all('/<span[^>]+>([^<]+)<\/span>/i', $matches[2], $matches);
        if (count($matches[1])) {
            foreach ($matches[1] as $word) {
                if ($word_start === false) {
                    $word_start = stripos($link['sentence'], $word);
                    $word_end = $word_start + strlen($word);
                } else {
                    $word_end = stripos($link['sentence'], $word, $word_end) + strlen($word);
                }

                $words[] = $word;
            }
        }

        //get start position by nearest whitespace
        $start = 0;
        $i = 0;
        while(strpos($link['sentence'], ' ', $start+1) < $word_start && $i < 100) {
            $start = strpos($link['sentence'], ' ', $start+1);
            $next_whitespace = strpos($link['sentence'], ' ', $start+1);
            $tag = strpos($link['sentence'], '>', $start +1);
            if ($tag && $tag < $next_whitespace) {
                $start = $tag;
            }
            $tag = strpos($link['sentence'], '(', $start +1);
            if ($tag && $tag < $next_whitespace) {
                $start = $tag;
            }
            $i++;
        }
        if ($start) {
            $start++;
        }

        //get end position by nearest whitespace
        $end = 0;
        $prev_end = 0;
        while($end < $word_end && $end !== false) {
            $prev_end = $end;
            $end = strpos($link['sentence'], ' ', $end + 1);
            $tag = strpos($link['sentence'], ')', $prev_end +1);
            if ($tag && $tag < $end) {
                $end = $tag;
            }
        }

        if (substr($link['sentence'], $end-1, 1) == ',') {
            $end -= 1;
        }

        if ($end === false) {
            $end = strlen($link['sentence']);
        }

        $anchor = substr($link['sentence'], $start, $end - $start);

        //add target blank if needed
        $blank = '';
        if ((int)get_option('wpil_2_links_open_new_tab', 0) == 1) {
            $blank = ' target="_blank" rel="noreferrer noopener"';
        }

        //add slashes to the anchor if it doesn't found in the sentence
        if (stripos(addslashes($link['sentence']), $anchor) === false) {
//            $anchor = addslashes($anchor);
        }

        $anchor2 = str_replace('$', '\\$', $anchor);

        //add link to sentence
        $sentence = preg_replace('/'.preg_quote($anchor, '/').'/i', '<a href="'.$url.'"' . $blank . '>'.$anchor2.'</a>', $link['sentence'], 1);

        $sentence = str_replace('$', '\\$', $sentence);

        return $sentence;
    }

    /**
     * Get post content
     *
     * @param $post_id integer
     * @return string
     */
    public static function getPostContent($post_id)
    {
        $post = get_post($post_id);

        return !empty($post->post_content) ? $post->post_content : '';
    }

    /**
     * Set mark for post to update report
     *
     * @param $post_id
     */
    public static function updateStatMark($post_id)
    {
        // don't save links for revisions
        if(wp_is_post_revision($post_id)){
            return;
        }

        // clear the meta flag
        update_post_meta($post_id, 'wpil_sync_report3', 0);

        if (get_option('wpil_option_update_reporting_data_on_save', false)) {
            Wpil_Report::fillMeta();
            if(WPIL_STATUS_LINK_TABLE_EXISTS){
                Wpil_Report::remove_post_from_link_table(new Wpil_Model_Post($post_id));
                Wpil_Report::fillWpilLinkTable();
            }
            Wpil_Report::refreshAllStat();
        }else{
            if(WPIL_STATUS_LINK_TABLE_EXISTS){
                $post = new Wpil_Model_Post($post_id);
                // if the current post has the Thrive builder active, load the Thrive content
                $thrive_active = get_post_meta($post->id, 'tcb_editor_enabled', true);
                if(!empty($thrive_active)){
                    $thrive_content = get_post_meta($post->id, 'tve_updated_post', true);
                    if($thrive_content){
                        $post->setContent($thrive_content);
                    }
                }
                // update the links stored in the link table
                Wpil_Report::update_post_in_link_table($post);
                // update the meta data for the post
                Wpil_Report::statUpdate($post, true);
                // and update the link counts for the posts that this one links to
                Wpil_Report::updateReportInternallyLinkedPosts($post);
            }
        }

        if (empty(get_option('wpil_post_procession'))) {
            $post = new Wpil_Model_Post($post_id);
            Wpil_Keyword::addKeywordsToPost($post);
            Wpil_URLChanger::replacePostURLs($post);
        }
    }

    /**
     * Delete all post meta on post delete
     *
     * @param $post_id
     */
    public static function deleteReferences($post_id)
    {
        foreach (array_merge(Wpil_Report::$meta_keys, ['wpil_sync_report3', 'wpil_sync_report2_time']) as $key) {
            delete_post_meta($post_id, $key);
        }
        if(WPIL_STATUS_LINK_TABLE_EXISTS){
            // remove the current post from the links table and the links that point to it
            Wpil_Report::remove_post_from_link_table(new Wpil_Model_Post($post_id), true);
        }
    }

    /**
     * Get linked post Ids for current post
     *
     * @param $post
     * @return string
     */
    public static function getLinkedPostIDs($post)
    {
        $linked_post_ids = [$post->id];
        $links_inbound = Wpil_Report::getInternalInboundLinks($post);
        foreach ($links_inbound as $link) {
            if (!empty($link->post->id)) {
                $linked_post_ids[] = $link->post->id;
            }
        }

        return implode(',', $linked_post_ids);
    }

    /**
     * Get all Advanced Custom Fields names
     *
     * @return array
     */
    public static function getAdvancedCustomFieldsList($post_id)
    {
        global $wpdb;

        $fields = [];

        if(!class_exists('ACF') || get_option('wpil_disable_acf', false)){
            return $fields;
        }

        $fields_query = $wpdb->get_results("SELECT SUBSTR(meta_key, 2) as `name` FROM {$wpdb->postmeta} WHERE post_id = $post_id AND meta_value IN (SELECT DISTINCT post_name FROM {$wpdb->posts} WHERE post_name LIKE 'field_%') AND SUBSTR(meta_key, 2) != ''");
        foreach ($fields_query as $field) {
            if (trim($field->name)) {
                $fields[] = $field->name;
            }
        }

        return $fields;
    }

    public static function getAllCustomFields()
    {
        global $wpdb;

        if(!class_exists('ACF') || get_option('wpil_disable_acf', false)){
            return array();
        }

        if (self::$advanced_custom_fields_list === null) {
            $fields = [];
            $result = $wpdb->get_results("SELECT DISTINCT post_name FROM {$wpdb->posts} WHERE post_name LIKE 'field_%'");
            $post_names = [];
            foreach ($result as $r) {
                $post_names[] = $r->post_name;
            }

            if (!empty($post_names)) {
                $fields_query = $wpdb->get_results("SELECT DISTINCT meta_key as `key` FROM {$wpdb->postmeta} WHERE meta_value IN ('" . implode("', '", $post_names) . "')");
                foreach ($fields_query as $field) {
                    $key = substr($field->key, 1);
                    if (trim($key)) {
                        $fields[] = $key;
                    }
                }
            }

            self::$advanced_custom_fields_list = $fields;
        }

        return self::$advanced_custom_fields_list;
    }

    /**
     * Add link to the content in advanced custom fields
     *
     * @param $link
     * @param $post
     */
    public static function addLinkToAdvancedCustomFields($post_id)
    {
        $meta = get_post_meta($post_id, 'wpil_links', true);

        if (!empty($meta)) {
            foreach ($meta as $link) {
                $fields = self::getAdvancedCustomFieldsList($post_id);
                if (!empty($fields)) {
                    foreach ($fields as $field) {
                        if ($content = get_post_meta($post_id, $field, true)) {
                            if (strpos($content, $link['sentence']) !== false) {
                                $changed_sentence = self::getSentenceWithAnchor($link);
                                $content = preg_replace('/' . preg_quote($link['sentence'], '/') . '/i', $changed_sentence, $content, 1);
                                update_post_meta($post_id, $field, $content);
                            }
                        }
                    }
                }
            }
            Wpil_Editor_Oxygen::addLinks($meta, $post_id);
            //remove DB record with links
            delete_post_meta($post_id, 'wpil_links');
        }
    }

    /**
     * Get all posts with the same language
     *
     * @param $post_id
     * @return array
     */
    public static function getSameLanguagePosts($post_id)
    {
        global $wpdb;
        $ids = [];
        $posts = [];

        $table = $wpdb->get_var("SHOW TABLES LIKE '{$wpdb->prefix}icl_languages'");
        if ($table == $wpdb->prefix . 'icl_languages') {
            //WPML
            $post_types = self::getSelectedLanguagePostTypes();
            $language = $wpdb->get_var("SELECT language_code FROM {$wpdb->prefix}icl_translations WHERE element_id = $post_id AND `element_type` IN ({$post_types}) ");
            if (!empty($language)) {
                $posts = $wpdb->get_results("SELECT element_id as id FROM {$wpdb->prefix}icl_translations WHERE element_id != $post_id AND language_code = '$language' AND `element_type` IN ({$post_types}) ");
            }
        } else {
            //Polylang
            $taxonomy_id = $wpdb->get_var("SELECT t.term_taxonomy_id FROM {$wpdb->term_taxonomy} t INNER JOIN {$wpdb->term_relationships} r ON t.term_taxonomy_id = r.term_taxonomy_id WHERE t.taxonomy = 'language' AND r.object_id = " . $post_id);
            if (!empty($taxonomy_id)) {
                $posts = $wpdb->get_results("SELECT object_id as id FROM {$wpdb->term_relationships} WHERE term_taxonomy_id = $taxonomy_id AND object_id != $post_id");
            }
        }

        if (!empty($posts)) {
            foreach ($posts as $post) {
                $ids[] = $post->id;
            }
        }

        return $ids;
    }

    /**
     * Gets the selected post types formatted for WPML
     **/
    public static function getSelectedLanguagePostTypes(){
        $post_types = implode("', 'post_", Wpil_Settings::getPostTypes());

        if(!empty($post_types)){
            $post_types = "'post_" . $post_types . "'";
        }

        return $post_types;
    }

    public static function getAnchors($post)
    {
        preg_match_all('|<a [^>]+>([^<]+)</a>|i', $post->getContent(), $matches);

        if (!empty($matches[1])) {
            return $matches[1];
        }

        return [];
    }

    /**
     * Get URLs from post content
     *
     * @param $post
     * @return array|mixed
     */
    public static function getUrls($post)
    {
        preg_match_all('#<a\s.*?(?:href=[\'"](.*?)[\'"]).*?>#is', $post->getContent(),$matches);

        if (!empty($matches[1])) {
            return $matches[1];
        }

        return [];
    }

    public static function getSentencesWithUrls($post)
    {
        $data = [];
        preg_match_all('#(\!|\?|\.|^|)[^.!?\n]*<a\s.*?(?:href=[\'"](.*?)[\'"]).*?>.*?<\/a>((?!<a)[^.!?\n])*#is', $post->getContent(),$matches);
        for ($i = 0; $i < count($matches[0]); $i++) {
            if (!empty($matches[0][$i]) && !empty($matches[2][$i])) {
                $sentence = $matches[0][$i];
                if (in_array(substr($sentence, 0, 1), ['.', '!', '?'])) {
                    $sentence = substr($sentence, 1);
                }
                $data[] = [
                    'sentence' => trim(strip_tags($sentence)),
                    'url' => $matches[2][$i]
                ];
            }
        }

        return $data;
    }

    /**
     * Change sentence if it located inside embedded ACF blocks
     *
     * @param $content
     * @param $sentence
     * @param $changed_sentence
     * @return string
     */
    public static function changeByACF($content, $sentence, $changed_sentence){
        //find all blocks
        $blocks = [];
        $end = 0;
        while(strpos($content, '<!-- wp:acf', $end) !== false) {
            $begin = strpos($content, '<!-- wp:acf', $end);
            $end = strpos($content, '-->', $begin);
            $blocks[] = [$begin, $end];
        }

        //change sentence
        if (!empty($blocks)) {
            $pos = strpos($content, $sentence);
            foreach ($blocks as $block) {
                if ($block[0] < $pos && $block[1] > $pos) {
                    $changed_sentence = str_replace('"', "'", $changed_sentence);
                }
            }
        }

        return $changed_sentence;
    }

    /**
     * Get post model by view link
     *
     * @param $link
     * @return Wpil_Model_Post|null
     */
    public static function getPostByLink($link)
    {
        $post = null;

        $post_id = url_to_postid($link);
        if (!empty($post_id)) {
            $post = new Wpil_Model_Post($post_id);
        } else {
            $slug = array_filter(explode('/', $link));
            $term = Wpil_Term::getTermBySlug(end($slug));
            if(!empty($term)){
                $post = new Wpil_Model_Post($term->term_id, 'term');
            }
        }

        return $post;
    }

    /**
     * Insert link into content
     *
     * @param $content
     * @param $sentence
     * @param $changed_sentence
     * @return string
     */
    public static function insertLink(&$content, $sentence, $changed_sentence)
    {
        $content = preg_replace('/'.preg_quote($sentence, '/').'(?!([^<]+)?>)/i', $changed_sentence . '$1', $content, 1);
    }

    /**
     * Get post IDs from certain category
     *
     * @param $category_id
     * @return array
     */
    public static function getCategoryPosts($category_id)
    {
        global $wpdb;

        $posts = [];
        $categories = $wpdb->get_results("SELECT r.object_id as `id` FROM {$wpdb->term_relationships} r INNER JOIN {$wpdb->term_taxonomy} tt ON tt.term_taxonomy_id = r.term_taxonomy_id WHERE tt.term_id = " . $category_id);
        foreach ($categories as $post) {
            $posts[] = $post->id;
        }

        return $posts;
    }

    /**
     * Run function for all editors
     *
     * @param $action
     * @param $params
     */
    public static function editors($action, $params)
    {
        $editors = [
            'Beaver',
            'Elementor',
            'Origin',
            'Oxygen',
            'Thrive',
            'Themify',
            'Muffin'
        ];

        foreach ($editors as $editor) {
            $class = 'Wpil_Editor_' . $editor;
            call_user_func_array([$class, $action], $params);
        }
    }
}
