<?php
class Get_trafo_perencanaan_for_insert_m extends CI_Model
{
  private function _get_table_name()
  {
    return "trafo_perencanaan AS main";
  }

  public function show($filters)
  {
    $this->db->where("tanggal", $filters->tanggal);
    $this->db->where("trafo", $filters->nama);
    $this->db->where("satuan", $filters->satuan);

    $query = $this->db->get($this->_get_table_name());
    $result = $query->result();

    return count($result) ? $result[0] : null;
  }
}
