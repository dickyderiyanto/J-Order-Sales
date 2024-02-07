<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    var $data;

    function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("Login"));
		}

        $this->data = array(
            'program' => 'J-Order'
        );

        $this->load->model('M_User');       
    }    

	public function index()
	{
		$data = $this->data;
		$data['judul'] = "Dashboard";

		$data['user'] = $this->M_User->get_user()->result();
		$data['kategori'] = $this->M_User->get_kategori()->result();

		$this->load->view('v_header',$data);
		$this->load->view('J-Order/v_menu');
		$this->load->view('v_user',$data);
		$this->load->view('v_footer');
		// echo base_url('assets/css/bootstrap.min.css');
	}

	public function add_user()
	{
		//Validasi Form
		$this->form_validation->set_rules('nip', 'NIP', 'required|max_length[25]');
        $this->form_validation->set_rules('kode_manager', 'Kode Manager', 'required|max_length[14]');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|max_length[100]');
        $this->form_validation->set_rules('username', 'Username', 'required|max_length[25]');
        $this->form_validation->set_rules('kategori', 'Kategori User', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            $data1 = array(
				'NIP' => $this->input->post('nip'),
				'KodeManager' => $this->input->post('kode_manager',true),
				'NamaManager' => $this->input->post('nama',true)
			);

			//Transfering data to Model
			$data2 = array(
				'NIP' => $this->input->post('nip'),
				'Username' => $this->input->post('username',true),
				'KodeKategori' =>  $this->input->post('kategori',true)
			);

			$this->M_User->add_user($data1,$data2);
			$data['message'] = 'Data Inserted Successfully';
			redirect(base_url('User'));
			
        }
	}
}
