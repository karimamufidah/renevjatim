<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

defined('BASEPATH') or exit('No direct script access allowed');

class Xlsx_tegangan extends CI_Controller
{

  public function index()
  {
    $request = (object) $this->input->get();
    $response = $this->_generate_response();

    $this->_validate($request, $response);
    $this->_get_data($request, $response);
    $this->_generate_spreadsheet($request, $response);
    $this->_download_spreadsheet($request);
  }

  private function _generate_response()
  {
    return (object) array("success" => true, "data" => new stdClass());
  }

  private function _validate($request, &$response)
  {
    if (!isset($request->tegangan)) $request->tegangan = null;
    if (!isset($request->min_max)) $request->min_max = null;
    if (!isset($request->date1)) $request->date1 = null;
    if (!isset($request->date2)) $request->date2 = null;
    if (!isset($request->date3)) $request->date3 = null;
    if (!isset($request->date4)) $request->date4 = null;
    if (!isset($request->date5)) $request->date5 = null;
    if (!isset($request->isWithPlan1)) $request->isWithPlan1 = false;
    if (!isset($request->isWithPlan2)) $request->isWithPlan2 = false;
    if (!isset($request->isWithPlan3)) $request->isWithPlan3 = false;
    if (!isset($request->isWithPlan4)) $request->isWithPlan4 = false;
    if (!isset($request->isWithPlan5)) $request->isWithPlan5 = false;
  }

  private function _get_data($request, &$response)
  {
    $this->load->model("years/get_tegangan_perencanaan_m", "plan");
    $this->load->model("years/get_tegangan_realisasi_m", "realization");

    if ($request->date1) {
      $data_1 = $this->_get_data_detail((object) array(
        "min_max" => $request->min_max,
        "tegangan" => $request->tegangan,
        "tanggal" => $request->date1,
        "isWithPlan" => $request->isWithPlan1
      ));
    }

    if ($request->date2) {
      $data_2 = $this->_get_data_detail((object) array(
        "min_max" => $request->min_max,
        "tegangan" => $request->tegangan,
        "tanggal" => $request->date2,
        "isWithPlan" => $request->isWithPlan2
      ));
    }

    if ($request->date3) {
      $data_3 = $this->_get_data_detail((object) array(
        "min_max" => $request->min_max,
        "tegangan" => $request->tegangan,
        "tanggal" => $request->date3,
        "isWithPlan" => $request->isWithPlan3
      ));
    }

    if ($request->date4) {
      $data_4 = $this->_get_data_detail((object) array(
        "min_max" => $request->min_max,
        "tegangan" => $request->tegangan,
        "tanggal" => $request->date4,
        "isWithPlan" => $request->isWithPlan4
      ));
    }

    if ($request->date5) {
      $data_5 = $this->_get_data_detail((object) array(
        "min_max" => $request->min_max,
        "tegangan" => $request->tegangan,
        "tanggal" => $request->date5,
        "isWithPlan" => $request->isWithPlan5
      ));
    }

    $request->data = (object) array(
      "data1" => isset($data_1) ? $data_1 : null,
      "data2" => isset($data_2) ? $data_2 : null,
      "data3" => isset($data_3) ? $data_3 : null,
      "data4" => isset($data_4) ? $data_4 : null,
      "data5" => isset($data_5) ? $data_5 : null
    );
  }

  private function _get_data_detail($filters)
  {
    $data = array(
      "tegangan" => $filters->tegangan,
      "year" => $filters->tanggal
    );

    for ($i = 1; $i <= 12; $i++) {
      $plan = $this->plan->show((object) array(
        "gardu_induk" => $filters->tegangan,
        "min_max" => $filters->min_max,
        "month" => "$i",
        "year" => "$filters->tanggal"
      ));

      if (!$plan) {
        $plan = 0;
      } else {
        $plan = array_values((array) $plan);

        if ($filters->min_max == "Max") {
          rsort($plan);
        } else {
          sort($plan);
        }

        $plan = $plan[0];
      }

      $data["ren_$i"] = $plan;

      $realization = $this->realization->show((object) array(
        "gardu_induk" => $filters->tegangan,
        "min_max" => $filters->min_max,
        "month" => "$i",
        "year" => "$filters->tanggal"
      ));

      if (!$realization) {
        $realization = 0;
      } else {
        $realization = array_values((array) $realization);

        if ($filters->min_max == "Max") {
          rsort($realization);
        } else {
          sort($realization);
        }

        $realization = $realization[0];
      }

      $data["eval_$i"] = $realization;
    }

    return (object) $data;
  }

