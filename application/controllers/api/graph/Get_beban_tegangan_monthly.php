<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Get_beban_tegangan_monthly extends CI_Controller
{

  public function index()
  {
    $request = (object) $this->input->get();
    $response = $this->_generate_response();

    $this->_get_data_plan($request, $response);
    $this->_get_data_realization($request, $response);

    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($response));
  }

  private function _generate_response()
  {
    return (object) array("success" => true, "data" => new stdClass());
  }

  private function _get_data_plan($request, &$response)
  {
    $this->load->model("graph/get_beban_tegangan_monthly_plan_m", "plan");

    $data = array();

    for ($i = 1; $i <= 31; $i++) {
      if ($i > $this->_get_max_day("$request->tahun-$request->bulan")) {
        array_push($data, 0);
        continue;
      }

      $day = $i < 10 ? "0$i" : $i;
      $plan = $this->plan->show((object) array(
        "gardu_induk" => $request->gardu_induk,
        "min_max" => $request->min_max,
        "tanggal" => "$request->tahun-$request->bulan-$day"
      ));

      if (!$plan) {
        $plan = 0;
      } else {
        $plan = array_values((array) $plan);
        $plan = $this->_get_used_value($plan, $request);
      }

      array_push($data, $plan);
    }

    $response->data->plan = $data;
  }

  private function _get_data_realization($request, &$response)
  {
    $this->load->model("graph/get_beban_tegangan_monthly_realization_m", "realization");

    $data = array();

    for ($i = 1; $i <= 31; $i++) {
      if ($i > $this->_get_max_day("$request->tahun-$request->bulan")) {
        array_push($data, 0);
        continue;
      }

      $day = $i < 10 ? "0$i" : $i;
      $realization = $this->realization->show((object) array(
        "gardu_induk" => $request->gardu_induk,
        "min_max" => $request->min_max,
        "tanggal" => "$request->tahun-$request->bulan-$day"
      ));

      if (!$realization) {
        $realization = 0;
      } else {
        $realization = array_values((array) $realization);
        $realization = $this->_get_used_value($realization, $request);
      }

      array_push($data, $realization);
    }

    $response->data->realization = $data;
  }

  private function _get_used_value($data, $request)
  {
    $data = array_values($data);
    array_shift($data);

    return $request->min_max == "Max" ? max($data) : min($data);
  }

  private function _get_max_day($year_month)
  {
    $year_month_array = explode('-', $year_month);

    if (in_array($year_month_array[1], array(1, 3, 5, 7, 8, 10, 12))) return 31;
    if (in_array($year_month_array[1], array(2, 4, 6, 9, 11))) return 30;

    return $this->_is_leap_year($year_month_array[0]) ? 29 : 28;
  }

  private function _is_leap_year($year)
  {
    return date('L', mktime(0, 0, 0, 1, 1, $year));
  }
}
