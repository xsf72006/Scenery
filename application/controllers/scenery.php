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
        $this->load->view('templates/header', $data);
        $this->load->view('scenery.php');
        $this->load->view('templates/footer');
    }
}

/* End of file scenery.php */
/* Location: ./application/controllers/scenery.php */