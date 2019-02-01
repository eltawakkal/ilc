  <link href="<?php echo base_url('assets/cp/vendors/bower_components/dropify/dist/css/dropify.min.css')?>" rel="stylesheet" type="text/css"/>


<div class="wrapper theme-1-active pimary-color-red">
	<div class="page-wrapper">
				<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						  <h5 class="txt-dark">Coupons</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><a href="#">Dashboard</a></li>
							<li class="active"><span>Coupons</span></li>
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
                    <form id="fas_form" method="post" enctype="multipart/form-data"  action="">
						 <div class="form-horizontal input_fields_wrap">
							 <div class="form-group">
								 <label for="exampleInputuname_4" class="col-sm-2 control-label">Code coupon</label>
								    <div class="col-sm-4">
									 <input class="form-control" name="coupons_code" type="text" placeholder="Enter Name" value="<?php echo $coupons->coupons_code; ?>"  >
							        </div>
							 </div>
                             <div class="form-group">
								 <label for="exampleInputuname_4" class="col-sm-2 control-label">Agents name</label>
								    <div class="col-sm-4">
									 <select name="coupons_agent_id" class="form-control select2">
										<option value="0">--Choose agents name --</option>
										  <?php if(isset($agents)):?>
                            					<?php $i=1;foreach ($agents as $new){
										 		$sel='';
										 if($coupons->coupons_agent_id == $new->agents_id) $sel='selected="selected"';?>
											<option value="<?php echo $new->agents_id; ?>" <?php echo $sel?></optio>><?php echo $new->agents_fullname; ?></option>
											
											    <?php $i++;}?>
                                          <?php endif;?>
										
									</select>
							        </div>
							       
							 </div>
							 
							 
							  <div class="form-group">
								 <label for="exampleInputuname_4" class="col-sm-2 control-label">Status</label>
								    <div class="col-sm-4">
									 <select name="coupons_status" class="form-control ">
										<option value="0">--Choose status --</option>
										<?php if($coupons->coupons_agent_id == 1){
										$active='selected="selected"';
	$unactive='';
}
										 else {
											 $active='';
	$unactive='selected="selected"';
											 
										 }?>
									  <option <?php echo $active ?> value="1">Active</option>
									  <option <?php echo $unactive ?> value="2">Unactive</option>
										  
										
									</select>
							        </div>
							       
							 </div>
							 
						
							 
							  
							 </div>
							
							 <div class="form-group mb-0">
								 <div class="col-sm-offset-3 col-sm-9">
									 <button type="submit" class="btn btn-info ">Update</button>
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

