<?php
class Gallery_model extends CI_Model
{
	
    public function __construct() {
        parent::__construct();
    }
	
	/*public function getGalleries()
	{
		$this->db->select('id, foldername, titleen, titlear, coverfoto, type, images_video');
		$this->db->from('galeries');
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
        return $query->result();
	}
	*/

	public function getAlbum( $id )
	{
		$query = $this->db->get_where('galeries', array('id' => $id),1);
        return $query->result();		
	}
	
	public function getFotoGallery()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get_where('galeries', array('type' => 1));
        return $query->result();		
	}
	
	public function getVideoGallery()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get_where('galeries', array('type' => 2));
        return $query->result();		
	}
	
	
}