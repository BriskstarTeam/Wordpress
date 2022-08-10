<?php

/**
 * Work with terms
 */
class Wpil_Term
{
    /**
     * Register services
     */
    public function register()
    {
        foreach (Wpil_Settings::getTermTypes() as $term) {
            add_action($term . '_add_form_fields', [$this, 'showTermSuggestions']);
            add_action($term . '_edit_form', [$this, 'showTermSuggestions']);
            add_action('edited_' . $term, [$this, 'addLinksToTerm']);
        }
    }

    /**
     * Show suggestions on term page
     */
    public static function showTermSuggestions()
    {
        if(empty($_GET['tag_ID']) ||empty($_GET['taxonomy'] || !in_array($_GET['taxonomy'], Wpil_Settings::getTermTypes()))){
            return;
        }

        $term_id = (int)$_GET['tag_ID'];
        $post_id = 0;
        $user = wp_get_current_user();
        include WP_INTERNAL_LINKING_PLUGIN_DIR . '/templates/link_list_v2.php';
    }

    /**
     * Add links to term description on term update
     *
     * @param $term_id
     */
    public static function addLinksToTerm($term_id)
    {
        global $wpdb;

        //get links
        $meta = get_term_meta($term_id,'wpil_links', true);

        if (!empty($meta)) {
            $description = term_description($term_id);

            //add links to the term description
            foreach ($meta as $link) {
                $changed_sentence = Wpil_Post::getSentenceWithAnchor($link);
                $description = preg_replace('/' . preg_quote($link['sentence'], '/') . '/i', $changed_sentence, $description, 1);
            }

            //delete links from DB
            delete_term_meta($term_id,'wpil_links');

            //update term description
            $wpdb->query($wpdb->prepare("UPDATE {$wpdb->prefix}term_taxonomy SET description = %s WHERE term_id = {$term_id} AND description != ''", $description));

            if(WPIL_STATUS_LINK_TABLE_EXISTS){
                //update the link table
                $term = new Wpil_Model_Post($term_id, 'term');
                Wpil_Report::update_post_in_link_table($term->setContent($description));
            }
        }

        if (empty(get_option('wpil_post_procession'))) {
            $term = new Wpil_Model_Post($term_id, 'term');
            Wpil_Keyword::addKeywordsToPost($term);
            Wpil_URLChanger::replacePostURLs($term);
        }
    }

    /**
     * Get category or tag by slug
     *
     * @param $slug
     * @return WP_Term
     */
    public static function getTermBySlug($slug)
    {
        $term = get_term_by('slug', $slug, 'category');
        if (!$term) {
            $term = get_term_by('slug', $slug, 'post_tag');
        }

        return $term;
    }

    /**
     * Gets all category terms for all active post types
     * 
     * @return array 
     **/
    public static function getAllCategoryTerms(){
        $post_types = Wpil_Settings::getPostTypes();
        if(empty($post_types)){
            return false;
        }

        $skip_terms = array(
            'product_type',
            'product_visibility',
            'product_shipping_class',
        );

        $terms = array();
        foreach($post_types as $type){

            $taxonomies = get_object_taxonomies($type);

            foreach($taxonomies as $taxonomy){
                if(in_array($taxonomy, $skip_terms)){
                    continue;
                }

                $args = array(
                    'taxonomy' => $taxonomy,
                    'hide_empty' => false
                );
                $term = get_terms($args);

                if(!is_a($term, 'WP_Error')){
                    $terms[] = $term;
                }
            }
        }

        return $terms;
    }
}
