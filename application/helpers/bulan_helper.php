<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Bulan Helper for PHP v1.0
 * Created by Muslim Aswaja
 * Created at 2020-02-12
 */

// Konversi bulan ke nama bulan
if (!function_exists('num_to_bulan')) {
    function num_to_bulan($num)
    {
        $to_return = "";

        switch ($num) {
            case 1:
                $to_return = "Januari";
                break;
            case 2:
                $to_return = "Februari";
                break;
            case 3:
                $to_return = "Maret";
                break;
            case 4:
                $to_return = "April";
                break;
            case 5:
                $to_return = "Mei";
                break;
            case 6:
                $to_return = "Juni";
                break;
            case 7:
                $to_return = "Juli";
                break;
            case 8:
                $to_return = "Agustus";
                break;
            case 9:
                $to_return = "September";
                break;
            case 10:
                $to_return = "Oktober";
                break;
            case 11:
                $to_return = "November";
                break;
            case 12:
                $to_return = "Desember";
                break;
            default:
                $to_return = "NaB";
        }

        return $to_return;
    }
}

// Konversi bulan ke bulan romawi
if (!function_exists('num_to_romawi')) {
    function num_to_romawi($num)
    {
        $to_return = "";

        switch ($num) {
            case 1:
                $to_return = "I";
                break;
            case 2:
                $to_return = "II";
                break;
            case 3:
                $to_return = "III";
                break;
            case 4:
                $to_return = "IV";
                break;
            case 5:
                $to_return = "V";
                break;
            case 6:
                $to_return = "VI";
                break;
            case 7:
                $to_return = "VII";
                break;
            case 8:
                $to_return = "VIII";
                break;
            case 9:
                $to_return = "IX";
                break;
            case 10:
                $to_return = "X";
                break;
            case 11:
                $to_return = "XI";
                break;
            case 12:
                $to_return = "XII";
                break;
            default:
                $to_return = "-";
        }

        return $to_return;
    }
}

// Konversi bulan dan periode ke nama bulan
if (!function_exists('nump_to_bulan')) {
    function nump_to_bulan($angka, $periode)
    {
        $to_return = "";

        if ($periode == 1) {
            switch ($angka) {
                case 1:
                    $to_return = "Desember";
                    break;
                case 2:
                    $to_return = "Januari";
                    break;
                case 3:
                    $to_return = "Februari";
                    break;
                case 4:
                    $to_return = "Maret";
                    break;
                case 5:
                    $to_return = "April";
                    break;
                case 6:
                    $to_return = "Mei";
                    break;
                default:
                    $to_return = "NaB";
            }
        } else {
            switch ($angka) {
                case 1:
                    $to_return = "Juni";
                    break;
                case 2:
                    $to_return = "Juli";
                    break;
                case 3:
                    $to_return = "Agustus";
                    break;
                case 4:
                    $to_return = "September";
                    break;
                case 5:
                    $to_return = "Oktober";
                    break;
                case 6:
                    $to_return = "November";
                    break;
                default:
                    $to_return = "NaB";
            }
        }

        return $to_return;
    }
}

// Konversi bulan dan periode ke nama bulan 3 karakter
if (!function_exists('nump_to_bulan_pendek')) {
    function nump_to_bulan_pendek($angka, $periode)
    {
        $to_return = "";

        if ($periode == 1) {
            switch ($angka) {
                case 1:
                    $to_return = "Des";
                    break;
                case 2:
                    $to_return = "Jan";
                    break;
                case 3:
                    $to_return = "Feb";
                    break;
                case 4:
                    $to_return = "Mar";
                    break;
                case 5:
                    $to_return = "Apr";
                    break;
                case 6:
                    $to_return = "Mei";
                    break;
                default:
                    $to_return = "NaB";
            }
        } else {
            switch ($angka) {
                case 1:
                    $to_return = "Jun";
                    break;
                case 2:
                    $to_return = "Jul";
                    break;
                case 3:
                    $to_return = "Agu";
                    break;
                case 4:
                    $to_return = "Sep";
                    break;
                case 5:
                    $to_return = "Okt";
                    break;
                case 6:
                    $to_return = "Nov";
                    break;
                default:
                    $to_return = "NaB";
            }
        }

        return $to_return;
    }
}

