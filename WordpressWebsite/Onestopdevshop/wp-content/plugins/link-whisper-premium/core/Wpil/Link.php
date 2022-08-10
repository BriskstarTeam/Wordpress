<?php

/**
 * Work with links
 */
class Wpil_Link
{
    /**
     * Register services
     */
    public function register()
    {
        add_action('wp_ajax_wpil_save_linking_references', [$this, 'addLinks']);
        add_action('wp_ajax_wpil_get_link_title', [$this, 'getLinkTitle']);
        add_action('wp_ajax_wpil_add_link_to_ignore', [$this, 'addLinkToIgnore']);
    }

    /**
     * Update post links
     */
    function addLinks()
    {
        $err_msg = false;

        //check if request has needed data
        if (empty($_POST['data'])) {
            $err_msg = "No links selected";
        } elseif (empty($_POST['id']) || empty($_POST['type']) || empty($_POST['page'])){
            $err_msg = "Broken links data";
        } else {
            $page = $_POST['page'];

            foreach ($_POST['data'] as $item) {
                $id = !empty($item['id']) ? (int)$item['id'] : (int)$_POST['id'];
                $type = !empty($item['type']) ? $item['type'] : $_POST['type'];

                $links = $item['links'];
                //trim sentences
                foreach ($links as $key => $link) {
                    if ($page == 'inbound') {
                        $link['id'] = (int)$_POST['id'];
                        $link['type'] = sanitize_text_field($_POST['type']);
                    }


                    if (!empty($link['custom_link'])) {
                        $view_link = $link['custom_link'];
                    } elseif ($link['type'] == 'term') {
                        $view_link = get_term_link((int)$link['id']);
                    } else {
                        $view_link = get_the_permalink((int)$link['id']);
                    }

                    $links[$key]['sentence'] = trim(base64_decode($link['sentence']));
                    $links[$key]['sentence_with_anchor'] = trim(str_replace('%view_link%', $view_link, $link['sentence_with_anchor']));

                    if (!empty($link['custom_sentence'])) {
                        $links[$key]['custom_sentence'] = trim(str_replace('|href="([^"]+)"|', $view_link, base64_decode($link['custom_sentence'])));

                        if (!empty($link['custom_link'])) {
                            $links[$key]['custom_sentence'] = preg_replace('|href="([^"]+)"|', 'href="'.$link['custom_link'].'"', $links[$key]['custom_sentence']);
                        }
                    }

                    update_post_meta($link['id'], 'wpil_sync_report3', 0);
                }

                if ($type == 'term') {
                    update_term_meta($id, 'wpil_links', $links);
                } else {
                    update_post_meta($id, 'wpil_links', $links);

                    if ($page == 'outbound') {
                        //create DB record with success flag
                        update_post_meta($id, 'wpil_is_outbound_links_added', '1');

                        //create DB record to refresh page after post update if Gutenberg is active
                        if (!empty($_POST['gutenberg']) && $_POST['gutenberg'] == 'true') {
                            update_post_meta($id, 'wpil_gutenberg_restart', '1');
                        }
                    }
                }
            }

            //add links to content
            if ($page == 'inbound') {
                foreach ($_POST['data'] as $item) {
                    if ($item['type'] == 'term') {
                        Wpil_Term::addLinksToTerm($item['id']);
                    } else {
                        ob_start();
                        Wpil_Post::addLinksToContent(null, ['ID' => $item['id']]);
                        ob_end_clean();
                    }
                }

                if ($item['type'] == 'term') {
                    update_term_meta((int)$_POST['id'], 'wpil_is_inbound_links_added', '1');
                } else {
                    update_post_meta((int)$_POST['id'], 'wpil_is_inbound_links_added', '1');
                }
            }
        }

        //return response
        header("Content-type: application/json");
        echo json_encode(['err_msg' => $err_msg]);

        exit;
    }

