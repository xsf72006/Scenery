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
        if ($this->input->post('set_admin') == 1)
        {
            $privilege = 1;
        }
        else
        {
            $privilege = 0;
        }
        $data = array(
            'username' => $this->input->post('username'),
            'passwd' => sha1($this->input->post('password')),
            'privilege' => $privilege
        );

        if ($this->db->insert('user', $data))
            return TRUE;
        else
            return FALSE;
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

    public function get_admin_user_list()
    {
        $this->db->where_in('privilege', array(1));
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function get_user_list()
    {
        $this->db->where_in('privilege', array(0));
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function get_username_by_id()
    {
        $query = $this->db->get_where('user', array('id' => $this->input->post('id')));
        return $query->result_array();
    }

    public function user_verified()
    {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('passwd', sha1($this->input->post('password')));
        $this->db->from('user');
        if ($this->db->count_all_results() === 1)
            return TRUE;
        else
            return FALSE;
    }

    public function is_admin()
    {
        $query = $this->db->query("SELECT * FROM user WHERE username = '".$this->input->post('username')."' AND passwd = SHA1('".$this->input->post('password')."')");
        $row = $query->row();
        if ($row->privilege != 0)
            return TRUE;
        else
            return FALSE;
    }

    public function is_superadmin()
    {
        $query = $this->db->query("SELECT * FROM user WHERE username = '".$this->input->post('username')."' AND passwd = SHA1('".$this->input->post('password')."')");
        $row = $query->row();
        if ($row->privilege == 2)
            return TRUE;
        else
            return FALSE;
    }
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */