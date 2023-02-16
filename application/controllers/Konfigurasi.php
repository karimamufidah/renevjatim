<?php

class Konfigurasi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['diagram_m', 'kerawanan_m']);
	}

	//Diargam
	public function diagram()
	{
		$data['row'] = $this->diagram_m->get();
		$data['title'] = 'Konfigurasi Diagram';
		$this->template->load('template', 'konfigurasi/diagram', $data);
	}

	public function uploadDiagram()
	{

		$post = $this->input->post(null, TRUE);

		// cek jika ada file yang akan di upload
		$config['upload_path'] 		= './assets/admin/img/diagram/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg|pdf|xlsx|ppt|rar|zip|docx';
		$this->load->library('upload', $config);

		if ($_FILES['file']['size'] != null) {
			if ($this->upload->do_upload('file')) {

				$post['file'] = $this->upload->data('file_name');
				$this->diagram_m->upload($post);
				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('File berhasil diupload');</script>";
				}
				echo "<script>window.location='" . site_url('konfigurasi/diagram') . "';</script>";
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				redirect('konfigurasi/diagram');
			}
		} else {
			return false;
		}
	}

	public function deleteDiagram($id)
	{
		$item = $this->diagram_m->get($id)->row();
		if ($item->file_name != null) {
			$target_file = './assets/admin/img/diagram/' . $item->file_name;
			unlink($target_file);
		}

		$this->diagram_m->delete($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('File berhasil dihapus');</script>";
		}
		echo "<script>window.location='" . site_url('konfigurasi/diagram') . "';</script>";
	}

	public function downloadDiagram($id)
	{
		$data = $this->db->get_where('konfigurasi_diagram', ['file_id' => $id])->row();
		force_download('./assets/admin/img/diagram/' . $data->file_name, NULL);
	}

	//Kerawanan
	public function kerawanan()
	{
		$data['row'] = $this->kerawanan_m->get();
		$data['title'] = 'Konfigurasi Kerawanan';
		$this->template->load('template', 'konfigurasi/kerawanan', $data);
	}

	public function uploadKerawanan()
	{

		$post = $this->input->post(null, TRUE);

		// cek jika ada file yang akan di upload
		$config['upload_path'] 		= './assets/admin/img/kerawanan/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg|pdf|xlsx|ppt|rar|zip|docx';
		$this->load->library('upload', $config);

		if ($_FILES['file']['size'] != null) {
			if ($this->upload->do_upload('file')) {

				$post['file'] = $this->upload->data('file_name');
				$this->kerawanan_m->upload($post);
				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('File berhasil diupload');</script>";
				}
				echo "<script>window.location='" . site_url('konfigurasi/kerawanan') . "';</script>";
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				redirect('konfigurasi/kerawanan');
			}
		} else {
			return false;
		}
	}

	public function deleteKerawanan($id)
	{
		$item = $this->kerawanan_m->get($id)->row();
		if ($item->file_name != null) {
			$target_file = './assets/admin/img/kerawanan/' . $item->file_name;
			unlink($target_file);
		}

		$this->kerawanan_m->delete($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('File berhasil dihapus');</script>";
		}
		echo "<script>window.location='" . site_url('konfigurasi/kerawanan') . "';</script>";
	}

	public function downloadKerawanan($id)
	{
		$data = $this->db->get_where('konfigurasi_kerawanan', ['file_id' => $id])->row();
		force_download('./assets/admin/img/kerawanan/' . $data->file_name, NULL);
	}
}