  private function _get_max_day($year_month)
  {
    $year_month_array = explode('-', $year_month);

    if (in_array($year_month_array[1], array(1, 3, 5, 7, 8, 10, 12))) return 31;
    if (in_array($year_month_array[1], array(4, 6, 9, 11))) return 30;

    return $this->_is_leap_year($year_month_array[0]) ? 29 : 28;
  }

  private function _is_leap_year($year)
  {
    return date('L', mktime(0, 0, 0, 1, 1, $year));
  }

  private function _generate_spreadsheet(&$request, &$response)
  {
    if (!$response->success) return;

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $this->_generate_title($request, $sheet);
    $this->_generate_table($request, $sheet);

    $request->spreadsheet = $spreadsheet;
  }

  private function _generate_title($request, &$sheet)
  {
    $sheet->setCellValue('A1', 'Nama');
    $sheet->setCellValue('B1', 'Tahun');
    $sheet->setCellValue('C1', 'Tipe');

    if (
      $request->isWithPlan1 || $request->isWithPlan2 || $request->isWithPlan3
      || $request->isWithPlan4 || $request->isWithPlan5
    ) {
      $this->_generate_title_data($sheet);
    } else {
      $this->_generate_title_data_eval_only($sheet);
    }
  }

  private function _generate_title_data(&$sheet)
  {
    $sheet->setCellValue('D1', 'ren_1');
    $sheet->setCellValue('E1', 'eval_1');
    $sheet->setCellValue('F1', 'ren_2');
    $sheet->setCellValue('G1', 'eval_2');
    $sheet->setCellValue('H1', 'ren_3');
    $sheet->setCellValue('I1', 'eval_3');
    $sheet->setCellValue('J1', 'ren_4');
    $sheet->setCellValue('K1', 'eval_4');
    $sheet->setCellValue('L1', 'ren_5');
    $sheet->setCellValue('M1', 'eval_5');
    $sheet->setCellValue('N1', 'ren_6');
    $sheet->setCellValue('O1', 'eval_6');
    $sheet->setCellValue('P1', 'ren_7');
    $sheet->setCellValue('Q1', 'eval_7');
    $sheet->setCellValue('R1', 'ren_8');
    $sheet->setCellValue('S1', 'eval_8');
    $sheet->setCellValue('T1', 'ren_9');
    $sheet->setCellValue('U1', 'eval_9');
    $sheet->setCellValue('V1', 'ren_10');
    $sheet->setCellValue('W1', 'eval_10');
    $sheet->setCellValue('X1', 'ren_11');
    $sheet->setCellValue('Y1', 'eval_11');
    $sheet->setCellValue('Z1', 'ren_12');
    $sheet->setCellValue('AA1', 'eval_12');
  }

  private function _generate_title_data_eval_only(&$sheet)
  {
    $sheet->setCellValue('D1', 'eval_1');
    $sheet->setCellValue('E1', 'eval_2');
    $sheet->setCellValue('F1', 'eval_3');
    $sheet->setCellValue('G1', 'eval_4');
    $sheet->setCellValue('H1', 'eval_5');
    $sheet->setCellValue('I1', 'eval_6');
    $sheet->setCellValue('J1', 'eval_7');
    $sheet->setCellValue('K1', 'eval_8');
    $sheet->setCellValue('L1', 'eval_9');
    $sheet->setCellValue('M1', 'eval_10');
    $sheet->setCellValue('N1', 'eval_11');
    $sheet->setCellValue('O1', 'eval_12');
  }

