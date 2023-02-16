<?php

class User extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('user_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->user_m->get();
		$data['title'] = 'User Management';
		$this->template->load('template', 'user/user_data', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|callback_valid_password');
		$this->form_validation->set_rules(
			'confpassword',
			'Confirm Password',
			'required|matches[password]',
			array('matches' => '%s tidak sesuai dengan Password')
		);
		$this->form_validation->set_rules('role', 'Role', 'required');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
		$this->form_validation->set_message('min_length', '{field} minimal {param} karakter');
		$this->form_validation->set_message('is_unique', '%s telah digunakan, silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Add New User';
			$this->template->load('template', 'user/add_user', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->user_m->add($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('User baru telah ditambahkan');</script>";
			}
			echo "<script>window.location='" . site_url('user') . "';</script>";
		}
	}

	public function edit($id = null)
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
		if ($this->input->post('password')) {
			$this->form_validation->set_rules('password', 'Password', 'min_length[8]|callback_valid_password');
			$this->form_validation->set_rules(
				'confpassword',
				'Confirm Password',
				'matches[password]',
				array('matches' => '%s tidak sesuai dengan Password')
			);
		}
		if ($this->input->post('confpassword')) {
			$this->form_validation->set_rules(
				'confpassword',
				'Confirm Password',
				'matches[password]',
				array('matches' => '%s tidak sesuai dengan Password')
			);
		}
		$this->form_validation->set_rules('role', 'Role', 'required');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '%s telah digunakan, silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->user_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['title'] = 'Edit User';
				$this->template->load('template', 'user/edit_user', $data);
			} else {
				echo "<script>alert('User tidak ditemukan');";
				echo "window.location='" . site_url('user') . "';</script>";
			}
		} else {
			$post = $this->input->post(null, TRUE);

			// cek jika ada gambar yang akan di upload
			$config['upload_path'] 		= './assets/admin/img/avatars/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['max_size']     	= '800';
			$this->load->library('upload', $config);

			if ($_FILES['upload']['name'] != null) {
				if ($this->upload->do_upload('upload')) {

					$post['upload'] = $this->upload->data('file_name');
					$this->user_m->edit($post);
					if ($this->db->affected_rows() > 0) {
						echo "<script>alert('User telah diupdate');</script>";
					}
					echo "<script>window.location='" . site_url('user') . "';</script>";
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					redirect('user/edit');
				}
			} else {
				$post['upload'] = null;
				$this->user_m->edit($post);
				if ($this->db->affected_rows() > 0) {
					echo "<script>alert('User telah diupdate');</script>";
				}
				echo "<script>window.location='" . site_url('user') . "';</script>";
			}
		}
	}

	function username_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('username_check', '{field} telah digunakan, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function valid_password($password = '')
	{
		$password = trim($password);
		$regex_lowercase = '/[a-z]/';
		$regex_uppercase = '/[A-Z]/';
		$regex_number = '/[0-9]/';
		$regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';
		if (preg_match_all($regex_lowercase, $password) < 1) {
			$this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');
			return FALSE;
		}
		if (preg_match_all($regex_uppercase, $password) < 1) {
			$this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');
			return FALSE;
		}
		if (preg_match_all($regex_number, $password) < 1) {
			$this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');
			return FALSE;
		}
		if (preg_match_all($regex_special, $password) < 1) {
			$this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>§~'));
			return FALSE;
		}
		return TRUE;
	}

	public function del($id)
	{

		$this->user_m->del($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('User berhasil dihapus');</script>";
		}
		echo "<script>window.location='" . site_url('user') . "';</script>";
	}
}
