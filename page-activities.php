<?php get_header();?>


<?php


$search_topic=  $_GET['ft'];
$search_level=  $_GET['fl'];
$search_tool= $_GET['ftl'];
$search_app= $_GET['fa'];

//convert current 
$hex = $current_pathway_color;
list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");



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
$current_pathway_id = $term->term_id;

//echo $current_pathway_color;

function searchPosts($maxPosts,$search_topic,$search_level,$search_tools,$search_app,$pathway) {


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


if(isset($search_tools)){ 
$toolSearch =   
            array(
                'taxonomy' => 'tool',
                'field' => 'name',
                'terms' => array($search_tools)
            );
       
}


if(isset($search_app)){ 
$appSearch =   
            array(
                'taxonomy' => 'apps',
                'field' => 'name',
                'terms' => array($search_app)
            );
       
}


$Searcharg["tax_query"][] = $topicSearch;
$Searcharg["tax_query"][] = $levelSearch;
$Searcharg["tax_query"][] = $toolSearch;
$Searcharg["tax_query"][] = $appSearch;




     //$posts = get_posts((strpos($_SERVER["QUERY_STRING"], '&') == true?$Searcharg : $defaultarg ));

$posts = get_posts($Searcharg);
//var_dump($posts);
     return $posts;
}

?>

    <!--  Hero Section -->
    <section id="hero">
        <div class="hero-container" style="background: <?php echo $current_pathway_color?> ;height:295px;">
            <div class="col-xs-6 col-centered">
                <p class="directory-hero-text"><?php echo $currentPathway; ?> Activities</p>
            </div>
        </div>
    </section>
    <!-- #hero -->



<!-- Start Tab -->
    <section>
        <div class="container-fluid" style="background: #fff;height:48px;">
            <div class="container">
            <ul class="nav mx-4" id="myTab">
                
