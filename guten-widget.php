<?php

//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

/*
Plugin Name: Guten Widget
*/

require_once('resort_now_render.php');
require_once('FnuggHandler.php');

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
 * usage: http://localhost/multivision/wp-json/wp/v2/guten-widget?s=fonna
 */
function gw_setup() {

    register_rest_route('wp/v2', '/guten-widget', array(
        'methods' => 'GET',
        'callback' => 'fnugg_handler',
    ));

}
add_action( 'init', 'gw_setup' );

function fnugg_handler($data) {

   $res = new FnuggHandler($data);
   return $res->handle_request();
}

function dump_die($a){
    echo "<pre>";
    var_dump($a);
    die;
}

// register custom meta tag field
function myguten_register_post_meta() {
    register_post_meta( 'post', 'resort_now', array(
        'show_in_rest' => true,
        'single' => true,
        'type' => 'string',
    ) );
}
add_action( 'init', 'myguten_register_post_meta' );


function myguten_render_paragraph( $block_attributes, $content ) {
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
    'render_callback' => 'myguten_render_paragraph',
) );