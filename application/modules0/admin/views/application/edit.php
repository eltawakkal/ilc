<link href="<?php echo base_url('assets/cp/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css')?>" rel="stylesheet" type="text/css"/>

		
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
							<div class="panel" style="    padding: 15px 15px 0;
    margin-left: -9px;
    margin-right: -9px;">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Edit application</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
                       
				  <div class="col-sm-12 col-xs-12">
					 <div class="form-wrap">
                        <form id="fas_form" method="post" enctype="multipart/form-data"  action="">
							 <div class="form-horizontal">
							 
							   <div class="alert alert-danger alert-dismissable col-md-12" id="val_users_fullname" style="display:none">
									<i class="fa fa-ban"></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									 Full name required
					   			 </div>
					   			 
					   			  <div class="alert alert-danger alert-dismissable col-md-12" id="val_users_country" style="display:none">
									<i class="fa fa-ban"></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									 Country required
					   			 </div>
					   			 
					   			 
					   			  <div class="alert alert-danger alert-dismissable col-md-12" id="val_users_whatapp" style="display:none">
									<i class="fa fa-ban"></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									 Whatapp required
					   			 </div>
					   			 
					   			 
					   			  <div class="alert alert-danger alert-dismissable col-md-12" id="val_users_apply" style="display:none">
									<i class="fa fa-ban"></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									 User apply required
					   			 </div>
					   			 
					   			 <div class="alert alert-info alert-dismissable col-md-12" id="success" style="display:none">
											<i class="fa fa-info"></i>
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										   Successfully added                    
								</div>
				   			 
				   			 
				   			  
					   			 
					   			 <?php $fullname= (!isset($get_data->users_fullname) || is_null($get_data->users_fullname)) ? '' : $get_data->users_fullname; ?>
								 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Full name </label>
									 <div class="col-sm-8">
									 <input class="form-control" placeholder="Enter Full Name" name="users_fullname" id="users_fullname" type="text" value="<?php echo $fullname ?>" />
									 </div>
								 </div>

                                 <?php $users_whatapp= (!isset($get_data->users_whatapp) || is_null($get_data->users_whatapp)) ? '' : $get_data->users_whatapp; ?>
                                 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">WhatApp</label>
									 <div class="col-sm-8">
									 <input class="form-control" name="users_whatapp" placeholder="Enter WhatApp" id="users_whatapp"  type="text" value="<?php echo $users_whatapp?>" >
									 </div>
								 </div>
                                
                                <?php $users_country= (!isset($get_data->users_country) || is_null($get_data->users_country)) ? '0' : $get_data->users_country; ?>
                                 <div class="form-group ">
	 								<label for="exampleInputEmail_4" class="col-sm-3 control-label">Countery</label>
									 <div class="col-sm-8">
									<select name="users_country" id="users_country" class="form-control select2" >
										<option value="">--Choose countery---</option>
										<?php foreach($country as $new) {
											$sel = "";
											if($new->country_id==$users_country) $sel='selected="selected"';
											echo '<option value="'.$new->country_id.'" '.$sel.'>'.$new->country_name_en.'</option>';
										}
										
										?>
									</select>
									 </div>
								 </div>
                                
                                
								   <?php $applyv= (!isset($get_data->users_apply) || is_null($get_data->users_apply)) ? '0' : $get_data->users_apply; ?>
								  <div class="form-group">
									<label for="exampleInputEmail_4" class="col-sm-3 control-label">Apply for</label>
									 <div class="col-sm-8">
									<select name="users_apply" id="users_apply" class="form-control chzn" onchange="change_apply();" >
										<option value="">--Choose apply for --</option>
										<?php foreach($apply as $new) {
											$sel = "";
										if($new->apply_id==$applyv) $sel='selected="selected"';?>
											<option value="<?php echo $new->apply_id;?>" <?php echo $sel ;?> ><?php echo $new->apply_name;?></option>
											
										<?php }									
										?>
									</select>
									 </div>
								 </div>
                                 
                                
                                  <?php $institutionv= (!isset($get_data->users_institution) || is_null($get_data->users_institution)) ? '0' : $get_data->users_institution; ?>
                                 <div class="form-group" id="institution" style="display:none">
	 								<label for="exampleInputEmail_4" class="col-sm-3 control-label">Institution type</label>
									 <div class="col-sm-8">
									<select name="users_institution" id="users_institution" class="form-control chzn"  onChange="change_inst()" >
										<option value="0">--Choose institution type --</option>
										<?php foreach($institution as $new) {
											$sel = "";
											if($new->institution_id==$institutionv) $sel='selected="selected"';
											echo '<option value="'.$new->institution_id.'" '.$sel.'>'.$new->institution_name.'</option>';
										}
										
										?>
									</select>
									 </div>
								 </div>
                                
                                 <?php $users_institution_name= (!isset($get_data->users_institution_name) || is_null($get_data->users_institution_name)) ? '0' : $get_data->users_institution_name; ?>
                                <div class="form-group" id="other_institution"  style="display:none" >
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Name</label>
									 <div class="col-sm-8">
									 <input class="form-control" id="users_institution_name" name="users_institution_name" placeholder="Enter Name"  type="text" value="<?php echo $users_institution_name?>" >
									 </div>
								 </div>
                                  <?php $users_degree= (!isset($get_data->users_degree) || is_null($get_data->users_degree)) ? '0' : $get_data->users_degree; ?>
                                 <div class="form-group" id="degree"  style="display:none">
									<label for="exampleInputEmail_4" class="col-sm-3 control-label">Degree</label>
									 <div class="col-sm-8">
									<select name="users_degree" id="users_degree" class="form-control chzn" >
										<option value="">--Choose degree --</option>
										<?php foreach($degree as $new) {
											$sel = "";
											if($new->degree_id==$users_degree) $sel='selected="selected"';
											echo '<option value="'.$new->degree_id.'" '.$sel.'>'.$new->degree_name.'</option>';
										}
										
										?>
									</select>
									 </div>
								 </div>
								 
								   <?php $users_university= (!isset($get_data->users_university) || is_null($get_data->users_university)) ? '0' : $get_data->users_university; ?>
								 <div class="form-group" id="university" style="display:none">
									<label for="exampleInputEmail_4" class="col-sm-3 control-label">University / Collage</label>
									 <div class="col-sm-8">
									<select name="users_university" id="users_university" class="form-control chzn" onChange="change_university()" >
										<option value="">--Choose university / collage --</option>
										<?php foreach($university as $new) {
											$sel = "";
											if($new->university_id==$users_university) $sel='selected="selected"';
											echo '<option value="'.$new->university_id.'" '.$sel.'>'.$new->university_name.'</option>';
										}
										
										?>
										<option value="9">Others</option>
									</select>
									 </div>
								 </div>
								 <?php $users_collage_name= (!isset($get_data->users_collage_name) || is_null($get_data->users_collage_name)) ? '0' : $get_data->users_collage_name; ?>
								 <div class="form-group" id="university_name" style="display:none">
									<label for="exampleInputEmail_4" class="col-sm-3 control-label">University/ collage name</label>
									 <div class="col-sm-8">
										 <input class="form-control" id="users_collage_name" name="users_collage_name" placeholder="Enter university/ collage name"  type="text" value="<?php echo $users_collage_name; ?>" >
									 </div>
								 </div>
								 
								 <?php $users_program= (!isset($get_data->users_program) || is_null($get_data->users_program)) ? '0' : $get_data->users_program; ?>
								  <div class="form-group" id="program"  style="display:none">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Program</label>
									 <div class="col-sm-8">
									 <input class="form-control" id="users_program" name="users_program" placeholder="Enter Program" value="<?php echo $users_program;?>"  type="text" >
									 </div>
								 </div>
								 
								  <?php $users_course= (!isset($get_data->users_course) || is_null($get_data->users_course)) ? '0' : $get_data->users_course; ?>
								  <div class="form-group" id="course"  style="display:none">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Course</label>
									 <div class="col-sm-8">
									 <input class="form-control" name="users_course" id="users_course" placeholder="Enter Course" value="<?php echo $users_course;?>"  type="text" >
									 </div>
								 </div>
								  <?php $users_international_name= (!isset($get_data->users_international_name) || is_null($get_data->users_international_name)) ? '0' : $get_data->users_international_name; ?>
								  <div class="form-group" id="name"  style="display:none">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Name</label>
									 <div class="col-sm-8">
									 <input class="form-control" id="users_international_name" name="users_international_name" value="<?php echo $users_international_name;?>" placeholder="Enter Name"  type="text" >
									 </div>
								 </div>
								  <?php $users_other_name= (!isset($get_data->users_other_name) || is_null($get_data->users_other_name)) ? '0' : $get_data->users_other_name; ?>
								  <div class="form-group" id="other_name"  style="display:none">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Apply for (please select)</label>
									 <div class="col-sm-8">
									 <input class="form-control" id="users_other_name" name="users_other_name" placeholder="Enter Other"  type="text" value="<?php echo $users_other_name?>" >
									 </div>
								 </div>
								 
								 
								   <div class="form-group">
									<label for="exampleInputuname_4" class="col-sm-3 control-label">Copy of passport</label>
									
									 <div class="col-sm-8">
									<div class="fileinput fileinput-new input-group" data-provides="fileinput">
										<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
										<span class="input-group-addon fileupload btn btn-info btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Select file</span> <span class="fileinput-exists btn-text">Change</span>
										<input type="file" name="users_img_passport" id="users_img_passport" >
										</span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text"> Remove</span></a>
										 
									</div>
													
										</div>
								    <?php $users_id= (!isset($get_data->users_id) || is_null($get_data->users_id)) ? '0' : $get_data->users_id;
											
									$users_img_passport= (!isset($get_data->users_img_passport) || is_null($get_data->users_img_passport)) ? '' : $get_data->users_img_passport;
											
											
									   if($users_img_passport != ''){ ?>	
									   <div class="col-sm-1">
									  
									   <a class="btn btn-default" style="margin-left:20px;" href="<?php echo site_url('admin/application/download_passport/'.$users_id); ?>" data-toggle="tooltip" title="Delete File" onclick="return areyousure()"><i class="fa fa-download"></i> <?php echo lang('download');?></a>
									   </div>	
									   <?php }?>	
								 </div>
								 
								 
								  <div class="form-group">
									<label for="exampleInputuname_4" class="col-sm-3 control-label">Qualifications</label>
									
									 <div class="col-sm-8">
									<div class="fileinput fileinput-new input-group" data-provides="fileinput">
										<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
										<span class="input-group-addon fileupload btn btn-info btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Select file</span> <span class="fileinput-exists btn-text">Change</span>
										<input type="file" name="users_img_qualifications" id="users_img_qualifications" >
										</span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text"> Remove</span></a> 
									</div>
													
										</div>	
										 <?php $users_id= (!isset($get_data->users_id) || is_null($get_data->users_id)) ? '0' : $get_data->users_id; 
									  $users_img_qualifications= (!isset($get_data->users_img_qualifications) || is_null($get_data->users_img_qualifications)) ? '' : $get_data->users_img_qualifications;
											
											
									   if($users_img_qualifications != ''){ ?>
										<div class="col-sm-1">
									  
									   <a class="btn btn-default" style="margin-left:20px;" href="<?php echo site_url('admin/application/download_qualifications/'.$users_id); ?>" data-toggle="tooltip" title="Delete File" onclick="return areyousure()"><i class="fa fa-download"></i> <?php echo lang('download');?></a>
									   </div>
									   <?php }?>			
								 </div>
								 
								 
								 <div class="form-group">
									<label for="exampleInputuname_4" class="col-sm-3 control-label">Experience certificate</label>
									
									 <div class="col-sm-8">
									<div class="fileinput fileinput-new input-group" data-provides="fileinput">
										<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
										<span class="input-group-addon fileupload btn btn-info btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Select file</span> <span class="fileinput-exists btn-text">Change</span>
										<input type="file" name="users_img_certificate" id="users_img_certificate" >
										</span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text"> Remove</span></a> 
									</div>
													
										</div>	
										
						          <?php $users_id= (!isset($get_data->users_id) || is_null($get_data->users_id)) ? '0' : $get_data->users_id; 
								   $users_img_certificate= (!isset($get_data->users_img_certificate) || is_null($get_data->users_img_certificate)) ? '' : $get_data->users_img_certificate;
											
									 if($users_img_certificate != ''){ ?>
						          
							        <div class="col-sm-1">
									 
									   <a class="btn btn-default" style="margin-left:20px;" href="<?php echo site_url('admin/application/download_certificate/'.$users_id); ?>" data-toggle="tooltip" title="Delete File" onclick="return areyousure()"><i class="fa fa-download"></i> <?php echo lang('download');?></a>
									   </div>
									   <?php }?>				
								 </div>
								
								 <input type="hidden" name="users_id" id="users_id" value="<?php echo $users_id; ?>"/>
								 
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
						
						<div class="col-sm-5">
						
								<div class="panel-heading">
									
									<div class="clearfix"></div>
								</div>
								<h2 style="padding-top: 50px; text-align: center">Dear ... </h2>
							<p  style="padding-top: 50px">You can edit your application, unless you submit, please be informed that
