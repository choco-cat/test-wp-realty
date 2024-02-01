<?php

function register_post_types() {
	/**
	 * Realty Post Type
	 */
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
		'uploaded_to_this_item'    => __( 'Upload to This Realty', THEME_TEXTDOMAIN ),
		'filter_items_list'        => __( 'Filter Realty list', THEME_TEXTDOMAIN ),
		'items_list_navigation'    => __( 'Realty List Navigation', THEME_TEXTDOMAIN ),
		'items_list'               => __( 'Realty List', THEME_TEXTDOMAIN ),
		'attributes'               => __( 'Realty Attributes', THEME_TEXTDOMAIN ),
		'name_admin_bar'           => __( 'Realty', THEME_TEXTDOMAIN ),
		'item_published'           => __( 'Realty Published', THEME_TEXTDOMAIN ),
		'item_published_privately' => __( 'Realty Published Privately', THEME_TEXTDOMAIN ),
		'item_reverted_to_draft'   => __( 'Realty Reverted to Draft', THEME_TEXTDOMAIN ),
		'item_scheduled'           => __( 'Realty Scheduled', THEME_TEXTDOMAIN ),
		'item_updated'             => __( 'Realty Updated', THEME_TEXTDOMAIN ),
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
		'menu_icon'             => 'dashicons-admin-multisite',
	];

	register_post_type( 'realty', $args );

	/**
	 * Realty Type Taxonomy
	 */
	$labels = [
		'name'          => _x( 'Realty Types', 'taxonomy general name', THEME_TEXTDOMAIN ),
		'singular_name' => _x( 'Realty Type', 'taxonomy singular name', THEME_TEXTDOMAIN ),
		'search_items'  => __( 'Search Realty Types', THEME_TEXTDOMAIN ),
		'all_items'     => __( 'All Realty Types', THEME_TEXTDOMAIN ),
		'edit_item'     => __( 'Edit Realty Type', THEME_TEXTDOMAIN ),
		'update_item'   => __( 'Update Realty Type', THEME_TEXTDOMAIN ),
		'add_new_item'  => __( 'Add New Realty Type', THEME_TEXTDOMAIN ),
		'new_item_name' => __( 'New Realty Type', THEME_TEXTDOMAIN ),
		'menu_name'     => __( 'Realty Types', THEME_TEXTDOMAIN )
	];

	$args = [
		'labels'             => $labels,
		'public'             => false,
		'publicly_queryable' => false,
		'query_var'          => true,
		'show_in_nav_menus'  => true,
		'show_in_rest'       => true,
		'show_ui'            => true,
		'show_tagcloud'      => false,
		'show_admin_column'  => true,
		'supports'           => [ 'title' ],
		'rewrite'            => [
			'slug' => 'realty_type',
		],
		'hierarchical'       => true,
	];

	register_taxonomy( 'realty_type', 'realty', $args );

	/**
	 * City Post Type
	 */
	$labels = [
		'name'                     => __( 'City', THEME_TEXTDOMAIN ),
		'singular_name'            => __( 'City', THEME_TEXTDOMAIN ),
		'menu_name'                => __( 'Cities', THEME_TEXTDOMAIN ),
		'all_items'                => __( 'All Cities', THEME_TEXTDOMAIN ),
		'add_new'                  => __( 'Add New', THEME_TEXTDOMAIN ),
		'add_new_item'             => __( 'Add New City', THEME_TEXTDOMAIN ),
		'edit_item'                => __( 'Edit City', THEME_TEXTDOMAIN ),
		'new_item'                 => __( 'New City', THEME_TEXTDOMAIN ),
		'view_item'                => __( 'View City', THEME_TEXTDOMAIN ),
		'view_items'               => __( 'View City', THEME_TEXTDOMAIN ),
		'search_items'             => __( 'Search City', THEME_TEXTDOMAIN ),
		'not_found'                => __( 'No City Found', THEME_TEXTDOMAIN ),
		'not_found_in_trash'       => __( 'No City Found in Trash', THEME_TEXTDOMAIN ),
		'featured_image'           => __( 'Featured Image for This City', THEME_TEXTDOMAIN ),
		'set_featured_image'       => __( 'Set Featured Image for This City', THEME_TEXTDOMAIN ),
		'remove_featured_image'    => __( 'Remove Featured Image for This City', THEME_TEXTDOMAIN ),
		'use_featured_image'       => __( 'Use As Featured Image for This City', THEME_TEXTDOMAIN ),
		'filter_items_list'        => __( 'Filter Cities list', THEME_TEXTDOMAIN ),
		'items_list_navigation'    => __( 'Cities List Navigation', THEME_TEXTDOMAIN ),
		'items_list'               => __( 'Cities List', THEME_TEXTDOMAIN ),
		'name_admin_bar'           => __( 'City', THEME_TEXTDOMAIN ),
		'item_published'           => __( 'City Published', THEME_TEXTDOMAIN ),
		'item_published_privately' => __( 'City Published Privately', THEME_TEXTDOMAIN ),
		'item_scheduled'           => __( 'City Scheduled', THEME_TEXTDOMAIN ),
		'item_updated'             => __( 'City Updated', THEME_TEXTDOMAIN ),
	];

	$args = [
		'label'                 => __( 'Cities', THEME_TEXTDOMAIN ),
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
		'rewrite'               => [ 'slug' => 'city', 'with_front' => true ],
		'query_var'             => true,
		'supports'              => [ 'title', 'thumbnail', 'editor' ],
		'menu_icon'             => 'dashicons-location',
	];

	register_post_type( 'city', $args );
}

add_action( 'init', 'register_post_types' );


function add_city_metabox() {
	add_meta_box(
		'city_metabox',
		__( 'City', THEME_TEXTDOMAIN ),
		'render_city_metabox',
		'realty',
		'side',
		'default'
	);
}

add_action( 'add_meta_boxes', 'add_city_metabox' );

function render_city_metabox( $post ) {
	$selected_city = get_post_meta( $post->ID, '_selected_city', true );
	$cities        = get_posts( array( 'post_type' => 'city', 'posts_per_page' => - 1 ) );

	echo '<select id="selected_city" name="selected_city">';
	echo '<option value="">' . __( 'Select a City', THEME_TEXTDOMAIN ) . '</option>';

	foreach ( $cities as $city ) {
		echo '<option value="' . $city->ID . '" ' . selected( $selected_city, $city->ID, false ) . '>' . esc_html( $city->post_title ) . '</option>';
	}

	echo '</select>';
}

function save_city_metabox( $post_id ) {
	if ( isset( $_POST['selected_city'] ) ) {
		update_post_meta( $post_id, '_selected_city', sanitize_text_field( $_POST['selected_city'] ) );
	}
}

add_action( 'save_post', 'save_city_metabox' );
