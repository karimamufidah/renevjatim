<?php
class Delete_sistem_realisasi_by_date_m extends CI_Model
{
  private function _get_plain_table_name()
  {
    return "sistem_realisasi";
  }

  public function delete($filters)
  {
    $this->db->where("tanggal", $filters->tanggal);

    return $this->db->delete($this->_get_plain_table_name());
  }
}
