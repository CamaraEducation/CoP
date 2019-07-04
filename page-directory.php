
<?php
get_header();


$search_communityRole=  $_GET['fcrl'];
$search_org=  $_GET['forg'];
$search_training= $_GET['ftrn'];
$search_location= $_GET['floc'];


//convert current 
$hex = $current_pathway_color;
list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");


$pageURL = get_permalink() . "?".$_SERVER["QUERY_STRING"];

//Search Directory 
//Org, Traning/Pathway, Community Role and Location 
function SearchDirectory($search_communityRole,$search_org,$search_training,$search_location) {


//echo "rol ".$search_communityRole . "org ". $search_org ."trn ". $search_training ."loc ". $search_location . "<br>";


$userSearchArray = array (
'role__in' => array( 'Administrator', 'subscriber' ),
'order' => 'ASC',
'orderby' => 'display_name',
'meta_query' => array(
'relation' => 'AND',
array(
'key'     => 'member_community_role',
'value'   => $search_communityRole,
'compare' => '='
),

array(
'key'     => 'account_status',
'value'   => 'approved',
'compare' => '='
),

)
);



if(isset($search_org)){ 

$searchorg = array(
'key'     => 'member_organization',
'value'   => $search_org,
'compare' => '='
);
}


if(isset($search_training)){ 

$searchtraining = array(
'key'     => 'memberPathway',
'value'   => $search_training,
'compare' => '='
);
}


if(isset($search_location)){ 

$searchlocation = array(
'key'     => 'member__community_location',
'value'   => $search_location,
'compare' => '='
);
}

$userSearchArray["meta_query"][] = $searchorg;
$userSearchArray["meta_query"][] = $searchtraining;
$userSearchArray["meta_query"][] = $searchlocation;




$wp_user_query = new WP_User_Query($userSearchArray);



return $wp_user_query->get_results();
}

//get taxnony value given an id and tax name
function getbyid($id,$tax){

$name = get_term( $id, $tax )->name;
return $name;

}



?>
<!--  Hero Section -->
<section id="hero">
<div class="hero-container" style="background: #993C9F; height: 295px;opacity: 0.8">
<div class="container" style="height:255px; background-image: url(<?php echo get_template_directory_uri();  ?>/images/dotback.png);">

<div class="row h-100 w-100">
<div class="col-sm-12 my-auto">
<p class="directory-hero-text">TechSpace Directory</p>
</div>
</div>
</div>
</div>
</section> 
<!-- #hero -->

<section>
<div class="container mt-5">
<div class="row">
<div class="col-md-10">
<a href="" class="filter-text">Filter by </a>
<div class="btn-group ml-2">

<button type="button" class="btn dropdown-filter dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onMouseOver="this.style.borderColor='#993C9F'"  onMouseOut="this.style.borderColor='#000000'" style="background-color:<?php echo !empty($search_org) ? '#CAD7DE':'';?>;border:<?php echo !empty($search_level) ? '':'1px solid #000000';?>">


<span onMouseOver="this.style.color='#993C9F'"  onMouseOut="this.style.color='#000000'">          

<?php
echo ($search_org == NULL ? "Organization" : getbyid($search_org,'member_organization'));
?>

</span>
</button>








<div class="dropdown-menu">
<?php

$pathway_organizations = get_terms( 'member_organization', array( 'hide_empty' => false,'orderby'=>'id'));
//var_dump($tax_terms);
foreach ( $pathway_organizations as $organization ) {
$organizationURL = $pageURL . "&forg=" .$organization->term_id;
?>

<a class="dropdown-item" href="<?php echo $organizationURL ?>"><?php  echo $organization->name; ?></a>


<?php } ?>
</div>
</div>
<div class="btn-group ml-2">
<button type="button" class="btn dropdown-filter dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onMouseOver="this.style.borderColor='#993C9F'"   onMouseOut="this.style.borderColor='#000000'" style="background-color:<?php echo !empty($search_training) ? '#CAD7DE':'';?>;border:<?php echo !empty($search_level) ? '':'1px solid #000000';?>">

