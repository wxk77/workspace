<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller
{
    /**
     * About us
     */
    public function index()
    {
        $this->load->view('help/index');
    }

    /**
     * Propose
     */
    public function propose()
    {
        $this->load->view('help/propose');
    }

    /**
     * Create suggest
     */
    public function suggest()
    {
        $this->load->helper('form');
        $username = $this->input->post('username');
        $mobile   = $this->input->post('mobile');
        $suggest  = $this->input->post('suggest');

        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', array('required'));
        $this->form_validation->set_rules('mobile', 'Mobile', array('required', 'regex_match[/^(\(86\))?[0]?((1[358][0-9]{9})|(147[0-9]{8})|(17[3678][\d]{8}))$/]'));
        $this->form_validation->set_rules('suggest', 'Suggest', array('required', 'min_length[7]'));
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('help/propose');
        } elseif( FALSE === $this->api->CreateCustomerService($username, $mobile, $suggest) ) {
            echo "<script>alert('提交失败')</script>";
        } else {
            echo "<script>alert(\"提交成功\")</script>";
        }

    }
}
