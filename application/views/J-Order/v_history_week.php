<style type="text/css">
	th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        margin: 0 auto;
    }
 
    div.container {
        width: 80%;
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
				<li class="active">History Order All</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="canvas-wrapper">
							<FORM id="" action="<?php echo site_url("J-Order/HistoryWeek/history_allweek");?>" method="post" target="_blank">
								<div class="row">
									<div class="col-md-2">
										<p>&nbsp;</p>
										<p>Tahun</p>											
									</div>
									<div class="col-md-2">
										<p>&nbsp;</p>
										<p>Week</p>											
									</div>
									<!-- <div class="col-md-3">
										<p>&nbsp;</p>
										<p>Principle</p>											
									</div> -->
								</div>
								<div class="row">
									<div class="col-md-2">
										<select class="form-control" id="Tahun" name="Tahun">
										</select>
									</div>
									<div class="col-md-2">
										<select class="form-control" id="Pweek" name="Pweek">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
											<option value="20">20</option>
											<option value="21">21</option>
											<option value="22">22</option>
											<option value="23">23</option>
											<option value="24">24</option>
											<option value="25">25</option>
											<option value="26">26</option>
											<option value="27">27</option>
											<option value="28">28</option>
											<option value="29">29</option>
											<option value="30">30</option>
											<option value="31">31</option>
											<option value="32">32</option>
											<option value="33">33</option>
											<option value="34">34</option>
											<option value="35">35</option>
											<option value="36">36</option>
											<option value="37">37</option>
											<option value="38">38</option>
											<option value="39">39</option>
											<option value="40">40</option>
											<option value="41">41</option>
											<option value="42">42</option>
											<option value="43">43</option>
											<option value="44">44</option>
											<option value="45">45</option>
											<option value="46">46</option>
											<option value="47">47</option>
											<option value="48">48</option>
											<option value="49">49</option>
											<option value="50">50</option>
											<option value="51">51</option>
											<option value="52">52</option>

										</select>
									</div>
									<!-- <div class="col-md-3">
										<select class="form-control" id="Principle" name="Principle">
										</select> 											
										<input type="hidden" class="form-control" id="nama_principle" name="nama_principle">	
									</div> -->
									<div class="col-md-2">
										<button type="submit" class="btn btn-primary">Submit</button>
									</div>
								</div>
								<!-- <div class="row">
								</div> -->
							</FORM>
							<p>&nbsp;</p>
							<?php echo validation_errors(); ?>
							
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
    	var kodesup1 = 0+"/"+0;
    	// $('#tabel_order2').hide();
    	// $(".cjadwal").hide();
    	// var kode_supplier = 0+"/"+0;
    	// var nama_supplier = "-";
    	// $.ajax({
     //        url: '<?php echo base_url(); ?>J-Order/History2/ajax_principle',
     //        type: "GET",
     //        dataType: "json",
     //        success:function(data) {
     //        	// alert('KodeDepo');
     //            $('select[name="Principle"]').empty();
     //            $('select[name="Principle"]').append('<option value="0/0">--- Pilih Principle ---</option>');
     //            $.each(data, function(key, value) {
     //                $('select[name="Principle"]').append('<option value="'+ value.KodeSupplier +'">'+ value.NamaSupplier +'</option>');
     //            });
     //        }
     //    });

        $.ajax({
            url: '<?php echo base_url(); ?>J-Order/History2/ajax_tahun',
            type: "GET",
            dataType: "json",
            success:function(data) {
            	// alert('KodeDepo');
                $('select[name="Tahun"]').empty();
                $('select[name="Tahun"]').append('<option value="0">--- Pilih Tahun ---</option>');
                $.each(data, function(key, value) {
                    $('select[name="Tahun"]').append('<option value="'+ value.Tahun +'">'+ value.Tahun +'</option>');
                });
            }
        });

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
		var win = window.open('<?php echo base_url();?>J-Order/Order/cetak/'+id, '_blank');
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
		location.href='<?php echo base_url();?>J-Order/Order/export_excel/'+id;
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
