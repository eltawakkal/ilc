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


class application_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$CI = get_instance();
		$CI->load->database();
	}
	
	function get_country()
	{
		$CI = get_instance();
			   $CI->db->order_by('country_name_en','ASC');
		return $CI->db->get('country_tb')->result();
	}
	
	function get_institution()
	{
		$CI = get_instance();
		return $CI->db->get('institution_tb')->result();
	}
	
	function get_degree()
	{
		$CI = get_instance();
		return $CI->db->get('degree_tb')->result();
	}
	
	function get_mode_study()
	{
		$CI = get_instance();
		return $CI->db->get('mode_study')->result();
	}
	
		
	function get_data()
	{
		$CI = get_instance();
		$admin = $CI->session->userdata('admin');
		$CI->db->where('users_admin_id', $admin['admin_guid']);
		return $CI->db->get('users_tb')->row();
	}
	
	
	function get_all_app()
	{
		$CI = get_instance();
		$admin = $CI->session->userdata('admin');
		$CI->db->where('users_agent_id', $admin['admin_guid']);
        $CI->db->order_by('users_id', 'DESC');
		return $CI->db->get('users_tb')->result();
	}
	
	function get_all_app_admin()
	{
		$CI = get_instance();
        $CI->db->order_by('u.users_id', 'DESC');
		$CI->db->join('university_tb un', 'un.university_id = u.users_university', 'LEFT');
		return $CI->db->get('users_tb u')->result();
	}
	
	function get_data_by_id($id)
	{
		$CI = get_instance();
		$CI->db->where('users_id', $id);
		return $CI->db->get('users_tb')->row();
	}
	
	function get_user_by_id($id)
	{
		$CI = get_instance();
		$CI->db->where('users_admin_id',$id);
		$CI->db->join('country_tb c', 'c.country_id = u.users_country', 'LEFT');
		$CI->db->join('apply_tb ap', 'ap.apply_id = u.users_apply', 'LEFT');
		$CI->db->join('degree_tb d', 'd.degree_id = u.users_degree', 'LEFT');
		$CI->db->join('university_tb un', 'un.university_id = u.users_university', 'LEFT');
		$CI->db->join('institution_tb i', 'i.institution_id = u.users_institution', 'LEFT');
		$CI->db->join('admin_tb ad', 'ad.admin_guid = u.users_admin_id', 'LEFT');
		$CI->db->join('mode_study mo', 'mo.mode_study_id = u.users_mode_study', 'LEFT');
		$CI->db->join('language_center_tb l', 'l.language_center_id = u.users_language_name', 'LEFT');
		
		return $CI->db->get('users_tb u')->row();
	}
	

	
	function get_university()
	{
		$CI = get_instance();
		return $CI->db->get('university_tb')->result();
	}
	
	function save($save)
	{
		$CI = get_instance();
		$CI->db->insert('users',$save);
		return $CI->db->insert_id(); 
	}
	
	function get_all()
	{
		$CI = get_instance();
	    return $CI->db->get('apply_tb')->result();
	}
	
	
	function get_dashborad()
	{
		$CI = get_instance();
		$CI->db->order_by('user_id', 'DESC');
		$CI->db->limit(5);
	    return $CI->db->get('user_tb')->result();
	}
	
	function get_attach_by_id($id)
	{
		$CI = get_instance();
		$CI->db->where('users_id',$id);
		return $CI->db->get('users_tb')->row();
	}
	
	
	function delete($id)//delte documents
	{
			   $this->db->where('users_id',$id);
		       $this->db->delete('users_tb');
	}
	
	
	function get_app_by_id($from_date,$to_date,$agent_id,$university_id)
	{
		$CI = get_instance();
		if(isset($from_date) && $from_date !='' && $from_date !=null){
			$CI->db->where('u.users_created_on >=',$from_date);
		}

		if(isset($to_date) && $to_date !='' && $to_date !=null){
			$CI->db->where('u.users_created_on <=',$to_date);
		}

		if(isset($agent_id) && $agent_id !='' && $agent_id !=null){
			$CI->db->where('u.users_agent_id',$agent_id);
		}
		
		if(isset($university_id) && $university_id !='' && $university_id !=null){
			$CI->db->where('u.users_university',$university_id);
		}
		
		$CI->db->join('university_tb un', 'un.university_id = u.users_university', 'LEFT');
		$CI->db->join('admin_tb a', 'a.admin_guid = u.users_admin_id', 'LEFT');
		return $CI->db->get('users_tb u')->result();
	}
	
	
	
	
	
	function get_admins()
	{
		$CI = get_instance();
		
		$admins = array(1,4);
		$CI->db->where_in('admin_role',$admins);

		return $CI->db->get('admin_tb')->result();
	}
	
	
	function get_app_by_type_agent($from_date,$to_date,$agent_id)
	{
		$CI = get_instance();
		if(isset($from_date) && $from_date !='' && $from_date !=null){
			$CI->db->where('u.users_created_on >=',$from_date);
		}

		if(isset($to_date) && $to_date !='' && $to_date !=null){
			$CI->db->where('u.users_created_on <=',$to_date);
		}

		if(isset($agent_id) && $agent_id !='' && $agent_id !=null){
			$CI->db->where('u.users_by_agent_id',$agent_id);
		}
		
		$CI->db->join('admin_tb a', 'a.admin_guid = u.users_admin_id', 'LEFT');
		return $CI->db->get('users_tb u')->result();
	}
	
	
	
	function get_attachement_by_id($id)
	{
		$CI = get_instance();
		
		$CI->db->where('attachs_user_id',$id);
	    return $CI->db->get('attachs_tb')->result();
	}


    function get_count_receipt($id)
    {
        $CI = get_instance();
        $CI->db->where('receipts_std_id', $id);
        return $CI->db->get('receipts_tb u')->row();
    }
	
	
	
	
}