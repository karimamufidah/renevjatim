<?php
class Sistem_realisasi_m extends CI_Model
{
  public $tanggal;
  public $sistem;
  public $status;
  public $created_date;
  public $created_by;
  public $updated_date;
  public $updated_by;
  public $eval_0030;
  public $eval_0100;
  public $eval_0130;
  public $eval_0200;
  public $eval_0230;
  public $eval_0300;
  public $eval_0330;
  public $eval_0400;
  public $eval_0430;
  public $eval_0500;
  public $eval_0530;
  public $eval_0600;
  public $eval_0630;
  public $eval_0700;
  public $eval_0730;
  public $eval_0800;
  public $eval_0830;
  public $eval_0900;
  public $eval_0930;
  public $eval_1000;
  public $eval_1030;
  public $eval_1100;
  public $eval_1130;
  public $eval_1200;
  public $eval_1230;
  public $eval_1300;
  public $eval_1330;
  public $eval_1400;
  public $eval_1430;
  public $eval_1500;
  public $eval_1530;
  public $eval_1600;
  public $eval_1630;
  public $eval_1700;
  public $eval_1730;
  public $eval_1800;
  public $eval_1830;
  public $eval_1900;
  public $eval_1930;
  public $eval_2000;
  public $eval_2030;
  public $eval_2100;
  public $eval_2130;
  public $eval_2200;
  public $eval_2230;
  public $eval_2300;
  public $eval_2330;
  public $eval_2400;

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
    return "sistem_realisasi";
  }
}