    /**
     * Delete link from post
     * @param null $params
     */
    public static function delete($params = null, $no_die = false)
    {
        foreach (['post_id', 'post_type', 'url', 'anchor', 'link_id'] as $key) {
            $$key = self::getDeleteParam($params, $key);
        }
        $anchor = !empty($anchor) ? base64_decode($anchor) : null;

        if ($post_id && $post_type && $url) {
            $post = new Wpil_Model_Post($post_id, $post_type);
            $content = $post->getCleanContent();

            if ($post_type == 'post') {
                Wpil_Post::editors('deleteLink', [$post_id, $url, $anchor]);
                Wpil_Editor_Kadence::deleteLink($content, $url, $anchor);
            }
            $url = base64_decode($url);

            //delete link from post content
            if (empty($anchor)) {
                $content = preg_replace('`<a [^>]+(\'|\")' . preg_quote($url, '`') . '(\'|\")[^>]*>(.*?)</a>`i', '$3',  $content);
            } else {
                $content = preg_replace('`<a [^>]+(\'|\")' . preg_quote($url, '`') . '(\'|\")[^>]*>(.*?)' . preg_quote($anchor, '`') . '(.*?)</a>`i', $anchor,  $content);
            }

            $post->updateContent($content);

            //delete link record from wpil_broken_links table
            if ($link_id) {
                Wpil_Error::deleteLink($link_id);
            }

            if (WPIL_STATUS_LINK_TABLE_EXISTS){
                Wpil_Report::update_post_in_link_table($post);
            }

            Wpil_Report::statUpdate($post);

            //update second post if link was internal inbound
            $second_post = Wpil_Post::getPostByLink($url);
            if (!empty($second_post)) {
                Wpil_Report::statUpdate($second_post);
            }
        }

        if (!$no_die) {
            die;
        }
    }

    public static function getDeleteParam($params, $key)
    {
        if (!empty($params[$key])) {
            return $params[$key];
        } elseif (!empty($_POST[$key])) {
            return $_POST[$key];
        } else {
            return null;
        }
    }

