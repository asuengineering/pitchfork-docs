<?php
/**
 * - Enqueue plugin scripts.
 * - Register additional scripts to be loaded with individual blocks.
 *
 * @package pitchfork-docs
 */

// add_action('admin_enqueue_scripts', 'pitchfork_blocks_enqueue_admin_scripts');
// function pitchfork_blocks_enqueue_admin_scripts() {

// 	// Get the theme data.
// 	$the_plugin     = get_plugin_data( PITCHFORK_BLOCKS_BASE_PATH );
// 	$plugin_version = $the_plugin['Version'];

// }

add_action( 'wp_enqueue_scripts', 'pitchfork_docs_enqueue_tocbot' );
function pitchfork_docs_enqueue_tocbot() {

	if (is_singular('pitchfork-docs')) {

		$the_plugin     = get_plugin_data( plugin_dir_path( __DIR__ ) . 'pitchfork-docs.php' );
		$the_version    = $the_plugin['Version'];
		$plugin_version = $the_version . '.' . filemtime( plugin_dir_path( __DIR__ ) . 'js/tocbot-init.js' );

		wp_enqueue_script( 'tocbot-source', plugin_dir_url( __DIR__ ) . '/tocbot/tocbot.min.js',  array(), '4.12.0' , true );
		wp_enqueue_script( 'tocbot-init', plugin_dir_url( __DIR__ ) . '/js/tocbot-init.js',  array( 'tocbot-source' ), $plugin_version , true );
		wp_enqueue_style(  'tocbot-style', plugin_dir_url( __DIR__ ) . '/tocbot/tocbot.css',  array(), '4.12.0' , false );

	}
	
}

add_action( 'wp_enqueue_scripts', 'pitchfork_docs_enqueue_styles' );
function pitchfork_docs_enqueue_styles() {
	
	if (is_singular('pitchfork-docs')) {

		$the_plugin     = get_plugin_data( plugin_dir_path( __DIR__ ) . 'pitchfork-docs.php' );
		$the_version    = $the_plugin['Version'];
		$plugin_version = $the_version . '.' . filemtime( plugin_dir_path( __DIR__ ) . 'css/pfdocs.min.css' );

		wp_enqueue_style(  'pitchfork-docs', plugin_dir_url( __DIR__ ) . '/css/pfdocs.min.css',  array(), $plugin_version , false );

	}
	
}