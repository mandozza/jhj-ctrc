<?php

class JhjCrtc_Cpt{

	public function __construct() {
		self::set_actions();
	}

	function set_actions() {
		add_action( 'init', array( $this, 'set_post_type' ) );
	}

	function set_post_type() {
		$labels = array(
		'name'               => __( 'CRTC Notices', 'post type general name' ),
		'singular_name'      => __( 'CRTC Notice', 'post type singular name' ),
		'add_new'            => __( 'Add CRTC Notice', 'CRTC Notice' ),
		'add_new_item'       => __( 'Add CRTC Notice' ),
		'edit_item'          => __( 'Edit CRTC Notice' ),
		'new_item'           => __( 'New CRTC Notice' ),
		'all_items'          => __( 'All CRTC Notices' ),
		'view_item'          => __( 'View CRTC Notice' ),
		'search_items'       => __( 'Search CRTC Notices' ),
		'not_found'          => __( 'No CRTC Notice found' ),
		'not_found_in_trash' => __( 'No CRTC Notice found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'CRTC Notices',
		);
		$args = array(
		'labels'        => $labels,
		'description'   => 'Holds CRTC Notices',
		'public'        => false,
		'publicly_queriable' => false,
		'exclude_from_search' => true,
		'show_ui' => true,
		'menu_icon' => 'dashicons-images-alt',
		'menu_position' => 6,
		'supports'      => array( 'title' ),
		'has_archive'   => false,
		'rewrite' => false,
		);

		register_post_type( 'crtc', $args );
	}
}

