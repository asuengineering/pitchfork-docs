<?php
/**
 * - Register custom post type for documentation.
 * - Slug: pitchfork-docs-category
 * - Rewrite: /docs/category/
 *
 * @package pitchfork-docs
 */

add_action( 'init', 'pitchfork_docs_register_tax_doc_category', 0 );
function pitchfork_docs_register_tax_doc_category() {

	$labels = array(
		'name'                       => _x( 'Document Categories', 'Taxonomy General Name', 'pitchfork-docs' ),
		'singular_name'              => _x( 'Document Category', 'Taxonomy Singular Name', 'pitchfork-docs' ),
		'menu_name'                  => __( 'Category', 'pitchfork-docs' ),
		'all_items'                  => __( 'All Categories', 'pitchfork-docs' ),
		'parent_item'                => __( 'Parent Category', 'pitchfork-docs' ),
		'parent_item_colon'          => __( 'Parent Category:', 'pitchfork-docs' ),
		'new_item_name'              => __( 'New Category Name', 'pitchfork-docs' ),
		'add_new_item'               => __( 'Add New Category', 'pitchfork-docs' ),
		'edit_item'                  => __( 'Edit Category', 'pitchfork-docs' ),
		'update_item'                => __( 'Update Category', 'pitchfork-docs' ),
		'view_item'                  => __( 'View Category', 'pitchfork-docs' ),
		'separate_items_with_commas' => __( 'Separate categories with commas', 'pitchfork-docs' ),
		'add_or_remove_items'        => __( 'Add or remove categories', 'pitchfork-docs' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'pitchfork-docs' ),
		'popular_items'              => __( 'Popular Categories', 'pitchfork-docs' ),
		'search_items'               => __( 'Search Categories', 'pitchfork-docs' ),
		'not_found'                  => __( 'Not Found', 'pitchfork-docs' ),
		'no_terms'                   => __( 'No categories', 'pitchfork-docs' ),
		'items_list'                 => __( 'Categories list', 'pitchfork-docs' ),
		'items_list_navigation'      => __( 'Categories list navigation', 'pitchfork-docs' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
		'rewrite'					 => array('slug' => 'doc-category', 'with_front' => false),
	);
	register_taxonomy( 'pitchfork-docs-category', array( 'pitchfork-docs' ), $args );

}