<?php

namespace Events\Tech;

class Events_Post_Type
{
    function register_events_post_type()
    {
        $args = array(
            'public' => true,
            'label'  => 'Events',
            'supports' => array('title', 'editor', 'thumbnail'),
        );
        register_post_type('events', $args);
    }


    // Register Custom Taxonomy 'Locations'
    function register_locations_taxonomy()
    {
        $args = array(
            'public' => true,
            'label'  => 'Locations',
            'hierarchical' => true,
        );
        register_taxonomy('locations', array('events'), $args);
    }

    //To display events post_type
    function get_custom_events_template($single_template)
    {
        global $post;

        if ('events' === $post->post_type) {
            $single_template = EVENTS_PLUGIN_DIR . '/events-template.php';
        }

        return $single_template;
    }
}