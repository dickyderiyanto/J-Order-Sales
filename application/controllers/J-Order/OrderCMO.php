<?php
ini_set('memory_limit', '1024M');
set_time_limit(0);
date_default_timezone_set("Asia/Jakarta");

defined('BASEPATH') OR exit('No direct script access allowed');

class OrderCMO extends CI_Controller {

	var $data;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("Login"));
		}

		$this->data = array(
			'program' 		=> 'J-Order'
		);

		$this->load->model('M_OrderCMO');
		$this->load->helper('Print_rekap_helper');
	}

	public function index()
	{
		$data = $this->data;
		$data['judul'] = "Order CMO";

		// $data['order'] = $this->M_OrderCMO->get_order(
		// 			0)->result();

		$this->load->view('v_header',$data);
		$this->load->view('J-Order/v_menu');
		$this->load->view('J-Order/v_orderCMO',$data);
		$this->load->view('v_footer');
		// echo base_url('assets/css/bootstrap.min.css');

		$tampil_data=1;
	}

	// function get_order($kode,$supplier){
	// 	$kode_cabang=substr($this->session->userdata('KodeManager'),0,5);
	// 	$kode_supplier=$kode."/".$supplier;
	// 	$data = $this->M_OrderCMO->get_order($kode_cabang,$kode_supplier)->result();
	// 	echo json_encode($data);
	// }

	public function ajax_principle() {
		$kode_cabang=substr($this->session->userdata('KodeManager'),0,5);
       	$data = $this->M_OrderCMO->get_supplier($kode_cabang)->result();
		echo json_encode($data);
   }

   public function ajax_order($kode,$supplier) {
   		$kode_cabang=substr($this->session->userdata('KodeManager'),0,8);
   		$xIdUser=$this->session->userdata('Nip');
	  	$xPeriode=$this->session->userdata('Periode');
		$xTahun=$this->session->userdata('Tahun');
		$kode_supplier=$kode."/".$supplier;
		$data = $this->M_OrderCMO->get_order($kode_cabang,$kode_supplier,$xPeriode,$xTahun,$xIdUser)->result();
       	// $result = $this->M_OrderCMO->get_order(0)->result();
		echo json_encode($data);
   }

   public function ajax_jadwaldo($kode,$supplier) {
		$kode_supplier=$kode."/".$supplier;
		$data = $this->M_OrderCMO->get_jadwaldo($kode_supplier)->result();
       	// $result = $this->M_OrderCMO->get_order(0)->result();
		echo json_encode($data);
   }

   public function cetak($id,$id2)
	  {
	  	$kode_cabang=$this->session->userdata('KodeCabang');
	  	$xPrinciple=$id."/".$id2;
	    $xPeriode=$this->session->userdata('Periode');
		$xTahun=$this->session->userdata('Tahun');

	    // ambil data dengan memanggil fungsi di model
	    $temp_rec = $this->M_OrderCMO->cetak_order($kode_cabang,$xPrinciple,$xPeriode,$xTahun);
	    $num_rows = $temp_rec->num_rows();

	    if($num_rows > 0) // jika data ada di database
	    {
	      // memanggil (instantiasi) class reportProduct di file print_rekap_helper.php
	      $a=new Print_rekap_helper(); //$this->Print_rekap_helper();
	      // anda dapat membuat report lainnya dalam satu file print_rekap_helper.php
	      // dengan cukup mengubah setKriteria dan membuat kondisi (elseif) di file print_rekap_helper.php
	      $a->setKriteria("order");
	      $a->setCabang($kode_cabang);
	      $a->setNamaCabang($this->session->userdata('NamaCabang'));
	      $a->setAlamatCabang($this->session->userdata('Alamat'));
	      $a->setTelp($this->session->userdata('Telepon'));
	      // judul report
	      $a->setNama("PURCHASE ORDER");
	      // buat halaman
	      $a->AliasNbPages();
	      // Potrait ukuran A4
	      $a->AddPage("L","A4");

	      // ambil data dari database
	      $data=$temp_rec->row();

	      $a->Ln(2); // spasi enter
	      // $a->SetWidths(array(20,23));
	      $a->SetFont('Arial','B',8); // set font,size,dan properti (B=Bold)
	      $a->Cell(15,4,'No. PO',2,0,'L');
	      $a->Cell(2,4,':',2,0,'L');
	      $a->Cell(2,4,$data->NoStruk,0,1,'L');
	      $a->Cell(2,4,'  ',0,1,'L');
	      $a->Cell(20,4,'Kepada Yth,',0,1,'L');
	      
	      $a->Cell(0,4,$data->NamaPrinciple,0,1,'L');
	      // $a->Cell(2,4,$data->NamaPrinciple,2,0,'L');
	      // $a->Cell(20,4,'Distributor',2,0,'L');
	      // $a->Cell(2,4,':',2,0,'L');
	      // if ($kode_cabang=='00001/01'){
	      // 	$a->Cell(0,4,$this->session->userdata('NamaCabang'),0,1,'L');
	      // } else if ($kode_cabang=='00001/02'){
	      // 	$a->Cell(0,4,$this->session->userdata('NamaCabang'),0,1,'L');
	      // } else if ($kode_cabang=='00004/01'){
	      // 	$a->Cell(0,4,$this->session->userdata('NamaCabang'),0,1,'L');
	      // } else if ($kode_cabang=='00004/02'){
	      // 	$a->Cell(0,4,$this->session->userdata('NamaCabang'),0,1,'L');
	      // } else if ($kode_cabang=='00004/03'){
	      // 	$a->Cell(0,4,$this->session->userdata('NamaCabang'),0,1,'L');
	      // } else if ($kode_cabang=='00004/04'){
	      // 	$a->Cell(0,4,$this->session->userdata('NamaCabang'),0,1,'L');
	      // }
	      // $a->Cell(20,4,'NPWP',2,0,'L');
	      // $a->Cell(2,4,':',2,0,'L');
	      // if ($kode_cabang=='00001/01'){
	      // 	$a->Cell(0,4,$this->session->userdata('NPWP'),0,1,'L');
	      // } else if ($kode_cabang=='00001/02'){
	      // 	$a->Cell(0,4,$this->session->userdata('NPWP'),0,1,'L');
	      // } else if ($kode_cabang=='00004/01'){
	      // 	$a->Cell(0,4,$this->session->userdata('NPWP'),0,1,'L');
	      // } else if ($kode_cabang=='00004/02'){
	      // 	$a->Cell(0,4,$this->session->userdata('NPWP'),0,1,'L');
	      // } else if ($kode_cabang=='00004/03'){
	      // 	$a->Cell(0,4,$this->session->userdata('NPWP'),0,1,'L');
	      // } else if ($kode_cabang=='00004/04'){
	      // 	$a->Cell(0,4,$this->session->userdata('NPWP'),0,1,'L');
	      // }
	      $a->Ln(2);

	      $a->SetFont('Arial','',8);
	      // set lebar tiap kolom tabel transaksi
	      $a->SetWidths(array(7,16,70,15,20));
	      // set align tiap kolom tabel transaksi
	      $a->SetAligns(array("C","C","L","C","R"));
	      $a->SetFont('Arial','B',7);
	      $a->Ln(2);
	      // // set nama header tabel transaksi
	      $a->Cell(7,12,'No.',1,0,'C');
	      $a->Cell(16,12,'Kode Barang',1,0,'C');
	      $a->Cell(70,12,'Nama Barang',1,0,'C');
	      $a->Cell(15,12,'Satuan',1,0,'C');
	      $a->Cell(20,12,'Total Order',1,0,'C');
	      // $a->Cell(60,4,'Jadwal Pengiriman',1,0,'C');
	      // $a->Ln(4);
	      // $a->Cell(40,4,'Week 1',1,0,'C');
	      // $a->Cell(10,3,'Senin',1,0,'C');
	      // $a->Cell(10,3,'Selasa',1,0,'C');
	      // $a->Cell(10,3,'Rabu',1,0,'C');
	      // $a->Cell(10,3,'Kamis',1,0,'C');
	      // $a->Cell(10,3,'Jumat',1,0,'C');
	      // $a->Cell(10,3,'Sabtu',1,0,'C');
	      
	      $a->Ln(12);

	      $a->SetFont('Arial','',8);

	      $rec = $temp_rec->result();
	      $n=0;
	      $total=0;
	      foreach($rec as $r)
	      {
	        $n++;
	        $a->Row(array(($n), $r->KodeProduk, $r->NamaProduk,"Ctn", number_format($r->FinalOrderKtn,"0",",",".")));
	        $total=$total+$r->FinalOrderKtn;
	        // $a->Ln(5);
	      }
	      $a->Cell(108,4,'Total',1,0,'C');
	      $a->Cell(20,4,number_format($total,"0",",","."),1,0,'R');

	      $a->Ln(7);
	      $a->Cell(10,4,'',2,0,'C');
	      $a->Cell(20,4,'Hormat Kami,',2,0,'C');
	      $a->Cell(0,4,'',0,1,'C');
	      $a->SetFont('Arial','U',8);
	      $a->Ln(12);
	      $a->Cell(10,4,'',2,0,'C');
	      $a->Cell(20,4,$this->session->userdata('NamaPegawai'),2,0,'C');
	      $a->Cell(0,4,'',0,1,'C');
	      $a->SetFont('Arial','',8);
	      // $a->SetVisibility('print');
	      $a->Cell(10,4,'',2,0,'C');
	      $a->Cell(20,4,'SM '.$this->session->userdata('NamaCabang'),2,0,'C');
	      $a->Cell(0,4,'',0,1,'C');
	      $a->Ln(3);
	      $a->SetFont('Arial','B',7);
	      $a->Cell(0,4,'Mohon dikirimkan sesuai dengan JUMLAH PESANAN dan JADWAL PENGIRIMAN.',0,1,'L');

	      $a->Output();
	    }
	    else // jika data kosong
	    {
	      redirect('J-Order/Order');
	    }

	    exit();
	  }

	public function export_excel($id,$id2){
    
	    // Load plugin PHPExcel nya

	    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
	    
	    // Panggil class PHPExcel nya
	    $excel = new PHPExcel();
	    // Settingan awal fil excel
	    $excel->getProperties()->setCreator('My Notes Code')
	                 ->setLastModifiedBy('My Notes Code')
	                 ->setTitle("Purchase Order")
	                 ->setSubject("Order")
	                 ->setDescription("Purchase Order")
	                 ->setKeywords("Purchase Order");
	    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
	    $style_col = array(
	      'font' => array('bold' => true), // Set font nya jadi bold
	      'alignment' => array(
	        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
	    );
	    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
	    $style_row = array(
	      'alignment' => array(
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
	    );

	    $kode_cabang=$this->session->userdata('KodeCabang');
	  	$xPrinciple=$id."/".$id2;

	  // 	if ($status_cetak=="CU") {
	  // 		$xPeriode=$this->input->post('Periode');
			// $xTahun=$this->input->post('Tahun');
	  // 	}else{
	  		$xPeriode=$this->session->userdata('Periode');
			$xTahun=$this->session->userdata('Tahun');
	  	// }
	    

		$order = $this->M_OrderCMO->struk_order($kode_cabang,$xPrinciple,$xPeriode,$xTahun);

		// var_dump($cek->num_rows());
		if($order->num_rows() > 0){
			foreach ($order->result() as $struk_order){
				$no_order=$struk_order->NoStruk;
				$tgl_order=$struk_order->TglStruk;
				$nama_principle=$struk_order->NamaSupplier;
			}
		}

	    $excel->setActiveSheetIndex(0)->setCellValue('A1', $this->session->userdata('NamaCabang')); 
	    $excel->getActiveSheet()->mergeCells('A1:R1');
	    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
	    // $excel->getActiveSheet()->getStyle('A1')->getFont()->setUnderline(TRUE);
	    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
	    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

	    $excel->setActiveSheetIndex(0)->setCellValue('A2', $this->session->userdata('Alamat')); 
	    $excel->getActiveSheet()->mergeCells('A2:R2');
	    $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(12);
	    $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	    $excel->setActiveSheetIndex(0)->setCellValue('A3', "Telp. ".$this->session->userdata('Telepon')); 
	    $excel->getActiveSheet()->mergeCells('A3:R3');
	    $excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(12);
	    $excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

	    $excel->setActiveSheetIndex(0)->setCellValue('A5', "PURCHASE ORDER"); 
	    $excel->getActiveSheet()->mergeCells('A5:R5');
	    $excel->getActiveSheet()->getStyle('A5')->getFont()->setBold(TRUE);
	    $excel->getActiveSheet()->getStyle('A5')->getFont()->setSize(14);
	    $excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	    $excel->setActiveSheetIndex(0)->setCellValue('B7', "No. PO ");
	    // $excel->getActiveSheet()->mergeCells('A7:P7'); // Set Merge Cell pada kolom A1 sampai E1
	    $excel->getActiveSheet()->getStyle('B7')->getFont()->setBold(TRUE); // Set bold kolom A1
	    $excel->getActiveSheet()->getStyle('B7')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
	    $excel->getActiveSheet()->getStyle('B7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // Set text center 

	    $excel->setActiveSheetIndex(0)->setCellValue('C7', ": ".$no_order);
	    $excel->getActiveSheet()->mergeCells('C7:R7'); // Set Merge Cell pada kolom A1 sampai E1
	    $excel->getActiveSheet()->getStyle('C7')->getFont()->setBold(TRUE); // Set bold kolom A1
	    $excel->getActiveSheet()->getStyle('C7')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
	    $excel->getActiveSheet()->getStyle('C7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // Set text center 

	    $excel->setActiveSheetIndex(0)->setCellValue('B8', "Tgl PO ");
	    // $excel->getActiveSheet()->mergeCells('A8:P8'); // Set Merge Cell pada kolom A1 sampai E1
	    $excel->getActiveSheet()->getStyle('B8')->getFont()->setBold(TRUE); // Set bold kolom A1
	    $excel->getActiveSheet()->getStyle('B8')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
	    $excel->getActiveSheet()->getStyle('B8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // Set text center 

	    $excel->setActiveSheetIndex(0)->setCellValue('C8', ": ".$this->M_OrderCMO->tgl_indo(date('Y-m-d',strtotime($tgl_order)),'d'));
	    $excel->getActiveSheet()->mergeCells('C8:R8'); // Set Merge Cell pada kolom A1 sampai E1
	    $excel->getActiveSheet()->getStyle('C8')->getFont()->setBold(TRUE); // Set bold kolom A1
	    $excel->getActiveSheet()->getStyle('C8')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
	    $excel->getActiveSheet()->getStyle('C8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // Set text center 

	    $excel->setActiveSheetIndex(0)->setCellValue('B10', "Kepada Yth,");
	    $excel->getActiveSheet()->mergeCells('B10:R10'); // Set Merge Cell pada kolom A1 sampai E1
	    // $excel->getActiveSheet()->getStyle('A9')->getFont()->setBold(TRUE); // Set bold kolom A1
	    $excel->getActiveSheet()->getStyle('B10')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
	    $excel->getActiveSheet()->getStyle('B10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // 

	    $excel->setActiveSheetIndex(0)->setCellValue('B11', $nama_principle);
	    $excel->getActiveSheet()->mergeCells('B11:R11'); // Set Merge Cell pada kolom A1 sampai E1
	    // $excel->getActiveSheet()->getStyle('A10')->getFont()->setBold(TRUE); // Set bold kolom A1
	    $excel->getActiveSheet()->getStyle('B11')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
	    $excel->getActiveSheet()->getStyle('B11')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

	    // Buat header tabel nya pada baris ke 3
	    $excel->setActiveSheetIndex(0)->setCellValue('A13', "No");
	    $excel->setActiveSheetIndex(0)->setCellValue('B13', "Kode Barang");
	    $excel->setActiveSheetIndex(0)->setCellValue('C13', "Nama Barang");
	    $excel->setActiveSheetIndex(0)->setCellValue('D13', "Satuan"); 
	    $excel->setActiveSheetIndex(0)->setCellValue('E13', "Rpp Ktn"); 
	    $excel->setActiveSheetIndex(0)->setCellValue('F13', "Rpp RP"); 
	    $excel->setActiveSheetIndex(0)->setCellValue('G13', "Curr Stok Ktn"); 
	    $excel->setActiveSheetIndex(0)->setCellValue('H13', "Curr Stok RP"); 
	    $excel->setActiveSheetIndex(0)->setCellValue('I13', "Iron Stok Ktn"); 
	    $excel->setActiveSheetIndex(0)->setCellValue('J13', "Iron Stok RP"); 
	    $excel->setActiveSheetIndex(0)->setCellValue('K13', "Est End Stok Ktn"); 
	    $excel->setActiveSheetIndex(0)->setCellValue('L13', "Est End Stok RP");
	    $excel->setActiveSheetIndex(0)->setCellValue('M13', "Sp Ktn");
	    $excel->setActiveSheetIndex(0)->setCellValue('N13', "Sp Adj Ktn");  
	    $excel->setActiveSheetIndex(0)->setCellValue('O13', "Sp Rp"); 
	    $excel->setActiveSheetIndex(0)->setCellValue('P13', "Sp Adj Rp"); 
	    $excel->setActiveSheetIndex(0)->setCellValue('Q13', "Intransit Ktn"); 
	    $excel->setActiveSheetIndex(0)->setCellValue('R13', "Intransit Rp"); 
	    $excel->setActiveSheetIndex(0)->setCellValue('S13', "Total Order"); 
	    $excel->setActiveSheetIndex(0)->setCellValue('T13', "Total Order Rp");
	    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	    $excel->getActiveSheet()->getStyle('A13')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('B13')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('C13')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('D13')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('E13')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('F13')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('G13')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('H13')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('I13')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('J13')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('K13')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('L13')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('M13')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('N13')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('O13')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('P13')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('Q13')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('R13')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('S13')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('T13')->applyFromArray($style_col);
	    
		$query = $this->M_OrderCMO->cetak_order($kode_cabang,$xPrinciple,$xPeriode,$xTahun);
	    
	    $temp_data = $query; 
	    $data = $temp_data->result();
	    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
	    $numrow = 14; // Set baris pertama untuk isi tabel adalah baris ke 4
	    // foreach($siswa as $data){ // Lakukan looping pada variabel siswa
	    foreach($data as $data_hasil) {
	      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data_hasil->KodeProduk);
	      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data_hasil->NamaProduk);
	      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, "Ctn");
	      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data_hasil->RppKtn);
	      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data_hasil->RppRp);
	      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data_hasil->CurrStokKtn);
	      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data_hasil->CurrStokRp);
	      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data_hasil->IronStokKtn);
	      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data_hasil->IronStokRp);
	      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data_hasil->EstEndStokKtn);
	      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data_hasil->EstEndStokRp);
	      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data_hasil->SpKtn);
	      $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data_hasil->SpAdjKtn);
	      $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data_hasil->SpRp);
	      $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data_hasil->SpAdjRp);
	      $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data_hasil->IntransitKtn);
	      $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data_hasil->IntransitRp);
	      $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data_hasil->FinalOrderKtn);
	      $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data_hasil->FinalOrderRp);
	      
	      
	      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
	      
	      $no++; // Tambah 1 setiap kali looping
	      $numrow++; // Tambah 1 setiap kali looping
	    }
	    

	    // Set width kolom
	    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
	    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(12); // Set width kolom B
	    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
	    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(8); 
	    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(8); 
	    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(12); 
	    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(8); 
	    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(12); 
	    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(8); 
	    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(12); 
	    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(8); 
	    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(12); 
	    $excel->getActiveSheet()->getColumnDimension('M')->setWidth(8); 
	    $excel->getActiveSheet()->getColumnDimension('N')->setWidth(8); 
	    $excel->getActiveSheet()->getColumnDimension('O')->setWidth(12); 
	    $excel->getActiveSheet()->getColumnDimension('P')->setWidth(12); 
	    $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(12); 
	    $excel->getActiveSheet()->getColumnDimension('R')->setWidth(15);
	    $excel->getActiveSheet()->getColumnDimension('S')->setWidth(12); 
	    $excel->getActiveSheet()->getColumnDimension('T')->setWidth(15);  
	    
	    //Total
	    $excel->getActiveSheet()->mergeCells('A'.($numrow).':D'.($numrow));
	    $excel->setActiveSheetIndex(0)->setCellValue('A'.($numrow), "Grand Total");
	    $excel->getActiveSheet()->getStyle('A'.($numrow))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	    $excel->setActiveSheetIndex(0)->setCellValue('E'.($numrow), '=SUM(E14:E'.($numrow-1).')');
	    $excel->setActiveSheetIndex(0)->setCellValue('F'.($numrow), '=SUM(F14:F'.($numrow-1).')');
	    $excel->setActiveSheetIndex(0)->setCellValue('G'.($numrow), '=SUM(G14:G'.($numrow-1).')');
	    $excel->setActiveSheetIndex(0)->setCellValue('H'.($numrow), '=SUM(H14:H'.($numrow-1).')');
	    $excel->setActiveSheetIndex(0)->setCellValue('I'.($numrow), '=SUM(I14:I'.($numrow-1).')');
	    $excel->setActiveSheetIndex(0)->setCellValue('J'.($numrow), '=SUM(J14:J'.($numrow-1).')');
	    $excel->setActiveSheetIndex(0)->setCellValue('K'.($numrow), '=SUM(K14:K'.($numrow-1).')');
	    $excel->setActiveSheetIndex(0)->setCellValue('L'.($numrow), '=SUM(L14:L'.($numrow-1).')');
	    $excel->setActiveSheetIndex(0)->setCellValue('M'.($numrow), '=SUM(M14:M'.($numrow-1).')');
	    $excel->setActiveSheetIndex(0)->setCellValue('N'.($numrow), '=SUM(N14:N'.($numrow-1).')');
	    $excel->setActiveSheetIndex(0)->setCellValue('O'.($numrow), '=SUM(O14:O'.($numrow-1).')');
	    $excel->setActiveSheetIndex(0)->setCellValue('P'.($numrow), '=SUM(P14:P'.($numrow-1).')');
	    $excel->setActiveSheetIndex(0)->setCellValue('Q'.($numrow), '=SUM(Q14:Q'.($numrow-1).')');
	    $excel->setActiveSheetIndex(0)->setCellValue('R'.($numrow), '=SUM(R14:R'.($numrow-1).')');
	    $excel->setActiveSheetIndex(0)->setCellValue('S'.($numrow), '=SUM(S14:S'.($numrow-1).')');
	    $excel->setActiveSheetIndex(0)->setCellValue('T'.($numrow), '=SUM(T14:T'.($numrow-1).')');
	    $excel->getActiveSheet()->getStyle('A'.($numrow))->getFont()->setBold(TRUE);
	    $excel->getActiveSheet()->getStyle('E'.($numrow))->getFont()->setBold(TRUE);
	    $excel->getActiveSheet()->getStyle('F'.($numrow))->getFont()->setBold(TRUE);
	    $excel->getActiveSheet()->getStyle('G'.($numrow))->getFont()->setBold(TRUE);
	    $excel->getActiveSheet()->getStyle('H'.($numrow))->getFont()->setBold(TRUE);
	    $excel->getActiveSheet()->getStyle('I'.($numrow))->getFont()->setBold(TRUE);
	    $excel->getActiveSheet()->getStyle('J'.($numrow))->getFont()->setBold(TRUE);
	    $excel->getActiveSheet()->getStyle('K'.($numrow))->getFont()->setBold(TRUE);
	    $excel->getActiveSheet()->getStyle('L'.($numrow))->getFont()->setBold(TRUE);
	    $excel->getActiveSheet()->getStyle('M'.($numrow))->getFont()->setBold(TRUE);
	    $excel->getActiveSheet()->getStyle('N'.($numrow))->getFont()->setBold(TRUE);
	    $excel->getActiveSheet()->getStyle('O'.($numrow))->getFont()->setBold(TRUE);
	    $excel->getActiveSheet()->getStyle('P'.($numrow))->getFont()->setBold(TRUE);
	    $excel->getActiveSheet()->getStyle('Q'.($numrow))->getFont()->setBold(TRUE);
	    $excel->getActiveSheet()->getStyle('R'.($numrow))->getFont()->setBold(TRUE);
	    $excel->getActiveSheet()->getStyle('S'.($numrow))->getFont()->setBold(TRUE);
	    $excel->getActiveSheet()->getStyle('T'.($numrow))->getFont()->setBold(TRUE);

	    $excel->getActiveSheet()->getStyle('A'.$numrow.':J'.$numrow)->applyFromArray($style_row);
	    $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	    $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
	    $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
	    $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
	    $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
	    $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
	    $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
	    $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
	    $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
	    $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
	    $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
	    $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
	    $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
	    $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
	    $excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
	    $excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);

       //footer
      // $excel->getActiveSheet()->mergeCells('I'.($numrow+2).':K'.($numrow+2));
      // $excel->setActiveSheetIndex(0)->setCellValue('I'.($numrow+2), "Bogor, ");
      // $excel->getActiveSheet()->getStyle('I'.($numrow+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

      // $excel->getActiveSheet()->mergeCells('B'.($numrow+4));
      $excel->setActiveSheetIndex(0)->setCellValue('B'.($numrow+2), "Hormat Kami,");
      $excel->getActiveSheet()->mergeCells('B'.($numrow+2).':C'.($numrow+2));
      $excel->getActiveSheet()->getStyle('B'.($numrow+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      // // $excel->getActiveSheet()->mergeCells('E'.($numrow+4));
      // $excel->setActiveSheetIndex(0)->setCellValue('E'.($numrow+4), "Mengetahui");
      // $excel->getActiveSheet()->getStyle('E'.($numrow+4))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      // $excel->getActiveSheet()->mergeCells('I'.($numrow+4).':K'.($numrow+4));
      // $excel->setActiveSheetIndex(0)->setCellValue('I'.($numrow+4), "Menyetujui,");
      // $excel->getActiveSheet()->getStyle('I'.($numrow+4))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

      // $excel->getActiveSheet()->mergeCells('B'.($numrow+8));
      $excel->setActiveSheetIndex(0)->setCellValue('B'.($numrow+6), $this->session->userdata('NamaPegawai'));
      $excel->getActiveSheet()->mergeCells('B'.($numrow+6).':C'.($numrow+6));
      $excel->getActiveSheet()->getStyle('B'.($numrow+6))->getFont()->setUnderline(TRUE);
      $excel->getActiveSheet()->getStyle('B'.($numrow+6))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      // // $excel->getActiveSheet()->mergeCells('E'.($numrow+8));
      // $excel->setActiveSheetIndex(0)->setCellValue('E'.($numrow+8), "(______________________________)");
      // $excel->getActiveSheet()->getStyle('B'.($numrow+8))->getFont()->setUnderline(TRUE);
      // $excel->getActiveSheet()->getStyle('E'.($numrow+8))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      // $excel->getActiveSheet()->mergeCells('I'.($numrow+8).':K'.($numrow+8));
      // $excel->setActiveSheetIndex(0)->setCellValue('I'.($numrow+8), "(______________________________)");
      // $excel->getActiveSheet()->getStyle('B'.($numrow+8))->getFont()->setUnderline(TRUE);
      // $excel->getActiveSheet()->getStyle('I'.($numrow+8))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

      // $excel->getActiveSheet()->mergeCells('B'.($numrow+9));
      $excel->setActiveSheetIndex(0)->setCellValue('B'.($numrow+7), "Sales Manager");
      $excel->getActiveSheet()->mergeCells('B'.($numrow+7).':C'.($numrow+7));
      $excel->getActiveSheet()->getStyle('B'.($numrow+7))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      // // $excel->getActiveSheet()->mergeCells('E'.($numrow+9));
      // $excel->setActiveSheetIndex(0)->setCellValue('E'.($numrow+9), "Distributor");
      // $excel->getActiveSheet()->getStyle('E'.($numrow+9))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      // $excel->getActiveSheet()->mergeCells('I'.($numrow+9).':K'.($numrow+9));
      // $excel->setActiveSheetIndex(0)->setCellValue('I'.($numrow+9), "Head of Area");
      // $excel->getActiveSheet()->getStyle('I'.($numrow+9))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
	    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
	    // Set orientasi kertas jadi LANDSCAPE
	    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
	    // Set judul file excel nya
	    $excel->getActiveSheet(0)->setTitle("Purchase Order");
	    $excel->setActiveSheetIndex(0);
	    // Proses file excel
	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	    header('Content-Disposition: attachment; filename="Purchase Order.xlsx"'); // Set nama file excel nya
	    header('Cache-Control: max-age=0');
	    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	    $write->setPreCalculateFormulas(true);
	    // $Keterangan=$this->input->post('nama_depo').' ,'.$this->input->post('nama_principle').' ,'.$this->M_Master->tgl_indo($this->input->post('TglAwal'),'d').' - '.$this->M_Master->tgl_indo($this->input->post('TglAkhir'),'d');
	    // $this->M_Login->LoginActivity('Export to Excel Claim Diskon, ');
	    // echo $Keterangan;
	    // $this->M_Login->LoginActivity('Export to Excel Claim Diskon, '.$Keterangan);

	    $write->save('php://output');
	    // $this->session->set_flashdata('message_name', 'This is my message');
	    // redirect('J-Claim/Diskon');
	    
	  }

}