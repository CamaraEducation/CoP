<?php

//var_dump($_POST);

if(count($_POST)){
	
//
get_template_part( 'membership/user-registration-step2', 'page' );


}else {
	
	?>
	
	
	<section>
	
			<div class="row">

		
					<img src="<?php echo get_template_directory_uri(); ?>/images/login_image.png" class="img-fluid" alt="" width="500" height="600">
				
			<div class="col-md-5">
					<img src="<?php echo get_template_directory_uri(); ?>/images/clogo.svg" alt="" class="img-fluid">

<div class="card" style="background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 8px;margin-top:15%;margin-left:15%;">

						<div class="card-body">
							<h5 class="signup-title-txt" style="margin-left:48px;margin-bottom:24px;">Sign Up to the Online TechSpace Network</h5>
							
							<form id="onboardingformstep" method="POST" name="onboardingformstep" action='<?php the_permalink(); ?>'>
							
 <input type="hidden" id="formstep" name="formstep" value="step1">


							<div class="form-group">
									<label for="user_username" class="signup-small-txt">Username</label>
									<input type="email" class="form-control" id="user_username" name="user_username">
								</div>

	<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputPassword1" class="signup-small-txt">First Name</label>
											<input type="text" class="form-control" id="user_fname" name="user_fname">
										</div>
									</div>


									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputPassword1" class="signup-small-txt">Last Name</label>
											<input type="text" class="form-control" id="user_lname" name="user_lname">
										</div>
									</div>
								</div>

								<div class="form-group">
									<label for="exampleInputEmail" class="signup-small-txt">Email</label>
									<input type="email" class="form-control" id="user_email" name="user_email">
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputPassword1" class="signup-small-txt">Password</label>
											<input type="password" class="form-control" id="user_password" name="user_password">
										</div>
									</div>


									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputPassword1" class="signup-small-txt">Confirm Password</label>
											<input type="password" class="form-control" id="user_password_confirm" name="user_password_confirm">
										</div>
									</div>
								</div>

								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="user_18yearsold" name="user_18yearsold" value="YES">
										By ticking this box you are confirming you are over 18 years of age.
										<label class="form-check-label tick-text" for="user_18yearsold"> </label>
								</div>
							
								<div class="text-center">
<input type="submit" class="land-btn land-btn-txt mt-4" value="SIGN UP ">
								</div>
							</form>
						</div>
					</div>
				</div> 
			</div>
	
	</section>

	
	
	
  <?php
}
?>



