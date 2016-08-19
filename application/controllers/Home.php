<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	function __constract()
	{
		parent::__constract();
		//$this->config->base_url();
	}

	public function index()
	{
		$this->load->model('home_model');
		$data['services'] = $this->home_model->getServices();
		$data['tourprior1'] = $this->home_model->getTourprior1();
		$data['tourprior2'] = $this->home_model->getTourprior2();
		$data['tourprior3'] = $this->home_model->getTourprior3();
		$data['tourprior4'] = $this->home_model->getTourprior4();
		$data['roomtypes'] = $this->home_model->getRoomTypes();
		$data['rooms'] = $this->home_model->getRooms();
		$data['abouthotel'] = $this->home_model->getHotelDiscription();
									
		$this->load->view('common/meta',$this->data);
		$this->load->view('common/header',$this->data);
		$this->load->view('home/home',$data);
		$this->load->view('common/footer',$this->data);
	}

}
