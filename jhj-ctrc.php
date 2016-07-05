<?php
/*
Plugin Name: JHJ CRTC
Plugin URI: http://jeremyjosey.com/
Description: This plugin allows for a custom post type to be created which manages all CRTC notices for Newcap Radio
Version: 1
Author: jeremy josey
Author URI: http://jeremyjosey.com/
License: GPLv2 or later
Text Domain: jhjcrtc
*/

// Setup class autoloader
require_once dirname( __FILE__ ) . '/src/jhj-crtc/autoloader.php';
//require the plugin wrapper
require_once dirname( __FILE__ ) . '/src/jhj-crtc/plugin.php';
//Register the autoloader
Jhj_Crtc_Autoloader::register();
//Create plugin wrapper
$jhj_crtc_plugin = new JhjCrtc_Plugin( __FILE__ );

add_action( 'wp_loaded', array( $jhj_crtc_plugin, 'load' ) );
