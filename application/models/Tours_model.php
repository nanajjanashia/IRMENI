<?php
class Tours_model extends CI_Model
{
	
    public function __construct() {
        parent::__construct();
    }
	
	public function getTours()
	{
		 $this->db->order_by('id', 'DESC');
		 $query = $this->db->get('tours');
		
         return $query->result();
		
	}
	
	public function getTour( $id )
	{
		$query = $this->db->get_where('tours', array('id' => $id),1);
        return $query->result();
	}
	
	public function getTourTitle( $id )
	{
		$this->db->select('titleen, titlear');		
		$query = $this->db->get_where('tours', array('id' => $id),1);
        return $query->result();
	}
	
		
}