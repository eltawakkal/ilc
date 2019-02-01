<link href="<?php echo base_url('assets/cp/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css')?>" rel="stylesheet" type="text/css"/>

	
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
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Name </label>
									 <div class="col-sm-8">
									 <input class="form-control" placeholder="Enter university" name="coordinators_name" type="text" value="<?php echo $coordinators->coordinators_name ?>" />
									 </div>
								 </div>
                                
                                
                                 <div class="form-group ">
	 								<label for="exampleInputEmail_4" class="col-sm-3 control-label">Student name</label>
									 <div class="col-sm-8">
									<select name="coordinators_university" class="form-control select2" >
										<option value="">--Choose student---</option>
										<?php foreach($university as $new) {
											$sel = "";
											if($new->university_id==$coordinators->coordinators_university) $sel='selected="selected"';
											echo '<option value="'.$new->university_id.'" '.$sel.'>'.$new->university_name.'</option>';
										}
										
										?>
									</select>
									 </div>
								 </div>
                                
                              <div class="form-group">
								 <label for="exampleInputuname_4" class="col-sm-3 control-label">Phone</label>
								    <div class="col-sm-8">
									 <input class="form-control" name="coordinators_phone" type="text" placeholder="Enter phone" value="<?php echo $coordinators->coordinators_phone ?>" >
							        </div>
							 </div>
							 
							  <div class="form-group">
								 <label for="exampleInputuname_4" class="col-sm-3 control-label">Eamil</label>
								    <div class="col-sm-8">
									 <input class="form-control" name="coordinators_email" type="email" placeholder="Enter email" value="<?php echo $coordinators->coordinators_email ?>" >
							        </div>
							 </div>
                               
                                 <div class="form-group">
								 <label for="exampleInputuname_4" class="col-sm-3 control-label">Receipt</label>
								    <div class="col-sm-8">
									 <input class="form-control" name="coordinators_img" type="file" >
					        <br>
									 <?php if(!empty($coordinators->coordinators_img)){ ?>
									   <a class="btn btn-default" style="margin-left:20px;" href="<?php echo site_url('admin/coordinators/download/'.$coordinators->coordinators_id); ?>" data-toggle="tooltip" title="Delete File" ><i class="fa fa-download"></i> <?php echo lang('download');?></a>  <?php  } ?>

					        
						        
						       
						        
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



