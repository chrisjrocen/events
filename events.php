<?php
/*
Plugin Name: Custom Event Plugin
Description: A custom plugin to add "Events" post type and "Locations" taxonomy.
Version: 1.0
Author: Your Name
*/

namespace Events\Tech;

class Events_Plugin
{
    private static $_instance = null;

    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function register_includes()
    {
        require_once(EVENTS_PLUGIN_DIR . '/vendor/autoload.php');
        require_once(EVENTS_PLUGIN_DIR . '/inc/class-post-type.php');
        require_once(EVENTS_PLUGIN_DIR . '/inc/class-hook-registry.php');

    }

    function define_constants()
    {
        define('EVENTS_PLUGIN_DIR', __DIR__);
        define('EVENTS_PLUGIN_FILE', __FILE__);
        define('EVENTS_PLUGIN_URL', plugin_dir_url(__FILE__));
    }

    public function __construct()
    {
        $this->define_constants();
        $this->register_includes();
    }
}
Events_Plugin::instance();
