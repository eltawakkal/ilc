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
							<div class="panel" style="    padding: 15px 15px 0;
    margin-left: -9px;
    margin-right: -9px;">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Financial details</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
                       	<?php  if(validation_errors()){ ?>
										<div class="alert alert-danger alert-dismissable">
										  <i class="fa fa-ban"></i>
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-close"></i></button>
										  <b><?php echo lang('alert');?>!</b><?php echo validation_errors(); ?>
										</div>

										<?php  } ?>
				  <div class="col-sm-12 col-xs-12">
					 <div class="form-wrap">
                        <form id="fas_form" method="post" enctype="multipart/form-data"  action="">
							 <div class="form-horizontal">					   			 
					   			
								 
                                
                                <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Eamil </label>
									 <div class="col-sm-8">
									 <input class="form-control" placeholder="Enter eamil" name="admin_email" id="admin_email" type="text"  />
									 </div>
								 </div>
                                
                                
                                <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Password </label>
									 <div class="col-sm-8">
									 <input class="form-control" placeholder="Enter password" name="admin_password" id="admin_password" type="password"  />
									 </div>
								 </div>
                                
                                
                                <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Confirm password </label>
									 <div class="col-sm-8">
									 <input class="form-control" placeholder="Enter confirm" name="admin_confirm" id="admin_confirm" type="password"  />
									 </div>
								 </div>
                               
                               
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
                              
                              
								 <div class="form-group" id="company_name">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Company name </label>
									 <div class="col-sm-8">
									 <input class="form-control" placeholder="Enter company name" name="agents_company_name" id="agents_company_name" type="text" />
									 </div>
								 </div>
                                 
                                 
								 <div class="form-group" id="type_business">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Type of business </label>
									 <div class="col-sm-8">
									 <input class="form-control" placeholder="Enter type busniess" name="agents_type_business" id="agents_type_business" type="text"  />
									 </div>
								 </div>
                                 
                                 
								 <div class="form-group" id="position">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Position </label>
									 <div class="col-sm-8">
									 <input class="form-control" placeholder="Enter position" name="agents_position" id="agents_position" type="text"  />
									 </div>
								 </div>
                                 
                                 
								 <div class="form-group" id="person_charge">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Person in charge</label>
									 <div class="col-sm-8">
									 <input class="form-control" placeholder="Enter person charge" name="agents_person_charge" id="agents_person_charge" type="text"  />
									 </div>
								 </div>
                                 
                                 
								 <div class="form-group" id="person_charge_contact_number">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Person in charge contact number </label>
									 <div class="col-sm-8">
									 <input class="form-control" placeholder="Enter person in charge contact number" name="agents_person_charge_contact_number" id="agents_person_charge_contact_number" type="text" />
									 </div>
								 </div>

                               
                                
                                
                                <div class="form-group" id="fullname">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Full name </label>
									 <div class="col-sm-8">
									 <input class="form-control" placeholder="Enter full name" name="agents_fullname" id="agents_fullname" type="text"  />
									 </div>
								 </div>

                                
                                 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Full address</label>
									 <div class="col-sm-8">
									 <input class="form-control" name="agents_address" placeholder="Enter full address" id="agents_address"  type="text">
									 </div>
								 </div>
                                
                              
                                 <div class="form-group ">
	 								<label for="exampleInputEmail_4" class="col-sm-3 control-label">Countery</label>
									 <div class="col-sm-8">
									<select name="agents_country" id="agents_country" class="form-control select2" >
										<option value="">--Choose countery---</option>
										<?php foreach($country as $new) {
											$sel = "";
											echo '<option value="'.$new->country_id.'" '.$sel.'>'.$new->country_name_en.'</option>';
										}
										
										?>
									</select>
									 </div>
								 </div>

                                
                                
                                <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Phone</label>
									 <div class="col-sm-8">
									 <input class="form-control" id="agents_phone" name="agents_phone" placeholder="Enter phone"  type="text"  >
									 </div>
								 </div>
                                 
								
								 
								 <div class="form-group">
									<label for="exampleInputEmail_4" class="col-sm-3 control-label">Account no.</label>
									 <div class="col-sm-8">
										 <input class="form-control" id="agents_account_no" name="agents_account_no" placeholder="Enter account no."  type="text" >
									 </div>
								 </div>
								 
								 
								 
								
								  <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Paypal email</label>
									 <div class="col-sm-8">
									 <input class="form-control" id="agents_paypal" name="agents_paypal" placeholder="Enter paypal email (if available)"  type="text" >
									 </div>
								 </div>
								 
								 
								  <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Account name</label>
									 <div class="col-sm-8">
									 <input class="form-control" name="agents_account_name" id="agents_account_name" placeholder="Enter account name"  type="text" >
									 </div>
								 </div>
								 
								  <div class="form-group" >
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Swift code</label>
									 <div class="col-sm-8">
									 <input class="form-control" id="agents_swift" name="agents_swift" placeholder="Enter swift code"  type="text"  >
									 </div>
								 </div>
								 
								  <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Bank name</label>
									 <div class="col-sm-8">
									 <input class="form-control" id="agents_bank_name" name="agents_bank_name"  placeholder="Enter bank name"  type="text" >
									 </div>
								 </div>
								 
								  
					
								 
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
	
</script>

