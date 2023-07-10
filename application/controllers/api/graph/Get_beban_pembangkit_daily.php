<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Get_beban_pembangkit_daily extends CI_Controller
{

  public function index()
  {
    $request = (object) $this->input->get();
    $response = $this->_generate_response();

    $request->pembangkit = str_replace("~", "#", $request->pembangkit);

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
    $this->load->model("graph/get_beban_pembangkit_daily_plan_m", "plan");

    $data = $this->plan->show((object) array(
      "pembangkit" => $request->pembangkit,
      "satuan" => $request->satuan,
      "tanggal" => $request->tanggal
    ));

    $data = $data ? $this->_format_data($data) : $this->_generate_empty_data();

    $response->data->plan = $data;
  }

  private function _get_data_realization($request, &$response)
  {
    $this->load->model("graph/get_beban_pembangkit_daily_realization_m", "realization");

    $data = $this->realization->show((object) array(
      "pembangkit" => $request->pembangkit,
      "satuan" => $request->satuan,
      "tanggal" => $request->tanggal
    ));

    $data = $data ? $this->_format_data($data) : $this->_generate_empty_data();

    $response->data->realization = $data;
  }

  private function _format_data($data)
  {
    return array_values((array) $data);
  }

  private function _generate_empty_data()
  {
    $data = array();

    for ($i = 0; $i < 48; $i++) array_push($data, 0);

    return $data;
  }
}
