<?php

class Audit_trail extends CI_Controller {

	public function index()
	{
		$this->template->load('template', 'audit_trail');
	}
}
