<link href="<?php echo base_url('assets/cp/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css')?>" rel="stylesheet" type="text/css"/>
<style type="text/css">
	.col-sm-8{    height: 30px;
    padding-top: 8px;}
	.control-label{font-weight: bold}
</style>
		
		<div class="wrapper theme-1-active pimary-color-red">
	<div class="page-wrapper">
				<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						  <h5 class="txt-dark">Application</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><a href="">Dashboard</a></li>
							<li class="active"><span>Application</span></li>
						  </ol>
						</div>
						<!-- /Breadcrumb -->
					</div>

					<div class="row" style=" background: #fff">
						<div class="col-sm-7">
							<div class="panel" style="padding: 15px 15px 0;margin-left: -9px;margin-right: -9px;">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">View Application</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
                       
				  <div class="col-sm-12 col-xs-12">
					 <div class="form-wrap"> 
							 <div class="form-horizontal">
							 
							 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-4 control-label">Application No. </label>
									 <div class="col-sm-8">
									 <?php echo $user->users_id ?>
									 </div>
								 </div>
								 
								 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-4 control-label">Application Date </label>
									 <div class="col-sm-8">
									 <?php echo $user->users_created_on ?>
									 </div>
								 </div>
							 
							  <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-4 control-label">Full Name </label>
									 <div class="col-sm-8">
									 <?php echo $user->users_fullname ?>
									 </div>
								 </div>
								 
								 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-4 control-label">Email </label>
									 <div class="col-sm-8">
									 <?php echo $user->admin_email ?>
									 </div>
								 </div>
								 
								 
								 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-4 control-label">WhatsApp </label>
									 <div class="col-sm-8">
									 <?php echo $user->users_whatapp ?>
									 </div>
								 </div>
								

                                
                              
                                 <div class="form-group ">
	 								<label for="exampleInputEmail_4" class="col-sm-4 control-label">Countery</label>
									 <div class="col-sm-8">
									<?php echo $user->country_name_en ?>
									 </div>
								 </div>
                                
                                
								
								 <div class="form-group" id="university_name">
									<label for="exampleInputEmail_4" class="col-sm-4 control-label">Program</label>
									 <div class="col-sm-8">
										 <?php echo $user->users_program ?>
									 </div>
								 </div>
								 
								 <div class="form-group" id="university_name">
									<label for="exampleInputEmail_4" class="col-sm-4 control-label">Apply for</label>
									 <div class="col-sm-8">
										 <?php if($user->apply_name == null || $user->apply_name == '')
										{
											echo '--';
											}
	  									else {
											echo $user->apply_name;
										} ?>
										
									 </div>
								 </div>
								 
								 
								 
								 <div class="form-group" id="university_name">
									<label for="exampleInputEmail_4" class="col-sm-4 control-label">Institution</label>
									 <div class="col-sm-8">
									 <?php if($user->institution_name == null || $user->institution_name == '')
										{
											echo '--';
											}
	  									else {
											echo $user->institution_name;
										} ?>

									 </div>
								 </div>
								 
								 
								 
								 <div class="form-group" id="university_name">
									<label for="exampleInputEmail_4" class="col-sm-4 control-label" >Institution Name</label>
									 <div class="col-sm-8">
									 <?php if($user->users_institution_name == null || $user->users_institution_name == '')
										{
											echo '--';
											}
	  									else {
											echo $user->users_institution_name;
										} ?>
									 </div>
								 </div>
								 

								  <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-4 control-label">Degree </label>
									 <div class="col-sm-8">
									
									 <?php if($user->degree_name == null || $user->degree_name == '')
										{
											echo '--';
											}
	  									else {
											echo $user->degree_name;
										} ?>
									 </div>
								 </div>
								 
								 
								 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-4 control-label">University</label>
									 <div class="col-sm-8">
									<?php if($user->university_name == null || $user->university_name == '')
										{
											echo '--';
											}
	  									else {
											echo $user->university_name;
										} ?>
									 </div>
								 </div>
								 
								 
								 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-4 control-label">Collage Name</label>
									 <div class="col-sm-8">
									<?php if($user->users_collage_name == null || $user->users_collage_name == ''){
											echo '--';
											}
	  									else {
											echo $user->users_collage_name;
										} ?>
									 </div>
								 </div>
								 
								 
								 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-4 control-label">Course</label>
									 <div class="col-sm-8">
									<?php if($user->users_course == null || $user->users_course == '')
										{
											echo '--';
											}
	  									else {
											echo $user->users_course;
										} ?>
									 </div>
								 </div>
								 
								 
								 
								 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-4 control-label">International School</label>
									 <div class="col-sm-8">
									<?php if($user->users_international_name == null || $user->users_international_name == '')
										{
											echo '--';
											}
	  									else {
											echo $user->users_international_name;
										} ?>
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
					
					<div class="col-sm-5">
						
								<div class="panel-heading">
									
									<div class="clearfix"></div>
								</div>
								<h2 style="padding-top: 50px;">Attachments </h2>
									<br><br><br><br>
								 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-5 control-label">Copy of Passport</label>
									 <div class="col-sm-5">
									<?php if($user->users_img_passport != ''){ ?>
						          
							        <div class="col-sm-2">
									 
									   <a class="btn btn-default" style="margin-left:20px;" href="<?php echo site_url('admin/application/download_passport/'.$user->users_id); ?>" data-toggle="tooltip" title="Delete File" onclick="return areyousure()"><i class="fa fa-download"></i> <?php echo lang('download');?></a>
									   </div>
									   <?php } ?>
									 </div>
								 </div>
								 
								 <br><br>
								  <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-5 control-label">Qualification </label>
									 <div class="col-sm-5">
									<?php if($user->users_img_qualifications != ''){ ?>
						          
							        <div class="col-sm-2">
									 
									   <a class="btn btn-default" style="margin-left:20px;" href="<?php echo site_url('admin/application/download_qualifications/'.$user->users_id); ?>" data-toggle="tooltip" title="Delete File" onclick="return areyousure()"><i class="fa fa-download"></i> <?php echo lang('download');?></a>
									   </div>
									   <?php } ?>
									 </div>
								 </div>
								 
								 <br><br>
								  <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-5 control-label">Experiense Certificate</label>
									 <div class="col-sm-5">
									<?php if($user->users_img_certificate != ''){ ?>
						          
							        <div class="col-sm-2">
									 
									   <a class="btn btn-default" style="margin-left:20px;" href="<?php echo site_url('admin/application/download_certificate/'.$user->users_id); ?>" data-toggle="tooltip" title="Delete File" onclick="return areyousure()"><i class="fa fa-download"></i> <?php echo lang('download');?></a>
										 </div>
									   <?php } ?>
									 </div>
								 </div>
								 <br><br>
								 
						
						
						
						</div>
						
						
						
 </div>		
					
 </div>
  </div>
			
</div>



