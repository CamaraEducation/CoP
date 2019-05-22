<?php

global $current_user_name;
global $org_name;
global $current_user_communityRole ;
global $communityRole_name;
global $memberJobRole_name;
global $memberlocation;
global $member_projectgroup;
global $current_user_pathway_name;
global $current_pathway_color;
global $current_user_pathway_id;


$url= get_site_url() . '/login/';
if(! is_user_logged_in() ) {
wp_redirect( $url );
exit;
    } 

		
//user is logged in_array

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
		
		
		
		
		
	
	



/** Set some global variables */
$pathways = get_terms( 'pathway', array(
    'orderby'    => 'count',
    'hide_empty' => 1 //hide opat
) );

//var_dump($pathways);

global $currentPathway;
global $currentPathway_id;
if ( ! empty( $pathways ) && ! is_wp_error( $pathways ) ){ 
 $currentPathway = array_values($pathways)[0]->name;
 $currentPathway_id = array_values($pathways)[0]->term_taxonomy_id;;
}else {
   $currentPathway = "STEAM";
 // echo $newP;
}




				function get_current_user_role() {
					global $wp_roles;
					$current_user = wp_get_current_user();
					$roles = $current_user->roles;
					return $roles? $roles : null; // returns roles if any found, else returns null
					}

function gettermImage($pathwayName){
 $term = get_term_by('name',$pathwayName, 'pathway'); 
 
 $name = $term->pathway_image;
$imagePath = get_field('pathway_image', $term->taxonomy.'_'.$term->term_id);

return $imagePath;
}

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />

	<script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>



<?php wp_head(); ?>

	

</head>

<body <?php body_class(); ?>>

<?php 
function showCurrentPage ($name){
$page=basename(get_permalink()); 

if($name == $page) {
	return "active-custom";
}else {
	return "";
}
}

?>


<nav class="navbar navbar-expand-lg navbar-light bg-white menu-back">

<a class="navbar-brand" href="#"><img src="<?php echo get_template_directory_uri();  ?>/images/techspacelogo.png" class="img-responsive md-avatar size-2" alt="COP"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item menu-text <?php echo showCurrentPage('landing');?>">
					<a class="nav-link" href="landing">Home



					
					</a>

				</li>
				<li class="nav-item menu-text <?php echo showCurrentPage('activities'); ?>">
					<a class="nav-link text-menu" href="<?php echo home_url(); ?>/activities">Activities </a>
				</li>
				<li class="nav-item menu-text <?php echo showCurrentPage('programmeplanning');?>">
					<a class="nav-link text-menu" href="<?php echo home_url(); ?>/programmeplanning">Programme Planning </a>
				</li>

				<li class="nav-item menu-text <?php echo showCurrentPage('training');?>">
				<a class="nav-link text-menu" href="<?php echo home_url(); ?>/training">Training </a>
				</li>

				<li class="nav-item menu-text <?php echo showCurrentPage('publications');?>">
				<a class="nav-link text-menu" href="<?php echo home_url(); ?>/publications">Publications </a>
				</li>
			</ul>

							

<?php
if ( is_user_logged_in() ) {
					   
					global $current_user;
					get_currentuserinfo();
?>
				<ul class="nav navbar-nav">
				
						<li class="nav-item avatar dropdown">
						<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true"
						aria-expanded="true">
						<img src="<?php echo get_avatar_url($current_user->ID); ?>" class="rounded-circle z-depth-0 md-avatar" alt="avatar image">
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5">
						<a class="dropdown-item" href="<?php echo home_url(); ?>/account">Account</a>
						<a class="dropdown-item" href="<?php echo wp_logout_url(home_url());?>">Logout </a>

					</div>
				</li>
			</ul>
<?php
}else {

	?>
	<ul class="nav navbar-nav">
					
					<li class="nav-item avatar dropdown">
						<a class="nav-link dropdown-tossggle" id="navbarDropdownMenuLink-5" data-toggle="" aria-haspopup="false"
						aria-expanded="false">
						<a href="login"> 
						<img src="<?php echo get_template_directory_uri();  ?>/images/loginIcon.png" class="rounded-circle z-depth-0 md-avatar" alt="avatar image">
					</a>
				</a>
					
				</li>
			
			</ul>
<?php
}//end if else 
?>
		</div>
	</nav>
