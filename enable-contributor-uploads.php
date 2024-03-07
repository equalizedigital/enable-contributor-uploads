<?php // phpcs:ignore WordPress.Files.FileName.InvalidClassFileName -- Single class in this file.
/**
 * Enable Contributor Uploads.
 *
 * @package Enable_Contributor_Uploads
 * @link    https://equalizedigital.com
 * @since   1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:       Enable Contributor Uploads
 * Plugin URI:        https://equalizedigital.com
 * Description:       Allows users with the contributor role to upload images.
 * Version:           1.2.0
 * Author:            Equalize Digital
 * Author URI:        https://equalizedigital.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       enable-contributor-uploads
 */

use EDECU\Inc\Plugin;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Plugin Root File.
if ( ! defined( 'EDECU_PLUGIN_FILE' ) ) {
	define( 'EDECU_PLUGIN_FILE', __FILE__ );
}

// Autoloads classes from the 'inc' directory.
if ( file_exists( plugin_dir_path( __FILE__ ) . 'vendor/autoload.php' ) ) {
	include_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';
}

// Initialize the plugin.
if ( class_exists( 'EDECU\Inc\Plugin' ) ) {
	( new Plugin() )->init();
}
