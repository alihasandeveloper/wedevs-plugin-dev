<?php

/**
 * Plugin Name: Wedevs Academy
 * Plugin Version: 1.0
 * Author: Ali Hasan
 * Description: OPP based learning WordPress Plugin
 * Text Domain: wedevs-academy
 */

use Alihasan\WedevsAcademy\Installer;

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
     $installer  = new Alihasan\WedevsAcademy\Installer();
     $installer->run();
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