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

    public function get_category()
    {
        $query = $this->db->get('category');
        return $query->result_array();
    }

    public function get_category_by_id($id)
    {
        $query = $this->db->get_where('category', array('id' => $id));
        return $query->row_array();
    }
}