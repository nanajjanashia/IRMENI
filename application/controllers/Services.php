<?php 

class Services extends MY_Controller {

	function __constract()
	{
		parent::__constract();
	}
	
	public function index()
	{
		$this->load->model('services_model');
		$data['services'] = $this->services_model->getServices();
		
		$this->load->view('common/meta',$this->data);
		$this->load->view('common/header',$this->data);
		$this->load->view('pages/services',$data);
		$this->load->view('common/footer',$this->data);
	}
	
	public function detail( $id = null )
	{
		if (!ctype_digit($id)) {
			echo "Invalid Argument Supplied";
		}	
		$this->load->model('services_model');
		$data['service'] = $this->services_model->getService( $id );
		
		$this->load->view('common/meta',$this->data);
		$this->load->view('common/header',$this->data);
		$this->load->view('pages/service-detail',$data);
		$this->load->view('common/footer',$this->data);
	}
	
	
} 