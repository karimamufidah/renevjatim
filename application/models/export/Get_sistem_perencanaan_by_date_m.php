<?php
class Get_sistem_perencanaan_by_date_m extends CI_Model
{
  private function _get_table_name()
  {
    return "sistem_perencanaan AS main";
  }

  public function show($filters)
  {
    $this->db->where("sistem", $filters->sistem);
    $this->db->where("tanggal", $filters->tanggal);

    $query = $this->db->get($this->_get_table_name());
    $result = $query->result();

    return $result ? $result[0] : null;
  }
}
