<?php

// Post type: Team
function sm_register_post_type_team() {

	$args = array (
		'label' => esc_html__( 'Management Team', 'systemorph' ),
		'labels' => array(
			'menu_name' => esc_html__( 'Team', 'systemorph' ),
			'name_admin_bar' => esc_html__( 'Team Member', 'systemorph' ),
			'add_new' => esc_html__( 'Add new', 'systemorph' ),
			'add_new_item' => esc_html__( 'Add new Team Member', 'systemorph' ),
			'new_item' => esc_html__( 'New Team Member', 'systemorph' ),
			'edit_item' => esc_html__( 'Edit Team Member', 'systemorph' ),
			'view_item' => esc_html__( 'View Team Member', 'systemorph' ),
			'update_item' => esc_html__( 'Update Team Member', 'systemorph' ),
			'all_items' => esc_html__( 'All Management Team', 'systemorph' ),
			'search_items' => esc_html__( 'Search Management Team', 'systemorph' ),
			'parent_item_colon' => esc_html__( 'Parent Team Member', 'systemorph' ),
			'not_found' => esc_html__( 'No Management Team found', 'systemorph' ),
			'not_found_in_trash' => esc_html__( 'No Management Team found in Trash', 'systemorph' ),
			'name' => esc_html__( 'Management Team', 'systemorph' ),
			'singular_name' => esc_html__( 'Team Member', 'systemorph' ),
		),
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => false,
		'show_in_rest' => true,
		'menu_position' => 20,
		'menu_icon' => 'dashicons-admin-users',
		'capability_type' => 'page',
		'hierarchical' => false,
		'has_archive' => false,
		'query_var' => true,
		'can_export' => true,
		'description' => '',
		'show_in_menu' => true,
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'revisions',
			'page-attributes',
		),
		'rewrite' => array(
			'with_front' => false,
		),
	);

	register_post_type( 'management-team', $args );
}
add_action( 'init', 'sm_register_post_type_team' );


// Post type: Case Study
function sm_register_post_type_case_study() {

	$args = array (
		'label' => esc_html__( 'Case Studies', 'systemorph' ),
		'labels' => array(
			'menu_name' => esc_html__( 'Case Studies', 'systemorph' ),
			'name_admin_bar' => esc_html__( 'Case Study', 'systemorph' ),
			'add_new' => esc_html__( 'Add new', 'systemorph' ),
			'add_new_item' => esc_html__( 'Add new Case Study', 'systemorph' ),
			'new_item' => esc_html__( 'New Case Study', 'systemorph' ),
			'edit_item' => esc_html__( 'Edit Case Study', 'systemorph' ),
			'view_item' => esc_html__( 'View Case Study', 'systemorph' ),
			'update_item' => esc_html__( 'Update Case Study', 'systemorph' ),
			'all_items' => esc_html__( 'All Case Studies', 'systemorph' ),
			'search_items' => esc_html__( 'Search Case Studies', 'systemorph' ),
			'parent_item_colon' => esc_html__( 'Parent Case Study', 'systemorph' ),
			'not_found' => esc_html__( 'No Case Studies found', 'systemorph' ),
			'not_found_in_trash' => esc_html__( 'No Case Studies found in Trash', 'systemorph' ),
			'name' => esc_html__( 'Case Studies', 'systemorph' ),
			'singular_name' => esc_html__( 'Case Study', 'systemorph' ),
		),
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_in_menu' => true,
		'show_in_admin_bar' => false,
		'show_in_rest' => true,
		'menu_position' => 21,
		'menu_icon' => 'dashicons-clipboard',
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'revisions',
		),
		'rewrite' => array(
			'slug' => 'case-studies',
			'with_front' => false,
		),
	);

	register_post_type( 'case-studies', $args );
}
add_action( 'init', 'sm_register_post_type_case_study' );


