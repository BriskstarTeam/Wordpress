<?php

/**
 * Model for posts and terms
 *
 * Class Wpil_Model_Post
 */
class Wpil_Model_Post
{
    public $id;
    public $title;
    public $type;
    public $status;
    public $content;
    public $links;
    public $slug = null;

    public function __construct($id, $type = 'post')
    {
        $this->id = $id;
        $this->type = $type;
    }

    function getTitle()
    {
        if (empty($this->title)) {
            if ($this->type == 'term') {
                $term = get_term($this->id);
                if (!empty($term) && !isset($term->errors)) {
                    $this->title = $term->name;
                }
                unset($term);
            } elseif ($this->type == 'post') {
                $this->title = get_the_title($this->id);
            }
        }

        return $this->title;
    }

    function getLinks()
    {
        if (empty($this->links)) {
            if ($this->type == 'term') {
                $term = get_term($this->id);
                if (!empty($term) && !isset($term->errors)) {
                    $this->links = (object)[
                        'view' => get_term_link($term),
                        'edit' => esc_url(admin_url('term.php?taxonomy=' . $term->taxonomy . '&post_type=post&tag_ID=' . $this->id)),
                        'export' => esc_url(admin_url("post.php?area=wpil_export&term_id=" . $this->id)),
                        'excel_export' => esc_url(admin_url("post.php?area=wpil_excel_export&term_id=" . $this->id)),
                        'refresh' => esc_url(admin_url("admin.php?page=link_whisper&type=post_links_count_update&term_id=" . $this->id))
                    ];
                }
                unset($term);
            } elseif ($this->type == 'post') {
                $this->links = (object)[
                    'view' => get_the_permalink($this->id),
                    'edit' => get_edit_post_link($this->id),
                    'export' => esc_url(admin_url("post.php?area=wpil_export&post_id=" . $this->id)),
                    'excel_export' => esc_url(admin_url("post.php?area=wpil_excel_export&post_id=" . $this->id)),
                    'refresh' => esc_url(admin_url("admin.php?page=link_whisper&type=post_links_count_update&post_id=" . $this->id)),
                ];
            }
        }

        if (empty($this->links)) {
            $this->links = (object)[
                'view' => '',
                'edit' => '',
                'export' => '',
                'excel_export' => '',
                'refresh' => '',
            ];
        }

        return $this->links;
    }

    /**
     * Update post content
     *
     * @param $content
     * @return $this
     */
    function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get post content depends on post type
     *
     * @return string
     */
    function getContent()
    {
        if (empty($this->content)) {
            if ($this->type == 'term') {
                $content = term_description($this->id);
            } else {
                $content = '';
                // if the Thrive plugin is active
                if(defined('TVE_PLUGIN_FILE') || defined('TVE_EDITOR_URL')){
                    $thrive_active = get_post_meta($this->id, 'tcb_editor_enabled', true);
                    if(!empty($thrive_active)){
                        $thrive_content = get_post_meta($this->id, 'tve_updated_post', true);
                        if($thrive_content){
                            $content = $thrive_content;
                        }
                    }
                    
                    if(get_post_meta($this->id, 'tve_landing_set', true) && $thrive_template = get_post_meta($this->id, 'tve_landing_page', true)){
                        $content = get_post_meta($this->id, 'tve_updated_post_' . $thrive_template, true);
                    }
                }

                // if there's no content and the muffin builder is active
                if(empty($content) && defined('MFN_THEME_VERSION')){
                    // try getting the Muffin content
                    $content = Wpil_Editor_Muffin::getContent($this->id);
                }

                if(empty($content)){
                    $item = get_post($this->id);
                    $content = $item->post_content;
                    $content .= $this->getAdvancedCustomFields();
                    $content .= $this->getThemifyContent();
                    $content .= Wpil_Editor_Oxygen::getContent($this->id);
                }
            }

            //Remove WPRM plugin content
            $content = preg_replace('#(?<=<!--WPRM Recipe)(.*?)(?=<!--End WPRM Recipe-->)#ms', '', $content);

            $this->content = $content;
        }

        return $this->content;
    }

    /**
     * Get updated post content
     *
     * @return string
     */
    function getFreshContent()
    {
        wp_cache_delete($this->id, 'posts');
        wp_cache_delete($this->id, 'terms');
        $this->content = null;
        return $this->getContent();
    }

