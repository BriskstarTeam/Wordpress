<?php

/**
 * Class Wpil_Error
 */
class Wpil_Error
{
    /**
     * Register services
     */
    public function register()
    {
        add_action('wp_ajax_wpil_error_reset_data', [$this, 'ajaxErrorResetData']);
        add_action('wp_ajax_wpil_error_process', [$this, 'ajaxErrorProcess']);
        add_action('wp_ajax_edit_report_link', [$this, 'ajaxEditReportLink']);
        add_action('wp_ajax_wpil_delete_error_links', [$this, 'ajaxDeleteLinks']);
        add_filter('cron_schedules', [$this, 'addLinkCheckInterval']);
        add_action('admin_init', [$this, 'scheduleLinkCheck']);
        add_action('wpil_broken_link_check_cron', [$this, 'cronCheckLink']);
        register_deactivation_hook(__FILE__, [$this, 'clearCronSchedules']);
    }

    /**
     * Reset DB fields before search
     */
    public static function ajaxErrorResetData()
    {
        Wpil_Base::verify_nonce('wpil_error_reset_data');
        self::fillPosts();
        self::fillTerms();
        self::prepareIgnoreTable();
        self::prepareTable();
        update_option('wpil_error_reset_run', 1);
        update_option('wpil_error_check_links_cron', 0);

        ob_start();
        include WP_INTERNAL_LINKING_PLUGIN_DIR . 'templates/error_process_posts.php';
        $template = ob_get_clean();
        wp_send_json(['template' => $template]);

        die;
    }

    /**
     * Search broken links
     */
    public static function ajaxErrorProcess()
    {
        ini_set('default_socket_timeout', 15);
        $start = microtime(true);
        $total = self::getTotalPostsCount();
        $not_ready = self::getNotReadyPosts();
        $time_limit = 10;
        $proceed = 0;
        $link_batch_size = 100;
        
        if(WPIL_DEBUG_CURL){
            $link_call_results = fopen(trailingslashit(WP_CONTENT_DIR) . 'link_call_results.log', 'a'); // logs the batch results of calling the links.
        }

        //send response with search status to update progress bar
        if (!empty($_POST['get_status'])) {
            self::sendResponse(count($not_ready), $proceed, $total);
        }

        //proceed posts
        foreach ($not_ready as $item) {
            $post = new Wpil_Model_Post($item['id'], $item['type']);
            $links = Wpil_Post::getSentencesWithUrls($post);
            $sentences = self::createSentenceIndex($links);
            $link_batch = array();
            $link_count = count($links);

            foreach ($links as $key => $link_data) {
                $link = $link_data['url'];
                if ((strpos($link, 'http://') === 0 || strpos($link, 'https://') === 0 || strpos($link, '//') === 0) && !self::linkSaved($link) && !in_array($link, $link_batch)) {
                    // add the current link to the processing batch
                    $link_batch[] = $link;
                }

                // if the batch size has been reached or we're on the last link
                if(count($link_batch) >= $link_batch_size || (!empty($link_batch) && ($link_count -1) <= $key)){
                    // process the batch
                    $codes = Wpil_Link::getResponseCodes($link_batch, true);
                    // create an array for the links we want to make a second call to
                    $second_pass = array();
                    // and save the results
                    foreach($codes as $url => $code){
                        // if the code is in the 2xx range, save it
                        if($code > 199 && $code < 300){
                            self::saveLink($url, $post, $code, $sentences[$url]);
                        }else{
                            // if the code falls outside the 2xx-3xx range, slate it for another call
                            $second_pass[] = $url;
                        }
                    }

                    // if there are links we want to check a second time
                    if(!empty($second_pass)){
                        // check them with a GET call instead of HEAD
                        $second_codes = Wpil_Link::getResponseCodes($second_pass, false);
                        // go over each link
                        foreach($second_codes as $url => $code){
                            // if the code is something other than a curl error, save it directly
                            if($code > 99){
                                self::saveLink($url, $post, $code, $sentences[$url]);
                            }else{
                                // if the error code is for a curl error, see if the HEAD call had a HTTP response
                                if(isset($codes[$url]) && $codes[$url] > 99){
                                    // if it did, save that instead
                                    self::saveLink($url, $post, $codes[$url], $sentences[$url]);
                                }else{
                                    // otherwise, save the result of the GET call
                                    self::saveLink($url, $post, $code, $sentences[$url]);
                                }
                            }
                        }
                    }

                    if(WPIL_DEBUG_CURL){
                        //** Get the difference between the HEAD and GET link calls **//
                        $head_vs_get = $codes;
                        $get_vs_head = $second_codes;
                        (isset($second_codes)) ? $second_codes : array();

                        foreach($codes as $url => $code){
                            // if the HEAD call got 200 or had the same result as the GET call
                            if(isset($second_codes[$url]) && (isset($second_codes[$url]) && (int)$second_codes[$url] === (int)$code)){
                                // remove the link from the list
                                unset($head_vs_get[$url]);
                            }
                        }

                        foreach($second_codes as $url => $code){
                            // if the GET call had the same result as the HEAD call
                            if((int)$codes[$url] === (int)$code){
                                // remove the link from the list
                                unset($get_vs_head[$url]);
                            }
                        }

                        // save the data to file
                        fwrite($link_call_results, print_r(array('HEAD' => $codes, 'GET' => $second_codes, 'head_vs_get' => $head_vs_get, 'get_vs_head' => $get_vs_head),true)); // save the batch response data to file based on the calling method
                        // and clear the second codes so they don't show up if there's no GET call
                        unset($second_codes);
                    }

                    // clear the link batch
                    $link_batch = array();

                    if (microtime(true) - $start > $time_limit) {
                        self::sendResponse(count($not_ready), $proceed, $total);
                    }
                }
            }

            $proceed++;
            self::markReady($post);

            if (microtime(true) - $start > $time_limit) {
                break;
            }
        }

        self::sendResponse(count($not_ready), $proceed, $total);

        die;
    }

