<!DOCTYPE html>
<?php $CI = get_instance();
$CI->load->model('setting_model');
$settings = $CI->setting_model->get_setting();
?>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>.:: <?php echo $settings->name;?> | Login ::.</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
           <link rel="shortcut icon" href="favicon.ico">
		   <link rel="icon" href="favicon.ico" type="image/x-icon">
           
           <link href="<?php echo base_url('assets/cp/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css')?>" rel="stylesheet" type="text/css"/>
           
            <style type="text/css">
				
		</style>
		 <link href="<?php echo base_url('assets/cp/dist/css/style.css')?>" rel="stylesheet" type="text/css">
		  <style type="text/css">
			  .alert.alert-info{background: #F28D37 !important}
		.navbar.navbar-inverse.navbar-fixed-top .nav.top-nav > li > a .top-nav-icon-badge{background: #F28D37 !important}
		.btn.btn-info, .wizard > .actions a.btn-info, .dt-buttons .btn-info.dt-button, .tablesaw-sortable th.tablesaw-sortable-head button.btn-info, .sweet-alert button.btn-info, .owl-theme .owl-nav .btn-info[class*="owl-"], button.btn-info.fc-agendaDay-button.fc-state-default.fc-corner-right, button.btn-info.fc-month-button.fc-state-default.fc-corner-left, button.btn-info.fc-agendaWeek-button, .btn-info.fc-prev-button, .btn-info.fc-next-button, .btn-info.fc-today-button{background: #F28D37 !important; border: solid 1px #F28D37}
	  .btn.btn-outline.btn-info, .wizard > .actions a.btn-outline.btn-info, .wizard > .actions .note-editor a.btn-info.note-btn.btn-sm, .note-editor .wizard > .actions a.btn-info.note-btn.btn-sm, ul.wysihtml5-toolbar a.btn.btn-info, ul.wysihtml5-toolbar .wizard > .actions a.btn-info, .wizard > .actions ul.wysihtml5-toolbar a.btn-info, ul.wysihtml5-toolbar .dt-buttons a.btn-info.dt-button, .dt-buttons ul.wysihtml5-toolbar a.btn-info.dt-button, ul.wysihtml5-toolbar .owl-theme .owl-nav a.btn-info[class*="owl-"], .owl-theme .owl-nav ul.wysihtml5-toolbar a.btn-info[class*="owl-"], ul.wysihtml5-toolbar a.btn-info.fc-prev-button, ul.wysihtml5-toolbar a.btn-info.fc-next-button, ul.wysihtml5-toolbar a.btn-info.fc-today-button, .note-editor .btn.btn-info.note-btn.btn-sm, .note-editor .dt-buttons .btn-info.note-btn.btn-sm.dt-button, .dt-buttons .note-editor .btn-info.note-btn.btn-sm.dt-button, .note-editor .sweet-alert button.btn-info.note-btn.btn-sm, .sweet-alert .note-editor button.btn-info.note-btn.btn-sm, .note-editor .owl-theme .owl-nav .btn-info.note-btn.btn-sm[class*="owl-"], .owl-theme .owl-nav .note-editor .btn-info.note-btn.btn-sm[class*="owl-"], .note-editor button.btn-info.note-btn.btn-sm.fc-agendaWeek-button, .note-editor .btn-info.note-btn.btn-sm.fc-prev-button, .note-editor .btn-info.note-btn.btn-sm.fc-next-button, .note-editor .btn-info.note-btn.btn-sm.fc-today-button, .dt-buttons .btn-outline.btn-info.dt-button, .tablesaw-sortable th.tablesaw-sortable-head button.btn-info, .sweet-alert button.btn-outline.btn-info, .owl-theme .owl-nav .btn-outline.btn-info[class*="owl-"], .owl-theme .owl-nav button.btn-info[class*="owl-"].fc-agendaWeek-button, button.btn-info.fc-agendaDay-button.fc-state-default.fc-corner-right, button.btn-info.fc-month-button.fc-state-default.fc-corner-left, button.btn-info.fc-agendaWeek-button, .btn-outline.btn-info.fc-prev-button, .btn-outline.btn-info.fc-next-button, .btn-outline.btn-info.fc-today-button{border:1px solid #F28D37 !important; color:#fff}
		</style> 
  
    </head>
    <body  class="bodyyy">
       <div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		
		<div class=" pa-0">
		<header class="sp-header">
				<div class="sp-logo-wrap pull-left">
					<a href="index.html">
					<img class="brand-img mr-10"  src="<?php echo base_url('uploads/'.@$settings->img); ?>" alt="<?php echo $settings->name;?>"/>
					
						
						
					</a>
				</div>
				<div class="form-group mb-0 pull-right">
					<span class="inline-block pr-10">Already have an account?</span>
					<a class="inline-block btn btn-info btn-rounded btn-outline" href="<?php echo site_url('register')?>">Sign up</a>
				</div>
				<div class="clearfix"></div>
			</header>
 
		<div class=" pa-0 ma-0 auth-page">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row">
									<div class="col-sm-12 col-xs-12"  style="padding: 20px; background: #fff;border:1px solid #6666">
										<div class="mb-30">
											<h3 class="text-center txt-dark mb-10">Login to system</h3>
										</div>	
										
											<?php 
			
				if($this->session->flashdata('message'))
						$message = $this->session->flashdata('message');
				  if($this->session->flashdata('error'))
						$error  = $this->session->flashdata('error');
			?>
			
            <?php if(!empty($error) || !empty($message)){ ?>
			<div class="container" style="margin-top:20px;padding-left:0px !important">
					
                    <?php if (!empty($error)): ?>
                    <div class="alert alert-danger alert-dismissable col-md-4">
                        <i class="fa fa-ban"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo $error; ?>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($message)): ?>
                    <div class="alert alert-info alert-dismissable col-md-4">
                        <i class="fa fa-info"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       <?php echo $message; ?>
                    </div>
                    <?php endif; ?>
                    
           </div>
           <?php }?>
           
										<div class="form-wrap">
											<form action="<?php echo site_url('admin/login/login')?>" method="post">
												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputEmail_2">Eamil</label>
													<input type="text" name="username" class="form-control" required="" id="exampleInputEmail_2" placeholder="Enter email">
												</div>
												<div class="form-group">
													<label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>
													
													<div class="clearfix"></div>
													<input type="password" name="password" class="form-control" required="" id="exampleInputpwd_2" placeholder="Enter password">
												</div>
												
												<div class="form-group">
													<div class="checkbox checkbox-primary pr-10 pull-left">
														<input id="checkbox_2"  type="checkbox">
														<label for="checkbox_2"> Remmber me</label>
                                                        <input type="hidden" value="admin/admin" name="redirect">
														<input type="hidden" value="submitted" name="submitted">
													</div>
													<div class="clearfix"></div>
												</div>
												<div class="form-group text-center">
													<button type="submit" class="btn btn-info btn-rounded">Login</button>
												</div>
											
											</form>
										</div>
										
									</div>
										
								</div>
								<br>
								<span class="inline-block pr-10">Did you forget your password?</span>
					<a class="inline-block btn btn-info btn-rounded btn-outline" href="<?php echo site_url('register/forget')?>">Recovery</a>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</div>
           
        </div>

       
    </body>
    
        <script src="<?php echo base_url('assets/cp/vendors/bower_components/jquery/dist/jquery.min.js')?>"></script>
		<script src="<?php echo base_url('assets/cp/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
		<script src="<?php echo base_url('assets/cp/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js')?>"></script>
		<script src="<?php echo base_url('assets/cp/dist/js/jquery.slimscroll.js')?>"></script>
		<script src="<?php echo base_url('assets/cp/dist/js/init.js')?>"></script>
    

</html>
