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


class students_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$CI = get_instance();
		$CI->load->database();
	}


	function get_app($from_date,$to_date)
	{
		$CI = get_instance();
		if(isset($from_date) && $from_date !='' && $from_date !=null){
			$CI->db->where('u.users_created_on >=',$from_date);
		}

		if(isset($to_date) && $to_date !='' && $to_date !=null){
			$CI->db->where('u.users_created_on <=',$to_date);
		}

		//$CI->db->where('u.users_agent_id IS NULL', null, false);
		$CI->db->where('u.users_agent_id =', '');
		$CI->db->join('admin_tb a', 'a.admin_guid = u.users_admin_id', 'LEFT');
		return $CI->db->get('users_tb u')->result();
	}
	
	
	function get_app_by_id($from_date,$to_date,$agent_id)
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
		
		$CI->db->join('admin_tb a', 'a.admin_guid = u.users_admin_id', 'LEFT');
		return $CI->db->get('users_tb u')->result();
	}
	
	function get_send()
	{
		$CI = get_instance();
		$admin = $this->session->userdata('admin');
		$admin_guid= $admin['admin_guid'];
		//$CI->db->distinct('m.messages_id');
		$CI->db->group_by('m.messages_guid');// add group_by
		$CI->db->group_by('m.message_created_on');
        $CI->db->order_by("message_created_on", "DESC");
		$CI->db->where('m.messages_from',$admin_guid);
		$CI->db->join('users_tb u', 'u.users_admin_id = m.messages_to', 'LEFT');
		$CI->db->join('admin_tb a', 'a.admin_guid = m.messages_to', 'LEFT');
		return $CI->db->get('messages_tb m')->result();
	}
	
	function get_inbox()
	{
		$CI = get_instance();
		$admin = $this->session->userdata('admin');
		$admin_guid= $admin['admin_guid'];
		
		$CI->db->group_by('m.messages_guid');// add group_by
		$CI->db->group_by('m.message_created_on');
        $CI->db->order_by("message_created_on", "DESC");
		$CI->db->where('m.messages_to',$admin_guid);
		$CI->db->join('users_tb u', 'u.users_admin_id = m.messages_from', 'LEFT');
		$CI->db->join('admin_tb a', 'a.admin_guid = m.messages_from', 'LEFT');
		return $CI->db->get('messages_tb m')->result();
	}
	
	function get_agent($id)
	{
		$CI = get_instance();
	
		$CI->db->where('agents_user_id',$id);
		return $CI->db->get('agents_tb')->row();
	}
	

	
	
	
	function get_details($id)
	{
		$CI = get_instance();
		
		$CI->db->where('m.messages_guid',$id);
		
		
		
		$CI->db->join('admin_tb a', 'a.admin_guid = m.messages_to', 'LEFT');
		//$CI->db->join('users_tb u', 'u.users_admin_id = m.messages_from', 'LEFT');
		return $CI->db->get('messages_tb m')->row();
	}
	
	
	function get_replys($id)
	{
		$CI = get_instance();
		
		$CI->db->where('r.replys_msg_id',$id);
		$CI->db->group_by('r.replys_msg_id');// add group_by
		$CI->db->group_by('r.replys_created_on');
		
		$CI->db->join('agents_tb g', 'g.agents_user_id = r.replys_from', 'LEFT');
		$CI->db->join('users_tb u', 'u.users_admin_id = r.replys_from', 'LEFT');
		$CI->db->join('admin_tb a', 'a.admin_guid = r.replys_from', 'LEFT');
		return $CI->db->get('replys_tb r')->result();
	}
	
	function get_users()
	{
		$CI = get_instance();
		$admin = $this->session->userdata('admin');
		$admin_guid= $admin['admin_guid'];
		
		$CI->db->where('users_admin_id <>',$admin_guid);
		return $CI->db->get('users_tb')->result();
	}
	
	
	function get_users_by_agent()
	{
		$CI = get_instance();
		$admin = $this->session->userdata('admin');
		$admin_guid= $admin['admin_guid'];
		
		$CI->db->where('users_agent_id',$admin_guid);
		return $CI->db->get('users_tb')->result();
	}
	
	/*function get_admins()
	{
		$CI = get_instance();
		$admin = $this->session->userdata('admin');
		$admin_guid= $admin['admin_guid'];
		
		$admins = array(1,4);
		$CI->db->where('admin_role',$admins);
		return $CI->db->get('admin_tb')->result();
	}*/
	
	
	function get_count_inbox()
	{
		$CI = get_instance();
		$admin = $this->session->userdata('admin');
		$admin_guid= $admin['admin_guid'];
		
		$CI->db->group_by('m.messages_guid');// add group_by
		$CI->db->group_by('m.message_created_on');
		$CI->db->where('m.messages_to',$admin_guid);
		$CI->db->where('m.messages_to_view',0);
		$CI->db->order_by("message_created_on", "DESC");
		$CI->db->join('users_tb u', 'u.users_admin_id = m.messages_from', 'LEFT');
		return $CI->db->get('messages_tb m')->result();
	}
	
	
	function get_attach_by_id($id)
	{
		$CI = get_instance();
		$CI->db->where('messages_id',$id);
		return $CI->db->get('messages_tb')->row();
	}
	
	function delete($id)//delte documents
	{
			   $this->db->where('messages_id',$id);
		       $this->db->delete('messages_tb');
	}
	
	
	function get_names()
	{
		$CI = get_instance();
		$query = $CI->db->query("SELECT users_admin_id as id, users_fullname as name FROM users_tb  
		   UNION ALL
		   SELECT agents_user_id as id, agents_company_name as name FROM agents_tb
		   UNION ALL
		   SELECT agents_user_id as id, agents_fullname as name FROM agents_tb");
				$cari = $query->result();
		return $cari;
	}
	
	function get_namesby_agent()
	{
		$CI = get_instance();
		$admin = $this->session->userdata('admin');
		$admin_guid= $admin['admin_guid'];
		
		$query = $CI->db->query("SELECT * FROM users_tb WHERE users_agent_id = '$admin_guid' GROUP BY users_admin_id ORDER BY users_fullname ASC");
				$cari = $query->result();
		return $cari;
	}

    function save_document($save)
    {
        $CI = get_instance();
        $CI->db->insert('reply_attachs_tb',$save);
        return $CI->db->insert_id();
    }


    function get_reply_attach($id)
    {
        $CI = get_instance();
        $CI->db->where('reply_attachs_reply_id',$id);
        return $CI->db->get('reply_attachs_tb')->result();
    }


    function get_attach_reply($id)
    {
        $CI = get_instance();
        $CI->db->where('reply_attachs_id',$id);
        return $CI->db->get('reply_attachs_tb')->row();
    }


    function get_reply_by_id($id)
    {
        $CI = get_instance();
        $CI->db->where('replys_msg_id',$id);
        return $CI->db->get('replys_tb')->result();
    }


    function get_name($id)
    {
        $CI = get_instance();
        $CI->db->where('admin_guid',$id);
        $CI->db->join('users_tb u', 'u.users_admin_id = a.admin_guid', 'LEFT');
        return $CI->db->get('admin_tb a')->row();
    }




	
	
	
	
}