    /**
     * Send response search status
     *
     * @param $not_ready
     * @param $proceed
     * @param $total
     * @param string $link
     */
    public static function sendResponse($not_ready, $proceed, $total, $link_id = 0)
    {
        $ready = $total - $not_ready + $proceed;
        $percents = ceil($ready / $total * 100);
        $status =  "$percents%, $ready/$total completed";
        $finish = $total == $ready ? true : false;

        if ($finish) {
            update_option('wpil_error_reset_run', 0);
            self::mergeIgnoreLinks();
            self::deleteValidLinks();
            update_option('wpil_error_check_links_cron', 1);
        }

        wp_send_json([
            'finish' => $finish,
            'status' => $status,
            'percents' => $percents,
            'link_id' => $link_id,
        ]);
    }

    /**
     * Mark post as processed
     *
     * @param $post
     */
    public static function markReady($post)
    {
        global $wpdb;

        if ($post->type == 'term') {
            $wpdb->update($wpdb->termmeta, ['meta_value' => 1], ['term_id' => $post->id, 'meta_key' => 'wpil_sync_error']);
        } else {
            $wpdb->update($wpdb->postmeta, ['meta_value' => 1], ['post_id' => $post->id, 'meta_key' => 'wpil_sync_error']);
        }
    }

    /**
     * Reset links data about posts
     */
    public static function fillPosts()
    {
        global $wpdb;

        $wpdb->delete($wpdb->postmeta, ['meta_key' => 'wpil_sync_error']);
        $post_types = implode("','", Wpil_Settings::getPostTypes());
        $statuses_query = Wpil_Query::postStatuses();
        $posts = $wpdb->get_results("SELECT ID FROM {$wpdb->posts} WHERE post_type IN ('$post_types') $statuses_query");
        foreach ($posts as $post) {
            $wpdb->insert($wpdb->postmeta, ['post_id' => $post->ID, 'meta_key' => 'wpil_sync_error', 'meta_value' => '0']);
        }
    }