<span onMouseOver="this.style.color='#993C9F'"  onMouseOut="this.style.color='#000000'">          

<?php
echo ($search_training == NULL ? "Training" : getbyid($search_training,'pathway'));
?>

</span>                </button>
<div class="dropdown-menu">

<?php


$pathway_training = get_terms( 'pathway', array( 'hide_empty' => false,'orderby'=>'id'));
//var_dump($tax_terms);
foreach ( $pathway_training as $training ) {
$trainingURL = $pageURL . "&ftrn=" .$training->term_id;
?>

<a class="dropdown-item" href="<?php echo $trainingURL; ?>"><?php  echo $training->name; ?></a>


<?php } ?>

</div>
</div>
<div class="btn-group ml-2">

<button type="button" class="btn dropdown-filter dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onMouseOver="this.style.borderColor='#993C9F'"   onMouseOut="this.style.borderColor='#000000'" style="background-color:<?php echo !empty($search_communityRole) ? '#CAD7DE':'';?> ;border:<?php echo !empty($search_level) ? '':'1px solid #000000';?>">

<span onMouseOver="this.style.color='#993C9F'"  onMouseOut="this.style.color='#000000'">          

<?php
echo ($search_communityRole == NULL ? "Community Role" : getbyid($search_communityRole,'community_role'));
?>
</span>     
</button>
<div class="dropdown-menu">

<?php


$communityRole = get_terms( 'community_role', array( 'hide_empty' => false,'orderby'=>'id'));
//var_dump($tax_terms);
foreach ( $communityRole as $community ) {
$communityURL = $pageURL . "&fcrl=" .$community->term_id;
?>

<a class="dropdown-item" href="<?php echo $communityURL; ?>"><?php  echo $community->name; ?></a>


<?php } ?>

</div>
</div>
<div class="btn-group ml-2">

<button type="button" class="btn dropdown-filter dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onMouseOver="this.style.borderColor='#993C9F'"   onMouseOut="this.style.borderColor='#000000'" style="background-color:<?php echo !empty($search_location) ? '#CAD7DE':'';?> ;border:<?php echo !empty($search_level) ? '':'1px solid #000000';?>">

<span onMouseOver="this.style.color='#993C9F'"  onMouseOut="this.style.color='#000000'">          

<?php
echo ($search_location == NULL ? "Location" : getbyid($search_location,'member_location'));
?>

</span>

</button>
<div class="dropdown-menu">

<?php


$pathway_location = get_terms( 'member_location', array( 'hide_empty' => false,'orderby'=>'id'));
//var_dump($tax_terms);
foreach ( $pathway_location as $location ) {
$locationURL = $pageURL . "&floc=" .$location->term_id;
?>

<a class="dropdown-item" href="<?php echo $locationURL; ?>"><?php  echo $location->name; ?></a>


<?php } ?>


</div>

</div>
</div>

<div class="col-md-2">
<span>
<a class="clearfilter" href="<?php echo get_permalink(); ?>">Clear All Filters
<img class="returnpic" src="<?php echo get_template_directory_uri();  ?>/images/filterclear.png">
</a>  
</span>
</div>
</div>
</section>



<section class="my-5">


<?php


//$tax_terms = get_terms('community_role', array('hide_empty' => false,));

$catsArray = array($search_communityRole);

$tax_terms = get_terms( array(
'taxonomy' => 'community_role',
'include' => $catsArray,
'hide_empty'  => false, 
) );
// var_dump($tax_terms);



