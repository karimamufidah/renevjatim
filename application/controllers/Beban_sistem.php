<?php

require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Beban_sistem extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('bebansistem_m');
		$this->load->library('form_validation');
	}

	//PENGHANTAR

	//list table data perencanaan penghantar
	public function penghantar_perencanaan()
	{
		$this->load->library('pagination');
		$config['base_url'] = site_url('beban_sistem/penghantar_perencanaan');
		$config['total_rows'] = $this->bebansistem_m->get_penghantar_ren_pagination()->num_rows();
		$config['per_page'] = 15;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open']	= '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		$data['row'] = $this->bebansistem_m->get_penghantar_ren_pagination($config['per_page'], $this->uri->segment(3));
		$data['title'] = 'Penghantar | Perencanaan';
		$this->template->load('template', 'beban_sistem/penghantar/perencanaan', $data);
	}

	//manual input data perencanaan penghantar
	public function add_penghantar_ren()
	{
		$phtren = new stdClass();
		$phtren->data_id = null;
		$phtren->tanggal = null;
		$phtren->ruas = null;
		$phtren->kv = null;
		//$phtren->numerik = null;
		$phtren->inom = null;
		$phtren->satuan = null;
		$phtren->status = null;
		$phtren->ren_0030 = null;
		$phtren->ren_0100 = null;
		$phtren->ren_0130 = null;
		$phtren->ren_0200 = null;
		$phtren->ren_0230 = null;
		$phtren->ren_0300 = null;
		$phtren->ren_0330 = null;
		$phtren->ren_0400 = null;
		$phtren->ren_0430 = null;
		$phtren->ren_0500 = null;
		$phtren->ren_0530 = null;
		$phtren->ren_0600 = null;
		$phtren->ren_0630 = null;
		$phtren->ren_0700 = null;
		$phtren->ren_0730 = null;
		$phtren->ren_0800 = null;
		$phtren->ren_0830 = null;
		$phtren->ren_0900 = null;
		$phtren->ren_0930 = null;
		$phtren->ren_1000 = null;
		$phtren->ren_1030 = null;
		$phtren->ren_1100 = null;
		$phtren->ren_1130 = null;
		$phtren->ren_1200 = null;
		$phtren->ren_1230 = null;
		$phtren->ren_1300 = null;
		$phtren->ren_1330 = null;
		$phtren->ren_1400 = null;
		$phtren->ren_1430 = null;
		$phtren->ren_1500 = null;
		$phtren->ren_1530 = null;
		$phtren->ren_1600 = null;
		$phtren->ren_1630 = null;
		$phtren->ren_1700 = null;
		$phtren->ren_1730 = null;
		$phtren->ren_1800 = null;
		$phtren->ren_1830 = null;
		$phtren->ren_1900 = null;
		$phtren->ren_1930 = null;
		$phtren->ren_2000 = null;
		$phtren->ren_2030 = null;
		$phtren->ren_2100 = null;
		$phtren->ren_2130 = null;
		$phtren->ren_2200 = null;
		$phtren->ren_2230 = null;
		$phtren->ren_2300 = null;
		$phtren->ren_2330 = null;
		$phtren->ren_2400 = null;
		$data = array(
			'page' => 'add_penghantar_ren',
			'row' => $phtren
		);
		$data['title'] = 'Manual Input Data Penghantar | Perencanaan';
		$this->template->load('template', 'beban_sistem/penghantar/form_perencanaan', $data);
	}

	//edit data perencanaan penghantar
	public function edit_penghantar_ren($id)
	{
		$query = $this->bebansistem_m->get_penghantar_ren($id);
		if ($query->num_rows() > 0) {
			$phtren = $query->row();
			$data = array(
				'page' => 'edit_penghantar_ren',
				'row' => $phtren
			);
			$data['title'] = 'Edit Data Penghantar | Perencanaan';
			$this->template->load('template', 'beban_sistem/penghantar/form_perencanaan', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('beban_sistem/penghantar_perencanaan') . "';</script>";
		}
	}

	//proses validasi manual input dan edit data perencanaan penghantar
	public function process_penghantar_ren()
	{
		//$this->form_validation->set_rules('tanggal', 'Tanggal', 'is_unique[tegangan_perencanaan.tanggal]');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|callback_data_check_penghantar_ren');
		$this->form_validation->set_message('is_unique', 'data pada %s ini sudah ada');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add_penghantar_ren'])) {

			if ($this->form_validation->run() == FALSE) {
				$phtren = new stdClass();
				$phtren->data_id = null;
				$phtren->tanggal = null;
				$phtren->ruas = null;
				$phtren->kv = null;
				//$phtren->numerik = null;
				$phtren->inom = null;
				$phtren->satuan = null;
				$phtren->status = null;
				$phtren->ren_0030 = null;
				$phtren->ren_0100 = null;
				$phtren->ren_0130 = null;
				$phtren->ren_0200 = null;
				$phtren->ren_0230 = null;
				$phtren->ren_0300 = null;
				$phtren->ren_0330 = null;
				$phtren->ren_0400 = null;
				$phtren->ren_0430 = null;
				$phtren->ren_0500 = null;
				$phtren->ren_0530 = null;
				$phtren->ren_0600 = null;
				$phtren->ren_0630 = null;
				$phtren->ren_0700 = null;
				$phtren->ren_0730 = null;
				$phtren->ren_0800 = null;
				$phtren->ren_0830 = null;
				$phtren->ren_0900 = null;
				$phtren->ren_0930 = null;
				$phtren->ren_1000 = null;
				$phtren->ren_1030 = null;
				$phtren->ren_1100 = null;
				$phtren->ren_1130 = null;
				$phtren->ren_1200 = null;
				$phtren->ren_1230 = null;
				$phtren->ren_1300 = null;
				$phtren->ren_1330 = null;
				$phtren->ren_1400 = null;
				$phtren->ren_1430 = null;
				$phtren->ren_1500 = null;
				$phtren->ren_1530 = null;
				$phtren->ren_1600 = null;
				$phtren->ren_1630 = null;
				$phtren->ren_1700 = null;
				$phtren->ren_1730 = null;
				$phtren->ren_1800 = null;
				$phtren->ren_1830 = null;
				$phtren->ren_1900 = null;
				$phtren->ren_1930 = null;
				$phtren->ren_2000 = null;
				$phtren->ren_2030 = null;
				$phtren->ren_2100 = null;
				$phtren->ren_2130 = null;
				$phtren->ren_2200 = null;
				$phtren->ren_2230 = null;
				$phtren->ren_2300 = null;
				$phtren->ren_2330 = null;
				$phtren->ren_2400 = null;
				$data = array(
					'page' => 'add_penghantar_ren',
					'row' => $phtren
				);
				$data['title'] = 'Manual Input Data Penghantar | Perencanaan';
				$this->template->load('template', 'beban_sistem/penghantar/form_perencanaan', $data);
			} else {
				$this->bebansistem_m->add_penghantar_ren($post);
				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil disimpan');</script>";
				}
				echo "<script>window.location='" . site_url('beban_sistem/penghantar_perencanaan') . "';</script>";
			}
		} elseif (isset($_POST['edit_penghantar_ren'])) {
			$this->bebansistem_m->edit_penghantar_ren($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='" . site_url('beban_sistem/penghantar_perencanaan') . "';</script>";
		}
	}

	//halaman import data perencanaan penghantar
	public function import_penghantar_ren()
	{
		$data['title'] = 'Import Data Penghantar | Perencanaan';
		$this->template->load('template', 'beban_sistem/penghantar/import_penghantar_ren', $data);
	}

	//validasi import data perencanaan penghantar
	public function upload_penghantar_ren()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|callback_date_check_penghantar_ren');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('confirm', 'Confirmation Box');
			$data['title'] = 'Import Data Penghantar | Perencanaan';
			$this->template->load('template', 'beban_sistem/penghantar/import_penghantar_ren', $data);
		} else {
			$config['upload_path'] = './assets/admin/img/penghantar_perencanaan/';
			$config['allowed_types'] = 'xlsx|xls';

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('file')) {
				$file = $this->upload->data();
				$reader = ReaderEntityFactory::createXLSXReader();
				$reader->setShouldFormatDates(true);
				$reader->open('assets/admin/img/penghantar_perencanaan/' . $file['file_name']);
				foreach ($reader->getSheetIterator() as $sheet) {
					$numRow = 1;
					foreach ($sheet->getRowIterator() as $row) {
						if ($numRow > 1) {
							$penghantar = array(
								'ruas' => $row->getCellAtIndex(1),
								'kv' => $row->getCellAtIndex(2),
								//'numerik' => $row->getCellAtIndex(3),
								'inom' => $row->getCellAtIndex(3),
								'satuan' => $row->getCellAtIndex(4),
								'ren_0030' => $row->getCellAtIndex(5),
								'ren_0100' => $row->getCellAtIndex(6),
								'ren_0130' => $row->getCellAtIndex(7),
								'ren_0200' => $row->getCellAtIndex(8),
								'ren_0230' => $row->getCellAtIndex(9),
								'ren_0300' => $row->getCellAtIndex(10),
								'ren_0330' => $row->getCellAtIndex(11),
								'ren_0400' => $row->getCellAtIndex(12),
								'ren_0430' => $row->getCellAtIndex(13),
								'ren_0500' => $row->getCellAtIndex(14),
								'ren_0530' => $row->getCellAtIndex(15),
								'ren_0600' => $row->getCellAtIndex(16),
								'ren_0630' => $row->getCellAtIndex(17),
								'ren_0700' => $row->getCellAtIndex(18),
								'ren_0730' => $row->getCellAtIndex(19),
								'ren_0800' => $row->getCellAtIndex(20),
								'ren_0830' => $row->getCellAtIndex(21),
								'ren_0900' => $row->getCellAtIndex(22),
								'ren_0930' => $row->getCellAtIndex(23),
								'ren_1000' => $row->getCellAtIndex(24),
								'ren_1030' => $row->getCellAtIndex(25),
								'ren_1100' => $row->getCellAtIndex(26),
								'ren_1130' => $row->getCellAtIndex(27),
								'ren_1200' => $row->getCellAtIndex(28),
								'ren_1230' => $row->getCellAtIndex(29),
								'ren_1300' => $row->getCellAtIndex(30),
								'ren_1330' => $row->getCellAtIndex(31),
								'ren_1400' => $row->getCellAtIndex(32),
								'ren_1430' => $row->getCellAtIndex(33),
								'ren_1500' => $row->getCellAtIndex(34),
								'ren_1530' => $row->getCellAtIndex(35),
								'ren_1600' => $row->getCellAtIndex(36),
								'ren_1630' => $row->getCellAtIndex(37),
								'ren_1700' => $row->getCellAtIndex(38),
								'ren_1730' => $row->getCellAtIndex(39),
								'ren_1800' => $row->getCellAtIndex(40),
								'ren_1830' => $row->getCellAtIndex(41),
								'ren_1900' => $row->getCellAtIndex(42),
								'ren_1930' => $row->getCellAtIndex(43),
								'ren_2000' => $row->getCellAtIndex(44),
								'ren_2030' => $row->getCellAtIndex(45),
								'ren_2100' => $row->getCellAtIndex(46),
								'ren_2130' => $row->getCellAtIndex(47),
								'ren_2200' => $row->getCellAtIndex(48),
								'ren_2230' => $row->getCellAtIndex(49),
								'ren_2300' => $row->getCellAtIndex(50),
								'ren_2330' => $row->getCellAtIndex(51),
								'ren_2400' => $row->getCellAtIndex(52),
								'status' => $row->getCellAtIndex(53),
							);
							$this->bebansistem_m->import_penghantar_ren($penghantar);
						}
						$numRow++;
					}
					$reader->close();
					unlink('assets/admin/img/penghantar_perencanaan/' . $file['file_name']);
				}

				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil ditambahkan');</script>";
				}
				echo "<script>window.location='" . site_url('beban_sistem/penghantar_perencanaan') . "';</script>";
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				redirect('beban_sistem/penghantar_perencanaan');
			}
		}
	}

	//function replace data perencanaan penghantar

	//date check saat import data perencanaan penghantar
	function date_check_penghantar_ren()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM penghantar_perencanaan WHERE tanggal = '$post[tanggal]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('date_check_penghantar_ren', 'Data pada {field} ini sudah ada.');
			//$this->session->set_flashdata('confirm', 'Confirmation Box');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//data check saat manual input data perencanaan penghantar
	function data_check_penghantar_ren()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM penghantar_perencanaan WHERE tanggal = '$post[tanggal]' 
		AND ruas = '$post[ruas]' AND kv = '$post[kv]' AND satuan = '$post[satuan]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('data_check_penghantar_ren', 'Data pada {field} ini sudah ada.');
			//$this->session->set_flashdata('confirm', 'Confirmation Box');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//delete data perencanaan penghantar
	public function del_penghantar_ren($id)
	{
		$this->bebansistem_m->del_penghantar_ren($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>";
		}
		echo "<script>window.location='" . site_url('beban_sistem/penghantar_perencanaan') . "';</script>";
	}

	//list table data realisasi penghantar
	public function penghantar_realisasi()
	{
		$this->load->library('pagination');
		$config['base_url'] = site_url('beban_sistem/penghantar_realisasi');
		$config['total_rows'] = $this->bebansistem_m->get_penghantar_eval_pagination()->num_rows();
		$config['per_page'] = 15;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open']	= '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		$data['row'] = $this->bebansistem_m->get_penghantar_eval_pagination($config['per_page'], $this->uri->segment(3));
		$data['title'] = 'Penghantar | Realisasi';
		$this->template->load('template', 'beban_sistem/penghantar/realisasi', $data);
	}

	//manual input data realisasi penghantar
	public function add_penghantar_eval()
	{
		$phteval = new stdClass();
		$phteval->data_id = null;
		$phteval->tanggal = null;
		$phteval->ruas = null;
		$phteval->kv = null;
		//$phteval->numerik = null;
		$phteval->inom = null;
		$phteval->satuan = null;
		$phteval->status = null;
		$phteval->eval_0030 = null;
		$phteval->eval_0100 = null;
		$phteval->eval_0130 = null;
		$phteval->eval_0200 = null;
		$phteval->eval_0230 = null;
		$phteval->eval_0300 = null;
		$phteval->eval_0330 = null;
		$phteval->eval_0400 = null;
		$phteval->eval_0430 = null;
		$phteval->eval_0500 = null;
		$phteval->eval_0530 = null;
		$phteval->eval_0600 = null;
		$phteval->eval_0630 = null;
		$phteval->eval_0700 = null;
		$phteval->eval_0730 = null;
		$phteval->eval_0800 = null;
		$phteval->eval_0830 = null;
		$phteval->eval_0900 = null;
		$phteval->eval_0930 = null;
		$phteval->eval_1000 = null;
		$phteval->eval_1030 = null;
		$phteval->eval_1100 = null;
		$phteval->eval_1130 = null;
		$phteval->eval_1200 = null;
		$phteval->eval_1230 = null;
		$phteval->eval_1300 = null;
		$phteval->eval_1330 = null;
		$phteval->eval_1400 = null;
		$phteval->eval_1430 = null;
		$phteval->eval_1500 = null;
		$phteval->eval_1530 = null;
		$phteval->eval_1600 = null;
		$phteval->eval_1630 = null;
		$phteval->eval_1700 = null;
		$phteval->eval_1730 = null;
		$phteval->eval_1800 = null;
		$phteval->eval_1830 = null;
		$phteval->eval_1900 = null;
		$phteval->eval_1930 = null;
		$phteval->eval_2000 = null;
		$phteval->eval_2030 = null;
		$phteval->eval_2100 = null;
		$phteval->eval_2130 = null;
		$phteval->eval_2200 = null;
		$phteval->eval_2230 = null;
		$phteval->eval_2300 = null;
		$phteval->eval_2330 = null;
		$phteval->eval_2400 = null;
		$data = array(
			'page' => 'add_penghantar_eval',
			'row' => $phteval
		);
		$data['title'] = 'Manual Input Data Penghantar | Realisasi';
		$this->template->load('template', 'beban_sistem/penghantar/form_realisasi', $data);
	}

	//edit data realisasi penghantar
	public function edit_penghantar_eval($id)
	{
		$query = $this->bebansistem_m->get_penghantar_eval($id);
		if ($query->num_rows() > 0) {
			$pht = $query->row();
			$data = array(
				'page' => 'edit_penghantar_eval',
				'row' => $pht
			);
			$data['title'] = 'Edit Data Penghantar | Realisasi';
			$this->template->load('template', 'beban_sistem/penghantar/form_realisasi', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('beban_sistem/penghantar_realisasi') . "';</script>";
		}
	}

	//proses validasi manual input dan edit data realisasi penghantar
	public function process_penghantar_eval()
	{
		//$this->form_validation->set_rules('tanggal', 'Tanggal', 'is_unique[tegangan_perencanaan.tanggal]');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|callback_data_check_penghantar_eval');
		$this->form_validation->set_message('is_unique', 'data pada %s ini sudah ada');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add_penghantar_eval'])) {

			if ($this->form_validation->run() == FALSE) {
				$phteval = new stdClass();
				$phteval->data_id = null;
				$phteval->tanggal = null;
				$phteval->ruas = null;
				$phteval->kv = null;
				//$phteval->numerik = null;
				$phteval->inom = null;
				$phteval->satuan = null;
				$phteval->status = null;
				$phteval->eval_0030 = null;
				$phteval->eval_0100 = null;
				$phteval->eval_0130 = null;
				$phteval->eval_0200 = null;
				$phteval->eval_0230 = null;
				$phteval->eval_0300 = null;
				$phteval->eval_0330 = null;
				$phteval->eval_0400 = null;
				$phteval->eval_0430 = null;
				$phteval->eval_0500 = null;
				$phteval->eval_0530 = null;
				$phteval->eval_0600 = null;
				$phteval->eval_0630 = null;
				$phteval->eval_0700 = null;
				$phteval->eval_0730 = null;
				$phteval->eval_0800 = null;
				$phteval->eval_0830 = null;
				$phteval->eval_0900 = null;
				$phteval->eval_0930 = null;
				$phteval->eval_1000 = null;
				$phteval->eval_1030 = null;
				$phteval->eval_1100 = null;
				$phteval->eval_1130 = null;
				$phteval->eval_1200 = null;
				$phteval->eval_1230 = null;
				$phteval->eval_1300 = null;
				$phteval->eval_1330 = null;
				$phteval->eval_1400 = null;
				$phteval->eval_1430 = null;
				$phteval->eval_1500 = null;
				$phteval->eval_1530 = null;
				$phteval->eval_1600 = null;
				$phteval->eval_1630 = null;
				$phteval->eval_1700 = null;
				$phteval->eval_1730 = null;
				$phteval->eval_1800 = null;
				$phteval->eval_1830 = null;
				$phteval->eval_1900 = null;
				$phteval->eval_1930 = null;
				$phteval->eval_2000 = null;
				$phteval->eval_2030 = null;
				$phteval->eval_2100 = null;
				$phteval->eval_2130 = null;
				$phteval->eval_2200 = null;
				$phteval->eval_2230 = null;
				$phteval->eval_2300 = null;
				$phteval->eval_2330 = null;
				$phteval->eval_2400 = null;
				$data = array(
					'page' => 'add_penghantar_eval',
					'row' => $phteval
				);
				$data['title'] = 'Manual Input Data Penghantar | Realisasi';
				$this->template->load('template', 'beban_sistem/penghantar/form_realisasi', $data);
			} else {
				$this->bebansistem_m->add_penghantar_eval($post);
				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil disimpan');</script>";

					$this->_generate_data_tabel_evaluasi((object) array("tanggal" => $post["tanggal"], "ruas" => $post["ruas"]));
				}
				echo "<script>window.location='" . site_url('beban_sistem/penghantar_realisasi') . "';</script>";
			}
		} elseif (isset($_POST['edit_penghantar_eval'])) {
			$this->bebansistem_m->edit_penghantar_eval($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";

				$this->_generate_data_tabel_evaluasi((object) array("tanggal" => $post["tanggal"], "ruas" => $post["ruas"]));
			}
			echo "<script>window.location='" . site_url('beban_sistem/penghantar_realisasi') . "';</script>";
		}
	}

	//halaman import data realisasi penghantar
	public function import_penghantar_eval()
	{
		$data['title'] = 'Import Data Penghantar | Realisasi';
		$this->template->load('template', 'beban_sistem/penghantar/import_penghantar_eval', $data);
	}

	//validasi import data realisasi penghantar
	public function upload_penghantar_eval()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|callback_date_check_penghantar_eval');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('confirm', 'Confirmation Box');
			$data['title'] = 'Import Data Penghantar | Realisasi';
			$this->template->load('template', 'beban_sistem/penghantar/import_penghantar_eval', $data);
		} else {
			$config['upload_path'] = './assets/admin/img/penghantar_realisasi/';
			$config['allowed_types'] = 'xlsx|xls';

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('file')) {
				$file = $this->upload->data();
				$reader = ReaderEntityFactory::createXLSXReader();
				$reader->setShouldFormatDates(true);
				$reader->open('assets/admin/img/penghantar_realisasi/' . $file['file_name']);
				foreach ($reader->getSheetIterator() as $sheet) {
					$numRow = 1;
					foreach ($sheet->getRowIterator() as $row) {
						if ($numRow > 1) {
							$pht = array(
								'ruas' => $row->getCellAtIndex(1),
								'kv' => $row->getCellAtIndex(2),
								//'numerik' => $row->getCellAtIndex(3),
								'inom' => $row->getCellAtIndex(3),
								'satuan' => $row->getCellAtIndex(4),
								'eval_0030' => $row->getCellAtIndex(5),
								'eval_0100' => $row->getCellAtIndex(6),
								'eval_0130' => $row->getCellAtIndex(7),
								'eval_0200' => $row->getCellAtIndex(8),
								'eval_0230' => $row->getCellAtIndex(9),
								'eval_0300' => $row->getCellAtIndex(10),
								'eval_0330' => $row->getCellAtIndex(11),
								'eval_0400' => $row->getCellAtIndex(12),
								'eval_0430' => $row->getCellAtIndex(13),
								'eval_0500' => $row->getCellAtIndex(14),
								'eval_0530' => $row->getCellAtIndex(15),
								'eval_0600' => $row->getCellAtIndex(16),
								'eval_0630' => $row->getCellAtIndex(17),
								'eval_0700' => $row->getCellAtIndex(18),
								'eval_0730' => $row->getCellAtIndex(19),
								'eval_0800' => $row->getCellAtIndex(20),
								'eval_0830' => $row->getCellAtIndex(21),
								'eval_0900' => $row->getCellAtIndex(22),
								'eval_0930' => $row->getCellAtIndex(23),
								'eval_1000' => $row->getCellAtIndex(24),
								'eval_1030' => $row->getCellAtIndex(25),
								'eval_1100' => $row->getCellAtIndex(26),
								'eval_1130' => $row->getCellAtIndex(27),
								'eval_1200' => $row->getCellAtIndex(28),
								'eval_1230' => $row->getCellAtIndex(29),
								'eval_1300' => $row->getCellAtIndex(30),
								'eval_1330' => $row->getCellAtIndex(31),
								'eval_1400' => $row->getCellAtIndex(32),
								'eval_1430' => $row->getCellAtIndex(33),
								'eval_1500' => $row->getCellAtIndex(34),
								'eval_1530' => $row->getCellAtIndex(35),
								'eval_1600' => $row->getCellAtIndex(36),
								'eval_1630' => $row->getCellAtIndex(37),
								'eval_1700' => $row->getCellAtIndex(38),
								'eval_1730' => $row->getCellAtIndex(39),
								'eval_1800' => $row->getCellAtIndex(40),
								'eval_1830' => $row->getCellAtIndex(41),
								'eval_1900' => $row->getCellAtIndex(42),
								'eval_1930' => $row->getCellAtIndex(43),
								'eval_2000' => $row->getCellAtIndex(44),
								'eval_2030' => $row->getCellAtIndex(45),
								'eval_2100' => $row->getCellAtIndex(46),
								'eval_2130' => $row->getCellAtIndex(47),
								'eval_2200' => $row->getCellAtIndex(48),
								'eval_2230' => $row->getCellAtIndex(49),
								'eval_2300' => $row->getCellAtIndex(50),
								'eval_2330' => $row->getCellAtIndex(51),
								'eval_2400' => $row->getCellAtIndex(52),
								'status' => $row->getCellAtIndex(53),
							);
							$this->bebansistem_m->import_penghantar_eval($pht);

							$this->_generate_data_tabel_evaluasi((object) array("tanggal" => $this->input->post("tanggal", TRUE), "ruas" => $row->getCellAtIndex(1)));
						}
						$numRow++;
					}
					$reader->close();
					unlink('assets/admin/img/penghantar_realisasi/' . $file['file_name']);
				}

				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil ditambahkan');</script>";
				}
				echo "<script>window.location='" . site_url('beban_sistem/penghantar_realisasi') . "';</script>";
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				//redirect('beban_sistem/sistem_realisasi');
			}
		}
	}

	//function replace data realisasi penghantar

	//date check saat import data realisasi penghantar
	function date_check_penghantar_eval()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM penghantar_realisasi WHERE tanggal = '$post[tanggal]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('date_check_penghantar_eval', 'Data pada {field} ini sudah ada.');
			//$this->session->set_flashdata('confirm', 'Confirmation Box');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//data check saat manual input data realisasi penghantar
	function data_check_penghantar_eval()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM penghantar_realisasi WHERE tanggal = '$post[tanggal]' 
		AND ruas = '$post[ruas]' AND kv = '$post[kv]' AND satuan = '$post[satuan]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('data_check_penghantar_eval', 'Data pada {field} ini sudah ada.');
			//$this->session->set_flashdata('confirm', 'Confirmation Box');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//delete data realisasi penghantar
	public function del_penghantar_eval($id)
	{
		$this->bebansistem_m->del_penghantar_eval($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>";
		}
		echo "<script>window.location='" . site_url('beban_sistem/penghantar_realisasi') . "';</script>";
	}

	//INTERBUS TRANSFORMER (IBT)

	//list table data ibt
	public function ibt_perencanaan()
	{
		$this->load->library('pagination');
		$config['base_url'] = site_url('beban_sistem/ibt_perencanaan');
		$config['total_rows'] = $this->bebansistem_m->get_ibt_ren_pagination()->num_rows();
		$config['per_page'] = 15;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open']	= '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		$data['row'] = $this->bebansistem_m->get_ibt_ren_pagination($config['per_page'], $this->uri->segment(3));
		$data['title'] = 'IBT | Perencanaan';
		$this->template->load('template', 'beban_sistem/ibt/perencanaan', $data);
	}

	//manual input data perencanaan ibt
	public function add_ibt_ren()
	{
		$ibtren = new stdClass();
		$ibtren->data_id = null;
		$ibtren->tanggal = null;
		$ibtren->ibt = null;
		$ibtren->kv = null;
		$ibtren->satuan = null;
		$ibtren->inom = null;
		$ibtren->status = null;
		$ibtren->ren_0030 = null;
		$ibtren->ren_0100 = null;
		$ibtren->ren_0130 = null;
		$ibtren->ren_0200 = null;
		$ibtren->ren_0230 = null;
		$ibtren->ren_0300 = null;
		$ibtren->ren_0330 = null;
		$ibtren->ren_0400 = null;
		$ibtren->ren_0430 = null;
		$ibtren->ren_0500 = null;
		$ibtren->ren_0530 = null;
		$ibtren->ren_0600 = null;
		$ibtren->ren_0630 = null;
		$ibtren->ren_0700 = null;
		$ibtren->ren_0730 = null;
		$ibtren->ren_0800 = null;
		$ibtren->ren_0830 = null;
		$ibtren->ren_0900 = null;
		$ibtren->ren_0930 = null;
		$ibtren->ren_1000 = null;
		$ibtren->ren_1030 = null;
		$ibtren->ren_1100 = null;
		$ibtren->ren_1130 = null;
		$ibtren->ren_1200 = null;
		$ibtren->ren_1230 = null;
		$ibtren->ren_1300 = null;
		$ibtren->ren_1330 = null;
		$ibtren->ren_1400 = null;
		$ibtren->ren_1430 = null;
		$ibtren->ren_1500 = null;
		$ibtren->ren_1530 = null;
		$ibtren->ren_1600 = null;
		$ibtren->ren_1630 = null;
		$ibtren->ren_1700 = null;
		$ibtren->ren_1730 = null;
		$ibtren->ren_1800 = null;
		$ibtren->ren_1830 = null;
		$ibtren->ren_1900 = null;
		$ibtren->ren_1930 = null;
		$ibtren->ren_2000 = null;
		$ibtren->ren_2030 = null;
		$ibtren->ren_2100 = null;
		$ibtren->ren_2130 = null;
		$ibtren->ren_2200 = null;
		$ibtren->ren_2230 = null;
		$ibtren->ren_2300 = null;
		$ibtren->ren_2330 = null;
		$ibtren->ren_2400 = null;
		$data = array(
			'page' => 'add_ibt_ren',
			'row' => $ibtren
		);
		$data['title'] = 'Manual Input Data IBT | Perencanaan';
		$this->template->load('template', 'beban_sistem/ibt/form_perencanaan', $data);
	}

	//edit data perencanaan ibt
	public function edit_ibt_ren($id)
	{
		$query = $this->bebansistem_m->get_ibt_ren($id);
		if ($query->num_rows() > 0) {
			$ibtren = $query->row();
			$data = array(
				'page' => 'edit_ibt_ren',
				'row' => $ibtren
			);
			$data['title'] = 'Edit Data IBT | Perencanaan';
			$this->template->load('template', 'beban_sistem/ibt/form_perencanaan', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('beban_sistem/ibt_perencanaan') . "';</script>";
		}
	}

	//proses validasi manual input dan edit data perencanaan ibt
	public function process_ibt_ren()
	{
		//$this->form_validation->set_rules('tanggal', 'Tanggal', 'is_unique[tegangan_perencanaan.tanggal]');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|callback_data_check_ibt_ren');
		$this->form_validation->set_message('is_unique', 'data pada %s ini sudah ada');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add_ibt_ren'])) {

			if ($this->form_validation->run() == FALSE) {
				$ibtren = new stdClass();
				$ibtren->data_id = null;
				$ibtren->tanggal = null;
				$ibtren->ibt = null;
				$ibtren->kv = null;
				$ibtren->satuan = null;
				$ibtren->inom = null;
				$ibtren->status = null;
				$ibtren->ren_0030 = null;
				$ibtren->ren_0100 = null;
				$ibtren->ren_0130 = null;
				$ibtren->ren_0200 = null;
				$ibtren->ren_0230 = null;
				$ibtren->ren_0300 = null;
				$ibtren->ren_0330 = null;
				$ibtren->ren_0400 = null;
				$ibtren->ren_0430 = null;
				$ibtren->ren_0500 = null;
				$ibtren->ren_0530 = null;
				$ibtren->ren_0600 = null;
				$ibtren->ren_0630 = null;
				$ibtren->ren_0700 = null;
				$ibtren->ren_0730 = null;
				$ibtren->ren_0800 = null;
				$ibtren->ren_0830 = null;
				$ibtren->ren_0900 = null;
				$ibtren->ren_0930 = null;
				$ibtren->ren_1000 = null;
				$ibtren->ren_1030 = null;
				$ibtren->ren_1100 = null;
				$ibtren->ren_1130 = null;
				$ibtren->ren_1200 = null;
				$ibtren->ren_1230 = null;
				$ibtren->ren_1300 = null;
				$ibtren->ren_1330 = null;
				$ibtren->ren_1400 = null;
				$ibtren->ren_1430 = null;
				$ibtren->ren_1500 = null;
				$ibtren->ren_1530 = null;
				$ibtren->ren_1600 = null;
				$ibtren->ren_1630 = null;
				$ibtren->ren_1700 = null;
				$ibtren->ren_1730 = null;
				$ibtren->ren_1800 = null;
				$ibtren->ren_1830 = null;
				$ibtren->ren_1900 = null;
				$ibtren->ren_1930 = null;
				$ibtren->ren_2000 = null;
				$ibtren->ren_2030 = null;
				$ibtren->ren_2100 = null;
				$ibtren->ren_2130 = null;
				$ibtren->ren_2200 = null;
				$ibtren->ren_2230 = null;
				$ibtren->ren_2300 = null;
				$ibtren->ren_2330 = null;
				$ibtren->ren_2400 = null;
				$data = array(
					'page' => 'add_ibt_ren',
					'row' => $ibtren
				);
				$data['title'] = 'Manual Input Data IBT | Perencanaan';
				$this->template->load('template', 'beban_sistem/ibt/form_perencanaan', $data);
			} else {
				$this->bebansistem_m->add_ibt_ren($post);
				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil disimpan');</script>";
				}
				echo "<script>window.location='" . site_url('beban_sistem/ibt_perencanaan') . "';</script>";
			}
		} elseif (isset($_POST['edit_ibt_ren'])) {
			$this->bebansistem_m->edit_ibt_ren($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='" . site_url('beban_sistem/ibt_perencanaan') . "';</script>";
		}
	}

	//halaman import data perencanaan ibt
	public function import_ibt_ren()
	{
		$data['title'] = 'Import Data IBT | Perencanaan';
		$this->template->load('template', 'beban_sistem/ibt/import_ibt_ren', $data);
	}

	//validasi import data perencanaan ibt
	public function upload_ibt_ren()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|callback_date_check_ibt_ren');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('confirm', 'Confirmation Box');
			$data['title'] = 'Import Data IBT | Perencanaan';
			$this->template->load('template', 'beban_sistem/ibt/import_ibt_ren', $data);
		} else {
			$config['upload_path'] = './assets/admin/img/ibt_perencanaan/';
			$config['allowed_types'] = 'xlsx|xls';

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('file')) {
				$file = $this->upload->data();
				$reader = ReaderEntityFactory::createXLSXReader();
				$reader->setShouldFormatDates(true);
				$reader->open('assets/admin/img/ibt_perencanaan/' . $file['file_name']);
				foreach ($reader->getSheetIterator() as $sheet) {
					$numRow = 1;
					foreach ($sheet->getRowIterator() as $row) {
						if ($numRow > 1) {
							$ibt = array(
								'ibt' => $row->getCellAtIndex(1),
								'kv' => $row->getCellAtIndex(2),
								'inom' => $row->getCellAtIndex(3),
								'satuan' => $row->getCellAtIndex(4),
								'ren_0030' => $row->getCellAtIndex(5),
								'ren_0100' => $row->getCellAtIndex(6),
								'ren_0130' => $row->getCellAtIndex(7),
								'ren_0200' => $row->getCellAtIndex(8),
								'ren_0230' => $row->getCellAtIndex(9),
								'ren_0300' => $row->getCellAtIndex(10),
								'ren_0330' => $row->getCellAtIndex(11),
								'ren_0400' => $row->getCellAtIndex(12),
								'ren_0430' => $row->getCellAtIndex(13),
								'ren_0500' => $row->getCellAtIndex(14),
								'ren_0530' => $row->getCellAtIndex(15),
								'ren_0600' => $row->getCellAtIndex(16),
								'ren_0630' => $row->getCellAtIndex(17),
								'ren_0700' => $row->getCellAtIndex(18),
								'ren_0730' => $row->getCellAtIndex(19),
								'ren_0800' => $row->getCellAtIndex(20),
								'ren_0830' => $row->getCellAtIndex(21),
								'ren_0900' => $row->getCellAtIndex(22),
								'ren_0930' => $row->getCellAtIndex(23),
								'ren_1000' => $row->getCellAtIndex(24),
								'ren_1030' => $row->getCellAtIndex(25),
								'ren_1100' => $row->getCellAtIndex(26),
								'ren_1130' => $row->getCellAtIndex(27),
								'ren_1200' => $row->getCellAtIndex(28),
								'ren_1230' => $row->getCellAtIndex(29),
								'ren_1300' => $row->getCellAtIndex(30),
								'ren_1330' => $row->getCellAtIndex(31),
								'ren_1400' => $row->getCellAtIndex(32),
								'ren_1430' => $row->getCellAtIndex(33),
								'ren_1500' => $row->getCellAtIndex(34),
								'ren_1530' => $row->getCellAtIndex(35),
								'ren_1600' => $row->getCellAtIndex(36),
								'ren_1630' => $row->getCellAtIndex(37),
								'ren_1700' => $row->getCellAtIndex(38),
								'ren_1730' => $row->getCellAtIndex(39),
								'ren_1800' => $row->getCellAtIndex(40),
								'ren_1830' => $row->getCellAtIndex(41),
								'ren_1900' => $row->getCellAtIndex(42),
								'ren_1930' => $row->getCellAtIndex(43),
								'ren_2000' => $row->getCellAtIndex(44),
								'ren_2030' => $row->getCellAtIndex(45),
								'ren_2100' => $row->getCellAtIndex(46),
								'ren_2130' => $row->getCellAtIndex(47),
								'ren_2200' => $row->getCellAtIndex(48),
								'ren_2230' => $row->getCellAtIndex(49),
								'ren_2300' => $row->getCellAtIndex(50),
								'ren_2330' => $row->getCellAtIndex(51),
								'ren_2400' => $row->getCellAtIndex(52),
								'status' => $row->getCellAtIndex(53),
							);
							$this->bebansistem_m->import_ibt_ren($ibt);
						}
						$numRow++;
					}
					$reader->close();
					unlink('assets/admin/img/ibt_perencanaan/' . $file['file_name']);
				}

				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil ditambahkan');</script>";
				}
				echo "<script>window.location='" . site_url('beban_sistem/ibt_perencanaan') . "';</script>";
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				redirect('beban_sistem/ibt_perencanaan');
			}
		}
	}

	//function replace data perencanaan ibt

	//date check saat import data perencanaan ibt
	function date_check_ibt_ren()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM ibt_perencanaan WHERE tanggal = '$post[tanggal]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('date_check_ibt_ren', 'Data pada {field} ini sudah ada.');
			//$this->session->set_flashdata('confirm', 'Confirmation Box');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//data check saat manual input data perencanaan ibt
	function data_check_ibt_ren()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM ibt_perencanaan WHERE tanggal = '$post[tanggal]' 
		AND ibt = '$post[ibt]' AND kv = '$post[kv]' AND satuan = '$post[satuan]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('data_check_ibt_ren', 'Data pada {field} ini sudah ada.');
			//$this->session->set_flashdata('confirm', 'Confirmation Box');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//delete data perencanaan ibt
	public function del_ibt_ren($id)
	{
		$this->bebansistem_m->del_ibt_ren($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>";
		}
		echo "<script>window.location='" . site_url('beban_sistem/ibt_perencanaan') . "';</script>";
	}

	//list table data realisasi ibt
	public function ibt_realisasi()
	{
		$this->load->library('pagination');
		$config['base_url'] = site_url('beban_sistem/ibt_realisasi');
		$config['total_rows'] = $this->bebansistem_m->get_ibt_eval_pagination()->num_rows();
		$config['per_page'] = 15;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open']	= '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		$data['row'] = $this->bebansistem_m->get_ibt_eval_pagination($config['per_page'], $this->uri->segment(3));
		$data['title'] = 'IBT | Realisasi';
		$this->template->load('template', 'beban_sistem/ibt/realisasi', $data);
	}

	//manual input data realisasi ibt
	public function add_ibt_eval()
	{
		$ibteval = new stdClass();
		$ibteval->data_id = null;
		$ibteval->tanggal = null;
		$ibteval->ibt = null;
		$ibteval->kv = null;
		$ibteval->satuan = null;
		$ibteval->inom = null;
		$ibteval->status = null;
		$ibteval->eval_0030 = null;
		$ibteval->eval_0100 = null;
		$ibteval->eval_0130 = null;
		$ibteval->eval_0200 = null;
		$ibteval->eval_0230 = null;
		$ibteval->eval_0300 = null;
		$ibteval->eval_0330 = null;
		$ibteval->eval_0400 = null;
		$ibteval->eval_0430 = null;
		$ibteval->eval_0500 = null;
		$ibteval->eval_0530 = null;
		$ibteval->eval_0600 = null;
		$ibteval->eval_0630 = null;
		$ibteval->eval_0700 = null;
		$ibteval->eval_0730 = null;
		$ibteval->eval_0800 = null;
		$ibteval->eval_0830 = null;
		$ibteval->eval_0900 = null;
		$ibteval->eval_0930 = null;
		$ibteval->eval_1000 = null;
		$ibteval->eval_1030 = null;
		$ibteval->eval_1100 = null;
		$ibteval->eval_1130 = null;
		$ibteval->eval_1200 = null;
		$ibteval->eval_1230 = null;
		$ibteval->eval_1300 = null;
		$ibteval->eval_1330 = null;
		$ibteval->eval_1400 = null;
		$ibteval->eval_1430 = null;
		$ibteval->eval_1500 = null;
		$ibteval->eval_1530 = null;
		$ibteval->eval_1600 = null;
		$ibteval->eval_1630 = null;
		$ibteval->eval_1700 = null;
		$ibteval->eval_1730 = null;
		$ibteval->eval_1800 = null;
		$ibteval->eval_1830 = null;
		$ibteval->eval_1900 = null;
		$ibteval->eval_1930 = null;
		$ibteval->eval_2000 = null;
		$ibteval->eval_2030 = null;
		$ibteval->eval_2100 = null;
		$ibteval->eval_2130 = null;
		$ibteval->eval_2200 = null;
		$ibteval->eval_2230 = null;
		$ibteval->eval_2300 = null;
		$ibteval->eval_2330 = null;
		$ibteval->eval_2400 = null;
		$data = array(
			'page' => 'add_ibt_eval',
			'row' => $ibteval
		);
		$data['title'] = 'Manual Input Data IBT | Realisasi';
		$this->template->load('template', 'beban_sistem/ibt/form_realisasi', $data);
	}

	//edit data realisasi ibt
	public function edit_ibt_eval($id)
	{
		$query = $this->bebansistem_m->get_ibt_eval($id);
		if ($query->num_rows() > 0) {
			$ibt = $query->row();
			$data = array(
				'page' => 'edit_ibt_eval',
				'row' => $ibt
			);
			$data['title'] = 'Edit Data IBT | Realisasi';
			$this->template->load('template', 'beban_sistem/ibt/form_realisasi', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('beban_sistem/ibt_realisasi') . "';</script>";
		}
	}

	//proses validasi manual input dan edit data realisasi ibt
	public function process_ibt_eval()
	{
		//$this->form_validation->set_rules('tanggal', 'Tanggal', 'is_unique[tegangan_perencanaan.tanggal]');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|callback_data_check_ibt_eval');
		$this->form_validation->set_message('is_unique', 'data pada %s ini sudah ada');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add_ibt_eval'])) {

			if ($this->form_validation->run() == FALSE) {
				$ibteval = new stdClass();
				$ibteval->data_id = null;
				$ibteval->tanggal = null;
				$ibteval->ibt = null;
				$ibteval->kv = null;
				$ibteval->satuan = null;
				$ibteval->inom = null;
				$ibteval->status = null;
				$ibteval->eval_0030 = null;
				$ibteval->eval_0100 = null;
				$ibteval->eval_0130 = null;
				$ibteval->eval_0200 = null;
				$ibteval->eval_0230 = null;
				$ibteval->eval_0300 = null;
				$ibteval->eval_0330 = null;
				$ibteval->eval_0400 = null;
				$ibteval->eval_0430 = null;
				$ibteval->eval_0500 = null;
				$ibteval->eval_0530 = null;
				$ibteval->eval_0600 = null;
				$ibteval->eval_0630 = null;
				$ibteval->eval_0700 = null;
				$ibteval->eval_0730 = null;
				$ibteval->eval_0800 = null;
				$ibteval->eval_0830 = null;
				$ibteval->eval_0900 = null;
				$ibteval->eval_0930 = null;
				$ibteval->eval_1000 = null;
				$ibteval->eval_1030 = null;
				$ibteval->eval_1100 = null;
				$ibteval->eval_1130 = null;
				$ibteval->eval_1200 = null;
				$ibteval->eval_1230 = null;
				$ibteval->eval_1300 = null;
				$ibteval->eval_1330 = null;
				$ibteval->eval_1400 = null;
				$ibteval->eval_1430 = null;
				$ibteval->eval_1500 = null;
				$ibteval->eval_1530 = null;
				$ibteval->eval_1600 = null;
				$ibteval->eval_1630 = null;
				$ibteval->eval_1700 = null;
				$ibteval->eval_1730 = null;
				$ibteval->eval_1800 = null;
				$ibteval->eval_1830 = null;
				$ibteval->eval_1900 = null;
				$ibteval->eval_1930 = null;
				$ibteval->eval_2000 = null;
				$ibteval->eval_2030 = null;
				$ibteval->eval_2100 = null;
				$ibteval->eval_2130 = null;
				$ibteval->eval_2200 = null;
				$ibteval->eval_2230 = null;
				$ibteval->eval_2300 = null;
				$ibteval->eval_2330 = null;
				$ibteval->eval_2400 = null;
				$data = array(
					'page' => 'add_ibt_eval',
					'row' => $ibteval
				);
				$data['title'] = 'Manual Input Data IBT | Realisasi';
				$this->template->load('template', 'beban_sistem/ibt/form_realisasi', $data);
			} else {
				$this->bebansistem_m->add_ibt_eval($post);
				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil disimpan');</script>";
				}
				echo "<script>window.location='" . site_url('beban_sistem/ibt_realisasi') . "';</script>";
			}
		} elseif (isset($_POST['edit_ibt_eval'])) {
			$this->bebansistem_m->edit_ibt_eval($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='" . site_url('beban_sistem/ibt_realisasi') . "';</script>";
		}
	}

	//halaman import data realisasi ibt
	public function import_ibt_eval()
	{
		$data['title'] = 'Import Data IBT | Realisasi';
		$this->template->load('template', 'beban_sistem/ibt/import_ibt_eval', $data);
	}

	//validasi import data realisasi ibt
	public function upload_ibt_eval()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|callback_date_check_ibt_eval');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('confirm', 'Confirmation Box');
			$data['title'] = 'Import Data IBT | Realisasi';
			$this->template->load('template', 'beban_sistem/ibt/import_ibt_eval', $data);
		} else {
			$config['upload_path'] = './assets/admin/img/ibt_realisasi/';
			$config['allowed_types'] = 'xlsx|xls';

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('file')) {
				$file = $this->upload->data();
				$reader = ReaderEntityFactory::createXLSXReader();
				$reader->setShouldFormatDates(true);
				$reader->open('assets/admin/img/ibt_realisasi/' . $file['file_name']);
				foreach ($reader->getSheetIterator() as $sheet) {
					$numRow = 1;
					foreach ($sheet->getRowIterator() as $row) {
						if ($numRow > 1) {
							$ibt = array(
								'ibt' => $row->getCellAtIndex(1),
								'kv' => $row->getCellAtIndex(2),
								'inom' => $row->getCellAtIndex(3),
								'satuan' => $row->getCellAtIndex(4),
								'eval_0030' => $row->getCellAtIndex(5),
								'eval_0100' => $row->getCellAtIndex(6),
								'eval_0130' => $row->getCellAtIndex(7),
								'eval_0200' => $row->getCellAtIndex(8),
								'eval_0230' => $row->getCellAtIndex(9),
								'eval_0300' => $row->getCellAtIndex(10),
								'eval_0330' => $row->getCellAtIndex(11),
								'eval_0400' => $row->getCellAtIndex(12),
								'eval_0430' => $row->getCellAtIndex(13),
								'eval_0500' => $row->getCellAtIndex(14),
								'eval_0530' => $row->getCellAtIndex(15),
								'eval_0600' => $row->getCellAtIndex(16),
								'eval_0630' => $row->getCellAtIndex(17),
								'eval_0700' => $row->getCellAtIndex(18),
								'eval_0730' => $row->getCellAtIndex(19),
								'eval_0800' => $row->getCellAtIndex(20),
								'eval_0830' => $row->getCellAtIndex(21),
								'eval_0900' => $row->getCellAtIndex(22),
								'eval_0930' => $row->getCellAtIndex(23),
								'eval_1000' => $row->getCellAtIndex(24),
								'eval_1030' => $row->getCellAtIndex(25),
								'eval_1100' => $row->getCellAtIndex(26),
								'eval_1130' => $row->getCellAtIndex(27),
								'eval_1200' => $row->getCellAtIndex(28),
								'eval_1230' => $row->getCellAtIndex(29),
								'eval_1300' => $row->getCellAtIndex(30),
								'eval_1330' => $row->getCellAtIndex(31),
								'eval_1400' => $row->getCellAtIndex(32),
								'eval_1430' => $row->getCellAtIndex(33),
								'eval_1500' => $row->getCellAtIndex(34),
								'eval_1530' => $row->getCellAtIndex(35),
								'eval_1600' => $row->getCellAtIndex(36),
								'eval_1630' => $row->getCellAtIndex(37),
								'eval_1700' => $row->getCellAtIndex(38),
								'eval_1730' => $row->getCellAtIndex(39),
								'eval_1800' => $row->getCellAtIndex(40),
								'eval_1830' => $row->getCellAtIndex(41),
								'eval_1900' => $row->getCellAtIndex(42),
								'eval_1930' => $row->getCellAtIndex(43),
								'eval_2000' => $row->getCellAtIndex(44),
								'eval_2030' => $row->getCellAtIndex(45),
								'eval_2100' => $row->getCellAtIndex(46),
								'eval_2130' => $row->getCellAtIndex(47),
								'eval_2200' => $row->getCellAtIndex(48),
								'eval_2230' => $row->getCellAtIndex(49),
								'eval_2300' => $row->getCellAtIndex(50),
								'eval_2330' => $row->getCellAtIndex(51),
								'eval_2400' => $row->getCellAtIndex(52),
								'status' => $row->getCellAtIndex(53),
							);
							$this->bebansistem_m->import_ibt_eval($ibt);
						}
						$numRow++;
					}
					$reader->close();
					unlink('assets/admin/img/ibt_realisasi/' . $file['file_name']);
				}

				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil ditambahkan');</script>";
				}
				echo "<script>window.location='" . site_url('beban_sistem/ibt_realisasi') . "';</script>";
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				//redirect('beban_sistem/sistem_realisasi');
			}
		}
	}

	//function replace data realisasi ibt

	//date check saat import data realisasi ibt
	function date_check_ibt_eval()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM ibt_realisasi WHERE tanggal = '$post[tanggal]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('date_check_ibt_eval', 'Data pada {field} ini sudah ada.');
			//$this->session->set_flashdata('confirm', 'Confirmation Box');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//data check saat manual input data realisasi ibt
	function data_check_ibt_eval()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM ibt_realisasi WHERE tanggal = '$post[tanggal]' 
		AND ibt = '$post[ibt]' AND kv = '$post[kv]' AND satuan = '$post[satuan]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('data_check_ibt_eval', 'Data pada {field} ini sudah ada.');
			//$this->session->set_flashdata('confirm', 'Confirmation Box');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//delete data realisasi ibt
	public function del_ibt_eval($id)
	{
		$this->bebansistem_m->del_ibt_eval($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>";
		}
		echo "<script>window.location='" . site_url('beban_sistem/ibt_realisasi') . "';</script>";
	}

	//TRAFO

	//list table data perencanaan trafo
	public function trafo_perencanaan()
	{
		$this->load->library('pagination');
		$config['base_url'] = site_url('beban_sistem/trafo_perencanaan');
		$config['total_rows'] = $this->bebansistem_m->get_trafo_ren_pagination()->num_rows();
		$config['per_page'] = 15;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open']	= '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		$data['row'] = $this->bebansistem_m->get_trafo_ren_pagination($config['per_page'], $this->uri->segment(3));
		$data['title'] = 'Trafo | Perencanaan';
		$this->template->load('template', 'beban_sistem/trafo/perencanaan', $data);
	}

	//manual input data perencanaan trafo
	public function add_trafo_ren()
	{
		$traforen = new stdClass();
		$traforen->data_id = null;
		$traforen->tanggal = null;
		$traforen->trafo = null;
		$traforen->satuan = null;
		$traforen->status = null;
		$traforen->ren_0030 = null;
		$traforen->ren_0100 = null;
		$traforen->ren_0130 = null;
		$traforen->ren_0200 = null;
		$traforen->ren_0230 = null;
		$traforen->ren_0300 = null;
		$traforen->ren_0330 = null;
		$traforen->ren_0400 = null;
		$traforen->ren_0430 = null;
		$traforen->ren_0500 = null;
		$traforen->ren_0530 = null;
		$traforen->ren_0600 = null;
		$traforen->ren_0630 = null;
		$traforen->ren_0700 = null;
		$traforen->ren_0730 = null;
		$traforen->ren_0800 = null;
		$traforen->ren_0830 = null;
		$traforen->ren_0900 = null;
		$traforen->ren_0930 = null;
		$traforen->ren_1000 = null;
		$traforen->ren_1030 = null;
		$traforen->ren_1100 = null;
		$traforen->ren_1130 = null;
		$traforen->ren_1200 = null;
		$traforen->ren_1230 = null;
		$traforen->ren_1300 = null;
		$traforen->ren_1330 = null;
		$traforen->ren_1400 = null;
		$traforen->ren_1430 = null;
		$traforen->ren_1500 = null;
		$traforen->ren_1530 = null;
		$traforen->ren_1600 = null;
		$traforen->ren_1630 = null;
		$traforen->ren_1700 = null;
		$traforen->ren_1730 = null;
		$traforen->ren_1800 = null;
		$traforen->ren_1830 = null;
		$traforen->ren_1900 = null;
		$traforen->ren_1930 = null;
		$traforen->ren_2000 = null;
		$traforen->ren_2030 = null;
		$traforen->ren_2100 = null;
		$traforen->ren_2130 = null;
		$traforen->ren_2200 = null;
		$traforen->ren_2230 = null;
		$traforen->ren_2300 = null;
		$traforen->ren_2330 = null;
		$traforen->ren_2400 = null;
		$data = array(
			'page' => 'add_trafo_ren',
			'row' => $traforen
		);
		$data['title'] = 'Manual Input Data Trafo | Perencanaan';
		$this->template->load('template', 'beban_sistem/trafo/form_perencanaan', $data);
	}

	//edit data perencanaan trafo
	public function edit_trafo_ren($id)
	{
		$query = $this->bebansistem_m->get_trafo_ren($id);
		if ($query->num_rows() > 0) {
			$traforen = $query->row();
			$data = array(
				'page' => 'edit_trafo_ren',
				'row' => $traforen
			);
			$data['title'] = 'Edit Data Trafo | Perencanaan';
			$this->template->load('template', 'beban_sistem/trafo/form_perencanaan', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('beban_sistem/trafo_perencanaan') . "';</script>";
		}
	}

	//proses validasi manual input dan edit data perencanaan trafo
	public function process_trafo_ren()
	{
		//$this->form_validation->set_rules('tanggal', 'Tanggal', 'is_unique[tegangan_perencanaan.tanggal]');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|callback_data_check_trafo_ren');
		$this->form_validation->set_message('is_unique', 'data pada %s ini sudah ada');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add_trafo_ren'])) {

			if ($this->form_validation->run() == FALSE) {
				$traforen = new stdClass();
				$traforen->data_id = null;
				$traforen->tanggal = null;
				$traforen->trafo = null;
				$traforen->satuan = null;
				$traforen->status = null;
				$traforen->ren_0030 = null;
				$traforen->ren_0100 = null;
				$traforen->ren_0130 = null;
				$traforen->ren_0200 = null;
				$traforen->ren_0230 = null;
				$traforen->ren_0300 = null;
				$traforen->ren_0330 = null;
				$traforen->ren_0400 = null;
				$traforen->ren_0430 = null;
				$traforen->ren_0500 = null;
				$traforen->ren_0530 = null;
				$traforen->ren_0600 = null;
				$traforen->ren_0630 = null;
				$traforen->ren_0700 = null;
				$traforen->ren_0730 = null;
				$traforen->ren_0800 = null;
				$traforen->ren_0830 = null;
				$traforen->ren_0900 = null;
				$traforen->ren_0930 = null;
				$traforen->ren_1000 = null;
				$traforen->ren_1030 = null;
				$traforen->ren_1100 = null;
				$traforen->ren_1130 = null;
				$traforen->ren_1200 = null;
				$traforen->ren_1230 = null;
				$traforen->ren_1300 = null;
				$traforen->ren_1330 = null;
				$traforen->ren_1400 = null;
				$traforen->ren_1430 = null;
				$traforen->ren_1500 = null;
				$traforen->ren_1530 = null;
				$traforen->ren_1600 = null;
				$traforen->ren_1630 = null;
				$traforen->ren_1700 = null;
				$traforen->ren_1730 = null;
				$traforen->ren_1800 = null;
				$traforen->ren_1830 = null;
				$traforen->ren_1900 = null;
				$traforen->ren_1930 = null;
				$traforen->ren_2000 = null;
				$traforen->ren_2030 = null;
				$traforen->ren_2100 = null;
				$traforen->ren_2130 = null;
				$traforen->ren_2200 = null;
				$traforen->ren_2230 = null;
				$traforen->ren_2300 = null;
				$traforen->ren_2330 = null;
				$traforen->ren_2400 = null;
				$data = array(
					'page' => 'add_trafo_ren',
					'row' => $traforen
				);
				$data['title'] = 'Manual Input Data Trafo | Perencanaan';
				$this->template->load('template', 'beban_sistem/trafo/form_perencanaan', $data);
			} else {
				$this->bebansistem_m->add_trafo_ren($post);
				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil disimpan');</script>";
				}
				echo "<script>window.location='" . site_url('beban_sistem/trafo_perencanaan') . "';</script>";
			}
		} elseif (isset($_POST['edit_trafo_ren'])) {
			$this->bebansistem_m->edit_trafo_ren($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='" . site_url('beban_sistem/trafo_perencanaan') . "';</script>";
		}
	}

	//halaman import data perencanaan trafo
	public function import_trafo_ren()
	{
		$data['title'] = 'Import Data Trafo | Perencanaan';
		$this->template->load('template', 'beban_sistem/trafo/import_trafo_ren', $data);
	}

	//validasi import data perencanaan trafo
	public function upload_trafo_ren()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|callback_date_check_trafo_ren');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('confirm', 'Confirmation Box');
			$data['title'] = 'Import Data Trafo | Perencanaan';
			$this->template->load('template', 'beban_sistem/trafo/import_trafo_ren', $data);
		} else {
			$config['upload_path'] = './assets/admin/img/trafo_perencanaan/';
			$config['allowed_types'] = 'xlsx|xls';

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('file')) {
				$file = $this->upload->data();
				$reader = ReaderEntityFactory::createXLSXReader();
				$reader->setShouldFormatDates(true);
				$reader->open('assets/admin/img/trafo_perencanaan/' . $file['file_name']);
				foreach ($reader->getSheetIterator() as $sheet) {
					$numRow = 1;
					foreach ($sheet->getRowIterator() as $row) {
						if ($numRow > 1) {
							$trafo = array(
								'trafo' => $row->getCellAtIndex(1),
								'satuan' => $row->getCellAtIndex(2),
								'ren_0030' => $row->getCellAtIndex(3),
								'ren_0100' => $row->getCellAtIndex(4),
								'ren_0130' => $row->getCellAtIndex(5),
								'ren_0200' => $row->getCellAtIndex(6),
								'ren_0230' => $row->getCellAtIndex(7),
								'ren_0300' => $row->getCellAtIndex(8),
								'ren_0330' => $row->getCellAtIndex(9),
								'ren_0400' => $row->getCellAtIndex(10),
								'ren_0430' => $row->getCellAtIndex(11),
								'ren_0500' => $row->getCellAtIndex(12),
								'ren_0530' => $row->getCellAtIndex(13),
								'ren_0600' => $row->getCellAtIndex(14),
								'ren_0630' => $row->getCellAtIndex(15),
								'ren_0700' => $row->getCellAtIndex(16),
								'ren_0730' => $row->getCellAtIndex(17),
								'ren_0800' => $row->getCellAtIndex(18),
								'ren_0830' => $row->getCellAtIndex(19),
								'ren_0900' => $row->getCellAtIndex(20),
								'ren_0930' => $row->getCellAtIndex(21),
								'ren_1000' => $row->getCellAtIndex(22),
								'ren_1030' => $row->getCellAtIndex(23),
								'ren_1100' => $row->getCellAtIndex(24),
								'ren_1130' => $row->getCellAtIndex(25),
								'ren_1200' => $row->getCellAtIndex(26),
								'ren_1230' => $row->getCellAtIndex(27),
								'ren_1300' => $row->getCellAtIndex(28),
								'ren_1330' => $row->getCellAtIndex(29),
								'ren_1400' => $row->getCellAtIndex(30),
								'ren_1430' => $row->getCellAtIndex(31),
								'ren_1500' => $row->getCellAtIndex(32),
								'ren_1530' => $row->getCellAtIndex(33),
								'ren_1600' => $row->getCellAtIndex(34),
								'ren_1630' => $row->getCellAtIndex(35),
								'ren_1700' => $row->getCellAtIndex(36),
								'ren_1730' => $row->getCellAtIndex(37),
								'ren_1800' => $row->getCellAtIndex(38),
								'ren_1830' => $row->getCellAtIndex(39),
								'ren_1900' => $row->getCellAtIndex(40),
								'ren_1930' => $row->getCellAtIndex(41),
								'ren_2000' => $row->getCellAtIndex(42),
								'ren_2030' => $row->getCellAtIndex(43),
								'ren_2100' => $row->getCellAtIndex(44),
								'ren_2130' => $row->getCellAtIndex(45),
								'ren_2200' => $row->getCellAtIndex(46),
								'ren_2230' => $row->getCellAtIndex(47),
								'ren_2300' => $row->getCellAtIndex(48),
								'ren_2330' => $row->getCellAtIndex(49),
								'ren_2400' => $row->getCellAtIndex(50),
								'status' => $row->getCellAtIndex(51),
							);
							$this->bebansistem_m->import_trafo_ren($trafo);
						}
						$numRow++;
					}
					$reader->close();
					unlink('assets/admin/img/trafo_perencanaan/' . $file['file_name']);
				}

				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil ditambahkan');</script>";
				}
				echo "<script>window.location='" . site_url('beban_sistem/trafo_perencanaan') . "';</script>";
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				redirect('beban_sistem/trafo_perencanaan');
			}
		}
	}

	//function replace data perencanaan trafo

	//date check saat import data perencanaan trafo
	function date_check_trafo_ren()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM trafo_perencanaan WHERE tanggal = '$post[tanggal]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('date_check_trafo_ren', 'Data pada {field} ini sudah ada.');
			//$this->session->set_flashdata('confirm', 'Confirmation Box');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//data check saat manual input data perencanaan trafo
	function data_check_trafo_ren()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM trafo_perencanaan WHERE tanggal = '$post[tanggal]' 
		AND trafo = '$post[trafo]' AND satuan = '$post[satuan]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('data_check_trafo_ren', 'Data pada {field} ini sudah ada.');
			//$this->session->set_flashdata('confirm', 'Confirmation Box');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//delete data perencanaan trafo
	public function del_trafo_ren($id)
	{
		$this->bebansistem_m->del_trafo_ren($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>";
		}
		echo "<script>window.location='" . site_url('beban_sistem/trafo_perencanaan') . "';</script>";
	}

	//list table data realisasi trafo
	public function trafo_realisasi()
	{
		$this->load->library('pagination');
		$config['base_url'] = site_url('beban_sistem/trafo_realisasi');
		$config['total_rows'] = $this->bebansistem_m->get_trafo_eval_pagination()->num_rows();
		$config['per_page'] = 15;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open']	= '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		$data['row'] = $this->bebansistem_m->get_trafo_eval_pagination($config['per_page'], $this->uri->segment(3));
		$data['title'] = 'Trafo | Realisasi';
		$this->template->load('template', 'beban_sistem/trafo/realisasi', $data);
	}

	//manual input data realisasi trafo
	public function add_trafo_eval()
	{
		$trafoeval = new stdClass();
		$trafoeval->data_id = null;
		$trafoeval->tanggal = null;
		$trafoeval->trafo = null;
		$trafoeval->satuan = null;
		$trafoeval->status = null;
		$trafoeval->eval_0030 = null;
		$trafoeval->eval_0100 = null;
		$trafoeval->eval_0130 = null;
		$trafoeval->eval_0200 = null;
		$trafoeval->eval_0230 = null;
		$trafoeval->eval_0300 = null;
		$trafoeval->eval_0330 = null;
		$trafoeval->eval_0400 = null;
		$trafoeval->eval_0430 = null;
		$trafoeval->eval_0500 = null;
		$trafoeval->eval_0530 = null;
		$trafoeval->eval_0600 = null;
		$trafoeval->eval_0630 = null;
		$trafoeval->eval_0700 = null;
		$trafoeval->eval_0730 = null;
		$trafoeval->eval_0800 = null;
		$trafoeval->eval_0830 = null;
		$trafoeval->eval_0900 = null;
		$trafoeval->eval_0930 = null;
		$trafoeval->eval_1000 = null;
		$trafoeval->eval_1030 = null;
		$trafoeval->eval_1100 = null;
		$trafoeval->eval_1130 = null;
		$trafoeval->eval_1200 = null;
		$trafoeval->eval_1230 = null;
		$trafoeval->eval_1300 = null;
		$trafoeval->eval_1330 = null;
		$trafoeval->eval_1400 = null;
		$trafoeval->eval_1430 = null;
		$trafoeval->eval_1500 = null;
		$trafoeval->eval_1530 = null;
		$trafoeval->eval_1600 = null;
		$trafoeval->eval_1630 = null;
		$trafoeval->eval_1700 = null;
		$trafoeval->eval_1730 = null;
		$trafoeval->eval_1800 = null;
		$trafoeval->eval_1830 = null;
		$trafoeval->eval_1900 = null;
		$trafoeval->eval_1930 = null;
		$trafoeval->eval_2000 = null;
		$trafoeval->eval_2030 = null;
		$trafoeval->eval_2100 = null;
		$trafoeval->eval_2130 = null;
		$trafoeval->eval_2200 = null;
		$trafoeval->eval_2230 = null;
		$trafoeval->eval_2300 = null;
		$trafoeval->eval_2330 = null;
		$trafoeval->eval_2400 = null;
		$data = array(
			'page' => 'add_trafo_eval',
			'row' => $trafoeval
		);
		$data['title'] = 'Manual Input Data Trafo | Realisasi';
		$this->template->load('template', 'beban_sistem/trafo/form_realisasi', $data);
	}

	//edit data realisasi trafo
	public function edit_trafo_eval($id)
	{
		$query = $this->bebansistem_m->get_trafo_eval($id);
		if ($query->num_rows() > 0) {
			$trafo = $query->row();
			$data = array(
				'page' => 'edit_trafo_eval',
				'row' => $trafo
			);
			$data['title'] = 'Edit Data Trafo | Realisasi';
			$this->template->load('template', 'beban_sistem/trafo/form_realisasi', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('beban_sistem/trafo_realisasi') . "';</script>";
		}
	}

	//proses validasi manual input dan edit data realisasi trafo
	public function process_trafo_eval()
	{
		//$this->form_validation->set_rules('tanggal', 'Tanggal', 'is_unique[tegangan_perencanaan.tanggal]');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|callback_data_check_trafo_eval');
		$this->form_validation->set_message('is_unique', 'data pada %s ini sudah ada');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add_trafo_eval'])) {

			if ($this->form_validation->run() == FALSE) {
				$trafoeval = new stdClass();
				$trafoeval->data_id = null;
				$trafoeval->tanggal = null;
				$trafoeval->trafo = null;
				$trafoeval->satuan = null;
				$trafoeval->status = null;
				$trafoeval->eval_0030 = null;
				$trafoeval->eval_0100 = null;
				$trafoeval->eval_0130 = null;
				$trafoeval->eval_0200 = null;
				$trafoeval->eval_0230 = null;
				$trafoeval->eval_0300 = null;
				$trafoeval->eval_0330 = null;
				$trafoeval->eval_0400 = null;
				$trafoeval->eval_0430 = null;
				$trafoeval->eval_0500 = null;
				$trafoeval->eval_0530 = null;
				$trafoeval->eval_0600 = null;
				$trafoeval->eval_0630 = null;
				$trafoeval->eval_0700 = null;
				$trafoeval->eval_0730 = null;
				$trafoeval->eval_0800 = null;
				$trafoeval->eval_0830 = null;
				$trafoeval->eval_0900 = null;
				$trafoeval->eval_0930 = null;
				$trafoeval->eval_1000 = null;
				$trafoeval->eval_1030 = null;
				$trafoeval->eval_1100 = null;
				$trafoeval->eval_1130 = null;
				$trafoeval->eval_1200 = null;
				$trafoeval->eval_1230 = null;
				$trafoeval->eval_1300 = null;
				$trafoeval->eval_1330 = null;
				$trafoeval->eval_1400 = null;
				$trafoeval->eval_1430 = null;
				$trafoeval->eval_1500 = null;
				$trafoeval->eval_1530 = null;
				$trafoeval->eval_1600 = null;
				$trafoeval->eval_1630 = null;
				$trafoeval->eval_1700 = null;
				$trafoeval->eval_1730 = null;
				$trafoeval->eval_1800 = null;
				$trafoeval->eval_1830 = null;
				$trafoeval->eval_1900 = null;
				$trafoeval->eval_1930 = null;
				$trafoeval->eval_2000 = null;
				$trafoeval->eval_2030 = null;
				$trafoeval->eval_2100 = null;
				$trafoeval->eval_2130 = null;
				$trafoeval->eval_2200 = null;
				$trafoeval->eval_2230 = null;
				$trafoeval->eval_2300 = null;
				$trafoeval->eval_2330 = null;
				$trafoeval->eval_2400 = null;
				$data = array(
					'page' => 'add_trafo_eval',
					'row' => $trafoeval
				);
				$data['title'] = 'Manual Input Data Trafo | Realisasi';
				$this->template->load('template', 'beban_sistem/trafo/form_realisasi', $data);
			} else {
				$this->bebansistem_m->add_trafo_eval($post);
				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil disimpan');</script>";
				}
				echo "<script>window.location='" . site_url('beban_sistem/trafo_realisasi') . "';</script>";
			}
		} elseif (isset($_POST['edit_trafo_eval'])) {
			$this->bebansistem_m->edit_trafo_eval($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='" . site_url('beban_sistem/trafo_realisasi') . "';</script>";
		}
	}

	//halaman import data realisasi trafo
	public function import_trafo_eval()
	{
		$data['title'] = 'Import Data Trafo | Realisasi';
		$this->template->load('template', 'beban_sistem/trafo/import_trafo_eval', $data);
	}

	//validasi import data realisasi trafo
	public function upload_trafo_eval()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|callback_date_check_trafo_eval');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('confirm', 'Confirmation Box');
			$data['title'] = 'Import Data Trafo | Realisasi';
			$this->template->load('template', 'beban_sistem/trafo/import_trafo_eval', $data);
		} else {
			$config['upload_path'] = './assets/admin/img/trafo_realisasi/';
			$config['allowed_types'] = 'xlsx|xls';

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('file')) {
				$file = $this->upload->data();
				$reader = ReaderEntityFactory::createXLSXReader();
				$reader->setShouldFormatDates(true);
				$reader->open('assets/admin/img/trafo_realisasi/' . $file['file_name']);
				foreach ($reader->getSheetIterator() as $sheet) {
					$numRow = 1;
					foreach ($sheet->getRowIterator() as $row) {
						if ($numRow > 1) {
							$trafo = array(
								'trafo' => $row->getCellAtIndex(1),
								'satuan' => $row->getCellAtIndex(2),
								'eval_0030' => $row->getCellAtIndex(3),
								'eval_0100' => $row->getCellAtIndex(4),
								'eval_0130' => $row->getCellAtIndex(5),
								'eval_0200' => $row->getCellAtIndex(6),
								'eval_0230' => $row->getCellAtIndex(7),
								'eval_0300' => $row->getCellAtIndex(8),
								'eval_0330' => $row->getCellAtIndex(9),
								'eval_0400' => $row->getCellAtIndex(10),
								'eval_0430' => $row->getCellAtIndex(11),
								'eval_0500' => $row->getCellAtIndex(12),
								'eval_0530' => $row->getCellAtIndex(13),
								'eval_0600' => $row->getCellAtIndex(14),
								'eval_0630' => $row->getCellAtIndex(15),
								'eval_0700' => $row->getCellAtIndex(16),
								'eval_0730' => $row->getCellAtIndex(17),
								'eval_0800' => $row->getCellAtIndex(18),
								'eval_0830' => $row->getCellAtIndex(19),
								'eval_0900' => $row->getCellAtIndex(20),
								'eval_0930' => $row->getCellAtIndex(21),
								'eval_1000' => $row->getCellAtIndex(22),
								'eval_1030' => $row->getCellAtIndex(23),
								'eval_1100' => $row->getCellAtIndex(24),
								'eval_1130' => $row->getCellAtIndex(25),
								'eval_1200' => $row->getCellAtIndex(26),
								'eval_1230' => $row->getCellAtIndex(27),
								'eval_1300' => $row->getCellAtIndex(28),
								'eval_1330' => $row->getCellAtIndex(29),
								'eval_1400' => $row->getCellAtIndex(30),
								'eval_1430' => $row->getCellAtIndex(31),
								'eval_1500' => $row->getCellAtIndex(32),
								'eval_1530' => $row->getCellAtIndex(33),
								'eval_1600' => $row->getCellAtIndex(34),
								'eval_1630' => $row->getCellAtIndex(35),
								'eval_1700' => $row->getCellAtIndex(36),
								'eval_1730' => $row->getCellAtIndex(37),
								'eval_1800' => $row->getCellAtIndex(38),
								'eval_1830' => $row->getCellAtIndex(39),
								'eval_1900' => $row->getCellAtIndex(40),
								'eval_1930' => $row->getCellAtIndex(41),
								'eval_2000' => $row->getCellAtIndex(42),
								'eval_2030' => $row->getCellAtIndex(43),
								'eval_2100' => $row->getCellAtIndex(44),
								'eval_2130' => $row->getCellAtIndex(45),
								'eval_2200' => $row->getCellAtIndex(46),
								'eval_2230' => $row->getCellAtIndex(47),
								'eval_2300' => $row->getCellAtIndex(48),
								'eval_2330' => $row->getCellAtIndex(49),
								'eval_2400' => $row->getCellAtIndex(50),
								'status' => $row->getCellAtIndex(51),
							);
							$this->bebansistem_m->import_trafo_eval($trafo);
						}
						$numRow++;
					}
					$reader->close();
					unlink('assets/admin/img/trafo_realisasi/' . $file['file_name']);
				}

				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil ditambahkan');</script>";
				}
				echo "<script>window.location='" . site_url('beban_sistem/trafo_realisasi') . "';</script>";
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				//redirect('beban_sistem/sistem_realisasi');
			}
		}
	}

	//function replace data realisasi trafo

	//date check saat import data realisasi trafo
	function date_check_trafo_eval()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM trafo_realisasi WHERE tanggal = '$post[tanggal]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('date_check_trafo_eval', 'Data pada {field} ini sudah ada.');
			//$this->session->set_flashdata('confirm', 'Confirmation Box');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//data check saat manual input data realisasi trafo
	function data_check_trafo_eval()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM trafo_realisasi WHERE tanggal = '$post[tanggal]' 
		AND trafo = '$post[trafo]' AND satuan = '$post[satuan]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('data_check_trafo_eval', 'Data pada {field} ini sudah ada.');
			//$this->session->set_flashdata('confirm', 'Confirmation Box');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//delete data realisasi trafo
	public function del_trafo_eval($id)
	{
		$this->bebansistem_m->del_trafo_eval($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>";
		}
		echo "<script>window.location='" . site_url('beban_sistem/trafo_realisasi') . "';</script>";
	}

	//SISTEM

	//list table data perencanaan sistem
	public function sistem_perencanaan()
	{
		$this->load->library('pagination');
		$config['base_url'] = site_url('beban_sistem/sistem_perencanaan');
		$config['total_rows'] = $this->bebansistem_m->get_sistem_ren_pagination()->num_rows();
		$config['per_page'] = 15;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open']	= '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		$data['row'] = $this->bebansistem_m->get_sistem_ren_pagination($config['per_page'], $this->uri->segment(3));
		$data['title'] = 'Sistem | Perencanaan';
		$this->template->load('template', 'beban_sistem/sistem/perencanaan', $data);
	}

	//manual input data perencanaan sistem
	public function add_sistem_ren()
	{
		$sistemren = new stdClass();
		$sistemren->data_id = null;
		$sistemren->tanggal = null;
		$sistemren->sistem = null;
		$sistemren->status = null;
		$sistemren->ren_0030 = null;
		$sistemren->ren_0100 = null;
		$sistemren->ren_0130 = null;
		$sistemren->ren_0200 = null;
		$sistemren->ren_0230 = null;
		$sistemren->ren_0300 = null;
		$sistemren->ren_0330 = null;
		$sistemren->ren_0400 = null;
		$sistemren->ren_0430 = null;
		$sistemren->ren_0500 = null;
		$sistemren->ren_0530 = null;
		$sistemren->ren_0600 = null;
		$sistemren->ren_0630 = null;
		$sistemren->ren_0700 = null;
		$sistemren->ren_0730 = null;
		$sistemren->ren_0800 = null;
		$sistemren->ren_0830 = null;
		$sistemren->ren_0900 = null;
		$sistemren->ren_0930 = null;
		$sistemren->ren_1000 = null;
		$sistemren->ren_1030 = null;
		$sistemren->ren_1100 = null;
		$sistemren->ren_1130 = null;
		$sistemren->ren_1200 = null;
		$sistemren->ren_1230 = null;
		$sistemren->ren_1300 = null;
		$sistemren->ren_1330 = null;
		$sistemren->ren_1400 = null;
		$sistemren->ren_1430 = null;
		$sistemren->ren_1500 = null;
		$sistemren->ren_1530 = null;
		$sistemren->ren_1600 = null;
		$sistemren->ren_1630 = null;
		$sistemren->ren_1700 = null;
		$sistemren->ren_1730 = null;
		$sistemren->ren_1800 = null;
		$sistemren->ren_1830 = null;
		$sistemren->ren_1900 = null;
		$sistemren->ren_1930 = null;
		$sistemren->ren_2000 = null;
		$sistemren->ren_2030 = null;
		$sistemren->ren_2100 = null;
		$sistemren->ren_2130 = null;
		$sistemren->ren_2200 = null;
		$sistemren->ren_2230 = null;
		$sistemren->ren_2300 = null;
		$sistemren->ren_2330 = null;
		$sistemren->ren_2400 = null;
		$data = array(
			'page' => 'add_sistem_ren',
			'row' => $sistemren
		);
		$data['title'] = 'Manual Input Data Sistem | Perencanaan';
		$this->template->load('template', 'beban_sistem/sistem/form_perencanaan', $data);
	}

	//edit data perencanaan sistem
	public function edit_sistem_ren($id)
	{
		$query = $this->bebansistem_m->get_sistem_ren($id);
		if ($query->num_rows() > 0) {
			$sistemren = $query->row();
			$data = array(
				'page' => 'edit_sistem_ren',
				'row' => $sistemren
			);
			$data['title'] = 'Edit Data Sistem | Perencanaan';
			$this->template->load('template', 'beban_sistem/sistem/form_perencanaan', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('beban_sistem/sistem_perencanaan') . "';</script>";
		}
	}

	//proses validasi manual input dan edit data perencanaan sistem
	public function process_sistem_ren()
	{
		//$this->form_validation->set_rules('tanggal', 'Tanggal', 'is_unique[tegangan_perencanaan.tanggal]');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|callback_data_check_sistem_ren');
		$this->form_validation->set_message('is_unique', 'data pada %s ini sudah ada');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add_sistem_ren'])) {

			if ($this->form_validation->run() == FALSE) {
				$sistemren = new stdClass();
				$sistemren->data_id = null;
				$sistemren->tanggal = null;
				$sistemren->sistem = null;
				$sistemren->ren_0030 = null;
				$sistemren->ren_0100 = null;
				$sistemren->ren_0130 = null;
				$sistemren->ren_0200 = null;
				$sistemren->ren_0230 = null;
				$sistemren->ren_0300 = null;
				$sistemren->ren_0330 = null;
				$sistemren->ren_0400 = null;
				$sistemren->ren_0430 = null;
				$sistemren->ren_0500 = null;
				$sistemren->ren_0530 = null;
				$sistemren->ren_0600 = null;
				$sistemren->ren_0630 = null;
				$sistemren->ren_0700 = null;
				$sistemren->ren_0730 = null;
				$sistemren->ren_0800 = null;
				$sistemren->ren_0830 = null;
				$sistemren->ren_0900 = null;
				$sistemren->ren_0930 = null;
				$sistemren->ren_1000 = null;
				$sistemren->ren_1030 = null;
				$sistemren->ren_1100 = null;
				$sistemren->ren_1130 = null;
				$sistemren->ren_1200 = null;
				$sistemren->ren_1230 = null;
				$sistemren->ren_1300 = null;
				$sistemren->ren_1330 = null;
				$sistemren->ren_1400 = null;
				$sistemren->ren_1430 = null;
				$sistemren->ren_1500 = null;
				$sistemren->ren_1530 = null;
				$sistemren->ren_1600 = null;
				$sistemren->ren_1630 = null;
				$sistemren->ren_1700 = null;
				$sistemren->ren_1730 = null;
				$sistemren->ren_1800 = null;
				$sistemren->ren_1830 = null;
				$sistemren->ren_1900 = null;
				$sistemren->ren_1930 = null;
				$sistemren->ren_2000 = null;
				$sistemren->ren_2030 = null;
				$sistemren->ren_2100 = null;
				$sistemren->ren_2130 = null;
				$sistemren->ren_2200 = null;
				$sistemren->ren_2230 = null;
				$sistemren->ren_2300 = null;
				$sistemren->ren_2330 = null;
				$sistemren->ren_2400 = null;
				$data = array(
					'page' => 'add_sistem_ren',
					'row' => $sistemren
				);
				$data['title'] = 'Manual Input Data Sistem | Perencanaan';
				$this->template->load('template', 'beban_sistem/sistem/form_perencanaan', $data);
			} else {
				$this->bebansistem_m->add_sistem_ren($post);
				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil disimpan');</script>";
				}
				echo "<script>window.location='" . site_url('beban_sistem/sistem_perencanaan') . "';</script>";
			}
		} elseif (isset($_POST['edit_sistem_ren'])) {
			$this->bebansistem_m->edit_sistem_ren($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='" . site_url('beban_sistem/sistem_perencanaan') . "';</script>";
		}
	}

	//halaman import data perencanaan sistem
	public function import_sistem_ren()
	{
		$data['title'] = 'Import Data Sistem | Perencanaan';
		$this->template->load('template', 'beban_sistem/sistem/import_sistem_ren', $data);
	}

	//validasi import data perencanaan sistem
	public function upload_sistem_ren()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|callback_date_check_sistem_ren');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('confirm', 'Confirmation Box');
			$data['title'] = 'Import Data Sistem | Perencanaan';
			$this->template->load('template', 'beban_sistem/sistem/import_sistem_ren', $data);
		} else {
			$config['upload_path'] = './assets/admin/img/sistem_perencanaan/';
			$config['allowed_types'] = 'xlsx|xls';

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('file')) {
				$file = $this->upload->data();
				$reader = ReaderEntityFactory::createXLSXReader();
				$reader->setShouldFormatDates(true);
				$reader->open('assets/admin/img/sistem_perencanaan/' . $file['file_name']);
				foreach ($reader->getSheetIterator() as $sheet) {
					$numRow = 1;
					foreach ($sheet->getRowIterator() as $row) {
						if ($numRow > 1) {
							$sistem = array(
								'sistem' => $row->getCellAtIndex(1),
								'ren_0030' => $row->getCellAtIndex(2),
								'ren_0100' => $row->getCellAtIndex(3),
								'ren_0130' => $row->getCellAtIndex(4),
								'ren_0200' => $row->getCellAtIndex(5),
								'ren_0230' => $row->getCellAtIndex(6),
								'ren_0300' => $row->getCellAtIndex(7),
								'ren_0330' => $row->getCellAtIndex(8),
								'ren_0400' => $row->getCellAtIndex(9),
								'ren_0430' => $row->getCellAtIndex(10),
								'ren_0500' => $row->getCellAtIndex(11),
								'ren_0530' => $row->getCellAtIndex(12),
								'ren_0600' => $row->getCellAtIndex(13),
								'ren_0630' => $row->getCellAtIndex(14),
								'ren_0700' => $row->getCellAtIndex(15),
								'ren_0730' => $row->getCellAtIndex(16),
								'ren_0800' => $row->getCellAtIndex(17),
								'ren_0830' => $row->getCellAtIndex(18),
								'ren_0900' => $row->getCellAtIndex(19),
								'ren_0930' => $row->getCellAtIndex(20),
								'ren_1000' => $row->getCellAtIndex(21),
								'ren_1030' => $row->getCellAtIndex(22),
								'ren_1100' => $row->getCellAtIndex(23),
								'ren_1130' => $row->getCellAtIndex(24),
								'ren_1200' => $row->getCellAtIndex(25),
								'ren_1230' => $row->getCellAtIndex(26),
								'ren_1300' => $row->getCellAtIndex(27),
								'ren_1330' => $row->getCellAtIndex(28),
								'ren_1400' => $row->getCellAtIndex(29),
								'ren_1430' => $row->getCellAtIndex(30),
								'ren_1500' => $row->getCellAtIndex(31),
								'ren_1530' => $row->getCellAtIndex(32),
								'ren_1600' => $row->getCellAtIndex(33),
								'ren_1630' => $row->getCellAtIndex(34),
								'ren_1700' => $row->getCellAtIndex(35),
								'ren_1730' => $row->getCellAtIndex(36),
								'ren_1800' => $row->getCellAtIndex(37),
								'ren_1830' => $row->getCellAtIndex(38),
								'ren_1900' => $row->getCellAtIndex(39),
								'ren_1930' => $row->getCellAtIndex(40),
								'ren_2000' => $row->getCellAtIndex(41),
								'ren_2030' => $row->getCellAtIndex(42),
								'ren_2100' => $row->getCellAtIndex(43),
								'ren_2130' => $row->getCellAtIndex(44),
								'ren_2200' => $row->getCellAtIndex(45),
								'ren_2230' => $row->getCellAtIndex(46),
								'ren_2300' => $row->getCellAtIndex(47),
								'ren_2330' => $row->getCellAtIndex(48),
								'ren_2400' => $row->getCellAtIndex(49),
								'status' => $row->getCellAtIndex(50),
							);
							$this->bebansistem_m->import_sistem_ren($sistem);
						}
						$numRow++;
					}
					$reader->close();
					unlink('assets/admin/img/sistem_perencanaan/' . $file['file_name']);
				}

				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil ditambahkan');</script>";
				}
				echo "<script>window.location='" . site_url('beban_sistem/sistem_perencanaan') . "';</script>";
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				//redirect('beban_sistem/sistem_perencanaan');
			}
		}
	}

	//function replace data perencanaan sistem

	//date check saat import data perencanaan sistem
	function date_check_sistem_ren()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM sistem_perencanaan WHERE tanggal = '$post[tanggal]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('date_check_sistem_ren', 'Data pada {field} ini sudah ada.');
			//$this->session->set_flashdata('confirm', 'Confirmation Box');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//data check saat manual input data perencanaan sistem
	function data_check_sistem_ren()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM sistem_perencanaan WHERE tanggal = '$post[tanggal]' 
		AND sistem = '$post[sistem]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('data_check_sistem_ren', 'Data pada {field} ini sudah ada.');
			//$this->session->set_flashdata('confirm', 'Confirmation Box');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//delete data perencanaan sistem
	public function del_sistem_ren($id)
	{
		$this->bebansistem_m->del_sistem_ren($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>";
		}
		echo "<script>window.location='" . site_url('beban_sistem/sistem_perencanaan') . "';</script>";
	}

	//list table data realisasi sistem
	public function sistem_realisasi()
	{
		$this->load->library('pagination');
		$config['base_url'] = site_url('beban_sistem/sistem_realisasi');
		$config['total_rows'] = $this->bebansistem_m->get_sistem_eval_pagination()->num_rows();
		$config['per_page'] = 15;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open']	= '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		$data['row'] = $this->bebansistem_m->get_sistem_eval_pagination($config['per_page'], $this->uri->segment(3));
		$data['title'] = 'Sistem | Realisasi';
		$this->template->load('template', 'beban_sistem/sistem/realisasi', $data);
	}

	//manual input data realisasi sistem
	public function add_sistem_eval()
	{
		$sistemeval = new stdClass();
		$sistemeval->data_id = null;
		$sistemeval->tanggal = null;
		$sistemeval->sistem = null;
		$sistemeval->eval_0030 = null;
		$sistemeval->eval_0100 = null;
		$sistemeval->eval_0130 = null;
		$sistemeval->eval_0200 = null;
		$sistemeval->eval_0230 = null;
		$sistemeval->eval_0300 = null;
		$sistemeval->eval_0330 = null;
		$sistemeval->eval_0400 = null;
		$sistemeval->eval_0430 = null;
		$sistemeval->eval_0500 = null;
		$sistemeval->eval_0530 = null;
		$sistemeval->eval_0600 = null;
		$sistemeval->eval_0630 = null;
		$sistemeval->eval_0700 = null;
		$sistemeval->eval_0730 = null;
		$sistemeval->eval_0800 = null;
		$sistemeval->eval_0830 = null;
		$sistemeval->eval_0900 = null;
		$sistemeval->eval_0930 = null;
		$sistemeval->eval_1000 = null;
		$sistemeval->eval_1030 = null;
		$sistemeval->eval_1100 = null;
		$sistemeval->eval_1130 = null;
		$sistemeval->eval_1200 = null;
		$sistemeval->eval_1230 = null;
		$sistemeval->eval_1300 = null;
		$sistemeval->eval_1330 = null;
		$sistemeval->eval_1400 = null;
		$sistemeval->eval_1430 = null;
		$sistemeval->eval_1500 = null;
		$sistemeval->eval_1530 = null;
		$sistemeval->eval_1600 = null;
		$sistemeval->eval_1630 = null;
		$sistemeval->eval_1700 = null;
		$sistemeval->eval_1730 = null;
		$sistemeval->eval_1800 = null;
		$sistemeval->eval_1830 = null;
		$sistemeval->eval_1900 = null;
		$sistemeval->eval_1930 = null;
		$sistemeval->eval_2000 = null;
		$sistemeval->eval_2030 = null;
		$sistemeval->eval_2100 = null;
		$sistemeval->eval_2130 = null;
		$sistemeval->eval_2200 = null;
		$sistemeval->eval_2230 = null;
		$sistemeval->eval_2300 = null;
		$sistemeval->eval_2330 = null;
		$sistemeval->eval_2400 = null;
		$data = array(
			'page' => 'add_sistem_eval',
			'row' => $sistemeval
		);
		$data['title'] = 'Manual Input Data Sistem | Realisasi';
		$this->template->load('template', 'beban_sistem/sistem/form_realisasi', $data);
	}

	//edit data realisasi sistem
	public function edit_sistem_eval($id)
	{
		$query = $this->bebansistem_m->get_sistem_eval($id);
		if ($query->num_rows() > 0) {
			$sistem = $query->row();
			$data = array(
				'page' => 'edit_sistem_eval',
				'row' => $sistem
			);
			$data['title'] = 'Edit Data Sistem | Realisasi';
			$this->template->load('template', 'beban_sistem/sistem/form_realisasi', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('beban_sistem/sistem_realisasi') . "';</script>";
		}
	}

	//proses validasi manual input dan edit data realisasi sistem
	public function process_sistem_eval()
	{
		//$this->form_validation->set_rules('tanggal', 'Tanggal', 'is_unique[tegangan_perencanaan.tanggal]');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|callback_data_check_sistem_eval');
		$this->form_validation->set_message('is_unique', 'data pada %s ini sudah ada');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add_sistem_eval'])) {

			if ($this->form_validation->run() == FALSE) {
				$sistemeval = new stdClass();
				$sistemeval->data_id = null;
				$sistemeval->tanggal = null;
				$sistemeval->sistem = null;
				$sistemeval->status = null;
				$sistemeval->eval_0030 = null;
				$sistemeval->eval_0100 = null;
				$sistemeval->eval_0130 = null;
				$sistemeval->eval_0200 = null;
				$sistemeval->eval_0230 = null;
				$sistemeval->eval_0300 = null;
				$sistemeval->eval_0330 = null;
				$sistemeval->eval_0400 = null;
				$sistemeval->eval_0430 = null;
				$sistemeval->eval_0500 = null;
				$sistemeval->eval_0530 = null;
				$sistemeval->eval_0600 = null;
				$sistemeval->eval_0630 = null;
				$sistemeval->eval_0700 = null;
				$sistemeval->eval_0730 = null;
				$sistemeval->eval_0800 = null;
				$sistemeval->eval_0830 = null;
				$sistemeval->eval_0900 = null;
				$sistemeval->eval_0930 = null;
				$sistemeval->eval_1000 = null;
				$sistemeval->eval_1030 = null;
				$sistemeval->eval_1100 = null;
				$sistemeval->eval_1130 = null;
				$sistemeval->eval_1200 = null;
				$sistemeval->eval_1230 = null;
				$sistemeval->eval_1300 = null;
				$sistemeval->eval_1330 = null;
				$sistemeval->eval_1400 = null;
				$sistemeval->eval_1430 = null;
				$sistemeval->eval_1500 = null;
				$sistemeval->eval_1530 = null;
				$sistemeval->eval_1600 = null;
				$sistemeval->eval_1630 = null;
				$sistemeval->eval_1700 = null;
				$sistemeval->eval_1730 = null;
				$sistemeval->eval_1800 = null;
				$sistemeval->eval_1830 = null;
				$sistemeval->eval_1900 = null;
				$sistemeval->eval_1930 = null;
				$sistemeval->eval_2000 = null;
				$sistemeval->eval_2030 = null;
				$sistemeval->eval_2100 = null;
				$sistemeval->eval_2130 = null;
				$sistemeval->eval_2200 = null;
				$sistemeval->eval_2230 = null;
				$sistemeval->eval_2300 = null;
				$sistemeval->eval_2330 = null;
				$sistemeval->eval_2400 = null;
				$data = array(
					'page' => 'add_sistem_eval',
					'row' => $sistemeval
				);
				$data['title'] = 'Manual Input Data Sistem | Realisasi';
				$this->template->load('template', 'beban_sistem/sistem/form_realisasi', $data);
			} else {
				$this->bebansistem_m->add_sistem_eval($post);
				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil disimpan');</script>";
				}
				echo "<script>window.location='" . site_url('beban_sistem/sistem_realisasi') . "';</script>";
			}
		} elseif (isset($_POST['edit_sistem_eval'])) {
			$this->bebansistem_m->edit_sistem_eval($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='" . site_url('beban_sistem/sistem_realisasi') . "';</script>";
		}
	}

	//halaman import data realisasi sistem
	public function import_sistem_eval()
	{
		$data['title'] = 'Import Data Sistem | Realisasi';
		$this->template->load('template', 'beban_sistem/sistem/import_sistem_eval', $data);
	}

	//validasi import data realisasi sistem
	public function upload_sistem_eval()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|callback_date_check_sistem_eval');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('confirm', 'Confirmation Box');
			$data['title'] = 'Import Data Sistem | Realisasi';
			$this->template->load('template', 'beban_sistem/sistem/import_sistem_eval', $data);
		} else {
			$config['upload_path'] = './assets/admin/img/sistem_realisasi/';
			$config['allowed_types'] = 'xlsx|xls';

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('file')) {
				$file = $this->upload->data();
				$reader = ReaderEntityFactory::createXLSXReader();
				$reader->setShouldFormatDates(true);
				$reader->open('assets/admin/img/sistem_realisasi/' . $file['file_name']);
				foreach ($reader->getSheetIterator() as $sheet) {
					$numRow = 1;
					foreach ($sheet->getRowIterator() as $row) {
						if ($numRow > 1) {
							$sistem = array(
								'sistem' => $row->getCellAtIndex(1),
								'eval_0030' => $row->getCellAtIndex(2),
								'eval_0100' => $row->getCellAtIndex(3),
								'eval_0130' => $row->getCellAtIndex(4),
								'eval_0200' => $row->getCellAtIndex(5),
								'eval_0230' => $row->getCellAtIndex(6),
								'eval_0300' => $row->getCellAtIndex(7),
								'eval_0330' => $row->getCellAtIndex(8),
								'eval_0400' => $row->getCellAtIndex(9),
								'eval_0430' => $row->getCellAtIndex(10),
								'eval_0500' => $row->getCellAtIndex(11),
								'eval_0530' => $row->getCellAtIndex(12),
								'eval_0600' => $row->getCellAtIndex(13),
								'eval_0630' => $row->getCellAtIndex(14),
								'eval_0700' => $row->getCellAtIndex(15),
								'eval_0730' => $row->getCellAtIndex(16),
								'eval_0800' => $row->getCellAtIndex(17),
								'eval_0830' => $row->getCellAtIndex(18),
								'eval_0900' => $row->getCellAtIndex(19),
								'eval_0930' => $row->getCellAtIndex(20),
								'eval_1000' => $row->getCellAtIndex(21),
								'eval_1030' => $row->getCellAtIndex(22),
								'eval_1100' => $row->getCellAtIndex(23),
								'eval_1130' => $row->getCellAtIndex(24),
								'eval_1200' => $row->getCellAtIndex(25),
								'eval_1230' => $row->getCellAtIndex(26),
								'eval_1300' => $row->getCellAtIndex(27),
								'eval_1330' => $row->getCellAtIndex(28),
								'eval_1400' => $row->getCellAtIndex(29),
								'eval_1430' => $row->getCellAtIndex(30),
								'eval_1500' => $row->getCellAtIndex(31),
								'eval_1530' => $row->getCellAtIndex(32),
								'eval_1600' => $row->getCellAtIndex(33),
								'eval_1630' => $row->getCellAtIndex(34),
								'eval_1700' => $row->getCellAtIndex(35),
								'eval_1730' => $row->getCellAtIndex(36),
								'eval_1800' => $row->getCellAtIndex(37),
								'eval_1830' => $row->getCellAtIndex(38),
								'eval_1900' => $row->getCellAtIndex(39),
								'eval_1930' => $row->getCellAtIndex(40),
								'eval_2000' => $row->getCellAtIndex(41),
								'eval_2030' => $row->getCellAtIndex(42),
								'eval_2100' => $row->getCellAtIndex(43),
								'eval_2130' => $row->getCellAtIndex(44),
								'eval_2200' => $row->getCellAtIndex(45),
								'eval_2230' => $row->getCellAtIndex(46),
								'eval_2300' => $row->getCellAtIndex(47),
								'eval_2330' => $row->getCellAtIndex(48),
								'eval_2400' => $row->getCellAtIndex(49),
								'status' => $row->getCellAtIndex(50),
							);
							$this->bebansistem_m->import_sistem_eval($sistem);
						}
						$numRow++;
					}
					$reader->close();
					unlink('assets/admin/img/sistem_realisasi/' . $file['file_name']);
				}

				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil ditambahkan');</script>";
				}
				echo "<script>window.location='" . site_url('beban_sistem/sistem_realisasi') . "';</script>";
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				//redirect('beban_sistem/sistem_realisasi');
			}
		}
	}

	//function replace data realisasi sistem

	//date check saat import data realisasi sistem
	function date_check_sistem_eval()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM sistem_realisasi WHERE tanggal = '$post[tanggal]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('date_check_sistem_eval', 'Data pada {field} ini sudah ada.');
			//$this->session->set_flashdata('confirm', 'Confirmation Box');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//data check saat manual input data realisasi sistem
	function data_check_sistem_eval()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM sistem_realisasi WHERE tanggal = '$post[tanggal]' 
		AND sistem = '$post[sistem]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('data_check_sistem_eval', 'Data pada {field} ini sudah ada.');
			//$this->session->set_flashdata('confirm', 'Confirmation Box');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//delete data realisasi sistem
	public function del_sistem_eval($id)
	{
		$this->bebansistem_m->del_sistem_eval($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>";
		}
		echo "<script>window.location='" . site_url('beban_sistem/sistem_realisasi') . "';</script>";
	}

	//SUBSISTEM 

	//list table data perencanaan subsistem
	public function subsistem_perencanaan()
	{
		$this->load->library('pagination');
		$config['base_url'] = site_url('beban_sistem/subsistem_perencanaan');
		$config['total_rows'] = $this->bebansistem_m->get_subsistem_ren_pagination()->num_rows();
		$config['per_page'] = 15;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open']	= '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		$data['row'] = $this->bebansistem_m->get_subsistem_ren_pagination($config['per_page'], $this->uri->segment(3));
		$data['title'] = 'Subsistem | Perencanaan';
		$this->template->load('template', 'beban_sistem/subsistem/perencanaan', $data);
	}

	//manual input data perencanaan subsistem
	public function add_subsistem_ren()
	{
		$subsistemren = new stdClass();
		$subsistemren->data_id = null;
		$subsistemren->tanggal = null;
		$subsistemren->subsistem = null;
		$subsistemren->pasokan = null;
		$subsistemren->status = null;
		$subsistemren->ren_0030 = null;
		$subsistemren->ren_0100 = null;
		$subsistemren->ren_0130 = null;
		$subsistemren->ren_0200 = null;
		$subsistemren->ren_0230 = null;
		$subsistemren->ren_0300 = null;
		$subsistemren->ren_0330 = null;
		$subsistemren->ren_0400 = null;
		$subsistemren->ren_0430 = null;
		$subsistemren->ren_0500 = null;
		$subsistemren->ren_0530 = null;
		$subsistemren->ren_0600 = null;
		$subsistemren->ren_0630 = null;
		$subsistemren->ren_0700 = null;
		$subsistemren->ren_0730 = null;
		$subsistemren->ren_0800 = null;
		$subsistemren->ren_0830 = null;
		$subsistemren->ren_0900 = null;
		$subsistemren->ren_0930 = null;
		$subsistemren->ren_1000 = null;
		$subsistemren->ren_1030 = null;
		$subsistemren->ren_1100 = null;
		$subsistemren->ren_1130 = null;
		$subsistemren->ren_1200 = null;
		$subsistemren->ren_1230 = null;
		$subsistemren->ren_1300 = null;
		$subsistemren->ren_1330 = null;
		$subsistemren->ren_1400 = null;
		$subsistemren->ren_1430 = null;
		$subsistemren->ren_1500 = null;
		$subsistemren->ren_1530 = null;
		$subsistemren->ren_1600 = null;
		$subsistemren->ren_1630 = null;
		$subsistemren->ren_1700 = null;
		$subsistemren->ren_1730 = null;
		$subsistemren->ren_1800 = null;
		$subsistemren->ren_1830 = null;
		$subsistemren->ren_1900 = null;
		$subsistemren->ren_1930 = null;
		$subsistemren->ren_2000 = null;
		$subsistemren->ren_2030 = null;
		$subsistemren->ren_2100 = null;
		$subsistemren->ren_2130 = null;
		$subsistemren->ren_2200 = null;
		$subsistemren->ren_2230 = null;
		$subsistemren->ren_2300 = null;
		$subsistemren->ren_2330 = null;
		$subsistemren->ren_2400 = null;
		$data = array(
			'page' => 'add_subsistem_ren',
			'row' => $subsistemren
		);
		$data['title'] = 'Manual Input Data Subsistem | Perencanaan';
		$this->template->load('template', 'beban_sistem/subsistem/form_perencanaan', $data);
	}

	//edit data perencanaan subsistem
	public function edit_subsistem_ren($id)
	{
		$query = $this->bebansistem_m->get_subsistem_ren($id);
		if ($query->num_rows() > 0) {
			$subsistemren = $query->row();
			$data = array(
				'page' => 'edit_subsistem_ren',
				'row' => $subsistemren
			);
			$data['title'] = 'Edit Data Subsistem | Perencanaan';
			$this->template->load('template', 'beban_sistem/subsistem/form_perencanaan', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('beban_sistem/subsistem_perencanaan') . "';</script>";
		}
	}

	//proses validasi manual input dan edit data perencanaan subsistem
	public function process_subsistem_ren()
	{
		//$this->form_validation->set_rules('tanggal', 'Tanggal', 'is_unique[tegangan_perencanaan.tanggal]');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|callback_data_check_subsistem_ren');
		$this->form_validation->set_message('is_unique', 'data pada %s ini sudah ada');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add_subsistem_ren'])) {

			if ($this->form_validation->run() == FALSE) {
				$subsistemren = new stdClass();
				$subsistemren->data_id = null;
				$subsistemren->tanggal = null;
				$subsistemren->subsistem = null;
				$subsistemren->pasokan = null;
				$subsistemren->status = null;
				$subsistemren->ren_0030 = null;
				$subsistemren->ren_0100 = null;
				$subsistemren->ren_0130 = null;
				$subsistemren->ren_0200 = null;
				$subsistemren->ren_0230 = null;
				$subsistemren->ren_0300 = null;
				$subsistemren->ren_0330 = null;
				$subsistemren->ren_0400 = null;
				$subsistemren->ren_0430 = null;
				$subsistemren->ren_0500 = null;
				$subsistemren->ren_0530 = null;
				$subsistemren->ren_0600 = null;
				$subsistemren->ren_0630 = null;
				$subsistemren->ren_0700 = null;
				$subsistemren->ren_0730 = null;
				$subsistemren->ren_0800 = null;
				$subsistemren->ren_0830 = null;
				$subsistemren->ren_0900 = null;
				$subsistemren->ren_0930 = null;
				$subsistemren->ren_1000 = null;
				$subsistemren->ren_1030 = null;
				$subsistemren->ren_1100 = null;
				$subsistemren->ren_1130 = null;
				$subsistemren->ren_1200 = null;
				$subsistemren->ren_1230 = null;
				$subsistemren->ren_1300 = null;
				$subsistemren->ren_1330 = null;
				$subsistemren->ren_1400 = null;
				$subsistemren->ren_1430 = null;
				$subsistemren->ren_1500 = null;
				$subsistemren->ren_1530 = null;
				$subsistemren->ren_1600 = null;
				$subsistemren->ren_1630 = null;
				$subsistemren->ren_1700 = null;
				$subsistemren->ren_1730 = null;
				$subsistemren->ren_1800 = null;
				$subsistemren->ren_1830 = null;
				$subsistemren->ren_1900 = null;
				$subsistemren->ren_1930 = null;
				$subsistemren->ren_2000 = null;
				$subsistemren->ren_2030 = null;
				$subsistemren->ren_2100 = null;
				$subsistemren->ren_2130 = null;
				$subsistemren->ren_2200 = null;
				$subsistemren->ren_2230 = null;
				$subsistemren->ren_2300 = null;
				$subsistemren->ren_2330 = null;
				$subsistemren->ren_2400 = null;
				$data = array(
					'page' => 'add_subsistem_ren',
					'row' => $subsistemren
				);
				$data['title'] = 'Manual Input Data Subsistem | Perencanaan';
				$this->template->load('template', 'beban_sistem/subsistem/form_perencanaan', $data);
			} else {
				$this->bebansistem_m->add_subsistem_ren($post);
				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil disimpan');</script>";
				}
				echo "<script>window.location='" . site_url('beban_sistem/subsistem_perencanaan') . "';</script>";
			}
		} elseif (isset($_POST['edit_subsistem_ren'])) {
			$this->bebansistem_m->edit_subsistem_ren($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='" . site_url('beban_sistem/subsistem_perencanaan') . "';</script>";
		}
	}

	//halaman import data perencanaan subsistem
	public function import_subsistem_ren()
	{
		$data['title'] = 'Import Data Subsistem | Perencanaan';
		$this->template->load('template', 'beban_sistem/subsistem/import_subsistem_ren', $data);
	}

	//validasi import data perencanaan subsistem
	public function upload_subsistem_ren()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|callback_date_check_subsistem_ren');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('confirm', 'Confirmation Box');
			$data['title'] = 'Import Data Subsistem | Perencanaan';
			$this->template->load('template', 'beban_sistem/subsistem/import_subsistem_ren', $data);
		} else {
			$config['upload_path'] = './assets/admin/img/subsistem_perencanaan/';
			$config['allowed_types'] = 'xlsx|xls';

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('file')) {
				$file = $this->upload->data();
				$reader = ReaderEntityFactory::createXLSXReader();
				$reader->setShouldFormatDates(true);
				$reader->open('assets/admin/img/subsistem_perencanaan/' . $file['file_name']);
				foreach ($reader->getSheetIterator() as $sheet) {
					$numRow = 1;
					foreach ($sheet->getRowIterator() as $row) {
						if ($numRow > 1) {
							$subsistem = array(
								'subsistem' => $row->getCellAtIndex(1),
								'pasokan' => $row->getCellAtIndex(2),
								'ren_0030' => $row->getCellAtIndex(3),
								'ren_0100' => $row->getCellAtIndex(4),
								'ren_0130' => $row->getCellAtIndex(5),
								'ren_0200' => $row->getCellAtIndex(6),
								'ren_0230' => $row->getCellAtIndex(7),
								'ren_0300' => $row->getCellAtIndex(8),
								'ren_0330' => $row->getCellAtIndex(9),
								'ren_0400' => $row->getCellAtIndex(10),
								'ren_0430' => $row->getCellAtIndex(11),
								'ren_0500' => $row->getCellAtIndex(12),
								'ren_0530' => $row->getCellAtIndex(13),
								'ren_0600' => $row->getCellAtIndex(14),
								'ren_0630' => $row->getCellAtIndex(15),
								'ren_0700' => $row->getCellAtIndex(16),
								'ren_0730' => $row->getCellAtIndex(17),
								'ren_0800' => $row->getCellAtIndex(18),
								'ren_0830' => $row->getCellAtIndex(19),
								'ren_0900' => $row->getCellAtIndex(20),
								'ren_0930' => $row->getCellAtIndex(21),
								'ren_1000' => $row->getCellAtIndex(22),
								'ren_1030' => $row->getCellAtIndex(23),
								'ren_1100' => $row->getCellAtIndex(24),
								'ren_1130' => $row->getCellAtIndex(25),
								'ren_1200' => $row->getCellAtIndex(26),
								'ren_1230' => $row->getCellAtIndex(27),
								'ren_1300' => $row->getCellAtIndex(28),
								'ren_1330' => $row->getCellAtIndex(29),
								'ren_1400' => $row->getCellAtIndex(30),
								'ren_1430' => $row->getCellAtIndex(31),
								'ren_1500' => $row->getCellAtIndex(32),
								'ren_1530' => $row->getCellAtIndex(33),
								'ren_1600' => $row->getCellAtIndex(34),
								'ren_1630' => $row->getCellAtIndex(35),
								'ren_1700' => $row->getCellAtIndex(36),
								'ren_1730' => $row->getCellAtIndex(37),
								'ren_1800' => $row->getCellAtIndex(38),
								'ren_1830' => $row->getCellAtIndex(39),
								'ren_1900' => $row->getCellAtIndex(40),
								'ren_1930' => $row->getCellAtIndex(41),
								'ren_2000' => $row->getCellAtIndex(42),
								'ren_2030' => $row->getCellAtIndex(43),
								'ren_2100' => $row->getCellAtIndex(44),
								'ren_2130' => $row->getCellAtIndex(45),
								'ren_2200' => $row->getCellAtIndex(46),
								'ren_2230' => $row->getCellAtIndex(47),
								'ren_2300' => $row->getCellAtIndex(48),
								'ren_2330' => $row->getCellAtIndex(49),
								'ren_2400' => $row->getCellAtIndex(50),
								'status' => $row->getCellAtIndex(51),
							);
							$this->bebansistem_m->import_subsistem_ren($subsistem);
						}
						$numRow++;
					}
					$reader->close();
					unlink('assets/admin/img/subsistem_perencanaan/' . $file['file_name']);
				}

				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil ditambahkan');</script>";
				}
				echo "<script>window.location='" . site_url('beban_sistem/subsistem_perencanaan') . "';</script>";
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				//redirect('beban_sistem/sistem_perencanaan');
			}
		}
	}

	//function replace data perencanaan subsistem

	//date check saat import data perencanaan subsistem
	function date_check_subsistem_ren()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM subsistem_perencanaan WHERE tanggal = '$post[tanggal]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('date_check_subsistem_ren', 'Data pada {field} ini sudah ada.');
			//$this->session->set_flashdata('confirm', 'Confirmation Box');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//data check saat manual input data perencanaan subsistem
	function data_check_subsistem_ren()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM subsistem_perencanaan WHERE tanggal = '$post[tanggal]' 
		AND subsistem = '$post[subsistem]' AND pasokan = '$post[pasokan]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('data_check_subsistem_ren', 'Data pada {field} ini sudah ada.');
			//$this->session->set_flashdata('confirm', 'Confirmation Box');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//delete data perencanaan subsistem
	public function del_subsistem_ren($id)
	{
		$this->bebansistem_m->del_subsistem_ren($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>";
		}
		echo "<script>window.location='" . site_url('beban_sistem/subsistem_perencanaan') . "';</script>";
	}

	//list table data realisasi subsistem
	public function subsistem_realisasi()
	{
		$this->load->library('pagination');
		$config['base_url'] = site_url('beban_sistem/subsistem_realisasi');
		$config['total_rows'] = $this->bebansistem_m->get_subsistem_eval_pagination()->num_rows();
		$config['per_page'] = 15;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open']	= '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		$data['row'] = $this->bebansistem_m->get_subsistem_eval_pagination($config['per_page'], $this->uri->segment(3));
		$data['title'] = 'Subsistem | Realisasi';
		$this->template->load('template', 'beban_sistem/subsistem/realisasi', $data);
	}

	//manual input data realisasi subsistem
	public function add_subsistem_eval()
	{
		$subsistemeval = new stdClass();
		$subsistemeval->data_id = null;
		$subsistemeval->tanggal = null;
		$subsistemeval->subsistem = null;
		$subsistemeval->pasokan = null;
		$subsistemeval->status = null;
		$subsistemeval->eval_0030 = null;
		$subsistemeval->eval_0100 = null;
		$subsistemeval->eval_0130 = null;
		$subsistemeval->eval_0200 = null;
		$subsistemeval->eval_0230 = null;
		$subsistemeval->eval_0300 = null;
		$subsistemeval->eval_0330 = null;
		$subsistemeval->eval_0400 = null;
		$subsistemeval->eval_0430 = null;
		$subsistemeval->eval_0500 = null;
		$subsistemeval->eval_0530 = null;
		$subsistemeval->eval_0600 = null;
		$subsistemeval->eval_0630 = null;
		$subsistemeval->eval_0700 = null;
		$subsistemeval->eval_0730 = null;
		$subsistemeval->eval_0800 = null;
		$subsistemeval->eval_0830 = null;
		$subsistemeval->eval_0900 = null;
		$subsistemeval->eval_0930 = null;
		$subsistemeval->eval_1000 = null;
		$subsistemeval->eval_1030 = null;
		$subsistemeval->eval_1100 = null;
		$subsistemeval->eval_1130 = null;
		$subsistemeval->eval_1200 = null;
		$subsistemeval->eval_1230 = null;
		$subsistemeval->eval_1300 = null;
		$subsistemeval->eval_1330 = null;
		$subsistemeval->eval_1400 = null;
		$subsistemeval->eval_1430 = null;
		$subsistemeval->eval_1500 = null;
		$subsistemeval->eval_1530 = null;
		$subsistemeval->eval_1600 = null;
		$subsistemeval->eval_1630 = null;
		$subsistemeval->eval_1700 = null;
		$subsistemeval->eval_1730 = null;
		$subsistemeval->eval_1800 = null;
		$subsistemeval->eval_1830 = null;
		$subsistemeval->eval_1900 = null;
		$subsistemeval->eval_1930 = null;
		$subsistemeval->eval_2000 = null;
		$subsistemeval->eval_2030 = null;
		$subsistemeval->eval_2100 = null;
		$subsistemeval->eval_2130 = null;
		$subsistemeval->eval_2200 = null;
		$subsistemeval->eval_2230 = null;
		$subsistemeval->eval_2300 = null;
		$subsistemeval->eval_2330 = null;
		$subsistemeval->eval_2400 = null;
		$data = array(
			'page' => 'add_subsistem_eval',
			'row' => $subsistemeval
		);
		$data['title'] = 'Manual Input Data Subsistem | Realisasi';
		$this->template->load('template', 'beban_sistem/subsistem/form_realisasi', $data);
	}

	//edit data realisasi subsistem
	public function edit_subsistem_eval($id)
	{
		$query = $this->bebansistem_m->get_subsistem_eval($id);
		if ($query->num_rows() > 0) {
			$subsistemeval = $query->row();
			$data = array(
				'page' => 'edit_subsistem_eval',
				'row' => $subsistemeval
			);
			$data['title'] = 'Edit Data Subsistem | Realisasi';
			$this->template->load('template', 'beban_sistem/subsistem/form_realisasi', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('beban_sistem/subsistem_realisasi') . "';</script>";
		}
	}

	//proses validasi manual input dan edit data realisasi subsistem
	public function process_subsistem_eval()
	{
		//$this->form_validation->set_rules('tanggal', 'Tanggal', 'is_unique[tegangan_perencanaan.tanggal]');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|callback_data_check_subsistem_eval');
		$this->form_validation->set_message('is_unique', 'data pada %s ini sudah ada');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add_subsistem_eval'])) {

			if ($this->form_validation->run() == FALSE) {
				$subsistemeval = new stdClass();
				$subsistemeval->data_id = null;
				$subsistemeval->tanggal = null;
				$subsistemeval->subsistem = null;
				$subsistemeval->pasokan = null;
				$subsistemeval->eval_0030 = null;
				$subsistemeval->eval_0100 = null;
				$subsistemeval->eval_0130 = null;
				$subsistemeval->eval_0200 = null;
				$subsistemeval->eval_0230 = null;
				$subsistemeval->eval_0300 = null;
				$subsistemeval->eval_0330 = null;
				$subsistemeval->eval_0400 = null;
				$subsistemeval->eval_0430 = null;
				$subsistemeval->eval_0500 = null;
				$subsistemeval->eval_0530 = null;
				$subsistemeval->eval_0600 = null;
				$subsistemeval->eval_0630 = null;
				$subsistemeval->eval_0700 = null;
				$subsistemeval->eval_0730 = null;
				$subsistemeval->eval_0800 = null;
				$subsistemeval->eval_0830 = null;
				$subsistemeval->eval_0900 = null;
				$subsistemeval->eval_0930 = null;
				$subsistemeval->eval_1000 = null;
				$subsistemeval->eval_1030 = null;
				$subsistemeval->eval_1100 = null;
				$subsistemeval->eval_1130 = null;
				$subsistemeval->eval_1200 = null;
				$subsistemeval->eval_1230 = null;
				$subsistemeval->eval_1300 = null;
				$subsistemeval->eval_1330 = null;
				$subsistemeval->eval_1400 = null;
				$subsistemeval->eval_1430 = null;
				$subsistemeval->eval_1500 = null;
				$subsistemeval->eval_1530 = null;
				$subsistemeval->eval_1600 = null;
				$subsistemeval->eval_1630 = null;
				$subsistemeval->eval_1700 = null;
				$subsistemeval->eval_1730 = null;
				$subsistemeval->eval_1800 = null;
				$subsistemeval->eval_1830 = null;
				$subsistemeval->eval_1900 = null;
				$subsistemeval->eval_1930 = null;
				$subsistemeval->eval_2000 = null;
				$subsistemeval->eval_2030 = null;
				$subsistemeval->eval_2100 = null;
				$subsistemeval->eval_2130 = null;
				$subsistemeval->eval_2200 = null;
				$subsistemeval->eval_2230 = null;
				$subsistemeval->eval_2300 = null;
				$subsistemeval->eval_2330 = null;
				$subsistemeval->eval_2400 = null;
				$data = array(
					'page' => 'add_subsistem_eval',
					'row' => $subsistemeval
				);
				$data['title'] = 'Manual Input Data Subsistem | Realisasi';
				$this->template->load('template', 'beban_sistem/subsistem/form_realisasi', $data);
			} else {
				$this->bebansistem_m->add_subsistem_eval($post);
				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil disimpan');</script>";
				}
				echo "<script>window.location='" . site_url('beban_sistem/subsistem_realisasi') . "';</script>";
			}
		} elseif (isset($_POST['edit_subsistem_eval'])) {
			$this->bebansistem_m->edit_subsistem_eval($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='" . site_url('beban_sistem/subsistem_realisasi') . "';</script>";
		}
	}

	//halaman import data perencanaan subsistem
	public function import_subsistem_eval()
	{
		$data['title'] = 'Import Data Subsistem | Realisasi';
		$this->template->load('template', 'beban_sistem/subsistem/import_subsistem_eval', $data);
	}

	//validasi import data realisasi subsistem
	public function upload_subsistem_eval()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|callback_date_check_subsistem_eval');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('confirm', 'Confirmation Box');
			$data['title'] = 'Import Data Subsistem | Realisasi';
			$this->template->load('template', 'beban_sistem/subsistem/import_subsistem_eval', $data);
		} else {
			$config['upload_path'] = './assets/admin/img/subsistem_realisasi/';
			$config['allowed_types'] = 'xlsx|xls';

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('file')) {
				$file = $this->upload->data();
				$reader = ReaderEntityFactory::createXLSXReader();
				$reader->setShouldFormatDates(true);
				$reader->open('assets/admin/img/subsistem_realisasi/' . $file['file_name']);
				foreach ($reader->getSheetIterator() as $sheet) {
					$numRow = 1;
					foreach ($sheet->getRowIterator() as $row) {
						if ($numRow > 1) {
							$subsistem = array(
								'subsistem' => $row->getCellAtIndex(1),
								'pasokan' => $row->getCellAtIndex(2),
								'eval_0030' => $row->getCellAtIndex(3),
								'eval_0100' => $row->getCellAtIndex(4),
								'eval_0130' => $row->getCellAtIndex(5),
								'eval_0200' => $row->getCellAtIndex(6),
								'eval_0230' => $row->getCellAtIndex(7),
								'eval_0300' => $row->getCellAtIndex(8),
								'eval_0330' => $row->getCellAtIndex(9),
								'eval_0400' => $row->getCellAtIndex(10),
								'eval_0430' => $row->getCellAtIndex(11),
								'eval_0500' => $row->getCellAtIndex(12),
								'eval_0530' => $row->getCellAtIndex(13),
								'eval_0600' => $row->getCellAtIndex(14),
								'eval_0630' => $row->getCellAtIndex(15),
								'eval_0700' => $row->getCellAtIndex(16),
								'eval_0730' => $row->getCellAtIndex(17),
								'eval_0800' => $row->getCellAtIndex(18),
								'eval_0830' => $row->getCellAtIndex(19),
								'eval_0900' => $row->getCellAtIndex(20),
								'eval_0930' => $row->getCellAtIndex(21),
								'eval_1000' => $row->getCellAtIndex(22),
								'eval_1030' => $row->getCellAtIndex(23),
								'eval_1100' => $row->getCellAtIndex(24),
								'eval_1130' => $row->getCellAtIndex(25),
								'eval_1200' => $row->getCellAtIndex(26),
								'eval_1230' => $row->getCellAtIndex(27),
								'eval_1300' => $row->getCellAtIndex(28),
								'eval_1330' => $row->getCellAtIndex(29),
								'eval_1400' => $row->getCellAtIndex(30),
								'eval_1430' => $row->getCellAtIndex(31),
								'eval_1500' => $row->getCellAtIndex(32),
								'eval_1530' => $row->getCellAtIndex(33),
								'eval_1600' => $row->getCellAtIndex(34),
								'eval_1630' => $row->getCellAtIndex(35),
								'eval_1700' => $row->getCellAtIndex(36),
								'eval_1730' => $row->getCellAtIndex(37),
								'eval_1800' => $row->getCellAtIndex(38),
								'eval_1830' => $row->getCellAtIndex(39),
								'eval_1900' => $row->getCellAtIndex(40),
								'eval_1930' => $row->getCellAtIndex(41),
								'eval_2000' => $row->getCellAtIndex(42),
								'eval_2030' => $row->getCellAtIndex(43),
								'eval_2100' => $row->getCellAtIndex(44),
								'eval_2130' => $row->getCellAtIndex(45),
								'eval_2200' => $row->getCellAtIndex(46),
								'eval_2230' => $row->getCellAtIndex(47),
								'eval_2300' => $row->getCellAtIndex(48),
								'eval_2330' => $row->getCellAtIndex(49),
								'eval_2400' => $row->getCellAtIndex(50),
								'status' => $row->getCellAtIndex(51),
							);
							$this->bebansistem_m->import_subsistem_eval($subsistem);
						}
						$numRow++;
					}
					$reader->close();
					unlink('assets/admin/img/subsistem_realisasi/' . $file['file_name']);
				}

				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil ditambahkan');</script>";
				}
				echo "<script>window.location='" . site_url('beban_sistem/subsistem_realisasi') . "';</script>";
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				//redirect('beban_sistem/sistem_realisasi');
			}
		}
	}

	//function replace data realisasi subsistem

	//date check saat import data realisasi subsistem
	function date_check_subsistem_eval()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM subsistem_realisasi WHERE tanggal = '$post[tanggal]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('date_check_subsistem_eval', 'Data pada {field} ini sudah ada.');
			//$this->session->set_flashdata('confirm', 'Confirmation Box');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//data check saat manual input data realisasi subsistem
	function data_check_subsistem_eval()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM subsistem_realisasi WHERE tanggal = '$post[tanggal]' 
		AND subsistem = '$post[subsistem]' AND pasokan = '$post[pasokan]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('data_check_subsistem_eval', 'Data pada {field} ini sudah ada.');
			//$this->session->set_flashdata('confirm', 'Confirmation Box');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//delete data realisasi subsistem
	public function del_subsistem_eval($id)
	{
		$this->bebansistem_m->del_subsistem_eval($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>";
		}
		echo "<script>window.location='" . site_url('beban_sistem/subsistem_realisasi') . "';</script>";
	}

	//PEMBANGKIT

	//list table data perencanaan pembangkit
	public function pembangkit_perencanaan()
	{
		$this->load->library('pagination');
		$config['base_url'] = site_url('beban_sistem/pembangkit_perencanaan');
		$config['total_rows'] = $this->bebansistem_m->get_pembangkit_ren_pagination()->num_rows();
		$config['per_page'] = 15;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open']	= '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		$data['row'] = $this->bebansistem_m->get_pembangkit_ren_pagination($config['per_page'], $this->uri->segment(3));
		$data['title'] = 'Pembangkit | Perencanaan';
		$this->template->load('template', 'beban_sistem/pembangkit/perencanaan', $data);
	}

	//manual input data perencanaan pembangkit
	public function add_pembangkit_ren()
	{
		$pembangkitren = new stdClass();
		$pembangkitren->data_id = null;
		$pembangkitren->tanggal = null;
		$pembangkitren->pembangkit = null;
		$pembangkitren->satuan = null;
		$pembangkitren->status = null;
		$pembangkitren->ren_0030 = null;
		$pembangkitren->ren_0100 = null;
		$pembangkitren->ren_0130 = null;
		$pembangkitren->ren_0200 = null;
		$pembangkitren->ren_0230 = null;
		$pembangkitren->ren_0300 = null;
		$pembangkitren->ren_0330 = null;
		$pembangkitren->ren_0400 = null;
		$pembangkitren->ren_0430 = null;
		$pembangkitren->ren_0500 = null;
		$pembangkitren->ren_0530 = null;
		$pembangkitren->ren_0600 = null;
		$pembangkitren->ren_0630 = null;
		$pembangkitren->ren_0700 = null;
		$pembangkitren->ren_0730 = null;
		$pembangkitren->ren_0800 = null;
		$pembangkitren->ren_0830 = null;
		$pembangkitren->ren_0900 = null;
		$pembangkitren->ren_0930 = null;
		$pembangkitren->ren_1000 = null;
		$pembangkitren->ren_1030 = null;
		$pembangkitren->ren_1100 = null;
		$pembangkitren->ren_1130 = null;
		$pembangkitren->ren_1200 = null;
		$pembangkitren->ren_1230 = null;
		$pembangkitren->ren_1300 = null;
		$pembangkitren->ren_1330 = null;
		$pembangkitren->ren_1400 = null;
		$pembangkitren->ren_1430 = null;
		$pembangkitren->ren_1500 = null;
		$pembangkitren->ren_1530 = null;
		$pembangkitren->ren_1600 = null;
		$pembangkitren->ren_1630 = null;
		$pembangkitren->ren_1700 = null;
		$pembangkitren->ren_1730 = null;
		$pembangkitren->ren_1800 = null;
		$pembangkitren->ren_1830 = null;
		$pembangkitren->ren_1900 = null;
		$pembangkitren->ren_1930 = null;
		$pembangkitren->ren_2000 = null;
		$pembangkitren->ren_2030 = null;
		$pembangkitren->ren_2100 = null;
		$pembangkitren->ren_2130 = null;
		$pembangkitren->ren_2200 = null;
		$pembangkitren->ren_2230 = null;
		$pembangkitren->ren_2300 = null;
		$pembangkitren->ren_2330 = null;
		$pembangkitren->ren_2400 = null;
		$data = array(
			'page' => 'add_pembangkit_ren',
			'row' => $pembangkitren
		);
		$data['title'] = 'Manual Input Data Pembangkit | Perencanaan';
		$this->template->load('template', 'beban_sistem/pembangkit/form_perencanaan', $data);
	}

	//edit data perencanaan pembangkit
	public function edit_pembangkit_ren($id)
	{
		$query = $this->bebansistem_m->get_pembangkit_ren($id);
		if ($query->num_rows() > 0) {
			$pembangkitren = $query->row();
			$data = array(
				'page' => 'edit_pembangkit_ren',
				'row' => $pembangkitren
			);
			$data['title'] = 'Edit Data Pembangkit | Perencanaan';
			$this->template->load('template', 'beban_sistem/pembangkit/form_perencanaan', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('beban_sistem/pembangkit_perencanaan') . "';</script>";
		}
	}

	//proses validasi manual input dan edit data perencanaan pembangkit
	public function process_pembangkit_ren()
	{
		//$this->form_validation->set_rules('tanggal', 'Tanggal', 'is_unique[tegangan_perencanaan.tanggal]');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|callback_data_check_pembangkit_ren');
		$this->form_validation->set_message('is_unique', 'data pada %s ini sudah ada');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add_pembangkit_ren'])) {

			if ($this->form_validation->run() == FALSE) {
				$pembangkitren = new stdClass();
				$pembangkitren->data_id = null;
				$pembangkitren->tanggal = null;
				$pembangkitren->pembangkit = null;
				$pembangkitren->satuan = null;
				$pembangkitren->status = null;
				$pembangkitren->ren_0030 = null;
				$pembangkitren->ren_0100 = null;
				$pembangkitren->ren_0130 = null;
				$pembangkitren->ren_0200 = null;
				$pembangkitren->ren_0230 = null;
				$pembangkitren->ren_0300 = null;
				$pembangkitren->ren_0330 = null;
				$pembangkitren->ren_0400 = null;
				$pembangkitren->ren_0430 = null;
				$pembangkitren->ren_0500 = null;
				$pembangkitren->ren_0530 = null;
				$pembangkitren->ren_0600 = null;
				$pembangkitren->ren_0630 = null;
				$pembangkitren->ren_0700 = null;
				$pembangkitren->ren_0730 = null;
				$pembangkitren->ren_0800 = null;
				$pembangkitren->ren_0830 = null;
				$pembangkitren->ren_0900 = null;
				$pembangkitren->ren_0930 = null;
				$pembangkitren->ren_1000 = null;
				$pembangkitren->ren_1030 = null;
				$pembangkitren->ren_1100 = null;
				$pembangkitren->ren_1130 = null;
				$pembangkitren->ren_1200 = null;
				$pembangkitren->ren_1230 = null;
				$pembangkitren->ren_1300 = null;
				$pembangkitren->ren_1330 = null;
				$pembangkitren->ren_1400 = null;
				$pembangkitren->ren_1430 = null;
				$pembangkitren->ren_1500 = null;
				$pembangkitren->ren_1530 = null;
				$pembangkitren->ren_1600 = null;
				$pembangkitren->ren_1630 = null;
				$pembangkitren->ren_1700 = null;
				$pembangkitren->ren_1730 = null;
				$pembangkitren->ren_1800 = null;
				$pembangkitren->ren_1830 = null;
				$pembangkitren->ren_1900 = null;
				$pembangkitren->ren_1930 = null;
				$pembangkitren->ren_2000 = null;
				$pembangkitren->ren_2030 = null;
				$pembangkitren->ren_2100 = null;
				$pembangkitren->ren_2130 = null;
				$pembangkitren->ren_2200 = null;
				$pembangkitren->ren_2230 = null;
				$pembangkitren->ren_2300 = null;
				$pembangkitren->ren_2330 = null;
				$pembangkitren->ren_2400 = null;
				$data = array(
					'page' => 'add_pembangkit_ren',
					'row' => $pembangkitren
				);
				$data['title'] = 'Manual Input Data Pembangkit | Perencanaan';
				$this->template->load('template', 'beban_sistem/pembangkit/form_perencanaan', $data);
			} else {
				$this->bebansistem_m->add_pembangkit_ren($post);
				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil disimpan');</script>";
				}
				echo "<script>window.location='" . site_url('beban_sistem/pembangkit_perencanaan') . "';</script>";
			}
		} elseif (isset($_POST['edit_pembangkit_ren'])) {
			$this->bebansistem_m->edit_pembangkit_ren($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='" . site_url('beban_sistem/pembangkit_perencanaan') . "';</script>";
		}
	}

	//halaman import data perencanaan pembangkit
	public function import_pembangkit_ren()
	{
		$data['title'] = 'Import Data Pembangkit | Perencanaan';
		$this->template->load('template', 'beban_sistem/pembangkit/import_pembangkit_ren', $data);
	}

	//validasi import data perencanaan pembangkit
	public function upload_pembangkit_ren()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|callback_date_check_pembangkit_ren');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('confirm', 'Confirmation Box');
			$data['title'] = 'Import Data Pembangkit | Perencanaan';
			$this->template->load('template', 'beban_sistem/pembangkit/import_pembangkit_ren', $data);
		} else {
			$config['upload_path'] = './assets/admin/img/pembangkit_perencanaan/';
			$config['allowed_types'] = 'xlsx|xls';

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('file')) {
				$file = $this->upload->data();
				$reader = ReaderEntityFactory::createXLSXReader();
				$reader->setShouldFormatDates(true);
				$reader->open('assets/admin/img/pembangkit_perencanaan/' . $file['file_name']);
				foreach ($reader->getSheetIterator() as $sheet) {
					$numRow = 1;
					foreach ($sheet->getRowIterator() as $row) {
						if ($numRow > 1) {
							$pembangkit = array(
								'pembangkit' => $row->getCellAtIndex(1),
								'satuan' => $row->getCellAtIndex(2),
								'ren_0030' => $row->getCellAtIndex(3),
								'ren_0100' => $row->getCellAtIndex(4),
								'ren_0130' => $row->getCellAtIndex(5),
								'ren_0200' => $row->getCellAtIndex(6),
								'ren_0230' => $row->getCellAtIndex(7),
								'ren_0300' => $row->getCellAtIndex(8),
								'ren_0330' => $row->getCellAtIndex(9),
								'ren_0400' => $row->getCellAtIndex(10),
								'ren_0430' => $row->getCellAtIndex(11),
								'ren_0500' => $row->getCellAtIndex(12),
								'ren_0530' => $row->getCellAtIndex(13),
								'ren_0600' => $row->getCellAtIndex(14),
								'ren_0630' => $row->getCellAtIndex(15),
								'ren_0700' => $row->getCellAtIndex(16),
								'ren_0730' => $row->getCellAtIndex(17),
								'ren_0800' => $row->getCellAtIndex(18),
								'ren_0830' => $row->getCellAtIndex(19),
								'ren_0900' => $row->getCellAtIndex(20),
								'ren_0930' => $row->getCellAtIndex(21),
								'ren_1000' => $row->getCellAtIndex(22),
								'ren_1030' => $row->getCellAtIndex(23),
								'ren_1100' => $row->getCellAtIndex(24),
								'ren_1130' => $row->getCellAtIndex(25),
								'ren_1200' => $row->getCellAtIndex(26),
								'ren_1230' => $row->getCellAtIndex(27),
								'ren_1300' => $row->getCellAtIndex(28),
								'ren_1330' => $row->getCellAtIndex(29),
								'ren_1400' => $row->getCellAtIndex(30),
								'ren_1430' => $row->getCellAtIndex(31),
								'ren_1500' => $row->getCellAtIndex(32),
								'ren_1530' => $row->getCellAtIndex(33),
								'ren_1600' => $row->getCellAtIndex(34),
								'ren_1630' => $row->getCellAtIndex(35),
								'ren_1700' => $row->getCellAtIndex(36),
								'ren_1730' => $row->getCellAtIndex(37),
								'ren_1800' => $row->getCellAtIndex(38),
								'ren_1830' => $row->getCellAtIndex(39),
								'ren_1900' => $row->getCellAtIndex(40),
								'ren_1930' => $row->getCellAtIndex(41),
								'ren_2000' => $row->getCellAtIndex(42),
								'ren_2030' => $row->getCellAtIndex(43),
								'ren_2100' => $row->getCellAtIndex(44),
								'ren_2130' => $row->getCellAtIndex(45),
								'ren_2200' => $row->getCellAtIndex(46),
								'ren_2230' => $row->getCellAtIndex(47),
								'ren_2300' => $row->getCellAtIndex(48),
								'ren_2330' => $row->getCellAtIndex(49),
								'ren_2400' => $row->getCellAtIndex(50),
								'status' => $row->getCellAtIndex(51),
							);
							$this->bebansistem_m->import_pembangkit_ren($pembangkit);
						}
						$numRow++;
					}
					$reader->close();
					unlink('assets/admin/img/pembangkit_perencanaan/' . $file['file_name']);
				}

				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil ditambahkan');</script>";
				}
				echo "<script>window.location='" . site_url('beban_sistem/pembangkit_perencanaan') . "';</script>";
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				redirect('beban_sistem/pembangkit_perencanaan');
			}
		}
	}

	//function replace data perencanaan pembangkit

	//date check saat import data perencanaan pembangkit
	function date_check_pembangkit_ren()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM pembangkit_perencanaan WHERE tanggal = '$post[tanggal]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('date_check_pembangkit_ren', 'Data pada {field} ini sudah ada.');
			//$this->session->set_flashdata('confirm', 'Confirmation Box');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//data check saat manual input data perencanaan pembangkit
	function data_check_pembangkit_ren()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM pembangkit_perencanaan WHERE tanggal = '$post[tanggal]' 
		AND pembangkit = '$post[pembangkit]' AND satuan = '$post[satuan]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('data_check_pembangkit_ren', 'Data pada {field} ini sudah ada.');
			//$this->session->set_flashdata('confirm', 'Confirmation Box');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//delete data perencanaan pembangkit
	public function del_pembangkit_ren($id)
	{
		$this->bebansistem_m->del_pembangkit_ren($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>";
		}
		echo "<script>window.location='" . site_url('beban_sistem/pembangkit_perencanaan') . "';</script>";
	}

	//list table data realisasi pembangkit
	public function pembangkit_realisasi()
	{
		$this->load->library('pagination');
		$config['base_url'] = site_url('beban_sistem/pembangkit_realisasi');
		$config['total_rows'] = $this->bebansistem_m->get_pembangkit_eval_pagination()->num_rows();
		$config['per_page'] = 15;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open']	= '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		$data['row'] = $this->bebansistem_m->get_pembangkit_eval_pagination($config['per_page'], $this->uri->segment(3));
		$data['title'] = 'Pembangkit | Realisasi';
		$this->template->load('template', 'beban_sistem/pembangkit/realisasi', $data);
	}

	//manual input data realisasi pembangkit
	public function add_pembangkit_eval()
	{
		$pembangkiteval = new stdClass();
		$pembangkiteval->data_id = null;
		$pembangkiteval->tanggal = null;
		$pembangkiteval->pembangkit = null;
		$pembangkiteval->satuan = null;
		$pembangkiteval->status = null;
		$pembangkiteval->eval_0030 = null;
		$pembangkiteval->eval_0100 = null;
		$pembangkiteval->eval_0130 = null;
		$pembangkiteval->eval_0200 = null;
		$pembangkiteval->eval_0230 = null;
		$pembangkiteval->eval_0300 = null;
		$pembangkiteval->eval_0330 = null;
		$pembangkiteval->eval_0400 = null;
		$pembangkiteval->eval_0430 = null;
		$pembangkiteval->eval_0500 = null;
		$pembangkiteval->eval_0530 = null;
		$pembangkiteval->eval_0600 = null;
		$pembangkiteval->eval_0630 = null;
		$pembangkiteval->eval_0700 = null;
		$pembangkiteval->eval_0730 = null;
		$pembangkiteval->eval_0800 = null;
		$pembangkiteval->eval_0830 = null;
		$pembangkiteval->eval_0900 = null;
		$pembangkiteval->eval_0930 = null;
		$pembangkiteval->eval_1000 = null;
		$pembangkiteval->eval_1030 = null;
		$pembangkiteval->eval_1100 = null;
		$pembangkiteval->eval_1130 = null;
		$pembangkiteval->eval_1200 = null;
		$pembangkiteval->eval_1230 = null;
		$pembangkiteval->eval_1300 = null;
		$pembangkiteval->eval_1330 = null;
		$pembangkiteval->eval_1400 = null;
		$pembangkiteval->eval_1430 = null;
		$pembangkiteval->eval_1500 = null;
		$pembangkiteval->eval_1530 = null;
		$pembangkiteval->eval_1600 = null;
		$pembangkiteval->eval_1630 = null;
		$pembangkiteval->eval_1700 = null;
		$pembangkiteval->eval_1730 = null;
		$pembangkiteval->eval_1800 = null;
		$pembangkiteval->eval_1830 = null;
		$pembangkiteval->eval_1900 = null;
		$pembangkiteval->eval_1930 = null;
		$pembangkiteval->eval_2000 = null;
		$pembangkiteval->eval_2030 = null;
		$pembangkiteval->eval_2100 = null;
		$pembangkiteval->eval_2130 = null;
		$pembangkiteval->eval_2200 = null;
		$pembangkiteval->eval_2230 = null;
		$pembangkiteval->eval_2300 = null;
		$pembangkiteval->eval_2330 = null;
		$pembangkiteval->eval_2400 = null;
		$data = array(
			'page' => 'add_pembangkit_eval',
			'row' => $pembangkiteval
		);
		$data['title'] = 'Manual Input Data Pembangkit | Realisasi';
		$this->template->load('template', 'beban_sistem/pembangkit/form_realisasi', $data);
	}

	//edit data realisasi pembangkit
	public function edit_pembangkit_eval($id)
	{
		$query = $this->bebansistem_m->get_pembangkit_eval($id);
		if ($query->num_rows() > 0) {
			$pembangkit = $query->row();
			$data = array(
				'page' => 'edit_pembangkit_eval',
				'row' => $pembangkit
			);
			$data['title'] = 'Edit Data Pembangkit | Realisasi';
			$this->template->load('template', 'beban_sistem/pembangkit/form_realisasi', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('beban_sistem/pembangkit_realisasi') . "';</script>";
		}
	}

	//proses validasi manual input dan edit data realisasi pembangkit
	public function process_pembangkit_eval()
	{
		//$this->form_validation->set_rules('tanggal', 'Tanggal', 'is_unique[tegangan_perencanaan.tanggal]');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|callback_data_check_pembangkit_eval');
		$this->form_validation->set_message('is_unique', 'data pada %s ini sudah ada');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add_pembangkit_eval'])) {

			if ($this->form_validation->run() == FALSE) {
				$pembangkiteval = new stdClass();
				$pembangkiteval->data_id = null;
				$pembangkiteval->tanggal = null;
				$pembangkiteval->pembangkit = null;
				$pembangkiteval->satuan = null;
				$pembangkiteval->status = null;
				$pembangkiteval->eval_0030 = null;
				$pembangkiteval->eval_0100 = null;
				$pembangkiteval->eval_0130 = null;
				$pembangkiteval->eval_0200 = null;
				$pembangkiteval->eval_0230 = null;
				$pembangkiteval->eval_0300 = null;
				$pembangkiteval->eval_0330 = null;
				$pembangkiteval->eval_0400 = null;
				$pembangkiteval->eval_0430 = null;
				$pembangkiteval->eval_0500 = null;
				$pembangkiteval->eval_0530 = null;
				$pembangkiteval->eval_0600 = null;
				$pembangkiteval->eval_0630 = null;
				$pembangkiteval->eval_0700 = null;
				$pembangkiteval->eval_0730 = null;
				$pembangkiteval->eval_0800 = null;
				$pembangkiteval->eval_0830 = null;
				$pembangkiteval->eval_0900 = null;
				$pembangkiteval->eval_0930 = null;
				$pembangkiteval->eval_1000 = null;
				$pembangkiteval->eval_1030 = null;
				$pembangkiteval->eval_1100 = null;
				$pembangkiteval->eval_1130 = null;
				$pembangkiteval->eval_1200 = null;
				$pembangkiteval->eval_1230 = null;
				$pembangkiteval->eval_1300 = null;
				$pembangkiteval->eval_1330 = null;
				$pembangkiteval->eval_1400 = null;
				$pembangkiteval->eval_1430 = null;
				$pembangkiteval->eval_1500 = null;
				$pembangkiteval->eval_1530 = null;
				$pembangkiteval->eval_1600 = null;
				$pembangkiteval->eval_1630 = null;
				$pembangkiteval->eval_1700 = null;
				$pembangkiteval->eval_1730 = null;
				$pembangkiteval->eval_1800 = null;
				$pembangkiteval->eval_1830 = null;
				$pembangkiteval->eval_1900 = null;
				$pembangkiteval->eval_1930 = null;
				$pembangkiteval->eval_2000 = null;
				$pembangkiteval->eval_2030 = null;
				$pembangkiteval->eval_2100 = null;
				$pembangkiteval->eval_2130 = null;
				$pembangkiteval->eval_2200 = null;
				$pembangkiteval->eval_2230 = null;
				$pembangkiteval->eval_2300 = null;
				$pembangkiteval->eval_2330 = null;
				$pembangkiteval->eval_2400 = null;
				$data = array(
					'page' => 'add_pembangkit_eval',
					'row' => $pembangkiteval
				);
				$data['title'] = 'Manual Input Data Pembangkit | Realisasi';
				$this->template->load('template', 'beban_sistem/pembangkit/form_realisasi', $data);
			} else {
				$this->bebansistem_m->add_pembangkit_eval($post);
				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil disimpan');</script>";
				}
				echo "<script>window.location='" . site_url('beban_sistem/pembangkit_realisasi') . "';</script>";
			}
		} elseif (isset($_POST['edit_pembangkit_eval'])) {
			$this->bebansistem_m->edit_pembangkit_eval($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			echo "<script>window.location='" . site_url('beban_sistem/pembangkit_realisasi') . "';</script>";
		}
	}

	//halaman import data realisasi pembangkit
	public function import_pembangkit_eval()
	{
		$data['title'] = 'Import Data Pembangkit | Realisasi';
		$this->template->load('template', 'beban_sistem/pembangkit/import_pembangkit_eval', $data);
	}

	//validasi import data realisasi pembangkit
	public function upload_pembangkit_eval()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|callback_date_check_pembangkit_eval');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('confirm', 'Confirmation Box');
			$data['title'] = 'Import Data Pembangkit | Realisasi';
			$this->template->load('template', 'beban_sistem/pembangkit/import_pembangkit_eval', $data);
		} else {
			$config['upload_path'] = './assets/admin/img/pembangkit_realisasi/';
			$config['allowed_types'] = 'xlsx|xls';

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('file')) {
				$file = $this->upload->data();
				$reader = ReaderEntityFactory::createXLSXReader();
				$reader->setShouldFormatDates(true);
				$reader->open('assets/admin/img/pembangkit_realisasi/' . $file['file_name']);
				foreach ($reader->getSheetIterator() as $sheet) {
					$numRow = 1;
					foreach ($sheet->getRowIterator() as $row) {
						if ($numRow > 1) {
							$trafo = array(
								'pembangkit' => $row->getCellAtIndex(1),
								'satuan' => $row->getCellAtIndex(2),
								'eval_0030' => $row->getCellAtIndex(3),
								'eval_0100' => $row->getCellAtIndex(4),
								'eval_0130' => $row->getCellAtIndex(5),
								'eval_0200' => $row->getCellAtIndex(6),
								'eval_0230' => $row->getCellAtIndex(7),
								'eval_0300' => $row->getCellAtIndex(8),
								'eval_0330' => $row->getCellAtIndex(9),
								'eval_0400' => $row->getCellAtIndex(10),
								'eval_0430' => $row->getCellAtIndex(11),
								'eval_0500' => $row->getCellAtIndex(12),
								'eval_0530' => $row->getCellAtIndex(13),
								'eval_0600' => $row->getCellAtIndex(14),
								'eval_0630' => $row->getCellAtIndex(15),
								'eval_0700' => $row->getCellAtIndex(16),
								'eval_0730' => $row->getCellAtIndex(17),
								'eval_0800' => $row->getCellAtIndex(18),
								'eval_0830' => $row->getCellAtIndex(19),
								'eval_0900' => $row->getCellAtIndex(20),
								'eval_0930' => $row->getCellAtIndex(21),
								'eval_1000' => $row->getCellAtIndex(22),
								'eval_1030' => $row->getCellAtIndex(23),
								'eval_1100' => $row->getCellAtIndex(24),
								'eval_1130' => $row->getCellAtIndex(25),
								'eval_1200' => $row->getCellAtIndex(26),
								'eval_1230' => $row->getCellAtIndex(27),
								'eval_1300' => $row->getCellAtIndex(28),
								'eval_1330' => $row->getCellAtIndex(29),
								'eval_1400' => $row->getCellAtIndex(30),
								'eval_1430' => $row->getCellAtIndex(31),
								'eval_1500' => $row->getCellAtIndex(32),
								'eval_1530' => $row->getCellAtIndex(33),
								'eval_1600' => $row->getCellAtIndex(34),
								'eval_1630' => $row->getCellAtIndex(35),
								'eval_1700' => $row->getCellAtIndex(36),
								'eval_1730' => $row->getCellAtIndex(37),
								'eval_1800' => $row->getCellAtIndex(38),
								'eval_1830' => $row->getCellAtIndex(39),
								'eval_1900' => $row->getCellAtIndex(40),
								'eval_1930' => $row->getCellAtIndex(41),
								'eval_2000' => $row->getCellAtIndex(42),
								'eval_2030' => $row->getCellAtIndex(43),
								'eval_2100' => $row->getCellAtIndex(44),
								'eval_2130' => $row->getCellAtIndex(45),
								'eval_2200' => $row->getCellAtIndex(46),
								'eval_2230' => $row->getCellAtIndex(47),
								'eval_2300' => $row->getCellAtIndex(48),
								'eval_2330' => $row->getCellAtIndex(49),
								'eval_2400' => $row->getCellAtIndex(50),
								'status' => $row->getCellAtIndex(51),
							);
							$this->bebansistem_m->import_pembangkit_eval($trafo);
						}
						$numRow++;
					}
					$reader->close();
					unlink('assets/admin/img/pembangkit_realisasi/' . $file['file_name']);
				}

				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('Data berhasil ditambahkan');</script>";
				}
				echo "<script>window.location='" . site_url('beban_sistem/pembangkit_realisasi') . "';</script>";
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				//redirect('beban_sistem/sistem_realisasi');
			}
		}
	}

	//function replace data realisasi pembangkit

	//date check saat import data realisasi pembangkit
	function date_check_pembangkit_eval()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM pembangkit_realisasi WHERE tanggal = '$post[tanggal]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('date_check_pembangkit_eval', 'Data pada {field} ini sudah ada.');
			//$this->session->set_flashdata('confirm', 'Confirmation Box');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//data check saat manual input data realisasi pembangkit
	function data_check_pembangkit_eval()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM pembangkit_realisasi WHERE tanggal = '$post[tanggal]' 
		AND pembangkit = '$post[pembangkit]' AND satuan = '$post[satuan]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('data_check_pembangkit_eval', 'Data pada {field} ini sudah ada.');
			//$this->session->set_flashdata('confirm', 'Confirmation Box');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//delete data realisasi pembangkit
	public function del_pembangkit_eval($id)
	{
		/**
		 * Perlu ambil data dulu sebelum dihapus agar bisa memperbarui tabel
		 */
		$query = $this->db->query("SELECT * FROM pembangkit_realisasi WHERE data_id = $id");
		$result = $query->result();
		$result = $result ? $result[0] : null;

		$this->bebansistem_m->del_pembangkit_eval($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>";

			$this->_generate_data_tabel_evaluasi((object) array("tanggal" => $result->tanggal, "ruas" => $result->ruas));
		}
		echo "<script>window.location='" . site_url('beban_sistem/pembangkit_realisasi') . "';</script>";
	}

	private function _generate_data_tabel_evaluasi($request)
	{
		$this->load->model("generator_penghantar_table_m", "generator_table");

		$this->generator_table->generate_or_update((object) array(
			"ruas" => $request->ruas,
			"tanggal" => $request->tanggal
		));
	}
}
