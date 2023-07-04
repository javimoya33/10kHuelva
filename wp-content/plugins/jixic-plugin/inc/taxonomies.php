<?php

namespace JIXICPLUGIN\Inc;


use JIXICPLUGIN\Inc\Abstracts\Taxonomy;


class Taxonomies extends Taxonomy {


	public static function init() {

		$labels = array(
			'name'              => _x( 'Project Category', 'wpjixic' ),
			'singular_name'     => _x( 'Project Category', 'wpjixic' ),
			'search_items'      => __( 'Search Category', 'wpjixic' ),
			'all_items'         => __( 'All Categories', 'wpjixic' ),
			'parent_item'       => __( 'Parent Category', 'wpjixic' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpjixic' ),
			'edit_item'         => __( 'Edit Category', 'wpjixic' ),
			'update_item'       => __( 'Update Category', 'wpjixic' ),
			'add_new_item'      => __( 'Add New Category', 'wpjixic' ),
			'new_item_name'     => __( 'New Category Name', 'wpjixic' ),
			'menu_name'         => __( 'Project Category', 'wpjixic' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'project_cat' ),
		);

		register_taxonomy( 'project_cat', 'jixic_project', $args );
		
		//Services Taxonomy Start
		$labels = array(
			'name'              => _x( 'Service Category', 'wpjixic' ),
			'singular_name'     => _x( 'Service Category', 'wpjixic' ),
			'search_items'      => __( 'Search Category', 'wpjixic' ),
			'all_items'         => __( 'All Categories', 'wpjixic' ),
			'parent_item'       => __( 'Parent Category', 'wpjixic' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpjixic' ),
			'edit_item'         => __( 'Edit Category', 'wpjixic' ),
			'update_item'       => __( 'Update Category', 'wpjixic' ),
			'add_new_item'      => __( 'Add New Category', 'wpjixic' ),
			'new_item_name'     => __( 'New Category Name', 'wpjixic' ),
			'menu_name'         => __( 'Service Category', 'wpjixic' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'service_cat' ),
		);


		register_taxonomy( 'service_cat', 'jixic_service', $args );
		
		//Testimonials Taxonomy Start
		$labels = array(
			'name'              => _x( 'Testimonials Category', 'wpjixic' ),
			'singular_name'     => _x( 'Testimonials Category', 'wpjixic' ),
			'search_items'      => __( 'Search Category', 'wpjixic' ),
			'all_items'         => __( 'All Categories', 'wpjixic' ),
			'parent_item'       => __( 'Parent Category', 'wpjixic' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpjixic' ),
			'edit_item'         => __( 'Edit Category', 'wpjixic' ),
			'update_item'       => __( 'Update Category', 'wpjixic' ),
			'add_new_item'      => __( 'Add New Category', 'wpjixic' ),
			'new_item_name'     => __( 'New Category Name', 'wpjixic' ),
			'menu_name'         => __( 'Testimonials Category', 'wpjixic' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'testimonials_cat' ),
		);


		register_taxonomy( 'testimonials_cat', 'jixic_testimonials', $args );
		
		
		//Team Taxonomy Start
		$labels = array(
			'name'              => _x( 'Team Category', 'wpjixic' ),
			'singular_name'     => _x( 'Team Category', 'wpjixic' ),
			'search_items'      => __( 'Search Category', 'wpjixic' ),
			'all_items'         => __( 'All Categories', 'wpjixic' ),
			'parent_item'       => __( 'Parent Category', 'wpjixic' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpjixic' ),
			'edit_item'         => __( 'Edit Category', 'wpjixic' ),
			'update_item'       => __( 'Update Category', 'wpjixic' ),
			'add_new_item'      => __( 'Add New Category', 'wpjixic' ),
			'new_item_name'     => __( 'New Category Name', 'wpjixic' ),
			'menu_name'         => __( 'Team Category', 'wpjixic' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'team_cat' ),
		);


		register_taxonomy( 'team_cat', 'jixic_team', $args );
		
		//Faqs Taxonomy Start
		$labels = array(
			'name'              => _x( 'Faqs Category', 'wpjixic' ),
			'singular_name'     => _x( 'Faq Category', 'wpjixic' ),
			'search_items'      => __( 'Search Category', 'wpjixic' ),
			'all_items'         => __( 'All Categories', 'wpjixic' ),
			'parent_item'       => __( 'Parent Category', 'wpjixic' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpjixic' ),
			'edit_item'         => __( 'Edit Category', 'wpjixic' ),
			'update_item'       => __( 'Update Category', 'wpjixic' ),
			'add_new_item'      => __( 'Add New Category', 'wpjixic' ),
			'new_item_name'     => __( 'New Category Name', 'wpjixic' ),
			'menu_name'         => __( 'Faq Category', 'wpjixic' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'faqs_cat' ),
		);


		register_taxonomy( 'faqs_cat', 'jixic_faqs', $args );
	}
	
}
