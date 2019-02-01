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


class agent_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$CI = get_instance();
		$CI->load->database();
	}


	function get_data()
	{
		$CI = get_instance();
		$admin = $CI->session->userdata('admin');
		$CI->db->where('agents_user_id', $admin['admin_guid']);
		return $CI->db->get('agents_tb')->row();
	}
	
	
	function get_all_agents()
	{
		$CI = get_instance();
		$CI->db->join('country_tb c', 'c.country_id = a.agents_country', 'LEFT');
		$CI->db->join('admin_tb ad', 'ad.admin_guid = a.agents_user_id', 'LEFT');
		return $CI->db->get('agents_tb a')->result();
	}
	
	function get_agent_by_id($id)
	{
		$CI = get_instance();
		
			$CI->db->where('agents_user_id', $id);
		$CI->db->join('country_tb c', 'c.country_id = a.agents_country', 'LEFT');
		$CI->db->join('admin_tb ad', 'ad.admin_guid = a.agents_user_id', 'LEFT');
		return $CI->db->get('agents_tb a')->row();
	}
	
	
	function save_admin($save)
	{
		$CI = get_instance();
		$CI->db->insert('admin_tb',$save);
		return $CI->db->insert_id(); 
	}
	
	
	
	function save($save)
	{
		$CI = get_instance();
		$CI->db->insert('agents_tb',$save);
		return $CI->db->insert_id(); 
	}
	
	function delete($id)//delte documents
	{
			   $this->db->where('agents_id',$id);
		       $this->db->delete('agents_tb');
	}
	
	
	function update($save,$id)
	{
			   $this->db->where('agents_user_id',$id);
		       $this->db->update('agents_tb',$save);
	}
	
	function update_admin($save,$id)
	{
			   $this->db->where('admin_guid',$id);
		       $this->db->update('admin_tb',$save);
	}
	
	
	
	
	
}