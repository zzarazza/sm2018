<?php

add_action( 'template_redirect', 'redirect_post_type_single_partners' );
function redirect_post_type_single_partners(){
    if ( ! is_singular( 'partners' ) )
        return;
    wp_redirect( get_post_type_archive_link( 'partners' ), 301 );
    exit;
}

add_action( 'template_redirect', 'redirect_post_type_single_team' );
function redirect_post_type_single_team(){
    if ( ! is_singular( 'management-team' ) )
        return;
    wp_redirect( get_page_link(get_page_by_path( 'about/management-team', OBJECT, 'page' )), 301 );
    exit;
}

add_action( 'wp_ajax_nopriv_systemorph_white_papers_success', 'white_papers_success');
add_action( 'wp_ajax_systemorph_white_papers_success', 'white_papers_success');

function white_papers_success() {
	$post_id = $_REQUEST['post_id'];
	ob_start();
	include get_template_directory() . '/template-parts/page/content-white_papers_success.php';
	$content = ob_get_clean();

	$link = '';
	$redirect_page = the_systemorph_case_study_link($post_id);
	if ($redirect_page) {
		$link = get_permalink($redirect_page->ID);
	}

    echo json_encode(array( 'link' => $link, 'page' => $redirect_page->post_name, 'content' => $content));
    echo $content;

    wp_die();
}

add_action( 'wp_ajax_nopriv_systemorph_case_studies_success', 'case_studies_success');
add_action( 'wp_ajax_systemorph_case_studies_success', 'case_studies_success');
function case_studies_success() {
		$post_id = $_REQUEST['post_id'];
		$page = $_REQUEST['page_id'];
		$redirect_page = the_systemorph_case_study_link($post_id);
		$link = '';
		if ($redirect_page) {
			$link = get_permalink($redirect_page->ID);
		}

        echo json_encode(array( 'link' => $link, 'page' => $redirect_page->post_name));

        wp_die();
}

add_action( "template_redirect", "redirect_to_case_study" );

function redirect_to_case_study() {
    global $post;

	$is_to_redirect = false;

	$page = $post->post_name;
	$query = new WP_Query(array(
	    'post_type' => 'case-studies',
	    'post_status' => 'publish'
	));

	while ($query->have_posts() && !$is_to_redirect) {
	    $query->the_post();
	    $post_id = get_the_ID();
		$redirect_page = the_systemorph_case_study_link($post_id);
		if ($redirect_page) {
			if ($page == $redirect_page->post_name) {
				$is_to_redirect = true;
			}
		}
	}

	wp_reset_postdata();

    if(!isset($_COOKIE[$page]) && $is_to_redirect) {
		wp_redirect(get_permalink($post_id));
    }
}


add_filter( 'wpcf7_contact_form_properties', 'filter_wpcf7_contact_form_properties', 10, 2); 
function filter_wpcf7_contact_form_properties( $properties, $instance ) { 
    global $post;

	$redirect_page = the_systemorph_case_study_link($post->ID);
	if ($redirect_page && isset($_COOKIE[$redirect_page->post_name])) {
	    $properties = array( 
	    	'form' => '<div class="form-el"><a href="'.get_permalink($redirect_page->ID).'">'.$redirect_page->post_title.'</a></div>'
	    );
	}

    return $properties; 
}; 
        