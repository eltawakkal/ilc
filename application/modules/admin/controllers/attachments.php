<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class attachments extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$CI = get_instance();
		$CI->load->model("attachments_model");
	
	}
	
	
	static function index(){
		$CI = get_instance();
		
		$data['attachments'] = $CI->attachments_model->get_all();
		$data['body'] = 'attachments/list';
		$CI->load->view('template/main', $data);	

	}	

	
	static function add(){
		$CI = get_instance();
		$auth = new attachments();
		$admin = $CI->session->userdata('admin');
		$admin_guid= $admin['admin_guid'];
		
		if ($CI->input->server('REQUEST_METHOD') === 'POST')
        {	
		
			$this->load->library('upload');
			$files = $_FILES;
			$cpt = count($_FILES['attachs_file']['name']);
			//echo $cpt;die;
				for($i=0; $i<$cpt; $i++)
				{           
					$_FILES['userfile']['name']= $files['attachs_file']['name'][$i];
					$_FILES['userfile']['type']= $files['attachs_file']['type'][$i];
					$_FILES['userfile']['tmp_name']= $files['attachs_file']['tmp_name'][$i];
					$_FILES['userfile']['error']= $files['attachs_file']['error'][$i];
					$_FILES['userfile']['size']= $files['attachs_file']['size'][$i];    
					
					//Title Name
					$attachs_title = $_POST['attachs_title'][$i];
					$this->upload->initialize($auth->set_upload_options());
					$this->upload->do_upload();
					
					$save['attachs_file'] = $_FILES['userfile']['name'];
					$save['attachs_user_id'] = $admin_guid;
					$save['attachs_title'] = $attachs_title;
					
					$this->attachments_model->save_document($save);
				
				}
			$this->session->set_flashdata('message', 'Added Successfully');
			redirect('admin/attachments');
			
		}		
		$data['page_title'] = lang('add') . lang('client');
		$data['body'] = 'attachments/add';
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
		//ob_clean(); 
		$CI->load->helper('download');
		$attach = $CI->attachments_model->get_attach_by_id($id);
		$data = file_get_contents("./uploads/documents/".$attach->attachs_file); // Read the file's contents
		$name = $attach->attachs_file;
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
		$document = $this->attachments_model->get_document($id);
		$file = BASEPATH.'../uploads/documents/'.$document->attachs_title;
		if (file_exists($file)) {
			unlink($file);
		}
		$this->attachments_model->delete_document($id);
		$this->session->set_flashdata('message', lang('document_deleted'));
		redirect('admin/attachments');
	}
	
	
}