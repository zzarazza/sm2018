<?php
// Taxonomy: Partnership Type
function sm_register_taxonomy_partnership_type() {

	$args = array (
		'label' => esc_html__( 'Partnership Types', 'systemorph' ),
		'labels' => array(
			'menu_name' => esc_html__( 'Partnership Types', 'systemorph' ),
			'all_items' => esc_html__( 'All Partnership Types', 'systemorph' ),
			'edit_item' => esc_html__( 'Edit Partnership Type', 'systemorph' ),
			'view_item' => esc_html__( 'View Partnership Type', 'systemorph' ),
			'update_item' => esc_html__( 'Update Partnership Type', 'systemorph' ),
			'add_new_item' => esc_html__( 'Add new Partnership Type', 'systemorph' ),
			'new_item_name' => esc_html__( 'New Partnership Type', 'systemorph' ),
			'parent_item' => esc_html__( 'Parent Partnership Type', 'systemorph' ),
			'parent_item_colon' => esc_html__( 'Parent Partnership Type:', 'systemorph' ),
			'search_items' => esc_html__( 'Search Partnership Types', 'systemorph' ),
			'popular_items' => esc_html__( 'Popular Partnership Types', 'systemorph' ),
			'separate_items_with_commas' => esc_html__( 'Separate Partnership Types with commas', 'systemorph' ),
			'add_or_remove_items' => esc_html__( 'Add or remove Partnership Types', 'systemorph' ),
			'choose_from_most_used' => esc_html__( 'Choose most used Partnership Types', 'systemorph' ),
			'not_found' => esc_html__( 'No Partnership Types found', 'systemorph' ),
			'name' => esc_html__( 'Partnership Types', 'systemorph' ),
			'singular_name' => esc_html__( 'Partnership Type', 'systemorph' ),
		),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => false,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
		'hierarchical' => false,
		'query_var' => true,
		'sort' => true,
		'rewrite' => array(
			'with_front' => false,
		),
	);

	register_taxonomy( 'partnership-type', array( 'partners' ), $args );
}
add_action( 'init', 'sm_register_taxonomy_partnership_type', 0 );

// Taxonomy: Event Timeline
function sm_register_taxonomy_event_timeline() {

	$args = array (
		'label' => esc_html__( 'Event Timelines', 'systemorph' ),
		'labels' => array(
			'menu_name' => esc_html__( 'Event Timelines', 'systemorph' ),
			'all_items' => esc_html__( 'All Event Timelines', 'systemorph' ),
			'edit_item' => esc_html__( 'Edit Event Timeline', 'systemorph' ),
			'view_item' => esc_html__( 'View Event Timeline', 'systemorph' ),
			'update_item' => esc_html__( 'Update Event Timeline', 'systemorph' ),
			'add_new_item' => esc_html__( 'Add new Event Timeline', 'systemorph' ),
			'new_item_name' => esc_html__( 'New Event Timeline', 'systemorph' ),
			'parent_item' => esc_html__( 'Parent Event Timeline', 'systemorph' ),
			'parent_item_colon' => esc_html__( 'Parent Event Timeline:', 'systemorph' ),
			'search_items' => esc_html__( 'Search Event Timelines', 'systemorph' ),
			'popular_items' => esc_html__( 'Popular Event Timelines', 'systemorph' ),
			'separate_items_with_commas' => esc_html__( 'Separate Event Timelines with commas', 'systemorph' ),
			'add_or_remove_items' => esc_html__( 'Add or remove Event Timelines', 'systemorph' ),
			'choose_from_most_used' => esc_html__( 'Choose most used Event Timelines', 'systemorph' ),
			'not_found' => esc_html__( 'No Event Timelines found', 'systemorph' ),
			'name' => esc_html__( 'Event Timelines', 'systemorph' ),
			'singular_name' => esc_html__( 'Event Timeline', 'systemorph' ),
		),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
		'hierarchical' => false,
		'query_var' => true,
		'sort' => false,
		'rewrite' => array(
			'with_front' => false,
			'slug' => 'learn/event',
		),
	);

	register_taxonomy( 'event-timeline', array( 'event' ), $args );
}
add_action( 'init', 'sm_register_taxonomy_event_timeline', 0 );

