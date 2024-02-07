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
						Product Focus 
						<a type="button" name="tambah" id="tambah" class="btn btn-md btn-info btn-sm"  data-toggle="modal" data-target="#myModal">
							<span class="fa fa-plus-square">&nbsp;</span> Tambah
						</a>

						<a class="btn btn-md btn-info btn-sm" name="copy" id="copy" href="<?php echo base_url(); ?>J-Order/SalesPlan/copy_data/1">
							<span class="fa fa-copy">&nbsp;</span> Copy Data dari Periode Sebelumnya
						</a>


						<!-- <div class="col-md-2">
							<button type="submit" class="btn btn-md btn-info">Copy Data dari Periode Sebelumnya</button>
						</div> -->

					</div>
					<!-- <div class="row">
						<div class="col-md-2">
							<p style="color:black;">Bulan</p>											
						</div>
						<div class="col-md-2">
							<p style="color:black;">Tahun</p>											
						</div>
					</div> -->
					<!-- <div class="row">
						<div class="col-md-2">
							<select class="form-control" id="Bulan" name="Bulan">
								<option value="0">--- Pilih Bulan ---</option>
								<option value="1">Januari</option>
								<option value="2">Pebruari</option>
								<option value="3">Maret</option>
								<option value="4">April</option>
								<option value="5">Mei</option>
								<option value="6">Juni</option>
								<option value="7">Juli</option>
								<option value="8">Agustus</option>
								<option value="9">September</option>
								<option value="10">Okober</option>
								<option value="11">Nopember</option>
								<option value="12">Desember</option>
							</select>
						</div>
						<div class="col-md-2">
							<select class="form-control" id="Tahun" name="Tahun">
							</select>
						</div>
						<p>&nbsp;</p>
						<div class="col-md-2">
							<button type="submit" class="btn btn-md btn-info">Copy Data dari Periode Sebelumnya</button>
						</div>
					</div> -->

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
	            						<!-- <th>Salesplan (%)</th> -->
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
											<a onclick=\'delete_salesplan_weekly("1","'.$data_produk->Kode.'")\' href="javascript:;" class="btn btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
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
						          	<h4 class="modal-title">Tambah Product Focus</h4>
						        </div>
						        <div class="modal-body">
						          	<form role="form" method="post" id="FP" action="<?php echo base_url('J-Order/SalesPlanWeekly/add_focus'); ?>">
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
    										<div class="col-md-2">
												<b>Rpp (Week)</b>
    										</div>
    										<div class="col-md-2">
												<b>Sales Plan Ktn</b>
    										</div>
    										<div class="col-md-2">
												<b>Sales Plan %</b>
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

						<div class="modal fade" id="myModal2" role="dialog">
						    <div class="modal-dialog  modal-lg">
						      <!-- Modal content-->
						      <div class="modal-content">
						        <div class="modal-header">
						          	<button type="button" class="close" data-dismiss="modal">&times;</button>
						          	<h4 class="modal-title">Edit Product Focus</h4>
						        </div>
						        <div class="modal-body">
						          	<form role="form" method="post" id="FP_Edit" action="<?php echo base_url('J-Order/SalesPlanWeekly/edit_focus'); ?>">
										<div class="form-group">
											<label>Principle</label>
											<input type="text" class="form-control" name="Supplier2" id="Supplier2" required="" readonly="">
										</div>
										<div class="form-group">
											<label>Group</label>
											<input type="text" class="form-control" name="Group2" id="Group2" required="" readonly="">
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
    										<div class="col-md-2">
												<b>Rpp (Week)</b>
    										</div>
    										<div class="col-md-2">
												<b>Sales Plan Ktn</b>
    										</div>
    										<div class="col-md-2">
												<b>Sales Plan %</b>
    										</div>
  										</div>
  										<div id="sp2">
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
            url: '<?php echo base_url(); ?>J-Order/SalesPlanWeekly/ajax_supplier',
            type: "GET",
            dataType: "json",
            success:function(data) {
            	// alert(KodeDepo);
                $('select[name="Supplier"]').empty();
                // $('select[name="Supplier2"]').empty();
                $('select[name="Supplier"]').append('<option value="0/0">--- Pilih Principle ---</option>');
                // $('select[name="Supplier2"]').append('<option value="0/0">--- Pilih Principle ---</option>');
                $.each(data, function(key, value) {
                    $('select[name="Supplier"]').append('<option value="'+ value.KodeSupplier +'">'+ value.NamaSupplier +'</option>');
                    // $('select[name="Supplier2"]').append('<option value="'+ value.KodeSupplier +'">'+ value.NamaSupplier +'</option>');
                });
            }
        });
    	$("#Bulan").val("<?php echo $this->session->userdata('PeriodeNow'); ?>");
		// $("#Tahun").val("<?php echo $this->session->userdata('TahunNow'); ?>");
        $.ajax({
            url: '<?php echo base_url(); ?>J-Order/History2/ajax_tahun',
            type: "GET",
            dataType: "json",
            success:function(data) {
            	// alert('KodeDepo');
                $('select[name="Tahun"]').empty();
                $('select[name="Tahun"]').append('<option value="0">--- Pilih Tahun ---</option>');
                $.each(data, function(key, value) {
                	if(value.Tahun==<?php echo $this->session->userdata('TahunNow'); ?>){
                		$('select[name="Tahun"]').append('<option selected value="'+ value.Tahun +'">'+ value.Tahun +'</option>');	
                	}else{
                		$('select[name="Tahun"]').append('<option value="'+ value.Tahun +'">'+ value.Tahun +'</option>');	
                	}
                });
            }
        });

        // $('select[name="Depo"]').on('change', function() {
        	
        //    $("#nama_depo").val($('select[name="Depo"] option:selected').text());
        // });

        // $('select[name="Principle"]').on('change', function() {
        //    $("#nama_principle").val($('select[name="Principle"] option:selected').text());
        // });

        $('select[name="Bulan"]').on('change', function() {
			
   //      	swal({
			//   title: "Are you sure?",
			//   text: "Data Order akan dibuat",
			//   icon: "warning",
			//   buttons: true,
			//   dangerMode: true,
			// })
			// .then((willDelete) => {
			  // if (willDelete) {
			    var kode_supplier=$('select[name="Principle"]').val();
				$('#tabled_order').DataTable().ajax.url('<?php echo base_url(); ?>J-Order/Order/ajax_order/'+kode_supplier).load();
				$('#tabel_order2').show();
			  // } else {
			  //   // swal("Your imaginary file is safe!");
			  //   $('#tabel_order2').hide();
			  // }
			// });
			
		});

        $('select[name="Supplier"]').on('change', function() {
            var kodesup1 = $(this).val();
            if(kodesup1) {
            	$('select[name="Group"]').find('option').remove();
            	$('select[name="Produk"]').find('option').remove();
            	$("#RPP").val("");
                $.ajax({
                    url: '<?php echo base_url(); ?>J-Order/SalesPlanWeekly/ajax_group/'+kodesup1,
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
                    url: '<?php echo base_url(); ?>J-Order/SalesPlanWeekly/ajax_produk2/'+kodesup1+'/'+kodeGroup1,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                    	// alert(KodeDepo);
                    	
                        // $('select[name="Produk"]').empty();
                        // $('select[name="Produk"]').append('<option value="0">--- Pilih Produk Barang ---</option>');
                        
                        $.each(data, function(key, value) {
                            // $('select[name="Produk"]').append('<option value="'+ value.KodeProduk +'">'+ value.NamaProduk +'</option>');

                            $('#sp').append('<div class="row tabel_produk" ><div class="col-md-1">'+value.KodeProduk+'</div><div class="col-md-5">'+value.NamaProduk+'</div><div class="col-md-2"><input type="text" class="form-control" name="RPP'+value.KodeProduk+'" id="RPP'+value.KodeProduk+'" readonly value="'+value.RppBulan+'"></div><div><input type="hidden" name="Limit'+value.KodeProduk+'" id="Limit'+value.KodeProduk+'" value="'+value.Limit+'"></div><div class="col-md-2"><input type="text" class="form-control" autocomplete="off" name="SalesPlanKtn'+value.KodeProduk+'" id="SalesPlanKtn'+value.KodeProduk+'" onkeyup="check(this)"></div><div class="col-md-2"><input type="text" class="form-control" readonly name="SalesPlan'+value.KodeProduk+'" id="SalesPlan'+value.KodeProduk+'" ></div></div>');
                        });
                    }
                });
                
            }else{
                // $('select[name="Produk"]').empty();
                
                // $("#RPP").val("");
            }
        });

        // $('select[name="Produk"]').on('change', function() {
        //     var kodeProduk1 = $(this).val();
        //     var kodeGroup1 = $('select[name="Group"]').val();
        //     var kodesup1 = $('select[name="Supplier"]').val();
        //     $("#RPP").val("");
        //     if(kodeGroup1) {
        // 		$.ajax({
        //             url: '<?php echo base_url(); ?>J-Order/SalesPlan/ajax_rpp_bulan/'+kodesup1+'/'+kodeGroup1+'/'+kodeProduk1,
        //             type: "GET",
        //             dataType: "json",
        //             success:function(data) {
        //             	// alert(KodeDepo);
                    	
        //                 $("#RPP").val(data.RppBulan);
        //             }
        //         });

        //         $.ajax({
        //             url: '<?php echo base_url(); ?>J-Order/SalesPlan/ajax_limit_produk/'+kodesup1+'/'+kodeGroup1+'/'+kodeProduk1,
        //             type: "GET",
        //             dataType: "json",
        //             success:function(data) {
        //             	// alert(KodeDepo);
                    	
        //                 $("#Limit").val(data.Limit);
        //             }
        //         });
                
        //     }else{
        //         $("#RPP").val("");
        //         $("#Limit").val("");
        //     }
        // });

        $("#tambah").click(function( event ) {
        	$.ajax({
	            url: '<?php echo base_url(); ?>J-Order/SalesPlanWeekly/ajax_supplier',
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
	            url: '<?php echo base_url(); ?>J-Order/SalesPlanWeekly/ajax_supplier',
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
