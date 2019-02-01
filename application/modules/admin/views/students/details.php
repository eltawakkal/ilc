<div class="page-wrapper">
            <div class="container-fluid">
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Detail Message</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="index.html">Dashboard</a></li>
						<li><a href="<?php echo site_url('admin/messages');?>"><span>Inbox</span></a></li>
						<li class="active"><span>Detail message</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default card-view  pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="mail-box">
										<div class="row">
											
											
											<aside class="col-lg-12 col-md-8 pl-0">
												<div class="panel panel-refresh pa-0">
													<div class="refresh-container">
														<div class="la-anim-1"></div>
													</div>
													<div class="panel-heading pt-20 pb-20 pl-15 pr-15">
														<div class="pull-left">
															<h6 class="panel-title txt-dark">inbox</h6>
														</div>
														
														<div class="clearfix"></div>
													</div>
													<div class="panel-wrapper collapse in">
														<div class="panel-body inbox-body pa-0">
															<div class="heading-inbox">
																<div class="container-fluid">
																	<div class="pull-left">
																		<div class="compose-btn">
																			<a class="btn btn-sm mr-10" href="<?php echo site_url('admin/messages');?>" data-toggle="modal" title="Compose"><i class="zmdi zmdi-chevron-left"></i></a>
																		</div>
																	</div>
																	
																</div>
																<hr class="light-grey-hr mt-10 mb-15"/>
																<div class="container-fluid mb-20">	
																	<h4 class="weight-500"> <?php echo $details->messages_title ?></h4>
																</div>	
															</div>
															<div class="sender-info">
																<div class="container-fluid">
																	<div class="sender-img-wrap pull-left mr-20">
																		<img class="sender-img" alt="user" src="<?php echo base_url('assets/uploads/images/avatar5.png');?>">
																		
																	</div>
																	<div class="sender-details   pull-left">
																		<span class="capitalize-font pr-5 txt-dark block font-15 weight-500 head-font">
                                                                            <?php $CI = get_instance();
                                                                            $CI->load->model("students_model");
                                                                            if($details->messages_to == null || $details->messages_to ==''){
                                                                                $get_name = $CI->students_model->get_name($details->messages_from);
                                                                                echo $get_name->users_fullname;
                                                                            }
                                                                            else {
                                                                                $get_name = $CI->students_model->get_name($details->messages_to);
                                                                                echo $get_name->users_fullname;
                                                                            }

                                                                            ?></span>
																		<span class="block">
																			to
																			<span>me</span>
																		</span>	
																	</div>	
																	<div class="pull-right">
																		<div class="inline-block mr-5">
																			<span class="inbox-detail-time-1 font-12"><?php echo $details->message_created_on ?></span>
																			
																		</div>
																		
																	</div>
																	<div class="clearfix"></div>
																</div>
															</div>
															<div class="container-fluid view-mail mt-20">
																<p><?php echo nl2br($details->messages_text) ?> </p>
															</div>
														
															<hr class="light-grey-hr mt-20 mb-20">
															
																
															<div class="container-fluid attachment-mail mt-40 mb-40">
								<?php 
							   $messages_attach= (!isset($details->messages_attach) || is_null($details->messages_attach)) ? '' : $details->messages_attach;
											
									 if($messages_attach != ''){ ?>
						          
							        <div class="col-sm-1">
									 
									   <a class="btn btn-default" style="margin-left:20px;" href="<?php echo site_url('admin/messages/download/'.$details->messages_id); ?>" data-toggle="tooltip" ><i class="fa fa-download"></i> <?php echo lang('download');?></a>
									   </div>
									   <?php }?>
																
															</div>
														<hr class="light-grey-hr mt-20 mb-20">	
															
															
															
						<ul class="chat-list-wrap" style="margin-left:50px">
							<li class="chat-list">
								<div class="chat-body">
								 <?php if(isset($replys)):?>
									<?php $i=1;foreach ($replys as $new){?>
									
										<div class="chat-data">
											<img class="user-img img-circle" src="<?php echo base_url('assets/cp/dist/img/user.png');?>" alt="user">
											
											<div class="user-data">
											    <span class="name block capitalize-font"><?php if($new->admin_role == 4 || $new->admin_role == 1){ echo 'Admin'; } else if($new->admin_role == 2) { echo $new->agents_fullname.' '.$new->agents_company_name;} else {echo $new->users_fullname;} ?></span>
												<span class="time block truncate txt-grey"><?php echo $new->replys_text; ?></span>
											</div>
											<div class="status away"></div>
											<div class="clearfix"></div>
										</div>





                                         <div class="container-fluid attachment-mail mt-40 mb-40">
                                             <?php
                                             $CI = get_instance();
                                             $CI->load->model("students_model");
                                             $reply_attach = $CI->students_model->get_reply_attach($new->replys_guid);

                                              if(isset($reply_attach)):?>
                                             <?php $i=1;foreach ($reply_attach as $new){?>

                                             <?php
                                             $replys_attach= (!isset($new->reply_attachs_file) || is_null($new->reply_attachs_file)) ? '' : $new->reply_attachs_file;

                                             if($replys_attach != ''){ ?>
                                                 <div class="col-sm-1">

                                                     <a class="btn btn-default" style="margin-left:20px;" href="<?php echo site_url('admin/messages/download_reply/'.$new->reply_attachs_id); ?>" data-toggle="tooltip" ><i class="fa fa-download"></i> <?php echo lang('download');?></a>
                                                 </div>
                                                 <?php } ?>
                                            <?php $i++;}?>
                                             <?php endif;?>
                                         </div>

                                         <hr class="light-grey-hr mt-20 mb-20">
									
									<?php $i++;}?>
								 <?php endif;?>
								</div>
							</li>
						</ul>			
																	
																	
										 <hr class="light-grey-hr mt-20 mb-20">

                            <form  method="post" enctype="multipart/form-data" id="fas_form">
                                <div class="input_fields_wrap">
                                <div class="row">
								 <div class="form-group">
                                    <label class="col-lg-1 control-label">Reply</label>
                                    <div class="col-lg-8">
                                        <textarea class="textarea_editor form-control" id="replys_text" name="replys_text" rows="3" placeholder="Enter text ..."></textarea>
                                        <input type="hidden" id="replys_msg_id" name="replys_msg_id" value="<?php echo $details->messages_guid?>" />
                                        <input type="hidden" name="replys_to" id="replys_to" value="<?php echo $details->admin_guid ?>" />
                                        <input type="hidden" value="<?php echo  $details->messages_from; ?>" name="messages_fromm" id="messages_from" />

                                    </div>

						        </div>
                                </div>
                                <br>
                                <div class="row">
                                <div class="form-group">
                                    <label class="col-lg-1 control-label">Attachemts</label>
                                    <div class="col-lg-8">
                                        <input type="file" id="reply_attachs_file" name="reply_attachs_file[]" value="" class="form-control" />
                                    </div>
                                    <div class="col-lg-1">
                                        <button class="add_field_button btn btn-success">Add More </button>
                                    </div>
                                </div>
                                </div>

                                </div>

                                <div class="col-lg-1">
                                    <!--   <button  class="btn btn-success"  id="btn_send" type="submit">Send</button>
                                   <button  class="btn btn-success" onClick="btn_send()" id="btn_send" type="submit">Send</button> -->
                                    <input  class="btn btn-success" type="submit"  id="btn_send" value="Send"  />
                                </div>

                            </form>
														
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
				<!-- /Row -->
			</div>
<script type="text/javascript">
    $('#fas_form').on('submit',function(e){
        e.preventDefault();

	var replys_msg_id = $('#replys_msg_id').val();
	var replys_text = $('#replys_text').val();
    var replys_to = $('#replys_to').val();

        var formdata = new FormData($(this)[0]);
        fas_form.btn_send.disabled = true;
        $.ajax({
            url: '<?php echo site_url('admin/messages/reply_msg') ?>',
            type:'POST',
            /* data:{replys_msg_id     : replys_msg_id,
                   replys_text       : replys_text,
                   replys_to			: replys_to
                  },*/
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success:function(result){

                alert('Message sent successfully');
                //	location.reload();

            }
        });
    });
	</script>



    <script type="text/javascript">
        $(document).ready(function() {
            var max_fields      = 100; //maximum input boxes allowed
            var wrapper         = $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="row"><div class="form-group"><label class="col-lg-1 control-label">Attachemts</label><div class="col-lg-8"><input type="file" name="reply_attachs_file[]" value="" class="form-control" /></div></div><a href="#" class="remove_field btn btn-danger">Remove</a></div></div>'); //add input box
                    $('.chzn').chosen({search_contains:true});
                }
            });

            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        });



    </script>
