<?php

namespace Alihasan\WedevsAcademy\Admin;

class Addressbook
{
    public $errors = array();

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

        if (!wp_verify_nonce($_POST['_wpnonce'], 'new-address')) {
            wp_die("Are you cheating here? 1");
        }

        if (!current_user_can('manage_options')) {
            wp_die("Are you cheating here? 2");
        }

        $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
        $address = isset($_POST['address']) ? sanitize_textarea_field($_POST['address']) : '';
        $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
//
        if(empty($name)) {
            $this->errors['name'] = "Please enter a name.";
        }
        if(empty($phone)) {
            $this->errors['phone'] = "Please enter a number.";
        }
//        var_dump($this->errors);
        if(!empty($this->errors)) {
            return;
        }

        $insert_id = wp_ac_insert_address(
            array(
                'name' => $name,
                'address' => $address,
                'phone' => $phone,
            )
        );

//
        if (is_wp_error($insert_id)) {
            wp_die($insert_id->get_error_message());
        }

        //redirect

//
        $redirected_to = admin_url('admin.php?page=wedevs-academy&inserted=true');
        wp_redirect($redirected_to);
        exit;
    }

}