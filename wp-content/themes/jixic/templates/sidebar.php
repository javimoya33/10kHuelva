<?php

/**
 * Sidebar Template
 *
 * @package    WordPress
 * @subpackage JIXIC
 * @author     ThemeKalia
 * @version    1.0
 */

if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'sidebar_type' ) == 'e' AND $data->get( 'sidebar_elementor' ) ) {
	?>

	<div class="col-lg-4 col-sm-8 col-md-6">
		<aside class="sidebar">
			<?php
			echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'sidebar_elementor' ) );
			?>
		</aside>
	</div>
	<?php
	return false;
} else {
	$options = $data->get( 'sidebar' );
}
?>

<?php if ( is_active_sidebar( $options ) ) : ?>
	<div class="col-xl-4 col-lg-5 col-md-8 col-sm-12">
        <div class="blog-sidebar-wrapper">
			<?php dynamic_sidebar( $options ); ?>
		</div>
	</div>
<?php endif; ?>

