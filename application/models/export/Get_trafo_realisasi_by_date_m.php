<?php
class Get_trafo_realisasi_by_date_m extends CI_Model
{
  private function _get_table_name()
  {
    return "trafo_realisasi AS main";
  }

  public function show($filters)
  {
    $this->db->where("trafo", $filters->trafo);
    $this->db->where("satuan", $filters->satuan);
    $this->db->where("tanggal", $filters->tanggal);

    $query = $this->db->get($this->_get_table_name());
    $result = $query->result();

    return $result ? $result[0] : null;
  }
}
