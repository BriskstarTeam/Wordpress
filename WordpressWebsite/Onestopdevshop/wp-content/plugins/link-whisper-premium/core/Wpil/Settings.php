<?php

/**
 * Work with settings
 */
class Wpil_Settings
{
    public static $ignore_phrases = null;
    public static $ignore_words = null;
    public static $keys = [
        'wpil_2_ignore_numbers',
        'wpil_2_post_types',
        'wpil_2_term_types',
        'wpil_2_post_statuses',
        'wpil_2_links_open_new_tab',
        'wpil_2_ll_use_h123',
        'wpil_2_ll_pairs_mode',
        'wpil_2_ll_pairs_rank_pc',
        'wpil_2_debug_mode',
        'wpil_option_update_reporting_data_on_save',
        'wpil_skip_sentences',
        'wpil_selected_language',
        'wpil_ignore_links',
        'wpil_ignore_categories',
        'wpil_show_all_links',
        'wpil_disable_outbound_suggestions',
        'wpil_full_html_suggestions',
        'wpil_ignore_keywords_posts',
        'wpil_ignore_orphaned_posts',
        'wpil_marked_as_external',
        'wpil_disable_acf',
    ];

    /**
     * Show settings page
     */
    public static function init()
    {
        $types_active = Wpil_Settings::getPostTypes();
        $term_types_active = Wpil_Settings::getTermTypes();
        $types_available = get_post_types(['public' => true]);
        $term_types_available = get_taxonomies();
        $statuses_available = [
            'publish',
            'private',
            'future',
            'pending',
            'draft'
        ];
        $statuses_active = Wpil_Settings::getPostStatuses();

        include WP_INTERNAL_LINKING_PLUGIN_DIR . '/templates/wpil_settings_v2.php';
    }

    /**
     * Get ignore phrases
     */
    public static function getIgnorePhrases()
    {
        if (is_null(self::$ignore_phrases)) {
            $phrases = [];
            foreach (self::getIgnoreWords() as $word) {
                if (strpos($word, ' ') !== false) {
                    $phrases[] = preg_replace('/\s+/', ' ',$word);
                }
            }

            self::$ignore_phrases = $phrases;
        }

        return self::$ignore_phrases;
    }

    /**
     * Get ignore words
     */
    public static function getIgnoreWords()
    {
        if (is_null(self::$ignore_words)) {
            $words = get_option('wpil_2_ignore_words', null);

            if (is_null($words)) {
                // get the user's current language
                $selected_language = self::getSelectedLanguage();
                $ignore_words_file = self::getIgnoreFile($selected_language);
                $words = file($ignore_words_file);
                
                foreach($words as $key => $word) {
                    $words[$key] = trim(Wpil_Word::strtolower($word));
                }
            } else {
                $words = explode("\n", $words);
                $words = array_unique($words);
                sort($words);

                foreach($words as $key => $word) {
                    $words[$key] = trim(Wpil_Word::strtolower($word));
                }
            }

            self::$ignore_words = $words;
        }
        
        return self::$ignore_words;
    }

    /**
     * Gets all current ignore word lists.
     * The word list for the language the user is currently using is loaded from the settings.
     * All other languages are loaded from the word files
     **/
    public static function getAllIgnoreWordLists(){
        $current_language       = self::getSelectedLanguage();
        $supported_languages    = self::getSupportedLanguages();
        $all_ignore_lists       = array();

        // go over all currently supported languages
        foreach($supported_languages as $language_id => $supported_language){

            // if the current language is the user's selected one
            if($language_id === $current_language){
                
                $words = get_option('wpil_2_ignore_words', null);
                if(is_null($words)){
                    $words = self::getIgnoreWords();
                }

                $words = explode("\n", $words);
                $words = array_unique($words);
                sort($words);
                foreach($words as $key => $word) {
                    $words[$key] = trim(Wpil_Word::strtolower($word));
                }
                
                $all_ignore_lists[$language_id] = $words;
            }else{
                $ignore_words_file = self::getIgnoreFile($language_id);
                $words = array();
                if(file_exists($ignore_words_file)){
                    $words = file($ignore_words_file);
                }else{
                    // if there is no word file, skip to the next one
                    continue;
                }
                
                if(empty($words)){
                    $words = array();
                }
                
                foreach($words as $key => $word) {
                    $words[$key] = trim(Wpil_Word::strtolower($word));
                }
                
                $all_ignore_lists[$language_id] = $words;
            }
        }

        return $all_ignore_lists;
    }

