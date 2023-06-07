<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Trafo_realisasi extends CI_Controller
{
  public function store()
  {
    $request = json_decode($this->input->raw_input_stream);
    $response = $this->_get_response();

    // Function harus urut!
    $this->_validate($request, $response);
    $this->_generate_and_insert($request, $response);

    dd($response);
  }

  private function _get_response()
  {
    return (object) array("success" => true);
  }

  private function _validate(&$request, &$response)
  {
    $response = must_sent_and_filled($response, $request, "name");

    if (!$response->success) return;

    if (!isset($request->satuan)) $request->satuan = "";
    if (!isset($request->status)) $request->status = 1;
    if (!isset($request->username)) $request->username = "-";
    if (!isset($request->tanggal)) $request->tanggal = date("Y-m-d");
    if (!isset($request->at0030)) $request->at0030 = 0;
    if (!isset($request->at0100)) $request->at0100 = 0;
    if (!isset($request->at0130)) $request->at0130 = 0;
    if (!isset($request->at0200)) $request->at0200 = 0;
    if (!isset($request->at0230)) $request->at0230 = 0;
    if (!isset($request->at0300)) $request->at0300 = 0;
    if (!isset($request->at0330)) $request->at0330 = 0;
    if (!isset($request->at0400)) $request->at0400 = 0;
    if (!isset($request->at0430)) $request->at0430 = 0;
    if (!isset($request->at0500)) $request->at0500 = 0;
    if (!isset($request->at0530)) $request->at0530 = 0;
    if (!isset($request->at0600)) $request->at0600 = 0;
    if (!isset($request->at0630)) $request->at0630 = 0;
    if (!isset($request->at0700)) $request->at0700 = 0;
    if (!isset($request->at0730)) $request->at0730 = 0;
    if (!isset($request->at0800)) $request->at0800 = 0;
    if (!isset($request->at0830)) $request->at0830 = 0;
    if (!isset($request->at0900)) $request->at0900 = 0;
    if (!isset($request->at0930)) $request->at0930 = 0;
    if (!isset($request->at1000)) $request->at1000 = 0;
    if (!isset($request->at1030)) $request->at1030 = 0;
    if (!isset($request->at1100)) $request->at1100 = 0;
    if (!isset($request->at1130)) $request->at1130 = 0;
    if (!isset($request->at1200)) $request->at1200 = 0;
    if (!isset($request->at1230)) $request->at1230 = 0;
    if (!isset($request->at1300)) $request->at1300 = 0;
    if (!isset($request->at1330)) $request->at1330 = 0;
    if (!isset($request->at1400)) $request->at1400 = 0;
    if (!isset($request->at1430)) $request->at1430 = 0;
    if (!isset($request->at1500)) $request->at1500 = 0;
    if (!isset($request->at1530)) $request->at1530 = 0;
    if (!isset($request->at1600)) $request->at1600 = 0;
    if (!isset($request->at1630)) $request->at1630 = 0;
    if (!isset($request->at1700)) $request->at1700 = 0;
    if (!isset($request->at1730)) $request->at1730 = 0;
    if (!isset($request->at1800)) $request->at1800 = 0;
    if (!isset($request->at1830)) $request->at1830 = 0;
    if (!isset($request->at1900)) $request->at1900 = 0;
    if (!isset($request->at1930)) $request->at1930 = 0;
    if (!isset($request->at2000)) $request->at2000 = 0;
    if (!isset($request->at2030)) $request->at2030 = 0;
    if (!isset($request->at2100)) $request->at2100 = 0;
    if (!isset($request->at2130)) $request->at2130 = 0;
    if (!isset($request->at2200)) $request->at2200 = 0;
    if (!isset($request->at2230)) $request->at2230 = 0;
    if (!isset($request->at2300)) $request->at2300 = 0;
    if (!isset($request->at2330)) $request->at2330 = 0;
    if (!isset($request->at2400)) $request->at2400 = 0;
  }

  private function _generate_and_insert($request, &$response)
  {
    if (!$response->success) return;

    $this->load->model("crud/trafo_realisasi_m", "main");
    $this->load->model("utilities/get_trafo_realisasi_for_insert_m", "existing_data");

    $general_params = (object) array("tanggal" => $request->tanggal, "nama" => $request->name, "satuan" => $request->satuan);
    $existing_data = $this->_get_existing_data($general_params);

    if ($existing_data) {
      $request->id = $existing_data->data_id;
      $this->_update_data($request);
    } else {
      $this->_insert_new_data($request);
    }
  }

  private function _get_existing_data($params)
  {
    return $this->existing_data->show($params);
  }

  private function _update_data($request)
  {
    $data = new $this->main;
    $data->data_id = $request->id;
    $data->updated_by = $request->username;
    $data->updated_date = date(DATE_W3C);

    $data->patch("satuan", $request->satuan);
    $data->patch("status", $request->status);
    $data->patch("eval_0030", (string) $request->at0030);
    $data->patch("eval_0100", (string) $request->at0100);
    $data->patch("eval_0130", (string) $request->at0130);
    $data->patch("eval_0200", (string) $request->at0200);
    $data->patch("eval_0230", (string) $request->at0230);
    $data->patch("eval_0300", (string) $request->at0300);
    $data->patch("eval_0330", (string) $request->at0330);
    $data->patch("eval_0400", (string) $request->at0400);
    $data->patch("eval_0430", (string) $request->at0430);
    $data->patch("eval_0500", (string) $request->at0500);
    $data->patch("eval_0530", (string) $request->at0530);
    $data->patch("eval_0600", (string) $request->at0600);
    $data->patch("eval_0630", (string) $request->at0630);
    $data->patch("eval_0700", (string) $request->at0700);
    $data->patch("eval_0730", (string) $request->at0730);
    $data->patch("eval_0800", (string) $request->at0800);
    $data->patch("eval_0830", (string) $request->at0830);
    $data->patch("eval_0900", (string) $request->at0900);
    $data->patch("eval_0930", (string) $request->at0930);
    $data->patch("eval_1000", (string) $request->at0100);
    $data->patch("eval_1030", (string) $request->at0130);
    $data->patch("eval_1100", (string) $request->at1100);
    $data->patch("eval_1130", (string) $request->at1130);
    $data->patch("eval_1200", (string) $request->at1200);
    $data->patch("eval_1230", (string) $request->at1230);
    $data->patch("eval_1300", (string) $request->at1300);
    $data->patch("eval_1330", (string) $request->at1330);
    $data->patch("eval_1400", (string) $request->at1400);
    $data->patch("eval_1430", (string) $request->at1430);
    $data->patch("eval_1500", (string) $request->at1500);
    $data->patch("eval_1530", (string) $request->at1530);
    $data->patch("eval_1600", (string) $request->at1600);
    $data->patch("eval_1630", (string) $request->at1630);
    $data->patch("eval_1700", (string) $request->at1700);
    $data->patch("eval_1730", (string) $request->at1730);
    $data->patch("eval_1800", (string) $request->at1800);
    $data->patch("eval_1830", (string) $request->at1830);
    $data->patch("eval_1900", (string) $request->at1900);
    $data->patch("eval_1930", (string) $request->at1930);
    $data->patch("eval_2000", (string) $request->at2000);
    $data->patch("eval_2030", (string) $request->at2030);
    $data->patch("eval_2100", (string) $request->at2100);
    $data->patch("eval_2130", (string) $request->at2130);
    $data->patch("eval_2200", (string) $request->at2200);
    $data->patch("eval_2230", (string) $request->at2230);
    $data->patch("eval_2300", (string) $request->at2300);
    $data->patch("eval_2330", (string) $request->at2330);
    $data->patch("eval_2400", (string) $request->at2400);
  }

  private function _insert_new_data($request)
  {
    $data = new $this->main;
    $data->tanggal = $request->tanggal;
    $data->trafo = $request->name;
    $data->satuan = $request->satuan;
    $data->status = $request->status;
    $data->created_by = $request->username;
    $data->created_date = date(DATE_W3C);
    $data->eval_0030 = (string) $request->at0030;
    $data->eval_0100 = (string) $request->at0100;
    $data->eval_0130 = (string) $request->at0130;
    $data->eval_0200 = (string) $request->at0200;
    $data->eval_0230 = (string) $request->at0230;
    $data->eval_0300 = (string) $request->at0300;
    $data->eval_0330 = (string) $request->at0330;
    $data->eval_0400 = (string) $request->at0400;
    $data->eval_0430 = (string) $request->at0430;
    $data->eval_0500 = (string) $request->at0500;
    $data->eval_0530 = (string) $request->at0530;
    $data->eval_0600 = (string) $request->at0600;
    $data->eval_0630 = (string) $request->at0630;
    $data->eval_0700 = (string) $request->at0700;
    $data->eval_0730 = (string) $request->at0730;
    $data->eval_0800 = (string) $request->at0800;
    $data->eval_0830 = (string) $request->at0830;
    $data->eval_0900 = (string) $request->at0900;
    $data->eval_0930 = (string) $request->at0930;
    $data->eval_1000 = (string) $request->at0100;
    $data->eval_1030 = (string) $request->at0130;
    $data->eval_1100 = (string) $request->at1100;
    $data->eval_1130 = (string) $request->at1130;
    $data->eval_1200 = (string) $request->at1200;
    $data->eval_1230 = (string) $request->at1230;
    $data->eval_1300 = (string) $request->at1300;
    $data->eval_1330 = (string) $request->at1330;
    $data->eval_1400 = (string) $request->at1400;
    $data->eval_1430 = (string) $request->at1430;
    $data->eval_1500 = (string) $request->at1500;
    $data->eval_1530 = (string) $request->at1530;
    $data->eval_1600 = (string) $request->at1600;
    $data->eval_1630 = (string) $request->at1630;
    $data->eval_1700 = (string) $request->at1700;
    $data->eval_1730 = (string) $request->at1730;
    $data->eval_1800 = (string) $request->at1800;
    $data->eval_1830 = (string) $request->at1830;
    $data->eval_1900 = (string) $request->at1900;
    $data->eval_1930 = (string) $request->at1930;
    $data->eval_2000 = (string) $request->at2000;
    $data->eval_2030 = (string) $request->at2030;
    $data->eval_2100 = (string) $request->at2100;
    $data->eval_2130 = (string) $request->at2130;
    $data->eval_2200 = (string) $request->at2200;
    $data->eval_2230 = (string) $request->at2230;
    $data->eval_2300 = (string) $request->at2300;
    $data->eval_2330 = (string) $request->at2330;
    $data->eval_2400 = (string) $request->at2400;

    $data->store();
  }
}
