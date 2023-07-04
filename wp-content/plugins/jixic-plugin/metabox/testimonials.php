<?php
return array(
	'title'      => 'Jixic Testimonials Setting',
	'id'         => 'jixic_meta_testimonials',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'jixic_testimonials' ),
	'sections'   => array(
		array(
			'id'     => 'jixic_testimonials_meta_setting',
			'fields' => array(
				array(
					'id'    => 'twitter_id',
					'type'  => 'text',
					'title' => esc_html__( 'Twitter ID', 'jixic' ),
				),
				array(
					'id'    => 'twitter_link',
					'type'  => 'text',
					'title' => esc_html__( 'Twitter Link', 'jixic' ),
				),
				array(
					'id'    => 'test_designation',
					'type'  => 'text',
					'title' => esc_html__( 'Designation', 'jixic' ),
				),
				array(
					'id'    => 'testimonial_rating',
					'type'  => 'select',
					'title' => esc_html__( 'Choose the Client Rating', 'jixic' ),
					'options'  => array(
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
					),
					'default'  => '5',
				),
			),
		),
	),
);