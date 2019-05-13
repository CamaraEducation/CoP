<?php
function getPostTerms($id,$tax){
	$term_list = wp_get_post_terms($id, $tax, array("fields" => "all"));
	foreach($term_list as $term_single) {
return $term_single->name; //do something here
}
}
function getPostTermsid($id,$tax){
	$term_list = wp_get_post_terms($id, $tax, array("fields" => "all"));
	foreach($term_list as $term_single) {
return $term_single; //do something here
}
}
//get term color
$term=getPostTermsid($post->ID, 'pathway' );
$current_pathway_color = get_field('main_color', $term->taxonomy . '_' . $term->term_id);
?>

<section class="my-5">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb arr-right breadback">
				<li class="breadcrumb-item">
					<a class="bread-text" href="<?php echo get_site_url();?>/landing"> Dashboard </a>

				</li>
				<li class="breadcrumb-item">
					<a class="bread-text" href="<?php echo get_site_url();?>/activities/?a=<?php echo getPostTerms($post->ID,'pathway'); ?>">
						<?php echo getPostTerms($post->ID,'pathway'); ?>
					</a>
				</li>
				<li class="breadcrumb-item"><a class="bread-text" href=""><?php echo getPostTerms($post->ID,'topic'); ?></a></li>
				<li class="breadcrumb-item" aria-current="page">
					<a class="breadca" href=""><?php echo the_title();?></a></li>
				</ol>
			</nav>
		</div>
	</section>


<section class="my-5">
		<div class="container">
			<h1 class="actt1">

				<?php echo the_title();?>

			</h1>


			<span class="badge badge-info" style="width: 91px; padding-left:10px;padding-right:10px;padding-top:5px;padding-bottom:5px;border-radius: 24px!important;margin-left: 20px;font-size:34;border: 1px solid <?php echo $current_pathway_color;?>;color:<?php echo $current_pathway_color;?>;background-color:#ffffff"> 
				<?php echo strtoupper(getPostTerms($post->ID,'topic')); ?></span>

				<hr>
			</div>

		<div class="container mb-3">
				<ul class="nav">
					<li class="nav-item leveltx" style="margin-right:64px;">

						<!--LEVEL -->
						<?php 
						$s = getPostTerms($post->ID,'level');

						if($s == "Easy"){?>
							<img src="<?php echo get_template_directory_uri();  ?>/images/level_Easy.png">
						<?php  }elseif ($s== "Intermediate") { ?>

							<img src="<?php echo get_template_directory_uri();  ?>/images/level_Intermediate.png">
						<?php }elseif ($s=="Advanced" ) { ?>
							<img src="<?php echo get_template_directory_uri();  ?>/images/level_Advanced.png">

						<?php } 
						?>
						&nbsp;
						<?php echo  $s; ?></li>

					</a>
				</li>

				<li class="nav-item leveltx" style="margin-right:64px;">

					<!--DURATION -->
					<img src="<?php echo get_template_directory_uri();  ?>/images/duration.png" class="img-responsive" with="10px"  alt="COP">
					<?php echo get_post_meta($post->ID, 'duration', true); ?>

				</li>

				<li class="nav-item leveltx" style="margin-right:64px;">
					<!--AGE GROUP -->
					<img src="<?php echo get_template_directory_uri();  ?>/images/age_range.png" class="img-responsive" with="10px"  alt="COP">
					<?php echo getPostTerms($post->ID,'age_range'); ?>

				</li>

			</ul>
		</div>


	<div class="container">
			<div class="row">
				<div class="col-md-8">
					<img src="<?php the_field('featured_image'); ?>" alt="" class="img-fluid" style="width:691px;height:440px;margin-bottom:72px;">
				</div>

				<div class="col-md-4" style="align:center;">

					<h2 class="headtitle" style="margin-bottom:24px;align:center;margin-left:15%;">Align to Outcomes</h2>
					<hr>
					<div class="card my-3" style="background-color: #fff; border-radius: 10px; min-height:138px;padding:30px;">
						<H2 class="headtitle" style="font-size:14px;"> SKILLS & COMPETENCIES </H2> 

						<ul style="list-style:none;">
							<?php
							$term_list = wp_get_post_terms($post->ID, "skills_and_competencies",array("fields" => "all"));


