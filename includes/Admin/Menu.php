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
        $parent_slug = 'wedevs-academy';
        $capability = 'manage_options';
        add_menu_page('Academy', 'Academy', $capability, $parent_slug, array($this, 'address_book_page'), 'dashicons-welcome-learn-more');
        add_submenu_page($parent_slug, 'Address Book', 'Address Book', $capability, $parent_slug, array($this, 'address_book_page'));
        add_submenu_page($parent_slug, 'Settings', 'Settings', $capability, $parent_slug . '-settings', array($this, 'settings_page'));
    }

//    public function plugin_page()
//    {
//        echo 'Hello World!';
//    }

    public function address_book_page()
    {
        $addressbook = new AddressBook();
        $addressbook->plugin_page();
    }
    public function settings_page()
    {
        echo 'Hello form Setting page';
    }

}