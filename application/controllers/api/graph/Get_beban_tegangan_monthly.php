<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Get_beban_tegangan_monthly extends CI_Controller
{

  public function index()
  {
    $request = (object) $this->input->get();
    $response = $this->_generate_response();

    $this->_get_data_plan($request, $response);
    $this->_get_data_realization($request, $response);

    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($response));
  }

  private function _generate_response()
  {
    return (object) array("success" => true, "data" => new stdClass());
  }

  private function _get_data_plan($request, &$response)
  {
    $this->load->model("graph/get_beban_tegangan_monthly_plan_m", "plan");

    $data = $this->plan->show((object) array(
      "gardu_induk" => $request->gardu_induk,
      "bulan" => $request->bulan,
      "tahun" => $request->tahun
    ));

    $data = $data ? $this->_format_data($data, $request) : $this->_generate_empty_data();

    $response->data->plan = $data;
  }

  private function _get_data_realization($request, &$response)
  {
    $this->load->model("graph/get_beban_tegangan_monthly_realization_m", "realization");

    $data = $this->realization->show((object) array(
      "gardu_induk" => $request->gardu_induk,
      "bulan" => $request->bulan,
      "tahun" => $request->tahun
    ));

    $data = $data ? $this->_format_data($data, $request) : $this->_generate_empty_data();

    $response->data->realization = $data;
  }

  private function _format_data($data, $request)
  {
    $formatted_data = array();

    foreach ($data as $datum) {
      $value = $this->_get_used_value((array) $datum, $request);
      $formatted_data[$datum->tanggal] = $value;
    }

    for ($i = 1; $i <= 31; $i++) {
      if (!isset($formatted_data[$i])) $formatted_data[$i] = 0;
    }

    ksort($formatted_data);

    return array_values($formatted_data);
  }

  private function _get_used_value($data, $request)
  {
    $data = array_values($data);
    array_shift($data);

    return $request->min_max == "Max" ? max($data) : min($data);
  }

  private function _generate_empty_data()
  {
    $data = array();

    for ($i = 0; $i < 31; $i++) array_push($data, 0);

    return $data;
  }
}