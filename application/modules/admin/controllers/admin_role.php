<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_role extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$CI->auth->check_access('1', true);
		$CI = get_instance();
		$CI->load->model("admin_role_model");
		
	}
	
	
	static function index(){
		$CI = get_instance();
		$data['roles'] = $CI->admin_role_model->get_all();
		$data['page_title'] = lang('admin_roles');
		$data['body'] = 'admin_roles/list';
		$CI->load->view('template/main', $data);	

	}	
	
	static function add(){
		$CI = get_instance();
		if ($CI->input->server('REQUEST_METHOD') === 'POST')
        {	
			$CI->load->library('form_validation');
			//$CI->form_validation->set_rules('name', 'lang:name', 'required','please enter your name');
			//$CI->form_validation->set_message('required', lang('custom_required'));
			$CI->form_validation->set_rules('name', 'lang:name', 'required');
			//$CI->form_validation->set_message('required', '%s can not be blank');
			 
			if ($CI->form_validation->run()==true)
            {
				$save['name'] = $CI->input->post('name');
				$save['description'] = $CI->input->post('description');
                
				$CI->admin_role_model->save($save);
                $CI->session->set_flashdata('message', lang('admin_role saved'));
				redirect('admin/admin_role');
			}
		}		
		
		
		$data['page_title'] = lang('add') . lang('admin_role');
		$data['body'] = 'admin_roles/add';
		
		
		$CI->load->view('template/main', $data);	
	}	
	
	
	static function edit($id=false){
		$CI = get_instance();
		$data['admin_role'] = $CI->admin_role_model->get($id);
		$data['id'] =$id;
		if ($CI->input->server('REQUEST_METHOD') === 'POST')
        {	
			$CI->load->library('form_validation');
			$CI->form_validation->set_rules('name', 'lang:name', 'required');
			 $CI->form_validation->set_message('required', lang('custom_required'));
			 
			if ($CI->form_validation->run()==true)
            {
				$save['name'] = $CI->input->post('name');
				$save['description'] = $CI->input->post('description');
				
				$CI->admin_role_model->update($save,$id);
               	$CI->session->set_flashdata('message', lang('admin_role_updated'));
				redirect('admin/admin_role');
			}
		}		
	
		$data['page_title'] = lang('edit') . lang('admin_role');
		$data['body'] = 'admin_roles/edit';
		$CI->load->view('template/main', $data);	

	}	
	
	static function delete($id=false){
		$CI = get_instance();
		if($id){
			$CI->admin_role_model->delete($id);
			$CI->session->set_flashdata('message',lang('admin_role_deleted'));
			redirect('admin/admin_role');
			
		}
		
	function _custom_required($str, $func) {
		$CI = get_instance();
     	   switch($func) {
            case 'name':
                $CI->form_validation->set_message('custom_required', 'Enter your name');
                return (trim($str) == '') ? FALSE : TRUE;
                break;
            case 'second':
                $CI->form_validation->set_message('custom_required', 'The variables are required');
                return (trim($str) == '') ? FALSE : TRUE;
                break;
        }
    }
	}	
		
	
}

class MY_Form_validation {
    public function custom_required($str) {
        if ( ! is_array($str)) {
            return (trim($str) == '') ? FALSE : TRUE;
        } else {
            return ( ! empty($str));
        }
    }
}
	
class MY_Form_validation1 extends CI_Form_validation {

    public function __construct()
    {
        parent::__construct();
    }
    function required_select($input)
    {
		$CI = get_instance();
        $CI->set_message('required_select','select %s');
        return FALSE;
    }

	
}