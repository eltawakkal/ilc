<div class="wrapper theme-1-active pimary-color-red">
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
										<h6 class="panel-title txt-dark">تعديل</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
                          <?php  if(validation_errors()){ ?>
						<div class="alert alert-danger alert-dismissable">
				  			<i class="fa fa-ban"></i>
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-close"></i></button>
				  			<b><?php echo lang('alert');?>!</b><?php echo validation_errors(); ?>
						</div>
				
						<?php  } ?>
				  <div class="col-sm-12 col-xs-12">
					 <div class="form-wrap">
                        <form method="post" enctype="multipart/form-data" class="form-horizontal">
								 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-2 control-label">الاسم كاملا</label>
									 <div class="col-sm-4">
									 <input class="form-control" name="admin_name" placeholder="الاسم كاملا" type="text" value="<?php echo $employees->admin_name?>">
									 </div>
								 </div>
								 <div class="form-group">
									 <label for="exampleInputEmail_4" class="col-sm-2 control-label">نوع المستخدم</label>
									 <div class="col-sm-4">
									<select name="admin_role" class="form-control chzn" id="admin_role_id" onchange="change_user();">
										<option value="">--اختر نوع المستخدم---</option>
										<?php foreach($roles as $new) {
											$sel = "";
											if($new->id==$employees->admin_role) $sel='selected="selected"';
											echo '<option value="'.$new->id.'" '.$sel.'>'.$new->name.'</option>';
										}
										
										?>
									</select>
									 </div>
								 </div>
                                 
                                 <div class="form-group" id="servie">
									 <label for="exampleInputEmail_4" class="col-sm-2 control-label">الخدمة</label>
									 <div class="col-sm-4">
									<select name="admin_services_id"  class="form-control chzn" id="admin_services_id" >
										<option value="">--اختر الخدمة---</option>
										<?php foreach($services as $new) {
											$sel = "";
											if($new->services_id==$employees->admin_services_id) $sel='selected="selected"';
											echo '<option value="'.$new->services_id.'" '.$sel.'>'.$new->services_name.'</option>';
										}
										
										?>
									</select>
									 </div>
								 </div>
                                 
                                 <div class="form-group" id="school" style="display:none">
									 <label for="exampleInputEmail_4" class="col-sm-2 control-label">المدرسة</label>
									 <div class="col-sm-4">
                                      <input class="form-control" id="admin_role"  type="hidden" value="<?php echo $employees->admin_role?>">
                                     
									<select name="admin_school_id" id="admin_school_id" class="form-control chzn" >
										<option value="">--اختر المدرسة---</option>
                                        <?php foreach($schools as $new) {
											$sel = "";
											if($new->schools_guid==$employees->admin_school_id) $sel='selected="selected"';
											echo '<option value="'.$new->schools_guid.'" '.$sel.'>'.$new->schools_name.'</option>';
										}
										?>
									</select>
									 </div>
								 </div>
                                 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-2 control-label">البريد الالكتروني</label>
									 <div class="col-sm-4">
									 <input class="form-control" name="admin_email" placeholder="البريد الالكتروني" type="text" value="<?php echo $employees->admin_email?>">
									 </div>
								 </div>
                                 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-2 control-label">اسم المستخدم</label>
									 <div class="col-sm-4">
									 <input class="form-control" name="admin_username" placeholder="اسم المستخدم" type="text" value="<?php echo $employees->admin_username?>">
									 </div>
								 </div>
                                 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-2 control-label">كلمة المرور</label>
									 <div class="col-sm-4">
									 <input class="form-control" name="admin_password" placeholder="كلمة المرور" type="password">
									 </div>
								 </div>
                                 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-2 control-label">تأكيد كلمة المرور</label>
									 <div class="col-sm-4">
									 <input class="form-control" name="admin_confirm" placeholder="تأكيد كلمة المرور" type="password">
									 </div>
								 </div>
                                 <div class="form-group">
									 <label for="exampleInputuname_4" class="col-sm-2 control-label">الهاتف</label>
									 <div class="col-sm-4">
									 <input class="form-control" name="admin_phone" placeholder="الهاتف" type="text" value="<?php echo $employees->admin_phone?>">
									 </div>
								 </div>				
								 <div class="form-group mb-0">
									 <div class="col-sm-offset-3 col-sm-9">
										 <button type="submit" class="btn btn-info ">تحديث</button>
									 </div>
							    </div>
                         </form>
							 </div>
						 </div>
					 </div>
				  </div>
				 </div>
			 </div>
		 </div>
	</div>
						
 </div>	
					
 </div>
  </div>


<script src="<?php echo base_url('assets/cp/vendors/bower_components/jquery/dist/jquery.min.js')?>"></script>

<script type="text/javascript">
	$( document ).ready(function() {
		var admin_role= $('#admin_role').val();
		if(admin_role == 10 || role_id == 11 || role_id == 12)
		{
			$('#school').show();
			$('#servie').hide();
			
			
		}
		else 
		{
		    $('#school').hide();
		}
		
		if(admin_role == 9) 
		{
			$('#servie').hide();
			$('#school').hide();
		}
		
	});

	
	function change_user()
	{
		
		
		var role_id= $('#admin_role_id').val();
		
		
		if(role_id == 10 || role_id == 11 || role_id == 12)
		{
			$('#school').show();
			$('#servie').hide();
			
			
		}
		else 
		{
		    $('#school').hide();
		}
		
		if(role_id == 8)
		{
			$('#servie').show();
			
			
		}
		else 
		{
		    $('#servie').hide();
		}
		
		
	} 
</script>
