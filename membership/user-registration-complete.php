

	<div class="col-md-5 offset-md-3">

<?php
if($_SESSION['account_created'] =="YES"){

?>

<div class="card" style="background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 8px;border-width:0px;">
<div class="card-body" style="padding:10%;">



<div class="row">

<div class="col-md-4" style="align-items:center;">

<img src="<?php echo get_template_directory_uri(); ?>/images/EmergingTechnologies.png"> 

</div>


<div class="col-md-6" style="align-items:center;margin-left:10px;">

<h4 style="font-size:24px;"> Thank you for Signing up for the 
TechSpace Online Network.  </h4>
<p style="margin-top:12px;">
Your account is pending approval. This can take up to 72 hours. Your will receive an email when it is activated. 
 </p>


 <a href="<?php echo get_home_url();?>">
<button type="button"  class="land-btn land-btn-txt mt-2" style="background-color:#fff;color:#EE603B;margin-top:24px;">
Check Back Soon
</button>

</a>

</div>


</div>


</div>
</div>
<?php

}else {

?>

<div class="card" style="background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 8px;">
<div class="card-body" style="padding:10%;">

<h4> There is an error with your request. Please contact the site Administrator. </h4>

</div>
</div>
<?php

}

?>

</div>