// Konversi bulan dalam satu tahun ke bulan dan periode
if (!function_exists('num_to_nump')) {
    function num_to_nump($bulan)
    {
        $to_return = new stdClass;

        switch ($bulan) {
            case 1:
                $to_return->bulan = 2;
                $to_return->periode = 1;
                break;
            case 2:
                $to_return->bulan = 3;
                $to_return->periode = 1;
                break;
            case 3:
                $to_return->bulan = 4;
                $to_return->periode = 1;
                break;
            case 4:
                $to_return->bulan = 5;
                $to_return->periode = 1;
                break;
            case 5:
                $to_return->bulan = 6;
                $to_return->periode = 1;
                break;
            case 6:
                $to_return->bulan = 1;
                $to_return->periode = 2;
                break;
            case 7:
                $to_return->bulan = 2;
                $to_return->periode = 2;
                break;
            case 8:
                $to_return->bulan = 3;
                $to_return->periode = 2;
                break;
                break;
            case 9:
                $to_return->bulan = 4;
                $to_return->periode = 2;
                break;
            case 10:
                $to_return->bulan = 5;
                $to_return->periode = 2;
                break;
            case 11:
                $to_return->bulan = 6;
                $to_return->periode = 2;
                break;
            case 12:
                $to_return->bulan = 1;
                $to_return->periode = 1;
                break;
            default:
                $to_return->bulan = 0;
                $to_return->periode = 0;
                break;
        }

        return $to_return;
    }
}

// Konversi bulan, dan tahun ke bulan dalam satu tahun
if (!function_exists('nump_to_num')) {
    function nump_to_num($bulan, $periode)
    {
        $to_return = 0;

        if ($periode == 1) {
            switch ($bulan) {
                case 1:
                    $to_return = 12;
                    break;
                case 2:
                    $to_return = 1;
                    break;
                case 3:
                    $to_return = 2;
                    break;
                case 4:
                    $to_return = 3;
                    break;
                case 5:
                    $to_return = 4;
                    break;
                case 6:
                    $to_return = 5;
                    break;
                default:
                    break;
            }
        } else {
            switch ($bulan) {
                case 1:
                    $to_return = 6;
                    break;
                case 2:
                    $to_return = 7;
                    break;
                case 3:
                    $to_return = 8;
                    break;
                case 4:
                    $to_return = 9;
                    break;
                case 5:
                    $to_return = 10;
                    break;
                case 6:
                    $to_return = 11;
                    break;
                default:
                    break;
            }
        }

        return $to_return;
    }
}

// Konversi bulan dan tahun asli ke angka untuk index rekap
if (!function_exists('numo_to_numi')) {
    function numo_to_numi($bulan)
    {
        $to_return = 0;

        switch ($bulan) {
            case 12:
                $to_return = 1;
                break;
            case 1:
                $to_return = 2;
                break;
            case 2:
                $to_return = 3;
                break;
            case 3:
                $to_return = 4;
                break;
            case 4:
                $to_return = 5;
                break;
            case 5:
                $to_return = 6;
                break;
            case 6:
                $to_return = 1;
                break;
            case 7:
                $to_return = 2;
                break;
            case 8:
                $to_return = 3;
                break;
            case 9:
                $to_return = 4;
                break;
            case 10:
                $to_return = 5;
                break;
            case 11:
                $to_return = 6;
                break;
            default:
                break;
        }

        return $to_return;
    }
}

// Konversi bulan, periode, dan tahun ke bulan dalam satu tahun
if (!function_exists('numpt_to_num')) {
    function numpt_to_num($bulan, $periode, $tahun)
    {
        $to_return = new stdClass;
        $to_return->bulan = 0;
        $to_return->tahun = $tahun;

        if ($periode == 1) {
            switch ($bulan) {
                case 1:
                    $to_return->bulan = 12;
                    $to_return->tahun = $tahun - 1;
                    break;
                case 2:
                    $to_return->bulan = 1;
                    $to_return->tahun = $tahun;
                    break;
                case 3:
                    $to_return->bulan = 2;
                    $to_return->tahun = $tahun;
                    break;
                case 4:
                    $to_return->bulan = 3;
                    $to_return->tahun = $tahun;
                    break;
                case 5:
                    $to_return->bulan = 4;
                    $to_return->tahun = $tahun;
                    break;
                case 6:
                    $to_return->bulan = 5;
                    $to_return->tahun = $tahun;
                    break;
                default:
                    break;
            }
        } else {
            switch ($bulan) {
                case 1:
                    $to_return->bulan = 6;
                    $to_return->tahun = $tahun;
                    break;
                case 2:
                    $to_return->bulan = 7;
                    $to_return->tahun = $tahun;
                    break;
                case 3:
                    $to_return->bulan = 8;
                    $to_return->tahun = $tahun;
                    break;
                case 4:
                    $to_return->bulan = 9;
                    $to_return->tahun = $tahun;
                    break;
                case 5:
                    $to_return->bulan = 10;
                    $to_return->tahun = $tahun;
                    break;
                case 6:
                    $to_return->bulan = 11;
                    $to_return->tahun = $tahun;
                    break;
                default:
                    break;
            }
        }

        return $to_return;
    }
}

// Mengambil tanggal terakhir dari suatu bulan
if (!function_exists('get_last_date_from_month')) {
    function get_last_date_from_month($date)
    {
        return date("t", strtotime($date));
    }
}
