<?php get_header();?>

<?php


$users = get_users( array( 'fields' => array( 'ID' ) ) );
foreach($users as $user){
       // print_r(get_user_meta ( $user->ID));
       // echo $user_id->roles;

echo get_user_meta( $user->ID, 'first_name' , true );

$user = new WP_User(  $user->ID );
$user_roles = $user->roles;

foreach($user_roles as $role) {
  echo $role . "<br>";
}
    }




$blogusers = get_users( [ 'role__in' => [ 'author', 'subscriber' ] ] );
// Array of WP_User objects.
foreach ( $blogusers as $user ) {
    echo '<span>' . esc_html( $user->display_name ) . '</span>';
}

?>

<?php get_footer();?>