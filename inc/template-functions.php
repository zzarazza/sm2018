<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package WordPress
 * @subpackage Systemorph_2018
 * @since 1.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function systemorph_body_classes( $classes ) {
	// Add class of group-blog to blogs with more than 1 published author.

	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Add class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add class if we're viewing the Customizer for easier styling of theme options.
	if ( is_customize_preview() ) {
		$classes[] = 'systemorph-customizer';
	}

	// Add class on front page.
	if ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
		$classes[] = 'systemorph-front-page';
	}

	// Add class if sidebar is used.
	if ( is_active_sidebar( 'sidebar-1' ) && ! is_page() ) {
		$classes[] = 'has-sidebar';
	}

	if ( is_page() ) {
		$classes[] = 'page-' . get_post_field( 'post_name');
	}

	$classes[] = rwmb_meta( 'page_settings_custom_class' );

	return $classes;
}
add_filter( 'body_class', 'systemorph_body_classes' );

/**
 * Count our number of active panels.
 *
 * Primarily used to see if we have any panels active, duh.
 */
function systemorph_panel_count() {

	$panel_count = 0;

	/**
	 * Filter number of front page sections in Systemorph 2018.
	 *
	 * @since Systemorph 2018 1.0
	 *
	 * @param int $num_sections Number of front page sections.
	 */
	$num_sections = apply_filters( 'systemorph_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		if ( get_theme_mod( 'panel_' . $i ) ) {
			$panel_count++;
		}
	}

	return $panel_count;
}

/**
 * Checks to see if we're on the front page or not.
 */
function systemorph_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}
