<?php
/**
 * Legacy features for FSE
 * php version        5.6
 *
 * @package           WP_Syntex\Legacy_Features_for_FSE
 * @author            WP SYNTEX
 * @license           GPL-3.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Legacy Features for FSE
 * Plugin URI:        https://polylang.pro
 * Description:       Legacy Features for FSE.
 * Version:           1.0
 * Requires at least: 5.9
 * Requires PHP:      5.6
 * Author:            WP SYNTEX
 * Author uri:        https://polylang.pro
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.txt
 *
 * Copyright 2021 WP SYNTEX
 */

namespace WP_Syntex\Legacy_Features_for_FSE;

defined( 'ABSPATH' ) || exit;

define( 'LFFF_FILE', __FILE__ );

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

( new Plugin() )->init();
