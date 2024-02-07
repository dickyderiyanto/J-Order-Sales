<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url(); ?>/assets/images/jp_logo.jpg">
	<link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/images/jp_logo.jpg">
	<title>J-Sales Program</title>
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/datepicker3.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/select2/dist/css/select2.min.css" rel="stylesheet" />

	<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.js"></script>
	<script src="<?php echo base_url(); ?>assets/select2/dist/js/select2.min.js"></script>


	<!--Custom Font-->
	<link href="<?php echo base_url(); ?>assets/css/font-google-apis.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/DataTables/datatables.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/DataTables/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/DataTables/fixedColumns.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/DataTables/buttons-1.5.2/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/DataTables/Editor/css/editor.dataTables.min.css">

	<script src="<?php echo base_url(); ?>assets/js/formatCurrency.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>

	<style type="text/css">
		table thead th {
		  white-space: normal;
		  text-align: center;
		}
	</style>
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span><img src="<?php echo base_url(); ?>/assets/images/jp_logo.jpg" width="50px">&nbsp;Jessindo</span>Prakarsa</a>
				<button id="btn_menu" type="button" hidden="true" onclick="openNav()">☰</button>  
				<ul class="nav navbar-top-links navbar-right">
					<a class="navbar-brand" href="#"><span><?php echo $program; ?></span></a>
					<li class="dropdown">
						<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<em class="fa fa-laptop"></em>
						</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
								<div><em class="fa fa-line-chart"></em> JASS (AR-Sales-Stock)</div>
							</a></li>
							<li><a href="#">
								<div><em class="fa fa-balance-scale"></em> J-Kinerja</div>
							</a></li>
							<li><a href="#">
								<div><em class="fa fa-cart-plus"></em> J-Order</div>
							</a></li>
							<li><a href="#">
								<div><em class="fa fa-book"></em> Report to Principle</div>
							</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<em class="fa fa-user"></em>
						</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
								<div><em class="fa fa-wrench"></em> Profil</div>
							</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo base_url('Index/Logout') ?>">
								<div><em class="fa fa-power-off"></em> Logout</div>
							</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>