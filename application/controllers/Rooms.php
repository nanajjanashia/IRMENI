<?php 

class Rooms extends MY_Controller {

	function __constract()
	{
		parent::__constract();
	}
	
	public function index()
	{
		$this->load->model('rooms_model');
		$data['rooms'] = $this->rooms_model->getRooms();
		
		$this->load->view('common/meta',$this->data);
		$this->load->view('common/header',$this->data);
		$this->load->view('pages/rooms',$data);
		$this->load->view('common/footer',$this->data);
	}
	
	public function detail( $id=null )
	{
		if (!ctype_digit($id)) {
			echo "Invalid Argument Supplied";
		}
		$this->load->model('rooms_model');
		$data['room'] = $this->rooms_model->getRoom( $id );
		$this->data['roomtypes'] = $this->rooms_model->getRoomTypes();
		
		$this->load->view('common/meta',$this->data);
		$this->load->view('common/header',$this->data);
		$this->load->view('pages/room-detail',$data);
		$this->load->view('common/footer',$this->data);
	}
	
	public function booking($addon = null)
	{
		$this->load->model('rooms_model');
		$this->data['roomtypes'] = $this->rooms_model->getRoomTypes();
		$this->data['address'] = $this->rooms_model->getaddress();
		$this->data["addon"] = $addon;
		$this->load->view('common/meta',$this->data);
		$this->load->view('common/header',$this->data);
		$this->load->view('pages/room-booking',$this->data);
		$this->load->view('common/footer',$this->data);
	}
		
	public function saveBooking()
	{
		$this->load->model('rooms_model');
		$result = $this->rooms_model->saveBooking( $_POST );
		
		if( $result ){ echo 'success';}
		else { echo 'error'; }
	}
	
	
	public function sendEmail()
	{
		$this->load->model('rooms_model');
		$result = $this->rooms_model->sendMail( $_POST );
		if( $result == 1 ){ echo 'success';}
		else { echo 'error'; }
	}
	
} 