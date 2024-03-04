<?php
/**
 * Class EDECU_Plugin_Test
 *
 * @package Enable_Contributor_Uploads
 */

use EDECU\Inc\Plugin;

/**
 * Plugin test case.
 */
class EDECU_Plugin_Test extends WP_UnitTestCase {

	/**
	 * Plugin instance.
	 *
	 * @var Plugin
	 */
	private $plugin;

	/**
	 * Test setup.
	 */
	public function setUp(): void {
		parent::setUp();
		$this->plugin = new Plugin();
	}

	/**
	 * Test teardown.
	 */
	public function tearDown(): void {
		parent::tearDown();
		unset( $this->plugin );
	}

	/**
	 * Test initialization of the plugin.
	 */
	public function test_init() {
		// Simulate the plugin initialization.
		$this->plugin->init();

		// Assert that the textdomain is loaded.
		$this->assertTrue( is_textdomain_loaded( 'enable-contributor-uploads' ), 'Text domain should be loaded' );
	}

	/**
	 * Test plugin activation.
	 */
	public function test_activate() {
		// Activate the plugin.
		$this->plugin->activate();

		// Retrieve the 'contributor' role.
		$contributor = get_role( 'contributor' );

		// Assert that 'upload_files' capability is added to 'contributor' role.
		$this->assertTrue( $contributor->has_cap( 'upload_files' ), 'Contributor role should have the upload_files capability after activation' );
	}

	/**
	 * Test plugin deactivation.
	 */
	public function test_deactivate() {
		// First, activate the plugin to ensure 'contributor' has the 'upload_files' capability.
		$this->plugin->activate();

		// Then, deactivate the plugin.
		$this->plugin->deactivate();

		// Retrieve the 'contributor' role again.
		$contributor = get_role( 'contributor' );

		// Assert that 'upload_files' capability is removed from 'contributor' role.
		$this->assertFalse( $contributor->has_cap( 'upload_files' ), 'Contributor role should not have the upload_files capability after deactivation' );
	}

	/**
	 * Test plugin uninstallation.
	 */
	public function test_uninstall() {
		// Simulate plugin uninstallation.
		Plugin::uninstall();

		// Retrieve the 'contributor' role.
		$contributor = get_role( 'contributor' );

		// Assert that 'upload_files' capability is removed from 'contributor' role.
		$this->assertFalse( $contributor->has_cap( 'upload_files' ), 'Contributor role should not have the upload_files capability after uninstallation' );
	}
}
