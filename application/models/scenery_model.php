<?php
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-8-24
 * Time: 下午3:55
 */

class Scenery_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function set_scenery()
    {
        $data = array(
            'sname' => $this->input->post('sname'),
            'summary' => $this->input->post('summary'),
            'img' => $this->input->post('img'),
            'category' => $this->input->post('category'),
            'area' => $this->input->post('area'),
            'traffic' => $this->input->post('traffic'),
            'position' => $this->input->post('position'),
            'bus' => $this->input->post('bus') //TODO bus检测bug
        );

        return $this->db->insert('scenery', $data);
    }

    public function delete_scenery()
    {
        return $this->db->delete('scenery', array('id' => $this->input->post('id')));
    }

    public function get_scenery_list()
    {
        $query = $this->db->get('scenery');
        return $query->result_array();
    }

    public function get_scenery_by_id()
    {
        $query = $this->db->get_where('scenery', array('id' => $this->input->post('id')));
        return $query->result_array();
    }
}

/* End of file scenery_model.php */
/* Location: ./application/models/scenery_model.php */