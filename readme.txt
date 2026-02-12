=== Enable Contributor Uploads ===
Contributors: equalizedigital, roadwarriorwp, alh0319, stevejonesdev
Donate link: http://roadwarriorcreative.com/donate
Tags: user roles, capabilities, contributor, upload media, enable uploads
Requires at least: 6.7
Tested up to: 6.9
Stable tag: 1.2.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easy plugin which adds the capability for contributors to upload images to their blog posts.

== Description ==

Sometimes you simply want to allow users with the defined user role of "contributor" to upload images as they are writing blog posts.  This plugin, when activated, automatically gives contributors the capability to add media.  This is a lite plugin, perfect for someone who only wants to modify this one role/capability in which case a larger roles and capabilities plugin would be overkill.

== Installation ==

1. Upload the unzipped plugin files to the `/wp-content/plugins/` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. That's all! No configuration necessary.


== Frequently Asked Questions ==

= Does this plugin edit other user roles or other capabilities? =

No. This plugin only modifies the media upload abilities of users with the contributor role.

= Will Contributors be able to delete my media? =

No. Contributors will be able to view other media items in the library and select them for upload, but they will not be able to delete any media items - including ones that they themselves have uploaded.

= What if I want to edit more capabilities or roles? =

We recommend you check out other plugins in the WordPress repository.  At this time we will not be adding additional features to this plugin.

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.png, which shows the addition on the normal Media Upload Button to a new post.  Note the Media Library is also now in the sidebar.
2. screenshot-2.png shows that contributors can upload media.
3. screenshot-3.png shows that contributors can view but not delete media in the Media Library.

== Changelog ==

= 1.2.0 =
* Added: PHPDoc blocks to all functions for better code documentation.
* Added: Null checks to prevent fatal errors if contributor role doesn't exist.
* Changed: Function prefix from rwc_ to edecu_ for consistency with plugin branding.
* Fixed: Typo in FAQ section.
* Updated: Tested up to WordPress 6.9.
* Updated: Minimum required WordPress version to 6.7.

= 1.1.0 =
* Updated: upload capability to be added and removed from contributors only on plugin activation and deactivation.

= 1.0.0 =
* This is version 1 - everything is new and shiny!