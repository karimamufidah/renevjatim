<?php
class Tegangan_realisasi_m extends CI_Model
{
  public function index($offset, $limit, $q, $order_column, $order_direction, $filters)
  {
    $this->_where_query($filters);
    $this->_search_query($q);

    $this->db->order_by($order_column, $order_direction);
    $this->db->limit($limit, $offset);

    $query = $this->db->get($this->_get_table_name());

    return $query->result();
  }

  public function count($q, $filters)
  {
    $this->_where_query($filters);
    $this->_search_query($q);

    return $this->db->count_all_results($this->_get_table_name());
  }

  private function _where_query($filters)
  {
    if ($filters->tanggal_awal) $this->db->where('DATE(main.tanggal) >=', $filters->tanggal_awal);
    if ($filters->tanggal_akhir) $this->db->where('DATE(main.tanggal) <=', $filters->tanggal_akhir);
  }

  private function _search_query($q)
  {
    if ($q) {
      $this->db->group_start();
      $this->db->where('main.gardu_induk LIKE', '%' . $q . '%');
      $this->db->or_where('main.busbar LIKE', '%' . $q . '%');
      $this->db->group_end();
    }
  }

  private function _get_table_name()
  {
    return "tegangan_realisasi AS main";
  }
}
