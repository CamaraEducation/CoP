

$(document).ready(function() {





//profileupdate pROCESISNG 

$(".profileupdate-submit").click(function(){
	


resetErrors();
//alert("profileupdate submit email");


var formData = {'action':'profileupdate_ajax_request'};

var x = $('#profileupdate_form').serializeArray();


jQuery.each(x, function(i, field){
    formData[field.name]=  field.value;
//alert(field.name + " --" +field.value);
  });

$.ajax({
url: profileupdate_ajax_obj.ajaxurl, // or example_ajax_obj.ajaxurl if using on frontend
type: 'POST',
cache: false,
dataType: 'JSON',
data: formData,


success: function(resp) {


if (Object.keys(resp).length ==0) {
//	alert("am here here?");
//successful validation

//$('form').submit();

$("#success-update").css("visibility", "visible");
$("#success-update").css("display", "block");

//return false;

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
error: function(data, errorThrown) {
	alert('request failed :'+errorThrown);
console.log('there was a problem checking the fields');
}
});
return false;
});//END OF ON SUBIT - STEP 1 
	

});//end of doc ready 



function resetErrors() {
$('form input, form select').removeClass('inputTxtError');
$('label.error').remove();

$('.confirm').css("display","hidden");
  $(".confirm").css("visibility", "hidden");

}