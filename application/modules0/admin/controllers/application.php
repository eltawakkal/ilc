<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class application extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$CI->auth->check_access('1', true);
		$CI = get_instance();
		$CI->load->model("application_model");
		$CI->load->model("coupons_model");
		$CI->load->model("dashboard_model");
		$CI->load->model("lang_center_model");
		
	}
	
	/*************** admin ********************************/
	
	
	static function list_admin(){
		$CI = get_instance();
		
		
		$data['applications'] = $CI->application_model->get_all_app_admin();
		$data['agents'] = $CI->coupons_model->get_agents();
		$data['university'] = $CI->application_model->get_university();
		
		$data['body'] = 'application/list_admin';
		$CI->load->view('template/main', $data);	

	}
	
	
	static function list_app_uni(){
		$CI = get_instance();
		
		
		$data['applications'] = $CI->application_model->get_all_app_admin();
		$data['agents'] = $CI->coupons_model->get_agents();
		
		$data['body'] = 'application/list_app_uni';
		$CI->load->view('template/main', $data);	

	}
	
	static function change_status(){
		
		$CI =& get_instance();
		$users_id = $CI->input->post('users_id');
		$users_status = $CI->input->post('users_status');
		$users_notes = $CI->input->post('users_notes');
		
		
		$photo = array();
		
		if(isset($_FILES['user_file']['name']) && !empty($_FILES['user_file']['name'])){
					
						$config['upload_path'] = './uploads/documents/';
						$config['allowed_types'] = '*';
						$config['max_size']	= '10000';
						$config['max_width']  = '10000';
						$config['max_height']  = '6000';
						$config['encrypt_name'] = TRUE;
				
						$CI->load->library('upload', $config);
				
						if ( !$img = $CI->upload->do_upload('user_file'))
							{
								$msg = $CI->upload->display_errors();
							}
							else
							{
								$msg = 'Not errors';
								$img_data = array('upload_data' => $CI->upload->data());
								
							}
							$user_file = $img_data['upload_data']['file_name'];
					}
					else 
					{
						$user_file = '';
					}

		 $CI->db->query("update users_tb set 
		  users_status = '$users_status',users_notes ='$users_notes',user_file='$user_file'
		  where users_id ='$users_id'");
 
		
	}
	
	
	static function change_status_without_note(){
		
		$CI =& get_instance();
		$users_id = $CI->input->post('users_id');
		$users_status = $CI->input->post('users_status');
		$users_app_guid = $CI->input->post('users_app_guid');
		$users_admin_id = $CI->input->post('users_admin_id');
		
		
		$admin = $CI->session->userdata('admin');
		$users_agent_id= $admin['admin_guid'];

		 $CI->db->query("update users_tb set 
		  users_status = '$users_status'
		  where users_id ='$users_id'");
		
		
		$notifications_created_on 	= date('Y-m-d H:i:s');
		
		
		
		
		$admins = $CI->application_model->get_admins();
			foreach($admins as $row){ // تغيير حالة استمارة 
				$CI->db->query("insert into notifications_tb(notifications_from_id,notifications_to_id,notifications_type,notifications_app_id,notifications_is_view,notifications_created_on) values('$users_agent_id','$row->admin_guid','$users_status','$users_app_guid','0','$notifications_created_on')");	
			}
		
		$CI->db->query("insert into notifications_tb(notifications_from_id,notifications_to_id,notifications_type,notifications_app_id,notifications_is_view,notifications_created_on) values('$users_agent_id','$users_admin_id','$users_status','$users_app_guid','0','$notifications_created_on')");
 
		
	}
	
	
	
	
	/************ Agents *******************************/
	
	static function lists(){
		$CI = get_instance();
		
		
		$data['applications'] = $CI->application_model->get_all_app();
		
		$data['body'] = 'application/list_app';
		$CI->load->view('template/main', $data);	

	}
	
	static function view($id=false){
		$CI = get_instance();
		$data['user'] = $CI->application_model->get_user_by_id($id);
		$data['attachments'] = $CI->application_model->get_attachement_by_id($id);
		$data['body'] = 'application/view';
		$CI->load->view('template/main', $data);	
	}	
	
	
	static function index(){
		$CI = get_instance();
		$data['apply'] = $CI->application_model->get_all();
		$data['country'] = $CI->application_model->get_country();
		$data['institution'] = $CI->application_model->get_institution();
		$data['degree'] = $CI->application_model->get_degree();
		$data['university'] = $CI->application_model->get_university();
		$data['mode_study'] = $CI->application_model->get_mode_study();
		$data['language'] = $CI->lang_center_model->get_all_language();
		
		$data['get_data'] = $CI->application_model->get_data();
		
		$data['page_title'] = lang('clients');
		$data['body'] = 'application/list';
		$CI->load->view('template/main', $data);	

	}
	
	
	static function add(){
		$CI = get_instance();
		$data['apply'] = $CI->application_model->get_all();
		$data['country'] = $CI->application_model->get_country();
		$data['institution'] = $CI->application_model->get_institution();
		$data['degree'] = $CI->application_model->get_degree();
		$data['university'] = $CI->application_model->get_university();
		$data['mode_study'] = $CI->application_model->get_mode_study();
		$data['language'] = $CI->lang_center_model->get_all_language();
		$data['get_data'] = $CI->application_model->get_data();
		$data['setting'] = $CI->dashboard_model->get_settings();
		
		$data['page_title'] = lang('clients');
		$data['body'] = 'application/add';
		$CI->load->view('template/main', $data);	

	}
	
	static function edit($id){
		$CI = get_instance();
		$data['apply'] = $CI->application_model->get_all();
		$data['country'] = $CI->application_model->get_country();
		$data['institution'] = $CI->application_model->get_institution();
		$data['degree'] = $CI->application_model->get_degree();
		$data['university'] = $CI->application_model->get_university();
		
		$data['get_data'] = $CI->application_model->get_data_by_id($id);
		
		$data['page_title'] = lang('clients');
		$data['body'] = 'application/edit';
		$CI->load->view('template/main', $data);	

	}
	
	
	
	
	
	
	static function add_users_by_agent(){

		$CI = get_instance();
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$auth = new application();
		$admin = $CI->session->userdata('admin');
		$users_agent_id= $admin['admin_guid'];
		
		$users_app_guid = $auth->generateRandomString(6);
		
		$users_fullname 	= $CI->input->post('users_fullname');
		$users_whatapp 	= $CI->input->post('users_whatapp');
		$users_country 	= $CI->input->post('users_country');
		$users_apply 	= $CI->input->post('users_apply');
		$users_institution 			= $CI->input->post('users_institution');
		$users_institution_name 	= $CI->input->post('users_institution_name');
		$users_degree 	= $CI->input->post('users_degree');
		$users_university 		= $CI->input->post('users_university');
		$users_collage_name		= $CI->input->post('users_collage_name');
		$users_program		= $CI->input->post('users_program');
		$users_course		= $CI->input->post('users_course');
		$users_international_name	= $CI->input->post('users_international_name');
		$users_other_name	= $CI->input->post('users_other_name');
		$users_language_name	= $CI->input->post('users_language_name');
		$users_mode_study	= $CI->input->post('users_mode_study');
		$users_created_on 	= date('Y-m-d H:i:s');
		
		
		$admin_guid			= $auth->generateRandomString(8);
		$admin_email 		= $CI->input->post('admin_email');
		$admin_password 	= sha1($CI->input->post('admin_password'));
		$admin_created_on 	= date('Y-m-d H:i:s');
		
		$photo = array();
		
		if(isset($_FILES['users_img_passport']['name']) && !empty($_FILES['users_img_passport']['name'])){
					
						$config['upload_path'] = './uploads/';
						$config['allowed_types'] = '*';
						$config['max_size']	= '10000';
						$config['max_width']  = '10000';
						$config['max_height']  = '6000';
						$config['encrypt_name'] = TRUE;
				
						$CI->load->library('upload', $config);
				
						if ( !$img = $CI->upload->do_upload('users_img_passport'))
							{
								$msg = $CI->upload->display_errors();
							}
							else
							{
								$msg = 'Not errors';
								$img_data = array('upload_data' => $CI->upload->data());
								
							}
							$users_img_passport = $img_data['upload_data']['file_name'];
					}
					else 
					{
						$users_img_passport = '';
					}
					
		if(isset($_FILES['users_img_qualifications']['name']) && !empty($_FILES['users_img_qualifications']['name'])){
					
						$config['upload_path'] = './uploads/';
						$config['allowed_types'] = '*';
						$config['max_size']	= '10000';
						$config['max_width']  = '10000';
						$config['max_height']  = '6000';
						$config['encrypt_name'] = TRUE;
				
						$CI->load->library('upload', $config);
				
						if ( !$img = $CI->upload->do_upload('users_img_qualifications'))
							{
								$msg = $CI->upload->display_errors();
							}
							else
							{
								$msg = 'Not errors';
								$img_data = array('upload_data' => $CI->upload->data());
								
							}
							$users_img_qualifications = $img_data['upload_data']['file_name'];
					}
					else 
					{
						$users_img_qualifications = '';
					}
	
	
	
			if(isset($_FILES['users_img_certificate']['name']) && !empty($_FILES['users_img_certificate']['name'])){
					
						$config['upload_path'] = './uploads/';
						$config['allowed_types'] = '*';
						$config['max_size']	= '10000';
						$config['max_width']  = '10000';
						$config['max_height']  = '6000';
						$config['encrypt_name'] = TRUE;
				
						$CI->load->library('upload', $config);
				
						if ( !$img = $CI->upload->do_upload('users_img_certificate'))
							{
								$msg = $CI->upload->display_errors();
							}
							else
							{
								$msg = 'Not errors';
								$img_data = array('upload_data' => $CI->upload->data());
								
							}
							$users_img_certificate = $img_data['upload_data']['file_name'];
					}
					else 
					{
						$users_img_certificate = '';
					}
		
		
			if(isset($_FILES['users_img_english_certificate']['name']) && !empty($_FILES['users_img_english_certificate']['name'])){
					
						$config['upload_path'] = './uploads/';
						$config['allowed_types'] = '*';
						$config['max_size']	= '10000';
						$config['max_width']  = '10000';
						$config['max_height']  = '6000';
						$config['encrypt_name'] = TRUE;
				
						$CI->load->library('upload', $config);
				
						if ( !$img = $CI->upload->do_upload('users_img_english_certificate'))
							{
								$msg = $CI->upload->display_errors();
							}
							else
							{
								$msg = 'Not errors';
								$img_data = array('upload_data' => $CI->upload->data());
								
							}
							$users_img_english_certificate = $img_data['upload_data']['file_name'];
					}
					else 
					{
						$users_img_english_certificate = '';
					}
	
		
		$CI->db->query("insert into admin_tb(admin_guid,admin_role,admin_created_on)   	values('$admin_guid','3','$admin_created_on')");
		
		$CI->db->query("insert into users_tb(users_app_guid,users_admin_id,users_fullname,users_whatapp,users_country,users_apply,users_institution,users_institution_name,users_degree,users_university,users_mode_study,users_collage_name,users_program,users_course,users_language_name,users_international_name,users_other_name,users_img_passport,users_img_english_certificate,users_img_qualifications,users_img_certificate,users_status,users_agent_id,users_by_agent_id,users_created_on)   	values('$users_app_guid','$admin_guid','$users_fullname','$users_whatapp','$users_country','$users_apply','$users_institution','$users_institution_name','$users_degree','$users_university','$users_mode_study','$users_collage_name','$users_program','$users_course','$users_language_name','$users_international_name','$users_other_name','$users_img_passport','$users_img_english_certificate','$users_img_qualifications','$users_img_certificate','1','$users_agent_id','1','$users_created_on')");
		
		
		
		$notifications_created_on 	= date('Y-m-d H:i:s');
		
		
		
		
		$admins = $CI->application_model->get_admins();
			foreach($admins as $row){ // تقديم استمارة جديدة
				$CI->db->query("insert into notifications_tb(notifications_from_id,notifications_to_id,notifications_type,notifications_app_id,notifications_is_view,notifications_created_on) values('$users_agent_id','$row->admin_guid','2','$users_app_guid','0','$notifications_created_on')");	
			}
		

	}
	
	
	
	static function add_users(){

		$CI = get_instance();
		$auth = new application();
		date_default_timezone_set('Asia/Kuala_Lumpur');
		//$admin = $CI->session->userdata('admin');
		$admin = $CI->session->userdata('admin');
		$admin_guid= $admin['admin_guid'];
		
		$users_app_guid = $auth->generateRandomString(6);
		$users_fullname 	= $CI->input->post('users_fullname');
		$users_whatapp 	= $CI->input->post('users_whatapp');
		$users_country 	= $CI->input->post('users_country');
		$users_apply 	= $CI->input->post('users_apply');
		$users_institution 			= $CI->input->post('users_institution');
		$users_institution_name 	= $CI->input->post('users_institution_name');
		$users_degree 	= $CI->input->post('users_degree');
		$users_university 		= $CI->input->post('users_university');
		$users_collage_name		= $CI->input->post('users_collage_name');
		$users_program		= $CI->input->post('users_program');
		$users_course		= $CI->input->post('users_course');
		$users_international_name	= $CI->input->post('users_international_name');
		$users_other_name	= $CI->input->post('users_other_name');
		$users_agent_id	= $CI->input->post('users_agent_id');
		$users_language_name	= $CI->input->post('users_language_name');
		$users_mode_study	= $CI->input->post('users_mode_study');
		$users_created_on 	= date('Y-m-d H:i:s');
		
		$photo = array();
		
		if(isset($_FILES['users_img_passport']['name']) && !empty($_FILES['users_img_passport']['name'])){
					
						$config['upload_path'] = './uploads/';
						$config['allowed_types'] = '*';
						$config['max_size']	= '10000';
						$config['max_width']  = '10000';
						$config['max_height']  = '6000';
						$config['encrypt_name'] = TRUE;
				
						$CI->load->library('upload', $config);
				
						if ( !$img = $CI->upload->do_upload('users_img_passport'))
							{
								$msg = $CI->upload->display_errors();
							}
							else
							{
								$msg = 'Not errors';
								$img_data = array('upload_data' => $CI->upload->data());
								
							}
							$users_img_passport = $img_data['upload_data']['file_name'];
					}
					else 
					{
						$users_img_passport = '';
					}
					
		if(isset($_FILES['users_img_qualifications']['name']) && !empty($_FILES['users_img_qualifications']['name'])){
					
						$config['upload_path'] = './uploads/';
						$config['allowed_types'] = '*';
						$config['max_size']	= '10000';
						$config['max_width']  = '10000';
						$config['max_height']  = '6000';
						$config['encrypt_name'] = TRUE;
				
						$CI->load->library('upload', $config);
				
						if ( !$img = $CI->upload->do_upload('users_img_qualifications'))
							{
								$msg = $CI->upload->display_errors();
							}
							else
							{
								$msg = 'Not errors';
								$img_data = array('upload_data' => $CI->upload->data());
								
							}
							$users_img_qualifications = $img_data['upload_data']['file_name'];
					}
					else 
					{
						$users_img_qualifications = '';
					}
	
	
	
			if(isset($_FILES['users_img_certificate']['name']) && !empty($_FILES['users_img_certificate']['name'])){
					
						$config['upload_path'] = './uploads/';
						$config['allowed_types'] = '*';
						$config['max_size']	= '10000';
						$config['max_width']  = '10000';
						$config['max_height']  = '6000';
						$config['encrypt_name'] = TRUE;
				
						$CI->load->library('upload', $config);
				
						if ( !$img = $CI->upload->do_upload('users_img_certificate'))
							{
								$msg = $CI->upload->display_errors();
							}
							else
							{
								$msg = 'Not errors';
								$img_data = array('upload_data' => $CI->upload->data());
								
							}
							$users_img_certificate = $img_data['upload_data']['file_name'];
					}
					else 
					{
						$users_img_certificate = '';
					}
		
		
		
		
			if(isset($_FILES['users_img_english_certificate']['name']) && !empty($_FILES['users_img_english_certificate']['name'])){
					
						$config['upload_path'] = './uploads/';
						$config['allowed_types'] = '*';
						$config['max_size']	= '10000';
						$config['max_width']  = '10000';
						$config['max_height']  = '6000';
						$config['encrypt_name'] = TRUE;
				
						$CI->load->library('upload', $config);
				
						if ( !$img = $CI->upload->do_upload('users_img_english_certificate'))
							{
								$msg = $CI->upload->display_errors();
							}
							else
							{
								$msg = 'Not errors';
								$img_data = array('upload_data' => $CI->upload->data());
								
							}
							$users_img_english_certificate = $img_data['upload_data']['file_name'];
					}
					else 
					{
						$users_img_english_certificate = '';
					}
		
	
		
		$CI->db->query("insert into users_tb(users_app_guid,users_admin_id,users_fullname,users_whatapp,users_country,users_apply,users_institution,users_institution_name,users_degree,users_university,users_mode_study,users_collage_name,users_program,users_course,users_language_name,users_international_name,users_other_name,users_img_passport,users_img_english_certificate,users_img_qualifications,users_img_certificate,users_status,users_agent_id,users_by_agent_id,users_created_on)   	values('$users_app_guid','$admin_guid','$users_fullname','$users_whatapp','$users_country','$users_apply','$users_institution','$users_institution_name','$users_degree','$users_university','$users_mode_study','$users_collage_name','$users_program','$users_course','$users_language_name','$users_international_name','$users_other_name','$users_img_passport','$users_img_english_certificate','$users_img_qualifications','$users_img_certificate','1','$users_agent_id','2','$users_created_on')");
		

	}
	
	static function update_users(){

		$CI = get_instance();
		date_default_timezone_set('Asia/Kuala_Lumpur');
		//$admin = $CI->session->userdata('admin');
		$admin = $CI->session->userdata('admin');
		$admin_guid= $admin['admin_guid'];
		
		$data['get_data'] = $CI->application_model->get_data();
		
		$users_id 	= $CI->input->post('users_id');
		$users_fullname 	= $CI->input->post('users_fullname');
		$users_whatapp 	= $CI->input->post('users_whatapp');
		$users_country 	= $CI->input->post('users_country');
		$users_apply 	= $CI->input->post('users_apply');
		$users_institution 			= $CI->input->post('users_institution');
		$users_institution_name 	= $CI->input->post('users_institution_name');
		$users_degree 	= $CI->input->post('users_degree');
		$users_university 		= $CI->input->post('users_university');
		$users_collage_name		= $CI->input->post('users_collage_name');
		$users_program		= $CI->input->post('users_program');
		$users_course		= $CI->input->post('users_course');
		$users_international_name	= $CI->input->post('users_international_name');
		$users_other_name	= $CI->input->post('users_other_name');
		$users_language_name	= $CI->input->post('users_language_name');
		$users_mode_study	= $CI->input->post('users_mode_study');
		$users_created_on 	= date('Y-m-d H:i:s');
		
		$photo = array();
		
		if(isset($_FILES['users_img_passport']['name']) && !empty($_FILES['users_img_passport']['name'])){
					
						$config['upload_path'] = './uploads/';
						$config['allowed_types'] = '*';
						$config['max_size']	= '10000';
						$config['max_width']  = '10000';
						$config['max_height']  = '6000';
						$config['encrypt_name'] = TRUE;
				
						$CI->load->library('upload', $config);
				
						if ( !$img = $CI->upload->do_upload('users_img_passport'))
							{
								$msg = $CI->upload->display_errors();
							}
							else
							{
								$msg = 'Not errors';
								$img_data = array('upload_data' => $CI->upload->data());
								
							}
							$users_img_passport = $img_data['upload_data']['file_name'];
					}
					else 
					{
						$users_img_passport = $data['get_data']->users_img_passport;
					}
					
		if(isset($_FILES['users_img_qualifications']['name']) && !empty($_FILES['users_img_qualifications']['name'])){
					
						$config['upload_path'] = './uploads/';
						$config['allowed_types'] = '*';
						$config['max_size']	= '10000';
						$config['max_width']  = '10000';
						$config['max_height']  = '6000';
						$config['encrypt_name'] = TRUE;
				
						$CI->load->library('upload', $config);
				
						if ( !$img = $CI->upload->do_upload('users_img_qualifications'))
							{
								$msg = $CI->upload->display_errors();
							}
							else
							{
								$msg = 'Not errors';
								$img_data = array('upload_data' => $CI->upload->data());
								
							}
							$users_img_qualifications = $img_data['upload_data']['file_name'];
					}
					else 
					{
						$users_img_qualifications = $data['get_data']->users_img_qualifications;
					}
	
	
	
			if(isset($_FILES['users_img_certificate']['name']) && !empty($_FILES['users_img_certificate']['name'])){
					
						$config['upload_path'] = './uploads/';
						$config['allowed_types'] = '*';
						$config['max_size']	= '10000';
						$config['max_width']  = '10000';
						$config['max_height']  = '6000';
						$config['encrypt_name'] = TRUE;
				
						$CI->load->library('upload', $config);
				
						if ( !$img = $CI->upload->do_upload('users_img_certificate'))
							{
								$msg = $CI->upload->display_errors();
							}
							else
							{
								$msg = 'Not errors';
								$img_data = array('upload_data' => $CI->upload->data());
								
							}
							$users_img_certificate = $img_data['upload_data']['file_name'];
					}
					else 
					{
						$users_img_certificate = $data['get_data']->users_img_certificate;
					}
		
		
		
		
			if(isset($_FILES['users_img_english_certificate']['name']) && !empty($_FILES['users_img_english_certificate']['name'])){
					
						$config['upload_path'] = './uploads/';
						$config['allowed_types'] = '*';
						$config['max_size']	= '10000';
						$config['max_width']  = '10000';
						$config['max_height']  = '6000';
						$config['encrypt_name'] = TRUE;
				
						$CI->load->library('upload', $config);
				
						if ( !$img = $CI->upload->do_upload('users_img_english_certificate'))
							{
								$msg = $CI->upload->display_errors();
							}
							else
							{
								$msg = 'Not errors';
								$img_data = array('upload_data' => $CI->upload->data());
								
							}
							$users_img_english_certificate = $img_data['upload_data']['file_name'];
					}
					else 
					{
						$users_img_english_certificate = '';
					}
		
	
		
		$CI->db->query("update  users_tb set users_fullname = '$users_fullname',users_whatapp = '$users_whatapp',users_country = '$users_country',users_apply ='$users_apply',users_institution = '$users_institution',users_institution_name = '$users_institution_name',users_degree = '$users_degree',users_university = '$users_university',users_mode_study= '$users_mode_study',users_collage_name = '$users_collage_name',users_program = '$users_program',users_course = '$users_course',users_language_name = '$users_language_name',users_international_name = '$users_international_name',users_other_name = '$users_other_name',users_img_passport = '$users_img_passport',users_img_english_certificate= '$users_img_english_certificate',users_img_qualifications = '$users_img_qualifications',users_img_certificate= '$users_img_certificate' where users_id = '$users_id'");
		

	}
	
	
	
	
	
	
	static function download_passport($id)
	{
		$CI = get_instance();
		//ob_clean(); 
		$CI->load->helper('download');
		$attach = $CI->application_model->get_attach_by_id($id);
		$data = file_get_contents("./uploads/".$attach->users_img_passport); // Read the file's contents
		$name = $attach->users_img_passport;
		force_download($name, $data); 

		exit;
		if (file_exists($file)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($file));
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			readfile($file);
			exit;
		}
	}
	
	
	static function download_qualifications($id)
	{
		$CI = get_instance();
		//ob_clean(); 
		$CI->load->helper('download');
		$attach = $CI->application_model->get_attach_by_id($id);
		$data = file_get_contents("./uploads/".$attach->users_img_qualifications); // Read the file's contents
		$name = $attach->users_img_qualifications;
		force_download($name, $data); 

		exit;
		if (file_exists($file)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($file));
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			readfile($file);
			exit;
		}
	}
	
	
	
	static function download_certificate($id)
	{
		$CI = get_instance();
		//ob_clean(); 
		$CI->load->helper('download');
		$attach = $CI->application_model->get_attach_by_id($id);
		$data = file_get_contents("./uploads/".$attach->users_img_certificate); // Read the file's contents
		$name = $attach->users_img_certificate;
		force_download($name, $data); 

		exit;
		if (file_exists($file)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($file));
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			readfile($file);
			exit;
		}
	}
	
	
	
	
	static function download_eng_certificate($id)
	{
		$CI = get_instance();
		//ob_clean(); 
		$CI->load->helper('download');
		$attach = $CI->application_model->get_attach_by_id($id);
		$data = file_get_contents("./uploads/".$attach->users_img_english_certificate); // Read the file's contents
		$name = $attach->users_img_english_certificate;
		force_download($name, $data); 

		exit;
		if (file_exists($file)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($file));
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			readfile($file);
			exit;
		}
	}
	
	static function download_user_file($id)
	{
		$CI = get_instance();
		//ob_clean(); 
		$CI->load->helper('download');
		$attach = $CI->application_model->get_attach_by_id($id);
		$data = file_get_contents("./uploads/documents/".$attach->user_file); // Read the file's contents
		$name = $attach->user_file;
		force_download($name, $data); 

		exit;
		if (file_exists($file)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($file));
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			readfile($file);
			exit;
		}
	}
	
	
	static function send_app(){
		
		$CI =& get_instance();
		$users_id = $CI->input->post('users_id');


		 $CI->db->query("update users_tb set 
		  users_status = '2'
		  where users_id ='$users_id'");
		
	}
	
	static function send_notif_release(){
		
		$CI =& get_instance();
		$admin = $CI->session->userdata('admin');
		$admin_guid= $admin['admin_guid'];
		
		$notifications_to_id = $CI->input->post('notifications_to_id');
		$notifications_app_id = $CI->input->post('notifications_app_id');
		$users_id = $CI->input->post('users_id');
		$notifications_created_on 	= date('Y-m-d H:i:s');
		
		
		 $CI->db->query("update users_tb set 
		  users_is_release = '1'
		  where users_id ='$users_id'");
		
		
		$admins = $CI->application_model->get_admins();
			//print_r($admins); exit;
			foreach($admins as $row){
				$CI->db->query("insert into notifications_tb(notifications_from_id,notifications_to_id,notifications_type,notifications_app_id,notifications_is_view,notifications_created_on) values('$admin_guid','$row->admin_guid','1','$notifications_app_id','0','$notifications_created_on')");	
			}
		
		
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
	
	
	static function delete($id)
	{
		$this->application_model->delete($id);
		$this->session->set_flashdata('message', 'Successfully Deleted');
		redirect('admin/application/list_admin');
	}
	
	
	public static function get_app_by_id ()
	{
			$CI = get_instance();
	  $apps = $CI->application_model->get_app_by_id($_POST['from_date'],$_POST['to_date'],$_POST['agent_id'],$_POST['university_id']);
		echo '<table class="table table-hover table-bordered display mb-30 dataTable" >
					<thead>
						<tr>
							<th>#</th>
							<th style="display: none">App No.</th>
							<th>App No.</th>
							<th>App Date</th>
							<th>Full Name</th>
							<th>University</th>
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
							 <td>'.$new->university_name.'</td>
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

							<td><a style="padding: 4px 15px" class="btn btn-primary btn-xs" href="'. site_url('admin/application/change/'.$new->users_id).'" data-toggle="modal" data-target="#responsive-modal" title="Change Status" onclick="btn_show_detials('.$i .');"> <i class="fa fa-ellipsis-v"></i></a>
							<a style="padding: 4px 15px" class="btn btn-danger btn-xs" href="'. site_url('admin/application/delete/'.$new->users_id).'" data-toggle="tooltip" title="Delete" onclick="return areyousure()"><i class="icon-trash"></i></a></td>



					</tr>';
					 $i++;}
			echo '</tbody>';
		 endif;
		echo '</table>';
	}
	
	
	public static function get_app_by_type_agent ()
	{
			$CI = get_instance();
	  $apps = $CI->application_model->get_app_by_type_agent($_POST['from_date'],$_POST['to_date'],$_POST['type_agent']);
		echo '<table class="table table-hover table-bordered display mb-30 dataTable" >
					<thead>
						<tr>
							<th>#</th>
							<th style="display: none">App No.</th>
							<th>App No.</th>
							<th>App Date</th>
							<th>Full Name</th>
							<th>Program</th>
							<th>Comission</th>
							<th>Comission Status</th>
							<th style="width:10%">Release</th>
							<th style="width:10%">Action</th>
						</tr>
					</thead>';
					 if(isset($apps)):
					echo '<tbody>';
						 $i=1;foreach ($apps as $new){
						echo '<tr>
								 <td>'.$i .'</td>
								  <td style="display: none" class="notifications_app_id'.$i .'"> '. $new->users_id.'</a></td>
								  <td style="display: none" class="notifications_to_id'.$i .'"> '. $new->users_admin_id.'</a></td>
								 <td> <a style="text-decoration: underline" href="'. site_url('admin/application/view/'.$new->users_id) .'">'.$new->users_id .'</a></td>
								 <td>'.$new->users_created_on .'</td>
								 <td>'.$new->users_fullname .'</td>
								 <td>'.$new->users_program .'</td>
								 <td>'.$new->users_accured_com .'</td>
								 <td>'; if($new->users_status == 8){ 
												   echo 'Yes';
											   }
											   else {
												   echo 'No';
											   }
									 echo'</td>
								<td><a class="btn btn-primary" onClick="btn_send('.$i .')" title="'. $new->users_admin_id.'">Release Now</a></td>
								<td><a class="btn btn-success" href="'. site_url('admin/application/edit/'.$new->users_id).'"><i class="fa fa-edit"></i> Edit</a></td>


										
                                </tr>';
					 $i++;}
			echo '</tbody>';
		 endif;
		echo '</table>';
	}
	
	
	
	
	static function check_agent(){

		$CI = get_instance();

		$coupons_code = $CI->input->post('users_agent_id');
		
        $CI->db->select('coupons_code');
        $CI->db->from('coupons_tb');
        $CI->db->where('coupons_code', $coupons_code);
		$CI->db->where('coupons_status', 1);
		$count = $CI->db->count_all_results();
		echo $count; 
	}
	
	
	
	

	
}