<?php

class Master_data extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
	}

	public function index()
	{
		$this->template->load('template', 'master_data');
	}
}