    /**
     * Get not modified post content
     *
     * @return string
     */
    function getCleanContent()
    {
        if ($this->type == 'term') {
            wp_cache_delete($this->id, 'terms');
            $term = get_term($this->id);
            $content = $term->description;
        } else {
            wp_cache_delete($this->id, 'posts');
            $p = get_post($this->id);
            $content = $p->post_content;
        }

        return $content;
    }

    /**
     * Get post slug depends on post type
     *
     * @return string|null
     */
    function getSlug()
    {
        if (empty($this->slug)) {
            if ($this->type == 'term') {
                $term = get_term($this->id);
                $this->slug = $term->slug;
            } else {
                $post = get_post($this->id);
                $this->slug = $post->post_name;
            }
        }

        return $this->slug;
    }

    /**
     * Get post content from advanced custom fields
     *
     * @return string
     */
    function getAdvancedCustomFields()
    {
        $content = '';

        if(!class_exists('ACF') || get_option('wpil_disable_acf', false)){
            return $content;
        }

        foreach (Wpil_Post::getAdvancedCustomFieldsList($this->id) as $field) {
            if ($c = get_post_meta($this->id, $field, true)) {
                $content .= "\n" . $c;
            }
        }

        return $content;
    }

    /**
     * Get post type
     */
    function getType()
    {
        $type = 'Post';
        if ($this->type == 'term') {
            $type = 'Category';
            $term = get_term($this->id);
            if ($term->taxonomy == 'post_tag') {
                $type = 'Tag';
            }
        } elseif ($this->type == 'post') {
            $item = get_post($this->id);
            $type = ucfirst($item->post_type);
        }

        return $type;
    }

    /**
     * Get real post type
     *
     * @return string
     */
    function getRealType()
    {
        $type = '';
        if ($this->type == 'term') {
            $term = get_term($this->id);
            $type = !empty($term->taxonomy) ? $term->taxonomy : '';
        } elseif ($this->type == 'post') {
            $item = get_post($this->id);
            $type = !empty($item->post_type) ? $item->post_type : '';
        }

        return $type;
    }

    /**
     * Get post status
     *
     * @return string
     */
    function getStatus()
    {
        if (empty($this->status)) {
            $this->status = 'publish';
            if ($this->type == 'post') {
                $item = get_post($this->id);
                $this->status = $item->post_status;
            }
        }

        return $this->status;
    }

    /**
     * Update post content
     *
     * @param $content
     */
    function updateContent($content)
    {
        global $wpdb;

        if ($this->type == 'term') {
            $updated = $wpdb->update($wpdb->term_taxonomy, ['description' => $content], ['term_id' => $this->id]);
        } else {
            $updated = $wpdb->update($wpdb->posts, ['post_content' => $content], ['ID' => $this->id]);
        }

        return $updated;
    }

    /**
     * Get Inbound Internal Links list
     *
     * @return array
     */
    function getInboundInternalLinks($count = false)
    {
        return $this->getLinksData('wpil_links_inbound_internal_count', $count);
    }

    /**
     * Get Outbound Internal Links list
     *
     * @return array
     */
    function getOutboundInternalLinks($count = false)
    {
        return $this->getLinksData('wpil_links_outbound_internal_count', $count);
    }

    /**
     * Get Outbound External Links list
     *
     * @return array
     */
    function getOutboundExternalLinks($count = false)
    {
        return $this->getLinksData('wpil_links_outbound_external_count', $count);
    }

    /**
     * Get Post Links list
     *
     * @return array|int
     */
    function getLinksData($key, $count)
    {
        if (!$count) {
            $key .= '_data';
        }

        if ($this->type == 'term') {
            $links = get_term_meta($this->id, $key, $single = true);
        } else {
            $links =  get_post_meta($this->id, $key, $single = true);
        }

        if (empty($links)) {
            $links = $count ? 0 : [];
        }

        return $links;
    }

    /**
     * Get Themify Builder content
     *
     * @return string
     */
    function getThemifyContent()
    {
        $content = '';
        $item = get_post($this->id);

        if (strpos($item->post_content, 'wp:themify-builder') !== false) {
            $content = Wpil_Editor_Themify::getContent($this->id);
        }

        return $content;
    }

    /**
     * Check if post status is checked in the settings page
     *
     * @return bool
     */
    function statusApproved()
    {
        if (in_array($this->getStatus(), Wpil_Settings::getPostStatuses())) {
            return true;
        }

        return false;
    }
}
