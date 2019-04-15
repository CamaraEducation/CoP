<?php get_header("home");?>


<?php


        $user_login     = $_POST["pippin_user_login"];  
        $user_email     = $_POST["pippin_user_email"];
        $user_first     = $_POST["pippin_user_first"];
        $user_last      = $_POST["pippin_user_last"];
        $user_pass      = $_POST["pippin_user_pass"];
        $pass_confirm   = $_POST["pippin_user_pass_confirm"];





if (isset( $_POST["submit"] )) {

Echo "I am submiting" . $user_login;

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
            if($new_user_id) {
                // send an email to the admin alerting them of the registration
                wp_new_user_notification($new_user_id);
 
                // log the new user in
                wp_setcookie($user_login, $user_pass, true);
                wp_set_current_user($new_user_id, $user_login);   
                do_action('wp_login', $user_login);
 
                // send the newly created user to the home page after logging them in
                wp_redirect(home_url()); exit;
            }

}else {
    ?>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form id="msform" action="" method="POST">
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active"></li>
                <li></li>
                <li></li>
                 <li></li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">More About you </h2>
                <h3 class="fs-subtitle">Tell us something more about you</h3>
                Job Role <input type="text" name="fname" placeholder="Job Role"/>
                Organization <input type="text" name="lname" placeholder="Organization"/>
         
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            
            <fieldset>
                <h2 class="fs-title">Which best describe you?</h2>
                <h3 class="fs-subtitle">Please tell us</h3>

<div class="custom-control custom-radio">
  <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
  <label class="custom-control-label" for="customRadio1">Toggle this custom radio</label>
</div>
<div class="custom-control custom-radio">
  <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
  <label class="custom-control-label" for="customRadio2">Or toggle  other custom radio</label>
</div>
<div class="custom-control custom-radio">
  <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
  <label class="custom-control-label" for="customRadio2">Or toggle  other custom radio</label>
</div>
<div class="custom-control custom-radio">
  <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
  <label class="custom-control-label" for="customRadio2">Or toggle  other custom radio</label>
</div>

           <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">I have of will complete the follow trainin in</h2>
                <h3 class="fs-subtitle">Fill in your credentials</h3>


<div class="custom-control custom-radio22">
  <input type="radio" id="customRadio10" name="customRadio" class="custom-control-input">
  <label class="custom-control-label" for="customRadio10">Toggle this custom radio</label>
</div>
<div class="custom-control custom-radio22">
  <input type="radio" id="customRadio11" name="customRadio" class="custom-control-input">
  <label class="custom-control-label" for="customRadio11">Or toggle  other custom radio</label>
</div>

                
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="submit" name="submit" class="submit action-button" value="Submit"/>
            </fieldset>
        </form>
        
    </div>
</div>

<?php }//end if ?>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

<script src="<?php echo get_template_directory_uri();?>/js/msform.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>