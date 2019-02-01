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


class institutions_model extends CI_Model 
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
		$CI->db->insert('university_tb',$save);
		return $CI->db->insert_id(); 
	}
	
	function get_all()
	{
		$CI = get_instance();
	    return $CI->db->get('services_tb')->result();
	}
	
	function get_all_university()
	{
		$CI = get_instance();
		$CI->db->join('services_tb s', 's.services_id = u.university_type', 'LEFT');
	    return $CI->db->get('university_tb u')->result();
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
	
	function delete($id)//delte documents
	{
			   $this->db->where('university_id',$id);
		       $this->db->delete('university_tb');
	}
	
	
	function update($save,$id)
	{
			   $this->db->where('university_id',$id);
		       $this->db->update('university_tb',$save);
	}
	function get_institutions($id)
	{
		$CI = get_instance();
		$CI->db->where('university_id',$id);
		return $CI->db->get('university_tb')->row();
	}
	
	
}