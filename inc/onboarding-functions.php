<?php

function onboarding_ajax_enqueue() {
// Enqueue javascript on the frontend.
wp_enqueue_script(
'onboarding-ajax-script', get_template_directory_uri() . '/js/onboarding_js.js',array('jquery'));

// The wp_localize_script allows us to output the ajax_url path for our script to use.
wp_localize_script('onboarding-ajax-script','onboarding_ajax_obj',array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));
}

//add scripts and set up ajax
add_action( 'wp_enqueue_scripts', 'onboarding_ajax_enqueue' );
add_action( 'wp_ajax_onboarding_ajax_request', 'onboarding_ajax_request' );
add_action( 'wp_ajax_nopriv_onboarding_ajax_request', 'onboarding_ajax_request' );



function onboarding_ajax_request() {

//session_start();

if(isset($_POST)){



$user_username   = $_POST["user_username"];  
$user_email   = $_POST["user_email"];
$user_fname   = $_POST["user_fname"];
$user_lname    = $_POST["user_lname"];
$user_password    = $_POST["user_password"];
$user_password_confirm   = $_POST["user_password_confirm"];
$user_18yearsold = $_POST["user_18yearsold"];


/**
//Adding to session to keep it until the end of the multiple step registration 
$_SESSION["user_username"]  = $user_username;
$_SESSION["user_email"] = $user_email;
$_SESSION["user_fname"] = $user_fname;
$_SESSION["user_lname"] = $user_lname;
$_SESSION["user_password"] = $user_password;
$_SESSION["user_passworld_confirm"] = $user_password_confirm;
$_SESSION["user_18yearsold"] = $user_18yearsold;
*/

//array of errors to keep track of 
$errors=[];

// this is required for username checks
    require_once(ABSPATH . WPINC . '/registration.php');



    ////////////////////PASSWORD
if($user_password == '') {
      // password is empoity
          $errors = array('user_password'  => 'Please enter a password');
    }
    
if($user_password != $user_password_confirm) {
      // passwords do not match
$errors = array('user_password_confirm'  => 'Passwords do not match.');
}
    


///////////////////////EMAIL 
if(!is_email($user_email)) {
      //invalid email
  $errors = array('user_email'  => 'Invalid email.');
  }
  
if(email_exists($user_email)) {
      //Email address already registered
  $errors = array('user_email'  => 'Email is already registered.');
}

 


        ////////////////////PASSWORD
if($user_lname == '') {
      // password is empoity
          $errors = array('user_lname'  => 'Please enter your last name.');
    }
    
    ////////////////////PASSWORD
if($user_fname == '') {
      // password is empoity
          $errors = array('user_fname'  => 'Please enter your first name.');
    }
    



////////////////USER NAME
if (empty($user_username)) {
  //username is empity 
  $errors = array('user_username'  => 'Please enter a username.');
}

if(username_exists($user_username)) {
      // Username already registered
  $errors = array('user_username'  => 'Username is already taken.');
}


if(!validate_username($user_username)) {
      // invalid username
  $errors = array('user_username'  => 'Invalid username.');
}



if(empty($user_18yearsold)) {
      // invalid username
  $errors = array('user_18yearsold'  => 'Please confirm your age.');
}



//var_dump($errors);

if(count($errors) > 0){
//This is for ajax requests:
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
echo json_encode($errors);
exit;
}
//This is when Javascript is turned off:
echo json_encode($errors);
exit;

}else {

  //process form 
  //return true;
 // get_template_part( 'membership/user-registration-step2', 'page' );
//return true;
}
}
}


?>