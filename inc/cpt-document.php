<?php
/**
 * - Register custom post type for documentation.
 * - Slug: pitchfork-docs
 * - Rewrite: /docs
 *
 * @package pitchfork-docs
 */

add_action( 'init', 'pitchfork_docs_register_post_type', 0 );
function pitchfork_docs_register_post_type() {

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
		'menu_position'         => 20,
		'menu_icon'				=> 'dashicons-format-aside',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'docs',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'			=> true,
		'rewrite'				=> array('slug' => 'docs', 'with_front' => false),
	);
	register_post_type( 'pitchfork-docs', $args );

}