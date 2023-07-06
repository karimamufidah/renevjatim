<?php
class Delete_tegangan_realisasi_by_date_m extends CI_Model
{
  public function delete($filters)
  {
    $this->db->where("tanggal", $filters->tanggal);
    $this->db->delete("tegangan_realisasi");

    $this->db->where("DATE(logged_at)", $filters->tanggal);
    return $this->db->delete("tegangan_realisasi_table");
  }
}
