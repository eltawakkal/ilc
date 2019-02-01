<script type="text/javascript">
function areyousure()
{
	return confirm('<?php echo lang('Are_you_sure');?>');
}
</script>

 <link href="<?php echo base_url('assets/cp/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css')?>" rel="stylesheet" type="text/css"/>
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
					  <h5 class="txt-dark">Students</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="#">Dashboard</a></li>
						<li class="active"><span>Students</span></li>
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
                           
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
								
								
								<div class="row">
									<div class="col-sm-2">
										<div class="form-group">
											<label class="control-label mb-10 text-left">From date</label>
											<div class='input-group date' id='datetimepicker1'>
												<input type='text' class="form-control" placeholder="Enter from date" id="from_date" />
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
												<input type='text' class="form-control" placeholder="Enter to date" id="to_date" />
												<span class="input-group-addon">
													<span class="fa fa-calendar"></span>
												</span>
											</div>
										</div>
									</div>
									
									<div class="col-sm-2">
										<div class="form-group">
											<label class="control-label mb-10 text-left">Select</label>
											<div>
												 <select name="type" id="type" class="form-control" onChange="get_agents()">
													<option value="0">--Select --</option>
													<option value="1">Individual student</option>
													<option value="2">Agent student</option>
												</select>
											</div>
										</div>
									</div>
									
									<div class="col-sm-2" id="agents" style="display: none">
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
											<table class="table table-hover table-bordered display mb-30 dataTable" >
												<thead>
													<tr>
														<th>#</th>
														<th style="display: none">App no.</th>
														<th>App no.</th>
                                                        <th>App date</th>
                                                        <th>Full name</th>
                                                        <th>Program</th>
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
                                                         <td style=" display: none" id="users_idd<?php echo $i ?>"> <?php echo $new->users_admin_id?></a></td>
                                                         <td> <a style="text-decoration: underline" href="<?php echo site_url('admin/application/view/'.$new->users_admin_id); ?>"><?php echo $new->users_id?></a></td>
                                                         <td> <?php echo $new->users_created_on;?></td>
                                                         <td> <?php echo $new->users_fullname;?></td>
                                                         <td> <?php echo $new->users_program;?></td>
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
                                                       
                                                        <td>
                                                        <button style="padding: 4px 15px" onclick="btn_show_detials('<?php echo $new->users_admin_id?>');" class="btn btn-success btn-xs"  data-toggle="modal" data-target="#responsive-modall" title="Send" ><i class="fa fa-envelope "></i> Send message</button></td>
                                                         
                              
										
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
           
           
           
           
 <div id="responsive-modall" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h5 class="modal-title">Send message</h5>
					</div>
					<div class="modal-body">
						<form id="fas_form" method="post" enctype="multipart/form-data"  action="">
						 <input type="hidden" id="messages_to" name="messages_to">
							
							<div class="form-group">
								<label for="message-text" class="control-label mb-10">Subject:</label>
								<input type="text" class="form-control" placeholder="Enter title" id="messages_title" name="messages_title" >
							</div>
							
							<div class="form-group">
								<label for="message-text" class="control-label mb-10">Message:</label>
								<textarea class="form-control" id="messages_text" name="messages_text" placeholder="Enter message ..." rows="9"></textarea>
							</div>
							
							 <div class="form-group">
									<label for="exampleInputuname_4" class="col-sm-2 control-label">Attachment<br> <span style="color: red; font-size: 11px">(Does not exceed 2 MB)</span></label>
									
									 <div class="col-sm-10">
									<div class="fileinput fileinput-new input-group" data-provides="fileinput">
										<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
										<span class="input-group-addon fileupload btn btn-info btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Select file</span> <span class="fileinput-exists btn-text">Change</span>
										<input type="file" name="messages_attach" id="messages_attach">
										</span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text"> Remove</span></a> 
									</div>
													
										</div>	
												
								 </div>
							<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button"  id="btn_send" value="Save changes" class="btn btn-danger">Save changes</button>
						
					</div>
							
						</form>
						
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
	function btn_show_detials(ii)
{
	$('#messages_to').val(ii);

}
	
	
 function get_agents()
	{
	var type= $('#type').val();
		if(type == 2){
			
			$('#agents').show();
		}
		else {
			$('#agents').hide();
			
		}
	}
	
	
	
	
	

		</script>





<script type="text/javascript">
   $(document).on('click', '#btn_search', function(){
	var from_date = $('#from_date').val();
	var to_date = $('#to_date').val();
    var type = $('#type').val();
	var agent_id = $('#agent_id').val();

	   if(type == 1){
	
  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#result').html(ajax_load);
	  
  $.ajax({
    url: '<?php echo site_url('admin/students/get_app') ?>',
    type:'POST',
    data:{from_date       : from_date,
	      to_date           : to_date},
    success:function(result){
	  $('#ajax_table').html(result);
	  $('#load_search').hide();
	 }
  });
		   
	   } else {
		   
		   
		   var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#result').html(ajax_load);
	  
  $.ajax({
    url: '<?php echo site_url('admin/students/get_app_by_id') ?>',
    type:'POST',
    data:{from_date       : from_date,
	      to_date         : to_date,
		  agent_id   	  : agent_id},
    success:function(result){
	  $('#ajax_table').html(result);
	  $('#load_search').hide();
	 }
  });
		   
		   
	   }
});
	

   $('#fas_form').on('submit',function(e){
	 e.preventDefault();
	var messages_to = $('#messages_to').val();
	var messages_title = $('#messages_title').val();
	var messages_text = $('#messages_text').val();

	 $('#btn_send').val('Sending ..')
      .attr('disabled','disabled');

	  
	  var formdata = new FormData($(this)[0]);
			
	fas_form.btn_send.disabled = true;   
  $.ajax({
    url: '<?php echo site_url('admin/students/send_msg') ?>',
    type:'POST',
    data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
    success:function(result){
		 //$('#responsive-modall').fadeOut('slow');
		
	 alert('Message sent successfully');
		location.reload();
		
	 }
  });
});
</script>
	