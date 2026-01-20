/**
 * Gutenberg HEIF Support
 *
 * This plugin provides the vips-heif.wasm module for HEIF/HEIC image support
 * in Gutenberg's client-side media processing.
 *
 * Note: HEIF support is built into Gutenberg's @wordpress/vips package.
 * This plugin serves as a distribution mechanism for the vips-heif.wasm binary,
 * which is loaded by Gutenberg when the experimental media processing feature is enabled.
 *
 * The WASM module is automatically discovered and loaded by Gutenberg's vips package
 * when it's available in the assets directory.
 */

// This file intentionally left mostly empty.
// The plugin's functionality is provided through the PHP file which:
// 1. Registers the HEIF support filter
// 2. Makes the vips-heif.wasm binary accessible via wp_localize_script

if ( typeof window.gutenbergHeifSupport !== 'undefined' ) {
	// Plugin is loaded and WASM URL is available.
	// This confirms the plugin is properly initialized.
}