//convert current 
							$hex = $current_pathway_color;
							list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");



							foreach($term_list as $term_single) {
								?>
								<li style="float:left;margin-right:6px;">
									<span class="badge badge-pill badge-light" style="padding:5px;font-size:12px;background-color:rgba(<?php echo "$r,$g,$b"?>,0.1);box-sizing: border-box; border-radius: 8px;height: 24px;vertical-align: middle;"><?php echo  $term_single->name;?></span>
								</li>
								<?php
							}
							?>
						</ul>

					</div>

					<?php if (get_field('logic_model') != "") { ?>

						<div class="card my-3" style="background-color: #fff; border-radius: 10px; height: 78px;padding: 25px;">


							<h7 class="headtitle" style="font-size:14px;">
								<a href="<?php the_field('logic_model'); ?>" target="new">	
									<img src="<?php echo get_template_directory_uri(); ?>/images/logicModel.png" style="margin-right:12px;width:36px;"> Logic Model </a> 
									<span class="float-right" style="margin-right:2px;"> > </span>
								</h7>
							</div>
						<?php } ?>


						<?php if (get_field('sample_session_plan')) { ?>

							<div class="card my-3" style="background-color: #fff; border-radius: 10px; height: 78px;padding: 25px;">


								<h7 class="headtitle" style="font-size:14px;">
									<a href="<?php the_field('sample_session_plan'); ?>" target="new">

										<img src="<?php echo get_template_directory_uri(); ?>/images/sessionPlan.png"style="margin-right:12px;width:36px;">
										Sample Session Plan
									</a>
									<span class="float-right" style="margin-right:2px;"> > </span>
								</h7>

							</div>
						<?php } ?>



					</div>
				</div>
			</section>

	<section class="my-5">
				<div class="container">
					<h2 class="headtitle">Step-by-step guide</h2>
					<hr>

				</div>


				<?php 

