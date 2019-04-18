jQuery(document).ready(function($) {


var current_fs, next_fs, previous_fs; //fieldsets



$('.onboarding-button').click(function(e){	
	e.preventDefault();
	alert("alsfasdf");



	$(this).parents().filter("form").submit()

//first NAME
if($('#user_fname').val().length == 0){
$('#user_fname').val('xxx');
$("#user_fname").css("background-color", "#FF0000");	
}


//first NAME
if($('#user_lname').val().length == 0){
$('#user_lname').val('xxx');
$("#user_lname").css("background-color", "#FF0000");	
}

var formvalues = {'action':'onboarding_ajax_request'};


$.ajax({
url: onboarding_ajax_obj.ajaxurl, // or example_ajax_obj.ajaxurl if using on frontend
type: 'POST',
data: formvalues,
success:function(result) {
alert(result);


},
error: function(errorThrown){
console.log(errorThrown);
}
});




}); 




//first name
$('#user_fname').click(function () {
    $("#user_fname").val('');
    $("#user_fname").css("background-color", "#FFFFFF");
});




}); 