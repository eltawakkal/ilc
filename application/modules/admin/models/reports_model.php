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

class reports_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$CI = get_instance();
		$CI->load->database();
	}
	
	function get_schools()
	{	
	     $CI = get_instance();
		 return $CI->db->get('schools_tb')->result();	
	}
	
	
	function get_reports_gender($schools_gender,$from_date_gender,$to_date_gender)
	{
	    $CI = get_instance();
		$CI->db->where('schools_gender',$schools_gender);
		$CI->db->where('schools_created_on >=',$from_date_gender);
		$CI->db->where('schools_created_on <=',$to_date_gender);
	   return $CI->db->get('schools_tb')->result();
	}
	
	function get_reports_type($schools_type,$from_date_gender,$to_date_gender)
	{
	    $CI = get_instance();
		$CI->db->where('schools_type',$schools_type);
		$CI->db->where('schools_created_on >=',$from_date_gender);
		$CI->db->where('schools_created_on <=',$to_date_gender);
	   return $CI->db->get('schools_tb')->result();
	}
	
	function get_reports_std_gifted($school,$from_date_school,$to_date_school)
	{
	    $CI = get_instance();
		if(isset($school) && $school !='' && $school !=null){
			$CI->db->where('students_gifted_school_id',$school);
		}
		
		$CI->db->where('students_gifted_created_on >=',$from_date_school);
		$CI->db->where('students_gifted_created_on <=',$to_date_school);
	   return $CI->db->get('students_gifted_tb')->result();
	}
	
	function get_reports_facilities($school,$from_date_school,$to_date_school)
	{
	    $CI = get_instance();
		if(isset($school) && $school !='' && $school !=null){
			$CI->db->where('school_facilities_school_id',$school);
		}
		
		$CI->db->where('school_facilities_created_on >=',$from_date_school);
		$CI->db->where('school_facilities_created_on <=',$to_date_school);
	   return $CI->db->get('school_facilities_tb')->result();
	}
	
	
	function get_reports_teacher($school_teacher,$from_date_teacher,$to_date_teacher)
	{
	    $CI = get_instance();
		if(isset($school_teacher) && $school_teacher !='' && $school_teacher !=null){
			$CI->db->where('teachers_school_id',$school_teacher);
		}
		
		$CI->db->where('teachers_created_on >=',$from_date_teacher);
		$CI->db->where('teachers_created_on <=',$to_date_teacher);
	   return $CI->db->get('teachers_tb')->result();
	}
	
	
	function get_reports_supervisor($school_supervisor,$from_date_supervisor,$to_date_supervisor)
	{
	    $CI = get_instance();
		if(isset($school_supervisor) && $school_supervisor !='' && $school_supervisor !=null){
			$CI->db->where('supervisors_school_id',$school_supervisor);
		}
		
		$CI->db->where('supervisors_created_on >=',$from_date_supervisor);
		$CI->db->where('supervisors_created_on <=',$to_date_supervisor);
	   return $CI->db->get('supervisors_tb')->result();
	}
	
	
	function get_count_student_type($school,$schools_type)
	{
	    $CI = get_instance();
		
		if(isset($school) && $school !='' && $school !=null){
			$CI->db->where('schools_guid',$school);
		}
		if(isset($schools_type) && $schools_type !='' && $schools_type !=null){
			$CI->db->where('schools_type',$schools_type);
		}
		
		$CI->db->select('SUM(schools_student_count) AS amount', FALSE);
		
	   return $CI->db->get('schools_tb')->row();
	}
	
	
	function get_count_student_class($school)
	{
	    $CI = get_instance();
		
		if(isset($school) && $school !='' && $school !=null){
			$CI->db->where('schools_guid',$school);
		}
		
		
		$CI->db->select('SUM(schools_class_count) AS class_count', FALSE);
		
	   return $CI->db->get('schools_tb')->row();
	}
	
	
	
	

}