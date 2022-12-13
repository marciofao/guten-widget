<?php

/*
 * Plugin Name:       Guten Widget
 * Description:       Creates "Resort Now" block in Gutenberg editor
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           1.0.0
 * Author:            Márcio Lopes Fão
 * Author URI:        https://www.linkedin.com/in/m%C3%A1rcio-lopes-f%C3%A3o-bb559133
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       gutenpride
*/

require_once('FnuggHandler.php');
require_once('resort_now_render.php');


/* 
 * Setup Block editor
 */ 

function resort_now_block() {
    register_block_type( __DIR__ );
}
add_action( 'init', 'resort_now_block' );

// automatically load dependencies and version
$asset_file = include( plugin_dir_path( __FILE__ ) . 'build/index.asset.php');

wp_register_script(
    'gutenberg-examples-03-esnext',
    plugins_url( 'build/index.js', __FILE__ ),
    $asset_file['dependencies'],
    $asset_file['version']
);

/*
 * Initializes the API
 * usage: http://localhost/multivision/wp-json/wp/v2/guten-widget?s=fonna
 */
function rnb_api_setup() {

    register_rest_route('wp/v2', '/guten-widget', array(
        'methods' => 'GET',
        'callback' => 'fnugg_handler',
    ));

}
add_action( 'init', 'rnb_api_setup' );

/* 
 * handle the API 
 */ 

function fnugg_handler($data) {
   $res = new FnuggHandler($data);
   return $res->handle_request();
}

/* 
 * register custom meta tag field
 */ 
function myguten_register_post_meta() {
    register_post_meta( 'post', 'resort_now', array(
        'show_in_rest' => true,
        'single' => true,
        'type' => 'string',
    ) );
}
add_action( 'init', 'myguten_register_post_meta' );


/* 
 * Renderring the block on frontend
 */

function resort_now_call( $block_attributes, $content ) {
    $value = get_post_meta( get_the_ID(), 'resort_now', true );
    // check value is set before outputting
    if ( $value ) {
        return resort_now_render($content,$value);
    } else {
        return $content;
    }
}

register_block_type( 'core/resort-now', array(
    'api_version' => 2,
    'render_callback' => 'resort_now_call',
) );


/* 
 * enquequee js and styling on frontend
 */
function rnb_scripts() {

	wp_enqueue_script( 'custom_js', plugins_url( 'rnb-fetch.js', __FILE__ ), array(), rand(0,99999) );
	wp_enqueue_style('rnb-style', plugins_url( 'style.css', __FILE__ ), array(), rand(0,99999));

}
add_action('wp_enqueue_scripts', 'rnb_scripts');
