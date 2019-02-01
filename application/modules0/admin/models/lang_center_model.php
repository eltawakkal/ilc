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


class lang_center_model extends CI_Model 
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

	function save($save)
	{
		$CI = get_instance();
		$CI->db->insert('language_center_tb',$save);
		return $CI->db->insert_id(); 
	}
	
	function get_all()
	{
		$CI = get_instance();
	    return $CI->db->get('language_center_tb')->result();
	}
	
	function get_all_language()
	{
		$CI = get_instance();
	    return $CI->db->get('language_center_tb u')->result();
	}
	
	function get_attach_by_id($id)
	{
		$CI = get_instance();
		$CI->db->where('language_center_id',$id);
		return $CI->db->get('language_center_tb')->row();
	}
	
	function get_document($id){
	
			   $this->db->where('language_center_id',$id);	
		return $this->db->get('language_center_tb')->row();
	}
	
	function delete($id)//delte documents
	{
			   $this->db->where('language_center_id',$id);
		       $this->db->delete('language_center_tb');
	}
	
	
	function update($save,$id)
	{
			   $this->db->where('language_center_id',$id);
		       $this->db->update('language_center_tb',$save);
	}
	function get_language($id)
	{
		$CI = get_instance();
		$CI->db->where('language_center_id',$id);
		return $CI->db->get('language_center_tb')->row();
	}
	
	
}