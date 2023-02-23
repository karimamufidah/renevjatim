<?php
class Get_beban_ibt_realisasi_by_date_count_m extends CI_Model
{
  private function _get_table_name()
  {
    return "ibt_realisasi AS main";
  }

  public function show($date)
  {
    $this->db->select("COUNT(*) AS total");
    $this->db->where("tanggal", $date);

    $query = $this->db->get($this->_get_table_name());
    $result = $query->result();

    return $result ? $result[0]->total : 0;
  }
}
