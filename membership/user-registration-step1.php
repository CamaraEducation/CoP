<?php

//var_dump($_POST);

if(count($_POST)){
	
//
	get_template_part( 'membership/user-registration-step2', 'page' );


}else {
	
	?>
	
	
	<section>
<div class="container-fluid">
		<div class="row">


			<img src="<?php echo get_template_directory_uri(); ?>/images/stpic.png" class="img-fluid" alt="">

			<div class="col-md-5">
				<a href="<?php echo get_site_url();?>">
					<img src="<?php echo get_template_directory_uri(); ?>/images/clogo.svg" alt="" class="img-fluid">
				</a>
				<div class="container">
					<div class="card register-card" style="width: 537px !important;margin-left: 70px; margin-top: 104px !important;">

						<div class="card-body" style="margin-left: 56px;margin-right: 56px;">
							<h5 class="signup-title-txt" align="center" style="margin-top:48px; margin-bottom: 45px;">Sign Up to the Online TechSpace Network</h5>

							<form id="onboardingformstep" method="POST" name="onboardingformstep" action='<?php the_permalink(); ?>'>

								<input type="hidden" id="formstep" name="formstep" value="step1">


								<div class="form-group" style="margin-top: 24px;">
									<label for="user_username" class="signup-small-txt">Username</label>
									<input type="text" class="form-control" id="user_username" name="user_username">
								</div>

								<div class="row" style="margin-top: 24px;">
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

								<div class="row" style="margin-top: 24px;">
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

								<div class="form-check" style="margin-top: 24px;">

									<input type="checkbox" class="form-check-input" id="user_18yearsold" name="user_18yearsold" value="YES">
									By ticking this box you are confirming you are over 18 years of age and you have read the <a href="" data-toggle="modal" data-target="#termagreementModalLong" style="color:#0000EE;font-weight: bold;">TechSpace Online Network Membership terms and conditions</a>.

									<label class="form-check-label tick-text" for="user_18yearsold"> </label>
								</div>

								<div class="text-center" style="margin-bottom: 74px;margin-top: 24px;">


									<input type="submit" class="btn land-btn11 land-btn-txt mt-4 register-submit" value="SIGN UP ">


								</div>
							</form>
						</div>
					</div>
				</div> 


			</div>
		</div>
		</div>


		<!-- Modal -->
		<div class="modal fade" id="termagreementModalLong" tabindex="-1" role="dialog" aria-labelledby="termagreementModalLongTitle" aria-hidden="true">

			<div class="modal-dialog modal-lg">

				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">TechSpace Online Network Membership</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">

							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<?php cn_include_content(343); ?>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>

			</div>
		</div>

	</section>




	<?php wp_footer();?>


	<!-- ./Footer -->
	<!-- Bootstrap core JS -->


	<?php
}
?>



