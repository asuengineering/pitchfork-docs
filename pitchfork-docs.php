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

// Custom Post Types
// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Documents', 'Post Type General Name', 'pitchfork-docs' ),
		'singular_name'         => _x( 'Document', 'Post Type Singular Name', 'pitchfork-docs' ),
		'menu_name'             => __( 'Document', 'pitchfork-docs' ),
		'name_admin_bar'        => __( 'Document', 'pitchfork-docs' ),
		'archives'              => __( 'Document Archives', 'pitchfork-docs' ),
		'attributes'            => __( 'Document Attributes', 'pitchfork-docs' ),
		'parent_item_colon'     => __( 'Parent Document:', 'pitchfork-docs' ),
		'all_items'             => __( 'All Documents', 'pitchfork-docs' ),
		'add_new_item'          => __( 'Add New Document', 'pitchfork-docs' ),
		'add_new'               => __( 'Add New', 'pitchfork-docs' ),
		'new_item'              => __( 'New Document', 'pitchfork-docs' ),
		'edit_item'             => __( 'Edit Document', 'pitchfork-docs' ),
		'update_item'           => __( 'Update Document', 'pitchfork-docs' ),
		'view_item'             => __( 'View Document', 'pitchfork-docs' ),
		'view_items'            => __( 'View Documents', 'pitchfork-docs' ),
		'search_items'          => __( 'Search Document', 'pitchfork-docs' ),
		'not_found'             => __( 'Not found', 'pitchfork-docs' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'pitchfork-docs' ),
		'featured_image'        => __( 'Featured Image', 'pitchfork-docs' ),
		'set_featured_image'    => __( 'Set featured image', 'pitchfork-docs' ),
		'remove_featured_image' => __( 'Remove featured image', 'pitchfork-docs' ),
		'use_featured_image'    => __( 'Use as featured image', 'pitchfork-docs' ),
		'insert_into_item'      => __( 'Insert into document', 'pitchfork-docs' ),
		'uploaded_to_this_item' => __( 'Uploaded to this document', 'pitchfork-docs' ),
		'items_list'            => __( 'Documents list', 'pitchfork-docs' ),
		'items_list_navigation' => __( 'Documents list navigation', 'pitchfork-docs' ),
		'filter_items_list'     => __( 'Filter documents list', 'pitchfork-docs' ),
	);
	$args = array(
		'label'                 => __( 'Document', 'pitchfork-docs' ),
		'description'           => __( 'Separate your docs from the rest of your content.', 'pitchfork-docs' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'page-attributes' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'docs',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'pitchfork-docs', $args );

}
add_action( 'init', 'custom_post_type', 0 );

// Enqueue scripts.
require_once PITCHFORK_DOCS_BASE_PATH . '/inc/enqueue-scripts.php';

// ACF configurations.
// require_once PITCHFORK_DOCS_BASE_PATH . '/inc/acf-config.php';
// require_once PITCHFORK_BLOCKS_BASE_PATH . '/inc/acf-register-blocks.php';
