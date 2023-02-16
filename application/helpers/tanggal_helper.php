<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Tanggal Helper for PHP v1.0
 * Created by Muslim Aswaja
 * Created at 2020-02-12
 */

// Konversi date ke format kalender
if (!function_exists('date_to_kalender')) {
    function date_to_kalender($date)
    {
        if ($date) {
            $kalender = explode("-", $date);
            $to_return = ((int) $kalender[2]) . " "
                . num_to_bulan($kalender[1]) . " " . $kalender[0];
        } else {
            $to_return = "-";
        }

        return $to_return;
    }
}

if (!function_exists('date_to_hari')) {
    function date_to_hari($date)
    {
        if ($date) {
            // https://www.malasngoding.com/membuat-format-hari-indonesia-pada-php/
            $hari = date("D", strtotime($date));

            switch ($hari) {
                case 'Sun':
                    $to_return = "Minggu";
                    break;

                case 'Mon':
                    $to_return = "Senin";
                    break;

                case 'Tue':
                    $to_return = "Selasa";
                    break;

                case 'Wed':
                    $to_return = "Rabu";
                    break;

                case 'Thu':
                    $to_return = "Kamis";
                    break;

                case 'Fri':
                    $to_return = "Jumat";
                    break;

                case 'Sat':
                    $to_return = "Sabtu";
                    break;

                default:
                    $to_return = "Tidak di ketahui";
                    break;
            }
        } else {
            $to_return = "-";
        }

        return $to_return;
    }
}

if (!function_exists('month_from_timestamp')) {
    function month_from_timestamp($timestamp)
    {
        return explode("-", timestamp_to_date($timestamp))[1];
    }
}

if (!function_exists('year_from_timestamp')) {
    function year_from_timestamp($timestamp)
    {
        return explode("-", timestamp_to_date($timestamp))[0];
    }
}

// Konversi timestamp ke format date
if (!function_exists('timestamp_to_date')) {
    function timestamp_to_date($timestamp)
    {
        return explode(" ", $timestamp)[0];
    }
}

if (!function_exists('date_range_to_jadwal')) {
    function date_range_to_jadwal($start_date, $finish_date)
    {
        // Generate tanggal
        if ($start_date == $finish_date) {
            $to_return = date_to_hari($start_date) . "/" . date_to_kalender($start_date);
        } else {
            $to_return = date_to_hari($start_date) . " s.d. " . date_to_hari($finish_date) . "/"
                . date_to_kalender($start_date) . " s.d. " . date_to_kalender($finish_date);
        }

        return $to_return;
    }
}
