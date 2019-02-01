<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class institutions extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$CI = get_instance();
		$CI->load->model("institutions_model");
	
	}
	
	
	static function index(){
		$CI = get_instance();
		
		$data['universitys'] = $CI->institutions_model->get_all_university();
		$data['body'] = 'institutions/list';
		$CI->load->view('template/main', $data);	

	}	

	
	static function add(){
		$CI = get_instance();
		$data['services'] = $CI->institutions_model->get_all();
		
		if ($CI->input->server('REQUEST_METHOD') === 'POST')
        {	
		
			
			$CI->form_validation->set_rules('university_name', 'University Name', 'required');
			$CI->form_validation->set_rules('university_type', 'University Type', 'required');		
			if ($CI->form_validation->run()==true)
            {

				$save['university_name'] = $CI->input->post('university_name');
                $save['university_type'] = $CI->input->post('university_type');

				 $CI->institutions_model->save($save);
				
                $CI->session->set_flashdata('message', 'Successfully added');
				redirect('admin/institutions');
			
			}	
		}
		$data['page_title'] = lang('add') . lang('client');
		$data['body'] = 'institutions/add';
		$CI->load->view('template/main', $data);	
}	

	static function edit($id){
		$CI = get_instance();
		$data['services'] = $CI->institutions_model->get_all();
		$data['institution'] = $CI->institutions_model->get_institutions($id);
		
		if ($CI->input->server('REQUEST_METHOD') === 'POST')
        {	
		
			
			$CI->form_validation->set_rules('university_name', 'University Name', 'required');
			$CI->form_validation->set_rules('university_type', 'University Type', 'required');		
			if ($CI->form_validation->run()==true)
            {

				$save['university_name'] = $CI->input->post('university_name');
                $save['university_type'] = $CI->input->post('university_type');

				 $CI->institutions_model->update($save,$id);
				
                $CI->session->set_flashdata('message', 'Successfully updated');
				redirect('admin/institutions');
			
			}	
		}
		$data['page_title'] = lang('add') . lang('client');
		$data['body'] = 'institutions/edit';
		$CI->load->view('template/main', $data);	
}
	
	static function delete($id)
	{
		$this->institutions_model->delete($id);
		$this->session->set_flashdata('message', lang('document_deleted'));
		redirect('admin/institutions');
	}
	
	
}