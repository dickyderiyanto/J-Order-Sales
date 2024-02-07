<?php 
 
class M_login extends CI_Model{	
	function cek_login($where){
		// $sql = "SELECT * FROM $table WHERE username = ? AND password = CAST(? AS Binary)";
		// return $this->db->query($sql,$where);		
		$this->db->select('*');
		$this->db->from('login');
		$this->db->join('KategoriUser','Login.KdKategori=KategoriUser.KdKategori');
		$this->db->join('V_UserAksesData','Login.NIP=V_UserAksesData.NIP');
		$this->db->join('DataPegawai','V_UserAksesData.NIP=DataPegawai.NIP');
		$this->db->join('Cabang','Cabang.KodeCabang=Left(DataPegawai.KodeAltius,8)','left');
		$this->db->where($where);
		return $this->db->get();
	}	

	function get_curr_week() {
		return $this->db
			->get_where('Periode',array(
				'BegDate <='	=> date('Y-m-d'),
				'EndDate >='	=> date('Y-m-d'),
			));
	}

	function get_next_week() {
		return $this->db
			->get_where('Periode',array(
				'BegDate <='	=> date('Y-m-d',strtotime('+1 week')),
				'EndDate >='	=> date('Y-m-d',strtotime('+1 week')),
			));
	}
	
}