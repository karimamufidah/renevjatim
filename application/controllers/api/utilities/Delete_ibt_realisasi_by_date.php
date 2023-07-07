<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Delete_ibt_realisasi_by_date extends CI_Controller
{
  public function delete()
  {
    $request = json_decode($this->input->raw_input_stream);
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

    $this->load->model("utilities/delete_ibt_realisasi_by_date_m", "main");

    $response->data = $this->main->delete((object) array("tanggal" => $request->date));
  }
}
