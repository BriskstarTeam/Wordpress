<?php if (get_option('wpil_disable_outbound_suggestions')) : ?>
    <a href="<?=admin_url("admin.php?{$post->type}_id={$post->id}&page=link_whisper&type=inbound_suggestions_page&ret_url=" . base64_encode($post->getLinks()->edit))?>" class="button-primary">Add Inbound links</a>
<?php else : ?>
<div class="wpil_notice" id="wpil_message" style="display: none">
    <p></p>
</div>
<div class="best_keywords outbound">
    <?=Wpil_Base::showVersion()?>
    <p>
        <div style="margin-bottom: 15px;">
        <input style="margin-bottom: -5px;" type="checkbox" name="same_category" id="field_same_category" <?=!empty($same_category) ? 'checked' : ''?>> <label for="field_same_category">Only Show Link Suggestions in the Same Category as This Post</label>
        <br>
        <input type="checkbox" name="same_tag" id="field_same_tag" <?=!empty($same_tag) ? 'checked' : ''?>> <label for="field_same_tag">Only Show Link Suggestions with the Same Tag as This Post</label>
        <?php if ($same_category && !empty($categories)) : ?>
            <br>
            <select name="wpil_selected_category">
                <option value="0">All categories</option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?=$category->term_id?>" <?=$category->term_id==$selected_category?'selected':''?>><?=$category->name?></option>
                <?php endforeach; ?>
            </select>
        <?php endif; ?>
        <?php if ($same_tag && !empty($tags)) : ?>
            <br>
            <select name="wpil_selected_tag">
                <option value="0">All tags</option>
                <?php foreach ($tags as $tag) : ?>
                    <option value="<?=$tag->term_id?>" <?=$tag->term_id==$selected_tag?'selected':''?>><?=$tag->name?></option>
                <?php endforeach; ?>
            </select>
        <?php endif; ?>
        <br>
    </div>
        <a href="<?=$post->getLinks()->export?>" target="_blank">Export data</a><br>
        <a href="<?=$post->getLinks()->excel_export?>" target="_blank">Export to Excel</a>
    </p>
    <button class="sync_linking_keywords_list button-primary" data-id="<?=esc_attr($post->id)?>" data-type="<?=esc_attr($post->type)?>"  data-page="outbound">Update <?=$post->type=='term' ? 'term' : 'post'?></button>
    <a href="<?=admin_url("admin.php?{$post->type}_id={$post->id}&page=link_whisper&type=inbound_suggestions_page&ret_url=" . base64_encode($post->getLinks()->edit))?>" class="wpil_inbound_links_button button-primary">Add Inbound links</a>
    <?php require WP_INTERNAL_LINKING_PLUGIN_DIR . 'templates/table_suggestions.php'; ?>
</div>
<br>
<button class="sync_linking_keywords_list button-primary" data-id="<?=esc_attr($post->id)?>" data-type="<?=esc_attr($post->type)?>"  data-page="outbound">Update <?=$post->type=='term' ? 'term' : 'post'?></button>
<a href="<?=admin_url("admin.php?{$post->type}_id={$post->id}&page=link_whisper&type=inbound_suggestions_page&ret_url=" . base64_encode($_SERVER['REQUEST_URI']))?>" class="wpil_inbound_links_button button-primary">Add Inbound links</a>
<br>
<br>
<?php endif; ?>