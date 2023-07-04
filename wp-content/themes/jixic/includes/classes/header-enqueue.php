<?php

namespace JIXIC\Includes\Classes;


/**
 * Header and Enqueue class
 */
class Header_Enqueue {


	public static function init() {
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue' ) );

		add_filter( 'wp_resource_hints', array( __CLASS__, 'resource_hints' ), 10, 2 );
	}

	/**
	 * Gets the arrays from method scripts and styles and process them to load.
	 * Styles are being loaded by default while scripts only enqueue and can be loaded where required.
	 *
	 * @return void This function returns nothing.
	 */
	public static function enqueue() {

		self::scripts();

		self::styles();

	}

	/**
	 * The major scripts loader to load all the scripts of the theme. Developer can hookup own scripts.
	 * All the scripts are being load in footer.
	 *
	 * @return array Returns the array of scripts to load
	 */
	public static function scripts() {
		$options = get_theme_mod( JIXIC_NAME . '_options-mods' );
		$ssl     = is_ssl() ? 'https' : 'http';

		$scripts = array(
			'appear'         => 'assets/js/appear.js',
			'bootstrap-bundle'         => 'assets/js/bootstrap.bundle.min.js',
			'bootstrap-select'     => 'assets/js/bootstrap-select.min.js',
			'isotope'          => 'assets/js/isotope.js',
			'jquery-bootstrap-touchspin'           => 'assets/js/jquery.bootstrap-touchspin.js',
			'jquery-countto'      => 'assets/js/jquery.countTo.js',
			'jquery-easing'      		=> 'assets/js/jquery.easing.min.js',
			'jquery-enllax'      		=> 'assets/js/jquery.enllax.min.js',
			'jquery-fancybox'      		=> 'assets/js/jquery.fancybox.js',
			'jquery-mixitup'      		=> 'assets/js/jquery.mixitup.min.js',
			'jquery-paroller'      		=> 'assets/js/jquery.paroller.min.js',
			'owl'      		=> 'assets/js/owl.js',
			'wow'      		=> 'assets/js/wow.js',
			'parallax'      		=> 'assets/js/parallax.min.js',
			'jquery-mcustomscrollbar'      		=> 'assets/js/jquery.mCustomScrollbar.concat.min.js',
			'mousemoveparallax'      		=> 'assets/js/mousemoveparallax.js',
			'aos'      		=> 'assets/js/aos.js',
			'jquery-countdown'      		=> 'assets/js/jquery.countdown.min.js',
			'slick'      		=> 'assets/js/slick.js',
			'util'      		=> 'assets/js/util.js',
			'tweenmax'      		=> 'assets/js/TweenMax.min.js',
			'jquery-polyglot-language-switcher'      		=> 'assets/js/jquery.polyglot.language.switcher.js',
			'timepicker'      		=> 'assets/js/timePicker.js',
			'html5lightbox'      		=> 'assets/js/html5lightbox.js',
			'like'      		=> 'assets/js/like.js',
			'main-custom'      		=> 'assets/js/custom.js',
		);

		$scripts = apply_filters( 'JIXIC/includes/classes/header_enqueue/scripts', $scripts );
		/**
		 * Enqueue the scripts
		 *
		 * @var array
		 */
		foreach ( $scripts as $name => $js ) {

			if ( strstr( $js, 'http' ) || strstr( $js, 'https' ) || strstr( $js, 'googleapis.com' ) ) {

				wp_register_script( "{$name}", $js, '', '', true );
			} else {
				wp_register_script( "{$name}", get_template_directory_uri() . '/' . $js, '', '', true );
			}
		}

		wp_enqueue_script( array(
			'jquery',
			'appear',
			'bootstrap-bundle',
			'bootstrap-select',
			'isotope',
			'jquery-bootstrap-touchspin',
			'jquery-countto',
			'jquery-easing',
			'jquery-enllax',
			'jquery-fancybox',
			'jquery-mixitup',
			'jquery-paroller',
			'owl',
			'wow',
			'parallax',
			'jquery-mcustomscrollbar',
			'mousemoveparallax',
			'aos',
			'jquery-countdown',
			'slick',
			'util',
			'tweenmax',
			'jquery-polyglot-language-switcher',
			'timepicker',
			'html5lightbox',
			'jquery-ui',
			'like',
			'main-custom',
		) );


		$header_data = array(
			'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ),
			'nonce'   => wp_create_nonce( JIXIC_NONCE ),
		);

		wp_localize_script( 'jquery', 'jixic_data', $header_data );

		if ( jixic_set( $options, 'footer_js' ) ) {

			wp_add_inline_script( 'jquery', jixic_set( $options, 'footer_js' ) );
		}

	}

