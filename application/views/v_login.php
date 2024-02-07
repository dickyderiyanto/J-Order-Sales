<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" href="<?php echo base_url(); ?>/assets/images/jp_logo.jpg">
	<link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/images/jp_logo.jpg">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $judul; ?></title>
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/datepicker3.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">

	<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.js"></script>
	<script src="<?php echo base_url(); ?>assets/select2/dist/js/select2.min.js"></script>


	<!--Custom Font-->
	<link href="<?php echo base_url(); ?>assets/css/font-google-apis.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/DataTables/datatables.min.css">
    
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<style>
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url("https://images.pexels.com/photos/3740725/pexels-photo-3740725.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");

  /* Full height */
  height: 100%; 
  width: 95%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.panel{
	margin:20px;
	pading:10px;
}
.a{
	text-transform: uppercase;
}
.shadow{
  border: 1px 1px 1px 1px;
  padding: 5px 5px 5px 5px;
  box-shadow: 5px 5px 5px 5px #888888;
}

</style>
</head>
<body class ="bg">
	<div class="row" >
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="center login-panel panel panel-info shadow">
				<?php
					if($this->session->flashdata('pesan')){
						echo '<div class="alert alert-danger" role="alert">
							'.$this->session->flashdata('pesan').'
							</div>';
				
					}
				?>
				
				<div class="panel-heading"><span><img src="<?php echo base_url(); ?>/assets/images/jp_logo.jpg" width="50px"></span>&nbsp;&nbsp;<?php echo $judul; ?> <right>Log in</right></div>
				<div class="panel-body">
					<form role="form" action="<?php echo base_url('Login/Auth'); ?>" method="POST">
						<fieldset>
							<div class="form-group">
								<input class="a form-control" placeholder="Masukan Username" name="username" type="text" required="" autofocus="">
							</div>
							<div class="form-group">
								<input class="a form-control" placeholder="Masukan Password" name="password" type="password" required="" value="">
							</div>
							<button class="btn btn-primary">Login</button></fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="<?php echo base_url(); ?>js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
</body>
</html>
