<?php

/**
 * Export controller
 */
class Wpil_Export
{

    private static $instance;

    /**
     * gets the instance via lazy initialization (created on first usage)
     */
    public static function getInstance()
    {
        if (null === self::$instance)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Export data
     */
    function export($post)
    {
        $data = self::getExportData($post);
        $data = json_encode($data, JSON_PRETTY_PRINT);
        $host = !empty($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';

        //create filename
        if ($post->type == 'term') {
            $term = get_term($post->id);
            $filename = $post->id . '-' . $host . '-' . $term->slug . '.json';
        } else {
            $post_slug = get_post_field('post_name', $post->id);
            $filename = $post->id . '-' . $host . '-' . $post_slug . '.json';
        }

        //download export file
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        echo $data;
        exit;
    }

    /**
     * Get post data, links and settings for export
     *
     * @param $post_id
     * @return array
     */
    function getExportData($post)
    {
        $thrive_content = get_post_meta($post->id, 'tve_updated_post', true);
        $beaver_content = get_post_meta($post->id, '_fl_builder_data', true);
        $elementor_content = get_post_meta($post->id, '_elementor_data', true);

        set_transient('wpil_transients_enabled', 'true', 600);
        $transient_enabled = (!empty(get_transient('wpil_transients_enabled'))) ? true: false;

        //export settings
        $settings = [];
        foreach (Wpil_Settings::$keys as $key) {
            $settings[$key] = get_option($key, null);
        }
        $settings['ignore_words'] = get_option('wpil_2_ignore_words', null);

        $res = [
            'v' => strip_tags(Wpil_Base::showVersion()),
            'created' => date('c'),
            'post_id' => $post->id,
            'type' => $post->type,
            'url' => $post->getLinks()->view,
            'title' => $post->getTitle(),
            'content' => $post->getContent(),
            'thrive_content' => $thrive_content,
            'beaver_content' => $beaver_content,
            'elementor_content' => $elementor_content,
            'transients_enabled' => $transient_enabled,
            'settings' => $settings
        ];

        // add reporting data to export
        $keys = [
            WPIL_LINKS_OUTBOUND_INTERNAL_COUNT,
            WPIL_LINKS_INBOUND_INTERNAL_COUNT,
            WPIL_LINKS_OUTBOUND_EXTERNAL_COUNT,
        ];

        $report = [];
        foreach($keys as $key) {
            if ($post->type == 'term') {
                $report[$key] = get_term_meta($post->id, $key, true);
                $report[$key.'_data'] = get_term_meta($post->id, $key.'_data', true);
            } else {
                $report[$key] = get_post_meta($post->id, $key, true);
                $report[$key.'_data'] = get_post_meta($post->id, $key.'_data', true);
            }
        }

        $res['report'] = $report;
        $res['phrases'] = Wpil_Suggestion::getPostSuggestions($post, null, true);

        return $res;
    }

    /**
     * Export table data to CSV
     */
    public static function ajax_csv()
    {
        $type = !empty($_POST['type']) ? $_POST['type'] : null;
        $count = !empty($_POST['count']) ? $_POST['count'] : null;

        if (!$type || !$count) {
            wp_send_json([
                    'error' => [
                    'title' => __('Request Error', 'wpil'),
                    'text'  => __('Bad request. Please try again later', 'wpil')
                ]
            ]);
        }

        if ($count == 1) {
            $fp = fopen(WP_INTERNAL_LINKING_PLUGIN_DIR . 'includes/' . $type . '_export.csv', 'w');
            switch ($type) {
                case 'links':
                    $header = "Title,Type,Category,Published,Page - The page we are linking to,Anchor,Source URL - The Page we are linking from\n";
                    break;
                case 'links_summary':
                    $header = "Title,URL,Type,Category,Published,Inbound internal links,Outbound internal links,Outbound external links\n";
                    break;
                case 'domains':
                case 'domains_summary':
                    $header = "Domain,Post,Links\n";
                    break;
                case 'error':
                    $header = "Post,Broken URL,Type,Status,Discovered\n";
                    break;
            }
            fwrite($fp, $header);
        } else {
            $fp = fopen(WP_INTERNAL_LINKING_PLUGIN_DIR . 'includes/' . $type . '_export.csv', 'a');
        }

        //get data
        $data = '';
        $func = 'csv_' . $type;
        if (method_exists('Wpil_export', $func)) {
            $data = self::$func($count);
        }

        //send finish response
        if (empty($data)) {
            wp_send_json([
                'filename' => WP_INTERNAL_LINKING_PLUGIN_URL . 'includes/' . $type . '_export.csv'
            ]);
        }

        //write to file
        fwrite($fp, $data);

        wp_send_json([
            'filename' => '',
            'type' => $type,
            'count' => $count
        ]);

        die;
    }

    /**
     * Prepare links data for export
     *
     * @return string
     */
    public static function csv_links($count)
    {
        $links = Wpil_Report::getData($count, '', 'ASC', '', 500);
        $data = '';
        foreach ($links['data'] as $link) {
            if (!empty($link['post']->getTitle())) {
                $outbound_internal = $link['post']->getOutboundInternalLinks();
                $outbound_external = $link['post']->getOutboundExternalLinks();
                $outbound_links = array_merge($outbound_internal, $outbound_external);

                for ($i = 0; $i < max(count($outbound_links), 1); $i++) {
                    $post = $link['post'];
                    $category = '';
                    if ($post->getRealType() == 'post') {
                        $category_ids = wp_get_post_categories($post->id, ['fields' => 'names']);
                        $category = '"' . addslashes(implode(', ', $category_ids)) . '"';
                    }

                    $item = [
                        !$i ? '"' . addslashes($post->getTitle()) . '"' : '',
                        !$i ? $post->getType() : '',
                        !$i ? '"' . $link['date'] . '"' : '',
                        wp_make_link_relative($post->getLinks()->view),
                        !empty($outbound_links[$i]) ? '"' . addslashes(substr(trim(strip_tags($outbound_links[$i]->anchor)), 0, 100)) . '"' : '',
                        !empty($outbound_links[$i]) ? (
                        Wpil_Link::isInternal($outbound_links[$i]->url) ? wp_make_link_relative($outbound_links[$i]->url) : $outbound_links[$i]->url
                        ) : '',
                    ];
                    $data .= $item[0] . "," . $item[1] . "," . $category . "," . $item[2] . "," . $item[3] . "," . $item[4] . "," . $item[5] . "\n";
                }
            }
        }

        return $data;
    }

    public static function csv_links_summary($count)
    {
        $links = Wpil_Report::getData($count, '', 'ASC', '', 500);
        $data = '';
        foreach ($links['data'] as $link) {
            if (!empty($link['post']->getTitle())) {
                //prepare data
                $post = $link['post'];
                $title = '"' . addslashes($post->getTitle()) . '"';
                $url = wp_make_link_relative($post->getLinks()->view);
                $type = $post->getType();
                $category = '';
                if ($post->getRealType() == 'post') {
                    $category_ids = wp_get_post_categories($post->id, ['fields' => 'names']);
                    $category = '"' . addslashes(implode(', ', $category_ids)) . '"';
                }
                $date = '"' . $link['date'] . '"';
                $ii_count = $post->getInboundInternalLinks(true);
                $oi_count = $post->getOutboundInternalLinks(true);
                $oe_count = $post->getOutboundExternalLinks(true);
                $data .= $title . "," . $url . "," . $type . "," . $category . "," . $date . "," . $ii_count . "," . $oi_count . "," . $oe_count . "\n";
            }
        }

        return $data;
    }

    /**
     * Prepare domains data for export
     *
     * @return string
     */
    public static function csv_domains($count)
    {
        $domains = Wpil_Dashboard::getDomainsData(500, $count, '');
        $data = '';
        foreach ($domains['domains'] as $domain) {
            $max = max(count($domain['posts']), count($domain['links']), 1);
            for ($i=0; $i < $max; $i++) {
                $post = $domain['links'][$i]->post;
                $item = [
                    $domain['host'],
                    !empty($post) ? str_replace('&amp;', '&', $post->getLinks()->edit) : '',
                    !empty($domain['links'][$i]->url) ? $domain['links'][$i]->url : '',
                ];

                $data .= $item[0] . "," . $item[1] . "," . $item[2] . "\n";
            }
        }

        return $data;
    }

    /**
     * Prepare domains summary data for export
     *
     * @param $count
     * @return string
     */
    public static function csv_domains_summary($count)
    {
        $domains = Wpil_Dashboard::getDomainsData(500, $count, '');
        $data = '';
        foreach ($domains['domains'] as $domain) {
            $data .= $domain['host'] . "," . count($domain['posts']) . "," . count($domain['links']) . "\n";
        }

        return $data;
    }

    /**
     * Prepare errors data for export
     *
     * @return string
     */
    public static function csv_error($count)
    {
        $links = Wpil_Error::getData(500, $count);
        $data = '';
        foreach ($links['links'] as $link) {
            $item = [
                '"' . addslashes($link->post_title) . '"',
                $link->url,
                $link->internal ? 'internal' : 'external',
                $link->code . ' ' . Wpil_Error::getCodeMessage($link->code),
                date('d M Y (H:i)', strtotime($link->created))
            ];
            $data .= $item[0] . "," . $item[1] . "," . $item[2] . "," . $item[3] . "," . $item[4] . "\n";
        }

        return $data;
    }
}
