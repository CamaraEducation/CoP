<?php

//var_dump($_POST);

if(count($_POST)){
	


	$login_member_username   = $_POST["login_member_username"];  
	$login_member_password   = $_POST["login_member_password"];  
	$user = get_user_by( 'login', $login_member_username );

//var_dump($user);

 //echo home_url();

	$creds = array(
		'user_login'    => $login_member_username,
		'user_password' => $login_member_password,
		'remember'      => true
	);

	$user = wp_signon( $creds, false );
	if ( is_wp_error( $user ) ) {
		echo $user->get_error_message();
	}


	wp_redirect(get_site_url() ."/landing"); exit;
	

//
//wp_set_auth_cookie($login_member_username, true);
//wp_set_current_user($user->ID, $login_member_username);	
//do_action('wp_login', $login_member_username);
	


}else {
	
	?>
	
	
	<section>
		<div class="container-fluid">
			
			<div class="row">

				
				<img src="<?php echo get_template_directory_uri(); ?>/images/stpic.png" class="img-fluid" alt="">
				
				<div class="col-md-4">
					<a href="<?php echo get_site_url();?>">
						<img src="<?php echo get_template_directory_uri(); ?>/images/clogo.svg" alt="" class="img-fluid">
					</a>

					<div class="card register-card" style="width: 537px !important;margin-left: 70px; margin-top: 104px !important;">

						
						<div class="card-body" style="margin-left: 56px;margin-right: 56px;">
							<h5 class="signup-title-txt" align="center" style="margin-top:48px; margin-bottom: 25px;">TechSpace Network Login</h5>
							
							


							<form id="member_login_form"  action="" method="post">
								
								<input type="hidden" id="member_login" name="member_login" value="YES">

								<fieldset>

									
									<div class="form-groups" style="margin-top: 24px;">
										<label for="login_member_username" class="signup-small-txt" style="display:inline">Username</label>
										<input type="text" class="form-control" id="login_member_username" name="login_member_username">
									</div>	


									<div class="form-groups" style="margin-top: 24px;">
										<label for="login_member_password" class="signup-small-txt" style="display:inline">Password</label>
										<input type="password" class="form-control" id="login_member_password" name="login_member_password">
									</div>	


									<div class="text-center" style="margin-top: 24px;">
										<span style="margin:14px;display:block;"> Did you forgot your username/password?  <a href="<?php echo get_site_url();?>/password-reset">Click here </a>to reset it or <a href="<?php echo get_site_url();?>/register"> create </a> a new account. </span>
										<input type="submit" type="submit" name="login-submit" id="login-submit" class="btn land-btn land-btn-txt mt-4 login-submit" value="LOGIN">

										<span style="margin:12px;"> </span>
									</div>


								</p>
							</fieldset>
						</form>


					</div>
				</div>

			</div>
		</div> 
	</div>
	
</section>


<?php 
}
?>