    /**
     * Reset links data about terms
     */
    public static function fillTerms()
    {
        global $wpdb;

        $taxonomies = Wpil_Settings::getTermTypes();

        $wpdb->delete($wpdb->termmeta, ['meta_key' => 'wpil_sync_error']);
        if (!empty($taxonomies)) {
            $terms = $wpdb->get_results("SELECT term_id FROM {$wpdb->term_taxonomy} WHERE taxonomy IN ('" . implode("', '", $taxonomies) . "')");
            foreach ($terms as $term) {
                $wpdb->insert($wpdb->termmeta, ['term_id' => $term->term_id, 'meta_key' => 'wpil_sync_error', 'meta_value' => '0']);
            }
        }
    }

    /**
     * Get total posts count
     *
     * @return string|null
     */
    public static function getTotalPostsCount()
    {
        global $wpdb;

        $count = $wpdb->get_var("SELECT count(`post_id`) FROM {$wpdb->postmeta} WHERE meta_key = 'wpil_sync_error'");
        if (!empty(Wpil_Settings::getTermTypes())) {
            $count += $wpdb->get_var("SELECT count(`term_id`) FROM {$wpdb->termmeta} WHERE meta_key = 'wpil_sync_error'");
        }

        return $count;
    }

    /**
     * Get posts that should be processed
     *
     * @return array
     */
    public static function getNotReadyPosts()
    {
        global $wpdb;
        $posts = [];

        $result = $wpdb->get_results("SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = 'wpil_sync_error' AND meta_value = 0 ORDER BY post_id ASC");
        foreach ($result as $post) {
            $posts[] = array('id' => $post->post_id, 'type' => 'post');
        }

        if (!empty(Wpil_Settings::getTermTypes())) {
            $result = $wpdb->get_results("SELECT term_id FROM {$wpdb->termmeta} WHERE meta_key = 'wpil_sync_error' AND meta_value = 0 ORDER BY term_id ASC");
            foreach ($result as $post) {
                $posts[] = array('id' => $post->term_id, 'type' => 'term');
            }
        }

        return $posts;
    }

    /**
     * Create broken links table if it not exists and truncate it
     */
    public static function prepareTable($truncate = true){
        global $wpdb;
        $wpil_link_table_query = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}wpil_broken_links (
                                    id int(10) unsigned NOT NULL AUTO_INCREMENT,
                                    post_id int(10) unsigned NOT NULL,
                                    post_type text,
                                    url text,
                                    internal tinyint(1) DEFAULT 0,
                                    code int(10),
                                    created DATETIME,
                                    last_checked DATETIME,
                                    check_count INT(2) DEFAULT 0,
                                    ignore_link tinyint(1) DEFAULT 0,
                                    sentence varchar(255) DEFAULT 0,
                                    PRIMARY KEY  (id),
                                    INDEX (url(512))
                                ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";

        // create DB table if it doesn't exist
        require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($wpil_link_table_query);

        if (strpos($wpdb->last_error, 'Index column size too large') !== false) {
            $wpil_link_table_query = str_replace('INDEX (url(512))', 'INDEX (url(191))', $wpil_link_table_query);
            dbDelta($wpil_link_table_query);
        }

        // run the table update just to make sure columns 'ignore_link' and 'sentence' are set
        Wpil_Base::updateTables();

        // check to see if there's stored data
        $data = $wpdb->get_results("SELECT `url` FROM {$wpdb->prefix}wpil_broken_links LIMIT 1");
        if($data && empty($data->last_error)){
            // if there is, prepare the ignore table
            self::prepareIgnoreTable();
        }

        if ($truncate) {
            $wpdb->query("TRUNCATE TABLE {$wpdb->prefix}wpil_broken_links");
        }

        Wpil_Base::fixCollation($wpdb->prefix . 'wpil_broken_links');
    }

