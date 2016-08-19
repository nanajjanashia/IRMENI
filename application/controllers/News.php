<?php 

class News extends MY_Controller {

	function __constract()
	{
		parent::__constract();
	}
	
	public function index()
	{
		$this->load->model('news_model');
		$data['news'] = $this->news_model->getNews();
		
		$this->load->view('common/meta',$this->data);
		$this->load->view('common/header',$this->data);
		$this->load->view('pages/news',$data);
		$this->load->view('common/footer',$this->data);
	}
	
	public function detail( $id = NULL )
	{
		if (!ctype_digit($id)) {
			echo "Invalid Argument Supplied";
		}	
		$this->load->model('news_model');
		$data['news_detail'] = $this->news_model->getDetailNews( $id );
		
		$this->load->view('common/meta',$this->data);
		$this->load->view('common/header',$this->data);
		$this->load->view('pages/news-detail',$data);
		$this->load->view('common/footer',$this->data);
		
		
	}
	
	
} 