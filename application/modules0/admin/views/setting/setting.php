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
										<h6 class="panel-title txt-dark">Add / view application</h6>
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
					   			 
					   			  <div class="alert alert-info alert-dismissable col-md-12" id="success" style="display:none">
											<i class="fa fa-info"></i>
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										   Successfully updated                    
								</div>
					   			 
							 <div class="form-horizontal">
				   			  
					   			 
					   			 <?php $users_whatapp= (!isset($get_data->users_whatapp) || is_null($get_data->users_whatapp)) ? '' : $get_data->users_whatapp; ?>
								 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">WhatsApp </label>
									 <div class="col-sm-8">
									 <input class="form-control" placeholder="Enter WhatsApp" name="users_whatapp" id="users_whatapp" type="text" value="<?php echo $users_whatapp ?>" />
									 </div>
								 </div>
								

                                
                                <?php $users_country= (!isset($get_data->users_country) || is_null($get_data->users_country)) ? '0' : $get_data->users_country; ?>
                                 <div class="form-group ">
	 								<label for="exampleInputEmail_4" class="col-sm-3 control-label">Countery</label>
									 <div class="col-sm-8">
									<select name="users_country" id="users_country" class="form-control select2" <?php echo $styl; ?>>
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

