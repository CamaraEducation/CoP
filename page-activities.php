<?php get_header();?>


<?php
function getPostTerms($id,$tax){
$term_list = wp_get_post_terms($id, $tax, array("fields" => "all"));
foreach($term_list as $term_single) {
return $term_single->name; //do something here
}
}

if($_GET['a']){
	$currentPathway=$_GET['a'];
}else {
	$currentPathway= $current_user_pathway_name;
	
}
$term = get_term_by('name',$currentPathway, 'pathway');
$current_pathway_color=get_field('main_color', $term->taxonomy . '_' . $term->term_id);

//echo $current_pathway_color;

function searchPosts($maxPosts,$search_topic,$search_level,$search_equipment,$search_app,$pathway) {


$Searcharg=array(
            'post_type' => 'activity',
            
'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'pathway',
                'field' => 'name',
                'terms' => array( $pathway)
            )

            ),

            'numberposts' => $maxPosts, // to show all posts in this taxonomy, could also use 'numberposts' => -1 instead
          ); //end of Array


if(isset($search_topic)){ 
    
$topicSearch =   
            array(
                'taxonomy' => 'topic',
                'field' => 'name',
                'terms' => array($search_topic)
            );
           // var_dump($topicSearch);
}


if(isset($search_level)){ 
$levelSearch =   
            array(
                'taxonomy' => 'level',
                'field' => 'name',
                'terms' => array($search_level)
            );
       
}


if(isset($search_equipment)){ 
$equipmentSearch =   
            array(
                'taxonomy' => 'level',
                'field' => 'name',
                'terms' => array($search_equipment)
            );
       
}


if(isset($search_app)){ 
$appSearch =   
            array(
                'taxonomy' => 'level',
                'field' => 'name',
                'terms' => array($search_app)
            );
       
}


$Searcharg["tax_query"][] = $topicSearch;
$Searcharg["tax_query"][] = $equipmentSearch;
$Searcharg["tax_query"][] = $levelSearch;
$Searcharg["tax_query"][] = $equipmentSearch;
$Searcharg["tax_query"][] = $appSearch;




     //$posts = get_posts((strpos($_SERVER["QUERY_STRING"], '&') == true?$Searcharg : $defaultarg ));

$posts = get_posts($Searcharg);
//var_dump($posts);
     return $posts;
}

?>

    <!--  Hero Section -->
    <section id="hero">
        <div class="hero-container" style="background: <?php echo $current_pathway_color?>" height: 295px;">
            <div class="col-xs-6 col-centered">
                <p class="directory-hero-text"><?php echo $currentPathway; ?> Activities</p>
            </div>
        </div>
    </section>
    <!-- #hero -->



<!-- Start Tab -->
    <section>
        <div class="container-fluid" style="background: #fff;">
            <div class="container">
            <ul class="nav mx-4" id="myTab">
                
<?php
$tax_terms = get_terms( 'pathway', 'orderby=id');
//var_dump($tax_terms);
foreach ( $tax_terms as $term ) {
?>
    <li class="nav-item mx-4 tab-text1">
<a class="nav-link <?php echo ($currentPathway == $term->name  ? active : none); ?>" id="home-tab" href="activities/?a=<?php echo $term->name; ?>" role="tab"  style="color: #<?php echo ($currentPathway == $term->name  ? 333333 : none);?>"><?php echo $term->name; ?></a>
                </li>
<?php
}
?>
            </ul>
        </div>
        </div>
    </section>
    <!-- End Tab -->

<section>
        <div class="container mt-5">
            <a href="" class="filter-text">Filter by </a>


<?php

$pageURL = get_permalink() . "?".$_SERVER["QUERY_STRING"];

//echo $pageURL;

?>

<div class="btn-group ml-2">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: 1px solid #3E4C59;box-sizing: border-box;border-radius: 100px;">
                    Topic
                </button>
                <div class="dropdown-menu">

<?php


$pathway_topics = get_terms( 'topic', 'orderby=id');
//var_dump($tax_terms);
foreach ( $pathway_topics as $topic ) {
$topicURL = $pageURL . "&ft=" .$topic->name;
?>

                    <a class="dropdown-item" href="<?php echo $topicURL ?>"><?php  echo $topic->name; ?></a>
                    

<?php } ?>
                </div>
            </div>

            <div class="btn-group ml-2">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: 1px solid #3E4C59;box-sizing: border-box;border-radius: 100px;">
                    Level
                </button>
                <div class="dropdown-menu">
                    
