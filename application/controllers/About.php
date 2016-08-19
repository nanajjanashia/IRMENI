<?php 

class About extends MY_Controller {

	function __constract()
	{
		parent::__constract();
	}
	
	public function index()
	{
		$this->load->model('about_model');
		$data['about'] = $this->about_model->getAbout();
		$data['list'] = $this->about_model->getAboutLists();
		
		$this->load->view('common/meta',$this->data);
		$this->load->view('common/header',$this->data);
		$this->load->view('pages/about',$data);
		$this->load->view('common/footer',$this->data);
	}
	
	
} 