<?php
class Trafo_realisasi_table_m extends CI_Model
{
  /** Index */
  public function index($offset, $limit, $q, $order_column, $order_direction, $filters)
  {
    $this->db->select("main.logged_at, main.nama, COALESCE(main.mw, 0) AS mw, COALESCE(main.mx, 0) AS mx, COALESCE(main.percentage, 0) AS percentage");

    $this->_where_query($filters);

    $this->db->order_by($order_column, $order_direction);
    $this->db->limit($limit, $offset);

    $query = $this->db->get($this->_get_table_name());

    return $query->result();
  }

  /** Count */
  public function count($q, $filters)
  {
    $this->_where_query($filters);

    return $this->db->count_all_results($this->_get_table_name());
  }

  /** General */
  private function _where_query($filters)
  {
    $this->db->where('main.nama', $filters->nama);

    $this->db->where('DATE(main.logged_at) >=', $filters->tanggal_awal);
    $this->db->where('DATE(main.logged_at) <=', $filters->tanggal_akhir);

    $this->db->where('main.percentage >=', $filters->persentase_awal);
    $this->db->where('main.percentage <=', $filters->persentase_akhir);
  }

  private function _get_table_name()
  {
    return "trafo_realisasi_table AS main";
  }
}
