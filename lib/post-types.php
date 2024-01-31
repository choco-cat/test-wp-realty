<?php

function register_post_types() {
	$labels = [
		'name'                     => __( 'Realty', THEME_TEXTDOMAIN ),
		'singular_name'            => __( 'Realty', THEME_TEXTDOMAIN ),
		'menu_name'                => __( 'Realty', THEME_TEXTDOMAIN ),
		'all_items'                => __( 'All Realty', THEME_TEXTDOMAIN ),
		'add_new'                  => __( 'Add New', THEME_TEXTDOMAIN ),
		'add_new_item'             => __( 'Add New Realty', THEME_TEXTDOMAIN ),
		'edit_item'                => __( 'Edit Realty', THEME_TEXTDOMAIN ),
		'new_item'                 => __( 'New Realty', THEME_TEXTDOMAIN ),
		'view_item'                => __( 'View Realty', THEME_TEXTDOMAIN ),
		'view_items'               => __( 'View Realty', THEME_TEXTDOMAIN ),
		'search_items'             => __( 'Search Realty', THEME_TEXTDOMAIN ),
		'not_found'                => __( 'No Realty Found', THEME_TEXTDOMAIN ),
		'not_found_in_trash'       => __( 'No Realty Found in Trash', THEME_TEXTDOMAIN ),
		'featured_image'           => __( 'Featured Image for This Realty', THEME_TEXTDOMAIN ),
		'set_featured_image'       => __( 'Set Featured Image for This Realty', THEME_TEXTDOMAIN ),
		'remove_featured_image'    => __( 'Remove Featured Image for This Realty', THEME_TEXTDOMAIN ),
		'use_featured_image'       => __( 'Use As Featured Image for This Realty', THEME_TEXTDOMAIN ),
		'archives'                 => __( 'Realty Archives', THEME_TEXTDOMAIN ),
		'insert_into_item'         => __( 'Insert into Realty', THEME_TEXTDOMAIN ),
		'uploaded_to_this_item'    => __( 'Upload to This Realty', THEME_TEXTDOMAIN ),
		'filter_items_list'        => __( 'Filter Realty list', THEME_TEXTDOMAIN ),
		'items_list_navigation'    => __( 'Realty List Navigation', THEME_TEXTDOMAIN ),
		'items_list'               => __( 'Realty List', THEME_TEXTDOMAIN ),
		'attributes'               => __( 'Realty Attributes', THEME_TEXTDOMAIN ),
		'name_admin_bar'           => __( 'Realty', THEME_TEXTDOMAIN ),
		'item_published'           => __( 'Realty Published', THEME_TEXTDOMAIN ),
		'item_published_privately' => __( 'Realty Published Privately.', THEME_TEXTDOMAIN ),
		'item_reverted_to_draft'   => __( 'Realty Reverted to Draft.', THEME_TEXTDOMAIN ),
		'item_scheduled'           => __( 'Realty Scheduled', THEME_TEXTDOMAIN ),
		'item_updated'             => __( 'Realty Updated.', THEME_TEXTDOMAIN ),
		'parent_item_colon'        => __( 'Parent Realty:', THEME_TEXTDOMAIN ),
	];

	$args = [
		'label'                 => __( 'Realty', THEME_TEXTDOMAIN ),
		'labels'                => $labels,
		'description'           => '',
		'public'                => true,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'rest_base'             => '',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'has_archive'           => false,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'delete_with_user'      => false,
		'exclude_from_search'   => false,
		'capability_type'       => 'post',
		'map_meta_cap'          => true,
		'hierarchical'          => false,
		'rewrite'               => [ 'slug' => 'realty', 'with_front' => true ],
		'query_var'             => true,
		'supports'              => [ 'title', 'thumbnail', 'editor', 'revisions' ],
		'menu_icon'             => 'dashicons-admin-home',
	];

	register_post_type( 'realty', $args );
}

add_action( 'init', 'register_post_types' );
