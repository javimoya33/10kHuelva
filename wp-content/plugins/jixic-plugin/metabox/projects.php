<?php
return array(
	'title'      => 'Jixic Project Setting',
	'id'         => 'jixic_meta_projects',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'jixic_project' ),
	'sections'   => array(
		array(
			'id'     => 'jixic_projects_meta_setting',
			'fields' => array(
				array(
					'id'       => 'overlay_img',
					'type'     => 'media',
					'url'      => true,
					'title'    => esc_html__( 'Portfolio Overlay Image', 'jixic' ),
					'desc'     => esc_html__( 'Insert Portfolio Overlay Image URl', 'jixic' ),
				),
				array(
					'id'    => 'dimension',
					'type'  => 'select',
					'title' => esc_html__( 'Choose the Extra width and Extra height', 'jixic' ),
					'options'  => array(
						'normal_width' => esc_html__( 'Normal Width', 'jixic' ),
						'extra_width_height' => esc_html__( 'Extra Width Height', 'jixic' ),
						'extra_width' => esc_html__( 'Extra Width', 'jixic' ),
						'extra_height' => esc_html__( 'Extra Height', 'jixic' ),
						'normal_height' => esc_html__( 'Normal Height', 'jixic' ),
					),
					'default'  => 'normal_width',
				),
				array(
					'id'    => 'project_link',
					'type'  => 'text',
					'title' => esc_html__( 'Read More Link', 'jixic' ),
				),
			),
		),
	),
);