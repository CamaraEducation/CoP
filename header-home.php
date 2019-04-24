<?php
$url="landing";
if(is_user_logged_in() ) {
       //wp_redirect( $url );
//exit;
        // code
    }

$landingURL="landing";
$loginPage= get_site_url() . '/login/';
$registerPage =get_site_url() . '/register/';
$forgotpassword = get_site_url() . '/forgotpassword/';
$homeurl = get_home_url();

       if(is_home() == true && is_user_logged_in()){
         //wp_redirect($landingURL); exit;
        
       } else if(strcmp(get_permalink(),$loginPage)==0 && is_user_logged_in()){
          //wp_redirect($landingURL); exit;
  //}    else if(strcmp(get_permalink(),$registerPage)==0 && is_user_logged_in()){
    //     wp_redirect($landingURL); exit;
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	
<script src='<?php echo get_template_directory_uri();?>/js/jquery-2.13-min.js'></script>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
