<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Validation Helper for PHP v1.0
 * Created by Muslim Aswaja
 * Created at 2020-03-12
 */

if (!function_exists('must_sent')) {
    function must_sent($request, $value, $name)
    {
        $to_return = $request;

        if ($to_return->success) {
            if (!isset($value)) {
                $to_return->success = false;
                $to_return->message = $name . " harus disertakan.";
            }
        }

        return $to_return;
    }
}

if (!function_exists('must_filled')) {
    function must_filled($request, $value, $name)
    {
        $to_return = $request;

        if ($to_return->success) {
            if (!$value) {
                $to_return->success = false;
                $to_return->message = $name . " harus diisi.";
            }
        }

        return $to_return;
    }
}

if (!function_exists('must_sent_and_filled')) {
    function must_sent_and_filled($request, $value, $name)
    {
        $to_return = must_sent($request, $value, $name);
        $to_return = must_filled($request, $value, $name);

        return $to_return;
    }
}

if (!function_exists('get_must_sent_message')) {
    function get_must_sent_message($request, $condition, $name)
    {
        $to_return = $request;

        if ($to_return->success) {
            if ($condition) {
                $to_return = get_false_message_response($to_return, $name . " harus diisi.");
            }
        }

        return $to_return;
    }
}

if (!function_exists('get_false_message_response')) {
    function get_false_message_response($response, $message)
    {
        $to_return = $response;

        if ($to_return->success) {
            $to_return->success = false;
            $to_return->message = $message;
        }

        return $to_return;
    }
}
