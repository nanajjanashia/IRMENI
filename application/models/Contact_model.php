<?php

class Contact_model extends CI_Model
{
	
    public function __construct() {
        parent::__construct();
    }
	
	public function getContact()
	{
		 $query = $this->db->get('contact');
         return $query->result();
	}
	
	public function getMap()
	{		
		$query = $this->db->get('map');
         return $query->result();	
	}
}