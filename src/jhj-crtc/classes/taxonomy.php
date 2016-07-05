<?php

class JhjCrtc_Taxonomy {

	function __construct() {
		$this->add_actions();
	}

	function add_actions() {
		add_action( 'init', array( $this, 'set_taxonomy' ), 0 );
	}

	function set_taxonomy() {
		// Add new taxonomy, make it non hierarchical (like tags)
		$labels = array(
		'name'                       => _x( 'Categories', 'taxonomy general name' ),
		'singular_name'              => _x( 'Category', 'taxonomy singular name' ),
		'search_items'               => __( 'Search Categories' ),
		'popular_items'              => __( 'Popular Categories' ),
		'all_items'                  => __( 'All Categories' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Category' ),
		'update_item'                => __( 'Update Category' ),
		'add_new_item'               => __( 'Add New Category' ),
		'new_item_name'              => __( 'New Category  Name' ),
		'separate_items_with_commas' => __( 'Separate Categories  with commas' ),
		'add_or_remove_items'        => __( 'Add or remove Categories' ),
		'choose_from_most_used'      => __( 'Choose from the most used Categories' ),
		'not_found'                  => __( 'No Category found.' ),
		'menu_name'                  => __( 'CRTC Categories' ),
		);

		$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'category' ),
		);

		register_taxonomy( 'Category', 'crtc', $args );

	}
}
