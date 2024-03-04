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
		$this->plugin->init();
		$this->assertNotNull( $this->plugin, 'Plugin should be initialized.' );
	}

	/**
	 * Test plugin activation.
	 * 
	 * Activating the plugin should add the 'upload_files' capability to the 'contributor' role.
	 */
	public function test_activate() {
		$this->plugin->activate();
		$contributor = get_role( 'contributor' );
		$this->assertTrue( $contributor->has_cap( 'upload_files' ), 'Contributor role should have the upload_files capability after activation' );
	}

	/**
	 * Test plugin deactivation.
	 * 
	 * Deactivating the plugin should remove the 'upload_files' capability from the 'contributor' role.
	 */
	public function test_deactivate() {
		$this->plugin->activate();
		$this->plugin->deactivate();
		$contributor = get_role( 'contributor' );
		$this->assertFalse( $contributor->has_cap( 'upload_files' ), 'Contributor role should not have the upload_files capability after deactivation' );
	}

	/**
	 * Test plugin uninstallation.
	 * 
	 * Uninstalling the plugin should remove the 'upload_files' capability from the 'contributor' role.
	 */
	public function test_uninstall() {
		Plugin::uninstall();
		$contributor = get_role( 'contributor' );
		$this->assertFalse( $contributor->has_cap( 'upload_files' ), 'Contributor role should not have the upload_files capability after uninstallation' );
	}
}
