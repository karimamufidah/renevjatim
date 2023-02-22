<?php
class Get_beban_penghantar_yearly_realization_m extends CI_Model
{
  private function _get_table_name()
  {
    return "penghantar_realisasi AS main";
  }

  public function show($params)
  {
    $this->db->select("
      COALESCE(SUM(eval_0030 + eval_0100 + eval_0130 + eval_0200 + eval_0230 + eval_0300 + eval_0330 + eval_0400 +
      eval_0430 + eval_0500 + eval_0530 + eval_0600 + eval_0630 + eval_0700 + eval_0730 + eval_0800 +
      eval_0830 + eval_0900 + eval_0930 + eval_1000 + eval_1030 + eval_1100 + eval_1130 + eval_1200 +
      eval_1230 + eval_1300 + eval_1330 + eval_1400 + eval_1430 + eval_1500 + eval_1530 + eval_1600 +
      eval_1630 + eval_1700 + eval_1730 + eval_1800 + eval_1830 + eval_1900 + eval_1930 + eval_2000 +
      eval_2030 + eval_2100 + eval_2130 + eval_2200 + eval_2230 + eval_2300 + eval_2330 + eval_2400), 0) AS total
    ");

    $this->db->where('main.ruas', $params->ruas);
    $this->db->where('main.satuan', $params->satuan);
    $this->db->where('MONTH(main.tanggal)', $params->bulan);
    $this->db->where('YEAR(main.tanggal)', $params->tahun);

    $query = $this->db->get($this->_get_table_name());
    $result = $query->result();

    return $result ? $result[0]->total : null;
  }
}
