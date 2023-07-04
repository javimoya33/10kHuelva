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
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
    <div class="form-group">
        <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Search...', 'jixic' ); ?>" required>
        <button type="submit"><i class="fa fa-search"></i></button>
    </div>
</form>