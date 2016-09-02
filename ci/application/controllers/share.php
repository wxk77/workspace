<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class share extends CI_Controller{
	public function __construct(){
	 	parent::__construct();
    $this->load->model('Share_Model');
    // header('Content-type:text/plain;');
    // print_r($this);
    // exit;

	 }
   
  //  function send_http_get($url){
  //   //初始化 
  //   $ch = curl_init($url) ;  
    
  //   //设置选项
  //   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
  //   curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
  //   curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
  //   curl_setopt($ch, CURLOPT_TIMEOUT, 120);
  //   curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
    
  //   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回  
  //   curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回  
    
  //   //设定为不验证证书和host
  //   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  //       curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    
  //   //执行并获取HTML文档内容
  //   $output = curl_exec($ch);

  //   //释放curl句柄
  //   curl_close($ch);
    
  //   return $output;
  // }
  
  // /**
  //  * Curl的POST请求方式
  //  * @param string $url 请求的URL
  //  * @param Object $param  请求的参数是个
  //  */
  // function send_http_post($url, $param) {
  //   $curl = curl_init();
    
  //   //设置选项
  //   curl_setopt($curl, CURLOPT_URL, $url);
  //   curl_setopt($curl, CURLOPT_HEADER, false);
  //   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  //   curl_setopt($curl, CURLOPT_NOBODY, true);
  //   curl_setopt($curl, CURLOPT_POST, true);
  //   curl_setopt($curl, CURLOPT_POSTFIELDS, $param);
  //   curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
  //     curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
      
  //     //设定为不验证证书和host
  //   curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
  //       curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
      
  //   //执行并获取HTML文档内容
  //   $output = curl_exec($curl);
    
  //   //释放curl句柄
  //   curl_close($curl);

  //   return $output;
  // }

  // function https_request($url, $data = null){
  //   $curl = curl_init();
  //   curl_setopt($curl, CURLOPT_URL, $url);
  //   curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
  //   curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
  //   if (!empty($data)){
  //   curl_setopt($curl, CURLOPT_POST, 1);
  //   curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
  //   }
    
  //   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  //   $output = curl_exec($curl);
  //   curl_close($curl);
  //   return $output;
  // }
  // function object2array(&$object) {
  //            $object =  json_decode( json_encode( $object),true);
  //            return  $object;
  //   }
  

 	public function index(){
		

    $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxba0877b55128af25&secret=a43be89b6134bfdf5ced1a179c3506f3";
    $access_token = $this->Share_Model->send_http_get($url);

   $arr = json_decode($access_token,TRUE);
   $access_token = $arr['access_token'];
   

   $url='https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token='.$access_token.'&type=jsapi';
   $jsapi_ticket=$this->Share_Model->send_http_get($url);
  
  

          $wxOri=sprintf(''.$jsapi_ticket.'&noncestr=Wm3WZYTPz0wzccnW&timestamp=1414587457&url=http://wx.mc.cc');
           $wxSha1 = sha1($wxOri);
           
       


     $this->load->view('share3');
 }

 
 }

  ?>