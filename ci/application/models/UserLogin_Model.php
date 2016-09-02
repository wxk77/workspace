<?php
/**
 * Created by PhpStorm.
 * User: wangxiaokang
 * Date: 2016/6/20
 * Time: 10:24
 */
class UserLogin_Model extends CI_model
{
    var $table='login';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }
    // 处理登录
    public function dologin($username){
        $this->db->where('username',$username);
        return $this->db->select()
            ->from($this->table)
            ->get()
            ->row_array();
    }




    public function zhuce($user_id,$userdata){

        $this->db->where('user_id',$user_id);
        return  $this->db->insert('login', $userdata);
        // return $this->db->set($this->table,$userdata)
        //                 ->from($this->table)
        //                 ->get()
        //                 ->row_array();

}
}
?>