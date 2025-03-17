<?php

namespace Alihasan\WedevsAcademy\Admin;

class Addressbook
{
    public function plugin_page()
    {
        $action = isset($_GET['action']) ? $_GET['action'] : 'list';

        switch ($action) {
            case 'new':
                $template = __DIR__ . '/views/new.php';
                break;
            case 'edit':
                $template = __DIR__ . '/views/edit.php';
                break;
            case 'view':
                $template = __DIR__ . '/views/view.php';
                break;
            default:
                $template = __DIR__ . '/views/list.php';
                break;
        }

        if (file_exists($template)) {
            include $template;
        }

//        echo "<pre>".__DIR__."</pre>";

    }

    public function form_handler()
    {

        if (!isset($_POST['submit-address'])) {
            return;
        }

        if (! wp_verify_nonce( $_POST['_wpnonce'], 'new-address' )) {
            wp_die("Are you cheating here? 1");
        }

        if (!current_user_can('manage_options')) {
            wp_die("Are you cheating here? 2");
        }
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
        exit();
    }

}