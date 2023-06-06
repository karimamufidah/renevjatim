<?php

class Select2Filter
{
  private $default_data;

  public function index($params)
  {
    try {
      if (!isset($params->request)) throw new Exception("request harus disertakan di parameter");
      if (!isset($params->response)) throw new Exception("response harus disertakan di parameter");
      if (!isset($params->model)) throw new Exception("models harus disertakan di parameter");
      if (!isset($params->filters)) throw new Exception("filters harus disertakan di parameter");
      if (!isset($params->default_data)) throw new Exception("default_data harus disertakan di parameter");

      $this->default_data = $params->default_data;

      $this->_validate($params->request, $params->response);
      $this->_generate_limit_and_offset($params->request, $params->response);
      $this->_generate_filters($params->request, $params->response, $params->filters);
      $this->_get_data($params->request, $params->response, $params->model);
      $this->_get_pagination_properties($params->request, $params->response, $params->model);

      return $params->response;
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

  private function _get_data($request, &$response, $model)
  {
    if (!$response->success) return;

    $response->results = $model->index($this->params, $this->filters);

    if ($request->page == 1) array_unshift($response->results, $this->default_data);
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
}
