<?php

class Tegangan_m extends CI_Model
{
    //get data perencanaan
    public function get_ren($id = null)
    {
        $this->db->from('tegangan_perencanaan');
        $this->db->order_by('tanggal', 'desc');
        if ($id != null) {
            $this->db->where('data_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    //get data perencanaan with pagination
    public function get_ren_pagination($limit = null, $start = null)
    {
        $this->db->from('tegangan_perencanaan');
        $this->db->order_by('tanggal', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    //manual input data perencanaan
    public function add_ren($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'gardu_induk' => $post['gardu_induk'],
            'busbar' => $post['busbar'],
            'kv' => empty($post['kv']) ? null : $post['kv'],
            'ren_0030' => empty($post['ren_0030']) ? null : $post['ren_0030'],
            'ren_0100' => empty($post['ren_0100']) ? null : $post['ren_0100'],
            'ren_0130' => empty($post['ren_0130']) ? null : $post['ren_0130'],
            'ren_0200' => empty($post['ren_0200']) ? null : $post['ren_0200'],
            'ren_0230' => empty($post['ren_0230']) ? null : $post['ren_0230'],
            'ren_0300' => empty($post['ren_0300']) ? null : $post['ren_0300'],
            'ren_0330' => empty($post['ren_0330']) ? null : $post['ren_0330'],
            'ren_0400' => empty($post['ren_0400']) ? null : $post['ren_0400'],
            'ren_0430' => empty($post['ren_0430']) ? null : $post['ren_0430'],
            'ren_0500' => empty($post['ren_0500']) ? null : $post['ren_0500'],
            'ren_0530' => empty($post['ren_0530']) ? null : $post['ren_0530'],
            'ren_0600' => empty($post['ren_0600']) ? null : $post['ren_0600'],
            'ren_0630' => empty($post['ren_0630']) ? null : $post['ren_0630'],
            'ren_0700' => empty($post['ren_0700']) ? null : $post['ren_0700'],
            'ren_0730' => empty($post['ren_0730']) ? null : $post['ren_0730'],
            'ren_0800' => empty($post['ren_0800']) ? null : $post['ren_0800'],
            'ren_0830' => empty($post['ren_0830']) ? null : $post['ren_0830'],
            'ren_0900' => empty($post['ren_0900']) ? null : $post['ren_0900'],
            'ren_0930' => empty($post['ren_0930']) ? null : $post['ren_0930'],
            'ren_1000' => empty($post['ren_1000']) ? null : $post['ren_1000'],
            'ren_1030' => empty($post['ren_1030']) ? null : $post['ren_1030'],
            'ren_1100' => empty($post['ren_1100']) ? null : $post['ren_1100'],
            'ren_1130' => empty($post['ren_1130']) ? null : $post['ren_1130'],
            'ren_1200' => empty($post['ren_1200']) ? null : $post['ren_1200'],
            'ren_1230' => empty($post['ren_1230']) ? null : $post['ren_1230'],
            'ren_1300' => empty($post['ren_1300']) ? null : $post['ren_1300'],
            'ren_1330' => empty($post['ren_1330']) ? null : $post['ren_1330'],
            'ren_1400' => empty($post['ren_1400']) ? null : $post['ren_1400'],
            'ren_1430' => empty($post['ren_1430']) ? null : $post['ren_1430'],
            'ren_1500' => empty($post['ren_1500']) ? null : $post['ren_1500'],
            'ren_1530' => empty($post['ren_1530']) ? null : $post['ren_1530'],
            'ren_1600' => empty($post['ren_1600']) ? null : $post['ren_1600'],
            'ren_1630' => empty($post['ren_1630']) ? null : $post['ren_1630'],
            'ren_1700' => empty($post['ren_1700']) ? null : $post['ren_1700'],
            'ren_1730' => empty($post['ren_1730']) ? null : $post['ren_1730'],
            'ren_1800' => empty($post['ren_1800']) ? null : $post['ren_1800'],
            'ren_1830' => empty($post['ren_1830']) ? null : $post['ren_1830'],
            'ren_1900' => empty($post['ren_1900']) ? null : $post['ren_1900'],
            'ren_1930' => empty($post['ren_1930']) ? null : $post['ren_1930'],
            'ren_2000' => empty($post['ren_2000']) ? null : $post['ren_2000'],
            'ren_2030' => empty($post['ren_2030']) ? null : $post['ren_2030'],
            'ren_2100' => empty($post['ren_2100']) ? null : $post['ren_2100'],
            'ren_2130' => empty($post['ren_2130']) ? null : $post['ren_2130'],
            'ren_2200' => empty($post['ren_2200']) ? null : $post['ren_2200'],
            'ren_2230' => empty($post['ren_2230']) ? null : $post['ren_2230'],
            'ren_2300' => empty($post['ren_2300']) ? null : $post['ren_2300'],
            'ren_2330' => empty($post['ren_2330']) ? null : $post['ren_2330'],
            'ren_2400' => empty($post['ren_2400']) ? null : $post['ren_2400'],
            'status' => $post['status'],
            'created_by' => $post['username'],
        ];
        $this->db->set('created_date', 'NOW()', false);
        $this->db->insert('tegangan_perencanaan', $params);
    }

    //edit data perencanaan
    public function edit_ren($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'gardu_induk' => $post['gardu_induk'],
            'busbar' => $post['busbar'],
            'kv' => empty($post['kv']) ? null : $post['kv'],
            'ren_0030' => empty($post['ren_0030']) ? null : $post['ren_0030'],
            'ren_0100' => empty($post['ren_0100']) ? null : $post['ren_0100'],
            'ren_0130' => empty($post['ren_0130']) ? null : $post['ren_0130'],
            'ren_0200' => empty($post['ren_0200']) ? null : $post['ren_0200'],
            'ren_0230' => empty($post['ren_0230']) ? null : $post['ren_0230'],
            'ren_0300' => empty($post['ren_0300']) ? null : $post['ren_0300'],
            'ren_0330' => empty($post['ren_0330']) ? null : $post['ren_0330'],
            'ren_0400' => empty($post['ren_0400']) ? null : $post['ren_0400'],
            'ren_0430' => empty($post['ren_0430']) ? null : $post['ren_0430'],
            'ren_0500' => empty($post['ren_0500']) ? null : $post['ren_0500'],
            'ren_0530' => empty($post['ren_0530']) ? null : $post['ren_0530'],
            'ren_0600' => empty($post['ren_0600']) ? null : $post['ren_0600'],
            'ren_0630' => empty($post['ren_0630']) ? null : $post['ren_0630'],
            'ren_0700' => empty($post['ren_0700']) ? null : $post['ren_0700'],
            'ren_0730' => empty($post['ren_0730']) ? null : $post['ren_0730'],
            'ren_0800' => empty($post['ren_0800']) ? null : $post['ren_0800'],
            'ren_0830' => empty($post['ren_0830']) ? null : $post['ren_0830'],
            'ren_0900' => empty($post['ren_0900']) ? null : $post['ren_0900'],
            'ren_0930' => empty($post['ren_0930']) ? null : $post['ren_0930'],
            'ren_1000' => empty($post['ren_1000']) ? null : $post['ren_1000'],
            'ren_1030' => empty($post['ren_1030']) ? null : $post['ren_1030'],
            'ren_1100' => empty($post['ren_1100']) ? null : $post['ren_1100'],
            'ren_1130' => empty($post['ren_1130']) ? null : $post['ren_1130'],
            'ren_1200' => empty($post['ren_1200']) ? null : $post['ren_1200'],
            'ren_1230' => empty($post['ren_1230']) ? null : $post['ren_1230'],
            'ren_1300' => empty($post['ren_1300']) ? null : $post['ren_1300'],
            'ren_1330' => empty($post['ren_1330']) ? null : $post['ren_1330'],
            'ren_1400' => empty($post['ren_1400']) ? null : $post['ren_1400'],
            'ren_1430' => empty($post['ren_1430']) ? null : $post['ren_1430'],
            'ren_1500' => empty($post['ren_1500']) ? null : $post['ren_1500'],
            'ren_1530' => empty($post['ren_1530']) ? null : $post['ren_1530'],
            'ren_1600' => empty($post['ren_1600']) ? null : $post['ren_1600'],
            'ren_1630' => empty($post['ren_1630']) ? null : $post['ren_1630'],
            'ren_1700' => empty($post['ren_1700']) ? null : $post['ren_1700'],
            'ren_1730' => empty($post['ren_1730']) ? null : $post['ren_1730'],
            'ren_1800' => empty($post['ren_1800']) ? null : $post['ren_1800'],
            'ren_1830' => empty($post['ren_1830']) ? null : $post['ren_1830'],
            'ren_1900' => empty($post['ren_1900']) ? null : $post['ren_1900'],
            'ren_1930' => empty($post['ren_1930']) ? null : $post['ren_1930'],
            'ren_2000' => empty($post['ren_2000']) ? null : $post['ren_2000'],
            'ren_2030' => empty($post['ren_2030']) ? null : $post['ren_2030'],
            'ren_2100' => empty($post['ren_2100']) ? null : $post['ren_2100'],
            'ren_2130' => empty($post['ren_2130']) ? null : $post['ren_2130'],
            'ren_2200' => empty($post['ren_2200']) ? null : $post['ren_2200'],
            'ren_2230' => empty($post['ren_2230']) ? null : $post['ren_2230'],
            'ren_2300' => empty($post['ren_2300']) ? null : $post['ren_2300'],
            'ren_2330' => empty($post['ren_2330']) ? null : $post['ren_2330'],
            'ren_2400' => empty($post['ren_2400']) ? null : $post['ren_2400'],
            'status' => $post['status'],
            'updated_by' => $post['username'],
        ];
        $this->db->set('updated_date', 'NOW()', false);
        $this->db->where('data_id', $post['data_id']);
        $this->db->update('tegangan_perencanaan', $params);
    }

    //import data perencanaan
    public function import_ren($tegren)
    {
        $data = count($tegren);
        if ($data > 0) {
            $this->db->set('created_date', 'NOW()', false);
            $this->db->set('created_by', $_POST['username']);
            $this->db->set('tanggal', $_POST['tanggal']);
            $this->db->replace('tegangan_perencanaan', $tegren);
        }
    }

    //delete data perencanaan
    public function del_ren($id)
    {
        $this->db->where('data_id', $id);
        $this->db->delete('tegangan_perencanaan');
    }

    public function trial()
    {
        $tanggal   = $_POST['tanggal'];
    }

    //get data realisasi
    public function get_eval($id = null)
    {
        $this->db->from('tegangan_realisasi');
        $this->db->order_by('tanggal', 'desc');
        if ($id != null) {
            $this->db->where('data_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    //get data realisasi with pagination
    public function get_eval_pagination($limit = null, $start = null)
    {
        $this->db->from('tegangan_realisasi');
        $this->db->order_by('tanggal', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    //manual input data realisasi
    public function add_eval($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'gardu_induk' => $post['gardu_induk'],
            'busbar' => $post['busbar'],
            'kv' => empty($post['kv']) ? null : $post['kv'],
            'eval_0030' => empty($post['eval_0030']) ? null : $post['eval_0030'],
            'eval_0100' => empty($post['eval_0100']) ? null : $post['eval_0100'],
            'eval_0130' => empty($post['eval_0130']) ? null : $post['eval_0130'],
            'eval_0200' => empty($post['eval_0200']) ? null : $post['eval_0200'],
            'eval_0230' => empty($post['eval_0230']) ? null : $post['eval_0230'],
            'eval_0300' => empty($post['eval_0300']) ? null : $post['eval_0300'],
            'eval_0330' => empty($post['eval_0330']) ? null : $post['eval_0330'],
            'eval_0400' => empty($post['eval_0400']) ? null : $post['eval_0400'],
            'eval_0430' => empty($post['eval_0430']) ? null : $post['eval_0430'],
            'eval_0500' => empty($post['eval_0500']) ? null : $post['eval_0500'],
            'eval_0530' => empty($post['eval_0530']) ? null : $post['eval_0530'],
            'eval_0600' => empty($post['eval_0600']) ? null : $post['eval_0600'],
            'eval_0630' => empty($post['eval_0630']) ? null : $post['eval_0630'],
            'eval_0700' => empty($post['eval_0700']) ? null : $post['eval_0700'],
            'eval_0730' => empty($post['eval_0730']) ? null : $post['eval_0730'],
            'eval_0800' => empty($post['eval_0800']) ? null : $post['eval_0800'],
            'eval_0830' => empty($post['eval_0830']) ? null : $post['eval_0830'],
            'eval_0900' => empty($post['eval_0900']) ? null : $post['eval_0900'],
            'eval_0930' => empty($post['eval_0930']) ? null : $post['eval_0930'],
            'eval_1000' => empty($post['eval_1000']) ? null : $post['eval_1000'],
            'eval_1030' => empty($post['eval_1030']) ? null : $post['eval_1030'],
            'eval_1100' => empty($post['eval_1100']) ? null : $post['eval_1100'],
            'eval_1130' => empty($post['eval_1130']) ? null : $post['eval_1130'],
            'eval_1200' => empty($post['eval_1200']) ? null : $post['eval_1200'],
            'eval_1230' => empty($post['eval_1230']) ? null : $post['eval_1230'],
            'eval_1300' => empty($post['eval_1300']) ? null : $post['eval_1300'],
            'eval_1330' => empty($post['eval_1330']) ? null : $post['eval_1330'],
            'eval_1400' => empty($post['eval_1400']) ? null : $post['eval_1400'],
            'eval_1430' => empty($post['eval_1430']) ? null : $post['eval_1430'],
            'eval_1500' => empty($post['eval_1500']) ? null : $post['eval_1500'],
            'eval_1530' => empty($post['eval_1530']) ? null : $post['eval_1530'],
            'eval_1600' => empty($post['eval_1600']) ? null : $post['eval_1600'],
            'eval_1630' => empty($post['eval_1630']) ? null : $post['eval_1630'],
            'eval_1700' => empty($post['eval_1700']) ? null : $post['eval_1700'],
            'eval_1730' => empty($post['eval_1730']) ? null : $post['eval_1730'],
            'eval_1800' => empty($post['eval_1800']) ? null : $post['eval_1800'],
            'eval_1830' => empty($post['eval_1830']) ? null : $post['eval_1830'],
            'eval_1900' => empty($post['eval_1900']) ? null : $post['eval_1900'],
            'eval_1930' => empty($post['eval_1930']) ? null : $post['eval_1930'],
            'eval_2000' => empty($post['eval_2000']) ? null : $post['eval_2000'],
            'eval_2030' => empty($post['eval_2030']) ? null : $post['eval_2030'],
            'eval_2100' => empty($post['eval_2100']) ? null : $post['eval_2100'],
            'eval_2130' => empty($post['eval_2130']) ? null : $post['eval_2130'],
            'eval_2200' => empty($post['eval_2200']) ? null : $post['eval_2200'],
            'eval_2230' => empty($post['eval_2230']) ? null : $post['eval_2230'],
            'eval_2300' => empty($post['eval_2300']) ? null : $post['eval_2300'],
            'eval_2330' => empty($post['eval_2330']) ? null : $post['eval_2330'],
            'eval_2400' => empty($post['eval_2400']) ? null : $post['eval_2400'],
            'status' => $post['status'],
            'created_by' => $post['username'],
        ];
        $this->db->set('created_date', 'NOW()', false);
        $this->db->insert('tegangan_realisasi', $params);
    }

    //edit data realisasi
    public function edit_eval($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'gardu_induk' => $post['gardu_induk'],
            'busbar' => $post['busbar'],
            'kv' => empty($post['kv']) ? null : $post['kv'],
            'eval_0030' => empty($post['eval_0030']) ? null : $post['eval_0030'],
            'eval_0100' => empty($post['eval_0100']) ? null : $post['eval_0100'],
            'eval_0130' => empty($post['eval_0130']) ? null : $post['eval_0130'],
            'eval_0200' => empty($post['eval_0200']) ? null : $post['eval_0200'],
            'eval_0230' => empty($post['eval_0230']) ? null : $post['eval_0230'],
            'eval_0300' => empty($post['eval_0300']) ? null : $post['eval_0300'],
            'eval_0330' => empty($post['eval_0330']) ? null : $post['eval_0330'],
            'eval_0400' => empty($post['eval_0400']) ? null : $post['eval_0400'],
            'eval_0430' => empty($post['eval_0430']) ? null : $post['eval_0430'],
            'eval_0500' => empty($post['eval_0500']) ? null : $post['eval_0500'],
            'eval_0530' => empty($post['eval_0530']) ? null : $post['eval_0530'],
            'eval_0600' => empty($post['eval_0600']) ? null : $post['eval_0600'],
            'eval_0630' => empty($post['eval_0630']) ? null : $post['eval_0630'],
            'eval_0700' => empty($post['eval_0700']) ? null : $post['eval_0700'],
            'eval_0730' => empty($post['eval_0730']) ? null : $post['eval_0730'],
            'eval_0800' => empty($post['eval_0800']) ? null : $post['eval_0800'],
            'eval_0830' => empty($post['eval_0830']) ? null : $post['eval_0830'],
            'eval_0900' => empty($post['eval_0900']) ? null : $post['eval_0900'],
            'eval_0930' => empty($post['eval_0930']) ? null : $post['eval_0930'],
            'eval_1000' => empty($post['eval_1000']) ? null : $post['eval_1000'],
            'eval_1030' => empty($post['eval_1030']) ? null : $post['eval_1030'],
            'eval_1100' => empty($post['eval_1100']) ? null : $post['eval_1100'],
            'eval_1130' => empty($post['eval_1130']) ? null : $post['eval_1130'],
            'eval_1200' => empty($post['eval_1200']) ? null : $post['eval_1200'],
            'eval_1230' => empty($post['eval_1230']) ? null : $post['eval_1230'],
            'eval_1300' => empty($post['eval_1300']) ? null : $post['eval_1300'],
            'eval_1330' => empty($post['eval_1330']) ? null : $post['eval_1330'],
            'eval_1400' => empty($post['eval_1400']) ? null : $post['eval_1400'],
            'eval_1430' => empty($post['eval_1430']) ? null : $post['eval_1430'],
            'eval_1500' => empty($post['eval_1500']) ? null : $post['eval_1500'],
            'eval_1530' => empty($post['eval_1530']) ? null : $post['eval_1530'],
            'eval_1600' => empty($post['eval_1600']) ? null : $post['eval_1600'],
            'eval_1630' => empty($post['eval_1630']) ? null : $post['eval_1630'],
            'eval_1700' => empty($post['eval_1700']) ? null : $post['eval_1700'],
            'eval_1730' => empty($post['eval_1730']) ? null : $post['eval_1730'],
            'eval_1800' => empty($post['eval_1800']) ? null : $post['eval_1800'],
            'eval_1830' => empty($post['eval_1830']) ? null : $post['eval_1830'],
            'eval_1900' => empty($post['eval_1900']) ? null : $post['eval_1900'],
            'eval_1930' => empty($post['eval_1930']) ? null : $post['eval_1930'],
            'eval_2000' => empty($post['eval_2000']) ? null : $post['eval_2000'],
            'eval_2030' => empty($post['eval_2030']) ? null : $post['eval_2030'],
            'eval_2100' => empty($post['eval_2100']) ? null : $post['eval_2100'],
            'eval_2130' => empty($post['eval_2130']) ? null : $post['eval_2130'],
            'eval_2200' => empty($post['eval_2200']) ? null : $post['eval_2200'],
            'eval_2230' => empty($post['eval_2230']) ? null : $post['eval_2230'],
            'eval_2300' => empty($post['eval_2300']) ? null : $post['eval_2300'],
            'eval_2330' => empty($post['eval_2330']) ? null : $post['eval_2330'],
            'eval_2400' => empty($post['eval_2400']) ? null : $post['eval_2400'],
            'status' => $post['status'],
            'updated_by' => $post['username'],
        ];
        $this->db->set('updated_date', 'NOW()', false);
        $this->db->where('data_id', $post['data_id']);
        $this->db->update('tegangan_realisasi', $params);
    }

    //import data realisasi
    public function import_eval($eval)
    {
        $data = count($eval);
        if ($data > 0) {
            $this->db->set('created_date', 'NOW()', false);
            $this->db->set('created_by', $_POST['username']);
            $this->db->set('tanggal', $_POST['tanggal']);
            $this->db->replace('tegangan_realisasi', $eval);
        }
    }

    //delete data realisasi
    public function del_eval($id)
    {
        $this->db->where('data_id', $id);
        $this->db->delete('tegangan_realisasi');
    }
}
