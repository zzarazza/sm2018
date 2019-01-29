<?php
add_filter('nav_menu_css_class', function ($classes, $item) {

    // Getting the current post details
    $post = get_queried_object();
    if (isset($post->post_type)) {
        if ($post->post_type == 'post') {
            $current_post_type_slug = get_permalink(get_option('page_for_posts'));
        } else {
            // Getting the post type of the current post
            $current_post_type = get_post_type_object(get_post_type($post->ID));
            $current_post_type_slug = $current_post_type->rewrite['slug'];
        }

        // Getting the URL of the menu item
        $menu_slug = strtolower(trim($item->url));

        // If the menu item URL contains the current post types slug add the current-menu-item class
        if (strpos($menu_slug, $current_post_type_slug) !== false && $item->type !== 'post_type') {
            $classes[] = 'current-menu-item';
        }

    }

    $classes = array_unique($classes);
    // Return the corrected set of classes to be added to the menu item
    return $classes;
}, 10, 4);

add_filter('wp_nav_menu_objects', function ($sorted_menu_items, $args) {
    // check if the current page is really a blog post.
    global $wp_query;
    global $post;
    $current_page = $post;

    if ( !empty($wp_query->queried_object_id) ) {
        if ( $current_page && $current_page->post_type=='post' ){
            //yes!
        } else {
            $current_page = false;
        }
    } else {
        $current_page = false;
    }

    $home_page_id = (int) get_option( 'page_for_posts' );

    foreach ( $sorted_menu_items as $id => $menu_item ){
        if ( ! empty( $home_page_id ) && 'post_type' == $menu_item->type && empty( $wp_query->is_page ) && $home_page_id == $menu_item->object_id ) {
            if ( ! $current_page) {
                foreach ( $sorted_menu_items[$id]->classes as $classid=>$classname ){
                    if( $classname=='current_page_parent' ) {
                        unset($sorted_menu_items[$id]->classes[$classid]);
                    }
                }
            }
        }
    }

    return $sorted_menu_items;
}, 10, 2);

add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
function add_menu_parent_class( $items ) {

    $parents = array();
    foreach ( $items as $item ) {
        $item->classes = apply_filters( 'nav_menu_css_class', array_filter( $item->classes ), $item );
        if ( in_array( 'current-menu-item', $item->classes ) ||
            in_array( 'current_page_parent', $item->classes )
        ) {
            $parents[] = $item->menu_item_parent;
        }
    }

    foreach ( $items as $item ) {
        if ( in_array( $item->ID, $parents ) ) {
            $item->classes[] = 'current-menu-ancestor';
        }

        $item->classes = array_unique($item->classes);
    }

    return $items;
}