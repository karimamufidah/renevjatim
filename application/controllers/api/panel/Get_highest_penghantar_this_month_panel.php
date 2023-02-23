<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Get_highest_penghantar_this_month_panel extends CI_Controller
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

    $this->load->model("panel/Get_highest_penghantar_this_month_panel_m", "main");

    $response->data = $this->main->show();

    if (!$response->data) {
      $this->load->helper("jam");
      $response->data = (object) array(
        "logged_at" => generate_timezone_timestamp(null),
        "value" => 0
      );
    }
  }
}
