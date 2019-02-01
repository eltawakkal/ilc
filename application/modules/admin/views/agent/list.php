<link href="<?php echo base_url('assets/cp/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css')?>" rel="stylesheet" type="text/css"/>

		
		<div class="wrapper theme-1-active pimary-color-red">
	<div class="page-wrapper">
				<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						  <h5 class="txt-dark">Agent</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><a href="">Dashboard</a></li>
							<li class="active"><span>Agent</span></li>
						  </ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
					
					
					
					
					
					
					<div class="row" style=" background: #fff">
						<div class="col-sm-7">
							<div class="panel" style="padding: 15px 15px 0;margin-left: -9px;margin-right: -9px;">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Financial details</h6>
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
					   			 
					   			 
					   			  <div class="alert alert-danger alert-dismissable col-md-12" id="val_agents_address" style="display:none">
									<i class="fa fa-ban"></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									 Address required
					   			 </div>
					   			 
					   			  <div class="alert alert-danger alert-dismissable col-md-12" id="val_agents_phone" style="display:none">
									<i class="fa fa-ban"></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									 Phone required
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
					   			 
					   			 
					   			 <?php $agents_apply_for= (!isset($get_data->agents_apply_for) || is_null($get_data->agents_apply_for)) ? '0' : $get_data->agents_apply_for; ?>
                                 <div class="form-group ">
	 								<label for="exampleInputEmail_4" class="col-sm-3 control-label">Apply for</label>
									 <div class="col-sm-8">
									<select name="agents_apply_for" id="agents_apply_for" class="form-control " onChange="get_date();" >
									<?php $com=''; $in=''; if($agents_apply_for == 1){ $com='selected="selected"'; $in='';} else {$com=''; $in='selected="selected"';} ?>
										<option value="0">--Please select from this list---</option>
										<option <?php echo $com;?> value="1">Company</option>
										<option <?php echo $in;?> value="2">Individual</option>
										
									</select>
									 </div>
								 </div>

					   			 
					   			 <?php $fullname= (!isset($get_data->agents_fullname) || is_null($get_data->agents_fullname)) ? '' : $get_data->agents_fullname; ?>
								 <div class="form-group" id="fullname">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Full name </label>
									 <div class="col-sm-8">
									 <input class="form-control" placeholder="Enter full name" name="agents_fullname" id="agents_fullname" type="text" value="<?php echo $fullname ?>" />
									 </div>
								 </div>
                                 
                                 
                                  <?php $agents_company_name= (!isset($get_data->agents_company_name) || is_null($get_data->agents_company_name)) ? '' : $get_data->agents_company_name; ?>
								 <div class="form-group" id="company_name">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Company name </label>
									 <div class="col-sm-8">
									 <input class="form-control" placeholder="Enter company name" name="agents_company_name" id="agents_company_name" type="text" value="<?php echo $agents_company_name ?>" />
									 </div>
								 </div>
                                 
                                 
                                  <?php $agents_type_business= (!isset($get_data->agents_type_business) || is_null($get_data->agents_type_business)) ? '' : $get_data->agents_type_business; ?>
								 <div class="form-group" id="type_business">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Type of business </label>
									 <div class="col-sm-8">
									 <input class="form-control" placeholder="Enter type busniess" name="agents_type_business" id="agents_type_business" type="text" value="<?php echo $agents_type_business ?>" />
									 </div>
								 </div>
                                 
                                 
                                 
                                  <?php $agents_position= (!isset($get_data->agents_position) || is_null($get_data->agents_position)) ? '' : $get_data->agents_position; ?>
								 <div class="form-group" id="position">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Position </label>
									 <div class="col-sm-8">
									 <input class="form-control" placeholder="Enter position" name="agents_position" id="agents_position" type="text" value="<?php echo $agents_position ?>" />
									 </div>
								 </div>
                                 
                                 
                                  <?php $agents_person_charge= (!isset($get_data->agents_person_charge) || is_null($get_data->agents_person_charge)) ? '' : $get_data->agents_person_charge; ?>
								 <div class="form-group" id="person_charge">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Person in charge</label>
									 <div class="col-sm-8">
									 <input class="form-control" placeholder="Enter person charge" name="agents_person_charge" id="agents_person_charge" type="text" value="<?php echo $agents_person_charge ?>" />
									 </div>
								 </div>
                                 
                                 
                                 
                                  <?php $agents_person_charge_contact_number= (!isset($get_data->agents_person_charge_contact_number) || is_null($get_data->agents_person_charge_contact_number)) ? '' : $get_data->agents_person_charge_contact_number; ?>
								 <div class="form-group" id="person_charge_contact_number">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Person in charge contact number </label>
									 <div class="col-sm-8">
									 <input class="form-control" placeholder="Enter person in charge contact number" name="agents_person_charge_contact_number" id="agents_person_charge_contact_number" type="text" value="<?php echo $agents_person_charge_contact_number ?>" />
									 </div>
								 </div>

                                 <?php $agents_address= (!isset($get_data->agents_address) || is_null($get_data->agents_address)) ? '' : $get_data->agents_address; ?>
                                 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Full address</label>
									 <div class="col-sm-8">
									 <input class="form-control" name="agents_address" placeholder="Enter full address" id="agents_address"  type="text" value="<?php echo $agents_address?>" >
									 </div>
								 </div>
                                
                                <?php $agents_country= (!isset($get_data->agents_country) || is_null($get_data->agents_country)) ? '' : $get_data->agents_country; ?>
                                 <div class="form-group ">
	 								<label for="exampleInputEmail_4" class="col-sm-3 control-label">Countery</label>
									 <div class="col-sm-8">
									<select name="agents_country" id="agents_country" class="form-control select2" >
										<option value="">--Choose countery---</option>
										<?php foreach($country as $new) {
											$sel = "";
											if($new->country_id==$agents_country) $sel='selected="selected"';
											echo '<option value="'.$new->country_id.'" '.$sel.'>'.$new->country_name_en.'</option>';
										}
										
										?>
									</select>
									 </div>
								 </div>

                                
                                 <?php $agents_phone= (!isset($get_data->agents_phone) || is_null($get_data->agents_phone)) ? '' : $get_data->agents_phone; ?>
                                <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Phone</label>
									 <div class="col-sm-8">
									 <input class="form-control" id="agents_phone" name="agents_phone" placeholder="Enter phone"  type="text" value="<?php echo $agents_phone?>" >
									 </div>
								 </div>
                                 
								
								 <?php $agents_account_no= (!isset($get_data->agents_account_no) || is_null($get_data->agents_account_no)) ? '' : $get_data->agents_account_no; ?>
								 <div class="form-group">
									<label for="exampleInputEmail_4" class="col-sm-3 control-label">Account no.</label>
									 <div class="col-sm-8">
										 <input class="form-control" id="agents_account_no" name="agents_account_no" placeholder="Enter account no."  type="text" value="<?php echo $agents_account_no; ?>" >
									 </div>
								 </div>
								 
								 
								 
								 <?php $agents_paypal= (!isset($get_data->agents_paypal) || is_null($get_data->agents_paypal)) ? '' : $get_data->agents_paypal; ?>
								  <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Paypal email</label>
									 <div class="col-sm-8">
									 <input class="form-control" id="agents_paypal" name="agents_paypal" placeholder="Enter paypal email (if available)" value="<?php echo $agents_paypal;?>"  type="text" >
									 </div>
								 </div>
								 
								  <?php $agents_account_name= (!isset($get_data->agents_account_name) || is_null($get_data->agents_account_name)) ? '' : $get_data->agents_account_name; ?>
								  <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Account Name</label>
									 <div class="col-sm-8">
									 <input class="form-control" name="agents_account_name" id="agents_account_name" placeholder="Enter account name" value="<?php echo $agents_account_name;?>"  type="text" >
									 </div>
								 </div>
								  <?php $agents_bank_name= (!isset($get_data->agents_bank_name) || is_null($get_data->agents_bank_name)) ? '' : $get_data->agents_bank_name; ?>
								  <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Bank Name</label>
									 <div class="col-sm-8">
									 <input class="form-control" id="agents_bank_name" name="agents_bank_name" value="<?php echo $agents_bank_name;?>" placeholder="Enter bank name"  type="text" >
									 </div>
								 </div>
								 
								  <?php $agents_swift= (!isset($get_data->agents_swift) || is_null($get_data->agents_swift)) ? '' : $get_data->agents_swift; ?>
								  <div class="form-group" >
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Swift Code</label>
									 <div class="col-sm-8">
									 <input class="form-control" id="agents_swift" name="agents_swift" placeholder="Enter swift code"  type="text" value="<?php echo $agents_swift?>" >
									 </div>
								 </div>
								 
								  <?php $agents_bank_address= (!isset($get_data->agents_bank_address) || is_null($get_data->agents_bank_address)) ? '' : $get_data->agents_bank_address; ?>
								  <div class="form-group" >
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Bank Address</label>
									 <div class="col-sm-8">
									 <input class="form-control" id="agents_bank_address" name="agents_bank_address" placeholder="Enter bank address"  type="text" value="<?php echo $agents_bank_address?>" >
									 </div>
								 </div>
								 
 <?php $agents_id= (!isset($get_data->agents_id) || is_null($get_data->agents_id)) ? '0' : $get_data->agents_id; ?>
