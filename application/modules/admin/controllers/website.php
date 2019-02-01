<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class website extends MX_Controller {

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
		$data['settings'] = $CI->setting_model->get_setting();
		if ($CI->input->server('REQUEST_METHOD') === 'POST')
        {	
		//echo '<pre>'; print_r($_POST);die;
			$CI->load->library('form_validation');
			$CI->form_validation->set_rules('name', 'name', 'required');
			if ($CI->form_validation->run()==true)
            {
				$photo = array();
					if($_FILES['img'] ['name'] !='')
					{ 
						
					
						$config['upload_path'] = './uploads/';
						$config['allowed_types'] = '*';
						$config['max_size']	= '10000';
						$config['max_width']  = '10000';
						$config['max_height']  = '6000';
				
						$CI->load->library('upload', $config);
				
						if ( !$img = $CI->upload->do_upload('img'))
							{
								
							}
							else
							{
								$img_data = array('upload_data' => $CI->upload->data());
								$save['img'] = $img_data['upload_data']['file_name'];
							}
						
					}
				
				$save['name'] = $CI->input->post('name');
                $save['email'] = $CI->input->post('email');
                $save['title_email'] = $CI->input->post('title_email');
				$save['address'] = $CI->input->post('address');

			  	$CI->setting_model->update($save);
				
			
			   
			    $CI->session->set_flashdata('message', 'Successfully Added');
				redirect('admin/website');
				
			}
		}		
		
		
		$data['page_title'] = lang('genral_settings');
		$data['body'] = 'website/setting';
		$CI->load->view('template/main', $data);	

	}
	
	
	
	
	
}