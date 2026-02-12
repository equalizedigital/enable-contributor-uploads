<?php
/*
Plugin Name: Enable Contributor Uploads
Description: Allows users with the contributor role to upload images.
Version:     1.2.0
Author:      Equalize Digital
Author URI:  http://www.equalizedigital.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: enable-contributor-uploads
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Add upload capability to contributors on plugin activation.
 *
 * This function grants the 'upload_files' capability to users with the
 * contributor role, allowing them to upload files to the media library.
 * If the contributor role does not exist, the function will return early
 * without making any changes.
 *
 * @since 1.0.0
 */
function edecu_install() {
	$contributor = get_role( 'contributor' );
	if ( $contributor ) {
		$contributor->add_cap( 'upload_files' );
	}
}
register_activation_hook( __FILE__, 'edecu_install' );

/**
 * Remove upload capability from contributors on plugin deactivation.
 *
 * This function revokes the 'upload_files' capability from users with the
 * contributor role, restoring the default WordPress permissions.
 * If the contributor role does not exist, the function will return early
 * without making any changes.
 *
 * @since 1.0.0
 */
function edecu_deactivation() {
	$contributor = get_role( 'contributor' );
	if ( $contributor ) {
		$contributor->remove_cap( 'upload_files' );
	}
}
register_deactivation_hook( __FILE__, 'edecu_deactivation' );
