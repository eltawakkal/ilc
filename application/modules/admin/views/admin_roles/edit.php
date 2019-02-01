<link href="<?php echo base_url('assets/css/chosen.css')?>" rel="stylesheet" type="text/css" />
<!-- Content Header (Page header) -->
<style>
.row{
	margin-bottom:10px;
}
</style>
 <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        نوع المستخدم
        <small>تعديل</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin')?>"><i class="fa fa-dashboard"></i> لوحة التحكم</a></li>
        <li><a href="<?php echo site_url('admin/admin_role')?>"> نوع المستخدم</a></li>
        <li class="active">تعديل</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">تعديل</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				<h3 style="color:#FF0000"><?php echo validation_errors(); ?></h3>
				<?php echo form_open_multipart('admin/admin_role/edit/'.$id); ?>
                    <div class="box-body">
                        <div class="box-body">
                        <div class="form-group">
                        	<div class="row">
                                <div class="col-md-4">
                                    <label for="name" style="clear:both;"> نوع المستخدم</label>
									<input type="text" name="name" value="<?php echo $admin_role->name; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
						
						 <div class="form-group">
                        	<div class="row">
                                <div class="col-md-4">
                                    <label for="name" style="clear:both;">الوصف</label>
									<textarea name="description"class="form-control"><?php echo $admin_role->description; ?></textarea>
                                </div>
                            </div>
                        </div>
						
						
			   			
                     	
                    </div><!-- /.box-body -->
    
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">تحديث</button>
                    </div>
             <?php form_close()?>
            </div><!-- /.box -->
        </div>
     </div>
</section>  
<script src="<?php echo base_url('assets/js/chosen.jquery.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js')?>" type="text/javascript"></script>


<script src="<?php echo base_url('assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	
	$('.chzn').chosen();
	
});


$(function() {
	//bootstrap WYSIHTML5 - text editor
	$(".txtarea").wysihtml5();
});

 $(function() {
    $( "#datepicker" ).pickmeup({
    format  : 'Y-m-d'
});
  });
</script>