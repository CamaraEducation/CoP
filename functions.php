

<?php






function add_cors_http_header(){
    header("Access-Control-Allow-Origin: *");
}

add_action('init','add_cors_http_header');


//echo $_POST['user_fname'];

function example_ajax_enqueue() {
// Enqueue javascript on the frontend.
wp_enqueue_script(
'example-ajax-script', get_template_directory_uri() . '/js/msform2.js',array('jquery'));
// The wp_localize_script allows us to output the ajax_url path for our script to use.
wp_localize_script('example-ajax-script','example_ajax_obj',array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));

}

//add scripts and set up ajax
//add_action( 'wp_enqueue_scripts', 'example_ajax_enqueue' );
//add_action( 'wp_ajax_example_ajax_request', 'example_ajax_request' );
//add_action( 'wp_ajax_nopriv_example_ajax_request', 'example_ajax_request' );



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





function login_ajax_enqueue() {
// Enqueue javascript on the frontend.
wp_enqueue_script(
'login-ajax-script', get_template_directory_uri() . '/js/login_js.js',array('jquery'));

// The wp_localize_script allows us to output the ajax_url path for our script to use.
wp_localize_script('login-ajax-script','login_ajax_obj',array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));
}

//add scripts and set up ajax
add_action( 'wp_enqueue_scripts', 'login_ajax_enqueue' );
add_action( 'wp_ajax_login_ajax_request', 'login_ajax_request' );
add_action( 'wp_ajax_nopriv_login_ajax_request', 'login_ajax_request' );



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



function login_ajax_request() {

if(isset($_POST['member_login'])){

$errors=[];

$login_member_username   = $_POST["login_member_username"];  
$login_member_password   = $_POST["login_member_password"];  


//=================START OF LOGIN ============
 //$hash = wp_hash_password( $login_member_password );
 $user = get_user_by( 'login', $login_member_username );

// check the user's login with their password
    if(!wp_check_password($login_member_password, $user->user_pass, $user->ID)) {
      // if the password is incorrect for the specified user
      $errors = array('login_member_password'  => 'Invalid password. Please enter the correct password.');
    }

if(!username_exists($login_member_username)) {
      // Username already registered
  $errors = array('login_member_username'  => 'Username does not exist. Please enter a correct username.');
}

}//end of issets 
//================================END OF LOGIN ===================


if(isset($_POST['change_password'])){
$current_user = wp_get_current_user();
$user_current_password   = $_POST["user_current_password"];  
$login_member_password_new   = $_POST["user_new_password"];  
$login_member_password_new_confirm   = $_POST["user_new_password_confirm"];  

    if(!wp_check_password($user_current_password, $current_user->user_pass, $current_user->ID)) {
      // if the password is incorrect for the specified user
      $errors = array('user_current_password'  => 'Invalid password. Please enter your correct password.');
    }


    
if($login_member_password_new != $login_member_password_new_confirm) {
      // passwords do not match
$errors = array('user_new_password_confirm'  => 'Passwords do not match. Please try again.');
}

if($login_member_password_new == $user_current_password) {
      // passwords do not match
$errors = array('user_new_password_confirm'  => 'You new password cannot be the same as the current password.');
}


}//end of change passworld 

//update email
if(isset($_POST['update_email'])){


$user_email_new   = $_POST["user_email_new"];  

if($user_email_new == '') {
      // passwords do not match
$errors = array('user_email_new'  => 'Please enter a valid email address.');
}

if(email_exists($user_email_new)) {
      //Email address already registered
  $errors = array('user_email_new'  => 'Email is already registered. Please enter another email.');
}


}//end of update email


if(isset($_POST['reset_password_form_verifyuser'])){

$useraccountinput= $_POST['reset_member_username'];

if(empty($useraccountinput)){
 $errors = array('reset_member_username'  => 'Please enter a username or email address');
}

if (filter_var($useraccountinput, FILTER_VALIDATE_EMAIL)){ 
$member_email= trim($useraccountinput);
//$member_account=get_user_by('email',$member_email);
if(!email_exists($member_email)) {
 $errors = array('reset_member_username'  => 'The email address you entered does not exists.');
} 

} else {//endise
$member_username= trim($useraccountinput);


if(!username_exists($member_username)) {
 $errors = array('reset_member_username'  => 'The username you entered does not exists.');
} 



}//outside


}//end of member password veriy 


// now lets change if the user putting correct passwords
if(isset($_POST['member_passwordreset_changepassword'])){

$reset_new_password= $_POST['reset_new_password'];
$reset_new_password_confirm= $_POST['reset_new_password_confirm'];

$user_login= $_POST['reset_for_user'];
$member_account=get_user_by('login',$user_login);

////////////////USER NAME
if (empty($reset_new_password)) {
  //username is empity 
  $errors = array('reset_new_password'  => 'Please enter a password.');
}

////////////////USER NAME
if (empty($reset_new_password_confirm)) {
  //username is empity
  $errors = array('reset_new_password_confirm'  => 'Please confirm your password.');
}

if ($reset_new_password_confirm != $reset_new_password) {
  $errors = array('reset_new_password_confirm'  => 'Your new passwords do not match.');
}

}//end of big eff



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


if(isset($_POST['change_password'])){

//wp_set_password($_POST["user_new_password"],$current_user->ID);

$new_pass= $login_member_password_new;


do_action('password_reset', $current_user, $new_pass);
wp_set_password($new_pass, $current_user->ID );
$updated = update_usermeta($current_user->ID, 'default_password_nag', false);

}


if(isset($_POST['change_email'])){
$user_id = wp_update_user( array( 'ID' => $user_id, 'user_url' => $website ) );
}

//when there is no error 
if(isset($_POST['reset_password_form_verifyuser'])){
//call the function to generate an email and send it to the user
resetPasswordemail($_POST['reset_member_username']);

}

if(isset($_POST['reset_password_form_changepassword'])){


$new_pass= $reset_new_password;
//change password

do_action('password_reset', $member_account, $new_pass);
wp_set_password($new_pass, $member_account->ID );
$updated = update_usermeta($member_account->ID, 'default_password_nag', false);

}

  //no errors; 
}//else
//}//if issets

} //function 



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





