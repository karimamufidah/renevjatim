<?php
class Get_beban_pembangkit_yearly_plan_m extends CI_Model
{
  private function _get_table_name()
  {
    return "pembangkit_perencanaan AS main";
  }

  public function show($params)
  {
    $this->db->select("
      COALESCE(SUM(ren_0030 + ren_0100 + ren_0130 + ren_0200 + ren_0230 + ren_0300 + ren_0330 + ren_0400 +
      ren_0430 + ren_0500 + ren_0530 + ren_0600 + ren_0630 + ren_0700 + ren_0730 + ren_0800 +
      ren_0830 + ren_0900 + ren_0930 + ren_1000 + ren_1030 + ren_1100 + ren_1130 + ren_1200 +
      ren_1230 + ren_1300 + ren_1330 + ren_1400 + ren_1430 + ren_1500 + ren_1530 + ren_1600 +
      ren_1630 + ren_1700 + ren_1730 + ren_1800 + ren_1830 + ren_1900 + ren_1930 + ren_2000 +
      ren_2030 + ren_2100 + ren_2130 + ren_2200 + ren_2230 + ren_2300 + ren_2330 + ren_2400), 0) AS total
    ");

    $this->db->where('main.pembangkit', $params->pembangkit);
    $this->db->where('main.satuan', $params->satuan);
    $this->db->where('MONTH(main.tanggal)', $params->bulan);
    $this->db->where('YEAR(main.tanggal)', $params->tahun);

    $query = $this->db->get($this->_get_table_name());
    $result = $query->result();

    return $result ? $result[0]->total : null;
  }
}
