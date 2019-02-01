<!DOCTYPE html>
 <?php $CI = get_instance();
 $CI->load->model('setting_model');
 $settings = $CI->setting_model->get_setting();
?>
				 
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>.:: <?php echo $settings->name;?> ::.</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content=""/>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		
		<!-- vector map CSS -->
		<link href="<?php echo base_url('assets/cp/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css')?>" rel="stylesheet" type="text/css"/>
		
		<style type="text/css">
			.radio-info input[type="radio"]:checked + label:after{background: #F28D37 !important}
			.auth-form-wrap{ padding-top:50px !important;padding-bottom:40px !important } 
			 .alert.alert-info{background: #F28D37 !important}
		.navbar.navbar-inverse.navbar-fixed-top .nav.top-nav > li > a .top-nav-icon-badge{background: #F28D37 !important}
		.btn.btn-info, .wizard > .actions a.btn-info, .dt-buttons .btn-info.dt-button, .tablesaw-sortable th.tablesaw-sortable-head button.btn-info, .sweet-alert button.btn-info, .owl-theme .owl-nav .btn-info[class*="owl-"], button.btn-info.fc-agendaDay-button.fc-state-default.fc-corner-right, button.btn-info.fc-month-button.fc-state-default.fc-corner-left, button.btn-info.fc-agendaWeek-button, .btn-info.fc-prev-button, .btn-info.fc-next-button, .btn-info.fc-today-button{background: #F28D37 !important; border: solid 1px #F28D37}
	  .btn.btn-outline.btn-info, .wizard > .actions a.btn-outline.btn-info, .wizard > .actions .note-editor a.btn-info.note-btn.btn-sm, .note-editor .wizard > .actions a.btn-info.note-btn.btn-sm, ul.wysihtml5-toolbar a.btn.btn-info, ul.wysihtml5-toolbar .wizard > .actions a.btn-info, .wizard > .actions ul.wysihtml5-toolbar a.btn-info, ul.wysihtml5-toolbar .dt-buttons a.btn-info.dt-button, .dt-buttons ul.wysihtml5-toolbar a.btn-info.dt-button, ul.wysihtml5-toolbar .owl-theme .owl-nav a.btn-info[class*="owl-"], .owl-theme .owl-nav ul.wysihtml5-toolbar a.btn-info[class*="owl-"], ul.wysihtml5-toolbar a.btn-info.fc-prev-button, ul.wysihtml5-toolbar a.btn-info.fc-next-button, ul.wysihtml5-toolbar a.btn-info.fc-today-button, .note-editor .btn.btn-info.note-btn.btn-sm, .note-editor .dt-buttons .btn-info.note-btn.btn-sm.dt-button, .dt-buttons .note-editor .btn-info.note-btn.btn-sm.dt-button, .note-editor .sweet-alert button.btn-info.note-btn.btn-sm, .sweet-alert .note-editor button.btn-info.note-btn.btn-sm, .note-editor .owl-theme .owl-nav .btn-info.note-btn.btn-sm[class*="owl-"], .owl-theme .owl-nav .note-editor .btn-info.note-btn.btn-sm[class*="owl-"], .note-editor button.btn-info.note-btn.btn-sm.fc-agendaWeek-button, .note-editor .btn-info.note-btn.btn-sm.fc-prev-button, .note-editor .btn-info.note-btn.btn-sm.fc-next-button, .note-editor .btn-info.note-btn.btn-sm.fc-today-button, .dt-buttons .btn-outline.btn-info.dt-button, .tablesaw-sortable th.tablesaw-sortable-head button.btn-info, .sweet-alert button.btn-outline.btn-info, .owl-theme .owl-nav .btn-outline.btn-info[class*="owl-"], .owl-theme .owl-nav button.btn-info[class*="owl-"].fc-agendaWeek-button, button.btn-info.fc-agendaDay-button.fc-state-default.fc-corner-right, button.btn-info.fc-month-button.fc-state-default.fc-corner-left, button.btn-info.fc-agendaWeek-button, .btn-outline.btn-info.fc-prev-button, .btn-outline.btn-info.fc-next-button, .btn-outline.btn-info.fc-today-button{border:1px solid #F28D37 !important; color:#F28D37 !important}
			.btn.btn-info, .wizard > .actions a.btn-info, .dt-buttons .btn-info.dt-button, .tablesaw-sortable th.tablesaw-sortable-head button.btn-info, .sweet-alert button.btn-info, .owl-theme .owl-nav .btn-info[class*="owl-"], button.btn-info.fc-agendaDay-button.fc-state-default.fc-corner-right, button.btn-info.fc-month-button.fc-state-default.fc-corner-left, button.btn-info.fc-agendaWeek-button, .btn-info.fc-prev-button, .btn-info.fc-next-button, .btn-info.fc-today-button{border:1px solid #F28D37 !important; }
			.alert.alert-danger{background: #F28D37 !important}
		</style>
		
		<!-- Custom CSS -->
		<link href="<?php echo base_url('assets/cp/dist/css/style.css')?>" rel="stylesheet" type="text/css">
	</head>

	<body class="bodyyy">
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		
		<div class=" pa-0">
			<header class="sp-header">
				<div class="sp-logo-wrap pull-left">
					<a href="#">
					<img class="brand-img mr-10"  src="<?php echo base_url('uploads/'.@$settings->img); ?>" alt="<?php echo $settings->name;?>"/>
						
					</a>
				</div>
				<div class="form-group mb-0 pull-right">
					<span class="inline-block pr-10">Already have an account?</span>
					<a class="inline-block btn btn-info btn-rounded btn-outline" href="<?php echo site_url('admin/login')?>">Sign In</a>
				</div>
				<div class="clearfix"></div>
			</header>
			
			<!-- Main Content -->
			<div class=" pa-0 ma-0 auth-page">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row">
									<div class="col-sm-12 col-xs-12" style="padding: 20px; background: #fff;border:1px solid #6666">
										<div class="mb-30">
											<h3 class="text-center txt-dark mb-10">Sign up</h3>
										</div>	
										<div class="form-wrap">
										
										 <div class="alert alert-info alert-dismissable col-md-12" id="success" style="display:none">
											<i class="fa fa-info"></i>
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										   Successfully added                    
										   </div>
                      
                      			<div class="alert alert-danger alert-dismissable col-md-12" id="val_admin_email" style="display:none">
									<i class="fa fa-ban"></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										 Email required
								   </div>
                    
                    			<div class="alert alert-danger alert-dismissable col-md-12" id="val_admin_email_valid" style="display:none">
									<i class="fa fa-ban"></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										 Email invaild
								   </div>
                     
                     
                      
                      			 <div class="alert alert-danger alert-dismissable col-md-12" id="val_admin_password" style="display:none">
									<i class="fa fa-ban"></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										 Password required
								 </div>
                      
                      			 <div class="alert alert-danger alert-dismissable col-md-12" id="val_admin_confirm_password" style="display:none">
									<i class="fa fa-ban"></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										 Confirm password required
								 </div>
                      
                     			 <div class="alert alert-danger alert-dismissable col-md-12" id="val_admin_confirm_val" style="display:none">
									<i class="fa fa-ban"></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										  Password not match
								 </div>
                      
                      			<div class="alert alert-danger alert-dismissable col-md-12" id="val_admin_role" style="display:none">
									<i class="fa fa-ban"></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										  Type user
								 </div>
                     
                     			<div class="alert alert-danger alert-dismissable col-md-12" id="val_email_exist" style="display:none">
									<i class="fa fa-ban"></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										  Email exist
								 </div>
                      
                      <?php $style=''; if($setting->is_register == 0){ $style="disabled"?>
                      <div class="alert alert-danger alert-dismissable col-md-12" >
									<i class="fa fa-ban"></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										  The registeration has been paused
								 </div>
								
					  <?php } ?>
                   
                       
											 <div class="form-group">
													<label class="control-label mb-10" for="exampleInputEmail_2">Email address</label>
													<input type="email" class="form-control" id="admin_email" placeholder="Enter email" name="admin_email" <?php echo $style; ?> />
												</div>
												<div class="form-group">
													<label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password </label>
													<input type="password" class="form-control"  id="admin_password" name="admin_password" placeholder="Enter Password" <?php echo $style; ?>>
												</div>
												<div class="form-group">
													<label class="pull-left control-label mb-10" for="exampleInputpwd_3">Confirm password</label>
													<input type="password" class="form-control" required="" id="confirm_password" placeholder="Enter Confirm Password" <?php echo $style; ?>>
												</div>
												<div class="form-group mb-30">
													<label class="control-label mb-10 text-left">Please select user type</label>
													<div class="radio radio-info">
														<input type="radio" name="admin_role" class="admin_role" value="3" <?php echo $style; ?> >
														<label for="radio1">
															Student
														</label>
													</div>
													<div class="radio radio-info">
														<input type="radio" name="admin_role"  value="2" class="admin_rolea" <?php echo $style; ?>>
														<label for="radio2">
															Agent
														</label>
													</div>	
												</div>
												<?php if($setting->is_register == 1){?>
												<div class="form-group text-center">
													<button id="btn_submit" type="submit" class="btn btn-info btn-rounded" onClick="addUser();">sign up</button>
												</div>
												<?php } ?>
											
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="<?php echo base_url('assets/cp/vendors/bower_components/jquery/dist/jquery.min.js')?>"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url('assets/cp/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
		<script src="<?php echo base_url('assets/cp/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js')?>"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="<?php echo base_url('assets/cp/dist/js/jquery.slimscroll.js')?>"></script>
		
		<!-- Init JavaScript -->
		<script src="<?php echo base_url('assets/cp/dist/js/init.js')?>"></script>
		
		
<script>		
	 
	function addUser(){
		
			var admin_email = 	$('#admin_email').val();
			var admin_password = 	$('#admin_password').val();
		    var confirm_password = 	$('#confirm_password').val();
			var admin_role = $('input[name=admin_role]:checked').val();
		
		var filter = /^\d*(?:\.\d{1,2})?$/;
		var atpos = admin_email.indexOf("@");
		var dotpos = admin_email.lastIndexOf(".");
	
		if(admin_email == null || admin_email == ''){
			  $('#val_admin_email').show();
		      return false;
			}
			else {
			  $('#val_admin_email').hide();
				
			}
		
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=admin_email.length) {
		   $('#val_admin_email_valid').show();

			return false;
		} else 
		{
		 
		$('#val_admin_email_valid').hide();
	}
		
		if(admin_password == null || admin_password == ''){
			  $('#val_admin_password').show();
		      return false;
			}
			else {
			  $('#val_admin_password').hide();
				
			}
		
		if(confirm_password == null || confirm_password == ''){
			  $('#val_admin_confirm_password').show();
		      return false;
			}
			else {
			  $('#val_admin_confirm_password').hide();
				
			}
		
		if(admin_password  !=  confirm_password){
			$('#val_admin_confirm_val').show();
			return false;
		} else 
		{
			$('#val_admin_confirm_val').hide();
		}
		
		if ($("input[name='admin_role']:checked").length > 0){
		 $('#val_admin_role').hide();
			} else 
			{
             $('#val_admin_role').show();
			 return false;
			}

		$('#btn_submit').val('Sending ..')
      .attr('disabled','disabled');
		
			
			$.ajax({
			url: '<?php echo site_url('register/register/add_users') ?>',
			type:'POST',
			data:{admin_email:admin_email,
				  admin_password:admin_password,
				  admin_role :admin_role},
			success:function(result){
			  //alert('تم اضافة المستخدم بنجاح. لكن عليك تفعيل رقم الجوال الان في الحقل بالاسفل');
			   $('#btn_submit').prop('disabled', true);
			   $('#btn_submit').val('Send');
			   $('#success').show();
			   window.location.href = "http://portal.yonderedu.com";
			 }
		  });
			
			
		}
	
	
	 $('#admin_email').on('blur', function(){
	
		var admin_email = $('#admin_email').val();
		 $.ajax({
		url: '<?php echo site_url('register/check_username_exist') ?>',
		type:'POST',
		data:{admin_email:admin_email},
		success:function(result){
		  if(result >= '1'){
			   $('#val_email_exist').show();
			   $('#btn_submit').prop('disabled', true);
		  }
		  else {
		   $('#val_email_exist').hide();
		   $('#btn_submit').prop('disabled', false);
		  }
	 
	 }
  });
});
	
	
</script>
 
 
	</body>
</html>
