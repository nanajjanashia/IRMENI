<?php
class About_model extends CI_Model
{
	
    public function __construct() {
        parent::__construct();
    }
	
	public function getAbout()
	{
		 $query = $this->db->get('about');
         return $query->result();
		
	}
	
	public function getAboutLists()
	{
		 $query = $this->db->get('about_list');
         return $query->result();
		
	}
}