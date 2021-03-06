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
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->upload->initialize($config);
    }
    public function user($type = 1)
    {
        if ($this->session->userdata('is_superadmin') === FALSE)
            redirect("/");
        $data['active'] = "admin/user";
        $data['type'] = $type;
        $data['adderror'] = FALSE;
        $data['addsuccess'] = FALSE;
        if ($type == 1)
        {
            $data['user'] = $this->user_model->get_admin_user_list();
        }
        else
        {
            $data['user'] = $this->user_model->get_user_list();
        }
        $this->form_validation->set_error_delimiters('<span class="col-sm-offset-1 col-sm-4 alert alert-danger" role="alert">', '</span>');
        $this->form_validation->set_rules('username', $this->lang->line('username'), 'required');
        $this->form_validation->set_rules('password', $this->lang->line('password'), 'required');
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/user');
            $this->load->view('templates/footer');
        }
        else
        {
            if ($this->user_model->set_user())
            {
                $data['addsuccess'] = TRUE;
                if ($type == 1)
                {
                    $data['user'] = $this->user_model->get_admin_user_list();
                }
                else
                {
                    $data['user'] = $this->user_model->get_user_list();
                }
                $this->load->view('templates/header', $data);
                $this->load->view('admin/user');
                $this->load->view('templates/footer');
            }
            else
            {
                $data['adderror'] = TRUE;
                $this->load->view('templates/header', $data);
                $this->load->view('admin/user');
                $this->load->view('templates/footer');
            }
        }
    }

    public function category()
    {
        if ($this->session->userdata('is_admin') === FALSE)
            redirect("/");
        $data['active'] = "admin/category";
        $data['category'] = $this->category_model->get_category();
        $data['addsuccess'] = FALSE;
        $data['adderror'] = FALSE;
        $this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
        $this->form_validation->set_rules('cname', $this->lang->line('cname'), 'required');
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/category');
            $this->load->view('templates/footer');
        }
        else
        {
            if ($this->category_model->set_category())
            {
                $data['addsuccess'] = TRUE;
                $data['category'] = $this->category_model->get_category();
                $this->load->view('templates/header', $data);
                $this->load->view('admin/category');
                $this->load->view('templates/footer');
            }
            else
            {
                $data['adderror'] = TRUE;
                $this->load->view('templates/header', $data);
                $this->load->view('admin/category');
                $this->load->view('templates/footer');
            }
        }
    }

    public function scenery()
    {
        if ($this->session->userdata('is_admin') === FALSE)
            redirect("/");
        $data['active'] = "admin/scenery";
        $data['addsuccess'] = FALSE;
        $data['adderror'] = FALSE;
        $this->tree->init($this->category_model->get_category());
        $data['category'] = $this->tree->get_tree_category(0, "<div class='checkbox'><label>
        <input type='checkbox' name='category[]' value=\$id />\$spacer\$name</label></div>", "<div class='checkbox'><label>
        <input type='checkbox' name='category[]' value=\$id />\$spacer\$name</label></div>", 0, '|');

        $this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
        $this->form_validation->set_rules('sname', $this->lang->line('sceneryname'), 'required');
        $this->form_validation->set_rules('summary', $this->lang->line('summary'), 'required');
        $this->form_validation->set_rules('category[]', $this->lang->line('category'), 'required');
        $this->form_validation->set_rules('area', $this->lang->line('area'), 'required');
        $this->form_validation->set_rules('traffic', $this->lang->line('traffic'), 'required');
        $this->form_validation->set_rules('position', $this->lang->line('position'), 'required');
        $this->form_validation->set_rules('bus', $this->lang->line('bus'), 'required');
        $this->form_validation->set_rules('subscenery[]', $this->lang->line('subscenery'), 'required');
        $this->form_validation->set_rules('subsummary[]', $this->lang->line('subsummary'), 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/scenery');
            $this->load->view('templates/footer');
        }
        else
        {
            $fid = $this->scenery_model->set_scenery();
            if ($fid != 0)
            {
                if ($this->subscenery_model->set_subscenery($fid))
                {
                    $data['addsuccess'] = TRUE;
                    $this->load->view('templates/header', $data);
                    $this->load->view('admin/scenery');
                    $this->load->view('templates/footer');
                }
                else
                {
                    $data['adderror'] = TRUE;
                    $this->load->view('templates/header', $data);
                    $this->load->view('admin/scenery');
                    $this->load->view('templates/footer');
                }
            }
            else
            {
                $data['adderror'] = TRUE;
                $this->load->view('templates/header', $data);
                $this->load->view('admin/scenery');
                $this->load->view('templates/footer');
            }
        }

    }

    public function scenerylist()
    {
        if ($this->session->userdata('is_admin') === FALSE)
            redirect("/");
        $data['active'] = "admin/scenerylist";
        $data['scenery'] = $this->scenery_model->get_scenery_list();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/scenerylist');
        $this->load->view('templates/footer');
    }

    public function news()
    {
        if ($this->session->userdata('is_admin') === FALSE)
            redirect("/");
        $data['active'] = "admin/news";
        $data['adderror'] = FALSE;
        $data['addsuccess'] = FALSE;
        $this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
        $this->form_validation->set_rules('title', $this->lang->line('newstitle'), 'required');
        $this->form_validation->set_rules('category', $this->lang->line('newscategory'), 'required');
        $this->form_validation->set_rules('content', $this->lang->line('newscontent'), 'required');
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/news');
            $this->load->view('templates/footer');
        }
        else
        {
            if ($this->news_model->set_news())
            {
                $data['addsuccess'] = TRUE;
                $this->load->view('templates/header', $data);
                $this->load->view('admin/news');
                $this->load->view('templates/footer');
            }
            else
            {
                $data['adderror'] = TRUE;
                $this->load->view('templates/header', $data);
                $this->load->view('admin/news');
                $this->load->view('templates/footer');
            }
        }
    }

    public function newslist()
    {
        if ($this->session->userdata('is_admin') === FALSE)
            redirect("/");
        $data['active'] = "admin/news";
        $data['news'] = $this->news_model->get_news();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/newslist');
        $this->load->view('templates/footer');
    }
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */