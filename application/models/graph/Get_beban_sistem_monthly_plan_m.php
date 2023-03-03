<?php
class Get_beban_sistem_monthly_plan_m extends CI_Model
{
  private function _get_table_name()
  {
    return "sistem_perencanaan AS main";
  }

  public function show($filters)
  {
    $this->db->select("
      COALESCE(SUM(ren_0030), 0) AS ren_0030, COALESCE(SUM(ren_0100), 0) AS ren_0100, COALESCE(SUM(ren_0130), 0) AS ren_0130, COALESCE(SUM(ren_0200), 0) AS ren_0200,
      COALESCE(SUM(ren_0230), 0) AS ren_0230, COALESCE(SUM(ren_0300), 0) AS ren_0300, COALESCE(SUM(ren_0330), 0) AS ren_0330, COALESCE(SUM(ren_0400), 0) AS ren_0400,
      COALESCE(SUM(ren_0430), 0) AS ren_0430, COALESCE(SUM(ren_0500), 0) AS ren_0500, COALESCE(SUM(ren_0530), 0) AS ren_0530, COALESCE(SUM(ren_0600), 0) AS ren_0600,
      COALESCE(SUM(ren_0630), 0) AS ren_0630, COALESCE(SUM(ren_0700), 0) AS ren_0700, COALESCE(SUM(ren_0730), 0) AS ren_0730, COALESCE(SUM(ren_0800), 0) AS ren_0800,
      COALESCE(SUM(ren_0830), 0) AS ren_0830, COALESCE(SUM(ren_0900), 0) AS ren_0900, COALESCE(SUM(ren_0930), 0) AS ren_0930, COALESCE(SUM(ren_1000), 0) AS ren_1000,
      COALESCE(SUM(ren_1030), 0) AS ren_1030, COALESCE(SUM(ren_1100), 0) AS ren_1100, COALESCE(SUM(ren_1130), 0) AS ren_1130, COALESCE(SUM(ren_1200), 0) AS ren_1200,
      COALESCE(SUM(ren_1230), 0) AS ren_1230, COALESCE(SUM(ren_1300), 0) AS ren_1300, COALESCE(SUM(ren_1330), 0) AS ren_1330, COALESCE(SUM(ren_1400), 0) AS ren_1400,
      COALESCE(SUM(ren_1430), 0) AS ren_1430, COALESCE(SUM(ren_1500), 0) AS ren_1500, COALESCE(SUM(ren_1530), 0) AS ren_1530, COALESCE(SUM(ren_1600), 0) AS ren_1600,
      COALESCE(SUM(ren_1630), 0) AS ren_1630, COALESCE(SUM(ren_1700), 0) AS ren_1700, COALESCE(SUM(ren_1730), 0) AS ren_1730, COALESCE(SUM(ren_1800), 0) AS ren_1800,
      COALESCE(SUM(ren_1830), 0) AS ren_1830, COALESCE(SUM(ren_1900), 0) AS ren_1900, COALESCE(SUM(ren_1930), 0) AS ren_1930, COALESCE(SUM(ren_2000), 0) AS ren_2000,
      COALESCE(SUM(ren_2030), 0) AS ren_2030, COALESCE(SUM(ren_2100), 0) AS ren_2100, COALESCE(SUM(ren_2130), 0) AS ren_2130, COALESCE(SUM(ren_2200), 0) AS ren_2200,
      COALESCE(SUM(ren_2230), 0) AS ren_2230, COALESCE(SUM(ren_2300), 0) AS ren_2300, COALESCE(SUM(ren_2330), 0) AS ren_2330, COALESCE(SUM(ren_2400), 0) AS ren_2400
    ");
    
    $this->db->where("sistem", $filters->sistem);
    $this->db->where("tanggal", $filters->tanggal);

    $query = $this->db->get($this->_get_table_name());
    $result = $query->result();

    return $result ? $result[0] : null;
  }
}
