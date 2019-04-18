
jQuery(document).ready(function($) {


//alert("asdfas");
$('.onboarding-submit').click(function(e){
       e.preventDefault();


//alert("asdfas");

var formData = {'action':'onboarding_ajax_request'};


var x = $('#onboardingformstep1').serializeArray();
//alert(x);

$.each(x, function(i, field){
    formData[field.name]=  field.value;
  });

$.ajax({
url: onboarding_ajax_obj.ajaxurl, // or example_ajax_obj.ajaxurl if using on frontend
type: 'POST',
 cache: false,
 dataType: 'JSON',
data: formData,

success:function(result) {


alert("ASS");


var len = result.length;
            for(var i=0; i<len; i++){
                var id = result[i].id;
}

//$('#user_fname').val('xxx');
//$("#user_fname").css("background-color", "#FF0000");





},
error: function(errorThrown){
console.log(errorThrown);
}
});

$(".submit").click(function(){
//	alert("sasfassssssssssssssssssssssss");
	return false;
})

});



})