<?php defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('must_filled')) {
  function must_filled($response, $value, $name)
  {
    if (!$response->success) return $response;
    return (is_null($value) || empty($value)) ? (object) array("success" => false, "message" => $name . " harus diisi.") : $response;
  }
}

if (!function_exists('must_sent_and_filled')) {
  function must_sent_and_filled($response, $request, $name)
  {
    $request = (array) $request;
    $response = get_must_sent_message($response, !isset($request[$name]), $name);

    if ($response->success) $response = must_filled($response, $request[$name], $name);

    return $response;
  }
}

if (!function_exists('get_must_sent_message')) {
  function get_must_sent_message($response, $condition, $name)
  {
    if ($condition) return get_false_message_response($response, $name . " harus diisi.");

    return $response;
  }
}

if (!function_exists('get_false_message_response')) {
  function get_false_message_response($response, $message)
  {
    return (object) array("success" => false, "message" => $message);
  }
}
