<style type="text/css">
    input.form-fixer {
        padding-top: 0px;
        padding-bottom: 0px;
    }
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
    height: 12px;
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
			<li class="active">Order</li>
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
											<select class="form-control form-control-sm" id="Principle" name="Principle">
											</select> 											
											<input type="hidden" class="form-control form-control-sm" id="nama_principle" name="nama_principle">	
										</div>
										<div class="col-md-2">
											<a href="javascript:void(0)" id="btnShow" class="btn btn-success btn-sm">Show Product</a>
											<a href="javascript:void(0)" id="btnSave" class="btn btn-primary btn-sm" style="display: none">  Save  </a>
										</div>
									</div>
								</FORM>
							</br>
							<p>&nbsp;</p>
							<?php echo validation_errors(); ?>
							<div id="tabel_order1">
								<table id="tb_klasifikasi" class="table table-hover table-condensed table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Nama Principle</th>
											<th>Group Produk</th>
											<th>Nama Produk</th>
											<th>Kode Produk</th>
											<th>Klasifikasi</th>
											<th>RPP</th>
											<th>SP (ktn)</th>
											<th>SP %</th>
										</tr>
									</thead>
									<tbody id="bodyKlasifikasi">
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div><!--/.row-->

</div>	<!--/.main-->

<div id="modalLoad" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Save</h5>
			</div>
			<div class="modal-body">
				<p>Saving Data...</p>
				<p>Please Wait!</p>
			</div>
		</div>
	</div>
