<?php



function uploadavator_ajax_enqueue() {
// Enqueue javascript on the frontend.
	wp_enqueue_script(
		'uploadavator-ajax-script', get_template_directory_uri() . '/js/uploadavator_js.js',array('jquery'));

// The wp_localize_script allows us to output the ajax_url path for our script to use.
	wp_localize_script('uploadavator-ajax-script','uploadavator_ajax_obj',array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));
}


//add scripts and set up ajax
add_action( 'wp_enqueue_scripts', 'uploadavator_ajax_enqueue' );
add_action( 'wp_ajax_uploadavator_ajax_request', 'uploadavator_ajax_request' );
add_action( 'wp_ajax_nopriv_uploadavator_ajax_request', 'uploadavator_ajax_request' );

add_action( 'wp_ajax_file_upload', 'file_upload_callback' );
add_action( 'wp_ajax_nopriv_file_upload', 'file_upload_callback' );

function uploadavator_ajax_request(){

$user_id= $_POST['user_id'];

$upload = wp_upload_bits($_FILES["file"]["name"], null, file_get_contents($_FILES["file"]["tmp_name"]));
  // wp_die();


$file_name = $upload['file'];
$file_url=$upload['url'];
$file_error=$upload['error'];
$file_type=$upload['type'];

// Prepare an array of post data for the attachment.
$attachment = array(
	'guid'           => $wp_upload_dir['url'] . '/' . basename( $file_name ), 
	'post_mime_type' => $file_type,
	'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $file_type ) ),
	'post_content'   => '',
	'post_status'    => 'inherit'
);


global $wpdb;

$current_user = wp_get_current_user();
$attach_id = wp_insert_attachment($attachment,$file_name , 0);
$wpua_metakey = $wpdb->get_blog_prefix($blog_id).'user_avatar';
$user_avatarId =get_user_meta($current_user->ID, $wpua_metakey , true);



if(empty($user_avatarId)){
  //add a new avator 
  
  add_user_meta( $current_user->ID, $wpua_metakey, $attach_id,false);

}else {
 //update user avator if the y have one arleady 
  update_user_meta( $current_user->ID, $wpua_metakey, $attach_id );
}

$data = array('name' => $file_name );
echo json_encode($data );
exit;

}//end of function 