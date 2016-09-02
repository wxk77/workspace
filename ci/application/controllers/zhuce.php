<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class zhuce extends CI_Controller{
        public function __construct(){
	 	parent::__construct();
	 	$this->load->model("UserLogin_Model");
	 	$this->load->library("session");
        $this->load->helper('url');
	 }





       // 显示注册页面
    // public function adminaddpage(){
      
    
    //     $this->load->view("zhuce");
 

    // }
    
    // 注册
    public function zhuce(){
        $userdata['password']=$this->input->post('password');
        $rpassword=$this->input->post('password2');
        if (!$userdata['password']=$rpassword) {
         echo "两次输入密码不一致，请重新输入";
         exit;
         }      
        $userdata['name']=$this->input->post('name');
        $userdata['email']=$_POST['email'];
        $dataForDB=$this->UserLogin_Model->zhuce($id,$userdata);
        if (!empty($dataForDB['name'])) {
            echo "用户名已存在";
            exit;
            # code...
        }
        if ($dataForDB) {
            echo "注册成功";
            # code...
        } else {
            echo "注册失败";
            # code...
        }
        
        
    }





}
?>