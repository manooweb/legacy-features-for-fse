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
	 * The plugin URL.
	 *
	 * @var string
	 */
	private $url;

	/**
	 * Constructor.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	public function __construct() {
		$this->url = plugin_dir_url( LFFF_FILE );
	}

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
		add_action( 'admin_print_styles', [ $this, 'adminStyles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'classicMenuStyles' ] );
		add_action( 'admin_init', [ $this, 'addEditorStyles' ] );
		add_action( 'admin_print_scripts', [ $this, 'adminScripts' ] );
		add_action( 'admin_print_footer_scripts', [ $this, 'adminFooterScripts'] );
		add_action( 'admin_footer', [ $this, 'adminFooterWidgets' ] );
		add_action( 'enqueue_block_editor_assets', [ $this, 'editorAssets' ] );
	}

	/**
	 * Loads the widget scripts and registers the Legacy Widget block via JS.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	public function editorAssets() {
		wp_enqueue_script( 'wp-widgets' );
		wp_add_inline_script( 'wp-widgets', 'wp.widgets.registerLegacyWidgetBlock()' );

		// Editor stylesheet.
		wp_enqueue_style(
			'legacy-features-for-fse-widget-editor',
			$this->url . '/public/css/editor.css',
			[],
			self::VERSION
		);
	}

	/**
	 * Loads the classic menu style.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	public function classicMenuStyles() {
		wp_enqueue_style(
			'legacy-features-for-fse-classic-menu',
			$this->url . '/public/css/menu.css',
			[],
			self::VERSION
		);
	}

	/**
	 * Loads editor style for cleaning up the block design.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	public function addEditorStyles() {
		add_editor_style( [ $this->url . '/public/css/style.css' ] );
	}

	/**
	 * Runs the widget styles action in the block editor.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	public function adminStyles() {
		if ( get_current_screen()->is_block_editor() ) {
			do_action( 'admin_print_styles-widgets.php' );
		}
	}

	/**
	 * Runs various widget actions in the block editor.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	public function adminScripts() {
		if ( get_current_screen()->is_block_editor() ) {
			do_action( 'load-widgets.php' );
			do_action( 'widgets.php' );
			do_action( 'sidebar_admin_setup' );
			do_action( 'admin_print_scripts-widgets.php' );
		}
	}

	/**
	 * Runs the footer widget scripts action in the block editor.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	public function adminFooterScripts() {
		if ( get_current_screen()->is_block_editor() ) {
			do_action( 'admin_print_footer_scripts-widgets.php' );
		}
	}

	/**
	 * Runs the widgets footer action in the block editor.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	public function adminFooterWidgets() {
		if ( get_current_screen()->is_block_editor() ) {
			do_action( 'admin_footer-widgets.php' );
		}
	}
}
