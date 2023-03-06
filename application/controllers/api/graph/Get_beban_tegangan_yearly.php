<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Get_beban_tegangan_yearly extends CI_Controller
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
    $this->load->model("years/get_tegangan_perencanaan_m", "plan");

    $data = array();

    for ($i = 1; $i <= 12; $i++) {
      $monthly_data = $this->plan->show((object) array(
        "min_max" => $request->min_max,
        "gardu_induk" => $request->gardu_induk,
        "month" => $i,
        "year" => $request->tahun
      ));
      $monthly_data = array_values((array) $monthly_data);

      array_push($data, $request->min_max == "Max" ? $this->_get_max($monthly_data) : $this->_get_min($monthly_data));
    }

    $response->data->plan = $data;
  }

  private function _get_data_realization($request, &$response)
  {
    $this->load->model("years/get_tegangan_realisasi_m", "realization");

    $data = array();

    for ($i = 1; $i <= 12; $i++) {
      $monthly_data = $this->realization->show((object) array(
        "min_max" => $request->min_max,
        "gardu_induk" => $request->gardu_induk,
        "month" => $i,
        "year" => $request->tahun
      ));
      $monthly_data = array_values((array) $monthly_data);

      array_push($data, $request->min_max == "Max" ? $this->_get_max($monthly_data) : $this->_get_min($monthly_data));
    }

    $response->data->realization = $data;
  }

  private function _get_max($data)
  {
    $data = array_values($data);
    return max($data) ? max($data) : 0;
  }

  private function _get_min($data)
  {
    $data = array_values($data);
    return min($data) ? min($data) : 0;
  }
}
