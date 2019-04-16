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
		<h1 class="headtitle" style="font-family: Lato; font-style: normal; font-weight: bold; font-size: 38px; line-height: 24px; float: left;"><?php echo the_title();?></h1>
				
				
<span class="badge badge-info" style="padding-left:10px;padding-right:10px;padding-top:5px;padding-bottom:5px;border-radius: 24px!important;margin-left: 20px;font-size:34;border: 1px solid <?php echo $current_pathway_color;?>;color:<?php echo $current_pathway_color;?>;background-color:#ffffff"> 
<?php echo getPostTerms($post->ID,'topic'); ?></span>

			<hr>
		</div>




<div class="container mb-3">
			<ul class="nav">
				<li class="nav-item">
				
<!--LEVEL -->
<?php $leveltype = getPostTerms($post->ID,'level');
if($leveltype = "Beginner"){}elseif ($leveltype= "Intermediate") {
	# code...
}elseif ($leveltype="Advance" ) {
	# code...
} ?>
<?php echo "$leveltype";?>
<img src="<?php echo get_template_directory_uri();  ?>/images/level.png" class="img-responsive" with="10px"  alt="COP">
<?php 
$s = getPostTerms($post->ID,'level');
echo  $s;
if($s = "Beginner"){}elseif ($s= "Intermediate") {
	# code...
}elseif ($s="Advance" ) {
	# code...
} 
?>
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
	
	<div class="card my-3" style="background-color: #fff; border-radius: 10px; height: 138px;padding:25px;">
						<H6> SKILLS & COMPETENCIES </H6> 
			
			
<?php
							$term_list = wp_get_post_terms($post->ID, "skills_and_competencies",array("fields" => "all"));
							foreach($term_list as $term_single) {
							echo "<li>" . $term_single->name . "</li>" ;//do something here
							}
							?>



</div>

				<?php if (get_field('logic_model') != "") { ?>

					<div class="card my-3" style="background-color: #fff; border-radius: 10px; height: 78px;">
						<div class="card-header border-0  d-flex align-items-center" style="background-color: #ffffff;">
							<img src="<?php echo get_template_directory_uri(); ?>/images/logicModel.png" class="rounded-circle align-self-start mr-3" width="39" height="39">
							<div>
								<h6 class="intro-steam"> 
							<a href="<?php the_field('logic_model'); ?>" target="new">	Logic Model </a>
							</h6>
							</div>
						</div>
					</div>
<?php } ?>

<?php if (get_field('equipment_list')) { ?>
					<div class="card my-3" style="background-color: #fff; border-radius: 10px; height: 78px;">
						<div class="card-header border-0  d-flex align-items-center" style="background-color: #ffffff;">
							<img src="<?php echo get_template_directory_uri(); ?>/images/equipmentList.png" class="rounded-circle align-self-start mr-3" width="39" height="39">
							<div>
								<h6 class="intro-steam">
<a href="<?php the_field('equipment_list'); ?>" target="new">
								Buy Equipment
</a>
							</h6>
							</div>
						</div>
					</div>
<?php } ?>

<?php if (get_field('sample_session_plan')) { ?>
					<div class="card my-3" style="background-color: #fff; border-radius: 10px; height: 78px;">
						<div class="card-header border-0  d-flex align-items-center" style="background-color: #ffffff;">
							<img src="<?php echo get_template_directory_uri(); ?>/images/sampleSession.png" class="rounded-circle align-self-start mr-3" width="39" height="39">
							<div>
								<h6 class="intro-steam">
<a href="<?php the_field('sample_session_plan'); ?>" target="new">
									Sample Session Plan
</a>
								</h6>
							</div>
						</div>
					</div>
<?php } ?>

<?php if (get_field('further_learning_resources')) { ?>
					<div class="card my-3" style="background-color: #fff; border-radius: 10px; height: 78px;">
						<div class="card-header border-0  d-flex align-items-center" style="background-color: #ffffff;">
							<img src="<?php echo get_template_directory_uri(); ?>/images/furtherReading.png" class="rounded-circle align-self-start mr-3" width="39" height="39">
							<div>
								<h6 class="intro-steam">
<a href="<?php the_field('further_learning_resources'); ?>" target="new">
								Further Learning Resources
</a>
							</h6>
							</div>
						</div>
					</div>

	<?php } ?>
				</div>
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
		<h6 class="intro-steam"> 
	<?php echo get_post_meta($post->ID, 'instructor_name', true); ?>
	@ 
<?php //echo get_post_meta($post->ID,'instructor_organization',true); ?>
<?php echo get_term_by('id', get_post_meta($post->ID,'instructor_organization',true), 'member_organization')->name; ?>
&nbsp;&nbsp;
 <span class="badge badge-primary">
 	<?php //echho get_post_meta($post->ID, 'instructor_role', true); ?>
	<?php echo get_term_by('id', get_post_meta($post->ID,'instructor_role',true), 'community_role')->name; ?>
