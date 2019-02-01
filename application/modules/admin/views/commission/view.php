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
										<h2 >View application</h2>
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
									 <label for="exampleInputuname_4" class="col-sm-4 control-label">Application no. </label>
									 <div class="col-sm-8">
									 <?php echo $user->users_id ?>
									 </div>
								 </div>
								 
								 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-4 control-label">Application date </label>
									 <div class="col-sm-8">
									 <?php echo $user->users_created_on ?>
									 </div>
								 </div>
							 
							  <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-4 control-label">Full name </label>
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
								

                                
                              
                                 <div class="form-group">
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
										 <?php if($user->apply_name == null || $user->apply_name == '' )
										{echo '--';
											}
	  									else {
											echo $user->apply_name;
										} ?>
									 </div>
								 </div>
								 
								 
								 
								 <div class="form-group" id="university_name">
									<label for="exampleInputEmail_4" class="col-sm-4 control-label">Institution</label>
									 <div class="col-sm-8">
									 <?php if($user->institution_name == null || $user->institution_name == '' )
										{
											echo '--';
											}
	  									else {
											echo $user->institution_name;
										} ?>

									 </div>
								 </div>
								 
								 
								 
								 <div class="form-group" >
									<label for="exampleInputEmail_4" class="col-sm-4 control-label" >Institution name</label>
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
									 <label for="exampleInputuname_4" class="col-sm-4 control-label">International school </label>
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
								
								 <h2 style="padding-top: 50px;">Commission application </h2>
								 <br>
								 
								 <input type="hidden" value="<?php echo $user->users_id ?>" id="users_id"/>
							     <div class="form-group">
									<label for="exampleInputEmail_4" class="col-sm-4 control-label" style="top: 18px; font-size: 15px !important">Commission</label>
									 <div class="col-sm-5">
                                       <?php  $users_accured_com= (!isset($user->users_accured_com) || is_null($user->users_accured_com)) ? '' : $user->users_accured_com; ?>
                                         <input class="form-control" placeholder="Enter commission" id="users_accured_com" name="users_accured_com" type="text" value="<?php echo $users_accured_com; ?>" >
									 </div>
								 </div>
								 
								 <br><br>
								 
								  <div class="form-group">
									<label for="exampleInputEmail_4" class="col-sm-4 control-label" style="top: 18px; font-size: 15px !important">Payment</label>
									 <div class="col-sm-5">
                                         <?php  $users_redeemed= (!isset($user->users_redeemed) || is_null($user->users_redeemed)) ? '' : $user->users_redeemed; ?>
									  <input class="form-control" id="users_redeemed" name="users_redeemed" placeholder="Enter payment" value="<?php echo $users_redeemed;?>"   type="text" >
									 </div>
								 </div>
								 <br><br>
								  <div class="form-group">
									<label for="exampleInputEmail_4" class="col-sm-4 control-label" style="top: 18px; font-size: 15px !important">Redeemed status</label>
									 <div class="col-sm-5">
									  <select name="users_redeemed_status" id="users_redeemed_status" class="form-control chzn" >
										<option value="0">--Choose redeemed status --</option>
                                          <?php  $users_redeemed_status= (!isset($user->users_redeemed_status) || is_null($user->users_redeemed_status)) ? '0' : $user->users_redeemed_status; ?>
<?php $yy=''; $nn=''; if($users_redeemed_status == 1){ $yy="selected='selected'"; $nn= '';} else if($users_redeemed_status == 2) {$yy=""; $nn= "selected='selected'";} ?>
                                          <option <?php echo $yy;  ?> value="1">Yes</option>
										<option <?php echo $nn;  ?> value="2">No</option>

									</select>
									 </div>
								 </div>
								 <br><br>
								 <div class="col-sm-3">
									   <button id="btn_send" class="btn btn-primary">Save</button>
										 </div>
								 
								
								
								
								<br><br>
								
								<br><br>
								<h2 style="padding-top: 50px;">Attachments </h2>
									<br><br>
								 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-5 control-label">Copy of passport</label>
									 <div class="col-sm-5">
									<?php if($user->users_img_passport != ''){ ?>
						          
							        <div class="col-sm-2">
									 
									   <a class="btn btn-default" style="margin-left:20px;" href="<?php echo site_url('admin/application/download_passport/'.$user->users_id); ?>" data-toggle="tooltip" title="Delete file" onclick="return areyousure()"><i class="fa fa-download"></i> <?php echo lang('download');?></a>
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
									 
									   <a class="btn btn-default" style="margin-left:20px;" href="<?php echo site_url('admin/application/download_qualifications/'.$user->users_id); ?>" data-toggle="tooltip" title="Delete file" onclick="return areyousure()"><i class="fa fa-download"></i> <?php echo lang('download');?></a>
									   </div>
									   <?php } ?>
									 </div>
								 </div>
								 
								 <br><br>
								  <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-5 control-label">Experiense certificate</label>
									 <div class="col-sm-5">
									<?php if($user->users_img_certificate != ''){ ?>
						          
							        <div class="col-sm-2">
									 
									   <a class="btn btn-default" style="margin-left:20px;" href="<?php echo site_url('admin/application/download_certificate/'.$user->users_id); ?>" data-toggle="tooltip" title="Delete file" onclick="return areyousure()"><i class="fa fa-download"></i> <?php echo lang('download');?></a>
										 </div>
									   <?php } ?>
									 </div>
								 </div>
								 <br><br>
								 
								  <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-5 control-label">University response</label>
									 <div class="col-sm-5">
									<?php if($user->user_file != ''){ ?>
						          
							        <div class="col-sm-2">
									 
									   <a class="btn btn-default" style="margin-left:20px;" href="<?php echo site_url('admin/application/download_user_file/'.$user->users_id); ?>" data-toggle="tooltip" title="Delete file" onclick="return areyousure()"><i class="fa fa-download"></i> <?php echo lang('download');?></a>
										 </div>
									   <?php } ?>
									 </div>
								 </div>
								 
						
						
						
						
						
						</div>
						
						
						
 </div>		
					
 </div>
  </div>
			
</div>


<script type="text/javascript">

	 $('#btn_send').on('click', function(){
	
	var users_id = $('#users_id').val();
	var users_accured_com = $('#users_accured_com').val();
	var users_redeemed = $('#users_redeemed').val();
	var users_redeemed_status = $('#users_redeemed_status').val();
		 
		alert(users_id); 
		 
	 $.ajax({
    url: '<?php echo site_url('admin/commission/add_commission') ?>',
    type:'POST',
    data:{users_id:users_id,
		  users_accured_com:users_accured_com,
		  users_redeemed:users_redeemed,
		  users_redeemed_status:users_redeemed_status},
    success:function(result){
      alert("Your appilcation has been successfully sent");
		//location.reload();
	 
	 }
  });
});

</script>	



