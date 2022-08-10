<?php

/**
 * Work with URL Changer
 */
class Wpil_URLChanger
{
    /**
     * Register hooks
     */
    public function register()
    {
        add_action('wp_ajax_wpil_url_changer_delete', [$this, 'delete']);
        add_action('wp_ajax_wpil_url_changer_reset', [$this, 'reset']);
    }

    /**
     * Show table page
     */
    public static function init()
    {
        if (!empty($_POST['old']) && !empty($_POST['new'])) {
            $url = self::store();
            self::replaceURL($url);
        }

        $user = wp_get_current_user();
        $reset = !empty(get_option('wpil_url_changer_reset'));
        $table = new Wpil_Table_URLChanger();
        $table->prepare_items();
        include WP_INTERNAL_LINKING_PLUGIN_DIR . '/templates/url_changer.php';
    }

    public static function reset()
    {
        global $wpdb;

        //verify input data
        Wpil_Base::verify_nonce('wpil_url_changer');
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
            $wpdb->query("TRUNCATE TABLE {$wpdb->prefix}wpil_url_links");
            $statuses_query = Wpil_Query::postStatuses();
            $posts = $wpdb->get_results("SELECT ID as id, 'post' as type FROM {$wpdb->posts} WHERE post_content LIKE '%data-wpil=\"url\"%' $statuses_query");
            $terms = $wpdb->get_results("SELECT term_id as id, 'term' as type FROM {$wpdb->term_taxonomy} WHERE taxonomy IN ('category', 'post_tag') AND description LIKE '%data-wpil=\"url\"%'");
            $posts = array_merge($posts, $terms);
            $total = count($posts);
        } else {
            //get unprocessed posts
            $posts = get_option('wpil_url_changer_reset', []);
            if ($total < count($posts)) {
                $total = count($posts);
            }
        }

        foreach ($posts as $key => $post) {
            $post = new Wpil_Model_Post($post->id, $post->type);
            preg_match_all('`data-wpil=\"url\" (href|url)=[\'\"](.*?)[\'\"].*?[>\]](.*?)[<\[]`i', $post->getCleanContent(), $matches);
            for ($i = 0; $i < count($matches[0]); $i++) {
                if (!empty($matches[2][$i]) && !empty($matches[3][$i])) {
                    $link = $matches[2][$i];
                    $link2 = substr($link, -1) == '/' ? substr($link, 0, -1) : $link . '/';
                    $anchor = $matches[3][$i];

                    $url_id = $wpdb->get_var("SELECT id FROM {$wpdb->prefix}wpil_urls WHERE new = '$link' OR new = '$link2'");
                    if (!empty($url_id)) {
                        $wpdb->insert($wpdb->prefix . 'wpil_url_links', [
                            'url_id' => $url_id,
                            'post_id' => $post->id,
                            'post_type' => $post->type,
                            'anchor' => $anchor,
                        ]);
                    }
                }
            }

            unset($posts[$key]);

            //break process if limits were reached
            if (microtime(true) - $start > 10 || ('disabled' !== $memory_break_point && memory_get_usage() > $memory_break_point)) {
                update_option('wpil_url_changer_reset', $posts);
                break;
            }
        }

