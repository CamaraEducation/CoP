
<?php

if(isset($_POST['submit'])){
	

//    get_template_part( 'membership/user-registration-step2', 'page' );


}else {
	
	?>
	
	
	<section>
		<div class="container mt-4 border">
			<div class="row">
				<div class="col-md-6 mb-2">
					<img src="<?php echo get_template_directory_uri(); ?>/images/login_image.png" class="img-fluid" alt="" width="500" height="600">
				</div>

				<div class="col-md-6 justify-content-center align-self-center">
					<img src="assets/images/clogo.svg" alt="" class="img-fluid">
					<div class="card" style="background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 8px;">
						<div class="card-body">
							<h5 class="signup-title-txt">Sign Up to the Online TechSpace Network</h5>
							
							<form id="onboardingformstep1" method="POST" name="onboardingformstep1" action=''>
							
							<div class="form-group">
									<label for="exampleInputEmail" class="signup-small-txt">Username</label>
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
									<input type="checkbox" class="form-check-input" id="18yearsyearsold" name="18yearsyearsold">
										<label class="form-check-label tick-text" for="exampleCheck1">By ticking this box you are confirming you are over 18 years of age</label>
								</div>
							
								<div class="text-center">
								<button type="submit" name="submit" class="land-btn land-btn-txt mt-4 onboarding-submit submit">Sign Up to Network</button> 
								</div>
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



