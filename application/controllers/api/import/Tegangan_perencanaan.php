<?php

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

defined('BASEPATH') or exit('No direct script access allowed');

class Tegangan_perencanaan extends CI_Controller
{
  public function store()
  {
    $request = (object) $this->input->post();
    $response = $this->_get_response();

    // Function harus urut!
    $this->_validate($request, $response);
    $this->_upload_file($request, $response);
    $this->_generate_and_insert($request, $response);

    dd($response);
  }

  private function _get_response()
  {
    return (object) array("success" => true);
  }

  private function _validate(&$request, &$response)
  {
    if (!isset($request->username)) $request->username = "-";
    if (!isset($request->tanggal)) $request->tanggal = date("Y-m-d");
  }

  private function _upload_file(&$request, &$response)
  {
    if (!$response->success) return;

    $this->load->library('upload', $this->_get_configuration());

    if (!$this->upload->do_upload('xlsx')) {
      $response = get_false_message_response($response, $this->upload->display_errors('', ''));

      return;
    }

    $upload_result = (object) $this->upload->data();

    $request->data = $this->_get_extracted_data($upload_result);
  }

  private function _get_configuration()
  {
    $config['upload_path'] = './storage/temp/xlsx/';
    $config['allowed_types'] = 'xlsx';
    $config['file_ext_tolower'] = TRUE;
    $config['max_size'] = '5000';

    return $config;
  }

  private function _get_extracted_data($upload_result)
  {
    $reader = new Xlsx();
    $reader->setReadDataOnly(true);

    $spreadsheet = $reader->load($upload_result->full_path);
    $worksheet = $spreadsheet->getActiveSheet();
    $data = $worksheet->toArray();

    unlink($upload_result->full_path);
    array_shift($data);

    return $data;
  }

  private function _generate_and_insert($request, &$response)
  {
    if (!$response->success) return;

    $this->load->model("crud/tegangan_perencanaan_m", "main");
    $this->load->model("utilities/get_tegangan_perencanaan_for_insert_m", "existing_data");

    foreach ($request->data as $datum) {
      if (!$datum[1]) continue;

      $general_params = (object) array("tanggal" => $request->tanggal, "nama" => $datum[1], "busbar" => $datum[2]);
      $existing_data = $this->_get_existing_data($general_params);

      if ($existing_data) {
        $request->id = $existing_data->data_id;
        $this->_update_data($request, $datum);
      } else {
        $this->_insert_new_data($request, $datum);
      }
    }
  }

  private function _get_existing_data($params)
  {
    return $this->existing_data->show($params);
  }

  private function _update_data($request, $datum)
  {
    $data = new $this->main;
    $data->data_id = $request->id;
    $data->updated_by = $request->username;
    $data->updated_date = date(DATE_W3C);

    $data->patch("busbar", $datum[2]);
    $data->patch("kv", $datum[3] ? (string) $datum[3] : null);
    $data->patch("status", $datum[52]);
    $data->patch("ren_0030", $datum[4] ? (string) $datum[4] : null);
    $data->patch("ren_0100", $datum[5] ? (string) $datum[5] : null);
    $data->patch("ren_0130", $datum[6] ? (string) $datum[6] : null);
    $data->patch("ren_0200", $datum[7] ? (string) $datum[7] : null);
    $data->patch("ren_0230", $datum[8] ? (string) $datum[8] : null);
    $data->patch("ren_0300", $datum[9] ? (string) $datum[9] : null);
    $data->patch("ren_0330", $datum[10] ? (string) $datum[10] : null);
    $data->patch("ren_0400", $datum[11] ? (string) $datum[11] : null);
    $data->patch("ren_0430", $datum[12] ? (string) $datum[12] : null);
    $data->patch("ren_0500", $datum[13] ? (string) $datum[13] : null);
    $data->patch("ren_0530", $datum[14] ? (string) $datum[14] : null);
    $data->patch("ren_0600", $datum[15] ? (string) $datum[15] : null);
    $data->patch("ren_0630", $datum[16] ? (string) $datum[16] : null);
    $data->patch("ren_0700", $datum[17] ? (string) $datum[17] : null);
    $data->patch("ren_0730", $datum[18] ? (string) $datum[18] : null);
    $data->patch("ren_0800", $datum[19] ? (string) $datum[19] : null);
    $data->patch("ren_0830", $datum[20] ? (string) $datum[20] : null);
    $data->patch("ren_0900", $datum[21] ? (string) $datum[21] : null);
    $data->patch("ren_0930", $datum[22] ? (string) $datum[22] : null);
    $data->patch("ren_1000", $datum[23] ? (string) $datum[23] : null);
    $data->patch("ren_1030", $datum[24] ? (string) $datum[24] : null);
    $data->patch("ren_1100", $datum[25] ? (string) $datum[25] : null);
    $data->patch("ren_1130", $datum[26] ? (string) $datum[26] : null);
    $data->patch("ren_1200", $datum[27] ? (string) $datum[27] : null);
    $data->patch("ren_1230", $datum[28] ? (string) $datum[28] : null);
    $data->patch("ren_1300", $datum[29] ? (string) $datum[29] : null);
    $data->patch("ren_1330", $datum[30] ? (string) $datum[30] : null);
    $data->patch("ren_1400", $datum[31] ? (string) $datum[31] : null);
    $data->patch("ren_1430", $datum[32] ? (string) $datum[32] : null);
    $data->patch("ren_1500", $datum[33] ? (string) $datum[33] : null);
    $data->patch("ren_1530", $datum[34] ? (string) $datum[34] : null);
    $data->patch("ren_1600", $datum[35] ? (string) $datum[35] : null);
    $data->patch("ren_1630", $datum[36] ? (string) $datum[36] : null);
    $data->patch("ren_1700", $datum[37] ? (string) $datum[37] : null);
    $data->patch("ren_1730", $datum[38] ? (string) $datum[38] : null);
    $data->patch("ren_1800", $datum[39] ? (string) $datum[39] : null);
    $data->patch("ren_1830", $datum[40] ? (string) $datum[40] : null);
    $data->patch("ren_1900", $datum[41] ? (string) $datum[41] : null);
    $data->patch("ren_1930", $datum[42] ? (string) $datum[42] : null);
    $data->patch("ren_2000", $datum[43] ? (string) $datum[43] : null);
    $data->patch("ren_2030", $datum[44] ? (string) $datum[44] : null);
    $data->patch("ren_2100", $datum[45] ? (string) $datum[45] : null);
    $data->patch("ren_2130", $datum[46] ? (string) $datum[46] : null);
    $data->patch("ren_2200", $datum[47] ? (string) $datum[47] : null);
    $data->patch("ren_2230", $datum[48] ? (string) $datum[48] : null);
    $data->patch("ren_2300", $datum[49] ? (string) $datum[49] : null);
    $data->patch("ren_2330", $datum[50] ? (string) $datum[50] : null);
    $data->patch("ren_2400", $datum[51] ? (string) $datum[51] : null);
  }

