<script type="text/javascript">
function areyousure()
{
	return confirm('<?php echo lang('are_you_sure');?>');
}
</script>


	<!-- Bootstrap Colorpicker CSS -->
<link href="<?php echo base_url('assets/cp/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')?>" rel="stylesheet" type="text/css"/>

<!-- Bootstrap Datetimepicker CSS -->
<link href="<?php echo base_url('assets/cp/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')?>" rel="stylesheet" type="text/css"/>

<!-- Bootstrap Daterangepicker CSS -->
<link href="<?php echo base_url('assets/cp/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.css')?>" rel="stylesheet" type="text/css"/>
		
	<div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Applications</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="#">Dashboard</a></li>
						<li class="active"><span>Applications</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">List</h6>
								</div>
								<div class="clearfix"></div>
							</div>
                            
                            <?php // if(check_admin_role(43)==1){?>	
                             <!--<div class="row" style="margin-bottom:10px;">
                                <div class="col-xs-12">
                                    <div class="btn-group pull-right">
                                        <a class="btn btn-primary" href="<?php echo site_url('admin/Attachments/add/'); ?>"><i class="fa fa-plus"></i> Add New</a>
                                    </div>
                                </div>    
                            </div>-->	
							<?php // } ?>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
								
								
								<div class="row">
									<div class="col-sm-3">
										<div class="form-group">
											<label class="control-label mb-10 text-left">From Date</label>
											<div class='input-group date' id='datetimepicker1'>
												<input type='text' class="form-control" placeholder="Enter From Date" />
												<span class="input-group-addon">
													<span class="fa fa-calendar"></span>
												</span>
											</div>
										</div>
									</div>
									
									
									
									<div class="col-sm-3">
										<div class="form-group">
											<label class="control-label mb-10 text-left">To Date</label>
											<div class='input-group date' id='datetimepicker2'>
												<input type='text' class="form-control" placeholder="Enter To Date" />
												<span class="input-group-addon">
													<span class="fa fa-calendar"></span>
												</span>
											</div>
										</div>
									</div>
									
									<div class="col-sm-3">
										<div class="form-group">
											<label class="control-label mb-10 text-left">Status App.</label>
											<div>
												<select class="selectpicker" data-style="form-control btn-default btn-outline">
												    <option value="0">Select Option</option>
													<option value="1">Agent by Enter</option>
													<option value="2">Coupon by</option>
												</select>
											</div>
										</div>
									</div>
									
									<div class="col-sm-3">
										<div class="form-group">
										
											<button class="btn  btn-primary" style="position:relative; top: 34px">Search</button>
										</div>
									</div>
								</div>
											
											
												
										<br><br>		
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table table-hover table-bordered display mb-30 dataTable" >
												<thead>
													<tr>
														<th>#</th>
														<th>App No.</th>
                                                        <th>App Date</th>
                                                        <th>Full Name</th>
                                                        <th>Program</th>
                                                        <th>Accrued Comission</th>
                                                        <th>Comission Status</th>
														<th style="width:10%">Redeem</th>
														<th style="width:10%">Action</th>
													</tr>
												</thead>
                                                 <?php if(isset($applications)):?>
                        						<tbody>
                            						<?php $i=1;foreach ($applications as $new){?>
													<tr>
														 <td> <?php echo $i?></td>
                                                         <td> <a style="text-decoration: underline" href="<?php echo site_url('admin/application/view/'.$new->users_id); ?>"><?php echo $new->users_id?></a></td>
                                                         <td> <?php echo $new->users_created_on;?></td>
                                                         <td> <?php echo $new->users_fullname;?></td>
                                                         <td> <?php echo $new->users_program;?></td>
                                                         <td> <?php echo $new->users_program;?></td>
                                                         <td> <?php  if($new->users_comission_rate == 1){
															 			echo 'Yes';
																		}
																	   else {
																		   echo 'No';
																	   }
															 ?></td>
                                                        <td><a class="btn btn-primary" href="<?php echo site_url('admin/Attachments/add/'); ?>">Redeem Now</a></td>
                                                        <td><a class="btn btn-success" href="<?php echo site_url('admin/application/edit/'.$new->users_id); ?>"><i class="fa fa-edit"></i> Edit</a></td>
                                                         
                              
										
                                </tr>
                                <?php $i++;}?>
                        </tbody>
                        <?php endif;?>
                    </table>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
			</div>
            
    <script src="<?php echo base_url('assets/cp/vendors/bower_components/jquery/dist/jquery.min.js')?>"></script>
	<script src="<?php echo base_url('assets/cp/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/cp/dist/js/dataTables-data.js')?>"></script>
    <script src="<?php echo base_url('assets/cp/dist/js/jquery.slimscroll.js')?>"></script>
	<script src="<?php echo base_url('assets/cp/dist/js/dropdown-bootstrap-extended.js')?>"></script>
    
     <script type="text/javascript" src="<?php echo base_url('assets/cp/vendors/bower_components/moment/min/moment-with-locales.min.js')?>"></script>
		
		<!-- Bootstrap Colorpicker JavaScript -->
	<script src="<?php echo base_url('assets/cp/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')?>"></script>
				
		<!-- Bootstrap Datetimepicker JavaScript -->
	<script type="text/javascript" src="<?php echo base_url('assets/cp/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')?>"></script>
		
		<!-- Bootstrap Daterangepicker JavaScript -->
	<script src="<?php echo base_url('assets/cp/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
		
		<!-- Form Picker Init JavaScript -->
	<script src="<?php echo base_url('assets/cp/dist/js/form-picker-data.js')?>"></script>
			
	