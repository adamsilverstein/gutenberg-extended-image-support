/**
 * WordPress dependencies
 */
import { registerWasmModule } from '@wordpress/vips';

/**
 * Register the HEIF WASM module for client-side image processing.
 *
 * This allows Gutenberg's media processing to handle HEIF/HEIC images
 * by providing the vips-heif.wasm module.
 */
if ( typeof window.gutenbergHeifSupport !== 'undefined' ) {
	registerWasmModule( 'vips-heif.wasm', window.gutenbergHeifSupport.wasmUrl );
}
