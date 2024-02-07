<?php 
 
class M_Order extends CI_Model{

	function get_limit(){
		$sql="SELECT LimitValue FROM dbo.Limit WHERE LimitName ='Sales Plan'";
		return $this->db->query($sql);
	}

	function update_limit($limit){
		$sql="UPDATE dbo.Limit SET LimitValue='$limit'";
		return $this->db->query($sql);
	}

	function get_order($kode_cabang,$kode_supplier,$pweek,$tahun,$id_user){
		$sql = "EXECUTE V_OrderWeek '$kode_cabang','$kode_supplier','$pweek','$tahun','$id_user'";
		return $this->db->query($sql);
	}

	function struk_order($kode_cabang,$kode_supplier,$pweek,$tahun){
		$sql = "SELECT * FROM dbo.V_StrukOrder WHERE KodeCabang='$kode_cabang' AND KodeSupplier='$kode_supplier' AND Pweek='$pweek' AND Tahun='$tahun'";
		return $this->db->query($sql);
	}

	function principle($kode)
	{
		return $this->db
			->get_where('jass_supplier2',array(
				'Kode'	=> $kode
			));
	}

	function cetak_order($kode_cabang,$kode_supplier,$Pweek,$tahun){
		if ($kode_cabang=='00001/01') {
			$sql = "SELECT * FROM dbo.OrderBogorWeekly WHERE FinalOrderKtn<>0 AND KodePrinciple='$kode_supplier' AND Pweek='$Pweek' AND  Tahun='$tahun'";	
		}elseif ($kode_cabang=='00001/02') {
			$sql = "SELECT * FROM dbo.OrderSukabumiWeekly WHERE FinalOrderKtn<>0 AND KodePrinciple='$kode_supplier' AND Pweek='$Pweek' AND  Tahun='$tahun'";	
		}elseif ($kode_cabang=='00004/01') {
			$sql = "SELECT * FROM dbo.OrderBekasiWeekly WHERE FinalOrderKtn<>0 AND KodePrinciple='$kode_supplier' AND Pweek='$Pweek' AND  Tahun='$tahun'";	
		}elseif ($kode_cabang=='00004/02') {
			$sql = "SELECT * FROM dbo.OrderKarawangWeekly WHERE FinalOrderKtn<>0 AND KodePrinciple='$kode_supplier' AND Pweek='$Pweek' AND  Tahun='$tahun'";	
		}elseif ($kode_cabang=='00004/03') {
		$sql = "SELECT * FROM dbo.OrderPurwakartaWeekly WHERE FinalOrderKtn<>0 AND KodePrinciple='$kode_supplier' AND Pweek='$Pweek' AND  Tahun='$tahun'";	
		}elseif ($kode_cabang=='00004/04') {
			$sql = "SELECT * FROM dbo.OrderTangerangWeekly WHERE FinalOrderKtn<>0 AND KodePrinciple='$kode_supplier' AND Pweek='$Pweek' AND  Tahun='$tahun'";	
		}elseif ($kode_cabang=='00004/05') {
			$sql = "SELECT * FROM dbo.OrderSerangWeekly WHERE FinalOrderKtn<>0 AND KodePrinciple='$kode_supplier' AND Pweek='$Pweek' AND  Tahun='$tahun'";	
		}
		
		return $this->db->query($sql);
	}

	function get_supplier($kode_depo){
		// $sql="SELECT KodeSupplier, NamaSupplier FROM (
		// 		SELECT KODE AS KodeSupplier, NAMA +' - '+ KODE AS NamaSupplier FROM dbo.jass_supplier2 
		// 						WHERE NAMA NOT LIKE '%JESSINDO%' AND NAMA NOT LIKE '%JENINDO%' AND NAMA NOT LIKE 'UMUM%' AND 
		// 								LEFT(KODE,5) NOT IN ('00002','00003','00005')
		// 								AND LEFT(KODE,5) LIKE '$kode_depo%') x 
		// 								ORDER BY NamaSupplier";
		$kode_manager=$this->session->userdata('KodeManager');
		$sql = "SELECT KODE AS KodeSupplier, NAMA +' - '+ KODE AS NamaSupplier
				FROM jass_supplier2 
				JOIN (SELECT DISTINCT KodeSupplier FROM dbo.RppRegSM WHERE KodeSM='$kode_manager') AS Rpp ON KODE=KodeSupplier
				WHERE Nama NOT LIKE '%PRAKARSA%' and left(Kode,5)=LEFT('$kode_depo',5)
				ORDER BY NamaSupplier";
		return $this->db->query($sql);
	}

	function get_tahun(){
		$sql = "SELECT YEAR(DATEADD(YEAR,-1,GETDATE())) AS Tahun
				UNION ALL
				SELECT YEAR(GETDATE()) AS Tahun
				UNION ALL
				SELECT YEAR(DATEADD(YEAR,1,GETDATE())) AS tahun";
		return $this->db->query($sql);
	}

	function get_jadwaldo($kode_supplier){
		$kode_cabang=$this->session->userdata('KodeCabang');
		$sql="EXEC dbo.V_JadwalDoFixOrder @KodeCabang = '$kode_cabang',  @KodeSupplier = '$kode_supplier'";
		return $this->db->query($sql);
	}

	function tgl_indo($tanggal,$Ket){
		$bulan = array (1 =>   'Januari',
					'Februari',
					'Maret',
					'April',
					'Mei',
					'Juni',
					'Juli',
					'Agustus',
					'September',
					'Oktober',
					'November',
					'Desember'
				);
		$split = explode('-', $tanggal);
		if ($Ket=='d'){
			return $split[2]  . ' ' . $bulan[ (int) $split[1]]  . ' ' . $split[0];
		}
		elseif ($Ket=='m') {
			return $bulan [(int) $split[1]]  . ' ' . $split[0];
		}
		elseif ($Ket=='y') {
			return $split[0];
		}
		// return $bulan[ (int)$split[1] ] . ' ' . $split[0];
	}
	function get_history_all($tahun,$bulan){
		$sql="SELECT * FROM dbo.V_OrderAllWeek WHERE Tahun=$tahun AND Pweek=$bulan";
		return $this->db->query($sql);
	}
}