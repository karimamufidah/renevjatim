<?php

class User_m extends CI_Model
{

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user');
        $this->db->order_by('created_date', 'desc');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['name'] = $post['name'];
        $params['username'] = $post['username'];
        $params['password'] = sha1($post['password']);
        $params['title'] = $post['title'] != "" ? $post['title'] : null;
        $params['role'] = $post['role'];
        $params['image'] = 'default.png';
        $this->db->set('created_date', 'NOW()', false);
        $this->db->insert('user', $params);
    }

    public function edit($post)
    {
        $params['name'] = $post['name'];
        $params['username'] = $post['username'];
        if (!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }
        $params['title'] = $post['title'] != "" ? $post['title'] : null;
        $params['role'] = $post['role'];
        if ($post['upload'] != null) {
            $params['image'] = $post['upload'];
        }
        $this->db->set('updated_date', 'NOW()', false);
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
    }

    public function del($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }
}
