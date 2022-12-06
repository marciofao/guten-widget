<?php

/*
Plugin Name: Guten Widget
*/


function myguten_enqueue_2() {
    wp_enqueue_script(
        'myguten-script',
        plugins_url( 'build/index.js', __FILE__ ),
        array( 'wp-blocks' )
    );
}
add_action( 'enqueue_block_editor_assets', 'myguten_enqueue_2' );

function myguten_stylesheet() {
    wp_enqueue_style( 'myguten-style', plugins_url( 'style.css', __FILE__ ) );
}
add_action( 'enqueue_block_assets', 'myguten_stylesheet' );



function gw_setup() {

    register_rest_route('wp/v2', '/guten-widget', array(
        'methods' => 'GET',
        'callback' => 'fnugg_handler',
    ));

}
add_action( 'init', 'gw_setup' );

function fnugg_handler($data) {

    $search = $data->get_param('s');
    $gt_url = "https://api.fnugg.no/suggest/autocomplete/?q=".$search;
    $response = wp_remote_get($gt_url);

    $result = new WP_REST_Response($response, 200);
    // Set cache.
    $result->set_headers(array('Cache-Control' => 'max-age=3600'));
    return $result;
}

function dump_die($a){
    echo "<pre>";
    var_dump($a);
    die;
}