<?php

require_once get_template_directory() . '/includes/loader.php';

add_action( 'after_setup_theme', 'jixic_setup_theme' );
add_action( 'after_setup_theme', 'jixic_load_default_hooks' );


function jixic_setup_theme() {

	load_theme_textdomain( 'jixic', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	add_theme_support('woocommerce');
	add_theme_support('wc-product-gallery-lightbox');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );


	// Set the default content width.
	$GLOBALS['content_width'] = 525;
	
	//Register image sizes
	add_image_size( 'jixic_90x90', 90, 90, true ); //'jixic_90x90 Our Testimonials'
	add_image_size( 'jixic_370x310', 370, 310, true ); //'jixic_370x310 Latest News'
	add_image_size( 'jixic_270x300', 270, 300, true ); //'jixic_270x300 Our Team'
	add_image_size( 'jixic_370x400', 370, 400, true ); //'jixic_370x400 Feature Works'
	add_image_size( 'jixic_553x260', 553, 260, true ); //'jixic_553x260 Digital Portfolio V2'
	add_image_size( 'jixic_553x520', 553, 520, true ); //'jixic_553x520 Digital Portfolio V2'
	add_image_size( 'jixic_775x550', 775, 550, true ); //'jixic_775x550 Our Projects'
	add_image_size( 'jixic_70x70', 70, 70, true ); //'jixic_70x70 Our Testimonials V3'
	add_image_size( 'jixic_370x370', 370, 370, true ); //'jixic_370x370 Our Team V2'
	add_image_size( 'jixic_370x430', 370, 430, true ); //'jixic_370x430 Latest News V3'
	add_image_size( 'jixic_480x380', 480, 380, true ); //'jixic_480x380 our Works'
	add_image_size( 'jixic_370x250', 370, 250, true ); //'jixic_370x250 classic portfolio v1'
	add_image_size( 'jixic_310x310', 310, 310, true ); //'jixic_310x310 classic portfolio v2'
	add_image_size( 'jixic_770x500', 770, 500, true ); //'jixic_770x500 classic portfolio v3'
	add_image_size( 'jixic_770x330', 770, 330, true ); //'jixic_770x330 classic portfolio v3'
	add_image_size( 'jixic_370x500', 370, 500, true ); //'jixic_370x500 classic portfolio v3'
	add_image_size( 'jixic_370x330', 370, 330, true ); //'jixic_370x330 classic portfolio v3'
	add_image_size( 'jixic_600x400', 600, 400, true ); //'jixic_600x400 classic portfolio v4'
	add_image_size( 'jixic_960x420', 960, 420, true ); //'jixic_960x420 classic portfolio v5'
	add_image_size( 'jixic_480x415', 480, 415, true ); //'jixic_480x415 classic portfolio v5'
	add_image_size( 'jixic_770x480', 770, 480, true ); //'jixic_770x480 Creative Portfolio'
	add_image_size( 'jixic_970x500', 970, 500, true ); //'jixic_970x500 Modern Portfolio'
	add_image_size( 'jixic_370x270', 370, 270, true ); //'jixic_370x270 Latest News V2'
	add_image_size( 'jixic_340x400', 340, 400, true ); //'jixic_340x400 Blog Creative'
	add_image_size( 'jixic_340x270', 340, 270, true ); //'jixic_340x270 Blog Creative'
	add_image_size( 'jixic_900x390', 900, 390, true ); //'jixic_900x390 Blog Modern'
	add_image_size( 'jixic_450x780', 450, 780, true ); //'jixic_450x780 Blog Modern'
	add_image_size( 'jixic_450x390', 450, 390, true ); //'jixic_450x390 Blog Modern'
	add_image_size( 'jixic_98x98', 98, 98, true ); //'jixic_98x98 start Your Project'
	add_image_size( 'jixic_140x140', 140, 140, true ); //'jixic_140x140 Our Project'
	add_image_size( 'jixic_82x82', 82, 82, true ); //'jixic_82x82 Latest Project'
	
	
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main_menu' => esc_html__( 'Main Menu', 'jixic' ),
		'footer_menu' => esc_html__( 'Footer Menu', 'jixic' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'      => 250,
		'height'     => 250,
		'flex-width' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style();
	add_action( 'admin_init', 'jixic_admin_init', 2000000 );
}

function jixic_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong yellow', 'jixic' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__( 'strong white', 'jixic' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => esc_html__( 'light black', 'jixic' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'jixic' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__( 'very dark black', 'jixic' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );
	
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'jixic' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Normal', 'jixic' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Large', 'jixic' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'jixic' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );
	
}
add_action( 'after_setup_theme', 'jixic_gutenberg_editor_palette_styles' );

