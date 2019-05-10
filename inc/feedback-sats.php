<?php






// if (isset($_POST['likeaction'])) {
global $wpdb;
$action = "undislike";
$post_id = 95;
$user_id = 1;
$table_name = $wpdb->prefix . 'feedback';
$row = $wpdb->get_var( "SELECT * FROM $table_name WHERE user_id = '".$user_id."' && post_id = '".$post_id."'" );
$ml  = $wpdb->get_var( "SELECT satsfaction FROM $table_name WHERE user_id = '".$user_id."' && post_id = '".$post_id."'" );

switch ($action) {
case 'dislike':
if (empty($row)){
$data_array = array(
'user_id' => $user_id,
'post_id' => $post_id,
'satsfaction' => 1, 
'level' => 0,
'time_taken' => 0,
'age_group' => 0 );
$sql=$wpdb->insert($table_name, $data_array, $format=NULL);

}elseif($ml == 0 || $ml == 2 || $ml == 3){
$wpdb->query($wpdb->prepare("UPDATE $table_name SET satsfaction = 1 WHERE user_id=%1$s && post_id = %2$s", $user_id, $post_id));
}
break;



case 'undislike':
$wpdb->query($wpdb->prepare("UPDATE '$table_name' SET satsfaction = 0 WHERE 'user_id'=%1$s AND 'post_id' = %2$s", $user_id, $post_id));
break;



case 'like':
if (empty($row)){
$data_array = array(
'user_id' => $user_id,
'post_id' => $post_id,
'satsfaction' => 2,
'level' => 0,
'time_taken' => 0,
'age_group' => 0 );
$sql=$wpdb->insert($table_name, $data_array, $format=NULL);
}elseif($ml == 0 || $ml == 1 || $ml == 3){
$wpdb->query($wpdb->prepare("UPDATE $table_name SET satsfaction = 2 WHERE user_id=$'".$user_id."' && post_id = '".$post_id."'"));
}
break;


case 'unlike':
$wpdb->query($wpdb->prepare("UPDATE $table_name SET satsfaction = 0 WHERE user_id=$user_id && post_id = $post_id"));
break;


case 'excited':
if (empty($row)){
$data_array = array(
'user_id' => $user_id,
'post_id' => $post_id,
'satsfaction' => 3,
'level' => 0,
'time_taken' => 0,
'age_group' => 0 );
$sql=$wpdb->insert($table_name, $data_array, $format=NULL);
}elseif($ml == 0 || $ml == 1 || $ml == 2){
$wpdb->query($wpdb->prepare("UPDATE $table_name SET satsfaction = 3 WHERE user_id=$user_id && post_id = $post_id"));
}
break;


case 'unexcited':
$wpdb->query($wpdb->prepare("UPDATE $table_name SET satsfaction = 0 WHERE user_id=$user_id && post_id = $post_id"));
default:
break;

}
echo getRating($post_id);
// }












function satsfaction_ajax_enqueue() {
// Enqueue javascript on the frontend.
	wp_enqueue_script(
		'satsfaction-ajax-script', get_template_directory_uri() . '/js/feedback_satsfaction.js',array('jquery'));

// The wp_localize_script allows us to output the ajax_url path for our script to use.
	wp_localize_script('satsfaction-ajax-script','satsfaction_ajax_obj',array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));
}


//add scripts and set up ajax
add_action( 'wp_enqueue_scripts', 'satsfaction_ajax_enqueue' );
add_action( 'wp_ajax_satsfaction_ajax_request', 'satsfaction_ajax_request' );
add_action( 'wp_ajax_nopriv_satsfaction_ajax_request', 'satsfaction_ajax_request' );