foreach ( $tax_terms as $term ) {
///loop though the types 

$role_id = $term->term_id;

$hasUsers = count(SearchDirectory($role_id,$search_org,$search_training,$search_location));

if($hasUsers > 0){

?>

<div class="container" style="margin-top: 24px;">
<h2 class="headtitle"><?php echo $term->name; ?> </h2>
<hr>
</div>

<div class="container">
<div class="row">
<div class="col-md-2">
<p class="pass-desc"> <?php echo $term->descritpion; ?></p>
</div>
<div class="col-md-10">


<div class="row ">

<?php



$copusers=SearchDirectory($role_id,$search_org,$search_training,$search_location);
?>			

<div class="row directoryCard">
<?php
//we just want to repeat this
foreach ( $copusers as $users ) {


setup_postdata($users);
$current_user_name= $users->display_name;
$current_user_id = $users->ID;
$user_role = $users->role;


//**GET ORGANIZATION
$current_user_org =get_user_meta( $current_user_id, 'member_organization', true); 
$org_name = get_term( $current_user_org, 'member_organization' )->name;

//echo $org_name->name;

//**GET COMMUNITY ROLE
$current_user_communityRole =get_user_meta( $current_user_id, 'member_community_role', true); 
$communityRole_name = get_term( $current_user_communityRole, 'community_role' )->name;


//echo $communityRole_name->name;

//**GET Pathway
$current_user_pathway =get_user_meta( $current_user_id, 'memberPathway', true); 
$term = get_term( $current_user_pathway, 'pathway' );
$current_user_pathway_name = $term->name;
$current_pathway_color = get_field('main_color', $term->taxonomy . '_' . $term->term_id);



//**GET location 
$current_user_location =get_user_meta( $current_user_id, 'member_community_location', true); 
$term = get_term( $current_user_location, 'member_location' );
$current_community_user_location = $term->name;

//**GET COMMUNITY ROLE
$current_user_communityRole =get_user_meta( $current_user_id, 'member_jobrole', true); 
$memberJobRole_name = $current_user_communityRole;




?>


<a href="<?php echo get_site_url();?>/profile/?user=<?php echo 	$current_user_id;?>">

  

 <div class="card-body"  style="width:280px; min-height:342px; background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 10px;padding: 5px; margin-right: 24px; margin-bottom: 24px;">

<p style="align-self: center; text-align: center;">

<img src="<?php echo get_avatar_url($current_user_id); ?>" class="img-responsive rounded-circle" alt="User Profile photo" style="align-self:center;margin-top:40px;width:80px;height:80px;margin-bottom: 5px;">
</p>

<p class="custom-cardss-title" style="margin-top:5px;font-size:20px;margin-bottom:5px;align-self: center; text-align: center;color:#323f4b" class="hoverdiv">
	<span class="hoverdiv"><?php echo $current_user_name; ?> </span>
	</p>

<p style="margin-top:5px;font-size:16px;font-weight:none;align-self: center; text-align: center;color:#7B8794;">

	<?php echo $memberJobRole_name; ?> 
<br>
	@ <?php echo $org_name; ?>

</p>

<p style="margin-top:5px;font-size:16px;font-weight:none;align-self: center; text-align: center;color:#7B8794;">

<img src="<?php echo get_template_directory_uri(); ?>/images/location.png"> 
&nbsp; 

<?php echo $current_community_user_location; ?>
</p>



<p style="margin-top:5px;font-size:16px;font-weight:none;margin-bottom:5px;align-self: center;color:#7B8794;text-align: center;">


<span class="badge communityrole" style="width:max-content;line-height: 16px;">
<?php echo $communityRole_name;?>
</span>

<span class="badge card-badge2" style="margin-left:8px;display: inline-block;vertical-align: middle;width:max-content;line-height: 16px;background-color:<?php echo $current_pathway_color ;?>;border-color: <?php echo $current_pathway_color ;?>;">
	
	<?php echo $current_user_pathway_name;?>

</span>

</p>

</div>

</a>


<?php
} //end of uses
}
?>


</div>	
</div>
</div>
</div>



<?php 
}
?>

</section>






<?php
get_footer();

?>