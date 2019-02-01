<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admins extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$CI = get_instance();
		$CI->load->model("admins_model");
	
	}
	
	
	static function index(){
		$CI = get_instance();
		
		$data['admins'] = $CI->admins_model->get_all();
		$data['body'] = 'admins/list';
		$CI->load->view('template/main', $data);	

	}	

	
	static function add(){
		$CI = get_instance();
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$auth = new admins();
		
		if ($CI->input->server('REQUEST_METHOD') === 'POST')
        {	
			$CI->form_validation->set_rules('admin_email', 'Email', 'trim|required|valid_email|max_length[128]|is_unique[admin_tb.admin_email]');
			$CI->form_validation->set_rules('admin_password', 'Password', 'required|min_length[6]');
			$CI->form_validation->set_rules('admin_confirm', 'Confirm Password', 'required|matches[admin_password]');
			
			if ($CI->form_validation->run()==true)
            {
				
				$save['admin_guid'] =$auth->generateRandomString(8);
				$save['admin_email'] = $CI->input->post('admin_email');
				$save['admin_password'] = sha1($CI->input->post('admin_password'));
				$save['admin_role'] =4;
				$save['admin_created_on'] = date('Y-m-d H:i:s');
				

			    
				 $CI->admins_model->save($save);
				
                $CI->session->set_flashdata('message', 'Successfully added');
				redirect('admin/admins');
			}
			
		}		
		$data['page_title'] = lang('add') . lang('client');
		$data['body'] = 'admins/add';
		$CI->load->view('template/main', $data);	
}	
	
	
	public static function edit($id=false){
		$CI = get_instance();
		
		$data['admins'] = $CI->admins_model->get_admins($id);
		
		
		if ($CI->input->server('REQUEST_METHOD') === 'POST')
        {	
			
			$CI->form_validation->set_rules('admin_password', 'Password', 'required|min_length[6]');
			$CI->form_validation->set_rules('admin_confirm', 'Confirm Password', 'required|matches[admin_password]');
			
			if ($CI->form_validation->run())
            {

				
				$save['admin_email'] = $CI->input->post('admin_email');
				$save['admin_password'] = sha1($CI->input->post('admin_password'));
				
				$CI->admins_model->update($save,$id);
                $CI->session->set_flashdata('message', 'Successfully Updated' );
				redirect('admin/admins');
			}
			
			
		}
		$data['body'] = 'admins/edit';
		$CI->load->view('template/main', $data);	

	}	
	

	static function delete($id)
	{
		
		$this->admins_model->delete($id);
		$this->session->set_flashdata('message', 'Successfully Deleted');
		redirect('admin/admins');
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