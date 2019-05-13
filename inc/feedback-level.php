<?php
function level_ajax_enqueue() {
// Enqueue javascript on the frontend.
	wp_enqueue_script(
		'level-ajax-script', get_template_directory_uri() . '/js/feedback_level.js',array('jquery'));

// The wp_localize_script allows us to output the ajax_url path for our script to use.
	wp_localize_script('level-ajax-script','level_ajax_obj',array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));
}

//add scripts and set up ajax
add_action( 'wp_enqueue_scripts', 'level_ajax_enqueue' );
add_action( 'wp_ajax_level_ajax_request', 'level_ajax_request' );
add_action( 'wp_ajax_nopriv_level_ajax_request', 'level_ajax_request' );

//level_ajax_request();

function level_ajax_request(){

	global $wpdb;

	if (isset($_POST['levelaction'])) {

// $levelaction = "biggner";
// $post_id = 81;
// $user_id = 1;

		$levelaction = $_POST['levelaction'];
		$post_id = $_POST['post_id'];
		$user_id = $_POST['user_id'];

		$table_name = $wpdb->prefix .'feedback'; 
		$row = $wpdb->get_var( "SELECT * FROM ".$wpdb->prefix."feedback WHERE user_id = '".$user_id."' && post_id = '".$post_id."'" );
		$ml = $wpdb->get_var( "SELECT level FROM ".$wpdb->prefix."feedback WHERE user_id = '".$user_id."' && post_id = '".$post_id."'" );

		switch ($levelaction) {

			case "biggner":

			if (empty($row)){
				$data_array = array(
					'user_id' => $user_id,
					'post_id' => $post_id,
					'satsfaction' => 0,
					'level' => 1,
					'taken_time' => 0,
					'age_group' => 0 );
				$sql=$wpdb->insert($table_name, $data_array, $format=NULL);
			}else if($ml == 0 || $ml == 2 || $ml == 3){


				$update_query=$wpdb->prepare("UPDATE $table_name SET level = 1 WHERE user_id=%d && post_id = %d", $user_id, $post_id);
				$wpdb->query($update_query);

			}
			break;

			case 'unbiggner':

			$update_query=$wpdb->prepare("UPDATE $table_name SET level = 0 WHERE user_id=%d && post_id = %d", $user_id, $post_id);
			$wpdb->query($update_query);

			break;
			case 'inter':
			if (empty($row)){
				$data_array = array(
					'user_id' => $user_id,
					'post_id' => $post_id,
					'satsfaction' => 0,
					'level' => 2,
					'taken_time' => 0,
					'age_group' => 0 );
				$sql=$wpdb->insert($table_name, $data_array, $format=NULL);
			}else if($ml == 0 || $ml == 1 || $ml == 3){


				$update_query=$wpdb->prepare("UPDATE $table_name SET level = 2 WHERE user_id=%d && post_id = %d", $user_id, $post_id);
				$wpdb->query($update_query);

			}
			break;
			case 'uninter':

			$update_query=$wpdb->prepare("UPDATE $table_name SET level = 0 WHERE user_id=%d && post_id = %d", $user_id, $post_id);
			$wpdb->query($update_query);

			break;
			case 'advance':
			if (empty($row)){
				$data_array = array(
					'user_id' => $user_id,
					'post_id' => $post_id,
					'satsfaction' => 0,
					'level' => 3,
					'taken_time' => 0,
					'age_group' => 0 );
				$sql=$wpdb->insert($table_name, $data_array, $format=NULL);
			}else if($ml == 0 || $ml == 1 || $ml == 2){

				$update_query=$wpdb->prepare("UPDATE $table_name SET level = 3 WHERE user_id=%d && post_id = %d", $user_id, $post_id);
				$wpdb->query($update_query);

			}
			break;
			case 'unadvance':

			$update_query=$wpdb->prepare("UPDATE $table_name SET level = 0 WHERE user_id=%d && post_id = %d", $user_id, $post_id);
			$wpdb->query($update_query);

			default:
			break;
		}
		echo getRatingLevel($post_id);
		exit;
	}

} //End of function 

////////////////////////////////////////////// LEVEL ///////////////////////////////////////////////////////////
function userBiggner($userid, $postid)
{
	global $wpdb;
	$valu = $wpdb->get_var( "SELECT level FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );
	if ($valu == 1) {
		return true;
	}else{
		return false;
	}
}

function getBiggner($postid)
{
	global $wpdb;
//$valu = $wpdb->get_var( "SELECT sum(level = 1) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$postid."'" );

	$valu=$wpdb->get_var( "SELECT sum(level = 1) FROM ".$wpdb->prefix."feedback WHERE post_id = $postid " );

//return json_encode($valu, JSON_NUMERIC_CHECK);
	return $valu;

}
///////// End of If the user is Sad/////////////////
///////// If the user is Happy/////////////////
function userInter($userid, $postid)
{
	global $wpdb;
	$valu = $wpdb->get_var( "SELECT level FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );
	if ($valu == 2) {
		return true;
	}else{
		return false;
	}
}
function getInter($postid)
{
	global $wpdb;
	$valu = $wpdb->get_var( "SELECT sum(level = 2) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$postid."'" );
//return json_encode($valu, JSON_NUMERIC_CHECK);
	return $valu;

}
///////// End of If the user is Happy/////////////////
///////// If the user is Excited/////////////////
function userAdvance($userid, $postid)
{
	global $wpdb;
	$valu = $wpdb->get_var( "SELECT level FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );
	if ($valu == 3) {
		return true;
	}else{
		return false;
	}
}
function getAdvance($postid)
{
	global $wpdb;
	$valu = $wpdb->get_var( "SELECT sum(level = 3) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$postid."'" );
//return json_encode($valu, JSON_NUMERIC_CHECK);
	return $valu;

}

function getRatingLevel($id)
{
	global $wpdb;
	$rating = array();
	$biggner = $wpdb->get_var( "SELECT sum(level = 1) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$id."'" );
	$inter = $wpdb->get_var( "SELECT sum(level = 2) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$id."'" );
	$advance = $wpdb->get_var( "SELECT sum(level = 3) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$id."'" );
	$rating = [
		'biggners' => $biggner[0],
		'inters' => $inter[0],
		'advances' => $advance[0]
	];
	return json_encode($rating);
}

?>