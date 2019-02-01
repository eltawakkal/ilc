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
						<li class="active"><span>Detail Message</span></li>
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
																		<span class="capitalize-font pr-5 txt-dark block font-15 weight-500 head-font"><?php echo $details->users_fullname ?></span>
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
			
		