	/**
	 * The major styles loader to load all the styles of the theme. Developer can hookup own styles.
	 * All the styles are being load in head.
	 *
	 * @return array Returns the array of styles to load
	 */
	public static function styles() {
		$styles = array(
			'google-fonts'      => self::fonts_url(),
			'animate'      => 'assets/css/animate.css',
			'bootstrap'      => 'assets/css/bootstrap.min.css',
			'bootstrap-select'      => 'assets/css/bootstrap-select.min.css',
			'custom-animate'      => 'assets/css/custom-animate.css',
			'font-awesome'      => 'assets/css/font-awesome.min.css',
			'icomoon'      => 'assets/css/icomoon.css',
			'imp'      => 'assets/css/imp.css',
			'jquery-bootstrap-touchspin'      => 'assets/css/jquery.bootstrap-touchspin.css',
			'jquery-fancybox'      => 'assets/css/jquery.fancybox.min.css',
			'owl'      => 'assets/css/owl.css',
			'owl-theme-default'      => 'assets/css/owl.theme.default.css',
			'jquery-mcustomscrollbar'      => 'assets/css/jquery.mCustomScrollbar.min.css',
			'slick'         => 'assets/css/slick.css',
			'aos'         => 'assets/css/aos.css',
			'swiper'         => 'assets/css/swiper.min.css',
			'flaticon'         => 'assets/css/flaticon.css',
			'nouislider'         => 'assets/css/nouislider.css',
			'flaticon'         => 'assets/css/flaticon.css',
			'nouislider-pips'         => 'assets/css/nouislider.pips.css',
			'timepicker'         => 'assets/css/timePicker.css',
			'jquery-ui'         => 'assets/css/jquery-ui.css',
			'polyglot-language-switcher'         => 'assets/css/polyglot-language-switcher.css',
			'energy-icon'         => 'assets/css/energy-icon.css',
			'woocommerce'      => 'assets/css/woocommerce.css',
			'custom'			=> 'assets/css/custom.css',
			'main-style'        => 'assets/css/style.css',
			'tut'			=> 'assets/css/tut.css',
			'gutenberg'			=> 'assets/css/gutenberg.css',
			'responsive'        => 'assets/css/responsive.css',
		);

		$styles = apply_filters( 'JIXIC/includes/classes/header_enqueue/styles', $styles );

		/**
		 * Enqueue the styles
		 *
		 * @var array
		 */
		foreach ( $styles as $name => $style ) {

			if ( strstr( $style, 'http' ) || strstr( $style, 'https' ) || strstr( $style, 'fonts.googleapis' ) ) {
				wp_enqueue_style( "jixic-{$name}", $style );
			} else {
				wp_enqueue_style( "jixic-{$name}", get_template_directory_uri() . '/' . $style );
			}
		}
		$options      = jixic_WSH()->option();
		$custom_style = '';

		wp_add_inline_style( 'color', $custom_style );

		$header_styles = self::header_styles(); 
		
		if ( $custom_font = $options->get('theme_custom_font') ) {
            $header_styles .= jixic_custom_fonts_load( $custom_font );
        }

		wp_add_inline_style( 'jixic-main-style', $header_styles );
	}

	/**
	 * Register custom fonts.
	 */
	public static function fonts_url() {
		$fonts_url = '';

		$font_families['Montserrat']      = 'Montserrat:100,200,300,400,500,600,700,800,900';
		$font_families['Poppins']      = 'Poppins:200,300,400,500,600,700,800,900';
		$font_families['Muli']      = 'Muli:300,400,600,700,800,900';
		$font_families['Knewave']     = 'Knewave';
		$font_families['Playfair Display']     = 'Playfair Display:400,700,900';
		
		$font_families = apply_filters( 'JIXIC/includes/classes/header_enqueue/font_families', $font_families );

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$protocol  = is_ssl() ? 'https' : 'http';
		$fonts_url = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );

		return esc_url_raw($fonts_url);
	}


	/**
	 * Add preconnect for Google Fonts.
	 *
	 * @since JIXIC 1.0
	 *
	 * @param array  $urls          URLs to print for resource hints.
	 * @param string $relation_type The relation type the URLs are printed.
	 *
	 * @return array $urls           URLs to print for resource hints.
	 */
	public static function resource_hints( $urls, $relation_type ) {
		if ( wp_style_is( 'jixic-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
			$urls[] = array(
				'href' => 'https://fonts.gstatic.com',
				'crossorigin',
			);
		}

		return $urls;
	}

	/**
	 * header_styles
	 *
	 * @since JIXIC 1.0
	 *
	 * @param array $urls URLs to print for resource hints.
	 */
	public static function header_styles() {

		$data = \JIXIC\Includes\Classes\Common::instance()->data( 'blog' )->get();

		$options = jixic_WSH()->option();

		$styles = '';
		if ( $options->get( 'footer_top_button' ) ) :
			$styles .= "#topcontrol {
				background: " . $options->get( 'button_bg' ) . " none repeat scroll 0 0 !important;
				opacity: 0.5;

				color: " . $options->get( 'button_color' ) . " !important;

			}";

		endif;

		$settings = get_theme_mod( JIXIC_NAME . '_options-mods' );

		if ( $custom_font = jixic_set( $settings, 'theme_custom_font' ) ) {

			$styles .= apply_filters('jixic_redux_custom_fonts_load', $custom_font );


		}

		return $styles;
	}


}