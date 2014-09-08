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

    private function set_upload_options($i)
    {
//  upload an image options
        $config = array();
        $time = time();
        $config['upload_path'] = './uploads/subscenery/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $time.$i;
        return $config;
    }

    public function set_subscenery($fid)
    {
        $subname = $this->input->post('subscenery');
        $subsummary = $this->input->post('subsummary');
        $files = $_FILES;
        $cnt = count($subname);
        for ($i = 0;$i < $cnt;$i++)
        {
            $_FILES['userfile']['name']= $files['subimg']['name'][$i];
            $_FILES['userfile']['type']= $files['subimg']['type'][$i];
            $_FILES['userfile']['tmp_name']= $files['subimg']['tmp_name'][$i];
            $_FILES['userfile']['error']= $files['subimg']['error'][$i];
            $_FILES['userfile']['size']= $files['subimg']['size'][$i];
            $this->upload->initialize($this->set_upload_options($i));
            if ($this->upload->do_upload())
            {
                $udata = $this->upload->data();
                $data = array(
                    'name' => $subname[$i],
                    'summary' => nl2br($subsummary[$i]),
                    'img' => $udata['file_name'],
                    'fid' => $fid
                );
                if (!$this->db->insert('subscenery',$data))
                    return FALSE;
            }
            else
                return FALSE;
        }
        return TRUE;
    }

    public function delete_subscenery($fid)
    {
        $this->db->delete('subscenery', array('fid' => $fid));
    }

    public function get_subscenery_list($fid)
    {
        $query = $this->db->get_where('subscenery', array('fid' => $fid));
        return $query->result_array();
    }
}

/* End of file subscenery_model.php */
/* Location: ./application/models/subscenery_model.php */