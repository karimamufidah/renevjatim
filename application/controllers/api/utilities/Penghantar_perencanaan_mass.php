<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penghantar_perencanaan_mass extends CI_Controller
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
    $response = must_sent_and_filled($response, $request, "data");

    if (!$response->success) return;

    $this->_fill_unfilled_request_data($request->data);
  }

  private function _fill_unfilled_request_data($data)
  {
    foreach ($data as $datum) {
      if (!isset($datum->name)) $datum->name = "Tanpa Nama";
      if (!isset($datum->kv)) $datum->kv = null;
      if (!isset($datum->satuan)) $datum->satuan = "";
      if (!isset($datum->inom)) $datum->inom = null;
      if (!isset($datum->numerik)) $datum->numerik = "";
      if (!isset($datum->status)) $datum->status = 1;
      if (!isset($datum->username)) $datum->username = "-";
      if (!isset($datum->tanggal)) $datum->tanggal = date("Y-m-d");
      if (!isset($datum->at0030)) $datum->at0030 = 0;
      if (!isset($datum->at0100)) $datum->at0100 = 0;
      if (!isset($datum->at0130)) $datum->at0130 = 0;
      if (!isset($datum->at0200)) $datum->at0200 = 0;
      if (!isset($datum->at0230)) $datum->at0230 = 0;
      if (!isset($datum->at0300)) $datum->at0300 = 0;
      if (!isset($datum->at0330)) $datum->at0330 = 0;
      if (!isset($datum->at0400)) $datum->at0400 = 0;
      if (!isset($datum->at0430)) $datum->at0430 = 0;
      if (!isset($datum->at0500)) $datum->at0500 = 0;
      if (!isset($datum->at0530)) $datum->at0530 = 0;
      if (!isset($datum->at0600)) $datum->at0600 = 0;
      if (!isset($datum->at0630)) $datum->at0630 = 0;
      if (!isset($datum->at0700)) $datum->at0700 = 0;
      if (!isset($datum->at0730)) $datum->at0730 = 0;
      if (!isset($datum->at0800)) $datum->at0800 = 0;
      if (!isset($datum->at0830)) $datum->at0830 = 0;
      if (!isset($datum->at0900)) $datum->at0900 = 0;
      if (!isset($datum->at0930)) $datum->at0930 = 0;
      if (!isset($datum->at1000)) $datum->at1000 = 0;
      if (!isset($datum->at1030)) $datum->at1030 = 0;
      if (!isset($datum->at1100)) $datum->at1100 = 0;
      if (!isset($datum->at1130)) $datum->at1130 = 0;
      if (!isset($datum->at1200)) $datum->at1200 = 0;
      if (!isset($datum->at1230)) $datum->at1230 = 0;
      if (!isset($datum->at1300)) $datum->at1300 = 0;
      if (!isset($datum->at1330)) $datum->at1330 = 0;
      if (!isset($datum->at1400)) $datum->at1400 = 0;
      if (!isset($datum->at1430)) $datum->at1430 = 0;
      if (!isset($datum->at1500)) $datum->at1500 = 0;
      if (!isset($datum->at1530)) $datum->at1530 = 0;
      if (!isset($datum->at1600)) $datum->at1600 = 0;
      if (!isset($datum->at1630)) $datum->at1630 = 0;
      if (!isset($datum->at1700)) $datum->at1700 = 0;
      if (!isset($datum->at1730)) $datum->at1730 = 0;
      if (!isset($datum->at1800)) $datum->at1800 = 0;
      if (!isset($datum->at1830)) $datum->at1830 = 0;
      if (!isset($datum->at1900)) $datum->at1900 = 0;
      if (!isset($datum->at1930)) $datum->at1930 = 0;
      if (!isset($datum->at2000)) $datum->at2000 = 0;
      if (!isset($datum->at2030)) $datum->at2030 = 0;
      if (!isset($datum->at2100)) $datum->at2100 = 0;
      if (!isset($datum->at2130)) $datum->at2130 = 0;
      if (!isset($datum->at2200)) $datum->at2200 = 0;
      if (!isset($datum->at2230)) $datum->at2230 = 0;
      if (!isset($datum->at2300)) $datum->at2300 = 0;
      if (!isset($datum->at2330)) $datum->at2330 = 0;
      if (!isset($datum->at2400)) $datum->at2400 = 0;
    }
  }

  private function _generate_and_insert($request, &$response)
  {
    if (!$response->success) return;

    $this->load->model("utilities/penghantar_perencanaan_mass_m", "main");
    $this->load->model("utilities/get_penghantar_perencanaan_id_m", "id_getter");

    $insert_list = array();
    $update_list = array();

    foreach ($request->data as $datum) {
      $general_params = (object) array("tanggal" => $datum->tanggal, "nama" => $datum->name, "satuan" => $datum->satuan);

      if ($id = $this->_get_id($general_params)) {
        $datum->dataID = $id;
        array_push($update_list, $datum);
      } else {
        array_push($insert_list, $datum);
      }
    }

    if (count($insert_list)) $this->_insert_data($insert_list);
    if (count($update_list)) $this->_update_data($update_list);
  }

  private function _get_id($params)
  {
    return $this->id_getter->show($params);
  }

  private function _insert_data($insert_list)
  {
    $updated_date = date(DATE_W3C);
    $data = array();

    foreach ($insert_list as $datum) {
      array_push($data, (object) array(
        "tanggal" => (string) $datum->tanggal,
        "ruas" => (string) $datum->name,
        "kv" => (string) $datum->kv,
        "inom" => (string) $datum->inom,
        "satuan" => $datum->satuan,
        "status" => $datum->status,
        "created_date" => $updated_date,
        "created_by" => $datum->username,
        "ren_0030" => (string) $datum->at0030,
        "ren_0100" => (string) $datum->at0100,
        "ren_0130" => (string) $datum->at0130,
        "ren_0200" => (string) $datum->at0200,
        "ren_0230" => (string) $datum->at0230,
        "ren_0300" => (string) $datum->at0300,
        "ren_0330" => (string) $datum->at0330,
        "ren_0400" => (string) $datum->at0400,
        "ren_0430" => (string) $datum->at0430,
        "ren_0500" => (string) $datum->at0500,
        "ren_0530" => (string) $datum->at0530,
        "ren_0600" => (string) $datum->at0600,
        "ren_0630" => (string) $datum->at0630,
        "ren_0700" => (string) $datum->at0700,
        "ren_0730" => (string) $datum->at0730,
        "ren_0800" => (string) $datum->at0800,
        "ren_0830" => (string) $datum->at0830,
        "ren_0900" => (string) $datum->at0900,
        "ren_0930" => (string) $datum->at0930,
        "ren_1000" => (string) $datum->at0100,
        "ren_1030" => (string) $datum->at0130,
        "ren_1100" => (string) $datum->at1100,
        "ren_1130" => (string) $datum->at1130,
        "ren_1200" => (string) $datum->at1200,
        "ren_1230" => (string) $datum->at1230,
        "ren_1300" => (string) $datum->at1300,
        "ren_1330" => (string) $datum->at1330,
        "ren_1400" => (string) $datum->at1400,
        "ren_1430" => (string) $datum->at1430,
        "ren_1500" => (string) $datum->at1500,
        "ren_1530" => (string) $datum->at1530,
        "ren_1600" => (string) $datum->at1600,
        "ren_1630" => (string) $datum->at1630,
        "ren_1700" => (string) $datum->at1700,
        "ren_1730" => (string) $datum->at1730,
        "ren_1800" => (string) $datum->at1800,
        "ren_1830" => (string) $datum->at1830,
        "ren_1900" => (string) $datum->at1900,
        "ren_1930" => (string) $datum->at1930,
        "ren_2000" => (string) $datum->at2000,
        "ren_2030" => (string) $datum->at2030,
        "ren_2100" => (string) $datum->at2100,
        "ren_2130" => (string) $datum->at2130,
        "ren_2200" => (string) $datum->at2200,
        "ren_2230" => (string) $datum->at2230,
        "ren_2300" => (string) $datum->at2300,
        "ren_2330" => (string) $datum->at2330,
        "ren_2400" => (string) $datum->at2400
      ));
    }

    $this->main->store($data);
  }

  private function _update_data($update_list)
  {
    $updated_date = date(DATE_W3C);
    $data = array();


    foreach ($update_list as $datum) {
      array_push($data, (object) array(
        "data_id" => (string) $datum->dataID,
        "kv" => (string) $datum->kv,
        "inom" => (string) $datum->inom,
        "satuan" => $datum->satuan,
        "status" => $datum->status,
        "updated_date" => $updated_date,
        "updated_by" => $datum->username,
        "ren_0030" => (string) $datum->at0030,
        "ren_0100" => (string) $datum->at0100,
        "ren_0130" => (string) $datum->at0130,
        "ren_0200" => (string) $datum->at0200,
        "ren_0230" => (string) $datum->at0230,
        "ren_0300" => (string) $datum->at0300,
        "ren_0330" => (string) $datum->at0330,
        "ren_0400" => (string) $datum->at0400,
        "ren_0430" => (string) $datum->at0430,
        "ren_0500" => (string) $datum->at0500,
        "ren_0530" => (string) $datum->at0530,
        "ren_0600" => (string) $datum->at0600,
        "ren_0630" => (string) $datum->at0630,
        "ren_0700" => (string) $datum->at0700,
        "ren_0730" => (string) $datum->at0730,
        "ren_0800" => (string) $datum->at0800,
        "ren_0830" => (string) $datum->at0830,
        "ren_0900" => (string) $datum->at0900,
        "ren_0930" => (string) $datum->at0930,
        "ren_1000" => (string) $datum->at0100,
        "ren_1030" => (string) $datum->at0130,
        "ren_1100" => (string) $datum->at1100,
        "ren_1130" => (string) $datum->at1130,
        "ren_1200" => (string) $datum->at1200,
        "ren_1230" => (string) $datum->at1230,
        "ren_1300" => (string) $datum->at1300,
        "ren_1330" => (string) $datum->at1330,
        "ren_1400" => (string) $datum->at1400,
        "ren_1430" => (string) $datum->at1430,
        "ren_1500" => (string) $datum->at1500,
        "ren_1530" => (string) $datum->at1530,
        "ren_1600" => (string) $datum->at1600,
        "ren_1630" => (string) $datum->at1630,
        "ren_1700" => (string) $datum->at1700,
        "ren_1730" => (string) $datum->at1730,
        "ren_1800" => (string) $datum->at1800,
        "ren_1830" => (string) $datum->at1830,
        "ren_1900" => (string) $datum->at1900,
        "ren_1930" => (string) $datum->at1930,
        "ren_2000" => (string) $datum->at2000,
        "ren_2030" => (string) $datum->at2030,
        "ren_2100" => (string) $datum->at2100,
        "ren_2130" => (string) $datum->at2130,
        "ren_2200" => (string) $datum->at2200,
        "ren_2230" => (string) $datum->at2230,
        "ren_2300" => (string) $datum->at2300,
        "ren_2330" => (string) $datum->at2330,
        "ren_2400" => (string) $datum->at2400
      ));
    }

    $this->main->update($data);
  }
}
