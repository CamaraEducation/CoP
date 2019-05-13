<?php

function agegroup_ajax_enqueue() {
// Enqueue javascript on the frontend.
	wp_enqueue_script(
		'agegroup-ajax-script', get_template_directory_uri() . '/js/feedback_agegroup.js',array('jquery'));

// The wp_localize_script allows us to output the ajax_url path for our script to use.
	wp_localize_script('agegroup-ajax-script','agegroup_ajax_obj',array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));
}


//add scripts and set up ajax
add_action( 'wp_enqueue_scripts', 'agegroup_ajax_enqueue' );
add_action( 'wp_ajax_agegroup_ajax_request', 'agegroup_ajax_request' );
add_action( 'wp_ajax_nopriv_agegroup_ajax_request', 'agegroup_ajax_request' );

//agegroup_ajax_request();

agegroup_ajax_request();

function agegroup_ajax_request(){

	global $wpdb;

	if (isset($_POST['ageaction'])) {

		$ageaction = $_POST['ageaction'];
		$post_id = $_POST['post_id'];
		$user_id = $_POST['user_id'];
		$table_name = $wpdb->prefix .'feedback';
		$row = $wpdb->get_var( "SELECT * FROM ".$wpdb->prefix."feedback WHERE user_id = '".$user_id."' && post_id = '".$post_id."'" );
		$ml = $wpdb->get_var( "SELECT age_group FROM ".$wpdb->prefix."feedback WHERE user_id = '".$user_id."' && post_id = '".$post_id."'" );

		switch ($ageaction) {

			case 'biggner':

			if (empty($row)){
				$data_array = array(
					'user_id' => $user_id,
					'post_id' => $post_id,
					'satsfaction' => 0,
					'level' => 0,
					'taken_time' => 0,
					'age_group' => 1 );
				$sql=$wpdb->insert($table_name, $data_array, $format=NULL);
			}else if($ml == 0 || $ml == 2 || $ml == 3){


				$update_query=$wpdb->prepare("UPDATE $table_name SET age_group = 1 WHERE user_id=%d && post_id = %d", $user_id, $post_id);
				$wpdb->query($update_query);


			}
			break;
			case 'unbiggner':
			$wpdb->query($wpdb->prepare("UPDATE $table_name SET age_group = 0 WHERE user_id=$user_id && post_id = $post_id"));
			break;
			case 'inter':
			if (empty($row)){
				$data_array = array(
					'user_id' => $user_id,
					'post_id' => $post_id,
					'satsfaction' => 0,
					'level' => 0,
					'taken_time' => 0,
					'age_group' => 2 );
				$sql=$wpdb->insert($table_name, $data_array, $format=NULL);
			}else if($ml == 0 || $ml == 1 || $ml == 3){

				$update_query=$wpdb->prepare("UPDATE $table_name SET age_group = 2 WHERE user_id=%d && post_id = %d", $user_id, $post_id);
				$wpdb->query($update_query);

			}
			break;
			case 'uninter':

			$update_query=$wpdb->prepare("UPDATE $table_name SET age_group = 0 WHERE user_id=%d && post_id = %d", $user_id, $post_id);
			$wpdb->query($update_query);

			break;
			case 'advance':
			if (empty($row)){
				$data_array = array(
					'user_id' => $user_id,
					'post_id' => $post_id,
					'satsfaction' => 0,
					'level' => 0,
					'taken_time' => 3,
					'age_group' => 3 );
				$sql=$wpdb->insert($table_name, $data_array, $format=NULL);
			}else if($ml == 0 || $ml == 1 || $ml == 2){

				$update_query=$wpdb->prepare("UPDATE $table_name SET age_group = 3 WHERE user_id=%d && post_id = %d", $user_id, $post_id);
				$wpdb->query($update_query);


			}
			break;
			case 'unadvance':

			$update_query=$wpdb->prepare("UPDATE $table_name SET age_group = 0 WHERE user_id=%d && post_id = %d", $user_id, $post_id);
			$wpdb->query($update_query);

			default:
			break;
		}
		echo getRatingAge($post_id);
		exit;
	}
} //end of function 

function getRatingAge($id)
{
	global $wpdb;
	$rating = array();
	$agebiggner = $wpdb->get_var( "SELECT sum(age_group = 1) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$id."'" );
	$ageinter = $wpdb->get_var( "SELECT sum(age_group = 2) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$id."'" );
	$ageadvance = $wpdb->get_var( "SELECT sum(age_group = 3) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$id."'" );
	$rating = [
		'agebiggner' => $agebiggner[0],
		'ageinter' => $ageinter[0],
		'ageadvance' => $ageadvance[0]
	];
	return json_encode($rating);
}

function userBiggnerAge($userid, $postid)
{
	global $wpdb;
	$valu = $wpdb->get_var( "SELECT age_group FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );
	if ($valu == 1) {
		return true;
	}else{
		return false;
	}
}
function getBiggnerAge($postid)
{
	global $wpdb;
	$valu = $wpdb->get_var( "SELECT sum(age_group = 1) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$postid."'" );
//return json_encode($valu, JSON_NUMERIC_CHECK);
	return $value;

}
///////// End of If the user is Sad/////////////////
///////// If the user is Happy/////////////////
function userInterAge($userid, $postid)
{
	global $wpdb;
	$valu = $wpdb->get_var( "SELECT age_group FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );
	if ($valu == 2) {
		return true;
	}else{
		return false;
	}
}
function getInterAge($postid)
{
	global $wpdb;
	$valu = $wpdb->get_var( "SELECT sum(age_group = 2) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$postid."'" );
//return json_encode($valu, JSON_NUMERIC_CHECK);
	return $valu;
}
///////// End of If the user is Happy/////////////////
///////// If the user is Excited/////////////////
function userAdvanceAge($userid, $postid)
{
	global $wpdb;
	$valu = $wpdb->get_var( "SELECT age_group FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );
	if ($valu == 3) {
		return true;
	}else{
		return false;
	}
}
function getAdvanceAge($postid)
{
	global $wpdb;
	$valu = $wpdb->get_var( "SELECT sum(age_group = 3) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$postid."'" );
//return json_encode($valu, JSON_NUMERIC_CHECK);
	return $value;

}

?>