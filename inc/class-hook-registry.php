<?php

namespace Events\Tech;

class Hook_Registry
{
    public function __construct()
    {
        $this->register_hooks();
    }

    public function register_hooks()
    {
        $events = new Events_Post_Type();

        add_action('init', [$events, 'register_events_post_type']);
        add_action('init', [$events, 'register_locations_taxonomy']);
        add_filter('single_template', [$events, 'get_custom_events_template']);
    }
}
new Hook_Registry();
