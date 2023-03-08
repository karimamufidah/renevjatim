<?php
class Generator_tegangan_table_m extends CI_Model
{
    public function generate_or_update($params)
    {
        if (!$this->_is_exist($params)) $this->_generate($params);

        $this->_regenerate($params);

        return true;
    }

    private function _is_exist($params)
    {
        $this->db->where('main.nama', $params->nama);
        $this->db->where('DATE(main.logged_at)', $params->tanggal);

        $query = $this->db->get($this->_get_table_name());
        $result = $query->result();

        return $result ? true : null;
    }

    private function _generate($params)
    {
        return $this->db->insert_batch($this->_get_pure_table_name(), $this->_generate_new_data($params), false);
    }

    private function _generate_new_data($params)
    {
        $data = array();

        for ($i = 0; $i <= 24; $i++) {
            $hour_string = $i < 10 ? "0$i" : $i;

            if ($i != 0) {
                $time_string = $i == 24 ? "23:59:00" : "$hour_string:00:00";

                array_push($data, array(
                    "logged_at" => "'$params->tanggal $time_string'", "nama" => "'$params->nama'",
                    "kv" => $this->_generate_kv_query($params, $hour_string . "00")
                ));
            } else if ($i != 24) array_push($data, array(
                "logged_at" => "'$params->tanggal $hour_string:30:00'", "nama" => "'$params->nama'",
                "kv" => $this->_generate_kv_query($params, $hour_string . "30")
            ));
        }

        return $data;
    }

    private function _regenerate($params)
    {
        for ($i = 0; $i <= 24; $i++) {
            $hour_string = $i < 10 ? "0$i" : $i;

            if ($i != 0) {
                $time_string = $i == 24 ? "23:59:00" : "$hour_string:00:00";

                $this->db->where("logged_at", "$params->tanggal $time_string");
                $this->db->where("nama", $params->nama);
                $this->db->set("kv", $this->_generate_kv_query($params, $hour_string . "00"), false);
                $this->db->update($this->_get_pure_table_name());
            } else if ($i != 24) {
                $this->db->where("logged_at", "$params->tanggal $hour_string:30:00");
                $this->db->where("nama", $params->nama);
                $this->db->set("kv", $this->_generate_kv_query($params, $hour_string . "30"), false);
                $this->db->update($this->_get_pure_table_name());
            }
        }
    }

    /** General */
    private function _generate_kv_query($params, $pukul)
    {
        return "COALESCE((SELECT eval_$pukul FROM tegangan_realisasi WHERE tanggal = '$params->tanggal' AND gardu_induk = '$params->nama'), 0)";
    }

    private function _get_table_name()
    {
        return $this->_get_pure_table_name() . " AS main";
    }

    private function _get_pure_table_name()
    {
        return "tegangan_realisasi_table";
    }
}
