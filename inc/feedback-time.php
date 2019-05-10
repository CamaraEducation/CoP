<?php




function time_ajax_enqueue() {
// Enqueue javascript on the frontend.
	wp_enqueue_script(
		'time-ajax-script', get_template_directory_uri() . '/js/feedback_time.js',array('jquery'));

// The wp_localize_script allows us to output the ajax_url path for our script to use.
	wp_localize_script('time-ajax-script','time_ajax_obj',array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));
}


//add scripts and set up ajax
add_action( 'wp_enqueue_scripts', 'time_ajax_enqueue' );
add_action( 'wp_ajax_time_ajax_request', 'time_ajax_request' );
add_action( 'wp_ajax_nopriv_time_ajax_request', 'time_ajax_request' );



//time_ajax_request();



function time_ajax_request(){

global $wpdb;

if (isset($_POST['timeaction'])) {
$timeaction = $_POST['timeaction'];
$post_id = $_POST['post_id'];
$user_id = $_POST['user_id'];
$table_name = $wpdb->prefix .'feedback';
$row = $wpdb->get_var( "SELECT * FROM ".$wpdb->prefix."feedback WHERE user_id = '".$user_id."' && post_id = '".$post_id."'" );
$ml = $wpdb->get_var( "SELECT taken_time FROM ".$wpdb->prefix."feedback WHERE user_id = '".$user_id."' && post_id = '".$post_id."'" );


switch ($timeaction) {

case 'biggner':
if (empty($row)){
$data_array = array(
'user_id' => $user_id,
'post_id' => $post_id,
'satsfaction' => 0,
'level' => 0,
'taken_time' => 1,
'age_group' => 0 );
$sql
=$wpdb->insert($table_name, $data_array, $format=NULL);
}else if($ml == 0 || $ml == 2 || $ml == 3){


$update_query=$wpdb->prepare("UPDATE $table_name SET taken_time = 1 WHERE user_id=%d && post_id = %d", $user_id, $post_id);
$wpdb->query($update_query);

}
break;
case 'unbiggner':


$update_query=$wpdb->prepare("UPDATE $table_name SET taken_time = 0 WHERE user_id=%d && post_id = %d", $user_id, $post_id);
$wpdb->query($update_query);


break;
case 'inter':
if (empty($row)){
$data_array = array(
'user_id' => $user_id,
'post_id' => $post_id,
'satsfaction' => 0,
'level' => 0,
'taken_time' => 2,
'age_group' => 0 );
$sql=$wpdb->insert($table_name, $data_array, $format=NULL);

$update_query=$wpdb->prepare("UPDATE $table_name SET taken_time = 1 WHERE user_id=%d && post_id = %d", $user_id, $post_id);
$wpdb->query($update_query);

}else if($ml == 0 || $ml == 1 || $ml == 3){

$update_query=$wpdb->prepare("UPDATE $table_name SET taken_time = 2 WHERE user_id=%d && post_id = %d", $user_id, $post_id);
$wpdb->query($update_query);

}
break;
case 'uninter':

$update_query=$wpdb->prepare("UPDATE $table_name SET taken_time = 0 WHERE user_id=%d && post_id = %d", $user_id, $post_id);
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
'age_group' => 0 );
$sql=$wpdb->insert($table_name, $data_array, $format=NULL);
}else if($ml == 0 || $ml == 1 || $ml == 2){

	$update_query=$wpdb->prepare("UPDATE $table_name SET taken_time = 3 WHERE user_id=%d && post_id = %d", $user_id, $post_id);
$wpdb->query($update_query);

}
break;
case 'unadvance':

$update_query=$wpdb->prepare("UPDATE $table_name SET taken_time = 1 WHERE user_id=%d && post_id = %d", $user_id, $post_id);
$wpdb->query($update_query);


default:
break;
}
echo getRatingTime($post_id);
exit;
}



} //End of function 



function getRatingTime($id)
{
global $wpdb;
$rating = array();
$lessone = $wpdb->get_var( "SELECT sum(taken_time = 1) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$id."'" );
$onetotwo = $wpdb->get_var( "SELECT sum(taken_time = 2) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$id."'" );
$moretwo = $wpdb->get_var( "SELECT sum(taken_time = 3) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$id."'" );
$rating = [
'lessone' => $lessone[0],
'onetotwo' => $onetotwo[0],
'moretwo' => $moretwo[0]
];
return json_encode($rating);
}

//////////////////////////////////////TIME/////////////////////////////////////////////
function userLessOne($userid, $postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT taken_time FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );
if ($valu == 1) {
return true;
}else{
return false;
}
}
function getLessOne($postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT sum(taken_time = 1) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$postid."'" );
//return json_encode($valu, JSON_NUMERIC_CHECK);
return $valu;

}
///////// End of If the user is Sad/////////////////
///////// If the user is Happy/////////////////
function userOneToTwo($userid, $postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT taken_time FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );
if ($valu == 2) {
return true;
}else{
return false;
}
}
function getOneToTwo($postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT sum(taken_time = 2) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$postid."'" );
//return json_encode($valu, JSON_NUMERIC_CHECK);

return $valu;

}
///////// End of If the user is Happy/////////////////
///////// If the user is Excited/////////////////
function userMoreTwo($userid, $postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT taken_time FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );
if ($valu == 3) {
return true;
}else{
return false;
}
}
function getMoreTwo($postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT sum(taken_time = 3) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$postid."'" );
//return json_encode($valu, JSON_NUMERIC_CHECK);

return $valu;

}

?>