<?php
get_header();?>
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
							<a class="nav-link <?php echo ($currentPathway == $term->name  ? active : none); ?>" id="home-tab" href="activities/?a=<?php echo $term->name; ?>" role="tab"  style="height: 24px;left: 144px;top: 412px;color: #c71585; background: #F097C8;border-radius: 100px;font-family: Lato;font-style: normal;font-weight: bold;font-size: 16px;line-height: 24px;text-align: center;">My Profile</a>
						</li>
						<li class="nav-item mx-4 tab-text1">
							<a class="nav-link <?php echo ($currentPathway == $term->name  ? active : none); ?>" id="home-tab" href="activities/?a=<?php echo $term->name; ?>" role="tab"  style="height: 24px;left: 271px;top: 412px;font-family: Helvetica Neue;font-size: 16px;line-height: 24px;text-align: center;text-transform: capitalize;color: #323F4B;">Account Details</a>
						</li>
					</ul>
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
						<div class="card ml-2 mt-2" style=" width: 280px; background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 10px;border-bottom:30px;">
							<div class="card-body">
								<p class="custom-card-title">About You</p>
								<p class="custom-card-title"><?php echo $user_role; ?></p>
								<p class="cutsom-card-body"><?php echo $communityRole_name; ?> <br>@ <?php echo $org_name; ?></p>
								<a href="#" class="badge card-badge1 ml-4">Education Officer</a>
								<a href="#" class="badge card-badge2" style="background-color:<?php echo $current_pathway_color ;?>;border-color: <?php echo $current_pathway_color ;?>"><?php echo $current_user_pathway_name;?></a>
								<button style="background: #EE603B; color: white; border: 1px solid #EE603B; box-sizing: border-box; box-shadow: 0px 5px 15px rgba(25, 70, 93, 0.05); border-radius: 100px; width: 174px; height: 40px;left: 581px; top: 1565px;">Edit Profile</button>
							</div>
						</div>
					</div>
					<div class="col-md-9">
						<div class="row">
							<div class="row">
								<div class="card ml-2 mt-2" style="width: 700px; background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 10px;border-bottom:30px;">
									<div class="card-body">
										<label style="width: 488px;height: 36px;left: 492px;top: 812px;font-family: Lato;font-style: normal;font-weight: bold;font-size: 24px;line-height: 36px;color: #323F4B;">The types of programmes and activities I run are</label></br>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat. </p>
										<label style="width: 488px;height: 36px;left: 492px;top: 812px;font-family: Lato;font-style: normal;font-weight: bold;font-size: 24px;line-height: 36px;color: #323F4B;">I'm interested in digital youth work because</label><br/>
										<p style="width: 682px;height: 48px;left: 492px;top: 712px;font-family: Lato;font-style: normal;font-weight: normal;font-size: 16px;line-height: 24px;color: #323F4B;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat.</p>
								</div>
							</div>
						</div>
					</div>
					<h2 style="width: 348px; height: 36px; left: 432px; top: 1120px; font-family: Lato; font-style: normal; font-weight: bold; font-size: 24px; line-height: 36px; color: #323F4B;">Community Contributor Archive</h2>
					<hr>
					<div class= "row">
						<div class="card ml-2 mt-2" style="width: 280px; background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 10px;border-bottom:30px;">   
							<img class="card-img-top cardback" src="../images/cardImage.png"  width="279" height="129" alt="Card image cap">
							<div class="card-body">
								<h6 class="card-small" style="color:#9AA5B1;">STEAM</h6>
								<h5 class="card-big"><a href="<?php the_permalink(); ?>">Scribble Bots</a></h5>
							</a>
							<span class="badge badge-primary" style="background-color:<?php echo $current_pathway_color;?>"> Circuits</span>

							<span class="badge badge-info" style="outline: 1px solid <?php echo $current_pathway_color;?>;color:<?php echo $current_pathway_color;?>;background-color:#ffffff"> TOOL</span>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<img src="<?php echo get_template_directory_uri();  ?>/images/level.png" class="img-responsive" with="10px"  alt="COP">
							<?php //echo getPostTerms($post->ID,'level'); ?>
						</div>
					</div>	 
				</div>
			</div>
		</div>
		</section>
		<?php get_footer(); ?>