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


class setting_model extends CI_Model 
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
		return  $CI->db->get('settings')->row();
	}
	
	
	function update($save)
	{
		$this->db->where('id',1);
		$this->db->update('settings',$save);
	}

	
}