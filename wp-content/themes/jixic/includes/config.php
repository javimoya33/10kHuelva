<?php
/**
 * Theme config file.
 *
 * @package JIXIC
 * @author  ThemeKalia
 * @version 1.0
 * changed
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$config = array();

$config['default']['jixic_main_header'][] 	= array( 'jixic_preloader', 98 );
$config['default']['jixic_main_header'][] 	= array( 'jixic_main_header_area', 99 );

$config['default']['jixic_main_footer'][] 	= array( 'jixic_preloader', 98 );
$config['default']['jixic_main_footer'][] 	= array( 'jixic_main_footer_area', 99 );

$config['default']['jixic_sidebar'][] 	    = array( 'jixic_sidebar', 99 );

$config['default']['jixic_banner'][] 	    = array( 'jixic_banner', 99 );


return $config;
