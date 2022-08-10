<?php 

	add_filter('gdlr_core_portfolio_item_extra_class', 'arki_gdlr_core_portfolio_item_extra_class', 10, 2);
	if( !function_exists('arki_gdlr_core_portfolio_item_extra_class') ){
		function arki_gdlr_core_portfolio_item_extra_class($extra_class, $settings){
			if( !empty($settings['portfolio-style']) && in_array($settings['portfolio-style'], array('modern', 'modern-no-space')) &&
				!empty($settings['layout-zigzag']) && $settings['layout-zigzag'] == 'enable' ){
				$extra_class .= ' gdlr-core-layout-zigzag';
			}

			return $extra_class;
		}
	}

	add_filter('gdlr_core_portfolio_item_options', 'arki_gdlr_core_portfolio_item_options');
	if( !function_exists('arki_gdlr_core_portfolio_item_options') ){
		function arki_gdlr_core_portfolio_item_options($options){
			if( !empty($options['settings']['options']) ){
				$options['settings']['options'] = gdlr_core_array_insert($options['settings']['options'], 'layout', array(
					'layout-zigzag' => array(
						'title' => esc_html__('Layout Zigzag', 'arki'),
						'type' => 'checkbox',
						'default' => 'disable',
						'condition' => array( 'portfolio-style'=> array('modern', 'modern-no-space'), 'layout' => 'carousel' )
					)
				));
			}
			return $options;
		}
	}

	add_filter('gdlr_core_portfolio_style_content', 'arki_gdlr_core_portfolio_style_content', 10, 3);
	if( !function_exists('arki_gdlr_core_portfolio_style_content') ){
		function arki_gdlr_core_portfolio_style_content($ret = '', $args = array(), $portfolio_style = array() ){

			if( $args['portfolio-style'] == 'grid3' ){
				$ret = '';
				$extra_class  = '';
				
				$port_atts = array(
					'border-width' => empty($args['portfolio-frame-border-size'])? '': $args['portfolio-frame-border-size'],
					'border-color' => empty($args['portfolio-frame-border-color'])? '': $args['portfolio-frame-border-color'],
					'padding' => empty($args['portfolio-frame-padding'])? '': $args['portfolio-frame-padding']
				);
				if( !empty($args['frame-shadow-size']['size']) && !empty($args['frame-shadow-color']) && !empty($args['frame-shadow-opacity']) ){
					$port_atts['background-shadow-size'] = $args['frame-shadow-size'];
					$port_atts['background-shadow-color'] = $args['frame-shadow-color'];
					$port_atts['background-shadow-opacity'] = $args['frame-shadow-opacity'];
					
					$extra_class .= ' gdlr-core-outer-frame-element';
				}
				$port_atts['border-radius'] = empty($args['portfolio-border-radius'])? '': $args['portfolio-border-radius'];

				// move up with shadow effect
				$effect_class = '';
				if( !empty($args['enable-move-up-shadow-effect']) && $args['enable-move-up-shadow-effect'] == 'enable' ){
					$effect_class = ' gdlr-core-move-up-with-shadow gdlr-core-outer-frame-element';
				}


				$badge = '';
				if( !empty($args['enable-badge']) && $args['enable-badge'] == 'enable' ){
					$portfolio_info = get_post_meta(get_the_ID(), 'gdlr-core-page-option', true);
					$badge .= $portfolio_style->portfolio_badge($portfolio_info); 
				}
				if( !empty($badge) ){
					$ret .= '<div class="gdlr-core-portfolio-badge-wrap ' . esc_attr($effect_class) . '" >';
				}else{
					$extra_class .= $effect_class;
				}


				$ret .= '<div class="gdlr-core-portfolio-grid3 ' . esc_attr($extra_class) . '" >';
				
				$ret .= $portfolio_style->get_thumbnail($args);
				// portfolio-frame-opacity
				$ret .= '<div class="gdlr-core-portfolio-content-wrap gdlr-core-skin-e-background gdlr-core-skin-divider clearfix"  ' . gdlr_core_esc_style($port_atts) . ' >';
				if( !empty($args['portfolio-grid-style']) && $args['portfolio-grid-style'] == 'with-frame' ){
					$ret .= '<div class="gdlr-core-portfolio-grid-frame" ' . gdlr_core_esc_style(array(
						'opacity' => isset($args['portfolio-frame-opacity'])? $args['portfolio-frame-opacity']: ''
					)) . ' ></div>';
				}
				$ret .= $portfolio_style->get_info('tag', $args);
				$ret .= $portfolio_style->portfolio_title($args);
				$ret .= '<a class="gdlr-portfolio-learn-more" href="' . esc_attr(get_permalink()) . '" >';
				$ret .= '<i class="ion-ios-arrow-thin-right" ></i></a>';
				$ret .= '</div>'; // gdlr-core-portfolio-content-wrap
				$ret .= '</div>'; // gdlr-core-portfolio-grid3
				
				if( !empty($badge) ){
					$ret .= $badge . '</div>';
				}
			}

			return $ret;

		}
	}