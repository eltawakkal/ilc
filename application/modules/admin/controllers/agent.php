<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class agent extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$CI->auth->check_access('1', true);
		$CI = get_instance();
		$CI->load->model("agent_model");
		$CI->load->model("application_model");
		
		
	}
	
	
	
	static function view($id=false){
		$CI = get_instance();
		$data['user'] = $CI->application_model->get_user_by_id($id);
		$data['body'] = 'application/view';
		$CI->load->view('template/main', $data);	
	}	
	
	
	static function index(){
		$CI = get_instance();
		$data['country'] = $CI->application_model->get_country();
		$data['get_data'] = $CI->agent_model->get_data();
		
		$data['page_title'] = lang('clients');
		$data['body'] = 'agent/list';
		$CI->load->view('template/main', $data);	

	}
	
	static function list_agent(){
		$CI = get_instance();
		$data['country'] = $CI->application_model->get_country();
		$data['agents'] = $CI->agent_model->get_all_agents();
		
		$data['page_title'] = lang('clients');
		$data['body'] = 'agent/list_agent';
		$CI->load->view('template/main', $data);	

	}
	
	static function add_agent(){
		$CI = get_instance();
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$auth = new agent();
		
		$admin = $CI->session->userdata('admin');
		$admin_guid= $admin['admin_guid'];

		
		$data['country'] = $CI->application_model->get_country();
		
		if ($CI->input->server('REQUEST_METHOD') === 'POST')
        {	
			$CI->form_validation->set_rules('agents_apply_for', 'Apply for', 'required');
			$CI->form_validation->set_rules('agents_country', 'Country', '');
			
			
			if ($CI->form_validation->run()==true)
            {
				
				$save['agents_user_id'] = $admin_guid;
				$save['agents_apply_for'] = $CI->input->post('agents_apply_for');
				$save['agents_company_name'] = $CI->input->post('agents_company_name');
				$save['agents_type_business'] = $CI->input->post('agents_type_business');
				$save['agents_position'] = $CI->input->post('agents_position');
				$save['agents_person_charge'] = $CI->input->post('agents_person_charge');
				$save['agents_person_charge_contact_number'] = $CI->input->post('agents_person_charge_contact_number');
                $save['agents_fullname'] = $CI->input->post('agents_fullname');
				$save['agents_country'] = $CI->input->post('agents_country');
				$save['agents_address'] = $CI->input->post('agents_address');
				$save['agents_phone'] = $CI->input->post('agents_phone');
				$save['agents_account_no'] = $CI->input->post('agents_account_no');
				$save['agents_paypal'] = $CI->input->post('agents_paypal');
				$save['agents_account_name'] = $CI->input->post('agents_account_name');
				$save['agents_bank_name'] = $CI->input->post('agents_bank_name');
				$save['agents_swift'] = $CI->input->post('agents_swift');
				$save['agents_bank_address'] = $CI->input->post('agents_bank_address');
				$save['agents_created_on'] = date('Y-m-d H:i:s');
				
				/*$savee['admin_guid'] = $admin_guid;
				$savee['admin_email'] = $CI->input->post('admin_email');
				$savee['admin_role'] = 2;
				$savee['admin_password'] = sha1($CI->input->post('admin_password'));
*/
			     //$CI->agent_model->save_admin($savee);
				 $CI->agent_model->save($save);
				
                $CI->session->set_flashdata('message', 'Successfully added');
				redirect('admin/agent/list_agent');
			}
			
		}		
		
		

	}
	
	
	
	
	static function add(){
		$CI = get_instance();
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$auth = new agent();

		$admin_guid= $auth->generateRandomString(8);
		
		$data['country'] = $CI->application_model->get_country();
		
		if ($CI->input->server('REQUEST_METHOD') === 'POST')
        {	
			$CI->form_validation->set_rules('agents_apply_for', 'Apply for', 'required');
			$CI->form_validation->set_rules('agents_country', 'Country', '');
			$CI->form_validation->set_rules('admin_email', 'Email', 'trim|required|valid_email|max_length[128]|is_unique[admin_tb.admin_email]');
			$CI->form_validation->set_rules('admin_confirm', 'Confirm Password', 'required|matches[admin_password]');
			
			if ($CI->form_validation->run()==true)
            {
				
				$save['agents_user_id'] = $admin_guid;
				$save['agents_apply_for'] = $CI->input->post('agents_apply_for');
				$save['agents_company_name'] = $CI->input->post('agents_company_name');
				$save['agents_type_business'] = $CI->input->post('agents_type_business');
				$save['agents_position'] = $CI->input->post('agents_position');
				$save['agents_person_charge'] = $CI->input->post('agents_person_charge');
				$save['agents_person_charge_contact_number'] = $CI->input->post('agents_person_charge_contact_number');
				
				$save['agents_swift'] = $CI->input->post('agents_swift');
                $save['agents_fullname'] = $CI->input->post('agents_fullname');
				$save['agents_country'] = $CI->input->post('agents_country');
				$save['agents_address'] = $CI->input->post('agents_address');
				$save['agents_phone'] = $CI->input->post('agents_phone');
				$save['agents_account_no'] = $CI->input->post('agents_account_no');
				$save['agents_paypal'] = $CI->input->post('agents_paypal');
				$save['agents_account_name'] = $CI->input->post('agents_account_name');
				$save['agents_bank_name'] = $CI->input->post('agents_bank_name');
				$save['agents_bank_address'] = $CI->input->post('agents_bank_address');
				$save['agents_created_on'] = date('Y-m-d H:i:s');
				
				$savee['admin_guid'] = $admin_guid;
				$savee['admin_email'] = $CI->input->post('admin_email');
				$savee['admin_role'] = 2;
				$savee['admin_password'] = sha1($CI->input->post('admin_password'));

			    $CI->agent_model->save_admin($savee);
				 $CI->agent_model->save($save);
				
                $CI->session->set_flashdata('message', 'Successfully added');
				redirect('admin/agent/list_agent');
			}
			
		}		
		
		$data['page_title'] = lang('clients');
		$data['body'] = 'agent/add';
		$CI->load->view('template/main', $data);	

	}
	
	
	static function edit($id=false){
		$CI = get_instance();
		$data['country'] = $CI->application_model->get_country();
		$data['agents'] = $CI->agent_model->get_agent_by_id($id);
		if ($CI->input->server('REQUEST_METHOD') === 'POST')
        {	
			$CI->form_validation->set_rules('agents_apply_for', 'apply for', 'required');
			$CI->form_validation->set_rules('agents_country', 'Country', '');
			//$CI->form_validation->set_rules('admin_email', 'Email', 'trim|required|valid_email|max_length[128]');


			
			if ($CI->form_validation->run())
            {
				$save['agents_apply_for'] = $CI->input->post('agents_apply_for');
				$save['agents_company_name'] = $CI->input->post('agents_company_name');
				$save['agents_type_business'] = $CI->input->post('agents_type_business');
				$save['agents_position'] = $CI->input->post('agents_position');
				$save['agents_person_charge'] = $CI->input->post('agents_person_charge');
				$save['agents_person_charge_contact_number'] = $CI->input->post('agents_person_charge_contact_number');
				
				$save['agents_swift'] = $CI->input->post('agents_swift');
                $save['agents_fullname'] = $CI->input->post('agents_fullname');
				$save['agents_country'] = $CI->input->post('agents_country');
				$save['agents_address'] = $CI->input->post('agents_address');
				$save['agents_phone'] = $CI->input->post('agents_phone');
				$save['agents_account_no'] = $CI->input->post('agents_account_no');
				$save['agents_paypal'] = $CI->input->post('agents_paypal');
				$save['agents_account_name'] = $CI->input->post('agents_account_name');
				$save['agents_bank_name'] = $CI->input->post('agents_bank_name');
				$save['agents_bank_address'] = $CI->input->post('agents_bank_address');
				
				$savee['admin_email'] = $CI->input->post('admin_email');
				
				

			   if ($CI->input->post('admin_password') != '' || !$id)
				{
					$savee['admin_password']	= sha1($CI->input->post('admin_password'));
				}
				
			
				$CI->agent_model->update($save,$id);
				$CI->agent_model->update_admin($savee,$id);
                $CI->session->set_flashdata('message', 'Successfully Updated');
				redirect('admin/agent/list_agent');
			}
			
			
		}
		$data['page_title'] = lang('edit') . lang('client');
		$data['body'] = 'agent/edit';
		$CI->load->view('template/main', $data);	

	}	
	
	
	
	static function edit_agent(){

		$CI = get_instance();
		date_default_timezone_set('Asia/Kuala_Lumpur');
		//$admin = $CI->session->userdata('admin');
		$admin = $CI->session->userdata('admin');
		$admin_guid= $admin['admin_guid'];
		
				$agents_apply_for = $CI->input->post('agents_apply_for');
				$agents_company_name= $CI->input->post('agents_company_name');
				$agents_type_business = $CI->input->post('agents_type_business');
				$agents_position = $CI->input->post('agents_position');
				$agents_person_charge = $CI->input->post('agents_person_charge');
				$agents_person_charge_contact_number = $CI->input->post('agents_person_charge_contact_number');
				
				$agents_swift = $CI->input->post('agents_swift');
                $agents_fullname = $CI->input->post('agents_fullname');
				$agents_country = $CI->input->post('agents_country');
				$agents_address = $CI->input->post('agents_address');
				$agents_phone = $CI->input->post('agents_phone');
				$agents_account_no = $CI->input->post('agents_account_no');
				$agents_paypal = $CI->input->post('agents_paypal');
				$agents_account_name = $CI->input->post('agents_account_name');
				$agents_bank_name = $CI->input->post('agents_bank_name');
				$agents_bank_address = $CI->input->post('agents_bank_address');
		
		
		$CI->db->query("update  agents_tb set agents_apply_for = '$agents_apply_for',agents_company_name = '$agents_company_name',agents_type_business = '$agents_type_business',agents_position ='$agents_position',agents_person_charge = '$agents_person_charge',agents_person_charge_contact_number = '$agents_person_charge_contact_number',agents_swift = '$agents_swift',agents_fullname = '$agents_fullname',agents_country= '$agents_country',agents_address = '$agents_address',agents_phone =  '$agents_phone',agents_account_no = '$agents_account_no',agents_paypal = '$agents_paypal',agents_account_name = '$agents_account_name',agents_bank_name= '$agents_bank_name',agents_bank_address = '$agents_bank_address' where agents_user_id = '$admin_guid'");
		

	}
	
	
	
	static function delete($id)
	{
		$CI = get_instance();
		$CI->agent_model->delete($id);
		$CI->session->set_flashdata('message', 'Successfully Deleted');
		redirect('admin/agent/list_agent');
	}
	
	
	
	
	public static function generateRandomString($length = 13) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	
	
	
	

	
}