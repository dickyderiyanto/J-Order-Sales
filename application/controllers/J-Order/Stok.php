<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends CI_Controller {

    var $data;

    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("Login"));
		}

        $this->data = array(
            'program' => 'J-Order'
        );

        $this->load->model('M_stok');
   	}

	public function index()
	{
		$data = $this->data;
		$data['judul'] = "Penjualan";

		// $data['supplier'] = $this->M_stok->get_bssupplier()->result();
		// $data['group'] = $this->M_stok->get_bsgroup()->result();
		// $data['produk'] = $this->M_stok->get_bsproduk()->result();

		$this->load->view('v_header',$data);
		$this->load->view('J-Order/v_menu');
		$this->load->view('J-Order/v_bufferstock',$data);
		// $this->load->view('v_footer');
		// echo base_url('assets/css/bootstrap.min.css');
	}

	function get_bs_supplier($supplier){
		$data = $this->M_stok->get_bssupplier($supplier)->result();
		echo json_encode($data);
	}

	function get_bs_group($depo,$supplier){
		$data = $this->M_stok->get_bsgroup($depo,$supplier)->result();
		echo json_encode($data);
	}

	function get_produk($group){
		$data = $this->M_stok->get_produk($group)->result();
		echo json_encode($data);
	}

	function get_bs_produk($produk,$group,$depo,$supplier){
		$Periode=$this->session->userdata('Periode');
		$Tahun=$this->session->userdata('Tahun');
		$data = $this->M_stok->get_bsproduk($depo,$supplier,$produk,$group,$Periode,$Tahun)->result();
		echo json_encode($data);
	}

	function update_stok_supplier(){
		$KodeSupplier=$this->input->post('supplier');
		$KodeGroup=$this->input->post('group');
		$KodeProduk=$this->input->post('produk');
		$IronStok=$this->input->post('iron_stok_supplier');
		$Periode=$this->session->userdata('Periode');
		$Tahun=$this->session->userdata('Tahun');
		if ($KodeGroup==0){
			$KodeGroup='';
		}
		if ($KodeProduk==0){
			$KodeProduk='';
		}
		$this->M_stok->update_bsproduk($KodeSupplier, $KodeGroup, $KodeProduk, $IronStok, $Periode, $Tahun);
		redirect(base_url("J-Order/Stok"));
	}

}
