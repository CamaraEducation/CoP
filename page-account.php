<?php get_header();
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

					"why are you there?"

				<?php } ?>

			</div>
		</section>
		<section>
			<div class="container-fluid" style="background: #fff;">
				<div class="container">
					<ul class="nav mx-4" id="myTab">
						<li class="nav-item mx-4 tab-text1">
							<a class="nav-link <?php echo ($currentPathway == $term->name  ? active : none); ?>" id="home-tab" href="activities/?a=<?php echo $term->name; ?>" role="tab"  style="color: #<?php echo ($currentPathway == $term->name  ? 333333 : none);?>">My profile</a>
						</li>
						<li class="nav-item mx-4 tab-text1">
							<a class="nav-link <?php echo ($currentPathway == $term->name  ? active : none); ?>" id="home-tab" href="activities/?a=<?php echo $term->name; ?>" role="tab"  style="color: #c71585; background: #F097C8;	border-radius: 100px;<?php echo ($currentPathway == $term->name  ? 333333 : none);?>">Account Details</a>
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
										<label style="font-family: Lato; font-style: normal; font-weight: normal; font-size: 16px; line-height: 16px; color: #7B8794;">Current Password</label></br>
										<input type="" name="" style="width: 576px; height: 56px; left: 584px; top: 827px;"></br>
										<label style="font-family: Lato; font-style: normal; font-weight: normal; font-size: 16px; line-height: 16px; color: #7B8794;">New Password</label></br>
										<input type="" name="" style="width: 576px; height: 56px; left: 584px; top: 827px;"></br>
										<button style="background: #EE603B; color: white; border: 1px solid #EE603B; box-sizing: border-box; box-shadow: 0px 5px 15px rgba(25, 70, 93, 0.05); border-radius: 100px; width: 174px;height: 40px;left: 581px;top: 1565px;">Update Password</button>
									</div>
								</div>

							</div>	
						</div>
					</div>
				</div>

		</section>
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
				<section class="my-5">

			<div class="container" style="margin-top: 24px;">
				<h2 class="headtitle">Email Preference </h2>
				<hr>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<p class="pass-desc"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. 
						</p>
					</div>
					<div class="col-md-9">
						<div class="row">

							<div class="row">

								<div class="card ml-2 mt-2" style="width: 700px; background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 10px;border-bottom:30px;">
									<div class="card-body">
										<label style="font-family: Lato; font-style: normal; font-weight: normal; font-size: 16px; line-height: 16px; color: #7B8794;">Your Email</label></br>
										<input type="" name="" style="width: 576px; height: 56px; left: 584px; top: 827px;"></br>
										<input type="checkbox" name="" value="" style=""><label style="width: 479px; height: 48px; left: 621px; top: 1995px; font-family: Lato; font-style: normal; font-weight: normal; font-size: 16px; line-height: 24px; color: #3E4C59; border-radius:">Recive email notification when new content has been added to the community of practice</label><br/>
										<button style="background: #EE603B; color: white; border: 1px solid #EE603B; box-sizing: border-box; box-shadow: 0px 5px 15px rgba(25, 70, 93, 0.05); border-radius: 100px; width: 174px; height: 40px;left: 581px; top: 1565px;">Update Password</button>
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