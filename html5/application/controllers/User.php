<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function login()
    {
        $callback = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        $this->load->view('user/login-form', array('callback'=>$callback));
    }

    public function doLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $callback = $this->input->post('callback');

        if (strlen($username) === 0 OR strlen($password) === 0) {
            return;
        }
        $sql = "select * from users where username = ? and password = ?";
        $result = $this->db->query($sql, array($username, md5($password)));
        if (null === ($data = $result->row())){
            echo json_encode(array('success'=>false, 'error'=>'用户名或者密码输入异常'));
        } else {
            $this->session->set_userdata('userid', $data->id);
            $this->session->set_userdata('username', $data->username);
            echo json_encode(array('success'=>true, 'callback'=>$callback));
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('userid');
        $this->session->sess_destroy();
        redirect('/user/login');
    }
}