</div>

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
		var rootPath = '<?= base_url()?>';
		var formatNumber = new Intl.NumberFormat('en-US');
		var CurrKodeSupplier = '0/0';
		var isShowed = false;
		$('#tabel_order2').hide();
		var tb;

		tb = $('#tb_klasifikasi').DataTable({
			'paging' : false
		});
    	// $(".cjadwal").hide();
    	var kode_supplier = 0+"/"+0;
    	var nama_supplier = "-";
    	$.ajax({
    		url: '<?php echo base_url(); ?>J-Order/SalesPlan/ajax_principle',
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

    	$('select[name="Principle"]').on('change', function() {
    		var kodesup1 = $(this).val();
    		$("#nama_principle").val($('select[name="Principle"] option:selected').text());
    		var nama_supplier=$("#nama_principle").val();
    	});

    	$('#btnShow').click(function(){
    		KodeSupplier = $('#Principle').val()
    		if(KodeSupplier == '0/0') {
    			alert('Pilih Principle Terlebih Dahulu!');
    			return;
    		}


    		$("#nama_principle").val($('select[name="Principle"] option:selected').text());
    		var nama_supplier=$("#nama_principle").val();

    		tb.destroy();
    		$('#bodyKlasifikasi tr').remove();
    		$('#bodyKlasifikasi').append('<tr><td style="text-align:center" colspan=8>Loading Data....</td></tr>');

    		$.getJSON(rootPath + 'J-Order/SalesPlan/ajax_klasifikasi', {kode_supplier : KodeSupplier}, function (data) {
    			$('#bodyKlasifikasi tr').remove();
    			data = JSON.parse(JSON.stringify(data).replace(/\:null/gi, "\:\"-\"")); 
    			$.each(data, function () {
    				var inBody = '<tr>';
    				inBody += '<input type="hidden" class="ProdukGrup" value="'+this.KodeProduk+'_'+this.KodeGrp+'">';
    				inBody += '<td>' + nama_supplier + '</td>';
    				inBody += '<td>' + this.NamaGrp + '</td>';
    				inBody += '<td>' + this.NamaProduk + '</td>';
    				inBody += '<td>' + this.KodeProduk + '</td>';
    				inBody += '<td>';
    				inBody += '<select name="product_flag_'+this.KodeProduk+'_'+this.KodeGrp+'" class="productFlagSelect form-control" id="product_flag_'+this.KodeProduk+'_'+this.KodeGrp+'">';
    				inBody += '<option value=5 '+(this.ProdukFlag == 5? 'selected' : '')+'>Reguler</option>';
    				inBody += '<option value=1 '+(this.ProdukFlag == 1? 'selected' : '')+'>Product Focus</option>';
    				inBody += '<option value=2 '+(this.ProdukFlag == 2? 'selected' : '')+'>Declaining</option>';
    				inBody += '<option value=3 '+(this.ProdukFlag == 3? 'selected' : '')+'>Discontinued</option>';
    				inBody += '<option value=4 '+(this.ProdukFlag == 4? 'selected' : '')+'>Seasonal</option>';
    				inBody += '</select>';
    				inBody += '<td><input type="text" value="'+ this.RppBulan +'" readonly id="rpp_'+this.KodeProduk+'_'+this.KodeGrp+'" class="form-control form-control-sm"></td>';
    				inBody += '<td><input type="number" value="'+ this.SalesPlanKtn +'" id="spktn_'+this.KodeProduk+'_'+this.KodeGrp+'" class="form-control form-control-sm spKtnInput" '+(this.ProdukFlag == 3 || this.ProdukFlag == 5? 'readonly' : '')+' max='+(this.ProdukFlag == 1 ? this.RppBulan * (1 + this.Limit/100) : (this.ProdukFlag == 2 ? this.RppBulan : '' ))+' min='+(this.ProdukFlag == 1 || this.ProdukFlag == 4 ? this.RppBulan : (this.ProdukFlag == 2 ? 1 : '' ))+'></td>';
    				inBody += '<td><input type="text" value="'+ (this.ProdukFlag == 1 || this.ProdukFlag == 4 ? this.SalesPlan : '-') +'" readonly id="sppercent_'+this.KodeProduk+'_'+this.KodeGrp+'" class="form-control form-control-sm"></td>';
    				inBody += '<input type="hidden" value='+this.Limit+' id="limit_'+this.KodeProduk+'_'+this.KodeGrp+'"/>'
    				inBody += '</tr>';
    				$('#bodyKlasifikasi').append(inBody);
    			})


    			tb = $('#tb_klasifikasi').DataTable({
    				"paging": false,
    				"lengthChange": true,
    				"searching": true,
    				"ordering": true,
    				"info": true,
    				"autoWidth": true,
    				"scrollX": true,
    				"scrollY": "500px",
    			});
    			CurrKodeSupplier = KodeSupplier;
    			isShowed = true;
    			$('#btnSave').show(500)
    		}).fail(function (jqXHR, textStatus, errorThrown) {
    			CurrKodeSupplier = '0/0';
    			isShowed = false;
    			$('#btnSave').hide(500)
    			alert('Error mendapatkan data order!');
    		});
    	});

    	$('#btnSave').click(function(){
    		if(isShowed){
    			var isError = false;
    			$('#modalLoad').modal({
    				backdrop: 'static'
    			});
    			$(".ProdukGrup").each(function() {
    				prod_grp = $(this).val()
    				prodFlag = $('#product_flag_'+prod_grp).val()
    				spKtn = $('#spktn_'+prod_grp).val()
    				spPercent = $('#sppercent_'+prod_grp).val()  == '-' ? 0 : $('#sppercent_'+prod_grp).val();
    				KodeProduk = prod_grp.split('_')[0];
    				KodeGrp = prod_grp.split('_')[1];
    				$.post(rootPath +"J-Order/SalesPlan/add_klasifikasi", {
    					kode_supplier : CurrKodeSupplier, 
    					kode_grup : KodeGrp,
    					kode_produk : KodeProduk,
    					produk_flag : prodFlag,
    					sales_plan_ktn : spKtn,
    					sales_plan : spPercent,
    				}, function(result){
    					if(result.error){
    						isError = result.error;
    					}
    				});
    			})
    			.promise().done( function(){ 
    				$('#modalLoad').modal('toggle');

    				if(isError){
    					alert('Terdapat masalah');
    				} else{
    					alert('Data Telah Tersimpan');
    				}
    			});
    		}
    	}); 

    	$(document).on("change", ".productFlagSelect", function () {
    		var id = $(this).attr('id');
    		var prodFlag = $('#'+id).val();
    		var rppId = id.replace('product_flag_','rpp_');
    		var spKtnId = id.replace('product_flag_','spktn_');
    		var spPercentId = id.replace('product_flag_','sppercent_');
    		var limitId = id.replace('product_flag_','limit_');


    		var spKtn = $('#'+spKtnId).val()
    		var rpp = $('#'+rppId).val()
    		var limit = $('#'+limitId).val()

    		if(prodFlag == 1){
    			if(spKtn < rpp){
    				$('#'+spKtnId).val(rpp);
    				$('#'+spPercentId).val(0);
    			} else if(spKtn > (rpp * (1 + limit/100))){
    				$('#'+spKtnId).val(rpp * (1 + limit/100));
    				$('#'+spPercentId).val(limit);
    			} else{
    				$('#'+spPercentId).val(((spKtn - rpp) / rpp)*100);
    			}

    			if(rpp == 0){
    				$('#'+spPercentId).val(0);
    			}

    			$('#'+spKtnId).attr('readonly',false);
    			$('#'+spKtnId).attr('min',rpp);
    			$('#'+spKtnId).attr('max',rpp * (1 + limit/100));
    		} else if(prodFlag == 2){
    			if(spKtn > rpp){
    				$('#'+spKtnId).val(rpp);
    			}

    			$('#'+spPercentId).val('-');
    			$('#'+spKtnId).attr('readonly',false);
    			$('#'+spKtnId).attr('min',1);
    			$('#'+spKtnId).attr('max',rpp);
    		} else if(prodFlag == 3){
    			$('#'+spKtnId).val(0);
    			$('#'+spKtnId).attr('readonly',true);
    			$('#'+spKtnId).attr('min',0);
    			$('#'+spKtnId).attr('max',0);
    			$('#'+spPercentId).val('-');
    		} else if(prodFlag == 4){
    			if(spKtn < rpp){
    				$('#'+spKtnId).val(rpp);
    				$('#'+spPercentId).val(0);
    			} else{
    				$('#'+spPercentId).val(((spKtn - rpp) / rpp)*100);
    			}

    			if(rpp == 0){
    				$('#'+spPercentId).val(0);
    			}

    			$('#'+spKtnId).attr('readonly',false);
    			$('#'+spKtnId).attr('min',rpp);
    			$('#'+spKtnId).attr('max','');
    		} else if(prodFlag == 5){
    			$('#'+spKtnId).val(rpp);
    			$('#'+spKtnId).attr('readonly',true);
    			$('#'+spKtnId).attr('min',rpp);
    			$('#'+spKtnId).attr('max',rpp);
    			$('#'+spPercentId).val('-');
    		}
    	});

    	$(document).on("change",".spKtnInput",function(){
    		var id = $(this).attr('id');
    		var prodFlagId = id.replace('spktn_','product_flag_');
    		var rppId = id.replace('spktn_','rpp_');
    		var spPercentId = id.replace('spktn_','sppercent_');
    		var prodFlag = $('#'+prodFlagId).val();
    		var rpp = $('#'+rppId).val();
    		var spKtn = $(this).val();
    		if(prodFlag == 1 || prodFlag == 4){
    			if(parseInt(spKtn) > parseInt($(this).attr('max')))
    				$(this).val($(this).attr('max'));
    			if(parseInt(spKtn) < parseInt($(this).attr('min')))
    				$(this).val($(this).attr('min'));
    			var spKtn = $(this).val();
    			$('#'+spPercentId).val(parseInt(((spKtn - rpp)/rpp)*100));
    			if(rpp == 0)
    				$('#'+spPercentId).val(0);
    		}
    	})
    });
</script>