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
					  <h5 class="txt-dark">التقارير</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo site_url('admin/dashboard');?>">لوحة التحكم</a></li>
						<li class="active"><span>تقرير المدارس</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">تقرير المدارس</h6>
								</div>
								<div class="clearfix"></div>
							</div>
                            
                            
                            <div class="panel-wrapper collapse in">
								<div class="panel-body">
									
									<div  class="pills-struct mt-40">
										<ul role="tablist" class="nav nav-pills" id="myTabs_6">
											<li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_6" href="#home_6">بنين او بنات</a></li>
											<li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_6" role="tab" href="#profile_6" aria-expanded="false">نوع المدرسة</a></li>
                                            <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_7" role="tab" href="#profile_7" aria-expanded="false">عدد الطلاب الموهوبين</a></li>
                                            <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_8" role="tab" href="#profile_8" aria-expanded="false">عدد المرافق</a></li>
                                            <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_9" role="tab" href="#profile_9" aria-expanded="false">عدد المعلمين</a></li>
                                            <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_10" role="tab" href="#profile_10" aria-expanded="false">عدد المشرفين</a></li>
                                            <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_11" role="tab" href="#profile_11" aria-expanded="false">عدد الطلاب حسب النوع</a></li>
                                            <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_12" role="tab" href="#profile_12" aria-expanded="false">عدد الفصول</a></li>
                                            
											
										</ul>
                                        <br />
										<div class="tab-content" id="myTabContent_6">
											<div  id="home_6" class="tab-pane fade active in" role="tabpanel">
												
                                               <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10 text-left">من تاريخ</label>
                                                            <div class='input-group date' id='datetimepicker01'>
                                                                <input type='text' class="form-control" id="from_date_gender" />
                                                                <span class="input-group-addon">
                                                                    <span class="fa fa-calendar"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10 text-left">الى تاريخ</label>
                                                            <div class='input-group date' id='datetimepicker02'>
                                                                <input type='text' class="form-control"  id="to_date_gender"  />
                                                                <span class="input-group-addon">
                                                                    <span class="fa fa-calendar"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                                      <label class="control-label mb-10">بنين أو بنات</label>
                                                                        <select class="form-control" name="schools_gender" id="schools_gender">
                                                                        <option value="-1">- اختر بنين أو بنات -</option>
                                                                        <?php foreach($gender as $new) {
                                                                                $sel = "";
                                                                                echo '<option value="'.$new->gender_id.'" '.$sel.'>'.$new->gender_name.'</option>';
                                                                                }
                                                                            
                                                                              ?>    
                                                                     </select>
                                                                  </div>
						      					</div>
                                                <div class="row">
                                                	 <div class="col-sm-3">
                                                	    <a  id="btn_gender" class="btn  btn-primary"><i class="fa fa-filter"></i> فلترة</a>
                                                        </div>
                                                </div>
                                                <br />
							                   <div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive" id="res">
											
										</div>
									</div>
								</div>
							</div>
                            
											</div>
											<div  id="profile_6" class="tab-pane fade" role="tabpanel">
                                             <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10 text-left">من تاريخ</label>
                                                        <div class='input-group date' id='datetimepicker03'>
                                                            <input type='text' class="form-control" id="from_date_type" />
                                                            <span class="input-group-addon">
                                                                <span class="fa fa-calendar"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10 text-left">الى تاريخ</label>
                                                        <div class='input-group date' id='datetimepicker04'>
                                                            <input type='text' class="form-control" id="to_date_type"  />
                                                            <span class="input-group-addon">
                                                                <span class="fa fa-calendar"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                                     <label class="control-label mb-10">نوع المدرسة</label>
                                                                      <select class="form-control" name="schools_type" id="schools_type">
                                                                        <option>- اختر نوع المدرسة -</option>
                                                                         <?php foreach($schools_type as $new) {
                                                                            $sel = "";
                                                                            echo '<option value="'.$new->school_type_id.'" '.$sel.'>'.$new->school_type_name.'</option>';
                                                                            }
                                                                        
                                                                          ?>               
                                                                      </select>
                                                                </div>
                                                                
                                        </div>
                                             <div class="row">
                                                	 <div class="col-sm-3">
                                                	    <a  id="btn_type" class="btn  btn-primary"><i class="fa fa-filter"></i> فلترة</a>
                                                        </div>
                                                </div>
                                                <br />
							                 <div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive" id="res_type">
											
										</div>
									</div>
								</div>
							</div>
                                               
											</div>
                                            
                                            <div  id="profile_7" class="tab-pane fade" role="tabpanel">
											   <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10 text-left">من تاريخ</label>
                                                        <div class='input-group date' id='datetimepicker05'>
                                                            <input type='text' class="form-control" id="from_date_school" />
                                                            <span class="input-group-addon">
                                                                <span class="fa fa-calendar"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10 text-left">الى تاريخ</label>
                                                        <div class='input-group date' id='datetimepicker06'>
                                                            <input type='text' class="form-control" id="to_date_school"  />
                                                            <span class="input-group-addon">
                                                                <span class="fa fa-calendar"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                                     <label class="control-label mb-10">المدرسة</label>
                                                                      <select class="form-control" name="schools" id="school">
                                                                        <option value="">- اختر المدرسة -</option>
                                                                         <?php foreach($schools as $new) {
                                                                            $sel = "";
                                                                            echo '<option value="'.$new->schools_guid.'" '.$sel.'>'.$new->schools_name.'</option>';
                                                                            }
                                                                        
                                                                          ?>               
                                                                      </select>
                                                                </div>
                                                                
                                              </div>
                                               <div class="row">
                                                	 <div class="col-sm-3">
                                                	    <a  id="btn_school" class="btn  btn-primary"><i class="fa fa-filter"></i> فلترة</a>
                                                        </div>
                                                </div>
                                                <br />
							                   <div class="panel-wrapper collapse in">
                                                    <div class="panel-body">
                                                        <div class="table-wrap">
                                                            <div class="table-responsive" id="res_school">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
												</div>
											</div>
                                            
                                            <div  id="profile_8" class="tab-pane fade" role="tabpanel">
											    <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10 text-left">من تاريخ</label>
                                                        <div class='input-group date' id='datetimepicker07'>
                                                            <input type='text' class="form-control" id="from_date_fac" />
                                                            <span class="input-group-addon">
                                                                <span class="fa fa-calendar"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10 text-left">الى تاريخ</label>
                                                        <div class='input-group date' id='datetimepicker08'>
                                                            <input type='text' class="form-control" id="to_date_fac"  />
                                                            <span class="input-group-addon">
                                                                <span class="fa fa-calendar"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                                     <label class="control-label mb-10">المدرسة</label>
                                                                      <select class="form-control" name="school_fac" id="school_fac">
                                                                        <option value="">- اختر المدرسة -</option>
                                                                         <?php foreach($schools as $new) {
                                                                            $sel = "";
                                                                            echo '<option value="'.$new->schools_guid.'" '.$sel.'>'.$new->schools_name.'</option>';
                                                                            }
                                                                        
                                                                          ?>               
                                                                      </select>
                                                                </div>
                                                                
                                              </div>
                                                <div class="row">
                                                	 <div class="col-sm-3">
                                                	    <a  id="btn_fac" class="btn  btn-primary"><i class="fa fa-filter"></i> فلترة</a>
                                                        </div>
                                                </div>
                                                <br />
							                   <div class="panel-wrapper collapse in">
                                                    <div class="panel-body">
                                                        <div class="table-wrap">
                                                            <div class="table-responsive" id="res_fac">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
												</div>
											</div>
                                            
                                            <div  id="profile_9" class="tab-pane fade" role="tabpanel">
											    <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10 text-left">من تاريخ</label>
                                                        <div class='input-group date' id='datetimepicker09'>
                                                            <input type='text' class="form-control" id="from_date_teacher" />
                                                            <span class="input-group-addon">
                                                                <span class="fa fa-calendar"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10 text-left">الى تاريخ</label>
                                                        <div class='input-group date' id='datetimepicker10'>
                                                            <input type='text' class="form-control" id="to_date_teacher"  />
                                                            <span class="input-group-addon">
                                                                <span class="fa fa-calendar"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                                     <label class="control-label mb-10">المدرسة</label>
                                                                      <select class="form-control" name="school_teacher" id="school_teacher">
                                                                        <option value="">- اختر المدرسة -</option>
                                                                         <?php foreach($schools as $new) {
                                                                            $sel = "";
                                                                            echo '<option value="'.$new->schools_guid.'" '.$sel.'>'.$new->schools_name.'</option>';
                                                                            }
                                                                        
                                                                          ?>               
                                                                      </select>
                                                                </div>
                                                                
                                              </div>
                                                <div class="row">
                                                	 <div class="col-sm-3">
                                                	    <a  id="btn_teacher" class="btn  btn-primary"><i class="fa fa-filter"></i> فلترة</a>
                                                        </div>
                                                </div>
                                                <br />
							                   <div class="panel-wrapper collapse in">
                                                    <div class="panel-body">
                                                        <div class="table-wrap">
                                                            <div class="table-responsive" id="res_teacher">

                                                                
                                                            </div>
                                                        </div>
                                                    </div>
												</div>
											</div>
                                            
                                            <div  id="profile_10" class="tab-pane fade" role="tabpanel">
											    <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10 text-left">من تاريخ</label>
                                                        <div class='input-group date' id='datetimepicker15'>
                                                            <input type='text' class="form-control" id="from_date_supervisor" />
                                                            <span class="input-group-addon">
                                                                <span class="fa fa-calendar"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10 text-left">الى تاريخ</label>
                                                        <div class='input-group date' id='datetimepicker16'>
                                                            <input type='text' class="form-control" id="to_date_supervisor"  />
                                                            <span class="input-group-addon">
                                                                <span class="fa fa-calendar"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                                     <label class="control-label mb-10">المدرسة</label>
                                                                      <select class="form-control" name="school_supervisor" id="school_supervisor">
                                                                        <option value="">- اختر المدرسة -</option>
                                                                         <?php foreach($schools as $new) {
                                                                            $sel = "";
                                                                            echo '<option value="'.$new->schools_guid.'" '.$sel.'>'.$new->schools_name.'</option>';
                                                                            }
                                                                        
                                                                          ?>               
                                                                      </select>
                                                                </div>
                                                                
                                              </div>
                                                <div class="row">
                                                	 <div class="col-sm-3">
                                                	    <a  id="btn_supervisor" class="btn  btn-primary"><i class="fa fa-filter"></i> فلترة</a>
                                                        </div>
                                                </div>
                                                <br />
							                   <div class="panel-wrapper collapse in">
                                                    <div class="panel-body">
                                                        <div class="table-wrap">
                                                            <div class="table-responsive" id="res_supervisor">

                                                                
                                                            </div>
                                                        </div>
                                                    </div>
												</div>
											</div>
                                            
                                            <div  id="profile_11" class="tab-pane fade" role="tabpanel">
											    <div class="row">
                                                <div class="col-sm-3">
                                                                     <label class="control-label mb-10">نوع المدرسة</label>
                                                                      <select class="form-control" name="schools_type_count" id="schools_type_count">
                                                                        <option value="">- اختر نوع المدرسة -</option>
                                                                         <?php foreach($schools_type as $new) {
                                                                            $sel = "";
                                                                            echo '<option value="'.$new->school_type_id.'" '.$sel.'>'.$new->school_type_name.'</option>';
                                                                            }
                                                                        
                                                                          ?>               
                                                                      </select>
                                                                </div>
                                                
                                                <div class="col-sm-3">
                                                                     <label class="control-label mb-10">المدرسة</label>
                                                                      <select class="form-control" name="school_ty" id="school_ty">
                                                                        <option value="">- اختر المدرسة -</option>
                                                                         <?php foreach($schools as $new) {
                                                                            $sel = "";
                                                                            echo '<option value="'.$new->schools_guid.'" '.$sel.'>'.$new->schools_name.'</option>';
                                                                            }
                                                                        
                                                                          ?>               
                                                                      </select>
                                                                </div>
                                                                
                                              </div>
                                                <div class="row">
                                                	 <div class="col-sm-3">
                                                	    <a  id="btn_count_student_type" class="btn  btn-primary"><i class="fa fa-filter"></i> فلترة</a>
                                                        </div>
                                                </div>
                                                <br />
							                   <div class="panel-wrapper collapse in">
                                                    <div class="panel-body">
                                                        <div class="table-wrap">
                                                            <div class="table-responsive" id="count_student_type">

                                                                
                                                            </div>
                                                        </div>
                                                    </div>
												</div>
											</div>
                                            
                                            <div  id="profile_12" class="tab-pane fade" role="tabpanel">
											    <div class="row">
                                                
                                                
                                                <div class="col-sm-3">
                                                                     <label class="control-label mb-10">المدرسة</label>
                                                                      <select class="form-control" name="school_class" id="school_class">
                                                                        <option value="">- اختر المدرسة -</option>
                                                                         <?php foreach($schools as $new) {
                                                                            $sel = "";
                                                                            echo '<option value="'.$new->schools_guid.'" '.$sel.'>'.$new->schools_name.'</option>';
                                                                            }
                                                                        
                                                                          ?>               
                                                                      </select>
                                                                </div>
                                                                
                                              </div>
                                                <div class="row">
                                                	 <div class="col-sm-3">
                                                	    <a  id="btn_class" class="btn  btn-primary"><i class="fa fa-filter"></i> فلترة</a>
                                                        </div>
                                                </div>
                                                <br />
							                   <div class="panel-wrapper collapse in">
                                                    <div class="panel-body">
                                                        <div class="table-wrap">
                                                            <div class="table-responsive" id="count_class">

                                                                
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
				</div>
			</div>
            
    <script src="<?php echo base_url('assets/cp/vendors/bower_components/jquery/dist/jquery.min.js')?>"></script>
	<script src="<?php echo base_url('assets/cp/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/cp/dist/js/dataTables-data.js')?>"></script>
    <script src="<?php echo base_url('assets/cp/dist/js/jquery.slimscroll.js')?>"></script>
	<script src="<?php echo base_url('assets/cp/dist/js/dropdown-bootstrap-extended.js')?>"></script>
     <script src="<?php echo base_url('assets/cp/dist/js/form-picker-data.js')?>"></script>  
    
    
    
