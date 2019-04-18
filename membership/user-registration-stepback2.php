
<div class="row">
  <div class="col-sm-4">
 <img src="<?php echo get_template_directory_uri(); ?>/images/login_image.png" class="img-fluid" alt="" width="500" height="600">
  </div>
  
  
  <!-- Right side -->
  <div class="col-sm-4">

            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active"></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
<img src="<?php echo get_template_directory_uri(); ?>/images/clogo.svg" alt="" class="img-fluid">
          
        
		  <div class="card" style="background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 8px;">
	        
			
<form id="onboardingform" action="" method="POST">

<!--field strats here-STEP 1->
	<!-- fieldsets -->
 
 
<fieldset>		

 <div class="card-body">
 
 <h5 class="signup-title-txt">Sign Up to the Online TechSpace Network</h5>
      <div class="row">
                  <div class="col-md-6">
                    <div class="group">
                      <label for="user_fname" class="signup-small-txt">First Name</label>
                      <input type="text" class="form-control" id="user_fname" name="user_fname">
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="group">
                      <label for="user_lname" class="signup-small-txt">Last Name</label>
                      <input type="text" class="form-control" id="user_lname" name="user_lname">
                    </div>
                  </div>
                </div>



                <div class="group">
                  <label for="user_email" class="signup-small-txt">Email</label>
                  <input type="email" class="form-control" id="user_email" name="user_email">
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="group">
                      <label for="user_password" class="signup-small-txt">Password</label>
                      <input type="password" class="form-control" id="user_password" name="user_passowrd">
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="group">
                      <label for="user_password_confirm" class="signup-small-txt">Confirm Password</label>
                      <input type="password" class="form-control" id="user_password_confirm" name="user_password_confirm">
                    </div>
                  </div>
                </div>

                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="user_age_confirm" name="user_age_confirm" value="I am 18 years old">
                    <label class="form-check-label tick-text" for="user_age_confirm">By ticking this box you are confirming you are over 18 years of age</label>
                </div>
              
           
                <button type="submit" class="land-btn land-btn-txt mt-4 onboarding-button"  name="submit">SIGN UP</button> 
         

				</div>
  </fieldset>


 <!-- fieldsets -->
            <fieldset>
		
	<div class="card-body">	
													<h5 class="signup-title-txt" align="center">More About You</h5>
													<div class="group mt-5">
														<label for="exampleInputName" class="signup-small-txt">Job Role</label>
														<input type="text" class="form-control" id="user_job_role">
													</div>
													<div class="group">
														<label for="user_org" class="signup-small-txt">Organisation</label>
														<select class="form-control" id="user_org">
															<option>1</option>
															<option>2</option>
															<option>3</option>
															<option>4</option>
															<option>5</option>
														</select>
													</div>

													<div class="group">
														<label for="exampleInputName" class="signup-small-txt">Project/Group(Optional)</label>
														<input type="text" class="form-control" id="fname" placeholder="Example: Tallaght Big Picture">
													</div>

													<div class="group">
														<label for="user_loction" class="signup-small-txt">Location</label>
														<select class="form-control" id="user_loction">
															<option>1</option>
															<option>2</option>
															<option>3</option>
															<option>4</option>
															<option>5</option>
														</select>
													</div>
													<div class="text-center">
														<a href="" class="back-link float-left mt-2">< Back</a>
														<button class="land-btn land-btn-txt float-right" onclick="stepper1.next()">Next</button> 
													</div>
												</div>
</fieldset>

 <!-- fieldsets -->
            <fieldset>
													<div class="card-body">
													<h5 class="signup-title-txt" align="center">Which best describes you?</h5>
													<p class="small tick-text" align="center">This will help us to define your community role on the online TechSpace Network <br>  Please select one only</p>
													<div class="form-check mt-5">
														<input class="form-check-input" type="checkbox" value="TechSpace Educator" id="user_community_edu">
														<label class="check-txt" for="user_community_role">
															I have or will complete a training with TechSpace (Educator)
														</label>
													</div>
													<div class="form-check mt-5">
														<input class="form-check-input" type="checkbox" value="" id="user_community_digitalyouth">
														<label class="check-txt" for="user_community_role">
															I am a level 8 certified Digital Youth Work Specialist
														</label>
													</div>

													<div class="form-check mt-5">
														<input class="form-check-input" type="checkbox" value="" id="user_community_clusterc">
														<label class="check-txt" for="user_community_role">
															I am a TechSpace Cluster Coordinator
														</label>
													</div>

													<div class="form-check mt-5">
														<input class="form-check-input" type="checkbox" value="" id="user_community_">
														<label class="check-txt" for="user_community_role">
															I am a TechSpace Youth Officer 
														</label>
													</div>
													<div class="text-center pt-4">
														<a href="" class="back-link float-left mt-2"onclick="stepper1.previous()">< Back</a>
														<button class="land-btn land-btn-txt float-right" onclick="stepper1.next()">Next</button> 
													</div>
												</div>
	
	</fieldset>

 <!-- fieldsets -->
            <fieldset>
			<div class="card-body">
	<div class="col-md-6 offset-md-3">
										<h5 class="signup-title-txt" align="center">I have or will complete training in...</h5>
										<p class="small tick-text" align="center">If you have completed training in both areas please select your most recent</p>
									</div>
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-6">
												<div class="card" style="background-color: #fff; border-radius: 10px;height: 168px;">
													<div class="card-header border-0 py-3 d-flex align-items-center my-3" style="background-color: #ffffff;">
														<img src="" class="rounded-circle align-self-start mr-3">
														<div>
															<h4 class="intro-title mb-0" style="color:#9AA5B1;">STEAM</h4>
															
														</div>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="card" style="background-color: #fff; border-radius: 10px;height: 168px;">
													<div class="card-header border-0 py-3 d-flex align-items-center my-3" style="background-color: #ffffff;">
														<img src="" class="rounded-circle align-self-start mr-3">
														<div>
															<h4 class="intro-title mb-0" style="color:#9AA5B1;">Digital Creativity</h4>
															
														</div>
													</div>
												</div>
											</div>
											
										</div>
									</div>
									<div class="text-center pt-4">
									<a href="" class="back-link float-left mt-2"onclick="stepper1.previous()">< Back</a>
									<button class="land-btn land-btn-txt float-right" onclick="stepper1.next()">Next</button> 
								</div>
			</div>
			
	</fieldset>

	        </form>             
					</div>
   
      
      </div>
	  
	  
  </div>
  



