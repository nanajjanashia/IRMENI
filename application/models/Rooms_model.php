<?php
class Rooms_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
	
	public function getRoomTypes()
	{
		 $query = $this->db->get('roomtypes');
         return $query->result();
	}

	public function getRooms()
	{
		 $query = $this->db->query('SELECT r.id, r.roomnumber, t.type, r.coverimage, r.price, r.icons FROM `rooms` as r inner join roomtypes as t on t.id=r.roomtypeid  order by r.id desc');
         return $query->result();
	}

	public function getRoom( $id )
	{
		$query = $this->db->get_where('rooms', array('id' => $id),1);
        return $query->result();
	}
	
	public function getaddress()
	{
		$query = $this->db->get('contact');
        return $query->result();
	}
	
	public function saveBooking( $data )
	{
		$result = $this->db->insert('booking', $data);		
        return $result;
	}
	
	public function sendMail( $data )
	{
		$username = $data['username'];
		$useremail = $data['useremail'];
		$subject = $data['roomtype'];
		$body = $data['message'];
		
			$this->load->library('email');
	  	    $this->email->from("noreply@itda.ge", $username);
	  	    $this->email->cc($useremail); 
	  	    $this->email->to("nana.jjanashia@gmail.com"); 
	  	    $this->email->subject($subject);
	  	    $this->email->message($body);
	  	    $this->email->send();

			if ( ! $this->email->send())
			{
			    $mesaage = "Message wasn't send";
			    $success = false;
			}
			
			$success = true;
			$message =  "Message sent successfully";

		print_r($message);
	}
	
}