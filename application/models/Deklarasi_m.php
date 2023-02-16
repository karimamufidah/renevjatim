<?php

class Deklarasi_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('deklarasi_tmp');
        $this->db->order_by('uploaded_date', 'desc');
        if ($id != null) {
            $this->db->where('file_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function upload($post)
    {
        $params['file_name'] = $post['file'];
        $params['file_size'] = $_FILES['file']['size'] / 1048576;
        $params['uploaded_by'] = $post['username'];
        $this->db->set('uploaded_date', 'NOW()', false);
        $this->db->insert('deklarasi_tmp', $params);
    }

    public function delete($id)
    {
        $this->db->where('file_id', $id);
        $this->db->delete('deklarasi_tmp');
    }
}