  private function _insert_new_data($request, $datum)
  {
    $data = new $this->main;
    $data->tanggal = $request->tanggal;
    $data->gardu_induk = $datum[1];
    $data->busbar = $datum[2];
    $data->kv = $datum[3] ? (string) $datum[3] : null;
    $data->status = $datum[52];
    $data->created_by = $request->username;
    $data->created_date = date(DATE_W3C);
    $data->ren_0030 = $datum[4] ? (string) $datum[4] : null;
    $data->ren_0100 = $datum[5] ? (string) $datum[5] : null;
    $data->ren_0130 = $datum[6] ? (string) $datum[6] : null;
    $data->ren_0200 = $datum[7] ? (string) $datum[7] : null;
    $data->ren_0230 = $datum[8] ? (string) $datum[8] : null;
    $data->ren_0300 = $datum[9] ? (string) $datum[9] : null;
    $data->ren_0330 = $datum[10] ? (string) $datum[10] : null;
    $data->ren_0400 = $datum[11] ? (string) $datum[11] : null;
    $data->ren_0430 = $datum[12] ? (string) $datum[12] : null;
    $data->ren_0500 = $datum[13] ? (string) $datum[13] : null;
    $data->ren_0530 = $datum[14] ? (string) $datum[14] : null;
    $data->ren_0600 = $datum[15] ? (string) $datum[15] : null;
    $data->ren_0630 = $datum[16] ? (string) $datum[16] : null;
    $data->ren_0700 = $datum[17] ? (string) $datum[17] : null;
    $data->ren_0730 = $datum[18] ? (string) $datum[18] : null;
    $data->ren_0800 = $datum[19] ? (string) $datum[19] : null;
    $data->ren_0830 = $datum[20] ? (string) $datum[20] : null;
    $data->ren_0900 = $datum[21] ? (string) $datum[21] : null;
    $data->ren_0930 = $datum[22] ? (string) $datum[22] : null;
    $data->ren_1000 = $datum[23] ? (string) $datum[23] : null;
    $data->ren_1030 = $datum[24] ? (string) $datum[24] : null;
    $data->ren_1100 = $datum[25] ? (string) $datum[25] : null;
    $data->ren_1130 = $datum[26] ? (string) $datum[26] : null;
    $data->ren_1200 = $datum[27] ? (string) $datum[27] : null;
    $data->ren_1230 = $datum[28] ? (string) $datum[28] : null;
    $data->ren_1300 = $datum[29] ? (string) $datum[29] : null;
    $data->ren_1330 = $datum[30] ? (string) $datum[30] : null;
    $data->ren_1400 = $datum[31] ? (string) $datum[31] : null;
    $data->ren_1430 = $datum[32] ? (string) $datum[32] : null;
    $data->ren_1500 = $datum[33] ? (string) $datum[33] : null;
    $data->ren_1530 = $datum[34] ? (string) $datum[34] : null;
    $data->ren_1600 = $datum[35] ? (string) $datum[35] : null;
    $data->ren_1630 = $datum[36] ? (string) $datum[36] : null;
    $data->ren_1700 = $datum[37] ? (string) $datum[37] : null;
    $data->ren_1730 = $datum[38] ? (string) $datum[38] : null;
    $data->ren_1800 = $datum[39] ? (string) $datum[39] : null;
    $data->ren_1830 = $datum[40] ? (string) $datum[40] : null;
    $data->ren_1900 = $datum[41] ? (string) $datum[41] : null;
    $data->ren_1930 = $datum[42] ? (string) $datum[42] : null;
    $data->ren_2000 = $datum[43] ? (string) $datum[43] : null;
    $data->ren_2030 = $datum[44] ? (string) $datum[44] : null;
    $data->ren_2100 = $datum[45] ? (string) $datum[45] : null;
    $data->ren_2130 = $datum[46] ? (string) $datum[46] : null;
    $data->ren_2200 = $datum[47] ? (string) $datum[47] : null;
    $data->ren_2230 = $datum[48] ? (string) $datum[48] : null;
    $data->ren_2300 = $datum[49] ? (string) $datum[49] : null;
    $data->ren_2330 = $datum[50] ? (string) $datum[50] : null;
    $data->ren_2400 = $datum[51] ? (string) $datum[51] : null;

    $data->store();
  }
}
