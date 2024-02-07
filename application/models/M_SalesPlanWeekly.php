<?php 
 
class M_SalesPlanWeekly extends CI_Model{

	function cek_salesplan($kode,$kode_manager){
		$sql = "SELECT * FROM dbo.ProdukSalesPlanWeekly
				WHERE Kode='$kode' AND KodeManager=''";
		return $this->db->query($sql);
	}

	function get_supplier(){
		$kode_cabang=substr($this->session->userdata('KodeCabang'),0,5);
		$kode_manager=$this->session->userdata('KodeUser');
		$sql = "SELECT Kode as KodeSupplier, Nama +' - '+ Kode as NamaSupplier 
				FROM jass_supplier2 
				JOIN (SELECT DISTINCT KodeSupplier FROM dbo.RppRegSM WHERE KodeSM IN $kode_manager) AS Rpp ON KODE=KodeSupplier				
				WHERE Nama NOT LIKE '%PRAKARSA%' and left(Kode,5)='$kode_cabang'
				ORDER BY NamaSupplier";
		return $this->db->query($sql);
	}	

	function get_produkflag($kode,$kode_manager){
		$kode_cabang =$this->session->userdata('KodeCabang');
		$xPweek=$this->session->userdata('PeriodeWeek');
		$xTahun=$this->session->userdata('Tahun');
		if ($kode==1) {
			$sql = "SELECT ps.Kode, NamaProduk, Kemasan, NamaGrp, NAMA AS NamaSupplier, NamaManager AS SM, 
					CAST(ps.SalesPlan AS INT) AS SalesPlan, SalesPlanKtn 
					FROM dbo.Produk p
					JOIN dbo.ProdukSalesPlanWeekly ps ON p.KodeProduk=ps.KodeProduk AND KodeGrp=KodeGroup
					JOIN dbo.jass_supplier2 s ON KodeSupplier=s.KODE
					JOIN (SELECT DISTINCT KodeManager, NamaManager FROM dbo.Salesman) m ON ps.KodeManager=m.KodeManager
					WHERE ps.ProdukFlag='$kode' AND ps.KodeManager LIKE '$kode_manager%' AND LEFT(KodeSupplier,5)=left('$kode_manager',5) AND 
					(CASE WHEN KodeGrp='SGLB' AND KodeSupplier='00001/0000005' THEN NULL ELSE KodeSupplier END) IS NOT NULL
					AND NAMA NOT LIKE '%JENINDO%' AND NAMA NOT LIKE '%JESSINDO%' AND NAMA NOT LIKE '%PT. AGARINDO BOGATAMA%'
					AND PWeek='$xPweek' AND Tahun='$xTahun'";
			return $this->db->query($sql);
		}elseif ($kode==2) {
			$sql = "SELECT ps.Kode, NamaProduk, Kemasan, NamaGrp, NAMA AS NamaSupplier, NamaManager AS SM, 
					CAST(ps.SalesPlan AS INT) AS SalesPlan, SalesPlanKtn 
					FROM dbo.Produk p
					JOIN dbo.ProdukSalesPlanWeekly ps ON p.KodeProduk=ps.KodeProduk AND KodeGrp=KodeGroup
					JOIN dbo.jass_supplier2 s ON KodeSupplier=s.KODE
					JOIN (SELECT DISTINCT KodeManager, NamaManager FROM dbo.Salesman) m ON ps.KodeManager=m.KodeManager
					WHERE ps.ProdukFlag='$kode' AND ps.KodeManager LIKE '$kode_manager%' AND LEFT(KodeSupplier,5)=left('$kode_manager',5) AND 
					(CASE WHEN KodeGrp='SGLB' AND KodeSupplier='00001/0000005' THEN NULL ELSE KodeSupplier END) IS NOT NULL
					AND NAMA NOT LIKE '%JENINDO%' AND NAMA NOT LIKE '%JESSINDO%' AND NAMA NOT LIKE '%PT. AGARINDO BOGATAMA%'
					AND PWeek='$xPweek' AND Tahun='$xTahun'";
			return $this->db->query($sql);
		}elseif ($kode==3) {
			$sql = "SELECT  ps.Kode, NamaProduk, Kemasan, NamaGrp, NAMA AS NamaSupplier 
	 				FROM dbo.Produk p
					JOIN dbo.ProdukSalesPlanWeekly ps ON p.KodeProduk=ps.KodeProduk AND KodeGrp=KodeGroup
					JOIN dbo.jass_supplier2 s ON KodeSupplier=s.KODE
					WHERE ps.ProdukFlag='$kode' AND ps.KodeCabang LIKE '$kode_cabang%' AND LEFT(KodeSupplier,5)=left('$kode_cabang',5) AND 
					(CASE WHEN KodeGrp='SGLB' AND KodeSupplier='00001/0000005' THEN NULL ELSE KodeSupplier END) IS NOT NULL";
			return $this->db->query($sql);
		}elseif ($kode==4) {
			$sql = "SELECT ps.Kode, NamaProduk, Kemasan, NamaGrp, NAMA AS NamaSupplier, NamaManager AS SM, SalesPlanKtn 
					FROM dbo.Produk p
					JOIN dbo.ProdukSalesPlanWeekly ps ON p.KodeProduk=ps.KodeProduk AND KodeGrp=KodeGroup
					JOIN dbo.jass_supplier2 s ON KodeSupplier=s.KODE
					JOIN (SELECT DISTINCT KodeManager, NamaManager FROM dbo.Salesman) m ON ps.KodeManager=m.KodeManager
					WHERE ps.ProdukFlag='$kode' AND ps.KodeManager LIKE '$kode_manager%' AND LEFT(KodeSupplier,5)=left('$kode_manager',5) AND 
					(CASE WHEN KodeGrp='SGLB' AND KodeSupplier='00001/0000005' THEN NULL ELSE KodeSupplier END) IS NOT NULL
					AND NAMA NOT LIKE '%JENINDO%' AND NAMA NOT LIKE '%JESSINDO%' AND NAMA NOT LIKE '%PT. AGARINDO BOGATAMA%'  
					AND PWeek='$xPweek' AND Tahun='$xTahun'";
			return $this->db->query($sql);
		}
	}

