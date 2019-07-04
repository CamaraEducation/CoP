
//alert("asdSSSfas");

$(document).ready(function() {



$('body').on('change', '#file', function() {



var file_data = $(this).prop('files')[0];

var ext = $('#file').val().split('.').pop().toLowerCase();
if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
alert("Incorrect image format. The image must be gif, png, jpg or jpeg format.");
return false;

}

var picsize = (this.files[0].size);
	if (picsize > 1000000){
alert("Image size is greater than 1MB. Please select a smaller image to upload.");
return false;
	}

var form_data = new FormData();

form_data.append('file', file_data);

form_data.append('action', 'uploadavator_ajax_request');


$.ajax({
url: uploadavator_ajax_obj.ajaxurl, // or example_ajax_obj.ajaxurl if using on frontend
type: 'POST',
cache: false,
dataType: 'JSON',
contentType: false,
processData: false,
data: form_data,
success: function (response) {
//alert('File uploaded successfully');
//var returnedData = JSON.parse(response);
//alert(response);

location.reload();

},

error: function(data, errorThrown) {
//	alert('request failed :'+errorThrown +data);
console.log('there was a problem checking the fields');
//location.reload;
}

});
});


});//Eend of document ready
