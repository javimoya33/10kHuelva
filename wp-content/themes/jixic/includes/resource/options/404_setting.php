<?php

return array(
	'title'      => esc_html__( '404 Page Settings', 'jixic' ),
	'id'         => '404_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => '404_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( '404 Source Type', 'jixic' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'jixic' ),
				'e' => esc_html__( 'Elementor', 'jixic' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => '404_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'jixic' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
			],
			'required' => [ '404_source_type', '=', 'e' ],
		),
		array(
			'id'       => '404_default_st',
			'type'     => 'section',
			'title'    => esc_html__( '404 Default', 'jixic' ),
			'indent'   => true,
			'required' => [ '404_source_type', '=', 'd' ],
		),
		array(
			'id'      => '404_page_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'jixic' ),
			'desc'    => esc_html__( 'Enable to show banner on blog', 'jixic' ),
			'default' => true,
		),
		array(
			'id'       => '404_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'jixic' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'jixic' ),
			'required' => array( '404_page_banner', '=', true ),
		),
		array(
			'id'       => '404_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'jixic' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'jixic' ),
			'required' => array( '404_page_banner', '=', true ),
		),
		array(
			'id'       => 'error_img',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( '404 Image', 'jixic' ),
			'desc'     => esc_html__( 'Insert 404 image for Error Page', 'jixic' ),
			'default'  => array(
				'url' => JIXIC_URI . 'assets/images/resources/404.png',
			),
			'required' => array( '404_page_banner', '=', true ),
		),
		array(
			'id'    => '404-page_title',
			'type'  => 'text',
			'title' => esc_html__( '404 Title', 'jixic' ),
			'desc'  => esc_html__( 'Enter 404 section title that you want to show', 'jixic' ),

		),
		array(
			'id'    => '404-page-text',
			'type'  => 'textarea',
			'title' => esc_html__( '404 Page Description', 'jixic' ),
			'desc'  => esc_html__( 'Enter 404 page description that you want to show.', 'jixic' ),

		),
		array(
			'id'    => '404_page_form',
			'type'  => 'switch',
			'title' => esc_html__( 'Show Search Form', 'jixic' ),
			'desc'  => esc_html__( 'Enable to show search form on 404 page', 'jixic' ),
			'default'  => true,
		),
		array(
			'id'    => 'back_home_btn',
			'type'  => 'switch',
			'title' => esc_html__( 'Show Button', 'jixic' ),
			'desc'  => esc_html__( 'Enable to show back to home button.', 'jixic' ),
			'default'  => true,
		),
		array(
			'id'       => 'back_home_btn_label',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Label', 'jixic' ),
			'desc'     => esc_html__( 'Enter back to home button label that you want to show.', 'jixic' ),
			'default'  => esc_html__( 'Back To Home Page', 'jixic' ),
			'required' => array( 'back_home_btn', '=', true ),
		),

		array(
			'id'     => '404_post_settings_end',
			'type'   => 'section',
			'indent' => false,
		),

	),
);





