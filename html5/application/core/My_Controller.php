<?php
class My_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->init();
    }

    public function init()
    {

        if (null === $this->session->userdata('userid')){
            header('Location: /user/login/');
        }
    }
}