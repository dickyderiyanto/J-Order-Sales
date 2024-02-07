<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Jadwal DO/Week</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Product Focus 
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
						                <th>Kode Principle</th>
	            						<th>Nama Principle</th>
	            						<th>Frekuensi</th>
	            						<th>Senin</th>
	            						<th>Selasa</th>
	            						<th>Rabu</th>
	            						<th>Kamis</th>
	            						<th>Jumat</th>
	            						<th>Sabtu</th>
	            						<th>Action</th>
						            </tr>
						        </thead>
						        <tbody>
						         <?php 
						         	foreach ($JadwalDO as $data_jadwal) {
						         	echo '<tr>          
							            <td>'.$data_jadwal->KodeSupplier.'</td>            
							            <td>'.$data_jadwal->NamaSupplier.'</td>            
							            <td>'.$data_jadwal->Frekuensi.'</td>' ;      
								?>     
							            <td><input type="checkbox" id="senin" name="senin" value="1" onclick="return false;"
						            	<?php
							            	if ($data_jadwal->Senin==true){
							            		echo "checked";
							            	}
						            	?>
						            	>
						            </td> 
						            <td><input type="checkbox" id="selasa" name="selasa" value="1" onclick="return false;"
						            	<?php
							            	if ($data_jadwal->Selasa==true){
							            		echo "checked";
							            	}
						            	?>
						            	>
						            </td>
						            <td><input type="checkbox" id="rabu" name="rabu" value="1" onclick="return false;"
						            	<?php
							            	if ($data_jadwal->Rabu==true){
							            		echo "checked";
							            	}
						            	?>
						            	>
						            </td>
						            <td><input type="checkbox" id="kamis" name="kamis" value="1" onclick="return false;"
						            	<?php
							            	if ($data_jadwal->Kamis==true){
							            		echo "checked";
							            	}
						            	?>
						            	>
						            </td>
						            <td><input type="checkbox" id="jumat" name="jumat" value="1" onclick="return false;"
						            	<?php
							            	if ($data_jadwal->Jumat==true){
							            		echo "checked";
							            	}
						            	?>
						            	>
						            </td> 
						            <td><input type="checkbox" id="sabtu" name="sabtu" value="1" onclick="return false;"
						            	<?php
							            	if ($data_jadwal->Sabtu==true){
							            		echo "checked";
							            	}
						            	?>
						            	>
						            </td>  
							            <td>
							            	<a class="" name="edit" id="edit"  onclick="edit("<?php echo $data_jadwal->KodeSupplier; ?>")" href="#">
												<span class="fa fa-pencil-square-o">&nbsp;</span> Edit
											</a>
										</td>
									</tr>                        
							     <?php         
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
						          	<h4 class="modal-title">Tambah Jadwal DO/ Week</h4>
						        </div>
						        <div class="modal-body">
						          	<form role="form" method="post" id="Jadwal" action="<?php echo base_url('J-Order/JadwalDO/add_jadwal'); ?>">
										<div class="form-group">
											<label>Principle</label>
											<select class="form-control" name="Supplier" required="">
												<?php
													foreach ($Supplier as $sup) {
														echo '<option value="'.$sup->Kode.'">'.$sup->Nama.'</option>';
													}
												?>
											</select>
										</div>
										<div class="form-group">
											<label>Frekuensi</label>
											<input type="number" name="Frekuensi" id="Frekuensi" value="1" min="1" max="5" class="form-control">
										</div>
										<div class="form-group">
											<label>Jadwal Pengiriman / Week</label>
											<p></p>
											<input type="checkbox" name="Hari[1]" id="Selasa" value="2"> Selasa		
											<div class="col-md-3">
												<input type="checkbox" name="Hari[0]" id="Senin" value="1"> Senin
											</div>	
											<p></p>
											<input type="checkbox" name="Hari[3]" id="Kamis" value="4"> Kamis
											<div class="col-md-3">
												<input type="checkbox" name="Hari[2]" id="Rabu" value="3"> Rabu
											</div>
											<p></p>
											<input type="checkbox" name="Hari[5]" id="Sabtu" value="6"> Sabtu
											<div class="col-md-3">
												<input type="checkbox" name="Hari[4]" id="Jumat" value="5"> Jumat
											</div>
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
            url: '<?php echo base_url(); ?>J-Order/JadwalDO/ajax_supplier',
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

    	$("#Frekuensi").bind('keyup mouseup', function () {

		    if ($("#Frekuensi").val()>5) {
		    	// alert('Max 5 kali');
		    	$("#Frekuensi").val('1');
		    	// event.preventDefault();
		    }           
		});

        $("#Senin").change(function() {
			var $n=0;
			var $max=$("#Frekuensi").val();
			
			if ($("#Selasa").is(':checked')) {
				$n=$n+1;
			}
			if ($("#Rabu").is(':checked')) {
				$n=$n+1;
			}
			if ($("#Kamis").is(':checked')) {
				$n=$n+1;
			}
			if ($("#Jumat").is(':checked')) {
				$n=$n+1;
			}
			if ($("#Sabtu").is(':checked')) {
				$n=$n+1;
			}
			if ($max = $n) {
				$("#Senin").prop('checked', false);
				alert("Pilihan hari melebihi frekuensi");
				event.preventDefault();
			}
			
		});

		$("#Selasa").change(function() {
			var $n=0;
			var $max=$("#Frekuensi").val();

			
			if ($("#Senin").is(':checked')) {
				$n=$n+1;
			}
			if ($("#Rabu").is(':checked')) {
				$n=$n+1;
			}
			if ($("#Kamis").is(':checked')) {
				$n=$n+1;
			}
			if ($("#Jumat").is(':checked')) {
				$n=$n+1;
			}
			if ($("#Sabtu").is(':checked')) {
				$n=$n+1;
			}

			if ($max == $n) {
				$("#Selasa").prop('checked', false);
				alert("Pilihan hari melebihi frekuensi");
				event.preventDefault();
			}
			
		});

		$("#Rabu").change(function() {
			var $n=0;
			var $max=$("#Frekuensi").val();
			
			if ($("#Selasa").is(':checked')) {
				$n=$n+1;
			}
			if ($("#Senin").is(':checked')) {
				$n=$n+1;
			}
			if ($("#Kamis").is(':checked')) {
				$n=$n+1;
			}
			if ($("#Jumat").is(':checked')) {
				$n=$n+1;
			}
			if ($("#Sabtu").is(':checked')) {
				$n=$n+1;
			}

			if ($max == $n) {
				$("#Rabu").prop('checked', false);
				alert("Pilihan hari melebihi frekuensi");
				event.preventDefault();
			}
			
		});

		$("#Kamis").change(function() {
			var $n=0;
			var $max=$("#Frekuensi").val();
			
			if ($("#Selasa").is(':checked')) {
				$n=$n+1;
			}
			if ($("#Rabu").is(':checked')) {
				$n=$n+1;
			}
			if ($("#Senin").is(':checked')) {
				$n=$n+1;
			}
			if ($("#Jumat").is(':checked')) {
				$n=$n+1;
			}
			if ($("#Sabtu").is(':checked')) {
				$n=$n+1;
			}

			if ($max == $n) {
				$("#Kamis").prop('checked', false);
				alert("Pilihan hari melebihi frekuensi");
				event.preventDefault();
			}
			
		});

		$("#Jumat").change(function() {
			var $n=0;
			var $max=$("#Frekuensi").val();
			
			if ($("#Selasa").is(':checked')) {
				$n=$n+1;
			}
			if ($("#Rabu").is(':checked')) {
				$n=$n+1;
			}
			if ($("#Kamis").is(':checked')) {
				$n=$n+1;
			}
			if ($("#Senin").is(':checked')) {
				$n=$n+1;
			}
			if ($("#Sabtu").is(':checked')) {
				$n=$n+1;
			}

			if ($max == $n) {
				$("#Jumat").prop('checked', false);
				alert("Pilihan hari melebihi frekuensi");
				event.preventDefault();
			}
			
		});

		$("#Sabtu").change(function() {
			var $n=0;
			var $max=$("#Frekuensi").val();



			if ($("#Selasa").is(':checked')) {
				$n=$n+1;
			}
			if ($("#Rabu").is(':checked')) {
				$n=$n+1;
			}
			if ($("#Kamis").is(':checked')) {
				$n=$n+1;
			}
			if ($("#Jumat").is(':checked')) {
				$n=$n+1;
			}
			if ($("#Senin").is(':checked')) {
				$n=$n+1;
			}

			if ($max == $n) {
				$("#Sabtu").prop('checked', false);
				alert("Pilihan hari melebihi frekuensi");
				event.preventDefault();
			}
			
		});



  //       $("#tambah").click(function( event ) {
  //       	$.ajax({
	 //            url: '<?php echo base_url(); ?>J-Order/SalesPlan/ajax_supplier',
	 //            type: "GET",
	 //            dataType: "json",
	 //            success:function(data) {
	 //            	// alert(KodeDepo);
	 //                $('select[name="Supplier"]').empty();
	 //                $('select[name="Supplier"]').append('<option value="0/0">--- Pilih Principle ---</option>');
	 //                $.each(data, function(key, value) {
	 //                    $('select[name="Supplier"]').append('<option value="'+ value.KodeSupplier +'">'+ value.NamaSupplier +'</option>');
	 //                });
	 //            }
	 //        });
	 //        $('select[name="Group"]').find('option').remove();
		// 	$('select[name="Produk"]').find('option').remove();
		// 	$('input[name="SalesPlan"]').val('');
		// });

		// $("#close").click(function( event ) {
  //       	$.ajax({
	 //            url: '<?php echo base_url(); ?>J-Order/SalesPlan/ajax_supplier',
	 //            type: "GET",
	 //            dataType: "json",
	 //            success:function(data) {
	 //            	// alert(KodeDepo);
	 //                $('select[name="Supplier"]').empty();
	 //                $('select[name="Supplier"]').append('<option value="0/0">--- Pilih Principle ---</option>');
	 //                $.each(data, function(key, value) {
	 //                    $('select[name="Supplier"]').append('<option value="'+ value.KodeSupplier +'">'+ value.NamaSupplier +'</option>');
	 //                });
	 //            }
	 //        });
	 //        $('select[name="Group"]').find('option').remove();
		// 	$('select[name="Produk"]').find('option').remove();
		// 	$('input[name="SalesPlan"]').val('');
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

		$( "#Jadwal" ).submit(function( event ) {
			var $n=0;
			var $max=$("#Frekuensi").val();

			if ($('select[name="Supplier"]').val()=="0/0") {
				alert("Principle kosong");
				// break;
				event.preventDefault();
				$('#Supplier').focus();
			} 
			else {
				if ($("#Senin").is(':checked')) {
					$n=$n+1;
				}
				if ($("#Selasa").is(':checked')) {
					$n=$n+1;
				}
				if ($("#Rabu").is(':checked')) {
					$n=$n+1;
				}
				if ($("#Kamis").is(':checked')) {
					$n=$n+1;
				}
				if ($("#Jumat").is(':checked')) {
					$n=$n+1;
				}
				if ($("#Sabtu").is(':checked')) {
					$n=$n+1;
				}

				if ($max != $n) {
					alert("Total frekuensi tidak sama dengan total hari");
					event.preventDefault();
				}
			}
	});

    });

</script>