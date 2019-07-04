
<?php



$current_user = wp_get_current_user();


$current_user_name= $current_user->display_name;
$member_display_name= $current_user->display_name;

$current_user_id = $current_user->ID;


//**GET ORGANIZATION
$current_user_org =get_user_meta( $current_user_id, 'member_organization', true); 
$org_name = get_term( $current_user_org, 'member_organization' )->name;

//echo $org_name->name;

//**GET COMMUNITY ROLE
$current_user_communityRole =get_user_meta( $current_user_id, 'member_community_role', true); 
$communityRole_name = get_term( $current_user_communityRole, 'community_role' )->name;

//echo $communityRole_name->name;


$member_org_name = get_term( $current_user_org, 'member_organization' )->name;


//**GET COMMUNITY ROLE
$current_user_communityRole =get_user_meta( $current_user_id, 'member_jobrole', true); 
$memberJobRole_name = $current_user_communityRole;



//**GET LOCATION 
$current_user_location =get_user_meta( $current_user_id, 'member__community_location', true); 
$memberlocation = get_term( $current_user_location, 'member_location' )->name;



//**GET project group 
$current_user_projectgroup =get_user_meta( $current_user_id, 'member_projectgroup', true); 
$member_projectgroup = $current_user_projectgroup;

//**GET Pathway
$current_user_pathway =get_user_meta( $current_user_id, 'memberPathway', true); 
$term = get_term( $current_user_pathway, 'pathway' );
$current_user_pathway_name = $term->name;
$current_user_pathway_id = $term->term_id;


$current_pathway_color = get_field('main_color', $term->taxonomy . '_' . $term->term_id);
		
?>

<section id="hero">

<?php
     
        include (TEMPLATEPATH . '/membership/profile_topHeader.php');

?>

	</section> 

		

<!-- Start Tab -->
<section>
    <div class="container-fluid bg-white navsty">
        <div class="container">
            <ul class="nav mx-4" id="myTab">
 
                    <li class="nav-item mx-4">
                        <a class="nav-link alink" id="home-tab" href="<?php echo home_url(); ?>/profile" role="tab">My Profile</a>
                    </li>

        
                    <li class="nav-item mx-4 tab-text1">
                        <a class="nav-link alink active" id="home-tab" href="<?php echo home_url(); ?>/acccount" role="tab">Account Details</a>
                    </li>
              						</li>
        </ul>
        </div>
    </div>
</section>
<!-- End Tab -->


		<section class="my-5">

			<div class="container" style="margin-top: 24px;">
				<h2 class="headtitle">Update Password </h2>
				<hr>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<p class="pass-desc"> 

							Always choose a password you can remember. Passwords must contain at least 8 characters. You can change your password here at any time.
					</div>
					<div class="col-md-9">
						<div class="row">

							<div class="row">

<div class="card ml-2 mt-2" style="border:0px; width: 700px; background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 10px;border-bottom:30px;">
									<div class="card-body">

	<span class="confirm-password alert alert-success" id="confirm" name="confirm" style="visibility: hidden;display:hidden;text-align: center;">  Your password is updated. Please lot out and log in with your new password. </span>


<form name="update-password-form" id="update-password-form" method="POST">

<input type="hidden" id="update_password" name="update_password" value="YES">

	<div class="form-group">
	<label for="user_current_password" class="signup-small-txt">Current Password</label>
	<input type="password" class="form-control" id="user_current_password" name="user_current_password">
	</div>

										
	<div class="form-group">
	<label for="user_new_password" class="signup-small-txt">New Password</label>
	<input type="password" class="form-control" id="user_new_password" name="user_new_password">
	</div>

	<div class="form-group">
	<label for="user_new_password_confirm" class="signup-small-txt">Confirm Password</label>
	<input type="password" class="form-control" id="user_new_password_confirm" name="user_new_password_confirm">
	</div>

<button type="submit" name="update-password" id="update-password" style="background: #EE603B; color: white; border: 1px solid #EE603B; box-sizing: border-box; box-shadow: 0px 5px 15px rgba(25, 70, 93, 0.05); border-radius: 100px; width: 174px;height: 40px;left: 581px;top: 1565px;font-size:12px;" class="button-hover2">UPDATE PASSWORLD </button>













	</div>
</form>

								</div>

							</div>	
						</div>
					</div>
				</div>

		</section>

<!--
				<section class="my-5">

			<div class="container" style="margin-top: 24px;">
				<h2 class="headtitle">Email Preference </h2>
				<hr>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<p class="pass-desc"> 

							To change your acccount email. Please contact a TechSpace project officer.
					</div>
					<div class="col-md-9">
						<div class="row">

							<div class="row">

								<div class="card ml-2 mt-2" style="width: 700px; background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 10px;border-bottom:30px;">


									<div class="card-body">
			<span class="confirm alert alert-success" id="confirm-email" name="confirm=email" style="display:hidden;text-align: center;visibility:hidden;">  You email address is Updated. Please not e that you username will still remain the same as your old/previous email address. This cannot be changed. </span>
							

						<form name="update-email-form" id="update-email-form" method="POST">

<input type="hidden" id="update_email" name="update_email" value="YES">				






	<div class="form-group">
	<label for="user_email_new" class="signup-small-txt">Your email</label>
	<input type="email" class="form-control" id="user_email_new" name="user_email_new">
	</div>

<div class="form-check">
									<input type="checkbox" class="form-check-input" id="member_emailNotifications" name="user_18yearsold" value="YES">
										Receive email notification when new content has been added to the Community of Practice. 
										<label class="form-check-label tick-text" for="member_emailNotifications"> </label>
								</div>


	<div class="form-check" style="margin-top:10px;">

	

										<button type="submit" name="update-email" id="update-email" style="background: #EE603B; color: white; border: 1px solid #EE603B; box-sizing: border-box; box-shadow: 0px 5px 15px rgba(25, 70, 93, 0.05); border-radius: 100px; width: 174px; height: 40px;left: 581px; top: 1565px;font-size:12px;" class="button-hover2">SAVE PREFERENCES</button>


</div>
</form>


									</div>



								</div>

							</div>	
						</div>
					</div>
				</div>

		</section>
	-->
		<?php
//get_template_part( 'membership/user-account', 'page' );
		get_footer();

		?>