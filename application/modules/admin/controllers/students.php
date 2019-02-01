<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class students extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$CI = get_instance();
		$CI->load->model("students_model");
		$CI->load->model("application_model");
		$CI->load->model("coupons_model");
		
	}
	
	static function index(){
		$CI = get_instance();
		$data['applications'] = $CI->application_model->get_all_app_admin();
		$data['agents'] = $CI->coupons_model->get_agents();
		
		$data['page_title'] = lang('clients');
		$data['body'] = 'students/list';
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
							 <td> <a style="text-decoration: underline" href="'. site_url('admin/application/view/'.$new->users_admin_id).'">'.$new->users_id.'</a></td>
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
							<a style="padding: 4px 15px" class="btn btn-success btn-xs"  data-toggle="modal" data-target="#responsive-modall" title="Send Message" ><i class="fa fa-envelope "></i> Send Message</a></td>



					</tr>';
					 $i++;}
			echo '</tbody>';
		 endif;
		echo '</table>';
	}
	
	
	public static function get_app_by_id ()
	{
			$CI = get_instance();
	  $apps = $CI->students_model->get_app_by_id($_POST['from_date'],$_POST['to_date'],$_POST['agent_id']);
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
							 <td> <a style="text-decoration: underline" href="'. site_url('admin/application/view/'.$new->users_admin_id).'">'.$new->users_id.'</a></td>
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
							<a style="padding: 4px 15px" class="btn btn-success btn-xs"  data-toggle="modal" data-target="#responsive-modall"  title="Send Message" ><i class="fa fa-envelope "></i> Send Message</a></td>



					</tr>';
					 $i++;}
			echo '</tbody>';
		 endif;
		echo '</table>';
	}
		
	
	
	
	static function delete($id)
	{
		
		$this->agent_model->delete($id);
		$this->session->set_flashdata('message', 'Successfully Deleted');
		redirect('admin/agent/list_agent');
	}
	
	
	static function send_msg(){
		
		$CI =& get_instance();
        $auth = new students();
		$admin = $CI->session->userdata('admin');
		$admin_guid= $admin['admin_guid'];
        $messages_guid = $auth->generateRandomString(6);
		$messages_title = $CI->input->post('messages_title');
		$messages_text = $CI->input->post('messages_text');
		$messages_to = $CI->input->post('messages_to');
		$messages_created_on 	= date('Y-m-d H:i:s');

		
		$photo = array();
		
		if(isset($_FILES['messages_attach']['name']) && !empty($_FILES['messages_attach']['name'])){
					
						$config['upload_path'] = './uploads/documents/';
						$config['allowed_types'] = '*';
						$config['max_size']	= '10000';
						$config['max_width']  = '10000';
						$config['max_height']  = '6000';
						$config['encrypt_name'] = TRUE;
				
						$CI->load->library('upload', $config);
				
						if ( !$img = $CI->upload->do_upload('messages_attach'))
							{
								$msg = $CI->upload->display_errors();
							}
							else
							{
								$msg = 'Not errors';
								$img_data = array('upload_data' => $CI->upload->data());
								
							}
							$messages_attach = $img_data['upload_data']['file_name'];
					}
					else 
					{
						$messages_attach = '';
					}
		
		
		 $CI->db->query("insert into messages_tb 
		 (messages_guid,messages_title,messages_text,messages_from,messages_to,messages_from_view,messages_to_view,messages_attach,message_created_on) values('$messages_guid','$messages_title','$messages_text','$admin_guid','$messages_to','0','0','$messages_attach','$messages_created_on')");

	}
	
	
	
	
	public static function generateRandomString($length = 13) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	
	
	
	

	
}