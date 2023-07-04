<?php

return array(
	'title'      => esc_html__( 'Footer Setting', 'jixic' ),
	'id'         => 'footer_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'jixic' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'jixic' ),
				'e' => esc_html__( 'Elementor', 'jixic' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'jixic' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'footer_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'footer_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Settings', 'jixic' ),
			'required' => array( 'footer_source_type', '=', 'd' ),
		),
		array(
		    'id'       => 'footer_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Footer Styles', 'jixic' ),
		    'subtitle' => esc_html__( 'Choose Footer Styles', 'jixic' ),
		    'options'  => array(

			    'footer_v1'  => array(
				    'alt' => esc_html__( 'Footer Style 1', 'jixic' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer1.png',
			    ),
			    'footer_v2'  => array(
				    'alt' => esc_html__( 'Footer Style 2', 'jixic' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer2.png',
			    ),
				'footer_v3'  => array(
				    'alt' => esc_html__( 'Footer Style 3', 'jixic' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer3.png',
			    ),
			    'footer_v4'  => array(
				    'alt' => esc_html__( 'Footer Style 4', 'jixic' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer4.png',
			    ),
				'footer_v5'  => array(
				    'alt' => esc_html__( 'Footer Style 5', 'jixic' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer5.png',
			    ),
				'footer_v6'  => array(
				    'alt' => esc_html__( 'Footer Style 6', 'jixic' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer6.png',
			    ),
			),
			'required' => array( 'footer_source_type', '=', 'd' ),
			'default' => 'footer_v1',
	    ),
		
		
		/***********************************************************************
								Footer Version 1 Start
		************************************************************************/
		array(
			'id'       => 'footer_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style One Settings', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'      => 'footer_menu',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu html', 'jixic' ),
			'desc'    => esc_html__( 'Enter the raw html', 'jixic' ),
			'default' => '',
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'      => 'copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'jixic' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'      => 'footer_menu',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu html', 'jixic' ),
			'desc'    => esc_html__( 'Enter the raw html', 'jixic' ),
			'default' => '',
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		/***********************************************************************
								Footer Version 2 Start
		************************************************************************/
		array(
			'id'       => 'footer_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Two Settings', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'       => 'footer_bg_img',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Background Image', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'       => 'footer_bg_img_two',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Background Shape Image ', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'      => 'form_title',
			'type'    => 'text',
			'title'   => __( 'Title', 'jixic' ),
			'desc'    => esc_html__( 'Enter the Title', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'      => 'form_text',
			'type'    => 'textarea',
			'title'   => __( 'Text', 'jixic' ),
			'desc'    => esc_html__( 'Enter the Text', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'      => 'footer_contact_form_url',
			'type'    => 'textarea',
			'title'   => __( 'Contact Form 7 Url', 'jixic' ),
			'desc'    => esc_html__( 'Enter the Contact Form 7 Url', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'      => 'footer_google_map_code',
			'type'    => 'textarea',
			'title'   => __( 'Google Map Iframe Code', 'jixic' ),
			'desc'    => esc_html__( 'Enter the Google Map Iframe Code', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'      => 'copyright_text2',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'jixic' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'      => 'footer_menu_2',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu html', 'jixic' ),
			'desc'    => esc_html__( 'Enter the raw html', 'jixic' ),
			'default' => '',
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		/***********************************************************************
								Footer Version 3 Start
		************************************************************************/
		array(
			'id'       => 'footer_v3_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Three Settings', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		array(
			'id'       => 'footer_bg_img_three',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Background Image', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		array(
			'id'      => 'copyright_text_3',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'jixic' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		array(
			'id'    => 'footer_v3_social_share',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Profiles', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		/***********************************************************************
								Footer Version 4 Start
		************************************************************************/
		array(
			'id'       => 'footer_v4_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Four Settings', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		array(
			'id'      => 'copyright_text_4',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'jixic' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		array(
			'id'    => 'footer_v4_social_share',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Profiles', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		/***********************************************************************
								Footer Version 5 Start
		************************************************************************/
		array(
			'id'       => 'footer_v5_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Five Settings', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		array(
			'id'       => 'feature_image_one',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'feature Image', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		array(
			'id'      => 'footer_title',
			'type'    => 'textarea',
			'title'   => __( 'Title', 'jixic' ),
			'desc'    => esc_html__( 'Enter the Title', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		array(
			'id'      => 'footer_text',
			'type'    => 'textarea',
			'title'   => __( 'Text', 'jixic' ),
			'desc'    => esc_html__( 'Enter the Text', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		array(
			'id'      => 'google_store_link',
			'type'    => 'text',
			'title'   => __( 'Google Store Link', 'jixic' ),
			'desc'    => esc_html__( 'Enter the Google Store Link', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		array(
			'id'      => 'app_store_link',
			'type'    => 'text',
			'title'   => __( 'App Store Link', 'jixic' ),
			'desc'    => esc_html__( 'Enter the App Store Link', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		array(
			'id'    => 'footer_v5_social_share',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Profiles', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		array(
			'id'      => 'copyright_text5',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'jixic' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		/***********************************************************************
								Footer Version 6 Start
		************************************************************************/
		array(
			'id'       => 'footer_v6_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Six Settings', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		array(
			'id'      => 'footer_title_v6',
			'type'    => 'text',
			'title'   => __( 'Title', 'jixic' ),
			'desc'    => esc_html__( 'Enter the Title', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		array(
			'id'      => 'footer_email_v6',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'jixic' ),
			'desc'    => esc_html__( 'Enter the Email Address', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		array(
			'id'      => 'footer_phone_no_v6',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'jixic' ),
			'desc'    => esc_html__( 'Enter the Phone Number', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		array(
			'id'      => 'footer_follow_on_v6',
			'type'    => 'text',
			'title'   => __( 'Follow On Description', 'jixic' ),
			'desc'    => esc_html__( 'Enter the Follow On Description', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		array(
			'id'      => 'footer_phone_no_two_v6',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'jixic' ),
			'desc'    => esc_html__( 'Enter the Phone Number', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		array(
			'id'       => 'footer_logo_img',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Logo Image', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		array(
			'id'      => 'copyright_text6',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'jixic' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		array(
			'id'    => 'footer_v6_social_share',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Profiles', 'jixic' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v6' ),
		),
		array(
			'id'       => 'footer_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'footer_source_type', '=', 'd' ],
		),
	),
);
