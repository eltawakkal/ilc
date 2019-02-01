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


class language_model extends CI_Model 
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
		$CI->db->insert('language',$save);
	}
	
	function update($save)
	{	
	$CI = get_instance();
	$CI->db->where('id',$id);	
		$CI->db->update('language',$save);
	}
	
	function delete($id)
	{	
	$CI = get_instance();
	$CI->db->where('id',$id);	
		$CI->db->delete('language');
	}
		
	function get_all()
	{
		$CI = get_instance();
		//print_r($save);die;
		return $CI->db->get('language')->result();
	}
	
	function get_language_id($id)
	{
		$CI = get_instance();
				$CI->db->where('id',$id);
		return $CI->db->get('language')->row();
	}
	
	
}