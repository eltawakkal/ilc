<link href="<?php echo base_url('assets/cp/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css')?>" rel="stylesheet" type="text/css"/>
<style type="text/css">
	.col-sm-8{    height: 30px;
    padding-top: 8px;}
	.control-label{font-weight: bold}
</style>
<?php 
$admin = $this->session->userdata('admin');
$admin_role= $admin['admin_role'];
?>
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
									 <label for="exampleInputuname_4" class="col-sm-4 control-label">Application No. </label>
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
									<label for="exampleInputEmail_4" class="col-sm-4 control-label">Study mode</label>
									 <div class="col-sm-8">
										 <?php echo $user->mode_study_name ?>
									 </div>
								 </div>
								 
								 <div class="form-group" id="university_name">
									<label for="exampleInputEmail_4" class="col-sm-4 control-label">Apply for</label>
									 <div class="col-sm-8">
										 <?php if($user->apply_name == null || $user->apply_name == '' )
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
									 <?php if($user->institution_name == null || $user->institution_name == '' )
										{
											echo '--';
											}
	  									else {
											echo $user->institution_name;
										} ?>

									 </div>
								 </div>
								 
								 
								 
								 <div class="form-group" id="university_name">
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
										<?php if($user->users_course == null || $user->users_course == '' )
										{
											echo '--';
											}
	  									else {
											echo $user->users_course;
										} ?>
									 </div>
								 </div>
								 
								 
								  <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-4 control-label">Language center</label>
									 <div class="col-sm-8">
										<?php if($user->users_language_name == null || $user->users_language_name == '' )
										{
											echo '--';
											}
	  									else {
											echo $user->language_center_name;
										} ?>
									 </div>
								 </div>
								
								 
								 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-4 control-label">International school</label>
									 <div class="col-sm-8">
									<?php if($user->users_international_name == null || $user->users_international_name == '' )
										{
											echo '--';
											}
	  									else {
											echo $user->users_international_name;
										} ?>
									 </div>
								 </div>
								 
								 
								 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-4 control-label">Status app.</label>
									 <div class="col-sm-8">
									<?php  if($user->users_status == 1){
										echo 'New ';
										}else if($user->users_status == 2){
										echo 'submitted ';
										} else  if($user->users_status == 3){ 
										   echo 'Processing';
									   } else  if($user->users_status == 4){ 
										   echo 'Not submit';
									   }else  if($user->users_status == 5){ 
										   echo 'Other';
									   }else  if($user->users_status == 6){ 
										   echo 'Offered';
									   }else  if($user->users_status == 7){ 
										   echo 'Val';
									   }else  if($user->users_status == 8){ 
										   echo 'Enrolled';
									   }else  if($user->users_status == 9){ 
										   echo 'payment processing';
									   }else  if($user->users_status == 10){ 
										   echo 'Canceled';
									   }else  if($user->users_status == 11){ 
										   echo 'Rejected';
									   }else  if($user->users_status == 12){ 
										   echo 'conditional offer';
									   }
										 
								 ?>
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
								<?php 
						if($admin_role == 1){
						
						if($user->users_status == 3 || $user->users_status == 4 ||$user->users_status == 5 ||$user->users_status == 6 ||$user->users_status == 7 ||$user->users_status == 8 ||$user->users_status == 9 ||$user->users_status == 10 ||$user->users_status == 11){ ?>
								 <h2 style="padding-top: 50px;">Edit status application </h2>
								 <br>
								 
								 <input type="hidden" value="<?php echo $user->users_id ?>" id="users_id"/>
									 <div class="form-group">
									<label for="exampleInputEmail_4" class="col-sm-3 control-label" style="top: 18px">Status app</label>
									 <div class="col-sm-5">
									<select name="users_status" id="users_status" class="form-control chzn" >
										<option value="0">--Choose status app. --</option>
										<option value="6">Offered</option>
										<option value="7">Val</option>
										<option value="8">Enrolled</option>
										<option value="9">payment processing</option>
										<option value="10">Canceled</option>
										<option value="11">Rejected</option>
									</select>
									 </div>
									  <div class="col-sm-3">
									   <button id="btn_send" class="btn btn-primary">Save</button>
										 </div>
								 </div>
								
								
								<?php }
						}?>
								
								<br><br>
								<h2 style="padding-top: 50px;">Attachments </h2>
									<br><br>
								 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-5 control-label">Copy of passport</label>
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
									 <label for="exampleInputuname_4" class="col-sm-5 control-label">Experiense certificate</label>
									 <div class="col-sm-5">
									<?php if($user->users_img_certificate != ''){ ?>
						          
							        <div class="col-sm-2">
									 
									   <a class="btn btn-default" style="margin-left:20px;" href="<?php echo site_url('admin/application/download_certificate/'.$user->users_id); ?>" data-toggle="tooltip" title="Delete File" onclick="return areyousure()"><i class="fa fa-download"></i> <?php echo lang('download');?></a>
										 </div>
									   <?php } ?>
									 </div>
								 </div>
								 
								 
								 <br><br>
								  <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-5 control-label"> English certificate</label>
									 <div class="col-sm-5">
									<?php if($user->users_img_english_certificate != ''){ ?>
						          
							        <div class="col-sm-2">
									 
									   <a class="btn btn-default" style="margin-left:20px;" href="<?php echo site_url('admin/application/download_eng_certificate/'.$user->users_id); ?>" data-toggle="tooltip" title="Delete File" onclick="return areyousure()"><i class="fa fa-download"></i> <?php echo lang('download');?></a>
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
									 
									   <a class="btn btn-default" style="margin-left:20px;" href="<?php echo site_url('admin/application/download_user_file/'.$user->users_id); ?>" data-toggle="tooltip" title="Delete File" onclick="return areyousure()"><i class="fa fa-download"></i> <?php echo lang('download');?></a>
										 </div>
									   <?php } ?>
									 </div>
								 </div>
								 
						
						
						
						</div>
						
						
						
 </div>	
				
					<div class="row"  style=" background: #fff">
						
						<div class="col-md-12">
							<h2> All attachments</h2>
							
							<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_2"  class="table table-hover table-bordered display mb-30 dataTable" >
												<thead>
													<tr>
														<th>#</th>
														<th>Tile file</th>
                                                        <th>File</th>
													</tr>
												</thead>
                                                 <?php if(isset($attachments)):?>
                        						<tbody>
                            						<?php $i=1;foreach ($attachments as $new){?>
													<tr>
														 <td><?php echo $i?></td>
                                                         <td><?php echo $new->attachs_title?></td>
                                                         <td> <a class="btn btn-default" style="margin-left:2px;" href="<?php echo site_url('admin/attachments/download/'.$new->attachs_id); ?>" ><i class="fa fa-download"></i> <?php echo lang('download');?></a></td>
                              
										
                                </tr>
                                <?php $i++;}?>
                        </tbody>
                        <?php endif;?>
                    </table>
										</div>
									</div>
								</div>
						</div>
					</div>	
					
 </div>
  </div>
			
</div>
<input type="hidden" value="<?php echo $user->users_app_guid; ?>" id="users_app_guid"/>
<input type="hidden" value="<?php echo $user->users_admin_id; ?>" id="users_admin_id"/>


<script type="text/javascript">

	 $('#btn_send').on('click', function(){
	
	var users_id = $('#users_id').val();
	var users_status = $('#users_status').val();
    var users_app_guid = $('#users_app_guid').val();
	var users_admin_id = $('#users_admin_id').val();
		 
	 $.ajax({
    url: '<?php echo site_url('admin/application/change_status_without_note') ?>',
    type:'POST',
    data:{users_id:users_id,
		  users_status:users_status,
		  users_app_guid:users_app_guid,
		  users_admin_id:users_admin_id},
    success:function(result){
      alert("Your appilcation has been successfully sent");
		location.reload();
	 
	 }
  });
});

</script>	



