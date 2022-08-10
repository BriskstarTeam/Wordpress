<input type="hidden" name="wp_screen_options[option]" value="report_options" />
<input type="hidden" name="wp_screen_options[value]" value="yes" />
<fieldset class="screen-options">
    <legend>Options</legend>
    <input type="checkbox" name="report_options[show_categories]" id="show_categories" <?=$show_categories ? 'checked' : ''?>/>
    <label for="show_categories">Show categories&nbsp;&nbsp;&nbsp;</label>
    <input type="checkbox" name="report_options[show_type]" id="show_type" <?=$show_type ? 'checked' : ''?>/>
    <label for="show_type">Show post type</label>
    <input type="checkbox" name="report_options[show_date]" id="show_date" <?=$show_date ? 'checked' : ''?>/>
    <label for="show_date">Show the post publish date</label>
</fieldset>
<fieldset class="screen-options">
    <legend>Pagination</legend>
    <label for="per_page">Posts per page</label>
    <input type="number" step="1" min="1" max="999" maxlength="3" name="report_options[per_page]" id="per_page" value="<?=esc_attr($per_page)?>" />
</fieldset>
<br>
<?=$button?>
<?php wp_nonce_field( 'screen-options-nonce', 'screenoptionnonce', false, false ); ?>
