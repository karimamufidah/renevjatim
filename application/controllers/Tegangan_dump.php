<?php

require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Tegangan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('tegangan_m');
        $this->load->library('form_validation');
    }

    public function perencanaan()
    {
        $data['row'] = $this->tegangan_m->get_ren();
        $data['title'] = 'Tegangan | Perencanaan';
        $this->template->load('template', 'tegangan/perencanaan', $data);
    }

    public function add_ren()
    {
        $tegren = new stdClass();
        $tegren->data_id = null;
        $tegren->tanggal = null;
        $tegren->gardu_induk = null;
        $tegren->busbar = null;
        $tegren->kv = null;
        $tegren->status = null;
        $tegren->ren_0030 = null;
        $tegren->ren_0100 = null;
        $tegren->ren_0130 = null;
        $tegren->ren_0200 = null;
        $tegren->ren_0230 = null;
        $tegren->ren_0300 = null;
        $tegren->ren_0330 = null;
        $tegren->ren_0400 = null;
        $tegren->ren_0430 = null;
        $tegren->ren_0500 = null;
        $tegren->ren_0530 = null;
        $tegren->ren_0600 = null;
        $tegren->ren_0630 = null;
        $tegren->ren_0700 = null;
        $tegren->ren_0730 = null;
        $tegren->ren_0800 = null;
        $tegren->ren_0830 = null;
        $tegren->ren_0900 = null;
        $tegren->ren_0930 = null;
        $tegren->ren_1000 = null;
        $tegren->ren_1030 = null;
        $tegren->ren_1100 = null;
        $tegren->ren_1130 = null;
        $tegren->ren_1200 = null;
        $tegren->ren_1230 = null;
        $tegren->ren_1300 = null;
        $tegren->ren_1330 = null;
        $tegren->ren_1400 = null;
        $tegren->ren_1430 = null;
        $tegren->ren_1500 = null;
        $tegren->ren_1530 = null;
        $tegren->ren_1600 = null;
        $tegren->ren_1630 = null;
        $tegren->ren_1700 = null;
        $tegren->ren_1730 = null;
        $tegren->ren_1800 = null;
        $tegren->ren_1830 = null;
        $tegren->ren_1900 = null;
        $tegren->ren_1930 = null;
        $tegren->ren_2000 = null;
        $tegren->ren_2030 = null;
        $tegren->ren_2100 = null;
        $tegren->ren_2130 = null;
        $tegren->ren_2200 = null;
        $tegren->ren_2230 = null;
        $tegren->ren_2300 = null;
        $tegren->ren_2330 = null;
        $tegren->ren_2400 = null;
        $data = array(
            'page' => 'add_ren',
            'row' => $tegren
        );
        $data['title'] = 'Manual Input Data Tegangan | Perencanaan';
        $this->template->load('template', 'tegangan/tegangan_form', $data);
    }

    public function edit_ren($id)
    {
        $query = $this->tegangan_m->get_ren($id);
        if ($query->num_rows() > 0) {
            $tegren = $query->row();
            $data = array(
                'page' => 'edit_ren',
                'row' => $tegren
            );
            $data['title'] = 'Edit Data Tegangan | Perencanaan';
            $this->template->load('template', 'tegangan/tegangan_form', $data);
        } else {
            echo "<script>alert('User tidak ditemukan');";
            echo "window.location='" . site_url('tegangan/perencanaan') . "';</script>";
        }
    }

    public function process()
    {
        //$this->form_validation->set_rules('tanggal', 'Tanggal', 'is_unique[tegangan_perencanaan.tanggal]');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_message('is_unique', 'data pada %s ini sudah ada');
        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add_ren'])) {

            if ($this->form_validation->run() == FALSE) {
                $tegren = new stdClass();
                $tegren->data_id = null;
                $tegren->tanggal = null;
                $tegren->gardu_induk = null;
                $tegren->busbar = null;
                $tegren->kv = null;
                $tegren->ren_0030 = null;
                $tegren->ren_0100 = null;
                $tegren->ren_0130 = null;
                $tegren->ren_0200 = null;
                $tegren->ren_0230 = null;
                $tegren->ren_0300 = null;
                $tegren->ren_0330 = null;
                $tegren->ren_0400 = null;
                $tegren->ren_0430 = null;
                $tegren->ren_0500 = null;
                $tegren->ren_0530 = null;
                $tegren->ren_0600 = null;
                $tegren->ren_0630 = null;
                $tegren->ren_0700 = null;
                $tegren->ren_0730 = null;
                $tegren->ren_0800 = null;
                $tegren->ren_0830 = null;
                $tegren->ren_0900 = null;
                $tegren->ren_0930 = null;
                $tegren->ren_1000 = null;
                $tegren->ren_1030 = null;
                $tegren->ren_1100 = null;
                $tegren->ren_1130 = null;
                $tegren->ren_1200 = null;
                $tegren->ren_1230 = null;
                $tegren->ren_1300 = null;
                $tegren->ren_1330 = null;
                $tegren->ren_1400 = null;
                $tegren->ren_1430 = null;
                $tegren->ren_1500 = null;
                $tegren->ren_1530 = null;
                $tegren->ren_1600 = null;
                $tegren->ren_1630 = null;
                $tegren->ren_1700 = null;
                $tegren->ren_1730 = null;
                $tegren->ren_1800 = null;
                $tegren->ren_1830 = null;
                $tegren->ren_1900 = null;
                $tegren->ren_1930 = null;
                $tegren->ren_2000 = null;
                $tegren->ren_2030 = null;
                $tegren->ren_2100 = null;
                $tegren->ren_2130 = null;
                $tegren->ren_2200 = null;
                $tegren->ren_2230 = null;
                $tegren->ren_2300 = null;
                $tegren->ren_2330 = null;
                $tegren->ren_2400 = null;
                $data = array(
                    'page' => 'add_ren',
                    'row' => $tegren
                );
                $data['title'] = 'Manual Input Data Tegangan | Perencanaan';
                $this->template->load('template', 'tegangan/tegangan_form', $data);
            } else {
                $this->tegangan_m->add_ren($post);
                if ($this->db->affected_rows() > 0) {
                    echo "<script>alert('Data berhasil disimpan');</script>";
                }
                echo "<script>window.location='" . site_url('tegangan/perencanaan') . "';</script>";
            }
        } elseif (isset($_POST['edit_ren'])) {
            $this->tegangan_m->edit_ren($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data berhasil disimpan');</script>";
            }
            echo "<script>window.location='" . site_url('tegangan/perencanaan') . "';</script>";
        }
    }

    public function upload_ren()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|callback_date_check');
        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');



        $config['upload_path'] = './assets/admin/img/tegangan_perencanaan/';
        $config['allowed_types'] = 'xlsx|xls';

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')) {
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();
            $reader->setShouldFormatDates(true);
            $reader->open('assets/admin/img/tegangan_perencanaan/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numRow = 1;
                foreach ($sheet->getRowIterator() as $row) {
                    if ($numRow > 1) {
                        $tegren = array(
                            //'tanggal' => $row->getCellAtIndex(1),
                            'gardu_induk' => $row->getCellAtIndex(2),
                            'busbar' => $row->getCellAtIndex(3),
                            'kv' => $row->getCellAtIndex(4),
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
                        $this->tegangan_m->import_ren($tegren);
                    }
                    $numRow++;
                }
                $reader->close();
                unlink('assets/admin/img/tegangan_perencanaan/' . $file['file_name']);
            }

            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data berhasil ditambahkan');</script>";
            }
            echo "<script>window.location='" . site_url('tegangan/perencanaan') . "';</script>";
        } else {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('tegangan/perencanaan');
        }
    }

    function date_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM tengangan_perencanaan WHERE tanggal = '$post[tanggal]' AND data_id != '$post[data_id]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('date_check', 'Data pada {field} ini sudah ada. Yakin replace data?');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function del_ren($id)
    {
        $this->tegangan_m->del_ren($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('tegangan/perencanaan') . "';</script>";
    }

    public function realisasi()
    {
        $data['row'] = $this->tegangan_m->get_eval();
        $data['title'] = 'Tegangan | Realisasi';
        $this->template->load('template', 'tegangan/realisasi', $data);
    }

    public function add_eval()
    {
        $eval = new stdClass();
        $eval->data_id = null;
        $eval->tanggal = null;
        $eval->gardu_induk = null;
        $eval->busbar = null;
        $eval->kv = null;
        $eval->status = null;
        $eval->eval_0030 = null;
        $eval->eval_0100 = null;
        $eval->eval_0130 = null;
        $eval->eval_0200 = null;
        $eval->eval_0230 = null;
        $eval->eval_0300 = null;
        $eval->eval_0330 = null;
        $eval->eval_0400 = null;
        $eval->eval_0430 = null;
        $eval->eval_0500 = null;
        $eval->eval_0530 = null;
        $eval->eval_0600 = null;
        $eval->eval_0630 = null;
        $eval->eval_0700 = null;
        $eval->eval_0730 = null;
        $eval->eval_0800 = null;
        $eval->eval_0830 = null;
        $eval->eval_0900 = null;
        $eval->eval_0930 = null;
        $eval->eval_1000 = null;
        $eval->eval_1030 = null;
        $eval->eval_1100 = null;
        $eval->eval_1130 = null;
        $eval->eval_1200 = null;
        $eval->eval_1230 = null;
        $eval->eval_1300 = null;
        $eval->eval_1330 = null;
        $eval->eval_1400 = null;
        $eval->eval_1430 = null;
        $eval->eval_1500 = null;
        $eval->eval_1530 = null;
        $eval->eval_1600 = null;
        $eval->eval_1630 = null;
        $eval->eval_1700 = null;
        $eval->eval_1730 = null;
        $eval->eval_1800 = null;
        $eval->eval_1830 = null;
        $eval->eval_1900 = null;
        $eval->eval_1930 = null;
        $eval->eval_2000 = null;
        $eval->eval_2030 = null;
        $eval->eval_2100 = null;
        $eval->eval_2130 = null;
        $eval->eval_2200 = null;
        $eval->eval_2230 = null;
        $eval->eval_2300 = null;
        $eval->eval_2330 = null;
        $eval->eval_2400 = null;
        $data = array(
            'page' => 'add_eval',
            'row' => $eval
        );
        $data['title'] = 'Manual Input Data Tegangan | Realisasi';
        $this->template->load('template', 'tegangan/tegangan_form_eval', $data);
    }

    public function edit_eval($id)
    {
        $query = $this->tegangan_m->get_eval($id);
        if ($query->num_rows() > 0) {
            $eval = $query->row();
            $data = array(
                'page' => 'edit_eval',
                'row' => $eval
            );
            $data['title'] = 'Edit Data Tegangan | Realisasi';
            $this->template->load('template', 'tegangan/tegangan_form_eval', $data);
        } else {
            echo "<script>alert('User tidak ditemukan');";
            echo "window.location='" . site_url('tegangan/realisasi') . "';</script>";
        }
    }

    public function process_eval()
    {
        //$this->form_validation->set_rules('tanggal', 'Tanggal', 'is_unique[tegangan_perencanaan.tanggal]');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_message('is_unique', 'data pada %s ini sudah ada');
        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add_eval'])) {

            if ($this->form_validation->run() == FALSE) {
                $eval = new stdClass();
                $eval->data_id = null;
                $eval->tanggal = null;
                $eval->gardu_induk = null;
                $eval->busbar = null;
                $eval->kv = null;
                $eval->status = null;
                $eval->eval_0030 = null;
                $eval->eval_0100 = null;
                $eval->eval_0130 = null;
                $eval->eval_0200 = null;
                $eval->eval_0230 = null;
                $eval->eval_0300 = null;
                $eval->eval_0330 = null;
                $eval->eval_0400 = null;
                $eval->eval_0430 = null;
                $eval->eval_0500 = null;
                $eval->eval_0530 = null;
                $eval->eval_0600 = null;
                $eval->eval_0630 = null;
                $eval->eval_0700 = null;
                $eval->eval_0730 = null;
                $eval->eval_0800 = null;
                $eval->eval_0830 = null;
                $eval->eval_0900 = null;
                $eval->eval_0930 = null;
                $eval->eval_1000 = null;
                $eval->eval_1030 = null;
                $eval->eval_1100 = null;
                $eval->eval_1130 = null;
                $eval->eval_1200 = null;
                $eval->eval_1230 = null;
                $eval->eval_1300 = null;
                $eval->eval_1330 = null;
                $eval->eval_1400 = null;
                $eval->eval_1430 = null;
                $eval->eval_1500 = null;
                $eval->eval_1530 = null;
                $eval->eval_1600 = null;
                $eval->eval_1630 = null;
                $eval->eval_1700 = null;
                $eval->eval_1730 = null;
                $eval->eval_1800 = null;
                $eval->eval_1830 = null;
                $eval->eval_1900 = null;
                $eval->eval_1930 = null;
                $eval->eval_2000 = null;
                $eval->eval_2030 = null;
                $eval->eval_2100 = null;
                $eval->eval_2130 = null;
                $eval->eval_2200 = null;
                $eval->eval_2230 = null;
                $eval->eval_2300 = null;
                $eval->eval_2330 = null;
                $eval->eval_2400 = null;
                $data = array(
                    'page' => 'add_eval',
                    'row' => $eval
                );
                $data['title'] = 'Manual Input Data Tegangan | Realisasi';
                $this->template->load('template', 'tegangan/tegangan_form_eval', $data);
            } else {
                $this->tegangan_m->add_eval($post);
                if ($this->db->affected_rows() > 0) {
                    echo "<script>alert('Data berhasil disimpan');</script>";
                }
                echo "<script>window.location='" . site_url('tegangan/realisasi') . "';</script>";
            }
        } elseif (isset($_POST['edit_eval'])) {
            $this->tegangan_m->edit_eval($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data berhasil disimpan');</script>";
            }
            echo "<script>window.location='" . site_url('tegangan/realisasi') . "';</script>";
        }
    }

    public function upload_eval()
    {
        $config['upload_path'] = './assets/admin/img/tegangan_realisasi/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'doc' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')) {
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();
            $reader->setShouldFormatDates(true);
            $reader->open('assets/admin/img/tegangan_realisasi/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numRow = 1;
                foreach ($sheet->getRowIterator() as $row) {
                    if ($numRow > 1) {
                        $eval = array(
                            'tanggal' => $row->getCellAtIndex(1),
                            'gardu_induk' => $row->getCellAtIndex(2),
                            'busbar' => $row->getCellAtIndex(3),
                            'kv' => $row->getCellAtIndex(4),
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
                        $this->tegangan_m->import_eval($eval);
                    }
                    $numRow++;
                }
                $reader->close();
                unlink('assets/admin/img/tegangan_realisasi/' . $file['file_name']);
            }

            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data berhasil ditambahkan');</script>";
            }
            echo "<script>window.location='" . site_url('tegangan/realisasi') . "';</script>";
        } else {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('tegangan/realisasi');
        }
    }

    public function del_eval($id)
    {
        $this->tegangan_m->del_eval($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('tegangan/realisasi') . "';</script>";
    }
}
