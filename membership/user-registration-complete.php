

	<div class="col-md-5 offset-md-3">

<?php
if($_SESSION['account_created'] =="YES"){

?>

<div class="card" style="background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 8px;">
<div class="card-body" style="padding:10%;">

<h4> Thank you for signing up. Your account is pending review. Your will receive an email when it is activated. 
<a href="http://members.camaraireland.ie"> Click Here</a> to return to home.
 </h4>

</div>
</div>
<?php

}else {

?>

<div class="card" style="background: #FFFFFF;box-shadow: 0px 3px 5px rgba(25, 70, 93, 0.05);border-radius: 8px;">
<div class="card-body" style="padding:10%;">

<h4> There is some kind of error. </h4>

</div>
</div>
<?php

}

?>

</div>