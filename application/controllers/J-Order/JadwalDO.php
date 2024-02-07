<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalDO extends CI_Controller {

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

        $this->load->model('M_JadwalDO');
   	}

	public function index()
	{
		$data = $this->data;
		$data['judul'] = "Product Focus";
		$KodeCabang=$this->session->userdata('KodeCabang');

		$data['JadwalDO'] = $this->M_JadwalDO->get_jadwal($KodeCabang)->result();
		$data['Supplier'] = $this->M_JadwalDO->get_supplier()->result();

		$this->load->view('v_header',$data);
		$this->load->view('J-Order/v_menu');
		$this->load->view('J-Order/v_jadwalDO',$data);
		$this->load->view('v_footer');
		// echo base_url('assets/css/bootstrap.min.css');
	}

	public function ajax_supplier() {
       $result = $this->M_JadwalDO->get_supplier()->result();
       foreach ($result as $data) {
			$arr[]=$data;
		}
		echo json_encode($arr);
   }  

   public function add_jadwal()
	{
		//Validasi Form
		$this->form_validation->set_rules('Supplier', 'Supplier', 'required');
		// $this->form_validation->set_rules('Group', 'Group', 'required');
		// $this->form_validation->set_rules('Produk', 'Produk', 'required');
		// $this->form_validation->set_rules('SalesPlan', 'SalesPlan', 'required');

        if ($this->form_validation->run() == FALSE)
        {
        	// echo validation_errors();
            $this->index();
        }
        else
        {
        	$KodeCabang=$this->session->userdata('KodeCabang');
        	$KodeSupplier = $this->input->post('Supplier');
        	$Frekuensi = $this->input->post('Frekuensi');

        	if ($this->input->post('Hari[0]')==null) {
        		$Senin=0;
        	}else{
        		$Senin=1;
        	}

        	if ($this->input->post('Hari[1]')==null) {
        		$Selasa=0;
        	}else{
        		$Selasa=1;
        	}

        	if ($this->input->post('Hari[2]')==null) {
        		$Rabu=0;
        	}else{
        		$Rabu=1;
        	}

        	if ($this->input->post('Hari[3]')==null) {
        		$Kamis=0;
        	}else{
        		$Kamis=1;
        	}

        	if ($this->input->post('Hari[4]')==null) {
        		$Jumat=0;
        	}else{
        		$Jumat=1;
        	}

        	if ($this->input->post('Hari[5]')==null) {
        		$Sabtu=0;
        	}else{
        		$Sabtu=1;
        	}

        	$data = array(
				'KodeCabang'  	=> $KodeCabang,
				'KodeSupplier'  => $KodeSupplier,
				'Frekuensi'  	=> $Frekuensi,
				'Senin'  		=> $Senin,
				'Selasa'   		=> $Selasa,
				'Rabu' 			=> $Rabu,
				'Kamis'   		=> $Kamis,
				'Jumat'   		=> $Jumat,
				'Sabtu'   		=> $Sabtu
			);

			$cek = $this->M_JadwalDO->cek_jadwal($KodeSupplier);
			if($cek->num_rows() > 0){
				$this->session->set_flashdata('pesan', 'Data sudah ada');
          		redirect(base_url('J-Order/JadwalDO'));
			}
			else{
				$this->M_JadwalDO->add_jadwal($data,'JadwalDO');
				$data['message'] = 'Data Inserted Successfully';
				redirect(base_url('J-Order/JadwalDO'));
			}



        }
	}

}