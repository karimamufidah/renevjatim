<?php
class Get_highest_penghantar_this_year_panel_m extends CI_Model
{
  private function _get_table_name()
  {
    return "penghantar_realisasi_table AS main";
  }

  public function show()
  {
    $this->db->select("main.logged_at, mw AS value");
    $this->db->where("YEAR(logged_at) = YEAR(NOW())");
    $this->db->order_by("mw", "DESC");
    $this->db->limit(1);

    $query = $this->db->get($this->_get_table_name());
    $result = $query->result();

    return $result ? $result[0] : null;
  }
}
