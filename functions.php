

<?php

/*** INCLUDE/REQUIRE FILES */


require_once ('inc/activity-functions.php');
require_once ('inc/login-functions.php');
require_once ('inc/onboarding-functions.php');


/** Feedback */
require_once('inc/feedback-satsfaction.php');
require_once('inc/feedback-level.php');
require_once('inc/feedback-time.php');
require_once('inc/feedback-agegroup.php');

/** END OF INCLUDE/REQUIRE */



function cn_include_content($pid) {
	$thepageinquestion = get_post($pid);
	$content = $thepageinquestion->post_content;
	$content = apply_filters('the_content', $content);
	echo $content;
}




function add_cors_http_header(){
    header("Access-Control-Allow-Origin: *");
}
add_action('init','add_cors_http_header');




function irelandcop_script_enqueue() {

//css styles
wp_enqueue_style('customstyle',get_template_directory_uri().'/css/irelandcop.css',array(),'1.0.0','all');
wp_enqueue_style('custombootstrap',get_template_directory_uri().'/css/bootstrap.css',array(),'1.0.0','all');    
wp_enqueue_style('fontcss',get_template_directory_uri().'/css/font-awesome/css/font-awesome.min.css',array(),'1.0.0','all');


wp_enqueue_script('jquery-214-script', get_template_directory_uri() . '/js/jquery-2.13-min.js',array('jquery'));


//wp_enqueue_script('customjs_jquery_old',get_template_directory_uri().'/js/jquery-2.13-min.js',array(),'1.0.0',true);

//wp_enqueue_script('customjs_jquery',get_template_directory_uri().'/js/',array(),'1.0.0',true);

wp_enqueue_script('customjs_popper',get_template_directory_uri().'/js/popper.min.js',array(),'1.0.0',true);
wp_enqueue_script('customjs_bootstrap',get_template_directory_uri().'/js/bootstrap.js',array(),'1.0.0',true);    

    //wp_enqueue_script('customjs', get_template_directory_uri() . '/js/jquery-2.13-min.js', array(), '1.0.0', 'true' );


}

/** Add set up scripts, CSS and Javascript */
add_action('wp_enqueue_scripts','irelandcop_script_enqueue');

/**
* SVG Icons class.
*/
require get_template_directory() . '/classes/class-twentynineteen-svg-icons.php';

/**
* Custom Comment Walker template.
*/
require get_template_directory() . '/classes/class-twentynineteen-walker-comment.php';

/**
* Enhance the theme by hooking into WordPress.
*/
require get_template_directory() . '/inc/template-functions.php';

/**
* SVG Icons related functions.
*/
require get_template_directory() . '/inc/icon-functions.php';

/**
* Custom template tags for the theme.
*/
require get_template_directory() . '/inc/template-tags.php';

/**
* Customizer additions.
*/
require get_template_directory() . '/inc/customizer.php';








