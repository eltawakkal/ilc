<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class another_std extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$CI->auth->check_access('1', true);
		$CI = get_instance();
		$CI->load->model("another_std_model");	
		
	}
	
	
	static function index(){
		$CI = get_instance();
		
		$data['page_title'] = lang('clients');
		$data['body'] = 'another_std/list';
		$CI->load->view('template/main', $data);	

	}
	

	static function upgrade(){
		
		$CI =& get_instance();
		
		$admin = $CI->session->userdata('admin');
		$admin_guid= $admin['admin_guid'];


		 $CI->db->query("update admin_tb set 
		  admin_role = '2'
		  where admin_guid ='$admin_guid'");
		  
		 
		
	}
	
	
	
	

	
}