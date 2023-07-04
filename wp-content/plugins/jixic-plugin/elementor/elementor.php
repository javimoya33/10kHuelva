<?php

namespace JIXICPLUGIN\Element;


class Elementor {
	static $widgets = array(
		//Home Page
		'home_v1_slider',
		'about_us',
		'our_work',
		'what_we_do',
		'funfacts',
		'our_team',
		'our_statements',
		'our_testimonials',
		'latest_news',
		'our_clients',
		//Home Two
		'home_v2_slider',
		'our_services',
		'usa_based',
		'featured_works',
		'pricing_plan',
		'our_testimonials_v2',
		'our_clients_v2',
		'latest_news_v2',
		//Home Three
		'home_v3_banner',
		'digital_portfolio_v1',
		'digital_portfolio_v2',
		//Home Four
		'home_v4_slider',
		'our_clients_v3',
		'about_us_v2',
		'what_we_do_v2',
		'our_projects',
		'our_testimonials_v3',
		'our_team_v2',
		'latest_news_v3',
		'google_map',
		//Home Five
		'home_v5_banner',
		'special_features',
		'perfect_application',
		'user_friendly',
		'awesome_screenshots',
		'application_process',
		'our_testimonials_v4',
		'our_clients_v4',
		'newsletter_form',
		//Home Six
		'home_v6_banner',
		'about_us_v3',
		'feature_services',
		'professional_skills',
		'my_impressive_works',
		'our_testimonials_v5',
		'latest_news_v4',
		//Inner Pages
		'about_us_v4',
		'our_history',
		'our_mission',
		'feature_services_v2',
		'our_team_v3',
		'our_faqs',
		'our_team_v4',
		'our_team_v5',
		'pricing_plan_v2',
		'our_maintenance',
		'comming_soon',
		'what_we_offer',
		'feature_services_v3',
		'our_process_services',
		'professional_skills_v2',
		'our_testimonials_v6',
		'classic_portfolio_v1',
		'classic_portfolio_v2',
		'classic_portfolio_v3',
		'classic_portfolio_v4',
		'classic_portfolio_v5',
		'creative_portfolio',
		'modern_portfolio',
		'portfolio_single',
		'portfolio_single_v2',
		'related_project',
		'blog_classic',
		'blog_creative',
		'blog_modern',
		'contact_banner_form',
		'contact_info',
		'contact_form',
		
		
	);

	static function init() {
		add_action( 'elementor/init', array( __CLASS__, 'loader' ) );
		add_action( 'elementor/elements/categories_registered', array( __CLASS__, 'register_cats' ) );
	}

	static function loader() {

		foreach ( self::$widgets as $widget ) {

			$file = JIXICPLUGIN_PLUGIN_PATH . '/elementor/' . $widget . '.php';
			if ( file_exists( $file ) ) {
				require_once $file;
			}

			add_action( 'elementor/widgets/widgets_registered', array( __CLASS__, 'register' ) );
		}
	}

	static function register( $elemntor ) {
		foreach ( self::$widgets as $widget ) {
			$class = '\\JIXICPLUGIN\\Element\\' . ucwords( $widget );

			if ( class_exists( $class ) ) {
				$elemntor->register_widget_type( new $class );
			}
		}
	}

	static function register_cats( $elements_manager ) {

		$elements_manager->add_category(
			'jixic',
			[
				'title' => esc_html__( 'Jixic', 'jixic' ),
				'icon'  => 'fa fa-plug',
			]
		);
		$elements_manager->add_category(
			'templatepath',
			[
				'title' => esc_html__( 'Template Path', 'jixic' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}
}

Elementor::init();