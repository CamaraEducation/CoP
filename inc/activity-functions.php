<?php


/**
1. activity-js.js
*/

function activity_ajax_enqueue() {
// Enqueue javascript on the frontend.
wp_enqueue_script(
'activity-ajax-script', get_template_directory_uri() . '/js/activity_js.js',array('jquery'));

// The wp_localize_script allows us to output the ajax_url path for our script to use.
wp_localize_script('activity-ajax-script','activity_ajax_obj',array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));
}



//add scripts and set up ajax
add_action( 'wp_enqueue_scripts', 'activity_ajax_enqueue' );
add_action( 'wp_ajax_activity_ajax_request', 'activity_ajax_request' );
add_action( 'wp_ajax_nopriv_activity_ajax_request', 'activity_ajax_request' );



?>