<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Generator_penghantar_table_data extends CI_Controller
{

  public function index()
  {
    $request = json_decode($this->input->raw_input_stream);
    $response = $this->_generate_response();

    $this->_generate_data($request, $response);

    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($response));
  }

  private function _generate_response()
  {
    return (object) array("success" => true, "data" => new stdClass());
  }

  private function _generate_data($request, &$response)
  {
    $this->load->model("utilities/generator_penghantar_table_m", "generator_table");

    $response = $this->generator_table->generate_or_update((object) array(
      "nama" => $request->nama,
      "tanggal" => $request->tanggal
    ));
  }
}