//$posts = get_field('instructor');
//var_dump($posts);
				?>

				<div class="container">
					<div class="row" >
						<div class="col-md-8">
							<div class="col-md-11 bg-white actcardw">
								<div class="card-header border-0 py-3 d-flex align-items-center my-3" style="background-color: #ffffff;">
									<?php
									$instructor = get_post_meta($post->ID, 'instructor_name', true);
									$user = get_user_by( 'id', $instructor );
									?>

									<img src="<?php echo get_avatar_url($instructor); ?>" class="rounded-circle align-self-start mr-3" width="60" style="margin-top:40px;margin-left:40px;">



									<div>
										<h4 class="intro-title mb-0" style="color:#9AA5B1;">
											<?php echo strtoupper(get_post_meta($post->ID, 'instructor', true)); ?> 
										</h4>

										<?php echo $user->display_name; ?>
										@ 
										<?php //echo get_post_meta($post->ID,'instructor_organization',true); ?>
										<?php echo get_term_by('id', get_post_meta($post->ID,'instructor_organization',true), 'member_organization')->name; ?>
										&nbsp;&nbsp;
										<span class="communityrole">

											<?php echo get_term_by('id', get_post_meta($post->ID,'instructor_role',true), 'community_role')->name; ?>

										</span>
									</div>

								</div>
								<div class="container">
									<hr class="mb-5">
									<p class="activtitle"><b>ACTIVITY OVERVIEW</b></p>
									<div class="activpar"><?php the_content(); ?></div>
								</div>
							</div>
							<div class="col-md-11 bg-white actcardw">
								<div class="container">
									<p class="activtitle"><b>ACTIVITY LEARNING OUTCOMES </b></p>

									<div class="activpar"><?php echo get_post_meta($post->ID, 'learning_outcomes', true); ?></div>
								</div>
							</div>
							<div class="col-md-11 bg-white actcardw">
								<div class="container">

									<p class="activtitle"><b>MATERIALS & EQUIPMENT NEEDED</b></p>


									<div class="activpar"><?php echo get_post_meta($post->ID, 'materials_needed', true); ?></div>
								</div>
							</div>

							<div class="col-md-11 bg-white actcardw">
								<div class="container">
									<p class="activtitle"><b>STEP-BY-STEP INSTRUCTIONS </b><br></p>


									<div class="activpar">
										<?php 
							//GET STEP BY STEP TEXT
										$stepbystep = get_post_meta($post->ID, 'step_by_step_guide', true);
										?>

										<span class="step-by-step-excerpt" style="visibility:visible;display:block;">
											<?php echo custom_field_excerpt($stepbystep); ?>
											<button type="button" class="btn btn-link readMorelink" style="color: #EE603B;font-size:16px;font-weight: bold;">Expand more instructions + </button>
										</span>


										<span class="step-by-step-full" style="visibility:hidden;display:none;">
											<!--- print the whole text when clicked done by Jqeury-->
											<?php echo $stepbystep; ?>
										</span>

										<span class="step-by-step-close" style="visibility:hidden;display:none;">

											<button type="button" class="btn btn-link closeMorelink" style="color: #EE603B;font-size:16px;font-weight: bold;">Close Step-by-step  </button>
										</span>
									</div>

								</div>
							</div>

							<div class="col-md-11 bg-white actcardw">
								<div class="container">
									<p class="activtitle"><b>FURTHER RESOURCES & INSTRUCTIONS </b></p>

									<div class="activpar"><?php echo get_post_meta($post->ID, 'further_learning_resources', true); ?></div>

								</div>
							</div>


							<!--- new sectin -->
						</div>
						<div class="col-md-4 my-2">

							<h2 class="headtitle">Support & Community</h2>
							<hr>

							<p class="desc-text" style="font-size:14px;color:#52606D">A step-by-step PDF guide for your group to follow</p>
							<a href="<?php the_field('step_by_step_guide_doc'); ?>">
								<button type="button" class="btn btn-outline-warning my-2" dis  style="background: #EE603B;border: 2px solid #EE603B;box-sizing: border-box;box-shadow: 0px 5px 15px rgba(25, 70, 93, 0.05);border-radius: 100px;color:#FFFFFF">Download Guide</button>
							</a>
							<hr>
							<div class="card" style="background:#F5F7FA;border: 1px solid rgba(0, 0, 0, 0.1);box-sizing: border-box;border-radius: 10px;">
								<div class="card-body">
									<h6 class="box-text12 mb-2 text-muted" style="font-size:14px;">SUPPORT</h6>
									<p class="box-text12">TechSpace project officers are here to help with all your queries with the activities. Have a question?No problem! Reach out and we will help you.</p>
									<hr>
									<p class="box-text-link">
										Ask an Expert (Start a Chat Session) <img src="<?php echo get_template_directory_uri();  ?>/images/askExpert.png" class="rounded-circle z-depth-0 md-avatar" alt="Start a Chat Session">
									</p>
								</div>
							</div>
							<hr>
						<div class="card">
								<div class="card-header" style="background-color:#FFFFFF;">
									<b class="box-text12" style="font-weight:bold;text-transform:uppercase;"> Feedback for the Community</b>
								</div>

								<div style="padding:25px;background-color:#F5F7FA;">

									<p class="feedtxt"><b>SATISFACTION</b></p>
									<p class="feedtxt">How did you find this activity with the young people?</p>


								<?php
								global $current_user;
								get_currentuserinfo();
								$postid = get_the_ID();
								$username = $current_user->user_login;
								$userid = $current_user->ID;
          
								?>


								<div class="btn-group">
									<?php
									$valu = $wpdb->get_var( "SELECT satsfaction FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );
									$sad = $wpdb->get_var( "SELECT sum(satsfaction = 1) FROM ".$wpdb->prefix."feedback WHERE post_id = $postid " );
									$happy = $wpdb->get_var( "SELECT sum(satsfaction = 2) FROM ".$wpdb->prefix."feedback WHERE post_id = $postid " );
									$excited = $wpdb->get_var( "SELECT sum(satsfaction = 3) FROM ".$wpdb->prefix."feedback WHERE post_id = $postid " );
									?>

									<!-- if user sad post, style button differently -->
									<i style="font-size: 2em; color: Red"<?php if (userDisliked($userid, $postid)): ?> class="fas fa-frown dislike-btn" <?php else: ?> 
									class="far fa-frown dislike-btn"<?php endif ?> data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>"></i>
									&nbsp;&nbsp;&nbsp;&nbsp;
									<span class="dislikes"><?php 
									$aa = getsatone($postid);
									if($aa="null"){
										echo "0";
									}else{echo $aa;}
									?></span>

									&nbsp;&nbsp;&nbsp;&nbsp;
									<i style="font-size: 2em; color: Orange"<?php if (userLiked($userid, $postid)): ?>
									class="fas fa-meh like-btn" 
									<?php else: ?>
										class="far fa-meh like-btn"
									<?php endif ?>
									data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>"></i>
									&nbsp;&nbsp;&nbsp;&nbsp;
									<span class="likes"><?php $bb = getsattwo($postid);
									if($bb==NULL){
										echo "0";
									}else{echo $bb;} ?></span>
									&nbsp;&nbsp;&nbsp;&nbsp;

									<i style="font-size: 2em; color: Green"<?php if (userExcited($userid, $postid)): ?>
									class="fas fa-smile excite-btn"
									<?php else: ?>
										class="far fa-smile excite-btn"
									<?php endif ?>
									data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>"></i>
									&nbsp;&nbsp;&nbsp;&nbsp;

									<span class="excites">
									<?php $cc = getsatthr($postid);
									if($cc==NULL){
										echo "0";
									}else{echo $cc;} ?></span>
								</div>
								<hr>
								<p class="feedtxt"><b>LEVEL</b></p>
								<p class="feedtxt">How would you rate the level of this activity?</p>

								<div class="btn-group">
									<i class="beginnertxt" <?php if (userBiggner($userid, $postid)): ?>	
									class="btn btn-success biggner-btn btn-sm"
									<?php else: ?>
										class="btn btn-default biggner-btn btn-sm"
									<?php endif ?>
									data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>" style="font-size:12px;border:1px;padding:5px;margin-top:5px;">
								beginner</i>
								<span class="biggners btn alert-success disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"><?php 
								$cc = getBiggner($postid);
								if($cc==NULL){
									echo "0";
								}else{echo $cc;}
								?></span>

								&nbsp;&nbsp;&nbsp;
								<i class="beginnertxt" <?php if (userInter($userid, $postid)): ?>
								class="btn btn-warning inter-btn btn-sm"
								<?php else: ?>
									class="btn btn-default inter-btn btn-sm"
								<?php endif ?>
								data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>" style="font-size:12px;border:1px;padding:5px;margin-top:5px;">intermidiate</i>
								<span class="inters btn alert-warning disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"><?php
								$dd = getInter($postid);
								if($dd==NULL){
									echo "0";
								}else{echo $dd;}
								?></span>

								&nbsp;&nbsp;&nbsp;
								<i class="beginnertxt" <?php if (userAdvance($userid, $postid)): ?>
								class="btn btn-danger advance-btn btn-sm"
								<?php else: ?>
									class="btn btn-default advance-btn btn-sm"
								<?php endif ?>
								data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>" style="font-size:12px;border:1px;padding:5px;margin-top:5px;">advanced</i>
								<span class="advances btn alert-danger disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"><?php   
								$ee = getAdvance($postid);
								if($ee==NULL){
									echo "0";
								}else{echo $ee;}
								?></span>
							</div>

							<hr>
							<p class="feedtxt"><b>TIME</b></p>
							<p class="feedtxt">How long did this activity take with your group?</p>
							<div class="btn-group">
								<i class="beginnertxt" <?php if (userLessOne($userid, $postid)): ?>
								class="btn btn-success lessone-btn btn-sm"
								<?php else: ?>
									class="btn btn-default lessone-btn btn-sm"
								<?php endif ?>
								data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>" style="font-size:12px;border:1px;padding:5px;margin-top:5px;">
								< 1 hour</i>
								<span class="lessone btn alert-success disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"><?php  
								$ff = getLessOne($postid); 
								if($ff==NULL){
									echo "0";
								}else{echo $ff;}
								?></span>

								&nbsp;&nbsp;&nbsp;
								<i class="beginnertxt" <?php if (userOneToTwo($userid, $postid)): ?>
								class="btn btn-warning onetotwo-btn btn-sm"
								<?php else: ?>
									class="btn btn-default onetotwo-btn btn-sm"
								<?php endif ?>
								data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>" style="font-size:12px;border:1px;padding:5px;margin-top:5px;">1 - 2 hours</i>
								<span class="onetotwo btn alert-warning disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"><?php 
								$gg = getOneToTwo($postid); 
								if($gg==NULL){
									echo "0";
								}else{echo $gg;}
								?></span>

								&nbsp;&nbsp;&nbsp;
								<i class="beginnertxt" <?php if (userMoreTwo($userid, $postid)): ?>
								class="btn btn-danger moretwo-btn btn-sm"
								<?php else: ?>
									class="btn btn-default moretwo-btn btn-sm"
								<?php endif ?>
								data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"> >2 hours</i>
								<span class="moretwo btn alert-danger disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"><?php 
								$hh = getMoreTwo($postid); 
								if($hh==NULL){
									echo "0";
								}else{echo $hh;}
								?></span>
							</div> 

							<hr>
							<p class="feedtxt"><b>AGE GROUP</b></p>
							<p class="feedtxt">What age range group did you work with?</p>

							<div class="btn-group">
								<i class="beginnertxt"<?php if (userBiggnerAge($userid, $postid)): ?>
								class="btn btn-success agebignner-btn btn-sm"
								<?php else: ?>
									class="btn btn-default agebignner-btn btn-sm"
								<?php endif ?>
								data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>" style="font-size:12px;border:1px;padding:5px;margin-top:5px;">Beginner</i>
								<span class="agebiggner btn alert-success disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"><?php
								$jj = getBiggnerAge($postid);
								//var_dump($jj);
								if(empty($jj)){
									echo "0";
								}else{echo $jj;}
								?></span>
								&nbsp;&nbsp;&nbsp;
								<i class="beginnertxt"<?php if (userInterAge($userid, $postid)): ?>
								class="btn btn-warning ageinter-btn btn-sm"
								<?php else: ?>
									class="btn btn-default ageinter-btn btn-sm"
								<?php endif ?>
								data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>" style="font-size:12px;border:1px;padding:5px;margin-top:5px;">Intermediate</i>
								<span class="ageinter btn alert-warning disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"><?php
								$kk == getInterAge($postid); 
								if(empty($kk)){
									echo "0";
								}else{echo $kk;}
								?></span>

								&nbsp;&nbsp;&nbsp;
								<i class="beginnertxt"<?php if (userAdvanceAge($userid, $postid)): ?>
								class="btn btn-danger ageadvance-btn btn-sm"
								<?php else: ?>
									class="btn btn-default ageadvance-btn btn-sm"
								<?php endif ?>
								data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>" style="font-size:12px;border:1px;padding:5px;margin-top:5px;">Advanced</i>
								<span class="ageadvance btn alert-danger disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"><?php  
								$ll == getAdvanceAge($postid); 
							//var_dump($ll);
								if(empty($ll)){
									echo "0";
								}else{echo $ll;}
								?></span>
							</div>


						</div>

						

</div>



	<?php 
	$next_post = get_next_post(); ?>

	<?php
		
		if (!empty( $next_post )): ?>
			
			<hr>
<div class="card-header border-0 py-3 d-flex align-items-center my-3">

	<img src="<?php echo get_field('featured_image', $next_post->ID); ?> " style="width:64px;" class="align-self-start mr-3">
	<div>
		<h4 class="intro-title mb-0" style="color:#9AA5B1;">Next activity</h4>
		<h6 class="intro-steam"></h6>

		

			<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>"><?php echo esc_attr( $next_post->post_title ); ?></a>
		
	</h6>			</div>
<?php endif; ?>
</div>
<hr>
</div>
</div>
</div>
</section>
<section class="my-5">
	<div class="container">
		<h2 class="headtitle">Activity Tried & Tested</h2>
		<hr>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
	<div class="card" style="background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 10px;">
<div class="card-body">
<?php
// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) {
									?>
									<div style="overflow-y: scroll; height:300px;">
									<?php comments_template(); ?>
								</div>
							<?php	} ?>
			
								
