<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

date_default_timezone_set('Asia/Riyadh'); 

class register extends MX_Controller {

	public function __construct()
	{
		parent::__construct();

			$CI = get_instance();
		$CI->load->model("setting_model");
		$CI->load->model("admin/dashboard_model");
		

	}
	
		static function index(){

		$CI = get_instance();
		$data['setting'] = $CI->dashboard_model->get_settings();

		$CI->load->view('register',$data);

	}
	
	static function forget(){

		$CI = get_instance();
		$data['setting'] = $CI->dashboard_model->get_settings();

		$CI->load->view('forget',$data);

	}

	
	static function add_users(){

		$CI = get_instance();
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$auth = new register();
		
		$admin_guid			= $auth->generateRandomString(8);
		$admin_email 		= $CI->input->post('admin_email');
		$admin_password 	= sha1($CI->input->post('admin_password'));
		$admin_role 		= $CI->input->post('admin_role');
		$admin_created_on 	= date('Y-m-d H:i:s');
		
	
		
		$CI->db->query("insert into admin_tb(admin_guid,admin_email,admin_password,admin_role,admin_created_on)   	values('$admin_guid','$admin_email','$admin_password','$admin_role','$admin_created_on')");
		

	}
	
	
	static function check_username_exist(){

		$CI = get_instance();

		$admin_email = $CI->input->post('admin_email');
		
        $CI->db->select('admin_email');
        $CI->db->from('admin_tb');
        $CI->db->where('admin_email', $admin_email);
		$count = $CI->db->count_all_results();
		echo $count; 
	}
	
	
	static function send_email(){

        $CI = get_instance();
        $settings = $CI->setting_model->get_setting();

		$authDb = new register();
		$admin_email = $CI->input->post('admin_email');
		//$users_created_on = date('Y-m-d H:i:s');
		$guid= $authDb->generateRandomString();
		$admin_password = sha1($guid);
		//$messa = 'رمز التفعيل هو: '.$guid;
		//$authDb->sendsms($users_mobile_no,$messa);

		 
		 $CI->db->query("update admin_tb set 
		  admin_password ='$admin_password'
		  where admin_email ='$admin_email'");
		
		
		$to = $settings->email; // this is your Email address
		$from = $_POST['admin_email'];  // this is the sender's Email address
		
		$subject = $settings->title_email;
		$subject2 = $settings->title_email;;
		$message = $to . " " . $guid . " wrote the following:" . "\n\n" . $from;
		$message2 = "Thank you dear to recovery your password \n\n, New password: ". $guid   ;

		$headers = "From:" . $from;
		$headers2 = "From:" . $to;
		mail($to,$subject,$message,$headers);
		mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
		//echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
		
		
		
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