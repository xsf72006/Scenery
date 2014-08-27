<?php
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-8-24
 * Time: 下午3:55
 */

class Category_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function set_category()
    {
        $data = array(
            'fid' => $this->input->post('fid'),
            'cname' => $this->input->post('cname')
        );

        return $this->db->insert('category', $data);
    }

    public function delete_category()
    {
        return $this->db->delete('category', array('id' => $this->input->post('id')));
    }

    public function get_category_list()
    {
        return $this->db->get('category');
    }

    public function get_category_by_id($cid)
    {
        return $this->db->get_where('category', array('id' => $this->input->post('id')));
    }
}

/* End of file category_model.php */
/* Location: ./application/models/category_model.php */