function satsfaction_ajax_request(){

//////// If the user is Sad/////////////////


// $rating = [
// 'likes' => "23",
// 'dislikes' => "34",
// 'excites' => "45"
// ];
// echo json_encode($rating);
// exit;

///////// End of If the user is Excited/////////////////
if (isset($_POST['likeaction'])) {
global $wpdb;
$action =$_POST['likeaction'];
$post_id = $_POST['post_id'];
$user_id = $_POST['user_id'];
$table_name = $wpdb->prefix . 'feedback';
$row = $wpdb->get_var( "SELECT * FROM $table_name WHERE user_id = '".$user_id."' && post_id = '".$post_id."'" );
$ml  = $wpdb->get_var( "SELECT satsfaction FROM $table_name WHERE user_id = '".$user_id."' && post_id = '".$post_id."'" );

switch ($action) {
case "dislike":
if (empty($row)){
$data_array = array(
'user_id' => $user_id,
'post_id' => $post_id,
'satsfaction' => 1, 
'level' => 0,
'time_taken' => 0,
'age_group' => 0 );
$sql=$wpdb->insert($table_name, $data_array, $format=NULL);
}elseif($ml == 0 || $ml == 2 || $ml == 3){
$wpdb->query($wpdb->prepare("UPDATE $table_name SET satsfaction = 1 WHERE 'user_id'=%1$s AND 'post_id' = %2$s", $user_id, $post_id));
}
break;
case "undislike":
$wpdb->query($wpdb->prepare("UPDATE $table_name SET satsfaction = 0 WHERE 'user_id'=%1$s AND 'post_id' = %2$s", $user_id, $post_id));
break;
case "like":
if (empty($row)){
$data_array = array(
'user_id' => $user_id,
'post_id' => $post_id,
'satsfaction' => 2,
'level' => 0,
'time_taken' => 0,
'age_group' => 0 );
$sql=$wpdb->insert($table_name, $data_array, $format=NULL);
}elseif($ml == 0 || $ml == 1 || $ml == 3){
$wpdb->query($wpdb->prepare("UPDATE $table_name SET satsfaction = 2 WHERE 'user_id'=%1$s AND 'post_id' = %2$s", $user_id, $post_id));
}
break;
case "unlike":
$wpdb->query($wpdb->prepare("UPDATE $table_name SET satsfaction = 0 WHERE 'user_id'=%1$s AND 'post_id' = %2$s", $user_id, $post_id));
break;
case "excited":
if (empty($row)){
$data_array = array(
'user_id' => $user_id,
'post_id' => $post_id,
'satsfaction' => 3,
'level' => 0,
'time_taken' => 0,
'age_group' => 0 );
$sql=$wpdb->insert($table_name, $data_array, $format=NULL);
}elseif($ml == 0 || $ml == 1 || $ml == 2){
$wpdb->query($wpdb->prepare("UPDATE $table_name SET satsfaction = 3 WHERE 'user_id'=%1$s AND 'post_id' = %2$s", $user_id, $post_id));
}
break;
case "unexcited":
$wpdb->query($wpdb->prepare("UPDATE $table_name SET satsfaction = 0 WHERE 'user_id'=%1$s AND 'post_id' = %2$s", $user_id, $post_id));
default:
break;
}
echo getRating($post_id);
// echo $_POST['likeaction'];
exit;
}
}

function getRating($id)
{
global $wpdb;
$rating = array();
$sad = $wpdb->get_var( "SELECT sum(satsfaction = 1) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$id."'" );
$happy = $wpdb->get_var( "SELECT sum(satsfaction = 2) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$id."'" );
$excite = $wpdb->get_var( "SELECT sum(satsfaction = 3) FROM ".$wpdb->prefix."feedback WHERE post_id = '".$id."'" );

$rating = [
'likes' => $happy[0],
'dislikes' => $sad[0],
'excites' => $excite[0]
];
return json_encode($rating);
}

// }
function userDisliked($userid, $postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT satsfaction FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );
if ($valu == 1) {
return true;
}else{
return false;
}
}

function userLiked($userid, $postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT satsfaction FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );
if ($valu == 2) {
return true;
}else{
return false;
}
}

function userExcited($userid, $postid)
{
global $wpdb;
$valu = $wpdb->get_var( "SELECT satsfaction FROM ".$wpdb->prefix."feedback WHERE user_id = '".$userid."' && post_id = '".$postid."'" );
if ($valu == 3) {
return true;
}else{
return false;
}
}

?>