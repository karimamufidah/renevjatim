<?php
class Penghantar_perencanaan_mass_m extends CI_Model
{
  private function _get_table_name()
  {
    return "penghantar_perencanaan";
  }

  public function store($data)
  {
    return $this->db->insert_batch($this->_get_table_name(), $data);
  }

  public function update($data)
  {
    return $this->db->update_batch($this->_get_table_name(), $data, 'data_id');
  }
}
