<?php
return array(
    'title'      => esc_html__( 'Social Icon Setting', 'jixic' ),
	'id'         => 'socials_setting',
	'desc'       => '',
	'icon'   => 'el el-indent-left',
	'fields'     => array(
		array(
			'id'    => 'social_media',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Profiles', 'jixic' ),
			'desc'  => esc_html__( 'Click an icon to activate social profile icons in header.', 'jixic' ),
		),
		array(
			'id'       => 'socials_setting_section_end',
			'type'     => 'section',
			'indent'      => false,
		),
	),
);
