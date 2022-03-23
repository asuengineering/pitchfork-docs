<?php
/**
 * Plugin Name:     Pitchfork Docs
 * Plugin URI:      http://github.com/ASU-Engineering/Pitchfork-Docs
 * Description:     Really simple documentation style page template. Documents come with and autocompleted table-of-contents and a separate taxonomy structure foe easy document grouping. Compatible with the <a href="https://github.com/ASU-KE/UDS-WordPress-Theme">UDS-WordPress theme</a> from ASU KE.
 * Author:          Steve Ryan, ASU Engineering
 * Author URI:      https://engineering.asu.edu
 * Text Domain:     pitchfork-docs
 * Domain Path:     /languages
 * Version:         1.1
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

// Composer vendor autoload
if ( file_exists( PITCHFORK_DOCS_BASE_PATH . 'vendor/autoload.php' ) ) {
	require_once PITCHFORK_DOCS_BASE_PATH . 'vendor/autoload.php';
}

// Function: Activate.
// Function: Deactivate.
// Function: Execute plugin.

// Custom Post Type and Taxonomy Info
require_once PITCHFORK_DOCS_BASE_PATH . '/inc/cpt-document.php';
require_once PITCHFORK_DOCS_BASE_PATH . '/inc/tax-document-category.php';

// Enqueue scripts.
require_once PITCHFORK_DOCS_BASE_PATH . '/inc/enqueue-scripts.php';

// Gamajo Template Loader Script.
// Checks for the correct template files within the theme, uses included files as a fallback.
require_once PITCHFORK_DOCS_BASE_PATH . '/inc/template-loader/class-pitchfork-docs-template-loader.php';

/**
 * Custom routing for included templates for the established CPT.
 * Enabled by the use of the template loader class above.
 *
 * @param  mixed $template
 * @return void
 */
function get_pitchfork_docs_templates( $template ) {
	global $post;

	if ( 'pitchfork-docs' === $post->post_type ) {

		$docs_template_loader = new Pitchfork_Docs_Template_Loader();

		if ( is_singular() ) {

			$docs_template_loader
				->get_template_part( 'document' );

		} elseif ( is_tax( 'pitchfork-docs-category' ) ) {

			$docs_template_loader
				->get_template_part( 'document-category' );

		} elseif ( is_archive() ) {

			$docs_template_loader
				->get_template_part( 'archive-document' );

		}
	} else {
		// Return the normal template file if the request should be ignored.
		return $template;
	}

}
add_filter( 'template_include', 'get_pitchfork_docs_templates' );
