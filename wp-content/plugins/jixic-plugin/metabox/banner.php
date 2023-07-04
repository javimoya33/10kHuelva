<?php

return array(
	'id'     => 'jixic_banner_settings',
	'title'  => esc_html__( "Jixic Banner Settings", "konia" ),
	'fields' => array(
		array(
			'id'      => 'banner_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Banner Source Type', 'jixic' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'jixic' ),
				'e' => esc_html__( 'Elementor', 'jixic' ),
			),
			'default' => '',
		),
		array(
			'id'       => 'banner_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'viral-buzz' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
			],
			'required' => [ 'banner_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'banner_page_banner',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Banner', 'jixic' ),
			'default'  => false,
			'required' => [ 'banner_source_type', '=', 'd' ],
		),
		array(
			'id'       => 'banner_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'jixic' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'jixic' ),
			'required' => array( 'banner_page_banner', '=', true ),
		),
		array(
			'id'       => 'banner_banner_text',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Text', 'jixic' ),
			'desc'     => esc_html__( 'Enter the Text to show in banner section', 'jixic' ),
			'required' => array( 'banner_page_banner', '=', true ),
		),
		array(
			'id'       => 'banner_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'jixic' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'jixic' ),
			'default'  => array(
				'url' => JIXIC_URI . 'assets/images/breadcrumb/breadcrumb-bg.jpg',
			),
			'required' => array( 'banner_page_banner', '=', true ),
		),
		array(
			'id'    => 'style_two',
			'type'  => 'select',
			'title' => esc_html__( 'Choose the Banner Style', 'jixic' ),
			'options'  => array(
				'one' => esc_html__( 'Banner Style One', 'strike' ),
				'two' => esc_html__( 'Banner Style Two', 'strike' ),
				'three' => esc_html__( 'Banner Style Three', 'strike' ),
				'four' => esc_html__( 'Banner Style Four', 'strike' ),
				'five' => esc_html__( 'Banner Style Five', 'strike' ),
				'six' => esc_html__( 'Banner Style Six', 'strike' ),
				'seven' => esc_html__( 'Banner Style Seven', 'strike' ),
				'eight' => esc_html__( 'Banner Style Eight', 'strike' ),
			),
			'default'  => 'One',
			'required' => array( 'banner_page_banner', '=', true ),
		),
	),
);