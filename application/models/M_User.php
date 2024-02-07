n<?php 
 
class M_user extends CI_Model{

	function get_user(){
		$this->db->select('*');
		$this->db->from('Manager');
		$this->db->join('Login', 'Login.NIP = Manager.NIP', 'left');
		$this->db->join('KategoriUser', 'KategoriUser.KodeKategori = Login.KodeKategori', 'left');
		return $this->db->get();

		// $sql = "SELECT * FROM Manager LEFT JOIN Login ON Manager.NIP=Login.NIP LEFT JOIN KategoriUser ON Login.KodeKategori=KategoriUser.KodeKategori";
		// return $this->db->query($sql);		
	}	

	function get_kategori(){
		//Query by CI
		$this->db->where('status', '1'); 
		return $this->db->get('KategoriUser');

		//Manual Query
		// $sql = "SELECT * FROM KategoriUser WHERE status='1'";
		// return $this->db->query($sql);	
	}

	function add_user($data1,$data2){
		if($this->db->insert('Manager', $data1)){
			$sql = "INSERT INTO dbo.Login (NIP, Username, Password, KodeKategori, Status) VALUES (?,?,CAST(? as binary),?,?)";
			return $this->db->query($sql, array($data2['NIP'], $data2['Username'], '123', $data2['KodeKategori'],'1'));	
			
			// $this->db->insert('Login', $data2);
		}
	}
}