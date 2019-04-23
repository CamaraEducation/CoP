<?php
if(isset($_POST['submit'])){

var_dump($_POST);

}else {

?>
<section>
			<div class="container">
				<div class="mb-5 p-4">
					
				
				
						<div class="bs-stepper-content">
							<div id="test-l-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger1">
	<div class="col-md-6 offset-md-3">
		<div class="card" style="background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 8px;">
												<div class="card-body">
										<div class="form-group">	
							<form method="POST" id="onboardingform">

								 <input type="hidden" id="formstep" name="formstep" value="step2">

			<fieldset>
										
													<h5 class="signup-title-txt" align="center">More About You</h5>
													<div class="form-group mt-5">
														<label for="user_jobrole" class="signup-small-txt">Job Role</label>
														<input type="text" class="form-control" id="user_jobrole" name="user_jobrole">
													</div>
													

														<label for="user_org" class="signup-small-txt">Organisation</label>
														<select class="form-control" id="user_org" name="user_org">
															<option> </option>
															<option>1</option>
															<option>2</option>
															<option>3</option>
															<option>4</option>
															<option>5</option>
														</select>
												

													
														<label for="exampleInputName" class="signup-small-txt">Project/Group(Optional)</label>
														<input type="text" class="form-control" id="fname" placeholder="Example: Tallaght Big Picture">
											

														<label for="exampleFormControlSelect1" class="signup-small-txt">Location</label>
														<select class="form-control" id="exampleFormControlSelect1">
															<option>1</option>
															<option>2</option>
															<option>3</option>
															<option>4</option>
															<option>5</option>
														</select>
													
													
									
									<input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
             <input type="button" name="step1" class="step1 action-button" value="Next"/>
														
						
</fieldset>



<fieldset>
													<h5 class="signup-title-txt" align="center">Which best describes you?</h5>
													<p class="small tick-text" align="center">This will help us to define your community role on the online TechSpace Network <br>  Please select one only</p>
									<div class="radio">
  <label><input type="radio" name="community_role" id="community_role">Option 1</label>
</div>
<div class="radio">
  <label><input type="radio" name="community_role" id="community_role">Option 2</label>
</div>
											
													
													<input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
													<a href="" class="back-link float-left mt-2 previous action-button-previous">< Back</a>
													
             <input type="button" name="step2" class="step2 action-button" value="Next"/>
									

</fieldset>

<fieldset>								
								<div id="test-l-3" role="tabpanel" class="bs-stepper-pane text-center" aria-labelledby="stepper1trigger3">
									<div class="col-md-6 offset-md-3">
										<h5 class="signup-title-txt" align="center">I have or will complete training in...</h5>
										<p class="small tick-text" align="center">If you have completed training in both areas please select your most recent</p>
									</div>
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-6">
												<div class="card" style="background-color: #fff; border-radius: 10px;height: 168px;">
													<div class="card-header border-0 py-3 d-flex align-items-center my-3" style="background-color: #ffffff;">
														
														<button type="submit" name="submit" value="STEAM">
														<img src="<?php echo get_template_directory_uri(); ?>/images/introcard3.png" class="rounded-circle align-self-start mr-3">
													</button>
														<div>
															<h4 class="intro-title mb-0" style="color:#9AA5B1;">STEAM</h4>
															
														</div>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="card" style="background-color: #fff; border-radius: 10px;height: 168px;">
													<div class="card-header border-0 py-3 d-flex align-items-center my-3" style="background-color: #ffffff;">
															<button type="submit" name="submit" value="DIGITAL Creativity">
														<img src="<?php echo get_template_directory_uri(); ?>/images/introcard3.png" class="rounded-circle align-self-start mr-3">
													</button>
														<div>
															<h4 class="intro-title mb-0" style="color:#9AA5B1;">Digital Creativity</h4>
															
														</div>
													</div>
												</div>
											</div>
											
										</div>
									</div>
									<div class="text-center pt-4">

<input type="button" name="previous" class="previous action-button-previous" value="Previous"/>

									<a href="" class="back-link float-left mt-2 previous action-button-previous">< Back</a>
								
								</div>
												</div>
		</fieldset>
		

										</div>
												</form>							
</div>								
									</div>
								</div>
								</div>
							</div>
								</div>
								</div>

<?php
}
?>