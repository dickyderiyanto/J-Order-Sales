<?php 
 
class M_OrderCMO extends CI_Model{

	function get_limit(){
		$sql="SELECT LimitValue FROM dbo.Limit WHERE LimitName ='Sales Plan'";
		return $this->db->query($sql);
	}

	function update_limit($limit){
		$sql="UPDATE dbo.Limit SET LimitValue='$limit'";
		return $this->db->query($sql);
	}

	function get_order($kode_cabang,$kode_supplier,$periode,$tahun,$id_user){
		$sql = "EXECUTE V_Order2 '$kode_cabang','$kode_supplier',$periode,$tahun,'$id_user'";
		return $this->db->query($sql);
	}

	function struk_order($kode_cabang,$kode_supplier,$periode,$tahun){
		$sql = "SELECT * FROM dbo.V_StrukOrder WHERE KodeCabang='$kode_cabang' AND KodeSupplier='$kode_supplier' AND Periode='$periode' AND Tahun='$tahun'";
		return $this->db->query($sql);
	}

	function cetak_order($kode_cabang,$kode_supplier,$periode,$tahun){
		if ($kode_cabang=='00001/01') {
			$sql = "SELECT * FROM dbo.OrderBogor WHERE FinalOrderKtn<>0 AND KodePrinciple='$kode_supplier' AND Periode=$periode AND Tahun=$tahun";	
		}elseif ($kode_cabang=='00001/02') {
			$sql = "SELECT * FROM dbo.OrderSukabumi WHERE FinalOrderKtn<>0 AND KodePrinciple='$kode_supplier' AND Periode=$periode AND Tahun=$tahun";
		}elseif ($kode_cabang=='00004/01') {
			$sql = "SELECT * FROM dbo.OrderBekasi WHERE FinalOrderKtn<>0 AND KodePrinciple='$kode_supplier' AND Periode=$periode AND Tahun=$tahun";
		}elseif ($kode_cabang=='00004/02') {
			$sql = "SELECT * FROM dbo.OrderKarawang WHERE FinalOrderKtn<>0 AND KodePrinciple='$kode_supplier' AND Periode=$periode AND Tahun=$tahun";
		}elseif ($kode_cabang=='00004/03') {
			$sql = "SELECT * FROM dbo.OrderPurwakarta WHERE FinalOrderKtn<>0 AND KodePrinciple='$kode_supplier' AND Periode=$periode AND Tahun=$tahun";
		}elseif ($kode_cabang=='00004/04') {
			$sql = "SELECT * FROM dbo.OrderTangerang WHERE FinalOrderKtn<>0 AND KodePrinciple='$kode_supplier' AND Periode=$periode AND Tahun=$tahun";
		}elseif ($kode_cabang=='00004/05') {
			$sql = "SELECT * FROM dbo.OrderSerang WHERE FinalOrderKtn<>0 AND KodePrinciple='$kode_supplier' AND Periode=$periode AND Tahun=$tahun";
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
		$sql="SELECT * FROM dbo.V_OrderAll WHERE Tahun=$tahun AND Periode=$bulan";
		return $this->db->query($sql);
	}
}