<?php 
 
class M_master extends CI_Model{

	function get_supplier(){
		$sql = "select * from Jass_Supplier2";
		return $this->db->query($sql);
	}	
	function get_supplier2(){
		$sql = "SELECT * FROM dbo.Jass_Supplier2 WHERE Status = '1'";
		return $this->db->query($sql);
	}

	function get_penjualan($where){
		$this->db->select('KodeSM,SM,SUPPLIER,KODEPRODUK,NAMAPRODUK,SUM(KARTON),SUM(PCS),SUM(NILAI)');
		$this->db->from('JASS_ANALISASALES');
		$this->db->where($where);
		$this->db->group_by('KodeSM,SM,SUPPLIER,KODEPRODUK,NAMAPRODUK');
		return $this->db->get();
		// $sql = "SELECT SM FROM JASS_ANALISASALES WHERE KodeSM";
		// return $this->db->query($sql);
	}

	function get_pembelian($where=""){
		$this->db->select('KodeProduk,NamaProduk,KodeSupplier,NamaSupplier,QtyBeli1Prd,Carton,Box,Pcs');
		$this->db->from('Pembelian');
		if($where!=""){
			$this->db->where($where);
		}
		return $this->db->get();
		// $sql = "SELECT SM FROM JASS_ANALISASALES WHERE KodeSM";
		// return $this->db->query($sql);
	}

	function get_periode($kolom='*',$where){
		$this->db->select($kolom);
		$this->db->from('periode');
		$this->db->where($where);
		return $this->db->get();
		// $sql = "SELECT SM FROM JASS_ANALISASALES WHERE KodeSM";
		// return $this->db->query($sql);
	}

	function get_CountMontPeriode($where){
		$sql = "SELECT Periode, dbo.f_AmbilNamaBulan(Periode) AS NamaPeriode,COUNT(PWeek) AS JmlWeek FROM dbo.Periode p
				WHERE PYear='2019'
				GROUP BY Periode, dbo.f_AmbilNamaBulan(Periode)
				ORDER  BY p.periode";
		return $this->db->query($sql);
	}

	function add_supplier($data){
		if($this->db->insert('Manager', $data1)){
			$sql = "INSERT INTO [dbo].[Supplier]
			           ([KodeSupplier]
			           ,[NamaSupplier]
			           ,[Alamat]
			           ,[Penghubung]
			           ,[Telp]
			           ,[KodeDepo]
			           ,[NamaDepo])
    				 VALUES(?,?,?,?,?,?,?)";
			return $this->db->query($sql, array($data2['NIP'], $data2['Username'], '123', $data2['KodeKategori'],'1'));	
			
			// $this->db->insert('Login', $data2);
		}
	}

	

	
}