<?php
return array(
	'title'      => esc_html__( 'Header Setting', 'jixic' ),
	'id'         => 'headers_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'header_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Header Source Type', 'jixic' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'jixic' ),
				'e' => esc_html__( 'Elementor', 'jixic' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'header_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'jixic' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'header_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'header_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Settings', 'jixic' ),
			'required' => array( 'header_source_type', '=', 'd' ),
		),
		array(
		    'id'       => 'header_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Header Styles', 'jixic' ),
		    'subtitle' => esc_html__( 'Choose Header Styles', 'jixic' ),
		    'options'  => array(

			    'header_v1'  => array(
				    'alt' => esc_html__( 'Header Style 1', 'jixic' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header1.png',
			    ),
			    'header_v2'  => array(
				    'alt' => esc_html__( 'Header Style 2', 'jixic' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header2.png',
			    ),
				'header_v3'  => array(
				    'alt' => esc_html__( 'Header Style 3', 'jixic' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header3.png',
			    ),
			    'header_v4'  => array(
				    'alt' => esc_html__( 'Header Style 4', 'jixic' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header4.png',
			    ),
				'header_v5'  => array(
				    'alt' => esc_html__( 'Header Style 5', 'jixic' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header5.png',
			    ),
			    'header_v6'  => array(
				    'alt' => esc_html__( 'Header Style 6', 'jixic' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header6.png',
			    ),
				'header_v7'  => array(
				    'alt' => esc_html__( 'Header Style 7', 'jixic' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header7.png',
			    ),
				'header_v8'  => array(
				    'alt' => esc_html__( 'Header Style 8', 'jixic' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header8.png',
			    ),
				'header_v9'  => array(
				    'alt' => esc_html__( 'Header Style 9', 'jixic' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header9.png',
			    ),
				'header_v10'  => array(
				    'alt' => esc_html__( 'Header Style 10', 'jixic' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header10.png',
			    ),
			),
			'required' => array( 'header_source_type', '=', 'd' ),
			'default' => 'header_v1',
	    ),
		/***********************************************************************
								Header Version 1 Start
		************************************************************************/
		array(
			'id'       => 'header_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style One Settings', 'jixic' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),
		 array(
		    'id'       => 'menu_btn_title',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Menu Button Title', 'jixic' ),
		    'desc'     => esc_html__( 'Enter The Menu Button Title', 'jixic' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
	    ),
		
		/***********************************************************************
								Header Version 2 Start
		************************************************************************/
		array(
			'id'       => 'header_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Two Settings', 'jixic' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		 array(
		    'id'       => 'welcome_text_2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Analysis Description', 'jixic' ),
		    'desc'     => esc_html__( 'Enter The Analysis Description', 'jixic' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
	    ),
		array(
		    'id'       => 'analysis_text_2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Analysis Button Title', 'jixic' ),
		    'desc'     => esc_html__( 'Enter The Analysis Button Title', 'jixic' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
	    ),
		array(
		    'id'       => 'analysis_link_2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Analysis Button Link', 'jixic' ),
		    'desc'     => esc_html__( 'Enter The Analysis Button Link', 'jixic' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
	    ),
		array(
		    'id'       => 'phone_no_2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'jixic' ),
		    'desc'     => esc_html__( 'Enter The Phone Number', 'jixic' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
	    ),
		array(
		    'id'       => 'email_2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Email Address', 'jixic' ),
		    'desc'     => esc_html__( 'Enter The Email Address', 'jixic' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
	    ),
		array(
			'id'    => 'social_icon_2',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Profiles', 'jixic' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		array(
            'id' => 'show_shoping_cart_icon_2',
            'type' => 'switch',
            'title' => esc_html__('Enable Shopping Cart icon', 'jixic'),
            'default' => true,
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
            'id' => 'show_search_form_2',
            'type' => 'switch',
            'title' => esc_html__('Enable Search Form icon', 'jixic'),
            'default' => true,
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		
		/***********************************************************************
								Header Version 3 Start
		************************************************************************/
		array(
			'id'       => 'header_v3_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Three Settings', 'jixic' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		array(
            'id' => 'show_search_form_3',
            'type' => 'switch',
            'title' => esc_html__('Enable Search Form icon', 'jixic'),
            'default' => true,
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		array(
            'id' => 'show_menu_bar_icon',
            'type' => 'switch',
            'title' => esc_html__('Enable Menu icon', 'jixic'),
            'default' => true,
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		/***********************************************************************
								Header Version 4 Start
		************************************************************************/
		array(
			'id'       => 'header_v4_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Four Settings', 'jixic' ),
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
		),
		array(
            'id' => 'show_search_form_4',
            'type' => 'switch',
            'title' => esc_html__('Enable Search Form icon', 'jixic'),
            'default' => true,
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		array(
		    'id'       => 'phone_no_4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'jixic' ),
		    'desc'     => esc_html__( 'Enter The Phone Number', 'jixic' ),
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
	    ),
		/***********************************************************************
								Header Version 5 Start
		************************************************************************/
		array(
			'id'       => 'header_v5_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Five Settings', 'jixic' ),
			'required' => array( 'header_style_settings', '=', 'header_v5' ),
		),
		array(
            'id' => 'show_shoping_cart_icon_5',
            'type' => 'switch',
            'title' => esc_html__('Enable Shopping Cart icon', 'jixic'),
            'default' => true,
			'required' => array( 'header_style_settings', '=', 'header_v5' ),
        ),
		array(
            'id' => 'show_search_form_5',
            'type' => 'switch',
            'title' => esc_html__('Enable Search Form icon', 'jixic'),
            'default' => true,
			'required' => array( 'header_style_settings', '=', 'header_v5' ),
        ),
		/***********************************************************************
								Header Version 6 Start
		************************************************************************/
		array(
			'id'       => 'header_v5_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Six Settings', 'jixic' ),
			'required' => array( 'header_style_settings', '=', 'header_v6' ),
		),
		array(
            'id' => 'show_menu_bar_icon_6',
            'type' => 'switch',
            'title' => esc_html__('Enable Menu icon', 'jixic'),
            'default' => true,
			'required' => array( 'header_style_settings', '=', 'header_v6' ),
        ),
		/***********************************************************************
								Header Version 7 Start
		************************************************************************/
		array(
			'id'       => 'header_v7_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Seven Settings', 'jixic' ),
			'required' => array( 'header_style_settings', '=', 'header_v7' ),
		),
		array(
            'id' => 'show_shoping_cart_icon_7',
            'type' => 'switch',
            'title' => esc_html__('Enable Shopping Cart icon', 'jixic'),
            'default' => true,
			'required' => array( 'header_style_settings', '=', 'header_v7' ),
        ),
		array(
            'id' => 'show_search_form_7',
            'type' => 'switch',
            'title' => esc_html__('Enable Search Form icon', 'jixic'),
            'default' => true,
			'required' => array( 'header_style_settings', '=', 'header_v7' ),
        ),
		/***********************************************************************
								Header Version 8 Start
		************************************************************************/
		array(
			'id'       => 'header_v8_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Eight Settings', 'jixic' ),
			'required' => array( 'header_style_settings', '=', 'header_v8' ),
		),
		array(
			'id'    => 'social_icon_8',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Profiles', 'jixic' ),
			'required' => array( 'header_style_settings', '=', 'header_v8' ),
		),
		array(
            'id' => 'show_search_form_8',
            'type' => 'switch',
            'title' => esc_html__('Enable Search Form icon', 'jixic'),
            'default' => true,
			'required' => array( 'header_style_settings', '=', 'header_v8' ),
        ),
		/***********************************************************************
								Header Version 9 Start
		************************************************************************/
		array(
			'id'       => 'header_v9_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Nine Settings', 'jixic' ),
			'required' => array( 'header_style_settings', '=', 'header_v9' ),
		),
		array(
            'id' => 'show_shoping_cart_icon_9',
            'type' => 'switch',
            'title' => esc_html__('Enable Shopping Cart icon', 'jixic'),
            'default' => true,
			'required' => array( 'header_style_settings', '=', 'header_v9' ),
        ),
		array(
            'id' => 'show_search_form_9',
            'type' => 'switch',
            'title' => esc_html__('Enable Search Form icon', 'jixic'),
            'default' => true,
			'required' => array( 'header_style_settings', '=', 'header_v9' ),
        ),
		/***********************************************************************
								Header Version 10 Start
		************************************************************************/
		array(
			'id'       => 'header_v10_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Ten Settings', 'jixic' ),
			'required' => array( 'header_style_settings', '=', 'header_v10' ),
		),
		array(
            'id' => 'show_shoping_cart_icon_10',
            'type' => 'switch',
            'title' => esc_html__('Enable Shopping Cart icon', 'jixic'),
            'default' => true,
			'required' => array( 'header_style_settings', '=', 'header_v10' ),
        ),
		array(
            'id' => 'show_search_form_10',
            'type' => 'switch',
            'title' => esc_html__('Enable Search Form icon', 'jixic'),
            'default' => true,
			'required' => array( 'header_style_settings', '=', 'header_v10' ),
        ),
		array(
			'id'       => 'header_style_section_end',
			'type'     => 'section',
			'indent'      => false,
			'required' => [ 'header_source_type', '=', 'd' ],
		),
	),
);