// Post type: Partner
function sm_register_post_type_partner() {

	$args = array (
		'label' => esc_html__( 'Partners', 'systemorph' ),
		'labels' => array(
			'menu_name' => esc_html__( 'Partners', 'systemorph' ),
			'name_admin_bar' => esc_html__( 'Partner', 'systemorph' ),
			'add_new' => esc_html__( 'Add new', 'systemorph' ),
			'add_new_item' => esc_html__( 'Add new Partner', 'systemorph' ),
			'new_item' => esc_html__( 'New Partner', 'systemorph' ),
			'edit_item' => esc_html__( 'Edit Partner', 'systemorph' ),
			'view_item' => esc_html__( 'View Partner', 'systemorph' ),
			'update_item' => esc_html__( 'Update Partner', 'systemorph' ),
			'all_items' => esc_html__( 'All Partners', 'systemorph' ),
			'search_items' => esc_html__( 'Search Partners', 'systemorph' ),
			'parent_item_colon' => esc_html__( 'Parent Partner', 'systemorph' ),
			'not_found' => esc_html__( 'No Partners found', 'systemorph' ),
			'not_found_in_trash' => esc_html__( 'No Partners found in Trash', 'systemorph' ),
			'name' => esc_html__( 'Partners', 'systemorph' ),
			'singular_name' => esc_html__( 'Partner', 'systemorph' ),
		),
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_in_menu' => true,
		'show_in_admin_bar' => false,
		'show_in_rest' => true,
		'menu_position' => 22,
		'menu_icon' => 'dashicons-carrot',
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => true,
		'query_var' => true,
		'description' => 'Systemorph is collaborating with a variety of partners.',
		'can_export' => true,
		'supports' => array(
			'title',
			'revisions',
		),
		'rewrite' => array(
			'slug' => 'about/partners',
			'with_front' => false,
		),
	);

	register_post_type( 'partners', $args );
}
add_action( 'init', 'sm_register_post_type_partner' );

// Post type: News
function sm_register_post_type_news() {

	$args = array (
		'label' => esc_html__( 'News', 'systemorph' ),
		'labels' => array(
			'menu_name' => esc_html__( 'News', 'systemorph' ),
			'name_admin_bar' => esc_html__( 'News', 'systemorph' ),
			'add_new' => esc_html__( 'Add new', 'systemorph' ),
			'add_new_item' => esc_html__( 'Add new News', 'systemorph' ),
			'new_item' => esc_html__( 'New News', 'systemorph' ),
			'edit_item' => esc_html__( 'Edit News', 'systemorph' ),
			'view_item' => esc_html__( 'View News', 'systemorph' ),
			'update_item' => esc_html__( 'Update News', 'systemorph' ),
			'all_items' => esc_html__( 'All News', 'systemorph' ),
			'search_items' => esc_html__( 'Search News', 'systemorph' ),
			'parent_item_colon' => esc_html__( 'Parent News', 'systemorph' ),
			'not_found' => esc_html__( 'No News found', 'systemorph' ),
			'not_found_in_trash' => esc_html__( 'No News found in Trash', 'systemorph' ),
			'name' => esc_html__( 'News', 'systemorph' ),
			'singular_name' => esc_html__( 'News', 'systemorph' ),
		),
		'public' => true,
		'exclude_from_search' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => false,
		'show_in_rest' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-calendar-alt',
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'supports' => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			'revisions',
		),
		'taxonomies' => array(
			'category',
			'post_tag',
		),
		'rewrite' => array(
			'slug' => 'learn/news',
			'with_front' => false,
		),
	);

	register_post_type( 'news', $args );
}
add_action( 'init', 'sm_register_post_type_news' );

// Post type: Events
function sm_register_post_type_event() {

	$args = array (
		'label' => esc_html__( 'Events', 'systemorph' ),
		'labels' => array(
			'menu_name' => esc_html__( 'Events', 'systemorph' ),
			'name_admin_bar' => esc_html__( 'Event', 'systemorph' ),
			'add_new' => esc_html__( 'Add new', 'systemorph' ),
			'add_new_item' => esc_html__( 'Add new Event', 'systemorph' ),
			'new_item' => esc_html__( 'New Event', 'systemorph' ),
			'edit_item' => esc_html__( 'Edit Event', 'systemorph' ),
			'view_item' => esc_html__( 'View Event', 'systemorph' ),
			'update_item' => esc_html__( 'Update Event', 'systemorph' ),
			'all_items' => esc_html__( 'All Events', 'systemorph' ),
			'search_items' => esc_html__( 'Search Events', 'systemorph' ),
			'parent_item_colon' => esc_html__( 'Parent Event', 'systemorph' ),
			'not_found' => esc_html__( 'No Events found', 'systemorph' ),
			'not_found_in_trash' => esc_html__( 'No Events found in Trash', 'systemorph' ),
			'name' => esc_html__( 'Events', 'systemorph' ),
			'singular_name' => esc_html__( 'Event', 'systemorph' ),
		),
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_in_menu' => true,
		'show_in_admin_bar' => false,
		'show_in_rest' => true,
		'menu_position' => 6,
		'menu_icon' => 'dashicons-awards',
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'revisions',
		),
		'taxonomies' => array(
			'post_tag',
			'category',
		),
		'rewrite' => array(
			'slug' => 'learn/events',
			'with_front' => false,
		),
	);

	register_post_type( 'event', $args );
}
add_action( 'init', 'sm_register_post_type_event' );