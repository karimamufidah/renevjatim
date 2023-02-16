<?php

class Defense_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('defense_scheme');
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
        $this->db->insert('defense_scheme', $params);
    }

    public function delete($id)
    {
        $this->db->where('file_id', $id);
        $this->db->delete('defense_scheme');
    }
}
