<?php

class BebanSistem_m extends CI_Model
{
    //PENGHANTAR

    //get data perencanaan penghantar
    public function get_penghantar_ren($id = null)
    {
        $this->db->from('penghantar_perencanaan');
        $this->db->order_by('tanggal', 'desc');
        if ($id != null) {
            $this->db->where('data_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    //get data perencanaan penghantar with pagination
    public function get_penghantar_ren_pagination($limit = null, $start = null)
    {
        $this->db->from('penghantar_perencanaan');
        $this->db->order_by('tanggal', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    //manual input data perencanaan penghantar
    public function add_penghantar_ren($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'ruas' => $post['ruas'],
            'kv' => $post['kv'],
            //'numerik' => $post['numerik'],
            'inom' => empty($post['inom']) ? null : $post['inom'],
            'satuan' => $post['satuan'],
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
        $this->db->insert('penghantar_perencanaan', $params);
    }

    //edit data perencanaan penghantar
    public function edit_penghantar_ren($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'ruas' => $post['ruas'],
            'kv' => $post['kv'],
            //'numerik' => $post['numerik'],
            'inom' => empty($post['inom']) ? null : $post['inom'],
            'satuan' => $post['satuan'],
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
        $this->db->update('penghantar_perencanaan', $params);
    }

    //import data perencanaan penghantar
    public function import_penghantar_ren($penghantarren)
    {
        $data = count($penghantarren);
        if ($data > 0) {
            $this->db->set('created_date', 'NOW()', false);
            $this->db->set('created_by', $_POST['username']);
            $this->db->set('tanggal', $_POST['tanggal']);
            $this->db->replace('penghantar_perencanaan', $penghantarren);
        }
    }

    //delete data perencanaan penghantar
    public function del_penghantar_ren($id)
    {
        $this->db->where('data_id', $id);
        $this->db->delete('penghantar_perencanaan');
    }

    //get data realisasi penghantar
    public function get_penghantar_eval($id = null)
    {
        $this->db->from('penghantar_realisasi');
        $this->db->order_by('tanggal', 'desc');
        if ($id != null) {
            $this->db->where('data_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    //get data realisasi penghantar with pagination
    public function get_penghantar_eval_pagination($limit = null, $start = null)
    {
        $this->db->from('penghantar_realisasi');
        $this->db->order_by('tanggal', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    //manual input data realisasi penghantar
    public function add_penghantar_eval($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'ruas' => $post['ruas'],
            'kv' => $post['kv'],
            //'numerik' => $post['numerik'],
            'inom' => empty($post['inom']) ? null : $post['inom'],
            'satuan' => $post['satuan'],
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
        $this->db->insert('penghantar_realisasi', $params);
    }

    //edit data realisasi penghantar
    public function edit_penghantar_eval($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'ruas' => $post['ruas'],
            'kv' => $post['kv'],
            //'numerik' => $post['numerik'],
            'inom' => empty($post['inom']) ? null : $post['inom'],
            'satuan' => $post['satuan'],
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
        $this->db->update('penghantar_realisasi', $params);
    }

    //import data realisasi penghantar
    public function import_penghantar_eval($penghantareval)
    {
        $data = count($penghantareval);
        if ($data > 0) {
            $this->db->set('created_date', 'NOW()', false);
            $this->db->set('created_by', $_POST['username']);
            $this->db->set('tanggal', $_POST['tanggal']);
            $this->db->replace('penghantar_realisasi', $penghantareval);
        }
    }

    //delete data realisasi penghantar
    public function del_penghantar_eval($id)
    {
        $this->db->where('data_id', $id);
        $this->db->delete('penghantar_realisasi');
    }

    //INTERBUS TRANSFORMER (IBT)

    //get data perencanaan ibt
    public function get_ibt_ren($id = null)
    {
        $this->db->from('ibt_perencanaan');
        $this->db->order_by('tanggal', 'desc');
        if ($id != null) {
            $this->db->where('data_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    //get data perencanaan ibt with pagination
    public function get_ibt_ren_pagination($limit = null, $start = null)
    {
        $this->db->from('ibt_perencanaan');
        $this->db->order_by('tanggal', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    //manual input data perencanaan ibt
    public function add_ibt_ren($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'ibt' => $post['ibt'],
            'kv' => $post['kv'],
            'satuan' => $post['satuan'],
            'inom' => empty($post['inom']) ? null : $post['inom'],
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
        $this->db->insert('ibt_perencanaan', $params);
    }

    //edit data perencanaan ibt
    public function edit_ibt_ren($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'ibt' => $post['ibt'],
            'kv' => $post['kv'],
            'satuan' => $post['satuan'],
            'inom' => empty($post['inom']) ? null : $post['inom'],
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
        $this->db->update('ibt_perencanaan', $params);
    }

    //import data perencanaan ibt
    public function import_ibt_ren($ibtren)
    {
        $data = count($ibtren);
        if ($data > 0) {
            $this->db->set('created_date', 'NOW()', false);
            $this->db->set('created_by', $_POST['username']);
            $this->db->set('tanggal', $_POST['tanggal']);
            $this->db->replace('ibt_perencanaan', $ibtren);
        }
    }

    //delete data perencanaan ibt
    public function del_ibt_ren($id)
    {
        $this->db->where('data_id', $id);
        $this->db->delete('ibt_perencanaan');
    }

    //get data realisasi ibt
    public function get_ibt_eval($id = null)
    {
        $this->db->from('ibt_realisasi');
        $this->db->order_by('tanggal', 'desc');
        if ($id != null) {
            $this->db->where('data_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    //get data realisasi ibt with pagination
    public function get_ibt_eval_pagination($limit = null, $start = null)
    {
        $this->db->from('ibt_realisasi');
        $this->db->order_by('tanggal', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    //manual input data realisasi ibt
    public function add_ibt_eval($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'ibt' => $post['ibt'],
            'kv' => $post['kv'],
            'satuan' => $post['satuan'],
            'inom' => empty($post['inom']) ? null : $post['inom'],
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
        $this->db->insert('ibt_realisasi', $params);
    }

    //edit data realisasi ibt
    public function edit_ibt_eval($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'ibt' => $post['ibt'],
            'kv' => $post['kv'],
            'satuan' => $post['satuan'],
            'inom' => empty($post['inom']) ? null : $post['inom'],
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
        $this->db->update('ibt_realisasi', $params);
    }

    //import data realisasi ibt
    public function import_ibt_eval($ibteval)
    {
        $data = count($ibteval);
        if ($data > 0) {
            $this->db->set('created_date', 'NOW()', false);
            $this->db->set('created_by', $_POST['username']);
            $this->db->set('tanggal', $_POST['tanggal']);
            $this->db->replace('ibt_realisasi', $ibteval);
        }
    }

    //delete data realisasi ibt
    public function del_ibt_eval($id)
    {
        $this->db->where('data_id', $id);
        $this->db->delete('ibt_realisasi');
    }

    //TRAFO

    //get data perencanaan trafo
    public function get_trafo_ren($id = null)
    {
        $this->db->from('trafo_perencanaan');
        $this->db->order_by('tanggal', 'desc');
        if ($id != null) {
            $this->db->where('data_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    //get data perencanaan trafo with pagination
    public function get_trafo_ren_pagination($limit = null, $start = null)
    {
        $this->db->from('trafo_perencanaan');
        $this->db->order_by('tanggal', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    //manual input data perencanaan trafo
    public function add_trafo_ren($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'trafo' => $post['trafo'],
            'satuan' => $post['satuan'],
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
        $this->db->insert('trafo_perencanaan', $params);
    }

    //edit data perencanaan trafo
    public function edit_trafo_ren($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'trafo' => $post['trafo'],
            'satuan' => $post['satuan'],
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
        $this->db->update('trafo_perencanaan', $params);
    }

    //import data perencanaan trafo
    public function import_trafo_ren($traforen)
    {
        $data = count($traforen);
        if ($data > 0) {
            $this->db->set('created_date', 'NOW()', false);
            $this->db->set('created_by', $_POST['username']);
            $this->db->set('tanggal', $_POST['tanggal']);
            $this->db->replace('trafo_perencanaan', $traforen);
        }
    }

    //delete data perencanaan trafo
    public function del_trafo_ren($id)
    {
        $this->db->where('data_id', $id);
        $this->db->delete('trafo_perencanaan');
    }

    //get data realisasi trafo
    public function get_trafo_eval($id = null)
    {
        $this->db->from('trafo_realisasi');
        $this->db->order_by('tanggal', 'desc');
        if ($id != null) {
            $this->db->where('data_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    //get data realisasi trafo with pagination
    public function get_trafo_eval_pagination($limit = null, $start = null)
    {
        $this->db->from('trafo_realisasi');
        $this->db->order_by('tanggal', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    //manual input data realisasi trafo
    public function add_trafo_eval($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'trafo' => $post['trafo'],
            'satuan' => $post['satuan'],
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
        $this->db->insert('trafo_realisasi', $params);
    }

    //edit data realisasi trafo
    public function edit_trafo_eval($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'trafo' => $post['trafo'],
            'satuan' => $post['satuan'],
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
        $this->db->update('trafo_realisasi', $params);
    }

    //import data realisasi trafo
    public function import_trafo_eval($trafoeval)
    {
        $data = count($trafoeval);
        if ($data > 0) {
            $this->db->set('created_date', 'NOW()', false);
            $this->db->set('created_by', $_POST['username']);
            $this->db->set('tanggal', $_POST['tanggal']);
            $this->db->replace('trafo_realisasi', $trafoeval);
        }
    }

    //delete data realisasi trafo
    public function del_trafo_eval($id)
    {
        $this->db->where('data_id', $id);
        $this->db->delete('trafo_realisasi');
    }

    //SISTEM

    //get data perencanaan sistem
    public function get_sistem_ren($id = null)
    {
        $this->db->from('sistem_perencanaan');
        $this->db->order_by('tanggal', 'desc');
        if ($id != null) {
            $this->db->where('data_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    //get data perencanaan sistem with pagination
    public function get_sistem_ren_pagination($limit = null, $start = null)
    {
        $this->db->from('sistem_perencanaan');
        $this->db->order_by('tanggal', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    //manual input data perencanaan sistem
    public function add_sistem_ren($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'sistem' => $post['sistem'],
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
        $this->db->insert('sistem_perencanaan', $params);
    }

    //edit data perencanaan sistem
    public function edit_sistem_ren($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'sistem' => $post['sistem'],
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
        $this->db->update('sistem_perencanaan', $params);
    }

    //import data perencanaan sistem
    public function import_sistem_ren($sistemren)
    {
        $data = count($sistemren);
        if ($data > 0) {
            $this->db->set('created_date', 'NOW()', false);
            $this->db->set('created_by', $_POST['username']);
            $this->db->set('tanggal', $_POST['tanggal']);
            $this->db->replace('sistem_perencanaan', $sistemren);
        }
    }

    //delete data perencanaan sistem
    public function del_sistem_ren($id)
    {
        $this->db->where('data_id', $id);
        $this->db->delete('sistem_perencanaan');
    }

    //get data realisasi sistem
    public function get_sistem_eval($id = null)
    {
        $this->db->from('sistem_realisasi');
        $this->db->order_by('tanggal', 'desc');
        if ($id != null) {
            $this->db->where('data_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    //get data realisasi sistem with pagination
    public function get_sistem_eval_pagination($limit = null, $start = null)
    {
        $this->db->from('sistem_realisasi');
        $this->db->order_by('tanggal', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    //manual input data realisasi sistem
    public function add_sistem_eval($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'sistem' => $post['sistem'],
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
        $this->db->insert('sistem_realisasi', $params);
    }

    //edit data realisasi sistem
    public function edit_sistem_eval($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'sistem' => $post['sistem'],
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
        $this->db->update('sistem_realisasi', $params);
    }

    //import data realisasi sistem
    public function import_sistem_eval($sistemeval)
    {
        $data = count($sistemeval);
        if ($data > 0) {
            $this->db->set('created_date', 'NOW()', false);
            $this->db->set('created_by', $_POST['username']);
            $this->db->set('tanggal', $_POST['tanggal']);
            $this->db->replace('sistem_realisasi', $sistemeval);
        }
    }

    //delete data realisasi sistem
    public function del_sistem_eval($id)
    {
        $this->db->where('data_id', $id);
        $this->db->delete('sistem_realisasi');
    }

    //SUBSISTEM

    //get data perencanaan subsistem
    public function get_subsistem_ren($id = null)
    {
        $this->db->from('subsistem_perencanaan');
        $this->db->order_by('tanggal', 'desc');
        if ($id != null) {
            $this->db->where('data_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    //get data perencanaan subsistem with pagination
    public function get_subsistem_ren_pagination($limit = null, $start = null)
    {
        $this->db->from('subsistem_perencanaan');
        $this->db->order_by('tanggal', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    //manual input data perencanaan subsistem
    public function add_subsistem_ren($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'subsistem' => $post['subsistem'],
            'pasokan' => $post['pasokan'],
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
        $this->db->insert('subsistem_perencanaan', $params);
    }

    //edit data perencanaan subsistem
    public function edit_subsistem_ren($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'subsistem' => $post['subsistem'],
            'pasokan' => $post['pasokan'],
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
        $this->db->update('subsistem_perencanaan', $params);
    }

    //import data perencanaan subsistem
    public function import_subsistem_ren($subsistemren)
    {
        $data = count($subsistemren);
        if ($data > 0) {
            $this->db->set('created_date', 'NOW()', false);
            $this->db->set('created_by', $_POST['username']);
            $this->db->set('tanggal', $_POST['tanggal']);
            $this->db->replace('subsistem_perencanaan', $subsistemren);
        }
    }

    //delete data perencanaan subsistem
    public function del_subsistem_ren($id)
    {
        $this->db->where('data_id', $id);
        $this->db->delete('subsistem_perencanaan');
    }

    //get data realisasi subsistem
    public function get_subsistem_eval($id = null)
    {
        $this->db->from('subsistem_realisasi');
        $this->db->order_by('tanggal', 'desc');
        if ($id != null) {
            $this->db->where('data_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    //get data realisasi subsistem with pagination
    public function get_subsistem_eval_pagination($limit = null, $start = null)
    {
        $this->db->from('subsistem_realisasi');
        $this->db->order_by('tanggal', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    //manual input data realisasi subsistem
    public function add_subsistem_eval($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'subsistem' => $post['subsistem'],
            'pasokan' => $post['pasokan'],
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
        $this->db->insert('subsistem_realisasi', $params);
    }

    //edit data realisasi subsistem
    public function edit_subsistem_eval($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'subsistem' => $post['subsistem'],
            'pasokan' => $post['pasokan'],
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
        $this->db->update('subsistem_realisasi', $params);
    }

    //import data realisasi subsistem
    public function import_subsistem_eval($subsistemeval)
    {
        $data = count($subsistemeval);
        if ($data > 0) {
            $this->db->set('created_date', 'NOW()', false);
            $this->db->set('created_by', $_POST['username']);
            $this->db->set('tanggal', $_POST['tanggal']);
            $this->db->replace('subsistem_realisasi', $subsistemeval);
        }
    }

    //delete data realisasi subsistem
    public function del_subsistem_eval($id)
    {
        $this->db->where('data_id', $id);
        $this->db->delete('subsistem_realisasi');
    }

    //PEMBANGKIT

    //get data perencanaan pembangkit
    public function get_pembangkit_ren($id = null)
    {
        $this->db->from('pembangkit_perencanaan');
        $this->db->order_by('tanggal', 'desc');
        if ($id != null) {
            $this->db->where('data_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    //get data perencanaan pembangkit with pagination
    public function get_pembangkit_ren_pagination($limit = null, $start = null)
    {
        $this->db->from('pembangkit_perencanaan');
        $this->db->order_by('tanggal', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    //manual input data perencanaan pembangkit
    public function add_pembangkit_ren($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'pembangkit' => $post['pembangkit'],
            'satuan' => $post['satuan'],
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
        $this->db->insert('pembangkit_perencanaan', $params);
    }

    //edit data perencanaan pembangkit
    public function edit_pembangkit_ren($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'pembangkit' => $post['pembangkit'],
            'satuan' => $post['satuan'],
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
        $this->db->update('pembangkit_perencanaan', $params);
    }

    //import data perencanaan pembangkit
    public function import_pembangkit_ren($pembangkitren)
    {
        $data = count($pembangkitren);
        if ($data > 0) {
            $this->db->set('created_date', 'NOW()', false);
            $this->db->set('created_by', $_POST['username']);
            $this->db->set('tanggal', $_POST['tanggal']);
            $this->db->replace('pembangkit_perencanaan', $pembangkitren);
        }
    }

    //delete data perencanaan pembangkit
    public function del_pembangkit_ren($id)
    {
        $this->db->where('data_id', $id);
        $this->db->delete('pembangkit_perencanaan');
    }

    //get data realisasi pembangkit
    public function get_pembangkit_eval($id = null)
    {
        $this->db->from('pembangkit_realisasi');
        $this->db->order_by('tanggal', 'desc');
        if ($id != null) {
            $this->db->where('data_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    //get data realisasi pembangkit with pagination
    public function get_pembangkit_eval_pagination($limit = null, $start = null)
    {
        $this->db->from('pembangkit_realisasi');
        $this->db->order_by('tanggal', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    //manual input data realisasi pembangkit
    public function add_pembangkit_eval($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'pembangkit' => $post['pembangkit'],
            'satuan' => $post['satuan'],
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
        $this->db->insert('pembangkit_realisasi', $params);
    }

    //edit data realisasi pembangkit
    public function edit_pembangkit_eval($post)
    {
        $params = [
            'tanggal' => $post['tanggal'],
            'pembangkit' => $post['pembangkit'],
            'satuan' => $post['satuan'],
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
        $this->db->update('pembangkit_realisasi', $params);
    }

    //import data realisasi pembangkit
    public function import_pembangkit_eval($pembangkiteval)
    {
        $data = count($pembangkiteval);
        if ($data > 0) {
            $this->db->set('created_date', 'NOW()', false);
            $this->db->set('created_by', $_POST['username']);
            $this->db->set('tanggal', $_POST['tanggal']);
            $this->db->replace('pembangkit_realisasi', $pembangkiteval);
        }
    }

    //delete data realisasi pembangkit
    public function del_pembangkit_eval($id)
    {
        $this->db->where('data_id', $id);
        $this->db->delete('pembangkit_realisasi');
    }
}
