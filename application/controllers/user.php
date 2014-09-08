<?php
/**
 * Created by PhpStorm.
 * User: timmyxu
 * Date: 14-9-7
 * Time: 下午3:27
 */

class User extends CI_Controller {
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

    public function delete($id, $type)
    {
        $this->user_model->delete_user($id);
        redirect('admin/user/'.$type);
    }
}