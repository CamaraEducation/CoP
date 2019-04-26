
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
			<ol class="breadcrumb arr-right" style="background-color: #F0F2F5;">
				<li class="breadcrumb-item bread-text">Dashboard</li>
				<li class="breadcrumb-item bread-text"><?php echo getPostTerms($post->ID,'pathway'); ?></li>
				<li class="breadcrumb-item bread-text"> <?php echo getPostTerms($post->ID,'topic'); ?></li>
				<li class="breadcrumb-item bread-text active" aria-current="page"><a href="">    <?php echo the_title();?></a></li>
			</ol>
		</nav>
	</div>
</section>


<section class="my-5">
	<div class="container">
		<h1 class="headtitle" style="font-weight: bold; font-size: 38px; line-height: 24px; float: left;"><?php echo the_title();?></h1>


		<span class="badge badge-info" style="padding-left:10px;padding-right:10px;padding-top:5px;padding-bottom:5px;border-radius: 24px!important;margin-left: 20px;font-size:34;border: 1px solid <?php echo $current_pathway_color;?>;color:<?php echo $current_pathway_color;?>;background-color:#ffffff"> 
			 <?php echo strtoupper(getPostTerms($post->ID,'topic')); ?></span>

			<hr>
		</div>

		<div class="container mb-3">
			<ul class="nav"  style="padding-top:6px;padding-bottom: 6px;">
				<li class="nav-item">

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
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</a>
			</li>

			<li class="nav-item">

				<!--DURATION -->
				<img src="<?php echo get_template_directory_uri();  ?>/images/duration.png" class="img-responsive" with="10px"  alt="COP">
				<?php echo get_post_meta($post->ID, 'duration', true); ?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</li>
			<li class="nav-item">
				<!--AGE GROUP -->
				<img src="<?php echo get_template_directory_uri();  ?>/images/age_range.png" class="img-responsive" with="10px"  alt="COP">
				<?php echo getPostTerms($post->ID,'age_range'); ?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</li>

		</ul>
	</div>


	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<img src="<?php the_field('featured_image'); ?>" alt="" class="img-fluid" style="width:691px;height:440px;">
			</div>
			
			<div class="col-md-4">

	<h2 class="headtitle">Align to Outcomes</h2>
