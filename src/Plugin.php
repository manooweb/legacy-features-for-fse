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

		if ( wp_is_block_theme() ) {
			// Loads the plugin only if the theme is a block theme.
			$this->addHooks();
		}

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
		add_action( 'admin_print_scripts', [ $this, 'adminScripts' ] );
		add_action( 'admin_print_footer_scripts', [ $this, 'adminFooterScripts' ] );
		add_action( 'admin_footer', [ $this, 'adminFooterWidgets' ] );
		add_action( 'enqueue_block_editor_assets', [ $this, 'editorAssets' ] );
		add_action( 'after_setup_theme', [ $this, 'supportMenusAndWidgets' ] );
	}

	/**
	 * Loads the widget scripts and registers the Legacy Widget block via JS.
	 *
	 * @since 1.0
	 *
	 * @global $wp_version
	 *
	 * @return void
	 */
	public function editorAssets() {
		global $wp_version;

		wp_enqueue_script( 'wp-widgets' );
		wp_add_inline_script( 'wp-widgets', 'wp.widgets.registerLegacyWidgetBlock()' );

		if ( is_rtl() ) {
			wp_enqueue_style(
				'widget-editor-core-style',
				home_url( '/wp-includes/css/dist/widgets/style-rtl.css' ),
				[],
				$wp_version
			);
		} else {
			wp_enqueue_style(
				'widget-editor-core-style',
				home_url( '/wp-includes/css/dist/widgets/style.css' ),
				[],
				$wp_version
			);
		}
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
			plugins_url( '/public/css/menu.css', LFFF_FILE ),
			[],
			self::VERSION
		);
	}

	/**
	 * Runs the widget styles action in the block editor.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	public function adminStyles() {
		if ( $this->isBlockEditor() ) {
			do_action( 'admin_print_styles-widgets.php' ); // phpcs:ignore WordPress.NamingConventions.ValidHookName.UseUnderscores
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
		if ( $this->isBlockEditor() ) {
			do_action( 'load-widgets.php' ); // phpcs:ignore WordPress.NamingConventions.ValidHookName.UseUnderscores
			do_action( 'widgets.php' ); // phpcs:ignore WordPress.NamingConventions.ValidHookName.UseUnderscores
			do_action( 'sidebar_admin_setup' );
			do_action( 'admin_print_scripts-widgets.php' ); // phpcs:ignore WordPress.NamingConventions.ValidHookName.UseUnderscores
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
		if ( $this->isBlockEditor() ) {
			do_action( 'admin_print_footer_scripts-widgets.php' ); // phpcs:ignore WordPress.NamingConventions.ValidHookName.UseUnderscores
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
		if ( $this->isBlockEditor() ) {
			do_action( 'admin_footer-widgets.php' ); // phpcs:ignore WordPress.NamingConventions.ValidHookName.UseUnderscores
		}
	}

	/**
	 * Allows to display the menus admin page.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	public function supportMenusAndWidgets() {
		add_theme_support( 'menus' );
	}

	/**
	 * Check if the current screen runs the block editor.
	 *
	 * @since 1.0
	 *
	 * @return boolean True if the current screen runs the block editor, false otherwise.
	 */
	private function isBlockEditor() {
		$current_screen = get_current_screen();

		if ( ! empty( $current_screen ) ) {
			return $current_screen->is_block_editor();
		}

		return false;
	}
}
