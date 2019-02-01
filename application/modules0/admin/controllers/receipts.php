<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class receipts extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$CI = get_instance();
		$CI->load->model("receipts_model");
	
	}
	
	
	static function index(){
		$CI = get_instance();
		
		$data['receipts'] = $CI->receipts_model->get_all();
		$data['body'] = 'receipts/list';
		$CI->load->view('template/main', $data);	

	}	

	
	static function add(){
		$CI = get_instance();
		$admin = $CI->session->userdata('admin');
		$admin_guid= $admin['admin_guid'];
		$data['all_std'] = $CI->receipts_model->get_all_std();
		
		
		if ($CI->input->server('REQUEST_METHOD') === 'POST')
        {	
			$CI->form_validation->set_rules('receipts_university', 'University Name', 'required');
			$CI->form_validation->set_rules('receipts_std_id', 'Student Name', '');
			
			if ($CI->form_validation->run()==true)
            {
				
				$photo = array();
					if($_FILES['receipts_img'] ['name'] !='')
					{ 
						$config['upload_path'] = './uploads/images/';
						$config['allowed_types'] = '*';
						$config['max_size']	= '10000';
						$config['max_width']  = '10000';
						$config['max_height']  = '6000';
				
						$this->load->library('upload', $config);
				
						if ( !$img = $this->upload->do_upload('receipts_img'))
							{
	
							}
							else
							{
								$img_data = array('upload_data' => $this->upload->data());
							}
						$save['receipts_img'] = $img_data['upload_data']['file_name'];
					}
				
			
				
				$save['receipts_university'] = $CI->input->post('receipts_university');
                $save['receipts_std_id'] = $CI->input->post('receipts_std_id');
				$save['receipts_fund_status'] = $CI->input->post('receipts_fund_status');
				$save['receipts_fund'] = $CI->input->post('receipts_fund');
                $save['receipts_date'] = $CI->input->post('receipts_date');
				$save['receipts_created_on'] = date('Y-m-d H:i:s');
				

			    
				 $CI->receipts_model->save($save);
				
                $CI->session->set_flashdata('message', 'Successfully added');
				redirect('admin/receipts');
			}
			
		}		
		$data['page_title'] = lang('add') . lang('client');
		$data['body'] = 'receipts/add';
		$CI->load->view('template/main', $data);	
}	
	
	
	public static function edit($id=false){
		$CI = get_instance();
		$data['receipts'] = $CI->receipts_model->get_receipts($id);
		$data['all_std'] = $CI->receipts_model->get_all_std();
		
		
		if ($CI->input->server('REQUEST_METHOD') === 'POST')
        {	
			
			$CI->form_validation->set_rules('receipts_university', 'University Name', 'required');
			$CI->form_validation->set_rules('receipts_std_id', 'Student Name', '');
			
			if ($CI->form_validation->run())
            {
				
				$photo = array();
					if($_FILES['receipts_img'] ['name'] !='')
					{ 
						$config['upload_path'] = './uploads/images/';
						$config['allowed_types'] = '*';
						$config['max_size']	= '10000';
						$config['max_width']  = '10000';
						$config['max_height']  = '6000';
				
						$this->load->library('upload', $config);
				
						if ( !$img = $this->upload->do_upload('receipts_img'))
							{
	
							}
							else
							{
								$img_data = array('upload_data' => $this->upload->data());
							}
						$save['receipts_img'] = $img_data['upload_data']['file_name'];
					}
				
				
				
				$save['receipts_university'] = $CI->input->post('receipts_university');
                $save['receipts_std_id'] = $CI->input->post('receipts_std_id');
				$save['receipts_fund_status'] = $CI->input->post('receipts_fund_status');
				$save['receipts_fund'] = $CI->input->post('receipts_fund');
                $save['receipts_date'] = $CI->input->post('receipts_date');
				
				$CI->receipts_model->update($save,$id);
                $CI->session->set_flashdata('message', 'Successfully Updated' );
				redirect('admin/receipts');
			}
			
			
		}
		$data['body'] = 'receipts/edit';
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
		$attach = $CI->receipts_model->get_receipts($id);
		$data = file_get_contents("./uploads/images/".$attach->receipts_img); // Read the file's contents
		$name = $attach->receipts_img;
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
		$document = $this->receipts_model->get_receipts($id);
		$file = BASEPATH.'../uploads/images/'.$document->receipts_img;
		if (file_exists($file)) {
			unlink($file);
		}
		$this->receipts_model->delete($id);
		$this->session->set_flashdata('message', 'Successfully Deleted');
		redirect('admin/receipts');
	}
	
	
}