<script type="text/javascript">
$(document).on('click', '#btn_gender', function(){
 //alert(12);
 	schools_gender = $('#schools_gender').val();
	from_date_gender = $('#from_date_gender').val();
	to_date_gender = $('#to_date_gender').val();
  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#res').html(ajax_load);
	  
  $.ajax({
    url: '<?php echo site_url('admin/reports/get_reports_gender') ?>',
    type:'POST',
    data:{schools_gender   : schools_gender,
		  from_date_gender : from_date_gender,
		  to_date_gender   : to_date_gender},
    success:function(res){
	  $('#res').html(res);
	 }
  });
});	


$(document).on('click', '#btn_type', function(){
 //alert(12);
 	schools_type = $('#schools_type').val();
	from_date_type = $('#from_date_type').val();
	to_date_type = $('#to_date_type').val();
  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#res_type').html(ajax_load);
	  
  $.ajax({
    url: '<?php echo site_url('admin/reports/get_reports_type') ?>',
    type:'POST',
    data:{schools_type   : schools_type,
		  from_date_type : from_date_type,
		  to_date_type   : to_date_type},
    success:function(res_type){
	  $('#res_type').html(res_type);
	 }
  });
});	


$(document).on('click', '#btn_school', function(){
 //alert(12);
 	school = $('#school').val();
	from_date_school = $('#from_date_school').val();
	to_date_school = $('#to_date_school').val();
  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#res_school').html(ajax_load);
	  
  $.ajax({
    url: '<?php echo site_url('admin/reports/get_reports_std_gifted') ?>',
    type:'POST',
    data:{school           : school,
		  from_date_school : from_date_school,
		  to_date_school   : to_date_school},
    success:function(res_school){
	  $('#res_school').html(res_school);
	 }
  });
});	