    /**
     * Get ignore words file based on current language
     *
     * @param $language
     * @return string
     */
    public static function getIgnoreFile($language)
    {
        switch($language){
            case 'spanish':
                $file = WP_INTERNAL_LINKING_PLUGIN_DIR . 'includes/ignore_word_lists/ES_ignore_words.txt';
                break;
            case 'french':
                $file = WP_INTERNAL_LINKING_PLUGIN_DIR . 'includes/ignore_word_lists/FR_ignore_words.txt';
                break;
            case 'german':
                $file = WP_INTERNAL_LINKING_PLUGIN_DIR . 'includes/ignore_word_lists/DE_ignore_words.txt';
                break;
            case 'russian':
                $file = WP_INTERNAL_LINKING_PLUGIN_DIR . 'includes/ignore_word_lists/RU_ignore_words.txt';
                break;
            case 'portuguese':
                $file = WP_INTERNAL_LINKING_PLUGIN_DIR . 'includes/ignore_word_lists/PT_ignore_words.txt';
                break;
            case 'dutch':
                $file = WP_INTERNAL_LINKING_PLUGIN_DIR . 'includes/ignore_word_lists/NL_ignore_words.txt';
                break;
            case 'danish':
                $file = WP_INTERNAL_LINKING_PLUGIN_DIR . 'includes/ignore_word_lists/DA_ignore_words.txt';
                break;
            case 'italian':
                $file = WP_INTERNAL_LINKING_PLUGIN_DIR . 'includes/ignore_word_lists/IT_ignore_words.txt';
                break;
            case 'polish':
                $file = WP_INTERNAL_LINKING_PLUGIN_DIR . 'includes/ignore_word_lists/PL_ignore_words.txt';
                break;
            default:
                $file = WP_INTERNAL_LINKING_PLUGIN_DIR . 'includes/ignore_word_lists/EN_ignore_words.txt';
                break;
        }

        return $file;
    }

    /**
     * Get selected post types
     *
     * @return mixed|void
     */
    public static function getPostTypes()
    {
        return get_option('wpil_2_post_types', ['post', 'page']);
    }

    /**
     * Get merged array of post types and term types
     *
     * @return array
     */
    public static function getAllTypes()
    {
        return array_merge(self::getPostTypes(), self::getTermTypes());
    }

    /**
     * Get selected post statuses
     *
     * @return array
     */
    public static function getPostStatuses()
    {
        return get_option('wpil_2_post_statuses', ['publish']);
    }

    /**
     * Gets the currently supported languages
     * 
     * @return array
     **/
    public static function getSupportedLanguages(){
        $languages = array(
            'english'       => 'English',
            'spanish'       => 'Español',
            'french'        => 'Français',
            'german'        => 'Deutsch',
            'russian'       => 'Русский',
            'portuguese'    => 'Português',
            'dutch'         => 'Dutch',
            'danish'        => 'Dansk',
            'italian'       => 'Italiano',
            'polish'        => 'Polskie',
        );
        
        return $languages;
    }

    /**
     * Gets the currently selected language
     * 
     * @return array
     **/
    public static function getSelectedLanguage(){
        return get_option('wpil_selected_language', 'english');
    }

    public static function getProcessingBatchSize(){
        $batch_size = (int) get_option('wpil_option_suggestion_batch_size', 300);
        if($batch_size < 10){
            $batch_size = 10;
        }
        return $batch_size;
    }

    /**
     * This function is used handle settting page submission
     *
     * @return  void
     */
    public static function save()
    {
        if (isset($_POST['wpil_save_settings_nonce'])
            && wp_verify_nonce($_POST['wpil_save_settings_nonce'], 'wpil_save_settings')
            && isset($_POST['hidden_action'])
            && $_POST['hidden_action'] == 'wpil_save_settings'
        ) {
            //prepare ignore words to save
            $ignore_words = sanitize_textarea_field(stripslashes(trim($_POST['ignore_words'])));
            if ($_POST['wpil_selected_language'] != 'polish') {
                $ignore_words = preg_split("/\R/", $ignore_words);
            } else {
                $ignore_words = explode("\n", $ignore_words);
            }
            $ignore_words = array_unique($ignore_words);
            $ignore_words = array_filter(array_map('trim', $ignore_words));
            sort($ignore_words);
            $ignore_words = implode(PHP_EOL, $ignore_words);

            //update ignore words
            update_option(WPIL_OPTION_IGNORE_WORDS, $ignore_words);

            if (empty($_POST[WPIL_OPTION_POST_TYPES])) {
                $_POST[WPIL_OPTION_POST_TYPES] = [];
            }

            if (empty($_POST['wpil_2_term_types'])) {
                $_POST['wpil_2_term_types'] = [];
            }

            //save other settings
            $opt_keys = self::$keys;
            foreach($opt_keys as $opt_key) {
                if (array_key_exists($opt_key, $_POST)) {
                    update_option($opt_key, $_POST[$opt_key]);
                }
            }

            wp_redirect(admin_url('admin.php?page=link_whisper_settings&success'));
            exit;
        }
    }