<input type="hidden" id="agent_id" value="<?php echo $agents_id;?>"/>
								 
								 <div class="form-group mb-0">
									 <div class="col-sm-offset-3 col-sm-9">
									  
										
										 <button id="btn_submit" type="submit" class="btn btn-info ">Save</button>
										 
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
 $( document ).ready(function() {
	 
	 var agents_apply_for =$('#agents_apply_for').val();
		
		if(agents_apply_for == 1){
			$('#fullname').hide();
			$('#company_name').show();
			$('#person_charge_contact_number').show();
			$('#person_charge').show();
			$('#position').show();
			$('#type_business').show();
			
		} else {
			$('#fullname').show();
			$('#company_name').hide();
			$('#person_charge_contact_number').hide();
			$('#person_charge').hide();
			$('#position').hide();
			$('#type_business').hide();
				
			}
	 
});
	function get_date(){
		var agents_apply_for =$('#agents_apply_for').val();
		
		if(agents_apply_for == 1){
			$('#fullname').hide();
			$('#company_name').show();
			$('#person_charge_contact_number').show();
			$('#person_charge').show();
			$('#position').show();
			$('#type_business').show();
			
		} else {
			$('#fullname').show();
			$('#company_name').hide();
			$('#person_charge_contact_number').hide();
			$('#person_charge').hide();
			$('#position').hide();
			$('#type_business').hide();
				
			}
	}
	
	
	$('#fas_form').on('submit',function(e){
	 e.preventDefault();
 	var agents_fullname = $('#agents_fullname').val();
	var agents_country = $('#agents_country').val();
	var agents_address = $('#agents_address').val();
	var agents_phone = $('#agents_phone').val();
	
	var agent_id = $('#agent_id').val();

	
   /* var filter = /^\d*(?:\.\d{1,2})?$/;
	var atpos = admin_email.indexOf("@");
    var dotpos = admin_email.lastIndexOf(".");

  */
    
    
    
	
	/*if(agents_fullname == null || agents_fullname == ''){
		$('#val_users_fullname').show();
		return false;
	} else 
	{
		$('#val_users_fullname').hide();
	}
	*/
	
	
	
	if(agents_country == null || agents_country == ''){
		$('#val_users_country').show();
		return false;
	} else 
	{
		$('#val_users_country').hide();
	}
		
	if(agents_address == null || agents_address == ''){
		$('#val_agents_address').show();
		return false;
	} else 
	{
		$('#val_agents_address').hide();
	}
		
	
	if(agents_phone == null || agents_phone == ''){
		$('#val_agents_phone').show();
		return false;
	} else 
	{
		$('#val_agents_phone').hide();
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
		if(agent_id == 0){	
  $.ajax({
	   url: '<?php echo site_url('admin/agent/add_agent') ?>',
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
		alert("Successfully added");
	  
	 
	 }
  });
		} else {
			
		$.ajax({
	   url: '<?php echo site_url('admin/agent/edit_agent') ?>',
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
		alert("Successfully updated");

	  
	 
	 }
  });	
			
		}
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