function sm_register_taxonomy_cs_type() {

	$args = array (
		'label' => esc_html__( 'Types', 'systemorph' ),
		'labels' => array(
			'menu_name' => esc_html__( 'Types', 'systemorph' ),
			'all_items' => esc_html__( 'All Types', 'systemorph' ),
			'edit_item' => esc_html__( 'Edit Type', 'systemorph' ),
			'view_item' => esc_html__( 'View Type', 'systemorph' ),
			'update_item' => esc_html__( 'Update Type', 'systemorph' ),
			'add_new_item' => esc_html__( 'Add new Type', 'systemorph' ),
			'new_item_name' => esc_html__( 'New Type', 'systemorph' ),
			'parent_item' => esc_html__( 'Parent Type', 'systemorph' ),
			'parent_item_colon' => esc_html__( 'Parent Type:', 'systemorph' ),
			'search_items' => esc_html__( 'Search Types', 'systemorph' ),
			'popular_items' => esc_html__( 'Popular Types', 'systemorph' ),
			'separate_items_with_commas' => esc_html__( 'Separate Types with commas', 'systemorph' ),
			'add_or_remove_items' => esc_html__( 'Add or remove Types', 'systemorph' ),
			'choose_from_most_used' => esc_html__( 'Choose most used Types', 'systemorph' ),
			'not_found' => esc_html__( 'No Types found', 'systemorph' ),
			'name' => esc_html__( 'Types', 'systemorph' ),
			'singular_name' => esc_html__( 'Type', 'systemorph' ),
		),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => false,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
		'show_in_rest' => false,
		'hierarchical' => false,
		'query_var' => true,
		'sort' => true,
		'rewrite' => array(
			'with_front' => false,
		),
	);

	register_taxonomy( 'type', array( 'case-studies' ), $args );
}
add_action( 'init', 'sm_register_taxonomy_cs_type', 0 );

function sm_register_taxonomy_team_level() {

	$args = array (
		'label' => esc_html__( 'Levels', 'systemorph' ),
		'labels' => array(
			'menu_name' => esc_html__( 'Levels', 'systemorph' ),
			'all_items' => esc_html__( 'All Levels', 'systemorph' ),
			'edit_item' => esc_html__( 'Edit Level', 'systemorph' ),
			'view_item' => esc_html__( 'View Level', 'systemorph' ),
			'update_item' => esc_html__( 'Update Level', 'systemorph' ),
			'add_new_item' => esc_html__( 'Add new Level', 'systemorph' ),
			'new_item_name' => esc_html__( 'New Level', 'systemorph' ),
			'parent_item' => esc_html__( 'Parent Level', 'systemorph' ),
			'parent_item_colon' => esc_html__( 'Parent Level:', 'systemorph' ),
			'search_items' => esc_html__( 'Search Levels', 'systemorph' ),
			'popular_items' => esc_html__( 'Popular Levels', 'systemorph' ),
			'separate_items_with_commas' => esc_html__( 'Separate Levels with commas', 'systemorph' ),
			'add_or_remove_items' => esc_html__( 'Add or remove Levels', 'systemorph' ),
			'choose_from_most_used' => esc_html__( 'Choose most used Levels', 'systemorph' ),
			'not_found' => esc_html__( 'No Levels found', 'systemorph' ),
			'name' => esc_html__( 'Levels', 'systemorph' ),
			'singular_name' => esc_html__( 'Level', 'systemorph' ),
		),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => false,
		'show_tagcloud' => false,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
		'hierarchical' => false,
		'query_var' => true,
		'sort' => true,
		'rewrite' => array(
			'with_front' => false,
		),
	);

	register_taxonomy( 'level', array( 'management-team' ), $args );
}
add_action( 'init', 'sm_register_taxonomy_team_level', 0 );