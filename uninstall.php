<?php

/**
* Trigger this file on Plugin uninstall
* 
* @package WEPOAddon
*/

if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ){
	die;
}

// Clear Database stored data

// $books = get_posts( array( 'post_type' => 'book', 'numberposts' = -1 ));  // numberpost = -1 used to get all the posts

// foreach ($books as $book) {
// 	wp_delete_post($book->ID, true);
// }

////////
// To delete everything that plugin have
////////

// Access the DB via SQL
global $wpdb;
$wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'book'" )
$wpdb->query( "DELETE FROM wp_postsmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)" )
$wpdb->query( "DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)" )