<?php

/**
 * Work with keywords
 */
class Wpil_Keyword
{
    public function register()
    {
        add_action('wp_ajax_wpil_keyword_delete', [$this, 'delete']);
        add_action('wp_ajax_wpil_keyword_add', [$this, 'add']);
        add_action('wp_ajax_wpil_keyword_reset', [$this, 'reset']);
    }

    /**
     * Show settings page
     */
    public static function init()
    {
        if (!empty($_POST['save_settings'])) {
            self::saveSettings();
        }

        $user = wp_get_current_user();
        $reset = !empty(get_option('wpil_keywords_reset'));
        $table = new Wpil_Table_Keyword();
        $table->prepare_items();
        include WP_INTERNAL_LINKING_PLUGIN_DIR . '/templates/keywords.php';
    }

    /**
     * Add new keyword
     */
    public static function add()
    {
        Wpil_Base::verify_nonce('wpil_keyword');
        if (!empty($_POST['keyword_id'])) {
            if (isset($_POST['wpil_keywords_add_same_link']) && isset($_POST['wpil_keywords_link_once'])) {
                self::updateKeywordSettings();
            }
            $keyword = self::getKeywordByID((int)$_POST['keyword_id']);
        } else {
            $keyword = self::store();
        }

        self::checkPosts($keyword);
    }

    /**
     * Reset links data
     */
    public static function reset()
    {
        global $wpdb;

        //verify input data
        Wpil_Base::verify_nonce('wpil_keyword');
        if (empty($_POST['count']) || (int)$_POST['count'] > 9999) {
            wp_send_json([
                'nonce' => $_POST['nonce'],
                'finish' => true
            ]);
        }

        $start = microtime(true);
        $memory_break_point = Wpil_Report::get_mem_break_point();
        $total = !empty($_POST['total']) ? (int)$_POST['total'] : 1;

        if ($_POST['count'] == 1) {
            //make matched posts array on the first call
            $wpdb->query("TRUNCATE TABLE {$wpdb->prefix}wpil_keyword_links");
            $statuses_query = Wpil_Query::postStatuses();
            $posts = $wpdb->get_results("SELECT ID as id, 'post' as type FROM {$wpdb->posts} WHERE post_content LIKE '%wpil_keyword_link%' $statuses_query");
            $terms = $wpdb->get_results("SELECT term_id as id, 'term' as type FROM {$wpdb->term_taxonomy} WHERE taxonomy IN ('category', 'post_tag') AND description LIKE '%wpil_keyword_link%'");
            $posts = array_merge($posts, $terms);
            $total = count($posts);
        } else {
            //get unprocessed posts
            $posts = get_option('wpil_keywords_reset', []);
            if ($total < count($posts)) {
                $total = count($posts);
            }
        }

        foreach ($posts as $key => $post) {
            $post = new Wpil_Model_Post($post->id, $post->type);
            preg_match_all('|<a [^><]*?class=["\'][^"\']*?wpil_keyword_link[^"\']*?["\'][^>]*?href="(.*?)".*?>(.*?)</a>|i', $post->getCleanContent(), $matches);
            for ($i = 0; $i < count($matches[0]); $i++) {
                if (!empty($matches[1][$i]) && !empty($matches[2][$i])) {
                    $link = $matches[1][$i];
                    $keyword = $matches[2][$i];

                    $keyword_id = $wpdb->get_var("SELECT id FROM {$wpdb->prefix}wpil_keywords WHERE keyword = '$keyword' AND link = '$link'");

                    if (empty($keyword_id)) {
                        //create new keyword
                        $wpdb->insert($wpdb->prefix . 'wpil_keywords', [
                            'keyword' => $keyword,
                            'link' => $link,
                            'add_same_link' => get_option('wpil_keywords_add_same_link'),
                            'link_once' => get_option('wpil_keywords_link_once')
                        ]);
                        $keyword_id = $wpdb->insert_id;
                    }

                    $wpdb->insert($wpdb->prefix . 'wpil_keyword_links', [
                        'keyword_id' => $keyword_id,
                        'post_id' => $post->id,
                        'post_type' => $post->type,
                    ]);
                }
            }

            unset($posts[$key]);

            //break process if limits were reached
            if (microtime(true) - $start > 10 || ('disabled' !== $memory_break_point && memory_get_usage() > $memory_break_point)) {
                update_option('wpil_keywords_reset', $posts);
                break;
            }
        }

        if (empty($posts)) {
            update_option('wpil_keywords_reset', []);
        }

        wp_send_json([
            'nonce' => $_POST['nonce'],
            'ready' => $total - count($posts),
            'count' => ++$_POST['count'],
            'total' => $total,
            'finish' => empty($posts)
        ]);
    }

    /**
     * Save keyword to DB
     *
     * @param $keyword
     * @param $link
     * @return object
     */
    public static function store()
    {
        global $wpdb;
        $keyword = trim(sanitize_text_field($_POST['keyword']));
        $link = trim(sanitize_text_field($_POST['link']));
        $term_ids = '';
        if(isset($_POST['restricted_cats']) && !empty($_POST['restricted_cats'])){
            $ids = array_map(function($num){ return (int)$num; }, $_POST['restricted_cats']);
            $term_ids = implode(',', $ids);
        }
        self::saveSettings();
        self::prepareTable();
        $wpdb->insert($wpdb->prefix . 'wpil_keywords', [
            'keyword' => $keyword,
            'link' => $link,
            'add_same_link' => get_option('wpil_keywords_add_same_link'),
            'link_once' => get_option('wpil_keywords_link_once'),
            'restricted_cats' => $term_ids
        ]);

        return self::getKeywordByID($wpdb->insert_id);
    }

    /**
     * Create keywords DB table if not exists
     */
    public static function prepareTable()
    {
        global $wpdb;
        $table = $wpdb->get_var("SHOW TABLES LIKE '{$wpdb->prefix}wpil_keywords'");
        if ($table != $wpdb->prefix . 'wpil_keywords') {
            $wpil_link_table_query = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}wpil_keywords (
                                    id int(10) unsigned NOT NULL AUTO_INCREMENT,
                                    keyword varchar(255) NOT NULL,
                                    link varchar(255) NOT NULL,
                                    add_same_link int(1) unsigned NOT NULL,
                                    link_once int(1) unsigned NOT NULL,
                                    restrict_cats tinyint(1) DEFAULT 0,
                                    restricted_cats text,
                                    PRIMARY KEY  (id)
                                ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";

            // create DB table if it doesn't exist
            require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($wpil_link_table_query);
        }

        $table = $wpdb->get_var("SHOW TABLES LIKE '{$wpdb->prefix}wpil_keyword_links'");
        if ($table != $wpdb->prefix . 'wpil_keyword_links') {
            $wpil_link_table_query = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}wpil_keyword_links (
                                    id int(10) unsigned NOT NULL AUTO_INCREMENT,
                                    keyword_id int(10) unsigned NOT NULL,
                                    post_id int(10) unsigned NOT NULL,
                                    post_type varchar(10) NOT NULL,
                                    anchor text,
                                    PRIMARY KEY  (id)
                                ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";

            // create DB table if it doesn't exist
            require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($wpil_link_table_query);
        }

        Wpil_Base::fixCollation($wpdb->prefix . 'wpil_keywords');
        Wpil_Base::fixCollation($wpdb->prefix . 'wpil_keyword_links');
    }

