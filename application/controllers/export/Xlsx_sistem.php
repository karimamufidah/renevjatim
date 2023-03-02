<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

defined('BASEPATH') or exit('No direct script access allowed');

class Xlsx_sistem extends CI_Controller
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
    if (!isset($request->sistem)) $request->sistem = null;
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
    $this->load->model("export/get_sistem_perencanaan_by_date_m", "plan");
    $this->load->model("export/get_sistem_realisasi_by_date_m", "realization");

    if ($request->date1) {
      $data_1 = $this->_get_data_detail((object) array(
        "sistem" => $request->sistem,
        "tanggal" => $request->date1,
        "isWithPlan" => $request->isWithPlan1
      ));
    }

    if ($request->date2) {
      $data_2 = $this->_get_data_detail((object) array(
        "sistem" => $request->sistem,
        "tanggal" => $request->date2,
        "isWithPlan" => $request->isWithPlan2
      ));
    }

    if ($request->date3) {
      $data_3 = $this->_get_data_detail((object) array(
        "sistem" => $request->sistem,
        "tanggal" => $request->date3,
        "isWithPlan" => $request->isWithPlan3
      ));
    }

    if ($request->date4) {
      $data_4 = $this->_get_data_detail((object) array(
        "sistem" => $request->sistem,
        "tanggal" => $request->date4,
        "isWithPlan" => $request->isWithPlan4
      ));
    }

    if ($request->date5) {
      $data_5 = $this->_get_data_detail((object) array(
        "sistem" => $request->sistem,
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
    $realization = $this->realization->show((object) array(
      "sistem" => $filters->sistem,
      "tanggal" => $filters->tanggal
    ));
    if (!$realization) $realization = $this->_generate_empty_realization();

    if (!$filters->isWithPlan) {
      $plan = $this->_generate_empty_plan();
    } else {
      $plan = $this->plan->show((object) array(
        "sistem" => $filters->sistem,
        "tanggal" => $filters->tanggal
      ));

      if (!$plan) $plan = $this->_generate_empty_plan();
    }

    return (object) array(
      "date" => $filters->tanggal,
      "plan" => $plan,
      "realization" => $realization
    );
  }

  private function _generate_empty_plan()
  {
    $data = new stdClass();
    $data->ren_0030 = 0;
    $data->ren_0100 = 0;
    $data->ren_0130 = 0;
    $data->ren_0200 = 0;
    $data->ren_0230 = 0;
    $data->ren_0300 = 0;
    $data->ren_0330 = 0;
    $data->ren_0400 = 0;
    $data->ren_0430 = 0;
    $data->ren_0500 = 0;
    $data->ren_0530 = 0;
    $data->ren_0600 = 0;
    $data->ren_0630 = 0;
    $data->ren_0700 = 0;
    $data->ren_0730 = 0;
    $data->ren_0800 = 0;
    $data->ren_0830 = 0;
    $data->ren_0900 = 0;
    $data->ren_0930 = 0;
    $data->ren_1000 = 0;
    $data->ren_1030 = 0;
    $data->ren_1100 = 0;
    $data->ren_1130 = 0;
    $data->ren_1200 = 0;
    $data->ren_1230 = 0;
    $data->ren_1300 = 0;
    $data->ren_1330 = 0;
    $data->ren_1400 = 0;
    $data->ren_1430 = 0;
    $data->ren_1500 = 0;
    $data->ren_1530 = 0;
    $data->ren_1600 = 0;
    $data->ren_1630 = 0;
    $data->ren_1700 = 0;
    $data->ren_1730 = 0;
    $data->ren_1800 = 0;
    $data->ren_1830 = 0;
    $data->ren_1900 = 0;
    $data->ren_1930 = 0;
    $data->ren_2000 = 0;
    $data->ren_2030 = 0;
    $data->ren_2100 = 0;
    $data->ren_2130 = 0;
    $data->ren_2200 = 0;
    $data->ren_2230 = 0;
    $data->ren_2300 = 0;
    $data->ren_2330 = 0;
    $data->ren_2400 = 0;

    return $data;
  }

  private function _generate_empty_realization()
  {
    $data = new stdClass();
    $data->eval_0030 = 0;
    $data->eval_0100 = 0;
    $data->eval_0130 = 0;
    $data->eval_0200 = 0;
    $data->eval_0230 = 0;
    $data->eval_0300 = 0;
    $data->eval_0330 = 0;
    $data->eval_0400 = 0;
    $data->eval_0430 = 0;
    $data->eval_0500 = 0;
    $data->eval_0530 = 0;
    $data->eval_0600 = 0;
    $data->eval_0630 = 0;
    $data->eval_0700 = 0;
    $data->eval_0730 = 0;
    $data->eval_0800 = 0;
    $data->eval_0830 = 0;
    $data->eval_0900 = 0;
    $data->eval_0930 = 0;
    $data->eval_1000 = 0;
    $data->eval_1030 = 0;
    $data->eval_1100 = 0;
    $data->eval_1130 = 0;
    $data->eval_1200 = 0;
    $data->eval_1230 = 0;
    $data->eval_1300 = 0;
    $data->eval_1330 = 0;
    $data->eval_1400 = 0;
    $data->eval_1430 = 0;
    $data->eval_1500 = 0;
    $data->eval_1530 = 0;
    $data->eval_1600 = 0;
    $data->eval_1630 = 0;
    $data->eval_1700 = 0;
    $data->eval_1730 = 0;
    $data->eval_1800 = 0;
    $data->eval_1830 = 0;
    $data->eval_1900 = 0;
    $data->eval_1930 = 0;
    $data->eval_2000 = 0;
    $data->eval_2030 = 0;
    $data->eval_2100 = 0;
    $data->eval_2130 = 0;
    $data->eval_2200 = 0;
    $data->eval_2230 = 0;
    $data->eval_2300 = 0;
    $data->eval_2330 = 0;
    $data->eval_2400 = 0;

    return $data;
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
    $sheet->setCellValue('B1', 'Tanggal');

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
    $sheet->setCellValue('C1', 'ren_0030');
    $sheet->setCellValue('D1', 'eval_0030');
    $sheet->setCellValue('E1', 'ren_0100');
    $sheet->setCellValue('F1', 'eval_0100');
    $sheet->setCellValue('G1', 'ren_0130');
    $sheet->setCellValue('H1', 'eval_0130');
    $sheet->setCellValue('I1', 'ren_0200');
    $sheet->setCellValue('J1', 'eval_0200');
    $sheet->setCellValue('K1', 'ren_0230');
    $sheet->setCellValue('L1', 'eval_0230');
    $sheet->setCellValue('M1', 'ren_0300');
    $sheet->setCellValue('N1', 'eval_0300');
    $sheet->setCellValue('O1', 'ren_0330');
    $sheet->setCellValue('P1', 'eval_0330');
    $sheet->setCellValue('Q1', 'ren_0400');
    $sheet->setCellValue('R1', 'eval_0400');
    $sheet->setCellValue('S1', 'ren_0430');
    $sheet->setCellValue('T1', 'eval_0430');
    $sheet->setCellValue('U1', 'ren_0500');
    $sheet->setCellValue('V1', 'eval_0500');
    $sheet->setCellValue('W1', 'ren_0530');
    $sheet->setCellValue('X1', 'eval_0530');
    $sheet->setCellValue('Y1', 'ren_0600');
    $sheet->setCellValue('Z1', 'eval_0600');
    $sheet->setCellValue('AA1', 'ren_0630');
    $sheet->setCellValue('AB1', 'eval_0630');
    $sheet->setCellValue('AC1', 'ren_0700');
    $sheet->setCellValue('AD1', 'eval_0700');
    $sheet->setCellValue('AE1', 'ren_0730');
    $sheet->setCellValue('AF1', 'eval_0730');
    $sheet->setCellValue('AG1', 'ren_0800');
    $sheet->setCellValue('AH1', 'eval_0800');
    $sheet->setCellValue('AI1', 'ren_0830');
    $sheet->setCellValue('AJ1', 'eval_0830');
    $sheet->setCellValue('AK1', 'ren_0900');
    $sheet->setCellValue('AL1', 'eval_0900');
    $sheet->setCellValue('AM1', 'ren_0930');
    $sheet->setCellValue('AN1', 'eval_0930');
    $sheet->setCellValue('AO1', 'ren_1000');
    $sheet->setCellValue('AP1', 'eval_1000');
    $sheet->setCellValue('AQ1', 'ren_1030');
    $sheet->setCellValue('AR1', 'eval_1030');
    $sheet->setCellValue('AS1', 'ren_1100');
    $sheet->setCellValue('AT1', 'eval_1100');
    $sheet->setCellValue('AU1', 'ren_1130');
    $sheet->setCellValue('AV1', 'eval_1130');
    $sheet->setCellValue('AW1', 'ren_1200');
    $sheet->setCellValue('AX1', 'eval_1200');
    $sheet->setCellValue('AY1', 'ren_1230');
    $sheet->setCellValue('AZ1', 'eval_1230');
    $sheet->setCellValue('BA1', 'ren_1300');
    $sheet->setCellValue('BB1', 'eval_1300');
    $sheet->setCellValue('BC1', 'ren_1330');
    $sheet->setCellValue('BD1', 'eval_1330');
    $sheet->setCellValue('BE1', 'ren_1400');
    $sheet->setCellValue('BF1', 'eval_1400');
    $sheet->setCellValue('BG1', 'ren_1430');
    $sheet->setCellValue('BH1', 'eval_1430');
    $sheet->setCellValue('BI1', 'ren_1500');
    $sheet->setCellValue('BJ1', 'eval_1500');
    $sheet->setCellValue('BK1', 'ren_1530');
    $sheet->setCellValue('BL1', 'eval_1530');
    $sheet->setCellValue('BM1', 'ren_1600');
    $sheet->setCellValue('BN1', 'eval_1600');
    $sheet->setCellValue('BO1', 'ren_1630');
    $sheet->setCellValue('BP1', 'eval_1630');
    $sheet->setCellValue('BQ1', 'ren_1700');
    $sheet->setCellValue('BR1', 'eval_1700');
    $sheet->setCellValue('BS1', 'ren_1730');
    $sheet->setCellValue('BT1', 'eval_1730');
    $sheet->setCellValue('BU1', 'ren_1800');
    $sheet->setCellValue('BV1', 'eval_1800');
    $sheet->setCellValue('BW1', 'ren_1830');
    $sheet->setCellValue('BX1', 'eval_1830');
    $sheet->setCellValue('BY1', 'ren_1900');
    $sheet->setCellValue('BZ1', 'eval_1900');
    $sheet->setCellValue('CA1', 'ren_1930');
    $sheet->setCellValue('CB1', 'eval_1930');
    $sheet->setCellValue('CC1', 'ren_2000');
    $sheet->setCellValue('CD1', 'eval_2000');
    $sheet->setCellValue('CE1', 'ren_2030');
    $sheet->setCellValue('CF1', 'eval_2030');
    $sheet->setCellValue('CG1', 'ren_2100');
    $sheet->setCellValue('CH1', 'eval_2100');
    $sheet->setCellValue('CI1', 'ren_2130');
    $sheet->setCellValue('CJ1', 'eval_2130');
    $sheet->setCellValue('CK1', 'ren_2200');
    $sheet->setCellValue('CL1', 'eval_2200');
    $sheet->setCellValue('CM1', 'ren_2230');
    $sheet->setCellValue('CN1', 'eval_2230');
    $sheet->setCellValue('CO1', 'ren_2300');
    $sheet->setCellValue('CP1', 'eval_2300');
    $sheet->setCellValue('CQ1', 'ren_2330');
    $sheet->setCellValue('CR1', 'eval_2330');
    $sheet->setCellValue('CS1', 'ren_2400');
    $sheet->setCellValue('CT1', 'eval_2400');
  }

  private function _generate_title_data_eval_only(&$sheet)
  {
    $sheet->setCellValue('C1', 'eval_0030');
    $sheet->setCellValue('D1', 'eval_0100');
    $sheet->setCellValue('E1', 'eval_0130');
    $sheet->setCellValue('F1', 'eval_0200');
    $sheet->setCellValue('G1', 'eval_0230');
    $sheet->setCellValue('H1', 'eval_0300');
    $sheet->setCellValue('I1', 'eval_0330');
    $sheet->setCellValue('J1', 'eval_0400');
    $sheet->setCellValue('K1', 'eval_0430');
    $sheet->setCellValue('L1', 'eval_0500');
    $sheet->setCellValue('M1', 'eval_0530');
    $sheet->setCellValue('N1', 'eval_0600');
    $sheet->setCellValue('O1', 'eval_0630');
    $sheet->setCellValue('P1', 'eval_0700');
    $sheet->setCellValue('Q1', 'eval_0730');
    $sheet->setCellValue('R1', 'eval_0800');
    $sheet->setCellValue('S1', 'eval_0830');
    $sheet->setCellValue('T1', 'eval_0900');
    $sheet->setCellValue('U1', 'eval_0930');
    $sheet->setCellValue('V1', 'eval_1000');
    $sheet->setCellValue('W1', 'eval_1030');
    $sheet->setCellValue('X1', 'eval_1100');
    $sheet->setCellValue('Y1', 'eval_1130');
    $sheet->setCellValue('Z1', 'eval_1200');
    $sheet->setCellValue('AA1', 'eval_1230');
    $sheet->setCellValue('AB1', 'eval_1300');
    $sheet->setCellValue('AC1', 'eval_1330');
    $sheet->setCellValue('AD1', 'eval_1400');
    $sheet->setCellValue('AE1', 'eval_1430');
    $sheet->setCellValue('AF1', 'eval_1500');
    $sheet->setCellValue('AG1', 'eval_1530');
    $sheet->setCellValue('AH1', 'eval_1600');
    $sheet->setCellValue('AI1', 'eval_1630');
    $sheet->setCellValue('AJ1', 'eval_1700');
    $sheet->setCellValue('AK1', 'eval_1730');
    $sheet->setCellValue('AL1', 'eval_1800');
    $sheet->setCellValue('AM1', 'eval_1830');
    $sheet->setCellValue('AN1', 'eval_1900');
    $sheet->setCellValue('AO1', 'eval_1930');
    $sheet->setCellValue('AP1', 'eval_2000');
    $sheet->setCellValue('AQ1', 'eval_2030');
    $sheet->setCellValue('AR1', 'eval_2100');
    $sheet->setCellValue('AS1', 'eval_2130');
    $sheet->setCellValue('AT1', 'eval_2200');
    $sheet->setCellValue('AU1', 'eval_2230');
    $sheet->setCellValue('AV1', 'eval_2300');
    $sheet->setCellValue('AW1', 'eval_2330');
    $sheet->setCellValue('AX1', 'eval_2400');
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
    $sheet->setCellValue("A$request->index", $request->sistem);
    $sheet->setCellValue("B$request->index", $data->date);

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
    $sheet->setCellValue("C$request->index", $data->plan->ren_0030);
    $sheet->setCellValue("D$request->index", $data->realization->eval_0030);
    $sheet->setCellValue("E$request->index", $data->plan->ren_0100);
    $sheet->setCellValue("F$request->index", $data->realization->eval_0100);
    $sheet->setCellValue("G$request->index", $data->plan->ren_0130);
    $sheet->setCellValue("H$request->index", $data->realization->eval_0130);
    $sheet->setCellValue("I$request->index", $data->plan->ren_0200);
    $sheet->setCellValue("J$request->index", $data->realization->eval_0200);
    $sheet->setCellValue("K$request->index", $data->plan->ren_0230);
    $sheet->setCellValue("L$request->index", $data->realization->eval_0230);
    $sheet->setCellValue("M$request->index", $data->plan->ren_0300);
    $sheet->setCellValue("N$request->index", $data->realization->eval_0300);
    $sheet->setCellValue("O$request->index", $data->plan->ren_0330);
    $sheet->setCellValue("P$request->index", $data->realization->eval_0330);
    $sheet->setCellValue("Q$request->index", $data->plan->ren_0400);
    $sheet->setCellValue("R$request->index", $data->realization->eval_0400);
    $sheet->setCellValue("S$request->index", $data->plan->ren_0430);
    $sheet->setCellValue("T$request->index", $data->realization->eval_0430);
    $sheet->setCellValue("U$request->index", $data->plan->ren_0500);
    $sheet->setCellValue("V$request->index", $data->realization->eval_0500);
    $sheet->setCellValue("W$request->index", $data->plan->ren_0530);
    $sheet->setCellValue("X$request->index", $data->realization->eval_0530);
    $sheet->setCellValue("Y$request->index", $data->plan->ren_0600);
    $sheet->setCellValue("Z$request->index", $data->realization->eval_0600);
    $sheet->setCellValue("AA$request->index", $data->plan->ren_0630);
    $sheet->setCellValue("AB$request->index", $data->realization->eval_0630);
    $sheet->setCellValue("AC$request->index", $data->plan->ren_0700);
    $sheet->setCellValue("AD$request->index", $data->realization->eval_0700);
    $sheet->setCellValue("AE$request->index", $data->plan->ren_0730);
    $sheet->setCellValue("AF$request->index", $data->realization->eval_0730);
    $sheet->setCellValue("AG$request->index", $data->plan->ren_0800);
    $sheet->setCellValue("AH$request->index", $data->realization->eval_0800);
    $sheet->setCellValue("AI$request->index", $data->plan->ren_0830);
    $sheet->setCellValue("AJ$request->index", $data->realization->eval_0830);
    $sheet->setCellValue("AK$request->index", $data->plan->ren_0900);
    $sheet->setCellValue("AL$request->index", $data->realization->eval_0900);
    $sheet->setCellValue("AM$request->index", $data->plan->ren_0930);
    $sheet->setCellValue("AN$request->index", $data->realization->eval_0930);
    $sheet->setCellValue("AO$request->index", $data->plan->ren_1000);
    $sheet->setCellValue("AP$request->index", $data->realization->eval_1000);
    $sheet->setCellValue("AQ$request->index", $data->plan->ren_1030);
    $sheet->setCellValue("AR$request->index", $data->realization->eval_1030);
    $sheet->setCellValue("AS$request->index", $data->plan->ren_1100);
    $sheet->setCellValue("AT$request->index", $data->realization->eval_1100);
    $sheet->setCellValue("AU$request->index", $data->plan->ren_1130);
    $sheet->setCellValue("AV$request->index", $data->realization->eval_1130);
    $sheet->setCellValue("AW$request->index", $data->plan->ren_1200);
    $sheet->setCellValue("AX$request->index", $data->realization->eval_1200);
    $sheet->setCellValue("AY$request->index", $data->plan->ren_1230);
    $sheet->setCellValue("AZ$request->index", $data->realization->eval_1230);
    $sheet->setCellValue("BA$request->index", $data->plan->ren_1300);
    $sheet->setCellValue("BB$request->index", $data->realization->eval_1300);
    $sheet->setCellValue("BC$request->index", $data->plan->ren_1330);
    $sheet->setCellValue("BD$request->index", $data->realization->eval_1330);
    $sheet->setCellValue("BE$request->index", $data->plan->ren_1400);
    $sheet->setCellValue("BF$request->index", $data->realization->eval_1400);
    $sheet->setCellValue("BG$request->index", $data->plan->ren_1430);
    $sheet->setCellValue("BH$request->index", $data->realization->eval_1430);
    $sheet->setCellValue("BI$request->index", $data->plan->ren_1500);
    $sheet->setCellValue("BJ$request->index", $data->realization->eval_1500);
    $sheet->setCellValue("BK$request->index", $data->plan->ren_1530);
    $sheet->setCellValue("BL$request->index", $data->realization->eval_1530);
    $sheet->setCellValue("BM$request->index", $data->plan->ren_1600);
    $sheet->setCellValue("BN$request->index", $data->realization->eval_1600);
    $sheet->setCellValue("BO$request->index", $data->plan->ren_1630);
    $sheet->setCellValue("BP$request->index", $data->realization->eval_1630);
    $sheet->setCellValue("BQ$request->index", $data->plan->ren_1700);
    $sheet->setCellValue("BR$request->index", $data->realization->eval_1700);
    $sheet->setCellValue("BS$request->index", $data->plan->ren_1730);
    $sheet->setCellValue("BT$request->index", $data->realization->eval_1730);
    $sheet->setCellValue("BU$request->index", $data->plan->ren_1800);
    $sheet->setCellValue("BV$request->index", $data->realization->eval_1800);
    $sheet->setCellValue("BW$request->index", $data->plan->ren_1830);
    $sheet->setCellValue("BX$request->index", $data->realization->eval_1830);
    $sheet->setCellValue("BY$request->index", $data->plan->ren_1900);
    $sheet->setCellValue("BZ$request->index", $data->realization->eval_1900);
    $sheet->setCellValue("CA$request->index", $data->plan->ren_1930);
    $sheet->setCellValue("CB$request->index", $data->realization->eval_1930);
    $sheet->setCellValue("CC$request->index", $data->plan->ren_2000);
    $sheet->setCellValue("CD$request->index", $data->realization->eval_2000);
    $sheet->setCellValue("CE$request->index", $data->plan->ren_2030);
    $sheet->setCellValue("CF$request->index", $data->realization->eval_2030);
    $sheet->setCellValue("CG$request->index", $data->plan->ren_2100);
    $sheet->setCellValue("CH$request->index", $data->realization->eval_2100);
    $sheet->setCellValue("CI$request->index", $data->plan->ren_2130);
    $sheet->setCellValue("CJ$request->index", $data->realization->eval_2130);
    $sheet->setCellValue("CK$request->index", $data->plan->ren_2200);
    $sheet->setCellValue("CL$request->index", $data->realization->eval_2200);
    $sheet->setCellValue("CM$request->index", $data->plan->ren_2230);
    $sheet->setCellValue("CN$request->index", $data->realization->eval_2230);
    $sheet->setCellValue("CO$request->index", $data->plan->ren_2300);
    $sheet->setCellValue("CP$request->index", $data->realization->eval_2300);
    $sheet->setCellValue("CQ$request->index", $data->plan->ren_2330);
    $sheet->setCellValue("CR$request->index", $data->realization->eval_2330);
    $sheet->setCellValue("CS$request->index", $data->plan->ren_2400);
    $sheet->setCellValue("CT$request->index", $data->realization->eval_2400);
  }

  private function _generate_table_data_eval_only($request, $data, &$sheet)
  {
    $sheet->setCellValue("C$request->index", $data->realization->eval_0030);
    $sheet->setCellValue("D$request->index", $data->realization->eval_0100);
    $sheet->setCellValue("E$request->index", $data->realization->eval_0130);
    $sheet->setCellValue("F$request->index", $data->realization->eval_0200);
    $sheet->setCellValue("G$request->index", $data->realization->eval_0230);
    $sheet->setCellValue("H$request->index", $data->realization->eval_0300);
    $sheet->setCellValue("I$request->index", $data->realization->eval_0330);
    $sheet->setCellValue("J$request->index", $data->realization->eval_0400);
    $sheet->setCellValue("K$request->index", $data->realization->eval_0430);
    $sheet->setCellValue("L$request->index", $data->realization->eval_0500);
    $sheet->setCellValue("M$request->index", $data->realization->eval_0530);
    $sheet->setCellValue("N$request->index", $data->realization->eval_0600);
    $sheet->setCellValue("O$request->index", $data->realization->eval_0630);
    $sheet->setCellValue("P$request->index", $data->realization->eval_0700);
    $sheet->setCellValue("Q$request->index", $data->realization->eval_0730);
    $sheet->setCellValue("R$request->index", $data->realization->eval_0800);
    $sheet->setCellValue("S$request->index", $data->realization->eval_0830);
    $sheet->setCellValue("T$request->index", $data->realization->eval_0900);
    $sheet->setCellValue("U$request->index", $data->realization->eval_0930);
    $sheet->setCellValue("V$request->index", $data->realization->eval_1000);
    $sheet->setCellValue("W$request->index", $data->realization->eval_1030);
    $sheet->setCellValue("X$request->index", $data->realization->eval_1100);
    $sheet->setCellValue("Y$request->index", $data->realization->eval_1130);
    $sheet->setCellValue("Z$request->index", $data->realization->eval_1200);
    $sheet->setCellValue("AA$request->index", $data->realization->eval_1230);
    $sheet->setCellValue("AB$request->index", $data->realization->eval_1300);
    $sheet->setCellValue("AC$request->index", $data->realization->eval_1330);
    $sheet->setCellValue("AD$request->index", $data->realization->eval_1400);
    $sheet->setCellValue("AE$request->index", $data->realization->eval_1430);
    $sheet->setCellValue("AF$request->index", $data->realization->eval_1500);
    $sheet->setCellValue("AG$request->index", $data->realization->eval_1530);
    $sheet->setCellValue("AH$request->index", $data->realization->eval_1600);
    $sheet->setCellValue("AI$request->index", $data->realization->eval_1630);
    $sheet->setCellValue("AJ$request->index", $data->realization->eval_1700);
    $sheet->setCellValue("AK$request->index", $data->realization->eval_1730);
    $sheet->setCellValue("AL$request->index", $data->realization->eval_1800);
    $sheet->setCellValue("AM$request->index", $data->realization->eval_1830);
    $sheet->setCellValue("AN$request->index", $data->realization->eval_1900);
    $sheet->setCellValue("AO$request->index", $data->realization->eval_1930);
    $sheet->setCellValue("AP$request->index", $data->realization->eval_2000);
    $sheet->setCellValue("AQ$request->index", $data->realization->eval_2030);
    $sheet->setCellValue("AR$request->index", $data->realization->eval_2100);
    $sheet->setCellValue("AS$request->index", $data->realization->eval_2130);
    $sheet->setCellValue("AT$request->index", $data->realization->eval_2200);
    $sheet->setCellValue("AU$request->index", $data->realization->eval_2230);
    $sheet->setCellValue("AV$request->index", $data->realization->eval_2300);
    $sheet->setCellValue("AW$request->index", $data->realization->eval_2330);
    $sheet->setCellValue("AX$request->index", $data->realization->eval_2400);
  }

  private function _download_spreadsheet($request)
  {
    $this->load->helper('jam');
    $name = "sistem-harian-" . str_replace(" ", "", str_replace("-", "", str_replace(":", "", generate_timezone_timestamp(null))));
    $writer = new Xlsx($request->spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $name . '.xlsx"');
    $writer->save("php://output");
  }
}
