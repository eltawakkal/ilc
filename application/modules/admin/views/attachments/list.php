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
					  <h5 class="txt-dark">Attachments</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="#">Dashboard</a></li>
						<li class="active"><span>Attachments</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>

				<div class="row">
				<div class="col-sm-12">
						<div class="alert alert-info" style="background: #d9edf7 !important;color:#31708f !important; border-color: #bce8f1 !important">
						<strong>Info</strong> You can add any additional support documents
						</div>
					</div>
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">List</h6>
								</div>
								<div class="clearfix"></div>
							</div>
                            
                            <?php // if(check_admin_role(43)==1){?>	
                             <div class="row" style="margin-bottom:10px;">
                                <div class="col-xs-12">
                                    <div class="btn-group pull-right">
                                        <a class="btn btn-primary" href="<?php echo site_url('admin/attachments/add/'); ?>"><i class="fa fa-plus"></i> Add New</a>
                                    </div>
                                </div>    
                            </div>	
							<?php // } ?>
							
							<div class="panel-wrapper collapse in">
							
								<div class="panel-body">
								
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_2"  class="table table-hover table-bordered display mb-30 dataTable" >
												<thead>
													<tr>
														<th>#</th>
														<th>Tile File</th>
                                                        <th>File</th>
														<th style="width:15%">Action</th>
													</tr>
												</thead>
                                                 <?php if(isset($attachments)):?>
                        						<tbody>
                            						<?php $i=1;foreach ($attachments as $new){?>
													<tr>
														 <td><?php echo $i?></td>
                                                         <td><?php echo $new->attachs_title?></td>
                                                         <td> <a class="btn btn-default" style="margin-left:2px;" href="<?php echo site_url('admin/attachments/download/'.$new->attachs_id); ?>" ><i class="fa fa-download"></i> <?php echo lang('download');?></a></td>
                              
										<td><?php // if(check_admin_role(45)==1){?>	
                                         <a class="btn btn-danger" style="margin-left:20px;" href="<?php echo site_url('admin/attachments/delete/'.$new->attachs_id); ?>" data-toggle="tooltip" title="Delete File" onclick="return areyousure()"><i class="icon-trash"></i> </a>
                                         
											<?php // } ?> 
                                    </td>
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
    
    
    
			
	