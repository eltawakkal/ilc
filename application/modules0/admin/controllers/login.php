<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	
	static function index()
	{	
	$CI = get_instance();
		$redirect	= $CI->auth->is_logged_in(false, false);
		if($redirect)
		{
			redirect('admin/dashboard');
		}
		
		
		$CI->load->helper('form');
		$data['redirect']	= $CI->session->flashdata('redirect');
		$submitted 			= $CI->input->post('submitted');
		if ($submitted)
		{
			$username	= $CI->input->post('username');
			$password	= $CI->input->post('password');
			$remember   = $CI->input->post('remember');
			$redirect	= $CI->input->post('redirect');
			$login		= $CI->auth->login_admin($username, $password, $remember);
           
			$redirect = site_url('admin/dashboard');
			if ($login)
			{
				if ($redirect == '')
				{
					$redirect = site_url('admin/dashboard');
				}
				redirect($redirect);
			}
			else
			{
				//this adds the redirect back to flash data if they provide an incorrect credentials
				$CI->session->set_flashdata('redirect', $redirect);
				$CI->session->set_flashdata('error', lang('authenication_failed'));
				redirect('admin/login');
			}
		}
		$CI->load->view('login/login', $data);
	}
	
	static function logout()
	{
		$CI = get_instance();
		$CI->auth->logout();
		
		//when someone logs out, automatically redirect them to the login page.
		$CI->session->set_flashdata('message', lang('log_out'));
		redirect('admin/login');
	}

		
	
}