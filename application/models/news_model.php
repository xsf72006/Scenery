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
        if ($this->input->post('img') != "")
        {
            $time = time();
            $config['upload_path'] = './uploads/news/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $time;
            $this->upload->initialize($config);
            if ($this->upload->do_upload('img'))
            {
                $udata = $this->upload->data();
                $data = array(
                    'title' => $this->input->post('title'),
                    'author' => $this->session->userdata('username'),
                    'img' => $udata['file_name'],
                    'category' => $this->input->post('category'),
                    'content' => nl2br($this->input->post('content'))
                );
                return $this->db->insert('news', $data);
            }
            else
                return FALSE;
        }
        else
        {
            $data = array(
                'title' => $this->input->post('title'),
                'author' => $this->session->userdata('username'),
                'category' => $this->input->post('category'),
                'content' => nl2br($this->input->post('content'))
            );
            return $this->db->insert('news', $data);
        }
    }

    public function delete_news($id)
    {
        $this->db->delete('news', array('id' => $id));
    }

    public function get_news()
    {
        $this->db->order_by('ndate', 'desc');
        $query = $this->db->get('news');
        return $query->result_array();
    }

    public function get_10news()
    {
        $this->db->order_by('ndate', 'desc');
        $this->db->limit(10);
        $query = $this->db->get('news');
        return $query->result_array();
    }

    public function get_news_list()
    {
        $this->db->order_by('ndate', 'desc');
        $query = $this->db->get_where('news', array('category' => 0));
        return $query->result_array();
    }

    public function get_public_list()
    {
        $this->db->order_by('ndate', 'desc');
        $query = $this->db->get_where('news', array('category' => 1));
        return $query->result_array();
    }

    public function get_news_by_id($id)
    {
        $query = $this->db->get_where('news', array('id' => $id));
        return $query->row_array();
    }

    public function add_click($id)
    {
        $news = $this->news_model->get_news_by_id($id);
        $click = $news['click'];
        $data = array(
            'click' => $click+1
        );
        $this->db->where('id', $id);
        $this->db->update('news', $data);
    }
}

/* End of file news_model.php */
/* Location: ./application/models/news_model.php */