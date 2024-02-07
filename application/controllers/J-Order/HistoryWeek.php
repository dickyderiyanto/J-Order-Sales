<?php
ini_set('memory_limit', '1024M');
set_time_limit(0);
date_default_timezone_set("Asia/Jakarta");

defined('BASEPATH') OR exit('No direct script access allowed');

class HistoryWeek extends CI_Controller {

	var $data;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("Login"));
		}

		$this->data = array(
			'program' 		=> 'J-Order'
		);

		$this->load->model('M_Order');
		$this->load->helper('Print_rekap_helper');
	}

	public function index()
	{
		$data = $this->data;
		$data['judul'] = "History Order All";

		// $data['order'] = $this->M_Order->get_order(
		// 			0)->result();

		$this->load->view('v_header',$data);
		$this->load->view('J-Order/v_menu');
		$this->load->view('J-Order/v_history_week',$data);
		$this->load->view('v_footer');
		// echo base_url('assets/css/bootstrap.min.css');

		$tampil_data=1;
	}

	public function ajax_principle() {
		$kode_cabang=substr($this->session->userdata('KodeManager'),0,5);
       	$data = $this->M_Order->get_supplier($kode_cabang)->result();
		echo json_encode($data);
   }
   public function ajax_tahun() {
       	$data = $this->M_Order->get_tahun()->result();
		echo json_encode($data);
   }
	
	function history_allweek(){
		// ob_start('ob_gzhandler');
		$data['tahun']=$this->input->post('Tahun');
		$data['pweek']=$this->input->post('Pweek');
		$data['data_order']=json_encode($this->M_Order->get_history_all($this->input->post("Tahun"),$this->input->post("Pweek"))->result());
		$this->load->view('J-Order/v_hasil_historyweek',$data);

	}
// 
}