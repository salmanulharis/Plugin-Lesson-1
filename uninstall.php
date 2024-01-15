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

$books = get_posts( array( 'post_type' => 'book', 'numberposts' = -1 ));  // numberpost = -1 used to get all the posts

foreach ($books as $book) {
	wp_delete_post($book->ID, true);
}