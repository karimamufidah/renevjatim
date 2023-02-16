<?php

class Defense_scheme extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('defense_m');
	}
	public function index()
	{
		check_not_login();
		$data['row'] = $this->defense_m->get();
		$data['title'] = 'Defense Scheme';
		$this->template->load('template', 'defense_scheme', $data);
	}
	public function upload()
	{

		$post = $this->input->post(null, TRUE);

		// cek jika ada file yang akan di upload
		$config['upload_path'] 		= './assets/admin/img/defense_scheme/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg|pdf|xlsx|ppt|rar|zip|docx';
		$this->load->library('upload', $config);

		if ($_FILES['file']['size'] != null) {
			if ($this->upload->do_upload('file')) {

				$post['file'] = $this->upload->data('file_name');
				$this->defense_m->upload($post);
				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('File berhasil diupload');</script>";
				}
				echo "<script>window.location='" . site_url('defense_scheme') . "';</script>";
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				redirect('defense_scheme');
			}
		} else {
			return false;
		}
	}

	public function delete($id)
	{
		$item = $this->defense_m->get($id)->row();
		if ($item->file_name != null) {
			$target_file = './assets/admin/img/defense_scheme/' . $item->file_name;
			unlink($target_file);
		}

		$this->defense_m->delete($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('File berhasil dihapus');</script>";
		}
		echo "<script>window.location='" . site_url('defense_scheme') . "';</script>";
	}

	public function download($id)
	{
		$data = $this->db->get_where('defense_scheme', ['file_id' => $id])->row();
		force_download('./assets/admin/img/defense_scheme/' . $data->file_name, NULL);
	}
}