    /**
     * Get data for keywords table
     *
     * @param $per_page
     * @param $page
     * @param $search
     * @param string $orderby
     * @param string $order
     * @return array
     */
    public static function getData($per_page, $page, $search,  $orderby = '', $order = '')
    {
        self::prepareTable();
        global $wpdb;
        $limit = " LIMIT " . (($page - 1) * $per_page) . ',' . $per_page;

        $sort = " ORDER BY id DESC ";
        if ($orderby && $order) {
            $sort = " ORDER BY $orderby $order ";
        }

        $search = !empty($search) ? " AND (keyword LIKE '%$search%' OR link LIKE '%$search%') " : '';
        $total = $wpdb->get_var("SELECT count(*) FROM {$wpdb->prefix}wpil_keywords");
        $keywords = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}wpil_keywords WHERE 1 $search $sort $limit" );

        //get posts with inserted links
        foreach ($keywords as $key => $keyword) {
            $result = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}wpil_keyword_links WHERE keyword_id = " . $keyword->id);
            $links = [];
            foreach ($result as $r) {
                $links[] = (object)[
                    'post' => new Wpil_Model_Post($r->post_id, $r->post_type),
                    'anchor' => $r->anchor,
                    'url' => $keyword->link,
                ];
            }
            $keywords[$key]->links = $links;
        }

        return [
            'total' => $total,
            'keywords' => $keywords
        ];
    }

    /**
     * Delete keyword from DB
     */
    public static function delete()
    {
        if (!empty($_POST['id'])) {
            global $wpdb;
            $keyword = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}wpil_keywords WHERE id = " . $_POST['id']);

            foreach(self::getLinksByKeyword($keyword->id) as $link) {
                $keyword = self::getKeywordByID($keyword->id);
                $post = new Wpil_Model_Post($link->post_id, $link->post_type);
                $content = $post->getCleanContent();
                self::removeAllLinks($keyword, $content);
                self::updateContent($content, $keyword, $post);
            }

            $wpdb->delete($wpdb->prefix . 'wpil_keywords', ['id' => $keyword->id]);
            $wpdb->delete($wpdb->prefix . 'wpil_keyword_links', ['keyword_id' => $keyword->id]);
        }
    }

    /**
     * Delete inserted link DB record
     *
     * @param $link_id
     */
    public static function deleteLink($link, $count = 999) {
        global $wpdb;
        $links = $wpdb->get_results("SELECT id FROM {$wpdb->prefix}wpil_keyword_links WHERE post_id = {$link->post_id} AND post_type = '{$link->post_type}' AND keyword_id = {$link->keyword_id}");

        foreach ($links as $key => $link) {
            if ($key >= $count) {
                $wpdb->delete($wpdb->prefix . 'wpil_keyword_links', ['id' => $link->id]);
            }
        }
    }

    /**
     * Get inserted links by keyword
     *
     * @param $keyword_id
     * @return array
     */
    public static function getLinksByKeyword($keyword_id)
    {
        global $wpdb;
        return $wpdb->get_results("SELECT * FROM {$wpdb->prefix}wpil_keyword_links WHERE keyword_id = " . $keyword_id);
    }

    /**
     * Get inserted links by post
     *
     * @param $post
     * @return array
     */
    public static function getLinksByPost($post)
    {
        global $wpdb;
        return $wpdb->get_results("SELECT *, count(keyword_id) as `cnt` FROM {$wpdb->prefix}wpil_keyword_links WHERE post_id = {$post->id} AND post_type = '{$post->type}' GROUP BY keyword_id");
    }

    /**
     * Create link from keyword in all posts and terms
     *
     * @param $keyword
     * @param $link
     */
    public static function checkPosts($keyword)
    {
        global $wpdb;
        $start = microtime(true);
        update_option('wpil_post_procession', 1);

        $posts = get_transient('wpil_keyword_posts_' . $keyword->id);
        $total = !empty($_POST['total']) ? (int)$_POST['total'] : 0.1;
        if (empty($posts)) {
            $ignore_posts = Wpil_Settings::getIgnoreKeywordsPosts();
            $post_types = implode("','", Wpil_Settings::getPostTypes());
            //get matched posts and categories
            $link_post = Wpil_Post::getPostByLink($keyword->link);
            $where = " AND post_type IN ('{$post_types}')";
            if (!empty($link_post->type) && $link_post->type == 'post') {
                $where = " AND ID != " . $link_post->id;
            }
            $posts = [];
            $statuses_query = Wpil_Query::postStatuses();
            $statuses_query_p = Wpil_Query::postStatuses('p');
            $results = $wpdb->get_results("SELECT ID FROM {$wpdb->posts} WHERE post_content LIKE '%{$keyword->keyword}%' $statuses_query $where
                                                    UNION
                                                    SELECT p.ID FROM {$wpdb->posts} p INNER JOIN {$wpdb->postmeta} m ON p.ID = m.post_id WHERE m.meta_key IN ('_themify_builder_settings_json', 'ct_builder_shortcodes', 'mfn-page-items-seo') AND m.meta_value LIKE BINARY '%{$keyword->keyword}%' $statuses_query_p
                                                     $where");
            foreach ($results as $post) {
                $posts[] = new Wpil_Model_Post($post->ID);
            }

            if (!empty(Wpil_Settings::getTermTypes())) {
                $taxonomies = implode("','", Wpil_Settings::getTermTypes());
                $where = " AND taxonomy IN ('{$taxonomies}') ";
                if (!empty($link_post->type) && $link_post->type == 'term') {
                    $where = " AND term_id != " . $link_post->id;
                }
                $results = $wpdb->get_results("SELECT * FROM {$wpdb->term_taxonomy} WHERE description LIKE '%{$keyword->keyword}%' $where ");
                foreach ($results as $category) {
                    $posts[] = new Wpil_Model_Post($category->term_id, 'term');
                }
            }

            foreach ($posts as $key => $post) {
                if (in_array($post->type . '_' . $post->id, $ignore_posts)) {
                    unset($posts[$key]);
                }
            }

            $total = count($posts) + .1;
        }

        //proceed posts
        $memory_break_point = Wpil_Report::get_mem_break_point();
        foreach ($posts as $key => $post) {
            $phrases = Wpil_Suggestion::getPhrases($post->getContent(), true);
            self::makeLinks($phrases, $keyword, $post);
            unset($posts[$key]);

            if (microtime(true) - $start > 10 || ('disabled' !== $memory_break_point && memory_get_usage() > $memory_break_point)) {
                set_transient('wpil_keyword_posts_' . $keyword->id, $posts, 60 * 5);
                break;
            }
        }

        if (empty($posts)) {
            delete_transient('wpil_keyword_posts_' . $keyword->id);
        }

        update_option('wpil_post_procession', 0);

        wp_send_json([
            'nonce' => $_POST['nonce'],
            'keyword_id' => $keyword->id,
            'progress' => 100 - floor((count($posts) / $total) * 100),
            'total' => $total,
            'finish' => empty($posts)
        ]);
    }

    /**
     * Check if keyword is part of word
     *
     * @param $sentence
     * @param $keyword
     * @param $pos
     * @return bool
     */
    public static function isPartOfWord($sentence, $keyword, $pos)
    {
        $endings = array_merge(Wpil_Word::$endings, ['', ' ', '>', '<', ' ']);
        if ($pos > 1) {
            $char_prev = Wpil_Word::onlyText(trim(mb_substr($sentence, $pos - 2, 1)));
        } else {
            $char_prev = '';
        }
        $char_next = Wpil_Word::onlyText(trim(mb_substr($sentence, $pos + strlen($keyword) - 1, 1)));

        if (in_array($char_prev, $endings) && in_array($char_next, $endings)) {
            return false;
        }

        return true;
    }

    /**
     * Check if keyword is inside link
     *
     * @param $sentence
     * @param $keyword
     * @return bool
     */
    public static function insideLink($sentence, $keyword)
    {
        preg_match_all('`<a[^>]+>.*?' . preg_quote($keyword, '`') . '.*?</a>`i', $sentence, $matches);
        if (!empty($matches[0])) {
            return true;
        }
        return false;
    }

    /**
     * Get all keywords
     *
     * @return array
     */
    public static function getKeywords()
    {
        global $wpdb;
        return $wpdb->get_results("SELECT * FROM {$wpdb->prefix}wpil_keywords ORDER BY id");
    }

    /**
     * Get keyword by ID
     *
     * @param $id
     * @return object|null
     */
    public static function getKeywordByID($id)
    {
        global $wpdb;
        return $wpdb->get_row("SELECT * FROM {$wpdb->prefix}wpil_keywords WHERE id = " . $id);
    }

    /**
     * Make links from all keywords for certain post
     *
     * @param $post
     */
    public static function addKeywordsToPost($post)
    {
        if (!in_array($post->getRealType(), Wpil_Settings::getAllTypes()) || !$post->statusApproved()) {
            return;
        }

        if (in_array($post->type . '_' . $post->id, Wpil_Settings::getIgnoreKeywordsPosts())) {
            return;
        }

        self::prepareTable();
        update_option('wpil_post_procession', 1);
        $keywords = self::getKeywords();
        foreach ($keywords as $key => $keyword) {
            $keyword->keyword = stripslashes($keyword->keyword);
            $link_post = Wpil_Post::getPostByLink($keyword->link);
            if (!empty($link_post->type) && $link_post->type == $post->type && $link_post->id == $post->id) {
                unset($keywords[$key]);
            }
            if (strpos($post->getContent(), $keyword->keyword) === false) {
                unset($keywords[$key]);
            }
        }

        if (!empty($keywords)) {
            $phrases = Wpil_Suggestion::getPhrases($post->getContent(), true);
            foreach ($keywords as $keyword) {
                self::makeLinks($phrases, $keyword, $post);
            }
        }

        self::deleteGhostLinks($post);
        update_option('wpil_post_procession', 0);
    }

    /**
     * Replace keyword with link
     *
     * @param $phrases
     * @param $keyword
     * @param $post
     */
    public static function makeLinks($phrases, $keyword, $post)
    {
        if (self::canAddLink($post, $keyword)) {
            $meta = [];
            $keyword->keyword = stripslashes($keyword->keyword);
            foreach ($phrases as $phrase) {
                $begin = 0;
                while (stripos($phrase->text, $keyword->keyword, $begin) !== false) {
                    $begin = stripos($phrase->text, $keyword->keyword, $begin) + 1;
                    if (!self::isPartOfWord($phrase->text, $keyword->keyword, $begin) && !self::insideLink($phrase->src, $keyword->keyword)) {
                        preg_match('/'.preg_quote($keyword->keyword, '/').'/i', $phrase->src, $case_match);
                        if(empty($case_match[0])){
                            break;
                        }

                        $case_keyword = $case_match[0];
                        $custom_sentence = preg_replace('/'.preg_quote($case_keyword, '/').'/', self::getFullLink($keyword, $case_keyword), $phrase->src, 1);
                        if ($custom_sentence == $phrase->src) {
                            break;
                        }

                        //replace changed phrase inside the sentence
                        $custom_sentence = str_replace($phrase->src, $custom_sentence, $phrase->sentence_src);

                        $meta[] = [
                            'id' => $post->id,
                            'type' => $post->type,
                            'sentence' => $phrase->sentence_src,
                            'sentence_with_anchor' => '',
                            'added_by_keyword' => 1,
                            'custom_sentence' => $custom_sentence
                        ];

                        self::saveLinkToDB($keyword, $post, $case_keyword);

                        //Break loop if post should contain only one link for this keyword
                        if (!empty($keyword->link_once)) {
                            break 2;
                        }
                    }
                }
            }

            //add links to all editors
            if (!empty($meta)) {
                if ($post->type == 'term') {
                    update_term_meta($post->id, 'wpil_links', $meta);
                    Wpil_Term::addLinksToTerm($post->id);
                } else {
                    update_post_meta($post->id, 'wpil_links', $meta);
                    Wpil_Post::addLinksToContent(null, ['ID' => $post->id]);
                }
            }
        }
    }

    /**
     * Get full link for replace
     *
     * @param $keyword
     * @param $link
     * @return string
     */
    public static function getFullLink($keyword, $caseKeyword = '')
    {
        $blank = '';
        if ((int)get_option('wpil_2_links_open_new_tab', 0) == 1) {
            $blank = ' target="_blank" rel="noopener noreferrer" ';
        }

        return '<a class="wpil_keyword_link" href="' . $keyword->link . '"' . $blank . ' title="' . $caseKeyword . '">' . $caseKeyword . '</a>';
    }

    /**
     * Check if link can be added to certain post
     *
     * @param $post
     * @param $keyword
     * @return bool
     */
    public static function canAddLink($post, $keyword)
    {
        global $wpdb;
        if (empty($keyword->add_same_link)) {
            $links = [];
            $outbound = Wpil_Report::getOutboundLinks($post);
            foreach (array_merge($outbound['internal'], $outbound['external']) as $l) {
                $links[] = Wpil_Link::clean($l->url);
            }

            if (in_array(Wpil_Link::clean($keyword->link), $links)) {
                return false;
            }
        }

        if (!empty($keyword->link_once)) {
            preg_match('|<a .*href=[\'"]' . $keyword->link . '.+>.*?</a>|i', $post->getContent(), $matches);

            if (!empty($matches[0])) {
                return false;
            }
        }

        $link_post = Wpil_Post::getPostByLink($keyword->link);
        if (!empty($link_post->type) && $link_post->getType() == 'Category') {
            $category_post = $wpdb->get_var("SELECT count(*) FROM {$wpdb->postmeta} WHERE post_id = {$post->id} AND meta_key = '_elementor_conditions' AND meta_value LIKE '%include/archive/category/{$link_post->id}%'");

            if (!empty((int)$category_post)) {
                return false;
            }
        }

        if($post->type === 'post' && isset($keyword->restricted_cats) && !empty($keyword->restricted_cats)){
            $in_cats = $wpdb->get_col("SELECT `object_id` FROM {$wpdb->term_relationships} WHERE `object_id` = {$post->id} && `term_taxonomy_id` IN ({$keyword->restricted_cats})");

            if(empty($in_cats)){
                return false;
            }
        }

        return true;
    }

    /**
     * Save inserted link to the DB table
     *
     * @param $keyword
     * @param $post
     */
    public static function saveLinkToDB($keyword, $post, $anchor = '')
    {
        global $wpdb;

        if(empty($anchor)){
            $anchor = $keyword->keyword;
        }

        $wpdb->insert($wpdb->prefix . 'wpil_keyword_links', [
            'keyword_id' => $keyword->id,
            'post_id' => $post->id,
            'post_type' => $post->type,
            'anchor' => $anchor,
        ]);
    }

    /**
     * Save keywords settings
     */
    public static function saveSettings()
    {
        update_option('wpil_keywords_add_same_link', (int)$_POST['wpil_keywords_add_same_link']);
        update_option('wpil_keywords_link_once', (int)$_POST['wpil_keywords_link_once']);
        update_option('wpil_keywords_restrict_to_cats', (int)$_POST['wpil_keywords_restrict_to_cats']);
    }

    /**
     * Find deleted links in the post content and remove them from DB
     *
     * @param $post
     */
    public static function deleteGhostLinks($post)
    {
        foreach (self::getLinksByPost($post) as $link) {
            $keyword = self::getKeywordByID($link->keyword_id);
            if (!empty($keyword)) {
                preg_match_all('|<a [^><]*?class=["\'][^"\']*?wpil_keyword_link[^"\']*?["\'][^>]*?href="' . $keyword->link . '".*?>' . $keyword->keyword . '</a>|i', $post->getFreshContent(), $matches);
                if (empty($matches[0]) || count($matches[0]) != (int)$link->cnt) {
                    self::deleteLink($link, count($matches[0]));
                }
            }
        }
    }

    /**
     * Update keyword settings
     */
    public static function updateKeywordSettings()
    {
        $keyword = self::getKeywordByID($_POST['keyword_id']);

        if (!empty($keyword)) {
            global $wpdb;

            $term_ids = '';
            if(isset($_POST['restricted_cats']) && !empty($_POST['restricted_cats'])){
                $ids = array_map(function($num){ return (int)$num; }, $_POST['restricted_cats']);
                $term_ids = implode(',', $ids);
            }

            $wpdb->update($wpdb->prefix . 'wpil_keywords', [
                'add_same_link' => (int)$_POST['wpil_keywords_add_same_link'],
                'link_once' => (int)$_POST['wpil_keywords_link_once'],
                'restrict_cats' => (int)$_POST['wpil_keywords_restrict_to_cats'],
                'restricted_cats' => $term_ids
            ], ['id' => $keyword->id]);

            if ($keyword->link_once == 0 && $_POST['wpil_keywords_link_once'] == 1) {
                self::leftOneLink($keyword);
            }

            if ($keyword->add_same_link == 1 && $_POST['wpil_keywords_add_same_link'] == 0) {
                self::removeSameLink($keyword);
            }

            if(!empty($term_ids)){
                $keyword->restricted_cats = $term_ids;
                self::removeCategoryRestrictedLinks($keyword);
            }
        }
    }

    /**
     * Remove all keyword links except one
     *
     * @param $keyword
     */
    public static function leftOneLink($keyword)
    {
        global $wpdb;
        $links = $wpdb->get_results("SELECT *, count(keyword_id) as cnt FROM {$wpdb->prefix}wpil_keyword_links WHERE keyword_id = {$keyword->id} GROUP BY post_id, post_type HAVING count(keyword_id) > 1");
        foreach ($links as $link) {
            $keyword = self::getKeywordByID($keyword->id);
            $post = new Wpil_Model_Post($link->post_id, $link->post_type);
            $content = $post->getCleanContent();
            self::removeNonFirstLinks($keyword, $content);
            self::updateContent($content, $keyword, $post, true);
            self::deleteGhostLinks($post);
        }
    }

    /**
     * Remove keyword links if post already has this link
     *
     * @param $keyword
     */
    public static function removeSameLink($keyword)
    {
        global $wpdb;
        $links = $wpdb->get_results("SELECT post_id, post_type FROM {$wpdb->prefix}wpil_keyword_links WHERE keyword_id = {$keyword->id} GROUP BY post_id, post_type");
        foreach ($links as $link) {
            $post = new Wpil_Model_Post($link->post_id, $link->post_type);
            $keyword = self::getKeywordByID($keyword->id);
            $content = $post->getCleanContent();

            $matches_keyword = self::findKeywordLinks($keyword, $content);
            preg_match_all('|<a\s[^>]*href=["\']' . $keyword->link . '[\'"][^>]*>|', $content, $matches_all);

            if (count($matches_all[0]) > count($matches_keyword[0])) {
                self::removeAllLinks($keyword, $content);
                self::updateContent($content, $keyword, $post);
                self::deleteGhostLinks($post);
            }
        }
    }

    /**
     * Remove all keyword links except one from curtain post
     *
     * @param $keyword
     * @param $content
     */
    public static function removeNonFirstLinks($keyword, &$content)
    {
        $links = self::findKeywordLinks($keyword, $content);

        if(is_array($links[0])){
            $links = $links[0];
        }

        if (count($links) > 1) {
            $begin = stripos($content, $links[0]) + strlen($links[0]);
            $first = substr($content, 0, $begin);
            $second = substr($content, $begin);
            self::removeAllLinks($keyword, $second);
            $content = $first . $second;
        }
    }

    /**
     * Remove all keyword links
     *
     * @param $keyword
     * @param $content
     */
    public static function removeAllLinks($keyword, &$content)
    {
        $links = self::findKeywordLinks($keyword, $content, true);
        if(!empty($links)){
            foreach($links as $link){
                foreach($links as $link){
                    $content = preg_replace('`' . preg_quote($link['link'], '`') . '`', $link['anchor'],  $content);
                }
            }
        }
    }

    /**
     * Removes links from all items that aren't in the categories listed by the user.
     * 
     * @param $keyword
     **/
    public static function removeCategoryRestrictedLinks($keyword){
        global $wpdb;
        $links = self::getLinksByKeyword($keyword->id);

        if(empty($links) || !isset($keyword->restricted_cats) || empty($keyword->restricted_cats)){
            return false;
        }

        // get all of the linked post ids
        $ids = array();
        foreach($links as $link){
            // skip the current item if it's a term
            if('term' === $link->post_type){
                continue;
            }
            $ids[$link->post_id] = true;
        }

        $ids = array_keys($ids);
        $search_ids = implode(',', $ids);

        // get all the linked post ids that do have the desired terms
        $post_ids_with_terms = $wpdb->get_results("SELECT `object_id` FROM {$wpdb->term_relationships} WHERE `object_id` IN ({$search_ids}) && `term_taxonomy_id` IN ({$keyword->restricted_cats})");

        // process the results
        $found_ids = array();
        foreach($post_ids_with_terms as $object_id){
            $found_ids[$object_id->object_id] = true;
        }

        $found_ids = array_keys($found_ids);

        // diff the ids that have the terms against the autolinks on record to find the ones we need to clean
        $cleanup_ids = array_diff($ids, $found_ids);

        // remove the current keyword from the items
        foreach($cleanup_ids as $id){
            $post = new Wpil_Model_Post($id);
            $content = $post->getCleanContent();

            self::removeAllLinks($keyword, $content);
            self::updateContent($content, $keyword, $post);
            self::deleteGhostLinks($post);
        }
    }

    /**
     * Find keyword links in the content
     *
     * @param $keyword
     * @param $content
     * @param bool $return_text Should the anchor texts be returned for case sensitive matching?
     * @return array
     */
    public static function findKeywordLinks($keyword, $content, $return_text = false)
    {
        preg_match_all('`(<a\s[^>]*?class=["\'][^"\']*?wpil_keyword_link[^"\']*?["\'][^>]*?(href|url)=[\'\"]' . preg_quote($keyword->link, '`') . '*[\'\"][^>]*?>|<a\s[^>]*?(href|url)=[\'\"]' . preg_quote($keyword->link, '`') . '*[\'\"][^>]*?class=["\'][^"\']*?wpil_keyword_link[^"\']*?["\'][^>]*?>)(?!<a)(' . preg_quote($keyword->keyword, '`') . ')<\/a>`i', $content, $matches);

        if($return_text){
            $return_matches = array();
            foreach($matches[0] as $key => $match){
                if(!$return_text){
                    $return_matches[] = $match;
                }else{
                    $return_matches[] = array('link' => $match, 'anchor' => $matches[4][$key]);
                }
            }

            return $return_matches;
        }else{
            return $matches;
        }
    }

    /**
     * Update post content in all editors
     */
    public static function updateContent($content, $keyword, $post, $left_one = false)
    {
        if ($post->type == 'post') {
            Wpil_Post::editors('removeKeywordLinks', [$keyword, $post->id, $left_one]);
            Wpil_Editor_Kadence::removeKeywordLinks($content, $keyword, $left_one);
        }

        $post->updateContent($content);

    }
}
