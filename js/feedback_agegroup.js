
$(document).ready(function() {


$('.agebignner-btn').on('click', function(){


var user_id = $(this).data('userid');
var post_id = $(this).data('postid');

$clicked_btn = $(this);


if ($clicked_btn.hasClass('btn-default')) {
ageaction = 'biggner';
//alert(post_id + user_id);
} else if($clicked_btn.hasClass('btn-success')){
ageaction = 'unbiggner';
}




var formData = {'action':'agegroup_ajax_request'};
formData['ageaction']=  ageaction;
formData['user_id']=  user_id;
formData['post_id']=  post_id;



$.ajax({
url: agegroup_ajax_obj.ajaxurl, //  using on frontend
type: 'POST',
cache: false,
dataType: 'JSON',
data: formData,

success:function(data) {


if (ageaction == "biggner") {

$clicked_btn.removeClass('btn-default');
$clicked_btn.addClass('btn-success');
} else if(ageaction == "unbiggner") {
$clicked_btn.removeClass('btn-success');
$clicked_btn.addClass('btn-default');
}
// display the number of likes and dislikes
$clicked_btn.siblings('span.agebiggner').text(data.agebiggner);
$clicked_btn.siblings('span.ageinter').text(data.ageinter);
$clicked_btn.siblings('span.ageadvance').text(data.ageadvance);

// change button styling of the other button if user is reacting the second time to post
$clicked_btn.siblings('i.btn-warning').removeClass('btn-warning').addClass('btn-default');
$clicked_btn.siblings('i.btn-danger').removeClass('btn-danger').addClass('btn-default');

},

error: function(data, errorThrown) {
alert('request failed :'+errorThrown);
console.log('there was a problem checking the fields');
}

});


});



$('.agebignner-btn').on('click', function(){


var user_id = $(this).data('userid');
var post_id = $(this).data('postid');

$clicked_btn = $(this);


if ($clicked_btn.hasClass('btn-default')) {
ageaction = 'biggner';
//alert(post_id + user_id);
} else if($clicked_btn.hasClass('btn-success')){
ageaction = 'unbiggner';
}




var formData = {'action':'agegroup_ajax_request'};
formData['ageaction']=  ageaction;
formData['user_id']=  user_id;
formData['post_id']=  post_id;



$.ajax({
url: agegroup_ajax_obj.ajaxurl, //  using on frontend
type: 'POST',
cache: false,
dataType: 'JSON',
data: formData,

success:function(data) {


if (ageaction == "biggner") {

$clicked_btn.removeClass('btn-default');
$clicked_btn.addClass('btn-success');
} else if(ageaction == "unbiggner") {
$clicked_btn.removeClass('btn-success');
$clicked_btn.addClass('btn-default');
}
// display the number of likes and dislikes
$clicked_btn.siblings('span.agebiggner').text(data.agebiggner);
$clicked_btn.siblings('span.ageinter').text(data.ageinter);
$clicked_btn.siblings('span.ageadvance').text(data.ageadvance);

// change button styling of the other button if user is reacting the second time to post
$clicked_btn.siblings('i.btn-warning').removeClass('btn-warning').addClass('btn-default');
$clicked_btn.siblings('i.btn-danger').removeClass('btn-danger').addClass('btn-default');

},

error: function(data, errorThrown) {
alert('request failed :'+errorThrown);
console.log('there was a problem checking the fields');
}

});


});




$('.ageinter-btn').on('click', function(){


var user_id = $(this).data('userid');
var post_id = $(this).data('postid');

$clicked_btn = $(this);


if ($clicked_btn.hasClass('btn-default')) {
		ageaction = 'inter';
	} else if($clicked_btn.hasClass('btn-warning')){
		ageaction = 'uninter';
	}



var formData = {'action':'agegroup_ajax_request'};
formData['ageaction']=  ageaction;
formData['user_id']=  user_id;
formData['post_id']=  post_id;



$.ajax({
url: agegroup_ajax_obj.ajaxurl, //  using on frontend
type: 'POST',
cache: false,
dataType: 'JSON',
data: formData,

success:function(data) {


if (ageaction == "inter") {
					  			$clicked_btn.removeClass('btn-default');
					  			$clicked_btn.addClass('btn-warning');
					  		} else if(ageaction == "uninter") {
					  			$clicked_btn.removeClass('btn-warning');
					  			$clicked_btn.addClass('btn-default');
					  		}
					  		// display the number of likes and dislikes
					  		$clicked_btn.siblings('span.agebiggner').text(data.agebiggner);
					  		$clicked_btn.siblings('span.ageinter').text(data.ageinter);
					  		$clicked_btn.siblings('span.ageadvance').text(data.ageadvance);

					  		// change button styling of the other button if user is reacting the second time to post
					  		$clicked_btn.siblings('i.btn-success').removeClass('btn-success').addClass('btn-default');
					  		$clicked_btn.siblings('i.btn-danger').removeClass('btn-danger').addClass('btn-default');

},

error: function(data, errorThrown) {
alert('request failed :'+errorThrown);
console.log('there was a problem checking the fields');
}

});


});





$('.ageadvance-btn').on('click', function(){

var user_id = $(this).data('userid');
var post_id = $(this).data('postid');

$clicked_btn = $(this);


if ($clicked_btn.hasClass('btn-default')) {
		ageaction = 'advance';
	} else if($clicked_btn.hasClass('btn-danger')){
		ageaction = 'unadvance';
	}



var formData = {'action':'agegroup_ajax_request'};
formData['ageaction']=  ageaction;
formData['user_id']=  user_id;
formData['post_id']=  post_id;



$.ajax({
url: agegroup_ajax_obj.ajaxurl, //  using on frontend
type: 'POST',
cache: false,
dataType: 'JSON',
data: formData,

success:function(data) {

if (ageaction == "advance") {
					    		$clicked_btn.removeClass('btn-default');
					    		$clicked_btn.addClass('btn-danger');
					    	} else if(ageaction == "unadvance") {
					    		$clicked_btn.removeClass('btn-danger');
					    		$clicked_btn.addClass('btn-default');
					    	}
					      // display the number of likes and dislikes
					      $clicked_btn.siblings('span.agebiggner').text(data.agebiggner);
					      $clicked_btn.siblings('span.ageinter').text(data.ageinter);
					      $clicked_btn.siblings('span.ageadvance').text(data.ageadvance);

					      // change button styling of the other button if user is reacting the second time to post
					      $clicked_btn.siblings('i.btn-success').removeClass('btn-success').addClass('btn-default');
					      $clicked_btn.siblings('i.btn-warning').removeClass('btn-warning').addClass('btn-default');

},

error: function(data, errorThrown) {
alert('request failed :'+errorThrown);
console.log('there was a problem checking the fields');
}

});


});













});//closing function]