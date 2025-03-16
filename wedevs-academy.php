<?php

/**
 * Plugin Name: Wedevs Academy
 * Plugin Version: 1.0
 * Author: Ali Hasan
 * Description: OPP based learning WordPress Plugin
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 */
final class Wedevs_Academy
{

    const VERSION = '1.0';

    /**
     * The class constructor
     */
    private function __construct()
    {
        $this->definte_constants();

        register_activation_hook(__FILE__, [$this, 'activate']);

        add_action('plugins_loaded', [$this, 'init_plugin']);
    }

    public static function init()
    {
        static $instance = false;
        if (!$instance) {
            $instance = new self();
        }
        return $instance;
    }

    public function definte_constants()
    {
        define('WD_ACADEMY_VERSION', self::VERSION);
        define('WD_ACADEMY_FILE', __FILE__);
        define('WD_ACADEMY_PATH', __DIR__);
        define('WD_ACADEMY_URL', plugins_url('', WD_ACADEMY_FILE));
        define('WD_ACADEMY_ASSETS', WD_ACADEMY_URL . '/assets');
    }

    public function activate()
    {
        $installed = get_option('wd_academy_installed');
        if (!$installed) {
            update_option('wd_academy_installed', time());
        }

        update_option('wd_academy_version', WD_ACADEMY_VERSION);
    }

    public function init_plugin()
    {
        if (is_admin()) {
            new Alihasan\WedevsAcademy\Admin();
        } else {
            new Alihasan\WedevsAcademy\Frontend();
        }
    }
}

function wedevs_academy()
{
    return Wedevs_Academy::init();
}

// Kick of the plugin
wedevs_academy();