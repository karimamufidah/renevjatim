<?php

class Dashboard extends CI_Controller
{

	public function index()
	{
		check_not_login();
		$this->load->model("index_beban_penghantar_m", "beban_penghantar");
		$this->load->model("index_satuan_m", "satuan");

		$data = array(
			"beban_penghantar" => $this->beban_penghantar->index(),
			"satuan" => $this->satuan->index(),
			"title" => 'Dashboard'
		);
		$this->template->load('template', 'dashboard', $data);
	}
}
