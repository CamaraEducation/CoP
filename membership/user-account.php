<?php
get_header();


function getRoles($theRole){
// Get all users with role Project Officers.
$user_query_po = new WP_User_Query( array( 'role' => $theRole) );
// Get the total number of users for the current query. I use (int) only for sanitize.
$users_count_po = (int) $user_query_po->get_total();
// Echo a string and the value
$string = $users_count_po ;        
return $string;       
}


function gettopicImage($topicName){
 $term = get_term_by('name',$topicName, 'topic'); 
 
 $name = $term->topic_image;
$imagePath = get_field('topic_image', $term->taxonomy.'_'.$term->term_id);
return $imagePath;
}

function getactivity($maxNumb, $pathway){
/*
$args = array(

'numberposts' => $maxNumb,
'post_type'   => 'activity'
);
*/

$args=array(
'post_type' => 'activity',

'tax_query' => array(
'relation' => 'AND',
array(
'taxonomy' => 'pathway',
'field' => 'name',
'terms' => array($pathway)
),

),

'numberposts' =>$maxNumb, // to show all posts in this taxonomy, could also use 'numberposts' => -1 instead
);

$lastposts = get_posts( $args );
return $lastposts;
}
?>

<!--  Hero Section -->
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


<!-- Start Tab -->
<section>
<div class="container-fluid" style="background-color: white;">
<div class="container">
<ul class="nav" id="myTab" role="tablist">

<?php

$tax_terms = get_terms( 'pathway', 'orderby=id');
//var_dump($tax_terms);
foreach ( $tax_terms as $term ) {

if($current_user_pathway_name == $term->name){

?>

<li class="nav-item mx-4 tab-text1">
<a class="nav-link <?php echo ($currentPathway == $term->name ? "active" : "")?>" id="<?php echo $term->slug; ?>-tab" data-toggle="tab" href="#<?php echo $term->slug; ?>" role="tab" aria-controls="<?php echo $term->slug;?>" aria-selected="<?php echo ($currentPathway == $term->name ? "true" : "false")?>" style="color: #333333;"> <?php echo $term->name; ?>  
</a>

</li>

<?php
}//end comparison if
} //end loop 
?>
</ul>
</div>
</div>


    
<?php
get_footer();
?>