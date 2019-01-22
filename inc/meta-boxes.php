<?php

function the_systemorph_address() {
	$rwmbMeta = rwmb_meta( 'sm_address_group', array( 'object_type' => 'setting' ), 'sm_preferences' );
	$address = join(' ', $rwmbMeta);

	echo "<address>$address</address>";
}

function the_systemorph_contact_phone() {
	$rwmbMeta = rwmb_meta( 'sm_contact_info', array( 'object_type' => 'setting' ), 'sm_preferences' );
 	echo "<span class=\"tel\">" . $rwmbMeta["sm_contact_phone"] . "</span> ";
}

function the_systemorph_contact_email() {
	$rwmbMeta = rwmb_meta( 'sm_contact_info', array( 'object_type' => 'setting' ), 'sm_preferences' );
 	echo "<a class=\"email\" href=\"mailto:" . $rwmbMeta["sm_contact_email"] . "\">"  . $rwmbMeta["sm_contact_email"] . "</a> ";
}

function the_systemorph_contact_info() {
	the_systemorph_contact_phone();
	the_systemorph_contact_email();
}

function the_systemorph_page_prefix () {
	$menu_items = wp_get_nav_menu_items( 'menu' );
	$current_item = current( wp_filter_object_list( $menu_items, array( 'object_id' => get_queried_object_id() ) ) );
	$title = get_the_title();

	if ( strcasecmp( $current_item->title, $title) != 0 ) {
		echo '<h4 class="page-prefix">' . $current_item->title . '</h4>';
	}
}

function the_systemorph_page_subtitle() {
	$rwmbMeta = rwmb_meta( 'page_settings_subtitle');
	if ($rwmbMeta) :
 		echo "<h2 class=\"page-subtitle\">$rwmbMeta</h2>";
 	endif;
}

function the_systemorph_more_info() {
	$rwmbMeta = rwmb_meta( 'sm_more_info', array( 'object_type' => 'setting' ), 'sm_preferences' );
	if ($rwmbMeta) :
		echo "<div class=\"footer-extra-block sm-more-info has-icon\">";
			echo "<i class=\"icon icon-info-primary icon-bcolor-light-gray\"></i>";
			echo "<h3>" . $rwmbMeta["sm_more_info_headline"] . "</h3>";
			echo "<p>" . $rwmbMeta["sm_more_info_text"] . "</p>";
			echo "<a href=\"" . get_permalink($rwmbMeta["sm_more_info_link_to_page"]) . "\" class=\"button\">" . $rwmbMeta["sm_more_info_button_text"] . "</a>";
		echo "</div>";
	endif;
}

function the_systemorph_get_in_touch() {
	$rwmbMeta = rwmb_meta( 'sm_get_in_touch', array( 'object_type' => 'setting' ), 'sm_preferences' );
	if ($rwmbMeta) :
		echo "<div class=\"footer-extra-block sm-get-in-touch has-icon icon-email\">";
			echo "<i class=\"icon icon-email-primary icon-bcolor-light-gray\"></i>";
			echo "<h3>" . $rwmbMeta["sm_get_in_touch_headline"] . "</h3>";
			echo "<p>" . $rwmbMeta["sm_get_in_touch_text"] . "</p>";
			echo "<a href=\"" . get_permalink($rwmbMeta["sm_get_in_touch_link_to_page"]) . "\" class=\"button\">" . $rwmbMeta["sm_get_in_touch_button_text"] . "</a>";
		echo "</div>";
	endif;
}

function the_systemorph_footer_extra() {
	the_systemorph_more_info();
	the_systemorph_get_in_touch();
}

function the_systemorph_page_attachment($post_id = null) {
	$rwmbMeta = rwmb_meta( 'sm_page_file_attachment', null, $post_id);
	$output = "";

	if ($rwmbMeta) :
 		foreach ( $rwmbMeta as $file ) {
    		$output = "<a class=\"sm-file-upload\" href=\"" . $file['url'] . "\">" . $file['title'] . "</a>";
		}
 	endif;

 	echo $output;
}

function the_systemorph_case_study_link($post_id = null) {
	$rwmbMeta = rwmb_meta( 'sm_case_study_link', null, $post_id);

	if ($rwmbMeta) :
		return $page = get_page($rwmbMeta);
 	endif;

 	echo null;
}

function the_systemorph_return_page_link($post_id = null) {
	$rwmbMeta = rwmb_meta( 'sm_return_page_link', null, $post_id);

	if ($rwmbMeta) :
		return $page = get_page($rwmbMeta);
 	endif;

 	echo null;
}


function the_systemorph_event_location($post_id = null) {
	$rwmbMeta = rwmb_meta( 'event_location', null, $post_id);
	$output = "";

	if ($rwmbMeta) :
		$output .= $rwmbMeta;
 	endif;

 	return $output;
}

function the_systemorph_event_dates($post_id = null) {
	$output = "";

	$rwmbMeta = rwmb_meta( 'event_dates', null, $post_id);

	if ( ! empty($rwmbMeta) ) :
		if (count($rwmbMeta) > 1) {
			$output = jb_verbose_date_range($rwmbMeta['event_date_start']['timestamp'], $rwmbMeta['event_date_end']['timestamp']);
		} else {
			if ( isset($rwmbMeta['event_date_end']['timestamp']) ) {
				$output = jb_verbose_date_range($rwmbMeta['event_date_end']['timestamp']);
			}

			if ( isset($rwmbMeta['event_date_start']['timestamp']) ) {
				$output = jb_verbose_date_range($rwmbMeta['event_date_start']['timestamp']);
			}
		}
 	endif;

 	return $output;
}

if ( ! function_exists( 'get_systemorph_author_title' ) ) :
	function get_systemorph_author_title() {
		global $post;

		$output = "";

		$meta = rwmb_the_value( 'user_meta_title',  array( 'object_type' => 'user' ), $post->post_author, false );
		// var_dump($meta);

		if ($meta) :
			$output .= $meta . ' ';
		endif;

		return $output;
	}
endif;
