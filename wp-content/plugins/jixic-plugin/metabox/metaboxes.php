<?php
if ( ! function_exists( "jixic_add_metaboxes" ) ) {
	function jixic_add_metaboxes( $metaboxes ) {
		$directories_array = array(
			'page.php',
			'projects.php',
			'service.php',
			'team.php',
			'testimonials.php',
			'event.php',
			'dimension.php',
		);
		foreach ( $directories_array as $dir ) {
			$metaboxes[] = require_once( JIXICPLUGIN_PLUGIN_PATH . '/metabox/' . $dir );
		}

		return $metaboxes;
	}

	add_action( "redux/metaboxes/jixic_options/boxes", "jixic_add_metaboxes" );
}

