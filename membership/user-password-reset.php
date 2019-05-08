
<section>

<div class="row">


<img src="<?php echo get_template_directory_uri(); ?>/images/login_image.png" class="img-fluid" alt="" width="500" height="600">

<div class="col-md-5">
	<a href="<?php echo get_site_url();?>">
<img src="<?php echo get_template_directory_uri(); ?>/images/clogo.svg" alt="" class="img-fluid">
</a>

<div class="card" style="background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 8px;margin-top:15%;margin-left:15%;">


<div class="card-body">
<h2 class="signup-title-txt" style="margin-left: 20%;margin-bottom:24px;">Account Password Reset</h2>

<?php

 if ($_GET['key']) {

$user_key=$_GET['key'];
$user_login= $_GET['login'];


$user = check_password_reset_key($_GET['key'], $_GET['login']);



if ( is_wp_error( $user ) ) { 
 
//echo $user->get_error_message();
?>

<p>
There is an error processing your request. The link is expired or URL is invalid.

</p>

<p> Please try to <a href="<?php echo get_site_url();?>/password-reset">rest </a>your password again.
</p>
<div class="text-center">	
<a href="<?php echo get_home_url();?>">
<button type="button"  class="land-btn land-btn-txt mt-2" style="background-color:#fff;color:#EE603B;margin-top:24px;">
GO BACK
</button>
</a>

</div>




<?php 
} else {
?>


<span class="password-change-form">

<div class="text-left" style="padding-bottom: 12px;"> 
Please enter a new password. 
</div>

<form id="reset_password_form_changepassword" name="reset_password_form_changepassword"   method="post">

<input type="hidden" id="member_passwordreset_changepassword" name="member_passwordreset_changepassword" value="YES">

<input type="hidden" id="reset_for_user" name="reset_for_user" value="<?php echo $_GET['login'];?>">


<div class="form-groups">
<label for="reset_new_password" class="signup-small-txt" style="display:inline;font-size:14px;">Password</label>
<input type="password" class="form-control" id="reset_new_password" name="reset_new_password">
</div>	

<div class="form-groups">
<label for="reset_new_password_confirm" class="signup-small-txt" style="display:inline"> Confirm Password</label>
<input type="password" class="form-control" id="reset_new_password_confirm" name="reset_new_password_confirm">
</div>	

<div class="text-center">
<input type="submit" name="passwordreset-change-submit" id="passwordreset-change-submit" class="land-btn land-btn-txt mt-4 passwordreset-change-submit" value="SUBMIT">
<span style="margin:12px;"> </span>
</div>


</p>

</form>

</span>

<span class="password-change-confirmation" style="visibility: hidden;display: none;">
<p>
	You have sucessfuly changed your passwords. You can now <a href="<?php echo get_site_url();?>/login"> login </a> with your new password.  
</p>

<div class="text-center">	
<a href="<?php echo get_site_url();?>/login">
<button type="button"  class="land-btn land-btn-txt mt-2" style="background-color:#fff;color:#EE603B;margin-top:24px;">
LOGIN 
</button>
</a>
</div>

</span>

<?php

}//end the internal elese here



}else { //if this is not a link with Key show the first form


?>



<span class="username-capture-form">

<div class="text-left" style="padding-bottom: 12px;"> 
Please enter your email address or username. You will receive a link to create a new password via email. 
</div>

<form id="reset_password_form_verifyuser"   method="post">

<input type="hidden" id="reset_password_form_verifyuser" name="reset_password_form_verifyuser" value="YES">


<div class="form-groups">
<label for="reset_member_username" class="signup-small-txt" style="display:inline">Username</label>
<input type="text" class="form-control" id="reset_member_username" name="reset_member_username">
</div>	


<div class="text-center">

<input type="submit" name="passwordreset-submit" id="passwordreset-submit" class="land-btn land-btn-txt mt-4 passwordreset-submit" value="RESET PASSWORD">

<span style="margin:12px;"> </span>
</div>


</p>

</form>

</span>

<span class="username-capture-confirmation" style="visibility: hidden;display: none;">
An email is sent to your email address with a link to reset your password. 

<div class="text-center">	
<a href="<?php echo get_home_url();?>">
<button type="button"  class="land-btn land-btn-txt mt-2" style="background-color:#fff;color:#EE603B;margin-top:24px;">
GO BACK
</button>
</a>
</div>


</span>


<?php 
}
?>


</div>


</div>
</div> 
</div>

</section>