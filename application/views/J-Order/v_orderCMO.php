<style type="text/css">
	th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        margin: 0 auto;
		width: 100%;
    }
	thead th {
            font-weight: bold;
			font-family: arial;
            font-style: bold;
            text-align: left;
			font-size: 12px;
			padding-top: 2px;
        }

	tbody tr{
			font-weight: normal;
			font-family: arial;
            font-style: bold;
            text-align: left;
			font-size: 12px;
			padding: 2px 10px;
	}
	
	.table-condensed>thead>tr>th, 
	.table-condensed>tbody>tr>th, 
	.table-condensed>tfoot>tr>th, 
	.table-condensed>thead>tr>td, 
	.table-condensed>tbody>tr>td, 
	.table-condensed>tfoot>tr>td{
    padding: 6px 6px;
}
 
    div.container {
        width: 100%;
    }
</style>
<style type="text/css">
	.numberright { text-align: right; }
	.redcolor {color: red; }
	.bluecolor {color: blue; }
	.textbold {font-weight: bold;}
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">OrderCMO</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="canvas-wrapper">
							<FORM id="" method="post" action="" >
								<!-- <div class="row">
									<div class="col-md-3">
										<p>&nbsp;</p> -->
										<p>Principle</p>											
									<!-- </div>
								</div> -->
								<div class="row">
									<div class="col-md-3">
										<select class="form-control input-sm" id="Principle" name="Principle">
										</select> 											
										<input type="hidden" class="form-control input-sm" id="nama_principle" name="nama_principle">	
									</div>
									<div class="col-md-2">
											<!-- <p>&nbsp;</p> -->
											<!-- <button type="submit" class="btn btn-success" >Final Order</button> -->
											<a href="#" id="order" class="btn btn-success btn-sm">Final Order</a>
											<!-- <a href="javascript:;" id="export_pdf" onclick="cetak_pdf()" class="btn btn-success">Export PDF</a>-->
									</div>
 									<div class="col-md-2">
											<a href="javascript:;" id="export_pdf" onclick="cetak_pdf()" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-export"></span>Export PDF</a>
									</div>
									<div class="col-md-2">
											<a href="javascript:;" id="export_pdf" onclick="cetak_excel()" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-export"></span>Export Excel</a>
									</div>
								</div>
								<!-- <div class="row">
									
								</div> -->
							</FORM>
							<p>&nbsp;</p>
							<?php echo validation_errors(); ?>
							<div id="tabel_order2">
								<table id="tabled_order" class="table table-hover table-condensed table-striped table-bordered" cellspacing="0" width="100%">
						        <thead>
						            <tr>
						                <th>No Order</th>
						                <th>Nama Principle</th>
	            						<th>Kode Produk</th>
	            						<th>Nama Produk</th>
	            						<th>Group Produk</th>
	            						<?php
	            					if ($this->session->userdata('KodeCabang')=='00001/01'){
	            						?>
	            						<th>RPP MT </th>
	            						<th>RPP Gro </th>
	            						<th>RPP Snack </th>
	            						<th>RPP </th>
	            						<th>RPP MT (Rp)</th>
	            						<th>RPP Gro (Rp)</th>
	            						<th>RPP Snack (Rp)</th>
	            						<?php
	            					}elseif ($this->session->userdata('KodeCabang')=='00001/02'){
	            						?>
	            						<th>RPP MT </th>
	            						<th>RPP Gro </th>
	            						<th>RPP Snack </th>
	            						<th>RPP </th>
	            						<th>RPP MT (Rp)</th>
	            						<th>RPP Gro (Rp)</th>
	            						<th>RPP Snack (Rp)</th>
	            						<?php
	            					}elseif ($this->session->userdata('KodeCabang')=='00004/01'){
	            						?>
	            						<th>RPP MT </th>
	            						<th>RPP Gro BKS </th>
	            						<th>RPP Gro JKT2 </th>
	            						<th>RPP Snack </th>
	            						<th>RPP </th>
	            						<th>RPP MT (Rp)</th>
	            						<th>RPP Gro BKS (Rp)</th>
	            						<th>RPP Gro JKT2 (Rp)</th>
	            						<th>RPP Snack (Rp)</th>
	            						<?php
	            					}elseif ($this->session->userdata('KodeCabang')=='00004/02'){
	            						?>
	            						<th>RPP MT </th>
	            						<th>RPP Gro </th>
	            						<th>RPP Snack </th>
	            						<th>RPP </th>
	            						<th>RPP MT (Rp)</th>
	            						<th>RPP Gro (Rp)</th>
	            						<th>RPP Snack (Rp)</th>
	            						<?php
	            					}elseif ($this->session->userdata('KodeCabang')=='00004/03'){
	            						?>
	            						<th>RPP MT </th>
	            						<th>RPP Gro </th>
	            						<th>RPP Snack </th>
	            						<th>RPP</th>
	            						<th>RPP MT (Rp)</th>
	            						<th>RPP Gro (Rp)</th>
	            						<th>RPP Snack (Rp)</th>
	            						<?php
	            					}elseif ($this->session->userdata('KodeCabang')=='00004/04'){
	            						?>
	            						<th>RPP MT TNG </th>
	            						<th>RPP MT SRG </th>
	            						<th>RPP Gro TNG </th>
	            						<th>RPP Gro JKT1 </th>
	            						<th>RPP Gro SRG </th>
	            						<th>RPP Snack CPN </th>
	            						<th>RPP Snack JKT1 </th>
	            						<th>RPP </th>
	            						<th>RPP MT TNG (Rp)</th>
	            						<th>RPP MT SRG (Rp)</th>
	            						<th>RPP Gro TNG (Rp)</th>
	            						<th>RPP Gro JKT1 (Rp)</th>
	            						<th>RPP Gro SRG (Rp)</th>
	            						<th>RPP Snack TNG (Rp)</th>
	            						<th>RPP Snack JKT1 (Rp)</th>
	            						<?php
	            					}elseif ($this->session->userdata('KodeCabang')=='00004/05'){
	            						?>
	            						<th>RPP MT </th>
	            						<th>RPP Gro </th>
	            						<th>RPP Snack </th>
	            						<th>RPP</th>
	            						<th>RPP MT (Rp)</th>
	            						<th>RPP Gro (Rp)</th>
	            						<th>RPP Snack (Rp)</th>
	            						<?php
	            					}
	            						?>
	            						<th>RPP(Rp) x1000</th>
	            						<th>Curr Stok </th>
	            						<th>Curr Stok(Rp) x1000</th>
	            						<th>Iron Stok (Day)</th>
	            						<th>Iron Stok </th>
	            						<th>Iron Stok(Rp) x1000</th>
	            						<th>Est. Stok </th>
	            						<th>Est. Stok (Rp) 
										x1000</th>
	            						<?php
	            					if ($this->session->userdata('KodeCabang')=='00001/01'){
	            						?>
	            						<th>SP MT </th>
	            						<th>SP Gro </th>
	            						<th>SP Snack </th>
	            						<th>SP Reg </th>
	            						<th>SP Adjs</th>
	            						<th>SP MT (Rp)</th>
	            						<th>SP Gro (Rp)</th>
	            						<th>SP Snack (Rp)</th>
	            						<?php
	            					}elseif ($this->session->userdata('KodeCabang')=='00001/02'){
	            						?>
	            						<th>SP MT </th>
	            						<th>SP Gro </th>
	            						<th>SP Snack </th>
	            						<th>SP Reg </th>
	            						<th>SP Adjs </th>
	            						<th>SP MT (Rp)</th>
	            						<th>SP Gro (Rp)</th>
	            						<th>SP Snack (Rp)</th>
	            						<?php
	            					}elseif ($this->session->userdata('KodeCabang')=='00004/01'){
	            						?>
	            						<th>SP MT </th>
	            						<th>SP Gro BKS </th>
	            						<th>SP Gro JKT2 </th>
	            						<th>SP Snack </th>
	            						<th>SP Reg </th>
	            						<th>SP Adjs </th>
	            						<th>SP MT (Rp)</th>
	            						<th>SP Gro BKS (Rp)</th>
	            						<th>SP Gro JKT2 (Rp)</th>
	            						<th>SP Snack (Rp)</th>
	            						<?php
	            					}elseif ($this->session->userdata('KodeCabang')=='00004/02'){
	            						?>
	            						<th>SP MT </th>
	            						<th>SP Gro </th>
	            						<th>SP Snack </th>
	            						<th>SP Reg </th>
	            						<th>SP Adjs </th>
	            						<th>SP MT (Rp)</th>
	            						<th>SP Gro (Rp)</th>
	            						<th>SP Snack (Rp)</th>
	            						<?php
	            					}elseif ($this->session->userdata('KodeCabang')=='00004/03'){
	            						?>
	            						<th>SP MT </th>
	            						<th>SP Gro </th>
	            						<th>SP Snack </th>
	            						<th>SP Reg </th>
	            						<th>SP Adjs </th>
	            						<th>SP MT (Rp)</th>
	            						<th>SP Gro (Rp)</th>
	            						<th>SP Snack (Rp)</th>
	            						<?php
	            					}elseif ($this->session->userdata('KodeCabang')=='00004/04'){
	            						?>
	            						<th>SP MT TNG</th>
	            						<th>SP MT SRG</th>
	            						<th>SP Gro TNG </th>
	            						<th>SP Gro JKT1 </th>
	            						<th>SP Gro SRG </th>
	            						<th>SP Snack CPN </th>
	            						<th>SP Snack JKT1 </th>
	            						<th>SP Reg </th>
	            						<th>SP Adjs </th>
	            						<th>SP MT TNG (Rp)</th>
	            						<th>SP MT SRG (Rp)</th>
	            						<th>SP Gro TNG (Rp)</th>
	            						<th>SP Gro JKT1 (Rp)</th>
	            						<th>SP Gro SRG (Rp)</th>
	            						<th>SP Snack TNG (Rp)</th>
	            						<th>SP Snack JKT1 (Rp)</th>
	            						<?php
	            					}elseif ($this->session->userdata('KodeCabang')=='00004/05'){
	            						?>
	            						<th>SP MT </th>
	            						<th>SP Gro </th>
	            						<th>SP Snack </th>
	            						<th>SP Reg </th>
	            						<th>SP Adjs </th>
	            						<th>SP MT (Rp)</th>
	            						<th>SP Gro (Rp)</th>
	            						<th>SP Snack (Rp)</th>
	            						<?php
	            					}
	            						?>
	            						<th>SP Reg(Rp) x1000</th>
	            						<th>SP(Rp) x1000</th>
	            						<th>Intransit </th>
	            						<th>Intransit(Rp) x1000</th>
	            						<th>Final Order </th>
	            						<th>Final Order(Rp) x1000</th>
	            						<th>OS </th>
	            						<th>OS(Rp) x1000</th>
										<th>LS </th>
										<th>LS(Rp) x1000</th>
	            						<th>Keterangan</th>
	            						<!-- 
	            						<th class="cjadwal W1Senin">W1 Senin</th>
	            						<th id="W1Selasa" class="cjadwal">W1 Selasa</th>
	            						<th id="W1Rabu" class="cjadwal">W1 Rabu</th>
	            						<th id="W1Kamis" class="cjadwal">W1 Kamis</th>
	            						<th id="W1Jumat" class="cjadwal">W1 Jumat</th>
	            						<th id="W1Sabtu" class="cjadwal">W1 Sabtu</th>
	            						<th id="W2Senin" class="cjadwal">W2 Senin</th>
	            						<th id="W2Selasa" class="cjadwal">W2 Selasa</th>
	            						<th id="W2Rabu" class="cjadwal">W2 Rabu</th>
	            						<th id="W2Kamis" class="cjadwal">W2 Kamis</th>
	            						<th id="W2Jumat" class="cjadwal">W2 Jumat</th>
	            						<th id="W2Sabtu" class="cjadwal">W2 Sabtu</th>
	            						<th id="W3Senin" class="cjadwal">W3 Senin</th>
	            						<th id="W3Selasa" class="cjadwal">W3 Selasa</th>
	            						<th id="W3Rabu" class="cjadwal">W3 Rabu</th>
	            						<th id="W3Kamis" class="cjadwal">W3 Kamis</th>
	            						<th id="W3Jumat" class="cjadwal">W3 Jumat</th>
	            						<th id="W3Sabtu" class="cjadwal">W3 Sabtu</th>
	            						<th id="W4Senin" class="cjadwal">W4 Senin</th>
	            						<th id="W4Selasa" class="cjadwal">W4 Selasa</th>
	            						<th id="W4Rabu" class="cjadwal">W4 Rabu</th>
	            						<th id="W4Kamis" class="cjadwal">W4 Kamis</th>
	            						<th id="W4Jumat" class="cjadwal">W4 Jumat</th>
	            						<th id="W4Sabtu" class="cjadwal">W4 Sabtu</th>
	            						<th id="W5Senin" class="cjadwal">W5 Senin</th>
	            						<th id="W5Selasa" class="cjadwal">W5 Selasa</th>
	            						<th id="W5Rabu" class="cjadwal">W5 Rabu</th>
	            						<th id="W5Kamis" class="cjadwal">W5 Kamis</th>
	            						<th id="W5Jumat" class="cjadwal">W5 Jumat</th>
	            						<th id="W5Sabtu" class="cjadwal">W5 Sabtu</th> -->
	            						<!-- <th>Total Order</th>
	            						<th>Action</th> -->
						            </tr>
						        </thead>
						        <tfoot>
                                    <tr>
                                        <th colspan="4" align='right' style="font-size:14px;">Total:</th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <?php
	            					if ($this->session->userdata('KodeCabang')=='00004/01'){
	            						?>
                                        <th style="font-size:14px;"></th>
	            						<th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
	            						<?php
	            					}
	            						?>
	            						<?php
	            					if ($this->session->userdata('KodeCabang')=='00004/04'){
	            						?>
	            						<th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
	            						<?php
	            					}
	            						?>
                                        <!-- jadwal do -->
                                        <!-- <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th> -->
                                        <!-- end jadwal do -->
                                        <!-- <th style="font-size:14px;"></th>
                                        <th style="font-size:14px;"></th> -->
                                    </tr>
                                </tfoot>
						    </table>
						 </div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
