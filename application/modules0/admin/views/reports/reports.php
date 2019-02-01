<?php $CI = &get_instance(); ?>
<link href="<?php echo base_url('assets/css/datatables/dataTables.bootstrap.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/css/jquery.datetimepicker.css')?>" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function areyousure()
{
	return confirm('Are You Sure You Want Delete This Client');
}
</script>
<section class="content-header">
        <h1>
          تقرير ملخص الطلبيات
            <small><?php echo lang('list')?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin')?>"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard')?></a></li>
            <li class="active">تقرير ملخص الطلبيات</li>
        </ol>
</section>

<section class="content">
  	  	 	
        
        
        
        <div class="row" style="margin-bottom:10px;">
            <div class="col-xs-12">
                <div class="">
                <?php if(check_admin_role(200)==1 ){ ?>
                    <div class="col-xs-3">
						<select name="filter" id="del_id" class="form-control chzn">
							<option>--بحث من خلال اسم المندوب--</option>
										<?php foreach($del_name as $new) {
											$sel = "";
											echo '<option value="'.$new->id.'" '.$sel.'>'.$new->name.'</option>';
										    }
										
										?>
						</select>
					</div>
					 <?php } ?>
					<div class="col-xs-2">
						<input type="text" name="date1" id="date1" class="form-control datepicker" placeholder="تاريخ الطلبية" />
					</div>

					
					<div class="col-xs-3">
						<a class="btn btn-primary" style="margin-left:12px;" id="btn_search"> بحث</a>
					</div>
					
                </div>
            </div>    
        </div>
        
        
        
  	  	<div class="row">
          <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">تقرير ملخص الطلبيات</h3>                                    
                </div><!-- /.box-header -->
				
                <div class="box-body table-responsive" style="margin-top:40px;" id="result">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                 <th>مجموع اسعار الخدمات</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr class="gc_row">
                                 <td><?php echo $get_sum_food->price0 + $get_sum_kitchen->price;?></td>
                                </tr>
                        </tbody>
                       
                    </table>
					
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>

<script src="<?php echo base_url('assets/js/chosen.jquery.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/datatables/jquery.dataTables.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/datatables/dataTables.bootstrap.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/jquery.datetimepicker.js')?>" type="text/javascript"></script>

<script type="text/javascript">
$(function() {
	$('#example1').dataTable({
	});
});

  jQuery('.datepicker').datetimepicker({
 lang:'en',
 i18n:{
  de:{
   months:[
    'Januar','Februar','März','April',
    'Mai','Juni','Juli','August',
    'September','Oktober','November','Dezember',
   ],
   dayOfWeek:[
    "So.", "Mo", "Di", "Mi", 
    "Do", "Fr", "Sa.",
   ]
  }
 },
 timepicker:false,
 format:'Y-m-d'
});



/*$(document).on('change', '#del_id', function(){
 //alert(12);
 	vch = $(this).val();
  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#result').html(ajax_load);
	  
  $.ajax({
    url: '<?php echo site_url('admin/reports/get_sum_by_user_id') ?>',
    type:'POST',
    data:{id:vch},
    success:function(result){
      //alert(result);return false;
	  $('#result').html(result);
	  $(".chzn").chosen();
	  $('#example1').dataTable({});
	 }
  });
});*/

/*
$(document).on('change', '#date1', function(){
 //alert(12);
 	vch = $(this).val();
  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#result').html(ajax_load);
	//alert(vch);	  
  $.ajax({
    url: '<?php echo site_url('admin/cases/get_case_by_case_filing_date') ?>',
    type:'POST',
    data:{id:vch},
    success:function(result){
      //alert(result);return false;
	  $('#result').html(result);
	  $(".chzn").chosen();
	  $('#example1').dataTable({});
	 }
  });
});*/





$(document).on('click', '#btn_search', function(){
 //alert(12);
    vch = $('#del_id').val();
	vch1= $('#date1').val();

	
  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#result').html(ajax_load);
	  
  $.ajax({
    url: '<?php echo site_url('admin/reports/get_sum_by_user_id') ?>',
    type:'POST',
    data:{id:vch,idd:vch1},
    success:function(result){
      //alert(result);return false;
	  $('#result').html(result);
	  $(".chzn").chosen();
	  $('#example1').dataTable({});
	 }
  });
});
/*
$(document).on('click', '#btn_search', function(){
 //alert(12);
 	vch = $('#destination_id').val();
	vch1= $('#order_status_id').val();

  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#result').html(ajax_load);
	  
  $.ajax({
    url: '<?php echo site_url('admin/order_restaurants/get_order_restaurants_by_two') ?>',
    type:'POST',
    data:{id:vch,idd:vch1},
    success:function(result){
      //alert(result);return false;
	  $('#result').html(result);
	  $(".chzn").chosen();
	  $('#example1').dataTable({});
	 }
  });
});


$(document).on('change', '#del_name', function(){
 //alert(12);
 	vch = $(this).val();
  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#result').html(ajax_load);
	  
  $.ajax({
    url: '<?php echo site_url('admin/order_restaurants/get_order_supply_by_name') ?>',
    type:'POST',
    data:{id:vch},
    success:function(result){
      //alert(result);return false;
	  $('#result').html(result);
	  $(".chzn").chosen();
	  $('#example1').dataTable({});
	 }
  });
});
*/
</script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>