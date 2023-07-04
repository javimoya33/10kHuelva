<?php
	return array(
		'title'      => 'Jixic Setting',
		'id'         => 'jixic_meta',
		'icon'       => 'el el-cogs',
		'position'   => 'normal',
		'priority'   => 'core',
		'post_types' => array( 'page', 'post', 'jixic_project', 'jixic_team', 'jixic_testimonials', 'jixic_service', 'product' ),
		'sections'   => array(
			require_once JIXICPLUGIN_PLUGIN_PATH . '/metabox/header.php',
			require_once JIXICPLUGIN_PLUGIN_PATH . '/metabox/banner.php',
			require_once JIXICPLUGIN_PLUGIN_PATH . '/metabox/sidebar.php',
			require_once JIXICPLUGIN_PLUGIN_PATH . '/metabox/footer.php',
			//require_once JIXICPLUGIN_PLUGIN_PATH . '/metabox/dimension.php',
		),
	);
?>


