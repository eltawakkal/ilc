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


class clients_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$CI = get_instance();
		$CI->load->database();
	}
	
	function get_case_by_client()
	{
		$CI = get_instance();
	    $admin = $CI->session->userdata('admin');
		$CI->db->where('client_id',$admin['admin_id']);
		return $CI->db->get('cases')->result();
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
		$CI->db->order_by('user_id', 'DESC');
	    return $CI->db->get('user_tb')->result();
	}
	
	function get_dashborad()
	{
		$CI = get_instance();
		$CI->db->order_by('user_id', 'DESC');
		$CI->db->limit(5);
	    return $CI->db->get('user_tb')->result();
	}
	
	function get_all_clients_exports()
	{
		$CI = get_instance();
		$CI->db->select('u.*,lo.*,r.*,c.*,us.*');
        $CI->db->join('location_tb lo', 'lo.location_user_id = u.user_id', 'LEFT');
		$CI->db->join('region_tb r', 'r.region_id = lo.location_region_id', 'LEFT');
		$CI->db->join('city_tb c', 'c.city_id = lo.location_city_id', 'LEFT');
		$CI->db->join('user_status_tb us', 'us.user_status_id = u.user_status', 'LEFT');
		
	    return $CI->db->get('user_tb u')->result();
	}

	
	function get_client_by_id($id)
	{
		$CI = get_instance();
		$CI->db->select('u.*,us.*,c.*,r.*,lo.*,SUM(p.point_balance) as point_balance,p.*');
		$CI->db->where('u.user_id',$id);
		$CI->db->group_by('p.point_user_id');
		$CI->db->join('location_tb lo', 'lo.location_user_id = u.user_id', 'LEFT');
		$CI->db->join('region_tb r', 'r.region_id = lo.location_region_id', 'LEFT');
		$CI->db->join('city_tb c', 'c.city_id = lo.location_city_id', 'LEFT');
		$CI->db->join('user_status_tb us', 'us.user_status_id = u.user_status', 'LEFT');
		$CI->db->join('point_tb p', 'p.point_user_id = u.user_id', 'LEFT');
		return $CI->db->get('user_tb u')->row();
	}
	
	function get_point_by_id($id)
	{
		$CI = get_instance();
		$CI->db->select('SUM(p.point_balance) as point_balance');
		$CI->db->where('u.user_id',$id);
		$CI->db->group_by('p.point_user_id');
		$CI->db->join('user_tb u ', 'u.user_id =p.point_user_id ', 'LEFT');
		return $CI->db->get('point_tb p')->result();
		 
	}
	
	function get_cities_by_id($id)
	{
		$CI = get_instance();
		$CI->db->select('u.*,lo.*,c.*,r.*, c.city_name city_name');
		$CI->db->where('u.user_id',$id);
		$CI->db->join('location_tb lo', 'lo.location_user_id = u.user_id', 'LEFT');
		$CI->db->join('region_tb r', 'r.region_id = lo.location_region_id', 'LEFT');
		$CI->db->join('city_tb c', 'c.city_id = lo.location_city_id', 'LEFT');
		return $CI->db->get('user_tb u')->result();
	}
	
	function get_count_cities_by_id($id)
	{
		$CI = get_instance();
		$CI->db->where('lo.location_user_id',$id);
		return $CI->db->get('location_tb lo')->result();
	}
	
	function get_client_request($id)
	{
		
		$CI = get_instance();
		$CI->db->select('SUM(p.product_price) total_price,p.product_id, p.product_name,p.product_cat_id,p.product_cat_detiats,p.product_img,p.product_price,p.product_delivery_price,p.product_organizer_type,p.product_color,p.product_wheels_no,p.product_material,p.product_type,p.product_description,p.product_create_on,p.product_delivery_price_double,p.product_create_by,r.*,u.*,rd.*,t.*,rs.*');
		$CI->db->where('r.request_status',3);
		$CI->db->where('u.user_id',$id);
		$CI->db->group_by('r.request_id');
		$CI->db->join('user_tb u', 'u.user_id = r.request_user', 'LEFT');
		$CI->db->join('request_detail_tb rd', 'rd.request_id = r.request_id', 'LEFT');
		$CI->db->join('request_status_tb rs', 'rs.request_status_id = r.request_status', 'LEFT');
		$CI->db->join('transporter_tb t', 't.transporter_id = r.transporter_id', 'LEFT');
		$CI->db->join('product_tb p', 'p.product_id = rd.product_id', 'LEFT');
		return $CI->db->get('request_tb r')->result();
		
		
		
		
		/*$CI = get_instance();
		$CI->db->select('u.*,rd.*,r.*, p.*,t.*,rs.*');
		$CI->db->where('u.user_id',$id);
		$CI->db->where('r.request_status',3);
		$CI->db->join('user_tb u', 'u.user_id = r.request_user', 'LEFT');
		$CI->db->join('request_detail_tb rd', 'rd.request_id = r.request_id', 'LEFT');
		$CI->db->join('request_status_tb rs', 'rs.request_status_id = r.request_status', 'LEFT');
		$CI->db->join('transporter_tb t', 't.transporter_id = r.transporter_id', 'LEFT');
		$CI->db->join('product_tb p', 'p.product_id = rd.product_id', 'LEFT');
		return $CI->db->get('request_tb r')->result();*/
	}
	
		
	function get_request_id($id)
	{
		
		$CI = get_instance();
		$CI->db->select('p.*,r.*,u.*,rd.*,t.*,rs.*');
		$CI->db->where('r.request_status',3);
		$CI->db->where('u.user_id',$id);
		$CI->db->group_by('r.request_id');
		$CI->db->join('user_tb u', 'u.user_id = r.request_user', 'LEFT');
		$CI->db->join('request_detail_tb rd', 'rd.request_id = r.request_id', 'LEFT');
		$CI->db->join('request_status_tb rs', 'rs.request_status_id = r.request_status', 'LEFT');
		$CI->db->join('transporter_tb t', 't.transporter_id = r.transporter_id', 'LEFT');
		$CI->db->join('product_tb p', 'p.product_id = rd.product_id', 'LEFT');
		$get_request_id= $CI->db->get('request_tb r')->result();
		$get_request_id = array();

		$request_id= $get_request_id->request_id;
		//echo $request_id; exit;
		return $request_id;

	}
	

	function  client_view_by_admin($id)
	{
		$CI = get_instance();
		$CI->db->where('user_id',$id);
		$CI->db->set('user_is_view',1);
		$CI->db->update('user_tb');
	}
	
	function update($save,$id)
	{
		$CI = get_instance();
			   $CI->db->where('id',$id);
		       $CI->db->update('users',$save);
	}
	
	
	function delete($id)//delte client
	{
		$CI = get_instance();
			   $CI->db->where('user_id',$id);
		       $CI->db->delete('user_tb');
	}
	
	function activate_user($id)
	{
		$CI = get_instance();
			   $CI->db->where('user_id',$id);
			   $CI->db->set('user_status',1);
		       $CI->db->update('user_tb');
	}
	
}