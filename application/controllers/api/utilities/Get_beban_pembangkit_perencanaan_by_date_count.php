<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Get_beban_pembangkit_perencanaan_by_date_count extends CI_Controller
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
    $response = must_sent_and_filled($response, $request, "date");
  }

  private function _get_data($request, &$response)
  {
    if (!$response->success) return;

    $this->load->model("utilities/get_beban_pembangkit_perencanaan_by_date_count_m", "main");

    $response->data = $this->main->show($request->date);
  }
}
