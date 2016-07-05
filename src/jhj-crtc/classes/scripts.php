<?php

class JhjCrtc_Scripts {

	public $javascriptpath;
	public $csspath;

	function __construct() {
		$this->javascriptpath = plugin_dir_url( __FILE__ ).'/assets/js/jhj_crtc_custom.js';
		$this->csspath = plugin_dir_url( __FILE__ ).'/assets/css/jhj_crtc_styles.css';
		$this->add_actions();
	}

	function add_actions() {

		add_action( 'load-post-new.php', array( $this, 'load_admin_scripts' ) );
		add_action( 'load-post.php', array( $this, 'load_admin_scripts' ) );
		add_action( 'load-edit.php', array( $this, 'load_admin_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'load_admin_scripts' ) );

	}

	public function load_admin_scripts() {

		if ( function_exists( 'wp_enqueue_media' ) ) {
			wp_enqueue_media();
		} else {
			wp_enqueue_style( 'thickbox' );
			wp_enqueue_script( 'media-upload' );
			wp_enqueue_script( 'thickbox' );
		}
		wp_enqueue_script( 'jquery-ui-slider' );
		wp_enqueue_script( 'jhj_crtc_loadscripts', $this->javascriptpath );
		wp_enqueue_style( 'jhj_crtc_loadstyles', $this->csspath );

	}
}
