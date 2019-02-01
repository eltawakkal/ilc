<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Riyadh'); 

class fcm extends MX_Controller {

  public $activation_code;
	public function __construct()
	{
		parent::__construct();
		
			$CI = get_instance();
		$CI->load->model("api_model");
		
	}
	
	function android_notification()
	{
	
			$CI = get_instance();
			define( 'API_ACCESS_KEY', 'AAAAfeJuxpY:APA91bF3zUmZqp1JdXuGTecspm48WY1pN-ohwnwCxW2gqTIBd23eY5Rc04XMRJyc8JmpRodZNazbh3OcrgtrYxXV8Yq7yHWyYkzI6oLGdhRviQDPRQSEWY7KpnpMYdROGwLtsSAzhmS1' ); 
			
		//	$notification_content = $CI->input->post('notification_content');
		   // $get_tokens = $CI->api_model->get_all_token($user_id);
			
			
			//$ids = array();
			//$arr = $get_tokens;
			//foreach($arr as $token){
			//  array_push($ids,$token->device_token); 

			//echo $token->device_token.' '; 		
				
				
			$token = 'd1tTATrg52M:APA91bFAcOv2svGSzy60E7ynbvWE7O1K9XTIwwg9-RHoREkGCPatRuhZ3gjkIzNZb1FfwZTCV3eLNxqrQ4myZMgnwKrp4dbhHeYj8t3FoP9MTIyFoRJfUW9xQ6JpbtAPuK1qeKrnK_MDSxQU6wMiHCwNRoHah5B9rQ';
			
			$registrationIds = array( $token );
			
		/*	$msg = array
			(
				'body' 	        =>  'تم تغير حالة طلبك',
				'title'		    => 'لمسة وتوصيل',
				'icon'			=>  'myicon',
				'sound'		    =>  'mySound'
			);*/
			
			/*$datamsg = array
			(
				'body' 	        =>  'تم تغير حالة طلبك',
				'title'		    => 'لمسة وتوصيل'
			);*/
			
			
			/*$fields = array
			(
				'registration_ids' 	=> $registrationIds,
				'data'              => $datamsg
			);*/
			 
		/*	$headers = array
			(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);*/
			$msg = array
				(
					'body' 	=> 'تم تغير حالة طلبك',
					'title'		=> 'لمسة وتوصيل',
					'vibrate'	=> 1,
					'sound'		=> 1,
					'order_id'      => '5b33bb3daa104',
					'order_status'  => 8
				);
			
			$fields = array
			(
				'registration_ids' 	=> $registrationIds,
				'notification'		=> $msg
			);
			 
			$headers = array
			(
			'Authorization: key=' . API_ACCESS_KEY,
			'Content-Type: application/json'
			);
			 
			$ch = curl_init();
			curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
			curl_setopt( $ch,CURLOPT_POST, true );
			curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
			curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
			$result = curl_exec($ch );
			curl_close( $ch );
			echo $result;
	//}
	}
	
}
