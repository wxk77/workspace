<?php
 class User extends CI_Controller{
//
     public function index() {
         $this -> load -> database();
         $sql = 'select * from ci_test';
         $res = $this -> db -> query($sql);
         $users = $res -> result();
         var_dump($users);
         $users2 = $res -> result_array();
         var_dump($users2);
         $firstUser = $res -> row();
         var_dump($firstUser);
         $this -> load -> view('user');
     }
 }
 ?>