<?php

namespace Alihasan\WedevsAcademy\Admin;
class Menu
{
    public $addressbook;

    public function __construct($addressbook)
    {
        $this->addressbook = $addressbook;
        add_action('admin_menu', array($this, 'admin_menu'));
    }

    public function admin_menu()
    {
        $parent_slug = 'wedevs-academy';
        $capability = 'manage_options';
        add_menu_page('Academy', 'Academy', $capability, $parent_slug, array($this->addressbook, 'plugin_page'), 'dashicons-welcome-learn-more');
        add_submenu_page($parent_slug, 'Address Book', 'Address Book', $capability, $parent_slug, array($this->addressbook, 'plugin_page'));
        add_submenu_page($parent_slug, 'Settings', 'Settings', $capability, $parent_slug . '-settings', array($this->addressbook, 'plugin_page'));
    }

}