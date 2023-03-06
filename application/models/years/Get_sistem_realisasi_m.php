<?php
class Get_sistem_realisasi_m extends CI_Model
{
  private function _get_table_name()
  {
    return "sistem_realisasi AS main";
  }

  public function show($filters)
  {
    $this->db->select("
      COALESCE(MAX(eval_0030), 0) AS eval_0030, COALESCE(MAX(eval_0100), 0) AS eval_0100, COALESCE(MAX(eval_0130), 0) AS eval_0130, COALESCE(MAX(eval_0200), 0) AS eval_0200,
      COALESCE(MAX(eval_0230), 0) AS eval_0230, COALESCE(MAX(eval_0300), 0) AS eval_0300, COALESCE(MAX(eval_0330), 0) AS eval_0330, COALESCE(MAX(eval_0400), 0) AS eval_0400,
      COALESCE(MAX(eval_0430), 0) AS eval_0430, COALESCE(MAX(eval_0500), 0) AS eval_0500, COALESCE(MAX(eval_0530), 0) AS eval_0530, COALESCE(MAX(eval_0600), 0) AS eval_0600,
      COALESCE(MAX(eval_0630), 0) AS eval_0630, COALESCE(MAX(eval_0700), 0) AS eval_0700, COALESCE(MAX(eval_0730), 0) AS eval_0730, COALESCE(MAX(eval_0800), 0) AS eval_0800,
      COALESCE(MAX(eval_0830), 0) AS eval_0830, COALESCE(MAX(eval_0900), 0) AS eval_0900, COALESCE(MAX(eval_0930), 0) AS eval_0930, COALESCE(MAX(eval_1000), 0) AS eval_1000,
      COALESCE(MAX(eval_1030), 0) AS eval_1030, COALESCE(MAX(eval_1100), 0) AS eval_1100, COALESCE(MAX(eval_1130), 0) AS eval_1130, COALESCE(MAX(eval_1200), 0) AS eval_1200,
      COALESCE(MAX(eval_1230), 0) AS eval_1230, COALESCE(MAX(eval_1300), 0) AS eval_1300, COALESCE(MAX(eval_1330), 0) AS eval_1330, COALESCE(MAX(eval_1400), 0) AS eval_1400,
      COALESCE(MAX(eval_1430), 0) AS eval_1430, COALESCE(MAX(eval_1500), 0) AS eval_1500, COALESCE(MAX(eval_1530), 0) AS eval_1530, COALESCE(MAX(eval_1600), 0) AS eval_1600,
      COALESCE(MAX(eval_1630), 0) AS eval_1630, COALESCE(MAX(eval_1700), 0) AS eval_1700, COALESCE(MAX(eval_1730), 0) AS eval_1730, COALESCE(MAX(eval_1800), 0) AS eval_1800,
      COALESCE(MAX(eval_1830), 0) AS eval_1830, COALESCE(MAX(eval_1900), 0) AS eval_1900, COALESCE(MAX(eval_1930), 0) AS eval_1930, COALESCE(MAX(eval_2000), 0) AS eval_2000,
      COALESCE(MAX(eval_2030), 0) AS eval_2030, COALESCE(MAX(eval_2100), 0) AS eval_2100, COALESCE(MAX(eval_2130), 0) AS eval_2130, COALESCE(MAX(eval_2200), 0) AS eval_2200,
      COALESCE(MAX(eval_2230), 0) AS eval_2230, COALESCE(MAX(eval_2300), 0) AS eval_2300, COALESCE(MAX(eval_2330), 0) AS eval_2330, COALESCE(MAX(eval_2400), 0) AS eval_2400
    ");

    $this->db->where("sistem", $filters->sistem);
    $this->db->where("YEAR(tanggal)", $filters->year);
    $this->db->where("MONTH(tanggal)", $filters->month);

    $query = $this->db->get($this->_get_table_name());
    $result = $query->result();

    return $result ? $result[0] : null;
  }
}