<hr>
				<div class="card my-3" style="background-color: #fff; border-radius: 10px; min-height:138px;padding:30px;">
					<H2 class="headtitle" style="font-size:14px;"> SKILLS & COMPETENCIES </H2> 

	<ul style="list-style:none;">
					<?php
					$term_list = wp_get_post_terms($post->ID, "skills_and_competencies",array("fields" => "all"));

	

					foreach($term_list as $term_single) {
							?>
<li style="float:left;margin-right:6px;">
<span class="badge badge-pill badge-light" style="padding:10px;font-size:14px;border: 1px solid #3ECCCB;
box-sizing: border-box;
border-radius: 8px;"><?php echo  $term_single->name;?></span>
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
					<div class="col-md-11" style="background-color: white; border-radius: 10px;padding:36px;">
						<div class="card-header border-0 py-3 d-flex align-items-center my-3" style="background-color: #ffffff;">
							<img src="<?php echo get_avatar_url($current_user->ID); ?>" class="rounded-circle align-self-start mr-3">
							<div>
								<h4 class="intro-title mb-0" style="color:#9AA5B1;">
									<?php echo strtoupper(get_post_meta($post->ID, 'instructor', true)); ?> 
								</h4>
							
									<?php echo get_post_meta($post->ID, 'instructor_name', true); ?>
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
								<hr style="margin-bottom:24px;">
								<p style="font-size:14px;"><b>ACTIVITY OVERVIEW</b></p>


								<p>

									<?php the_content(); ?>
								</p>

							</div>

						</div>

						<div class="col-md-11" style="background-color: white; border-radius: 10px;padding:36px;margin-top:15px;">

							<p style="font-size:14px;"><b>ACTIVITY LEARNING OUTCOMES </b></p>

							<?php echo get_post_meta($post->ID, 'learning_outcomes', true); ?>


						</div>


						<div class="col-md-11" style="background-color: white; border-radius: 10px;padding:36px;margin-top:15px;">


							<p style="font-size:14px;"><b>MATERIALS & EQUIPMENT NEEDED</b></p>


							<?php echo get_post_meta($post->ID, 'materials_needed', true); ?>

						</div>

						<div class="col-md-11" style="background-color: white; border-radius: 10px;padding:36px;margin-top:15px;">
							<p style="font-size:14px;"><b>STEP-BY-STEP INSTRUCTIONS </b><br></p>


							<?php 
							//GET STEP BY STEP TEXT
							$stepbystep = get_post_meta($post->ID, 'step_by_step_guide', true);
							?>

<span class="step-by-step-excerpt" style="">
<?php echo custom_field_excerpt($stepbystep); ?>
<button type="button" class="btn btn-link readMorelink" style="color: #EE603B;font-size:16px;font-weight: bold;">Expand more instructions + </button>
</span>

<span class="step-by-step-full" style="visibility:hidden;display:none;">
	<!--- print the whole text when clicked done by Jqeury-->
<?php echo $stepbystep; ?>
</span>


						</div>

						<div class="col-md-11" style="background-color: white; border-radius: 10px;padding:36px;margin-top:15px;">
							<p style="font-size:14px;"><b>FURTHER RESOURCES & INSTRUCTIONS </b></p>

							<?php echo get_post_meta($post->ID, 'further_learning_resources', true); ?>


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

								<p><b>SATISFACTION</b></p>
								<p>How did you find this activity with the young people?</p>


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
									if($bb="null"){
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
									<span class="excites"><?php $cc = getsatthr($postid);
									if($mm="null"){
										echo "0";
									}else{echo $mm;} ?></span>
								</div>
								<hr>
								<p><b>LEVEL</b></p>
								<p>How would you rate the level of this activity?</p>

								<div class="btn-group">
									<i <?php if (userBiggner($userid, $postid)): ?>	
									class="btn btn-success biggner-btn btn-sm"
									<?php else: ?>
										class="btn btn-default biggner-btn btn-sm"
									<?php endif ?>
									data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>" style="font-size:12px;border:1px;padding:5px;margin-top:5px;">
								beginner</i>
								<span class="biggners btn alert-success disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"><?php 
								$cc = getBiggner($postid);
								if($cc="null"){
									echo "0";
								}else{echo $cc;}
								?></span>

								&nbsp;&nbsp;&nbsp;
								<i <?php if (userInter($userid, $postid)): ?>
								class="btn btn-warning inter-btn btn-sm"
								<?php else: ?>
									class="btn btn-default inter-btn btn-sm"
								<?php endif ?>
								data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>" style="font-size:12px;border:1px;padding:5px;margin-top:5px;">intermidiate</i>
								<span class="inters btn alert-warning disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"><?php
								$dd = getInter($postid);
								if($dd="null"){
									echo "0";
								}else{echo $dd;}
								?></span>

								&nbsp;&nbsp;&nbsp;
								<i <?php if (userAdvance($userid, $postid)): ?>
								class="btn btn-danger advance-btn btn-sm"
								<?php else: ?>
									class="btn btn-default advance-btn btn-sm"
								<?php endif ?>
								data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>" style="font-size:12px;border:1px;padding:5px;margin-top:5px;">advanced</i>
								<span class="advances btn alert-danger disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"><?php   
								$ee = getAdvance($postid);
								if($ee="null"){
									echo "0";
								}else{echo $ee;}
								?></span>
							</div>

							<hr>
							<p><b>TIME</b></p>
							<p>How long did this activity take with your group?</p>
							<div class="btn-group">
								<i <?php if (userLessOne($userid, $postid)): ?>
								class="btn btn-success lessone-btn btn-sm"
								<?php else: ?>
									class="btn btn-default lessone-btn btn-sm"
								<?php endif ?>
								data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>" style="font-size:12px;border:1px;padding:5px;margin-top:5px;">
								< 1 hour</i>
								<span class="lessone btn alert-success disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"><?php  
								$ff = getLessOne($postid); 
								if($ff="null"){
									echo "0";
								}else{echo $ff;}
								?></span>

								&nbsp;&nbsp;&nbsp;
								<i <?php if (userOneToTwo($userid, $postid)): ?>
								class="btn btn-warning onetotwo-btn btn-sm"
								<?php else: ?>
									class="btn btn-default onetotwo-btn btn-sm"
								<?php endif ?>
								data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>" style="font-size:12px;border:1px;padding:5px;margin-top:5px;">1 - 2 hours</i>
								<span class="onetotwo btn alert-warning disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"><?php 
								$gg = getOneToTwo($postid); 
								if($gg="null"){
									echo "0";
								}else{echo $gg;}
								?></span>

								&nbsp;&nbsp;&nbsp;
								<i <?php if (userMoreTwo($userid, $postid)): ?>
								class="btn btn-danger moretwo-btn btn-sm"
								<?php else: ?>
									class="btn btn-default moretwo-btn btn-sm"
								<?php endif ?>
								data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"> >2 hours</i>
								<span class="moretwo btn alert-danger disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"><?php 
								$hh = getMoreTwo($postid); 
								if($hh="null"){
									echo "0";
								}else{echo $hh;}
								?></span>
							</div> 

							<hr>
							<p><b>AGE GROUP</b></p>
							<p>What age range group did you work with?</p>

							<div class="btn-group">
								<i <?php if (userBiggnerAge($userid, $postid)): ?>
								class="btn btn-success agebignner-btn btn-sm"
								<?php else: ?>
									class="btn btn-default agebignner-btn btn-sm"
								<?php endif ?>
								data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>" style="font-size:12px;border:1px;padding:5px;margin-top:5px;">Beginner</i>
								<span class="agebiggner btn alert-success disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"><?php
								$jj = getBiggnerAge($postid);
								if($jj="null"){
									echo "0";
								}else{echo $jj;}
								?></span>
								&nbsp;&nbsp;&nbsp;
								<i <?php if (userInterAge($userid, $postid)): ?>
								class="btn btn-warning ageinter-btn btn-sm"
								<?php else: ?>
									class="btn btn-default ageinter-btn btn-sm"
								<?php endif ?>
								data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>" style="font-size:12px;border:1px;padding:5px;margin-top:5px;">Intermediate</i>
								<span class="ageinter btn alert-warning disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"><?php
								$kk = getInterAge($postid); 
								if($kk="null"){
									echo "0";
								}else{echo $kk;}
								?></span>

								&nbsp;&nbsp;&nbsp;
								<i <?php if (userAdvanceAge($userid, $postid)): ?>
								class="btn btn-danger ageadvance-btn btn-sm"
								<?php else: ?>
									class="btn btn-default ageadvance-btn btn-sm"
								<?php endif ?>
								data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>" style="font-size:12px;border:1px;padding:5px;margin-top:5px;">Advanced</i>
								<span class="ageadvance btn alert-danger disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"><?php  
								$ll = getAdvanceAge($postid); 
								if($ll="null"){
									echo "0";
								}else{echo $ll;}
								?></span>
							</div>


						</div>

						<script>
							$(document).ready(function(){

								/**1============DISLIKE========================*/
								$(".dislike-btn").click(function() {	
									var user_id = $(this).data('userid');
									var post_id = $(this).data('postid');
									$clicked_btn = $(this);								 

									if ($clicked_btn.hasClass('far')) {
										action = 'dislike';
//alert("dislike" + post_id + user_id);
} else if($clicked_btn.hasClass('fas')){
	action = 'undislike';
//alert(action + post_id + user_id);
}


$.ajax({
	type: "POST",
	data: {
		'action': likeaction,
		'post_id': post_id,
		'user_id': user_id
	},
	success: function(data) {
//alert("I am here");
res = JSON.parse(data);
if (action == 'dislike') {
	$clicked_btn.removeClass('far');
	$clicked_btn.addClass('fas');
} else if(action == 'undislike') {
//		alert("I am here eek0"+action);
$clicked_btn.removeClass('fas');
$clicked_btn.addClass('far');
}

//alert(res.dislikes);
	// display the number of likes and dislikes
	$clicked_btn.siblings('span.dislikes').text(res.dislikes);
	$clicked_btn.siblings('span.likes').text(res.likes);
	$clicked_btn.siblings('span.excites').text(res.excites);

// change button styling of the other button if user is reacting the second time to post
$clicked_btn.siblings('i.fa-meh').removeClass('fas fa-meh').addClass('far fa-meh');
$clicked_btn.siblings('i.fa-smile').removeClass('fas fa-smile').addClass('far fa-smile');

//alert("I just passed");
}//end of suess 
});
});//end if Dislike button


								/**1============LIKE========================*/
								$(".like-btn").click(function() {	
									var user_id = $(this).data('userid');
									var post_id = $(this).data('postid');
									$clicked_btn = $(this);								 

									if ($clicked_btn.hasClass('far')) {
										action = 'like';
//alert("dislike" + post_id + user_id);
} else if($clicked_btn.hasClass('fas')){
	action = 'unlike';
//alert(action + post_id + user_id);
}


$.ajax({
	type: "POST",
	data: {
		'action': action,
		'post_id': post_id,
		'user_id': user_id
	},
	success: function(data) {
//alert("I am here");
res = JSON.parse(data);
if (action == "like") {
	$clicked_btn.removeClass('far');
	$clicked_btn.addClass('fas');
} else if(action == "unlike") {
	$clicked_btn.removeClass('fas');
	$clicked_btn.addClass('far');
}

// display the number of likes and dislikes
$clicked_btn.siblings('span.likes').text(res.likes);
$clicked_btn.siblings('span.dislikes').text(res.dislikes);
$clicked_btn.siblings('span.excites').text(res.excites);
 		// change button styling of the other button if user is reacting the second time to post
 		$clicked_btn.siblings('i.fa-frown').removeClass('fas').addClass('far');
 		$clicked_btn.siblings('i.fa-smile').removeClass('fas').addClass('far');

//alert("I just passed");
}//end of suess 
});
});//end if Dislike button


								/**1============EXCITE========================*/
								$(".excite-btn").click(function() {	
									var user_id = $(this).data('userid');
									var post_id = $(this).data('postid');
									$clicked_btn = $(this);								 

									if ($clicked_btn.hasClass('far')) {
										action = 'excited';
//alert(action+ post_id + user_id);
} else if($clicked_btn.hasClass('fas')){
	action = 'unexcited';
//alert(action + post_id + user_id);
}


$.ajax({
	type: "POST",
	data: {
		'action': action,
		'post_id': post_id,
		'user_id': user_id
	},
	success: function(data) {
//alert("I am here");
res = JSON.parse(data);
if (action == "excited") {
	$clicked_btn.removeClass('far');
	$clicked_btn.addClass('fas');
} else if(action == "unexcited") {
	$clicked_btn.removeClass('fas');
	$clicked_btn.addClass('far');
}

// display the number of likes and dislikes
$clicked_btn.siblings('span.likes').text(res.likes);
$clicked_btn.siblings('span.dislikes').text(res.dislikes);
$clicked_btn.siblings('span.excites').text(res.excites);
		// change button styling of the other button if user is reacting the second time to post
		$clicked_btn.siblings('i.fa-frown').removeClass('fas').addClass('far');
		$clicked_btn.siblings('i.fa-meh').removeClass('fas').addClass('far');

//alert("I just passed");
}//end of suess 
});
});//end if Dislike button


								/******************LEVEL ================================================= */
								$(".biggner-btn").click(function() {	
									var user_id = $(this).data('userid');
									var post_id = $(this).data('postid');
				  //alert(post_id + user_id);
				  $clicked_btn = $(this);
				  if ($clicked_btn.hasClass('btn-default')) {
				  	levelaction = 'biggner';
				  	//alert(post_id + user_id);
				  } else if($clicked_btn.hasClass('btn-success')){
				  	levelaction = 'unbiggner';
				  }
				  $.ajax({
				  	//url: 'single-activity.php',
				  	type: 'post',
				  	data: {
				  		'levelaction': levelaction,
				  		'post_id': post_id,
				  		'user_id': user_id
				  	},
				  	success: function(data){
				  		res = JSON.parse(data);
				  		if (levelaction == "biggner") {
				  			$clicked_btn.removeClass('btn-default');
				  			$clicked_btn.addClass('btn-success');
				  		} else if(levelaction == "unbiggner") {
				  			$clicked_btn.removeClass('btn-success');
				  			$clicked_btn.addClass('btn-default');
				  		}
				  		// display the number of likes and dislikes
				  		$clicked_btn.siblings('span.biggners').text(res.biggners);
				  		$clicked_btn.siblings('span.inters').text(res.inters);
				  		$clicked_btn.siblings('span.advances').text(res.advances);

				  		// change button styling of the other button if user is reacting the second time to post
				  		$clicked_btn.siblings('i.btn-warning').removeClass('btn-warning').addClass('btn-default');
				  		$clicked_btn.siblings('i.btn-danger').removeClass('btn-danger').addClass('btn-default');
				  	} //succc
				  });//ajax
});//end pf beggg


								$('.inter-btn').on('click', function(){
									var user_id = $(this).data('userid');
									var post_id = $(this).data('postid');
									$clicked_btn = $(this);
									if ($clicked_btn.hasClass('btn-default')) {
										levelaction = 'inter';
									} else if($clicked_btn.hasClass('btn-warning')){
										levelaction = 'uninter';
									}
									$.ajax({
					  	//url: 'index.php',
					  	type: 'post',
					  	data: {
					  		'levelaction': levelaction,
					  		'post_id': post_id,
					  		'user_id': user_id
					  	},
					  	success: function(data){
					  		res = JSON.parse(data);
					  		if (levelaction == "inter") {
					  			$clicked_btn.removeClass('btn-default');
					  			$clicked_btn.addClass('btn-warning');
					  		} else if(levelaction == "uninter") {
					  			$clicked_btn.removeClass('btn-warning');
					  			$clicked_btn.addClass('btn-default');
					  		}
					  		// display the number of likes and dislikes
					  		$clicked_btn.siblings('span.biggners').text(res.biggners);
					  		$clicked_btn.siblings('span.inters').text(res.inters);
					  		$clicked_btn.siblings('span.advances').text(res.advances);

					  		// change button styling of the other button if user is reacting the second time to post
					  		$clicked_btn.siblings('i.btn-success').removeClass('btn-success').addClass('btn-default');
					  		$clicked_btn.siblings('i.btn-danger').removeClass('btn-danger').addClass('btn-default');
					  	}
					  });

								});

								$('.advance-btn').on('click', function(){
									var user_id = $(this).data('userid');
									var post_id = $(this).data('postid');
									$clicked_btn = $(this);
									if ($clicked_btn.hasClass('btn-default')) {
										levelaction = 'advance';
									} else if($clicked_btn.hasClass('btn-danger')){
										levelaction = 'unadvance';
									}
									$.ajax({
					    //url: 'index.php',
					    type: 'post',
					    data: {
					    	'levelaction': levelaction,
					    	'post_id': post_id,
					    	'user_id': user_id
					    },
					    success: function(data){
					    	res = JSON.parse(data);
					    	if (levelaction == "advance") {
					    		$clicked_btn.removeClass('btn-default');
					    		$clicked_btn.addClass('btn-danger');
					    	} else if(levelaction == "unadvance") {
					    		$clicked_btn.removeClass('btn-danger');
					    		$clicked_btn.addClass('btn-default');
					    	}
					      // display the number of likes and dislikes
					      $clicked_btn.siblings('span.biggners').text(res.biggners);
					      $clicked_btn.siblings('span.inters').text(res.inters);
					      $clicked_btn.siblings('span.advances').text(res.advances);

					      // change button styling of the other button if user is reacting the second time to post
					      $clicked_btn.siblings('i.btn-success').removeClass('btn-success').addClass('btn-default');
					      $clicked_btn.siblings('i.btn-warning').removeClass('btn-warning').addClass('btn-default');
					  }
					});

								});


								/****************** TIME */

// ifless than one hour
$('.lessone-btn').on('click', function(){
					//alert("sdfa");
					var user_id = $(this).data('userid');
					var post_id = $(this).data('postid');
				  //alert(post_id + user_id);
				  $clicked_btn = $(this);
				  
				  if ($clicked_btn.hasClass('btn-default')) {
				  	timeaction = 'biggner';
				  	//alert(post_id + user_id);
				  } else if($clicked_btn.hasClass('btn-success')){
				  	timeaction = 'unbiggner';
				  }
				  
//alert(timeaction);
$.ajax({
				  	//url: 'single-activity.php',
				  	type: 'post',
				  	data: {
				  		'timeaction': timeaction,
				  		'post_id': post_id,
				  		'user_id': user_id
				  	},
				  	success: function(data){
				  		res = JSON.parse(data);
				  		if (timeaction == "biggner") {
				  			$clicked_btn.removeClass('btn-default');
				  			$clicked_btn.addClass('btn-success');
				  		} else if(timeaction == "unbiggner") {
				  			$clicked_btn.removeClass('btn-success');
				  			$clicked_btn.addClass('btn-default');
				  		}
				  		// display the number of likes and dislikes
				  		$clicked_btn.siblings('span.lessone').text(res.lessone);
				  		$clicked_btn.siblings('span.onetotwo').text(res.onetotwo);
				  		$clicked_btn.siblings('span.moretwo').text(res.moretwo);

				  		// change button styling of the other button if user is reacting the second time to post
				  		$clicked_btn.siblings('i.btn-warning').removeClass('btn-warning').addClass('btn-default');
				  		$clicked_btn.siblings('i.btn-danger').removeClass('btn-danger').addClass('btn-default');
				  	}
				  });
});

///////////////////////////////////////////////////////////////////////////////////////////////////
$('.onetotwo-btn').on('click', function(){
	var user_id = $(this).data('userid');
	var post_id = $(this).data('postid');
	$clicked_btn = $(this);
	if ($clicked_btn.hasClass('btn-default')) {
		timeaction = 'inter';
	} else if($clicked_btn.hasClass('btn-warning')){
		timeaction = 'uninter';
	}
	$.ajax({
					  	//url: 'index.php',
					  	type: 'post',
					  	data: {
					  		'timeaction': timeaction,
					  		'post_id': post_id,
					  		'user_id': user_id
					  	},
					  	success: function(data){
					  		res = JSON.parse(data);
					  		if (timeaction == "inter") {
					  			$clicked_btn.removeClass('btn-default');
					  			$clicked_btn.addClass('btn-warning');
					  		} else if(timeaction == "uninter") {
					  			$clicked_btn.removeClass('btn-warning');
					  			$clicked_btn.addClass('btn-default');
					  		}
					  		// display the number of likes and dislikes
					  		$clicked_btn.siblings('span.lessone').text(res.lessone);
					  		$clicked_btn.siblings('span.onetotwo').text(res.onetotwo);
					  		$clicked_btn.siblings('span.moretwo').text(res.moretwo);

					  		// change button styling of the other button if user is reacting the second time to post
					  		$clicked_btn.siblings('i.btn-success').removeClass('btn-success').addClass('btn-default');
					  		$clicked_btn.siblings('i.btn-danger').removeClass('btn-danger').addClass('btn-default');
					  	}
					  });

});
//////////////////////////////////////////////////////////////////////////////////////////////////
$('.moretwo-btn').on('click', function(){
					//alert("I am");
					var user_id = $(this).data('userid');
					var post_id = $(this).data('postid');
					$clicked_btn = $(this);
					if ($clicked_btn.hasClass('btn-default')) {
						timeaction = 'advance';
					} else if($clicked_btn.hasClass('btn-danger')){
						timeaction = 'unadvance';
					}
					$.ajax({
					    //url: 'index.php',
					    type: 'post',
					    data: {
					    	'timeaction': timeaction,
					    	'post_id': post_id,
					    	'user_id': user_id
					    },
					    success: function(data){
					    	res = JSON.parse(data);
					    	if (timeaction == "advance") {
					    		$clicked_btn.removeClass('btn-default');
					    		$clicked_btn.addClass('btn-danger');
					    	} else if(timeaction == "unadvance") {
					    		$clicked_btn.removeClass('btn-danger');
					    		$clicked_btn.addClass('btn-default');
					    	}
					      // display the number of likes and dislikes
					      $clicked_btn.siblings('span.lessone').text(res.lessone);
					      $clicked_btn.siblings('span.onetotwo').text(res.onetotwo);
					      $clicked_btn.siblings('span.moretwo').text(res.moretwo);

					      // change button styling of the other button if user is reacting the second time to post
					      $clicked_btn.siblings('i.btn-success').removeClass('btn-success').addClass('btn-default');
					      $clicked_btn.siblings('i.btn-warning').removeClass('btn-warning').addClass('btn-default');
					  }
					});

				});



$('.agebignner-btn').on('click', function(){
	var user_id = $(this).data('userid');
	var post_id = $(this).data('postid');
				  //alert(post_id + user_id);
				  $clicked_btn = $(this);
				  if ($clicked_btn.hasClass('btn-default')) {
				  	ageaction = 'biggner';
				  	//alert(post_id + user_id);
				  } else if($clicked_btn.hasClass('btn-success')){
				  	ageaction = 'unbiggner';
				  }
				  $.ajax({
				  	//url: 'single-activity.php',
				  	type: 'post',
				  	data: {
				  		'ageaction': ageaction,
				  		'post_id': post_id,
				  		'user_id': user_id
				  	},
				  	success: function(data){
				  		res = JSON.parse(data);
				  		if (ageaction == "biggner") {
				  			$clicked_btn.removeClass('btn-default');
				  			$clicked_btn.addClass('btn-success');
				  		} else if(ageaction == "unbiggner") {
				  			$clicked_btn.removeClass('btn-success');
				  			$clicked_btn.addClass('btn-default');
				  		}
				  		// display the number of likes and dislikes
				  		$clicked_btn.siblings('span.agebiggner').text(res.agebiggner);
				  		$clicked_btn.siblings('span.ageinter').text(res.ageinter);
				  		$clicked_btn.siblings('span.ageadvance').text(res.ageadvance);

				  		// change button styling of the other button if user is reacting the second time to post
				  		$clicked_btn.siblings('i.btn-warning').removeClass('btn-warning').addClass('btn-default');
				  		$clicked_btn.siblings('i.btn-danger').removeClass('btn-danger').addClass('btn-default');
				  	}
				  });
				});

///////////////////////////////////////////////////////////////////////////////////////////////////
$('.ageinter-btn').on('click', function(){
	var user_id = $(this).data('userid');
	var post_id = $(this).data('postid');
	$clicked_btn = $(this);
	if ($clicked_btn.hasClass('btn-default')) {
		ageaction = 'inter';
	} else if($clicked_btn.hasClass('btn-warning')){
		ageaction = 'uninter';
	}
	$.ajax({
					  	//url: 'index.php',
					  	type: 'post',
					  	data: {
					  		'ageaction': ageaction,
					  		'post_id': post_id,
					  		'user_id': user_id
					  	},
					  	success: function(data){
					  		res = JSON.parse(data);
					  		if (ageaction == "inter") {
					  			$clicked_btn.removeClass('btn-default');
					  			$clicked_btn.addClass('btn-warning');
					  		} else if(ageaction == "uninter") {
					  			$clicked_btn.removeClass('btn-warning');
					  			$clicked_btn.addClass('btn-default');
					  		}
					  		// display the number of likes and dislikes
					  		$clicked_btn.siblings('span.agebiggner').text(res.agebiggner);
					  		$clicked_btn.siblings('span.ageinter').text(res.ageinter);
					  		$clicked_btn.siblings('span.ageadvance').text(res.ageadvance);

					  		// change button styling of the other button if user is reacting the second time to post
					  		$clicked_btn.siblings('i.btn-success').removeClass('btn-success').addClass('btn-default');
					  		$clicked_btn.siblings('i.btn-danger').removeClass('btn-danger').addClass('btn-default');
					  	}
					  });

});
//////////////////////////////////////////////////////////////////////////////////////////////////
$('.ageadvance-btn').on('click', function(){
	var user_id = $(this).data('userid');
	var post_id = $(this).data('postid');
	$clicked_btn = $(this);
	if ($clicked_btn.hasClass('btn-default')) {
		ageaction = 'advance';
	} else if($clicked_btn.hasClass('btn-danger')){
		ageaction = 'unadvance';
	}
	$.ajax({
					    //url: 'index.php',
					    type: 'post',
					    data: {
					    	'ageaction': ageaction,
					    	'post_id': post_id,
					    	'user_id': user_id
					    },
					    success: function(data){
					    	res = JSON.parse(data);
					    	if (ageaction == "advance") {
					    		$clicked_btn.removeClass('btn-default');
					    		$clicked_btn.addClass('btn-danger');
					    	} else if(ageaction == "unadvance") {
					    		$clicked_btn.removeClass('btn-danger');
					    		$clicked_btn.addClass('btn-default');
					    	}
					      // display the number of likes and dislikes
					      $clicked_btn.siblings('span.agebiggner').text(res.agebiggner);
					      $clicked_btn.siblings('span.ageinter').text(res.ageinter);
					      $clicked_btn.siblings('span.ageadvance').text(res.ageadvance);

					      // change button styling of the other button if user is reacting the second time to post
					      $clicked_btn.siblings('i.btn-success').removeClass('btn-success').addClass('btn-default');
					      $clicked_btn.siblings('i.btn-warning').removeClass('btn-warning').addClass('btn-default');
					  }
					});

});


});						</script>

</div>



	<?php 
	$next_post = get_next_post(); ?>
	<?php
		
		if (!empty( $next_post )): ?>
			?>
			<hr>
<div class="card-header border-0 py-3 d-flex align-items-center my-3">

	<img src="<?php echo get_field('featured_image', $next_post->ID); ?> " style="width:64px;" class="align-self-start mr-3">
	<div>
		<h4 class="intro-title mb-0" style="color:#9AA5B1;">Next activity</h4>
		<h6 class="intro-steam"></h6>

		

			<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>"
				"><?php echo esc_attr( $next_post->post_title ); ?></a>
		
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

