<?php 

class Gallery extends MY_Controller {

	function __constract()
	{
		parent::__constract();
		//$this->config->base_url();
	}
	
	public function index()
	{
		$this->load->model('gallery_model');
		//$data['galleries'] = $this->gallery_model->getGalleries();
		$data['fotogallery'] = $this->gallery_model->getFotoGallery();
		$data['videogallery'] = $this->gallery_model->getVideoGallery();
					
		$this->load->view('common/meta',$this->data);
		$this->load->view('common/header',$this->data);
		$this->load->view('pages/gallery',$data);
		$this->load->view('common/footer',$this->data);
	}
	
	public function album( $id = null )
	{
		if (!ctype_digit($id)) {
			echo "Invalid Argument Supplied"; die;
		}	
		$this->load->model('gallery_model');
		$data['album'] = $this->gallery_model->getAlbum( $id );
		$this->load->view('common/meta',$this->data);
		$this->load->view('common/header',$this->data);
		$this->load->view('pages/gallery-album',$data);
		$this->load->view('common/footer',$this->data);
	}
	
	
} 