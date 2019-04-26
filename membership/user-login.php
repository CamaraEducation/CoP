<?php

//var_dump($_POST);

if(count($_POST)){
	
//
$login_member_username   = $_POST["login_member_username"];  
$login_member_password   = $_POST["login_member_password"];  
 $user = get_user_by( 'login', $login_member_username );

//var_dump($user);

 //echo home_url();


wp_setcookie($login_member_username, $login_member_password, true);
			wp_set_current_user($user->ID, $login_member_username);	
			do_action('wp_login', $login_member_username);
 
			wp_redirect(get_site_url() ."/landing"); exit;

}else {
	
	?>
	
		<section>
	
			<div class="row">

		
					<div class="col-md-3">	 </div>
				
			<div class="col-md-4">
					<img src="<?php echo get_template_directory_uri(); ?>/images/clogo.svg" alt="" class="img-fluid">

<div class="card" style="background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 8px;margin-top:5%;padding-left:10%;">

						<div class="card-body">
							<h5 class="signup-title-txt" style="margin-left:48px;margin-bottom:24px;">TechSpace Network Login</h5>
							
							


<form id="member_login_form"  action="" method="post">
	
	<input type="hidden" id="member_login" name="member_login" value="YES">

			<fieldset>

				
							<div class="form-groups">
									<label for="login_member_username" class="signup-small-txt" style="display:inline">Username</label>
									<input type="text" class="form-control" id="login_member_username" name="login_member_username">
								</div>	


							<div class="form-groups">
									<label for="login_member_password" class="signup-small-txt" style="display:inline">Username</label>
									<input type="password" class="form-control" id="login_member_password" name="login_member_password">
								</div>	



<div class="text-center">
<input type="submit" type="submit" name="login-submit" id="login-submit" class="land-btn land-btn-txt mt-4" value="LOGIN">
</div>


				</p>
			</fieldset>
		</form>


						</div>
					</div>
				</div> 
			</div>
	
	</section>

	<?php 
}
?>