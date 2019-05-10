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



// 


//create a exceprt 
function custom_field_excerpt() {
global $post;
$text = get_field('step_by_step_guide', $post->ID);
if ( '' != $text ) {
$text = strip_shortcodes( $text );
$text = apply_filters('the_content', $text);
$text = str_replace(']]>', ']]>', $text);
$excerpt_length = 50; // 20 words
$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
}
return apply_filters('the_excerpt', $text);
}

/**
* Adds a custom "Read more" link to post excerpts of custom post types.
* Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and "Read more".
*/
function isa_cpt_excerpt_more( $more ) {
global $post;
$anchor_text = 'Read more';
if ( 'YOUR_POST_TYPE' == $post->activity ) {
$more = ' &hellip; <a href="'. esc_url( get_permalink() ) . '">' . $anchor_text . '</a>';
}
return $more;
}
add_filter('excerpt_more', 'isa_cpt_excerpt_more');
?>



