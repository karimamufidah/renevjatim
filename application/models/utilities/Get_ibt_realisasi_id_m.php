<?php
class Get_ibt_realisasi_id_m extends CI_Model
{
  private function _get_table_name()
  {
    return "ibt_realisasi AS main";
  }

  public function show($filters)
  {
    $this->db->select("data_id AS id");
    $this->db->where("tanggal", $filters->tanggal);
    $this->db->where("ibt", $filters->nama);
    $this->db->where("satuan", $filters->satuan);

    $query = $this->db->get($this->_get_table_name());
    $result = $query->result();

    return $result ? $result[0]->id : null;
  }
}
