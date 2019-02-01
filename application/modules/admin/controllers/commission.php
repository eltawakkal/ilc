<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class commission extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$CI = get_instance();
		$CI->load->model("commission_model");
		$CI->load->model("application_model");
		$CI->load->model("coupons_model");
		
	}
	
	static function index(){
		$CI = get_instance();
		$data['applications'] = $CI->commission_model->get_all_app_admin();
		$data['agents'] = $CI->coupons_model->get_agents();
		
		$data['page_title'] = lang('clients');
		$data['body'] = 'commission/list';
		$CI->load->view('template/main', $data);	

	}

	
	public static function get_app ()
	{
			$CI = get_instance();
	  $apps = $CI->students_model->get_app($_POST['from_date'],$_POST['to_date']);
		echo '<table class="table table-hover table-bordered display mb-30 dataTable" >
					<thead>
						<tr>
							<th>#</th>
							<th style="display: none">App No.</th>
							<th>App No.</th>
							<th>App Date</th>
							<th>Full Name</th>
							<th>Program</th>
							<th>WhatsApp</th>
							<th>App Status</th>
							<th style="width:10%">Action</th>
						</tr>
					</thead>';
					 if(isset($apps)):
					echo '<tbody>';
						 $i=1;foreach ($apps as $new){
						echo '<tr>
							 <td>'.$i.'</td>
							 <td style="display: none" id="users_id'.$i.'"> '.$new->users_id.'</a></td>
							 <td> <a style="text-decoration: underline" href="'. site_url('admin/application/view/'.$new->users_id).'">'.$new->users_id.'</a></td>
							 <td>'.$new->users_created_on.'</td>
							 <td>'.$new->users_fullname.'</td>
							 <td>'.$new->users_program.'</td>
							 <td>'.$new->users_whatapp.'</td>
							 <td>';if($new->users_status == 1){
											echo 'New ';
											}else if($new->users_status == 2){
											echo 'submitted ';
											} else  if($new->users_status == 3){ 
											   echo 'Processing';
										   } else  if($new->users_status == 4){ 
											   echo 'Not Submit';
										   }else  if($new->users_status == 5){ 
											   echo 'Other';
										   }else  if($new->users_status == 6){ 
											   echo 'Offered';
										   }else  if($new->users_status == 7){ 
											   echo 'Val';
										   }else  if($new->users_status == 8){ 
											   echo 'Enrolled';
										   }else  if($new->users_status == 9){ 
											   echo 'payment processing';
										   }else  if($new->users_status == 10){ 
											   echo 'Canceled';
										   }else  if($new->users_status == 11){ 
											   echo 'Rejected';
										   }
								 echo '</td>

							<td>
							<a style="padding: 4px 15px" class="btn btn-success btn-xs" href="'. site_url('admin/students/send_msg/'.$new->users_id).'" data-toggle="tooltip" title="Send Message" ><i class="fa fa-envelope "></i> Send Message</a></td>



					</tr>';
					 $i++;}
			echo '</tbody>';
		 endif;
		echo '</table>';
	}
	
	
	public static function get_app_by_id_commission()
	{
			$CI = get_instance();
	  $apps = $CI->commission_model->get_app_by_id($_POST['from_date'],$_POST['to_date'],$_POST['agent_id']);
		echo '<table class="table table-hover table-bordered display mb-30 dataTable" >
					<thead>
						<tr>
							<th>#</th>
							<th style="display: none">App No.</th>
							<th>App No.</th>
							<th>App Date</th>
							<th>Student Name</th>
							<th>University</th>
							<th>Commission Status</th>
							<th>Commission</th>
							<th>payment</th>
							<th>Outstanding</th>
							<th>Redeemed Status</th>
						</tr>
					</thead>';
					 if(isset($apps)):
					echo '<tbody>';
						 $i=1;foreach ($apps as $new){
							 $fir = $new->users_accured_com;
							 $sec= $new->users_redeemed;
							 $tot = $fir - $sec;
						echo '<tr>
							 <td>'.$i.'</td>
							 <td style="display: none" id="users_id'.$i.'"> '.$new->users_id.'</a></td>
							 <td> <a style="text-decoration: underline" href="'. site_url('admin/application/view/'.$new->users_id).'">'.$new->users_id.'</a></td>
							 <td>'.$new->users_created_on.'</td>
							 <td>'.$new->users_fullname.'</td>
							 <td>'.$new->university_name.'</td>
							 <td>'; if($new->users_commission_status == 1){
										echo 'Yes ';
										}else if($new->users_commission_status == 2){
										echo 'No ';
										} 
							 echo '</td>
						     <td>'.$new->users_accured_com.'</td>
							 <td>'.$new->users_redeemed.'</td>
							 <td>'.$tot.'</td>
							 <td>';if($new->users_redeemed_status == 1){
										echo 'Yes ';
									}else if($new->users_redeemed_status == 2){
										echo 'No ';
									}
							echo'</td>
					</tr>';
					 $i++;}
			echo '</tbody>';
		 endif;
		echo '</table>';
	}
	
	
	static function add_commission(){
		
		$CI =& get_instance();
		$users_id = $CI->input->post('users_id');
		$users_accured_com = $CI->input->post('users_accured_com');
		$users_redeemed = $CI->input->post('users_redeemed');
		$users_redeemed_status = $CI->input->post('users_redeemed_status');

		 $CI->db->query("update users_tb set 
		  users_accured_com = '$users_accured_com',
		  users_redeemed ='$users_redeemed',
		  users_redeemed_status= '$users_redeemed_status'
		  where users_id ='$users_id'");
 
		
	}
	
	
	static function view($id=false){
		$CI = get_instance();
		$data['user'] = $CI->commission_model->get_user_by_id($id);
		$data['body'] = 'commission/view';
		$CI->load->view('template/main', $data);	
	}	
		
	
	
	
	static function delete($id)
	{
		
		$this->agent_model->delete($id);
		$this->session->set_flashdata('message', 'Successfully Deleted');
		redirect('admin/agent/list_agent');
	}
	
	
	
}