function example_ajax_request() {

$user_login   = $_POST["user_username"];  
$user_email   = $_POST["user_email"];
$user_first   = $_POST["user_fname"];
$user_last    = $_POST["user_lname"];
$user_pass    = $_POST["user_pass"];
$pass_confirm   = $_POST["user_pass_confirm"];



 
if(!validate_username($user_login)) {
      // invalid username
      pippin_errors()->add('username_invalid', __('Invalid username'));
    }

    if($user_login == '') {
      // empty username
      pippin_errors()->add('username_empty', __('Please enter a username'));
    }

    if(!is_email($user_email)) {
      //invalid email
      pippin_errors()->add('email_invalid', __('Invalid email'));
    }
    if(email_exists($user_email)) {
      //Email address already registered
      pippin_errors()->add('email_used', __('Email already registered'));
    }

    if($user_pass == '') {
      // passwords do not match
      pippin_errors()->add('password_empty', __('Please enter a password'));
    }
    if($user_pass != $pass_confirm) {
      // passwords do not match
      pippin_errors()->add('password_mismatch', __('Passwords do not match'));
    }



   $errors = pippin_errors()->get_error_messages();
 
    if(!empty($errors)) {
$errors = pippin_show_error_messages(); 
    echo  $errors;
  }
}


// used for tracking error messages
function pippin_errors(){
    static $wp_error; // Will hold global variable safely
    return isset($wp_error) ? $wp_error : ($wp_error = new WP_Error(null, null, null));
}



// displays error messages from form submissions
function pippin_show_error_messages() {
  if($codes = pippin_errors()->get_error_codes()) {
    echo '<div class="pippin_errors">';
        // Loop error codes and display errors
       foreach($codes as $code){
            $message = pippin_errors()->get_error_message($code);
            echo '<span class="error"><strong>' . __('Error') . '</strong>: ' . $message . '</span><br/>';
        }
    echo '</div>';
  } 
}



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



