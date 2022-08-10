<?php

/**
 * Themify editor
 *
 * Class Wpil_Editor_Themify
 */
class Wpil_Editor_Themify
{
    public static $keyword_links_count;
    public static $meta_key = '_themify_builder_settings_json';
    public static $post_content;

    /**
     * Get Themify post content
     *
     * @param $post_id
     * @return string
     */
    public static function getContent($post_id)
    {
        self::$post_content = '';
        $content = $post_id;
        self::manageLink($content, [
            'action' => 'get',
        ]);

        return self::$post_content;
    }

    /**
     * Add links
     *
     * @param $meta
     * @param $post_id
     */
    public static function addLinks($meta, $post_id)
    {
        $content = get_post_meta($post_id, self::$meta_key, true);

        if (empty($content)) {
            return;
        }

        $data = json_decode($content);
        foreach ($meta as $link) {
            self::manageLink($data, [
                'action' => 'add',
                'sentence' => $link['sentence'],
                'replacement' => str_replace('"', "'", Wpil_Post::getSentenceWithAnchor($link))
            ]);
        }

        update_post_meta($post_id, self::$meta_key, json_encode($data));
    }

    /**
     * Delete link
     *
     * @param $post_id
     * @param $url
     * @param $anchor
     */
    public static function deleteLink($post_id, $url, $anchor)
    {
        $data = $post_id;
        self::manageLink($data, [
            'action' => 'remove',
            'url' => $url,
            'anchor' => $anchor
        ]);

        update_post_meta($post_id, self::$meta_key, json_encode($data));
    }

    /**
     * Remove keyword links
     *
     * @param $keyword
     * @param $post_id
     * @param bool $left_one
     */
    public static function removeKeywordLinks($keyword, $post_id, $left_one = false)
    {
        self::$keyword_links_count = 0;
        $data = $post_id;
        self::manageLink($data, [
            'action' => 'remove_keyword',
            'keyword' => $keyword,
            'left_one' => $left_one
        ]);

        update_post_meta($post_id, self::$meta_key, json_encode($data));
    }

    /**
     * Replace URLs
     *
     * @param $post
     * @param $url
     */
    public static function replaceURLs($post, $url)
    {
        $data = $post->id;

        self::manageLink($data, [
            'action' => 'replace_urls',
            'url' => $url,
            'post' => $post,
        ]);

        update_post_meta($post->id, self::$meta_key, json_encode($data));
    }

    /**
     * Revert URLs
     *
     * @param $post
     * @param $url
     */
    public static function revertURLs($post, $url)
    {
        $data = $post->id;
        self::manageLink($data, [
            'action' => 'revert_urls',
            'url' => $url,
        ]);

        update_post_meta($post->id, self::$meta_key, json_encode($data));
    }

    /**
     * Find all text elements
     *
     * @param $data
     * @param $params
     */
    public static function manageLink(&$data, $params)
    {
        if (is_numeric($data)) {
            $content = get_post_meta($data, self::$meta_key, true);

            if (empty($content)) {
                return;
            }

            $data = json_decode($content);
        }

        if (is_countable($data)) {
            foreach ($data as $item) {
                self::checkItem($item, $params);
            }
        }
    }

    /**
     * Check certain text element
     *
     * @param $item
     * @param $params
     */
    public static function checkItem(&$item, $params)
    {
        if (!empty($item->mod_settings)) {
            foreach (['content_text', 'text_alert', 'content_box', 'text_callout', 'content_feature', 'plain_text'] as $key) {
                if (!empty($item->mod_settings->$key)) {
                    self::manageBlock($item->mod_settings->$key, $params);
                }
            }

            if (!empty($item->mod_settings->content_accordion)) {
                foreach ($item->mod_settings->content_accordion as $key => $value) {
                    if (!empty($item->mod_settings->content_accordion[$key]->text_accordion)) {
                        self::manageBlock($item->mod_settings->content_accordion[$key]->text_accordion, $params);
                    }
                }
            }

            if (!empty($item->mod_settings->tab_content_testimonial)) {
                foreach ($item->mod_settings->tab_content_testimonial as $key => $value) {
                    if (!empty($item->mod_settings->tab_content_testimonial[$key]->content_testimonial)) {
                        self::manageBlock($item->mod_settings->tab_content_testimonial[$key]->content_testimonial, $params);
                    }
                }
            }

            if (!empty($item->mod_settings->tab_content_tab)) {
                foreach ($item->mod_settings->tab_content_tab as $key => $value) {
                    if (!empty($item->mod_settings->tab_content_tab[$key]->text_tab)) {
                        self::manageBlock($item->mod_settings->tab_content_tab[$key]->text_tab, $params);
                    }
                }
            }
        }

        if (!empty($item->cols)) {
            foreach ($item->cols as $key => $value) {
                self::checkItem($item->cols[$key], $params);
            }
        }

        if (!empty($item->modules)) {
            foreach ($item->modules as $key => $value) {
                self::checkItem($item->modules[$key], $params);
            }
        }
    }

