<?php

/**
 * Work with table filters
 */
class Wpil_Filter
{
    /**
     * Get links location filter
     *
     * @return bool|string
     */
    public static function linksLocation()
    {
        if (!empty($_GET['location'])) {
            return sanitize_text_field($_GET['location']);
        }

        return false;
    }

    /**
     * Get links category filter
     *
     * @return bool|int
     */
    public static function linksCategory()
    {
        if (!empty($_GET['category'])) {
            return (int)$_GET['category'];
        }

        return false;
    }

    /**
     * Get links post type filter
     *
     * @return bool|string
     */
    public static function linksPostType()
    {
        if (!empty($_GET['post_type'])) {
            return sanitize_text_field($_GET['post_type']);
        }

        return false;
    }

    /**
     * Get post IDs by links location filter
     *
     * @return array
     */
    public static function getLinksLocationIDs()
    {
        global $wpdb;
        $ids = [];
        $location = self::linksLocation();
        if ($location) {
            $result = $wpdb->get_results("SELECT DISTINCT post_id FROM {$wpdb->postmeta} WHERE meta_key IN ('wpil_links_inbound_internal_count_data', 'wpil_links_outbound_internal_count_data', 'wpil_links_outbound_external_count_data') AND  meta_value LIKE '%\"$location\"%'");
            foreach ($result as $r) {
                $ids[] = $r->post_id;
            }
        }

        return $ids;
    }

    /**
     * Get post IDs by links category filter
     *
     * @return array
     */
    public static function getLinksCatgeoryIDs()
    {
        $category = self::linksCategory();
        if ($category) {
            $category_id = (int)$_GET['category'];
            return Wpil_Post::getCategoryPosts($category_id);
        }

        return [];
    }

    /**
     * Filter query by error codes
     *
     * @return string
     */
    public static function errorCodes()
    {
        if (!empty($_GET['codes'])) {
            return " AND code IN ({$_GET['codes']}) ";
        } else {
            return " AND code IN (6,7,28,404,451,500,503,925) ";
        }
    }
}
