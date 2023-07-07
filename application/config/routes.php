<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$route['api/interbus-transformer-perencanaan']['POST'] = 'api/crud/interbus_transformer_perencanaan/store';
$route['api/interbus-transformer-realisasi']['POST'] = 'api/crud/interbus_transformer_realisasi/store';
$route['api/penghantar-perencanaan']['POST'] = 'api/crud/penghantar_perencanaan/store';
$route['api/penghantar-realisasi']['POST'] = 'api/crud/penghantar_realisasi/store';
$route['api/pembangkit-perencanaan']['POST'] = 'api/crud/pembangkit_perencanaan/store';
$route['api/pembangkit-realisasi']['POST'] = 'api/crud/pembangkit_realisasi/store';
$route['api/sistem-perencanaan']['POST'] = 'api/crud/sistem_perencanaan/store';
$route['api/sistem-realisasi']['POST'] = 'api/crud/sistem_realisasi/store';
$route['api/subsistem-perencanaan']['POST'] = 'api/crud/subsistem_perencanaan/store';
$route['api/subsistem-realisasi']['POST'] = 'api/crud/subsistem_realisasi/store';
$route['api/tegangan-perencanaan']['POST'] = 'api/crud/tegangan_perencanaan/store';
$route['api/tegangan-realisasi']['POST'] = 'api/crud/tegangan_realisasi/store';
$route['api/trafo-perencanaan']['POST'] = 'api/crud/trafo_perencanaan/store';
$route['api/trafo-realisasi']['POST'] = 'api/crud/trafo_realisasi/store';

$route['api/utilities/penghantar-perencanaan-mass']['POST'] = 'api/utilities/penghantar_perencanaan_mass/store';

$route['api/utilities/delete-ibt-perencanaan-by-date']['DELETE'] = 'api/utilities/delete_ibt_perencanaan_by_date/delete';
$route['api/utilities/delete-pembangkit-perencanaan-by-date']['DELETE'] = 'api/utilities/delete_pembangkit_perencanaan_by_date/delete';
$route['api/utilities/delete-penghantar-perencanaan-by-date']['DELETE'] = 'api/utilities/delete_penghantar_perencanaan_by_date/delete';
$route['api/utilities/delete-sistem-perencanaan-by-date']['DELETE'] = 'api/utilities/delete_sistem_perencanaan_by_date/delete';
$route['api/utilities/delete-subsistem-perencanaan-by-date']['DELETE'] = 'api/utilities/delete_subsistem_perencanaan_by_date/delete';
$route['api/utilities/delete-tegangan-perencanaan-by-date']['DELETE'] = 'api/utilities/delete_tegangan_perencanaan_by_date/delete';
$route['api/utilities/delete-trafo-perencanaan-by-date']['DELETE'] = 'api/utilities/delete_trafo_perencanaan_by_date/delete';
$route['api/utilities/delete-ibt-realisasi-by-date']['DELETE'] = 'api/utilities/delete_ibt_realisasi_by_date/delete';
$route['api/utilities/delete-pembangkit-realisasi-by-date']['DELETE'] = 'api/utilities/delete_pembangkit_realisasi_by_date/delete';
$route['api/utilities/delete-penghantar-realisasi-by-date']['DELETE'] = 'api/utilities/delete_penghantar_realisasi_by_date/delete';
$route['api/utilities/delete-sistem-realisasi-by-date']['DELETE'] = 'api/utilities/delete_sistem_realisasi_by_date/delete';
$route['api/utilities/delete-subsistem-realisasi-by-date']['DELETE'] = 'api/utilities/delete_subsistem_realisasi_by_date/delete';
$route['api/utilities/delete-tegangan-realisasi-by-date']['DELETE'] = 'api/utilities/delete_tegangan_realisasi_by_date/delete';
$route['api/utilities/delete-trafo-realisasi-by-date']['DELETE'] = 'api/utilities/delete_trafo_realisasi_by_date/delete';

$route['api/penghantar-generator']['POST'] = 'api/generator_penghantar_table_data/index';
$route['api/ibt-generator']['POST'] = 'api/generator_ibt_table_data/index';
$route['api/trafo-generator']['POST'] = 'api/generator_trafo_table_data/index';
$route['api/tegangan-generator']['POST'] = 'api/generator_tegangan_table_data/index';

$route['api/datatable/interbus-transformer-perencanaan']['POST'] = 'api/datatable/interbus_transformer_perencanaan/index';
$route['api/datatable/interbus-transformer-realisasi']['POST'] = 'api/datatable/interbus_transformer_realisasi/index';
$route['api/datatable/pembangkit-perencanaan']['POST'] = 'api/datatable/pembangkit_perencanaan/index';
$route['api/datatable/pembangkit-realisasi']['POST'] = 'api/datatable/pembangkit_realisasi/index';
$route['api/datatable/penghantar-perencanaan']['POST'] = 'api/datatable/penghantar_perencanaan/index';
$route['api/datatable/penghantar-realisasi']['POST'] = 'api/datatable/penghantar_realisasi/index';
$route['api/datatable/sistem-perencanaan']['POST'] = 'api/datatable/sistem_perencanaan/index';
$route['api/datatable/sistem-realisasi']['POST'] = 'api/datatable/sistem_realisasi/index';
$route['api/datatable/subsistem-perencanaan']['POST'] = 'api/datatable/subsistem_perencanaan/index';
$route['api/datatable/subsistem-realisasi']['POST'] = 'api/datatable/subsistem_realisasi/index';
$route['api/datatable/tegangan-perencanaan']['POST'] = 'api/datatable/tegangan_perencanaan/index';
$route['api/datatable/tegangan-realisasi']['POST'] = 'api/datatable/tegangan_realisasi/index';
$route['api/datatable/trafo-perencanaan']['POST'] = 'api/datatable/trafo_perencanaan/index';
$route['api/datatable/trafo-realisasi']['POST'] = 'api/datatable/trafo_realisasi/index';
