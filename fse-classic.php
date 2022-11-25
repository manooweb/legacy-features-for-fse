<?php
/**
 * FSE Classic
 * php version        5.6
 *
 * @package           WP_Syntex\FSE Classic
 * @author            WP SYNTEX
 * @license           GPL-3.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       FSE Classic
 * Plugin URI:        https://polylang.pro
 * Description:       Classic Features for FSE.
 * Version:           1.0
 * Requires at least: 5.9
 * Requires PHP:      5.6
 * Author:            WP SYNTEX
 * Author uri:        https://polylang.pro
 * Text Domain:       fse-classic
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.txt
 *
 * Copyright 2022 WP SYNTEX
 *
 * This program incorporates work from the plugin Legacy Widget Block
 * Copyright 2022 Justin Tadlock (email : justintadlock@gmail.com)
 * Legacy Widget Block is released under the GPL V2 or later.
 */

namespace WP_Syntex\FSE_Classic;

defined( 'ABSPATH' ) || exit;

define( 'FSE_CLASSIC_VERSION', '1.0' );

define( 'FSE_CLASSIC_FILE', __FILE__ );

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

( new Plugin() )->init();
