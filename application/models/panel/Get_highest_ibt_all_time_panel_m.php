<?php
class Get_highest_ibt_all_time_panel_m extends CI_Model
{
  private function _get_table_name()
  {
    return "ibt_realisasi AS main";
  }

  public function show($column)
  {
    $this->db->select("main.tanggal, $column AS value, '$column' AS waktu");
    $this->db->where("satuan", "MW");
    $this->db->order_by($column, "DESC");
    $this->db->limit(1);

    $query = $this->db->get($this->_get_table_name());
    $result = $query->result();

    return $result ? $result[0] : null;
  }
}
