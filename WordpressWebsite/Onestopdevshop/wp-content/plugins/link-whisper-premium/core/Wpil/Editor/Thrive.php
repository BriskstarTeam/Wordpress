<?php

/**
 * Thrive editor
 *
 * Class Wpil_Editor_Thrive
 */
class Wpil_Editor_Thrive
{
    /**
     * Add links
     *
     * @param $meta
     * @param $post_id
     */
    public static function addLinks($meta, $post_id)
    {
        $thrive = get_post_meta($post_id, 'tve_updated_post', true);

        if (!empty($thrive)) {
            $thrive_before = get_post_meta($post_id, 'tve_content_before_more', true);
            foreach ($meta as $link) {
                $changed_sentence = Wpil_Post::getSentenceWithAnchor($link);
                if (strpos($thrive, $link['sentence']) === false) {
                    $link['sentence'] = addslashes($link['sentence']);
                }
                Wpil_Post::insertLink($thrive_before, $link['sentence'], $changed_sentence);
                Wpil_Post::insertLink($thrive, $link['sentence'], $changed_sentence);
            }

            update_post_meta($post_id, 'tve_updated_post', $thrive);
            update_post_meta($post_id, 'tve_content_before_more', $thrive_before);
        }

        $template = get_post_meta($post_id, 'tve_landing_page', true);
        // if the post has the Thrive Template active
        if($template){
            $thrive = get_post_meta($post_id, 'tve_updated_post_' . $template, true);

            if($thrive){
                $thrive_before = get_post_meta($post_id, 'tve_content_before_more_', true);
                foreach ($meta as $link) {
                $changed_sentence = Wpil_Post::getSentenceWithAnchor($link);
                    if (strpos($thrive, $link['sentence']) === false) {
                        $link['sentence'] = addslashes($link['sentence']);
                    }
                    Wpil_Post::insertLink($thrive_before, $link['sentence'], $changed_sentence);
                    Wpil_Post::insertLink($thrive, $link['sentence'], $changed_sentence);
                }

                update_post_meta($post_id, 'tve_updated_post_' . $template, $thrive);
                update_post_meta($post_id, 'tve_content_before_more_', $thrive_before);
            }
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
        $thrive = get_post_meta($post_id, 'tve_updated_post', true);

        if (!empty($thrive)) {
            $thrive_before = get_post_meta($post_id, 'tve_content_before_more', true);

            preg_match('|<a .+'.$url.'.+>'.$anchor.'</a>|i', $thrive,  $matches);
            if (!empty($matches[0])) {
                $url = addslashes($url);
                $anchor = addslashes($anchor);
            }

            $thrive_before = preg_replace('|<a [^>]+'.$url.'[^>]+>'.$anchor.'</a>|i', $anchor,  $thrive_before);
            $thrive = preg_replace('|<a [^>]+'.$url.'[^>]+>'.$anchor.'</a>|i', $anchor,  $thrive);

            update_post_meta($post_id, 'tve_updated_post', $thrive);
            update_post_meta($post_id, 'tve_content_before_more', $thrive_before);
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
        $thrive = get_post_meta($post_id, 'tve_updated_post', true);

        if (!empty($thrive)) {
            $thrive_before = get_post_meta($post_id, 'tve_content_before_more', true);
            $matches = Wpil_Keyword::findKeywordLinks($keyword, $thrive);
            if (!empty($matches[0])) {
                $keyword->link = addslashes($keyword->link);
                $keyword->keyword = addslashes($keyword->keyword);
            }

            if ($left_one) {
                Wpil_Keyword::removeNonFirstLinks($keyword, $thrive_before);
                Wpil_Keyword::removeNonFirstLinks($keyword, $thrive);
            } else {
                Wpil_Keyword::removeAllLinks($keyword, $thrive_before);
                Wpil_Keyword::removeAllLinks($keyword, $thrive);
            }

            update_post_meta($post_id, 'tve_updated_post', $thrive);
            update_post_meta($post_id, 'tve_content_before_more', $thrive_before);
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
        $thrive = get_post_meta($post->id, 'tve_updated_post', true);

        if (!empty($thrive)) {
            $thrive_before = get_post_meta($post->id, 'tve_content_before_more', true);
            Wpil_URLChanger::replaceLink($thrive, $url);
            Wpil_URLChanger::replaceLink($thrive_before, $url);

            update_post_meta($post->id, 'tve_updated_post', $thrive);
            update_post_meta($post->id, 'tve_content_before_more', $thrive_before);
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
        $thrive = get_post_meta($post->id, 'tve_updated_post', true);

        if (!empty($thrive)) {
            $thrive_before = get_post_meta($post->id, 'tve_content_before_more', true);
            Wpil_URLChanger::revertURL($thrive, $url);
            Wpil_URLChanger::revertURL($thrive_before, $url);

            update_post_meta($post->id, 'tve_updated_post', $thrive);
            update_post_meta($post->id, 'tve_content_before_more', $thrive_before);
        }
    }
}
