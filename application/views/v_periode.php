<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Periode</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="canvas-wrapper">
							<?php echo validation_errors(); ?>
							<table id="tableid2" class="display">
					        <thead>
					            <tr>
					                <th>No</th>
            						<th>Periode</th>
            						<th>No Of Week</th>
					            </tr>
					        </thead>
					         <tbody>
					         <?php 
					         	$no=1;
					         	foreach ($periode as $data_periode) {
					         	echo '<tr>
					         		<td>'.$no.'</td>                           
						            <td>'.$data_periode->NamaPeriode.'</td>            
						            <td>'.$data_periode->JmlWeek.'</td>          
						            
								</tr> ';                         
								$no++;
						              
					         	}

					         ?>                            
						                         
						    </tbody>  
					    </table>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="canvas-wrapper">
							<?php echo validation_errors(); ?>
							<table id="tableid" class="display">
					        <thead>
					            <tr>
					                <th>No</th>
            						<th>Periode</th>
            						<th>Week</th>
            						<th>Start Date</th>
            						<th>End Date</th>
            						<th>Senin</th>
            						<th>Selasa</th>
            						<th>Rabu</th>
            						<th>Kamis</th>
            						<th>Jumat</th>
            						<th>Sabtu</th>
					            </tr>
					        </thead>
					         <tbody>
					         <?php 
					         	$no=1;
					         	foreach ($periode2 as $data_periode2) {
					         	echo '<tr>
					         		<td>'.$no.'</td>                           
						            <td>'.$data_periode2->Periode.'</td>            
						            <td>'.$data_periode2->PWeek.'</td>   
						            <td>'.date('d-m-Y',strtotime($data_periode2->BegDate)).'</td>
						            <td>'.date('d-m-Y',strtotime($data_periode2->EndDate)).'</td>';
						     ?>
						     		<td><input type="checkbox" id="senin" name="senin" value="1" onclick="return false;"
						            	<?php
							            	if ($data_periode2->WD1==true){
							            		echo "checked";
							            	}
						            	?>
						            	>
						            </td> 
						            <td><input type="checkbox" id="selasa" name="selasa" value="1" onclick="return false;"
						            	<?php
							            	if ($data_periode2->WD2==true){
							            		echo "checked";
							            	}
						            	?>
						            	>
						            </td>
						            <td><input type="checkbox" id="rabu" name="rabu" value="1" onclick="return false;"
						            	<?php
							            	if ($data_periode2->WD3==true){
							            		echo "checked";
							            	}
						            	?>
						            	>
						            </td>
						            <td><input type="checkbox" id="kamis" name="kamis" value="1" onclick="return false;"
						            	<?php
							            	if ($data_periode2->WD4==true){
							            		echo "checked";
							            	}
						            	?>
						            	>
						            </td>
						            <td><input type="checkbox" id="jumat" name="jumat" value="1" onclick="return false;"
						            	<?php
							            	if ($data_periode2->WD5==true){
							            		echo "checked";
							            	}
						            	?>
						            	>
						            </td> 
						            <td><input type="checkbox" id="sabtu" name="sabtu" value="1" onclick="return false;"
						            	<?php
							            	if ($data_periode2->WD6==true){
							            		echo "checked";
							            	}
						            	?>
						            	>
						            </td>  
								</tr>
							<?php
								$no++;
						              
					         	}

					         ?>                            
						                         
						    </tbody>  
					    </table>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
	</div>	<!--/.main-->

