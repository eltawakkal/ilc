<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class messages extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$CI = get_instance();
		$CI->load->model("students_model");
		$CI->load->model("application_model");
		
	}
	
	
	static function index(){
		$CI = get_instance();
		$data['send'] = $CI->students_model->get_send();
		$data['inbox'] = $CI->students_model->get_inbox();
		$data['users'] = $CI->students_model->get_users();
		$data['count_inbox'] = $CI->students_model->get_count_inbox();
		$data['users_by_agent'] = $CI->students_model->get_users_by_agent();
		$data['names'] = $CI->students_model->get_names();
		$data['namesby_agent'] = $CI->students_model->get_namesby_agent();

		
		$data['body'] = 'students/inbox';
		$CI->load->view('template/main', $data);	
	}	

	
	static function details($id=false){
		$CI = get_instance();
		$data['details'] = $CI->students_model->get_details($id);
		$data['replys'] = $CI->students_model->get_replys($id);
		$data['body'] = 'students/details';
		$CI->load->view('template/main', $data);	
	}
	
	
	static function is_to_views(){
		
		$CI =& get_instance();
		$messages_id = $CI->input->post('messages_id');

		 $CI->db->query("update messages_tb set 
		  messages_to_view = '1'
		  where messages_id ='$messages_id'");

	}
	
	
	static function is_from_views(){
		
		$CI =& get_instance();
		$messages_id = $CI->input->post('messages_idd');

		 $CI->db->query("update messages_tb set 
		  messages_from_view = '1'
		  where messages_id ='$messages_id'");

	}


    static function is_view_reply_to(){

    $CI =& get_instance();
    $replys_msg_id = $CI->input->post('messages_guid');

    $CI->db->query("update replys_tb set 
		  replys_is_view_to = '1'
		  where replys_msg_id ='$replys_msg_id'");

}


    static function is_view_reply_from(){

        $CI =& get_instance();
        $replys_msg_id = $CI->input->post('messages_guiddd');
        $CI->db->query("update replys_tb set 
		  replys_is_view_from = '1'
		  where replys_msg_id ='$replys_msg_id'");

    }
	
	
	static function send_msg(){
		
		$CI =& get_instance();
		$auth = new messages();
		$admin = $CI->session->userdata('admin');
		$admin_guid= $admin['admin_guid'];
		$admin_role= $admin['admin_role'];
		
		$messages_guid = $auth->generateRandomString(6);
		$messages_title = $CI->input->post('messages_title');
		$messages_text = $CI->input->post('messages_text');
		$messages_to = $CI->input->post('messages_to');
		$messages_created_on 	= date('Y-m-d H:i:s');
		
		$admins = $CI->application_model->get_admins();
		
		$photo = array();
		
		if(isset($_FILES['messages_attach']['name']) && !empty($_FILES['messages_attach']['name'])){
					
						$config['upload_path'] = './uploads/documents/';
						$config['allowed_types'] = '*';
						$config['max_size']	= '10000';
						$config['max_width']  = '10000';
						$config['max_height']  = '6000';
						$config['encrypt_name'] = TRUE;
				
						$CI->load->library('upload', $config);
				
						if ( !$img = $CI->upload->do_upload('messages_attach'))
							{
								$msg = $CI->upload->display_errors();
							}
							else
							{
								$msg = 'Not errors';
								$img_data = array('upload_data' => $CI->upload->data());
								
							}
							$messages_attach = $img_data['upload_data']['file_name'];
					}
					else 
					{
						$messages_attach = '';
					}
		
		
		
		if($admin_role == 3){
			
			
			foreach($admins as $row){ // تقديم استمارة جديدة
			
			 $CI->db->query("insert into messages_tb 
 (messages_guid,messages_title,messages_text,messages_from,messages_to,messages_attach,messages_from_view,messages_to_view,message_created_on) values('$messages_guid','$messages_title','$messages_text','$admin_guid','$row->admin_guid','$messages_attach','0','0','$messages_created_on')");
			}
		} else {
		 $CI->db->query("insert into messages_tb 
 (messages_guid,messages_title,messages_text,messages_from,messages_to,messages_attach,messages_from_view,messages_to_view,message_created_on) values('$messages_guid','$messages_title','$messages_text','$admin_guid','$messages_to','$messages_attach','0','0','$messages_created_on')");

	}
}
	
	
	static function send_msg_to_admin(){
		
		$CI =& get_instance();
		$auth = new messages();
		$admin = $CI->session->userdata('admin');
		$admin_guid= $admin['admin_guid'];
		$admin_role= $admin['admin_role'];
		
		$messages_guid = $auth->generateRandomString(6);
		$messages_title = $CI->input->post('messages_title');
		$messages_text = $CI->input->post('messages_text');
		$messages_to = $CI->input->post('messages_to');
		$messages_created_on 	= date('Y-m-d H:i:s');
		
		$admins = $CI->application_model->get_admins();
		
		$photo = array();
		
		if(isset($_FILES['messages_attach']['name']) && !empty($_FILES['messages_attach']['name'])){
					
						$config['upload_path'] = './uploads/documents/';
						$config['allowed_types'] = '*';
						$config['max_size']	= '10000';
						$config['max_width']  = '10000';
						$config['max_height']  = '6000';
						$config['encrypt_name'] = TRUE;
				
						$CI->load->library('upload', $config);
				
						if ( !$img = $CI->upload->do_upload('messages_attach'))
							{
								$msg = $CI->upload->display_errors();
							}
							else
							{
								$msg = 'Not errors';
								$img_data = array('upload_data' => $CI->upload->data());
								
							}
							$messages_attach = $img_data['upload_data']['file_name'];
					}
					else 
					{
						$messages_attach = '';
					}
		
		
		
		
			
			
			foreach($admins as $row){ // تقديم استمارة جديدة
			
			 $CI->db->query("insert into messages_tb 
 (messages_guid,messages_title,messages_text,messages_from,messages_to,messages_attach,messages_from_view,messages_to_view,message_created_on) values('$messages_guid','$messages_title','$messages_text','$admin_guid','$row->admin_guid','$messages_attach','0','0','$messages_created_on')");
			}
		

	}
	
	
	static function reply_msg(){
		
		$CI =& get_instance();
        $auth = new messages();
		$admin = $CI->session->userdata('admin');
		$admin_guid= $admin['admin_guid'];
		$admin_role= $admin['admin_role'];
        $replys_guid = $auth->generateRandomString(6);
		$replys_msg_id = $CI->input->post('replys_msg_id');
		$replys_text = $CI->input->post('replys_text');
		$replys_to = $CI->input->post('replys_to');
        $messages_from = $CI->input->post('messages_fromm');

		$replys_created_on 	= date('Y-m-d H:i:s');
		$admins = $CI->application_model->get_admins();
		//print_r($admins); exit;
		if($admin_role == 3){
			
			
			foreach($admins as $row){ // تقديم استمارة جديدة
			
				$CI->db->query("insert into replys_tb 
 (replys_guid,replys_msg_id,replys_text,replys_from,replys_to,replys_created_on) values('$replys_guid','$replys_msg_id','$replys_text','$admin_guid','$row->admin_guid','$replys_created_on')");
	
			
			}
		} else {
		
		$CI->db->query("insert into replys_tb 
 (replys_guid,replys_msg_id,replys_text,replys_from,replys_to,replys_created_on) values('$replys_guid','$replys_msg_id','$replys_text','$admin_guid','$replys_to','$replys_created_on')");
	}
   // echo $admin_guid.' fo '.$messages_from; exit;
    if($messages_from == $admin_guid){

        $CI->db->query("update replys_tb set 
		  replys_is_view_to = '0',
		  replys_is_view_from = '1'
		  where replys_msg_id ='$replys_msg_id'");
    } else {
        $CI->db->query("update replys_tb set 
		  replys_is_view_from = '0',
		  replys_is_view_to = '1'
		  where replys_msg_id ='$replys_msg_id'");

    }

        $CI->load->library('upload');
        $files = $_FILES;
        $cpt = count($_FILES['reply_attachs_file']['name']);
        //echo $cpt;die;
        for($i=0; $i<$cpt; $i++)
        {
            $_FILES['userfile']['name']= $files['reply_attachs_file']['name'][$i];
            $_FILES['userfile']['type']= $files['reply_attachs_file']['type'][$i];
            $_FILES['userfile']['tmp_name']= $files['reply_attachs_file']['tmp_name'][$i];
            $_FILES['userfile']['error']= $files['reply_attachs_file']['error'][$i];
            $_FILES['userfile']['size']= $files['reply_attachs_file']['size'][$i];

            //Title Name
            $CI->upload->initialize($auth->set_upload_options());
            $CI->upload->do_upload();

            $save['reply_attachs_file'] = $_FILES['userfile']['name'];
            $save['reply_attachs_reply_id'] = $replys_guid;

            $CI->students_model->save_document($save);

        }

}


    static function set_upload_options()
    {  //  upload an image and document options
        $config = array();
       // $config['upload_path'] = 'assets/uploads/files/';
        $config['upload_path'] ='./assets/uploads/images/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '0'; // 0 = no file size limit
        $config['max_width']  = '0';
        $config['max_height']  = '0';
        $config['overwrite'] = TRUE;
        return $config;
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
	
	
	
	static function download($id)
	{
		$CI = get_instance();
		//ob_clean(); 
		$CI->load->helper('download');
		$attach = $CI->students_model->get_attach_by_id($id);
		$data = file_get_contents("./uploads/documents/".$attach->messages_attach); // Read the file's contents
		$name = $attach->messages_attach;
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


    static function download_reply($id)
    {
        $CI = get_instance();
        //ob_clean();
       /* $CI->load->helper('download');
        $attach = $CI->students_model->get_attach_reply($id);
        $data = file_get_contents("./assets/uploads/images/".$attach->reply_attachs_file); // Read the file's contents
        $name = $attach->reply_attachs_file;
        force_download($name, $data);*/


        $document = $CI->students_model->get_attach_reply($id);
        $file = BASEPATH.'../assets/uploads/images/'.$document->reply_attachs_file;
        $CI->load->helper('download');
        force_download($document->reply_attachs_file, $file);

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
        $CI = get_instance();
        $CI->students_model->delete($id);
        $CI->session->set_flashdata('message', 'Successfully Deleted');
		redirect('admin/messages');
	}
	
	
	
	
	/* static function get_names()
    {
        $CI = get_instance();

		    if (isset($_GET['term'])) {
           $query = $CI->db->query("SELECT users_admin_id as id, users_fullname as name FROM users_tb WHERE users_fullname LIKE '%".$searchTerm."%'  
		   UNION ALL
		   SELECT agents_user_id as id, agents_company_name as name FROM agents_tb WHERE agents_company_name LIKE '%".$searchTerm."%' 
		   UNION ALL
		   SELECT agents_user_id as id, agents_fullname as name FROM agents_tb WHERE agents_fullname LIKE '%".$searchTerm."%' ");
				$cari = $query->result();
				$skillData = array();
            if (count($cari) > 0) {
                foreach ($cari as $value) {
					 	$data['id'] = $value->id;
						$data['value'] = $value->name;
        				array_push($skillData, $data);
					
					
                }
            } else {
                $skillData[] = array('id' => '0', 'text' => 'No Products Found');
            }

            echo json_encode($skillData);
        }//end if
		
		

    }*/
	
	
	static function get_names()
    {
        $CI = get_instance();

		 
           
				

		
		

    }
	
	
	
		 static function get_namesby_agent()
    {
        $CI = get_instance();
		$admin = $this->session->userdata('admin');
		$admin_guid= $admin['admin_guid'];
		

		    if (isset($_GET['term'])) {
            $searchTerm = $_GET['term'];
           $query = $CI->db->query("SELECT * FROM users_tb WHERE users_fullname LIKE '%".$searchTerm."%'  and users_agent_id = '$admin_guid' ORDER BY users_fullname ASC");
				$cari = $query->result();
				$skillData = array();
            if (count($cari) > 0) {
                foreach ($cari as $value) {
					 	$data['id'] = $value->users_admin_id;
						$data['value'] = $value->users_fullname;
        				array_push($skillData, $data);
					
					
                   // $data[] = array('id' => $value->users_id, 'text' => $value->users_fullname);
                }
            } else {
                $skillData[] = array('id' => '0', 'text' => 'No Products Found');
            }

            echo json_encode($skillData);
        }//end if
		
		

    }
	
	
	
	

	
}