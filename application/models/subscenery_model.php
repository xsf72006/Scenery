<?php
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-8-24
 * Time: 下午4:35
 */

class Subscenery_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function set_subscenery()
    {
        $data = array(
            'fid' => $this->input->post('fid'),
            'img' => $this->input->post('img'),
            'summary' => $this->input->post('summary')
        );

        return $this->db->insert('subscenery', $data);
    }

    public function delete_subscenery()
    {
        return $this->db->delete('subscenery', array('id' => $this->input->post('id')));
    }

    public function get_subscenery_list()
    {
        return $this->db->get('subscenery');
    }
}

/* End of file subscenery_model.php */
/* Location: ./application/models/subscenery_model.php */