</div>	<!--/.main-->

	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/DataTables/DataTables-1.10.19/js/jquery.datatables.min.js"></script>
	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/DataTables/buttons-1.5.2/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/DataTables/pdfmake-0.1.36/jszip.min.js"></script>
	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/DataTables/buttons-1.5.2/js/buttons.html5.min.js"></script>
	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/DataTables/buttons-1.5.2/js/buttons.colVis.min.js"></script>
	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/DataTables/buttons-1.5.2/js/buttons.print.min.js"></script>
	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/DataTables/dataTables.fixedColumns.min.js"></script>

<script type="text/javascript">


    $(document).ready(function() {
    	var formatNumber = new Intl.NumberFormat('en-US');
    	var kodesup1 = 0+"/"+0;
    	$('#tabel_order2').hide();
    	// $(".cjadwal").hide();
    	var kode_supplier = 0+"/"+0;
    	var nama_supplier = "-";
    	$.ajax({
            url: '<?php echo base_url(); ?>J-Order/OrderCMO/ajax_principle',
            type: "GET",
            dataType: "json",
            success:function(data) {
            	// alert('KodeDepo');
                $('select[name="Principle"]').empty();
                $('select[name="Principle"]').append('<option value="0/0">--- Pilih Principle ---</option>');
                $.each(data, function(key, value) {
                    $('select[name="Principle"]').append('<option value="'+ value.KodeSupplier +'">'+ value.NamaSupplier +'</option>');
                });
            }
        });

        

        $( "#order" ).on( "click", function() {
			
        	swal({
			  title: "Are you sure?",
			  text: "Data Order akan dibuat",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			    var kode_supplier=$('select[name="Principle"]').val();
				$('#tabled_order').DataTable().ajax.url('<?php echo base_url(); ?>J-Order/OrderCMO/ajax_order/'+kode_supplier).load();
				$('#tabel_order2').show();
			  } else {
			    // swal("Your imaginary file is safe!");
			    $('#tabel_order2').hide();
			  }
			});
			
		});

		// editor = new $.fn.dataTable.Editor( {
		// 	ajax: "<?php echo base_url(); ?>J-Order/Order/ajax_order/"+kode_supplier,
	 //        table: "#tabled_order",
	 //        fields: [ {
	 //                label: "W1Senin:",
	 //                name: "W1Senin"
	 //            }, {
	 //                label: "W1Kamis:",
	 //                name: "W1Kamis"
	 //            }, {
	 //                label: "W2Senin:",
	 //                name: "W2Senin"
	 //            }, {
	 //                label: "W2Kamis:",
	 //                name: "W2Kamis"
	 //            }, {
	 //                label: "W3Senin:",
	 //                name: "W3Senin"
	 //            }, {
	 //                label: "W3Kamis:",
	 //                name: "W3Kamis"
	 //            }, {
	 //            	label: "W4Senin:",
	 //                name: "W4Senin"
	 //            }, {
	 //                label: "W4Kamis:",
	 //                name: "W4Kamis"
	 //            }, {
	 //            	label: "W5Senin:",
	 //                name: "W5Senin"
	 //            }, {
	 //                label: "W5Kamis:",
	 //                name: "W5Kamis"
	 //            }
	 //        ]
	 //    } );

	 //    $('#tabled_order').on( 'click', 'tbody td:not(:first-child)', function (e) {
	 //        editor.inline( this );
	 //    } );

		var tbld=$('#tabled_order').DataTable({
				select:true,
	            Destroy: true,
	        	scrollY:        "500px",
		        scrollX:        true,
		        scrollCollapse: true,
		        autoWidth:      true, 		
		        paging:         false,
		        fixedColumns:   {
		            leftColumns: 5
		            // ,
		            // rightColumns: 2
		        },
		        dom: 'Bfrtip',
	        	buttons: [
		            // {
		            //     extend: 'copyHtml5',
		            //     exportOptions: {
		            //         columns: [ 0, ':visible' ]
		            //     }
		            // },
		            // {
		            //     extend: 'excelHtml5',
		            //     exportOptions: {
		            //         columns: ':visible'
		            //     }
		            // },
		    //         {
						// extend: 'pdf',
					 //      title: nama_supplier,
					 //      filename: 'customized_pdf_file_name',
		    //             orientation: 'landscape',
		    //             exportOptions: {
		    //                 columns: [ 0, 1, 2, 26, 27]
		    //             }
		            // }, 
		            // 'print',
		            'colvis'
	        	],
				 "ajax": {
				 	
		            "url": "<?php echo base_url(); ?>J-Order/OrderCMO/ajax_order/"+kode_supplier,
		            "dataSrc": ""
		        },
		        "columns": [
		            { "data": "NoStruk" },
		            { "data": "NamaPrinciple" },
					{ "data": "KodeProduk" },
					{ "data": "NamaProduk" },
					{ "data": "GroupProduk" },
					<?php
				if ($this->session->userdata('KodeCabang')=='00001/01'){
					?>
					{ "data": "RppAntonMTKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppBudiGroKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppUjangSnackKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppAntonMTRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppBudiGroRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppUjangSnackRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					<?php
				}elseif ($this->session->userdata('KodeCabang')=='00001/02'){
					?>
					{ "data": "RppRoyaniMTKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppRoyaniGroKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppYosiSnackKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppRoyaniMTRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppRoyaniGroRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppYosiSnackRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					<?php
				}elseif ($this->session->userdata('KodeCabang')=='00004/01'){
					?>
					{ "data": "RppFadilMTKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppPututGroBksKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppSarkawiGroJkt2Ktn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppHanHanSnackKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppFadilMTRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppPututGroBksRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppSarkawiGroJkt2Rp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppHanHanSnackRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					<?php
				}elseif ($this->session->userdata('KodeCabang')=='00004/02'){
					?>
					{ "data": "RppDadangMTKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppSlametGroKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppBudiSatriyoSnackKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppDadangMTRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppSlametGroRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppBudiSatriyoSnackRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					<?php
				}elseif ($this->session->userdata('KodeCabang')=='00004/03'){
					?>
					{ "data": "RppMTKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppGroKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppSnackKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppMTRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppGroRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppSnackRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					<?php
				}elseif ($this->session->userdata('KodeCabang')=='00004/04'){
					?>
					{ "data": "RppMTTngJkt1Ktn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppMTSrgKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppGroTngKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppGroJkt1Ktn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppGroSrgKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppSnackTngKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppSnackJkt1Ktn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppMTTngJkt1Rp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppMTSrgRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppGroTngRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppGroJkt1Rp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppGroSrgRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppSnackTngRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppSnackJkt1Rp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					<?php
				}elseif ($this->session->userdata('KodeCabang')=='00004/05'){
					?>
					{ "data": "RppMTKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppGroKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppSnackKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppMTRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppGroRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppSnackRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "RppRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					<?php
				}
					?>
					{ "data": "CurrStokKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "CurrStokRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "IronStokDay", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright", "sWidth": "5px" },
					{ "data": "IronStokKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "IronStokRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "EstEndStokKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "EstEndStokRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					<?php
				if ($this->session->userdata('KodeCabang')=='00001/01'){
					?>
					{ "data": "SpAntonMTKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpBudiGroKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpUjangSnackKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright bluecolor textbold" },
					{ "data": "SpAdjKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright bluecolor textbold" },
					{ "data": "SpAntonMTRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpBudiGroRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpUjangSnackRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					<?php
				}elseif ($this->session->userdata('KodeCabang')=='00001/02'){
					?>
					{ "data": "SpRoyaniMTKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpRoyaniGroKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpYosiSnackKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright bluecolor textbold" },
					{ "data": "SpAdjKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright bluecolor textbold" },
					{ "data": "SpRoyaniMTRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpRoyaniGroRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpYosiSnackRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					<?php
				}elseif ($this->session->userdata('KodeCabang')=='00004/01'){
					?>
					{ "data": "SpFadilMTKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpPututGroBksKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpSarkawiGroJkt2Ktn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpHanHanSnackKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright bluecolor textbold" },
					{ "data": "SpAdjKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright bluecolor textbold" },
					{ "data": "SpFadilMTRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpPututGroBksRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpSarkawiGroJkt2Rp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpHanHanSnackRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					<?php
				}elseif ($this->session->userdata('KodeCabang')=='00004/02'){
					?>
					{ "data": "SpDadangMTKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpSlametGroKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpBudiSatriyoSnackKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright bluecolor textbold" },
					{ "data": "SpAdjKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright bluecolor textbold" },
					{ "data": "SpDadangMTRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpSlametGroRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpBudiSatriyoSnackRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					<?php
				}elseif ($this->session->userdata('KodeCabang')=='00004/03'){
					?>
					{ "data": "SpMTKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpGroKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpSnackKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright bluecolor textbold" },
					{ "data": "SpAdjKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright bluecolor textbold" },
					{ "data": "SpMTRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpGroRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpSnackRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					<?php
				}elseif ($this->session->userdata('KodeCabang')=='00004/04'){
					?>
					{ "data": "SpMTTngJkt1Ktn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpMTSrgKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpGroTngKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpGroJkt1Ktn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpGroSrgKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpSnackTngKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpSnackJkt1Ktn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright bluecolor textbold" },
					{ "data": "SpAdjKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright bluecolor textbold" },
					{ "data": "SpMTTngJkt1Rp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpMTSrgRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpGroTngRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpGroJkt1Rp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpGroSrgRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpSnackTngRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpSnackJkt1Rp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					<?php
				}elseif ($this->session->userdata('KodeCabang')=='00004/05'){
					?>
					{ "data": "SpMTKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpGroKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpSnackKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright bluecolor textbold" },
					{ "data": "SpAdjKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright bluecolor textbold" },
					{ "data": "SpMTRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpGroRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					{ "data": "SpSnackRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					<?php
				}
					?>
					{ "data": "SpRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright bluecolor textbold" },
					{ "data": "SpAdjRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright bluecolor textbold" },
					{ "data": "IntransitKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright textbold" },
					{ "data": "IntransitRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright textbold" },
					{ "data": "FinalOrderKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright textbold" },
					{ "data": "FinalOrderRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright textbold" },
					{ "data": "OSKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright redcolor textbold" },
					{ "data": "OSRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright redcolor textbold" },
					{ "data": "USKtn", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright redcolor textbold" },
					{ "data": "USRp", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright redcolor textbold" },
					{ "data": "Ket" }
					// jadwal do
					// { "data": "W1Senin", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright W1Senin" },
					// { "data": "W1Selasa", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W1Rabu", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W1Kamis", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W1Jumat", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W1Sabtu", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W2Senin", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W2Selasa", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W2Rabu", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W2Kamis", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W2Jumat", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W2Sabtu", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W3Senin", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W3Selasa", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W3Rabu", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W3Kamis", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W3Jumat", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W3Sabtu", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W4Senin", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W4Selasa", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W4Rabu", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W4Kamis", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W4Jumat", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W4Sabtu", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W5Senin", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W5Selasa", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W5Rabu", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W5Kamis", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W5Jumat", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// { "data": "W5Sabtu", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" }
					// { "data": "TotalOrder", render: $.fn.dataTable.render.number(',', '.', 0, ''),"sClass": "numberright" },
					// {
		   //            "data": null,
		   //            "className": "center",
		   //            "defaultContent": '<a href="#" class="btn btn-info">Edit</a>'
		   //          }
		        ],
		        "columnDefs": [
		        	{ "targets": [14],
		        		"width": "5px" }
		        		,
					// ,

						<?php
					if ($this->session->userdata('KodeCabang')=='00001/01'){
						?>
						{
			                "targets": [0,1,4,5,6,7,9,10,11,12,14,15,17,20,21,22,25,26,27,28,29,31],
			               

			                // ,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61],
			                "visible": false   
			            }
			            <?php
		            }elseif ($this->session->userdata('KodeCabang')=='00001/02'){
						?>
						{
			                "targets": [0,1,4,5,6,7,9,10,11,12,14,15,17,20,21,22,25,26,27,28,29,31],
			                // ,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61],
			                "visible": false
			            }
			            <?php
		            }elseif ($this->session->userdata('KodeCabang')=='00004/01'){
						?>
						{
			                "targets": [0,1,4,5,6,7,8,10,11,12,13,14,16,17,19,21,22,23,24,25,28,29,30,31,32,33,35],
			                // ,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61],
			                "visible": false
			            }
			            <?php
		            }elseif ($this->session->userdata('KodeCabang')=='00004/02'){
						?>
						{
			                "targets": [0,1,4,5,6,7,9,10,11,12,14,15,17,20,21,22,25,26,27,28,29,31],
			                // ,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61],
			                "visible": false
			            }
			            <?php
		            }elseif ($this->session->userdata('KodeCabang')=='00004/03'){
						?>
						{
			                "targets": [0,1,4,5,6,7,9,10,11,12,14,15,17,20,21,22,25,26,27,28,29,31],
			                // ,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61],
			                "visible": false
			            }
			            <?php
		            }elseif ($this->session->userdata('KodeCabang')=='00004/04'){
						?>
						{
			                "targets": [0,1,4,5,6,7,8,9,10,11,13,14,15,16,17,18,19,20,22,23,25,28,29,30,31,32,33,34,37,38,39,40,41,42,43,44,45,47],
			                // ,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61],
			                "visible": false
			            }
			            <?php
		            }elseif ($this->session->userdata('KodeCabang')=='00004/05'){
						?>
						{
			                "targets": [0,1,4,5,6,7,9,10,11,12,14,15,17,20,21,22,25,26,27,28,29,31],
			                // ,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61],
			                "visible": false
			            }
			            <?php
		            }
		                ?>
				],
				 "footerCallback": function ( row, data, start, end, display ) {
	                var api = this.api(), data;
	    
	                // Remove the formatting to get integer data for summation
	                var intVal = function ( i ) {
	                    return typeof i === 'string' ?
	                        i.replace(/[\$,]/g, '')*1 :
	                        typeof i === 'number' ?
	                            i : 0;
	                };

	                // Total Final Order Ktn
	                <?php
	                $tambah_kolom=0;
	                $tambah_kolom_rpp=0;
	                $tambah_kolom_rpp_rp=0;
					if ($this->session->userdata('KodeCabang')=='00001/01'){
						$tambah_kolom=0;
						$tambah_kolom_sp=0;
						$tambah_kolom_rpp=0;
						$tambah_kolom_rpp_rp=0;
		            }elseif ($this->session->userdata('KodeCabang')=='00001/02'){
		            	$tambah_kolom=0;
		            	$tambah_kolom_sp=0;
		            	$tambah_kolom_rpp=0;
		            	$tambah_kolom_rpp_rp=0;
		            }elseif ($this->session->userdata('KodeCabang')=='00004/01'){
		            	$tambah_kolom=4;
		            	$tambah_kolom_sp=3;
		            	$tambah_kolom_rpp=1;
		            	$tambah_kolom_rpp_rp=2;
		            }elseif ($this->session->userdata('KodeCabang')=='00004/02'){
		            	$tambah_kolom=0;
		            	$tambah_kolom_sp=0;
		            	$tambah_kolom_rpp=0;
		            	$tambah_kolom_rpp_rp=0;
		            }elseif ($this->session->userdata('KodeCabang')=='00004/03'){
		            	$tambah_kolom=0;
		            	$tambah_kolom_sp=0;
		            	$tambah_kolom_rpp=0;
		            	$tambah_kolom_rpp_rp=0;
		            }elseif ($this->session->userdata('KodeCabang')=='00004/04'){
		            	$tambah_kolom=16;
		            	$tambah_kolom_sp=12;
		            	$tambah_kolom_rpp=4;
		            	$tambah_kolom_rpp_rp=8;
		            }elseif ($this->session->userdata('KodeCabang')=='00004/05'){
		            	$tambah_kolom=0;
		            	$tambah_kolom_sp=0;
		            	$tambah_kolom_rpp=0;
		            	$tambah_kolom_rpp_rp=0;
		            }
					?>
					// alert(27 + <?php echo $tambah_kolom; ?>);
					tRppKtn = api

	                    .column( 8 + <?php echo $tambah_kolom_rpp; ?>, { page: 'current'} )
	                    .data()
	                    .reduce( function (a, b) {
	                        return intVal(a) + intVal(b);
	                    }, 0 );

	                tRppRp = api

	                    .column( 12 + <?php echo $tambah_kolom_rpp_rp; ?>, { page: 'current'} )
	                    .data()
	                    .reduce( function (a, b) {
	                        return intVal(a) + intVal(b);
	                    }, 0 );

	                tCurrKtn = api

	                    .column( 13 + <?php echo $tambah_kolom_rpp_rp; ?>, { page: 'current'} )
	                    .data()
	                    .reduce( function (a, b) {
	                        return intVal(a) + intVal(b);
							
	                    }, 0 );

	                tCurrRp = api

	                    .column( 14 + <?php echo $tambah_kolom_rpp_rp; ?>, { page: 'current'} )
	                    .data()
	                    .reduce( function (a, b) {
	                        return intVal(a) + intVal(b);
	                    }, 0 );

	                tIronKtn = api

	                    .column( 16 + <?php echo $tambah_kolom_rpp_rp; ?>, { page: 'current'} )
	                    .data()
	                    .reduce( function (a, b) {
	                        return intVal(a) + intVal(b);
							
	                    }, 0 );

	                tEstKtn = api

	                    .column( 18 + <?php echo $tambah_kolom_rpp_rp; ?>, { page: 'current'} )
	                    .data()
	                    .reduce( function (a, b) {
	                        return intVal(a) + intVal(b);
							
	                    }, 0 );

	                    tEstRp = api

	                    .column( 19 + <?php echo $tambah_kolom; ?>, { page: 'current'} )
	                    .data()
	                    .reduce( function (a, b) {
	                        return intVal(a) + intVal(b);
							
	                    }, 0 );

	                tSpKtn = api
	                    .column( 23 + <?php echo $tambah_kolom_sp; ?>, { page: 'current'} )
	                    .data()
	                    .reduce( function (a, b) {
	                        return intVal(a) + intVal(b);
	                    }, 0 );

	                // Total Final Order Rp
	                tSpAjdKtn = api
	                    .column( 24 + <?php echo $tambah_kolom_sp; ?>, { page: 'current'} )
	                    .data()
	                    .reduce( function (a, b) {
	                        return intVal(a) + intVal(b);
	                    }, 0 );

	                // Total Over Stok Ktn
	                tSpRp = api
	                    .column( 28 + <?php echo $tambah_kolom; ?>, { page: 'current'} )
	                    .data()
	                    .reduce( function (a, b) {
	                        return intVal(a) + intVal(b);
	                    }, 0 );

	                // Total Over Stok Rp
	                tSpAjdRp = api
	                    .column( 29 + <?php echo $tambah_kolom; ?>, { page: 'current'} )
	                    .data()
	                    .reduce( function (a, b) {
	                        return intVal(a) + intVal(b);
	                    }, 0 );
    				
    				tIntransitKtn = api
	                    .column( 30 + <?php echo $tambah_kolom; ?>, { page: 'current'} )
	                    .data()
	                    .reduce( function (a, b) {
	                        return intVal(a) + intVal(b);
	                    }, 0 );

	                tFinalOrderKtn = api
	                    .column( 32 + <?php echo $tambah_kolom; ?>, { page: 'current'} )
	                    .data()
	                    .reduce( function (a, b) {
	                        return intVal(a) + intVal(b);
	                    }, 0 );

	                // Total Final Order Rp
	                tFinalOrderRp = api
	                    .column( 33 + <?php echo $tambah_kolom; ?>, { page: 'current'} )
	                    .data()
	                    .reduce( function (a, b) {
	                        return intVal(a) + intVal(b);
	                    }, 0 );

	                // Total Over Stok Ktn
	                tOsKtn = api
	                    .column( 34 + <?php echo $tambah_kolom; ?>, { page: 'current'} )
	                    .data()
	                    .reduce( function (a, b) {
	                        return intVal(a) + intVal(b);
	                    }, 0 );

	                // Total Over Stok Rp
	                tOsRp = api
	                    .column( 35 + <?php echo $tambah_kolom; ?>, { page: 'current'} )
	                    .data()
	                    .reduce( function (a, b) {
	                        return intVal(a) + intVal(b);
	                    }, 0 );

						
					tUsKtn = api
	                    .column( 36 + <?php echo $tambah_kolom; ?>, { page: 'current'} )
	                    .data()
	                    .reduce( function (a, b) {
	                        return intVal(a) + intVal(b);
	                    }, 0 );

	                // Total Over Stok Rp
	                tUsRp = api
	                    .column( 37 + <?php echo $tambah_kolom; ?>, { page: 'current'} )
	                    .data()
	                    .reduce( function (a, b) {
	                        return intVal(a) + intVal(b);
	                    }, 0 );
	

	                
	                $( api.column( 8 + <?php echo $tambah_kolom_rpp; ?> ).footer() ).html(
	                    formatNumber.format(tRppKtn.toFixed(0))
	                );

	                $( api.column( 12 + <?php echo $tambah_kolom_rpp_rp; ?> ).footer() ).html(
	                    formatNumber.format(tRppRp.toFixed(0))
	                );

	                $( api.column( 13 + <?php echo $tambah_kolom_rpp_rp; ?> ).footer() ).html(
	                    formatNumber.format(tCurrKtn.toFixed(0))
	                );

	                $( api.column( 14 + <?php echo $tambah_kolom_rpp_rp; ?> ).footer() ).html(
	                    formatNumber.format(tCurrRp.toFixed(0))
	                );

	                $( api.column( 16 + <?php echo $tambah_kolom_rpp_rp; ?> ).footer() ).html(
	                    formatNumber.format(tIronKtn.toFixed(0))
	                );

	                $( api.column( 18 + <?php echo $tambah_kolom_rpp_rp; ?> ).footer() ).html(
	                    formatNumber.format(tEstKtn.toFixed(0))
	                );

	                $( api.column( 19 + <?php echo $tambah_kolom; ?> ).footer() ).html(
	                    formatNumber.format(tEstRp.toFixed(0))
	                );

	                $( api.column( 23 + <?php echo $tambah_kolom_sp; ?> ).footer() ).html(
	                    formatNumber.format(tSpKtn.toFixed(0))
	                );

	                $( api.column( 24 + <?php echo $tambah_kolom_sp; ?> ).footer() ).html(
	                    formatNumber.format(tSpAjdKtn.toFixed(0))
	                );

	                $( api.column( 28 + <?php echo $tambah_kolom; ?> ).footer() ).html(
	                    formatNumber.format(tSpRp.toFixed(0))
	                );

	                $( api.column( 29 + <?php echo $tambah_kolom; ?> ).footer() ).html(
	                    formatNumber.format(tSpAjdRp.toFixed(0))
	                );

	                $( api.column( 30 + <?php echo $tambah_kolom; ?> ).footer() ).html(
	                    formatNumber.format(tIntransitKtn.toFixed(0))
	                );

	                $( api.column( 32 + <?php echo $tambah_kolom; ?> ).footer() ).html(
	                    formatNumber.format(tFinalOrderKtn.toFixed(0))
	                );

	                $( api.column( 33 + <?php echo $tambah_kolom; ?> ).footer() ).html(
	                    formatNumber.format(tFinalOrderRp.toFixed(0))
	                );

	                $( api.column( 34 + <?php echo $tambah_kolom; ?> ).footer() ).html(
	                    formatNumber.format(tOsKtn.toFixed(0))
	                );

	                $( api.column( 35 + <?php echo $tambah_kolom; ?> ).footer() ).html(
	                    formatNumber.format(tOsRp.toFixed(0))
	                );

					$( api.column( 36 + <?php echo $tambah_kolom; ?> ).footer() ).html(
	                    formatNumber.format(tUsKtn.toFixed(0))
	                );

	                $( api.column( 37 + <?php echo $tambah_kolom; ?> ).footer() ).html(
	                    formatNumber.format(tUsRp.toFixed(0))
	                );
	                
	            }

			});
		
		// $('#tabled_order').on( 'click', 'tbody td', function () {
		//     tbld.cell( this ).edit( {
		//         blur: 'submit'
		//     } );
		// } );

        $('select[name="Principle"]').on('change', function() {
            var kodesup1 = $(this).val();
            $("#nama_principle").val($('select[name="Principle"] option:selected').text());
           var nama_supplier=$("#nama_principle").val();
            // if(kodesup1) {
            //     $.ajax({
            //         url: '<?php echo base_url(); ?>J-Order/Order/ajax_jadwaldo/'+kodesup1,
            //         type: "GET",
            //         dataType: "json",
            //         success:function(data) {
            //         	$.each(data, function(key, value) {
            //         		tbld.column(value.NoKolom).visible( true );
            //             });                      
            //         }
            //     });
            // }else{
            //     // $('select[name="Group"]').empty();
            //     // $("#RPP").val("");
            // }
        });
    });
</script>

<script>
	function cetak_pdf(){
		var id=$("#Principle").val();
		// location.href='<?php echo base_url();?>J-Order/Order/cetak/'+id;
		var win = window.open('<?php echo base_url();?>J-Order/OrderCMO/cetak/'+id, '_blank');
		if (win) {
		    //Browser has allowed it to be opened
		    win.focus();
		} else {
		    //Browser has blocked it
		    alert('Please allow popups for this website');
		}
	}

	function cetak_excel(){
		var id=$("#Principle").val();
		location.href='<?php echo base_url();?>J-Order/OrderCMO/export_excel/'+id;
	}

	function penomoran(nStr)
      {
      	nStr += '';
      	x = nStr.split('.');
      	x1 = x[0];
      	x2 = x.length > 1 ? '.' + x[1] : '';
      	var rgx = /(\d+)(\d{3})/;
      	while (rgx.test(x1)) {
      		x1 = x1.replace(rgx, '$1' + ',' + '$2');
      	}
      	return x1 + x2;
      }
</script>
