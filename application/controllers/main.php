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
        $data['active'] = "/";
        $data['news'] = $this->news_model->get_10news();
        $data['scenery'] = $this->scenery_model->get_10scenery();
        $this->load->view('templates/header', $data);
        $this->load->view('index');
        $this->load->view('templates/footer');
    }

    public function login($active = "/", $active2 = "")
    {
        $this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
        $this->form_validation->set_rules('username', $this->lang->line('username'), 'required');
        $this->form_validation->set_rules('password', $this->lang->line('password'), 'required');
        if ($this->form_validation->run() === FALSE)
        {
            $data['logerror'] = FALSE;
            $data['active'] = $active.'/'.$active2;
            $this->load->view('templates/header', $data);
            $this->load->view('login');
            $this->load->view('templates/footer');
        }
        else
        {
            if ($this->user_model->user_verified())
            {
                if ($this->input->post('remember') == '1')
                {
                    $this->session->sess_expire_on_close = FALSE;
                    $this->session->sess_expiration = 31536000;
                }
                $this->session->set_userdata('username', $this->input->post('username'));
                $this->session->set_userdata('logged_in', TRUE);
                $this->session->set_userdata('is_admin', $this->user_model->is_admin());
                $this->session->set_userdata('is_superadmin', $this->user_model->is_superadmin());
                redirect($active.'/'.$active2);
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

    public function logout($active = "/", $active2 = "")
    {
        $this->session->set_userdata('username', $this->input->post('tourist'));
        $this->session->set_userdata('logged_in', FALSE);
        $this->session->set_userdata('is_admin', FALSE);
        $this->session->set_userdata('is_superadmin', FALSE);
        redirect($active.'/'.$active2);
    }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */