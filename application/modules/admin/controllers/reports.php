 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reports extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$CI->auth->check_access('1', true);
		$CI = get_instance();
		$CI->load->model("reports_model");
		$CI->load->model("schools_model");
		
	}
	
	
	function schools(){
		$CI = get_instance();
		
		$data['gender'] = $CI->schools_model->get_gender();
		$data['schools_type'] = $CI->schools_model->get_schools_type();
		$data['schools'] = $CI->reports_model->get_schools();

		$data['page_title'] = lang('reports');
		$data['body'] = 'reports/schools';
		$CI->load->view('template/main', $data);	

	}	
	
	function get_reports_gender(){
		$CI = get_instance();
		$reports_gender = $CI->reports_model->get_reports_gender($_POST['schools_gender'], $_POST['from_date_gender'], $_POST['to_date_gender']);
				
				 
		echo '
		   <table class="table table-hover table-bordered display mb-30 dataTable" >
												<thead>
													<tr>
														<th>#</th>
														<th>شعار المدرسة</th>
                                                        <th>اسم المدرسة</th>
														<th width="25%">العمليات</th>
													</tr>
												</thead>';
												
                                                if(isset($reports_gender)):
                        						echo '<tbody>';
                            						$i=1;foreach ($reports_gender as $new){
												echo '<tr>
														 <td>'.$i.'</td>
                                                         <td>'; if(!empty($new->schools_logo)){
																 
																	echo ' <img src="'.base_url('assets/uploads/images/'.$new->schools_logo).'" height="90" width="110" />';  } 	echo '</td>
                                                         <td>'. $new->schools_name .'</td>
                                                         <td>';  
														  if(check_admin_role(271)==1){
                                       echo '  <a class="btn btn-primary"  data-toggle="tooltip" title="اطلع على بروفايل المدرسة"   href="'.site_url('admin/schools/view_school/'.$new->schools_guid).'"><i class="fa fa-eye" style="font-size:22px"></i> بروفايل المدرسة</a>';  } 
                                      
                                             if(check_admin_role(274)==1){
                                        echo ' <a class="btn btn-danger"  data-toggle="tooltip" title="حذف المدرسة"  href="'. site_url('admin/schools/delete/'.$new->schools_guid).'" onclick="return areyousure()"><i class="icon-trash"  style="font-size:22px !important; padding-top:3px !important"></i> </a>';
                                         
											 } 
                                            
                                   echo '  </td>
                                </tr>';
                               $i++;}
							 echo ' <tr style="font-weight:bold"> <td colspan="2"> المجموع </td><td  colspan="2">'. count($reports_gender)  .'</td> </tr> 
                          </tbody>';
                        endif;
                  echo '  </table>';
					
		
	}
	
	
	function get_reports_type(){
		$CI = get_instance();
		$reports_type = $CI->reports_model->get_reports_type($_POST['schools_type'], $_POST['from_date_type'], $_POST['to_date_type']);
				
				 
		echo '
		   <table class="table table-hover table-bordered display mb-30 dataTable" >
												<thead>
													<tr>
														<th>#</th>
														<th>شعار المدرسة</th>
                                                        <th>اسم المدرسة</th>
														<th width="25%">العمليات</th>
													</tr>
												</thead>';
												
                                                if(isset($reports_type)):
                        						echo '<tbody>';
                            						$i=1;foreach ($reports_type as $new){
												echo '<tr>
														 <td>'.$i.'</td>
                                                         <td>'; if(!empty($new->schools_logo)){
																 
																	echo ' <img src="'.base_url('assets/uploads/images/'.$new->schools_logo).'" height="90" width="110" />';  } 	echo '</td>
                                                         <td>'. $new->schools_name .'</td>
                                                         <td>';  
														  if(check_admin_role(271)==1){
                                       echo '  <a class="btn btn-primary"  data-toggle="tooltip" title="اطلع على بروفايل المدرسة"   href="'.site_url('admin/schools/view_school/'.$new->schools_guid).'"><i class="fa fa-eye" style="font-size:22px"></i> بروفايل المدرسة</a>';  } 
                                      
                                             if(check_admin_role(274)==1){
                                        echo ' <a class="btn btn-danger"  data-toggle="tooltip" title="حذف المدرسة"  href="'. site_url('admin/schools/delete/'.$new->schools_guid).'" onclick="return areyousure()"><i class="icon-trash"  style="font-size:22px !important; padding-top:3px !important"></i> </a>';
                                         
											 } 
                                            
                                   echo '  </td>
                                </tr>';
                               $i++;}
							 echo ' <tr style="font-weight:bold"> <td colspan="2"> المجموع </td><td  colspan="2">'. count($reports_type)  .'</td> </tr> 
                          </tbody>';
                        endif;
                  echo '  </table>';
					
		
	}
	
	
	
	function get_reports_std_gifted(){
		$CI = get_instance();
		$std_gifted = $CI->reports_model->get_reports_std_gifted($_POST['school'], $_POST['from_date_school'], $_POST['to_date_school']);
				
				 
		echo '
		   <table class="table table-hover table-bordered display mb-30 dataTable" >
												<thead>
													<tr>
														<th>#</th>
														<th>اسم الطالب</th>
                                                        <th>السجل المدني</th>
                                                        <th>تايرخ الميلاد</th>
                                                        <th>رقم الجوال</th>
														<th>العنوان</th>
														<th width="30%">العمليات</th>
													</tr>
												</thead>';
												
                                                 if(isset($std_gifted)):
                        					echo '	<tbody>';
                            						$i=1;foreach ($std_gifted as $new){
													echo '<tr>
														 <td>'. $i.'</td>
                                                         <td>'. $new->students_gifted_name .'</td>
                                                         <td>'. $new->students_gifted_ssn .'</td>
                                                         <td>'. $new->students_gifted_dob .'</td>
                                                         <td>'. $new->students_gifted_jawwal.'</td>
                                                         <td>'. $new->students_gifted_address .'</td>
                                                         
														 <td>';
                                	 if(check_admin_role(271)==1){
                                   echo' <a class="btn btn-success" href="" id="get_student_info"  data-toggle="modal" data-target=".bs-example-modal-lv01"  data-id="'. $new->students_gifted_guid .'"><i class="fa fa-eye "></i> </a>';
                                    
                                         
											 } 
                                    if(check_admin_role(333)==1){
                                    
                                   echo'  <a class="btn  btn-primary"  data-toggle="tooltip" title="ملف الطالب"  href="'.site_url('admin/student_gift/technical/'.$new->students_gifted_guid).'" ><i class="fa fa-folder-open " ></i> ملف الطالب</a>';
                                     
                							  
                                            }  if(check_admin_role(334)==1){
                                        echo' <a class="btn btn-danger"  data-toggle="tooltip" title="حذف الطالب"  href="'.site_url('admin/student_gift/delete/'.$new->students_gifted_guid).'" onclick="return areyousure()"><i class="icon-trash" style="font-size:17px !important; padding-top:3px !important"></i> </a>';
                                            } 
    
                                    echo'</td>
                                </tr>';
                                $i++;}
		  echo ' <tr style="font-weight:bold"> <td colspan="2"> المجموع </td><td  colspan="2">'. count($std_gifted)  .'</td> </tr> ';

                       echo' </tbody>';
                        endif;
                   echo' </table>';
					
		
	}
	
	
		function get_reports_facilities(){
		$CI = get_instance();
		$reports_facilities = $CI->reports_model->get_reports_facilities($_POST['school_fac'], $_POST['from_date_fac'], $_POST['to_date_fac']);
				
				 
		echo '
		  <table id="datable_2" class="table table-hover table-bordered display mb-30 dataTable" >
								<thead>
									<tr>
										<th>#</th>
										<th>اسم المرفق</th>
										<th>العدد</th>
										<th width="15%">العمليات</th>
									</tr>
								</thead>';
								
								 if(isset($reports_facilities)):
								echo'<tbody>';
									 $i=1;foreach ($reports_facilities as $new){
									echo'<tr>
										 <td>'.$i.'</td>
										 <td>'.$new->school_facilities_name .'</td>
										 <td>'.$new->school_facilities_number .'</td>
											
										 <td>';
					   if(check_admin_role(286)==1){
						 echo' <a class="btn btn-default"  data-toggle="tooltip" title="عرض وتعديل بيانات المرفق" href="'.site_url('admin/schools/facilities_edit/'.$new->school_facilities_guid).'"><i class="fa fa-eye" style="font-size:21px"></i></a>';
					}  
					
					 if(check_admin_role(288)==1){	
						 echo' <a class="btn btn-danger"  data-toggle="tooltip" title="حذف المرفق"   href="'.site_url('admin/schools/facilities_delete/'.$new->school_facilities_guid).'" onclick="return areyousure()"><i class="icon-trash" style="font-size:21px"></i></a>';
					 }  
						 
							
					echo'</td>
				</tr>';
				 $i++; }
		 echo ' <tr style="font-weight:bold"> <td colspan="2"> المجموع </td><td  colspan="2">'. count($reports_facilities)  .'</td> </tr> ';
		echo'</tbody>';
		 endif;
	echo'</table>';
					
		
	}
	
	
			function get_reports_teacher(){
		$CI = get_instance();
		$reports_teacher = $CI->reports_model->get_reports_teacher($_POST['school_teacher'], $_POST['from_date_teacher'], $_POST['to_date_teacher']);
				
				 
		echo '
		 <table id="datable_2"  class="table table-hover table-bordered display mb-30 dataTable" >
										<thead>
											<tr>
												<th>#</th>
												<th>اسم المعلم</th>
												<th>رقم الهاتف</th>
												<th>التخصص</th>
												<th>المادة </th>
												<th>عدد الحصص</th>
												<th>المؤهل</th>
												<th width="20%">العمليات</th>
											</tr>
										</thead>';
										
										  if(isset($reports_teacher)):
										echo'<tbody>';
											 $i=1;foreach ($reports_teacher as $new){
											echo'<tr>
												 <td>'.$i.'</td>
												 <td>'.$new->teachers_name.'</td>
												 <td>'.$new->teachers_phone .'</td>
												 <td>'.$new->teachers_specialization .'</td>
												 <td>'.$new->teachers_subject.'</td>
												 <td>'.$new->teachers_shares_no.'</td>
												 <td>'.$new->teachers_qualifcation .'</td>
													
												 <td style="width:14%">';
							  if(check_admin_role(290)==1){	
								 echo' <a class="btn btn-primary"  data-toggle="tooltip" title="عرض وتعديل بيانات المعلم"   href="'. site_url('admin/schools/teacher_edit/'.$new->teachers_guid).'"><i class="fa fa-eye" style="font-size:21px"></i></a>';
							 }  
							if(check_admin_role(291)==1){	
								echo'  <a class="btn btn-danger"  data-toggle="tooltip" title="حذف المعلم"   href="'.site_url('admin/schools/delete_teacher/'.$new->teachers_guid).'" onclick="return areyousure()"><i class="icon-trash" style="font-size:21px"></i></a>';
							 }  	
								 
									
							echo'</td>
						</tr>';
						 $i++;}
						  echo ' <tr style="font-weight:bold"> <td colspan="2"> المجموع </td><td  colspan="2">'. count($reports_teacher)  .'</td> </tr> ';
				echo'</tbody>';
				endif;
			echo'</table>';

		
	}
	
	
	function get_reports_supervisor(){
		$CI = get_instance();
		$reports_supervisor = $CI->reports_model->get_reports_supervisor($_POST['school_supervisor'], $_POST['from_date_supervisor'], $_POST['to_date_supervisor']);
				
				 
		echo '
		<table id="datable_2"  class="table table-hover table-bordered display mb-30 dataTable" >
										<thead>
											<tr>
												<th>#</th>
												<th>اسم المشرف</th>
												<th>رقم الهاتف</th>
												<th>التخصص</th>
												<th>المادة الذي يشرف عليها </th>
												<th width="15%">العمليات</th>
											</tr>
										</thead>';
										
										  if(isset($reports_supervisor)):
										echo'<tbody>';
											 $i=1;foreach ($reports_supervisor as $new){
											echo'<tr>
												 <td>'.$i.'</td>
												 <td>'. $new->supervisors_name.'</td>
												 <td>'. $new->supervisors_phone .'</td>
												 <td>'. $new->supervisors_specialization.'</td>
												 <td>'. $new->supervisors_subject .'</td>
													
												 <td>';
							  if(check_admin_role(293)==1){	
								 echo' <a class="btn btn-default"  data-toggle="tooltip" title="عرض وتعديل بيانات لمشرف"   href="'. site_url('admin/schools/supervisor_edit/'.$new->supervisors_guid).'"><i class="fa fa-eye" style="font-size:21px"></i></a>';
							 }  
							
							 if(check_admin_role(294)==1){
								   echo'<a class="btn btn-danger"  data-toggle="tooltip" title="حذف لمشرف"   href="'. site_url('admin/schools/delete_supervisor/'.$new->supervisors_guid).'" onclick="return areyousure()"><i class="icon-trash" style="font-size:21px"></i></a>';
							 }  
								 
									
							echo'</td>
						</tr>';
						 $i++;}
						 echo ' <tr style="font-weight:bold"> <td colspan="2"> المجموع </td><td  colspan="2">'. count($reports_supervisor)  .'</td> </tr> ';
				echo'</tbody>';
				 endif;
			echo'</table>
		';
		 

		
	}
	
	
	function get_count_student_type(){
		$CI = get_instance();
		$data['count_student_type'] = $CI->reports_model->get_count_student_type($_POST['school_ty'],$_POST['schools_type_count']);
		
				// print_r($data['count_student_type']); exit;
		echo '
		<table id="datable_2"  class="table table-hover table-bordered display mb-30 dataTable" >';
			 echo ' <tr style="font-weight:bold"> <td colspan="2"> المجموع </td><td  colspan="2">'. $data['count_student_type']->amount  .'</td> </tr> ';
			
				
			echo'</table>
		';	
	}
	
	
	function get_count_student_class(){
		$CI = get_instance();
		$data['count_student_class'] = $CI->reports_model->get_count_student_class($_POST['school_class']);
		
				// print_r($data['count_student_type']); exit;
		echo '
		<table id="datable_2"  class="table table-hover table-bordered display mb-30 dataTable" >';
			 echo ' <tr style="font-weight:bold"> <td colspan="2"> المجموع </td><td  colspan="2">'. $data['count_student_class']->class_count  .'</td> </tr> ';
			
				
			echo'</table>
		';

	}
			
		
	
}