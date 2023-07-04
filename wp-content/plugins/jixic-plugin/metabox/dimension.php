<?php
	return array(
		'title'      => 'Jixic post Setting',
		'id'         => 'jixic_post',
		'icon'       => 'el el-cogs',
		'position'   => 'normal',
		'priority'   => 'core',
		'post_types' => array( 'post' ),
		'sections'   => array(
			array(
				'fields' => array(
						array(
						'id'    => 'dimension',
						'type'  => 'select',
						'title' => esc_html__( 'Choose the Extra width and Extra height', 'jixic' ),
						'options'  => array(
							'extra_width' => esc_html__( 'Extra Width', 'jixic' ),
							'extra_height' => esc_html__( 'Extra Height', 'jixic' ),
							'normal_height' => esc_html__( 'Normal Height', 'jixic' ),
						),
						'default'  => 'normal_height',
					),
				),
			),
		),
	);


?>