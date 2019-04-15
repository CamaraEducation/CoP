<?php get_header("home"); ?>
<?php
$errorMSG = "ssssssss ssssss";

?>

<form id="registration_form" action="" method="POST">
	<div class="alert alert-danger display-error" style="display: none"> 
</div>

<fieldset>
<p>
<label for="pippin_user_Login"><?php _e('Username'); ?></label>
<input name="pippin_user_login" id="pippin_user_login" class="required" type="text"/>
</p>

</fieldset>

<input type="submit" id="submit" value="Register Your Account"/>
</p>
</fieldset>
</form>



<script type="text/javascript">
  $(document).ready(function() {


      $('#submit').click(function(e){
        e.preventDefault();

var formData = $('').serialize();
console.log(formData);

$.ajax({
	//url:'process.php",
	method:'post',
	data: formData +'&action=rsfd'

}).done(function(result){

  $(".display-error").html("<ul>ssss</ul>");
  $(".display-error").css("display","block");

        });


     });

       });

</script>