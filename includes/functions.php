<?php

function wp_ac_insert_address($args = [])
{
    global $wpdb;

    if(empty($args['name'])) {
        return  new \WP_Error('no-name', 'You must provide a Name.');
    }
//
    if(empty($args['name'])) {
        return  new \WP_Error('no-number', 'You must provide a Number.');
    }

    $defaults = array(
        'name' => '',
        'address' => '',
        'phone' => '',
        'created_by' => get_current_user_id(),
        'created_at' => current_time('mysql'),
    );

    $data = wp_parse_args($args, $defaults);

    $inserted = $wpdb->insert(
        "{$wpdb->prefix}ac_addresses",
        $data,
        [
            '%s',
            '%s',
            '%s',
            '%d',
            '%s',
        ]
    );
    if (!$inserted) {
        return new \WP_Error('failed_to_insert', 'Failed to insert data');
    }

    return $wpdb->insert_id;
}