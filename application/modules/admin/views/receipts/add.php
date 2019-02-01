  <link href="<?php echo base_url('assets/cp/vendors/bower_components/dropify/dist/css/dropify.min.css')?>" rel="stylesheet" type="text/css"/>
  
  	<!-- Bootstrap Colorpicker CSS -->
<link href="<?php echo base_url('assets/cp/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')?>" rel="stylesheet" type="text/css"/>

<!-- Bootstrap Datetimepicker CSS -->
<link href="<?php echo base_url('assets/cp/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')?>" rel="stylesheet" type="text/css"/>

<!-- Bootstrap Daterangepicker CSS -->
<link href="<?php echo base_url('assets/cp/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.css')?>" rel="stylesheet" type="text/css"/>


<div class="wrapper theme-1-active pimary-color-red">
	<div class="page-wrapper">
				<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						  <h5 class="txt-dark">Receipts</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><a href="#">Dashboard</a></li>
							<li class="active"><span>Receipts</span></li>
						  </ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
					
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Add</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
                                        	<?php  if(validation_errors()){ ?>
										<div class="alert alert-danger alert-dismissable">
										  <i class="fa fa-ban"></i>
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-close"></i></button>
										  <b><?php echo lang('alert');?>!</b><?php echo validation_errors(); ?>
										</div>

										<?php  } ?>
				 <div class="col-sm-12 col-xs-12">
					 <div class="form-wrap">
                   <?php echo form_open_multipart('admin/receipts/add/'); ?>
						 <div class="form-horizontal input_fields_wrap">
							 <div class="form-group">
								 <label for="exampleInputuname_4" class="col-sm-2 control-label">University</label>
								    <div class="col-sm-4">
                                        <select name="receipts_university" class="form-control select2" >
                                            <option value="">--Choose university---</option>
                                            <?php foreach($univerity as $new) {

                                                echo '<option value="'.$new->university_id.'">'.$new->university_name.'</option>';
                                            }

                                            ?>
                                        </select>
							        </div>
							 </div>
                             <div class="form-group">
								 <label for="exampleInputuname_4" class="col-sm-2 control-label">Student name</label>
								    <div class="col-sm-4">
									 <select name="receipts_std_id" id="receipts_std_id" class="form-control select2">
										<option value="0">--Choose student name --</option>
										  <?php if(isset($all_std)):?>
                            					<?php $i=1;foreach ($all_std as $new){?>
											<option value="<?php echo $new->users_id; ?>"><?php echo $new->users_fullname; ?></option>
											
											    <?php $i++;}?>
                                          <?php endif;?>
										
									</select>
							        </div>
							       
							 </div>
							 
							 <div class="form-group">
								 <label for="exampleInputuname_4" class="col-sm-2 control-label">Payment status</label>
								    <div class="col-sm-4">
									 <select name="receipts_fund_status" id="receipts_fund_status" class="form-control">
										<option value="0">--Choose payment status --</option>
										<option value="1">Yes</option>
										<option value="2">No</option>
										
									</select>
							        </div>
							       
							 </div>
							 
							 <div class="form-group">
								 <label for="exampleInputuname_4" class="col-sm-2 control-label">Payment</label>
								    <div class="col-sm-2">
									 <input class="form-control" name="receipts_fund" type="text" placeholder="Enter payment" required >
							        </div>
							 </div>
							 
							
								<div class="form-group">
									<label for="exampleInputuname_4" class="col-sm-2 control-label">Date</label>
									<div class='col-sm-2 input-group date' id='datetimepicker1' style="padding-right:15px !important; padding-left: 15px !important">
										<input type='text' class="form-control" placeholder="Enter from date" name="receipts_date" />
										<span class="input-group-addon">
											<span class="fa fa-calendar"></span>
										</span>
									</div>
								</div>
									
							 
							 
							 <div class="form-group">
								 <label for="exampleInputuname_4" class="col-sm-2 control-label">Receipt</label>
								    <div class="col-sm-4">
									 <input class="form-control" name="receipts_img" type="file" placeholder="Enter University" required >
							        </div>
							 </div>
							 </div>
							
							 <div class="form-group mb-0">
								 <div class="col-sm-offset-3 col-sm-9">
									 <button type="submit" class="btn btn-info ">Save</button>
								 </div>
							 </div>
							  
				  <?php form_close()?>
				
		 </div>
	 </div>
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

