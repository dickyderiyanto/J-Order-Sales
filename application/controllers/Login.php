<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
        parent::__construct();
        if($this->session->userdata('status') == "login"){
			redirect(base_url());
		}

		$this->load->model('M_Login');
       
    }   
    
	public function index()
	{
		// $data = $this->data;
		$data['judul'] = "JP - Sales Program";
		$this->load->view('v_login',$data);
		// echo base_url('assets/css/bootstrap.min.css');
	}

	function auth()
	{
		$username = strtoupper($this->input->post('username'));
		$password = $this->input->post('password');
		
		$where = "username = CAST('$username' AS Binary) AND password = CAST('$password' AS Binary)";
		$cek = $this->M_Login->cek_login($where);

		// var_dump($cek->num_rows());
		if($cek->num_rows() > 0){
			foreach ($cek->result() as $row){
				
				if ($row->Kategori='SA'){
					$AksesWhere= "KodeSM LIKE '%' ";
				}else if ($row->Kategori='ADMINHO'){
					$AksesWhere= "KodeSM LIKE '%' ";
				}else if ($row->Kategori='OWNER'){
					$AksesWhere= "KodeSM LIKE '%' ";
				}else if ($row->Kategori='GM1'){
					$AksesWhere= "KodeSM LIKE '%' ";
				}else if ($row->Kategori='GM2'){
					$AksesWhere= "KodeSM LIKE '%' ";
				}else if ($row->Kategori='ADMIN'){
					$AksesWhere="KodeSM IN ".$row->KodeUser;
				}else if ($row->Kategori='SM'){
					$AksesWhere="KodeSM IN ".$row->KodeUser;
				}else if ($row->Kategori='SPV'){
					$AksesWhere="KodeSPV IN ".$row->KodeUser;
				}else{
					$AksesWhere="KodeSM=''";
				}

				$currWeek = $this->M_Login->get_curr_week()->row();
				$nextWeek = $this->M_Login->get_next_week()->row();
				$PeriodeWeekNow=$currWeek->PWeek;
				$TahunWeekNow=$currWeek->PYear;
				$PeriodeWeek=$nextWeek->PWeek;
				$TahunWeek=$nextWeek->PYear;


				$PeriodeNow=(int)date('m');
				$TahunNow=(int)date('Y');
				$Periode=$PeriodeNow+1;
				if (($PeriodeNow+1)>12) {
					$Periode=($PeriodeNow+1)-12;
					$Tahun=$TahunNow+1;
				}
				else{
					$Periode=$PeriodeNow+1;
					$Tahun=$TahunNow;	
				}

				$data_session = array(
					'Username' 		=> $username,
					'NamaPegawai'	=> $row->NamaPegawai,
					'Depo'			=> $row->Kode,
					'Nip'			=> $row->NIP,
					'Kategori'		=> $row->Kategori,
					'KdKategori'	=> $row->KdKategori,
					'KodeUser' 		=> $row->KodeUser,
					'KodeManager' 	=> $row->KodeAltius,
					'KodeCabang' 	=> $row->KodeCabang,
					'NamaCabang' 	=> 'PT. '.str_replace(' (D)', '', $row->NamaCabang),
					// 'NamaCabang' 	=> substr($row->NamaCabang,Search($search, $string),strlen($row->NamaCabang)-Search($search, $string)),
					'Alamat' 		=> $row->Alamat,
					'NPWP' 			=> $row->NPWP,
					'Telepon' 		=> $row->Telepon,
					'AksesWhere' 	=> $AksesWhere,
					'Periode' 		=> $Periode,
					'PeriodeNow' 	=> $PeriodeNow,
					'Tahun' 		=> $Tahun,
					'TahunNow' 		=> $TahunNow,
					'PeriodeWeekNow'=> $PeriodeWeekNow,
					'TahunWeekNow'	=> $TahunWeekNow,
					'PeriodeWeek'	=> $PeriodeWeek,
					'TahunWeek'		=> $TahunWeek,
					'status' 		=> "login"
					);
			}			
 
			$this->session->set_userdata($data_session);
 			// var_dump($data_session);
			redirect(base_url("J-Order/Home"));
 
		}else{
			$this->session->set_flashdata('pesan', 'Gagal! Silahkan isi dengan benar.');
			redirect(base_url("Login"));
		}
	}
	function Search($search, $string){ 
	    $position = stripos($string, $search, 5);   
	    if ($position == true){ 
	        return $position; 
	    } 
	    else{ 
	        return 0; 
	    } 
	} 
}
