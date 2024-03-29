<?php
class Get_subsistem_realisasi_for_insert_m extends CI_Model
{
  private function _get_table_name()
  {
    return "subsistem_realisasi AS main";
  }

  public function show($filters)
  {
    $this->db->where("tanggal", $filters->tanggal);
    $this->db->where("subsistem", $filters->nama);
    $this->db->where("pasokan", $filters->pasokan);

    $query = $this->db->get($this->_get_table_name());
    $result = $query->result();

    return count($result) ? $result[0] : null;
  }
}
