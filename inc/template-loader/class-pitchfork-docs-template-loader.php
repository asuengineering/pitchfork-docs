<?php
/**
 * Pitchfork Docs - Plugin templates
 */

if ( ! class_exists( 'Gamajo_Template_Loader' ) ) {
	require plugin_dir_path( __FILE__ ) . 'class-gamajo-template-loader.php';
}

/**
 * Template loader for Pitchfork Docs
 * Only need to specify class properties here.
 */
class Pitchfork_Docs_Template_Loader extends Gamajo_Template_Loader {
	/**
	 * Prefix for filter names.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	protected $filter_prefix = 'pitchfork-docs';

	/**
	 * Directory name where custom templates for this plugin should be found in the theme.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	protected $theme_template_directory = 'pitchfork-docs';

	/**
	 * Reference to the root directory path of this plugin.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	protected $plugin_directory = PITCHFORK_DOCS_BASE_PATH;

	/**
	 * Directory name where templates are found in this plugin.
	 *
	 * Can either be a defined constant, or a relative reference from where the subclass lives.
	 *
	 * e.g. 'templates' or 'includes/templates', etc.
	 *
	 * @since 1.1.0
	 *
	 * @var string
	 */
	protected $plugin_template_directory = 'templates';
}
