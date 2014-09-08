<?php
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-9-7
 * Time: 下午4:18
 */


class Category extends CI_Controller {
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

    public function delete($id)
    {
        $this->category_model->delete_category($id);
        redirect('admin/category');
    }
}