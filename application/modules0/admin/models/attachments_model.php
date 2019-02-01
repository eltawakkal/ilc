<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Memento admin_model model
 *
 * This class handles admin_model management related functionality
 *
 * @package		Admin
 * @subpackage	admin_model
 * @author		propertyjar
 * @link		#
 */


class attachments_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$CI = get_instance();
		$CI->load->database();
	}
	
	function get_case_by_client()
	{
		$CI = get_instance();
	    $admin = $CI->session->userdata('admin');
		$CI->db->where('client_id',$admin['admin_id']);
		return $CI->db->get('cases')->result();
	}

	function save_document($save)
	{
		$CI = get_instance();
		$CI->db->insert('attachs_tb',$save);
		return $CI->db->insert_id(); 
	}
	
	function get_all()
	{
		$CI = get_instance();
		$admin = $CI->session->userdata('admin');
		$CI->db->where('attachs_user_id', $admin['admin_guid']);
	    return $CI->db->get('attachs_tb')->result();
	}
	
	function get_attach_by_id($id)
	{
		$CI = get_instance();
		$CI->db->where('attachs_id',$id);
		return $CI->db->get('attachs_tb')->row();
	}
	
	function get_document($id){
	
				 $this->db->where('attachs_id',$id);	
		return $this->db->get('attachs_tb')->row();
	}
	
	function delete_document($id)//delte documents
	{
			   $this->db->where('attachs_id',$id);
		       $this->db->delete('attachs_tb');
	}
	
	
	
}