<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$CI = get_instance();
		
        $CI->auth->check_session();
		$CI->load->model("dashboard_model");
		$CI->load->model("students_model");
		$CI->load->model("application_model");

		
		
		
	}
	
	
	static function index() {
		$CI = get_instance();
		
		$admin = $CI->session->userdata('admin');
		$admin_role= $admin['admin_role'];
		
		
		if($admin_role == 1 || $admin_role == 4){
			$data['applications'] = $CI->dashboard_model->get_15_apps();
			$data['all_applications'] = $CI->dashboard_model->get_all_applications();
			$data['new_applications'] = $CI->dashboard_model->get_new_applications();
			$data['submit_applications'] = $CI->dashboard_model->get_submit_applications();
			$data['get_processing_applications'] = $CI->dashboard_model->get_processing_applications();
			$data['get_offer_applications'] = $CI->dashboard_model->get_offer_applications();
			$data['get_val_applications'] = $CI->dashboard_model->get_val_applications();
			$data['payment'] = $CI->dashboard_model->get_payment_applications();
			$data['canceled_applications'] = $CI->dashboard_model->get_canceled_applications();
			$data['rejected'] = $CI->dashboard_model->get_rejected_applications();
			$data['enroll_applications'] = $CI->dashboard_model->get_enroll_applications();
			
		} else if($admin_role == 2){
			
			$data['applications'] = $CI->dashboard_model->get_15_apps_agent();
			$data['all_applications'] = $CI->dashboard_model->get_all_applications_agent();
			$data['new_applications'] = $CI->dashboard_model->get_new_applications_agent();
			$data['submit_applications'] = $CI->dashboard_model->get_submit_applications_agent();
			$data['get_processing_applications'] = $CI->dashboard_model->get_processing_applications_agent();
			$data['get_offer_applications'] = $CI->dashboard_model->get_offer_applications_agent();
			$data['get_val_applications'] = $CI->dashboard_model->get_val_applications_agent();
			$data['payment'] = $CI->dashboard_model->get_payment_applications_agent();
			$data['canceled_applications'] = $CI->dashboard_model->get_canceled_applications_agent();
			$data['rejected'] = $CI->dashboard_model->get_rejected_applications_agent();
			$data['enroll_applications'] = $CI->dashboard_model->get_enroll_applications_agent();
		}
		
		
		
		$data['students'] = $CI->dashboard_model->get_students();
		$data['agents'] = $CI->dashboard_model->get_agents();
		$data['institution'] = $CI->dashboard_model->get_institution();
		$data['receipts'] = $CI->dashboard_model->get_receipts();
		
		
		$data['setting'] = $CI->dashboard_model->get_settings();
		

		$data['body'] = 'dashboard/dashboard';
		$CI->load->view('template/main', $data);	

	}	
	
	
	static function get_count_nt()
	{
		$CI = get_instance();
		$cont = $CI->students_model->get_count_inbox();
		echo count($cont); 
		
	}
	
	
	static function change_status_true(){
		
		$CI =& get_instance();
		$users_id = $CI->input->post('users_id');
		$users_status = $CI->input->post('users_status');

		 $CI->db->query("update settings set 
		  is_register = '1'
		  where id ='1'");
 
		
	}
	
	
	static function change_status_false(){
		
		$CI =& get_instance();
		$users_id = $CI->input->post('users_id');
		$users_status = $CI->input->post('users_status');

		 $CI->db->query("update settings set 
		  is_register = '0'
		  where id ='1'");
 
		
	}
	
	
	
		
	
}