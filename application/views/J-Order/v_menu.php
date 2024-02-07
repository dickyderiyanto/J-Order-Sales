<?php 
$ci			= get_instance();
$modul		= $ci->uri->segment(1);
$class 		= $ci->uri->segment(2);
$subClass	= $ci->uri->segment(3);
 ?>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<a href="javascript:void(0)" class="fa fa-window-close" aria-hidden="true" onclick="closeNav()"></a>
		<div class="profile-sidebar">
			<!-- <div class="profile-userpic">
				<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRuV-LlXRMLEEriHHZyh-mYGo1MD0gtukHtjg&usqp=CAU" class="img-responsive" alt="">
			</div> -->
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">
				<h4>
				<?php echo $this->session->userdata('NamaPegawai'); ?></h4></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
	<!-- 
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
	-->
		<ul class="nav menu">
			<li class=""><a href="#"><em class="fa fa-dashboard <?= strtolower($class) == 'home' ? 'active' : ''?>">&nbsp;</em> Dashboard</a></li>

			<li class="parent "><a data-toggle="collapse" href="#supplier">
				<em class="fa fa-navicon">&nbsp;</em> Master <span data-toggle="collapse" href="#supplier" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="supplier">
					<li><a class="" href="<?php echo base_url('J-Order/Supplier'); ?>">
						<span class="fa fa-handshake-o">&nbsp;</span> Principle
					</a></li>
					<li><a class="" href="<?php echo base_url('Periode'); ?>">
					<span class="fa fa-calendar">&nbsp;</span> Kalender Oprasional
					</a></li>

					<!-- <li><a class="" href="<?php echo base_url('J-Order/Pembelian'); ?>">
						<span class="fa fa-cart-arrow-down">&nbsp;</span> Pembelian
					</a></li> -->
					<!-- <li><a class="" href="<?php echo base_url('J-Order/Penjualan'); ?>">
						<span class="fa fa-money">&nbsp;</span> Penjualan
					</a></li> -->
				</ul>
			</li>

		<!--
			<li class="parent"><a data-toggle="<?= strtolower($class) == 'salesplan' || strtolower($class) == 'order' ? 'expand' : 'collapse'?>" href="#product-setting2">
				<em class="fa fa-book">&nbsp;</em> Klasifikasi <span data-toggle="<?= strtolower($class) == 'salesplan' || strtolower($class) == 'order' ? 'expand' : 'collapse'?>" href="#product-setting2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>

				<ul class="children <?= strtolower($class) == 'salesplan' || strtolower($class) == 'order' ? 'expand' : 'collapse'?>" id="product-setting2">
					<!-- <li><a class="" href="<?php echo base_url('J-Order/SalesPlan'); ?>">
						<span class="fa fa-crosshairs">&nbsp;</span> CMO (Monthly)
					</a></li>
					<li><a class="<?= strtolower($class) == 'salesplan' && (strtolower($subClass) == '' || strtolower($subClass) == 'index') ? 'active' : ''?>" href="<?php echo base_url('J-Order/SalesPlan'); ?>">
						<span class="fa fa-crosshairs">&nbsp;</span> 1 Product Focus CMO
					</a></li>
					<li><a class="<?= strtolower($class) == 'salesplan' && strtolower($subClass) == 'salesplan' ? 'active' : ''?>" href="<?php echo base_url('J-Order/SalesPlanWeekly'); ?>">
						<span class="fa fa-crosshairs">&nbsp;</span> 2 Product Focus CWO
					</a></li>
					<li><a class="<?= strtolower($class) == 'salesplan' && strtolower($subClass) == 'declaining' ? 'active' : ''?>" href="<?php echo base_url('J-Order/SalesPlanWeekly/Declaining'); ?>">
						<span class="fa fa-gavel">&nbsp;</span> 2. Declaining
					</a></li>			
					<li><a class="<?= strtolower($class) == 'salesplan' && strtolower($subClass) == 'discontinued' ? 'active' : ''?>" href="<?php echo base_url('J-Order/SalesPlanWeekly/Discontinued'); ?>">
						<span class="fa fa-ban">&nbsp;</span> 3. Discontinued
					</a></li>

					<li><a class="<?= strtolower($class) == 'salesplan' && strtolower($subClass) == 'seasonal' ? 'active' : ''?>" href="<?php echo base_url('J-Order/SalesPlanWeekly/Seasonal'); ?>">
						<span class="fa fa-minus-circle">&nbsp;</span> 4. Seasonal
					</a></li>
					<?php
					if ($this->session->userdata('KdKategori')=='02' OR $this->session->userdata('KdKategori')=='07') {
					?>
						<li><a class="<?= strtolower($class) == 'order' && (strtolower($subClass) == '' || strtolower($subClass) == 'index') ? 'active' : ''?>" href="<?php echo base_url('J-Order/Order'); ?>">
							<span class="fa fa-cart-plus">&nbsp;</span> 5. Reguler
						</a></li>
					<?php
					}
					?>
					<li><a class="<?= strtolower($class) == 'salesplan' && strtolower($subClass) == 'klasifikasi' ? 'active' : ''?>" href="<?php echo base_url('J-Order/SalesPlan/Klasifikasi'); ?>">
						<span class="fa fa-ban">&nbsp;</span> Semua Klasifikasi
					</a></li>
				</ul>
			</li>
		-->
			

			<li class="parent"><a data-toggle="<?= strtolower($class) == 'salesplanweekly' || strtolower($class) == 'order' ? 'expand' : 'collapse'?>" href="#product-setting2">
				<em class="fa fa-book">&nbsp;</em> CWO <span data-toggle="<?= strtolower($class) == 'salesplanweekly' || strtolower($class) == 'order' ? 'expand' : 'collapse'?>" href="#product-setting2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				
				<ul class="children <?= strtolower($class) == 'salesplanweekly' || strtolower($class) == 'order' ? 'expand' : 'collapse'?>" id="product-setting2">
					<!-- <li><a class="" href="<?php echo base_url('J-Order/SalesPlan'); ?>">
						<span class="fa fa-crosshairs">&nbsp;</span> CMO (Monthly)
					</a></li> -->
					<li><a class="<?= strtolower($class) == 'salesplanweekly' && strtolower($subClass) == 'salesplan' ? 'active' : ''?>" href="<?php echo base_url('J-Order/SalesPlanWeekly'); ?>">
						<span class="fa fa-crosshairs">&nbsp;</span> 1. Product Focus CWO
					</a></li>
					<li><a class="<?= strtolower($class) == 'salesplanweekly' && strtolower($subClass) == 'declaining' ? 'active' : ''?>" href="<?php echo base_url('J-Order/SalesPlanWeekly/Declaining'); ?>">
						<span class="fa fa-gavel">&nbsp;</span> 2. Declaining
					</a></li>			
					<li><a class="<?= strtolower($class) == 'salesplanweekly' && strtolower($subClass) == 'discontinued' ? 'active' : ''?>" href="<?php echo base_url('J-Order/SalesPlanWeekly/Discontinued'); ?>">
						<span class="fa fa-ban">&nbsp;</span> 3. Discontinued
					</a></li>

					<li><a class="<?= strtolower($class) == 'salesplanweekly' && strtolower($subClass) == 'seasonal' ? 'active' : ''?>" href="<?php echo base_url('J-Order/SalesPlanWeekly/Seasonal'); ?>">
						<span class="fa fa-minus-circle">&nbsp;</span> 4. Seasonal
					</a></li>
					<?php
					if ($this->session->userdata('KdKategori')=='02' OR $this->session->userdata('KdKategori')=='07') {
					?>
						<li><a class="<?= strtolower($class) == 'order' && (strtolower($subClass) == '' || strtolower($subClass) == 'index') ? 'active' : ''?>" href="<?php echo base_url('J-Order/Order'); ?>">
							<span class="fa fa-cart-plus">&nbsp;</span> 5. Reguler
						</a></li>
					<?php
					}
					?>
					<li><a class="<?= strtolower($class) == 'salesplanweekly' && strtolower($subClass) == 'klasifikasi' ? 'active' : ''?>" href="<?php echo base_url('J-Order/SalesPlanWeekly/Klasifikasi'); ?>">
						<span class="fa fa-ban">&nbsp;</span> Semua Klasifikasi
					</a></li>
				</ul>
			</li>

			<li class="parent"><a data-toggle="<?= strtolower($class) == 'salesplan' || strtolower($class) == 'ordercmo' ? 'expand' : 'collapse'?>" href="#product-setting3">
				<em class="fa fa-book">&nbsp;</em> CMO <span data-toggle="<?= strtolower($class) == 'salesplan' || strtolower($class) == 'ordercmo' ? 'expand' : 'collapse'?>" href="#product-setting3" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children <?= strtolower($class) == 'salesplan' || strtolower($class) == 'ordercmo' ? 'expand' : 'collapse'?>" id="product-setting3">
					<!-- <li><a class="" href="<?php echo base_url('J-Order/SalesPlan'); ?>">
						<span class="fa fa-crosshairs">&nbsp;</span> CMO (Monthly)
					</a></li> -->
					<li><a class="<?= strtolower($class) == 'salesplan' && (strtolower($subClass) == '' || strtolower($subClass) == 'index') ? 'active' : ''?>" href="<?php echo base_url('J-Order/SalesPlan'); ?>">
						<span class="fa fa-crosshairs">&nbsp;</span> 1. Product Focus CMO
					</a></li>
					<li><a class="<?= strtolower($class) == 'salesplan' && strtolower($subClass) == 'declaining' ? 'active' : ''?>" href="<?php echo base_url('J-Order/SalesPlan/Declaining'); ?>">
						<span class="fa fa-gavel">&nbsp;</span> 2. Declaining
					</a></li>
					<li><a class="<?= strtolower($class) == 'salesplan' && strtolower($subClass) == 'discontinued' ? 'active' : ''?>" href="<?php echo base_url('J-Order/SalesPlan/Discontinued'); ?>">
						<span class="fa fa-ban">&nbsp;</span> 3. Discontinued
					</a></li>

					<li><a class="<?= strtolower($class) == 'salesplan' && strtolower($subClass) == 'seasonal' ? 'active' : ''?>" href="<?php echo base_url('J-Order/SalesPlan/Seasonal'); ?>">
						<span class="fa fa-minus-circle">&nbsp;</span> 4. Seasonal
					</a></li>
					<?php
					if ($this->session->userdata('KdKategori')=='02' OR $this->session->userdata('KdKategori')=='07') {
					?>
						<li><a class="<?= strtolower($class) == 'ordercmo' && (strtolower($subClass) == '' || strtolower($subClass) == 'index') ? 'active' : ''?>" href="<?php echo base_url('J-Order/OrderCMO'); ?>">
							<span class="fa fa-cart-plus">&nbsp;</span> 5. Reguler
						</a></li>
					<?php
					}
					?>
					<li><a class="<?= strtolower($class) == 'salesplan' && strtolower($subClass) == 'klasifikasi' ? 'active' : ''?>" href="<?php echo base_url('J-Order/SalesPlan/Klasifikasi'); ?>">
						<span class="fa fa-ban">&nbsp;</span> Semua Klasifikasi
					</a></li>
				</ul>
			</li>

			<li class="parent "><a data-toggle="collapse" href="#product-setting">
				<em class="fa fa-calendar">&nbsp;</em> History Order <span data-toggle="collapse" href="#product-setting" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="product-setting">
					<?php
					if ($this->session->userdata('KdKategori')!='06' AND $this->session->userdata('KdKategori')!='07' AND $this->session->userdata('KdKategori')!='08') {
					?>
						<li><a class="" href="<?php echo base_url('J-Order/History2'); ?>">
							<span class="fa fa-clock-o">&nbsp;</span> History Order Depo
						</a></li>
						<li><a class="" href="<?php echo base_url('J-Order/HistoryWeek'); ?>">
							<span class="fa fa-clock-o">&nbsp;</span> History Order Depo Week
						</a></li>
					<?php
					}
					?>

					<!-- <li><a class="" href="<?php echo base_url('J-Order/SalesPlan/Declaining'); ?>">
						<span class="fa fa-gavel">&nbsp;</span> Declaining
					</a></li>
					<li><a class="" href="<?php echo base_url('J-Order/SalesPlan/Discontinued'); ?>">
						<span class="fa fa-ban">&nbsp;</span> Discontinued
					</a></li>
					<li><a class="" href="<?php echo base_url('J-Order/SalesPlan/Seasonal'); ?>">
						<span class="fa fa-star">&nbsp;</span> Seasonal
					</a></li> -->
				</ul>
			</li>

			

			<!-- <li class="parent "><a data-toggle="collapse" href="#sales-plan">
				<em class="fa fa-truck">&nbsp;</em> Order <span data-toggle="collapse" href="#sales-plan" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sales-plan">
					<?php
					if ($this->session->userdata('KdKategori')=='02' OR $this->session->userdata('KdKategori')=='07') {
					?>
						<li><a class="" href="<?php echo base_url('J-Order/Order'); ?>">
							<span class="fa fa-cart-plus">&nbsp;</span> Purchase Order
						</a></li>
						<li><a class="" href="#">
							<span class="fa fa-clock-o">&nbsp;</span> History Order
						</a></li>
					<?php
					}
					?>
					<?php
					if ($this->session->userdata('KdKategori')!='06' AND $this->session->userdata('KdKategori')!='07' AND $this->session->userdata('KdKategori')!='08') {
					?>
						<li><a class="" href="<?php echo base_url('J-Order/History2'); ?>">
							<span class="fa fa-clock-o">&nbsp;</span> History Order Depo
						</a></li>
					<?php
					}
					?>
				</ul>
			</li> -->
			<li class="parent "><a data-toggle="collapse" href="#periode">
				<em class="fa fa-cog">&nbsp;</em> Config <span data-toggle="collapse" href="#periode" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="periode">
					
					<!-- <li><a class="" href="<?php echo base_url('J-Order/JadwalDO'); ?>">
						<span class="fa fa-calendar-plus-o">&nbsp;</span> Jadwal DO/Week
					</a></li> -->
					<?php
					if ($this->session->userdata('KdKategori')!='06' AND $this->session->userdata('KdKategori')!='07' AND $this->session->userdata('KdKategori')!='08') {
						?>
					<li><a class="" href="<?php echo base_url('J-Order/Stok'); ?>">
						<span class="fa fa-database">&nbsp;</span> Iron Stock Formula
					</a></li>
						<li><a class="" href="<?php echo base_url('J-Order/Limit'); ?>">
							<span class="fa fa-minus-circle">&nbsp;</span> Sales Plan Limit
						</a></li>
					<?php
					}
					?>
				</ul>
			</li>
			<li><a href="<?php echo base_url('Index/Logout') ?>"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		