<?php


$profile_user=$_GET['user'];
$current_user = wp_get_current_user();
$profile_edit=false;

if(isset($profile_user)){

if($profile_user ==$current_user->ID){
$profile_edit=true;
}


}


//===================================================== //

//displayNam,e
$member_display_name= $current_user->display_name;
$current_user_id = $current_user->ID;


$member_fname = get_user_meta( $current_user_id, 'first_name', true);
$member_lname = get_user_meta( $current_user_id, 'last_name', true);


$member_email = $current_user->user_email;


//**GET ORGANIZATION
$current_user_org =get_user_meta( $current_user_id, 'member_organization', true); 
$member_org_name = get_term( $current_user_org, 'member_organization' )->name;
$member_org_id = get_term( $current_user_org, 'member_organization' )->term_id;


//echo $org_name->name;

//**GET COMMUNITY ROLE#
$current_user_communityRole =get_user_meta( $current_user_id, 'member_jobrole', true); 
$member_JobRole_name = $current_user_communityRole;




//**GET LOCATION 
$current_user_location =get_user_meta( $current_user_id, 'member__community_location', true); 
$member_location_name = get_term( $current_user_location, 'member_location' )->name;
$member_location_id = get_term( $current_user_location, 'member_location' )->term_id;



//**GET project group 
$current_user_projectgroup =get_user_meta( $current_user_id, 'member_projectgroup', true);
$member_projectgroup_name = $current_user_projectgroup;


$current_user_bio =get_user_meta( $current_user_id, 'description', true); 


//**GET COMMUNITY ROLE
$current_user_communityRole =get_user_meta( $current_user_id, 'member_community_role', true); 
$member_communityRole_name = get_term( $current_user_communityRole, 'community_role' )->name; 

$communityRole_name = get_term( $current_user_communityRole, 'community_role' )->name; 

$member_communityRole_id = get_term( $current_user_communityRole, 'community_role' )->term_id;

//echo $communityRole_name->name;


//**GET Pathway
$current_user_pathway =get_user_meta( $current_user_id, 'memberPathway', true); 
$term = get_term( $current_user_pathway, 'pathway' );
$member_pathway_name = $term->name;
$current_user_pathway_name = $term->name;
$member_pathway_id = $term->term_id;



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
 
                    <li class="nav-item mx-4 tab-text1">
                        <a class="nav-link alink " id="home-tab" href="<?php echo home_url(); ?>/profile" role="tab">My Profile</a>
                    </li>
                    
              <li class="nav-item mx-4 tab-text1">
                        <a class="nav-link alink active" id="home-tab" href="<?php echo home_url(); ?>/account" role="tab">Account Details</a>
                    </li>
            
            </ul>
        </div>
    </div>
</section>
<!-- End Tab -->


<section class="my-5">

<div class="container" style="margin-top: 24px;">
<h2 class="headtitle"><?php  echo $member_display_name;?> </h2>
<hr>
</div>


<div class="container">
<div class="row">
<div class="col-md-3">
<p class="pass-desc"> 

You can edit and update your profile on this page.


</div>
<div class="col-md-9">
<div class="row">
<div class="row">

<div class="card ml-2 mt-2" style="width: 700px; background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 10px;border-bottom:30px;padding-top: 25px;">



<div class="container">

<div class="alert alert-success" id="success-update" style="display: none;visibility: hidden;">
  Your account is sucessfully updated.  <a href="profile"> Review </a> Your public profile.
</div>

<form id="profileupdate_form" name="profileupdate_form" method="POST" action="">


<input type="hidden" id="member_user_id" name="member_user_id" value="<?php echo $current_user_id;?>">


<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="member_fname" class="signup-small-txt">First Name</label>
<input type="text" class="form-control" id="member_fname" name="member_fname" value="<?php echo $member_fname;?>" disabled>
</div>
</div>


<div class="col-md-6">
<div class="form-group">
<label for="member_lname" class="signup-small-txt">Last Name</label>
<input type="text" class="form-control" id="member_lname" name="member_lname" value="<?php echo $member_lname;?>" disabled>
</div>
</div>
</div>


<div class="form-group">
<label for="member_email" class="signup-small-txt">Email</label>
<input type="email" class="form-control" id="member_email" name="member_email" value="<?php echo $member_email;?>" disabled >
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">

<label for="member_org" class="signup-small-txt">Organisation</label>
<select class="form-control" id="member_org" name="member_org">
<?php
$terms = get_terms( array(
'taxonomy' => 'member_organization',
'hide_empty' => false,
) );

foreach ( $terms as $term ) {
echo '<option value="'.$term->term_id .'"' .  ($term->term_id == $member_org_id ? selected : '' ) .  '>' .$term->name .'</option>';



}
?>
</select>

</div>
</div>


<div class="col-md-6">
<div class="form-group"> 

<label for="member_jobrole" class="signup-small-txt">Job Role</label>
<input type="text" class="form-control" id="member_jobrole" name="member_jobrole" value="<?php echo $member_JobRole_name;?>">

</div>
</div>
</div>


<div class="row">
<div class="col-md-6">
<div class="form-group">


<label for="member_location" class="signup-small-txt">Location</label>
<select class="form-control" id="member_location" name="member_location">
													
<?php
$terms = get_terms( array(
'taxonomy' => 'member_location',
'hide_empty' => false,
) );

foreach ( $terms as $term ) {
//echo "<option value=". $terms->terms .">" . $term->name . "</option>";
echo '<option value="'.$term->term_id .'"' .  ($term->term_id == $member_location_id ? selected : '' ) .  '>' .$term->name .'</option>';
}
?>	
</select>

</div>
</div>


<div class="col-md-6">
<div class="form-group">


<label for="member_projectgroup" class="signup-small-txt">Project/Group (Optional)</label>
<input type="text" class="form-control" id="member_projectgroup" name="member_projectgroup" value="<?php echo $member_projectgroup_name;?>">

</div>
</div>
</div>



<div class="form-group">
<label for="member_bio" class="signup-small-txt">Short Bio</label>

<textarea class="form-control rounded-0" id="member_bio" name="member_bio" rows="5" maxlength="500">
<?php echo $current_user_bio;?>
</textarea>
</div>



<div class="row">
<div class="col-md-6">
<div class="form-group">

<label for="member_communityRole" class="signup-small-txt"> Community Role</label>
<select class="form-control" id="member_communityRole" name="member_communityRole">

<?php

$terms = get_terms( array(
'taxonomy' => 'community_role',
'hide_empty' => false,
'orderby' => 'term_id',
) );
foreach ( $terms as $term ) {
echo '<option value="'.$term->term_id .'"' .  ($term->term_id == $member_communityRole_id ? selected : '' ) .  '>' . $term->name .'</option>';
}
?>
</select>

</div>
</div>


<div class="col-md-6">
<div class="form-group">
<label for="member_pathway" class="signup-small-txt"> Programme</label>
<select class="form-control" id="member_pathway" name="member_pathway">
<?php

$terms = get_terms( array(
'taxonomy' => 'pathway',
'hide_empty' => false,
'orderby'=> 'id',
) );
foreach ( $terms as $term ) {
echo '<option value="'.$term->term_id .'"' .  ($term->term_id == $member_pathway_id ? selected : '' ) .  '>' .$term->name .'</option>';
}
?>
</select>

</div>
</div>
</div>




<div class="text-center">
<input type="submit" class="land-btn land-btn-txt mt-2 profileupdate-submit" id="submitForm" value="UPDATE  PROFILE">

</div>
</form>
</div>

</div>

</div>	
</div>
</div>
</div>

</section>
<?php get_footer(); ?>




