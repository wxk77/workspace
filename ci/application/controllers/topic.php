<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Topic extends CI_Controller{
	public function __construct(){
	 	parent::__construct();

	 }
	 public function index(){
	 	$this->load->view('topiclist');
	 }
	 public function topic_add(){
	 	$this->load->view('topicAdd');
	 }
}