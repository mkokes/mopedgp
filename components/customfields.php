<?php
add_action( 'init', 'cptui_register_my_cpts' );
function cptui_register_my_cpts() {
	$labels = array(
		"name" => "Sponsors",
		"singular_name" => "Sponsor",
		);

	$args = array(
		"labels" => $labels,
    'menu_icon' => 'dashicons-smiley',
		"description" => "Directory listing of the event\'s sponsors",
		"public" => true,
		"show_ui" => true,
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "sponsor", "with_front" => true ),
		"query_var" => true,

		"supports" => array( "title", "editor", "excerpt", "revisions", "thumbnail" ),
	);
	register_post_type( "sponsor", $args );

// End of cptui_register_my_cpts()
}
//Advanced Custom Fields
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_sponsor-fields',
		'title' => 'Sponsor Fields',
		'fields' => array (
			array (
				'key' => 'field_55cbb49b6051e',
				'label' => 'Description',
				'name' => 'description',
				'type' => 'wysiwyg',
				'instructions' => 'Enter in some information that describes who the sponsor is and what they do.',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'no',
			),
			array (
				'key' => 'field_55cbb2ba6051a',
				'label' => 'Website',
				'name' => 'website',
				'type' => 'text',
				'instructions' => 'If the sponsor has a website you can enter it here, be sure to include the http://',
				'default_value' => '',
				'placeholder' => 'http://www.example.com',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55cbb37e6051b',
				'label' => 'Facebook',
				'name' => 'facebook',
				'type' => 'text',
				'instructions' => 'If the sponsor has a facebook page enter it here. be sure to include the http://',
				'default_value' => '',
				'placeholder' => 'http://facebook.com/bonertown',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55cbb3fb6051c',
				'label' => 'Twitter',
				'name' => 'twitter',
				'type' => 'text',
				'instructions' => 'If the sponsor has a twitter account you can enter it here, be sure to enter the http://',
				'default_value' => '',
				'placeholder' => 'http://twitter.com/bonertown',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'sponsor',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => '',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'slug',
				8 => 'author',
				9 => 'format',
				10 => 'categories',
				11 => 'tags',
				12 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
}

?>