///////// If the user is Sad/////////////////
function userDisliked($userid, $postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT satsfaction FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );
if ($valu == 1) {
return true;
}else{
return false;
}
}

function userLiked($userid, $postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT satsfaction FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );
if ($valu == 2) {
return true;
}else{
return false;
}
}

function userExcited($userid, $postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT satsfaction FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );
if ($valu == 3) {
return true;
}else{
return false;
}
}

///////// End of If the user is Excited/////////////////
if (isset($_POST['likeaction'])) {

$action = $_POST['likeaction'];
$post_id = $_POST['post_id'];
$user_id = $_POST['user_id'];
$table_name = $wpdb->prefix . 'feedback';
$row = $wpdb->get_var( "SELECT * FROM ".$wpdb->prefix."feedback WHERE user_id = '".$user_id."' && post_id = '".$post_id."'" );
$ml = $wpdb->get_var( "SELECT satsfaction FROM ".$wpdb->prefix."feedback WHERE user_id = '".$user_id."' && post_id = '".$post_id."'" );

switch ($action) {
case 'dislike':
if (empty($row)){
$data_array = array(
'user_id' => $user_id,
'post_id' => $post_id,
'satsfaction' => 1,
'level' => 0,
'time_taken' => 0,
'age_group' => 0 );
$sql=$wpdb->insert($table_name, $data_array, $format=NULL);
}elseif($ml == 0 || $ml == 2 || $ml == 3){
$wpdb->query($wpdb->prepare("UPDATE $table_name SET satsfaction = 1 WHERE user_id=$user_id && post_id = $post_id"));
}
break;
case 'undislike':
$wpdb->query($wpdb->prepare("UPDATE $table_name SET satsfaction = 0 WHERE user_id=$user_id && post_id = $post_id"));
break;
case 'like':
if (empty($row)){
$data_array = array(
'user_id' => $user_id,
'post_id' => $post_id,
'satsfaction' => 2,
'level' => 0,
'time_taken' => 0,
'age_group' => 0 );
$sql=$wpdb->insert($table_name, $data_array, $format=NULL);
}elseif($ml == 0 || $ml == 1 || $ml == 3){
$wpdb->query($wpdb->prepare("UPDATE $table_name SET satsfaction = 2 WHERE user_id=$user_id && post_id = $post_id"));
}
break;
case 'unlike':
$wpdb->query($wpdb->prepare("UPDATE $table_name SET satsfaction = 0 WHERE user_id=$user_id && post_id = $post_id"));
break;
case 'excited':
if (empty($row)){
$data_array = array(
'user_id' => $user_id,
'post_id' => $post_id,
'satsfaction' => 3,
'level' => 0,
'time_taken' => 0,
'age_group' => 0 );
$sql=$wpdb->insert($table_name, $data_array, $format=NULL);
}elseif($ml == 0 || $ml == 1 || $ml == 2){
$wpdb->query($wpdb->prepare("UPDATE $table_name SET satsfaction = 3 WHERE user_id=$user_id && post_id = $post_id"));
}
break;
case 'unexcited':
$wpdb->query($wpdb->prepare("UPDATE $table_name SET satsfaction = 0 WHERE user_id=$user_id && post_id = $post_id"));
default:
break;
}
echo getRating($post_id);
exit(0);
}
function getRating($id)
{
global $wpdb;
$rating = array();
$sad = $wpdb->get_var( "SELECT sum(satsfaction = 1) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$id."'" );
$happy = $wpdb->get_var( "SELECT sum(satsfaction = 2) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$id."'" );
$excite = $wpdb->get_var( "SELECT sum(satsfaction = 3) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$id."'" );

$rating = [
'likes' => $happy[0],
'dislikes' => $sad[0],
'excites' => $excite[0]
];
return json_encode($rating);
}

////////////////////////////////Satsfaction get ////////////////////////////

function getsatone($postid)
{
global $wpdb;
//$valu = $wpdb->get_var( "SELECT sum(level = 1) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$postid."'" );

$valu=$wpdb->get_var( "SELECT sum(satsfaction = 1) FROM ".$wpdb->prefix."feedback WHERE post_id = $postid " );

return json_encode($valu, JSON_NUMERIC_CHECK);

}
function getsattwo($postid)
{
global $wpdb;
//$valu = $wpdb->get_var( "SELECT sum(level = 1) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$postid."'" );

$valu=$wpdb->get_var( "SELECT sum(satsfaction = 2) FROM ".$wpdb->prefix."feedback WHERE post_id = $postid " );

return json_encode($valu, JSON_NUMERIC_CHECK);

}
function getsatthr($postid)
{
global $wpdb;
//$valu = $wpdb->get_var( "SELECT sum(level = 1) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$postid."'" );

$valu=$wpdb->get_var( "SELECT sum(satsfaction = 3) FROM ".$wpdb->prefix."feedback WHERE post_id = $postid " );

return json_encode($valu, JSON_NUMERIC_CHECK);

}



///////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////// END OF SATSFACTION ///////////////////////////////////////////////////////////
////////////////////////////////////////////// LEVEL ///////////////////////////////////////////////////////////
function userBiggner($userid, $postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT level FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );
if ($valu == 1) {
return true;
}else{
return false;
}
}
function getBiggner($postid)
{
global $wpdb;
//$valu = $wpdb->get_var( "SELECT sum(level = 1) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$postid."'" );

$valu=$wpdb->get_var( "SELECT sum(level = 1) FROM ".$wpdb->prefix."feedback WHERE post_id = $postid " );

return json_encode($valu, JSON_NUMERIC_CHECK);

}
///////// End of If the user is Sad/////////////////
///////// If the user is Happy/////////////////
function userInter($userid, $postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT level FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );
if ($valu == 2) {
return true;
}else{
return false;
}
}
function getInter($postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT sum(level = 2) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$postid."'" );
return json_encode($valu, JSON_NUMERIC_CHECK);
}
///////// End of If the user is Happy/////////////////
///////// If the user is Excited/////////////////
function userAdvance($userid, $postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT level FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );
if ($valu == 3) {
return true;
}else{
return false;
}
}
function getAdvance($postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT sum(level = 3) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$postid."'" );
return json_encode($valu, JSON_NUMERIC_CHECK);
}
///////// End of If the user is Excited/////////////////
if (isset($_POST['levelaction'])) {
$levelaction = $_POST['levelaction'];
$post_id = $_POST['post_id'];
$user_id = $_POST['user_id'];
$table_name = $wpdb->prefix .'feedback'; 
$row = $wpdb->get_var( "SELECT * FROM ".$wpdb->prefix."feedback WHERE user_id = '".$user_id."' && post_id = '".$post_id."'" );
$ml = $wpdb->get_var( "SELECT level FROM ".$wpdb->prefix."feedback WHERE user_id = '".$user_id."' && post_id = '".$post_id."'" );
switch ($levelaction) {
case 'biggner':
if (empty($row)){
$data_array = array(
'user_id' => $user_id,
'post_id' => $post_id,
'satsfaction' => 0,
'level' => 1,
'taken_time' => 0,
'age_group' => 0 );
$sql=$wpdb->insert($table_name, $data_array, $format=NULL);
}else if($ml == 0 || $ml == 2 || $ml == 3){
$wpdb->query($wpdb->prepare("UPDATE $table_name SET level = 1 WHERE user_id=%d && post_id = %s", $user_id, $post_id));
}
break;
case 'unbiggner':
$wpdb->query($wpdb->prepare("UPDATE $table_name SET level = 0 WHERE user_id=%d && post_id = %s", $user_id, $post_id));
break;
case 'inter':
if (empty($row)){
$data_array = array(
'user_id' => $user_id,
'post_id' => $post_id,
'satsfaction' => 0,
'level' => 2,
'taken_time' => 0,
'age_group' => 0 );
$sql=$wpdb->insert($table_name, $data_array, $format=NULL);
}else if($ml == 0 || $ml == 1 || $ml == 3){
$wpdb->query($wpdb->prepare("UPDATE $table_name SET level = 2 WHERE user_id=%d && post_id = %s", $user_id, $post_id));
}
break;
case 'uninter':
$wpdb->query($wpdb->prepare("UPDATE $table_name SET level = 0 WHERE user_id=%d && post_id = %s", $user_id, $post_id));
break;
case 'advance':
if (empty($row)){
$data_array = array(
'user_id' => $user_id,
'post_id' => $post_id,
'satsfaction' => 0,
'level' => 3,
'taken_time' => 0,
'age_group' => 0 );
$sql=$wpdb->insert($table_name, $data_array, $format=NULL);
}else if($ml == 0 || $ml == 1 || $ml == 2){
$wpdb->query($wpdb->prepare("UPDATE $table_name SET level = 3 WHERE user_id=%d && post_id = %s", $user_id, $post_id));
}
break;
case 'unadvance':
$wpdb->query($wpdb->prepare("UPDATE $table_name SET level = 0 WHERE user_id=%d && post_id = %s", $user_id, $post_id));
default:
break;
}
echo getRatingLevel($post_id);
exit(0);
}
function getRatingLevel($id)
{
global $wpdb;
$rating = array();
$biggner = $wpdb->get_var( "SELECT sum(level = 1) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$id."'" );
$inter = $wpdb->get_var( "SELECT sum(level = 2) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$id."'" );
$advance = $wpdb->get_var( "SELECT sum(level = 3) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$id."'" );
$rating = [
'biggners' => $biggner[0],
'inters' => $inter[0],
'advances' => $advance[0]
];
return json_encode($rating);
}
//////////////////////////////////////END OF LEVEL/////////////////////////////////////////////
//////////////////////////////////////TIME/////////////////////////////////////////////


//////////////////////////////////////TIME/////////////////////////////////////////////
function userLessOne($userid, $postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT taken_time FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );
if ($valu == 1) {
return true;
}else{
return false;
}
}
function getLessOne($postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT sum(taken_time = 1) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$postid."'" );
return json_encode($valu, JSON_NUMERIC_CHECK);
}
///////// End of If the user is Sad/////////////////
///////// If the user is Happy/////////////////
function userOneToTwo($userid, $postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT taken_time FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );
if ($valu == 2) {
return true;
}else{
return false;
}
}
function getOneToTwo($postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT sum(taken_time = 2) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$postid."'" );
return json_encode($valu, JSON_NUMERIC_CHECK);
}
///////// End of If the user is Happy/////////////////
///////// If the user is Excited/////////////////
function userMoreTwo($userid, $postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT taken_time FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );
if ($valu == 3) {
return true;
}else{
return false;
}
}
function getMoreTwo($postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT sum(taken_time = 3) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$postid."'" );
return json_encode($valu, JSON_NUMERIC_CHECK);
}
///////// End of If the user is Excited/////////////////
if (isset($_POST['timeaction'])) {
$timeaction = $_POST['timeaction'];
$post_id = $_POST['post_id'];
$user_id = $_POST['user_id'];
$table_name = $wpdb->prefix .'feedback';
$row = $wpdb->get_var( "SELECT * FROM ".$wpdb->prefix."feedback WHERE user_id = '".$user_id."' && post_id = '".$post_id."'" );
$ml = $wpdb->get_var( "SELECT taken_time FROM ".$wpdb->prefix."feedback WHERE user_id = '".$user_id."' && post_id = '".$post_id."'" );
switch ($timeaction) {
case 'biggner':
if (empty($row)){
$data_array = array(
'user_id' => $user_id,
'post_id' => $post_id,
'satsfaction' => 0,
'level' => 0,
'taken_time' => 1,
'age_group' => 0 );
$sql=$wpdb->insert($table_name, $data_array, $format=NULL);
}else if($ml == 0 || $ml == 2 || $ml == 3){
$wpdb->query($wpdb->prepare("UPDATE $table_name SET taken_time = 1 WHERE user_id=$user_id && post_id = $post_id"));
}
break;
case 'unbiggner':
$wpdb->query($wpdb->prepare("UPDATE $table_name SET taken_time = 0 WHERE user_id=$user_id && post_id = $post_id"));
break;
case 'inter':
if (empty($row)){
$data_array = array(
'user_id' => $user_id,
'post_id' => $post_id,
'satsfaction' => 0,
'level' => 0,
'taken_time' => 2,
'age_group' => 0 );
$sql=$wpdb->insert($table_name, $data_array, $format=NULL);
}else if($ml == 0 || $ml == 1 || $ml == 3){
$wpdb->query($wpdb->prepare("UPDATE $table_name SET taken_time = 2 WHERE user_id=$user_id && post_id = $post_id"));
}
break;
case 'uninter':
$wpdb->query($wpdb->prepare("UPDATE $table_name SET taken_time = 0 WHERE user_id=$user_id && post_id = $post_id"));
break;
case 'advance':
if (empty($row)){
$data_array = array(
'user_id' => $user_id,
'post_id' => $post_id,
'satsfaction' => 0,
'level' => 0,
'taken_time' => 3,
'age_group' => 0 );
$sql=$wpdb->insert($table_name, $data_array, $format=NULL);
}else if($ml == 0 || $ml == 1 || $ml == 2){
$wpdb->query($wpdb->prepare("UPDATE $table_name SET taken_time = 3 WHERE user_id=$user_id && post_id = $post_id"));
}
break;
case 'unadvance':
$wpdb->query($wpdb->prepare("UPDATE $table_name SET taken_time = 0 WHERE user_id=$user_id && post_id = $post_id"));
default:
break;
}
echo getRatingTime($post_id);
exit(0);
}
function getRatingTime($id)
{
global $wpdb;
$rating = array();
$lessone = $wpdb->get_var( "SELECT sum(taken_time = 1) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$id."'" );
$onetotwo = $wpdb->get_var( "SELECT sum(taken_time = 2) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$id."'" );
$moretwo = $wpdb->get_var( "SELECT sum(taken_time = 3) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$id."'" );
$rating = [
'lessone' => $lessone[0],
'onetotwo' => $onetotwo[0],
'moretwo' => $moretwo[0]
];
return json_encode($rating);
}
///////////////////////////////////// END OF TIME ////////////////////////////////////////




/////////////////////////////////////AGE GROUP////////////////////////////////////////
function userBiggnerAge($userid, $postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT age_group FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );
if ($valu == 1) {
return true;
}else{
return false;
}
}
function getBiggnerAge($postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT sum(age_group = 1) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$postid."'" );
return json_encode($valu, JSON_NUMERIC_CHECK);
}
///////// End of If the user is Sad/////////////////
///////// If the user is Happy/////////////////
function userInterAge($userid, $postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT age_group FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );
if ($valu == 2) {
return true;
}else{
return false;
}
}
function getInterAge($postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT sum(age_group = 2) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$postid."'" );
return json_encode($valu, JSON_NUMERIC_CHECK);
}
///////// End of If the user is Happy/////////////////
///////// If the user is Excited/////////////////
function userAdvanceAge($userid, $postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT age_group FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );
if ($valu == 3) {
return true;
}else{
return false;
}
}
function getAdvanceAge($postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT sum(age_group = 3) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$postid."'" );
return json_encode($valu, JSON_NUMERIC_CHECK);
}
///////// End of If the user is Excited/////////////////
if (isset($_POST['ageaction'])) {
$ageaction = $_POST['ageaction'];
$post_id = $_POST['post_id'];
$user_id = $_POST['user_id'];
$table_name = $wpdb->prefix .'feedback';
$row = $wpdb->get_var( "SELECT * FROM ".$wpdb->prefix."feedback WHERE user_id = '".$user_id."' && post_id = '".$post_id."'" );
$ml = $wpdb->get_var( "SELECT age_group FROM ".$wpdb->prefix."feedback WHERE user_id = '".$user_id."' && post_id = '".$post_id."'" );
switch ($ageaction) {
case 'biggner':
if (empty($row)){
$data_array = array(
'user_id' => $user_id,
'post_id' => $post_id,
'satsfaction' => 0,
'level' => 0,
'taken_time' => 0,
'age_group' => 1 );
$sql=$wpdb->insert($table_name, $data_array, $format=NULL);
}else if($ml == 0 || $ml == 2 || $ml == 3){
$wpdb->query($wpdb->prepare("UPDATE $table_name SET age_group = 1 WHERE user_id=$user_id && post_id = $post_id"));
}
break;
case 'unbiggner':
$wpdb->query($wpdb->prepare("UPDATE $table_name SET age_group = 0 WHERE user_id=$user_id && post_id = $post_id"));
break;
case 'inter':
if (empty($row)){
$data_array = array(
'user_id' => $user_id,
'post_id' => $post_id,
'satsfaction' => 0,
'level' => 0,
'taken_time' => 0,
'age_group' => 2 );
$sql=$wpdb->insert($table_name, $data_array, $format=NULL);
}else if($ml == 0 || $ml == 1 || $ml == 3){
$wpdb->query($wpdb->prepare("UPDATE $table_name SET age_group = 2 WHERE user_id=$user_id && post_id = $post_id"));
}
break;
case 'uninter':
$wpdb->query($wpdb->prepare("UPDATE $table_name SET age_group = 0 WHERE user_id=$user_id && post_id = $post_id"));
break;
case 'advance':
if (empty($row)){
$data_array = array(
'user_id' => $user_id,
'post_id' => $post_id,
'satsfaction' => 0,
'level' => 0,
'taken_time' => 3,
'age_group' => 3 );
$sql=$wpdb->insert($table_name, $data_array, $format=NULL);
}else if($ml == 0 || $ml == 1 || $ml == 2){
$wpdb->query($wpdb->prepare("UPDATE $table_name SET age_group = 3 WHERE user_id=$user_id && post_id = $post_id"));
}
break;
case 'unadvance':
$wpdb->query($wpdb->prepare("UPDATE $table_name SET age_group = 0 WHERE user_id=$user_id && post_id = $post_id"));
default:
break;
}
echo getRatingAge($post_id);
exit(0);
}
function getRatingAge($id)
{
global $wpdb;
$rating = array();
$agebiggner = $wpdb->get_var( "SELECT sum(age_group = 1) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$id."'" );
$ageinter = $wpdb->get_var( "SELECT sum(age_group = 2) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$id."'" );
$ageadvance = $wpdb->get_var( "SELECT sum(age_group = 3) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$id."'" );
$rating = [
'agebiggner' => $agebiggner[0],
'ageinter' => $ageinter[0],
'ageadvance' => $ageadvance[0]
];
return json_encode($rating);
}



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



function resetPasswordemail ($useraccountinput){

//echo "the email is sen<br>";

if (filter_var($useraccountinput, FILTER_VALIDATE_EMAIL)){ 
$member_email= trim($useraccountinput);
$member_account=get_user_by('email',$member_email);
}else {//its a userna
$member_username= trim($useraccountinput);
$member_account=get_user_by('login',$member_username);
}


//echo $member_account->ID;
//echo $member_account->user_email;
$user_login = $member_account->user_login;
$user_email = $member_account->user_email;

$adt_rp_key = get_password_reset_key( $member_account );


$rp_link =network_site_url("password-reset/?action=rp&key=$adt_rp_key&login=" . rawurlencode($user_login), 'login') ;



//$_SESSION['drere_url']= $rp_link +$member_account->login ;


$emailMessage =" You have requested for your password to be reset to login to the Techspace Network. To confirm, please click on the link below, or copy and paste the entire link to your browser. " . "\r\n\r\n";

$emailMessage .= $rp_link . "\r\n\r\n";

$emailMessage .="Please note that this confirmation is temporary and may require your immediate attention if you wish to access your online account in the future." . "\r\n";


$emailMessage .=  "\r\n\r\n" . get_bloginfo( 'name' );
$emailMessage .=  "\r\n" . get_site_url();

//echo $emailMessage;
$admin_email =  get_bloginfo( 'admin_email' );
$to= $user_email;
$site_title =  get_bloginfo( 'name' );
$subject = "Password Reset Instructions";
//$emailMessage="esting";

$headers[] = 'From: '.$site_title .'<'.$admin_email .'>';

//send the email
wp_mail( $to, $subject, $emailMessage, $headers );


}