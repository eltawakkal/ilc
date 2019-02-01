<link href="<?php echo base_url('assets/cp/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css')?>" rel="stylesheet" type="text/css"/>

	
		<div class="wrapper theme-1-active pimary-color-red">
	<div class="page-wrapper">
				<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						  <h5 class="txt-dark">institutions</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><a href="">Dashboard</a></li>
							<li class="active"><span>institutions</span></li>
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
								 <label for="exampleInputuname_4" class="col-sm-2 control-label">University</label>
								    <div class="col-sm-4">
									 <input class="form-control" name="university_name" type="text" placeholder="Enter University" value="<?php echo $institution->university_name ;?>" >
							        </div>
							 </div>
                             <div class="form-group">
								 <label for="exampleInputuname_4" class="col-sm-2 control-label">File</label>
								    <div class="col-sm-4">
									 <select name="university_type" class="form-control">
										<option value="0">--Choose institution type --</option>
										  <?php if(isset($services)):?>
                            					<?php $i=1;foreach ($services as $new){
											$sel = "";
											if($new->services_id==$institution->university_type) $sel='selected="selected"';
										 ?>
											<option <?php echo $sel ;?> value="<?php echo $new->services_id; ?>"><?php echo $new->services_name; ?></option>
											
											    <?php $i++;}?>
                                          <?php endif;?>
										
									</select>
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



