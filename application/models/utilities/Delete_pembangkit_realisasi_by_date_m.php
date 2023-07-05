<?php
class Delete_pembangkit_realisasi_by_date_m extends CI_Model
{
  private function _get_plain_table_name()
  {
    return "pembangkit_realisasi";
  }

  public function show($filters)
  {
    $this->db->where("tanggal", $filters->tanggal);

    return $this->db->delete($this->_get_plain_table_name());
  }
}