$(document).on('click', '#btn_fac', function(){
 //alert(12);
 	school_fac = $('#school_fac').val();
	from_date_fac = $('#from_date_fac').val();
	to_date_fac = $('#to_date_fac').val();
  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#res_fac').html(ajax_load);
	  
  $.ajax({
    url: '<?php echo site_url('admin/reports/get_reports_facilities') ?>',
    type:'POST',
    data:{school_fac       : school_fac,
		  from_date_fac    : from_date_fac,
		  to_date_fac      : to_date_fac},
    success:function(res_fac){
	  $('#res_fac').html(res_fac);
	 }
  });
});	


$(document).on('click', '#btn_teacher', function(){
 //alert(12);
 	school_teacher = $('#school_teacher').val();
	from_date_teacher = $('#from_date_teacher').val();
	to_date_teacher = $('#to_date_teacher').val();
  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#res_teacher').html(ajax_load);
	  
  $.ajax({
    url: '<?php echo site_url('admin/reports/get_reports_teacher') ?>',
    type:'POST',
    data:{school_teacher       : school_teacher,
		  from_date_teacher    : from_date_teacher,
		  to_date_teacher      : to_date_teacher},
    success:function(res_teacher){
	  $('#res_teacher').html(res_teacher);
	 }
  });
});	


