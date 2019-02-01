<?php $admin = $this->session->userdata('admin');
$admin_id= $admin['admin_id'];
$admin_role= $admin['admin_role'];
?>

<script type="text/javascript">
function areyousure()
{
	return confirm('<?php echo lang('are_you_sure');?>');
}
</script>
<style type="text/css">
	.ui-widget.ui-widget-content{z-index:10000 !important}
	.ui-menu .ui-widget .ui-widget-content .ui-autocomplete .ui-front{display: block !important}
	.btn.btn-danger, .wizard > .actions a.btn-danger, .dt-buttons .btn-danger.dt-button, .tablesaw-sortable th.tablesaw-sortable-head button.btn-danger, .sweet-alert button.btn-danger, .owl-theme .owl-nav .btn-danger[class*="owl-"], button.btn-danger.fc-agendaDay-button.fc-state-default.fc-corner-right, button.btn-danger.fc-month-button.fc-state-default.fc-corner-left, button.btn-danger.fc-agendaWeek-button, .btn-danger.fc-prev-button, .btn-danger.fc-next-button, .btn-danger.fc-today-button{background: #F28D37 !important; border:solid 1px #F28D37 !important}
	.label.label-danger, .label-danger.jvectormap-tip{background: #F28D37 !important;}
</style>
 <link href="<?php echo base_url('assets/cp/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css')?>" rel="stylesheet" type="text/css"/>


<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
 
  <div class="page-wrapper">
            <div class="container-fluid">
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">inbox</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="#">Dashboard</a></li>
						<li class="active"><span>inbox</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				
				<!-- Row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default card-view pa-0">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-0">
							<div class="mail-box">
								<div class="row">
									<aside class="col-lg-3 col-md-4 pr-0">
										<div class="mt-20 mb-20 ml-15 mr-15">
											<a href="#myModal" data-toggle="modal"  title="Compose"    class="btn btn-danger btn-block">
											Compose
											</a>
										
										</div>
									<div  class="tab-struct vertical-tab">
										<ul role="tablist" class="nav nav-tabs ver-nav-tab" id="myTabs_8" style="float: none !important">
									<li class="active" role="presentation" style="margin-bottom:0px !important">
										<a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_8" href="#home_8" style="background: #fff;"><i class="zmdi zmdi-inbox"></i> Inbox <span class="label label-danger ml-10"><?php echo count($count_inbox)?></span></a></li>
									<li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_8" role="tab" href="#profile_8" aria-expanded="false" style="background: #fff;"><i class="zmdi zmdi-email-open"></i> Sent mail</a></li>

								</ul>
										</div>
									</aside>

									<div class="tab-content" id="myTabContent_8">
									<div  id="home_8" class="tab-pane fade active in" role="tabpanel">
									<aside class="col-lg-9 col-md-8 pl-0">
										<div class="panel panel-refresh pa-0">
											<div class="refresh-container">
												<div class="la-anim-1"></div>
											</div>
											<div class="panel-heading pt-20 pb-20 pl-15 pr-15">
												<div class="pull-left">
													<h6 class="panel-title txt-dark">inbox</h6>
												</div>
												<div class="pull-right">
													<form role="search" class="inbox-search inline-block pull-left mr-15">
														
													</form>
													<a href="#" class="pull-left inline-block refresh">
														<i class="zmdi zmdi-replay"></i>
													</a>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="panel-wrapper collapse in">
												<div class="panel-body inbox-body pa-0">

													<div class="table-responsive mb-0">
														<table class="table table-inbox table-hover mb-0">
															<tbody>
												 <?php if(isset($inbox)):?>
                            						<?php $ff=''; $i=1;foreach ($inbox as $new){

                                                         $CI = get_instance();
                                                         $CI->load->model("students_model");
                                                         $reply = $CI->students_model->get_reply_by_id($new->messages_guid);
                                                         $not_view="";
                                                         $wite="";
                                                            foreach ($reply as $neww){
                                                            if($neww->replys_is_view_to == 0){
                                                                $not_view='style="background:#f497f1 !important"';
                                                                $wite="New Reply";
                                                            } else {
                                                                $not_view='';
                                                                $wite="";
                                                            }
                                                            }
																if($new->messages_to_view == 0){$ff='class="unread"';
																 $neww='<span class="label label-warning pull-right">new</span>';} else {$ff=''; $neww='';}?>
															
														<tr <?php echo $not_view;?> <?php echo $ff;?> onclick="is_to_view(<?php echo $new->messages_id?>);" >
															<td class="inbox-small-cells">
                                                                <input type="hidden" value="<?php echo $new->messages_guid?>" id="messages_guidd"  name="messages_guid"/>
																<div class="checkbox checkbox-default inline-block">
																	 <a href="<?php echo site_url('admin/messages/details/'.$new->messages_guid); ?>" onclick="return areyousure()"><i class="fa fa-trash-o" style="color: red"></i> </a>
																	<?php echo $wite;?>
																</div>
																
																<input type="hidden" id="messages_id" value="<?php echo $new->messages_id?>" />
															</td>
															<td class="view-message  dont-show">
																<a href="<?php echo site_url('admin/messages/details/'.$new->messages_guid); ?>">
																	<?php  if($new->admin_role == 1){echo 'Admin'; } else if($new->admin_role == 2) { 
																	$CI = get_instance();
																	$CI->load->model("students_model");
																$agent = $CI->students_model->get_agent($new->admin_guid);
																	echo $agent->agents_fullname.' '.$agent->agents_company_name;
																} 
																		else { echo $new->users_fullname;}  ?>
																	<?php echo $neww ?></a></td>
															<td class="view-message ">
																<a href="<?php echo site_url('admin/messages/details/'.$new->messages_guid); ?>">
																	<?php echo $new->messages_title ?></a></td>
															<td class="view-message  text-right">
																<span  class="time-chat-history inline-block">
																	<a href="<?php echo site_url('admin/messages/details/'.$new->messages_guid); ?>">
																		<?php echo $new->message_created_on ?></a></span>
															</td>
																</tr>
													<?php $i++;}?>
												<?php endif;?>		
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</aside>
									</div>
									<div  id="profile_8" class="tab-pane fade" role="tabpanel">
										<aside class="col-lg-9 col-md-8 pl-0">
										<div class="panel panel-refresh pa-0">
											<div class="refresh-container">
												<div class="la-anim-1"></div>
											</div>
											<div class="panel-heading pt-20 pb-20 pl-15 pr-15">
												<div class="pull-left">
													<h6 class="panel-title txt-dark">Send</h6>
												</div>
												<div class="pull-right">
													<form role="search" class="inbox-search inline-block pull-left mr-15">
														
													</form>
													<a href="#" class="pull-left inline-block refresh">
														<i class="zmdi zmdi-replay"></i>
													</a>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="panel-wrapper collapse in">
												<div class="panel-body inbox-body pa-0">

													<div class="table-responsive mb-0">
														<table class="table table-inbox table-hover mb-0">
															<tbody>
												 <?php if(isset($send)):?>
                            						<?php $ff=''; $i=1;foreach ($send as $new){

                                                         $CI = get_instance();
                                                         $CI->load->model("students_model");
                                                         $reply = $CI->students_model->get_reply_by_id($new->messages_guid);
                                                         $not_view_from="";
                                                         $wite_from="";
                                                         foreach ($reply as $neww){
                                                             if($neww->replys_is_view_from == 0){
                                                                 $not_view_from='style="background:#f497f1 !important"';
                                                                 $wite_from="New Reply";
                                                             } else {
                                                                 $not_view_from='';
                                                                 $wite_from="";
                                                             }
                                                         }

														if($new->messages_from_view == 0){$ff='class="unread"';
														 $neww='<span class="label label-warning pull-right">new</span>';} else {$ff='';$neww='';}?>
																
																
														<tr <?php echo $not_view_from;?> <?php echo $ff;?> onclick="is_from_view(<?php echo $new->messages_id?>)" >
                                                            <input type="hidden" value="<?php echo $new->messages_guid?>" id="messages_guiddd"  name="messages_guiddd"/>

                                                            <td class="inbox-small-cells">
																<div class="checkbox checkbox-default inline-block">
																	 <a href="<?php echo site_url('admin/messages/delete/'.$new->messages_id); ?>" onclick="return areyousure()"><i class="fa fa-trash-o" style="color: red"></i> </a>
                                                                    <?php echo $wite_from;?>
																</div>
																<input type="hidden" class="messages_idd" value="<?php echo $new->messages_id?>" name="messages_idd" />
																<i class="zmdi zmdi-star inline-block font-16"></i>
															</td>
															<td class="view-message  dont-show" >
																<a href="<?php echo site_url('admin/messages/details/'.$new->messages_guid); ?>">
																	<?php if($new->admin_role == 1){echo 'Admin'; } else if($new->admin_role == 2) { 
																	$CI = get_instance();
																	$CI->load->model("students_model");
																$agent = $CI->students_model->get_agent($new->admin_guid);
																	echo $agent->agents_fullname.' '.$agent->agents_company_name;
																} 
																		else { echo $new->users_fullname;}  ?>
																	
																	<?php echo $neww; ?></a></td>
															<td class="view-message " >
																<a href="<?php echo site_url('admin/messages/details/'.$new->messages_guid); ?>">
																	<?php echo $new->messages_title ?></a></td>
															<td class="view-message  text-right">

																<span  class="time-chat-history inline-block"><?php echo $new->message_created_on ?></span>
															</td>
														</tr>
													<?php $i++;}?>
												<?php endif;?>		
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</aside>
									</div>

								</div>
								

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Row -->
	</div>
	<!-- Modal -->
	<div aria-hidden="true" role="dialog" id="myModal" class="modal fade" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					<h4 class="modal-title">Compose</h4>
				</div>
				<div class="modal-body">
					
				 <form id="fas_form" method="post" enctype="multipart/form-data"  action="">
					<div class="form-horizontal">
							<?php $nn=''; if($admin_role == 3){  $nn='style="display:none"';} ?>
						<div class="form-group" <?php echo $nn; ?>>
							<label class="col-lg-2 control-label">To</label>
							<div class="col-lg-10">
						<!--<input type="text" id="skill_input" class="form-control" placeholder="Enter name"/>-->
					
							<select id="messages_to" name="messages_to" class="form-control select2" >
									<?php $nn=''; if($admin_role == 1 || $admin_role == 4){ ?>
										<option value="0">--Choose name---</option>
										<?php foreach($names as $new) {
											echo '<option value="'.$new->id.'" >'.$new->name.'</option>';
										} ?>
										<?php } else if($admin_role == 2){ ?>
										<option value="0">--Choose name---</option>
										<option value="22222">Admin</option>
										<?php foreach($namesby_agent as $new) {
											echo '<option value="'.$new->users_admin_id.'" >'.$new->users_fullname.'</option>';
										}
										
										?>
											<?php } ?>
							 </select>
								
							
	
							</div>
						</div>
						
						<!--<div class="form-group">
							<label class="col-lg-2 control-label">To</label>
							<div class="col-lg-10">

						
							<select id="messages_to" name="messages_to" class="form-control select2">
										
							 </select>
								
								
							
	
							</div>
						</div>-->
						
						
					
						<div class="form-group">
							<label class="col-lg-2 control-label">Subject</label>
							<div class="col-lg-10">
								<input type="text" placeholder="Enter title" id="messages_title" name="messages_title" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">Message</label>
							<div class="col-lg-10">
								<textarea class="textarea_editor form-control" id="messages_text" name="messages_text" rows="15" placeholder="Enter text ..."></textarea>
							</div>
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
								 
								 
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								
								<button  class="btn btn-success" id="btn_send" type="submit">Send</button>
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	


<script type="text/javascript">

	
	
	 function is_to_view(i){
         var messages_guidd = $('#messages_guidd').val();
	  
  $.ajax({
    url: '<?php echo site_url('admin/messages/is_to_views') ?>',
    type:'POST',
    data:{messages_id       : i
		  },
    success:function(result){

	 }
  });

         $.ajax({
             url: '<?php echo site_url('admin/messages/is_view_reply_to') ?>',
             type:'POST',
             data:{messages_guid       : messages_guidd
             },
             success:function(result){

             }
         });
}
	
	
	function is_from_view(i){

        var messages_guiddd = $('#messages_guiddd').val();

        $.ajax({
            url: '<?php echo site_url('admin/messages/is_view_reply_from') ?>',
            type:'POST',
            data:{messages_guiddd       : messages_guiddd
            },
            success:function(result){

            }
        });

  $.ajax({
    url: '<?php echo site_url('admin/messages/is_from_views') ?>',
    type:'POST',
    data:{messages_idd       : i
		  },
    success:function(result){


		
	 }
  });


}





	
   $('#fas_form').on('submit',function(e){
	 e.preventDefault();
	var messages_to = $('#messages_to').val();
	var messages_title = $('#messages_title').val();
	var messages_text = $('#messages_text').val();
	   
	   
 $('#btn_send').val('Sending ..')
      .attr('disabled','disabled');

	  
	  var formdata = new FormData($(this)[0]);
			
	fas_form.btn_send.disabled = true; 
	if(messages_to != '22222') {
  $.ajax({
    url: '<?php echo site_url('admin/messages/send_msg') ?>',
    type:'POST',
    data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
    success:function(result){
		 //$('#responsive-modall').fadeOut('slow');
		// setTimeout(function() {$('#myModal').fadeOut('slow');}, 1500);
		
	 alert('Message sent successfully');
		location.reload();
		
	 }
  });
		}  else {
			
		$.ajax({
    url: '<?php echo site_url('admin/messages/send_msg_to_admin') ?>',
    type:'POST',
    data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
    success:function(result){
		 //$('#responsive-modall').fadeOut('slow');
		// setTimeout(function() {$('#myModal').fadeOut('slow');}, 1500);
		
	 alert('Message sent successfully');
		location.reload();
		
	 }
  });
			
		}
	   
	   
});
	
	
	

$("#skill_input").autocomplete({
        source: '<?php echo site_url('admin/messages/get_names') ?>',
        select: function( event, ui ) {
            event.preventDefault();
            $("#skill_input").val(ui.item.value);
			$("#messages_to").val(ui.item.id);
        }
    });
	
$("#user_by_agent").autocomplete({
        source: '<?php echo site_url('admin/messages/get_namesby_agent') ?>',
        select: function( event, ui ) {
            event.preventDefault();
            $("#user_by_agent").val(ui.item.value);
			$("#messages_to").val(ui.item.id);
        }
    });


</script>