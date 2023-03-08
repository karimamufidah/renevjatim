<?php
class Get_max_kv_tegangan_m extends CI_Model
{
  private function _get_table_name()
  {
    return "tegangan_realisasi_table AS main";
  }

  public function show()
  {
    $this->db->select("COALESCE(MAX(kv), 0) AS max");

    $query = $this->db->get($this->_get_table_name());
    $result = $query->result();

    return $result ? $result[0]->max : 0;
  }
}
