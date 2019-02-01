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


class commission_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$CI = get_instance();
		$CI->load->database();
	}


	function get_all_app_admin()
	{
		$CI = get_instance();
		//$cancel = array(1,4);
		//$CI->db->where_not_in('ad.admin_role', $cancel);
		//$CI->db->where('u.users_agent_id IS NOT NULL',  null, false);
		$CI->db->where('u.users_agent_id !=',' ');
	//	$CI->db->where('users_agent_id IS NULL', null, false);

		//$CI->db->join('admin_tb ad', 'ad.admin_guid = u.users_admin_id', 'LEFT');
		$CI->db->join('university_tb un', 'un.university_id = u.users_university', 'LEFT');
		return $CI->db->get('users_tb u')->result();
	}
	
	function get_user_by_id($id)
	{
		$CI = get_instance();
		$CI->db->where('users_id',$id);
		$CI->db->join('country_tb c', 'c.country_id = u.users_country', 'LEFT');
		$CI->db->join('apply_tb ap', 'ap.apply_id = u.users_apply', 'LEFT');
		$CI->db->join('degree_tb d', 'd.degree_id = u.users_degree', 'LEFT');
		$CI->db->join('university_tb un', 'un.university_id = u.users_university', 'LEFT');
		$CI->db->join('institution_tb i', 'i.institution_id = u.users_institution', 'LEFT');
		$CI->db->join('admin_tb ad', 'ad.admin_guid = u.users_admin_id', 'LEFT');
		
		return $CI->db->get('users_tb u')->row();
	}
	
	
	function get_app_by_id($from_date,$to_date,$agent_id)
	{
		$CI = get_instance();
		$cancel = array(1,4);
		if(isset($from_date) && $from_date !='' && $from_date !=null){
			$CI->db->where('u.users_created_on >=',$from_date);
		}

		if(isset($to_date) && $to_date !='' && $to_date !=null){
			$CI->db->where('u.users_created_on <=',$to_date);
		}

		if(isset($agent_id) && $agent_id !='' && $agent_id !=null){
			$CI->db->where('u.users_agent_id',$agent_id);
		}
		
		
		$CI->db->where_not_in('ad.admin_role', $cancel);
		$CI->db->join('admin_tb ad', 'ad.admin_guid = u.users_admin_id', 'LEFT');
		$CI->db->join('university_tb un', 'un.university_id = u.users_university', 'LEFT');
		return $CI->db->get('users_tb u')->result();
	}
	
}