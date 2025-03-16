<?php

namespace Alihasan\WedevsAcademy\Admin;
class Menu
{
    public function __construct()
    {
        add_action('admin_menu', array($this, 'admin_menu'));
    }

    public function admin_menu()
    {
        add_menu_page('Academy', 'Academy', 'manage_options', 'wedevs-academy', array($this, 'plugin_page'), 'dashicons-welcome-learn-more');
    }

    public function plugin_page()
    {
        echo 'Hello World!';
    }

}