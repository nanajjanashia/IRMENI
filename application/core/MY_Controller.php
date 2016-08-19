<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	public $data = array();

	public function __construct(){
		
		parent::__construct();
		
		$this->data['language'] = $language = $this->lang->lang();
		if(!$this->uri->segment(1)){
			redirect(base_url("en"));
		}	
		
		$this->data['controller'] = $controller = $this->uri->segment(2);
		$this->data['view'] = $function = $this->uri->segment(3);
		$this->data['slug'] = $slug = $this->uri->segment(4);
	
		
		$this->data["title"] = "MYLOMBARD";
		$this->data["keywords"] = "MYLOMBARD";
		$this->data["description"] = "MYLOMBARD";
		
		//get weather
		$weather = [];
		$this->load->model('home_model');
		$location = $this->home_model->getLocation();
		$condition = $this->home_model->getCondition();
		
		if( isset($location) && !empty($location) && isset($condition) && !empty($condition))
		{
			$weather['city'] = $location[0]->EnglishName;
			$weather['country'] = $location[0]->Country->EnglishName;
			$weather['icon'] = $condition[0]->WeatherIcon;
			$weather['temperature'] = $condition[0]->Temperature->Metric->Value;
			$weather['unit'] = $condition[0]->Temperature->Metric->Unit;			
		}	
		$this->data['weather'] = $weather;
		
		// get currency 
		$currency = $this->home_model->getCurrency();
		if( isset($currency) && !empty($currency) )
		{
			$this->data['currency'] = $currency;
		}
		
		
		$this->data['lastnews'] = $this->home_model->getLastNews();
		$this->data['address'] = $this->home_model->getAddress();
		$this->data['footerrooms'] = $this->home_model->getfoterRooms();
		$this->data['footerabout'] = $this->home_model->getfoterAbout();
		$this->data['logo'] = $this->home_model->getLogo();
		$this->data['copyright'] = $this->home_model->getCopyright();
		
	}		

}