<?php
$tax_terms = get_terms( 'pathway', 'orderby=id');
//var_dump($tax_terms);
foreach ( $tax_terms as $term ) {
?>
    <li class="nav-item mx-4 tab-text1">
<a class="nav-link <?php echo ($currentPathway == $term->name  ? active : none); ?>" id="home-tab" href="activities/?a=<?php echo $term->name; ?>" role="tab""><?php echo $term->name; ?></a>
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
  
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onMouseOver="this.style.borderColor='<?php echo $current_pathway_color;?>'"   onMouseOut="this.style.borderColor='#000000'" style="border: 1px solid #000000;box-sizing: border-box;border-radius: 100px;background-color:<?php echo !empty($search_topic) ? 'rgba('.$r.','.$g.','.$b.',0.1)':'';?> ">
                    Topic
                </button>
   
                <div class="dropdown-menu">

<?php


$pathway_topics = get_terms( 'topic', 'orderby=id');
//var_dump($tax_terms);
foreach ( $pathway_topics as $topic ) {
$topicURL = $pageURL . "&ft=" .$topic->name;

//if(topic_pathway)
$topicPathway_id= get_field('topic_pathway', $topic->taxonomy.'_'.$topic->term_id);
   // echo $current_user_pathway_id;
    if($current_pathway_id == $topicPathway_id) {
   //if get
?>



                    <a class="dropdown-item" href="<?php echo $topicURL ?>"><?php  echo $topic->name; ?></a>
                    

<?php
}
 } ?>
                </div>
            </div>

            <div class="btn-group ml-2">
           <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onMouseOver="this.style.borderColor='<?php echo $current_pathway_color;?>'"   onMouseOut="this.style.borderColor='#000000'" style="border: 1px solid #000000;box-sizing: border-box;border-radius: 100px;background-color:<?php echo !empty($search_level) ? 'rgba('.$r.','.$g.','.$b.',0.1)':'';?> ">
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
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onMouseOver="this.style.borderColor='<?php echo $current_pathway_color;?>'"   onMouseOut="this.style.borderColor='#000000'" style="border: 1px solid #000000;box-sizing: border-box;border-radius: 100px;background-color:<?php echo !empty($search_tool) ? 'rgba('.$r.','.$g.','.$b.',0.1)':'';?> ">
                  Tools 
                </button>
                <div class="dropdown-menu">
        <?php


$pathway_tools = get_terms( 'tool', 'orderby=id');
//var_dump($tax_terms);
foreach ( $pathway_tools as $tool ) {
$toolsURL = $pageURL . "&ftl=" .$tool->name;
?>

                    <a class="dropdown-item" href="<?php echo $toolsURL ?>"><?php  echo $tool->name; ?></a>
                    

<?php } ?>
                </div>
            </div>

            <div class="btn-group ml-2">

                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onMouseOver="this.style.borderColor='<?php echo $current_pathway_color;?>'"   onMouseOut="this.style.borderColor='#000000'" style="border: 1px solid #000000;box-sizing: border-box;border-radius: 100px;background-color:<?php echo !empty($search_app) ? 'rgba('.$r.','.$g.','.$b.',0.1)':'';?> ">
                    App
                </button>
                <div class="dropdown-menu">
                    <?php


$pathway_apps = get_terms( 'apps', 'orderby=id');
//var_dump($tax_terms);
foreach ( $pathway_apps as $app ) {
$appURL = $pageURL . "&fa=" .$app->name;
?>

                    <a class="dropdown-item" href="<?php echo $appURL ?>"><?php  echo $app->name; ?></a>
                    

<?php } ?>

            </div>
        </div>

		<span style="margin-left:45%;font-weight:none;text-align: middle;">
		<a href="<?php echo get_permalink();?>" style="color:#3E4C59">Clear All Filters
		<img src="<?php echo get_template_directory_uri();  ?>/images/filterClear.png" style="width:20px;">
		</a>  
    </span>

			</div>
		</div>
		
	</section>


<?php // Output all Taxonomies names with their respective items



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
$totalPosts = count(searchPosts($maxPosts,$search_topic,$search_level,$search_tool,$search_app,$currentPathway));


If($totalPosts %3 != 0){
$newMax = $totalPosts-($totalPosts % 3);
$Searchposts=searchPosts($newMax,$search_topic,$search_level,$search_tool,$search_app,$currentPathway);

}else {
    $Searchposts=searchPosts($maxPosts,$search_topic,$search_level,$search_tool,$search_app,$currentPathway);

}

?>
                <div class="card-deck" style="min-height:400px;">
<?php
$count=0;
foreach($Searchposts as $post): // begin cycle through posts of this taxonmy
setup_postdata($post); //set up post data for use in the loop (enables the_title(), etc without specifying a post ID)
      ?>        


<div class="card border-0" style="margin-bottom:30px;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);">   
<img class="card-img-top cardback" src="<?php the_field('featured_image'); ?>"  width="279px" height="251px" alt="Card image cap">


<div class="card-body" style="margin-left:24px;margin-bottom:32px;min-height:140px;">

<h6 class="card-small" style="color:#9FA6AC; 12px, text-transform: uppercase,margin-top: 24px, margin-left: 24px, margin-bottom: 8px"><?php echo getPostTerms($post->ID,'pathway'); ?> </h6>

<h5 class="card-big" style="font-size:16px, margin-left: 24px, margin-bottom: 32px ">

<a href="<?php the_permalink(); ?>">
<!---make the hold card a link" -->
<?php the_title(); ?></h5>

</a> <!---make the hold card a link" -->

<span class="badge badge-primary" style="background-color:<?php echo $current_pathway_color;?>"> <?php echo getPostTerms($post->ID,'topic'); ?></span>

<span class="badge badge-info" style="outline: 1px solid <?php echo $current_pathway_color;?>;color:<?php echo $current_pathway_color;?>;background-color:#ffffff"> <?php echo getPostTerms($post->ID,'tool'); ?></span>



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