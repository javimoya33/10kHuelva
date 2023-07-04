<?php
return array(
	'title'      => 'Jixic Service Setting',
	'id'         => 'jixic_meta_service',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'jixic_service' ),
	'sections'   => array(
		array(
			'id'     => 'jixic_service_meta_setting',
			'fields' => array(
				array(
					'id'       => 'service_icon',
					'type'     => 'select',
					'title'    => esc_html__( 'Service Icons', 'jixic' ),
					'options'  => get_fontawesome_icons(),
				),
				array(
					'id'    => 'ext_url',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Read More Link', 'jixic' ),
				),
			),
		),
	),
);