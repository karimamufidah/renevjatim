<?php defined('BASEPATH') or exit('No direct script access allowed');

class Satuan_penghantar_filter extends CI_Controller
{
  public function index()
  {
    $request = (object) $this->input->get();
    $response = $this->_generate_response();

    $this->load->model('select2/satuan_pembangkit_m', 'main');
    $this->load->library('Select2Filter');

    $params = new stdClass();
    $params->request = $request;
    $params->response = $response;
    $params->model = $this->main;
    $params->filters = array();
    $params->default_data = $this->_generate_all_option_default();

    $select2 = new Select2Filter();
    $select2->index($params);

    dd($response);
  }

  public function default_data()
  {
    $response = $this->_generate_response();

    $response->data = $this->_generate_all_option_default();

    dd($response);
  }

  private function _generate_response()
  {
    return (object) array("success" => true);
  }

  private function _generate_all_option_default()
  {
    return (object) array("id" => 0, "text" => "Semua Satuan");
  }
}
