<?php
class Delete_ibt_realisasi_by_date_m extends CI_Model
{
  public function show($filters)
  {
    $this->db->where("tanggal", $filters->tanggal);
    $this->db->delete("ibt_realisasi");

    $this->db->where("DATE(logged_at)", $filters->tanggal);
    return $this->db->delete("ibt_realisasi_table");
  }
}
