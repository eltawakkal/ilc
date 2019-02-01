  <link href="<?php echo base_url('assets/cp/vendors/bower_components/dropify/dist/css/dropify.min.css')?>" rel="stylesheet" type="text/css"/>

<div class="wrapper theme-1-active pimary-color-red">
	<div class="page-wrapper">
				<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						  <h5 class="txt-dark">Language centers</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><a href="#">Dashboard</a></li>
							<li class="active"><span>Language centers</span></li>
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
                                        	<?php 
	if(validation_errors()){
?>
<div class="alert alert-danger alert-dismissable">
  <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-close"></i></button>
  <b><?php echo lang('alert');?>!</b><?php echo validation_errors(); ?>
</div>

<?php  } ?>
				 <div class="col-sm-12 col-xs-12">
					 <div class="form-wrap">
                    <?php echo form_open_multipart('admin/lang_center/add/'); ?>
						 <div class="form-horizontal input_fields_wrap">
							 <div class="form-group">
								 <label for="exampleInputuname_4" class="col-sm-2 control-label">Language center</label>
								    <div class="col-sm-4">
									 <input class="form-control" name="language_center_name" type="text" placeholder="Enter language center" required >
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

