<?php
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-8-24
 * Time: 下午3:55
 */

class News_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function set_news()
    {
        $data = array(
            'title' => $this->input->post('title'),
            'author' => $this->input->post('uid'),
            'category' => $this->input->post('category'),
            'img' => $this->input->post('img'),
            'content' => $this->input->post('content'),
        );

        return $this->db->insert('news', $data);
    }

    public function delete_news()
    {
        return $this->db->delete('news', array('id' => $this->input->post('id')));
    }

    public function get_news_list()
    {
        return $this->db->get_where('news', array('category' => 0));
    }

    public function get_public_list()
    {
        return $this->db->get_where('news', array('category' => 1));
    }

    public function get_news_by_id()
    {
        return $this->db->get_where('news', array('id' => $this->input->post('id')));
    }
}

/* End of file news_model.php */
/* Location: ./application/models/news_model.php */