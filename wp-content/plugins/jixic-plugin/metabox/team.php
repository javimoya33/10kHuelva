<?php
return array(
	'title'      => 'Jixic Team Setting',
	'id'         => 'jixic_meta_team',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'jixic_team' ),
	'sections'   => array(
		array(
			'id'     => 'jixic_team_meta_setting',
			'fields' => array(
				array(
					'id'       => 'team_hover_image',
					'type'     => 'media',
					'url'      => true,
					'title'    => esc_html__( 'Client Team Hover Image', 'strike' ),
					'desc'     => esc_html__( 'Insert Team Hover Image URl', 'strike' ),
				),
				array(
					'id'    => 'designation',
					'type'  => 'text',
					'title' => esc_html__( 'Designation', 'jixic' ),
				),
				array(
					'id'    => 'social_profile',
					'type'  => 'social_media',
					'title' => esc_html__( 'Social Profiles', 'jixic' ),
				),
				array(
					'id'    => 'team_link',
					'type'  => 'text',
					'title' => esc_html__( 'Read More Link', 'jixic' ),
				),
			),
		),
	),
);