	function get_produkflag2($produk_flag,$kode,$kode_manager){
		if ($produk_flag==1) {
			// $sql = "SELECT ps.Kode, p.KodeProduk, NamaProduk +' ('+ Kemasan +')' AS NamaProduk, NamaGrp, NAMA AS NamaSupplier, NamaManager AS SM, 
			// 		CAST(ps.SalesPlan AS INT) AS SalesPlan, SalesPlanKtn 
			// 		FROM dbo.Produk p
			// 		JOIN dbo.ProdukSalesPlanWeekly ps ON p.KodeProduk=ps.KodeProduk AND KodeGrp=KodeGroup
			// 		JOIN dbo.jass_supplier2 s ON KodeSupplier=s.KODE
			// 		JOIN (SELECT DISTINCT KodeManager, NamaManager FROM dbo.Salesman) m ON ps.KodeManager=m.KodeManager
			// 		WHERE ps.ProdukFlag='$produk_flag' AND ps.KodeManager LIKE '$kode_manager%' AND LEFT(KodeSupplier,5)=left('$kode_manager',5) AND 
			// 		(CASE WHEN KodeGrp='SGLB' AND KodeSupplier='00001/0000005' THEN NULL ELSE KodeSupplier END) IS NOT NULL
			// 		AND NAMA NOT LIKE '%JENINDO%' AND NAMA NOT LIKE '%JESSINDO%' AND NAMA NOT LIKE '%PT. AGARINDO BOGATAMA%' 
			// 		AND ps.Kode='$kode'";
				$sql = "SELECT ps.Kode, p.KodeProduk, p.NamaProduk +' ('+ Kemasan +')' AS NamaProduk, NamaGrp, NAMA AS NamaSupplier, NamaManager AS SM, 
						CAST(ps.SalesPlan AS INT) AS SalesPlan, SalesPlanKtn, dbo.f_AmbilRppMinggu(KODESM, p.KodeSupplier, 
						p.KodeGrp,p.KodeProduk) AS RppBulan, ISNULL(l.Limit,0) AS Limit 
							FROM dbo.Produk p
							JOIN dbo.ProdukSalesPlanWeekly ps ON p.KodeProduk=ps.KodeProduk AND KodeGrp=KodeGroup
							JOIN dbo.jass_supplier2 s ON KodeSupplier=s.KODE
							JOIN (SELECT DISTINCT KodeManager, NamaManager FROM dbo.Salesman) m ON ps.KodeManager=m.KodeManager
							JOIN (SELECT * FROM dbo.RppRegSM WHERE KodeSM IN $kode_manager) AS Rpp ON p.KodeProduk=Rpp.KODEPRODUK  
						LEFT JOIN dbo.LimitSpProduk l ON p.KodeSupplier=l.KodeSupplier AND p.KodeGrp=l.KodeGroup AND p.KodeProduk=l.KodeProduk
							WHERE ps.ProdukFlag='1' AND ps.KodeManager LIKE '$kode_manager%' AND LEFT(p.KodeSupplier,5)=left('$kode_manager',5) AND 
							(CASE WHEN p.KodeGrp='SGLB' AND p.KodeSupplier='00001/0000005' THEN NULL ELSE p.KodeSupplier END) IS NOT NULL
							AND NAMA NOT LIKE '%JENINDO%' AND NAMA NOT LIKE '%JESSINDO%' AND NAMA NOT LIKE '%PT. AGARINDO BOGATAMA%' 
							AND ps.Kode='$kode'";
			return $this->db->query($sql);
		// }elseif ($kode===2) {
		// 	# code...
		// }elseif ($kode==3) {
		// }elseif ($kode===4) {
		// 	# code...
		}
	}

