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


class coupons_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$CI = get_instance();
		$CI->load->database();
	}

	function save($save)
	{
		$CI = get_instance();
		$CI->db->insert('coupons_tb',$save);
		return $CI->db->insert_id(); 
	}
	
	function get_all()
	{
		$CI = get_instance();
		
		$CI->db->join('agents_tb a', 'a.agents_id =c.coupons_agent_id', 'LEFT');
	    return $CI->db->get('coupons_tb c')->result();
	}
	
	function get_agents()
	{
		$CI = get_instance();
	    return $CI->db->get('agents_tb')->result();
	}
	
	function get_guid($id)
	{
		$CI = get_instance();
		$this->db->where('agents_id',$id);
	    return $CI->db->get('agents_tb')->row();
	}
	
	
	
	function update($save,$id)
	{
			   $this->db->where('coupons_id',$id);
		       $this->db->update('coupons_tb',$save);
	}
	
	
	function get_coupons($id)
	{
		$CI = get_instance();
		$this->db->where('coupons_id',$id);
	    return $CI->db->get('coupons_tb')->row();
	}
	

	
	function delete($id)//delte documents
	{
			   $this->db->where('coupons_id',$id);
		       $this->db->delete('coupons_tb');
	}
	
	
	
}