<?php defined('BASEPATH') OR exit('No direct script access allowed');

if (! function_exists('dd'))
{
  function dd($data)
  {
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    echo json_encode($data);
    die();
  }
}