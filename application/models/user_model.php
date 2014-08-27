<?php
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-8-24
 * Time: 下午3:54
 */

class User_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function set_user()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'passwd' => sha1($this->input->post('passwd')),
            'privilege' => 0
        );

        return $this->db->insert('user', $data);
    }

    public function set_user_privilege()
    {
        $data = array(
            'privilege' => $this->input->post('privilege')
        );
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('user', $data);
    }

    public function delete_user()
    {
        return $this->db->delete('user', array('id' => $this->input->post('id')));
    }

    public function get_user_list()
    {
        return $this->db->get('user');
    }

    public function get_username_by_id()
    {
        return $this->db->get_where('user', array('id' => $this->input->post('id')));
    }

    public function user_verified()
    {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('passwd', $this->input->post('passwd'));
        $this->db->from('user');
        if ($this->db->count_all_results() === 1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function is_admin()
    {
        $this->db->select('privilege');
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('passwd', $this->input->post('passwd'));
        $query = $this->db->get('user');
        $row = $query->result();
        if ($row['privilege'] != 0)
            return TRUE;
        else
            return FALSE;
    }

    public function is_superadmin()
    {
        $this->db->select('privilege');
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('passwd', $this->input->post('passwd'));
        $query = $this->db->get('user');
        $row = $query->result();
        if ($row['privilege'] == 2)
            return TRUE;
        else
            return FALSE;
    }
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */