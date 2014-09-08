<?php
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-9-5
 * Time: 下午3:02
 */

class Category_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function set_category()
    {
        $data = array(
            'name' => $this->input->post('cname'),
            'parent_id' => $this->input->post('fid')
        );
        return $this->db->insert('category', $data);
    }

    public function get_category()
    {
        $query = $this->db->get('category');
        return $query->result_array();
    }

    public function get_name_by_id($id)
    {
        $query = $this->db->get_where('category', array('id' => $id));
        $row = $query->row_array();
        return $row['name'];
    }

    public function get_category_by_id($id)
    {
        $query = $this->db->get_where('category', array('id' => $id));
        return $query->row_array();
    }

    public function delete_category($id)
    {
        $this->db->delete('category', array('id' => $id));
        $this->db->delete('category', array('parent_id' => $id));
    }
}