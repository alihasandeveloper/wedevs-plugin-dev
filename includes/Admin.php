<?php

namespace Alihasan\WedevsAcademy;

class Admin
{
    public function __construct()
    {
        new Admin\Menu();
        $this->dispatch_action();
    }

    public function dispatch_action()
    {
        $addressbook = new Admin\Addressbook();
        add_action('admin_init', [$addressbook, 'form_handler']);
    }
}