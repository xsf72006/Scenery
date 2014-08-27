<?php
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-8-24
 * Time: 下午3:55
 */

class Main extends CI_Controller {
    public function index()
    {
        $user = array(
            'username'  => $this->lang->line('tourist'),
            'logged_in' => FALSE,
            'is_admin' => FALSE,
            'is_superadmin' => FALSE
        );
        $this->session->set_userdata($user);

        $data['active'] = "";
        $this->load->view('templates/header', $data);
        $this->load->view('index.php');
        $this->load->view('templates/footer');
    }

    public function login()
    {
        $this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
        $this->form_validation->set_rules('username', $this->lang->line('username'), 'required');
        $this->form_validation->set_rules('password', $this->lang->line('password'), 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $data['logerror'] = FALSE;
            $data['active'] = "";
            $this->load->view('templates/header', $data);
            $this->load->view('login');
            $this->load->view('templates/footer');
        }
        else
        {
            if ($this->user_model->user_verified())
            {
                $user = array(
                    'username'  => $this->input->post('username'),
                    'logged_in' => TRUE,
                    'is_admin' => $this->user_model->is_admin(),
                    'is_superadmin' => $this->user_model->is_superadmin()
                );
                $this->session->unset_userdata($user);
                $this->session->set_userdata($user);
                //TODO 返回到登录前页面
                redirect('/');
            }
            else
            {
                $data['logerror'] = TRUE;
                $data['active'] = "";
                $this->load->view('templates/header', $data);
                $this->load->view('login');
                $this->load->view('templates/footer');
            }
        }
    }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */