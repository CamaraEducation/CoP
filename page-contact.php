<?php



if(isset($_POST['user_fname'])){

echo $_POST['user_fname'];

}else {
?>


						<form id="contact_form" name="contact_form" method="POST" action="">

						

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="user_fname" class="signup-small-txt">First Name</label>
										<input type="text" class="form-control" id="user_fname" name="user_fname">
									</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<label for="user_lname" class="signup-small-txt">Last Name</label>
										<input type="text" class="form-control" id="user_lname" name="user_lname">
									</div>
								</div>
							</div>


							<div class="form-group">
								<label for="user_email" class="signup-small-txt">Email</label>
								<input type="email" class="form-control" id="user_email" name="user_email">
							</div>


							<div class="form-group">
								<label for="user_message" class="signup-small-txt">Message</label>

								<textarea class="form-control rounded-0" id="user_message" rows="5"></textarea>

							</div>


							<div class="text-center">
								<input type="submit" class="land-btn land-btn-txt mt-4 contact-submit" id="submitForm" value="SEND MESSAGE ">
							</div>
</form>

<?php
} //end if if else 
?>