<?php




function profileupdate_ajax_enqueue() {
// Enqueue javascript on the frontend.
	wp_enqueue_script(
		'profileupdate-ajax-script', get_template_directory_uri() . '/js/profile_update_js.js',array('jquery'));

// The wp_localize_script allows us to output the ajax_url path for our script to use.
	wp_localize_script('profileupdate-ajax-script','profileupdate_ajax_obj',array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));
}


//add scripts and set up ajax
add_action( 'wp_enqueue_scripts', 'profileupdate_ajax_enqueue' );
add_action( 'wp_ajax_profileupdate_ajax_request', 'profileupdate_ajax_request' );
add_action( 'wp_ajax_nopriv_profileupdate_ajax_request', 'profileupdate_ajax_request' );






function profileupdate_ajax_request() {

$errors=[];


if(isset($_POST)){


$member_user_id = $_POST['member_user_id'];
	$member_fname = $_POST['member_fname'];
	$member_lname = $_POST['member_lname'];
	$member_email = $_POST['member_email'];

	$member_org = $_POST['member_org'];
	$member_jobrole = $_POST['member_jobrole'];
	$member_location = $_POST['member_location'];

	$member_projectgroup = $_POST['member_projectgroup'];
	$member_bio = $_POST['member_bio'];
	$member_communityRole = $_POST['member_communityRole'];
	$member_pathway = $_POST['member_pathway'];


/*
if(empty($member_fname)){
//Email address already registered
		$errors = array('member_fname'  => 'This is a required field.');
	}

if(empty($member_lname)){
//Email address already registered
		$errors = array('member_lname'  => 'This is a required field.');
	}

if(empty($member_email)){
//Email address already registered
		$errors = array('member_email'  => 'This is a required field.');
	}
*/

if(empty($member_jobrole)){
//Email address already registered
		$errors = array('member_jobrole'  => 'This field is required.');
}


if(empty($member_bio)){
//Email address already registered
		$errors = array('member_bio'  => 'This field is required.');
}


if(empty($errors)) {

wp_update_user( array( 'ID' => $member_user_id, 'description' => $member_bio ) );


//Start form submittions 
    $user_data = array(
     'member_organization'		=> $member_org,
     'member_jobrole'			=> $member_jobrole,
     'member_community_location'	=> $member_location,
     'member_projectgroup'				=> $member_projectgroup,
     'member_community_role'				=> $member_communityRole,
 	 'memberPathway'				=> $member_pathway,
 );


foreach($user_data as $key => $value) {
    update_user_meta( $member_user_id, $key, $value );
}


}

//if there are errors echo erros 
echo json_encode($errors);
exit;

}else {
//ther eis no post 
}


}//end of function 