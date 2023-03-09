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
    if (!isset($request->nama)) $request->nama = null;
    if (!isset($request->rangeAwal)) $request->rangeAwal = 0;
    if (!isset($request->rangeAkhir)) $request->rangeAkhir = 100;
    if (!isset($request->tanggalAwal)) $request->tanggalAwal = date("Y-m-d");
    if (!isset($request->tanggalAkhir)) $request->tanggalAkhir = date("Y-m-d");
  }

  private function _get_data($request, &$response)
  {
    $this->load->model("export/ibt_for_pemantauan_m", "xlsx");

    $request->data = $this->xlsx->index((object) array(
      "nama" => $request->nama,
      "range_awal" => $request->rangeAwal,
      "range_akhir" => $request->rangeAkhir,
      "tanggal_awal" => $request->tanggalAwal,
      "tanggal_akhir" => $request->tanggalAkhir
    ));
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
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Nama');
    $sheet->setCellValue('C1', 'Tanggal');
    $sheet->setCellValue('D1', 'Pukul');
    $sheet->setCellValue('E1', 'kV');
  }

  private function _generate_table($request, &$sheet)
  {
    $index = 2;
    $this->load->helper("jam");
    $this->load->helper("tanggal");

    foreach ($request->data as $datum) {
      $sheet->setCellValue("A$index", $index);
      $sheet->setCellValue("B$index", $datum->nama);
      $sheet->setCellValue("C$index", timestamp_to_date($datum->logged_at));
      $sheet->setCellValue("D$index", timestamp_to_jam_menit($datum->logged_at));
      $sheet->setCellValue("E$index", $datum->kv);

      $index++;
    }
  }

  private function _download_spreadsheet($request)
  {
    $this->load->helper('jam');
    $name = "tegangan-pemantauan-" . str_replace(" ", "", str_replace("-", "", str_replace(":", "", generate_timezone_timestamp(null))));
    $writer = new Xlsx($request->spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $name . '.xlsx"');
    $writer->save("php://output");
  }
}