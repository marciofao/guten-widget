<?php
/*
Plugin Name: Guten Widget
*/

function myguten_enqueue() {
    wp_enqueue_script(
        'myguten-script',
        plugins_url( 'scripts.js', __FILE__ )
    );
}
add_action( 'enqueue_block_editor_assets', 'myguten_enqueue' );