<?php
class Index_satuan_m extends CI_Model
{
    private function _get_table_name()
    {
        return "penghantar_perencanaan AS main";
    }

    public function index()
    {
        $this->db->select('DISTINCT(main.satuan) AS name');

        $query = $this->db->get($this->_get_table_name());

        return $query->result();
    }
}
