<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
	var $data;
	
    function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("Login"));
		}

		$this->data = array(
            'program' => 'Sales Dashboard'
        );
       
    }   

	public function Index()
	{
		$data = $this->data;
		$data['judul'] = "JP - Sales Program";
		$this->load->view('v_header',$data);
		$this->load->view('v_home',$data);
		// echo base_url('assets/css/bootstrap.min.css');
	}

	function Logout(){
		$this->session->sess_destroy();
		redirect(base_url('Login'));
	}

}
