<?php
/**
 * Accessibility Checker Plugin.
 *
 * @package Enable_Contributor_Uploads
 * @link    https://a11ychecker.com
 * @since   1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:       Enable Contributor Uploads
 * Plugin URI:        https://equalizedigital.com
 * Description:       Allows users with the contributor role to upload images.
 * Version:           1.1.0
 * Author:            Equalize Digital
 * Author URI:        https://equalizedigital.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       enable-contributor-uploads
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Class EnableContributorUploads
 *
 * Main plugin class.
 */
class EnableContributorUploads {
    
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
        register_activation_hook( __FILE__, [ $this, 'activate' ] );
        register_deactivation_hook( __FILE__, [ $this, 'deactivate' ] );
        add_action( 'init', [ $this, 'load_textdomain' ] );
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
        load_plugin_textdomain( 'enable-contributor-uploads', false, basename( dirname( __FILE__ ) ) . '/languages' );
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

// Instantiating the class and calling the init method in one line.
( new EnableContributorUploads() )->init();