/**
 * [jixic_widgets_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
function jixic_widgets_init() {

	global $wp_registered_sidebars;

	$theme_options = get_theme_mod( JIXIC_NAME . '_options-mods' );

	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'jixic' ),
		'id'            => 'default-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'jixic' ),
		'before_widget' => '<div id="%1$s" class="widget single-sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="title"><h3>',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar(array(
		'name' => esc_html__('Footer Widget', 'jixic'),
		'id' => 'footer-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'jixic'),
		'before_widget'=>'<div class="footer-column col-xl-3 col-lg-6 col-md-6 col-sm-12 wow fadeInUp"><div id="%1$s" class="single-footer-widget footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Two Widget', 'jixic'),
		'id' => 'footer-sidebar-2',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'jixic'),
		'before_widget'=>'<div class="footer-column col-xl-3 col-lg-6 col-md-6 col-sm-12 wow fadeInUp"><div id="%1$s" class="single-footer-widget-style2 footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Three Widget', 'jixic'),
		'id' => 'footer-sidebar-3',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'jixic'),
		'before_widget'=>'<div class="footer-column col-xl-6 col-lg-6 col-md-12 col-sm-12 wow fadeInUp"><div id="%1$s" class="single-footer-widget-style3 footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Four Widget', 'jixic'),
		'id' => 'footer-sidebar-4',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'jixic'),
		'before_widget'=>'<div class="footer-column col-xl-3 col-lg-6 col-md-6 col-sm-12 wow fadeInUp"><div id="%1$s" class="single-footer-widget-style4 footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="title"><h5>',
		'after_title' => '</h5><div class="decor"></div></div>'
	));
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'jixic' ),
	  'id' => 'blog-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'jixic' ),
	  'before_widget'=>'<div id="%1$s" class="widget single-sidebar %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="title"><h3>',
	  'after_title' => '</h3></div>'
	));
	if ( ! is_object( jixic_WSH() ) ) {
		return;
	}

	$sidebars = jixic_set( $theme_options, 'custom_sidebar_name' );

	foreach ( array_filter( (array) $sidebars ) as $sidebar ) {

		if ( jixic_set( $sidebar, 'topcopy' ) ) {
			continue;
		}

		$name = $sidebar;
		if ( ! $name ) {
			continue;
		}
		$slug = str_replace( ' ', '_', $name );

		register_sidebar( array(
			'name'          => $name,
			'id'            => sanitize_title( $slug ),
			'before_widget' => '<div id="%1$s" class="%2$s widget single-sidebar">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="title"><h3>',
			'after_title'   => '</h3></div>',
		) );
	}

	update_option( 'wp_registered_sidebars', $wp_registered_sidebars );
}

add_action( 'widgets_init', 'jixic_widgets_init' );

/**
 * [jixic_admin_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */


function jixic_admin_init() {
	remove_action( 'admin_notices', array( 'ReduxFramework', '_admin_notices' ), 99 );
}

/**
 * [jixic_set description]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
if ( ! function_exists( 'jixic_set' ) ) {
	function jixic_set( $var, $key, $def = '' ) {
		//if( ! $var ) return false;

		if ( is_object( $var ) && isset( $var->$key ) ) {
			return $var->$key;
		} elseif ( is_array( $var ) && isset( $var[ $key ] ) ) {
			return $var[ $key ];
		} elseif ( $def ) {
			return $def;
		} else {
			return false;
		}
	}
}
function jixic_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'jixic_add_editor_styles' );

function jixic_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 6;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jixic_related_products_args', 20 );
  function jixic_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 1; // arranged in 2 columns
	return $args;
}