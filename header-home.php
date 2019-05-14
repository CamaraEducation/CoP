<?php
session_start();


$url= get_home_url() ."/landing";
if(is_user_logged_in() ) {
       wp_redirect( $url );
exit;
        // code
    }


             

/*** get all Pathways */
$pathwayterms = get_terms( array(
    'taxonomy' => 'pathway',
    'hide_empty' => false,
    'orderby'=> 'id',
) );

global $allPathways;
 $allPathways= [];

 foreach ( $pathwayterms as $term ) {
//echo "<option value=". $terms->terms .">" . $term->name . "</option>";
           // echo '<option value="'.$term->term_id .'">'.$term->name .'</option>';
//$allPathways = array('pname'  => $term->name);
$thecolor=  get_field('main_color', $term->taxonomy.'_'.$term->term_id);
$allPathways = array($term->name  => $thecolor);

$_SESSION[$term->name] =  $thecolor;
}


?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
  <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	
<script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>


	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
