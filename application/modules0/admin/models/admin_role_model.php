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

class admin_role_model extends CI_Model 
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
		$CI->db->insert('admin_role',$save);
	}
	
	function get_all()
	{
		$CI = get_instance();
		$this->db->where("id !=",'2');
		return $CI->db->get('admin_role')->result();
	}
	
	function get_admin_roles()
	{
		$CI = get_instance();
				  $CI->db->where('id !=',1);
				  $CI->db->where('id !=',2);		
			return $CI->db->get('admin_role')->result();
	}
	
	function get($id)
	{
			   $CI = get_instance();
			   $CI->db->where('id',$id);
		return $CI->db->get('admin_role')->row();
	}
	
	function update($save,$id)
	{
		$CI = get_instance();
			   $CI->db->where('id',$id);
		       $CI->db->update('admin_role',$save);
	}
	
	
	function delete($id)//delte admin_role
	{
		$CI = get_instance();
			   $CI->db->where('id',$id);
		       $CI->db->delete('admin_role');
	}
	
	
		public function get_all_actions(){
			$CI = get_instance();
		return $CI->db->get('actions')->result();
	}
	 
	public function update_permissions($data){
		$CI = get_instance();
		if(empty($data)){
			$CI->db->truncate('rel_role_action');
			return true;
		}else{
			$CI->db->truncate('rel_role_action');
			foreach($data as $ind=>$value){
				foreach($value as $index=>$value){
					$data = array('role_id'=>$ind,'action_id'=>$index);
					$CI->db->insert('rel_role_action', $data);
				}
			}
			return true;	
		}	
	
	} 
	
	public function get_permissions(){
		$CI = get_instance();
		return $CI->db->get('rel_role_action')->result();
	}
	
	public function get_action_parent_id($slug){
		$CI = get_instance();
		$CI->db->where('name',$slug);
		return $CI->db->get('actions')->row('id');
	}
	public function get_action_id_by_name_parent($action, $parent_id=false){
		
		$CI = get_instance();
		$CI->db->select('id,always_allowed');
		$CI->db->where('name',$action);
		if($parent_id){
			$CI->db->where('parent_id',$parent_id);
		}
		$res = $CI->db->get('actions');
		if($res->num_rows()){
			return $res;	
		}else
			return false;
	}
	
	public function check_is_allowed($depart_id,$action_id){
		$CI = get_instance();
		$CI->db->where('role_id',$depart_id);
		$CI->db->where('action_id',$action_id);
		return $CI->db->get('rel_role_action')->num_rows();
	}
	
}