<?php
/*
Plugin Name: Enable Contributor Uploads
Description: Allows users with the contributor role to upload images.
Version:     1.1
Author:      Road Warrior Creative
Author URI:  http://www.roadwarriorcreative.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Add upload capability to contributors on plugin install
function rwc_allow_contributor_uploads_install() {
	$contributor = get_role('contributor');
	$contributor->add_cap('upload_files');
}
register_activation_hook( __FILE__, 'rwc_allow_contributor_uploads_install' );

// Remove upload capabilitys on plugin uninstall
function rwc_allow_contributor_uploads_uninstall() {
	$contributor = get_role('contributor');
	$contributor->remove_cap('upload_files');
}
register_uninstall_hook(__FILE__, 'rwc_allow_contributor_uploads_uninstall');

//* That's all!