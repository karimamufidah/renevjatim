<?php
class Get_beban_tegangan_yearly_plan_m extends CI_Model
{
  private function _get_table_name()
  {
    return "tegangan_perencanaan AS main";
  }

  public function show($params)
  {
    if ($params->min_max == "Max") {
      $this->db->select("
        MAX(ren_0030), MAX(ren_0100), MAX(ren_0130), MAX(ren_0200), MAX(ren_0230), MAX(ren_0300), MAX(ren_0330), MAX(ren_0400),
        MAX(ren_0430), MAX(ren_0500), MAX(ren_0530), MAX(ren_0600), MAX(ren_0630), MAX(ren_0700), MAX(ren_0730), MAX(ren_0800),
        MAX(ren_0830), MAX(ren_0900), MAX(ren_0930), MAX(ren_1000), MAX(ren_1030), MAX(ren_1100), MAX(ren_1130), MAX(ren_1200),
        MAX(ren_1230), MAX(ren_1300), MAX(ren_1330), MAX(ren_1400), MAX(ren_1430), MAX(ren_1500), MAX(ren_1530), MAX(ren_1600),
        MAX(ren_1630), MAX(ren_1700), MAX(ren_1730), MAX(ren_1800), MAX(ren_1830), MAX(ren_1900), MAX(ren_1930), MAX(ren_2000),
        MAX(ren_2030), MAX(ren_2100), MAX(ren_2130), MAX(ren_2200), MAX(ren_2230), MAX(ren_2300), MAX(ren_2330), MAX(ren_2400)
      ");
    } else {
      $this->db->select("
        MIN(ren_0030), MIN(ren_0100), MIN(ren_0130), MIN(ren_0200), MIN(ren_0230), MIN(ren_0300), MIN(ren_0330), MIN(ren_0400),
        MIN(ren_0430), MIN(ren_0500), MIN(ren_0530), MIN(ren_0600), MIN(ren_0630), MIN(ren_0700), MIN(ren_0730), MIN(ren_0800),
        MIN(ren_0830), MIN(ren_0900), MIN(ren_0930), MIN(ren_1000), MIN(ren_1030), MIN(ren_1100), MIN(ren_1130), MIN(ren_1200),
        MIN(ren_1230), MIN(ren_1300), MIN(ren_1330), MIN(ren_1400), MIN(ren_1430), MIN(ren_1500), MIN(ren_1530), MIN(ren_1600),
        MIN(ren_1630), MIN(ren_1700), MIN(ren_1730), MIN(ren_1800), MIN(ren_1830), MIN(ren_1900), MIN(ren_1930), MIN(ren_2000),
        MIN(ren_2030), MIN(ren_2100), MIN(ren_2130), MIN(ren_2200), MIN(ren_2230), MIN(ren_2300), MIN(ren_2330), MIN(ren_2400)
      ");
    }

    $this->db->where("status", 1);
    $this->db->where('main.gardu_induk', $params->gardu_induk);
    $this->db->where('MONTH(main.tanggal)', $params->bulan);
    $this->db->where('YEAR(main.tanggal)', $params->tahun);

    $query = $this->db->get($this->_get_table_name());
    $result = $query->result();

    return $result ? $result[0] : null;
  }
}
