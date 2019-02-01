<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class coupons extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$CI = get_instance();
		$CI->load->model("coupons_model");
	
	}
	
	
	static function index(){
		$CI = get_instance();
		
		$data['coupons'] = $CI->coupons_model->get_all();
		$data['body'] = 'coupons/list';
		$CI->load->view('template/main', $data);	

	}	

	
	static function add(){
		$CI = get_instance();	
		$data['agents'] = $CI->coupons_model->get_agents();
		
		if ($CI->input->server('REQUEST_METHOD') === 'POST')
        {	
			$CI->form_validation->set_rules('coupons_agent_id', 'Agent Name', '');
			
			if ($CI->form_validation->run()==true)
            {
				
				
				$save['coupons_code'] = $CI->input->post('coupons_code');
                $save['coupons_agent_id'] = $CI->input->post('coupons_agent_id');
				$save['coupons_status'] = $CI->input->post('coupons_status');
				

			    
				 $CI->coupons_model->save($save);
				
                $CI->session->set_flashdata('message', 'Successfully added');
				redirect('admin/coupons');
			}
			
		}		
		$data['page_title'] = lang('add') . lang('client');
		$data['body'] = 'coupons/add';
		$CI->load->view('template/main', $data);	
}	
	
	
	public static function edit($id=false){
		$CI = get_instance();
		
		$data['coupons'] = $CI->coupons_model->get_coupons($id);
		$data['agents'] = $CI->coupons_model->get_agents();
		
		
		if ($CI->input->server('REQUEST_METHOD') === 'POST')
        {	
			
			$CI->form_validation->set_rules('coupons_agent_id', 'Agent Name', '');
			
			if ($CI->form_validation->run())
            {
				
				
				$save['coupons_code'] = $CI->input->post('coupons_code');
                $save['coupons_agent_id'] = $CI->input->post('coupons_agent_id');
				$save['coupons_status'] = $CI->input->post('coupons_status');
				
				$CI->coupons_model->update($save,$id);
                $CI->session->set_flashdata('message', 'Successfully Updated' );
				redirect('admin/coupons');
			}
			
			
		}
		$data['body'] = 'coupons/edit';
		$CI->load->view('template/main', $data);	

	}	
	
	
	static function delete($id)
	{
			$CI = get_instance();	
		$CI->coupons_model->delete($id);
		$CI->session->set_flashdata('message', 'Successfully Deleted');
		redirect('admin/coupons');
	}
	
	
	static function get_guid(){
		$CI = get_instance();
		$agent = $CI->coupons_model->get_guid($_POST['agent_id']);
		echo $agent->agents_user_id;
		
	}
	
	
}