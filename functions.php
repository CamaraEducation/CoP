<?php

function irelandcop_script_enqueue() {
	//css styles
	wp_enqueue_style('customstyle',get_template_directory_uri().'/css/irelandcop.css',array(),'1.0.0','all');
	wp_enqueue_style('custombootstrap',get_template_directory_uri().'/css/bootstrap.css',array(),'1.0.0','all');

		
    wp_enqueue_style('fontcss',get_template_directory_uri().'/css/font-awesome/css/font-awesome.min.css',array(),'1.0.0','all');
    
		
		

/*
		wp_enqueue_script('customjs_jquery',get_template_directory_uri().'/js/jquery-3.2.1.min.js',array(),'1.0.0',true);
*/
		wp_enqueue_script('customjs_popper',get_template_directory_uri().'/js/popper.min.js',array(),'1.0.0',true);

			wp_enqueue_script('customjs_bootstrap',get_template_directory_uri().'/js/bootstrap.js',array(),'1.0.0',true);
		
    //Javascript
    wp_enqueue_script('feedback',get_template_directory_uri().'/js/feedback.js',array(),'1.0.0',false);	

}

/** Add set up scripts, CSS and Javascript */
add_action('wp_enqueue_scripts','irelandcop_script_enqueue');

/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-twentynineteen-svg-icons.php';

/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/classes/class-twentynineteen-walker-comment.php';

/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * SVG Icons related functions.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


/** =================================== */

///////// If the user is Sad/////////////////
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

///////// End of If the user is Excited/////////////////
if (isset($_POST['action'])) {
  
  $action = $_POST['action'];
  $post_id = $_POST['post_id'];
  $user_id = $_POST['user_id'];
  $table_name = $wpdb->prefix . 'feedback';
  $row = $wpdb->get_var( "SELECT * FROM ".$wpdb->prefix."feedback WHERE user_id = '".$user_id."' && post_id = '".$post_id."'" );
  $ml = $wpdb->get_var( "SELECT satsfaction FROM ".$wpdb->prefix."feedback WHERE user_id = '".$user_id."' && post_id = '".$post_id."'" );

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
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET satsfaction = 1 WHERE user_id=$user_id && post_id = $post_id"));
        }
         break;
    case 'undislike':
           $wpdb->query($wpdb->prepare("UPDATE $table_name SET satsfaction = 0 WHERE user_id=$user_id && post_id = $post_id"));
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
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET satsfaction = 2 WHERE user_id=$user_id && post_id = $post_id"));
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
  exit(0);
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



////////////////////////////////////////////// END OF SATSFACTION ///////////////////////////////////////////////////////////
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

  return json_encode($valu, JSON_NUMERIC_CHECK);

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
  return json_encode($valu, JSON_NUMERIC_CHECK);
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
  return json_encode($valu, JSON_NUMERIC_CHECK);
}
///////// End of If the user is Excited/////////////////
if (isset($_POST['levelaction'])) {
  $levelaction = $_POST['levelaction'];
  $post_id = $_POST['post_id'];
  $user_id = $_POST['user_id'];
  $table_name = $wpdb->prefix .'feedback'; 
  $row = $wpdb->get_var( "SELECT * FROM ".$wpdb->prefix."feedback WHERE user_id = '".$user_id."' && post_id = '".$post_id."'" );
  $ml = $wpdb->get_var( "SELECT level FROM ".$wpdb->prefix."feedback WHERE user_id = '".$user_id."' && post_id = '".$post_id."'" );
  switch ($levelaction) {
    case 'biggner':
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
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET level = 1 WHERE user_id=%d && post_id = %s", $user_id, $post_id));
        }
         break;
    case 'unbiggner':
           $wpdb->query($wpdb->prepare("UPDATE $table_name SET level = 0 WHERE user_id=%d && post_id = %s", $user_id, $post_id));
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
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET level = 2 WHERE user_id=%d && post_id = %s", $user_id, $post_id));
        }
         break;
    case 'uninter':
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET level = 0 WHERE user_id=%d && post_id = %s", $user_id, $post_id));
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
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET level = 3 WHERE user_id=%d && post_id = %s", $user_id, $post_id));
        }
      break;
    case 'unadvance':
          $wpdb->query($wpdb->prepare("UPDATE $table_name SET level = 0 WHERE user_id=%d && post_id = %s", $user_id, $post_id));
    default:
      break;
  }
  echo getRatingLevel($post_id);
  exit(0);
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
//////////////////////////////////////END OF LEVEL/////////////////////////////////////////////
//////////////////////////////////////TIME/////////////////////////////////////////////


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
  return json_encode($valu, JSON_NUMERIC_CHECK);
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
  return json_encode($valu, JSON_NUMERIC_CHECK);
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
  return json_encode($valu, JSON_NUMERIC_CHECK);
}
///////// End of If the user is Excited/////////////////
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
            $sql=$wpdb->insert($table_name, $data_array, $format=NULL);
        }else if($ml == 0 || $ml == 2 || $ml == 3){
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET taken_time = 1 WHERE user_id=$user_id && post_id = $post_id"));
        }
         break;
    case 'unbiggner':
           $wpdb->query($wpdb->prepare("UPDATE $table_name SET taken_time = 0 WHERE user_id=$user_id && post_id = $post_id"));
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
        }else if($ml == 0 || $ml == 1 || $ml == 3){
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET taken_time = 2 WHERE user_id=$user_id && post_id = $post_id"));
        }
         break;
    case 'uninter':
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET taken_time = 0 WHERE user_id=$user_id && post_id = $post_id"));
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
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET taken_time = 3 WHERE user_id=$user_id && post_id = $post_id"));
        }
      break;
    case 'unadvance':
          $wpdb->query($wpdb->prepare("UPDATE $table_name SET taken_time = 0 WHERE user_id=$user_id && post_id = $post_id"));
    default:
      break;
  }
  echo getRatingTime($post_id);
  exit(0);
}
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
///////////////////////////////////// END OF TIME ////////////////////////////////////////




/////////////////////////////////////AGE GROUP////////////////////////////////////////
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
  return json_encode($valu, JSON_NUMERIC_CHECK);
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
  return json_encode($valu, JSON_NUMERIC_CHECK);
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
  return json_encode($valu, JSON_NUMERIC_CHECK);
}
///////// End of If the user is Excited/////////////////
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
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET age_group = 1 WHERE user_id=$user_id && post_id = $post_id"));
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
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET age_group = 2 WHERE user_id=$user_id && post_id = $post_id"));
        }
         break;
    case 'uninter':
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET age_group = 0 WHERE user_id=$user_id && post_id = $post_id"));
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
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET age_group = 3 WHERE user_id=$user_id && post_id = $post_id"));
        }
      break;
    case 'unadvance':
          $wpdb->query($wpdb->prepare("UPDATE $table_name SET age_group = 0 WHERE user_id=$user_id && post_id = $post_id"));
    default:
      break;
  }
  echo getRatingAge($post_id);
  exit(0);
}
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

