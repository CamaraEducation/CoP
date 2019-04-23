var data = {};
$(document).ready(function() {



$('input[type="submit"]').on('click', function() {
resetErrors();

var formData = {'action':'onboarding_ajax_request'};
var x = $('#onboardingformstep').serializeArray();
//alert("a"+x);

jQuery.each(x, function(i, field){
    formData[field.name]=  field.value;
  });

$.ajax({
url: onboarding_ajax_obj.ajaxurl, // or example_ajax_obj.ajaxurl if using on frontend
type: 'POST',
cache: false,
dataType: 'JSON',
data: formData,

success: function(resp) {

//alert(Object.keys(resp).length);

if (Object.keys(resp).length ==0) {
//	alert("am here here?");
//successful validation



$('form').submit();


return false;

} else {
$.each(resp, function(i, v) {
console.log(i + " => " + v); // view in console for error messages
var msg = '<label class="error" for="'+i+'">'+v+'</label>';
$('input[name="' + i + '"], select[name="' + i + '"]').addClass('inputTxtError').after(msg);
});
var keys = Object.keys(resp);
$('input[name="'+keys[0]+'"]').focus();
}
return false;
},
error: function() {
console.log('there was a problem checking the fields');
}
});
return false;
});//END OF ON SUBIT - STEP 1 



$(".step1").click(function(){


var isFormValid = true;



var empty = true;

if($('#user_jobrole').val() == ''){
      alert('Input can not be left blank');


var msg = '<label class="error" for="user_jobrole">aasdfja;sdkjfl </label>';
$('input[name="user_jobrole"]').addClass('inputTxtError').after(msg);

      empty=false;
   }


if($('#user_org').val() == ''){
      alert('org  can not be left blank');


var msg = '<label class="error" for="user_org">alskdf    aa       jlaksdfjaasdfja;sdkjfl </label>';
$('select[name="user_org"]').addClass('inputTxtError').after(msg);

      empty=false;
   }

var radioValue = $("input[name='community_role']").is(':checked');

if(radioValue){
      alert('commnity can not be left blank');


var msg = '<label class="error" for="community_role">commnity rol is needed </label>';
$('input[name="community_role"]').addClass('inputTxtError').after(msg);

      empty=false;
   }




if(empty){

	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
next_fs.show(); 
	current_fs.hide();
}


});//STEP1








$(".step2").click(function(){


var isFormValid = true;



var empty = true;


var radioValue = $("input[name='community_role']").is(':checked');

if(!radioValue){
      alert('commnity can not be left blank');


var msg = '<label class="error" for="community_role">commnity rol is needed </label>';
$('input[name="community_role"]').addClass('inputTxtError').after(msg);

      empty=false;
   }




if(empty){

	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
next_fs.show(); 
	current_fs.hide();
}


}); //STEP 2


$(".previous").click(function(){
	
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
			current_fs.hide();
		
	});






}); //END OF DOCUMENT READY 




function resetErrors() {
$('form input, form select').removeClass('inputTxtError');
$('label.error').remove();
}