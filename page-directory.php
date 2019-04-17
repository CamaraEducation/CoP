<?php get_header();?>
<!--  Hero Section -->
	<section id="hero">
		<div class="hero-container" style="background: #993C9F; height: 295px;">
			<div class="col-xs-6 col-centered">
				<p class="directory-hero-text">TechSpace Directory</p>
			</div>
		</div>
	</section>


<section>
        <div class="container mt-5">
            <a href="" class="filter-text">Filter by </a>


<?php

$pageURL = get_permalink() . "?".$_SERVER["QUERY_STRING"];

//echo $pageURL;

?>

<div class="btn-group ml-2">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: 1px solid #3E4C59;box-sizing: border-box;border-radius: 100px;">
                    Organization
                </button>
                <div class="dropdown-menu">

				<?php

				$pathway_organizations = get_terms( 'member_organization', 'orderby=id');
				//var_dump($tax_terms);
				foreach ( $pathway_organizations as $organization ) {
				$organizationURL = $pageURL . "&ft=" .$organization->name;
				?>

				<a class="dropdown-item" href="<?php echo $organizationURL ?>"><?php  echo $organization->name; ?></a>
				                    

				<?php } ?>
                </div>
            </div>
            <div class="btn-group ml-2">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: 1px solid #3E4C59;box-sizing: border-box;border-radius: 100px;">
                    Training
                </button>
                <div class="dropdown-menu">
                    
				<?php


				$pathway_training = get_terms( 'member_community_role', 'orderby=id');
				//var_dump($tax_terms);
				foreach ( $pathway_training as $training ) {
				$trainingURL = $pageURL . "&fl=" .$training->name;
				?>

                    <a class="dropdown-item" href="<?php echo $communityURL; ?>"><?php  echo $training->name; ?></a>
                    

				<?php } ?>

                </div>
            </div>
            <div class="btn-group ml-2">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: 1px solid #3E4C59;box-sizing: border-box;border-radius: 100px;">
                    Community Role
                </button>
                <div class="dropdown-menu">
                    
				<?php


				$pathway_community_roles = get_terms( 'member_community_role', 'orderby=id');
				//var_dump($tax_terms);
				foreach ( $pathway_community_roles as $community ) {
				$communityURL = $pageURL . "&fl=" .$community->name;
				?>

                    <a class="dropdown-item" href="<?php echo $communityURL; ?>"><?php  echo $community->name; ?></a>
                    

				<?php } ?>

                </div>
            </div>
            <div class="btn-group ml-2">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: 1px solid #3E4C59;box-sizing: border-box;border-radius: 100px;">
                    Location
                </button>
                <div class="dropdown-menu">
                    
				<?php


				$pathway_location = get_terms( 'member_community_role', 'orderby=id');
				//var_dump($tax_terms);
				foreach ( $pathway_location as $location ) {
				$locationURL = $pageURL . "&fl=" .$location->name;
				?>

                    <a class="dropdown-item" href="<?php echo $communityURL; ?>"><?php  echo $location->name; ?></a>
                    

				<?php } ?>

                </div>
            </div>
<section class="my-5">
		<div class="container">
			
               <?php
				$tax_terms = get_terms('community_role', array('hide_empty' => false,));

				 // var_dump($tax_terms);
				foreach ( $tax_terms as $term ) {
				///loop though the types 
				
				$role_id = $term->term_id;

				?>
			<h2 class="headtitle"> <?php echo $term->name; ?> </h2>
			<hr>
		</div>
        <div class="container">
			<div class="row">
				<div class="col-md-3">
					<p class="pass-desc"><?php echo $term->description;?></p>
				</div>
				<?php echo "</br"; ?>
				 <div class="card-deck">
				<?php

				$copusers = get_users(
									 array(
									  'meta_key' => 'member_community_role',
									  'meta_value' => $role_id,
									  )
									  );
				$numOfCols = 4;
				$rowCount = 0;
				$bootstrapColWidth = 12 / $numOfCols;

				foreach ( $copusers as $users ) {
				setup_postdata($users);
				$current_user_name= $users->display_name;
				$current_user_id = $users->ID;
				$user_role = $users->role;

				$tax_org = get_terms('member_organization', array('hide_empty' => false,));
				$org_na = $tax_org->name;

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
				?>
				<div class="row">
				<div class="col-md-<?php echo $bootstrapColWidth; ?>">
						<div class="card ml-2 mt-2" style="width: 17rem; background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 10px; margin-bottom:30px; float: left;">
							<img class="card-img-top col-4 mx-auto text-center mt-3" src="<?php echo get_avatar_url($user->ID); ?>" alt="Card image cap" width="82" height="82">
							<div class="card-body">
								<p class="custom-card-title"><?php echo $current_user_name; ?></p>
								<p class="custom-card-title"><?php echo $user_role; ?></p>
								<p class="cutsom-card-body"><?php echo $communityRole_name; ?> <br>@ <?php echo $org_name; ?></p>
								<a href="#" class="badge card-badge1 ml-4">Education Officer</a>
								<a href="#" class="badge card-badge2"><?php echo $current_user_pathway_name;?></a>
							</div>
						</div>
					</div>

				</div>
				<?php
				 $rowCount++;
   				 if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
					}
					}
					?>
   
        		</div>
		    </div>
		</div>
    </section>

<?php get_footer();?>