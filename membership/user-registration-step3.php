<?php 

get_header("home"); 
//svar_dump($_POST);
if(isset($_POST['submit'])){

/// ====1===
$user_login   = $_POST["user_username"];  
$user_email   = $_POST["user_email"];
$user_first   = $_POST["user_fname"];
$user_last    = $_POST["user_lname"];
$user_pass    = $_POST["user_pass"];

/// ====2===
$user_jobrole   = $_POST["user_jobrole"];
$user_org    = $_POST["user_org"];

/// ====3===
$user_communityrole    = $_POST["user_communityrole"];


/// ====4===
$user_pathway    = $_POST["user_pathway"];



$new_user_id = wp_insert_user(array(
                    'user_login'        => $user_login,
                    'user_pass'         => $user_pass,
                    'user_email'        => $user_email,
                    'first_name'        => $user_first,
                    'last_name'         => $user_last,
                    'user_registered'   => date('Y-m-d H:i:s'),
                    'role'              => 'subscriber'
                )
            );


global $wpdb; //removed $name and $description there is no need to assign them to a global variable
      $table_name = $wpdb->prefix . "usermeta"; //try not using Uppercase letters or blank spaces when naming db tables
      //$query = $wpdb->prepare("SELECT * FROM {$wpdb->posts} WHERE post_type = %s", $

//$query= $wpdb->prepare("UPDATE $table_name SET meta_value = 'awaiting_admin_review' WHERE user_id= $new_user_id && meta_key = 'account_status'",$new_user_id);

//$results = $wpdb->get_results( $query );


/** MEMBER ORGANIZATION */
      $wpdb->insert($table_name, 
                            array('user_id' => $new_user_id, 
                                'meta_key' => 'member_organization',
                                'meta_value' => '3'
                                ));



/** MEMBER JOB ROLE */
      $wpdb->insert($table_name, 
                            array('user_id' => $new_user_id, 
                                'meta_key' => 'member_jobrole',
                                'meta_value' => 'I am the boss'
                                ));

/** community Role */
$wpdb->insert($table_name, 
                            array('user_id' => $new_user_id, 
                                'meta_key' => 'member_community_role',
                                'meta_value' => '9'
                                ));


/** path way */
$wpdb->insert($table_name, 
                            array('user_id' => $new_user_id, 
                                'meta_key' => 'memberPathway',
                                'meta_value' => '2'
                                ));



  //* also set the account review */                         
    $wpdb->insert($table_name, 
                            array('user_id' => $new_user_id, 
                                'meta_key' => 'account_status',
                                'meta_value' => 'awaiting_admin_review'
                                ));

if($new_user_id) {
                // send an email to the admin alerting them of the registration
                wp_new_user_notification($new_user_id);
 
                // log the new user in
             //   wp_setcookie($user_login, $user_pass, true);
               // wp_set_current_user($new_user_id, $user_login); 
                //do_action('wp_login', $user_login);
 
                // send the newly created user to the home page after logging them in
                //wp_redirect(home_url()); exit;
                echo "user created !";
            }

}else {

?>
<div class="row formsteps">
    <div class="col-md-9 col-md-offset-3">
        <form id="msform" action="" method="POST">

<div class="alert alert-danger display-error" style="display: none"> 
</div>

            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active"></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">Community Sign up </h2>
                <h3 class="fs-subtitle">Tell us something more about you</h3>
                                First Name <input type="text" name="user_username" placeholder="Username"/>

                First Name <input type="text" name="user_fname" placeholder="First Name"/>

        <span class="error">This field is required</span>

                Last Name <input type="text" name="user_lname" placeholder="Last Name"/>
                Email  <input type="text" name="user_email" placeholder="Email"/>
               Password  <input type="text" name="user_pass" placeholder="Password"/>
               Password Confirm  <input type="text" name="user_pass_confirm" placeholder="Confirm Password"/>
               
                <input type="submit" name="submit" class="submit signin-button" value="Submit"/>
</fieldset>

<fieldset>
                <h2 class="fs-title">More About You</h2>
                <h3 class="fs-subtitle">Please tell us</h3>

Job Role <input type="text" name="user_jobrole" id="user_jobrole" placeholder="Job Role"/>
Organization <input type="text" name="user_org" id="user_org" placeholder="Last Name"/>
             
             <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
             <input type="button" name="next" class="next action-button" value="Next"/>
</fieldset>


<fieldset>
                <h2 class="fs-title">Which best describe you?</h2>
                <h3 class="fs-subtitle">Please tell us</h3>

<!-- Default unchecked -->
<div class="custom-control custom-radio">
  <input type="radio" class="custom-control-input" id="Educator" name="user_communityrole">
  <label class="custom-control-label" >Educator</label>
</div>

<div class="custom-control custom-radio">
  <input type="radio" class="custom-control-input" id="Cluset Coordinator" name="user_communityrole">
  <label class="custom-control-label" >Cluset Coordinator</label>
</div>

<div class="custom-control custom-radio">
  <input type="radio" class="custom-control-input" id="Youth" name="user_communityrole">
  <label class="custom-control-label" >Digital Youth Specialist</label>
</div>


<div class="custom-control custom-radio">
  <input type="radio" class="custom-control-input" id="Youth Officer" name="user_communityrole">
  <label class="custom-control-label" >Youth Officer</label>
</div>

             <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
             <input type="button" name="next" class="next action-button" value="Next"/>
</fieldset>

 
         <fieldset>
                <h2 class="fs-title">I have of will complete the follow trainin in</h2>
                <h3 class="fs-subtitle">Fill in your credentials</h3>





<div class="custom-control custom-radio">
  <input type="radio" class="custom-control-input" id="user_pathway" name="user_pathway">
  <label class="custom-control-label" >STEM</label>
</div>

<div class="custom-control custom-radio">
  <input type="radio" class="custom-control-input" id="user_pathway" name="user_pathway">
  <label class="custom-control-label" >Digital sdsdsf</label>
</div>



                
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="submit" name="submit" class="submit submitform" value="Submit"/>
            </fieldset>  
        </form>
    </div>
</div>

<?php 
}//end of if
?>