</span></h6>
							</div>

						</div>


<div class="container">
							<hr>
							<p><b>ACTIVITY OVERVIEW</b></p>


<p>

<?php the_content(); ?>
</p>

</div>

</div>
					<div class="col-md-11" style="background-color: white; border-radius: 10px;padding:36px;margin-top:15px;">

   <p><b>ACTIVITY LEARNING OUTCOMES </b></p>

   <?php echo get_post_meta($post->ID, 'learning_outcomes', true); ?>
  
 
</div>

	
<div class="col-md-11" style="background-color: white; border-radius: 10px;padding:36px;margin-top:15px;">
	
	
	 	<b>Materials Needed</b></p>
<?php echo get_post_meta($post->ID, 'materials_needed', true); ?>



</div>

<div class="col-md-11" style="background-color: white; border-radius: 10px;padding:36px;margin-top:15px;">
	 <p><br><b>STEP-BY-STEP Instructions Instructions </b><br></p>


<?php echo get_post_meta($post->ID, 'step_by_step_guide', true); ?>
	
	
</div>

<div class="col-md-11" style="background-color: white; border-radius: 10px;padding:36px;margin-top:15px;">
	 <p><br><b>FURTHER RESOURCES & INSTRUCTIONS </b><br></p>


</div>


<!--- new sectin -->
</div>
<div class="col-md-4 my-2">
					<p class="desc-text">A step-by-step PDF guide for your group to follow</p>
					<a href="<?php the_field('step_by_step_guide_doc'); ?>">
					<button type="button" class="btn btn-outline-warning my-2"  style="border: 2px solid #EE603B;box-sizing: border-box;box-shadow: 0px 5px 15px rgba(25, 70, 93, 0.05);border-radius: 100px;font-family: Lato;font-style: normal;font-weight: bold font-size: 12px;line-height: 24px;color: #EE603B;">Download Guide</button>
				</a>
					<hr>
					<div class="card" style="background: #F5F7FA;border: 1px solid rgba(0, 0, 0, 0.1);box-sizing: border-box;border-radius: 10px;">
						<div class="card-body">
							<h6 class="box-text12 mb-2 text-muted">Support</h6>
							<p class="box-text12">TechSpace project officers are here to help with all your queries with the activities. Have a question?No problem! Reach out and we will help you.</p>
							<hr>
							<p class="box-text-link">
								<img src="<?php echo get_template_directory_uri();  ?>/images/askExpert.png" class="rounded-circle z-depth-0 md-avatar" alt="Start a Chat Session">
								Ask an Expert (Start a Chat Session)
							</p>
						</div>
					</div>
					<hr>
<div class="card">
						<div class="card-header" style="background-color: white;height:70px;">
							<br>
							<b class="box-text12" style="font-weight:bold;">Activity Feedback for the Community</b>

						</div>
<div style="padding:25px">

	<p><b>SATISFACTION</b></p>
								<p>How did you find this activity with the young people?</p>

						 	
 <?php
                                                  global $current_user;
                                                  get_currentuserinfo();
                                                  $postid = get_the_ID();
                                                  $username = $current_user->user_login;
                                                  $userid = $current_user->ID;
                                                  //echo $postid;
                                                  //echo $userid;
                                                  //echo $username;

                                                ?>


