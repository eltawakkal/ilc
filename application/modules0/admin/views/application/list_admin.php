<script type="text/javascript">
function areyousure()
{
	return confirm('<?php echo lang('are_you_sure');?>');
}
</script>


	<!-- Bootstrap Colorpicker CSS -->
<link href="<?php echo base_url('assets/cp/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')?>" rel="stylesheet" type="text/css"/>

<!-- Bootstrap Datetimepicker CSS -->
<link href="<?php echo base_url('assets/cp/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')?>" rel="stylesheet" type="text/css"/>

<!-- Bootstrap Daterangepicker CSS -->
<link href="<?php echo base_url('assets/cp/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.css')?>" rel="stylesheet" type="text/css"/>
		
	<div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Applications</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="#">Dashboard</a></li>
						<li class="active"><span>Applications</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">List</h6>
								</div>
								<div class="clearfix"></div>
							</div>
                            
                            <?php // if(check_admin_role(43)==1){?>	
                             <!--<div class="row" style="margin-bottom:10px;">
                                <div class="col-xs-12">
                                    <div class="btn-group pull-right">
                                        <a class="btn btn-primary" href="<?php echo site_url('admin/Attachments/add/'); ?>"><i class="fa fa-plus"></i> Add New</a>
                                    </div>
                                </div>    
                            </div>-->	
							<?php // } ?>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
								
								
								<div class="row">
									<div class="col-sm-2">
										<div class="form-group">
											<label class="control-label mb-10 text-left">From date</label>
											<div class='input-group date' id='datetimepicker1'>
												<input type='text' class="form-control" placeholder="Enter From Date" id="from_date" />
												<span class="input-group-addon">
													<span class="fa fa-calendar"></span>
												</span>
											</div>
										</div>
									</div>
									
									
									
									<div class="col-sm-2">
										<div class="form-group">
											<label class="control-label mb-10 text-left">To date</label>
											<div class='input-group date' id='datetimepicker2'>
												<input type='text' class="form-control" placeholder="Enter To Date" id="to_date" />
												<span class="input-group-addon">
													<span class="fa fa-calendar"></span>
												</span>
											</div>
										</div>
									</div>
									
									<div class="col-sm-2">
										<div class="form-group">
											<label class="control-label mb-10 text-left">University</label>
											<div>
												 <select name="university_id" id="university_id" class="form-control select2">
													<option value="">--Choose university --</option>
													  <?php if(isset($university)):?>
															<?php $i=1;foreach ($university as $new){?>
														<option value="<?php echo $new->university_id; ?>"><?php echo $new->university_name; ?></option>

															<?php $i++;}?>
													  <?php endif;?>

												</select>
											</div>
										</div>
									</div>
									
									<div class="col-sm-2">
										<div class="form-group">
											<label class="control-label mb-10 text-left">Agent</label>
											<div>
												 <select name="agent_id" id="agent_id" class="form-control select2">
													<option value="">--Choose agents name --</option>
													  <?php if(isset($agents)):?>
															<?php $i=1;foreach ($agents as $new){?>
														<option value="<?php echo $new->agents_user_id; ?>"><?php echo $new->agents_fullname; ?></option>

															<?php $i++;}?>
													  <?php endif;?>

												</select>
											</div>
										</div>
									</div>
									
									<div class="col-sm-3">
										<div class="form-group">
										
											<button class="btn  btn-primary" id="btn_search" style="position:relative; top: 34px">Search</button>
										</div>
									</div>
								</div>
											
											
												
										<br><br>		
									<div class="table-wrap">
										<div class="table-responsive" id="ajax_table">
											<table id="datable_2"  class="table table-hover table-bordered display mb-30 dataTable" >
												<thead>
													<tr>
														<th>#</th>
														<th style="display: none">App no.</th>
														<th>App no.</th>
                                                        <th>App date</th>
                                                        <th>Full name</th>
                                                        <th>University</th>
                                                        <th>WhatsApp</th>
                                                        <th>App status</th>
														<th style="width:10%">Action</th>
													</tr>
												</thead>
                                                 <?php if(isset($applications)):?>
                        						<tbody>
                            						<?php $i=1;foreach ($applications as $new){?>
													<tr>
														 <td> <?php echo $i?></td>
                                                         <td style="display: none" id="users_id<?php echo $i ?>"> <?php echo $new->users_id?></a></td>
                                                         <td> <a style="text-decoration: underline" href="<?php echo site_url('admin/application/view/'.$new->users_admin_id); ?>"><?php echo $new->users_id?></a></td>
                                                         <td> <?php echo $new->users_created_on;?></td>
                                                         <td> <?php echo $new->users_fullname;?></td>
                                                         <td> <?php echo $new->university_name;?></td>
                                                         <td> <?php echo $new->users_whatapp;?></td>
                                                         <td> <?php  if($new->users_status == 1){
															 			echo 'New ';
																		}else if($new->users_status == 2){
															 			echo 'submitted ';
																		} else  if($new->users_status == 3){ 
																		   echo 'Processing';
																	   } else  if($new->users_status == 4){ 
																		   echo 'Not submit';
																	   }else  if($new->users_status == 5){ 
																		   echo 'Other';
																	   }else  if($new->users_status == 6){ 
																		   echo 'Offered';
																	   }else  if($new->users_status == 7){ 
																		   echo 'Val';
																	   }else  if($new->users_status == 8){ 
																		   echo 'Enrolled';
																	   }else  if($new->users_status == 9){ 
																		   echo 'payment processing';
																	   }else  if($new->users_status == 10){ 
																		   echo 'Canceled';
																	   }else  if($new->users_status == 11){ 
																		   echo 'Rejected';
																	   }
															 ?></td>
                                                       
                                                        <td><a style="padding: 4px 15px" class="btn btn-primary btn-xs" href="<?php echo site_url('admin/application/change/'.$new->users_id); ?>" data-toggle="modal" data-target="#responsive-modal" title="Change Status" onclick="btn_show_detials(<?php echo $i ?>);"> <i class="fa fa-ellipsis-v"></i></a>
                                                        <a style="padding: 4px 15px" class="btn btn-danger btn-xs" href="<?php echo site_url('admin/application/delete/'.$new->users_id); ?>" data-toggle="tooltip" title="Delete" onclick="return areyousure()"><i class="icon-trash"></i></a></td>
                                                         
                              
										
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
           
           
           
           
 <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h5 class="modal-title">Change status</h5>
					</div>
					<div class="modal-body">
						<form method="post" enctype="multipart/form-data"  action="" id="fas_form">
						 <input type="hidden" class="users_id" name="users_id" >
							<div class="form-group">
								<label for="recipient-name" class="control-label mb-10">Have you been sent to the university?</label>
								<select name="users_status" id="status" class="form-control users_status" onChange="change_status()">
										<option value="0">--Choose status---</option>
										<!--<option value="3">Yes</option>
										<option value="4">No</option>-->
										
										<option value="2">submitted</option>
										<option value="3">processing</option>
										<option value="12">Conditional offer</option>
										<option value="6">Offered</option>
										<option value="7">Val</option>
										<option value="8">Enrolled</option>
										<option value="9">payment processing</option>
										<option value="10">Canceled</option>
										<option value="11">Rejected</option>
										<option value="5">Other</option>
										
									</select>
							</div>
							<div class="form-group" id="message" style="display: none">
								<label for="message-text" class="control-label mb-10">Details:</label>
								<textarea class="form-control" id="users_notes" name="users_notes" ></textarea>
							</div>
							
							<div class="form-group">
								<label for="message-text" class="control-label mb-10">Attchment:</label><span style="color: red; font-size: 12px">* File size must not exceed 2 MB</span>
								<input type="file" class="form-control" id="user_file" name="user_file" ></textarea>
							</div>
						
						<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="submit"  id="btn_submit" value="Save changes" class="btn btn-danger"  />
						</form>
					</div>
					</div>
					
				</div>
			</div>
</div>
            
    <script src="<?php echo base_url('assets/cp/vendors/bower_components/jquery/dist/jquery.min.js')?>"></script>
	<script src="<?php echo base_url('assets/cp/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/cp/dist/js/dataTables-data.js')?>"></script>
    <script src="<?php echo base_url('assets/cp/dist/js/jquery.slimscroll.js')?>"></script>
	<script src="<?php echo base_url('assets/cp/dist/js/dropdown-bootstrap-extended.js')?>"></script>
    
     <script type="text/javascript" src="<?php echo base_url('assets/cp/vendors/bower_components/moment/min/moment-with-locales.min.js')?>"></script>
		
		<!-- Bootstrap Colorpicker JavaScript -->
	<script src="<?php echo base_url('assets/cp/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')?>"></script>
				
		<!-- Bootstrap Datetimepicker JavaScript -->
	<script type="text/javascript" src="<?php echo base_url('assets/cp/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')?>"></script>
		
		<!-- Bootstrap Daterangepicker JavaScript -->
	<script src="<?php echo base_url('assets/cp/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
		
		<!-- Form Picker Init JavaScript -->
	<script src="<?php echo base_url('assets/cp/dist/js/form-picker-data.js')?>"></script>
<script type="text/javascript">
 function change_status()
	{
	var status= $('#status').val();
		if(status == 5){
			
			$('#message').show();
		}
		else {
			$('#message').hide();
			
		}
	}
	
	
	
	
	function btn_show_detials(i)//عرض مودال تسجيل الحضور
{
	 var app_id = parseInt($('#users_id'+i).html());
	 $('.users_id').val(app_id);

}
	
	
	
		
	 $('#fas_form').on('submit',function(e){
	 e.preventDefault();
	
	var users_id = $('.users_id').val();
	var users_status = $('.users_status').val();
    var users_notes = $('#users_notes').val();
    var user_file = $('#user_file').val();
		
		 if(users_status == '' || users_status == 0){
			 alert('Status Required');
			 return false;
		 } 
  var formdata = new FormData($(this)[0]);

	fas_form.btn_submit.disabled = true; 
		 
	 $.ajax({
     url: '<?php echo site_url('admin/application/change_status') ?>',
     type:'POST',
   	 data:new FormData(this),
	 processData:false,
	 contentType:false,
	 cache:false,
	 async:false,

    success:function(result){
      alert("Your appilcation has been successfully sent");
		location.reload();
	 
	 }
  });
});

		</script>





<script type="text/javascript">
   $(document).on('click', '#btn_search', function(){
	var from_date = $('#from_date').val();
	var to_date = $('#to_date').val();
    var agent_id = $('#agent_id').val();
	var university_id = $('#university_id').val();
	   

	
  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#result').html(ajax_load);
	  
  $.ajax({
    url: '<?php echo site_url('admin/application/get_app_by_id') ?>',
    type:'POST',
    data:{from_date       : from_date,
	      to_date           : to_date,
		  agent_id    : agent_id,
		 university_id:university_id},
    success:function(result){
	  $('#ajax_table').html(result);
	  $('#load_search').hide();
	 }
  });
});
</script>
	