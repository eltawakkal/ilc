<script type="text/javascript">
function areyousure()
{
	return confirm('<?php echo lang('are_you_sure');?>');
}
</script>
	<div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Notifications</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="#">Dashboard</a></li>
						<li class="active"><span>Notifications</span></li>
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
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_2"  class="table table-hover table-bordered display mb-30 dataTable" >
												<thead>
													<tr>
														<th style="width: 5%">#</th>
														<th>Title</th>
                                                        <th>Application no.</th>
                                                        <th>Date Notification</th>
													</tr>
												</thead>
                                                 <?php if(isset($notifications)):?>
                        						<tbody>
                            						<?php $i=1;foreach ($notifications as $new){?>
													<tr>
														 <td><?php echo $i?></td>
                                                         <td><?php
													if($new->notifications_type == 1){
													echo 'Your application has been received, and we will contact you shortly'; }
													else if($new->notifications_type == 2){ echo 'Status changed to submitted';}
													else if($new->notifications_type == 3){ echo 'Status changed to processing';}
													else if($new->notifications_type == 4){ echo 'Status changed to not submit';}
												    else if($new->notifications_type == 5){ echo 'Status changed to other';}
													else if($new->notifications_type == 6){ echo 'Status changed to offer';}
													else if($new->notifications_type == 7){ echo 'Status changed to val';}
													else if($new->notifications_type == 8){ echo 'Status changed to enrolled';}
													else if($new->notifications_type == 9){ echo 'Status changed to payment processing';}
													else if($new->notifications_type == 10){ echo 'Status changed to canceled';}
													else if($new->notifications_type == 11){ echo 'Status changed to rejected';}
													?></td>
                                                         <td><a href="<?php echo site_url('admin/application/view/'.$new->users_admin_id); ?>"><?php echo $new->users_id; ?></a></td>
                                                        <td><?php echo $new->notifications_created_on?></td>
                              
										
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
            
    <script src="<?php echo base_url('assets/cp/vendors/bower_components/jquery/dist/jquery.min.js')?>"></script>
	<script src="<?php echo base_url('assets/cp/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/cp/dist/js/dataTables-data.js')?>"></script>
    <script src="<?php echo base_url('assets/cp/dist/js/jquery.slimscroll.js')?>"></script>
	<script src="<?php echo base_url('assets/cp/dist/js/dropdown-bootstrap-extended.js')?>"></script>
    
    
    
			
	