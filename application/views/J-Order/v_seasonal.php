<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">SalesPlan</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Product Seasonal 
						<a type="button" name="tambah" id="tambah" class="btn btn-md btn-info"  data-toggle="modal" data-target="#myModal">
							<span class="fa fa-plus-square">&nbsp;</span> Tambah
						</a>
					</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<?php echo validation_errors(); ?>
							<table id="tableid" class="display">
						        <thead>
						            <tr>
						                <th>Produk</th>
	            						<th>Kemasan</th>
	            						<th>Group</th>
	            						<th>Principle</th>
	            						<th>SM</th>
	            						<th>Salesplan (Ktn)</th>
	            						<th>Action</th>
						            </tr>
						        </thead>
						         <tbody>
						         <?php 
						         	foreach ($ProdukFlag as $data_produk) {
						         	echo '<tr>          
							            <td>'.$data_produk->NamaProduk.'</td>            
							            <td>'.$data_produk->Kemasan.'</td>            
							            <td>'.$data_produk->NamaGrp.'</td>            
							            <td>'.$data_produk->NamaSupplier.'</td>            
							            <td>'.$data_produk->SM.'</td>          
							            <td  align="right">'.number_format($data_produk->SalesPlanKtn).'</td>
							            <td>
							            	<a onclick=\'delete_salesplan("4","'.$data_produk->Kode.'")\' href="javascript:;" class="btn btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
										</td>
									</tr> ';                         
							              
						         	}

						         ?>
							    </tbody>
						    </table>
						</div>
						<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->
						  <!-- Modal -->
						<div class="modal fade" id="myModal" role="dialog">
						    <div class="modal-dialog  modal-lg">
						      <!-- Modal content-->
						      <div class="modal-content">
						        <div class="modal-header">
						          	<button type="button" class="close" data-dismiss="modal">&times;</button>
						          	<h4 class="modal-title">Tambah Product Seasonal</h4>
						        </div>
						        <div class="modal-body">
						          	<form role="form" method="post" id="FP" action="<?php echo base_url('J-Order/SalesPlan/add_seasonal'); ?>">
										<div class="form-group">
											<label>Principle</label>
											<select class="form-control" name="Supplier" id="Supplier" required="">
												<?php
													foreach ($Supplier as $sup) {
														echo '<option value="'.$sup->Kode.'">'.$sup->Nama.'</option>';
													}
												?>
											</select>
										</div>
										<div class="form-group">
											<label>Group</label>
											<select class="form-control" name="Group" id="Group" required="">
												<?php
													foreach ($Group as $grp) {
														echo '<option value="'.$grp->GrpKode.'">'.$grp->GrpName.'</option>';
													}
												?>
											</select>
										</div>
										<!-- <div class="form-group">
											<label>Produk</label>
											<select class="form-control" name="Produk" id="Produk" required="">
												<?php
													foreach ($Produk as $prd) {
														echo '<option value="'.$prd->ProdukKode.'">'.$prd->ProdukName.'</option>';
													}
												?>
											</select>
										</div>

										<div class="form-group">
											<label>RPP (Bulan)</label>
											<input type="number" readonly name="RPP" id="RPP" class="form-control">
											<input type="hidden" name="Limit" id="Limit" class="form-control">
										</div>

										<div class="form-group">
											<label>Sales Plan (%)</label>
											<input type="number" name="SalesPlan" id="SalesPlan" maxlength="4" required autocomplete="off" class="form-control">
										</div> -->
										<div class="row">
											<div class="col-md-1">
												<b>Kode</b>
    										</div>
    										<div class="col-md-5">
												<b>Produk</b>
    										</div>
    										<!-- <div class="col-md-2">
												<b>Rpp (Bln)</b>
    										</div> -->
    										<div class="col-md-2">
												<b>Sales Plan Ktn</b>
    										</div>
  										</div>
  										<div id="sp">
  										</div>	
  										&nbsp;
										<div class="form-group">
											<button type="submit" class="btn btn-success" >Simpan</button>
										</div>
									</form>
						        </div>
						        <div class="modal-footer">
						          	<button type="button" name="close" id="close" class="btn btn-default" data-dismiss="modal">Close</button>
						        </div>
						      </div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
	</div>	<!--/.main-->

