
<nav class="navbar navbar-expand-lg">
<a class="navbar-brand" href="#"><img src="<?php echo get_template_directory_uri();  ?>/images/techspacelogo.png" class="img-responsive md-avatar size-2" alt="COP"></a>
	</nav>
<?php


if(isset($_POST['user_pathway'])){

//1
$member_username = $_POST["member_username"];
$member_fname = $_POST["member_fname"];
$member_lname = $_POST["member_lname"];
$member_email = $_POST["member_email"];
$member_password = $_POST["member_password"] ;
$member_18yearsold = $_POST["member_18yearsold"];

//2
$member_jobrole = $_POST['user_jobrole'];
$member_org = $_POST['user_org'];
$member_projectgroup = $_POST['user_projectgroup'];
$member_location = $_POST['user_location'];

//3
$member_communityrole = $_POST['user_communityrole'];

//4
$member_pathway = $_POST['user_pathway'];


//Start form submittions 
$new_user_id = wp_insert_user(array(
					'user_login'		=> $member_username,
					'user_pass'	 		=> $member_password,
					'user_email'		=> $member_email,
					'first_name'		=> $member_fname,
					'last_name'			=> $member_lname,
					'user_registered'	=> date('Y-m-d H:i:s'),
					'role'				=> 'subscriber'
				)
			);




if($new_user_id && !is_wp_error( $new_user_id )) {



global $wpdb; 
$table_name = $wpdb->prefix . "usermeta";


/** path way */
$wpdb->insert($table_name, 
                            array('user_id' => $new_user_id, 
                                'meta_key' => 'memberPathway',
                                'meta_value' => $member_pathway
                                ));
 
/** MEMBER ORGANIZATION */
      $wpdb->insert($table_name, 
                            array('user_id' => $new_user_id, 
                                'meta_key' => 'member_organization',
                                'meta_value' => $member_org
                                ));



/** MEMBER JOB ROLE */
      $wpdb->insert($table_name, 
                            array('user_id' => $new_user_id, 
                                'meta_key' => 'member_jobrole',
                                'meta_value' => $member_jobrole
                                ));

/** community Role */
$wpdb->insert($table_name, 
                            array('user_id' => $new_user_id, 
                                'meta_key' => 'member_community_role',
                                'meta_value' => $member_communityrole
                                ));

/** community PROJECT/GROUP*/
$wpdb->insert($table_name, 
                            array('user_id' => $new_user_id, 
                                'meta_key' => 'member_projectgroup',
                                'meta_value' => $member_projectgroup
                                ));


/** community location*/
$wpdb->insert($table_name, 
                            array('user_id' => $new_user_id, 
                                'meta_key' => 'member__community_location',
                                'meta_value' => $member_location
                                ));





  //* also set the account review */                         
    $wpdb->insert($table_name, 
                            array('user_id' => $new_user_id, 
                                'meta_key' => 'account_status',
                                'meta_value' => 'awaiting_admin_review'
                                ));


//* also set the account review */                         
    $wpdb->insert($table_name, 
                            array('user_id' => $new_user_id, 
                                'meta_key' => 'member_ageagreement',
                                'meta_value' => 'YES'
                                ));



// send an email to the admin alerting them of the registration
wp_new_user_notification($new_user_id);

$_SESSION['account_created']='YES';		

 get_template_part( 'membership/user-registration-complete', 'page' );
 

			}else {

				//there is some error creating your account 
$_SESSION['account_created']='NO';		

  get_template_part( 'membership/user-registration-complete', 'page' );

}



}else {

?>
<section>

<div class="col-md-5 offset-md-3">

<!-- progressbar -->
	<div class="text-center">		
            <ul id="progressbar">
                <li class="active"></li>
                <li></li>
                <li></li>

               
</ul>
</div>

<form method="POST" id="onboardingform">	





<input type="hidden" name="member_username" id="member_username" value="<?php echo $_POST['user_username'];?>">
<input type="hidden" name="member_fname" id="member_fname" value="<?php echo $_POST['user_fname'];?>">
<input type="hidden" name="member_lname" id="member_lname" value="<?php echo $_POST['user_lname'];?>">
<input type="hidden" name="member_email" id="member_email" value="<?php echo $_POST['user_email'];?>">
<input type="hidden" name="member_password" id="member_password" value="<?php echo $_POST['user_password'];?>">
<input type="hidden" name="member_18yearsold" id="member_18yearsold" value="<?php echo $_POST['user_18yearsold'];?>">



<div class="card" style="background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 8px;">
<div class="card-body" style="padding:10%;">

										
<fieldset>
										
				<h5 class="signup-title-txt" align="center">More About You</h5>


<br style="margin-top:20px;" />															
<label for="user_jobrole" class="signup-small-txt">Job Role</label>
<input type="text" class="form-control" id="user_jobrole" name="user_jobrole">
				


<br style="margin-top:20px;" />	
<label for="user_org" class="signup-small-txt">Organisation</label>
	<select class="form-control" id="user_org" name="user_org">
	<option> </option>
<?php
$terms = get_terms( array(
    'taxonomy' => 'member_organization',
    'hide_empty' => false,
) );

 foreach ( $terms as $term ) {
            echo '<option value="'.$term->term_id .'">'.$term->name .'</option>';
}
?>
</select>
										

												
<br style="margin-top:20px;" />	
<label for="user_projectgroup" class="signup-small-txt">Project/Group(Optional)</label>
<input type="text" class="form-control" id="user_projectgroup" name="user_projectgroup" placeholder="Tallaght Big Picture">


<br style="margin-top:20px;" />	
<label for="user_location" class="signup-small-txt">Location</label>
<select class="form-control" id="user_location" name="user_location">
<option> </option>															
<?php
$terms = get_terms( array(
    'taxonomy' => 'member_location',
    'hide_empty' => false,
) );

 foreach ( $terms as $term ) {
//echo "<option value=". $terms->terms .">" . $term->name . "</option>";
 echo '<option value="'.$term->term_id .'">'.$term->name .'</option>';
}
?>	
</select>
					
											

	<br style="margin-top:20px;" />	
<a href="" onclick="goBack()" class="back-link float-left mt-2">< Back</a>
 <input type="button" name="step1" class="float-right step1 action-button" value="NEXT" style="border: 2px solid #EE603B;box-sizing: border-box;box-shadow: 0px 5px 15px rgba(25, 70, 93, 0.05);border-radius: 100px;width: 161px;height: 48px;left: 771px;top: 749px;background-color:#ffffff;color:#EE603B"/>


</fieldset>



<fieldset>


<h5 class="signup-title-txt" align="center" style="margin-top:12px;">Which best describes you?</h5>
<p class="small tick-text" align="center">This will help us to define your community role on the online TechSpace Network <br>  Please select one only</p>
									
  
<?php
$terms = get_terms( array(
    'taxonomy' => 'community_role',
    'hide_empty' => false,
     'orderby' => 'term_id',
) );

 foreach ( $terms as $term ) {
?>
<div class="radio" style="padding-top: 24px;">
<input type="radio" name="user_communityrole" id="user_communityrole" value="<?php echo $term->term_id;?>"> 
<?php
echo (strcasecmp($term->name,'TechSpace Educator')==0 ? "I have or will complete a training with TechSpace " : " I am a ");
echo ($term->name == 'TechSpace Educator' ? "(" : "");

echo $term->name;
echo ($term->name == 'TechSpace Educator' ? ")" : "");
echo "</div>";
}
?>
  <span class="error" style="display: block;margin-top:12px; visibility: hidden;"> Please select a community role. </span>

											
													
													

	<br style="margin-top:20px;" />	
<span class="back-link float-left mt-2 previous action-button-previous">< Back</span>
 <input type="button" name="step2" class="float-right step2 action-button" value="NEXT" style="border: 2px solid #EE603B;box-sizing: border-box;box-shadow: 0px 5px 15px rgba(25, 70, 93, 0.05);border-radius: 100px;width: 161px;height: 48px;left: 771px;top: 749px;background-color:#ffffff;color:#EE603B"/>


         					

</fieldset>

<fieldset>								
								
<h5 class="signup-title-txt" align="center">I have or will complete training in...</h5>
<p class="small tick-text" align="center" style="margin-bottom: 30px;">If you have completed training in both areas please select your most recent</p>
				   <div style="width:100%;align-content: center;margin-left:10%;">
                  <div class="row">


							<?php
$terms = get_terms( array(
    'taxonomy' => 'pathway',
    'hide_empty' => false,
    'orderby'=> 'id',
) );

 foreach ( $terms as $term ) {
//echo "<option value=". $terms->terms .">" . $term->name . "</option>";
           // echo '<option value="'.$term->term_id .'">'.$term->name .'</option>';

?>
			
														
<div class="col-md-5">
    <?php
$imagePath = get_field('pathway_image', $term->taxonomy.'_'.$term->term_id);
    ?>
<img src="<?php echo $imagePath;?>" style="margin-top:12px;margin-bottom:12px;width:90px;">
<p>
<button type="submit" name="user_pathway"  class="btn btn-link user_pathway-training" value="<?php echo $term->term_id ?>" style="font-weight:bold;font-size:16px;" onMouseOver="this.style.color='<?php echo $_SESSION[$term->name];?>'"   onMouseOut="this.style.color=''">
<?php echo $term->name ?>    
</button>
</p>
 </div>




                     


													
<?php
}

?>
	</div>								
		</div>					
<br>
<span class="back-link float-left mt-2 previous action-button-previous" style="margin-top:48px;display:block;">< Back</span>
								
	</fieldset>
		



</div>
</div>
</div>


<?php
}
?>