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


<section>
        <div class="container mt-5">
     
<?php

$pageURL = get_permalink() . "?".$_SERVER["QUERY_STRING"];

//echo $pageURL;
//============== Update ================

?>

<section>
        <div class="container mt-5">
               <?php
	$tax_terms = get_terms( 'member_community_role', 'orderby=id');
	//var_dump($tax_terms);
	foreach ( $tax_terms as $term ) {
	///loop though the types 
		echo $term->name;
	?>
	 
	<?php
	$copusers = get_users();
	foreach ( $copusers as $users ) {

	$current_user_name= $users->display_name;
	$current_user_id = $users->ID;

	//**GET ORGANIZATION
	$current_user_org =get_user_meta( $current_user_id, 'member_organization', true); 
	$org_name = get_term( $current_user_org, 'member_organization' )->name;

	//echo $org_name->name;

	//**GET COMMUNITY ROLE
	$current_user_communityRole =get_user_meta( $current_user_id, 'member_community_role', true); 
	$communityRole_name = get_term( $current_user_communityRole, 'community_role' )->name;

	//echo $communityRole_name->name;

	//**GET Pathway
	$current_user_pathway =get_user_meta( $current_user_id, 'memberPathway', true); 
	$term = get_term( $current_user_pathway, 'pathway' );
	$current_user_pathway_name = $term->name;

	$current_pathway_color = get_field('main_color', $term->taxonomy . '_' . $term->term_id);
	?><div class="card ml-2 mt-2" style="width: 17rem; background: #E6EEF3;border: none;">

                            <img src="<?php echo get_avatar_url($user->ID); ?>" class="rounded-circle z-depth-0 md-avatar" alt="avatar image">
                            <div class="card-body">
                                <p class="program-title"><?php echo $current_user_name; ?></p>
                                <p class="program-title"><?php
                                 echo $communityRole_name; ?></p>
                                <p class="program-title"><?php echo $communityRole_name; ?></p>
                                <p class="program-title"><?php echo $current_user_pathway_name; ?></p>
                                <p class="program-title"><?php echo $org_name; ?></p>
                                <p class="program-title"><?php echo $user->ID; ?></p>
                                <button type="button" class="btn" style="border: 1px solid #3E4C59;box-sizing: border-box;border-radius: 100px;">
                    			<?php echo $current_user_pathway_name; ?>
                                <div class="badge card-badge1 mt-2"><?php echo $user->display_name;?></div>
                            </div>
                        </div><?php
   // echo '<span>' . esc_html( $user->display_name ) . '</span>';
	}
	}
	?>
   
        </div>
    </section>

<?php get_footer();?>