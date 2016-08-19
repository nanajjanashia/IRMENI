<?php 

class Tours extends MY_Controller {

	function __constract()
	{
		parent::__constract();
	}
	
	public function index()
	{
		$this->load->model('tours_model');
		$data['tours'] = $this->tours_model->getTours();
		
		$this->load->view('common/meta',$this->data);
		$this->load->view('common/header',$this->data);
		$this->load->view('pages/tours',$data);
		$this->load->view('common/footer',$this->data);
	}
	
	public function detail( $id = null )
	{
		
		if (!ctype_digit($id)) {
			echo "Invalid Argument Supplied";
		}	
		$this->load->model('tours_model');
		$data['tour'] = $this->tours_model->getTour( $id );
		
		$this->load->view('common/meta',$this->data);
		$this->load->view('common/header',$this->data);
		$this->load->view('pages/tours-detail',$data);
		$this->load->view('common/footer',$this->data);
	}
	
	
	public function book( $id = null )
	{
		
		if (!ctype_digit($id)) {
			echo "Invalid Argument Supplied";
		}	
		$this->load->model('tours_model');
		$data['tourtitle'] = $this->tours_model->getTourTitle( $id );
		
		$this->load->view('common/meta',$this->data);
		$this->load->view('common/header',$this->data);
		$this->load->view('pages/tours-book',$data);
		$this->load->view('common/footer',$this->data);
	}
	
} 