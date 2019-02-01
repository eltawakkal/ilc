static static <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$CI->auth->check_access('1', true);
		$CI = get_instance();
		$CI->load->model("employees_model");
		$CI->load->model("custom_field_model");
		$CI->load->library('form_validation');
	}
	
	
	function index(){
		$CI = get_instance();
		$data['employees'] = $CI->employees_model->get_all_clients();
		$data['page_title'] = lang('clients');
		$data['body'] = 'employees/list';
		$CI->load->view('template/main', $data);	

	}	
	
	
	function export(){
		$CI = get_instance();
		$data['employees'] = $CI->employees_model->get_all_clients();
		$CI->load->view('employees/export', $data);	

	}	
	
	function add(){
		$CI = get_instance();
		$data['roles'] = $CI->admin_role_model->get_all();
		$data['services'] = $CI->employees_model->get_services();
		$data['schools'] = $CI->employees_model->get_schools();
		if ($CI->input->server('REQUEST_METHOD') === 'POST')
        {	
			 
			$CI->load->library('form_validation');
			$CI->form_validation->set_message('required', lang('custom_required'));
			$CI->form_validation->set_rules('admin_name', 'lang:name', 'required');
            $CI->form_validation->set_rules('admin_email', 'lang:email', 'trim|valid_email|max_length[128]|is_unique[admin_tb.admin_email]');
			$CI->form_validation->set_rules('admin_username', 'lang:username', 'trim|required|is_unique[admin_tb.admin_username]');
			$CI->form_validation->set_rules('admin_password', 'lang:password', 'required|min_length[6]');
			$CI->form_validation->set_rules('admin_confirm', 'lang:confirm_password', 'required|matches[admin_password]');
			$CI->form_validation->set_rules('admin_phone', 'lang:phone', '');
			
           
			if ($CI->form_validation->run()==true)
            {
			
				
				$save['admin_name'] = $CI->input->post('admin_name');
                $save['admin_email'] = $CI->input->post('admin_email');
				$save['admin_school_id'] = $CI->input->post('admin_school_id');
				$save['admin_services_id'] = $CI->input->post('admin_services_id');
				$save['admin_username'] = $CI->input->post('admin_username');
				$save['admin_password'] = sha1($CI->input->post('admin_password'));
                $save['admin_phone'] = $CI->input->post('admin_phone');
				$save['admin_role'] = $CI->input->post('admin_role_id');

			    
				$p_key = $CI->employees_model->save($save);
				
				
                $CI->session->set_flashdata('message', 'تم اضافة المستخدم بنجاح');
				redirect('admin/employees');
			}
			
		}		
		$data['page_title'] = lang('add') . lang('client');
		$data['body'] = 'employees/add';
		$CI->load->view('template/main', $data);	
}	
	

	
	function edit($id=false){
		$CI = get_instance();
		$data['roles'] = $CI->admin_role_model->get_all();
		$data['services'] = $CI->employees_model->get_services();
		$data['schools'] = $CI->employees_model->get_schools();
		
		$data['employees'] = $CI->employees_model->get_client_by_id($id);
		if ($CI->input->server('REQUEST_METHOD') === 'POST')
        {	
			$CI->load->library('form_validation');
			$CI->form_validation->set_message('required', lang('custom_required'));
			$CI->form_validation->set_rules('admin_name', 'lang:name', 'required');
            $CI->form_validation->set_rules('admin_email', 'lang:email', 'trim|valid_email|max_length[128]');
			$CI->form_validation->set_rules('admin_username', 'lang:username', 'trim|required|');
			
			if ($CI->input->post('admin_password') != '' || $CI->input->post('admin_confirm') != '' || !$id)
			{
				$CI->form_validation->set_rules('admin_password', 'lang:password', 'required|min_length[6]');
				$CI->form_validation->set_rules('admin_confirm', 'lang:confirm_password', 'required|matches[admin_password]');
			}
			
			if ($CI->form_validation->run())
            {
				
				$save['admin_name'] = $CI->input->post('admin_name');
                $save['admin_email'] = $CI->input->post('admin_email');
				$save['admin_username'] = $CI->input->post('admin_username');
				$save['admin_school_id'] = $CI->input->post('admin_school_id');
				$save['admin_services_id'] = $CI->input->post('admin_services_id');
                $save['admin_phone'] = $CI->input->post('admin_phone');
				$save['admin_role'] = $CI->input->post('admin_role');
				

			   if ($CI->input->post('admin_password') != '' || !$id)
				{
					$save['admin_password']	= sha1($CI->input->post('admin_password'));
				}
 
				$CI->employees_model->update($save,$id);
                $CI->session->set_flashdata('message', 'تم تعديل المستخدم بنجاح');
				redirect('admin/employees');
			}
			
			
		}
		$data['page_title'] = lang('edit') . lang('client');
		$data['body'] = 'employees/edit';
		$CI->load->view('template/main', $data);	

	}	
	
	function view_client($id=false){
		$CI = get_instance();
		$data['fields'] = $CI->custom_field_model->get_custom_fields(1);	
		$data['employees'] = $CI->employees_model->get_client_by_id($id);
		$data['page_title'] = lang('view') . lang('client');
		$data['body'] = 'employees/view';
		$CI->load->view('template/main', $data);	
	}	
	


	function delete($id=false){
		$CI = get_instance();
		if($id){
			$CI->employees_model->delete($id);
			$CI->session->set_flashdata('message','تم حذف المستخدم بنجاح');
			redirect('admin/employees');
		}
	}	
		
	
}