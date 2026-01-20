=== Gutenberg HEIF Support ===
Contributors: wordpressdotorg
Tags: heif, heic, images, media, gutenberg
Requires at least: 6.4
Tested up to: 6.8
Requires PHP: 7.4
Stable tag: 1.0.0
License: LGPL-3.0-or-later
License URI: https://www.gnu.org/licenses/lgpl-3.0.html

Provides HEIF/HEIC image support for Gutenberg's client-side media processing.

== Description ==

This plugin enables HEIF/HEIC image format support in Gutenberg's experimental client-side media processing feature.

HEIF (High Efficiency Image Format) and HEIC (High Efficiency Image Coding) are modern image formats that offer superior compression compared to JPEG while maintaining high image quality. These formats are commonly used by Apple devices for photos.

**Why is this a separate plugin?**

The HEIF decoding functionality is provided by the libheif library, which is licensed under LGPL-3.0. Since the LGPL-3.0 license is not compatible with WordPress's GPLv2 license, the HEIF support module cannot be bundled directly with Gutenberg or WordPress core.

By distributing this as a separate plugin with LGPL-3.0 licensing, users who need HEIF support can opt-in while maintaining proper license compliance.

**Requirements**

* WordPress 6.4 or higher
* Gutenberg plugin with experimental media processing enabled
* A browser that supports WebAssembly

== Installation ==

1. Upload the `gutenberg-heif-support` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. HEIF/HEIC image support will be automatically enabled in the block editor.

== Frequently Asked Questions ==

= What image formats does this enable? =

This plugin enables support for:
* HEIF (.heif)
* HEIC (.heic)

= Do I need this plugin? =

You only need this plugin if you want to upload and process HEIF/HEIC images directly in the WordPress block editor using client-side processing. If you don't work with HEIF/HEIC images, you don't need this plugin.

= Why is this not included in Gutenberg? =

The HEIF decoding library (libheif) is licensed under LGPL-3.0, which is not compatible with WordPress's GPLv2 license. By distributing this as a separate LGPL-licensed plugin, we maintain proper license compliance while still enabling HEIF support for users who need it.

== Changelog ==

= 1.0.0 =
* Initial release
* Provides vips-heif.wasm module for HEIF/HEIC image processing
* Integrates with Gutenberg's experimental media processing feature

== Upgrade Notice ==

= 1.0.0 =
Initial release of Gutenberg HEIF Support.
