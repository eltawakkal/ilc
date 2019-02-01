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
					  <h5 class="txt-dark">Language centers</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="#">Dashboard</a></li>
						<li class="active"><span>Language centers</span></li>
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
                             <div class="row" style="margin-bottom:10px;">
                                <div class="col-xs-12">
                                    <div class="btn-group pull-right">
                                        <a class="btn btn-primary" href="<?php echo site_url('admin/lang_center/add/'); ?>"><i class="fa fa-plus"></i> Add new</a>
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
														<th style="width: 5%">#</th>
														<th>Name</th>
														<th style="width:18%">Action</th>
													</tr>
												</thead>
                                                 <?php if(isset($language)):?>
                        						<tbody>
                            						<?php $i=1;foreach ($language as $new){?>
													<tr>
														 <td><?php echo $i?></td>
                                                         <td><?php echo $new->language_center_name?></td>
                              
										<td>
                                         <a class="btn btn-primary" style="margin-left:6px;" href="<?php echo site_url('admin/lang_center/edit/'.$new->language_center_id); ?>" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i> </a>
                                         	
                                         <a class="btn btn-danger" style="margin-left:20px;" href="<?php echo site_url('admin/lang_center/delete/'.$new->language_center_id); ?>" data-toggle="tooltip" title="Delete File" onclick="return areyousure()"><i class="icon-trash"></i> </a>
                                         
											
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
    
    
    
			
	