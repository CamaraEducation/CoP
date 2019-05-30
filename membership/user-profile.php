<?php


$profile_user=$_GET['user'];

if(isset($profile_user)){
//it is not clear how we need to do this? 
$current_user =  get_user_by( 'id', $profile_user );

}else {

$current_user = wp_get_current_user();
}




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
					"why are you there?"
				<?php } ?>
			</div>
		</section>
		<section>
			<div class="container-fluid" style="background: #fff;">
				<div class="container">
					<ul class="nav mx-4" id="myTab">

						<!---
						<li class="nav-item mx-4 tab-text1">
					
								<a href="<?php echo get_site_url();?>/profile" class="nav-link" style="text-transform:capitalize;color: #c71585; background: #F097C8;	border-radius: 100px;">My Profile </a>

						</li>
						--->
						
<?php
if(!isset($profile_user)){
?> 
						<li class="nav-item mx-4 tab-text1">
					<a href="<?php echo get_site_url();?>/account" class="nav-link" style="text-transform:capitalize;">Account Details</a>
						</li>
<?php 
}
?>

					</ul>
				</div>
			</div>
		</section>
		<section class="my-5">

			<div class="container" style="margin-top: 24px;">
				<h2 class="headtitle"><?php  echo $current_user_name;?> </h2>
				<hr>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="card ml-2 mt-2" style=" width: 240px; background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 10px;border-bottom:30px;">

							<div class="card-body">
								<p class="custom-card-title">About You</p>
								<p class="custom-card-title"><?php echo $user_role; ?></p>
								<p class="cutsom-card-body"><?php echo $communityRole_name; ?> <br>@ <?php echo $org_name; ?></p>
								
								
							<img src="<?php echo get_template_directory_uri();  ?>/images/location.png"> &nbsp;	<?php echo $memberlocation;?>
 
 <?php

 if(!isset($profile_user)){
 	?>
								<button style="margin-top:14px;background: #EE603B; color: white; border: 1px solid #EE603B; box-sizing: border-box; box-shadow: 0px 5px 15px rgba(25, 70, 93, 0.05); border-radius: 100px; width: 174px; height: 40px;left: 581px; top: 1565px;">

							<a href="account" style="color:#FFFFFF;">Edit Profile </a>


							</button>
			<?php
		}
		?>

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


<div style="margin-top:25px;">

					<h2 style="width: 348px; height: 36px; left: 432px; top: 1120px; font-family: Lato; font-style: normal; font-weight: bold; font-size: 24px; line-height: 36px; color: #323F4B;">Community Contributor Archive</h2>
				
					
				</div>
			</div>
		</div>
		</section>
		<?php get_footer(); ?>