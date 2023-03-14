<?php
class Get_penghantar_realisasi_for_insert_m extends CI_Model
{
  private function _get_table_name()
  {
    return "penghantar_realisasi AS main";
  }

  public function show($filters)
  {
    $this->db->where("tanggal", $filters->tanggal);
    $this->db->where("ruas", $filters->nama);

    $query = $this->db->get($this->_get_table_name());
    $result = $query->result();

    return count($result) ? $result[0] : null;
  }
}
