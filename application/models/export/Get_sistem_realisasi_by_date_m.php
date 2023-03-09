<?php
class Get_sistem_realisasi_by_date_m extends CI_Model
{
  private function _get_table_name()
  {
    return "sistem_realisasi AS main";
  }

  public function show($filters)
  {
    $this->db->select("
      COALESCE(SUM(eval_0030), 0) AS eval_0030, COALESCE(SUM(eval_0100), 0) AS eval_0100, COALESCE(SUM(eval_0130), 0) AS eval_0130, COALESCE(SUM(eval_0200), 0) AS eval_0200,
      COALESCE(SUM(eval_0230), 0) AS eval_0230, COALESCE(SUM(eval_0300), 0) AS eval_0300, COALESCE(SUM(eval_0330), 0) AS eval_0330, COALESCE(SUM(eval_0400), 0) AS eval_0400,
      COALESCE(SUM(eval_0430), 0) AS eval_0430, COALESCE(SUM(eval_0500), 0) AS eval_0500, COALESCE(SUM(eval_0530), 0) AS eval_0530, COALESCE(SUM(eval_0600), 0) AS eval_0600,
      COALESCE(SUM(eval_0630), 0) AS eval_0630, COALESCE(SUM(eval_0700), 0) AS eval_0700, COALESCE(SUM(eval_0730), 0) AS eval_0730, COALESCE(SUM(eval_0800), 0) AS eval_0800,
      COALESCE(SUM(eval_0830), 0) AS eval_0830, COALESCE(SUM(eval_0900), 0) AS eval_0900, COALESCE(SUM(eval_0930), 0) AS eval_0930, COALESCE(SUM(eval_1000), 0) AS eval_1000,
      COALESCE(SUM(eval_1030), 0) AS eval_1030, COALESCE(SUM(eval_1100), 0) AS eval_1100, COALESCE(SUM(eval_1130), 0) AS eval_1130, COALESCE(SUM(eval_1200), 0) AS eval_1200,
      COALESCE(SUM(eval_1230), 0) AS eval_1230, COALESCE(SUM(eval_1300), 0) AS eval_1300, COALESCE(SUM(eval_1330), 0) AS eval_1330, COALESCE(SUM(eval_1400), 0) AS eval_1400,
      COALESCE(SUM(eval_1430), 0) AS eval_1430, COALESCE(SUM(eval_1500), 0) AS eval_1500, COALESCE(SUM(eval_1530), 0) AS eval_1530, COALESCE(SUM(eval_1600), 0) AS eval_1600,
      COALESCE(SUM(eval_1630), 0) AS eval_1630, COALESCE(SUM(eval_1700), 0) AS eval_1700, COALESCE(SUM(eval_1730), 0) AS eval_1730, COALESCE(SUM(eval_1800), 0) AS eval_1800,
      COALESCE(SUM(eval_1830), 0) AS eval_1830, COALESCE(SUM(eval_1900), 0) AS eval_1900, COALESCE(SUM(eval_1930), 0) AS eval_1930, COALESCE(SUM(eval_2000), 0) AS eval_2000,
      COALESCE(SUM(eval_2030), 0) AS eval_2030, COALESCE(SUM(eval_2100), 0) AS eval_2100, COALESCE(SUM(eval_2130), 0) AS eval_2130, COALESCE(SUM(eval_2200), 0) AS eval_2200,
      COALESCE(SUM(eval_2230), 0) AS eval_2230, COALESCE(SUM(eval_2300), 0) AS eval_2300, COALESCE(SUM(eval_2330), 0) AS eval_2330, COALESCE(SUM(eval_2400), 0) AS eval_2400
    ");

    if (isset($filters->forMonthly)) $this->db->where("status", 1);
    $this->db->where("sistem", $filters->sistem);
    $this->db->where("tanggal", $filters->tanggal);

    $query = $this->db->get($this->_get_table_name());
    $result = $query->result();

    return $result ? $result[0] : null;
  }
}
