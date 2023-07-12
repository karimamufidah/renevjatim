<?php
class Get_lowest_tegangan_this_month_panel_m extends CI_Model
{
  private function _get_table_name()
  {
    return "tegangan_realisasi AS main";
  }

  public function show($column, $nama)
  {
    $this->db->select("main.tanggal, $column AS value, '$column' AS waktu");
    $this->db->where("status", 1);
    $this->db->where("gardu_induk", $nama);
    $this->db->where("MONTH(tanggal) = MONTH(NOW())");
    $this->db->where("YEAR(tanggal) = YEAR(NOW())");
    $this->db->order_by($column, "ASC");
    $this->db->order_by("main.tanggal", "DESC");
    $this->db->limit(1);

    $query = $this->db->get($this->_get_table_name());
    $result = $query->result();

    return $result ? $result[0] : null;
  }
}