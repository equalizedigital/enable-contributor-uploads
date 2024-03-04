<?php
/**
 * Class file for the Accessibility Checker plugin.
 *
 * @package Accessibility_Checker
 */

namespace EDECU\Inc;

/**
 * Class Plugin
 *
 * Main plugin functionality class.
 */
class Plugin {
	
	/**
	 * Constructor.
	 */
	public function __construct() {
		// Intentionally left blank.
	}

	/**
	 * Initialize the plugin.
	 *
	 * Registers activation and deactivation hooks, and adds action to load text domain.
	 */
	public function init() {
		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );
		add_action( 'init', array( $this, 'load_textdomain' ) );
	}

	/**
	 * Handles tasks to perform upon plugin activation.
	 *
	 * Adds the 'upload_files' capability to the 'contributor' role.
	 */
	public function activate() {
		$contributor = get_role( 'contributor' );
		if ( null !== $contributor ) {
			$contributor->add_cap( 'upload_files' );
		}
	}

	/**
	 * Handles tasks to perform upon plugin deactivation.
	 *
	 * Removes the 'upload_files' capability from the 'contributor' role.
	 */
	public function deactivate() {
		$contributor = get_role( 'contributor' );
		if ( null !== $contributor ) {
			$contributor->remove_cap( 'upload_files' );
		}
	}

	/**
	 * Load the plugin text domain for translation.
	 */
	public function load_textdomain() {
		load_plugin_textdomain( 'enable-contributor-uploads', false, basename( __DIR__ ) . '/languages' );
	}

	/**
	 * Handles tasks to perform upon plugin uninstallation.
	 *
	 * Removes the 'upload_files' capability from the 'contributor' role.
	 * Note: This method should be called statically and is intended for registration with register_uninstall_hook.
	 */
	public static function uninstall() {
		$contributor = get_role( 'contributor' );
		if ( null !== $contributor ) {
			$contributor->remove_cap( 'upload_files' );
		}
	}
}
