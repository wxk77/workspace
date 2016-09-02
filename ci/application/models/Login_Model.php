<?php
/**
 * Created by PhpStorm.
 * User: wangxiaokang
 * Date: 2016/6/20
 * Time: 10:24
 */
class UserLogin_Model extends CI_model
{
    var $table='user';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }
    public function dologin($username){
        $this->db->where('username',$username);
        return $this->db->select()
            ->from($this->table)
            ->get()
            ->row_array();
    }

}
?>