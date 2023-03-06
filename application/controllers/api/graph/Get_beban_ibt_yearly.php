<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Get_beban_ibt_yearly extends CI_Controller
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
    $this->load->model("years/get_ibt_perencanaan_m", "plan");

    $data = array();

    for ($i = 1; $i <= 12; $i++) {
      $monthly_data = $this->plan->show((object) array(
        "ibt" => $request->ibt,
        "satuan" => $request->satuan,
        "month" => $i,
        "year" => $request->tahun
      ));
      $monthly_data = array_values((array) $monthly_data);
      rsort($monthly_data);
      $monthly_data = $monthly_data[0];

      array_push($data, $monthly_data ? $monthly_data : 0);
    }

    $response->data->plan = $data;
  }

  private function _get_data_realization($request, &$response)
  {
    $this->load->model("years/get_ibt_realisasi_m", "realization");

    $data = array();

    for ($i = 1; $i <= 12; $i++) {
      $monthly_data = $this->realization->show((object) array(
        "ibt" => $request->ibt,
        "satuan" => $request->satuan,
        "month" => $i,
        "year" => $request->tahun
      ));
      $monthly_data = array_values((array) $monthly_data);
      rsort($monthly_data);
      $monthly_data = $monthly_data[0];

      array_push($data, $monthly_data ? $monthly_data : 0);
    }

    $response->data->realization = $data;
  }
}
