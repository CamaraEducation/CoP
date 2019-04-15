<?php
$url="landing";
if(is_user_logged_in() ) {
       //wp_redirect( $url );
//exit;
        // code
    }


$url="landing";
$loginPage = get_site_url() . '/login/';
$register=get_site_url() . '/registar/';
$forgotpassword = get_site_url() . '/forgotpassword/';

       echo $loginPage ."<br>";
       echo get_permalink() . "<br>";
       //echo get_site_url();

       if(get_permalink()  != $loginPage && !is_user_logged_in()){
         //   wp_redirect( wp_login_url($redirect) ); exit;
        echo "<br>I am frong page";
        }
  

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
