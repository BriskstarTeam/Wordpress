<?php

/**
 * Beaver editor
 *
 * Class Wpil_Editor_Beaver
 */
class Wpil_Editor_Beaver
{
    /**
     * Add links
     *
     * @param $meta
     * @param $post_id
     */
    public static function addLinks($meta, $post_id)
    {
        $beaver = get_post_meta($post_id, '_fl_builder_data', true);

        if (!empty($beaver)) {
            foreach ($meta as $link) {
                //change sentence
                $changed_sentence = Wpil_Post::getSentenceWithAnchor($link);
                $sentence = addslashes(trim($link['sentence']));

                //update beaver post content
                foreach ($beaver as $key => $item) {
                    foreach (['text', 'html'] as $element) {
                        if (!empty($item->settings->$element)) {
                            if (strpos($item->settings->$element, $sentence) !== false) {
                                Wpil_Post::insertLink($beaver[$key]->settings->$element, $sentence, $changed_sentence);
                            }
                        }
                    }
                }
            }

            update_post_meta($post_id, '_fl_builder_data', $beaver);
            update_post_meta($post_id, '_fl_builder_draft', $beaver);
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
        $beaver = get_post_meta($post_id, '_fl_builder_data', true);

        if (!empty($beaver)) {
            foreach ($beaver as $key => $item) {
                foreach (['text', 'html'] as $element) {
                    if (!empty($item->settings->$element)) {
                        preg_match('|<a .+'.$url.'.+>'.$anchor.'</a>|i', $item->settings->$element,  $matches);
                        if (!empty($matches[0])) {
                            $beaver[$key]->settings->$element = preg_replace('|<a [^>]+'.$url.'[^>]+>'.$anchor.'</a>|i', $anchor,  $beaver[$key]->settings->$element);
                        }
                    }
                }
            }

            update_post_meta($post_id, '_fl_builder_data', $beaver);
            update_post_meta($post_id, '_fl_builder_draft', $beaver);
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
        $beaver = get_post_meta($post_id, '_fl_builder_data', true);

        if (!empty($beaver)) {
            $links_count = 0;
            foreach ($beaver as $key => $item) {
                foreach (['text', 'html'] as $element) {
                    if (!empty($item->settings->$element)) {
                        $matches = Wpil_Keyword::findKeywordLinks($keyword, $item->settings->$element);
                        if (!empty($matches[0])) {
                            if (!$left_one || $links_count) {
                                Wpil_Keyword::removeAllLinks($keyword, $beaver[$key]->settings->$element);
                            }
                            if($left_one && $links_count == 0 and count($matches[0]) > 1) {
                                Wpil_Keyword::removeNonFirstLinks($keyword, $beaver[$key]->settings->$element);
                            }
                            $links_count += count($matches[0]);
                        }
                    }
                }
            }

            update_post_meta($post_id, '_fl_builder_data', $beaver);
            update_post_meta($post_id, '_fl_builder_draft', $beaver);
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
        $beaver = get_post_meta($post->id, '_fl_builder_data', true);
        if (!empty($beaver)) {
            foreach ($beaver as $key => $item) {
                foreach (['text', 'html'] as $element) {
                    if (!empty($item->settings->$element)) {
                        if (Wpil_URLChanger::hasUrl($item->settings->$element, $url)) {
                            Wpil_URLChanger::replaceLink($item->settings->$element, $url);
                        }
                    }
                }
            }

            update_post_meta($post->id, '_fl_builder_data', $beaver);
            update_post_meta($post->id, '_fl_builder_draft', $beaver);
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
        $beaver = get_post_meta($post->id, '_fl_builder_data', true);
        if (!empty($beaver)) {
            foreach ($beaver as $key => $item) {
                foreach (['text', 'html'] as $element) {
                    if (!empty($item->settings->$element)) {
                        preg_match('`data-wpil=\"url\" (href|url)=[\'\"]' . preg_quote($url->new, '`') . '\/*[\'\"]`i', $item->settings->$element, $matches);
                        if (!empty($matches)) {
                            Wpil_URLChanger::revertURL($item->settings->$element, $url);
                        }
                    }
                }
            }

            update_post_meta($post->id, '_fl_builder_data', $beaver);
            update_post_meta($post->id, '_fl_builder_draft', $beaver);
        }
    }
}
