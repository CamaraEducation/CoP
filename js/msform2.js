

jQuery(document).ready(function($) {
//alert("asdf");
var current_fs, next_fs, previous_fs; //fieldsets


$('.signin-button').click(function(e){	
e.preventDefault()

current_fs = $(this).parent();
next_fs = $(this).parent().next();

var formData = {'action':'example_ajax_request'};

var x = $('#msform').serializeArray();
$.each(x, function(i, field){
    formData[field.name]=  field.value;
  });

$.ajax({
url: example_ajax_obj.ajaxurl, // or example_ajax_obj.ajaxurl if using on frontend
type: 'POST',
data: formData,
success:function(result) {
alert(result);
if(result != 0){

//there is an error in the page 
$(".display-error").html("<ul>"+result+"</ul>");
$(".display-error").css("display","block");


}else {

//no error in the page 
next_fs.show(); 
current_fs.hide();
$(".display-error").css("display","hidden");

//activate next step on progressbar using the index of next_fs
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");


}

},
error: function(errorThrown){
console.log(errorThrown);
}
});  
});



$(".next").click(function(){
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();

var jobrole = $('#user_jobrole').val();
var org = $('#user_org').val();

var communityrole = $('#user_communityrole').val();
var pathway = $('#user_pathway').val();

	if(jobrole.length==0 ||org.length==0){
$(".display-error").html("<ul> please comle</ul>");
$(".display-error").css("display","block");		

} else {
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show();
	current_fs.hide();
}
	});


$(".submitform").click(function(){
//	alert("aaaaaaaaaaaaaaaaaaaaaaaa");
//$(".display-finalstep").html("aslkdjfa;lsdkjfa;lskdjfa;lskdfja sdlfkj;as;kdfjasf");



	});


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


});
