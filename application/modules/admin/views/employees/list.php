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
					  <h5 class="txt-dark">مستخدمي النظام</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="index.html">لوحة التحكم</a></li>
						<li class="active"><span>مستخدمي النظام</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">قائمة</h6>
								</div>
								<div class="clearfix"></div>
                               
							</div>
                              <?php if($this->session->flashdata('message')): ?>
                        
                        <div class="alert alert-success alert-dismissable">
				  			<i class="fa fa-info-circle"></i>
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-close"></i></button>
				  			<?php echo $this->session->flashdata('message'); ?>
						</div>
                
<?php endif; ?>
                            
                            <?php $ck1 = check_admin_role(38);?>
                             <?php if($ck1==1){?>  	
                             <div class="row" style="margin-bottom:10px;">
                                <div class="col-xs-12">
                                    <div class="btn-group pull-right">
                                        <a class="btn btn-primary" href="<?php echo site_url('admin/employees/add/'); ?>"><i class="fa fa-plus"></i> اضافة جديد</a>
                                    </div>
                                </div>    
                            </div>	
							<?php } ?>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_2"  class="table table-hover table-bordered display mb-30 dataTable" >
												<thead>
													<tr>
														<th>#</th>
														<th>اسم المستخدم</th>
														<th>العنوان</th>
                                                        <th>نوع المستخدم</th>
														<th>العمليات</th>
													</tr>
												</thead>
                                                 <?php if(isset($employees)):?>
                        						<tbody>
                            						<?php $i=1;foreach ($employees as $new){?>
													<tr>
														 <td><?php echo $i?></td>
                                                         <td><?php echo ucwords($new->admin_name)?></td>
                                                         <td><?php echo $new->admin_phone ?></td>
                                                         <td><?php echo $new->role ?></td>
														 <td>
                                	  <?php if(check_admin_role(39)==1){?>	
								          <a class="btn btn-primary"  href="<?php echo site_url('admin/employees/edit/'.$new->admin_id); ?>"><i class="fa fa-edit"></i></a>
                                    <?php }  if(check_admin_role(41)==1){?>
                                         <a class="btn btn-danger" style="margin-left:20px;" href="<?php echo site_url('admin/employees/delete/'.$new->admin_id); ?>" onclick="return areyousure()"><i class="icon-trash"></i> </a>
                                         
											<?php } ?> 
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
    
    
    
			
	
	
	
	
	
	