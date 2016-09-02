<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//header('Content-type:text/plain;charset=utf-8');
class Theme extends My_Controller
{
    public function index($name = -1, $number = -1)
    {
        $where = '1 = 1';
        if ($name != -1) {
            $where.= " and theme.alias like '%{$name}%'";
        }
        if ($number != -1 && is_numeric($number)) {
            $where.= " and theme.id = {$number}";
        }

        $page_size = 6;
        $offset = isset($this->uri->segments[5]) ? ($this->uri->segments[5] - 1) * $page_size : 0;
        $total = $this->theme_model->demo_count($where);

        $this->load->library('paginationlib');
        $this->paginationlib->initPagination('theme/index/'. $name. '/'. $number, $total, $page_size, 5);
        $lists = $this->theme_model->listAll($where, $offset, $page_size);

        $this->load->view('theme/demo-list', array('themes'=>$lists));
    }

    public function demo($number = 1)
    {
        $this->load->view("demos/H5_".$number.'.html');
    }

    public function form($number = 1)
    {
        $this->load->view("theme/form".$number);
    }
}
