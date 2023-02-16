<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Datatable Helper for PHP v1.0
 * Created by Muslim Aswaja
 * Created at 2020-02-12
 */

if (!function_exists('get_order_direction')) {
    function get_order_direction($direction)
    {
        switch (strtolower($direction)) {
            case 'asc':
                return 'ASC';
                break;
            case 'desc':
                return 'DESC';
                break;
            default:
                return 'ASC';
        }
    }
}

if (!function_exists('get_order_column')) {
    function get_order_column($order_options, $order_selected)
    {
        return isset($order_options[$order_selected]) ? $order_options[$order_selected] : null;
    }
}