	function getAllProdukWithFlag($kodeSupplier){
		$kode_manager=$this->session->userdata('KodeManager');
		$xPweek=$this->session->userdata('PeriodeWeek');
		$xTahun=$this->session->userdata('Tahun');
		return $this->db
			->select('
				pr.KodeSupplier, 
				pr.KodeGrp, 
				pr.NamaGrp, 
				pr.KodeProduk, 
				pr.NamaProduk + \' (\' + pr.Kemasan + \')\' NamaProduk,
				CASE WHEN sp.Kode IS NULL THEN \'5\' + pr.KodeProduk + pr.KodeGrp ELSE sp.Kode END KodeSalesPlan,
				ISNULL(sp.ProdukFlag,5) ProdukFlag,
				dbo.f_AmbilRppMinggu(rpp.KODESM, pr.KodeSupplier, pr.KodeGrp, pr.KodeProduk) AS RppBulan,
				ISNULL(sp.SalesPlanKtn,dbo.f_AmbilRppMinggu(rpp.KODESM, pr.KodeSupplier, pr.KodeGrp, pr.KodeProduk)) SalesPlanKtn,
				sp.SalesPlan,
				ISNULL(l.Limit,0) AS Limit
				')
			->from('Produk pr')
			->join('(SELECT * FROM dbo.RppRegSM WHERE KodeSM=\''.$kode_manager.'\') Rpp','pr.KodeProduk=Rpp.KODEPRODUK')
			->join('ProdukSalesPlanWeekly sp','pr.KodeProduk = sp.KodeProduk AND Rpp.KODESM = sp.KodeManager AND sp.Tahun = '.$xTahun.' AND sp.Pweek = '.$xPweek,'left')
			->join('LimitSpProduk l','pr.KodeSupplier = l.KodeSupplier AND pr.KodeGrp = l.KodeGroup AND pr.KodeProduk = l.KodeProduk','left')
			->where(array(
				'pr.KodeProduk NOT LIKE'	=> '%***%',
				'pr.KodeSupplier LIKE'		=>  $kodeSupplier.'%',
			))
			->order_by('pr.KodeSupplier, pr.NamaGrp, pr.NamaProduk + \' (\' + pr.Kemasan + \')\'')
			->get();
	}

	function get_produk($depo,$supplier,$group){
		$kode_manager=$this->session->userdata('KodeUser');
		$kode_cabang =$this->session->userdata('KodeCabang');
		$xPweek=$this->session->userdata('PeriodeWeek');
		$xTahun=$this->session->userdata('Tahun');
		$sql = "SELECT Produk.KodeProduk, Produk.NamaProduk +' ('+ Kemasan +')'  as NamaProduk 
				FROM 	Produk
				JOIN (SELECT * FROM dbo.RppRegSM WHERE KodeSM IN $kode_manager) AS Rpp ON Produk.KodeProduk=Rpp.KODEPRODUK  
				WHERE Produk.KodeProduk NOT IN (SELECT DISTINCT KodeProduk FROM dbo.ProdukSalesPlanWeekly WHERE (KodeManager IN $kode_manager OR KodeCabang=LEFT('$kode_cabang',8)) AND Pweek='$xPweek'  AND Tahun=$xTahun ) AND Produk.NamaProduk NOT LIKE '%***%' AND
				Produk.KodeSupplier like '$depo'+'/$supplier%' AND Produk.KodeGrp LIKE '$group%'
				GROUP BY Produk.KodeProduk, Produk.NamaProduk, Produk.Kemasan";
		return $this->db->query($sql);
	}

	function get_produk2($depo,$supplier,$group){
		$kode_manager=$this->session->userdata('KodeUser');
		$kode_cabang =$this->session->userdata('KodeCabang');
		$xPweek=$this->session->userdata('PeriodeWeek');
		$xTahun=$this->session->userdata('Tahun');
		$sql = "SELECT p.KodeProduk, p.NamaProduk +' ('+ Kemasan +')'  as NamaProduk, SUM(rpp.RPPQty) AS RppBulan, ISNULL(l.Limit,0) AS Limit
		-- dbo.f_AmbilRppMinggu(KODESM, p.KodeSupplier, p.KodeGrp,p.KodeProduk) 
				
				FROM 	Produk p
				JOIN (SELECT * FROM dbo.RppRegSM WHERE KodeSM IN $kode_manager AND KodeSupplier like '$depo'+'/$supplier%') AS Rpp ON p.KodeProduk=Rpp.KODEPRODUK  
				LEFT JOIN dbo.LimitSpProduk l ON p.KodeSupplier=l.KodeSupplier AND p.KodeGrp=l.KodeGroup AND p.KodeProduk=l.KodeProduk
				WHERE p.KodeProduk NOT IN (SELECT DISTINCT KodeProduk FROM dbo.ProdukSalesPlanWeekly WHERE (KodeManager IN $kode_manager OR KodeCabang=LEFT('$kode_cabang',8)) AND Pweek=$xPweek AND Tahun=$xTahun AND ProdukFlag IN (1,4)) AND
				p.KodeProduk NOT IN (SELECT DISTINCT KodeProduk FROM dbo.ProdukSalesPlanWeekly WHERE (KodeManager IN $kode_manager OR KodeCabang=LEFT('$kode_cabang',8)) AND ProdukFlag IN (2,3)) AND p.NamaProduk NOT LIKE '%***%' AND
				p.KodeSupplier like '$depo'+'/$supplier%' AND p.KodeGrp LIKE '$group%' 
				GROUP BY p.KodeProduk, p.NamaProduk, p.Kemasan, l.Limit";
				// -- AND dbo.f_AmbilRppMinggu(KODESM, p.KodeSupplier, p.KodeGrp,p.KodeProduk) > 0
		return $this->db->query($sql);
	}

	function get_produk3($supplier,$group){
		$kode_manager=$this->session->userdata('KodeUser');
		$kode_cabang =$this->session->userdata('KodeCabang');
		$xPweek=$this->session->userdata('PeriodeWeek');
		$xTahun=$this->session->userdata('Tahun');
		$sql = "SELECT p.KodeProduk, p.NamaProduk +' ('+ Kemasan +')'  as NamaProduk, SUM(rpp.RPPQty) AS RppBulan, ISNULL(l.Limit,0) AS Limit
				FROM 	Produk p
				JOIN (SELECT * FROM dbo.RppRegSM WHERE KodeSM IN $kode_manager) AS Rpp ON p.KodeProduk=Rpp.KODEPRODUK  
				LEFT JOIN dbo.LimitSpProduk l ON p.KodeSupplier=l.KodeSupplier AND p.KodeGrp=l.KodeGroup AND p.KodeProduk=l.KodeProduk
				WHERE p.KodeProduk NOT IN (SELECT DISTINCT KodeProduk FROM dbo.ProdukSalesPlanWeekly WHERE (KodeManager IN $kode_manager OR KodeCabang=LEFT('$kode_cabang',8)) AND Pweek=$xPweek  AND Tahun=$xTahun AND ProdukFlag IN (1,4)) AND
				p.KodeProduk NOT IN (SELECT DISTINCT KodeProduk FROM dbo.ProdukSalesPlanWeekly WHERE (KodeManager IN $kode_manager OR KodeCabang=LEFT('$kode_cabang',8)) AND ProdukFlag IN (2,3)) AND p.NamaProduk NOT LIKE '%***%' AND
				p.KodeSupplier like '$supplier%' AND p.KodeGrp LIKE '$group%'
				GROUP BY p.KodeProduk, p.NamaProduk, p.Kemasan, l.Limit ";
				// AND dbo.f_AmbilRppMinggu(KODESM, p.KodeSupplier, p.KodeGrp,p.KodeProduk) > 0";
		return $this->db->query($sql);
	}

	function get_group($depo,$supplier){
		$kode_manager=$this->session->userdata('KodeManager');
		$sql = "SELECT Distinct KodeGrp, NamaGrp FROM Produk 
				JOIN (SELECT DISTINCT KodeSupplier FROM dbo.RppRegSM WHERE KodeSM='$kode_manager') AS Rpp ON Produk.KodeSupplier=Rpp.KodeSupplier
				JOIN (SELECT DISTINCT KodeSupplier FROM dbo.Produk) p ON Rpp.KodeSupplier = p.KodeSupplier
				WHERE Produk.KodeSupplier like '$depo'+'/$supplier%' AND
				(CASE WHEN KodeGrp='SGLB' AND Produk.KodeSupplier='00001/0000005' THEN NULL ELSE Produk.KodeSupplier END) IS NOT NULL";
		return $this->db->query($sql);
	}

	function get_rpp_bulan($supplier,$supplier2,$group,$produk){
		$sql = "SELECT dbo.f_AmbilRppMinggu('".$this->session->userdata('KodeManager')."','$supplier'+'/$supplier2','$group','$produk') AS RppBulan";
		return $this->db->query($sql);
	}
 
	function add_salesplan($data,$tabel){
		$this->db->insert($tabel,$data);
	}

	function add_salesplan2($kode,$produk_flag,$kode_supplier,$kode_produk,$kode_group,$kode_cabang,$kode_manager,$sales_plan,$sales_plan_ktn){
   		$xPweek=$this->session->userdata('PeriodeWeek');
		$xTahun=$this->session->userdata('Tahun');
		$sql = "EXEC dbo.Add_SalesPlanWeekly 
				@Kode = '$kode',  @ProdukFlag = $produk_flag, @KodeSupplier='$kode_supplier',  @KodeProduk = '$kode_produk',  @KodeGroup = '$kode_group',  
				@KodeCabang = '$kode_cabang',  @KodeManager = '$kode_manager',  @SalesPlan = $sales_plan,  @SalesPlanKtn = $sales_plan_ktn, @PWeek= '$xPweek', @Tahun = $xTahun ";
		$this->db->query($sql);
	}

	function delete_salesplan_weekly($produk_flag,$kode){
		$kode_cabang=$this->session->userdata('KodeCabang');
		$kode_manager=$this->session->userdata('KodeManager');
		$xPweek=$this->session->userdata('PeriodeWeek');
		$xTahun=$this->session->userdata('Tahun');
		if ($produk_flag==1) {
			$sql = "DELETE FROM dbo.ProdukSalesPlanWeekly WHERE ProdukFlag='$produk_flag' AND Kode='$kode' AND KodeManager='$kode_manager' 
					AND Pweek='$xPweek'  AND Tahun=$xTahun";
			$this->db->query($sql);
		}elseif ($produk_flag==2) {
			# code...
		}elseif ($produk_flag==3) {
			$sql = "DELETE FROM dbo.ProdukSalesPlanWeekly WHERE ProdukFlag='$produk_flag' AND Kode='$kode' AND KodeCabang='$kode_cabang'";
			$this->db->query($sql);			
		}elseif ($produk_flag==4) {
			$sql = "DELETE FROM dbo.ProdukSalesPlanWeekly WHERE ProdukFlag='$produk_flag' AND Kode='$kode' AND KodeManager='$kode_manager' 
					and PeriodeWeek='$xPweek' AND Tahun=$xTahun";
			$this->db->query($sql);
		}
		
	}

	function get_limit_produk($supplier,$supplier2,$group,$produk){
		$sql = "SELECT Limit FROM dbo.LimitSpProduk WHERE KodeSupplier='$supplier'+'/$supplier2' AND KodeGroup='$group' AND KodeProduk='$produk'";
		return $this->db->query($sql);
	}

	function copy_salesplan($produk_flag,$kode_manager,$tahun,$periode_now,$tahun_now){
		if ($produk_flag==1) {
			$sql = "EXEC dbo.Copy_SalesPlan
					@ProdukFlag = $produk_flag, 
					@KodeManager = '$kode_manager', 
					@Pweek = $Pweek, 
					@Tahun = $tahun,
					@PeriodeNow = $periode_now,
					@TahunNow = $tahun_now ";
			$this->db->query($sql);
		// }elseif ($kode===2) {
		// 	# code...
		// }elseif ($kode==3) {
		// }elseif ($kode===4) {
		// 	# code...
		}
	}

	function deleteSalesplanWhere($where)
	{
		$this->db->where($where);
		$this->db->delete('ProdukSalesPlanWeekly');
	}

	function insertSalesPlanKlasifikasi($data)
	{
		$this->db->insert('ProdukSalesPlanWeekly',$data);
	}

}