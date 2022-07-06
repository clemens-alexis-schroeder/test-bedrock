<?php

/*------------------------------------*\
  clean wp admin
\*------------------------------------*/

// For All Roles! Remove links from admin menu
function remove_admin_menus() {
	remove_menu_page( 'edit-comments.php' ); //comments
	remove_menu_page( 'edit.php' ); //posts
}
add_action( 'admin_menu', 'remove_admin_menus' );

// Removes comments from post and pages
function remove_comment_support() {
	remove_post_type_support( 'post', 'comments' );
	remove_post_type_support( 'page', 'comments' );
}
add_action('init', 'remove_comment_support', 100);

// Removes from admin bar
function clean_up_admin_bar() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('new-content');
	$wp_admin_bar->remove_menu('comments');


}
add_action( 'wp_before_admin_bar_render', 'clean_up_admin_bar' );


/*Remove WordPress menu from admin bar*/
function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
}
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );
