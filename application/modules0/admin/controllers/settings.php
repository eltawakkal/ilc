<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class settings extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$CI = get_instance();
		//$CI->auth->check_access('1', true);
		$CI->load->model("cases_model");
		$CI->load->model("setting_model");
		$CI->load->model("canned_message_model");
		
	}
	
	

	static function index(){
		$CI = get_instance();
		$data['settings'] = $CI->setting_model->get_setting();
		$data['days'] = $CI->setting_model->get_days();
		if ($CI->input->server('REQUEST_METHOD') === 'POST')
        {	
		//echo '<pre>'; print_r($_POST);die;
			$CI->load->library('form_validation');
			$CI->form_validation->set_rules('name', 'lang:company_name', 'required');
			$CI->form_validation->set_message('required', lang('custom_required'));
			if ($CI->form_validation->run()==true)
            {
				$photo = array();
					if($_FILES['img'] ['name'] !='')
					{ 
						
					
						$config['upload_path'] = './assets/uploads/images/';
						$config['allowed_types'] = 'gif|jpg|png';
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
								$save['image'] = $img_data['upload_data']['file_name'];
							}
						
					}
				
				$save['name'] = $CI->input->post('name');
				$save['address'] = $CI->input->post('address');
				$save['header_setting'] = $CI->input->post('header_setting');
				$save['contact'] = $CI->input->post('contact');
				$save['email'] = $CI->input->post('email');
				$save['employee_id'] = $CI->input->post('employee_id');
				$save['date_format'] = $CI->input->post('date_format');
				$save['timezone'] = $CI->input->post('timezone');
				$save['smtp_host'] = $CI->input->post('smtp_host');
				$save['smtp_user'] = $CI->input->post('smtp_user');
				$save['smtp_pass'] = $CI->input->post('smtp_pass');
				$save['smtp_port'] = $CI->input->post('smtp_port');
				$save['mark_out_time'] = $CI->input->post('mark_out_time');
				$save['invoice_no'] = $CI->input->post('invoice_no');
			  	$CI->setting_model->update($save);
				
				if(isset($_POST['days'])){	               
				   foreach($_POST['days'] as $key => $val){
						$CI->setting_model->update_days($key,$val);
				   }
				 }  
			   
			    $CI->session->set_flashdata('message', lang('general_settings_updated'));
				redirect('admin/settings');
				
			}
		}		
		
		
		$data['page_title'] = lang('genral_settings');
		$data['body'] = 'setting/setting';
		$CI->load->view('template/main', $data);	

	}
	
	static function canned_messages()
    {
		$CI = get_instance();
        $data['canned_messages'] = $CI->canned_message_model->get_list();
        $data['body'] = 'canned_message/canned_messages';
		 $data['page_title'] = lang('canned_messages');
		$CI->load->view('template/main', $data);	
    }

  
    static function canned_message_form($id=false)
    {
		$CI = get_instance();
        $data['page_title'] = lang('canned_message_form');

        $data['id']         = $id;
        $data['name']       = '';
        $data['subject']    = '';
        $data['content']    = '';
        $data['deletable']  = 1;
        
        if($id)
        {
            $message = $CI->canned_message_model->get_message($id);
                        
            $data['name']       = $message['name'];
            $data['subject']    = $message['subject'];
            $data['content']    = $message['content'];
            $data['deletable']  = $message['deletable'];
        }
        
        $CI->load->helper('form');
        $CI->load->library('form_validation');
        
        $CI->form_validation->set_rules('name', 'lang:message_name', 'trim|required|max_length[50]');
        $CI->form_validation->set_rules('subject', 'lang:subject', 'trim|required|max_length[100]');
        $CI->form_validation->set_rules('content', 'lang:message_content', 'trim|required');
        
        if ($CI->form_validation->run() == FALSE)
        {
            $data['errors'] = validation_errors();
            
			$data['body'] = 'canned_message/canned_message_form';
			$CI->load->view('template/main', $data);	
        }
        else
        {
            
            $save['id']         = $id;
            $save['name']       = $CI->input->post('name');
            $save['subject']    = $CI->input->post('subject');
            $save['content']    = $CI->input->post('content');
            
            //all created messages are typed to order so admins can send them from the view order page.
            if($data['deletable'])
            {
                $save['type'] = 'order';
            }
            $CI->canned_message_model->save_message($save);
            
            $CI->session->set_flashdata('message', lang('message_saved_message'));
            redirect('admin/settings/canned_messages');
        }
    }
    
    static function delete_message($id)
    {
		$CI = get_instance();
        $CI->canned_message_model->delete_message($id);
        
        $CI->session->set_flashdata('message', lang('message_deleted_message'));
        redirect('admin/settings/canned_messages');
    }	
	
	
		
	
}