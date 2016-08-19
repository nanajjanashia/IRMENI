<?php
class Home_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
	
	public function getTourprior1()
	{
		$this->db->where('position', 1);
		$this->db->select('id, titleen, titlear, tourbasic, price, person');
		$this->db->order_by('id', 'DESC');
		$this->db->from('tours');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getTourprior2()
	{
		$this->db->where('position', 2);
		$this->db->select('id, titleen, titlear, tourbasic, price, person');
		$this->db->order_by('id', 'DESC');
		$this->db->from('tours');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getTourprior3()
	{
		$this->db->where('position', 3);
		$this->db->select('id, titleen, titlear, tourbasic, price, person');
		$this->db->order_by('id', 'DESC');
		$this->db->from('tours');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getTourprior4()
	{
		$this->db->where('position', 4);
		$this->db->select('id, titleen, titlear, tourbasic, price, person');
		$this->db->order_by('id', 'DESC');
		$this->db->from('tours');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getServices()
	{
		$this->db->select('id, titleen, titlear, icon, coverfoto');
		$this->db->order_by('id', 'DESC');
		$this->db->from('services', 8);
		$query = $this->db->get();
		return $query->result();
	}
		
	public function getRooms()
	{
		$query = $this->db->query("SELECT r.id, r.roomnumber, UPPER(t.type) as type, r.price, r.icons, r.homeimage, LEFT (r.texten, 160) as texten, LEFT (r.texten, 160) as textar  FROM `rooms` as r inner join `roomtypes` as t on t.id=r.roomtypeid WHERE homeimage != '' order by r.id desc limit 5");		
		return $query->result();
	}
	
	public function getfoterRooms()
	{
		$query = $this->db->query("SELECT r.id, t.type, r.roomnumber, r.footerimage FROM `rooms` AS r INNER JOIN roomtypes AS t ON t.id = r.roomtypeid
			WHERE r.footerimage != '' ORDER BY RAND() LIMIT 3");		
		return $query->result();
	}
	
	public function getLastNews()
	{
		$this->db->select('id, titleen, titlear, dt');
		$this->db->order_by('id', 'DESC');
		$this->db->from('news');
		$this->db->limit(2);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getAddress()
	{
		 $query = $this->db->get('contact');
         return $query->result();
	}
	
	public function getRoomTypes()
	{
		 $query = $this->db->get('roomtypes');
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
	
	public function getHotelDiscription()
	{
		 $query = $this->db->get('abouthotel');
         return $query->result();
	}
	
	public function getfoterAbout()
	{
		 $query = $this->db->get('aboutfooter');
         return $query->result();
	}
	
	public function getLocation()
	{
		$url = 'http://apidev.accuweather.com/locations/v1/search?q=tbilisi&apikey=hoArfRosT1215';
		
		$ch = curl_init( $url );
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type:application/x-www-form-urlencoded'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_TIMEOUT, 15);  // 5 second limit
        $result = curl_exec($ch);
        curl_close($ch);
			
		$result = json_decode( $result );
		
		return $result;
	}
	
	public function getCondition()
	{		
		$url = 'http://apidev.accuweather.com/currentconditions/v1/171705.json?language=en&apikey=hoArfRosT1215';
		
		$ch = curl_init( $url );
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type:application/x-www-form-urlencoded'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_TIMEOUT, 15);  // 5 second limit
        $result = curl_exec($ch);
        curl_close($ch);
			
		$result = json_decode( $result );
		return $result;
	}
		
	public function getCurrency()
	{			
		$client = new SoapClient('http://nbg.gov.ge/currency.wsdl');
		$result = $client->GetCurrency('USD');
		return $result;
	}
}