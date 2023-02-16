<?php
class Get_daily_plan_m extends CI_Model
{
    private function _get_table_name()
    {
        return "penghantar_perencanaan AS main";
    }

    public function show($params)
    {
        $this->db->select("
      SUM(ren_0030) AS ren_0030, SUM(ren_0100) AS ren_0100, SUM(ren_0130) AS ren_0130, SUM(ren_0200) AS ren_0200,
      SUM(ren_0230) AS ren_0230, SUM(ren_0300) AS ren_0300, SUM(ren_0330) AS ren_0330, SUM(ren_0400) AS ren_0400,
      SUM(ren_0430) AS ren_0430, SUM(ren_0500) AS ren_0500, SUM(ren_0530) AS ren_0530, SUM(ren_0600) AS ren_0600,
      SUM(ren_0630) AS ren_0630, SUM(ren_0700) AS ren_0700, SUM(ren_0730) AS ren_0730, SUM(ren_0800) AS ren_0800,
      SUM(ren_0830) AS ren_0830, SUM(ren_0900) AS ren_0900, SUM(ren_0930) AS ren_0930, SUM(ren_1000) AS ren_1000,
      SUM(ren_1030) AS ren_1030, SUM(ren_1100) AS ren_1100, SUM(ren_1130) AS ren_1130, SUM(ren_1200) AS ren_1200,
      SUM(ren_1230) AS ren_1230, SUM(ren_1300) AS ren_1300, SUM(ren_1330) AS ren_1330, SUM(ren_1400) AS ren_1400,
      SUM(ren_1430) AS ren_1430, SUM(ren_1500) AS ren_1500, SUM(ren_1530) AS ren_1530, SUM(ren_1600) AS ren_1600,
      SUM(ren_1630) AS ren_1630, SUM(ren_1700) AS ren_1700, SUM(ren_1730) AS ren_1730, SUM(ren_1800) AS ren_1800,
      SUM(ren_1830) AS ren_1830, SUM(ren_1900) AS ren_1900, SUM(ren_1930) AS ren_1930, SUM(ren_2000) AS ren_2000,
      SUM(ren_2030) AS ren_2030, SUM(ren_2100) AS ren_2100, SUM(ren_2130) AS ren_2130, SUM(ren_2200) AS ren_2200,
      SUM(ren_2230) AS ren_2230, SUM(ren_2300) AS ren_2300, SUM(ren_2330) AS ren_2330, SUM(ren_2400) AS ren_2400
    ");

        $this->db->where('main.ruas', $params->ruas);
        $this->db->where('main.satuan', $params->satuan);
        $this->db->where('main.tanggal', $params->tanggal);

        $query = $this->db->get($this->_get_table_name());
        $result = $query->result();

        return $result ? $result[0] : null;
    }
}
