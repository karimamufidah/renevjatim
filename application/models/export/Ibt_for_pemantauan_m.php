<?php
class Ibt_for_pemantauan_m extends CI_Model
{
  private function _get_table_name()
  {
    return "ibt_realisasi_table AS main";
  }

  public function index($filters)
  {
    $this->db->where("nama", $filters->nama);
    $this->db->where('DATE(main.logged_at) >=', $filters->tanggal_awal);
    $this->db->where('DATE(main.logged_at) <=', $filters->tanggal_akhir);
    $this->db->order_by("main.logged_at", "DESC");

    $query = $this->db->get($this->_get_table_name());

    return $query->result();
  }
}
