 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class notifications extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$CI = get_instance();
		$CI->load->model("notifications_model");
	
	}
	
	
	static function index(){
		$CI = get_instance();
		
		$admin = $CI->session->userdata('admin');
		$admin_role= $admin['admin_role'];
		if($admin_role == 1 || $admin_role == 4){
			$data['notifications'] = $CI->notifications_model->get_admin();
		}
		else {
			$data['notifications'] = $CI->notifications_model->get_all();
		}
		
		$data['body'] = 'notifications/list';
		$CI->load->view('template/main', $data);	

	}	
	
	
	static function is_to_views(){
		
		$CI =& get_instance();
		$notifications_id = $CI->input->post('notifications_id');

		 $CI->db->query("update notifications_tb set 
		  notifications_is_view = '1'
		  where notifications_id ='$notifications_id'");

	}
	
}