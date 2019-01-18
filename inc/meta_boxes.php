<?php

add_filter( 'rwmb_meta_boxes', 'sm_register_meta_boxes' );
function sm_register_meta_boxes( $meta_boxes ) {
	// Team preferences
	$meta_boxes[] = array (
		'title' => 'Team preferences',
		'id' => 'team-preferences',
		'post_types' => array(
			'management-team',
		),
		'context' => 'side',
		'priority' => 'high',
		'fields' => array(

			array (
				'id' => 'team_member_position',
				'type' => 'text',
				'name' => 'Position',
				'size' => 30,
				'columns' => 1,
			),
		),
	);

	// Homepage preferences
	$meta_boxes[] = array (
		'title' => 'Homepage preferences',
		'id' => 'home_hero_prefs',
		'post_types' => array(
			'page',
		),
		'context' => 'side',
		'priority' => 'high',
		'fields' => array(

			array (
				'id' => 'home_hero_subtitle',
				'type' => 'text',
				'name' => 'Sub title',
			),

			array (
				'id' => 'home_hero_link',
				'type' => 'post',
				'name' => 'Link to...',
				'post_type' =>
				array (
					0 => 'page',
					1 => 'case-studies',
				),
				'field_type' => 'select_advanced',
			),

			array (
				'id' => 'home_hero_button_caption',
				'type' => 'text',
				'name' => 'Button caption',
				'std' => 'Get to know',
			),
		),
		'include' => array(
			'relation' => 'OR',
			'slug' => 'homepage',
		),
	);

	// Systemorph
	$meta_boxes[] = array (
		'title' => 'Systemorph',
		'id' => 'sm_settings',
		'fields' => array(

			array (
				'id' => 'heading_4',
				'type' => 'heading',
				'name' => 'Contact info',
			),

			array (
				'id' => 'sm_address_group',
				'type' => 'group',
				'name' => 'Address',
				'fields' =>
				array (
					0 =>
					array (
						'id' => 'sm_address_street',
						'type' => 'text',
						'name' => 'Street',
					),
					1 =>
					array (
						'id' => 'sm_address_postcode',
						'type' => 'text',
						'name' => 'Postcode',
					),
					2 =>
					array (
						'id' => 'sm_address_city',
						'type' => 'text',
						'name' => 'City',
					),
				),
				'default_state' => 'expanded',
			),

			array (
				'id' => 'sm_contact_info',
				'type' => 'group',
				'name' => 'Contact',
				'fields' =>
				array (
					0 =>
					array (
						'id' => 'sm_contact_phone',
						'type' => 'text',
						'name' => 'Phone',
					),
					1 =>
					array (
						'id' => 'sm_contact_email',
						'name' => 'Email',
						'type' => 'email',
					),
				),
				'default_state' => 'expanded',
			),

			array (
				'id' => 'heading_3',
				'type' => 'heading',
				'name' => 'Footer extra',
			),

			array (
				'id' => 'sm_more_info',
				'type' => 'group',
				'name' => 'More Info',
				'fields' =>
				array (
					0 =>
					array (
						'id' => 'sm_more_info_headline',
						'type' => 'text',
						'name' => 'Headline',
					),
					1 =>
					array (
						'id' => 'sm_more_info_text',
						'type' => 'textarea',
						'name' => 'Text',
					),
					2 =>
					array (
						'id' => 'sm_more_info_link_to_page',
						'type' => 'post',
						'name' => 'Link to page',
						'post_type' =>
						array (
							0 => 'page',
							1 => 'case-studies',
						),
						'field_type' => 'select_advanced',
					),
					3 =>
					array (
						'id' => 'sm_more_info_button_text',
						'type' => 'text',
						'name' => 'Button label',
						'std' => 'Get information',
					),
				),
				'default_state' => 'expanded',
			),

			array (
				'id' => 'divider_7',
				'type' => 'divider',
				'name' => 'Divider',
			),

			array (
				'id' => 'sm_get_in_touch',
				'type' => 'group',
				'name' => 'Get in touch',
				'fields' =>
				array (
					0 =>
					array (
						'id' => 'sm_get_in_touch_headline',
						'type' => 'text',
						'name' => 'Headline',
					),
					1 =>
					array (
						'id' => 'sm_get_in_touch_text',
						'type' => 'textarea',
						'name' => 'Text',
					),
					2 =>
					array (
						'id' => 'sm_get_in_touch_link_to_page',
						'type' => 'post',
						'name' => 'Link to page',
						'post_type' =>
						array (
							0 => 'page',
							1 => 'case-studies',
						),
						'field_type' => 'select_advanced',
					),
					3 =>
					array (
						'id' => 'sm_get_in_touch_button_text',
						'type' => 'text',
						'name' => 'Button label',
						'std' => 'Contact us',
					),
				),
				'default_state' => 'expanded',
			),
		),
		'settings_pages' => array(
			'sm-preferences',
		),
	);

	// Page settings
	$meta_boxes[] = array (
		'title' => 'Page settings',
		'id' => 'page_settings',
		'post_types' => array(
			'page',
			'case-studies',
		),
		'context' => 'side',
		'priority' => 'high',
		'fields' => array(

			array (
				'id' => 'page_settings_custom_class',
				'type' => 'text',
				'name' => 'Custom CSS class',
			),

			array (
				'id' => 'page_settings_subtitle',
				'type' => 'text',
				'name' => 'Page subtitle',
			),
		),
		'style' => 'seamless',
	);

	// Partner settings
	$meta_boxes[] = array (
		'title' => 'Partner settings',
		'id' => 'partner_settings',
		'post_types' => array(
			'partners',
		),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(

			array (
				'id' => 'partner_logo',
				'type' => 'single_image',
				'name' => 'Logo',
			),
		),
	);

	$meta_boxes[] = array (
		'title' => 'File attachment',
		'id' => 'sm_file_attachment',
		'post_types' => array(
			'page',
			'case-studies',
		),
		'context' => 'side',
		'priority' => 'high',
		'fields' => array(

			array (
				'id' => 'sm_page_file_attachment',
				'type' => 'file_advanced',
				'name' => 'File attachment',
				'max_file_uploads' => 1,
			),
		),
		'style' => 'seamless',
	);

	$meta_boxes[] = array (
		'title' => 'Full case study link',
		'id' => 'link-to-the-post',
		'post_types' => array(
			'case-studies',
		),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(

			array (
				'id' => 'sm_case_study_link',
				'type' => 'post',
				'name' => 'Case Study',
				'post_type' =>
				array (
					0 => 'case-studies',
				),
				'field_type' => 'select_advanced',
			),
		),
		'style' => 'seamless',
	);

	// Event Info
	$meta_boxes[] = array (
		'title' => 'Event Info',
		'id' => 'event_info',
		'post_types' => array(
			'event',
		),
		'context' => 'side',
		'priority' => 'high',
		'autosave' => true,
		'fields' => array(

			array (
				'id' => 'event_location',
				'type' => 'text',
				'name' => 'Location',
			),

			array (
				'id' => 'event_dates',
				'type' => 'group',
				'name' => 'Date(s)',
				'fields' =>
				array (
					0 =>
					array (
						'id' => 'event_date_start',
						'type' => 'date',
						'name' => 'Start',
						'required' => 1,
						'timestamp' => 1,
					),
					1 =>
					array (
						'id' => 'event_date_end',
						'type' => 'date',
						'name' => 'End',
						'timestamp' => 1,
					),
				),
				'default_state' => 'expanded',
			),

			array (
				'id' => 'divider_4',
				'type' => 'divider',
				'name' => 'Divider',
			),

			array (
				'id' => 'event_speakers',
				'type' => 'post',
				'name' => 'Speakers',
				'post_type' =>
				array (
					0 => 'management-team',
				),
				'field_type' => 'select_advanced',
				'multiple' => true,
			),
		),
		'style' => 'seamless',
	);

	return $meta_boxes;
} // sm_register_meta_boxes