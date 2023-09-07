<?php
/*
Plugin Name: Custom Event Plugin
Description: A custom plugin to add "Events" post type and "Locations" taxonomy.
Version: 1.0
Author: Your Name
*/

// Register Custom Post Type 'Events'
function register_events_post_type() {
    $args = array(
        'public' => true,
        'label'  => 'Events',
        'supports' => array('title', 'editor', 'thumbnail'),
    );
    register_post_type('events', $args);
}
add_action('init', 'register_events_post_type');

// Register Custom Taxonomy 'Locations'
function register_locations_taxonomy() {
    $args = array(
        'public' => true,
        'label'  => 'Locations',
        'hierarchical' => true,
    );
    register_taxonomy('locations', array('events'), $args);
}
add_action('init', 'register_locations_taxonomy');



add_filter( 'single_template', 'get_custom_events_template' );

//To display events post_type
function get_custom_events_template( $single_template ) {
	global $post;

	if ( 'events' === $post->post_type ) {
		$single_template = dirname( __FILE__ ) . '/events-template.php';
	}

	return $single_template;
}

