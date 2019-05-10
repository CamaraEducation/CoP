<?php




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

?>