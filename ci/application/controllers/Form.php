<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Form extends CI_Controller{
        public function __construct(){
	 	parent::__construct();
	 	$this->load->model("UserLogin_Model");
	 	$this->load->library("session");
        $this->load->helper('url');
	 }
    public function index(){
     
    	$this->load->view("login_a");
    }

    public function dologin(){
    	$word=$this->session->userdata('code');
		$code=$_POST['captcha'];
		if($word!=$code){
			echo '请输入正确验证码';
		   exit;
		}

	    $userdata['username']=$this->input->post('name');
		$userdata['password']=$this->input->post('password');
		// var_dump($userdata);exit;
        $userInfoFromDB=$this->UserLogin_Model->dologin($userdata['username']);
         if (empty($userdata['username'])||empty($userdata['password'])) {
            echo "you should";
            exit;
        }else{
        	if ($userInfoFromDB['username']==$userdata['username']&&$userInfoFromDB['password']==$userdata['password'])  {        	
		        $this->session->set_userdata('userdata',$userInfoFromDB);
        		redirect('http://www.baidu.com');
        		 echo "success";
        	}else{
        		echo "failed";
        	}
        }
    }


       // 显示注册页面
    public function adminaddpage(){
      
    
        $this->load->view("zhuce");
 

    }


    // 注册
    public function zhuce(){
        $user_id=$this->input->post('user_id');
        $userdata['password']=$this->input->post('password');
        $rpassword=$this->input->post('password2');
        if (!$userdata['password']=$rpassword) {
         echo "两次输入密码不一致，请重新输入";
         exit;
         }      
        $userdata['username']=$this->input->post('username');
        $userdata['email']=$_POST['email'];
        $dataForDB=$this->UserLogin_Model->zhuce($user_id,$userdata);
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