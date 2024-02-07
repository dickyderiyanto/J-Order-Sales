<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
			<li class="active">Limit Sales Plan</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Data Limit Sales Plan
				</div>
				<div class="panel-body">
					<form role="form" method="post" action="<?php echo base_url('J-Order/Limit/update_limit_produk'); ?>">
						<!-- <div class="panel-heading"> -->
						<h4  style="margin-left: 15px;" >Set Principle</h4>
						<!-- </div> -->
						<div class="canvas-wrapper">
							<!-- <form role="form" method="post" action="<?php echo base_url('J-Order/Limit/update_limit_produk'); ?>"> -->
								<div class="form-group col-sm-3">
									<select class="js-example-basic-single" size="400px" name="supplier" id="supplier" class="form-control">
										<option value="0">--- Set to All Supplier ---</option>
									</select>
								</div>

								<div class="input-group col-sm-offset-5 col-sm-3">
									<input type="number" name="limit" value="0">
									<button type="submit" class="btn btn-info" style="margin-left: 15px;">Set Limit</button>
								</div>
							<!-- </form> -->
						</div>
						<!-- <div class="panel-heading"> -->
						<h4 style="margin-left: 15px;">Set Group</h4>
						<!-- </div> -->
						<div class="canvas-wrapper">
							<div  style="margin-left: 15px;" class="form-group">
								<select class="s_group" width="400px" name="group"  class="form-control">
									<option value="0">--- Set to All Group ---</option>
								</select>
							</div>
						</div>
						<h4 style="margin-left: 15px;">Set Produk</h4>
						<div class="canvas-wrapper">
							<div  style="margin-left: 15px;" class="form-group"> 
								<select class="s_produk" width="400px" name="produk" id="produk"  class="form-control">
									<option value="0">--- Set to All Produk ---</option>
								</select>
							</div>
						</div>
					</form>
					<div class="panel-heading">
					</div>
					<p>&nbsp;</p>
					<form role="form" method="post" action="">
						<div class="canvas-wrapper" id="barang">
							<?php echo validation_errors(); ?>
							<table id="tabled_barang" class="display">
						        <thead>
						            <tr>
						                <th>Principle</th>
						                <th>Group Barang</th>
	            						<th>Barang</th>
	            						<th>Limit</th>
						            </tr>
						        </thead> 
					    	</table>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.row-->
	
</div>	<!--/.main-->

	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/DataTables/datatables.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/chart.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/chart-data.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/easypiechart.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/easypiechart-data.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
	<script>
		window.onload = function () {
			var chart1 = document.getElementById("line-chart").getContext("2d");
				window.myLine = new Chart(chart1).Line(lineChartData, {
				responsive: true,
				scaleLineColor: "rgba(0,0,0,.2)",
				scaleGridLineColor: "rgba(0,0,0,.05)",
				scaleFontColor: "#c5c7cc"
			});
		};
	</script>

	<script type="text/javascript">
		$(document).ready( function () {
			var kodesup = 0;
			var kodesup1 = 0+"/"+0;
			var kodeGroup = 0;
			var kodeProduk = 0;

			// $('#barang').hide();
			// $('s_group').select2().enable(false);
			
			// alert(kodesup1);
				

			 $('.js-example-basic-single').on('change', function() {
		      var kodesup1 = $(".js-example-basic-single option:selected").val();
			      $('.s_group').select2({
						placeholder: '--- Set to All Group ---',
		           		// allowClear: true,
						width: '400px',
				        ajax: {
				        	url: "<?php echo base_url(); ?>J-Order/Limit/get_group/"+kodesup1,
				          	dataType: 'json',
				          	delay: 250,
				          	processResults: function (data) {
					            return {
					            	results: data
					            };
					        },
				          	cache: true
				        }
					});

					$('#tabled_barang').DataTable().ajax.url('<?php echo base_url(); ?>J-Order/Limit/get_limit_produk/'+kodeProduk+'/'+kodeGroup+'/'+kodesup1).load();
				
					$('#barang').show();
					$('.s_group').empty();
					$('.s_produk').empty();
					$('.s_produk').select2({
						placeholder: '--- Set to All Produk ---',
		           		// allowClear: true,
						width: '400px',
				        ajax: {
				        	url: "<?php echo base_url(); ?>J-Order/Limit/get_produk/xxxxxx",
				          	dataType: 'json',
				          	delay: 250,
				          	processResults: function (data) {
					            return {
					            	results: data
					            };
					        },
				          	cache: true
				        }
					});
		      // alert(data);
		    });


			$('.s_group').on('change', function() {
		      var kodeGroup = $(".s_group").val();
		      var kodesup1 = $(".js-example-basic-single option:selected").val();

		      		$('.s_produk').select2({
						placeholder: '--- Set to All Produk ---',
		           		// allowClear: true,
						width: '400px',
				        ajax: {
				        	url: "<?php echo base_url(); ?>J-Order/Limit/get_produk/"+kodeGroup,
				          	dataType: 'json',
				          	delay: 250,
				          	processResults: function (data) {
					            return {
					            	results: data
					            };
					        },
				          	cache: true
				        }
					});

					$('#tabled_barang').DataTable().ajax.url('<?php echo base_url(); ?>J-Order/Limit/get_limit_produk/'+kodeProduk+'/'+kodeGroup+'/'+kodesup1).load();

					$('#barang').show();
					$('.s_produk').empty();
		      // alert(data);
		    });

		    $('.s_produk').on('change', function() {
		      var kodeProduk = $(".s_produk").val();
		      var kodeGroup = $(".s_group").val();
		      var kodesup1 = $(".js-example-basic-single option:selected").val();

					$('#tabled_barang').DataTable().ajax.url('<?php echo base_url(); ?>J-Order/Limit/get_limit_produk/'+kodeProduk+'/'+kodeGroup+'/'+kodesup1).load();

					$('#barang').show();
		      // alert(data);
		    });

				

			$('.js-example-basic-single').select2({
				placeholder: '--- Set to All Supplier ---',
           		// allowClear: true,
				width: '400px',
		        ajax: {
		        	url: "<?php echo base_url(); ?>J-Order/Limit/get_supplier/"+kodesup,
		          	dataType: 'json',
		          	delay: 250,
		          	processResults: function (data) {
			            return {
			            	results: data
			            };
			        },
		          	cache: true
		        }
			});
			var data_all = {
			    id: 0,
			    text: '--- Set to All Supplier ---'
			};

			// var newOption = new Option(data_all.text, data_all.id, false, false);
			// $('.js-example-basic-single').append(newOption).trigger('change');

			$('#tabled_barang').DataTable({
		    	searching: true,
    			ordering:  true,
    			select:true,
            	Destroy: true,
    			 "ajax": {
		            "url": "<?php echo base_url(); ?>J-Order/Limit/get_limit_produk/"+kodeProduk+"/"+kodeGroup+"/"+kodesup1,
		            "dataSrc": ""
		        },
		        "columns": [
		            { "data": "NamaSupplier" },
		            { "data": "NamaGrp" },
		            { "data": "NamaProduk" },
		            { "data": "Limit" }
		        ]
			});	
			
			// $(".js-example-basic-single")
		 //    .append($("<option></option>")
		 //    .attr("value", 0 )
		 //    .text('--- Set to All Supplier ---'));

			// $('.js-example-basic-single').on("select2:selecting",function(e){
			// 	var kodesup1 = $(".js-example-basic-single").select2("val");
			// 	alert(kodesup1);
			// });
		});
	</script>
		
</body>
</html>