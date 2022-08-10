<?php

/**
 * Elementor editor
 *
 * Class Wpil_Editor_Elementor
 */
class Wpil_Editor_Elementor
{
    public static $link_processed;
    public static $keyword_links_count;

    /**
     * Add links
     *
     * @param $meta
     * @param $post_id
     */
    public static function addLinks($meta, $post_id)
    {
        $elementor = get_post_meta($post_id, '_elementor_data', true);

        if (!empty($elementor)) {
            $elementor = json_decode($elementor);
            foreach ($meta as $link) {
                self::manageLink($elementor, [
                    'action' => 'add',
                    'sentence' => Wpil_Word::replaceUnicodeCharacters($link['sentence']),
                    'replacement' => Wpil_Post::getSentenceWithAnchor($link)
                ]);
            }
            $elementor = addslashes(json_encode($elementor));
            update_post_meta($post_id, '_elementor_data', $elementor);
        }
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
        $elementor = get_post_meta($post_id, '_elementor_data', true);

        if (!empty($elementor)) {
            $elementor = json_decode($elementor);
            self::manageLink($elementor, [
                'action' => 'remove',
                'url' => Wpil_Word::replaceUnicodeCharacters($url),
                'anchor' => Wpil_Word::replaceUnicodeCharacters($anchor)
            ]);
            $elementor = addslashes(json_encode($elementor));
            update_post_meta($post_id, '_elementor_data', $elementor);
        }
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
        $elementor = get_post_meta($post_id, '_elementor_data', true);

        if (!empty($elementor)) {
            $elementor = json_decode($elementor);
            $keyword->link = Wpil_Word::replaceUnicodeCharacters($keyword->link);
            $keyword->keyword = Wpil_Word::replaceUnicodeCharacters($keyword->keyword);
            self::$keyword_links_count = 0;
            self::manageLink($elementor, [
                'action' => 'remove_keyword',
                'keyword' => $keyword,
                'left_one' => $left_one
            ]);

            $elementor = addslashes(json_encode($elementor));
            update_post_meta($post_id, '_elementor_data', $elementor);
        }
    }

    /**
     * Replace URLs
     *
     * @param $post
     * @param $url
     */
    public static function replaceURLs($post, $url)
    {
        $elementor = get_post_meta($post->id, '_elementor_data', true);

        if (!empty($elementor)) {
            $elementor = json_decode($elementor);
            $url->old = Wpil_Word::replaceUnicodeCharacters($url->old);
            $url->new = Wpil_Word::replaceUnicodeCharacters($url->new);
            self::manageLink($elementor, [
                'action' => 'replace_urls',
                'url' => $url,
            ]);

            $elementor = addslashes(json_encode($elementor));
            update_post_meta($post->id, '_elementor_data', $elementor);
        }
    }

    /**
     * Revert URLs
     *
     * @param $post
     * @param $url
     */
    public static function revertURLs($post, $url)
    {
        $elementor = get_post_meta($post->id, '_elementor_data', true);

        if (!empty($elementor)) {
            $elementor = json_decode($elementor);
            $url->old = Wpil_Word::replaceUnicodeCharacters($url->old);
            $url->new = Wpil_Word::replaceUnicodeCharacters($url->new);
            self::manageLink($elementor, [
                'action' => 'revert_urls',
                'url' => $url,
            ]);

            $elementor = addslashes(json_encode($elementor));
            update_post_meta($post->id, '_elementor_data', $elementor);
        }
    }

