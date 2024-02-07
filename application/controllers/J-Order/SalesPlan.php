<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalesPlan extends CI_Controller {

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

		$this->load->model('M_SalesPlan');
	}

	public function index()
	{
		$data = $this->data;
		$data['judul'] = "Product Focus";
		$KodeManager=$this->session->userdata('KodeManager');

		$data['ProdukFlag'] = $this->M_SalesPlan->get_produkflag('1',$KodeManager)->result();
		// $data['Produk'] = $this->M_SalesPlan->get_produk()->result();
		// $data['Group'] = $this->M_SalesPlan->get_group()->result();
		$data['Supplier'] = $this->M_SalesPlan->get_supplier()->result();

		$this->load->view('v_header',$data);
		$this->load->view('J-Order/v_menu');
		$this->load->view('J-Order/v_productfocus',$data);
		$this->load->view('v_footer');
		// echo base_url('assets/css/bootstrap.min.css');
	}

	public function add_klasifikasi()
	{
		$data = [];
		if($this->input->method(TRUE) == "POST") {
			$KodeSupplier = $this->input->post('kode_supplier');
			$KodeGroup = $this->input->post('kode_grup');
			$KodeProduk = $this->input->post('kode_produk');
			$SalesPlan = $this->input->post('sales_plan');
			$SalesPlanKtn = $this->input->post('sales_plan_ktn');
			$ProdukFlag = $this->input->post('produk_flag');
			$KodeCabang = $this->session->userdata('KodeCabang');
			$KodeManager = $this->session->userdata('KodeManager');
			$xPeriode=$this->session->userdata('Periode');
			$xTahun=$this->session->userdata('Tahun');

			$this->M_SalesPlan->deleteSalesplanWhere(array(
				'KodeProduk'	=> $KodeProduk,
				'KodeGroup'		=> $KodeGroup,
				'KodeManager'	=> $KodeManager,
				'Periode'		=> $xPeriode,
				'Tahun'			=> $xTahun,
			));

			if($ProdukFlag != 5){
				$this->M_SalesPlan->insertSalesPlanKlasifikasi(array(
					'Kode'			=> $ProdukFlag.$KodeProduk.$KodeGroup,
					'ProdukFlag'	=> $ProdukFlag,
					'KodeProduk'	=> $KodeProduk,
					'KodeGroup'		=> $KodeGroup,
					'KodeManager'	=> $KodeManager,
					'KodeCabang'	=> $KodeCabang,
					'SalesPlan'		=> $SalesPlan,
					'SalesPlanKtn'	=> $SalesPlanKtn,
					'Periode'		=> $xPeriode,
					'Tahun'			=> $xTahun,
				));
			}

			$data['error'] = false;
			$data['message'] = 'Data berhasil disimpan';
		} else{
			$data['error'] = true;
			$data['message'] = 'Format Request Salah';
		}

		echo json_encode($data);
	}

	public function add_focus()
	{
		//Validasi Form
		$this->form_validation->set_rules('Supplier', 'Supplier', 'required');
		$this->form_validation->set_rules('Group', 'Group', 'required');
		// $this->form_validation->set_rules('Produk', 'Produk', 'required');
		// $this->form_validation->set_rules('SalesPlan', 'SalesPlan', 'required');

		if ($this->form_validation->run() == FALSE)
		{
        	// echo validation_errors();
			$this->index();
		}
		else
		{
			$KodeSupplier = $this->input->post('Supplier');
			$KodeGroup = $this->input->post('Group');
			$KodeCabang = $this->session->userdata('KodeCabang');
			$KodeManager = $this->session->userdata('KodeManager');
        	// $SalesPlan = $this->input->post('SalesPlan');
        	// $Kode="1".$KodeProduk.$KodeGroup;

			$focus = $this->M_SalesPlan->get_produk3($KodeSupplier,$KodeGroup);
			if($focus->num_rows() > 0){
				foreach ($focus->result() as $data_focus){
					$KodeProduk = $data_focus->KodeProduk;
					$SalesPlan = $this->input->post('SalesPlan'.$data_focus->KodeProduk);
					$SalesPlanKtn = $this->input->post('SalesPlanKtn'.$data_focus->KodeProduk);
					$Kode="1".$data_focus->KodeProduk.$KodeGroup;
					if ($SalesPlan != '' and $SalesPlan != 0) {
						$this->M_SalesPlan->add_salesplan2($Kode,1,$KodeSupplier,$KodeProduk,$KodeGroup,$KodeCabang,$KodeManager,$SalesPlan,$SalesPlanKtn);	
					}
				}
			}

			// $data = array(
			// 	'Kode'  		=> $Kode,
			// 	'ProdukFlag'  	=> '1',
			// 	'KodeProduk'  	=> $KodeProduk,
			// 	'KodeGroup'   	=> $KodeGroup,
			// 	'KodeManager' 	=> $KodeManager,
			// 	'SalesPlan'   	=> $SalesPlan
			// );

			// $cek = $this->M_SalesPlan->cek_salesplan($Kode,$KodeManager);
			// if($cek->num_rows() > 0){
			// 	$this->session->set_flashdata('pesan', 'Data sudah ada');
   //        		redirect(base_url('J-Order/SalesPlan'));
			// }
			// else{
			// 	$this->M_SalesPlan->add_salesplan($data,'ProdukSalesPlan');
			// 	$data['message'] = 'Data Inserted Successfully';
			redirect(base_url('J-Order/SalesPlan'));
			// }



		}
	}

	public function Declaining()
	{
		$data = $this->data;
		$data['judul'] = "Product Declaining";
		$KodeManager=$this->session->userdata('KodeManager');

		$data['ProdukFlag'] = $this->M_SalesPlan->get_produkflag(2, $KodeManager)->result();
		// $data['Produk'] = $this->M_SalesPlan->get_produk()->result();
		// $data['Group'] = $this->M_SalesPlan->get_group()->result();
		$data['Supplier'] = $this->M_SalesPlan->get_supplier()->result();

		$this->load->view('v_header',$data);
		$this->load->view('J-Order/v_menu');
		$this->load->view('J-Order/v_declaining_cmo',$data);
		$this->load->view('v_footer');
		// echo print_r($data['ProdukFlag']);
		// echo base_url('assets/css/bootstrap.min.css');
	}

	public function add_declaining()
	{
		//Validasi Form
		$this->form_validation->set_rules('Supplier', 'Supplier', 'required');
		$this->form_validation->set_rules('Group', 'Group', 'required');
		// $this->form_validation->set_rules('Produk', 'Produk', 'required');
		// $this->form_validation->set_rules('SalesPlan', 'SalesPlan', 'required');

		if ($this->form_validation->run() == FALSE)
		{
        	// echo validation_errors();
			$this->index();
		}
		else
		{
			$KodeSupplier = $this->input->post('Supplier');
			$KodeGroup = $this->input->post('Group');
			$KodeCabang = $this->session->userdata('KodeCabang');
			$KodeManager = $this->session->userdata('KodeManager');
        	// $SalesPlan = $this->input->post('SalesPlan');
        	// $Kode="1".$KodeProduk.$KodeGroup;

			$focus = $this->M_SalesPlan->get_produk3($KodeSupplier,$KodeGroup);
			if($focus->num_rows() > 0){
				foreach ($focus->result() as $declaining){
					$KodeProduk = $declaining->KodeProduk;
		        	// $SalesPlan = $this->input->post('SalesPlan'.$data_focus->KodeProduk);
					$SalesPlanKtn = $this->input->post('SalesPlanKtn'.$declaining->KodeProduk);
					$Kode="2".$declaining->KodeProduk.$KodeGroup;
					if (!empty($SalesPlanKtn) && $SalesPlanKtn > 0) {
						$this->M_SalesPlan->add_salesplan2($Kode,2,$KodeSupplier,$KodeProduk,$KodeGroup,$KodeCabang,$KodeManager,0,$SalesPlanKtn);	
					}
				}
			}

			// $data = array(
			// 	'Kode'  		=> $Kode,
			// 	'ProdukFlag'  	=> '1',
			// 	'KodeProduk'  	=> $KodeProduk,
			// 	'KodeGroup'   	=> $KodeGroup,
			// 	'KodeManager' 	=> $KodeManager,
			// 	'SalesPlan'   	=> $SalesPlan
			// );

			// $cek = $this->M_SalesPlan->cek_salesplan($Kode,$KodeManager);
			// if($cek->num_rows() > 0){
			// 	$this->session->set_flashdata('pesan', 'Data sudah ada');
   //        		redirect(base_url('J-Order/SalesPlan'));
			// }
			// else{
			// 	$this->M_SalesPlan->add_salesplan($data,'ProdukSalesPlan');
			// 	$data['message'] = 'Data Inserted Successfully';
			redirect(base_url('J-Order/SalesPlan/Declaining'));
			// }



		}
	}

	public function Discontinued()
	{
		$data = $this->data;
		$data['judul'] = "Discontinued";
		$KodeDepo=$this->session->userdata('KodeCabang');
		// $data['ProdukFlag'] = $this->M_SalesPlan->get_produkflag('1',$KodeManager)->result();
		$data['ProdukFlag'] = $this->M_SalesPlan->get_produkflag(3,$KodeDepo)->result();
		// $data['Produk'] = $this->M_SalesPlan->get_produk()->result();
		// $data['Group'] = $this->M_SalesPlan->get_group()->result();
		$data['Supplier'] = $this->M_SalesPlan->get_supplier()->result();

		$this->load->view('v_header',$data);
		$this->load->view('J-Order/v_menu');
		$this->load->view('J-Order/v_discontinued',$data);
		$this->load->view('v_footer');
		// echo base_url('assets/css/bootstrap.min.css');
	}

	public function add_discontinued()
	{
		//Validasi Form
		$this->form_validation->set_rules('Supplier', 'Supplier', 'required');
		$this->form_validation->set_rules('Group', 'Group', 'required');
		$this->form_validation->set_rules('Produk', 'Produk', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$KodeProduk = $this->input->post('Produk');
			$KodeGroup = $this->input->post('Group');
			$KodeSupplier = $this->input->post('Supplier');
			$KodeCabang = $this->session->userdata('KodeCabang');
			$KodeAltius = $this->session->userdata('KodeManager');
			$Tahun = $this->session->userdata('Tahun');
			$Periode = $this->session->userdata('Periode');
			if($KodeProduk == 'All'){
				$SuppArr = explode('/', $KodeSupplier);
				$Produk = $this->M_SalesPlan->get_produk($SuppArr[0],$SuppArr[1],$KodeGroup);
				foreach ($Produk->result() as $row) {
					$KodeProduk2 = $row->KodeProduk;

					$Kode="3".$KodeProduk2.$KodeGroup;

					$data = array(
						'Kode'  		=> $Kode,
						'ProdukFlag'  	=> '3',
						'KodeProduk'  	=> $KodeProduk2,
						'KodeGroup'   	=> $KodeGroup,
						'KodeManager' 	=> $KodeAltius,
						'KodeCabang' 	=> $KodeCabang,
						'Periode'		=> $Periode,
						'Tahun' 		=> $Tahun,
						'SalesPlan'   	=> 0
					);

					$cek = $this->M_SalesPlan->cek_salesplan($Kode,$KodeCabang);
					if($cek->num_rows() > 0) continue;
					$this->M_SalesPlan->add_salesplan($data,'ProdukSalesPlan');
				}
				$data['message'] = 'Data Inserted Successfully';
				redirect(base_url('J-Order/SalesPlan/Discontinued'));
			} else{
				$Kode="3".$KodeProduk.$KodeGroup;

				$data = array(
					'Kode'  		=> $Kode,
					'ProdukFlag'  	=> '3',
					'KodeProduk'  	=> $KodeProduk,
					'KodeGroup'   	=> $KodeGroup,
					'KodeManager' 	=> $KodeAltius,
					'KodeCabang' 	=> $KodeCabang,
					'Periode'		=> $Periode,
					'Tahun' 		=> $Tahun,
					'SalesPlan'   	=> 0
				);

				$cek = $this->M_SalesPlan->cek_salesplan($Kode,$KodeCabang);
				if($cek->num_rows() > 0){
					$this->session->set_flashdata('pesan', 'Data sudah ada');
					redirect(base_url('J-Order/SalesPlan/Discontinued'));
				}
				else{
					$this->M_SalesPlan->add_salesplan($data,'ProdukSalesPlan');
					$data['message'] = 'Data Inserted Successfully';
					redirect(base_url('J-Order/SalesPlan/Discontinued'));
				}
			}
		}
	}

	public function Seasonal()
	{
		$data = $this->data;
		$data['judul'] = "Product Seasonal";
		$KodeManager=$this->session->userdata('KodeManager');

		$data['ProdukFlag'] = $this->M_SalesPlan->get_produkflag('4',$KodeManager)->result();
		// $data['Produk'] = $this->M_SalesPlan->get_produk()->result();
		// $data['Group'] = $this->M_SalesPlan->get_group()->result();
		$data['Supplier'] = $this->M_SalesPlan->get_supplier()->result();

		$this->load->view('v_header',$data);
		$this->load->view('J-Order/v_menu');
		$this->load->view('J-Order/v_seasonal',$data);
		$this->load->view('v_footer');
		// echo base_url('assets/css/bootstrap.min.css');
	}

	public function add_seasonal()
	{
		//Validasi Form
		$this->form_validation->set_rules('Supplier', 'Supplier', 'required');
		$this->form_validation->set_rules('Group', 'Group', 'required');

		if ($this->form_validation->run() == FALSE)
		{
        	// echo validation_errors();
			$this->index();
		}
		else
		{
			$KodeSupplier = $this->input->post('Supplier');
			$KodeGroup = $this->input->post('Group');
			$KodeCabang = $this->session->userdata('KodeCabang');
			$KodeManager = $this->session->userdata('KodeManager');

			$focus = $this->M_SalesPlan->get_produk3($KodeSupplier,$KodeGroup);
			if($focus->num_rows() > 0){
				foreach ($focus->result() as $data_focus){
					$KodeProduk = $data_focus->KodeProduk;
					$SalesPlanKtn = $this->input->post('SalesPlanKtn'.$data_focus->KodeProduk);
					$Kode="4".$data_focus->KodeProduk.$KodeGroup;
					if ($SalesPlanKtn != '' and $SalesPlanKtn != 0) {
						$this->M_SalesPlan->add_salesplan2($Kode,4,$KodeSupplier,$KodeProduk,$KodeGroup,$KodeCabang,$KodeManager,0,$SalesPlanKtn);	
					}
				}
			}
			redirect(base_url('J-Order/SalesPlan/Seasonal'));
		}
	}

	public function GetJson($produk_flag,$kode) {
		$KodeManager=$this->session->userdata('KodeManager');
		$result = $this->M_SalesPlan->get_produkflag2($produk_flag,$kode,$KodeManager)->result();
		foreach ($result as $data) {
			$arr[]=$data;
		}
		echo json_encode($arr);
	}

	public function ajax_supplier() {
		$result = $this->M_SalesPlan->get_supplier()->result();
		foreach ($result as $data) {
			$arr[]=$data;
		}
		echo json_encode($arr);
	}

	public function ajax_group($depo,$supplier) {
		$result= $this->M_SalesPlan->get_group($depo,$supplier)->result();
		foreach ($result as $data) {
			$arr[]=$data;
		}
		echo json_encode($arr);
	}

	public function ajax_produk($depo,$supplier,$group) {
		$result= $this->M_SalesPlan->get_produk($depo,$supplier,$group)->result();
		foreach ($result as $data) {
			$arr[]=$data;
		}
		echo json_encode($arr);
	}

	public function ajax_produk2($depo,$supplier,$group) {
		$result= $this->M_SalesPlan->get_produk2($depo,$supplier,$group)->result();
		foreach ($result as $data) {
			$arr[]=$data;
		}
		echo json_encode($arr);
	}

	public function ajax_rpp_bulan($supplier,$supplier2,$group,$produk) {
		$result= $this->M_SalesPlan->get_rpp_bulan($supplier,$supplier2,$group,$produk)->row();
		echo json_encode($result);
	}

	public function ajax_limit_produk($supplier,$supplier2,$group,$produk) {
		$result= $this->M_SalesPlan->get_limit_produk($supplier,$supplier2,$group,$produk)->row();
		echo json_encode($result);
	}

	public function hapus($produk_flag,$kode) {
		if ($produk_flag==1) {
			$this->M_SalesPlan->delete_salesplan($produk_flag,$kode);
			redirect(base_url('J-Order/SalesPlan'));
		}elseif ($produk_flag==2) {
			$this->M_SalesPlan->delete_salesplan($produk_flag,$kode);
			redirect(base_url('J-Order/SalesPlan/Declaining'));
		}elseif ($produk_flag==3) {
			$this->M_SalesPlan->delete_salesplan($produk_flag,$kode);
			redirect(base_url('J-Order/SalesPlan/Discontinued'));
		}elseif ($produk_flag==4) {
			$this->M_SalesPlan->delete_salesplan($produk_flag,$kode);
			redirect(base_url('J-Order/SalesPlan/Seasonal'));
		}
	}

	public function copy_data($produk_flag) {
		$xKodeManager=$this->session->userdata('KodeManager');
		$xPeriode=$this->session->userdata('Periode');
		$xTahun=$this->session->userdata('Tahun');
		$xPeriodeNow=$this->session->userdata('PeriodeNow');
		$xTahunNow=$this->session->userdata('TahunNow');
		if ($produk_flag==1) {
			$this->M_SalesPlan->copy_salesplan($produk_flag,$xKodeManager,$xPeriode,$xTahun,$xPeriodeNow,$xTahunNow);
			redirect(base_url('J-Order/SalesPlan'));
   		// }elseif ($produk_flag==2) {
   		// 	# code...
   		// }elseif ($produk_flag==3) {
   		// 	$this->M_SalesPlan->delete_salesplan($produk_flag,$kode);
     //   		redirect(base_url('J-Order/SalesPlan/Discontinued'));
   		// }elseif ($produk_flag==4) {
   		// 	$this->M_SalesPlan->delete_salesplan($produk_flag,$kode);
     //   		redirect(base_url('J-Order/SalesPlan/Seasonal'));
		}
	}

	public function ajax_tahun() {
		$data = $this->M_Order->get_tahun()->result();
		echo json_encode($data);
	}



	public function Klasifikasi()
	{
		$data = $this->data;
		$data['judul'] = "Semua Klasifikasi";
		$KodeManager=$this->session->userdata('KodeManager');

		// $data['ProdukFlag'] = $this->M_SalesPlan->get_produkflag('4',$KodeManager)->result();
		// $data['Produk'] = $this->M_SalesPlan->get_produk()->result();
		// $data['Group'] = $this->M_SalesPlan->get_group()->result();
		// $data['Supplier'] = $this->M_SalesPlan->get_supplier()->result();

		$this->load->view('v_header',$data);
		$this->load->view('J-Order/v_menu');
		$this->load->view('J-Order/v_klasifikasi_cmo',$data);
		$this->load->view('v_footer');
		// echo base_url('assets/css/bootstrap.min.css');
	}

	public function ajax_principle() {
		$kode_cabang=substr($this->session->userdata('KodeManager'),0,5);
		$data = $this->M_SalesPlan->get_supplier($kode_cabang)->result();
		echo json_encode($data);
	}

	public function ajax_klasifikasi()
	{
		$KodeSupplier = $this->input->get('kode_supplier');

		$data = $this->M_SalesPlan->getAllProdukWithFlag($KodeSupplier)->result();
		echo json_encode($data);
	}

}