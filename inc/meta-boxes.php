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
 	echo "<a class=\"email\" href=\"mailto:\"" . $rwmbMeta["sm_contact_email"] . "\">"  . $rwmbMeta["sm_contact_email"] . "</a> ";
}

function the_systemorph_contact_info() {
	the_systemorph_contact_phone();
	the_systemorph_contact_email();
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