<?php
class Delete_trafo_realisasi_by_date_m extends CI_Model
{
  public function show($filters)
  {
    $this->db->where("tanggal", $filters->tanggal);
    $this->db->delete("trafo_realisasi");

    $this->db->where("DATE(logged_at)", $filters->tanggal);
    return $this->db->delete("trafo_realisasi_table");
  }
}