<div class="card-header border-0 py-3 d-flex align-items-center my-3" style="background-color: #ffffff;">
<img src="<?php echo get_avatar_url($current_user->ID); ?>" class="rounded-circle align-self-start mr-3" style="width:40px;">
<div>
<div class="form-group green-border-focus">
<textarea class="form-control col-xs-12" id="exampleFormControlTextarea5"  rows="7" cols="80" style="color:#7B8794">
What went well or or did't go well for me with this activity was...
</textarea>
<button type="button" class="btn btn-outline-warning my-3" style="background: #EE603B;box-shadow: 0px 5px 15px rgba(25, 70, 93, 0.05);border-radius: 100px;font-family: Lato;font-style: normal;font-weight: bold font-size: 12px;line-height: 24px;color: #fff;">Add Comment</button>
										</div>
									</div>
								</div>
							</div>
	</div>
			</div>
			<div class="col-md-4">
				<h2 class="euneed pt-3">Community Contributor ....</h2>
				<p class="desc-text">Become a contributor and let the community know what worked or didn't work for you for you pre, post, or during this activity with the young people.</p>
				<p class="desc-text"><b>Let others know</b></p>
				<ul class="fa-ul">
					<li class="desc-text"><i class="fa-li fa fa-check-square"></i>What Worked well for your group?</li>
					<li class="desc-text"><i class="fa-li fa fa-check-square"></i>Did you make any accessiblity adjustments?</li>
					<li class="desc-text"><i class="fa-li fa fa-check-square"></i>Points of frustration you overcame?</li>
				</div>
			</div>
		</div>
	</section>