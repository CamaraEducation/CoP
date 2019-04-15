

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

//formData.push(formData);

  //alert(formData);
//var inputField = $('<input type="text" name="action" type="hidden" />').val('example_ajax_request');

//$('#msform').append(inputField);
  
// This does the ajax request
$.ajax({
url: example_ajax_obj.ajaxurl, // or example_ajax_obj.ajaxurl if using on frontend
type: 'POST',
data: formData,
success:function(result) {
//alert(result!=true);
if(result ==false){
//no error in the page 
next_fs.show(); 
current_fs.hide();

//activate next step on progressbar using the index of next_fs
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");


}else {
//there is an error in the page 
$(".display-error").html("<ul>"+result+"</ul>");
$(".display-error").css("display","block");
}

},
error: function(errorThrown){
console.log(errorThrown);
}
});  


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
