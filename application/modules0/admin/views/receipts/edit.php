<link href="<?php echo base_url('assets/cp/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css')?>" rel="stylesheet" type="text/css"/>

  
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
							<li><a href="">Dashboard</a></li>
							<li class="active"><span>Receipts</span></li>
						  </ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
					
					
					
					
					
					
					<div class="row" style=" background: #fff">
						<div class="col-sm-9">
							<div class="panel" style="padding: 15px 15px 0;margin-left: -9px;margin-right: -9px;">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Edit receipt</h6>
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
                        <form id="fas_form" method="post" enctype="multipart/form-data"  action="">
							 <div class="form-horizontal">

								 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">University </label>
									 <div class="col-sm-8">
									 <input class="form-control" placeholder="Enter university" name="receipts_university" type="text" value="<?php echo $receipts->receipts_university ?>" />
									 </div>
								 </div>
                                
                                
                                 <div class="form-group ">
	 								<label for="exampleInputEmail_4" class="col-sm-3 control-label">Student name</label>
									 <div class="col-sm-8">
									<select name="receipts_std_id" class="form-control select2" >
										<option value="">--Choose student---</option>
										<?php foreach($all_std as $new) {
											$sel = "";
											if($new->users_id==$receipts->receipts_std_id) $sel='selected="selected"';
											echo '<option value="'.$new->users_id.'" '.$sel.'>'.$new->users_fullname.'</option>';
										}
										
										?>
									</select>
									 </div>
								 </div>
                                
                                
                                 <div class="form-group ">
	 								<label for="exampleInputEmail_4" class="col-sm-3 control-label">Countery</label>
									 <div class="col-sm-8">
									<select name="receipts_fund_status" class="form-control select2" >
										<option value="0">--Choose fund status---</option>
										<?php if($receipts->receipts_fund_status == 1) {
											$yes='selected="selected"';
											$no = "";
											} else {
												$no='selected="selected"';
												$yes = "";
											}?>
											
											 <option value="1" <?php echo $yes;?> >Yes</option>
											 <option value="2" <?php echo $no;?>>No</option>
										}
										
										?>
									</select>
									 </div>
								 </div>

                                
                                 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Fund</label>
									 <div class="col-sm-8">
									 <input class="form-control" name="receipts_fund" placeholder="Enter whatApp" id="users_whatapp"  type="text" value="<?php echo $receipts->receipts_fund ?>" >
									 </div>
								 </div>
                                
                             
                                
                               
                               
                                <div class="form-group">
									<label for="exampleInputuname_4" class="col-sm-3 control-label">Date</label>
									<div class='col-sm-8 input-group date' id='datetimepicker1' style="padding-right:15px !important; padding-left: 15px !important">
										<input type='text' class="form-control" placeholder="Enter from date" name="receipts_date"  value="<?php echo $receipts->receipts_date ?>"/>
										<span class="input-group-addon">
											<span class="fa fa-calendar"></span>
										</span>
									</div>
								</div>
                               
                               
                               
                                 <div class="form-group">
								 <label for="exampleInputuname_4" class="col-sm-3 control-label">Receipt</label>
								    <div class="col-sm-8">
									 <input class="form-control" name="receipts_img" type="file" placeholder="Enter University"  >
					        
									 <?php if(!empty($receipts->receipts_img)){ ?>
									   <a class="btn btn-default" style="margin-left:20px;" href="<?php echo site_url('admin/receipts/download/'.$receipts->receipts_id); ?>" data-toggle="tooltip" title="Delete File" ><i class="fa fa-download"></i> <?php echo lang('download');?></a>  <?php  } ?>

					        
						        
						       
						        
							        </div>
							     </div>
                                

								 
								 <div class="form-group mb-0">
									 <div class="col-sm-offset-3 col-sm-9">
									 
										 <button id="btn_submit" type="submit" class="btn btn-info ">Update</button>
										 
									 </div>
								
							    </div>
							 </div>
						   </form>
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




