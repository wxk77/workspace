<?php
/**
 * Created by PhpStorm.
 * User: wangxiaokang
 * Date: 2016/6/20
 * Time: 10:17
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('UserLogin_Model');
        $this->load->helper('captcha');
    }
    public function doLogin(){
        $word=$this->session->userdata('code');
        $code=$_POST['captcha'];
        if($word!=$code){
            echo '请输入正确验证码';
            exit;
        }
        $userdata['username']=$this->input->post('username');
        $userdata['password']=$this->input->post('password');
        $userInfoFromDB=$this->UserLogin_Model->dologin($userdata['username']);

        if (empty($userdata['username'])||empty($userdata['password'])) {
            echo "you should";
            exit;
        }else{
            if($userInfoFromDB['username']==$userdata['username']&&$userInfoFromDB['password']==$userdata['password']){
                $this->session->set_userdata('userdata',$userInfoFromDB);
                redirect('http://www.baidu.com');
                 echo "success";

            }else{
                echo 'failed';
            }



        }
    }
    public function index()
    {
         $this->Code();
      
    }
    public function Code(){
        $vals = array(
            // 'word'      => 'Random word',
            'img_path'  => './captcha/',
            'img_url'   => 'http://www.77.com/CodeIgniter/captcha/',
            'font_path' => './path/to/fonts/texb.ttf',
            'img_width' => '100',
            'img_height'    => 30,
            'expiration'    => 7200,
            'word_length'   => 4,
            'font_size' => 16,
            'img_id'    => 'Imageid',
            'pool'      => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            // White background and border, black text and red grid
            'colors'    => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );
        $cap = create_captcha($vals);
        $this->session->set_userdata('code',$cap['word']);
        if (isset($_POST['ajax'])) {
            echo json_encode($cap['image']);
            exit;
            # code...
        }

       $this->load->view('login',$cap);

    }
}