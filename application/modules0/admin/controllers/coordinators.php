<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class coordinators extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$CI = get_instance();
		$CI->load->model("coordinators_model");
	
	}
	
	
	static function index(){
		$CI = get_instance();
		
		$data['coordinators'] = $CI->coordinators_model->get_all();
		$data['body'] = 'coordinators/list';
		$CI->load->view('template/main', $data);	

	}	

	
	static function add(){
		$CI = get_instance();	
		$data['university'] = $CI->coordinators_model->get_university();
		
		if ($CI->input->server('REQUEST_METHOD') === 'POST')
        {	
			$CI->form_validation->set_rules('coordinators_name', 'Coordinator Name', 'required');
			$CI->form_validation->set_rules('coordinators_university', 'University', '');
			$CI->form_validation->set_rules('coordinators_email', 'Email', 'trim|required|valid_email|max_length[128]');
			
			if ($CI->form_validation->run()==true)
            {
				
				$photo = array();
					if($_FILES['coordinators_img'] ['name'] !='')
					{ 
						$config['upload_path'] = './uploads/images/';
						$config['allowed_types'] = '*';
						$config['max_size']	= '10000';
						$config['max_width']  = '10000';
						$config['max_height']  = '6000';
				
						$this->load->library('upload', $config);
				
						if ( !$img = $this->upload->do_upload('coordinators_img'))
							{
	
							}
							else
							{
								$img_data = array('upload_data' => $this->upload->data());
							}
						$save['coordinators_img'] = $img_data['upload_data']['file_name'];
					}
				
			
				
				$save['coordinators_name'] = $CI->input->post('coordinators_name');
                $save['coordinators_university'] = $CI->input->post('coordinators_university');
				$save['coordinators_phone'] = $CI->input->post('coordinators_phone');
				$save['coordinators_email'] = $CI->input->post('coordinators_email');
				$save['coordinators_created_on'] = date('Y-m-d H:i:s');
				

			    
				 $CI->coordinators_model->save($save);
				
                $CI->session->set_flashdata('message', 'Successfully added');
				redirect('admin/coordinators');
			}
			
		}		
		$data['page_title'] = lang('add') . lang('client');
		$data['body'] = 'coordinators/add';
		$CI->load->view('template/main', $data);	
}	
	
	
	public static function edit($id=false){
		$CI = get_instance();
		
		$data['coordinators'] = $CI->coordinators_model->get_coordinators($id);
		$data['university'] = $CI->coordinators_model->get_university();
		
		
		if ($CI->input->server('REQUEST_METHOD') === 'POST')
        {	
			
			$CI->form_validation->set_rules('coordinators_name', 'Coordinator Name', 'required');
			$CI->form_validation->set_rules('coordinators_university', 'University', '');
			$CI->form_validation->set_rules('coordinators_email', 'Email', 'trim|required|valid_email|max_length[128]');
			
			if ($CI->form_validation->run())
            {
				
				$photo = array();
					if($_FILES['coordinators_img'] ['name'] !='')
					{ 
						$config['upload_path'] = './uploads/images/';
						$config['allowed_types'] = '*';
						$config['max_size']	= '10000';
						$config['max_width']  = '10000';
						$config['max_height']  = '6000';
				
						$this->load->library('upload', $config);
				
						if ( !$img = $this->upload->do_upload('coordinators_img'))
							{
	
							}
							else
							{
								$img_data = array('upload_data' => $this->upload->data());
							}
						$save['coordinators_img'] = $img_data['upload_data']['file_name'];
					}
				
				
				
				$save['coordinators_name'] = $CI->input->post('coordinators_name');
                $save['coordinators_university'] = $CI->input->post('coordinators_university');
				$save['coordinators_phone'] = $CI->input->post('coordinators_phone');
				$save['coordinators_email'] = $CI->input->post('coordinators_email');
				
				$CI->coordinators_model->update($save,$id);
                $CI->session->set_flashdata('message', 'Successfully Updated' );
				redirect('admin/coordinators');
			}
			
			
		}
		$data['body'] = 'coordinators/edit';
		$CI->load->view('template/main', $data);	

	}	
	
	
	
static function set_upload_options()
	{  //  upload an image and document options
		$config = array();
		$config['upload_path'] = BASEPATH.'../uploads/documents/';
		$config['allowed_types'] = '*';
		$config['max_size'] = '0'; // 0 = no file size limit
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$config['overwrite'] = TRUE;
		return $config;
	}
	
	
	static function download($id)
	{
		$CI = get_instance();
		ob_clean(); 
		$CI->load->helper('download');
		$attach = $CI->coordinators_model->get_coordinators($id);
		$data = file_get_contents("./uploads/images/".$attach->coordinators_img); // Read the file's contents
		$name = $attach->coordinators_img;
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
	
	
	static function delete($id)
	{
		$document = $this->coordinators_model->get_coordinators($id);
		$file = BASEPATH.'../uploads/images/'.$document-coordinators_img;
		if (file_exists($file)) {
			unlink($file);
		}
		$this->coordinators_model->delete($id);
		$this->session->set_flashdata('message', 'Successfully Deleted');
		redirect('admin/coordinators');
	}
	
	
}