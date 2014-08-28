<?php
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-8-24
 * Time: 下午3:56
 */

class Admin extends CI_Controller {
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
    public function user()
    {
        if ($this->session->userdata('is_superadmin') === FALSE)
            redirect("/");
        $data['active'] = "admin/user";
        $this->load->view('templates/header', $data);
        $this->load->view('scenery.php');
        $this->load->view('templates/footer');
    }

    public function scenery()
    {
        if ($this->session->userdata('is_admin') === FALSE)
            redirect("/");
        $data['active'] = "admin/scenery";
        $this->load->view('templates/header', $data);
        $this->load->view('scenery.php');
        $this->load->view('templates/footer');
    }

    public function category()
    {
        if ($this->session->userdata('is_admin') === FALSE)
            redirect("/");
        $data['active'] = "admin/category";
        $this->load->view('templates/header', $data);
        $this->load->view('scenery.php');
        $this->load->view('templates/footer');
    }

    public function news()
    {
        if ($this->session->userdata('is_admin') === FALSE)
            redirect("/");
        $data['active'] = "admin/news";
        $this->load->view('templates/header', $data);
        $this->load->view('scenery.php');
        $this->load->view('templates/footer');
    }
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */