<?php
class Get_subsistem_perencanaan_by_date_m extends CI_Model
{
  private function _get_table_name()
  {
    return "subsistem_perencanaan AS main";
  }

  public function show($filters)
  {
    $this->db->where("subsistem", $filters->subsistem);
    $this->db->where("pasokan", $filters->pasokan);
    $this->db->where("tanggal", $filters->tanggal);

    $query = $this->db->get($this->_get_table_name());
    $result = $query->result();

    return $result ? $result[0] : null;
  }
}
