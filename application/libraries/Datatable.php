<?php

/**
 * Datatable Library for Codeigniter 3 v2.0
 * Created by Muslim Aswaja
 * Created at 2022-10-12
 */

class Datatable
{
    private $filters;
    private $order_column;
    private $order_direction;

    public function index($params)
    {
        try {
            if (!isset($params->request)) throw new Exception("request harus disertakan di parameter");
            if (!isset($params->response)) throw new Exception("response harus disertakan di parameter");
            if (!isset($params->model)) throw new Exception("models harus disertakan di parameter");
            if (!isset($params->order_options)) throw new Exception("order_options harus disertakan di parameter");
            if (!isset($params->filters)) throw new Exception("order_options harus disertakan di parameter");

            $this->_validate($params->request, $params->response);
            $this->_generate_sort($params->request, $params->response, $params->order_options);
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

    private function _validate($request, &$response)
    {
        $response = must_sent_and_filled($response, $request, "draw");
        $response = must_sent_and_filled($response, $request, "length");

        $response = get_must_sent_message($response, !isset($request->search), "search");
        $response = get_must_sent_message($response, !isset($request->start), "start");
        $response = get_must_sent_message($response, !isset($request->order[0]['column']), "order[0]['column']");
        $response = get_must_sent_message($response, !isset($request->order[0]['dir']), "order[0]['dir']");

        $response = must_filled($response, $request->start !== null, "start");
        $response = must_filled($response, $request->order[0]['column'] !== null, "order[0]['column']");
        $response = must_filled($response, $request->order[0]['dir'], "order[0]['dir']");
    }

    private function _generate_sort($request, &$response, $order_options)
    {
        if (!$response->success) return;

        $this->order_column = get_order_column($order_options, $request->order[0]['column']);
        $this->order_direction = get_order_direction($request->order[0]['dir']);
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

        $response->data = $model->index(
            $request->start,
            $request->length,
            $request->search['value'],
            $this->order_column,
            $this->order_direction,
            $this->filters
        );
    }

    private function _get_pagination_properties($request, &$response, $model)
    {
        if (!$response->success) return;

        $response->draw = $request->draw;
        $response->recordsTotal = $model->count('', $this->filters);
        $response->recordsFiltered = $model->count($request->search['value'], $this->filters);
    }
}
