<link href="<?php echo base_url('assets/cp/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css')?>" rel="stylesheet" type="text/css"/>

		
		<div class="wrapper theme-1-active pimary-color-red">
	<div class="page-wrapper">
				<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						  <h5 class="txt-dark">Setting</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><a href="">Dashboard</a></li>
							<li class="active"><span>Setting</span></li>
						  </ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
					
					
					
					
					
					
					<div class="row" style=" background: #fff">
						<div class="col-sm-9">
							<div class="panel" style="padding: 15px 15px 0;margin-left: -9px;margin-right: -9px;">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Edit password</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
                       
				  <div class="col-sm-12 col-xs-12">
					 <div class="form-wrap">
                       
							  <div class="alert alert-danger alert-dismissable col-md-12" id="val_password" style="display:none">
									<i class="fa fa-ban"></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									 Not match password
					   			 </div>
					   			 
					   			 <div class="alert alert-danger alert-dismissable col-md-12" id="val_password2" style="display:none">
									<i class="fa fa-ban"></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									  Password required
					   			 </div>
					   			 
					   			 
					   			 
					   			  <div class="alert alert-info alert-dismissable col-md-12" id="success" style="display:none">
											<i class="fa fa-info"></i>
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										   Successfully updated                    
								</div>
					   			 
							 <div class="form-horizontal">
				   			  
					   		
                                
                                
								
								 <div class="form-group" id="university_name">
									<label for="exampleInputEmail_4" class="col-sm-3 control-label">Password</label>
									 <div class="col-sm-8">
										 <input class="form-control" id="admin_password" name="admin_password" type="password" >
									 </div>
								 </div>
								 
								
								  <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Password confirm</label>
									 <div class="col-sm-8">
									 <input class="form-control" id="admin_confirm" name="admin_confirm"    type="password" >
									 </div>
								 </div>
								 
								 <div class="form-group">
								  <label for="exampleInputuname_4" class="col-sm-3 control-label"> </label>
									 <div class="col-sm-8">
								  <button type="submit" onClick="btn_update();"  class="btn btn-primary">Update</button>
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
					
 </div>
  </div>
			
</div>




<script src="<?php echo base_url('assets/cp/vendors/bower_components/jquery/dist/jquery.min.js')?>"></script>

<script type="text/javascript">

function btn_update(){
 var admin_password =$('#admin_password').val();
 var admin_confirm =$('#admin_confirm').val();
	
	if(admin_password !=  admin_confirm){
		$('#val_password').show();
		return false;
	}
	else {
		
		$('#val_password').hide();
	}

	
	if(admin_password == null || admin_password ==''){
		$('#val_password2').show();
		return false;
	}
	else {
		$('#val_password2').hide();
	}
		$.ajax({
		url: '<?php echo site_url('admin/setting/update_2') ?>',
		type:'POST',
		data:{admin_password:admin_password},
		success:function(result){
		  $('#success').show();

		 }
	  });
	
	
}
</script>

