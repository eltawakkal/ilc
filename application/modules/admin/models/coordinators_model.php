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


class coordinators_model extends CI_Model 
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
		$CI->db->insert('coordinators_tb',$save);
		return $CI->db->insert_id(); 
	}
	
	function get_all()
	{
		$CI = get_instance();
		
		$CI->db->join('university_tb u', 'u.university_id =c.coordinators_university', 'LEFT');
	    return $CI->db->get('coordinators_tb c')->result();
	}
	
	function get_university()
	{
		$CI = get_instance();
	    return $CI->db->get('university_tb')->result();
	}
	
	
	
	function update($save,$id)
	{
			   $this->db->where('coordinators_id',$id);
		       $this->db->update('coordinators_tb',$save);
	}
	
	
	function get_coordinators($id)
	{
		$CI = get_instance();
		$this->db->where('coordinators_id',$id);
	    return $CI->db->get('coordinators_tb')->row();
	}
	

	
	function delete($id)//delte documents
	{
			   $this->db->where('coordinators_id',$id);
		       $this->db->delete('coordinators_tb');
	}
	
	
	
}