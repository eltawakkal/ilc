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


class dashboard_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		 $CI = get_instance();
		$CI->load->database();
	}
	
	function get_setting()
	{
		$CI = get_instance(); 
		return $CI->db->get('settings')->row();
	}
	
	function get_all_applications()
	{	
	     $CI = get_instance();
		
		 return $CI->db->get('users_tb')->result();	
	}
	
	function get_all_applications_agent()
	{	
	     $CI = get_instance();
		 $admin = $this->session->userdata('admin');
		 $admin_guid= $admin['admin_guid'];
		
		 $CI->db->where('users_agent_id', $admin_guid);
		 return $CI->db->get('users_tb')->result();	
	}
	
	function get_new_applications()
	{	
	     $CI = get_instance();
		
		 $CI->db->where('users_status', 1);
		 return $CI->db->get('users_tb')->result();	
	}
	
	function get_new_applications_agent()
	{	
	     $CI = get_instance();
		 $admin = $this->session->userdata('admin');
		 $admin_guid= $admin['admin_guid'];
		
		 $CI->db->where('users_agent_id', $admin_guid);
		
		 $CI->db->where('users_status', 1);
		 return $CI->db->get('users_tb')->result();	
	}

	function get_submit_applications()
	{	
	     $CI = get_instance();
		
		 $CI->db->where('users_status', 2);
		 return $CI->db->get('users_tb')->result();	
	}
	
	
	function get_submit_applications_agent()
	{	
	     $CI = get_instance();
		$admin = $this->session->userdata('admin');
		 $admin_guid= $admin['admin_guid'];
		
		 $CI->db->where('users_agent_id', $admin_guid);
		
		 $CI->db->where('users_status', 2);
		 return $CI->db->get('users_tb')->result();	
	}
	
	function get_enroll_applications()
	{	
	     $CI = get_instance();
		
		 $CI->db->where('users_status', 8);
		 return $CI->db->get('users_tb')->result();	
	}
	
	function get_enroll_applications_agent()
	{	
	     $CI = get_instance();
		 $admin = $this->session->userdata('admin');
		 $admin_guid= $admin['admin_guid'];
		
		 $CI->db->where('users_agent_id', $admin_guid);
		 $CI->db->where('users_status', 8);
		 return $CI->db->get('users_tb')->result();	
	}
	
	
	function get_students()
	{	
	     $CI = get_instance();
		
		 $CI->db->where('admin_role', 3);
		 return $CI->db->get('admin_tb')->result();	
	}
	
	
	function get_agents()
	{	
	     $CI = get_instance();
		
		 $CI->db->where('admin_role', 2);
		 return $CI->db->get('admin_tb')->result();	
	}
	
	function get_institution()
	{	
	     $CI = get_instance();
		
		 return $CI->db->get('institution_tb')->result();	
	}
	
	function get_receipts()
	{	
	     $CI = get_instance();
		
		 return $CI->db->get('receipts_tb')->result();	
	}
	
	
	function get_15_apps()
	{
		$CI = get_instance();
		$CI->db->order_by('users_id', 'DESC');
		$CI->db->limit(15);
		return $CI->db->get('users_tb')->result();
	}
	
	function get_15_apps_agent()
	{
		$CI = get_instance();
		$admin = $this->session->userdata('admin');
		$admin_guid= $admin['admin_guid'];
		
		$CI->db->where('users_agent_id', $admin_guid);
		$CI->db->order_by('users_id', 'DESC');
		$CI->db->limit(15);
		return $CI->db->get('users_tb')->result();
	}
	
	
	function get_offer_applications()
	{	
	     $CI = get_instance();
		
		 $CI->db->where('users_status', 6);
		 return $CI->db->get('users_tb')->result();	
	}
	
	function get_offer_applications_agent()
	{	
	     $CI = get_instance();
		
		 $admin = $this->session->userdata('admin');
		 $admin_guid= $admin['admin_guid'];
		
		 $CI->db->where('users_agent_id', $admin_guid);
		 $CI->db->where('users_status', 6);
		 return $CI->db->get('users_tb')->result();	
	}
	
	
	function get_val_applications()
	{	
	     $CI = get_instance();
		
		 $CI->db->where('users_status', 7);
		 return $CI->db->get('users_tb')->result();	
	}
	
	function get_val_applications_agent()
	{	
	     $CI = get_instance();
		
		$admin = $this->session->userdata('admin');
		 $admin_guid= $admin['admin_guid'];
		
		 $CI->db->where('users_agent_id', $admin_guid);
		 $CI->db->where('users_status', 7);
		 return $CI->db->get('users_tb')->result();	
	}
	
	
	
	function get_processing_applications()
	{	
	     $CI = get_instance();
		
		 $CI->db->where('users_status', 3);
		 return $CI->db->get('users_tb')->result();	
	}
	
	function get_processing_applications_agent()
	{	
	     $CI = get_instance();
		
		 $admin = $this->session->userdata('admin');
		 $admin_guid= $admin['admin_guid'];
		
		 $CI->db->where('users_agent_id', $admin_guid);
		 $CI->db->where('users_status', 3);
		 return $CI->db->get('users_tb')->result();	
	}
	
	function get_payment_applications()
	{	
	     $CI = get_instance();
		
		 $CI->db->where('users_status', 9);
		 return $CI->db->get('users_tb')->result();	
	}
	
	function get_payment_applications_agent()
	{	
	     $CI = get_instance();
		
		 $admin = $this->session->userdata('admin');
		 $admin_guid= $admin['admin_guid'];
		
		 $CI->db->where('users_agent_id', $admin_guid);
		 $CI->db->where('users_status', 9);
		 return $CI->db->get('users_tb')->result();	
	}
	
	
	function get_canceled_applications()
	{	
	     $CI = get_instance();
		
		 $CI->db->where('users_status', 10);
		 return $CI->db->get('users_tb')->result();	
	}
	
	function get_canceled_applications_agent()
	{	
	     $CI = get_instance();
		
		 $admin = $this->session->userdata('admin');
		 $admin_guid= $admin['admin_guid'];
		
		 $CI->db->where('users_agent_id', $admin_guid);
		 $CI->db->where('users_status', 10);
		 return $CI->db->get('users_tb')->result();	
	}
	
	
	function get_rejected_applications()
	{	
	     $CI = get_instance();
		
		 $CI->db->where('users_status', 11);
		 return $CI->db->get('users_tb')->result();	
	}
	
	
	
	function get_rejected_applications_agent()
	{	
	     $CI = get_instance();
		
		 $admin = $this->session->userdata('admin');
		 $admin_guid= $admin['admin_guid'];
		
		 $CI->db->where('users_agent_id', $admin_guid);
		 $CI->db->where('users_status', 11);
		 return $CI->db->get('users_tb')->result();	
	}
	
	
	function get_settings()
	{	
	     $CI = get_instance();
		
		 $CI->db->where('id', 1);
		 return $CI->db->get('settings')->row();	
	}
	
	
	
	
	
	
}