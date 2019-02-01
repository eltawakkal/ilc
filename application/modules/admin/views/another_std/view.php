<?php date_default_timezone_set('Asia/Riyadh'); ?>
<!-- Content Header (Page header) -->
<style>
.row{
	margin-bottom:10px;
}
</style>
 <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
      العميل
        <small>عرض</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin')?>/dashboard"><i class="fa fa-dashboard"></i> لوحة التحكم</a></li>
        <li><a href="<?php echo site_url('admin/clients')?>">العميل</a></li>
        <li class="active">عرض</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">عرض</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				<form method="post">
                    <div class="box-body">
                        
                        <div class="form-group">
                        	<div class="row">
                                <div class="col-md-2">
                                    <label for="gender" style="clear:both;">رقم العميل</label>
								</div>	
								<div class="col-md-4">
									<?php echo $clients->user_id?>
                                </div>
                            </div>
                        </div>
                        
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-2">
                                    <label for="gender" style="clear:both;">رقم الهاتف</label>
								</div>	
								<div class="col-md-4">
									<?php echo $clients->user_phone?>
                                </div>
                            </div>
                        </div>
               
			   			 <div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="dob" style="clear:both;">حالة العميل</label>
								</div>	
								<div class="col-md-4">	
									<?php if($clients->user_status == 1)
									{
										echo 'فعال';
									} 
									else 
									{
									    echo 'غير فعال';	
									}?>
									
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                        	<div class="row">
                                <div class="col-md-2">
                                    <label for="gender" style="clear:both;">نقاط العميل</label>
								</div>	
								<div class="col-md-4">
									<?php  foreach ($point as $new){ echo $new->point_balance; }?>
                                </div>
                            </div>
                        </div>
                        
                        
                         <div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="dob" style="clear:both;">عنوان العميل</label>
								</div>	
								<div class="col-md-4">	
									<?php $i=1;
								//echo count($count_cities); exit;
									if (count($count_cities) != 0){
									  foreach ($cities as $new){ ?>
										<?php	echo $i;?> . <?php  echo $new->city_name ;?> -  <?php echo $new->region_name ;?>  <br />
                                        
                                        <?php if ($new->location_latitude < $new->location_longitude){ ?>
                                        <a target="_blank" href="https://www.google.com/maps/dir//<?php echo $new->location_latitude ;?>,<?php echo $new->location_longitude ;?>/@<?php echo $new->location_latitude ;?>,<?php echo $new->location_longitude ;?>,16z"> موقع العميل على جوجل ماب </a>
                                        
                                       
                                       <?php }
									   		else 
											{ ?> 
                                              <a target="_blank" href="https://www.google.com/maps/dir//<?php echo $new->location_longitude ;?>,<?php echo $new->location_latitude ;?>/@<?php echo $new->location_longitude ;?>,<?php echo $new->location_latitude ;?>,16z"> موقع العميل على جوجل ماب </a>   
											<?php } ?>
                                       
                                        <br />
                                        <br />
                                            
                                             <?php $i++; }?>
                                <?php    }
                                    else {
										?> لم يتم ادخال العنوان الى الان <?php
									} ?>
									
                                </div>
                            </div>
                        </div>
					
						
                        <h3>سجل جميع الطلبات المنجزة</h3>
                        <div class="box-body table-responsive" style="margin-top:40px;">
                    <!--<table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">م</th>
                                <th>رقم الطلب</th>
                                <th width="14%">تاريخ الطلب</th>
                                <th>حالة الطلب</th>
                                <th>اسم المندوب</th>
                                <th>اسم المنتج</th>
                                <th>الكمية</th>
                                <th>سعر المنتج</th>
                                <th>سعر التوصيل</th>
                            </tr>
                        </thead>
                        
                        <?php if(isset($client_request)):?>
                        <tbody>
                            <?php $style=''; $i=1;foreach ($client_request as $new){
								
								
								
								?>
                                <tr class="gc_row" <?php echo $style; ?>>
                                    <td><?php echo $i?></td>
                                    <td><?php echo $new->request_id ?></td>
                                    <td><?php $date= strtotime($new->request_date); echo date("d/m/Y", $date);?>  - <?php
											 $date = date_create($new->request_date);
											echo   date_format($date, 'G:ia'); ?></td>
                                    <td><?php echo $new->request_status_name ?></td>
                                    <td><?php echo $new->transporter_name ?></td>
                                    <td><?php echo $new->product_name ?></td>
                                    <td><?php echo $new->product_qnty ?></td>
                                    <td><?php echo $new->product_price ?></td>
                                    <td><?php echo $new->product_delivery_price ?></td>
                                   
                                </tr>
                                <?php $i++;}?>
                                  <tr style="font-weight:bold">
                                	<td colspan="4" align="center">الاجمالي</td>
                                    <td>
										<?php $total= 0; foreach ($request_one_client as $new){
										$total_price = $new->product_price * $new->product_qnty;
									  	$total+= $total_price ;}
									   echo $total;?></td>
                                       <td>
                                       <?php $total= 0; foreach ($request_one_client as $new){
											if($new->product_cat_id == 3){
												$my_values[] = $new->product_delivery_price;
												$total=  max($my_values);
											    
											}
											else if ($new->product_cat_id == 1 || $new->product_cat_id == 2)
											{
												$my_values[] = $new->product_delivery_price_double;
												$total=  max($my_values);
											}
										}
										echo $total;
										?>
                                        </td>
                    
                                </tr>
                        </tbody>
                        <?php endif;?>
                    </table>-->
                    
                    <table  class="table table-bordered table-striped ">
                        <thead>
                            <tr>
								 <th width="5%">م</th>
                                <th>رقم الطلب</th>
                                <th width="14%">تاريخ الطلب</th>
                                <th width="9%">حالة الطلب</th>
                                <th width="20%">اسم المندوب</th>
                                <th>تفاصيل المنتجات</th>
                               <!-- <th>سعر المنتج</th>
                                <th>سعر توصيل المنتج</th>
                               <th>الاجمالي</th>-->
								
                            </tr>
                        </thead>
                       <?php if(isset($client_request)):?>
                        <tbody>
                            <?php
							$total_sum_price=0;
							$total_sum_delivary=0;
							$total_sum=0;
							 $i=1;foreach ($client_request as $new){?>
                                <tr class="gc_row">
                           			<?php $total = $new->total_price + $new->product_delivery_price ?>
                                    <td><?php echo $i; ?> </td>
                                    <td><?php echo $new->request_id; ?> </td>
                                    <td><?php $date= strtotime($new->request_date); echo date("d/m/Y", $date);?>  - <?php
											 $date = date_create($new->request_date);
											echo   date_format($date, 'G:ia'); ?></td>
                                    <td><?php echo $new->request_status_name ?></td>
                                    <td><?php echo $new->transporter_name ?></td>
								    <td> <a href="#myModal"  id="add_transporter" data-toggle="modal" data-id="<?php echo $new->request_id ?>" class="btn btn-primary " style="margin-left:5px;" ><i class="fa fa-eye"></i> عرض تفاصيل المنتجات</a>	 </td>
                                    <!--<td><?php echo $new->total_price; ?> </td>
                                    <td><?php echo $new->product_delivery_price; ?> </td>
                                    <td><?php echo $total ?> </td>-->
                                </tr>
                                 <?php 
								  $total_sum_price+=$new->total_price;
								  $total_sum_delivary+=$new->product_delivery_price;
								  $total_sum+=$total;
								  $i++;}?>
                                 <!--<tr style=" font-weight:bold">
                                 	<td colspan="6" style="text-align:center;">المجموع </td>
                                    <td><?php echo $total_sum_price ?></td>
                                    <td><?php echo $total_sum_delivary ?></td>
                                    <td><?php echo $total_sum ?></td>
                                 </tr>-->
                        </tbody>
                           <?php endif;?>
                    </table>
                    
                    
                    <br />
					<!--<div><span>المجموع الكلي لسعر المنتجات:</span>
                    <span><?php $total= 0; foreach ($client_request as $new){
									$total_price = $new->product_price * $new->product_qnty;
									  $total+= $total_price ;}
									   echo $total;?>
                   </span>
                   <br />
                   
                   <div><span>المجموع الكلي لسعر التوصيل:</span>
                    <span><?php $total= 0; foreach ($client_request as $new){
									$total_price = $new->product_delivery_price;
									  $total+= $total_price ;}
									   echo $total;?>
                   </span>
                   
                    </div>
                </div>-->				

                    </div><!-- /.box-body -->
    
                   
             <?php form_close()?>
            </div><!-- /.box -->
        </div>
     </div>
