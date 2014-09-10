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

    public function index($type = 0)
    {
        $data['active'] = "news";
        if ($type == 0)
        {
            $data['news'] = $this->news_model->get_news_list();
            $this->load->view('templates/header', $data);
            $this->load->view('news');
            $this->load->view('templates/footer');
        }
        else
        {
            $data['news'] = $this->news_model->get_public_list();
            $this->load->view('templates/header', $data);
            $this->load->view('public');
            $this->load->view('templates/footer');
        }
    }

    public function show($id = 0)
    {
        $data['active'] = "news";
        $data['news'] = $this->news_model->get_news_by_id($id);
        $this->news_model->add_click($id);
        $this->load->view('templates/header', $data);
        $this->load->view('shownews');
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $this->news_model->delete_news($id);
        redirect('admin/newslist');
    }
}

/* End of file news.php */
/* Location: ./application/controllers/news.php */