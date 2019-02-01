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


class admins_model extends CI_Model 
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
		$CI->db->insert('admin_tb',$save);
		return $CI->db->insert_id(); 
	}
	
	function get_all()
	{
		$CI = get_instance();
		$this->db->where('admin_role',4);
	    return $CI->db->get('admin_tb')->result();
	}

	
	
	function update($save,$id)
	{
			   $this->db->where('admin_guid',$id);
		       $this->db->update('admin_tb',$save);
	}
	
	
	function get_admins($id)
	{
		$CI = get_instance();
		$this->db->where('admin_guid',$id);
	    return $CI->db->get('admin_tb')->row();
	}
	

	
	function delete($id)//delte documents
	{
			   $this->db->where('admin_guid',$id);
		       $this->db->delete('admin_tb');
	}
	
	
	
}