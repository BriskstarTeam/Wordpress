<?php
/**
 * The template to display Admin notices
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0.1
 */
?>
<div class="update-nag" id="happy_baby_admin_notice">
	<h3 class="happy_baby_notice_title"><?php echo sprintf(esc_html__('Welcome to %s', 'happy-baby'), wp_get_theme()->name); ?></h3>
	<?php
	if (!happy_baby_exists_trx_addons()) {
		?><p><?php echo wp_kses_data(__('<b>Attention!</b> Plugin "ThemeREX Addons is required! Please, install and activate it!', 'happy-baby')); ?></p><?php
	}
	?><p><?php
		if (happy_baby_get_value_gp('page')!='tgmpa-install-plugins') {
			?>
			<a href="<?php echo esc_url(admin_url().'themes.php?page=tgmpa-install-plugins'); ?>" class="button-primary"><i class="dashicons dashicons-admin-plugins"></i> <?php esc_html_e('Install plugins', 'happy-baby'); ?></a>
			<?php
		}
		if (function_exists('happy_baby_exists_trx_addons') && happy_baby_exists_trx_addons()) {
			?>
			<a href="<?php echo esc_url(admin_url().'themes.php?page=trx_importer'); ?>" class="button-primary"><i class="dashicons dashicons-download"></i> <?php esc_html_e('One Click Demo Data', 'happy-baby'); ?></a>
			<?php
		}
		?>
        <a href="<?php echo esc_url(admin_url().'customize.php'); ?>" class="button-primary"><i class="dashicons dashicons-admin-appearance"></i> <?php esc_html_e('Theme Customizer', 'happy-baby'); ?></a>
        <a href="#" class="button happy_baby_hide_notice"><i class="dashicons dashicons-dismiss"></i> <?php esc_html_e('Hide Notice', 'happy-baby'); ?></a>
	</p>
</div>