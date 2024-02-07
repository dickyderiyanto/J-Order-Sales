<?php 
 
class M_JadwalDO extends CI_Model{

	function get_supplier(){
		$kode_cabang=substr($this->session->userdata('KodeCabang'),0,5);
		$kode_manager=$this->session->userdata('KodeManager');
		$sql = "SELECT Kode as KodeSupplier, Nama +' - '+ Kode as NamaSupplier 
				FROM JASS_SUPPLIER 
				JOIN (SELECT DISTINCT KodeSupplier FROM dbo.RppManager WHERE KodeSM='$kode_manager') AS Rpp ON KODE=KodeSupplier
				JOIN (SELECT DISTINCT KodeSupplier FROM dbo.Produk) p ON Rpp.KodeSupplier = p.KodeSupplier
				WHERE Nama NOT LIKE '%PRAKARSA%' and left(Kode,5)='$kode_cabang' and
						Kode NOT IN (SELECT KodeSupplier FROM dbo.JadwalDO WHERE KodeCabang=left('$kode_manager',8))
				ORDER BY NamaSupplier";
		return $this->db->query($sql);
	}	

	function get_jadwal($kode_cabang){
		$sql = "SELECT KodeSupplier, NAMA AS NamaSupplier, Frekuensi, Senin, Selasa, Rabu, Kamis, Jumat, Sabtu FROM dbo.JadwalDO
				JOIN dbo.JASS_SUPPLIER ON dbo.JadwalDO.KodeSupplier=dbo.JASS_SUPPLIER.KODE 
				WHERE KodeCabang='$kode_cabang'";
		return $this->db->query($sql);
	}

	function cek_jadwal($kode_supplier){
		$sql = "SELECT KodeSupplier FROM dbo.JadwalDO WHERE KodeSupplier='$kode_supplier'";
		return $this->db->query($sql);
	}
 
	function add_jadwal($data,$tabel){
		$this->db->insert($tabel,$data);
	}

}