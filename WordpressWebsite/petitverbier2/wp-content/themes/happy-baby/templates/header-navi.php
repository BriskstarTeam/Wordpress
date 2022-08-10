<?php
/**
 * The template to display the main menu
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0
 */
?>
<div class="top_panel_navi sc_layouts_row sc_layouts_row_type_normal sc_layouts_row_delimiter
			scheme_<?php echo esc_attr(happy_baby_is_inherit(happy_baby_get_theme_option('menu_scheme')) 
												? (happy_baby_is_inherit(happy_baby_get_theme_option('header_scheme')) 
													? happy_baby_get_theme_option('color_scheme') 
													: happy_baby_get_theme_option('header_scheme')) 
												: happy_baby_get_theme_option('menu_scheme')); ?>">

		<div class="columns_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_left sc_layouts_column_icons_position_left column-1_4">
				<?php
				// Logo
				?><div class="sc_layouts_item"><?php
					get_template_part( 'templates/header-logo' );
				?></div>
			</div><?php
			
			// Attention! Don't place any spaces between columns!
			?><div class="sc_layouts_column sc_layouts_column_align_right sc_layouts_column_icons_position_left column-3_4">
				<div class="sc_layouts_item">
					<?php
					// Main menu
					$happy_baby_menu_main = happy_baby_get_nav_menu(array(
						'location' => 'menu_main', 
						'class' => 'sc_layouts_menu sc_layouts_menu_default sc_layouts_hide_on_mobile'
						)
					);
					if (empty($happy_baby_menu_main)) {
						$happy_baby_menu_main = happy_baby_get_nav_menu(array(
							'class' => 'sc_layouts_menu sc_layouts_menu_default sc_layouts_hide_on_mobile'
							)
						);
					}
					happy_baby_show_layout($happy_baby_menu_main);
					// Mobile menu button
					?>
					<div class="sc_layouts_iconed_text sc_layouts_menu_mobile_button">
						<a class="sc_layouts_item_link sc_layouts_iconed_text_link" href="#">
							<span class="sc_layouts_item_icon sc_layouts_iconed_text_icon trx_addons_icon-menu"></span>
						</a>
					</div>
				</div><?php
				$telephone = happy_baby_get_theme_option('telephone');
				if(!empty($telephone)){
				?><div class="sc_layouts_item">
					<div class="sc_layouts_iconed_text">
						<span class="sc_layouts_item_icon sc_layouts_iconed_text_icon icon-phone-symbol-of-an-auricular-with-circular-cord-around"></span>
						<span class="sc_layouts_item_details sc_layouts_iconed_text_details">
							<span class="sc_layouts_item_details_line2 sc_layouts_iconed_text_line2"><?php echo esc_html($telephone); ?></span>
						</span>
					</div>
				</div>
				<?php }
				$button_name = happy_baby_get_theme_option('button_name');
				$button_url = happy_baby_get_theme_option('button_url');
				if(!empty($button_name) && !empty($button_url)) {
					?>
					<div class="sc_layouts_item">
						<a class="sc_button color_style_dark sc_button_default sc_button_size_normal sc_button_icon_left"
						   href="<?php echo esc_url($button_url); ?>">
							<span class="sc_button_text">
								<span class="sc_button_title"><?php echo esc_html($button_name); ?></span>
							</span>
						</a>
					</div><?php
				}
				?></div>
		</div><!-- /.sc_layouts_row -->

</div><!-- /.top_panel_navi -->