        if (empty($posts)) {
            update_option('wpil_url_changer_reset', []);
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
     * Create tables if they not exists
     */
    public static function prepareTable()
    {
        global $wpdb;
        $table = $wpdb->get_var("SHOW TABLES LIKE '{$wpdb->prefix}wpil_urls'");
        if ($table != $wpdb->prefix . 'wpil_urls') {
            $wpil_link_table_query = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}wpil_urls (
                                    id int(10) unsigned NOT NULL AUTO_INCREMENT,
                                    old varchar(255) NOT NULL,
                                    new varchar(255) NOT NULL,
                                    PRIMARY KEY  (id)
                                ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";

            // create DB table if it doesn't exist
            require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($wpil_link_table_query);
        }

        $table = $wpdb->get_var("SHOW TABLES LIKE '{$wpdb->prefix}wpil_url_links'");
        if ($table != $wpdb->prefix . 'wpil_changed_url_links') {
            $wpil_link_table_query = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}wpil_url_links (
                                    id int(10) unsigned NOT NULL AUTO_INCREMENT,
                                    url_id int(10) unsigned NOT NULL,
                                    post_id int(10) unsigned NOT NULL,
                                    post_type varchar(10) NOT NULL,
                                    anchor varchar(255) NOT NULL,
                                    PRIMARY KEY  (id)
                                ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";

            // create DB table if it doesn't exist
            require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($wpil_link_table_query);
        }

        Wpil_Base::fixCollation($wpdb->prefix . 'wpil_urls');
        Wpil_Base::fixCollation($wpdb->prefix . 'wpil_url_links');
    }

    /**
     * Get data for table
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
        global $wpdb;
        self::prepareTable();
        $limit = " LIMIT " . (($page - 1) * $per_page) . ',' . $per_page;

        $sort = " ORDER BY id DESC ";
        if ($orderby && $order) {
            $sort = " ORDER BY $orderby $order ";
        }

        $search = !empty($search) ? " AND (old LIKE '%$search%' OR new LIKE '%$search%') " : '';
        $total = $wpdb->get_var("SELECT count(*) FROM {$wpdb->prefix}wpil_urls");
        $urls = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}wpil_urls WHERE 1 $search $sort $limit");

        //get posts with inserted links
        foreach ($urls as $key => $url) {
            $result = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}wpil_url_links WHERE url_id = " . $url->id);
            $links = [];
            foreach ($result as $r) {
                $links[] = (object)[
                    'post' => new Wpil_Model_Post($r->post_id, $r->post_type),
                    'anchor' => $r->anchor,
                    'url' => $url->new,
                ];
            }
            $urls[$key]->links = $links;
        }

        return [
            'total' => $total,
            'urls' => $urls
        ];
    }

    /**
     * Save URL to DB
     *
     * @return object
     */
    public static function store()
    {
        global $wpdb;
        self::prepareTable();
        $wpdb->insert($wpdb->prefix . 'wpil_urls', [
            'old' => $_POST['old'],
            'new' => $_POST['new']
        ]);

        return self::getURL($wpdb->insert_id);
    }

    /**
     * Get URL by ID
     *
     * @param $id
     * @return object
     */
    public static function getURL($id)
    {
        global $wpdb;
        return $wpdb->get_row("SELECT * FROM {$wpdb->prefix}wpil_urls WHERE id = " . $id);
    }

    /**
     * Delete URL
     */
    public static function delete()
    {
        if (!empty($_POST['id'])) {
            global $wpdb;
            $url = self::getURL((int)$_POST['id']);
            $links = $wpdb->get_results("SELECT post_id, post_type FROM {$wpdb->prefix}wpil_url_links WHERE url_id = {$url->id} GROUP BY post_id, post_type");
            foreach ($links as $link) {
                $post = new Wpil_Model_Post($link->post_id, $link->post_type);
                $content = $post->getCleanContent();
                if ($post->type == 'post') {
                    Wpil_Post::editors('revertURLs', [$post, $url]);
                    Wpil_Editor_Kadence::revertURLs($content, $url);
                }
                self::revertURL($content, $url);
                $post->updateContent($content);
            }
            $wpdb->delete($wpdb->prefix . 'wpil_urls', ['id' => $url->id]);
            $wpdb->delete($wpdb->prefix . 'wpil_url_links', ['url_id' => $url->id]);
        }
    }

    /**
     * Revert link URL
     *
     * @param $content
     * @param $url
     * @param $anchor
     */
    public static function revertURL(&$content, $url)
    {
        $content = preg_replace('`data-wpil=\"url\" (href|url)=([\'\"])' . $url->new . '\/*([\'\"])`i', '$1=$2' . $url->old . '$3', $content);
    }

    /**
     * Replace URL for all posts
     *
     * @param $url
     */
    public static function replaceURL($url)
    {
        global $wpdb;

        $ignore_posts = Wpil_Settings::getIgnoreKeywordsPosts();
        update_option('wpil_post_procession', 1);
        //get matched posts and categories
        $posts = [];
        self::prepareLinks($url);
        $statuses_query = Wpil_Query::postStatuses();
        $statuses_query_p = Wpil_Query::postStatuses('p');
        $results = $wpdb->get_results("SELECT ID FROM {$wpdb->posts} WHERE post_content LIKE '%{$url->old}%' $statuses_query 
                                                UNION
                                                SELECT p.ID FROM {$wpdb->posts} p INNER JOIN {$wpdb->postmeta} m ON p.ID = m.post_id WHERE m.meta_key IN ('_themify_builder_settings_json', 'ct_builder_shortcodes', 'mfn-page-items-seo') AND m.meta_value LIKE '%{$url->old}%' $statuses_query");
        foreach ($results as $post) {
            $posts[] = new Wpil_Model_Post($post->ID);
        }

        $taxonomy_query = "";
        $taxonomies = implode("','", Wpil_Settings::getTermTypes());
        if (!empty($taxonomies)) {
            $taxonomy_query = " taxonomy IN ('{$taxonomies}') AND ";
        }

        $results = $wpdb->get_results("SELECT term_id FROM {$wpdb->term_taxonomy} WHERE $taxonomy_query `description` LIKE '%{$url->old}%'");
        foreach ($results as $category) {
            $posts[] = new Wpil_Model_Post($category->term_id, 'term');
        }

        //proceed posts
        foreach ($posts as $post) {
            if (!in_array($post->type . '_' . $post->id, $ignore_posts)) {
                self::checkLink($url, $post);
            }
        }
        update_option('wpil_post_procession', 0);
    }

    /**
     * Get all URLs
     *
     * @return array
     */
    public static function getURLs()
    {
        global $wpdb;
        return $wpdb->get_results("SELECT * FROM {$wpdb->prefix}wpil_urls ORDER BY id ASC");
    }

    /**
     * Replace URLs for certain post
     *
     * @param $post
     */
    public static function replacePostURLs($post)
    {
        if (in_array($post->type . '_' . $post->id, Wpil_Settings::getIgnoreKeywordsPosts())) {
            return;
        }

        self::prepareTable();
        $content = $post->getCleanContent();
        foreach (self::getURLs() as $url) {
            self::prepareLinks($url);
            if (strpos($content, $url->old)) {
                self::checkLink($url, $post);
            }
        }

        self::checkLinksCount($post);
    }

    /**
     * Check if content has certain URL
     *
     * @param $content
     * @param $url
     * @param $post
     */
    public static function checkLink($url, $post)
    {
        $content = $post->getCleanContent();

        if (self::hasUrl($content, $url)) {
            self::replaceLink($content, $url, true, $post);

            if ($post->type == 'post') {
                Wpil_Post::editors('replaceURLs', [$post, $url]);
                Wpil_Editor_Kadence::replaceURLs($content, $url);
            }

            $post->updateContent($content);
        } elseif (self::hasUrl(Wpil_Editor_Themify::getContent($post->id), $url)) {
            Wpil_Editor_Themify::replaceURLs($post, $url);
        } elseif (self::hasUrl(Wpil_Editor_Oxygen::getContent($post->id), $url)) {
            Wpil_Editor_Oxygen::replaceURLs($post, $url);
        } elseif (self::hasUrl(Wpil_Editor_Muffin::getContent($post->id), $url)) {
            Wpil_Editor_Muffin::replaceURLs($post, $url);
        }
    }

    /**
     * Check if content has URL
     *
     * @param $content
     * @param $url
     * @return bool
     */
    public static function hasUrl($content, $url)
    {
        preg_match('`(href|url)=[\'\"]' . preg_quote($url->old, '`') . '\/*[\'\"].*?[>\]](.*?)[<\[]`i', $content, $matches);
        return !empty($matches);
    }

    /**
     * Replace certain URL
     *
     * @param $content
     * @param $url
     * @param bool $db_insert
     * @param null $post
     */
    public static function replaceLink(&$content, $url, $db_insert = false, $post = null)
    {
        $text = 'data-wpil="url" ';
        preg_match_all('`(href|url)=[\'\"]' . preg_quote($url->old, '`') . '\/*[\'\"].*?[>\]](.*?)[<\[]`i', $content, $matches);
        foreach ($matches[2] as $key => $anchor) {
            $link = str_replace([$url->old, 'href=', 'url='], [$url->new, $text . 'href=', $text . 'url='], $matches[0][$key]);
            $content = str_replace($matches[0][$key], $link, $content);

            if ($db_insert) {
                global $wpdb;
                $wpdb->insert($wpdb->prefix . 'wpil_url_links', [
                    'url_id' => $url->id,
                    'post_id' => $post->id,
                    'post_type' => $post->type,
                    'anchor' => $anchor,
                ]);
            }
        }
    }

    /**
     * Remove ghost DB link records
     *
     * @param $post
     */
    public static function checkLinksCount($post)
    {
        global $wpdb;

        $links = $wpdb->get_results("SELECT url_id, anchor, count(*) as cnt FROM {$wpdb->prefix}wpil_url_links WHERE post_id = {$post->id} AND post_type = '{$post->type}' GROUP BY anchor");
        foreach ($links as $link) {
            $url = self::getURL($link->url_id);
            self::prepareLinks($url);
            preg_match_all('`(href|url)=[\'\"]' . $url->new . '\/*[\'\"].*?[>\]]' . $link->anchor . '[<\[]`i', $post->getCleanContent(), $matches);
            if (count($matches[0]) < $link->cnt) {
                $link_ids = [];
                $result = $wpdb->get_results("SELECT id FROM {$wpdb->prefix}wpil_url_links WHERE post_id = {$post->id} AND post_type = '{$post->type}' AND url_id = {$url->id} ORDER BY id");
                foreach ($result as $r) {
                    $link_ids[] = $r->id;
                }
                $link_ids = array_slice($link_ids, count($matches[0]));
                if(!empty($link_ids)){
                    $wpdb->query("DELETE FROM {$wpdb->prefix}wpil_url_links WHERE id IN (" . implode(', ', $link_ids) . ")");
                }
            }
        }
    }

    /**
     * Transform link to the common view
     *
     * @param $link
     * @return string
     */
    public static function prepareLink(&$link)
    {
        if (strpos($link, 'http') !== 0) {
            $link = site_url($link);
        }
        if (substr($link, -1) == '/') {
            $link = substr($link, 0, -1);
        }

        return $link;
    }

    /**
     * Prepare both links and check if they are not the same
     *
     * @param $url
     */
    public static function prepareLinks(&$url) {
        $old = $url->old;
        $new = $url->new;

        self::prepareLink($old);
        self::prepareLink($new);

        if ($old !== $new) {
            $url->old = $old;
            $url->new = $new;
        }
    }
}