    /**
     * Route current action
     *
     * @param $block
     * @param $params
     */
    public static function manageBlock(&$block, $params)
    {
        if ($params['action'] == 'get') {
            self::$post_content .= $block . "\n";
        } elseif ($params['action'] == 'add') {
            self::addLinkToBlock($block, $params['sentence'], $params['replacement']);
        } elseif ($params['action'] == 'remove') {
            self::removeLinkFromBlock($block, $params['url'], $params['anchor']);
        } elseif ($params['action'] == 'remove_keyword') {
            self::removeKeywordFromBlock($block, $params['keyword'], $params['left_one']);
        } elseif ($params['action'] == 'replace_urls') {
            self::replaceURLInBlock($block, $params['url'], $params['post']);
        } elseif ($params['action'] == 'revert_urls') {
            self::revertURLInBlock($block, $params['url']);
        }
    }

    /**
     * Insert link into block
     *
     * @param $block
     * @param $sentence
     * @param $replacement
     */
    public static function addLinkToBlock(&$block, $sentence, $replacement)
    {
        if (strpos($block, $sentence) !== false) {
            Wpil_Post::insertLink($block, $sentence, $replacement);
        }
    }

    /**
     * Remove link from block
     *
     * @param $block
     * @param $url
     * @param $anchor
     */
    public static function removeLinkFromBlock(&$block, $url, $anchor)
    {
        preg_match('`<a .+?' . preg_quote($url, '`') . '.+?>' . preg_quote($anchor, '`') . '</a>`i', $block,  $matches);
        if (!empty($matches[0])) {
            $block = preg_replace('|<a [^>]+' . preg_quote($url, '`') . '[^>]+>' . preg_quote($anchor, '`') . '</a>|i', $anchor,  $block);
        }
    }

    /**
     * Remove keyword links
     *
     * @param $block
     * @param $keyword
     * @param $left_one
     */
    public static function removeKeywordFromBlock(&$block, $keyword, $left_one)
    {
        $matches = Wpil_Keyword::findKeywordLinks($keyword, $block);
        if (!empty($matches[0])) {
            if (!$left_one || self::$keyword_links_count) {
                Wpil_Keyword::removeAllLinks($keyword, $block);
            }
            if($left_one && self::$keyword_links_count == 0 and count($matches[0]) > 1) {
                Wpil_Keyword::removeNonFirstLinks($keyword, $block);
            }
            self::$keyword_links_count += count($matches[0]);
        }
    }


    /**
     * Replace URL in block
     *
     * @param $block
     * @param $url
     */
    public static function replaceURLInBlock(&$block, $url, $post)
    {
        if (Wpil_URLChanger::hasUrl($block, $url)) {
            Wpil_URLChanger::replaceLink($block, $url, true, $post);
            $block = str_replace('"', "'", $block);
        }
    }

    /**
     * Revert URL in block
     *
     * @param $block
     * @param $url
     */
    public static function revertURLInBlock(&$block, $url)
    {
        preg_match('`data-wpil=\'url\' (href|url)=[\'\"]' . preg_quote($url->new, '`') . '\/*[\'\"]`i', $block, $matches);
        if (!empty($matches)) {
            $block = preg_replace('`data-wpil=\'url\' (href|url)=([\'\"])' . $url->new . '\/*([\'\"])`i', '$1=$2' . $url->old . '$3', $block);
        }
    }
}