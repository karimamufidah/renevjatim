<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Jam Helper for PHP v1.0
 * Created by Muslim Aswaja
 * Created at 2020-02-12
 */

// Konversi timestamp ke format date
if (!function_exists('timestamp_to_jam_menit_object')) {
    function timestamp_to_jam_menit_object($timestamp)
    {
        $to_return = new stdClass();
        $to_return->jam = 0;
        $to_return->menit = 0;

        if ($timestamp) {
            $jam = explode(" ", $timestamp)[1];
            $jam_array = explode(":", $jam);
            $to_return->jam = $jam_array[0];
            $to_return->menit = $jam_array[1];
        }

        return $to_return;
    }
}

if (!function_exists('timestamp_to_jam_menit')) {
    function timestamp_to_jam_menit($timestamp)
    {
        $to_return = new stdClass();
        $to_return->jam = 0;
        $to_return->menit = 0;

        if ($timestamp) {
            $jam = explode(" ", $timestamp)[1];
            $jam_array = explode(":", $jam);
            $to_return->jam = $jam_array[0];
            $to_return->menit = $jam_array[1];
        }

        return $timestamp ? $to_return->jam . ":" . $to_return->menit : "";
    }
}

if (!function_exists('get_greeting_from_hour')) {
    function get_greeting_from_hour($hour)
    {
        $to_return = "Selamat ";

        if ($hour < 5 || $hour > 19) {
            $to_return .= "Malam";
        } else if ($hour < 10) {
            $to_return .= "Pagi";
        } else if ($hour < 15) {
            $to_return .= "Siang";
        } else {
            $to_return .= "Sore";
        }

        return $to_return;
    }
}

if (!function_exists('generate_timezone_timestamp')) {
    function generate_timezone_timestamp($timezone)
    {
        if (!$timezone) $timezone = 'Asia/Jakarta';

        // Source: https://stackoverflow.com/a/20289096
        $timestamp = time();
        $dt = new DateTime("now", new DateTimeZone($timezone));

        $dt->setTimestamp($timestamp);

        return $dt->format('Y-m-d H:i:s');
    }
}

if (!function_exists('generate_timezone_timestamp_object')) {
    function generate_timezone_timestamp_object($timezone)
    {
        if (!$timezone) $timezone = 'Asia/Jakarta';

        // Source: https://stackoverflow.com/a/20289096
        $timestamp = time();
        $dt = new DateTime("now", new DateTimeZone($timezone));

        $dt->setTimestamp($timestamp);

        return $dt;
    }
}

if (!function_exists('generate_timezone_hour')) {
    function generate_timezone_hour($timezone)
    {
        if (!$timezone) $timezone = 'Asia/Jakarta';

        // Source: https://stackoverflow.com/a/20289096
        $timestamp = time();
        $dt = new DateTime("now", new DateTimeZone($timezone));

        $dt->setTimestamp($timestamp);

        return $dt->format('H');
    }
}