you can’t edit your application after you submit</p>
						
						</div>
						
 </div>		
					
 </div>
  </div>
			
</div>




<script src="<?php echo base_url('assets/cp/vendors/bower_components/jquery/dist/jquery.min.js')?>"></script>

<script type="text/javascript">
	
	$( document ).ready(function() {
  var user_apply= $('#users_apply').val();
		if(user_apply == 1 )
		{
			$('#institution').show();
			$('#degree').show();
			$('#university').show();
			$('#program').show();
			$('#course').hide();
			$('#name').hide();
			$('#other_name').hide();
			
		}
		else if(user_apply == 2){ 
		
			$('#institution').hide();
			$('#degree').hide();
			$('#university').hide();
			$('#program').hide();
		    $('#course').show();
			$('#name').hide();
			$('#other_name').hide();
		}
			
		else if(user_apply == 3){ 
		
			$('#institution').hide();
			$('#degree').hide();
			$('#university').hide();
			$('#program').hide();
		    $('#name').show();
			$('#course').hide();
			$('#other_name').hide();
		}
				
		else if(user_apply == 4){ 
		
			$('#institution').hide();
			$('#degree').hide();
			$('#university').hide();
			$('#program').hide();
		    $('#other_name').show();
			$('#course').hide();
			$('#name').hide();
		}
		else {
			$('#institution').hide();
			$('#degree').hide();
			$('#university').hide();
			$('#program').hide();
			 $('#other_name').hide();
			$('#course').hide();
			$('#name').hide();
			
		}
		
		
		
		var user_university_name= $('#users_university').val();
		if(user_university_name == 9){
			
			$('#university_name').show();
		}
		else {
			$('#university_name').hide();
			
		}
		
		
		var user_institution= $('#users_institution').val();
		if(user_institution == 3){
			
			$('#other_institution').show();
		}
		else {
			$('#other_institution').hide();
			
		}
});
	
	function change_apply()
	{
		var user_apply= $('#users_apply').val();
		if(user_apply == 1 )
		{
			$('#institution').show();
			$('#degree').show();
			$('#university').show();
			$('#program').show();
			$('#course').hide();
			$('#name').hide();
			$('#other_name').hide();
			
		}
		else if(user_apply == 2){ 
		
			$('#institution').hide();
			$('#degree').hide();
			$('#university').hide();
			$('#program').hide();
		    $('#course').show();
			$('#name').hide();
			$('#other_name').hide();
		}
			
		else if(user_apply == 3){ 
		
			$('#institution').hide();
			$('#degree').hide();
			$('#university').hide();
			$('#program').hide();
		    $('#name').show();
			$('#course').hide();
			$('#other_name').hide();
		}
				
		else if(user_apply == 4){ 
		
			$('#institution').hide();
			$('#degree').hide();
			$('#university').hide();
			$('#program').hide();
		    $('#other_name').show();
			$('#course').hide();
			$('#name').hide();
		}
		else {
			$('#institution').hide();
			$('#degree').hide();
			$('#university').hide();
			$('#program').hide();
			 $('#other_name').hide();
			$('#course').hide();
			$('#name').hide();
			
		}
		
		
	} 
	
	function change_university()
	{
	var user_university_name= $('#users_university').val();
		if(user_university_name == 9){
			
			$('#university_name').show();
		}
		else {
			$('#university_name').hide();
			
		}
	}
	
	
	function change_inst()
	{
	var user_institution= $('#users_institution').val();
		if(user_institution == 3){
			
			$('#other_institution').show();
		}
		else {
			$('#other_institution').hide();
			
		}
	}
	
	
	
	
	$('#fas_form').on('submit',function(e){
	 e.preventDefault();
 	var users_fullname = $('#users_fullname').val();
	var users_whatapp = $('#users_whatapp').val();
	var users_country = $('#users_country').val();
	var users_apply = $('#users_apply').val();
	var users_institution = $('#users_institution').val();
	var users_institution_name = $('#users_institution_name').val();
	var users_id = $('#users_id').val();

	
   /* var filter = /^\d*(?:\.\d{1,2})?$/;
	var atpos = admin_email.indexOf("@");
    var dotpos = admin_email.lastIndexOf(".");

  */
    
    
    
	
	if(users_fullname == null || users_fullname == ''){
		$('#val_users_fullname').show();
		return false;
	} else 
	{
		$('#val_users_fullname').hide();
	}
	
	if(users_whatapp == null || users_whatapp == ''){
		$('#val_users_whatapp').show();
		return false;
	} else 
	{
		$('#val_users_whatapp').hide();
	}
	
	
	if(users_country == null || users_country == ''){
		$('#val_users_country').show();
		return false;
	} else 
	{
		$('#val_users_country').hide();
	}
	
	if(users_apply == null || users_apply == ''){
		$('#val_users_apply').show();
		return false;
	} else 
	{
		$('#val_users_apply').hide();
	}
	
	
	/*
	if (filter.test(admin_ssn)) {
            if(admin_ssn.length!=9){
               $('#val_9digit').show();
                return false;
             } else {
				  $('#val_9digit').hide();
                
              }
			  $('#val_number').hide();
            }
	else {
		$('#val_number').show();
	  return false;
   }*/
	
	 
	 $('#btn_submit').val('Sending ..')
      .attr('disabled','disabled');

	  
	  var formdata = new FormData($(this)[0]);
			
			fas_form.btn_submit.disabled = true; 

			
		$.ajax({
	   url: '<?php echo site_url('admin/application/update_users') ?>',
	 type: 'POST',
    		 data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,

    success:function(result){
	  $('#btn_submit').prop('disabled', true);
	  $('#btn_submit').val('Sent');
	  $('#success').show();

	  
	 
	 }
  });	
			
		
});
	
	
	
	
	 $('#btn_send').on('click', function(){
	
	var users_id = $('#users_id').val();
	 $.ajax({
    url: '<?php echo site_url('admin/application/send_app') ?>',
    type:'POST',
    data:{users_id:users_id},
    success:function(result){
      alert("Your appilcation has been successfully sent");
		location.reload();
	 
	 }
  });
});
		
</script>

