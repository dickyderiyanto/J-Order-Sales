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
						Discontinued
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
							            <td>
											<a onclick=\'delete_salesplan("3","'.$data_produk->Kode.'")\' href="javascript:;" class="btn btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
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
						    <div class="modal-dialog">
						      <!-- Modal content-->
						      <div class="modal-content">
						        <div class="modal-header">
						          	<button type="button" class="close" data-dismiss="modal">&times;</button>
						          	<h4 class="modal-title">Tambah Discontinued</h4>
						        </div>
						        <div class="modal-body">
						          	<form role="form" method="post" id="FP" action="<?php echo base_url('J-Order/SalesPlanWeekly/add_discontinued'); ?>">
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
										<div class="form-group">
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
                $("#RPP").val("");
            }
        });

        $('select[name="Group"]').on('change', function() {
            var kodeGroup1 = $(this).val();
            var kodesup1 = $('select[name="Supplier"]').val();
            $('select[name="Produk"]').find('option').remove();
            $("#RPP").val("");
            if(kodeGroup1) {
        		$.ajax({
                    url: '<?php echo base_url(); ?>J-Order/SalesPlanWeekly/ajax_produk/'+kodesup1+'/'+kodeGroup1,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                    	// alert(KodeDepo);
                    	
                        $('select[name="Produk"]').empty();
                        $('select[name="Produk"]').append('<option value="0">--- Pilih Produk Barang ---</option>');
                        $('select[name="Produk"]').append('<option value="All">--- SEMUA PRODUK ---</option>');
                        $.each(data, function(key, value) {
                            $('select[name="Produk"]').append('<option value="'+ value.KodeProduk +'">'+ value.NamaProduk +'</option>');
                        });
                    }
                });
                
            }else{
                $('select[name="Produk"]').empty();
                $("#RPP").val("");
            }
        });

        $('select[name="Produk"]').on('change', function() {
            var kodeProduk1 = $(this).val();
            var kodeGroup1 = $('select[name="Group"]').val();
            var kodesup1 = $('select[name="Supplier"]').val();
            $("#RPP").val("");
            if(kodeGroup1) {
        		$.ajax({
                    url: '<?php echo base_url(); ?>J-Order/SalesPlanWeekly/ajax_rpp_bulan/'+kodesup1+'/'+kodeGroup1+'/'+kodeProduk1,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                    	// alert(KodeDepo);
                    	
                        $("#RPP").val(data.RppBulan);
                    }
                });

                $.ajax({
                    url: '<?php echo base_url(); ?>J-Order/SalesPlanWeekly/ajax_limit_produk/'+kodesup1+'/'+kodeGroup1+'/'+kodeProduk1,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                    	// alert(KodeDepo);
                    	
                        $("#Limit").val(data.Limit);
                    }
                });
                
            }else{
                $("#RPP").val("");
                $("#Limit").val("");
            }
        });

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
			$('select[name="Produk"]').find('option').remove();
			$('input[name="SalesPlan"]').val('');
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
			$('select[name="Produk"]').find('option').remove();
			$('input[name="SalesPlan"]').val('');
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
	});

	// $("#SalesPlan").keyup(function() {
 //        var maxChars = 4;
 //        if ($(this).val().length > maxChars) {
 //            $(this).val($(this).val().substr(0, maxChars));
            
 //            //Take action, alert or whatever suits
 //            alert("This field can take a maximum of 4 characters");
 //        }
 //    });

</script>