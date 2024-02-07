<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periode extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    var $data;

    function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("Login"));
		}

        $this->data = array(
            'program' => 'J-Order'
        );

        $this->load->model('M_Master');
       
    }    

	public function index()
	{
		$data = $this->data;
		$data['judul'] = "Periode";

		$data['periode'] = $this->M_Master->get_CountMontPeriode("PYear='".date("Y")."'")->result();
		$data['periode2'] = $this->M_Master->get_periode("","PYear='".date("Y")."'")->result();
		
		$this->load->view('v_header',$data);
		$this->load->view('J-Order/v_menu');
		$this->load->view('v_periode',$data);
		$this->load->view('v_footer');
		// echo base_url('assets/css/bootstrap.min.css');
	}}
