<?php
class Services_model extends CI_Model
{
	
    public function __construct() {
        parent::__construct();
    }
	
	public function getServices()
	{
		 $query = $this->db->get('services');
         return $query->result();
		
	}
	
	public function getService( $id )
	{
		$query = $this->db->get_where('services', array('id' => $id),1);
        return $query->result();
        //return $query->result_array();
	}
		
}