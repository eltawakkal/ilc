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


class notifications_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$CI = get_instance();
		$CI->load->database();
	}

	function get_all()
	{
		$CI = get_instance();
		$admin = $this->session->userdata('admin');
		$admin_guid= $admin['admin_guid'];
		$CI->db->where('n.notifications_to_id',$admin_guid);
		$CI->db->order_by("n.notifications_created_on", "DESC");
		$CI->db->join('users_tb u', 'u.users_app_guid = n.notifications_app_id', 'LEFT');
	    return $CI->db->get('notifications_tb n')->result();
	}
	
	function get_admin()
	{
		$CI = get_instance();
		$admin = $this->session->userdata('admin');
		$admin_guid= $admin['admin_guid'];
		$complete = array(1,4);
		//$CI->db->where('n.notifications_to_id',$admin_guid);
		$CI->db->where_in('ad.admin_role',$complete);
		$CI->db->order_by("n.notifications_created_on", "DESC");
        $CI->db->group_by("n.notifications_app_id");
		$CI->db->join('users_tb u', 'u.users_app_guid = n.notifications_app_id', 'LEFT');
		$CI->db->join('admin_tb ad', 'ad.admin_guid = n.notifications_to_id', 'LEFT');
	    return $CI->db->get('notifications_tb n')->result();
	}
	
	
	
	function get_count_notifiacation_admin()
	{
		$CI = get_instance();
		$admin = $this->session->userdata('admin');
		$admin_guid= $admin['admin_guid'];
		$complete = array(1,4);
		$CI->db->where_in('ad.admin_role',$complete);
		//$CI->db->where('n.notifications_to_id',$admin_guid);
		$CI->db->where('n.notifications_is_view',0);
        $CI->db->group_by("n.notifications_app_id");
        $CI->db->order_by("n.notifications_created_on", "DESC");
		$CI->db->join('users_tb u', 'u.users_app_guid = n.notifications_app_id', 'LEFT');
		$CI->db->join('admin_tb ad', 'ad.admin_guid = n.notifications_to_id', 'LEFT');
		return $CI->db->get('notifications_tb n')->result();
	}
	
	function get_count_notifiacation()
	{
		$CI = get_instance();
		$admin = $this->session->userdata('admin');
		$admin_guid= $admin['admin_guid'];
		$CI->db->where('n.notifications_to_id',$admin_guid);
		$CI->db->where('n.notifications_is_view',0);
		$CI->db->order_by("n.notifications_created_on", "DESC");
		$CI->db->join('users_tb u', 'u.users_app_guid = n.notifications_app_id', 'LEFT');
		return $CI->db->get('notifications_tb n')->result();
	}
	
	
	/*function get_app_no($id)
	{
		$CI = get_instance();
		$CI->db->where('users_app_guid',$id);
	    return $CI->db->get('users_tb')->row();
	}*/
	
	
	
	
}