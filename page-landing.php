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

<span class="badge badge-light float-left" style="background-color: <?php echo $current_pathway_color;?>; opacity: 0.5; color:#FFFFFF;">
<?php echo $current_user_pathway_name  ?></span>
<span class="badge float-left mr-2 communityrole" style="margin-left: 15px;">
<?php echo $communityRole_name; ?></span> 

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
<ul class="nav" id="myTab" role="tablist>

<?php

$tax_terms = get_terms( 'pathway', 'orderby=id');
//var_dump($tax_terms);
foreach ( $tax_terms as $term ) {

if($current_user_pathway_name == $term->name){

?>

<li class="nav-item mx-4 tab-text1">
<a class="nav-link <?php echo ($currentPathway == $term->name ? "active" : "")?>" id="<?php echo $term->slug; ?>-tab" data-toggle="tab" href="#<?php echo $term->slug; ?>" role="tab" aria-controls="<?php echo $term->slug;?>" aria-selected="<?php echo ($currentPathway == $term->name ? "true" : "false")?>" style="    border-bottom: 2px solid #EE603B;color: #EE603B;font-weight: bold;font-size:16px;"> <?php echo $term->name; ?>  
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
				<h2 class="headtitle" style="margin-bottom: 24px;">Welcome to your <?php echo $current_user_pathway_name; ?> Content</h2>
				<hr style="margin-bottom: 40px;">
			</div>
				
	<div class="container">
				<div class="row my-3">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12 my-2">
								<div class="card" style="background-color: #ffffff; border-radius: 10px;height: 340px;">
									<div class="card-header border-0 py-3 d-flex align-items-center my-3" style="background-color: #ffffff;">
						
						

<iframe width="620" height="268" <iframe width="560" height="315" src="https://www.youtube.com/embed/eO4vh9QOquw?controls=0&amp;start=11" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"  style="margin-left:5%;"></iframe>

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
                            text-transform: uppercase;">Meet the online techspace network </p>
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
                            <p class="meet-company-text" ><a href="<?php echo home_url()?>/directory/?fcrl=<?php echo $term->term_id;?>" style="text-transform:capitalize;font-family: Lato; font-style: normal; font-weight: bold; font-size: 24px; line-height: 16px; color: #B0B7BF;"><?php echo count($copusers);?></a>

                             &nbsp;  &nbsp; 
<span class="communityrole">

<a href="<?php echo home_url()?>/directory/?fcrl=<?php echo $term->term_id;?>"><?php echo $term->name;?></a> <span class="float-right"> >  
 </span>

                            	 
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

		<div class="card" style="box-shadow: 0px 3px 5px; rgba (25, 70, 93, 0.05);background-color:#fff;height: 168px;padding-top:5%;">

		<div class="card-header border-0 py-3 d-flex align-items-center my-3" style="background-color:#fff">
			<img src="<?php echo get_template_directory_uri(); ?>/images/knowledge.png" class="align-self-start mr-3" style="margin-left:12px;margin-right:12px;">
										
									<a href="programmeplanning/#Logic Models"> 
										<div>
											<h4 style="color:#9AA5B1;font-size:12px;">PROGRAMME PLANNING</h4>
											<h6 class="intro-steam" style="font-size:18px;font-weight:bold;">Logic Models</h6>
										</div>
									</a>

									</div>
								</div>
							</div>

							<div class="col-md-4">
	<div class="card" style="box-shadow: 0px 3px 5px; rgba (25, 70, 93, 0.05);background-color:#fff;height: 168px;padding-top:5%;">


				<div class="card-header border-0 py-3 d-flex align-items-center my-3" style="background-color:#fff">
			<img src="<?php echo get_template_directory_uri(); ?>/images/SessionPlans.png" class="align-self-start mr-3" style="margin-left:12px;margin-right:12px;">
										
									<a href="programmeplanning/#Session Plans"> 
										<div>
											<h4 style="color:#9AA5B1;font-size:12px;">PROGRAMME PLANNING</h4>
											<h6 class="intro-steam" style="font-size:18px;font-weight:bold;">Session Plans</h6>
										</div>
									</a>

									</div>
								</div>



							</div>


							<div class="col-md-4">
							
	<div class="card border-0" style="box-shadow: 0px 3px 5px; rgba (25, 70, 93, 0.05);background-color:#fff;height: 168px;padding-top:5%;">


	<div class="card-header border-0 py-3 d-flex align-items-center my-3" style="background-color:#fff">
	<img src="<?php echo get_template_directory_uri(); ?>/images/CodeofConduct.png" class="align-self-start mr-3" style="margin-left:12px;margin-right:12px;">
										
									<a href="<?php echo get_template_directory_uri(); ?>/docs/CoPCodeofConduct.pdf" target="new"> 
										<div>
											<h4 style="color:#9AA5B1;font-size:12px;">PROGRAMME PLANNING</h4>
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
						<div class="card-deck">
		<?php
		//show latest psots
		$maxPosts = 3;
		$latestActivities=getactivity($maxPosts,$current_user_pathway_name);

		if ( $latestActivities ) {

		    foreach ( $latestActivities as $post ) :
		?>

		<div class="card" style="margin-bottom:30px;">   
		<img class="card-img-top cardback" src="<?php the_field('featured_image'); ?>"  width="279" height="251" alt="Card image cap">
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
			echo "Nothing to show for now - No Activities! ";
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
			

				//			$tax_terms = get_terms( 'topic', 'orderby=id',array('number' => 2,'pathway' =>$currentPathway));
	
if(strcasecmp(strtoupper ($current_user_pathway_name), strtoupper ("Digital Creativity"))==0) {
	$topics = array("MOJO","Graphic Design","Video Production","Animation","Audio Production","Photography");

}else {
	$topics = array("Maker","Computer Science");
}

$arrlength = count($topics);

//		echo $arrlength;

for($x = 0; $x < $arrlength; $x++) {

							?>
							<div class="col-md-6 my-2">
								
									<div class="card-header border-0 py-3 d-flex align-items-center my-3" style="background-color: #ffffff;height:96px;">
										<img src="<?php echo gettopicImage($topics[$x]); ?>" class="align-self-start mr-3" width="36">
										<div>
										
											<h6 class="intro-steam"><a href="activities/?ft=<?php echo $topics[$x] ;?>">
<?php echo $topics[$x]; ?>
												Activities  </a></h6>
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