<script type="text/javascript">


    $(document).ready(function() {
    	var kodesup = 0;
		var kodesup1 = 0+"/"+0;
		var kodeGroup = 0;
		var kodeGroup1 = 0;
		var KodeProduk = 0;
		var kodeProduk1 = 0;



    	$.ajax({
            url: '<?php echo base_url(); ?>J-Order/SalesPlan/ajax_supplier',
            type: "GET",
            dataType: "json",
            success:function(data) {
            	// alert(KodeDepo);
                $('select[name="Supplier"]').empty();
                $('select[name="Supplier"]').append('<option value="0/0">--- Pilih Principle ---</option>');
                $.each(data, function(key, value) {
                    $('select[name="Supplier"]').append('<option value="'+ value.KodeSupplier +'">'+ value.NamaSupplier +'</option>');
                });
            }
        });

        // $('select[name="Depo"]').on('change', function() {
        	
        //    $("#nama_depo").val($('select[name="Depo"] option:selected').text());
        // });

        // $('select[name="Principle"]').on('change', function() {
        //    $("#nama_principle").val($('select[name="Principle"] option:selected').text());
        // });

        $('select[name="Supplier"]').on('change', function() {
            var kodesup1 = $(this).val();
            if(kodesup1) {
            	$('select[name="Group"]').find('option').remove();
            	$('select[name="Produk"]').find('option').remove();
            	$("#RPP").val("");
                $.ajax({
                    url: '<?php echo base_url(); ?>J-Order/SalesPlan/ajax_group/'+kodesup1,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                    	// alert(KodeDepo);
                        $('select[name="Group"]').empty();
                        $('select[name="Group"]').append('<option value="0">--- Pilih Group Barang ---</option>');
                        $.each(data, function(key, value) {
                            $('select[name="Group"]').append('<option value="'+ value.KodeGrp +'">'+ value.NamaGrp +'</option>');
                        });
                        
                    }
                });
            }else{
                $('select[name="Group"]').empty();
                // $("#RPP").val("");
            }
        });

        $('select[name="Group"]').on('change', function() {
            var kodeGroup1 = $(this).val();
            var kodesup1 = $('select[name="Supplier"]').val();
            $('select[name="Produk"]').find('option').remove();
            $("#RPP").val("");
            if(kodeGroup1) {
            	$('.tabel_produk').remove();
        		$.ajax({
                    url: '<?php echo base_url(); ?>J-Order/SalesPlan/ajax_produk2/'+kodesup1+'/'+kodeGroup1,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                    	// alert(KodeDepo);
                    	
                        // $('select[name="Produk"]').empty();
                        // $('select[name="Produk"]').append('<option value="0">--- Pilih Produk Barang ---</option>');
                        
                        $.each(data, function(key, value) {
                            // $('select[name="Produk"]').append('<option value="'+ value.KodeProduk +'">'+ value.NamaProduk +'</option>');

                            $('#sp').append('<div class="row tabel_produk" ><div class="col-md-1">'+value.KodeProduk+'</div><div class="col-md-5">'+value.NamaProduk+'</div><div class="col-md-2"><input type="text" class="form-control" autocomplete="off" name="SalesPlanKtn'+value.KodeProduk+'" id="SalesPlanKtn'+value.KodeProduk+'"></div></div>');
                        });
                    }
                });
            }else{
                // $('select[name="Produk"]').empty();
                
                // $("#RPP").val("");
            }
        });

        $("#tambah").click(function( event ) {
        	$.ajax({
	            url: '<?php echo base_url(); ?>J-Order/SalesPlan/ajax_supplier',
	            type: "GET",
	            dataType: "json",
	            success:function(data) {
	            	// alert(KodeDepo);
	                $('select[name="Supplier"]').empty();
	                $('select[name="Supplier"]').append('<option value="0/0">--- Pilih Principle ---</option>');
	                $.each(data, function(key, value) {
	                    $('select[name="Supplier"]').append('<option value="'+ value.KodeSupplier +'">'+ value.NamaSupplier +'</option>');
	                });
	            }
	        });
	        $('select[name="Group"]').find('option').remove();
			$('.tabel_produk').remove();
		});

		$("#close").click(function( event ) {
        	$.ajax({
	            url: '<?php echo base_url(); ?>J-Order/SalesPlan/ajax_supplier',
	            type: "GET",
	            dataType: "json",
	            success:function(data) {
	            	// alert(KodeDepo);
	                $('select[name="Supplier"]').empty();
	                $('select[name="Supplier"]').append('<option value="0/0">--- Pilih Principle ---</option>');
	                $.each(data, function(key, value) {
	                    $('select[name="Supplier"]').append('<option value="'+ value.KodeSupplier +'">'+ value.NamaSupplier +'</option>');
	                });
	            }
	        });
	        $('select[name="Group"]').find('option').remove();
			$('.tabel_produk').remove();
		});

		// $("input[data-type='currency']").on({
		//     keyup: function() {
		//       formatCurrency($(this));
		//     },
		//     blur: function() { 
		//       formatCurrency($(this), "blur");
		//     }
		// });
		

		<?php
			if($this->session->flashdata('pesan')){

				if($this->session->flashdata('pesan')=='berhasil'){
					?>
					swal("Warning", "Data Berhasil Disimpan");
					// alert("adadaf");
				<?php	
				}else{
					?>
					swal("Warning", "<?php echo $this->session->flashdata('pesan'); ?>");
					// alert("adadaf");
					<?php
				}
			}
		?>

    });
	
	$( "#FP" ).submit(function( event ) {
		var Limit = $("#Limit").val();
		var SP = $("#SalesPlan").val();
		var produk = $("#Produk").val();
		var group = $('select[name="Group"]').val();
        var sup = $('select[name="Supplier"]').val();

        if (sup=="0/0") {
        	swal("Warning", "Pilih Principle");
			event.preventDefault();
        }

        if (group=="0") {
        	swal("Warning", "Pilih Group Produk");
			event.preventDefault();
        }

        if (produk=="0") {
        	swal("Warning", "Pilih Produk");
			event.preventDefault();
        }

		if(Limit < SP) {
			swal("Warning", "Max Sales Plan "+Limit+" %");
			event.preventDefault();
		}
		// else {
		// 	SP.setCustomValidity('');
		// }
	});

	$("#SalesPlan").keyup(function() {
        var maxChars = 4;
        if ($(this).val().length > maxChars) {
            $(this).val($(this).val().substr(0, maxChars));
            
            //Take action, alert or whatever suits
            alert("This field can take a maximum of 4 characters");
        }
    });

