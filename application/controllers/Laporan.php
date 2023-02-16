<?php

class Laporan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['rob_m', 'rot_m', 'eob_m', 'eot_m', 'deklarasi_m']);
	}

	//ROB
	public function rob()
	{
		$data['row'] = $this->rob_m->get();
		$data['title'] = 'Laporan ROB';
		$this->template->load('template', 'laporan/rob', $data);
	}
	public function uploadRob()
	{

		$post = $this->input->post(null, TRUE);

		// cek jika ada file yang akan di upload
		$config['upload_path'] 		= './assets/admin/img/laporan_rob/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg|pdf|xlsx|ppt|rar|zip|docx';
		$this->load->library('upload', $config);

		if ($_FILES['file']['size'] != null) {
			if ($this->upload->do_upload('file')) {

				$post['file'] = $this->upload->data('file_name');
				$this->rob_m->upload($post);
				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('File berhasil diupload');</script>";
				}
				echo "<script>window.location='" . site_url('laporan/rob') . "';</script>";
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				redirect('laporan/rob');
			}
		} else {
			return false;
		}
	}
	public function deleteRob($id)
	{
		$item = $this->rob_m->get($id)->row();
		if ($item->file_name != null) {
			$target_file = './assets/admin/img/laporan_rob/' . $item->file_name;
			unlink($target_file);
		}

		$this->rob_m->delete($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('File berhasil dihapus');</script>";
		}
		echo "<script>window.location='" . site_url('laporan/rob') . "';</script>";
	}

	public function downloadRob($id)
	{
		$data = $this->db->get_where('rob', ['file_id' => $id])->row();
		force_download('./assets/admin/img/laporan_rob/' . $data->file_name, NULL);
	}

	//End of ROB

	//ROT

	public function rot()
	{
		$data['row'] = $this->rot_m->get();
		$data['title'] = 'Laporan ROT';
		$this->template->load('template', 'laporan/rot', $data);
	}
	public function uploadRot()
	{

		$post = $this->input->post(null, TRUE);

		// cek jika ada file yang akan di upload
		$config['upload_path'] 		= './assets/admin/img/laporan_rot/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg|pdf|xlsx|ppt|rar|zip|docx';
		$this->load->library('upload', $config);

		if ($_FILES['file']['size'] != null) {
			if ($this->upload->do_upload('file')) {

				$post['file'] = $this->upload->data('file_name');
				$this->rot_m->upload($post);
				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('File berhasil diupload');</script>";
				}
				echo "<script>window.location='" . site_url('laporan/rot') . "';</script>";
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				redirect('laporan/rot');
			}
		} else {
			return false;
		}
	}
	public function deleteRot($id)
	{
		$item = $this->rot_m->get($id)->row();
		if ($item->file_name != null) {
			$target_file = './assets/admin/img/laporan_rot/' . $item->file_name;
			unlink($target_file);
		}

		$this->rot_m->delete($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('File berhasil dihapus');</script>";
		}
		echo "<script>window.location='" . site_url('laporan/rot') . "';</script>";
	}

	public function downloadRot($id)
	{
		$data = $this->db->get_where('rot', ['file_id' => $id])->row();
		force_download('./assets/admin/img/laporan_rot/' . $data->file_name, NULL);
	}

	//End of ROT

	//EOB

	public function eob()
	{
		$data['row'] = $this->eob_m->get();
		$data['title'] = 'Laporan EOB';
		$this->template->load('template', 'laporan/eob', $data);
	}

	public function uploadEob()
	{

		$post = $this->input->post(null, TRUE);

		// cek jika ada file yang akan di upload
		$config['upload_path'] 		= './assets/admin/img/laporan_eob/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg|pdf|xlsx|ppt|rar|zip|docx';
		$this->load->library('upload', $config);

		if ($_FILES['file']['size'] != null) {
			if ($this->upload->do_upload('file')) {

				$post['file'] = $this->upload->data('file_name');
				$this->eob_m->upload($post);
				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('File berhasil diupload');</script>";
				}
				echo "<script>window.location='" . site_url('laporan/eob') . "';</script>";
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				redirect('laporan/eob');
			}
		} else {
			return false;
		}
	}
	public function deleteEob($id)
	{
		$item = $this->eob_m->get($id)->row();
		if ($item->file_name != null) {
			$target_file = './assets/admin/img/laporan_eob/' . $item->file_name;
			unlink($target_file);
		}

		$this->eob_m->delete($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('File berhasil dihapus');</script>";
		}
		echo "<script>window.location='" . site_url('laporan/eob') . "';</script>";
	}

	public function downloadEob($id)
	{
		$data = $this->db->get_where('eob', ['file_id' => $id])->row();
		force_download('./assets/admin/img/laporan_eob/' . $data->file_name, NULL);
	}

	//End of EOB

	//EOT

	public function eot()
	{
		$data['row'] = $this->eot_m->get();
		$data['title'] = 'Laporan EOT';
		$this->template->load('template', 'laporan/eot', $data);
	}

	public function uploadEot()
	{

		$post = $this->input->post(null, TRUE);

		// cek jika ada file yang akan di upload
		$config['upload_path'] 		= './assets/admin/img/laporan_eot/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg|pdf|xlsx|ppt|rar|zip|docx';
		$this->load->library('upload', $config);

		if ($_FILES['file']['size'] != null) {
			if ($this->upload->do_upload('file')) {

				$post['file'] = $this->upload->data('file_name');
				$this->eot_m->upload($post);
				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('File berhasil diupload');</script>";
				}
				echo "<script>window.location='" . site_url('laporan/eot') . "';</script>";
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				redirect('laporan/eot');
			}
		} else {
			return false;
		}
	}
	public function deleteEot($id)
	{
		$item = $this->eot_m->get($id)->row();
		if ($item->file_name != null) {
			$target_file = './assets/admin/img/laporan_eot/' . $item->file_name;
			unlink($target_file);
		}

		$this->eot_m->delete($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('File berhasil dihapus');</script>";
		}
		echo "<script>window.location='" . site_url('laporan/eot') . "';</script>";
	}

	public function downloadEot($id)
	{
		$data = $this->db->get_where('eot', ['file_id' => $id])->row();
		force_download('./assets/admin/img/laporan_eot/' . $data->file_name, NULL);
	}

	//End of EOT

	//Deklarasi TMP

	public function deklarasi_tmp()
	{
		$data['row'] = $this->deklarasi_m->get();
		$data['title'] = 'Deklarasi TMP';
		$this->template->load('template', 'laporan/deklarasi_tmp', $data);
	}
	public function uploadDeklarasi()
	{

		$post = $this->input->post(null, TRUE);

		// cek jika ada file yang akan di upload
		$config['upload_path'] 		= './assets/admin/img/deklarasi_tmp/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg|pdf|xlsx|ppt|rar|zip|docx';
		$this->load->library('upload', $config);

		if ($_FILES['file']['size'] != null) {
			if ($this->upload->do_upload('file')) {

				$post['file'] = $this->upload->data('file_name');
				$this->deklarasi_m->upload($post);
				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('File berhasil diupload');</script>";
				}
				echo "<script>window.location='" . site_url('laporan/deklarasi_tmp') . "';</script>";
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				redirect('laporan/deklarasi_tmp');
			}
		} else {
			return false;
		}
	}
	public function deleteDeklarasi($id)
	{
		$item = $this->deklarasi_m->get($id)->row();
		if ($item->file_name != null) {
			$target_file = './assets/admin/img/deklarasi_tmp/' . $item->file_name;
			unlink($target_file);
		}

		$this->deklarasi_m->delete($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('File berhasil dihapus');</script>";
		}
		echo "<script>window.location='" . site_url('laporan/deklarasi_tmp') . "';</script>";
	}

	public function downloadDeklarasi($id)
	{
		$data = $this->db->get_where('deklarasi_tmp', ['file_id' => $id])->row();
		force_download('./assets/admin/img/deklarasi_tmp/' . $data->file_name, NULL);
	}
}
