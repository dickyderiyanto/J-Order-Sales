<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">User</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Data User
						<a type="button" class="btn btn-md btn-info"  data-toggle="modal" data-target="#myModal">
							<span class="fa fa-plus-square">&nbsp;</span> Tambah
						</a>
					</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<?php echo validation_errors(); ?>
							<table id="tableid" class="display">
					        <thead>
					            <tr>
					                <th>NIP</th>
            						<th>Kode</th>
            						<th>Nama</th>
            						<th>Username</th>
            						<th>Kategori</th>
            						<th>Action</th>
					            </tr>
					        </thead>
					         <tbody>
					         <?php 
					         	foreach ($user as $data_user) {
					         	echo '<tr>                           
						            <td>'.$data_user->NIP.'</td>            
						            <td>'.$data_user->KodeManager.'</td>            
						            <td>'.$data_user->NamaManager.'</td>            
						            <td>'.$data_user->Username.'</td>            
						            <td>'.$data_user->Kategori.'</td>          
						            <td>
						            	<a class="" href="#">
											<span class="fa fa-pencil-square-o">&nbsp;</span> Edit
										</a>
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
						          	<h4 class="modal-title">Tambah Data User</h4>
						        </div>
						        <div class="modal-body">
						          	<form role="form" method="post" action="<?php echo base_url('User/add_user'); ?>">
										<div class="form-group">
											<label>NIP</label>
											<input class="form-control" name="nip" value="<?php echo set_value('nip'); ?>" placeholder="Masukan NIP" required=""  maxlength="25">
										</div>
										<div class="form-group">
											<label>Kode Manager</label>
											<input  placeholder="Masukan Kode Manager (dari Altius)" name="kode_manager" value="<?php echo set_value('kode_manager'); ?>"  required="" class="form-control" maxlength="14">
										</div>
										<div class="form-group">
											<label>Nama</label>
											<input  placeholder="Masukan Nama Lengkap" name="nama" value="<?php echo set_value('nama'); ?>" class="form-control" required=""  maxlength="100">
										</div>
										<div class="form-group">
											<label>Username</label>
											<input  placeholder="Masukan Uername untuk login" name="username" value="<?php echo set_value('username'); ?>" class="form-control" required=""  maxlength="25">
										</div>
										<div class="form-group">
											<label>Kategori User</label>
											<select class="form-control" name="kategori" required="">
												<?php
													foreach ($kategori as $kat) {
														echo '<option value="'.$kat->KodeKategori.'">'.$kat->Kategori.'</option>';
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
						          	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        </div>
						      </div>
						    </div>
						</div>

					</div>
				</div>
			</div>
		</div><!--/.row-->
		
	</div>	<!--/.main-->

