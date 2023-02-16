<?php

class Gangguan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['rekonstruksi_m', 'data_m']);
	}

	//Data FOIS
	public function data_fois()
	{
		$data['row'] = $this->data_m->get();
		$data['title'] = 'Data FOIS';
		$this->template->load('template', 'gangguan/data_fois', $data);
	}

	public function uploadData()
	{

		$post = $this->input->post(null, TRUE);

		// cek jika ada file yang akan di upload
		$config['upload_path'] 		= './assets/admin/img/data_fois/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg|pdf|xlsx|ppt|rar|zip|docx';
		$this->load->library('upload', $config);

		if ($_FILES['file']['size'] != null) {
			if ($this->upload->do_upload('file')) {

				$post['file'] = $this->upload->data('file_name');
				$this->data_m->upload($post);
				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('File berhasil diupload');</script>";
				}
				echo "<script>window.location='" . site_url('gangguan/data_fois') . "';</script>";
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				redirect('gangguan/data_fois');
			}
		} else {
			return false;
		}
	}
	public function deleteData($id)
	{
		$item = $this->data_m->get($id)->row();
		if ($item->file_name != null) {
			$target_file = './assets/admin/img/data_fois/' . $item->file_name;
			unlink($target_file);
		}

		$this->data_m->delete($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('File berhasil dihapus');</script>";
		}
		echo "<script>window.location='" . site_url('gangguan/data_fois') . "';</script>";
	}

	public function downloadData($id)
	{
		$data = $this->db->get_where('data_fois', ['file_id' => $id])->row();
		force_download('./assets/admin/img/data_fois/' . $data->file_name, NULL);
	}

	//Rekonstruksi
	public function rekonstruksi()
	{
		$data['row'] = $this->rekonstruksi_m->get();
		$data['title'] = 'Rekonstruksi';
		$this->template->load('template', 'gangguan/rekonstruksi', $data);
	}

	public function uploadRekonstruksi()
	{

		$post = $this->input->post(null, TRUE);

		// cek jika ada file yang akan di upload
		$config['upload_path'] 		= './assets/admin/img/rekonstruksi/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg|pdf|xlsx|ppt|rar|zip|docx';
		$this->load->library('upload', $config);

		if ($_FILES['file']['size'] != null) {
			if ($this->upload->do_upload('file')) {

				$post['file'] = $this->upload->data('file_name');
				$this->rekonstruksi_m->upload($post);
				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('File berhasil diupload');</script>";
				}
				echo "<script>window.location='" . site_url('gangguan/rekonstruksi') . "';</script>";
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				redirect('gangguan/rekonstruksi');
			}
		} else {
			return false;
		}
	}

	public function deleteRekonstruksi($id)
	{
		$item = $this->rekonstruksi_m->get($id)->row();
		if ($item->file_name != null) {
			$target_file = './assets/admin/img/rekonstruksi/' . $item->file_name;
			unlink($target_file);
		}

		$this->rekonstruksi_m->delete($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('File berhasil dihapus');</script>";
		}
		echo "<script>window.location='" . site_url('gangguan/rekonstruksi') . "';</script>";
	}

	public function downloadRekonstruksi($id)
	{
		$data = $this->db->get_where('rekonstruksi', ['file_id' => $id])->row();
		force_download('./assets/admin/img/rekonstruksi/' . $data->file_name, NULL);
	}
}
