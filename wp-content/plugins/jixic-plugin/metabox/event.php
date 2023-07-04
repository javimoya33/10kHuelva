<?php
return array(
	'title'      => 'Jixic Evant Setting',
	'id'         => 'jixic_meta_event',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'tribe_events' ),
	'sections'   => array(
		array(
			'id'     => 'jixic_event_meta_setting',
			'fields' => array(
				array(
					'id'    => 'video',
					'type'  => 'text',
					'title' => esc_html__( 'Video Link', 'jixic' ),
				),
				
			),
		),
	),
);