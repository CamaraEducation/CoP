<?php

function contact_ajax_enqueue() {
// Enqueue javascript on the frontend.
	wp_enqueue_script(
		'contact-ajax-script', get_template_directory_uri() . '/js/contact_js.js',array('jquery'));

// The wp_localize_script allows us to output the ajax_url path for our script to use.
	wp_localize_script('contact-ajax-script','contact_ajax_obj',array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));
}


//add scripts and set up ajax
add_action( 'wp_enqueue_scripts', 'contact_ajax_enqueue' );
add_action( 'wp_ajax_contact_ajax_request', 'contact_ajax_request' );
add_action( 'wp_ajax_nopriv_contact_ajax_request', 'contact_ajax_request' );



function contact_ajax_request() {

$errors=[];


if(isset($_POST)){

	$member_fname = $_POST['user_fname'];
	$member_lname = $_POST['user_lname'];
	$member_email = $_POST['user_email'];
	$member_message = $_POST['user_message'];


if(empty($member_fname)){
//Email address already registered
		$errors = array('user_fname'  => 'Required');
	}

if(empty($member_lname)){
//Email address already registered
		$errors = array('user_lname'  => 'Required');
	}

if(empty($member_email)){
//Email address already registered
		$errors = array('user_email'  => 'Required');
	}

if(empty($member_message)){
//Email address already registered
		$errors = array('user_message'  => 'Required');
	}


if(empty($errors)) {

//end ane mail 
//echo $emailMessage;

$to =  get_bloginfo( 'admin_email' ); //admin email
$memberName = $member_fname . " " . $member_lname;
$site_title =  get_bloginfo( 'name' );
$subject = $site_title . " contact form: " .$memberName;

$headers[] = 'From: '.$memberName .'<'.$member_email .'>';

//send the email
wp_mail( $to, $subject, $member_message, $headers );


} //end if if 


echo json_encode($errors);
exit;

} else {


} //end of if, if there is No Post, you don't do anything.



}//end of function 




