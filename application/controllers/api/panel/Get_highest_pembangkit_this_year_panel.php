<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Get_highest_pembangkit_this_year_panel extends CI_Controller
{
  public function index()
  {
    $request = (object) $this->input->get();
    $response = $this->_generate_response();

    $this->_validate($request, $response);
    $this->_get_data($request, $response);

    dd($response);
  }

  private function _generate_response()
  {
    return (object) array("success" => true);
  }

  private function _validate($request, &$response)
  {
    if (!isset($request->nama)) $request->nama = "";
  }

  private function _get_data($request, &$response)
  {
    if (!$response->success) return;

    $this->load->model("panel/Get_highest_pembangkit_this_year_panel_m", "main");
    $this->load->helper("jam");

    $data = array(
      $this->_get_value("eval_0030", $request->nama), $this->_get_value("eval_0100", $request->nama),
      $this->_get_value("eval_0130", $request->nama), $this->_get_value("eval_0200", $request->nama),
      $this->_get_value("eval_0230", $request->nama), $this->_get_value("eval_0300", $request->nama),
      $this->_get_value("eval_0330", $request->nama), $this->_get_value("eval_0400", $request->nama),
      $this->_get_value("eval_0430", $request->nama), $this->_get_value("eval_0500", $request->nama),
      $this->_get_value("eval_0530", $request->nama), $this->_get_value("eval_0600", $request->nama),
      $this->_get_value("eval_0630", $request->nama), $this->_get_value("eval_0700", $request->nama),
      $this->_get_value("eval_0730", $request->nama), $this->_get_value("eval_0800", $request->nama),
      $this->_get_value("eval_0830", $request->nama), $this->_get_value("eval_0900", $request->nama),
      $this->_get_value("eval_0930", $request->nama), $this->_get_value("eval_1000", $request->nama),
      $this->_get_value("eval_1030", $request->nama), $this->_get_value("eval_1100", $request->nama),
      $this->_get_value("eval_1130", $request->nama), $this->_get_value("eval_1200", $request->nama),
      $this->_get_value("eval_1230", $request->nama), $this->_get_value("eval_1300", $request->nama),
      $this->_get_value("eval_1330", $request->nama), $this->_get_value("eval_1400", $request->nama),
      $this->_get_value("eval_1430", $request->nama), $this->_get_value("eval_1500", $request->nama),
      $this->_get_value("eval_1530", $request->nama), $this->_get_value("eval_1600", $request->nama),
      $this->_get_value("eval_1630", $request->nama), $this->_get_value("eval_1700", $request->nama),
      $this->_get_value("eval_1730", $request->nama), $this->_get_value("eval_1800", $request->nama),
      $this->_get_value("eval_1830", $request->nama), $this->_get_value("eval_1900", $request->nama),
      $this->_get_value("eval_1930", $request->nama), $this->_get_value("eval_2000", $request->nama),
      $this->_get_value("eval_2030", $request->nama), $this->_get_value("eval_2100", $request->nama),
      $this->_get_value("eval_2130", $request->nama), $this->_get_value("eval_2200", $request->nama),
      $this->_get_value("eval_2230", $request->nama), $this->_get_value("eval_2300", $request->nama),
      $this->_get_value("eval_2330", $request->nama), $this->_get_value("eval_2400", $request->nama)
    );

    usort($data, function ($firstData, $secondData) {
      return strcmp($firstData->value, $secondData->value);
    });

    $data = $data[0];
    $time = $this->_generate_time($data->waktu);
    $data->logged_at = "$data->tanggal $time";

    unset($data->tanggal);
    unset($data->waktu);

    $response->data = $data;
  }

  private function _get_value($column, $nama)
  {
    $data = $this->main->show($column, $nama);
    $date = new DateTime();

    return $data ? $data : (object) array(
      "tanggal" => $date->format("Y-m-d"),
      "waktu" => $column,
      "value" => 0
    );
  }

  private function _generate_time($timestring)
  {
    $timestring = str_replace("eval_", "", $timestring);
    return substr($timestring, 0, 2) . ":" . substr($timestring, -2, 2);
  }
}
