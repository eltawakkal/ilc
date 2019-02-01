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
										<h6 class="panel-title txt-dark">Setting</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
                       
				  <div class="col-sm-12 col-xs-12">
					 <div class="form-wrap">
                       
							 
<?php  if(validation_errors()){ ?>
<div class="alert alert-danger alert-dismissable">
<i class="fa fa-ban"></i>
<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-close"></i></button>
<b><?php echo lang('alert')?>!</b><?php echo validation_errors(); ?>
</div>

<?php  } ?>   
					   			 
			 <form method="post" enctype="multipart/form-data" action="<?php echo site_url('admin/website/')?>"> 
							 <div class="form-horizontal">
				   			  
					   			 
					   			
								 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Name system </label>
									 <div class="col-sm-8">
									 <input class="form-control" placeholder="Enter Name System" name="name" id="name" type="text" value="<?php echo $settings->name ?>" />
									 </div>
								 </div>
								

								
								 <div class="form-group" id="university_name">
									<label for="exampleInputEmail_4" class="col-sm-3 control-label">Address</label>
									 <div class="col-sm-8">
										 <textarea class="form-control" name="address" id="address" va
										 	<?php echo $settings->address ?>
										   ></textarea>
									 </div>
								 </div>


                                 <div class="form-group">
                                     <label for="exampleInputuname_4" class="col-sm-3 control-label">Email </label>
                                     <div class="col-sm-8">
                                         <input class="form-control" placeholder="Enter Email" name="email" id="email" type="text" value="<?php echo $settings->email ?>" />
                                     </div>
                                 </div>


                                 <div class="form-group">
                                     <label for="exampleInputuname_4" class="col-sm-3 control-label">Title email </label>
                                     <div class="col-sm-8">
                                         <input class="form-control" placeholder="Enter title email" name="title_email" id="title_email" type="text" value="<?php echo $settings->title_email ?>" />
                                     </div>
                                 </div>
								 
								
								  <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Image system</label>
									 <div class="col-sm-8">
									 <input class="form-control" id="img" name="img"    type="file" >
									  <img src="<?php echo base_url('uploads/'.@$settings->img); ?>" width="140" height="100" />
									 </div>
									
									 
								 </div>
								 
								 <div class="form-group">
								  <label for="exampleInputuname_4" class="col-sm-3 control-label"> </label>
									 <div class="col-sm-8">
								  <button type="submit"  class="btn btn-primary">Update</button>
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

<script type="text/javascript">

function btn_update(){
 var users_whatapp =$('#users_whatapp').val();	
 var users_country =$('#users_country').val();
 var admin_password =$('#admin_password').val();
 var admin_confirm =$('#admin_confirm').val();
	
	if(admin_password !=  admin_confirm){
		$('#val_password').show();
		return false;
	}
	else {
		
		$('#val_password').hide();
	}
	
	
	$.ajax({
    url: '<?php echo site_url('admin/setting/update_1') ?>',
    type:'POST',
    data:{users_whatapp:users_whatapp,
		 users_country:users_country},
    success:function(result){
      $('#success').show();
	 
	 }
  });
	
	if(admin_password == null || admin_password ==''){
		
	}
	else {
		$.ajax({
		url: '<?php echo site_url('admin/setting/update_2') ?>',
		type:'POST',
		data:{admin_password:admin_password},
		success:function(result){
		  $('#success').show();

		 }
	  });
	}
	
}
</script>

