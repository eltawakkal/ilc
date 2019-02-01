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


class receipts_model extends CI_Model 
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
		$CI->db->insert('receipts_tb',$save);
		return $CI->db->insert_id(); 
	}
	
	function get_all()
	{
		$CI = get_instance();
		$CI->db->join('users_tb us', 'us.users_id = r.receipts_std_id', 'LEFT');
	    return $CI->db->get('receipts_tb r')->result();
	}
	
	function update($save,$id)
	{
			   $this->db->where('receipts_id',$id);
		       $this->db->update('receipts_tb',$save);
	}
	
	
	function get_receipts($id)
	{
		$CI = get_instance();
		$this->db->where('receipts_id',$id);
	    return $CI->db->get('receipts_tb')->row();
	}
	
	
	
	function get_all_std()
	{
		$CI = get_instance();
		$this->db->where('a.admin_role',3);
		$CI->db->join('users_tb us', 'us.users_admin_id = a.admin_guid', 'LEFT');
	    return $CI->db->get('admin_tb a')->result();
	}
	

	
	function delete($id)//delte documents
	{
			   $this->db->where('receipts_id',$id);
		       $this->db->delete('receipts_tb');
	}
	
	
	
}