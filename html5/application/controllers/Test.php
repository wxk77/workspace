<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//header('Content-type:text/plain;charset=utf-8');
class Test extends My_Controller
{
    public function index()
    {
        $total = $this->theme_model->demo_count();
        $this->load->library('paginationlib');
        $this->paginationlib->initPagination('test/index', $total, 1);
        print_r($this->pagination->create_links());
    }
}
