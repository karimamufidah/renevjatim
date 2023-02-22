<?php

class Select2
{
  private $request;
  private $response;
  private $model;
  private $filters_array;

  public function __construct($params)
  {
    try {
      $params = (object) $params;

      if (!isset($params->request)) throw new Exception("request harus disertakan di parameter");
      if (!isset($params->response)) throw new Exception("response harus disertakan di parameter");
      if (!isset($params->model)) throw new Exception("models harus disertakan di parameter");
      if (!isset($params->filters)) throw new Exception("filters harus disertakan di parameter");

      $this->request = $params->request;
      $this->response = $params->response;
      $this->model = $params->model;
      $this->filters_array = $params->filters;
    } catch (Error $error) {
      return (object) array("success" => false, "message" => $error->getMessage());
    }
  }

  /** Index */
  public function index()
  {
    try {
      $request = $this->request;
      $response = $this->response;
      $model = $this->model;
      $filters = $this->filters_array;

      $this->_validate($request, $response);
      $this->_generate_limit_and_offset($request, $response);
      $this->_generate_filters($request, $response, $filters);
      $this->_get_data($response, $model);
      $this->_get_pagination_properties($request, $response, $model);

      return $response;
    } catch (Error $error) {
      return (object) array(
        "success" => false,
        "message" => $error->getMessage()
      );
    }
  }

  private function _validate(&$request, &$response)
  {
    $response = must_sent_and_filled($response, $request, "page");

    if (!isset($request->search)) $request->search = '';
  }

  private function _generate_limit_and_offset($request, &$response)
  {
    if (!$response->success) return;

    $limit = 10;
    $offset = (($request->page - 1) * $limit);

    $this->params = (object) array(
      "search" => $request->search,
      "limit" => $limit,
      "offset" => $offset
    );
  }

  private function _generate_filters($request, &$response, $filters_array)
  {
    if (!$response->success) return;

    $filters = array();

    foreach ($filters_array as $parameter_name => $column_name) {
      $filters[$column_name] = $this->_is_filter_exist($request, $parameter_name) ? $this->_get_filter($request, $parameter_name) : null;
    }

    $this->filters = (object) $filters;
  }

  private function _is_filter_exist($request, $parameter_name)
  {
    $request = (array) $request;

    return isset($request[$parameter_name]);
  }

  private function _get_filter($request, $parameter_name)
  {
    $request = (array) $request;

    return $request[$parameter_name];
  }

  private function _get_data(&$response, $model)
  {
    if (!$response->success) return;

    $response->results = $model->index($this->params, $this->filters);
  }

  private function _get_pagination_properties($request, &$response, $model)
  {
    if (!$response->success) return;

    $count = $model->count($request->search, $this->filters);
    $data_left = $count - ($request->page * $this->params->limit);
    $pagination = new stdClass();
    $pagination->more = ($data_left > 0) ? true : false;

    $response->pagination = $pagination;
  }

  /** Default */
  public function get_default()
  {
    try {
      $request = $this->request;
      $response = $this->response;
      $model = $this->model;
      $filters = $this->filters_array;

      $this->_generate_filters($request, $response, $filters);
      $this->_get_default_data($response, $model);

      return $response;
    } catch (Error $error) {
      return (object) array(
        "success" => false,
        "message" => $error->getMessage()
      );
    }
  }

  private function _get_default_data(&$response, $model)
  {
    if (!$response->success) return;

    $response->data = $model->default_option($this->filters);
  }
}