$(document).on('click', '#btn_supervisor', function(){
 //alert(12);
 	school_supervisor = $('#school_supervisor').val();
	from_date_supervisor = $('#from_date_supervisor').val();
	to_date_supervisor = $('#to_date_supervisor').val();
  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#res_supervisor').html(ajax_load);
	  
  $.ajax({
    url: '<?php echo site_url('admin/reports/get_reports_supervisor') ?>',
    type:'POST',
    data:{school_supervisor       : school_supervisor,
		  from_date_supervisor    : from_date_supervisor,
		  to_date_supervisor      : to_date_supervisor},
    success:function(res_supervisor){
	  $('#res_supervisor').html(res_supervisor);
	 }
  });
});	


$(document).on('click', '#btn_count_student_type', function(){
 //alert(12);
 	schools_type_count = $('#schools_type_count').val();
	school_ty = $('#school_ty').val();
  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#count_student_type').html(ajax_load);
	  
  $.ajax({
    url: '<?php echo site_url('admin/reports/get_count_student_type') ?>',
    type:'POST',
    data:{school_ty                : school_ty,
		  schools_type_count       : schools_type_count
		  },
    success:function(count_student_type){
	  $('#count_student_type').html(count_student_type);
	 }
  });
});	


$(document).on('click', '#btn_class', function(){
 //alert(12);
 	school_class = $('#school_class').val();
  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#count_class').html(ajax_load);
	  
  $.ajax({
    url: '<?php echo site_url('admin/reports/get_count_student_class') ?>',
    type:'POST',
    data:{school_class                : school_class
		  },
    success:function(count_class){
	  $('#count_class').html(count_class);
	 }
  });
});

</script> 			
	
	
	
	
	
	