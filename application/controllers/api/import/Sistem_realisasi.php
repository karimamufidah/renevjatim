<?php

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

defined('BASEPATH') or exit('No direct script access allowed');

class Sistem_realisasi extends CI_Controller
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

    $this->load->model("crud/sistem_realisasi_m", "main");
    $this->load->model("utilities/get_sistem_realisasi_for_insert_m", "existing_data");

    foreach ($request->data as $datum) {
      if (!$datum[1]) continue;

      $general_params = (object) array("tanggal" => $request->tanggal, "nama" => $datum[1]);
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

    $data->patch("satuan", $datum[2]);
    $data->patch("status", $datum[51]);
    $data->patch("eval_0030", $datum[3] ? $datum[3] : null);
    $data->patch("eval_0100", $datum[4] ? $datum[4] : null);
    $data->patch("eval_0130", $datum[5] ? $datum[5] : null);
    $data->patch("eval_0200", $datum[6] ? $datum[6] : null);
    $data->patch("eval_0230", $datum[7] ? $datum[7] : null);
    $data->patch("eval_0300", $datum[8] ? $datum[8] : null);
    $data->patch("eval_0330", $datum[9] ? $datum[9] : null);
    $data->patch("eval_0400", $datum[10] ? $datum[10] : null);
    $data->patch("eval_0430", $datum[11] ? $datum[11] : null);
    $data->patch("eval_0500", $datum[12] ? $datum[12] : null);
    $data->patch("eval_0530", $datum[13] ? $datum[13] : null);
    $data->patch("eval_0600", $datum[14] ? $datum[14] : null);
    $data->patch("eval_0630", $datum[15] ? $datum[15] : null);
    $data->patch("eval_0700", $datum[16] ? $datum[16] : null);
    $data->patch("eval_0730", $datum[17] ? $datum[17] : null);
    $data->patch("eval_0800", $datum[18] ? $datum[18] : null);
    $data->patch("eval_0830", $datum[19] ? $datum[19] : null);
    $data->patch("eval_0900", $datum[20] ? $datum[20] : null);
    $data->patch("eval_0930", $datum[21] ? $datum[21] : null);
    $data->patch("eval_1000", $datum[22] ? $datum[22] : null);
    $data->patch("eval_1030", $datum[23] ? $datum[23] : null);
    $data->patch("eval_1100", $datum[24] ? $datum[24] : null);
    $data->patch("eval_1130", $datum[25] ? $datum[25] : null);
    $data->patch("eval_1200", $datum[26] ? $datum[26] : null);
    $data->patch("eval_1230", $datum[27] ? $datum[27] : null);
    $data->patch("eval_1300", $datum[28] ? $datum[28] : null);
    $data->patch("eval_1330", $datum[29] ? $datum[29] : null);
    $data->patch("eval_1400", $datum[30] ? $datum[30] : null);
    $data->patch("eval_1430", $datum[31] ? $datum[31] : null);
    $data->patch("eval_1500", $datum[32] ? $datum[32] : null);
    $data->patch("eval_1530", $datum[33] ? $datum[33] : null);
    $data->patch("eval_1600", $datum[34] ? $datum[34] : null);
    $data->patch("eval_1630", $datum[35] ? $datum[35] : null);
    $data->patch("eval_1700", $datum[36] ? $datum[36] : null);
    $data->patch("eval_1730", $datum[37] ? $datum[37] : null);
    $data->patch("eval_1800", $datum[38] ? $datum[38] : null);
    $data->patch("eval_1830", $datum[39] ? $datum[39] : null);
    $data->patch("eval_1900", $datum[40] ? $datum[40] : null);
    $data->patch("eval_1930", $datum[41] ? $datum[41] : null);
    $data->patch("eval_2000", $datum[42] ? $datum[42] : null);
    $data->patch("eval_2030", $datum[43] ? $datum[43] : null);
    $data->patch("eval_2100", $datum[44] ? $datum[44] : null);
    $data->patch("eval_2130", $datum[45] ? $datum[45] : null);
    $data->patch("eval_2200", $datum[46] ? $datum[46] : null);
    $data->patch("eval_2230", $datum[47] ? $datum[47] : null);
    $data->patch("eval_2300", $datum[48] ? $datum[48] : null);
    $data->patch("eval_2330", $datum[49] ? $datum[49] : null);
    $data->patch("eval_2400", $datum[50] ? $datum[50] : null);
  }

  private function _insert_new_data($request, $datum)
  {
    $data = new $this->main;
    $data->tanggal = $request->tanggal;
    $data->sistem = $datum[1];
    $data->satuan = $datum[2];
    $data->status = $datum[51];
    $data->created_by = $request->username;
    $data->created_date = date(DATE_W3C);
    $data->eval_0030 = $datum[3] ? $datum[3] : null;
    $data->eval_0100 = $datum[4] ? $datum[4] : null;
    $data->eval_0130 = $datum[5] ? $datum[5] : null;
    $data->eval_0200 = $datum[6] ? $datum[6] : null;
    $data->eval_0230 = $datum[7] ? $datum[7] : null;
    $data->eval_0300 = $datum[8] ? $datum[8] : null;
    $data->eval_0330 = $datum[9] ? $datum[9] : null;
    $data->eval_0400 = $datum[10] ? $datum[10] : null;
    $data->eval_0430 = $datum[11] ? $datum[11] : null;
    $data->eval_0500 = $datum[12] ? $datum[12] : null;
    $data->eval_0530 = $datum[13] ? $datum[13] : null;
    $data->eval_0600 = $datum[14] ? $datum[14] : null;
    $data->eval_0630 = $datum[15] ? $datum[15] : null;
    $data->eval_0700 = $datum[16] ? $datum[16] : null;
    $data->eval_0730 = $datum[17] ? $datum[17] : null;
    $data->eval_0800 = $datum[18] ? $datum[18] : null;
    $data->eval_0830 = $datum[19] ? $datum[19] : null;
    $data->eval_0900 = $datum[20] ? $datum[20] : null;
    $data->eval_0930 = $datum[21] ? $datum[21] : null;
    $data->eval_1000 = $datum[22] ? $datum[22] : null;
    $data->eval_1030 = $datum[23] ? $datum[23] : null;
    $data->eval_1100 = $datum[24] ? $datum[24] : null;
    $data->eval_1130 = $datum[25] ? $datum[25] : null;
    $data->eval_1200 = $datum[26] ? $datum[26] : null;
    $data->eval_1230 = $datum[27] ? $datum[27] : null;
    $data->eval_1300 = $datum[28] ? $datum[28] : null;
    $data->eval_1330 = $datum[29] ? $datum[29] : null;
    $data->eval_1400 = $datum[30] ? $datum[30] : null;
    $data->eval_1430 = $datum[31] ? $datum[31] : null;
    $data->eval_1500 = $datum[32] ? $datum[32] : null;
    $data->eval_1530 = $datum[33] ? $datum[33] : null;
    $data->eval_1600 = $datum[34] ? $datum[34] : null;
    $data->eval_1630 = $datum[35] ? $datum[35] : null;
    $data->eval_1700 = $datum[36] ? $datum[36] : null;
    $data->eval_1730 = $datum[37] ? $datum[37] : null;
    $data->eval_1800 = $datum[38] ? $datum[38] : null;
    $data->eval_1830 = $datum[39] ? $datum[39] : null;
    $data->eval_1900 = $datum[40] ? $datum[40] : null;
    $data->eval_1930 = $datum[41] ? $datum[41] : null;
    $data->eval_2000 = $datum[42] ? $datum[42] : null;
    $data->eval_2030 = $datum[43] ? $datum[43] : null;
    $data->eval_2100 = $datum[44] ? $datum[44] : null;
    $data->eval_2130 = $datum[45] ? $datum[45] : null;
    $data->eval_2200 = $datum[46] ? $datum[46] : null;
    $data->eval_2230 = $datum[47] ? $datum[47] : null;
    $data->eval_2300 = $datum[48] ? $datum[48] : null;
    $data->eval_2330 = $datum[49] ? $datum[49] : null;
    $data->eval_2400 = $datum[50] ? $datum[50] : null;

    $data->store();
  }
}
