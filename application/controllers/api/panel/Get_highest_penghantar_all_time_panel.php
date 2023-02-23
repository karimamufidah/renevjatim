<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Get_highest_penghantar_all_time_panel extends CI_Controller
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
  }

  private function _get_data($request, &$response)
  {
    if (!$response->success) return;

    $this->load->model("panel/Get_highest_penghantar_all_time_panel_m", "main");
    $this->load->helper("jam");

    $data = array(
      $this->_get_value("eval_0030"), $this->_get_value("eval_0100"),
      $this->_get_value("eval_0130"), $this->_get_value("eval_0200"),
      $this->_get_value("eval_0230"), $this->_get_value("eval_0300"),
      $this->_get_value("eval_0330"), $this->_get_value("eval_0400"),
      $this->_get_value("eval_0430"), $this->_get_value("eval_0500"),
      $this->_get_value("eval_0530"), $this->_get_value("eval_0600"),
      $this->_get_value("eval_0630"), $this->_get_value("eval_0700"),
      $this->_get_value("eval_0730"), $this->_get_value("eval_0800"),
      $this->_get_value("eval_0830"), $this->_get_value("eval_0900"),
      $this->_get_value("eval_0930"), $this->_get_value("eval_1000"),
      $this->_get_value("eval_1030"), $this->_get_value("eval_1100"),
      $this->_get_value("eval_1130"), $this->_get_value("eval_1200"),
      $this->_get_value("eval_1230"), $this->_get_value("eval_1300"),
      $this->_get_value("eval_1330"), $this->_get_value("eval_1400"),
      $this->_get_value("eval_1430"), $this->_get_value("eval_1500"),
      $this->_get_value("eval_1530"), $this->_get_value("eval_1600"),
      $this->_get_value("eval_1630"), $this->_get_value("eval_1700"),
      $this->_get_value("eval_1730"), $this->_get_value("eval_1800"),
      $this->_get_value("eval_1830"), $this->_get_value("eval_1900"),
      $this->_get_value("eval_1930"), $this->_get_value("eval_2000"),
      $this->_get_value("eval_2030"), $this->_get_value("eval_2100"),
      $this->_get_value("eval_2130"), $this->_get_value("eval_2200"),
      $this->_get_value("eval_2230"), $this->_get_value("eval_2300"),
      $this->_get_value("eval_2330"), $this->_get_value("eval_2400")
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

  private function _get_value($column)
  {
    $data = $this->main->show($column);
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