</script>
<script language='javascript' type='text/javascript'>
    function check(input) {
    	var kode=input.name.replace("SalesPlanKtn","");
    	var lmt='Limit'+kode;
    	// alert(kode);

    	if (document.getElementById('RPP'+kode).value==0) {
            // input.setCustomValidity('Password Must be Matching.');
            input.value=0;
            swal('RPP 0');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
        
        var isi=parseInt(input.value);
        var lmt_value=parseInt(document.getElementById('Limit'+kode).value);
        var rpp_value=parseInt(document.getElementById('RPP'+kode).value);
        var isi_prcn=(((isi-rpp_value)/rpp_value)*100);
        // alert(isi_prcn+' '+lmt_value);
        // if (input.value > document.getElementById('Limit'+kode).value) {
        //     // input.setCustomValidity('Password Must be Matching.');
        //     input.value=document.getElementById('Limit'+kode).value;
        //     swal('Max Sales Plan '+ document.getElementById('Limit'+kode).value);
        if (isi_prcn > lmt_value) {
            // input.value=lmt_value;
            document.getElementById('SalesPlan'+kode).value=lmt_value;
            // var sp_prcn=parseInt(input.value);
            // var sp_ktn=((rpp_value*isi)/100)+rpp_value;
            // document.getElementById('SalesPlanKtn'+kode).value = Math.round(sp_ktn);
            var isi=((rpp_value*lmt_value)/100)+rpp_value;
            document.getElementById('SalesPlanKtn'+kode).value = Math.round(isi);
            swal('Max Sales Plan '+ lmt_value+" %");
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }

        if (document.getElementById('RPP'+kode).value != 0) {
        	if (isi > 0) {
        		// var sp_ktn=((rpp_value*isi)/100)+rpp_value;
        		// document.getElementById('SalesPlanKtn'+kode).value = Math.round(sp_ktn);
        		var sp_prcn=(((isi-rpp_value)/rpp_value)*100);
        		if (sp_prcn <0 ) {
        			document.getElementById('SalesPlan'+kode).value = 0;
        		}else {
        			document.getElementById('SalesPlan'+kode).value = Math.round(sp_prcn);
        		}
        	} else {
        		document.getElementById('SalesPlan'+kode).value = 0;
        	}
            
        }

    }
</script>

