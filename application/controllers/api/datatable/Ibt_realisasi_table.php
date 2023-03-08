<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ibt_realisasi_table extends CI_Controller
{
    public function index()
    {
        $request = (object) $this->input->get();
        $response = $this->_generate_response();

        $request->order[0]['column'] = 0;
        $request->order[0]['dir'] = 'DESC';

        $this->load->model('datatable/ibt_realisasi_table_m', 'main');
        $this->load->library('datatable');
        $this->load->helper('datatable');
        $this->load->helper('validation');

        $params = new stdClass();
        $params->request = $request;
        $params->response = $response;
        $params->model = $this->main;
        $params->order_options = array(0 => 'logged_at');
        $params->filters = array(
            'nama' => 'nama', 'tanggalAwal' => 'tanggal_awal', 'tanggalAkhir' => 'tanggal_akhir',
            'persentaseAwal' => 'persentase_awal', 'persentaseAkhir' => 'persentase_akhir'
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
            $datum->no = ++$index;
            $datum->tanggal = date_to_kalender(timestamp_to_date($datum->logged_at));
            $datum->jam = timestamp_to_jam_menit($datum->logged_at);

            if ($datum->jam == "23:59") $datum->jam == "24:00";

            $datum->jam = "$datum->jam WIB";
        }
    }
}
