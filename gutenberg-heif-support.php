<?php
/**
 * Plugin Name: Gutenberg HEIF Support
 * Plugin URI: https://github.com/WordPress/gutenberg
 * Description: Provides the vips-heif.wasm module for HEIF/HEIC image support in Gutenberg's client-side media processing. Requires Gutenberg with experimental media processing feature enabled.
 * Version: 1.0.0
 * Author: WordPress Contributors
 * Author URI: https://github.com/WordPress/gutenberg/graphs/contributors
 * License: LGPL-3.0-or-later
 * License URI: https://www.gnu.org/licenses/lgpl-3.0.html
 * Text Domain: gutenberg-heif-support
 * Requires at least: 6.4
 * Requires PHP: 7.4
 * Requires Plugins: gutenberg
 *
 * @package gutenberg-heif-support
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'GUTENBERG_HEIF_SUPPORT_VERSION', '1.0.0' );
define( 'GUTENBERG_HEIF_SUPPORT_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'GUTENBERG_HEIF_SUPPORT_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * Indicates that HEIF support is available.
 *
 * @param bool $available Whether HEIF support is available.
 * @return bool Always returns true when this plugin is active.
 */
function gutenberg_heif_support_filter_available( $available ) {
	return true;
}
add_filter( 'gutenberg_heif_support_available', 'gutenberg_heif_support_filter_available' );

/**
 * Enqueues the JavaScript that registers the HEIF WASM module.
 */
function gutenberg_heif_support_enqueue_scripts() {
	$screen = get_current_screen();

	if ( ! $screen ) {
		return;
	}

	// Only load in block editor contexts.
	if ( ! $screen->is_block_editor() && 'site-editor' !== $screen->id && ! ( 'widgets' === $screen->id && wp_use_widgets_block_editor() ) ) {
		return;
	}

	// Only load if user can upload files.
	if ( ! current_user_can( 'upload_files' ) ) {
		return;
	}

	$asset_file = GUTENBERG_HEIF_SUPPORT_PLUGIN_DIR . 'build/index.asset.php';

	if ( file_exists( $asset_file ) ) {
		$asset = require $asset_file;
	} else {
		$asset = array(
			'dependencies' => array(),
			'version'      => GUTENBERG_HEIF_SUPPORT_VERSION,
		);
	}

	wp_enqueue_script(
		'gutenberg-heif-support',
		GUTENBERG_HEIF_SUPPORT_PLUGIN_URL . 'build/index.js',
		$asset['dependencies'],
		$asset['version'],
		array( 'in_footer' => false )
	);

	// Pass the WASM module URL to JavaScript.
	wp_localize_script(
		'gutenberg-heif-support',
		'gutenbergHeifSupport',
		array(
			'wasmUrl' => GUTENBERG_HEIF_SUPPORT_PLUGIN_URL . 'assets/vips-heif.wasm',
		)
	);
}
add_action( 'admin_enqueue_scripts', 'gutenberg_heif_support_enqueue_scripts' );

/**
 * Adds WASM MIME type support.
 *
 * @param array $mimes Existing MIME types.
 * @return array Updated MIME types.
 */
function gutenberg_heif_support_mime_types( $mimes ) {
	$mimes['wasm'] = 'application/wasm';
	return $mimes;
}
add_filter( 'mime_types', 'gutenberg_heif_support_mime_types' );
