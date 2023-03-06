<?php
class Get_sistem_perencanaan_m extends CI_Model
{
  private function _get_table_name()
  {
    return "sistem_perencanaan AS main";
  }

  public function show($filters)
  {
    $this->db->select("
      COALESCE(MAX(ren_0030), 0) AS ren_0030, COALESCE(MAX(ren_0100), 0) AS ren_0100, COALESCE(MAX(ren_0130), 0) AS ren_0130, COALESCE(MAX(ren_0200), 0) AS ren_0200,
      COALESCE(MAX(ren_0230), 0) AS ren_0230, COALESCE(MAX(ren_0300), 0) AS ren_0300, COALESCE(MAX(ren_0330), 0) AS ren_0330, COALESCE(MAX(ren_0400), 0) AS ren_0400,
      COALESCE(MAX(ren_0430), 0) AS ren_0430, COALESCE(MAX(ren_0500), 0) AS ren_0500, COALESCE(MAX(ren_0530), 0) AS ren_0530, COALESCE(MAX(ren_0600), 0) AS ren_0600,
      COALESCE(MAX(ren_0630), 0) AS ren_0630, COALESCE(MAX(ren_0700), 0) AS ren_0700, COALESCE(MAX(ren_0730), 0) AS ren_0730, COALESCE(MAX(ren_0800), 0) AS ren_0800,
      COALESCE(MAX(ren_0830), 0) AS ren_0830, COALESCE(MAX(ren_0900), 0) AS ren_0900, COALESCE(MAX(ren_0930), 0) AS ren_0930, COALESCE(MAX(ren_1000), 0) AS ren_1000,
      COALESCE(MAX(ren_1030), 0) AS ren_1030, COALESCE(MAX(ren_1100), 0) AS ren_1100, COALESCE(MAX(ren_1130), 0) AS ren_1130, COALESCE(MAX(ren_1200), 0) AS ren_1200,
      COALESCE(MAX(ren_1230), 0) AS ren_1230, COALESCE(MAX(ren_1300), 0) AS ren_1300, COALESCE(MAX(ren_1330), 0) AS ren_1330, COALESCE(MAX(ren_1400), 0) AS ren_1400,
      COALESCE(MAX(ren_1430), 0) AS ren_1430, COALESCE(MAX(ren_1500), 0) AS ren_1500, COALESCE(MAX(ren_1530), 0) AS ren_1530, COALESCE(MAX(ren_1600), 0) AS ren_1600,
      COALESCE(MAX(ren_1630), 0) AS ren_1630, COALESCE(MAX(ren_1700), 0) AS ren_1700, COALESCE(MAX(ren_1730), 0) AS ren_1730, COALESCE(MAX(ren_1800), 0) AS ren_1800,
      COALESCE(MAX(ren_1830), 0) AS ren_1830, COALESCE(MAX(ren_1900), 0) AS ren_1900, COALESCE(MAX(ren_1930), 0) AS ren_1930, COALESCE(MAX(ren_2000), 0) AS ren_2000,
      COALESCE(MAX(ren_2030), 0) AS ren_2030, COALESCE(MAX(ren_2100), 0) AS ren_2100, COALESCE(MAX(ren_2130), 0) AS ren_2130, COALESCE(MAX(ren_2200), 0) AS ren_2200,
      COALESCE(MAX(ren_2230), 0) AS ren_2230, COALESCE(MAX(ren_2300), 0) AS ren_2300, COALESCE(MAX(ren_2330), 0) AS ren_2330, COALESCE(MAX(ren_2400), 0) AS ren_2400
    ");
    
    $this->db->where("sistem", $filters->sistem);
    $this->db->where("YEAR(tanggal)", $filters->year);
    $this->db->where("MONTH(tanggal)", $filters->month);

    $query = $this->db->get($this->_get_table_name());
    $result = $query->result();

    return $result ? $result[0] : null;
  }
}
