<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class clients extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$CI->auth->check_access('1', true);
		$CI = get_instance();
		$CI->load->model("clients_model");
		$CI->load->model("requests_model");
		$CI->load->model("report_request_model");
		$CI->load->model("report_request_model");
		$CI->load->model("requests_cancel_model");
		$CI->load->model("custom_field_model");
		$CI->load->library('form_validation');
		$CI->load->model("requests_pendding_model");
		
		
	}
	
	
	static function index(){
		$CI = get_instance();
		$data['clients'] = $CI->clients_model->get_all();
		$data['page_title'] = lang('clients');
		$data['body'] = 'clients/list';
		$CI->load->view('template/main', $data);	

	}	
	
	
	static function export(){
		$CI = get_instance();
		$data['clients'] = $CI->clients_model->get_all_clients_exports();
		$CI->load->view('clients/export', $data);	

	}
	
   static  function pdf($id=false){
		$CI = get_instance();
		$CI->load->helper('dompdf_helper');
		$CI->load->helper('download');
		$data['clients'] = $CI->clients_model->get_all_clients_exports();
		/*$data['details'] = $CI->invoice_model->get_detail($id);
		$data['taxes'] = $CI->invoice_model->get_taxes($id);	
		$data['setting']   = $CI->setting_model->get_setting();*/	
		$data['page_title'] = lang('invoice');
		//$data['body'] = 'invoice/pdf';
		$html = $CI->load->view('clients/pdf', $data,true);		
		pdf_create($html, 'All Clients');
		

	}	
	
	function add(){
		$CI = get_instance();
		$data['roles'] = $CI->admin_role_model->get_all();
		$data['fields'] = $CI->custom_field_model->get_custom_fields(1);	
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
				$save['admin_username'] = $CI->input->post('admin_username');
				$save['admin_password'] = sha1($CI->input->post('admin_password'));
                $save['admin_phone'] = $CI->input->post('admin_phone');
				$save['admin_address'] = $CI->input->post('admin_address');
				$save['admin_role'] = $CI->input->post('admin_role_id');

			    
				$p_key = $CI->clients_model->save($save);
				
				$reply = $CI->input->post('reply');
				if(!empty($reply)){
					foreach($CI->input->post('reply') as $key => $val) {
						$save_fields[] = array(
							'custom_field_id'=> $key,
							'reply'=> $val,
							'table_id'=> $p_key,
							'form'=> 1,
						);	
					
					}	
					$CI->custom_field_model->save_answer($save_fields);
				}
                $CI->session->set_flashdata('message', lang('client_created'));
				redirect('admin/clients');
			}
			
		}		
		$data['page_title'] = lang('add') . lang('client');
		$data['body'] = 'clients/add';
		$CI->load->view('template/main', $data);	
}	
	

	
	function edit($id=false){
		$CI = get_instance();
		$data['roles'] = $CI->admin_role_model->get_all();
		//print_r($data['roles']);
		$data['fields'] = $CI->custom_field_model->get_custom_fields(1);	
		$data['clients'] = $CI->employees_model->get_client_by_id($id);
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
				$save['admin_password'] = sha1($CI->input->post('admin_password'));
                $save['admin_phone'] = $CI->input->post('admin_phone');
				$save['admin_address'] = $CI->input->post('admin_address');
				$save['admin_role'] = $CI->input->post('admin_role');

			   if ($CI->input->post('password') != '' || !$id)
				{
					$save['password']	= sha1($CI->input->post('password'));
				}
				
				
				$reply  = $CI->input->post('reply');
				if(!empty($reply)){
					foreach($CI->input->post('reply') as $key => $val) {
						$save_fields[] = array(
							'custom_field_id'=> $key,
							'reply'=> $val,
							'table_id'=> $id,
							'form'=> 1,
						);	
					
					}	
					$CI->custom_field_model->delete_answer($id,$form=1);
					$CI->custom_field_model->save_answer($save_fields);
				}
				
				
				$CI->clients_model->update($save,$id);
                $CI->session->set_flashdata('message', lang('client_updated'));
				redirect('admin/clients');
			}
			
			
		}
		$data['page_title'] = lang('edit') . lang('client');
		$data['body'] = 'clients/edit';
		$CI->load->view('template/main', $data);	

	}	
	
	function view_client($id=false){
		$CI = get_instance();
		
		//$data['all_evenues'] = $CI->report_request_model->get_evenues();
		$CI->clients_model->client_view_by_admin($id);	
		$data['clients'] = $CI->clients_model->get_client_by_id($id);
		$data['cities'] = $CI->clients_model->get_cities_by_id($id);
		$data['point'] = $CI->clients_model->get_point_by_id($id);
		//$data['request_id'] = $CI->clients_model->get_request_id($id);		
		//print_r($data['request_id']);
		
		
		
		
		$data['count_cities'] = $CI->clients_model->get_count_cities_by_id($id);
		$data['client_request'] = $CI->clients_model->get_client_request($id);
		
		//print_r($data['client_request']);
		//$data['same_double_1'] = $CI->requests_cancel_model->get_same_double_1_by_id($id);	
		//$data['same_double_3'] = $CI->requests_cancel_model->get_same_double_3_by_id($id);	
		
		$data['page_title'] = lang('view') . lang('client');
		$data['body'] = 'clients/view';
		$CI->load->view('template/main', $data);	
	}	
	
	function view_request_details(){
		$CI = get_instance();
		$request_details = $CI->report_request_model->get_request_details($_POST['request_id']);
		$data['request_one_client'] = $CI->clients_model->get_client_request($_POST['request_id']);
		$data['same_double_1'] = $CI->requests_cancel_model->get_same_double_1_by_id($_POST['request_id']);	
		$data['same_double_3'] = $CI->requests_cancel_model->get_same_double_3_by_id($_POST['request_id']);
		
		echo '
		 <table  class="table table-bordered table-striped ">
                        <thead>
                            <tr>
                               <th width="13%">رقم المسلسل </th>
                               <th width="23%">اسم المنتج </th>
							   <th width="27%">تصنيف المنتج  </th>
							   <th width="8%">الكمية</th>
							   <th width="12%">سعر المنتج</th>
                               <th width="20%">سعر توصيل المنتج</th>
								
                            </tr>
                        </thead>';
                          if(isset($request_details)):
                      echo '  <tbody> ';
                           $tot=0;  $i=1;foreach ($request_details as $new){
								$total_qnt= $new->product_qnty;
                          echo '   <tr class="gc_row">
                           			
                                    <td>'. $i.' </td>
								    <td>'. $new->category_name .'  </td>
                                    <td>'. $new->product_cat_detiats_name .' </td>
									<td>'. $new->product_qnty .' </td>
									<td>'. $new->product_price .' </td>
									<td>'. $new->product_delivery_price .' </td>

                                </tr>';
                                $tot+=$total_qnt;  $i++;} 
								  
								  echo '  <tr style="font-weight:bold">
                                	<td colspan="3" align="center">الاجمالي</td>
									<td>'; echo $tot;
                                   echo '  </td> <td>';
										$total= 0; foreach ($request_details as $new){
										$total_price = $new->product_price * $new->product_qnty;
									  	$total+= $total_price ;}
									   echo $total;
									   echo ' </td> <td>';
                                        $total= 0; foreach ($request_details as $new){
										   
										  			 if ($data['same_double_1'] == 1 && $new->product_qnty == 2)
													{
														$my_values[] = $new->product_delivery_price_double;
														$total=  max($my_values);
													}
													else if ($data['same_double_1'] == 2 )
													{
														$my_values[] = $new->product_delivery_price_double;
														$total=  max($my_values);
													}
													else 
													{
														$my_values[] = $new->product_delivery_price;
												        $total=  max($my_values);
													}

										}
										echo $total;
										
                                      echo '</td> </tr>';
                                
                                
                       echo '   </tbody>';
                            endif;
                  echo '   </table>';
                    
                    
	}

	function delete($id=false){
		$CI = get_instance();
		if($id){
			$CI->clients_model->delete($id);
	//	$CI->db->query("delete user_tb, request_tb,request_detail_tb from user_tb, request_tb,request_detail_tb where user_tb.user_id ='$id' and user_tb.user_id=request_tb.request_user and request_tb.request_id=request_detail_tb.request_id  ");	

			$CI->session->set_flashdata('message',lang('client_deleted'));
			redirect('admin/clients');
		}
	}	
	
	
	function activate_user($id=false){
		$CI = get_instance();
		if($id){
			$CI->clients_model->activate_user($id);
	    	$CI->session->set_flashdata('message','تم تفعيل المستخدم بنجاح');
			redirect('admin/clients');
		}
	}	
	
	
		
	
}