<?php
/**
 * Main plugin class.
 * php version 5.6
 *
 * @package WP_Syntex\Legacy_Features_for_FSE
 */

namespace WP_Syntex\Legacy_Features_for_FSE;

defined( 'ABSPATH' ) || exit;

/**
 * Main plugin class.
 *
 * @since 1.0
 */
final class Plugin {

	/**
	 * The plugin version.
	 *
	 * @var string
	 */
	const VERSION = '1.0';

	/**
	 * Plugin init.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	public function init() {
		/**
		 * Fires before the plugin init.
		 *
		 * @since 1.0
		 *
		 * @param Plugin $plugin Main class instance.
		 */
		do_action_ref_array( 'legacy_features_for_fse_before_init', [ &$this ] );

		$this->addHooks();

		/**
		 * Fires after the plugin init.
		 *
		 * @since 1.0
		 *
		 * @param Plugin $plugin Main class instance.
		 */
		do_action_ref_array( 'legacy_features_for_fse_init', [ &$this ] );
	}

	/**
	 * Adds hooks.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	private function addHooks() {
	}
}