  private function _generate_table($request, &$sheet)
  {
    $request->index = 2;

    if ($request->date1) $this->_generate_table_row($request, $request->data->data1, $sheet);
    if ($request->date2) $this->_generate_table_row($request, $request->data->data2, $sheet);
    if ($request->date3) $this->_generate_table_row($request, $request->data->data3, $sheet);
    if ($request->date4) $this->_generate_table_row($request, $request->data->data4, $sheet);
    if ($request->date5) $this->_generate_table_row($request, $request->data->data5, $sheet);
  }

  private function _generate_table_row(&$request, $data, &$sheet)
  {
    $sheet->setCellValue("A$request->index", $request->tegangan);
    $sheet->setCellValue("B$request->index", $data->year);
    $sheet->setCellValue("C$request->index", $request->min_max);

    if (
      $request->isWithPlan1 || $request->isWithPlan2 || $request->isWithPlan3
      || $request->isWithPlan4 || $request->isWithPlan5
    ) {
      $this->_generate_table_data($request, $data, $sheet);
    } else {
      $this->_generate_table_data_eval_only($request, $data, $sheet);
    }

    $request->index++;
  }

  private function _generate_table_data($request, $data, &$sheet)
  {
    $sheet->setCellValue("D$request->index", $data->ren_1);
    $sheet->setCellValue("E$request->index", $data->eval_1);
    $sheet->setCellValue("F$request->index", $data->ren_2);
    $sheet->setCellValue("G$request->index", $data->eval_2);
    $sheet->setCellValue("H$request->index", $data->ren_3);
    $sheet->setCellValue("I$request->index", $data->eval_3);
    $sheet->setCellValue("J$request->index", $data->ren_4);
    $sheet->setCellValue("K$request->index", $data->eval_4);
    $sheet->setCellValue("L$request->index", $data->ren_5);
    $sheet->setCellValue("M$request->index", $data->eval_5);
    $sheet->setCellValue("N$request->index", $data->ren_6);
    $sheet->setCellValue("O$request->index", $data->eval_6);
    $sheet->setCellValue("P$request->index", $data->ren_7);
    $sheet->setCellValue("Q$request->index", $data->eval_7);
    $sheet->setCellValue("R$request->index", $data->ren_8);
    $sheet->setCellValue("S$request->index", $data->eval_8);
    $sheet->setCellValue("T$request->index", $data->ren_9);
    $sheet->setCellValue("U$request->index", $data->eval_9);
    $sheet->setCellValue("V$request->index", $data->ren_10);
    $sheet->setCellValue("W$request->index", $data->eval_10);
    $sheet->setCellValue("X$request->index", $data->ren_11);
    $sheet->setCellValue("Y$request->index", $data->eval_11);
    $sheet->setCellValue("Z$request->index", $data->ren_12);
    $sheet->setCellValue("AA$request->index", $data->eval_12);
  }

  private function _generate_table_data_eval_only($request, $data, &$sheet)
  {
    $sheet->setCellValue("D$request->index", $data->eval_1);
    $sheet->setCellValue("E$request->index", $data->eval_2);
    $sheet->setCellValue("F$request->index", $data->eval_3);
    $sheet->setCellValue("G$request->index", $data->eval_4);
    $sheet->setCellValue("H$request->index", $data->eval_5);
    $sheet->setCellValue("I$request->index", $data->eval_6);
    $sheet->setCellValue("J$request->index", $data->eval_7);
    $sheet->setCellValue("K$request->index", $data->eval_8);
    $sheet->setCellValue("L$request->index", $data->eval_9);
    $sheet->setCellValue("M$request->index", $data->eval_10);
    $sheet->setCellValue("N$request->index", $data->eval_11);
    $sheet->setCellValue("O$request->index", $data->eval_12);
  }

  private function _download_spreadsheet($request)
  {
    $this->load->helper('jam');
    $name = "tegangan-bulanan-" . str_replace(" ", "", str_replace("-", "", str_replace(":", "", generate_timezone_timestamp(null))));
    $writer = new Xlsx($request->spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $name . '.xlsx"');
    $writer->save("php://output");
  }
}
