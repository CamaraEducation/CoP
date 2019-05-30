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

<div class="col-xs-2 mx-2">
<span><img src="<?php echo get_avatar_url($current_user->ID); ?>" class="img-responsive rounded-circle" width="125" height="125" alt="COP" style="margin-right:24px;"></span>
</div>

<div class="col-xs-6" style="align-content: left;">

<h3 class="prof-name"> <?php echo $current_user_name; ?> </h3>

<h4 class="prof-role"><?php  echo $memberJobRole_name . ' @ ' . $org_name; ?> </h4>

<span class="badge badge-light float-left" style="line-height:16px;background-color: <?php echo $current_pathway_color;?>;color:#FFFFFF;">
<?php echo $current_user_pathway_name  ?></span>

<span class="badge float-left mr-2 communityrole" style="line-height:16px;margin-left: 15px;font-size:14px;">
<?php echo $communityRole_name; ?></span> 

</div>

<?php } else { ?>

"why are you there?"

<?php } ?>

</div>
</section>


<!-- Start Tab -->
<section>
<div class="container-fluid bg-white navsty">
<div class="container">

<ul class="nav" id="myTab" role="tablist">

<?php

$tax_terms = get_terms( 'pathway', 'orderby=id');
//var_dump($tax_terms);
foreach ( $tax_terms as $term ) {

if($current_user_pathway_name == $term->name){

?>

<li class="nav-item mx-4 tab-text1">
<a class="nav-link menu-color-shadow <?php echo ($currentPathway == $term->name ? "active" : "")?>" id="<?php echo $term->slug; ?>-tab" data-toggle="tab" href="#<?php echo $term->slug; ?>" role="tab" aria-controls="<?php echo $term->slug;?>" aria-selected="<?php echo ($currentPathway == $term->name ? "true" : "false")?>"> <?php echo $term->name; ?>  
</a>

</li>

<?php
}//end comparison if
} //end loop 
?>
</ul>
</div>
</div>

<!-----------------start the new section -->

<div class="tab-content">
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
<!-- Tab Start -->
<section class="my-5">
<div class="container">
<h2 class="headtitle">Welcome to your <?php echo $current_user_pathway_name; ?> Content</h2>

<hr>

</div>

<div class="container">
<div class="row my-3">
<div class="col-md-8">
<div class="row">
<div class="col-md-12 my-2">
<div class="card vid-shadow">


<div class="card-header border-0 py-3 d-flex align-items-center my-3 bg-white">



<iframe class="vids" width="620" height="268" src="https://www.youtube.com/embed/eO4vh9QOquw?controls=0&amp;start=11" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>

</div>
</div>

</div>
</div>
</div>

<div class="col-md-4 my-3">
<div class="card-custom">
<div class="card-body">
<p class="meet-company-title meettxt">Meet the online techspace network </p>
<?php
$tax_terms = get_terms('community_role', array('hide_empty' => false,));

// var_dump($tax_terms);
foreach ( $tax_terms as $term ) {
///loop though the types 

$role_id = $term->term_id;
?>
<?php


$userSearchArray = array (
'role__in' => array( 'Administrator', 'subscriber' ),
'order' => 'ASC',
'orderby' => 'display_name',
'meta_query' => array(
'relation' => 'AND',
array(
'key'     => 'member_community_role',
'value'   => $role_id,
'compare' => '='
),
)
);
$wp_user_query = new WP_User_Query($userSearchArray);



$copusers = $wp_user_query->get_results();

/**
$copusers = get_users(
array(
'meta_key' => 'member_community_role',
'meta_value' => $role_id,
)
);
// var_dump($copusers);
*/
?>

<div class="border-0" style="height:24px;border-radius:4px;margin-bottom:16px;" style="box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 8px;">
<a href="<?php echo home_url()?>/directory/?fcrl=<?php echo $term->term_id;?>">

<span style="text-transform:capitalize;font-family: Lato; font-style: normal; font-weight: bold; font-size: 24px; line-height:24px; color: #B0B7BF;">
<?php 
$num = count($copusers);
echo  sprintf("%02d", $num);
?>
</span>


&nbsp;  &nbsp; 
<span class="communityrole" style="line-height:24px;padding:5px;">
<?php echo $term->name;?>
<span class="float-right"> >  </span>
</a> 
</div>

<?php
}
?>

</div>
</div>
</div>
</div>
</div>


<div class="container">
<div class="row">


<div class="col-md-4 mt-2">
<div class="card secborder" style="">

<div class="card-header border-0 py-3 d-flex align-items-center my-3 bg-white">
<img src="<?php echo get_template_directory_uri(); ?>/images/logicmodels.png" class="align-self-start mr-3" width=48px; height=48px;>

<a href="programmeplanning/#Logic Models"> 
<div>
<h4 style="color:#9AA5B1;font-size:12px;">PROGRAMME PLANNING</h4>
<h6 class="intro-steam" style="font-size:18px;font-weight:bold;">Logic Models</h6>
</div>
</a>

</div>
</div>
</div>

<div class="col-md-4 mt-2">
<div class="card secborder">


<div class="card-header border-0 py-3 d-flex align-items-center my-3" style="background-color:#fff">
<img src="<?php echo get_template_directory_uri(); ?>/images/SessionPlans1.png" class="align-self-start mr-3" width=48px; height=48px;>

