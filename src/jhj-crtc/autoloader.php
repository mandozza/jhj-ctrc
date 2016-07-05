<?php
/**
 * Autoloads Jhj-CRTC classes using WordPress convention.
 *
 * @author Jeremy Josey
 */
class Jhj_Crtc_Autoloader
{
	/**
	 * Registers MyPlugin_Autoloader as an SPL autoloader.
	 *
	 * @param boolean $prepend
	 */
	public static function register( $prepend = false ) {
	    if ( version_compare( phpversion(), '5.3.0', '>=' ) ) {
	        spl_autoload_register( array( new self, 'autoload' ), true, $prepend );
	    } else {
	        spl_autoload_register( array( new self, 'autoload' ) );
	    }
	}

	/**
	 * Handles autoloading of News classes.
	 *
	 * @param string $class
	 */
	public static function autoload( $class ) {

	    $class = strtolower( $class );

	    if ( 0 !== strpos( $class, 'jhjcrtc' ) ) {
	        return;
	    }

		if ( is_file( $file = dirname( __FILE__ ).'/classes/'.str_replace( 'jhjcrtc_', '' , $class ).'.php' ) ) {
			require $file;
		}
	}
}
