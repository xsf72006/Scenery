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
        $time = time();
        $config['upload_path'] = './uploads/scenery/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $time;
        $this->upload->initialize($config);
        if ($this->upload->do_upload('img'))
        {
            $udata = $this->upload->data();
            $category = $this->input->post('category');
            $categoryname = array();
            for ($i = 0; $i < count($category); $i++)
            {
                array_push($categoryname, $this->category_model->get_name_by_id($category[$i]));
            }
            $data = [
                'sname' => $this->input->post('sname'),
                'summary' => nl2br($this->input->post('summary')),
                'img' => $udata['file_name'],
                'category' => ','.implode(",",$category).',',
                'categoryname' => implode(",",$categoryname),
                'area' => $this->input->post('area'),
                'traffic' => $this->input->post('traffic'),
                'position' => $this->input->post('position'),
                'bus' => $this->input->post('bus')
            ];
            if ($this->db->insert('scenery',$data))
                return $this->db->insert_id();
            else
                return 0;
        }
        else
            return 0;
    }

    public function delete_scenery($id)
    {
        $this->db->delete('scenery', array('id' => $id));
        $this->subscenery_model->delete_subscenery($id);
    }

    public function get_10scenery()
    {
        $this->db->limit(10);
        $query = $this->db->get('scenery');
        return $query->result_array();
    }

    public function get_scenery_list()
    {
        $query = $this->db->get('scenery');
        return $query->result_array();
    }

    public function search_scenery()
    {
        $this->db->like('sname', $this->input->post('sname'));
        $this->db->like('categoryname', $this->input->post('category'));
        $this->db->like('position', $this->input->post('position'));
        $this->db->like('bus', $this->input->post('bus'));
        $query = $this->db->get('scenery');
        return $query->result_array();
    }

    public function get_scenery_by_id($id)
    {
        $query = $this->db->get_where('scenery', array('id' => $id));
        return $query->row_array();
    }

    public function add_click($id)
    {
        $scenery = $this->scenery_model->get_scenery_by_id($id);
        $click = $scenery['click'];
        $data = array(
            'click' => $click+1
        );
        $this->db->where('id', $id);
        $this->db->update('scenery', $data);
    }
}

/* End of file scenery_model.php */
/* Location: ./application/models/scenery_model.php */