    /**
     * Check if link is internal
     *
     * @param $url
     * @return bool
     */
    public static function isInternal($url)
    {
        if (strpos($url, '://') === false) {
            return true;
        }

        if (self::markedAsExternal($url)) {
            return false;
        }

        $localhost = parse_url(get_site_url(), PHP_URL_HOST);
        $host = parse_url($url, PHP_URL_HOST);

        if (!empty($localhost) && !empty($host)) {
            $localhost = str_replace('www.', '', $localhost);
            $host = str_replace('www.', '', $host);
            if ($localhost == $host) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if link is broken
     *
     * @param $url
     * @return bool|int
     */
    public static function getResponseCode($url)
    {
        // if a url was provided and it's formatted correctly, make a curl call to see if it's valid
        if(!empty($url) && (parse_url($url, PHP_URL_SCHEME) || substr($url, 0, 2) == '//') && parse_url($url, PHP_URL_HOST)){
            return self::getResponseCodeCurl($url);
        }

        return 925;
    }

    public static function getResponseCodeCurl($url) {
        $c = curl_init(html_entity_decode($url));
        $user_ip = get_transient('wpil_site_ip_address');
        
        // if the ip transient isn't set yet
        if(empty($user_ip)){
            // get the site's ip
            $host = gethostname();
            $user_ip = gethostbyname($host);

            // if that didn't work
            if(empty($user_ip)){
                // get the curent user's ip as best we can
                if (!empty($_SERVER['HTTP_CLIENT_IP'])){
                    $user_ip = $_SERVER['HTTP_CLIENT_IP'];
                }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                    $user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                }else{
                    $user_ip = $_SERVER['REMOTE_ADDR'];
                }
            }
        }

        // save the ip so we don't have to look it up next time
        set_transient('wpil_site_ip_address', $user_ip, (10 * MINUTE_IN_SECONDS));

        // create the list of headers to make the cURL request with
        $request_headers = array(
            'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
            'Accept-Encoding: gzip, deflate, br',
            'Accept-Language: en-US,en;q=0.9',
            'Cache-Control: max-age=0',
            'Keep-Alive: 300',
            'Pragma: ',
            'Sec-Fetch-Dest: document',
            'Sec-Fetch-Mode: navigate',
            'Sec-Fetch-Site: none',
            'Sec-Fetch-User: ?0',
            'Host: ' . parse_url($url, PHP_URL_HOST),
            'Referer: ' . site_url(),
            'User-Agent: ' . 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',
        );

        if(!empty($user_ip)){
            $request_headers[] = 'X-Real-Ip: ' . $user_ip;
        }

        curl_setopt($c, CURLOPT_HTTPHEADER, $request_headers);
        curl_setopt($c, CURLOPT_HEADER, true);
        curl_setopt($c, CURLOPT_FILETIME, true);
        curl_setopt($c, CURLOPT_NOBODY, true);
        curl_setopt($c, CURLOPT_HTTPGET, true);
        curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($c, CURLOPT_MAXREDIRS, 30);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($c, CURLOPT_SSL_FALSESTART, true);
        curl_setopt($c, CURLOPT_TIMEOUT, 20);
        curl_setopt($c, CURLOPT_COOKIEFILE, null);

        $headers = curl_exec($c);
        
        $http_code = intval(curl_getinfo($c, CURLINFO_RESPONSE_CODE));
        $curl_error_code = curl_errno($c);

        // if the curl request ultimately got a http code
        if(!empty($http_code)){
            // return the code
            return $http_code;
        }elseif(!empty($curl_error_code)){
            // if we got a curl error, return that
            return $curl_error_code;
        }

        return 925;
    }

    /**
     * Check if link is broken
     *
     * @param $url
     * @return bool|int
     */
    public static function getResponseCodes($urls = array(), $head_call = false)
    {
        $return_urls = array();
        $good_urls = array();
        foreach($urls as $url){
            // if a url was provided and it's formatted correctly, add it to the list to process
            if(!empty($url) && (parse_url($url, PHP_URL_SCHEME) || substr($url, 0, 2) == '//') && parse_url($url, PHP_URL_HOST)){
                $good_urls[] = $url;
            }else{
                // if it wasn't, add it to the return list as a 925
                $return_urls[$url] = 925;
            }
        }

        // if there are good urls
        if(!empty($good_urls)){
            // get the curl response codes for each of them
            $codes = self::getResponseCodesCurl($good_urls, $head_call);
            // and merge the reponses into the return links
            $return_urls = array_merge($return_urls, $codes);
        }

        return $return_urls;
    }

    public static function getResponseCodesCurl($urls, $head_call = false) {
        $start = microtime(true);
        $redirect_codes = array(301, 302, 307);
        $user_ip = get_transient('wpil_site_ip_address');
        $return_urls = array();
        
        // if the ip transient isn't set yet
        if(empty($user_ip)){
            // get the site's ip
            $host = gethostname();
            $user_ip = gethostbyname($host);

            // if that didn't work
            if(empty($user_ip)){
                // get the curent user's ip as best we can
                if (!empty($_SERVER['HTTP_CLIENT_IP'])){
                    $user_ip = $_SERVER['HTTP_CLIENT_IP'];
                }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                    $user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                }else{
                    $user_ip = $_SERVER['REMOTE_ADDR'];
                }
            }
        }

        // save the ip so we don't have to look it up next time
        set_transient('wpil_site_ip_address', $user_ip, (10 * MINUTE_IN_SECONDS));

        // create the multihandle
        $mh = curl_multi_init();

        // if we're debugging curl
        if(WPIL_DEBUG_CURL){
            // setup the log files
            $verbose = fopen(trailingslashit(WP_CONTENT_DIR) . 'curl_connection_log.log', 'a');     // logs the actions that curl goes through in contacting the server
            $connection = fopen(trailingslashit(WP_CONTENT_DIR) . 'curl_connection_info.log', 'a'); // logs the result of contacting the server.
        }

        $handles = array();
        foreach($urls as $url){
            // create the curl handle and add it to the list keyed with the url its using
            $handles[$url] = curl_init(html_entity_decode($url));

            // create the list of headers to make the cURL request with
            $request_headers = array(
                'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
                'Accept-Encoding: gzip, deflate, br',
                'Accept-Language: en-US,en;q=0.9',
                'Cache-Control: max-age=0, no-cache',
                'Pragma: ',
                'Sec-Fetch-Dest: document',
                'Sec-Fetch-Mode: navigate',
                'Sec-Fetch-Site: none',
                'Sec-Fetch-User: ?0',
                'Host: ' . parse_url($url, PHP_URL_HOST),
                'Referer: ' . site_url(),
                'User-Agent: ' . 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',
            );

            if(!empty($user_ip)){
                $request_headers[] = 'X-Real-Ip: ' . $user_ip;
            }

            if($head_call){
                $request_headers[] = 'Connection: close';
            }else{
                $request_headers[] = 'Connection: keep-alive';
                $request_headers[] = 'Keep-Alive: 300';
            }

            curl_setopt($handles[$url], CURLOPT_HTTPHEADER, $request_headers);
            curl_setopt($handles[$url], CURLOPT_HEADER, true);
            curl_setopt($handles[$url], CURLOPT_FILETIME, true);
            curl_setopt($handles[$url], CURLOPT_NOBODY, true);
            curl_setopt($handles[$url], CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($handles[$url], CURLOPT_MAXREDIRS, 10);
            curl_setopt($handles[$url], CURLOPT_RETURNTRANSFER, true);
            curl_setopt($handles[$url], CURLOPT_CONNECTTIMEOUT, 15);
            curl_setopt($handles[$url], CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($handles[$url], CURLOPT_TIMEOUT, 15);
            curl_setopt($handles[$url], CURLOPT_COOKIEFILE, null);
            curl_setopt($handles[$url], CURLOPT_FORBID_REUSE, true);
            curl_setopt($handles[$url], CURLOPT_FRESH_CONNECT, true);
            curl_setopt($handles[$url], CURLOPT_COOKIESESSION, true);
            curl_setopt($handles[$url], CURLOPT_SSL_VERIFYPEER, false);

            $curl_version = curl_version();
            if (version_compare(phpversion(), '7.0.7') >= 0 && version_compare($curl_version['version'], '7.42.0') >= 0) {
                curl_setopt($handles[$url], CURLOPT_SSL_FALSESTART, true);
            }

            if(false === $head_call){
                curl_setopt($handles[$url], CURLOPT_HTTPGET, true);
            }

            // if we're debugging curl
            if(WPIL_DEBUG_CURL){
                // set curl to verbose logging and set where to write it to
                curl_setopt($handles[$url], CURLOPT_VERBOSE, true);
                curl_setopt($handles[$url], CURLOPT_STDERR, $verbose);
            }

            // and add it to the multihandle
            curl_multi_add_handle($mh, $handles[$url]);
        }

        // if there are handles, execute the multihandle
        if(!empty($handles)){
            do {
                $status = curl_multi_exec($mh, $active);
                if ($active) {
                    curl_multi_select($mh);
                }
            } while ($active && $status == CURLM_OK);
        }

        // get any error codes from the operations
        $curl_codes = array();
        foreach($handles as $handle){
            $info = curl_multi_info_read($mh);
            $handle_int = intval($info['handle']);
            if(isset($info['result'])){
                $curl_codes[$handle_int] = $info['result'];
            }else{
                $curl_codes[$handle_int] = 0;
            }
        }

        // when the multihandle is finished, go over the handles and process the responses
        foreach($handles as $handle_url => $handle){
            $handle_int = intval($handle);
            $http_code = intval(curl_getinfo($handle, CURLINFO_RESPONSE_CODE));
            $curl_error_code = (isset($curl_codes[$handle_int])) ? $curl_codes[$handle_int]: 0;

            // if we're debugging curl
            if(WPIL_DEBUG_CURL){
                // save the results of the connection
                fwrite($connection, print_r(curl_getinfo($handle),true));
            }

            // if the curl request ultimately got a http code
            if(!empty($http_code)){
                // if the code is for a redirect and we have some time to chase it
                if(in_array($http_code, $redirect_codes) && (microtime(true) - $start) < 15){
                    // get the url from the curl data
                    $new_url = trim(curl_getinfo($handle, CURLINFO_EFFECTIVE_URL));
                    if(!empty($new_url)){
                        // call _that_ url to see what happens and add the response to the link list
                        $return_urls[$handle_url] = self::getResponseCodeCurl($new_url);
                    }
                }else{
                    // if the code wasn't a redirect or we don't have the time to check, add the code to the list
                    $return_urls[$handle_url] =  $http_code;
                }
            }elseif(!empty($curl_error_code)){
                // curl error list: https://curl.haxx.se/libcurl/c/libcurl-errors.html
                // useful for diagnosing errors < 100
                $return_urls[$handle_url] = $curl_error_code;
            }

            // if a status hasn't been added to the link yet
            if(!isset($return_urls[$handle_url])){
                // mark it as 925
                $return_urls[$handle_url] = 925;
            }
            
            // close the current handle
            curl_multi_remove_handle($mh, $handle);
            curl_close($handle);
        }

        // close the multi handle
        curl_multi_close($mh);

        return $return_urls;
    }

    /**
     * Get link title by URL
     */
    public static function getLinkTitle()
    {
        $link = !empty($_POST['link']) ? $_POST['link'] : '';
        $title = '';
        $id = '';
        $type = '';

        if ($link) {
            if (self::isInternal($link)) {
                $post_id = url_to_postid($link);
                if ($post_id) {
                    $post = get_post($post_id);
                    $title = $post->post_title;
                    $link = '/' . $post->post_name;
                    $id = $post_id;
                    $type = 'post';
                } else {
                    $slugs = array_filter(explode('/', $link));
                    $term = Wpil_Term::getTermBySlug(end($slugs));
                    if (!empty($term)) {
                        $title = $term->name;
                        $link = end($slugs);
                        $id = $term->term_id;
                        $type = 'term';
                    }
                }
            }

            //get title if link is not post or term
            if (!$title) {
                $str = file_get_contents($link);
                if(strlen($str)>0){
                    $str = trim(preg_replace('/\s+/', ' ', $str)); // supports line breaks inside <title>
                    preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title); // ignore case
                    $title = $title[1];
                }
            }

            echo json_encode([
                'title' => $title,
                'link' => $link,
                'id' => $id,
                'type' => $type
            ]);
        }

        die;
    }

    /**
     * Remove class "wpil_internal_link" from links
     */
    public static function removeLinkClass()
    {
        global $wpdb;

        $wpdb->get_results("UPDATE {$wpdb->posts} SET post_content = REPLACE(post_content, 'wpil_internal_link', '') WHERE post_content LIKE '%wpil_internal_link%'");
    }

    /**
     * Add link to ignore list
     */
    public static function addLinkToIgnore()
    {
        $error = false;
        $id = !empty($_POST['id']) ? $_POST['id'] : null;
        $type = !empty($_POST['type']) ? $_POST['type'] : null;

        if ($id && $type) {
            $post = new Wpil_Model_Post($id, $type);
            $link = $post->getLinks()->view;
            if (!empty($link)) {
                $links = get_option('wpil_ignore_links');
                if (!empty($links)) {
                    $links_array = explode("\n", $links);
                    if (!in_array($link, $links_array)) {
                        $links .= "\n" . $link;
                    }
                } else {
                    $links = $link;
                }
                update_option('wpil_ignore_links', $links);
            } else {
                $error = 'Empty post link';
            }
        } else {
            $error = 'Wrong data';
        }

        echo json_encode(['error' => $error]);
        die;
    }

    /**
     * Clean link from trash symbols
     *
     * @param $link
     * @return string
     */
    public static function clean($link)
    {
        $link = str_replace(['http://', 'https://', '//www.'], '//', strtolower(trim($link)));
        if (substr($link, -1) == '/') {
            $link = substr($link, 0, -1);
        }

        return $link;
    }
    
    /**
     * Updates an existing link in a post with a new link
     * 
     * @param $post_id
     * @param $post_type
     * @param $old_link
     * @param $new_link
     **/
    public static function updateExistingLink($post_id = 0, $post_type = '', $old_link = '', $new_link = ''){
        if(empty($post_id) || empty($post_type) || empty($old_link) || empty($new_link)){
            return false;
        }
        
        // get the post we want to update
        $post = new Wpil_Model_Post($post_id, $post_type);

        // if there is a post, update it with the new link 
        if(!empty($post)){
            $content = $post->getContent();
            
            if(false !== strpos($content, $old_link)){
                $content = str_replace($old_link, $new_link, $content);
                $updated = $post->updateContent($content);
                return $updated;
            }
        }
        
        return false;
    }

    /**
     * Check if link was marked as external
     *
     * @param $link
     * @return bool
     */
    public static function markedAsExternal($link)
    {
        $external_links = Wpil_Settings::getMarkedAsExternalLinks();

        if (in_array($link, $external_links)) {
            return true;
        }

        foreach ($external_links as $external_link) {
            if (substr($external_link, -1) == '*' && strpos($link, substr($external_link, 0, -1)) === 0) {
                return true;
            }
        }

        return false;
    }
}
