<?php 
 
class M_stok extends CI_Model{

	function get_supplier(){
		$this->db->select('*');
		$this->db->from('Supplier');
		return $this->db->get();
	}

	function get_bssupplier($supplier){
		$sql = "SELECT '0/0' AS id, '--- Set to All Supplier ---' as text
				UNION ALL
				SELECT DISTINCT s.Kode as id, s.Nama+' - '+s.Kode as text 
				FROM dbo.BSProduk RIGHT JOIN dbo.jass_supplier2 s ON s.Kode=BSProduk.KodeSupplier 
				WHERE s.Kode LIKE '$supplier%' AND (s.Nama Not LIKE '%JESSINDO%' AND s.Nama Not LIKE '%JENINDO%')
				AND LEFT(s.Kode,5) IN ('00001','00004')
				ORDER BY text";
		return $this->db->query($sql);
	}

	function get_bsgroup($depo,$supplier){
		$sql = "SELECT '0' AS id, '--- Set to All Group ---' as text
				UNION ALL
				SELECT DISTINCT B.KodeGrp as id, B.NamaGrp as text FROM BSProduk as A RIGHT JOIN (SELECT Distinct(KodeGrp) , NamaGrp, KodeSupplier FROM Produk WHERE KodeSupplier like '$depo'+'/$supplier%') as B ON B.KodeGrp=A.KodeGroup";
		return $this->db->query($sql);
	}

	function get_produk($group){
		$sql = "DECLARE @GroupTemp AS VARCHAR(50)
				IF '$group'='0'
					SET @GroupTemp=''
				ELSE
					SET @GroupTemp='$group'
							
				SELECT '0' AS id, '--- Set to All Produk ---' as text
				UNION ALL
				SELECT DISTINCT(KodeProduk) AS id, NamaProduk +' -'+ KodeProduk +' ('+ Kemasan +')' AS text 
				FROM dbo.Produk WHERE KodeGrp like '%'+@GroupTemp+'%'";
		return $this->db->query($sql);
	}

	function get_bsproduk($depo,$supplier,$produk,$group,$periode,$tahun){
		$sql = "DECLARE @ProdukTemp AS VARCHAR(50)
				DECLARE @GroupTemp AS VARCHAR(50)
				IF '$produk'='0'
					SET @ProdukTemp=''
				ELSE
					SET @ProdukTemp='$produk'

				IF '$group'='0'
					SET @GroupTemp=''
				ELSE
					SET @GroupTemp='$group'

				SELECT DISTINCT NAMA +' ('+ KODE +')' AS NamaSupplier, NamaGrp, NamaProduk +' -'+ Produk.KodeProduk +' ('+ Kemasan +')' AS NamaProduk, ISNULL(BSDays,0) AS BSDays
				FROM Produk 
				JOIN (SELECT * FROM dbo.jass_supplier2
						WHERE LEFT(KODE,5) IN ('00001','00004')) s ON dbo.Produk.KodeSupplier=s.KODE 
				LEFT JOIN (SELECT * FROM dbo.BSProduk WHERE Periode='$periode' AND Tahun='$tahun') BSP ON BSP.KodeProduk=Produk.KodeProduk  AND BSP.KodeSupplier=s.KODE
				WHERE Produk.KodeProduk LIKE '%' + @ProdukTemp + '%' AND Produk.KodeGrp like '%' + @GroupTemp + '%' and SUBSTRING(Produk.KodeSupplier, 1, 5) LIKE '%".$depo."%' and 
						SUBSTRING(Produk.KodeSupplier, 7, 8) like '%".$supplier."%' AND NAMA NOT LIKE '%jessindo%' 
						AND NAMA NOT LIKE '%jenindo%' AND NamaProduk NOT LIKE '%***%'
				ORDER BY NamaSupplier, NamaGrp, NamaProduk";
		return $this->db->query($sql);
	}

	function update_bsproduk($KodeSupplier,$KodeGroup,$KodeProduk,$IronStok,$Periode,$Tahun){

		$sql = "EXECUTE dbo.AD_BSProduk 
						@KodeSupplier = '".$KodeSupplier."',  
						@KodeGroup = '".$KodeGroup."',  
						@KodeProduk = '".$KodeProduk."',  
						@IronStok = ".$IronStok.",  
						@Periode = ".$Periode.",  
						@Tahun = ".$Tahun." ";
		return $this->db->query($sql);
	}

		function get_limitproduk($depo,$supplier,$produk,$group){
		$sql = "DECLARE @ProdukTemp AS VARCHAR(50)
				DECLARE @GroupTemp AS VARCHAR(50)
				IF '$produk'='0'
					SET @ProdukTemp=''
				ELSE
					SET @ProdukTemp='$produk'

				IF '$group'='0'
					SET @GroupTemp=''
				ELSE
					SET @GroupTemp='$group'

				SELECT DISTINCT NAMA +' ('+ KODE +')' AS NamaSupplier, NamaGrp, NamaProduk +' -'+ Produk.KodeProduk +' ('+ Kemasan +')' AS NamaProduk, ISNULL(Limit,0) AS Limit
				FROM Produk 
				JOIN (SELECT * FROM dbo.jass_supplier2
						WHERE LEFT(KODE,5) IN ('00001','00004')) s ON dbo.Produk.KodeSupplier=s.KODE
				LEFT JOIN (SELECT * FROM dbo.LimitSpProduk) LSP ON LSP.KodeProduk=Produk.KodeProduk  AND LSP.KodeSupplier=s.KODE 
				WHERE Produk.KodeProduk LIKE '%' + @ProdukTemp + '%' AND Produk.KodeGrp like '%' + @GroupTemp + '%' and SUBSTRING(Produk.KodeSupplier, 1, 5) LIKE '%".$depo."%' and 
						SUBSTRING(Produk.KodeSupplier, 7, 8) like '%".$supplier."%' AND NAMA NOT LIKE '%jessindo%' 
						AND NAMA NOT LIKE '%jenindo%' AND NamaProduk NOT LIKE '%***%'
				ORDER BY NamaSupplier, NamaGrp, NamaProduk";
		return $this->db->query($sql);
	}

	function update_limitproduk($KodeSupplier,$KodeGroup,$KodeProduk,$Limit){

		$sql = "EXECUTE dbo.AD_LimitSpProduk 
						@KodeSupplier = '".$KodeSupplier."',  
						@KodeGroup = '".$KodeGroup."',  
						@KodeProduk = '".$KodeProduk."',   
						@Limit = ".$Limit." ";
		return $this->db->query($sql);
	}

}