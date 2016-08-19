<?php
class Admin_model extends CI_Model
{
	
    public function __construct() {
        parent::__construct();
    }
	
	public function getGalleries()
	{
		$this->db->order_by('id', 'DESC');
		$this->db->select('id, titleen, titlear, type');
		$this->db->from('galeries');
		$query = $this->db->get();
        return $query->result();		
	}
	
	public function getHotlDisc( )
	{	
		$query = $this->db->get('abouthotel');
        return $query->result();			 
	}
	
	public function getHotlDiscFooter( )
	{	
		$query = $this->db->get('aboutfooter');
        return $query->result();			 
	}
	
	public function getTopImage( )
	{	
		$query = $this->db->get('pagetopimage');
        return $query->result();			 
	}
	
	public function getLogo()
	{	
		$query = $this->db->get('logo');
        return $query->result();			 
	}
	
	public function getCopyright()
	{	
		$query = $this->db->get('copyright');
        return $query->result();			 
	}
	
	public function changeLogo( $data )
	{	
		$this->db->where('id', $data['id']);
		$result = $this->db->update('logo', $data);
		return $result;
	}
	
	public function updateCopyright( $data )
	{	
		$this->db->where('id', $data['id']);
		$result = $this->db->update('copyright', $data);
	}
	
	public function updateTopPageImage( $data )
	{
		$this->db->where('id', $data['id']);
		$result = $this->db->update('pagetopimage', $data);
        return $result;
	}
	
	public function updatehtlDisc( $data )
	{
		$this->db->where('id', $data['id']);
		$result = $this->db->update('abouthotel', $data);
        return $result;
	}
	
	public function updatehtlDiscFooter( $data )
	{
		$this->db->where('id', $data['id']);
		$result = $this->db->update('aboutfooter', $data);
        return $result;
	}
	
	public function getGallery( $id )
	{	
		//$sql = $this->db->get_compiled_select('mytable');
//echo $sql;

		$query = $this->db->get_where('galeries', array('id' => $id));
        return $query->result();			 
	}
	
	public function updateGallery( $data )
	{	
		if( $data["type"] == 1 )
			$data["images_video"] = str_replace("img=", "", $data["images_video"]);
		$data["images_video"] = str_replace("+", " ", $data["images_video"]);
				
		$this->db->where('id', $data['id']);
		$result = $this->db->update('galeries', $data);
        return $result;
	}
	
	public function createFotoGallery( $data )
	{	
		$data["images_video"] = str_replace("img=", "", $data["images_video"]);
		$data["images_video"] = str_replace("+", " ", $data["images_video"]);
		//print_r($data["images_video"]); die;
		$data["foldername"] = "resource";
		$result = $this->db->insert('galeries', $data);		
        return $result;
	}
	
	public function createVideoGallery( $data )
	{	
		$data["foldername"] = "resource";
		$result = $this->db->insert('galeries', $data);		
        return $result;
	}
	
	public function deleteGalerry( $id )
	{		
		$this->db->where('id', $id);
		$result = $this->db->delete('galeries');
		return $result;	
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
	
	public function insertNews( $data )
	{		
		$result = $this->db->insert('news', $data);		
        return $result;
	}
	
	public function updateNews( $data )
	{		
		$this->db->where('id', $data['id']);
		$result = $this->db->update('news', $data);
        return $result;		
	}
	
	public function deleteNews( $id )
	{		
		$this->db->where('id', $id);
		$result = $this->db->delete('news');
		return $result;		
	}
	
	public function getAbout()
	{		
		$query = $this->db->get('about');
        return $query->result();
	}
	
	public function updateAbout( $data )
	{
		$this->db->where('id', $data['id']);
		$result = $this->db->update('about', $data);
        return $result;	
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
	
	public function updateMap( $data )
	{	
		$this->db->where('id', $data['id']);
		$result = $this->db->update('map', $data);
        return $result;		
	}
	public function updateContact( $data )
	{	
		$this->db->where('id', $data['id']);
		$result = $this->db->update('contact', $data);
        return $result;		
	}
	
	public function updateService( $data )
	{	
		$data["bigimages"] = str_replace("bigimg=", "", $data["bigimages"]);
		$data["smallimages"] = str_replace("smallimg=", "", $data["smallimages"]);
		//print_r($data["smallimages"]); die;
		$this->db->where('id', $data['id']);
		$result = $this->db->update('services', $data);
        return $result;	
	}
	
	public function getServices()
	{		
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('services');
        return $query->result();	
	}
	
	public function getRooms()
	{			
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('rooms');
        return $query->result();
	}
	
	public function getRoomTypes()
	{		
		$query = $this->db->get('roomtypes');
        return $query->result();
	}
	
	public function insertRoom( $data )
	{		
		$data["bigimages"] = str_replace("bigimg=", "", $data["bigimages"]);
		$data["smallimages"] = str_replace("smallimg=", "", $data["smallimages"]);
		$data["bigimages"] = str_replace("+", " ", $data["bigimages"]);
		$data["smallimages"] = str_replace("+", " ", $data["smallimages"]);
		//print_r($data['coverimage']); die;
		$result = $this->db->insert('rooms', $data);		
        return $result;
	}
		
	public function updateRoom( $data )
	{	
		$data["bigimages"] = str_replace("bigimg=", "", $data["bigimages"]);
		$data["smallimages"] = str_replace("smallimg=", "", $data["smallimages"]);
		$data["bigimages"] = str_replace("+", " ", $data["bigimages"]);
		$data["smallimages"] = str_replace("+", " ", $data["smallimages"]);
		
		$this->db->where('id', $data['id']);
		$result = $this->db->update('rooms', $data);
        return $result;	
	}
		
	public function deleteRoom( $id )
	{		
		$this->db->where('id', $id);
		$result = $this->db->delete('rooms');
		return $result;	
	}
	
	public function getRoom( $id )
	{	
		$query = $this->db->get_where('rooms', array('id' => $id));
        return $query->result();			 
	}
	
	
	public function getIcons()
	{		
		$query = $this->db->get('icons');
        return $query->result();
	}
	
	public function getService( $id )
	{	
		$query = $this->db->get_where('services', array('id' => $id));
        return $query->result();			 
	}
	
	public function insertService( $data )
	{		
		$data["bigimages"] = str_replace("bigimg=", "", $data["bigimages"]);
		$data["smallimages"] = str_replace("smallimg=", "", $data["smallimages"]);
		$result = $this->db->insert('services', $data);		
        return $result;
	}
	
	public function deleteService( $id )
	{		
		$this->db->where('id', $id);
		$result = $this->db->delete('services');
		return $result;	
	}
	
	public function getTours()
	{		
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('tours');
        return $query->result();	
	}	

	public function insertTour( $data )
	{		
		$data['price'] = $data['price'] * 100;
		$result = $this->db->insert('tours', $data);		
        return $result;
	}
		
	public function getTour( $id )
	{	
		$query = $this->db->get_where('tours', array('id' => $id));
        return $query->result();			 
	}
	
	public function updateTour( $data )
	{	
		$this->db->where('id', $data['id']);
		$result = $this->db->update('tours', $data);
        return $result;	
	}
	
	public function deleteTour( $id )
	{		
		$this->db->where('id', $id);
		$result = $this->db->delete('tours');
		return $result;	
	}
}