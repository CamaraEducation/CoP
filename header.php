<?php

global $current_user_name;
global $org_name;
global $current_user_communityRole ;
global $communityRole_name;
global $memberJobRole_name;
global $current_user_pathway_name;
global $current_pathway_color;

$url= get_site_url() . '/login/';
if(! is_user_logged_in() ) {
//wp_redirect( $url );
exit;
    } else {
		
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



//**GET Pathway
$current_user_pathway =get_user_meta( $current_user_id, 'memberPathway', true); 
$term = get_term( $current_user_pathway, 'pathway' );
$current_user_pathway_name = $term->name;

$current_pathway_color = get_field('main_color', $term->taxonomy . '_' . $term->term_id);
		
		
		
		
		
	}
	



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

<?php wp_head(); ?>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


	
</head>

<body <?php body_class(); ?>>



<nav class="navbar navbar-expand-lg navbar-light bg-white">

<a class="navbar-brand" href="#"><img src="<?php echo get_template_directory_uri();  ?>/images/techspacelogo.png" class="img-responsive md-avatar size-2" alt="COP"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item menu-text active">
					<a class="nav-link" href="landing">Home
						<span class="sr-only">(current)</span>
					</a>
				</li>
				<li class="nav-item menu-text">
					<a class="nav-link text-menu" href="<?php echo home_url(); ?>/activities">Activities </a>
				</li>
				<li class="nav-item menu-text">
					<a class="nav-link text-menu" href="<?php echo home_url(); ?>/programmeplanning">Programme Planning </a>
				</li>

				<li class="nav-item menu-text">
				<a class="nav-link text-menu" href="<?php echo home_url(); ?>/training">Training </a>
				</li>

				<li class="nav-item menu-text">
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
						<a class="dropdown-item" href="account">Account</a>
						<a class="dropdown-item" href="logout">Logout </a>

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
