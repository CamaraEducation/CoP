

/* must apply only after HTML has loaded */
$(document).ready(function () {


$("#contact_form").on("submit", function(e) {

resetErrors();
//alert("login submit email");



var formData = {'action':'contact_ajax_request'};
var x = $('#contact_form').serializeArray();


jQuery.each(x, function(i, field){
    formData[field.name]=  field.value;
//alert(field.name + " --" +field.value);
  });  

    

$.ajax({
url: contact_ajax_obj.ajaxurl, // or example_ajax_obj.ajaxurl if using on frontend
type: 'POST',
cache: false,
dataType: 'JSON',
data: formData,


success: function(resp) {


if (Object.keys(resp).length ==0) {
//  alert("am here here?");
//successful validation


//$('form').submit();

//$("#successMessage").html("Thank out!")

$("#successMessage").css("visibility", "visible");
$("#successMessage").css("display", "block");

resetErrors();
//$("#contact-modal").modal('hide');

//$('form').submit();
//return false;


} else {


$("#errorMessage").css("visibility", "visible");
$("#errorMessage").css("display", "block");

$("#successMessage").css("visibility", "hidden");
$("#successMessage").css("display", "none");
   
}


return false;
},
error: function(data, errorThrown) {
    alert('request failed :'+errorThrown);
console.log('there was a problem checking the fields');
}
});


return false;

       // e.preventDefault();

    }); ///END OF SUBMIT FORM 
     
    
  $("#submitForm").on('click', function() {
        $("#contact_form").submit();
    });


});

function resetErrors() {


$('#errorMessage').css("display","none");
  $("#errorMessage").css("visibility", "hidden");


}