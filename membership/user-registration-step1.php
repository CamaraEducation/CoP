
<?php

if(isset($_POST['submit'])){
	
	echo "foprm is subited" . $_POST['user_fname'];
	
    get_template_part( 'membership/user-registration-step2', 'page' );


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
							<form id="" method="POST">
								<div class="form-group mt-5">
									<label for="exampleInputName" class="signup-small-txt">Full Name</label>
									<input type="text" class="form-control" id="fname">
								</div>


								<div class="form-group">
									<label for="exampleInputEmail" class="signup-small-txt">Email</label>
									<input type="email" class="form-control" id="femail">
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputPassword1" class="signup-small-txt">Password</label>
											<input type="password" class="form-control" id="exampleInputPassword1">
										</div>
									</div>


									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputPassword1" class="signup-small-txt">Confirm Password</label>
											<input type="password" class="form-control" id="exampleInputPassword1">
										</div>
									</div>
								</div>

								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
										<label class="form-check-label tick-text" for="exampleCheck1">By ticking this box you are confirming you are over 18 years of age</label>
								</div>
							
								<div class="text-center">
								<button type="submit" name="submit" class="land-btn land-btn-txt mt-4">Sign Up to Network</button> 
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



