<?php
class Delete_sistem_perencanaan_by_date_m extends CI_Model
{
  private function _get_plain_table_name()
  {
    return "sistem_perencanaan";
  }

  public function show($filters)
  {
    $this->db->where("tanggal", $filters->tanggal);

    return $this->db->delete($this->_get_plain_table_name());
  }
}