<?php
/*
Plugin Name: Enable Contributor Uploads
Description: Allows users with the contributor role to upload images.
Version:     1.0
Author:      Road Warrior Creative
Author URI:  http://www.roadwarriorcreative.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

//if ( current_user_can('contributor') && !current_user_can('upload_files') )
	add_action('admin_init', 'rwc_allow_contributor_uploads');
 
	function rwc_allow_contributor_uploads() {
		$contributor = get_role('contributor');
		$contributor->add_cap('upload_files');
	}
