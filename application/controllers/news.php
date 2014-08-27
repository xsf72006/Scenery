<?php
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-8-24
 * Time: 下午3:55
 */

class News extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['username']))
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
        $data['active'] = "news";
        $this->load->view('templates/header', $data);
        $this->load->view('scenery.php');
        $this->load->view('templates/footer');
    }
}

/* End of file news.php */
/* Location: ./application/controllers/news.php */