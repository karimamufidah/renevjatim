<?php
class Get_daily_realization_m extends CI_Model
{
    private function _get_table_name()
    {
        return "penghantar_realisasi AS main";
    }

    public function show($params)
    {
        $this->db->select("
      SUM(eval_0030) AS eval_0030, SUM(eval_0100) AS eval_0100, SUM(eval_0130) AS eval_0130, SUM(eval_0200) AS eval_0200,
      SUM(eval_0230) AS eval_0230, SUM(eval_0300) AS eval_0300, SUM(eval_0330) AS eval_0330, SUM(eval_0400) AS eval_0400,
      SUM(eval_0430) AS eval_0430, SUM(eval_0500) AS eval_0500, SUM(eval_0530) AS eval_0530, SUM(eval_0600) AS eval_0600,
      SUM(eval_0630) AS eval_0630, SUM(eval_0700) AS eval_0700, SUM(eval_0730) AS eval_0730, SUM(eval_0800) AS eval_0800,
      SUM(eval_0830) AS eval_0830, SUM(eval_0900) AS eval_0900, SUM(eval_0930) AS eval_0930, SUM(eval_1000) AS eval_1000,
      SUM(eval_1030) AS eval_1030, SUM(eval_1100) AS eval_1100, SUM(eval_1130) AS eval_1130, SUM(eval_1200) AS eval_1200,
      SUM(eval_1230) AS eval_1230, SUM(eval_1300) AS eval_1300, SUM(eval_1330) AS eval_1330, SUM(eval_1400) AS eval_1400,
      SUM(eval_1430) AS eval_1430, SUM(eval_1500) AS eval_1500, SUM(eval_1530) AS eval_1530, SUM(eval_1600) AS eval_1600,
      SUM(eval_1630) AS eval_1630, SUM(eval_1700) AS eval_1700, SUM(eval_1730) AS eval_1730, SUM(eval_1800) AS eval_1800,
      SUM(eval_1830) AS eval_1830, SUM(eval_1900) AS eval_1900, SUM(eval_1930) AS eval_1930, SUM(eval_2000) AS eval_2000,
      SUM(eval_2030) AS eval_2030, SUM(eval_2100) AS eval_2100, SUM(eval_2130) AS eval_2130, SUM(eval_2200) AS eval_2200,
      SUM(eval_2230) AS eval_2230, SUM(eval_2300) AS eval_2300, SUM(eval_2330) AS eval_2330, SUM(eval_2400) AS eval_2400
    ");

        $this->db->where('main.ruas', $params->ruas);
        $this->db->where('main.satuan', $params->satuan);
        $this->db->where('main.tanggal', $params->tanggal);

        $query = $this->db->get($this->_get_table_name());
        $result = $query->result();

        return $result ? $result[0] : null;
    }
}
