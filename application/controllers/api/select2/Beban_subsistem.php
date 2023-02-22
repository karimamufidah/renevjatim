<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beban_subsistem extends CI_Controller
{
  function __construct()
  {
    parent::__construct();

    $request = (object) $this->input->get();
    $response = $this->_generate_response();

    $this->load->model('select2/beban_subsistem_m', 'main');

    $params = new stdClass();
    $params->request = $request;
    $params->response = $response;
    $params->model = $this->main;
    $params->filters = array();

    $this->load->library('select2', (array) $params);
  }

  private function _generate_response()
  {
    return (object) array("success" => true);
  }

  public function index()
  {
    dd($this->select2->index());
  }

  public function default_data()
  {
    dd($this->select2->get_default());
  }
}