<div class="btn-group">
<?php
$valu = $wpdb->get_var( "SELECT satsfaction FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );

$sad = $wpdb->get_var( "SELECT sum(satsfaction = 1) FROM ".$wpdb->prefix."feedback WHERE post_id = $postid " );
$happy = $wpdb->get_var( "SELECT sum(satsfaction = 2) FROM ".$wpdb->prefix."feedback WHERE post_id = $postid " );
$excited = $wpdb->get_var( "SELECT sum(satsfaction = 3) FROM ".$wpdb->prefix."feedback WHERE post_id = $postid " );
								 ?>

<!-- if user sad post, style button differently -->
<i style="font-size: 2em; color: Red"<?php if (userDisliked($userid, $postid)): ?> class="fas fa-frown dislike-btn" <?php else: ?> class="far fa-frown dislike-btn"<?php endif ?> data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>"></i>
&nbsp;&nbsp;&nbsp;&nbsp;
	 <span class="dislikes"><?php echo $sad; ?></span>

					          &nbsp;&nbsp;&nbsp;&nbsp;
		<i style="font-size: 2em; color: Orange"<?php if (userLiked($userid, $postid)): ?>
					      		  class="fas fa-meh like-btn" 
					      	  <?php else: ?>
					      		  class="far fa-meh like-btn"
					      	  <?php endif ?>
					      	 data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>"></i>
					    &nbsp;&nbsp;&nbsp;&nbsp;
					      	<span class="likes"><?php echo $happy; ?></span>
					          &nbsp;&nbsp;&nbsp;&nbsp;

					          <i style="font-size: 2em; color: Green"<?php if (userExcited($userid, $postid)): ?>
					            class="fas fa-smile excite-btn"
					          <?php else: ?>
					            class="far fa-smile excite-btn"
					          <?php endif ?>
					          data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>"></i>
					          &nbsp;&nbsp;&nbsp;&nbsp;
							<span class="excites"><?php echo $excited; ?></span>
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
	          <span class="biggners btn alert-success disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;">><?php echo getBiggner($postid); ?></span>

&nbsp;&nbsp;&nbsp;
	          <i <?php if (userInter($userid, $postid)): ?>
	      		  class="btn btn-warning inter-btn btn-sm"
	      	  <?php else: ?>
	      		  class="btn btn-default inter-btn btn-sm"
	      	  <?php endif ?>
	      	 data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>" style="font-size:12px;border:1px;padding:5px;margin-top:5px;">intermidiate</i>
	      	<span class="inters btn alert-warning disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;">><?php echo getInter($postid); ?></span>
	          
&nbsp;&nbsp;&nbsp;
	          <i <?php if (userAdvance($userid, $postid)): ?>
	            class="btn btn-danger advance-btn btn-sm"
	          <?php else: ?>
	            class="btn btn-default advance-btn btn-sm"
	          <?php endif ?>
	          data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>" style="font-size:12px;border:1px;padding:5px;margin-top:5px;">advanced</i>
			<span class="advances btn alert-danger disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"><?php echo getAdvance($postid); ?></span>
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
	          <span class="lessone btn alert-success disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"><?php  echo getLessOne($postid); ?></span>

&nbsp;&nbsp;&nbsp;
	          <i <?php if (userOneToTwo($userid, $postid)): ?>
	      		  class="btn btn-warning onetotwo-btn btn-sm"
	      	  <?php else: ?>
	      		  class="btn btn-default onetotwo-btn btn-sm"
	      	  <?php endif ?>
	      	 data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>" style="font-size:12px;border:1px;padding:5px;margin-top:5px;">1 - 2 hours</i>
	      	<span class="onetotwo btn alert-warning disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"><?php echo getOneToTwo($postid); ?></span>
	          
&nbsp;&nbsp;&nbsp;
	          <i <?php if (userMoreTwo($userid, $postid)): ?>
	            class="btn btn-danger moretwo-btn btn-sm"
	          <?php else: ?>
	            class="btn btn-default moretwo-btn btn-sm"
	          <?php endif ?>
	          data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"> >2 hours</i>
			<span class="moretwo btn alert-danger disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"><?php echo getMoreTwo($postid); ?></span>
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
	          <span class="agebiggner btn alert-success disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"><?php  echo getBiggnerAge($postid); ?></span>
&nbsp;&nbsp;&nbsp;
	          <i <?php if (userInterAge($userid, $postid)): ?>
	      		  class="btn btn-warning ageinter-btn btn-sm"
	      	  <?php else: ?>
	      		  class="btn btn-default ageinter-btn btn-sm"
	      	  <?php endif ?>
	      	 data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>" style="font-size:12px;border:1px;padding:5px;margin-top:5px;">Intermediate</i>
	      	<span class="ageinter btn alert-warning disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"><?php echo getInterAge($postid); ?></span>
	          
&nbsp;&nbsp;&nbsp;
	          <i <?php if (userAdvanceAge($userid, $postid)): ?>
	            class="btn btn-danger ageadvance-btn btn-sm"
	          <?php else: ?>
	            class="btn btn-default ageadvance-btn btn-sm"
	          <?php endif ?>
	          data-userid="<?php echo $userid ?>" data-postid="<?php echo $postid ?>" style="font-size:12px;border:1px;padding:5px;margin-top:5px;">Advanced</i>
			<span class="ageadvance btn alert-danger disabled" style="font-size:12px;border:1px;padding:5px;margin-top:5px;"><?php echo getAdvanceAge($postid); ?></span>
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


						<hr>
						<div class="card-header border-0 py-3 d-flex align-items-center my-3">
							<img src="<?php echo get_template_directory_uri();  ?>/images/activity.png" class="align-self-start mr-3">
							<div>
								<h4 class="intro-title mb-0" style="color:#9AA5B1;">Next activity</h4>
								<h6 class="intro-steam"></h6>

						<?php
$next_post = get_next_post();
if (!empty( $next_post )): ?>
  <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>"><?php echo esc_attr( $next_post->post_title ); ?></a>
<?php endif; ?>
				</h6>			</div>

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
								<div class="card-header border-0 py-3 d-flex align-items-center my-3" style="background-color: #ffffff;">
									<img src="<?php echo get_avatar_url($current_user->ID); ?>" class="rounded-circle align-self-start mr-3">
									<div>

<?php
// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
?>
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


