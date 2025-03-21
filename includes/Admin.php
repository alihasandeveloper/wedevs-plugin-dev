<?php

namespace Alihasan\WedevsAcademy;

class Admin
{
    public function __construct()
    {
        $addressbook = new Admin\Addressbook();
        $this->dispatch_action(  $addressbook);
        new Admin\Menu($addressbook);
    }

    public function dispatch_action($addressbook)
    {
        add_action('admin_init', [$addressbook, 'form_handler']);
    }
}