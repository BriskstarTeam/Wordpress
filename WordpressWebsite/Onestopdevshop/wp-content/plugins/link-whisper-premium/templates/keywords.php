<div class="wrap wpil-report-page wpil_styles">
    <?=Wpil_Base::showVersion()?>
    <h1 class="wp-heading-inline">Auto-Linking</h1>
    <hr class="wp-header-end">
    <div id="poststuff">
        <div id="post-body" class="metabox-holder">
            <div id="post-body-content" style="position: relative;">
                <div id="wpil_keywords_table">
                    <form>
                        <input type="hidden" name="page" value="link_whisper_keywords" />
                        <?php $table->search_box('Search', 'search'); ?>
                    </form>
                    <div method="post" id="add_keyword_form">
                        <div>
                            <input type="text" name="keyword" placeholder="Keyword">
                            <input type="text" name="link" placeholder="Link">
                        </div>
                        <div class="progress_panel loader">
                            <div class="progress_count"></div>
                        </div>
                        <a href="javascript:void(0)" class="button-primary"><?php _e('Add Keyword', 'wpil')?></a>
                    </div>
                    <form method="post" class="wpil_keywords_settings_form">
                        <div id="wpil_keywords_settings">
                            <i class="dashicons dashicons-admin-generic"></i>
                            <div class="block">
                                <input type="hidden" name="wpil_keywords_add_same_link" value="0" />
                                <input type="checkbox" id="wpil_keywords_add_same_link" name="wpil_keywords_add_same_link" <?=get_option('wpil_keywords_add_same_link')==1?'checked':''?> value="1" />
                                <label for="wpil_keywords_add_same_link"><?php _e('Add link if post already has this link?', 'wpil'); ?></label>
                                <br>
                                <br>
                                <input type="hidden" name="wpil_keywords_link_once" value="0" />
                                <input type="checkbox" id="wpil_keywords_link_once" name="wpil_keywords_link_once" <?=get_option('wpil_keywords_link_once')==1?'checked':''?> value="1" />
                                <label for="wpil_keywords_link_once"><?php _e('Only link once per post', 'wpil'); ?></label>
                                <br>
                                <br>
                                <div class="wpil_keywords_restrict_to_cats_container">
                                    <input type="hidden" name="wpil_keywords_restrict_to_cats" value="0" />
                                    <input type="checkbox" id="wpil_keywords_restrict_to_cats" class="wpil_keywords_restrict_to_cats" name="wpil_keywords_restrict_to_cats" <?php echo get_option('wpil_keywords_restrict_to_cats')==1?'checked':'' ?> value="1" />
                                    <label for="wpil_keywords_restrict_to_cats"><?php _e('Restrict autolinks to specific categories?', 'wpil'); ?></label>
                                    <div style="position: relative; left: 10px;"><span class="wpil-keywords-restrict-cats-show"></span></div>
                                </div>
                                <br>
                                <?php 
                                Wpil_Term::getAllCategoryTerms();
                                $terms = Wpil_Term::getAllCategoryTerms();
                                    if(!empty($terms)){
                                        echo '<ul class="wpil-keywords-restrict-cats" style="display:none;">';
                                        echo '<li>' . __('Available Categories:', 'wpil') . '</li>';
                                        foreach($terms as $term_data){
                                            foreach($term_data as $term){
                                                echo '<li>
                                                        <input type="hidden" name="wpil_keywords_restrict_term_' . $term->term_id . '" value="0" />
                                                        <input type="checkbox" class="wpil-restrict-keywords-input" name="wpil_keywords_restrict_term_' . $term->term_id . '" data-term-id="' . $term->term_id . '">' . $term->name . '</li>';
                                            }
                                        }
                                        echo '</ul>';
                                        echo '<br />';
                                        echo '<br />';
                                    }
                                ?>
                                <input type="hidden" name="save_settings" value="1">
                                <input type="submit" class="button-primary" value="Save">
                            </div>
                        </div>
                    </form>
                    <div style="clear: both"></div>
                    <a href="javascript:void(0)" class="button-primary" id="wpil_keywords_reset_button"><?php _e('Refresh Auto-Link Report', 'wpil'); ?></a>
                    <?php if (!$reset) : ?>
                        <div class="table">
                            <?php $table->display(); ?>
                        </div>
                    <?php endif; ?>
                    <div class="progress" <?=$reset?'style="display:block"':''?>>
                        <h4 class="progress_panel_msg"><?php _e('Synchronizing your data..','wpil'); ?></h4>
                        <div class="progress_panel loader">
                            <div class="progress_count"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var wpil_keyword_nonce = '<?=wp_create_nonce($user->ID . 'wpil_keyword')?>';
    var is_wpil_keyword_reset = <?=$reset?'true':'false'?>;
</script>