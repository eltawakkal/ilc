<div class="wrapper theme-1-active pimary-color-red">
	<div class="page-wrapper">
				<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						  <h5 class="txt-dark">نوع المستخدم</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><a href="index.html">لوحة التحكم</a></li>
							<li class="active"><span>نوع المستخدم</span></li>
						  </ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
					
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								
								
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">اضافة</h6>
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
                                                  	<?php echo form_open_multipart('admin/admin_role/add/'); ?>
													<div class="form-horizontal">
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-2 control-label">نوع المستخدم</label>
															<div class="col-sm-4">
																	<input class="form-control" name="name"  type="text">
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputEmail_4" class="col-sm-2 control-label">الوصف</label>
															<div class="col-sm-4">
																	<textarea class="form-control" name="description" id="exampleInputEmail_4" placeholder="نبذة عن نوع المستخدم" ></textarea>
															</div>
														</div>
														
														<div class="form-group mb-0">
															<div class="col-sm-offset-3 col-sm-9">
																<button type="submit" class="btn btn-info ">حفظ</button>
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