<a href="programmeplanning/#Session Plans"> 
<div>
<h4 style="color:#9AA5B1;font-size:12px;">PROGRAMME PLANNING</h4>
<h6 class="intro-steam" style="font-size:18px;font-weight:bold;">Session Plans</h6>
</div>
</a>

</div>
</div>

</div>

<div class="col-md-4 mt-2">

<div class="card border-0 secborder">

<div class="card-header border-0 py-3 d-flex align-items-center my-3" style="background-color:#fff">

<img src="<?php echo get_template_directory_uri(); ?>/images/CodeofConduct1.png" class="align-self-start mr-3" width=48px; height=48px;>

<a href="<?php echo get_template_directory_uri(); ?>/docs/CoPCodeofConduct.pdf" target="new"> 
<div>

<h4 style="color:#9AA5B1;font-size:12px;">COMMUNITY GUIDELINES</h4>
<h6 class="intro-steam" style="font-size:18px;font-weight:bold;">Code of Conduct</h6>
</div>
</a>
</div>
</div>
</div>
</div>
</br>
<p class="text-ask">Have you trained in the NYCISTEAM in Youth Work Maker Project? <a href="https://www.steminyouthwork.com" target="new" class="text-ask-link">Access further Resources Here </a></p>
</div>
</section>

<section class="my-5">
<div class="container">
<h2 class="headtitle">New <?php echo $current_user_pathway_name;?> Activities</h2>
<hr>
</div>
<?php
function getPostTerms($id,$tax){
$term_list = wp_get_post_terms($id, $tax, array("fields" => "all"));
foreach($term_list as $term_single) {
return $term_single->name; //do something here
}
}
?>
<div class="container">
<div class="row" style="margin-left: 2px;">
<div class="card-deck" style="margin-bottom: 80px !important;">
<?php
//show latest psots
$maxPosts = 3;
$latestActivities=getactivity($maxPosts,$current_user_pathway_name);

if ( $latestActivities ) {

foreach ( $latestActivities as $post ) :
?>
<div class="col-md-4">

<div class="card scard1" style="margin-right: 0px !important; margin-left: 0px !important; width: 22rem;"> 

<img class="card-img-top cardback" src="<?php the_field('featured_image'); ?>"  width="279px" height="251px" alt="Card image cap">


<div class="card-body cbody">

<h6 class="card-small acttext"><?php echo getPostTerms($post->ID,'pathway'); ?> </h6>

<span class="card-big act-head">

<a class="act-head" href="<?php the_permalink(); ?>">
<?php the_title(); ?> </a></span>

<span class="badge badge-primary" style="margin-top:0px; background-color:<?php echo $current_pathway_color;?>"> <?php echo getPostTerms($post->ID,'topic');?></span>

<span class="badge badge-primary" style="outline: 1px solid <?php echo $current_pathway_color;?>;color:<?php echo $current_pathway_color;?>;background-color:#ffffff"> <?php echo getPostTerms($post->ID,'tool'); ?></span>




<span class="float-right"> 
<!--LEVEL -->
<?php 
$s = getPostTerms($post->ID,'level');

if($s == "Easy"){?>
<img src="<?php echo get_template_directory_uri();  ?>/images/level_Easy.png">

<?php } elseif($s == "Beginner"){?>
<img src="<?php echo get_template_directory_uri();  ?>/images/level_Easy.png">


<?php  }elseif ($s== "Intermediate") { ?>

<img src="<?php echo get_template_directory_uri();  ?>/images/level_Intermediate.png">
<?php }elseif ($s=="Advanced" ) { ?>
<img src="<?php echo get_template_directory_uri();  ?>/images/level_Advanced.png">

<?php } 
?>
</span>

</div>

</div>
</div>

<?php
endforeach;
wp_reset_postdata();

}else {
echo "Nothing to show for now - No Activities! ";
}
?>	
</div>

</div>
</div>
</section>

<section class="my-5">
<div class="container">
<h2 class="headtitle">Browse Activities by Topic</h2>
<hr>
</div>

<div class="container">
<div class="row my-3">
<div class="col-md-8">
<div class="row">

<?php

//	$tax_terms = get_terms( 'topic', 'orderby=id',array('number' => 2,'pathway' =>$currentPathway));

if(strcasecmp(strtoupper ($current_user_pathway_name), strtoupper ("Digital Creativity"))==0) {
$topics = array("MOJO","Graphic Design","Video Production","Animation","Audio Production","Photography");

}else {
$topics = array("Maker","Computer Science");
}

$arrlength = count($topics);
//	echo $arrlength;
for($x = 0; $x < $arrlength; $x++) {

?>
<div class="col-md-6 my-2">

<div class="card-custom lastcc">
<img src="<?php echo gettopicImage($topics[$x]); ?>" style="width:80px;padding-left:40px;">

<span class="intro-steam" style="margin-left:16px;">
<a class="lastcc-txt" href="activities/?ft=<?php echo $topics[$x] ;?>">
<?php echo $topics[$x]; ?> 
Activities  </a>
</span>
</div>
</div>

<?php 
}//end each 
?>
</div>
</div>

<div class="col-md-4 my-2" style="margin-bottom: 48px !important;">
<div class="card ccont" style="height: 95px !important;">
<div class="card-body">
<h3 class="text-on-card toc-text">Community Contributor</h3>

<span class="cc-title" style="font-weight: bold;">Create an activity guide</span>
<p class="cc-text" style="margin-top:0px;">Coming Soon!</p>



</div>
</div>
</div>
</div>
</div>
</section>

<?php
get_footer();
?>