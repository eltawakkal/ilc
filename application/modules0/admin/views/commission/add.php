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
										<h6 class="panel-title txt-dark">Financial Details</h6>
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
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Full name </label>
									 <div class="col-sm-8">
									 <input class="form-control" placeholder="Enter full name" name="agents_fullname" id="agents_fullname" type="text"  />
									 </div>
								 </div>
                                
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
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Confirm Password </label>
									 <div class="col-sm-8">
									 <input class="form-control" placeholder="Enter Full Name" name="admin_confirm" id="admin_confirm" type="password"  />
									 </div>
								 </div>

                                
                                 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Full Address</label>
									 <div class="col-sm-8">
									 <input class="form-control" name="agents_address" placeholder="Enter Full Address" id="agents_address"  type="text">
									 </div>
								 </div>
                                
                              
                                 <div class="form-group ">
	 								<label for="exampleInputEmail_4" class="col-sm-3 control-label">Countery</label>
									 <div class="col-sm-8">
									<select name="agents_country" id="agents_country" class="form-control select2" >
										<option value="">--Choose Countery---</option>
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
									 <input class="form-control" id="agents_phone" name="agents_phone" placeholder="Enter Name"  type="text"  >
									 </div>
								 </div>
                                 
								
								 
								 <div class="form-group">
									<label for="exampleInputEmail_4" class="col-sm-3 control-label">Account No.</label>
									 <div class="col-sm-8">
										 <input class="form-control" id="agents_account_no" name="agents_account_no" placeholder="Enter Account No."  type="text" >
									 </div>
								 </div>
								 
								 
								 
								
								  <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Paypal Email</label>
									 <div class="col-sm-8">
									 <input class="form-control" id="agents_paypal" name="agents_paypal" placeholder="Enter Paypal Email (if available)"  type="text" >
									 </div>
								 </div>
								 
								 
								  <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Account Name</label>
									 <div class="col-sm-8">
									 <input class="form-control" name="agents_account_name" id="agents_account_name" placeholder="Enter Account Name"  type="text" >
									 </div>
								 </div>
								 
								  <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Bank Name</label>
									 <div class="col-sm-8">
									 <input class="form-control" id="agents_bank_name" name="agents_bank_name"  placeholder="Enter bank Name"  type="text" >
									 </div>
								 </div>
								 
								  <div class="form-group" >
									 <label for="exampleInputuname_4" class="col-sm-3 control-label">Apply for (please select)</label>
									 <div class="col-sm-8">
									 <input class="form-control" id="agents_bank_address" name="agents_bank_address" placeholder="Enter Bank Address"  type="text"  >
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



