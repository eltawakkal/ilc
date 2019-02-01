<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lang_center extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$CI = get_instance();
		$CI->load->model("lang_center_model");
	
	}
	
	
	static function index(){
		$CI = get_instance();
		
		$data['language'] = $CI->lang_center_model->get_all_language();
		$data['body'] = 'lang_center/list';
		$CI->load->view('template/main', $data);	

	}	

	
	static function add(){
		$CI = get_instance();
		$data['services'] = $CI->lang_center_model->get_all();
		
		if ($CI->input->server('REQUEST_METHOD') === 'POST')
        {	
		
			
			$CI->form_validation->set_rules('language_center_name', 'Language center', 'required');
			if ($CI->form_validation->run()==true)
            {

				$save['language_center_name'] = $CI->input->post('language_center_name');
                $save['language_center_address'] = $CI->input->post('language_center_address');


				 $CI->lang_center_model->save($save);
				
                $CI->session->set_flashdata('message', 'Successfully added');
				redirect('admin/lang_center');
			
			}	
		}
		$data['page_title'] = lang('add') . lang('client');
		$data['body'] = 'lang_center/add';
		$CI->load->view('template/main', $data);	
}	

	static function edit($id){
		$CI = get_instance();
		$data['language'] = $CI->lang_center_model->get_language($id);
		
		if ($CI->input->server('REQUEST_METHOD') === 'POST')
        {	
		
			
			$CI->form_validation->set_rules('language_center_name', 'Language center', 'required');
			if ($CI->form_validation->run()==true)
            {

				$save['language_center_name'] = $CI->input->post('language_center_name');
                $save['language_center_address'] = $CI->input->post('language_center_address');

				 $CI->lang_center_model->update($save,$id);
				
                $CI->session->set_flashdata('message', 'Successfully updated');
				redirect('admin/lang_center');
			
			}	
		}
		$data['page_title'] = lang('add') . lang('client');
		$data['body'] = 'lang_center/edit';
		$CI->load->view('template/main', $data);	
}
	
	static function delete($id)
	{
		$CI = get_instance();
		$CI->lang_center_model->delete($id);
		$this->session->set_flashdata('message', lang('document_deleted'));
		redirect('admin/lang_center');
	}
	
	
}