

	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/DataTables/datatables.min.js"></script>
	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/DataTables/DataTables-1.10.19/js/jquery.datatables.min.js"></script>
	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/DataTables/buttons-1.5.2/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/DataTables/pdfmake-0.1.36/jszip.min.js"></script>
	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/DataTables/buttons-1.5.2/js/buttons.html5.min.js"></script>
	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/DataTables/buttons-1.5.2/js/buttons.colVis.min.js"></script>
	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/DataTables/buttons-1.5.2/js/buttons.print.min.js"></script>
	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/DataTables/dataTables.fixedColumns.min.js"></script>
	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/DataTables/Select-1.2.7/js/dataTables.select.min.js"></script>
	<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/DataTables/Editor/js/dataTables.editor.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/chart.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/chart-data.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/easypiechart.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/easypiechart-data.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
	<!-- <script>
		window.onload = function () {
			var chart1 = document.getElementById("line-chart").getContext("2d");
				window.myLine = new Chart(chart1).Line(lineChartData, {
				responsive: true,
				scaleLineColor: "rgba(0,0,0,.2)",
				scaleGridLineColor: "rgba(0,0,0,.05)",
				scaleFontColor: "#c5c7cc"
			});
		};
	</script> -->

	<script type="text/javascript">
		$(document).ready( function () {
			$('.js-example-basic-single').select2();
		    $('#tableid').DataTable({
		    	searching: true,
    			ordering:  true,
    			select:true,
    			scrollX:true
		    });

		    $('#tableid2').DataTable({
		    	searching: false,
    			ordering:  true,
    			select:true,
    			paging: false,
    			scrollX:true
		    });

		    // $('#tableid3').DataTable({
	     //    scrollY:        "300px",
	     //    scrollX:        true,
	     //    scrollCollapse: true,
	     //    paging:         false,
	     //    fixedColumns:   {
	     //        leftColumns: 3
	     //    },
	     //    dom: 'Bfrtip',
      //   	buttons: [
	     //        {
	     //            extend: 'copyHtml5',
	     //            exportOptions: {
	     //                columns: [ 0, ':visible' ]
	     //            }
	     //        },
	     //        {
	     //            extend: 'excelHtml5',
	     //            exportOptions: {
	     //                columns: ':visible'
	     //            }
	     //        },
	     //        {
	     //            extend: 'pdfHtml5',
	     //            orientation: 'landscape',
	     //            exportOptions: {
	     //                columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ]
	     //            }
	     //        }, 
	     //        'print',
	     //        'colvis'
      //   	]
	     //    } );

	     

		
			
		} );

	function delete_salesplan(produk_flag,kode){
        
	        swal({
	          title: "Are you sure?",
	          text: "Once deleted, you will not be able to recover this data!",
	          icon: "warning",
	          buttons: true,
	          dangerMode: true,
	        })
	        .then((willDelete) => {
	          if (willDelete) {
	              location.href="<?php echo base_url(); ?>J-Order/SalesPlan/hapus/"+produk_flag+'/'+kode;
	          } else {
	            return false; 
	          }
	        });
    }

    function delete_salesplan_weekly(produk_flag,kode){
        
	        swal({
	          title: "Are you sure?",
	          text: "Once deleted, you will not be able to recover this data!",
	          icon: "warning",
	          buttons: true,
	          dangerMode: true,
	        })
	        .then((willDelete) => {
	          if (willDelete) {
	              location.href="<?php echo base_url(); ?>J-Order/SalesPlanWeekly/hapus/"+produk_flag+'/'+kode;
	          } else {
	            return false; 
	          }
	        });
    }

    function edit_data(produk_flag,kode){
    	// alert('load data disini');
    	$.getJSON('<?php echo base_url('J-Order/SalesPlan/GetJson/') ?>'+produk_flag+'/'+kode, function(data) {
    		// alert(data[1]);
    		// console.log(data);
		    // for (var i in arr) {
		    	$('.tabel_produk2').remove();

		        $('input[name="Supplier2"]').val(data[0]["NamaSupplier"]);
		        $('input[name="Group2"]').val(data[0]["NamaGrp"]);
		        $('#sp2').append('<div class="row tabel_produk2" ><div class="col-md-1">'+data[0]["KodeProduk"]+'</div><div class="col-md-5">'+data[0]["NamaProduk"]+'</div><div class="col-md-2"><input type="text" class="form-control" name="RPP'+data[0]["KodeProduk"]+'" id="RPP'+data[0]["KodeProduk"]+'" readonly value="'+data[0]["RppBulan"]+'"></div><div><input type="hidden" name="Limit'+data[0]["KodeProduk"]+'" id="Limit'+data[0]["KodeProduk"]+'" value="'+data[0]["Limit"]+'"></div><div class="col-md-2"><input type="text" class="form-control" autocomplete="off" name="SalesPlanKtn'+data[0]["KodeProduk"]+'" id="SalesPlanKtn'+data[0]["KodeProduk"]+'" value="'+data[0]["SalesPlanKtn"]+'" onkeyup="check(this)"></div><div class="col-md-2"><input type="text" class="form-control" readonly name="SalesPlan'+data[0]["KodeProduk"]+'" id="SalesPlan'+data[0]["KodeProduk"]+'" ></div></div>');
		    //     alert(arr[i]);
		    //     // alert("coba");		        
		    // }
		});
    }

     function openNav() {
		// document.getElementById("sidebar-collapse").style.width = "250px";
		$("#sidebar-collapse").show();
	  	$("#btn_menu").hide();
		$( ".main" ).removeClass( "col-sm-12 col-lg-12" ).addClass( "col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 " );

		  // document.getElementById("main").style.marginLeft = "250px";
		}

	function closeNav() {
	  $("#sidebar-collapse").hide();
	  $("#btn_menu").show();
	  $( ".main" ).removeClass( "col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 " ).addClass( "col-sm-12 col-lg-12" );
	  // document.getElementById("main").style.marginLeft= "0";
	}
	</script>
		
</body>
</html>