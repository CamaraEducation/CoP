
<?php


$profile_user=$_GET['user'];
$current_user = wp_get_current_user();
$profile_edit=true;

if((isset($_GET['edit']))){
get_template_part( 'membership/profile-update', 'page' );
exit;

}else if($profile_user ==$current_user->ID){
//it is not clear how we need to do this? 
$current_user =  get_user_by( 'id', $profile_user );
$profile_edit=true;

}else if(isset($profile_user)) {
$current_user =  get_user_by( 'id', $profile_user );
$profile_edit=false;
}

$current_user_id = $current_user->ID;
$current_user_name= $current_user->display_name;
$member_display_name= $current_user->display_name;




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
$current_user_location =get_user_meta( $current_user_id, 'member_community_location', true); 
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
		

$current_user_bio =get_user_meta( $current_user_id, 'description', true); 


?>



<section id="hero">



<?php
     
        include (TEMPLATEPATH . '/membership/profile_topHeader.php');

?>

	</section>   


<!-- Start Tab -->
<section>
    <div class="container-fluid bg-white navsty">
        <div class="container" style="padding:0px;">
            <ul class="nav" id="myTab">
 
                    <li class="nav-item mx-4 tab-text1">
                        <a class="nav-link alink active " id="home-tab" href="<?php echo home_url(); ?>/profile" role="tab">My Profile</a>
                    </li>
              <?php
    if($profile_edit){
 	?>
		        
                    <li class="nav-item mx-4 tab-text1">
                        <a class="nav-link alink " id="home-tab" href="<?php echo home_url(); ?>/account" role="tab">Account Details</a>
                    </li>
              <?php } ?>

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
						<div class="card ml-2 mt-2" style="border:0px; width: 240px; background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 10px;border-bottom:30px;padding-top:32px; padding-left:24px;padding-right: 40px;padding-bottom: 40px;">

								
				
				<p class="cutsom-card-body" style="margin:0px;text-align: left;"><?php echo $communityRole_name; ?> @ <?php echo $org_name; ?></p>
								
							
							<p style="margin-left:0px; margin-top:24px;margin-bottom: 0px;">
							<img src="<?php echo get_template_directory_uri();  ?>/images/location.png"> &nbsp;	<?php echo $memberlocation;?>
 </p>
 <?php

 if($profile_edit){
 	?>
			
			<button style="margin-left:0px; margin-top:24px;background: #EE603B; color: white; border: 1px solid #EE603B; box-sizing: border-box; box-shadow: 0px 5px 15px rgba(25, 70, 93, 0.05); border-radius: 100px; width: 174px; height: 40px;left: 581px; top: 1565px;" class="button-hover2">

							<a href="profile/?edit=yes" style="color:#FFFFFF;">Edit Profile </a>


							</button>
			<?php
		}
		?>

							
						</div>
					</div>

					<div class="col-md-9" style="padding-left: 100px;">
						<div class="row">
							<div class="row">

<div class="card ml-2 mt-2" style="border:0px; width: 700px; background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 10px;border-bottom:30px;;padding-top:32px; padding-left:32px;padding-right: 40px;padding-bottom: 40px;">
									
						
<label style="width: 488px;height: 36px;left: 492px;top: 812px;font-family: Lato;font-style: normal;font-weight: bold;font-size: 24px;line-height: 36px;color: #323F4B;">
Member Bio
</label>


<p>
<?php
if(empty($current_user_bio)) {

echo "<i> No Member Bio </i>";
}else {
echo $current_user_bio;
}

?>
</p>





								
							</div>
						</div>
					</div>



<!--
<div style="margin-top:25px;">

					<h2 style="width: 348px; height: 36px; left: 432px; top: 1120px; font-family: Lato; font-style: normal; font-weight: bold; font-size: 24px; line-height: 36px; color: #323F4B;">

					Community Contributor Archive</h2>
				
					
				</div>

			-->

			</div>
		</div>
		</section>
		<?php get_footer(); ?>




				<!-- Modal -->
		<div class="modal fade" id="memberBioModal" tabindex="-1" role="dialog" aria-labelledby="memberBioModallLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">

				<div class="modal-content register-card" style="width: 537px !important;margin-left: 70px; margin-top: 104px !important;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					
					<h5 class="signup-title-txt" align="center" id="exampleModalLabel" style="margin-top:48px; margin-bottom: 25px;">Edit Your Biographical Info</h5>

					<div class="modal-body" style="margin-left: 56px;margin-right: 56px;">


<?php
//CALL THE CONTACT FORM FILE 
get_template_part( 'membership/user-editbio', 'page' );

?>
						</div>

					</div>
				</div>
			</div>
