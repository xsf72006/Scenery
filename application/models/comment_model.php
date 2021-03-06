<?php
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-8-24
 * Time: 下午3:55
 */
class Comment_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function set_comment($sid)
    {
        $data = array(
            'sid' => $sid,
            'author' => $this->session->userdata('username'),
            'content' => $this->input->post('comment')
        );

        return $this->db->insert('comment', $data);
    }

    public function delete_comment()
    {
        return $this->db->delete('comment', array('id' => $this->input->post('id')));
    }

    public function get_comments_list_by_sid($sid)
    {
        $query = $this->db->get_where('comment', array('sid' => $sid));
        return $query->result_array();
    }
}

/* End of file comment_model.php */
/* Location: ./application/models/comment_model.php */