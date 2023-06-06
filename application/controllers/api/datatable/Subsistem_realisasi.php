<?php defined('BASEPATH') or exit('No direct script access allowed');

class Subsistem_realisasi extends CI_Controller
{
	public function index()
	{
		$request = (object) $this->input->get();
		$response = $this->_generate_response();

		if (!isset($request->tanggalAwal)) $request->tanggalAwal = "";
		if (!isset($request->tanggalAkhir)) $request->tanggalAkhir = "";

		$this->load->model('datatable/subsistem_realisasi_m', 'main');
		$this->load->library('datatable');
		$this->load->helper('datatable');
		$this->load->helper('validation');

		$params = new stdClass();
		$params->request = $request;
		$params->response = $response;
		$params->model = $this->main;
		$params->order_options = array(0 => 'tanggal');
		$params->filters = array(
			'tanggalAwal' => 'tanggal_awal', 'tanggalAkhir' => 'tanggal_akhir', 'pasokan' => 'pasokan'
		);

		$datatable = new Datatable();
		$response = $datatable->index($params);
		$this->_format_data($request, $response);

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

	private function _generate_response()
	{
		return (object) array("success" => true, "data" => new stdClass());
	}

	private function _format_data($request, &$response)
	{
		if (!$response->success) return;

		$this->load->helper("bulan");
		$this->load->helper("tanggal");
		$this->load->helper("jam");

		$index = $request->start;

		foreach ($response->data as $datum) {
			$datum->tanggal = date_to_kalender($datum->tanggal);
			$datum->created_at_string = $this->_get_formatted_datetime($datum->created_date);
			$datum->updated_at_string = $this->_get_formatted_datetime($datum->updated_date);
		}
	}

	private function _get_formatted_datetime($datetime)
	{
		if (is_null($datetime)) return "-";

		return date_to_kalender(timestamp_to_date($datetime)) . ", " . timestamp_to_jam_menit($datetime) . " WIB";
	}
}
