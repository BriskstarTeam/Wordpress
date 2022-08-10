<table class="wp-list-table widefat fixed striped posts tbl_keywords_x js-table wpil-outbound-links best_keywords inbound" id="tbl_keywords">
    <?php   $options = get_user_meta(get_current_user_id(), 'report_options', true); 
            $show_date = (!empty($options['show_date']) && $options['show_date'] == 'on') ? true : false;
            $taxonomies = Wpil_Settings::getTermTypes();
    ?>
    <?php if (!empty($groups)) : ?>
        <thead>
        <tr>
            <th class="inbound-check-all-col"><input type="checkbox" id="select_all"><b style="margin: 0 0 0 5px;">Check All</b></th>
            <th><b>Phrase</b></th>
            <th><b>Post</b></th>
            <?php if($show_date){
                echo '<th class="date-published-col"><b>' . __('Date Published', 'wpil') . '</b></th>';
            } ?>
        </tr>
        </thead>
        <tbody id="the-list">
        <?php foreach ($groups as $post_id => $group) : $phrase = $group[0]; ?>
            <tr data-wpil-sentence-id="<?=esc_attr($post_id)?>">
                <td class="inbound-checkbox" data-colname="<?php _e('Check Link', 'wpil'); ?>">
                    <input type="checkbox" name="link_keywords[]" class="chk-keywords" wpil-link-new="">
                </td>
                <td class="sentences" data-colname="<?php _e('Phrase', 'wpil'); ?>">
                    <?php if (count($group) > 1) : ?>
                        <div class="wpil-collapsible-wrapper">
                            <div class="wpil-collapsible wpil-collapsible-static wpil-links-count">
                                <div class="sentence" data-id="<?=esc_attr($post_id)?>" data-type="<?=esc_attr($phrase->suggestions[0]->post->type)?>">
                                    <div class="wpil_edit_sentence_form">
                                        <textarea class="wpil_content"><?=$phrase->suggestions[0]->sentence_src_with_anchor?></textarea>
                                        <span class="button-primary">Save</span>
                                        <span class="button-secondary">Cancel</span>
                                    </div>
                                    <span class="wpil_sentence_with_anchor"><?=$phrase->suggestions[0]->sentence_with_anchor?></span>
                                    <span class="wpil_edit_sentence link-form-button">| <a href="javascript:void(0)">Edit Sentence</a></span>
                                    <?=!empty(Wpil_Suggestion::$undeletable)?' ('.esc_attr($phrase->suggestions[0]->anchor_score).')':''?>
                                    <input type="hidden" name="sentence" value="<?=base64_encode($phrase->sentence_src)?>">
                                    <input type="hidden" name="custom_sentence" value="">
                                </div>
                            </div>
                            <div class="wpil-content" style="display: none;">
                                <ul>
                                    <?php foreach ($group as $key_phrase => $phrase) : ?>
                                        <li>
                                            <div>
                                                <input type="radio" <?=!$key_phrase?'checked':''?> data-id="<?=$key_phrase?>">
                                                <div class="data">
                                                    <div class="wpil_edit_sentence_form">
                                                        <textarea class="wpil_content"><?=$phrase->suggestions[0]->sentence_src_with_anchor?></textarea>
                                                        <span class="button-primary">Save</span>
                                                        <span class="button-secondary">Cancel</span>
                                                    </div>
                                                    <span class="wpil_sentence_with_anchor"><?=$phrase->suggestions[0]->sentence_with_anchor?></span>
                                                    <?=!empty(Wpil_Suggestion::$undeletable)?' ('.esc_attr($phrase->suggestions[0]->anchor_score).')':''?>
                                                    <input type="hidden" name="sentence" value="<?=base64_encode($phrase->sentence_src)?>">
                                                    <input type="hidden" name="custom_sentence" value="">
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <?php if (Wpil_Settings::fullHTMLSuggestions()) : ?>
                            <?php foreach ($group as $key_phrase => $phrase) : ?>
                                <div class="raw_html" <?=$key_phrase > 0 ? 'style="display:none"' : '' ?> data-id="<?=$key_phrase?>"><?=htmlspecialchars($phrase->suggestions[0]->sentence_src_with_anchor)?></div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php else : ?>
                        <div class="sentence" data-id="<?=esc_attr($post_id)?>" data-type="<?=esc_attr($phrase->suggestions[0]->post->type)?>">
                            <div class="wpil_edit_sentence_form">
                                <textarea class="wpil_content"><?=$phrase->suggestions[0]->sentence_src_with_anchor?></textarea>
                                <span class="button-primary">Save</span>
                                <span class="button-secondary">Cancel</span>
                            </div>
                            <span class="wpil_sentence_with_anchor"><?=$phrase->suggestions[0]->sentence_with_anchor?></span>
                            <span class="wpil_edit_sentence link-form-button">| <a href="javascript:void(0)">Edit Sentence</a></span>
                            <?=!empty(Wpil_Suggestion::$undeletable)?' ('.esc_attr($phrase->suggestions[0]->anchor_score).')':''?>
                            <input type="hidden" name="sentence" value="<?=base64_encode($phrase->sentence_src)?>">
                            <input type="hidden" name="custom_sentence" value="">

                            <?php if (Wpil_Settings::fullHTMLSuggestions()) : ?>
                                <div class="raw_html"><?=htmlspecialchars($phrase->suggestions[0]->sentence_src_with_anchor)?></div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </td>
                <td data-colname="<?php _e('Post', 'wpil'); ?>">
                    <div style="opacity:<?=$phrase->suggestions[0]->opacity?>" class="suggestion" data-id="<?=esc_attr($phrase->suggestions[0]->post->id)?>" data-type="<?=esc_attr($phrase->suggestions[0]->post->type)?>">
                        <?php
                            $categories = get_terms(array(
                                'taxonomy' => $taxonomies,
                                'hide_empty' => false,
                                'object_ids' => $phrase->suggestions[0]->post->id,
                            ));
                        
                            if(!is_wp_error($categories) && !empty($categories)){
                                $mapped = array_map(function($obj){ if(isset($obj->name)){return $obj->name;} }, $categories);
                                $categories = implode(', ', $mapped);
                                $found = count($mapped);
                            }else{
                                $categories = false;
                            }
                        ?>    
                        <?php echo '<b>' . __('Title: ', 'wpil') . '</b>' . esc_attr($phrase->suggestions[0]->post->getTitle()) . '<br>'; ?>
                        <?php echo '<b>' . __('Type: ', 'wpil') . '</b>' . $phrase->suggestions[0]->post->getType() . '<br>'; ?>
                        <?php echo (!empty($categories)) ? '<b>' . _n(__('Category: ', 'wpil'), __('Categories: ', 'wpil'), $found) . '</b>' . $categories : ''; ?>
                        <?=!empty(Wpil_Suggestion::$undeletable)?' ('.esc_attr($phrase->suggestions[0]->post_score).')':''?>
                        <br>

                            <?php echo '<b style="vertical-align: top;">' . __('Item Link:', 'wpil') . '</b>'?>
                            <a class="post-slug inbound-slug" target="_blank" href="<?=$phrase->suggestions[0]->post->getLinks()->view?>">
                                <?php echo $phrase->suggestions[0]->post->getLinks()->view?>
                            </a>

                        <span class="wpil_add_link_to_ignore link-form-button"><a style="margin-left: 5px 0px;" href="javascript:void(0)">Ignore Link</a></span>
                    </div>
                </td>
                <?php if($show_date){ ?>
                <td data-colname="<?php _e('Date Published', 'wpil'); ?>">
                    <?=($phrase->suggestions[0]->post->type=='post'?get_the_date('', $phrase->suggestions[0]->post->id):'not set')?>
                </td>
                <?php } ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    <?php else : ?>
        <tr>
            <td>No suggestions found</td>
        </tr>
    <?php endif; ?>
</table>
<script>
    var inbound_internal_link = '<?=$post->getLinks()->view?>';
</script>
