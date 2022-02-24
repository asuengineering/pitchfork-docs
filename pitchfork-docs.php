<?php
/**
 * Plugin Name:     Pitchfork Docs
 * Plugin URI:      http://github.com/ASU-Engineering/Pitchfork-Docs
 * Description:     A custom post type created to produce documentation style pages. Autocompleted table-of-contents, separate taxonomies from posts/pages.
 * Author:          Steve Ryan
 * Author URI:      https://engineering.asu.edu
 * Text Domain:     pitchfork-docs
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Pitchfork_Docs
 *
 * GitHub Plugin URI: http://github.com/ASU-Engineering/Pitchfork-Docs
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Variable for root directory of this plugin.
define( 'PITCHFORK_DOCS_BASE_PATH', plugin_dir_path( __FILE__ ) );

// Function: Activate.
// Function: Deactivate.
// Function: Execute plugin.

// TGM Plugin Activation Script. Checks for Advanced Custom Fields.
// require_once PITCHFORK_BLOCKS_BASE_PATH . '/tgmpa/class-tgm-plugin-activation.php';
// require_once PITCHFORK_BLOCKS_BASE_PATH . '/tgmpa/dependency-check.php';

// Enqueue scripts.
require_once PITCHFORK_BLOCKS_BASE_PATH . '/inc/enqueue-scripts.php';

// ACF configurations.
require_once PITCHFORK_BLOCKS_BASE_PATH . '/inc/acf-config.php';
// require_once PITCHFORK_BLOCKS_BASE_PATH . '/inc/acf-register-blocks.php';
