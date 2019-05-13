$(document).ready(function() {

	$(".dislike-btn").click(function() {	

		var user_id = $(this).data('userid');
		var post_id = $(this).data('postid');

		$clicked_btn = $(this);


		if ($clicked_btn.hasClass('far')) {
			action = 'dislike';

		} else if($clicked_btn.hasClass('fas')){
			action = 'undislike';
		}

		var formData = {'action':'satsfaction_ajax_request'};
		formData['likeaction']=  action;
		formData['user_id']=  user_id;
		formData['post_id']=  post_id;

		$.ajax({
		url: satsfaction_ajax_obj.ajaxurl, //  using on frontend
		type: 'POST',
		cache: false,
		dataType: 'JSON',
		data: formData,

success:function(data) {

	if (action == "dislike") {
		$clicked_btn.removeClass('far');
		$clicked_btn.addClass('fas');
	} else if(action == "undislike") {
		$clicked_btn.removeClass('fas');
		$clicked_btn.addClass('far');
	}
// display the number of likes and dislikes
$clicked_btn.siblings('span.likes').text(data.likes);
$clicked_btn.siblings('span.dislikes').text(data.dislikes);
$clicked_btn.siblings('span.excites').text(data.excites);
// change button styling of the other button if user is reacting the second time to post
$clicked_btn.siblings('i.fa-meh').removeClass('fas fa-meh').addClass('far fa-meh');
$clicked_btn.siblings('i.fa-smile').removeClass('fas fa-smile').addClass('far fa-smile');

},

error: function(data, errorThrown) {
	alert('request failed :'+errorThrown);
	console.log('there was a problem checking the fields');
}

});

	});

///////////////////////LIKE BUTTON////////////////////////////////////////


$(".like-btn").click(function() {	
	var user_id = $(this).data('userid');
	var post_id = $(this).data('postid');
	$clicked_btn = $(this);								 

	if ($clicked_btn.hasClass('far')) {
		action = 'like';
	} else if($clicked_btn.hasClass('fas')){
		action = 'unlike';
	}

	var formData = {'action':'satsfaction_ajax_request'};
	formData['likeaction']=  action;
	formData['user_id']=  user_id;
	formData['post_id']=  post_id;

	$.ajax({
	url: satsfaction_ajax_obj.ajaxurl, //  using on frontend
	type: 'POST',
	cache: false,
	dataType: 'JSON',
	data: formData,
	
	success:function(data) {
	// res = JSON.parse(data);
	if (action == "like") {
		$clicked_btn.removeClass('far');
		$clicked_btn.addClass('fas');
	} else if(action == "unlike") {
		$clicked_btn.removeClass('fas');
		$clicked_btn.addClass('far');
	}

	// display the number of likes and dislikes
	$clicked_btn.siblings('span.likes').text(data.likes);
	$clicked_btn.siblings('span.dislikes').text(data.dislikes);
	$clicked_btn.siblings('span.excites').text(data.excites);
	 		// change button styling of the other button if user is reacting the second time to post
	 		$clicked_btn.siblings('i.fa-frown').removeClass('fas').addClass('far');
	 		$clicked_btn.siblings('i.fa-smile').removeClass('fas').addClass('far');

	 	},

	 	error: function(data, errorThrown) {
	 		alert('request failed :'+errorThrown);
	 		console.log('there was a problem checking the fields');
	 	}

	 });

});


/////////////////////////EXCITE BUTTON //////////////////////////


$(".excite-btn").click(function() {	
	var user_id = $(this).data('userid');
	var post_id = $(this).data('postid');
	$clicked_btn = $(this);								 

	if ($clicked_btn.hasClass('far')) {
		action = 'excited';
	} else if($clicked_btn.hasClass('fas')){
		action = 'unexcited';
	}


	var formData = {'action':'satsfaction_ajax_request'};
	formData['likeaction']=  action;
	formData['user_id']=  user_id;
	formData['post_id']=  post_id;
	$.ajax({
url: satsfaction_ajax_obj.ajaxurl, //  using on frontend
type: 'POST',
cache: false,
dataType: 'JSON',
data: formData,
success: function(data) {
// res = JSON.parse(data);
if (action == "excited") {
	$clicked_btn.removeClass('far');
	$clicked_btn.addClass('fas');
} else if(action == "unexcited") {
	$clicked_btn.removeClass('fas');
	$clicked_btn.addClass('far');
}

// display the number of likes and dislikes
$clicked_btn.siblings('span.likes').text(data.likes);
$clicked_btn.siblings('span.dislikes').text(data.dislikes);
$clicked_btn.siblings('span.excites').text(data.excites);
		// change button styling of the other button if user is reacting the second time to post
		$clicked_btn.siblings('i.fa-frown').removeClass('fas').addClass('far');
		$clicked_btn.siblings('i.fa-meh').removeClass('fas').addClass('far');

	},

	error: function(data, errorThrown) {
		alert('request failed :'+errorThrown);
		console.log('there was a problem checking the fields');
	}

});

});

});//closing function