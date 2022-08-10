<h2 class="nav-tab-wrapper" style="margin-bottom:1em;">
    <a class="nav-tab <?=empty($_GET['type'])?'nav-tab-active':''?>" id="general-tab" href="<?=admin_url('admin.php?page=link_whisper')?>"><?php  _e( "Dashboard", 'wpil' )?></a>
    <?php if(WPIL_STATUS_LINK_TABLE_EXISTS){ ?>
    <a class="nav-tab <?=(!empty($_GET['type']) && $_GET['type']=='links')?'nav-tab-active':''?>" id="home-tab" href="<?=admin_url('admin.php?page=link_whisper&type=links')?>"><?php  _e( "Links Report", 'wpil' )?> </a>
    <a class="nav-tab <?=(!empty($_GET['type']) && $_GET['type']=='domains')?'nav-tab-active':''?>" id="home-tab" href="<?=admin_url('admin.php?page=link_whisper&type=domains')?>"><?php  _e( "Domains Report", 'wpil' )?> </a>
    <a class="nav-tab <?=(!empty($_GET['type']) && $_GET['type']=='error')?'nav-tab-active':''?>" id="post_types-tab" href="<?=admin_url('admin.php?page=link_whisper&type=error')?>"><?php  _e( "Error Report", 'wpil' )?> </a>

    <?php if(!empty($_GET['type']) && $_GET['type']=='error'){ ?>
    <form action='' method="post" id="wpil_error_reset_data_form">
        <input type="hidden" name="reset" value="1">
        <input type="hidden" name="nonce" value="<?php echo wp_create_nonce($user->ID . 'wpil_error_reset_data'); ?>">
        <a href="javascript:void(0)" class="button-primary csv_button" data-type="error" id="wpil_cvs_export_button">Export to CSV</a>
        <button type="submit" class="button-primary"><?php _e('Scan for Broken Links', 'wpil'); ?></button>
    </form>
    <?php }else{ ?>
    <form action='' method="post" id="wpil_report_reset_data_form">
        <input type="hidden" name="reset_data_nonce" value="<?php echo wp_create_nonce($user->ID . 'wpil_reset_report_data'); ?>">
        <?php if (!empty($_GET['type'])) : ?>
            <a href="javascript:void(0)" class="button-primary csv_button" data-type="<?=$_GET['type']?>" id="wpil_cvs_export_button">Detailed Export to CSV</a>
            <a href="javascript:void(0)" class="button-primary csv_button" data-type="<?=$_GET['type']?>_summary" id="wpil_cvs_export_button">Summary Export to CSV</a>
        <?php endif; ?>
        <button type="submit" class="button-primary">Run a Link Scan</button>
    </form>
    <?php } ?>
    <?php } // end link table exist check
    ?>
</h2>
