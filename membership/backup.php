
<?php

//if (isset( $_POST["pippin_user_login"] ) && wp_verify_nonce($_POST['pippin_register_nonce'], 'pippin-register-nonce')) {

//		$user_login		= $_POST["pippin_user_login"];	
//		$user_email		= $_POST["pippin_user_email"];
//		$user_first 	= $_POST["pippin_user_first"];
//		$user_last	 	= $_POST["pippin_user_last"];
//		$user_pass		= $_POST["pippin_user_pass"];
//		$pass_confirm 	= $_POST["pippin_user_pass_confirm"];
 

/**		// this is required for username checks
		require_once(ABSPATH . WPINC . '/registration.php');
 
		if(username_exists($user_login)) {
			// Username already registered
			pippin_errors()->add('username_unavailable', __('Username already taken'));
		}
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
 
		// only create the user in if there are no errors
		if(empty($errors)) {
  get_template_part( 'membership/user-registration-step2', 'page' );
 
		}else {
			var_dump($errors);
		}
*/
?>

<div class="alert alert-danger display-error" style="display: none"> </div>
<form id="registration_form" action="" method="POST">
<fieldset>
<p>
<label for="pippin_user_Login"><?php _e('Username'); ?></label>
<input name="pippin_user_login" id="pippin_user_login" class="required" type="text"/>
</p>
<p>
<label for="pippin_user_email"><?php _e('Email'); ?></label>
<input name="pippin_user_email" id="pippin_user_email" class="required" type="email"/>
</p>
<p>
<label for="pippin_user_first"><?php _e('First Name'); ?></label>
<input name="pippin_user_first" id="pippin_user_first" type="text"/>
</p>
<p>
<label for="pippin_user_last"><?php _e('Last Name'); ?></label>
<input name="pippin_user_last" id="pippin_user_last" type="text"/>
</p>
<p>
<label for="password"><?php _e('Password'); ?></label>
<input name="pippin_user_pass" id="password" class="required" type="password"/>
</p>
<p>
<label for="password_again"><?php _e('Password Again'); ?></label>
<input name="pippin_user_pass_confirm" id="password_again" class="required" type="password"/>
</p>
<p>
<input type="hidden" name="pippin_register_nonce" value="<?php echo wp_create_nonce('pippin-register-nonce'); ?>"/>
<input type="submit" value="<?php _e('Register Your Account'); ?>"/>
</p>
</fieldset>
</form>



