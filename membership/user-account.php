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
                                <div class="card" style="background-color: #ffffff; border-radius: 10px;height: 340px;">
                                    <div class="card-header border-0 py-3 d-flex align-items-center my-3" style="background-color: #ffffff;">
                        
                            <iframe width="600" height="268"  src="https://www.youtube.com/embed/videoseries?list=PLx0sYbCqOb8TBPRdmBHs5Iftvv9TPboYG" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen style="margin-left:5%;"></iframe>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

            <div class="col-md-4 my-3">
                     <div class="card" style="background: #FFFFFF;
                    border: 1px solid #FFFFFF;
                    box-sizing: border-box;
                    border-radius: 4px;">
                        <div class="card-body">
                             <p class="meet-company-title" style="font-family: Lato;
                            font-style: normal;
                            font-weight: bold;
                            font-size: 14px;
                            line-height: 24px;
                            text-transform: uppercase;">Meet the online techspace networke </p>
                             <?php
                                $tax_terms = get_terms('community_role', array('hide_empty' => false,));

                                 // var_dump($tax_terms);
                                foreach ( $tax_terms as $term ) {
                                ///loop though the types 
                                
                                $role_id = $term->term_id;
                                ?>
                                <?php
                                $copusers = get_users(
                                                     array(
                                                      'meta_key' => 'member_community_role',
                                                      'meta_value' => $role_id,
                                                      )
                                                      );
                                // var_dump($copusers);
                  
                                ?>
                            <p class="meet-company-text" ><a href="" style="font-family: Lato; font-style: normal; font-weight: bold; font-size: 24px; line-height: 16px; color: #7B8794;"><?php echo count($copusers);?></a> &nbsp;  &nbsp; <a href="" style="font-family: Lato; font-style: normal; font-weight: bold; font-size: 12px; line-height: 16px; text-align: center; color: #993C9F; border-radius: 4px; "><?php echo $term->name;?></a>&nbsp;<a href="#" class="badge badge-primary">officer</a></p>
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
                            <div class="col-md-4">
                                <div class="card" style="background-color: <?php echo $current_pathway_color; ?>" border-radius: 10px;height: 168px;">
                                    <div class="card-header border-0 py-3 d-flex align-items-center my-3" style="background-color: <?php echo $current_pathway_color; ?>">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/resource.png" class="rounded-circle align-self-start mr-3">
                                        <div>
                                            <h4 class="intro-title mb-0">PROGRAMME PLANNING</h4>
                                            <h6 class="intro-steam">Logic Models</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card" style="background-color: #fff; border-radius: 10px;height: 168px;">
                                    <div class="card-header border-0 py-3 d-flex align-items-center my-3" style="background-color: #ffffff;">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/resource.png" class="rounded-circle align-self-start mr-3">
                                        <div>
                                            <h4 class="intro-title mb-0" style="color:#9AA5B1;">PROGRAMME PLANNING</h4>
                                            <h6 class="intro-steam">Session Plans</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card" style="background-color: #fff; border-radius: 10px;height: 168px;">
                                    <div class="card-header border-0 py-3 d-flex align-items-center my-3" style="background-color: #ffffff;">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/resource.png" class="rounded-circle align-self-start mr-3">
                                        <div>
                                            <h4 class="intro-title mb-0" style="color:#9AA5B1;">PROGRAMME PLANNING</h4>
                                            <h6 class="intro-steam">Code of Conduct</h6>
                                        </div>
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
                        <div class="card-deck">
        <?php
        //show latest psots
        $maxPosts = 3;
        $latestActivities=getactivity($maxPosts,$current_user_pathway_name);

        if ( $latestActivities ) {

            foreach ( $latestActivities as $post ) :
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
        endforeach;
         wp_reset_postdata();
         
        }else {
            echo "nothong";
        }
        ?>              
        </div>
    
    </div>

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
                            $tax_terms = get_terms( 'topic', 'orderby=id',array('number' => 2));
                            //var_dump($tax_terms);
                            $count=0;
                            foreach ( $tax_terms as $term ) {

                            if($count==2) {break;};
                            $count++;
                            ?>
                            <div class="col-md-6 my-2">
                                <div class="card" style="background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 10px;">
                                    <div class="card-header border-0 py-3 d-flex align-items-center my-3" style="background-color: #ffffff;">
                                        <img src="<?php echo gettopicImage($term->name); ?>" class="rounded-circle align-self-start mr-3" width="50" height="50">
                                        <div>
                                            <h4 class="intro-title mb-0" style="color:#9AA5B1;">Activity</h4>
                                            <h6 class="intro-steam"><a href="activities/?ft=<?php echo $term->name;?>"><?php echo $term->name;?> </a></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php 
                        }//end each 
                        ?>
                        </div>
                    </div>

                    <div class="col-md-4 my-2">
                        <div class="card" style="background-color: #E6EEF3;opacity: 0.78;border: 1px solid #CACCCE;box-sizing: border-box;border-radius: 4px;">
                            <div class="card-body">
                                <h3 class="text-on-card toc-text">Community Contributor</h3>
                                <p class="cc-title">Create an activity guide</p>
                                <p class="cc-text">Become a Community Contributor</p>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
<?php
get_footer();
?>