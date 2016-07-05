<?php

class JhjCrtc_Shortcode{

	function __construct() {
		$this->add_shortcodes();
	}

	function add_shortcodes() {
		add_shortcode( 'display_crtc', array( $this, 'get_crtc_list' ) );
	}

	function get_crtc_list() {
		return 'the list will go here';
	}
}
