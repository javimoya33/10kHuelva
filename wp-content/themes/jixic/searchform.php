<?php
/**
 * Search Form template
 *
 * @package JIXIC
 * @author Theme Kalia
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>

<form class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
    <input type="text" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Search...', 'jixic' ); ?>">
    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>