<?php
class Get_beban_tegangan_monthly_realization_m extends CI_Model
{
  private function _get_table_name()
  {
    return "tegangan_realisasi AS main";
  }

  public function show($filters)
  {
    $this->db->select("
      COALESCE(eval_0030, 0) AS eval_0030, COALESCE(eval_0100, 0) AS eval_0100, COALESCE(eval_0130, 0) AS eval_0130, COALESCE(eval_0200, 0) AS eval_0200,
      COALESCE(eval_0230, 0) AS eval_0230, COALESCE(eval_0300, 0) AS eval_0300, COALESCE(eval_0330, 0) AS eval_0330, COALESCE(eval_0400, 0) AS eval_0400,
      COALESCE(eval_0430, 0) AS eval_0430, COALESCE(eval_0500, 0) AS eval_0500, COALESCE(eval_0530, 0) AS eval_0530, COALESCE(eval_0600, 0) AS eval_0600,
      COALESCE(eval_0630, 0) AS eval_0630, COALESCE(eval_0700, 0) AS eval_0700, COALESCE(eval_0730, 0) AS eval_0730, COALESCE(eval_0800, 0) AS eval_0800,
      COALESCE(eval_0830, 0) AS eval_0830, COALESCE(eval_0900, 0) AS eval_0900, COALESCE(eval_0930, 0) AS eval_0930, COALESCE(eval_1000, 0) AS eval_1000,
      COALESCE(eval_1030, 0) AS eval_1030, COALESCE(eval_1100, 0) AS eval_1100, COALESCE(eval_1130, 0) AS eval_1130, COALESCE(eval_1200, 0) AS eval_1200,
      COALESCE(eval_1230, 0) AS eval_1230, COALESCE(eval_1300, 0) AS eval_1300, COALESCE(eval_1330, 0) AS eval_1330, COALESCE(eval_1400, 0) AS eval_1400,
      COALESCE(eval_1430, 0) AS eval_1430, COALESCE(eval_1500, 0) AS eval_1500, COALESCE(eval_1530, 0) AS eval_1530, COALESCE(eval_1600, 0) AS eval_1600,
      COALESCE(eval_1630, 0) AS eval_1630, COALESCE(eval_1700, 0) AS eval_1700, COALESCE(eval_1730, 0) AS eval_1730, COALESCE(eval_1800, 0) AS eval_1800,
      COALESCE(eval_1830, 0) AS eval_1830, COALESCE(eval_1900, 0) AS eval_1900, COALESCE(eval_1930, 0) AS eval_1930, COALESCE(eval_2000, 0) AS eval_2000,
      COALESCE(eval_2030, 0) AS eval_2030, COALESCE(eval_2100, 0) AS eval_2100, COALESCE(eval_2130, 0) AS eval_2130, COALESCE(eval_2200, 0) AS eval_2200,
      COALESCE(eval_2230, 0) AS eval_2230, COALESCE(eval_2300, 0) AS eval_2300, COALESCE(eval_2330, 0) AS eval_2330, COALESCE(eval_2400, 0) AS eval_2400
    ");

    $this->db->where("gardu_induk", $filters->gardu_induk);
    $this->db->where("tanggal", $filters->tanggal);

    $query = $this->db->get($this->_get_table_name());
    $result = $query->result();

    return $result ? $result[0] : null;
  }
}
