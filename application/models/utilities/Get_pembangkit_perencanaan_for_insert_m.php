<?php
class Get_pembangkit_perencanaan_for_insert_m extends CI_Model
{
  private function _get_table_name()
  {
    return "pembangkit_perencanaan AS main";
  }

  public function show($filters)
  {
    $this->db->where("tanggal", $filters->tanggal);
    $this->db->where("pembangkit", $filters->nama);

    $query = $this->db->get($this->_get_table_name());
    $result = $query->result();

    return count($result) ? $result[0] : null;
  }
}
