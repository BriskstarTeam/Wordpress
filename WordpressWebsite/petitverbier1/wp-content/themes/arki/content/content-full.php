<?php
/**
 * The template part for displaying single posts
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="arki-single-article arki-style" >
		<?php
			ob_start();
			the_post_thumbnail('full');
			$post_thumbnail = ob_get_contents();
			ob_end_clean();

			if( !empty($post_thumbnail) ){
				echo '<div class="arki-single-article-thumbnail arki-media-image" >';
				echo gdlr_core_escape_content($post_thumbnail);
				if( is_sticky() ){
					echo '<div class="arki-sticky-banner arki-title-font" ><i class="fa fa-bolt" ></i>' . esc_html__('Sticky Post', 'arki') . '</div>';
				}
				echo '</div>';
			}else{
				if( is_sticky() ){
					echo '<div class="arki-sticky-banner arki-title-font" ><i class="fa fa-bolt" ></i>' . esc_html__('Sticky Post', 'arki') . '</div>';
				}
			}

			echo '<header class="arki-single-article-head clearfix" >';
			echo '<h3 class="arki-single-article-title"><a href="' . get_permalink() . '" >' . get_the_title() . '</a></h3>';

			$blog_info_atts = array( 'wrapper' => true );
			$blog_info_atts['display'] = arki_get_option('general', 'meta-option', '');
			echo arki_get_blog_info($blog_info_atts);

			echo '</header>';

			echo '<div class="arki-single-article-content">';
			the_excerpt();
			echo '</div>';

			echo '<a class="arki-button arki-excerpt-read-more" href="' . get_permalink() . '">Read More</a>';
		?>
	</div><!-- arki-single-article -->
</article><!-- post-id -->