</section>  


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="اغـلاق"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">تفاصيل الطلبية</h4>
      </div>
      <div class="modal-body">
			<!--<form method="post" action="<?php echo site_url('admin/request/update_transporter') ?>" enctype="multipart/form-data">-->
					 <input type="hidden" name="request_id" id="ddd" />
					 <div class="box-body">
                        <div class="box-body table-responsive" style="margin-top:40px;" id="result5">
                    
					
					
                </div>
						
						

                    </div><!-- /.box-body -->
    
                  
            <!-- </form>-->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" style="float:left !important">اغــلاق</button>  
      </div>
    </div>
  </div>
</div>


<script src="<?php echo base_url('assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	//bootstrap WYSIHTML5 - text editor
	$(".txtarea").wysihtml5();
});

 $(function() {
    $( "#datepicker" ).pickmeup({
    format  : 'Y-m-d'
});
  });
  
  
  $(document).on('click', '#add_transporter', function(){
 	  var request_id =$(this).data('id');
	   $("#ddd").val(request_id);

  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#result5').html(ajax_load);
	//alert(vch);	  
  $.ajax({
    url: '<?php echo site_url('admin/clients/view_request_details') ?>',
    type:'POST',
    data:{request_id: request_id},
    success:function(result5){
      //alert(result);return false;
	  $('#result5').html(result5);
	  $(".chzn").chosen();
	  $('#example1').dataTable({});
	 }
  });
});
</script>


