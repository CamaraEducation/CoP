
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
	<div class="hero-container" style="background: #993C9F; height: 295px;">
		<div class="col-xs-6 col-centered">
			<p class="directory-hero-text">TechSpace Directory</p>
		</div>
	</div>
</section>
<!-- #hero -->

<section>
	<div class="container mt-5">
		<a href="" class="filter-text">Filter by </a>
		<div class="btn-group ml-2">

			<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onMouseOver="this.style.borderColor='<?php echo $current_pathway_color;?>'"  onMouseOut="this.style.borderColor='#000000'" style="border: 1px solid #000000;box-sizing: border-box;border-radius: 100px;background-color:<?php echo !empty($search_org) ? 'rgba('.$r.','.$g.','.$b.',0.1)':'';?> ">


				<span onMouseOver="this.style.color='<?php echo $current_pathway_color;?>'"  onMouseOut="this.style.color='#000000'">          

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
			<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onMouseOver="this.style.borderColor='<?php echo $current_pathway_color;?>'"   onMouseOut="this.style.borderColor='#000000'" style="border: 1px solid #000000;box-sizing: border-box;border-radius: 100px;background-color:<?php echo !empty($search_training) ? 'rgba('.$r.','.$g.','.$b.',0.1)':'';?> ">

				<span onMouseOver="this.style.color='<?php echo $current_pathway_color;?>'"  onMouseOut="this.style.color='#000000'">          

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

				<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onMouseOver="this.style.borderColor='<?php echo $current_pathway_color;?>'"   onMouseOut="this.style.borderColor='#000000'" style="border: 1px solid #000000;box-sizing: border-box;border-radius: 100px;background-color:<?php echo !empty($search_communityRole) ? 'rgba('.$r.','.$g.','.$b.',0.1)':'';?> ">

					<span onMouseOver="this.style.color='<?php echo $current_pathway_color;?>'"  onMouseOut="this.style.color='#000000'">          

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

				<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onMouseOver="this.style.borderColor='<?php echo $current_pathway_color;?>'"   onMouseOut="this.style.borderColor='#000000'" style="border: 1px solid #000000;box-sizing: border-box;border-radius: 100px;background-color:<?php echo !empty($search_location) ? 'rgba('.$r.','.$g.','.$b.',0.1)':'';?> ">

					<span onMouseOver="this.style.color='<?php echo $current_pathway_color;?>'"  onMouseOut="this.style.color='#000000'">          

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
			<span style="margin-left:25%;font-weight:none;text-align: middle;">
				<a href="<?php echo get_permalink(); ?>" style="color:black;">Clear All Filters
					<img src="<?php echo get_template_directory_uri();  ?>/images/filterClear.png" style="width:20px;">
				</a>  
			</span>
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
							<div class="col-md-3">
								<p class="pass-desc"> <?php echo $term->descritpion; ?></p>
							</div>
							<div class="col-md-9">


								<div class="row">

									<?php



									$copusers=SearchDirectory($role_id,$search_org,$search_training,$search_location);
									?>			

									<div class="row">
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

											?>

											<a href="<?php echo get_site_url();?>/profile/?user=<?php echo 	$current_user_id;?>">

												<div class="card ml-2 mt-2 border-0" style="width: 280px; height:342px; background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 10px;border-bottom:30px;padding: 12px;align-content: center; margin-right: 24px; margin-bottom: 24px; width: 260px;">


													<img src="<?php echo get_avatar_url($current_user_id); ?>" class="img-responsive rounded-circle" alt="User Profile photo" style="align-self: center;margin-top:40px;width:80px;height:80px;">


													<div class="card-body" style="text-align:center;">
														<p class="custom-card-title" style="margin-top:0px;font-size:24px;margin-bottom:0px;"><?php echo $current_user_name; ?></p>

														<p class="cutsom-card-title" style="margin-top:0px;font-size:16px;font-weight:none;color:#7B8794;"><?php echo $communityRole_name; ?> <br>@ <?php echo $org_name; ?></p>

														<span style="display:block;margin-bottom:14px;color:#7B8794">
															<img src="<?php echo get_template_directory_uri(); ?>/images/location.png"> 
															<?php echo $current_community_user_location; ?>
														</span>
														<span class="badge communityrole" style="vertical-align: middle;font-size:12px;line-height:16px;">
															<?php echo $communityRole_name;?>
														</span>

														<span class="badge card-badge2" style="vertical-align: middle;line-height:16px;font-size:12px;background-color:<?php echo $current_pathway_color ;?>;border-color: <?php echo $current_pathway_color ;?>"><?php echo $current_user_pathway_name;?></span>

													</div>
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