
$(document).ready(function() {

	$(".biggner-btn").click(function() {	

		var user_id = $(this).data('userid');
		var post_id = $(this).data('postid');

		$clicked_btn = $(this);


		if ($clicked_btn.hasClass('btn-default')) {
			levelaction = 'biggner';
		} else if($clicked_btn.hasClass('btn-success')){
			levelaction = 'unbiggner';
		}

		var formData = {'action':'level_ajax_request'};
		formData['levelaction']=  levelaction;
		formData['user_id']=  user_id;
		formData['post_id']=  post_id;

		$.ajax({
		url: level_ajax_obj.ajaxurl, //  using on frontend
		type: 'POST',
		cache: false,
		dataType: 'JSON',
		data: formData,

success:function(data) {


	if (levelaction == "biggner") {
		$clicked_btn.removeClass('btn-default');
		$clicked_btn.addClass('btn-success');
	} else if(levelaction == "unbiggner") {
		$clicked_btn.removeClass('btn-success');
		$clicked_btn.addClass('btn-default');
	}
// display the number of likes and dislikes
$clicked_btn.siblings('span.biggners').text(data.biggners);
$clicked_btn.siblings('span.inters').text(data.inters);
$clicked_btn.siblings('span.advances').text(data.advances);
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


	$(".inter-btn").click(function() {	

		var user_id = $(this).data('userid');
		var post_id = $(this).data('postid');

		$clicked_btn = $(this);


		if ($clicked_btn.hasClass('btn-default')) {
			levelaction = 'inter';
		} else if($clicked_btn.hasClass('btn-warning')){
			levelaction = 'uninter';
		}

		var formData = {'action':'level_ajax_request'};
		formData['levelaction']=  levelaction;
		formData['user_id']=  user_id;
		formData['post_id']=  post_id;

		$.ajax({
		url: level_ajax_obj.ajaxurl, //  using on frontend
		type: 'POST',
		cache: false,
		dataType: 'JSON',
		data: formData,

success:function(data) {


	if (levelaction == "inter") {
		$clicked_btn.removeClass('btn-default');
		$clicked_btn.addClass('btn-warning');
	} else if(levelaction == "uninter") {
		$clicked_btn.removeClass('btn-warning');
		$clicked_btn.addClass('btn-default');
	}
  		// display the number of likes and dislikes
  		$clicked_btn.siblings('span.biggners').text(data.biggners);
  		$clicked_btn.siblings('span.inters').text(data.inters);
  		$clicked_btn.siblings('span.advances').text(data.advances);
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

	$(".advance-btn").click(function() {	

		var user_id = $(this).data('userid');
		var post_id = $(this).data('postid');

		$clicked_btn = $(this);

		if ($clicked_btn.hasClass('btn-default')) {
			levelaction = 'advance';
		} else if($clicked_btn.hasClass('btn-danger')){
			levelaction = 'unadvance';
		}

		var formData = {'action':'level_ajax_request'};
		formData['levelaction']=  levelaction;
		formData['user_id']=  user_id;
		formData['post_id']=  post_id;



		$.ajax({
		url: level_ajax_obj.ajaxurl, //  using on frontend
		type: 'POST',
		cache: false,
		dataType: 'JSON',
		data: formData,

success:function(data) {


	if (levelaction == "advance") {
		$clicked_btn.removeClass('btn-default');
		$clicked_btn.addClass('btn-danger');
	} else if(levelaction == "unadvance") {
		$clicked_btn.removeClass('btn-danger');
		$clicked_btn.addClass('btn-default');
	}
      // display the number of likes and dislikes
      $clicked_btn.siblings('span.biggners').text(data.biggners);
      $clicked_btn.siblings('span.inters').text(data.inters);
      $clicked_btn.siblings('span.advances').text(data.advances);
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