    public static function getSkipSentences()
    {
        return get_option('wpil_skip_sentences') !== false ? get_option('wpil_skip_sentences') : 3;
    }

    /**
     * Check if WPML installed and has at least 2 languages
     *
     * @return bool
     */
    public static function wpml_enabled()
    {
        global $wpdb;

        // if WPML is activated
        if(function_exists('icl_object_id') || class_exists('SitePress')){
            $languages_count = 1;
            $table = $wpdb->get_var("SHOW TABLES LIKE '{$wpdb->prefix}icl_languages'");
            if ($table == $wpdb->prefix . 'icl_languages') {
                $languages_count = $wpdb->get_var("SELECT count(*) FROM {$wpdb->prefix}icl_languages WHERE active = 1");
            } else {
                $languages_count = $wpdb->get_var("SELECT count(*) FROM {$wpdb->term_taxonomy} WHERE taxonomy = 'language'");
            }

            if (!empty($languages_count) && $languages_count > 1) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get checked term types
     *
     * @return array
     */
    public static function getTermTypes()
    {
        return get_option('wpil_2_term_types', []);
    }

    /**
     * Get ignore posts
     *
     * @return array
     */
    public static function getIgnorePosts()
    {
        $posts = [];
        $links = get_option('wpil_ignore_links');
        $links = explode("\n", $links);
        foreach ($links as $link) {
            $post = Wpil_Post::getPostByLink($link);
            if (!empty($post)) {
                $posts[] = $post->type . '_' . $post->id;
            }
        }

        return $posts;
    }

    /**
     * Get ignore posts
     *
     * @return array
     */
    public static function getIgnoreKeywordsPosts()
    {
        $posts = [];
        $links = get_option('wpil_ignore_keywords_posts');
        $links = explode("\n", $links);
        foreach ($links as $link) {
            $post = Wpil_Post::getPostByLink($link);
            if (!empty($post)) {
                $posts[] = $post->type . '_' . $post->id;
            }
        }

        return $posts;
    }

    /**
     * Get ignored orphaned posts
     *
     * @return array
     */
    public static function getIgnoreOrphanedPosts()
    {
        $posts = [];
        $links = get_option('wpil_ignore_orphaned_posts');
        $links = explode("\n", $links);
        foreach ($links as $link) {
            $post = Wpil_Post::getPostByLink($link);
            if (!empty($post)) {
                $posts[] = $post->type . '_' . $post->id;
            }
        }

        return $posts;
    }

    /**
     * Get categories list to be ignored
     *
     * @return array
     */
    public static function getIgnoreCategoriesPosts()
    {
        $posts = [];
        $links = get_option('wpil_ignore_categories', '');
        $links = explode("\n", $links);
        foreach ($links as $link) {
            $category = Wpil_Post::getPostByLink(trim($link));
            if (!empty($category)) {
                $posts = array_merge($posts, Wpil_Post::getCategoryPosts($category->id));
            }
        }

        return $posts;
    }

    /**
     * Gets an array of type specific ids from the url input settings.
     */
    public static function getItemTypeIds($ids = array(), $type = 'post'){
        if($type === 'post'){
            $ids = array_map(function($id){ if(false !== strpos($id, 'post_')){ return substr($id, 5); }else{ return false;} }, $ids);
            $ids = array_filter($ids);
        }else{
            $ids = array_map(function($id){ if(false !== strpos($id, 'term_')){ return substr($id, 5); }else{ return false;} }, $ids);
            $ids = array_filter($ids);
        }

        return $ids;
    }

    //Check if need to show ALL links
    public static function showAllLinks()
    {
        return !empty(get_option('wpil_show_all_links'));
    }

    /**
     * Check if need to show full HTML in suggestions
     *
     * @return bool
     */
    public static function fullHTMLSuggestions()
    {
        return !empty(get_option('wpil_full_html_suggestions'));
    }

    /**
     * Get links that was marked as external
     *
     * @return array
     */
    public static function getMarkedAsExternalLinks()
    {
        $links = get_option('wpil_marked_as_external', '');

        if (!empty($links)) {
            $links = explode("\n", $links);
            foreach ($links as $key => $link) {
                $links[$key] = trim($link);
            }

            return $links;
        }

        return [];
    }
}
