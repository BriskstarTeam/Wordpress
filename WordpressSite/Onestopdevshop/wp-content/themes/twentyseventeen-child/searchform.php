<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */

?>

<?php $unique_id = esc_attr( twentyseventeen_unique_id( 'search-form-' ) ); ?>
<div class="input-group input__icon">
  <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  	<input type="search" id="<?php echo $unique_id; ?>" class="form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'twentyseventeen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
  	<button type="submit" class="search-submit"><span class="lnr-magnifier"></span></button>
  </form>
</div>
