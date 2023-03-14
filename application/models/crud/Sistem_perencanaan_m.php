<?php
class Sistem_perencanaan_m extends CI_Model
{
  public $tanggal;
  public $sistem;
  public $status;
  public $created_date;
  public $created_by;
  public $updated_date;
  public $updated_by;
  public $ren_0030;
  public $ren_0100;
  public $ren_0130;
  public $ren_0200;
  public $ren_0230;
  public $ren_0300;
  public $ren_0330;
  public $ren_0400;
  public $ren_0430;
  public $ren_0500;
  public $ren_0530;
  public $ren_0600;
  public $ren_0630;
  public $ren_0700;
  public $ren_0730;
  public $ren_0800;
  public $ren_0830;
  public $ren_0900;
  public $ren_0930;
  public $ren_1000;
  public $ren_1030;
  public $ren_1100;
  public $ren_1130;
  public $ren_1200;
  public $ren_1230;
  public $ren_1300;
  public $ren_1330;
  public $ren_1400;
  public $ren_1430;
  public $ren_1500;
  public $ren_1530;
  public $ren_1600;
  public $ren_1630;
  public $ren_1700;
  public $ren_1730;
  public $ren_1800;
  public $ren_1830;
  public $ren_1900;
  public $ren_1930;
  public $ren_2000;
  public $ren_2030;
  public $ren_2100;
  public $ren_2130;
  public $ren_2200;
  public $ren_2230;
  public $ren_2300;
  public $ren_2330;
  public $ren_2400;

  public function store()
  {
    $to_return = new stdClass;

    if ($this->db->insert($this->_get_plain_table_name(), $this)) {
      $to_return->status = true;

      return $to_return;
    } else {
      $error = $this->db->error();
      $to_return->status = false;
      $to_return->message = $error['message'];

      return $to_return;
    }
  }

  public function show($id)
  {
    $this->db->where('main.data_id', $id);

    $query = $this->db->get($this->_get_table_name());
    $result = $query->result();

    return count($result) > 0 ? $result[0] : null;
  }

  public function patch($column, $value)
  {
    $this->db->set($column, $value);
    $this->db->set('updated_by', $this->updated_by);
    $this->db->set('updated_date', $this->updated_date);
    $this->db->where('data_id', $this->data_id);

    return $this->db->update($this->_get_plain_table_name());
  }

  public function delete()
  {
    $this->db->where('data_id', $this->data_id);

    return $this->db->delete($this->_get_plain_table_name());
  }

  /** Table Name */
  private function _get_table_name()
  {
    return $this->_get_plain_table_name() . " AS main";
  }

  private function _get_plain_table_name()
  {
    return "sistem_perencanaan";
  }
}
