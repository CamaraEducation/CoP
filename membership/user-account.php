
<?php



$current_user = wp_get_current_user();


$current_user_name= $current_user->display_name;
$current_user_id = $current_user->ID;


//**GET ORGANIZATION
$current_user_org =get_user_meta( $current_user_id, 'member_organization', true); 
$org_name = get_term( $current_user_org, 'member_organization' )->name;

//echo $org_name->name;

//**GET COMMUNITY ROLE
$current_user_communityRole =get_user_meta( $current_user_id, 'member_community_role', true); 
$communityRole_name = get_term( $current_user_communityRole, 'community_role' )->name;

//echo $communityRole_name->name;

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
	<div class="hero-container">

		<?php
		if ( is_user_logged_in() ) {

			?>
<div class="col-xs-2 col-centered mx-2">
				<span><img src="<?php echo get_avatar_url($current_user->ID); ?>" class="img-responsive rounded-circle" width="125" height="125" alt="COP"></span>
			</div>
			<div class="col-xs-6 col-centered">

				<p class="name-user" align="left"><h3> <?php echo $current_user_name; ?> </h3></p>
				<p class="txt-pos" align="left"><h4><?php  echo $memberJobRole_name . ' @ ' . $org_name; ?> </h4></p>
				<span class="badge badge-success float-left mr-2" style="background-color: #3ECCCB;">
					<?php echo $communityRole_name; ?></span> 
					<span class="badge badge-light float-left" style="background-color: #B4B4B4; opacity: 0.5; color: #1d1d1d;">
						<?php echo $current_user_pathway_name  ?></span>
					</div>

				<?php } else { ?>

					"why are you here?"

				<?php } ?>

			</div>
		</section>
		<section>
			<div class="container-fluid" style="background: #fff;">
				<div class="container">
					<ul class="nav mx-4">
						<!---
						<li class="nav-item mx-4 tab-text1">
							<a href="<?php echo get_site_url();?>/profile" class="nav-link" style="text-transform:capitalize;">My profile</a>
						</li>
-->
						<li class="nav-item mx-4 tab-text1">
							
								<a href="<?php echo get_site_url();?>/account" class="nav-link" style="text-transform:capitalize;color: #c71585; background: #F097C8;	border-radius: 100px;">Account Details </a>
						</li>
					</ul>
				</div>
			</div>
		</section>
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

								<div class="card ml-2 mt-2" style="width: 700px; background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 10px;border-bottom:30px;">
									<div class="card-body">
		<form name="change-password-form" id="change-password-form" method="POST">

<input type="hidden" id="change_password" name="change_password" value="YES">

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

<button tyype="submit" name="update-password" id="update-password" style="background: #EE603B; color: white; border: 1px solid #EE603B; box-sizing: border-box; box-shadow: 0px 5px 15px rgba(25, 70, 93, 0.05); border-radius: 100px; width: 174px;height: 40px;left: 581px;top: 1565px;">Update Password</button>
	</div>
</form>

								</div>

							</div>	
						</div>
					</div>
				</div>

		</section>

		<!---

		<section class="my-5">

			<div class="container" style="margin-top: 24px;">
				<h2 class="headtitle">Membership Plan </h2>
				<hr>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<p class="pass-desc"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						</p>
					</div>
					<div class="col-md-9">
						<div class="row">

							<div class="row">

								<div class="card ml-2 mt-2" style="width: 700px; background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 10px;border-bottom:30px;">
									<div class="card-body">
										
										<label style="width: 148px; height: 16px; left: 584px; top: 1232px; font-family: Lato; font-style: normal; font-weight: normal; font-size: 16px; line-height: 16px; color: #7B8794;">Membership renewal</label>
										<p style="width: 88px; height: 16px; left: 608px; top: 1288px; font-family: Helvetica Neue; font-size: 12px; line-height: 16px;letter-spacing: 0.04em; text-transform: uppercase; color: #3E4C59; border-radius: 20px;">member</p>
										<p style="width: 47px; height: 40px; left: 608px; top: 1307px;font-family: Lato; font-style: normal; font-weight: bold; font-size: 40px; line-height: 40px; color: #3E4C59; border-radius: 20px;">12</p><p style="width: 58px; height: 16px; left: 662px; top: 1329px;font-family: Helvetica Neue; font-size: 16px; line-height: 16px;color: #EE603B; border-radius: 20px;">months</p>
										<p style="width: 90px; height: 16px; left: 608px; top: 1358px; font-family: Helvetica Neue; font-size: 16px; line-height: 16px; color: #7B8794; border-radius: 20px;">€ 120/annuM</p>
										<label style="font-family: Lato; font-style: normal; font-weight: normal; font-size: 16px; line-height: 16px; color: #7B8794;">Payment Method</label></br>
										<input type="" name="" value="Visa ending in 1234" style="font-family: Lato; font-style: normal; font-weight: normal; font-size: 16px; line-height: 16px; color: #3E4C59; width: 576px; height: 56px; left: 584px; top: 827px;"></br>
										<button style="background: #EE603B; color: white; border: 1px solid #EE603B; box-sizing: border-box; box-shadow: 0px 5px 15px rgba(25, 70, 93, 0.05); border-radius: 100px; width: 174px;height: 40px; left: 581px; top: 1565px;">Renew Membership</button>
									</div>
								</div>
							</div>	
						</div>
					</div>
				</div>

		</section>

		--->
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

		<span class="confirm" id="confirm" name="confirm" style="visibility: hidden;display:hidden;text-align: center;"> <h3> You email address is udpated. </h3></span>

										<button type=sussbmit" name="update-email" id="update-email" style="background: #EE603B; color: white; border: 1px solid #EE603B; box-sizing: border-box; box-shadow: 0px 5px 15px rgba(25, 70, 93, 0.05); border-radius: 100px; width: 174px; height: 40px;left: 581px; top: 1565px;">SAVE PREFERENCES</button>


</div>
</form>


									</div>



								</div>

							</div>	
						</div>
					</div>
				</div>

		</section>
		<?php
//get_template_part( 'membership/user-account', 'page' );
		get_footer();

		?>