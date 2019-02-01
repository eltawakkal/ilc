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
									
								<div class="col-sm-3">
										<div class="form-group">
											<label class="control-label mb-10 text-left">Agent</label>
											<div class='input-group '>
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
                                                        <th>Student name</th>
                                                        <th>University</th>
                                                        <th>Commission status</th>
                                                        <th>Commission</th>
                                                        <th>payment</th>
                                                        <th>Outstanding</th>
                                                        <th>Redeemed status</th>
                                                        <th>Total</th>
													</tr>
												</thead>
                                                 <?php if(isset($applications)):?>
                        						<tbody>
                            						<?php $i=1;foreach ($applications as $new){?>
													<tr>
														 <td> <?php echo $i?></td>
                                                         <td style=" display: none" id="users_idd<?php echo $i ?>"> <?php echo $new->users_admin_id?></a></td>
                                                         <td> <a style="text-decoration: underline" href="<?php echo site_url('admin/commission/view/'.$new->users_id); ?>"><?php echo $new->users_id?></a></td>
                                                         <td> <?php echo $new->users_created_on;?></td>
                                                         <td> <?php echo $new->users_fullname;?></td>
                                                         <td> <?php echo $new->university_name;?></td>
                                                         <td> <?php  if($new->users_commission_status == 1){
															 			echo 'Yes ';
																		}else if($new->users_commission_status == 2){
															 			echo 'No ';
																		} 
															 ?></td>
                                                        <td> <?php echo $new->users_accured_com;?></td>
                                                         <td> <?php echo $new->users_redeemed;?></td>
                                                          <td> <?php echo $new->users_accured_com - $new->users_redeemed;?></td>
                                                            <td> <?php  if($new->users_redeemed_status == 1){
															 			echo 'Yes ';
																		}else if($new->users_redeemed_status == 2){
															 			echo 'No ';
																		} 
															 ?></td>
                                                        <td> <?php echo $new->users_accured_com + $new->users_redeemed;?></td>

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
						<form>
						 <input type="hidden" id="messages_to" name="messages_to">
							
							<div class="form-group">
								<label for="message-text" class="control-label mb-10">Subject:</label>
								<input type="text" class="form-control" placeholder="Enter title" id="messages_title" name="messages_title" >
							</div>
							
							<div class="form-group">
								<label for="message-text" class="control-label mb-10">Message:</label>
								<textarea class="form-control" id="messages_text" name="messages_text" placeholder="Enter message ..." rows="9"></textarea>
							</div>
							
							
						</form>
						<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button"  id="btn_send" value="Save changes" class="btn btn-danger">Save changes</button>
						
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
	var agent_id = $('#agent_id').val();

		   
		   
		   var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#result').html(ajax_load);
	  
  $.ajax({
    url: '<?php echo site_url('admin/commission/get_app_by_id_commission') ?>',
    type:'POST',
    data:{from_date       : from_date,
	      to_date         : to_date,
		  agent_id   	  : agent_id},
    success:function(result){
	  $('#ajax_table').html(result);
	  $('#load_search').hide();
	 }
  });

});
	

   $(document).on('click', '#btn_send', function(){
	var messages_to = $('#messages_to').val();
	var messages_title = $('#messages_title').val();
	var messages_text = $('#messages_text').val();

	  
  $.ajax({
    url: '<?php echo site_url('admin/students/send_msg') ?>',
    type:'POST',
    data:{messages_to       : messages_to,
		  messages_title    : messages_title,
	      messages_text     : messages_text,
		  },
    success:function(result){
		 //$('#responsive-modall').fadeOut('slow');
		
	 alert('Message sent successfully');
		
	 }
  });
});
</script>
	