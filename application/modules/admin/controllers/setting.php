<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class setting extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$CI->auth->check_access('1', true);
		$CI = get_instance();
		$CI->load->model("application_model");
		$CI->load->model("setting_model");
		
		
	}
	
	
	static function index(){
		$CI = get_instance();
		$data['get_data'] = $CI->application_model->get_data();
		$data['country'] = $CI->application_model->get_country();

		$data['page_title'] = lang('clients');
		$data['body'] = 'setting/setting';
		$CI->load->view('template/main', $data);	

	}
	
	
	
	static function update_1(){
		$CI = get_instance();
		
		$admin = $CI->session->userdata('admin');
		$admin_guid = $admin['admin_guid'];
		
		$users_whatapp = $CI->input->post('users_whatapp');
		$users_country = $CI->input->post('users_country');


		 $CI->db->query("update users_tb set 
		  users_whatapp = '$users_whatapp',
		  users_country = '$users_country'
		  where users_admin_id ='$admin_guid'");
		
			

	}
	
	
	static function update_2(){
		$CI = get_instance();
		
		$admin = $CI->session->userdata('admin');
		$admin_guid = $admin['admin_guid'];
		
		$admin_password = sha1($CI->input->post('admin_password'));


		 $CI->db->query("update admin_tb set 
		  admin_password = '$admin_password'
		  where admin_guid ='$admin_guid'");
		
			

	}
	
	
	static function setting_agent(){
		$CI = get_instance();
		$data['get_data'] = $CI->application_model->get_data();
		$data['country'] = $CI->application_model->get_country();

		$data['page_title'] = lang('clients');
		$data['body'] = 'setting/setting_agent';
		$CI->load->view('template/main', $data);	

	}
	
	
	static function setting_admin(){
		$CI = get_instance();
		$data['get_data'] = $CI->application_model->get_data();
		$data['country'] = $CI->application_model->get_country();

		$data['page_title'] = lang('clients');
		$data['body'] = 'setting/setting_admin';
		$CI->load->view('template/main', $data);	

	}
	
	

}