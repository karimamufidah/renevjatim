<?php
class Beban_tegangan_m extends CI_Model
{
  private function _get_table_name()
  {
    return "(SELECT DISTINCT(gardu_induk) AS name FROM tegangan_perencanaan) AS main";
  }

  public function index($params, $filters)
  {
    $this->_select_query();
    $this->_where_query($filters);
    $this->_search_query($params->search);
    $this->_order_query();

    $this->db->limit($params->limit, $params->offset);

    $query = $this->db->get($this->_get_table_name());

    return $query->result();
  }

  public function count($q, $filters)
  {
    $this->_where_query($filters);
    $this->_search_query($q);

    return $this->db->count_all_results($this->_get_table_name());
  }

  public function default_option($filters)
  {
    $this->_select_query();
    $this->_where_query($filters);
    $this->_order_query();

    $this->db->limit(1);

    $query = $this->db->get($this->_get_table_name());
    $result = $query->result();

    return count($result) ? $result[0] : (object) array('id' => 0, 'text' => '-');
  }

  private function _select_query()
  {
    $this->db->select("main.name AS text, main.name AS id");
  }

  private function _where_query($filters)
  {
  }

  private function _search_query($q)
  {
    if ($q) {
      $this->db->group_start();
      $this->db->where('main.name LIKE', '%' . $q . '%');
      $this->db->group_end();
    }
  }

  private function _order_query()
  {
    $this->db->order_by('main.name', 'ASC');
  }
}