    /**
     * Creates and clears a table for storing links that the user wants the scan to ignore
     **/
    public static function prepareIgnoreTable(){
        global $wpdb;
        
        $ignore_links = $wpdb->prefix . "wpil_ignore_links";
        
        $wpil_ignore_link_table_query = "CREATE TABLE IF NOT EXISTS {$ignore_links} (
                                            id int(10) unsigned NOT NULL AUTO_INCREMENT,
                                            post_id int(10) unsigned NOT NULL,
                                            post_type text,
                                            url text,
                                            internal tinyint(1) DEFAULT 0,
                                            code int(10),
                                            created DATETIME,
                                            PRIMARY KEY  (id),
                                            INDEX (url(512))
                                        )";


        // create DB table if it doesn't exist
        require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($wpil_ignore_link_table_query);

        $wpdb->query("TRUNCATE TABLE {$ignore_links}");

        // if the broken link table exists
        $error_tbl_exists = $wpdb->query("SHOW TABLES LIKE '{$wpdb->prefix}wpil_broken_links'");
        if(!empty($error_tbl_exists)){
            // copy all the ignored links into the ignore table
            $wpdb->query("INSERT INTO {$ignore_links} SELECT `id` AS 'id', `post_id` AS 'post_id', `post_type` AS 'post_type', `url` AS 'url', `internal` AS 'internal', `code` AS 'code', `created` AS 'created' FROM {$wpdb->prefix}wpil_broken_links WHERE `ignore_link` = 1");
        }
    }

    /**
     * Save broken link to DB
     *
     * @param $url
     * @param $post
     * @param $code
     */
    public static function saveLink($url, $post, $code, $sentence)
    {
        global $wpdb;

        $internal = Wpil_Link::isInternal($url) ? 1 : 0;
        $wpdb->insert($wpdb->prefix . 'wpil_broken_links', [
            'post_id' => $post->id,
            'post_type' => $post->type,
            'url' => $url,
            'internal' => $internal,
            'code' => $code,
            'created' => current_time('mysql', 1),
            'sentence' => $sentence,
        ]);

        if (!$wpdb->insert_id) {
            $wpdb->insert($wpdb->prefix . 'wpil_broken_links', [
                'post_id' => $post->id,
                'post_type' => $post->type,
                'url' => $url,
                'internal' => $internal,
                'code' => $code,
                'created' => current_time('mysql', 1),
                'sentence' => '',
            ]);
        }

        return $wpdb->insert_id;
    }

    /**
     * Get data for Error table
     *
     * @param $per_page
     * @param $page
     * @param string $orderby
     * @param string $order
     * @return array
     */
    public static function getData($per_page, $page, $orderby = '', $order = '')
    {
        global $wpdb;

        $where = Wpil_Filter::errorCodes();
        $limit = " LIMIT " . (($page - 1) * $per_page) . ',' . $per_page;

        if ($orderby == 'post') {
            $limit = '';
        }

        $sort = " ORDER BY id DESC ";
        if ($orderby && $order && $orderby != 'post') {
            $sort = " ORDER BY $orderby $order ";
        }

        $total = $wpdb->get_var("SELECT count(*) FROM {$wpdb->prefix}wpil_broken_links WHERE 1 $where $sort");
        $result = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}wpil_broken_links WHERE 1 $where $sort $limit" );
        foreach ($result as $key => $link) {
            $result[$key]->post = '';
            $p = new Wpil_Model_Post($link->post_id, $link->post_type);
            if (!empty($p)) {
                $result[$key]->post = '<a href="' . $p->getLinks()->view . '" target="_blank"><strong>' . $p->getTitle() . '</strong></a>
                                    <div class="row-actions">
                                        <span class="view"><a target="_blank" href="' . $p->getLinks()->view . '">View</a> | </span>
                                        <span class="edit"><a target="_blank" href="' . $p->getLinks()->edit . '">Edit</a></span>
                                    </div>';
            }

            $result[$key]->post_title = $p->getTitle();
            if(768 == $link->code){
                $result[$key]->ignore_link = '<a class="wpil_stop_ignore_link" target="_blank" data-link_id="' . $link->id . '" data-post_id="'.$p->id.'" data-post_type="'.$p->type.'" data-anchor="" data-url="'.$link->url.'">' . __('Stop Ignoring', 'wpil') . '</a>';
            }else{
                $result[$key]->ignore_link = '<a class="wpil_ignore_link" target="_blank" data-link_id="' . $link->id . '" data-post_id="'.$p->id.'" data-post_type="'.$p->type.'" data-anchor="" data-url="'.$link->url.'">' .  __('Ignore', 'wpil') . '</a>';
            }
            $result[$key]->edit_link = '<a class="wpil_edit_link" target="_blank" data-link_id="' . $link->id . '" data-post_id="'.$p->id.'" data-post_type="'.$p->type.'" data-anchor="" data-url="'.$link->url.'" data-nonce="' . wp_create_nonce('wpil_report_edit_' . $p->id . '_nonce_' . $link->id) . '">' . __('Edit', 'wpil') . '</a>';
            $result[$key]->delete_icon = '<i data-link_id="' . $link->id . '" data-post_id="'.$p->id.'" data-post_type="'.$p->type.'" data-anchor="" data-url="'.base64_encode($link->url).'" class="wpil_link_delete broken_link dashicons dashicons-no-alt"></i>';
        }

        if ($orderby == 'post') {
            usort($result, function($a, $b) use($order){
                if ($a->post_title == $b->post_title) {
                    return 0;
                }

                if ($order == 'desc') {
                    return ($a->post_title < $b->post_title) ? 1 : -1;
                } else {
                    return ($a->post_title < $b->post_title) ? -1 : 1;
                }
            });

            $result = array_slice($result, (($page - 1) * $per_page), $per_page);
        }

        return [
            'total' => $total,
            'links' => $result
        ];
    }

    public static function getCodeMessage($code, $code_in_message = false){
        
        $status_codes = array(
            // [cURL 1-9x]
            6   => __('Server Not Found', 'wpil'),
            7   => __('Connection Failed', 'wpil'),
            28  => __('Request Timeout', 'wpil'),
            35  => __('SSL/TLS Connect Error', 'wpil'),
            56  => __('Network Error', 'wpil'),
            // [Informational 1xx]
            100 => __('Continue', 'wpil'),
            101 => __('Switching Protocols', 'wpil'),
            // [Successful 2xx]
            200 => __('OK', 'wpil'),
            201 => __('Created', 'wpil'),
            202 => __('Accepted', 'wpil'),
            203 => __('Non-Authoritative Information', 'wpil'),
            204 => __('No Content', 'wpil'),
            205 => __('Reset Content', 'wpil'),
            206 => __('Partial Content', 'wpil'),
            // [Redirection 3xx]
            300 => __('Multiple Choices', 'wpil'),
            301 => __('Moved Permanently', 'wpil'),
            302 => __('Moved Temporarily', 'wpil'),
            303 => __('See Other', 'wpil'),
            304 => __('Not Modified', 'wpil'),
            305 => __('Use Proxy', 'wpil'),
            //306=>'(Unused)',
            307 => __('Temporary Redirect', 'wpil'),
            // [Client Error 4xx]
            400 => __('Bad Request', 'wpil'),
            401 => __('Unauthorized', 'wpil'),
            402 => __('Payment Required', 'wpil'),
            403 => __('Forbidden', 'wpil'),
            404 => __('Not Found', 'wpil'),
            405 => __('Method Not Allowed', 'wpil'),
            406 => __('Not Acceptable', 'wpil'),
            407 => __('Proxy Authentication Required', 'wpil'),
            408 => __('Request Timeout', 'wpil'),
            409 => __('Conflict', 'wpil'),
            410 => __('Gone', 'wpil'),
            411 => __('Length Required', 'wpil'),
            412 => __('Precondition Failed', 'wpil'),
            413 => __('Request Entity Too Large', 'wpil'),
            414 => __('Request-URI Too Long', 'wpil'),
            415 => __('Unsupported Media Type', 'wpil'),
            416 => __('Requested Range Not Satisfiable', 'wpil'),
            417 => __('Expectation Failed', 'wpil'),
            // [Server Error 5xx]
            500 => __('Internal Server Error', 'wpil'),
            501 => __('Not Implemented', 'wpil'),
            502 => __('Bad Gateway', 'wpil'),
            503 => __('Service Unavailable', 'wpil'),
            504 => __('Gateway Timeout', 'wpil'),
            505 => __('HTTP Version Not Supported', 'wpil'),
            509 => __('Bandwidth Limit Exceeded', 'wpil'),
            510 => __('Not Extended', 'wpil'),
            // [Other Errors]
            768 => __('Ignored Link', 'wpil'),
            925 => __('Link Format Error', 'wpil'),
            999 => __('Request Denied', 'wpil'),
		);
        
        $message = (isset($status_codes[$code])) ? $status_codes[$code]: __('Unknown Error', 'wpil');
        
        // if we're supposed to include the error code and this isn't a curl error, misformatted, or an ignored link
        if($code_in_message && $code > 99 && 925 != $code && 768 != $code){
            // add it at the start of the message
            $message = $code . ' ' . $message;
        }
        
        return $message;
    }

    /**
     * Creates an index of sentences from the link data.
     * Keyed to the url
     **/
    public static function createSentenceIndex($links = array()){
        $index = array();
        if(!empty($links)){
            foreach($links as $link_data){
                $index[$link_data['url']] = $link_data['sentence'];
            }
        }
        return $index;
    }

    /**
     * Updates the link in a given post on ajax call
     **/
    public static function ajaxEditReportLink(){
        // exit if critical data is missing
        if( !isset($_POST['url']) ||
             empty($_POST['url']) ||
            !isset($_POST['new_url']) ||
             empty($_POST['new_url']) ||
            !isset($_POST['post_id']) ||
            !isset($_POST['post_type']) ||
            !isset($_POST['nonce']) ||
            !isset($_POST['link_id']))
        {
            // let the user know that some data was missing
            wp_send_json(array('error' => array('title' => __('Update Error', 'wpil'), 'text' => __('Link couldn\'t be updated because some data was missing from the request.', 'wpil'))));
        }

        $old_url = esc_url_raw($_POST['url']);
        $new_url = esc_url_raw($_POST['new_url']);
        $post_id = (int)$_POST['post_id'];
        $link_id = (int) $_POST['link_id'];
        $post_type = $_POST['post_type'];
        
        // if the nonce doesn't check out, exit
        if(!wp_verify_nonce($_POST['nonce'], 'wpil_report_edit_' . $post_id . '_nonce_' . $link_id) || 0 === $post_id || 0 === $link_id){
            // let the user know that reloading the page _should_ fix it.
            wp_send_json(array('error' => array('title' => __('Update Error', 'wpil'), 'text' => __('Couldn\'t process the data because the authentication was out of date. Please reload the page and try again.', 'wpil'))));
        }
        
        // if the old link is the same as the new link
        if($old_url === $new_url){
            // let the user know that we won't be updating the link
            wp_send_json(array('error' => array('title' => __('Link Unchanged', 'wpil'), 'text' => __('The new link is the same as the original one, so we\'re unable to update it.', 'wpil'))));
        }
        
        // update the link in the body content
        $status = Wpil_Link::updateExistingLink($post_id, $post_type, $old_url, $new_url);
        
        // if the link has been successfully updated
        if($status){
            // remove the old reference from the broken_links table
            self::deleteLink($link_id);
            // and tell the user the good news!
            wp_send_json(array('success' => array('title' => __('Link Updated!', 'wpil'), 'text' => __('The link has been successfully updated!', 'wpil'))));
        }        
        
        // if we made it this far, the link must not have been updated... Probably because the post content has changed
        wp_send_json(array('error' => array('title' => __('Update Error', 'wpil'), 'text' => __('Couldn\'t find the link to update. It\'s possible the link has been changed or removed since the last time the error scan was run.', 'wpil'))));
    }

    /**
     * Sets a link in the error table to "ignored" status.
     */
    public static function markLinkIgnored(){
        global $wpdb;

        if(!isset($_POST['url'])){
            return;
        }

        $url = htmlentities(esc_url_raw($_POST['url']));

        if(!empty($url)){
            // make sure the url is in the DB
            if(self::linkSaved($url)){
                // if it is, set the link to "ignored"
                $wpdb->update($wpdb->prefix . "wpil_broken_links", array('code' => 768, 'ignore_link' => 1), array('url' => $url), array('%d', '%d'));
            }
        }
    }

    /**
     * Unmarks a link from being ignored by the scan, and does a scan of the link to see what it's status is.
     */
    public static function unmarkLinkIgnored(){
        global $wpdb;
        $broken_links = $wpdb->prefix . "wpil_broken_links";

        if(!isset($_POST['url'])){
            return;
        }
        
        $url = htmlentities(esc_url_raw($_POST['url']));
        if(!empty($url)){
            // make sure the url is in the DB and it's being ignored
            $link = $wpdb->get_results("SELECT * FROM {$broken_links} WHERE `url` = '{$url}' && `ignore_link` = 1 LIMIT 1");
            if(!empty($link)){
                // if it is, do a rescan of the link and reset it's status
                $link = $link[0];
                $head = Wpil_Link::getResponseCodes(array($url), true);
                $get  = Wpil_Link::getResponseCodes(array($url));
                $code_1 = (isset($head[$url])) ? $head[$url] : 0;
                $code_2 = (isset($get[$url])) ? $get[$url] : 0;
                $updated_code = $link->code;

                if(200 == $code_1 || 200 == $code_2){
                    $updated_code = 200;
                }elseif($code_1 > 99 && $code_2 < 100){
                    $updated_code = $code_1;
                }elseif($code_2 > 0){
                    $updated_code = $code_2;
                }
    
                if(200 === $updated_code){
                    // if the link is good, remove it from the DB
                    $wpdb->delete($broken_links, array('id' => $link->id));
                }else{
                    // if it's not, update the listing
                    $wpdb->update($broken_links, array('code' => $updated_code, 'last_checked' => current_time('mysql', 1), 'check_count' => 1, 'ignore_link' => 0), array('id' => $link->id));
                }
            }
        }
    }

    /**
     * Delete link record from DB
     *
     * @param $link_id
     */
    public static function deleteLink($link_id)
    {
        global $wpdb;
        $wpdb->delete($wpdb->prefix . 'wpil_broken_links', ['id' => $link_id]);
    }

    /**
     * Check if URL is already saved in the DB
     *
     * @param $url
     * @return string|null
     */
    public static function linkSaved($url)
    {
        global $wpdb;
        $count = $wpdb->get_var("SELECT count(*) FROM {$wpdb->prefix}wpil_broken_links WHERE url = '$url'");
        return !empty($count) ? true : false;
    }

    public static function mergeIgnoreLinks()
    {
        global $wpdb;
        $ignore_links = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}wpil_ignore_links");
        
        foreach($ignore_links as $link_data){
            // if the current ignore link is in the error table
            if(self::linkSaved($link_data->url)){
                // set it's status to "ignored"
                $wpdb->update($wpdb->prefix . "wpil_broken_links", array('code' => 768, 'ignore_link' => 1, 'created' => $link_data->created), array('url' => $link_data->url), array('%d', '%d', '%s'));
            }
        }
    }

    public static function deleteValidLinks()
    {
        global $wpdb;
        $wpdb->query("DELETE FROM {$wpdb->prefix}wpil_broken_links WHERE code IN (200, 301, 302)");
    }
    
    public static function cronCheckLink(){
        global $wpdb;
        $broken_links = $wpdb->prefix . "wpil_broken_links";

        $run_scan = get_option('wpil_error_check_links_cron', 0);
        if(empty($run_scan)){
            return;
        }

        // TODO: delete when we're pretty sure we don't need this check. Added in v1.0.0
        // find out if the table has a last_checked col
        $col = $wpdb->query("SHOW COLUMNS FROM {$broken_links} LIKE 'last_checked'");
        if(empty($col)){
            return;
        }

        // get the link that's gone the longest without being checked and has been checked less than 10 times
        if(1.0 < WPIL_STATUS_SITE_DB_VERSION){
            $link = $wpdb->get_results("SELECT * FROM {$broken_links} WHERE `check_count` < 10 && `ignore_link` = 0 ORDER BY `last_checked` ASC LIMIT 1");
        }else{
            $link = $wpdb->get_results("SELECT * FROM {$broken_links} WHERE `check_count` < 10 ORDER BY `last_checked` ASC LIMIT 1");
        }
        if(!empty($link)){
            $link = $link[0];
            $head = Wpil_Link::getResponseCodes(array($link->url), true);
            $get  = Wpil_Link::getResponseCodes(array($link->url));
            $code_1 = (isset($head[$link->url])) ? $head[$link->url] : 0;
            $code_2 = (isset($get[$link->url])) ? $get[$link->url] : 0;
            $updated_code = $link->code;

            if(200 == $code_1 || 200 == $code_2){       // if one of the methods said the link is good
                $updated_code = 200;
            }elseif($code_1 > 99 && $code_2 < 100){     // if the HEAD method got an http code, while the GET method got a curl error
                $updated_code = $code_1;
            }elseif($code_2 > 0){                       // if the last two were false, go with the GET method results since they tend to be more correct
                $updated_code = $code_2;
            }

            if(200 === $updated_code){
                // if the link is good, remove it from the DB
                $wpdb->delete($broken_links, array('id' => $link->id));
            }else{
                // if it's not, update the listing
                $wpdb->update($broken_links, array('code' => $updated_code, 'last_checked' => current_time('mysql', 1), 'check_count' => ($link->check_count + 1)), array('id' => $link->id));
            }

        }else{
            // if there are no links, disable the scan
            update_option('wpil_error_check_links_cron', 0);
        }

        if(WPIL_DEBUG_CURL){
            $test = fopen(trailingslashit(WP_CONTENT_DIR) . 'curl_link_check_cron_log.log', 'a');     // logs the actions that curl goes through in contacting the server
            fwrite($test, print_r(array($code_1, $code_2, $link, $col),true));
        }
    }
    
    public static function addLinkCheckInterval($schedules){
        $schedules['10min'] = array(
            'interval' => 60 * 10,
            'display' => __('Every Ten Minutes', 'wpil')
        );
        return $schedules;
    }

    public static function scheduleLinkCheck(){
        if(!wp_get_schedule('wpil_broken_link_check_cron')){
            wp_schedule_event(time(), '10min', 'wpil_broken_link_check_cron');
        }
    }
    
    public static function clearCronSchedules(){
        $timestamp = wp_next_scheduled('wpil_broken_link_check_cron');
        wp_unschedule_event($timestamp, 'wpil_broken_link_check_cron');
    }

    public static function getLinkById($id) {
        global $wpdb;
        return $wpdb->get_row("SELECT * FROM {$wpdb->prefix}wpil_broken_links WHERE id = " . $id);
    }

    public static function ajaxDeleteLinks() {
        if (empty($_POST['links'])) {
            wp_send_json(array('error' => array('title' => __('Error', 'wpil'), 'text' => __('No links selected.', 'wpil'))));
        }

        $links = !empty($_POST['links']) ? $_POST['links'] : [];
        foreach ($links as $link) {
            $link = self::getLinkById($link);
            if ($link) {
                Wpil_Link::delete([
                    'link_id' => $link->id,
                    'post_id' => $link->post_id,
                    'post_type' => $link->post_type,
                    'url' => $link->url,
                ], true);
            }
        }

        wp_send_json(array('success' => true));
    }
}
