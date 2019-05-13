
$(document).ready(function() {

	$('.lessone-btn').on('click', function(){
		var user_id = $(this).data('userid');
		var post_id = $(this).data('postid');

		$clicked_btn = $(this);

		if ($clicked_btn.hasClass('btn-default')) {
			timeaction = 'biggner';
		} else if($clicked_btn.hasClass('btn-success')){
			timeaction = 'unbiggner';
		}

		var formData = {'action':'time_ajax_request'};
		formData['timeaction']=  timeaction;
		formData['user_id']=  user_id;
		formData['post_id']=  post_id;

		$.ajax({
			url: time_ajax_obj.ajaxurl, //  using on frontend
			type: 'POST',
			cache: false,
			dataType: 'JSON',
			data: formData,

			success:function(data) {

				if (timeaction == "biggner") {
					$clicked_btn.removeClass('btn-default');
					$clicked_btn.addClass('btn-success');
				} else if(timeaction == "unbiggner") {
					$clicked_btn.removeClass('btn-success');
					$clicked_btn.addClass('btn-default');
				}
// display the number of likes and dislikes
$clicked_btn.siblings('span.lessone').text(data.lessone);
$clicked_btn.siblings('span.onetotwo').text(data.onetotwo);
$clicked_btn.siblings('span.moretwo').text(data.moretwo);
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

	$('.onetotwo-btn').on('click', function(){
		var user_id = $(this).data('userid');
		var post_id = $(this).data('postid');

		$clicked_btn = $(this);


		if ($clicked_btn.hasClass('btn-default')) {
			timeaction = 'inter';
		} else if($clicked_btn.hasClass('btn-warning')){
			timeaction = 'uninter';
		}

		var formData = {'action':'time_ajax_request'};
		formData['timeaction']=  timeaction;
		formData['user_id']=  user_id;
		formData['post_id']=  post_id;

		$.ajax({
		url: time_ajax_obj.ajaxurl, //  using on frontend
		type: 'POST',
		cache: false,
		dataType: 'JSON',
		data: formData,

		success:function(data) {
			if (timeaction == "inter") {
				$clicked_btn.removeClass('btn-default');
				$clicked_btn.addClass('btn-warning');
			} else if(timeaction == "uninter") {
				$clicked_btn.removeClass('btn-warning');
				$clicked_btn.addClass('btn-default');
			}
// display the number of likes and dislikes
$clicked_btn.siblings('span.lessone').text(data.lessone);
$clicked_btn.siblings('span.onetotwo').text(data.onetotwo);
$clicked_btn.siblings('span.moretwo').text(data.moretwo);

// change button styling of the other button if user is reacting the second time to post
$clicked_btn.siblings('i.btn-success').removeClass('btn-success').addClass('btn-default');
$clicked_btn.siblings('i.btn-danger').removeClass('btn-danger').addClass('btn-default');

},

error: function(data, errorThrown) {
	console.log('there was a problem checking the fields');
}

});

	});

	$('.moretwo-btn').on('click', function(){
		var user_id = $(this).data('userid');
		var post_id = $(this).data('postid');

		$clicked_btn = $(this);

		if ($clicked_btn.hasClass('btn-default')) {
			timeaction = 'advance';
		} else if($clicked_btn.hasClass('btn-danger')){
			timeaction = 'unadvance';
		}

		var formData = {'action':'time_ajax_request'};
		formData['timeaction']=  timeaction;
		formData['user_id']=  user_id;
		formData['post_id']=  post_id;

		$.ajax({
		url: time_ajax_obj.ajaxurl, //  using on frontend
		type: 'POST',
		cache: false,
		dataType: 'JSON',
		data: formData,

		success:function(data) {

			if (timeaction == "advance") {
				$clicked_btn.removeClass('btn-default');
				$clicked_btn.addClass('btn-danger');
			} else if(timeaction == "unadvance") {
				$clicked_btn.removeClass('btn-danger');
				$clicked_btn.addClass('btn-default');
			}
// display the number of likes and dislikes
$clicked_btn.siblings('span.lessone').text(data.lessone);
$clicked_btn.siblings('span.onetotwo').text(data.onetotwo);
$clicked_btn.siblings('span.moretwo').text(data.moretwo);

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

});//closing function