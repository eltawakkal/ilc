<?php $CI = &get_instance(); ?>
<link href="<?php echo base_url('assets/css/datatables/dataTables.bootstrap.css')?>" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function areyousure()
{
	return confirm('Are You Sure You Want Delete This Client');
}
function areyousure_activate()
{
	return confirm('هل انت متأكد من تفعيل هذا العميل؟');
}

</script>
<section class="content-header">
        <h1>
           العملاء
            <small>قائمة</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin')?>/dashboard"><i class="fa fa-dashboard"></i> لوحة التحكم</a></li>
            <li class="active">العملاء</li>
        </ol>
</section>

<section class="content">
  	  	 <div class="row" style="margin-bottom:10px;">
            <div class="col-xs-12">
			<?php $ck1 = check_admin_role(244);?>	
                <div class="btn-group pull-right">
                  <?php if($ck1==1){?>  
					<a class="btn btn-danger" id="exp" style="margin-left:12px;" href="<?php echo site_url('admin/clients/export/'); ?>"><i class="fa fa-download"></i> تصدير لملف CSV</a>
				<?php } ?>	
					
					
                    
                
                </div>
            </div>    
        </div>	
        
  	  	<div class="row">
          <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">العملاء</h3>                                    
                </div><!-- /.box-header -->
				
                <div class="box-body table-responsive" style="margin-top:40px;">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="10%">رقم المسلسل</th>
                                <th width="10%">رقم العميل</th>
                                <th width="15%">رقم الهاتف</th>
                                <th width="15%">تاريخ التسجيل</th>
                                <th width="10%">حالة العميل</th>
								<th width="25%">العمليات</th>
                            </tr>
                        </thead>
                        
                        <?php if(isset($clients)):
							
							$status;
						?>
                        <tbody>
                            <?php $style; $i=1;foreach ($clients as $new){
								
								if($new->user_status == '1')
									{
										$status='فعال';
									}
									else 
									{
										$status='غير فعال';
									}
									?>
                                  
                                <tr class="gc_row">
                                    <td><?php echo $i?></td>
                                    <td><?php echo $new->user_id ?></td>
                                    <td><?php echo $new->user_phone ?></td>
                                     <td><?php  $date= strtotime($new->user_create_on);
									  echo date("d/m/Y", $date); ?> - <?php
									  $time = date_create($new->user_create_on);
									   echo   date_format($time, 'G:ia');?></td>
                                    <td><?php echo $status ?></td>
									
                                    <td width="31%">
                                        <div class="btn-group">
                      <?php if(check_admin_role(243)==1){?>	
					                      <a class="btn btn-default" target="_blank"  href="<?php echo site_url('admin/clients/view_client/'.$new->user_id); ?>"><i class="fa fa-eye"></i> مشاهدة التفاصيل</a>
					<?php } ?>	
                    
                    <?php if(check_admin_role(207)==1){?>	
                                         <a class="btn btn-danger"  style="margin-left:5px;" href="<?php echo site_url('admin/clients/delete/'.$new->user_id); ?>" onclick="return areyousure()"><i class="fa fa-trash"></i> حذف</a>
									 <?php } ?> 
                                     <?php if($new->user_status == '1')
									 {
										$style= "disabled"; 
									 } 
									 else 
									 {
										 $style= '';
										}?>
                                      <a class="btn btn-primary" <?php echo $style ?> style="margin-left:5px;"  onclick="return areyousure_activate()"   href="<?php echo site_url('admin/clients/activate_user/'.$new->user_id); ?>"><i class="fa fa-user" aria-hidden="true"></i>
 تفعيل المستخدم</a>				  
								 
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++;}?>
                        </tbody>
                        <?php endif;?>
                    </table>
					
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>

<script src="<?php echo base_url('assets/js/plugins/datatables/jquery.dataTables.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/datatables/dataTables.bootstrap.js')?>" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('#example1').dataTable({
	});
});

</script>