<?php


$pathway_levels = get_terms( 'level', 'orderby=id');
//var_dump($tax_terms);
foreach ( $pathway_levels as $level ) {
$levelURL = $pageURL . "&fl=" .$level->name;
?>

                    <a class="dropdown-item" href="<?php echo $levelURL ?>"><?php  echo $level->name; ?></a>
                    

<?php } ?>

                </div>
            </div>

            <div class="btn-group ml-2">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: 1px solid #3E4C59;box-sizing: border-box;border-radius: 100px;">
                  Equipment 
                </button>
                <div class="dropdown-menu">
        <?php


$pathway_equipment = get_terms( 'equipment', 'orderby=id');
//var_dump($tax_terms);
foreach ( $pathway_equipment as $equipment ) {
$equipmentURL = $pageURL . "&fe=" .$equipment->name;
?>

                    <a class="dropdown-item" href="<?php echo $equipmentURL ?>"><?php  echo $equipment->name; ?></a>
                    

<?php } ?>
                </div>
            </div>

            <div class="btn-group ml-2">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: 1px solid #3E4C59;box-sizing: border-box;border-radius: 100px;">
                    App
                </button>
                <div class="dropdown-menu">
                    <?php


$pathway_tools = get_terms( 'tools', 'orderby=id');
//var_dump($tax_terms);
foreach ( $pathway_tools as $tool ) {
$appURL = $pageURL . "&fta=" .$tool->name;
?>

                    <a class="dropdown-item" href="<?php echo $appURL ?>"><?php  echo $tool->name; ?></a>
                    

<?php } ?>

            </div>
        </div>

		<span style="margin-left:45%;font-weight:bold;text-align: middle;"><a href="<?php echo $pageURL;?>">Clear All Filters
		<img src="<?php echo get_template_directory_uri();  ?>/images/filterClear.png" style="width:20px;">
		</a>  </span>
			</div>
		</div>
		
	</section>


<?php // Output all Taxonomies names with their respective items

$search_topic=  $_GET['ft'];
$search_level=  $_GET['fl'];
$search_equipment= $_GET['fe'];
$search_app= $_GET['fta'];

//echo $search_topic;
//echo $search_level;
//echo empty ($search_level);
//echo $_SERVER["QUERY_STRING"];

?>

<div class="container">
				<hr>
    
      <?php                         
    

//show latest psots
$maxPosts = 22;
$totalPosts = count(searchPosts($maxPosts,$search_topic,$search_level,$search_equipment,$search_app,$currentPathway));


If($totalPosts %3 != 0){
$newMax = $totalPosts-($totalPosts % 3);
$Searchposts=searchPosts($newMax,$search_topic,$search_level,$search_equipment,$search_app,$currentPathway);

}else {
    $Searchposts=searchPosts($maxPosts,$search_topic,$search_level,$search_equipment,$search_app,$currentPathway);

}

?>
                <div class="card-deck">
<?php
$count=0;
foreach($Searchposts as $post): // begin cycle through posts of this taxonmy
setup_postdata($post); //set up post data for use in the loop (enables the_title(), etc without specifying a post ID)
      ?>        

<div class="card" style="margin-bottom:30px;">   
<img class="card-img-top cardback" src="<?php the_field('featured_image'); ?>"  width="279" height="129" alt="Card image cap">
<div class="card-body">
<h6 class="card-small" style="color:#9AA5B1;"><?php echo getPostTerms($post->ID,'pathway'); ?> </h6>
<h5 class="card-big"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
</a>

<span class="badge badge-primary" style="background-color:<?php echo $current_pathway_color;?>"> <?php echo getPostTerms($post->ID,'topic'); ?></span>

<span class="badge badge-info" style="outline: 1px solid <?php echo $current_pathway_color;?>;color:<?php echo $current_pathway_color;?>;background-color:#ffffff"> <?php echo getPostTerms($post->ID,'tool'); ?></span>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src="<?php echo get_template_directory_uri();  ?>/images/level.png" class="img-responsive" with="10px"  alt="COP">
 <?php echo getPostTerms($post->ID,'level'); ?>
</div>
</div>
                

<?php 
$count++;
    if($count % 3 == 0) {
        echo ' </div>  <div class="card-deck"> '; 
}
        endforeach; 
 wp_reset_postdata();
      
  ?>
</div> 






</div>
<div class="container">
<hr>
</div>

<?php get_footer();?>