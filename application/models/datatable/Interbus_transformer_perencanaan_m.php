<?php
class Interbus_transformer_perencanaan_m extends CI_Model
{
  public function index($offset, $limit, $q, $order_column, $order_direction, $filters)
  {
    $this->db->select();

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
    if ($filters->satuan) $this->db->where('main.satuan', $filters->satuan);
  }

  private function _search_query($q)
  {
    if ($q) {
      $this->db->group_start();
      $this->db->where('main.ibt LIKE', '%' . $q . '%');
      $this->db->or_where('main.satuan LIKE', '%' . $q . '%');
      $this->db->group_end();
    }
  }

  private function _get_table_name()
  {
    return "ibt_perencanaan AS main";
  }
}
