<?php 
    $dir = plugin_dir_path( __DIR__ ); 
    $upload = get_template_directory_uri();
?>
<div role="tabpanel" class="tab-pane <?php echo $forgot_class ?> sailboat" id="forgotController<?php echo $form_id ?>">
    <div class="sailboat_img">
        <img src="<?php echo $upload; ?>/assets/images/sailboat.webp" class="sailboat_image">
    </div>
    <div class="box">
        <div class="wpuser_form_header box-header with-border">
            <h3 class="box-title"><?php _e('Forgot Password', 'wpuser') ?></h3>
            </div>
        <div class="box-body">
        <div style="display: none;" id="wpuser_errordiv_forgot<?php echo $form_id ?>"
             class="alert alert-dismissible fade in" role="alert"><label
                id="upuser_error_forgot<?php echo $form_id ?>"></label></div>
        <form method="post" id="wpuser_forgot_form<?php echo $form_id ?>">
            <div class="row">
                <div class="col-xs-12 col-md-12">
            <?php
            do_action('wp_user_hook_forgot_form_header');
            foreach ($wp_user_options_forgot_form as $array) {
                echo profileController::edit_fields($array['meta_key'], $array, $wp_user_appearance_skin, $form_id, null, 'login');
            }
            do_action('wp_user_hook_forgot_form') ?>
                    </div>
                </div>
            <div class="row">
                <div class="col-xs-12 col-md-12">
                  <div class="col-xs-12 col-md-12">
                    <input type="button" style="width: 300px;" id="wpuser_forgot<?php echo $form_id ?>" class="wpuser_button wpuser_button btn <?php echo $wp_user_appearance_button_type ?> btn-primary"
                           name="forgot_password" value="<?php _e('Forgot', 'wpuser') ?>">
                </div>
                </div>
                <?php do_action('wp_user_hook_forgot_form_footer') ?>
                <!-- /.col -->
            </div>
        </form>
            </div>
        <!-- <div class="navtabs box-footer">
            <span>Already have an account.</span>
        <a aria-controls="loginController<?php echo $form_id ?>" role="tab" data-toggle="tab"
           href="#loginController<?php echo $form_id ?>"><?php _e('Sign In', 'wpuser') ?></a><br>
            </div> -->
            
            <div class="navtabs box-footer">
            <span class="sign_up">already have an account? </span>
            <a aria-controls="loginController<?php echo $form_id ?>" role="tab" data-toggle="tab"
               href="#loginController<?php echo $form_id ?>" class="text-center login-form"><?php _e('Sign In', 'wpuser') ?></a>
        </div>
    </div>
</div>
