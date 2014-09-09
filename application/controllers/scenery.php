<?php
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-8-24
 * Time: 下午3:55
 */

class Scenery extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username'))
        {
            $user = array(
                'username'  => $this->lang->line('tourist'),
                'logged_in' => FALSE,
                'is_admin' => FALSE,
                'is_superadmin' => FALSE
            );
            $this->session->set_userdata($user);
        }
    }

    public function index()
    {
        $data['active'] = "scenery";
        $data['scenery'] = $this->scenery_model->get_scenery_list();
        $this->load->view('templates/header', $data);
        $this->load->view('scenery');
        $this->load->view('templates/footer');
    }

    public function show($id = 0)
    {
        $data['active'] = 'scenery';
        $data['scenery'] = $this->scenery_model->get_scenery_by_id($id);
        $data['subscenery'] = $this->subscenery_model->get_subscenery_list($data['scenery']['id']);
        $data['sid'] = $id;

        $this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
        $this->form_validation->set_rules('comment', $this->lang->line('commentlist'), 'required');
        if ($this->form_validation->run() === FALSE)
        {
            $data['comment'] = $this->comment_model->get_comments_list_by_sid($id);
            $this->load->view('templates/header', $data);
            $this->load->view('showscenery');
            $this->load->view('templates/footer');
        }
        else
        {
            $this->comment_model->set_comment($id);
            $data['comment'] = $this->comment_model->get_comments_list_by_sid($id);
            $this->load->view('templates/header', $data);
            $this->load->view('showscenery');
            $this->load->view('templates/footer');
        }
    }

    public function delete($id)
    {
        $this->scenery_model->delete_scenery($id);
        redirect('admin/scenerylist');
    }
}

/* End of file scenery.php */
/* Location: ./application/controllers/scenery.php */