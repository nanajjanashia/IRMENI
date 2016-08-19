<?php
class News_model extends CI_Model
{
	
    public function __construct() {
        parent::__construct();
    }
	
	public function getNews()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('news');
        return $query->result();
	}
	
	public function getDetailNews( $id )
	{
		 $query = $this->db->get_where('news', array('id' => $id),1);
         return $query->result();
		
	}
}