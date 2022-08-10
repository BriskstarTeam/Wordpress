<?php

/**
 * PageBuilder by Site Origin editor
 *
 * Class Wpil_Editor_Origin
 */
class Wpil_Editor_Origin
{
    /**
     * Add links
     *
     * @param $meta
     * @param $post_id
     */
    public static function addLinks($meta, $post_id)
    {
        $data = get_post_meta($post_id, 'panels_data', true);

        if (!empty($data['widgets'])) {
            foreach ($meta as $link) {
                foreach($data['widgets'] as $key => $widget) {
                    if (!empty($widget['text']) && strpos($widget['text'], $link['sentence']) !== false) {
                        $changed_sentence = Wpil_Post::getSentenceWithAnchor($link);
                        $changed_sentence = str_replace('"', "'", $changed_sentence);
                        Wpil_Post::insertLink($data['widgets'][$key]['text'], $link['sentence'], $changed_sentence);
                    }
                }
            }

            update_post_meta($post_id, 'panels_data', $data);
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
        $data = get_post_meta($post_id, 'panels_data', true);

        if (!empty($data['widgets'])) {
            foreach($data['widgets'] as $key => $widget) {
                if (!empty($widget['text'])) {
                    preg_match('|<a .+'.$url.'.+>'.$anchor.'</a>|i', $widget['text'],  $matches);
                    if (!empty($matches[0])) {
                        $data['widgets'][$key]['text'] = preg_replace('|<a [^>]+'.$url.'[^>]+>'.$anchor.'</a>|i', $anchor,  $widget['text']);
                    }
                }
            }

            update_post_meta($post_id, 'panels_data', $data);
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
        $data = get_post_meta($post_id, 'panels_data', true);

        if (!empty($data['widgets'])) {
            $links_count = 0;
            foreach($data['widgets'] as $key => $widget) {
                if (!empty($widget['text'])) {
                    $matches = Wpil_Keyword::findKeywordLinks($keyword, $widget['text']);
                    if (!empty($matches[0])) {
                        if (!$left_one || $links_count) {
                            Wpil_Keyword::removeAllLinks($keyword, $data['widgets'][$key]['text']);
                        }
                        if($left_one && $links_count == 0 and count($matches[0]) > 1) {
                            Wpil_Keyword::removeNonFirstLinks($keyword, $data['widgets'][$key]['text']);
                        }
                        $links_count += count($matches[0]);
                    }
                }
            }

            update_post_meta($post_id, 'panels_data', $data);
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
        $data = get_post_meta($post->id, 'panels_data', true);

        if (!empty($data['widgets'])) {
            foreach($data['widgets'] as $key => $widget) {
                if (!empty($widget['text']) && Wpil_URLChanger::hasUrl($widget['text'], $url)) {
                    Wpil_URLChanger::replaceLink($data['widgets'][$key]['text'], $url);
                }
            }

            update_post_meta($post->id, 'panels_data', $data);
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
        $data = get_post_meta($post->id, 'panels_data', true);

        if (!empty($data['widgets'])) {
            foreach($data['widgets'] as $key => $widget) {
                if (!empty($widget['text'])) {
                    preg_match('`data-wpil=\"url\" (href|url)=[\'\"]' . preg_quote($url->new, '`') . '\/*[\'\"]`i', $widget['text'], $matches);
                    if (!empty($matches)) {
                        Wpil_URLChanger::revertURL($data['widgets'][$key]['text'], $url);
                    }
                }
            }

            update_post_meta($post->id, 'panels_data', $data);
        }
    }
}