    /**
     * Find all text elements
     *
     * @param $data
     * @param $params
     */
    public static function manageLink(&$data, $params)
    {
        self::$link_processed = false;
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
        if (!empty($item->widgetType) && !in_array($item->widgetType, ['heading', 'button'])) {
            if (!empty($item->settings->icon_list)) {
                foreach ($item->settings->icon_list as $key => $icon) {
                    self::manageBlock($item->settings->icon_list[$key]->text, $params);
                }
            }

            if (!empty($item->settings->tabs)) {
                foreach ($item->settings->tabs as $key => $tab) {
                    self::manageBlock($item->settings->tabs[$key]->tab_content, $params);
                }
            }

            foreach (['editor', 'title', 'caption', 'text', 'description_text', 'testimonial_content', 'html', 'alert_title', 'alert_description'] as $key) {
                if (!empty($item->settings->$key)) {
                    self::manageBlock($item->settings->$key, $params);
                }
            }
        }

        if (!empty($item->elements)) {
            foreach ($item->elements as $element) {
                if (!self::$link_processed) {
                    self::checkItem($element, $params);
                }
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
        if ($params['action'] == 'add') {
            self::addLinkToBlock($block, $params['sentence'], $params['replacement']);
        } elseif ($params['action'] == 'remove') {
            self::removeLinkFromBlock($block, $params['url'], $params['anchor']);
        } elseif ($params['action'] == 'remove_keyword') {
            self::removeKeywordFromBlock($block, $params['keyword'], $params['left_one']);
        } elseif ($params['action'] == 'replace_urls') {
            self::replaceURLInBlock($block, $params['url']);
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
        $block_unicode = Wpil_Word::replaceUnicodeCharacters($block);
        if (strpos($block_unicode, $sentence) !== false) {
            $block = $block_unicode;
            Wpil_Post::insertLink($block, $sentence, $replacement);
            $block = Wpil_Word::replaceUnicodeCharacters($block, true);
            self::$link_processed = true;
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
        $block_unicode = Wpil_Word::replaceUnicodeCharacters($block);
        preg_match('`<a .+?' . preg_quote($url, '`') . '.+?>' . preg_quote($anchor, '`') . '</a>`i', $block_unicode,  $matches);
        if (!empty($matches[0])) {
            $block = $block_unicode;
            $block = preg_replace('|<a [^>]+' . preg_quote($url, '`') . '[^>]+>' . preg_quote($anchor, '`') . '</a>|i', $anchor,  $block);
            $block = Wpil_Word::replaceUnicodeCharacters($block, true);
            self::$link_processed = true;
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
        $block_unicode = Wpil_Word::replaceUnicodeCharacters($block);
        $matches = Wpil_Keyword::findKeywordLinks($keyword, $block_unicode);
        if (!empty($matches[0])) {
            $block = $block_unicode;
            if (!$left_one || self::$keyword_links_count) {
                Wpil_Keyword::removeAllLinks($keyword, $block);
            }
            if($left_one && self::$keyword_links_count == 0 and count($matches[0]) > 1) {
                Wpil_Keyword::removeNonFirstLinks($keyword, $block);
            }
            self::$keyword_links_count += count($matches[0]);
            $block = Wpil_Word::replaceUnicodeCharacters($block, true);
        }
    }


    /**
     * Replace URL in block
     *
     * @param $block
     * @param $url
     */
    public static function replaceURLInBlock(&$block, $url)
    {
        $block_unicode = Wpil_Word::replaceUnicodeCharacters($block);

        if (Wpil_URLChanger::hasUrl($block_unicode, $url)) {
            $block = $block_unicode;
            Wpil_URLChanger::replaceLink($block, $url);
            $block = Wpil_Word::replaceUnicodeCharacters($block, true);
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
        $block_unicode = Wpil_Word::replaceUnicodeCharacters($block);

        preg_match('`data\\\u2013wpil=\"url\" (href|url)=[\'\"]' . preg_quote($url->new, '`') . '\/*[\'\"]`i', $block_unicode, $matches);
        if (!empty($matches)) {
            $block = $block_unicode;
            $block = preg_replace('`data\\\u2013wpil=\"url\" (href|url)=([\'\"])' . $url->new . '\/*([\'\"])`i', '$1=$2' . $url->old . '$3', $block);
            $block = Wpil_Word::replaceUnicodeCharacters($block, true);
        }
    }
}