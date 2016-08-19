<?php 

class Contact extends MY_Controller {

	function __constract()
	{
		parent::__constract();
	}
	
	public function index()
	{
		$this->load->model('contact_model');
		$this->data['contact'] = $this->contact_model->getcontact();
		$this->data['map'] = $this->contact_model->getMap();
		
		$this->load->view('common/meta',$this->data);
		$this->load->view('common/header',$this->data);
		$this->load->view('pages/contact',$this->data);
		$this->load->view('common/footer',$this->data);
	}
	
	
	public function sendMail()
	{
		$username = $this->input->post("name");
		$useremail = $this->input->post("email");
		$subject = $this->input->post("subject");
		$body = $this->input->post("comments");
		
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
	
	
	
	public function tour_book()
	{
		$body = "";
		//print_r($this->input->post()); die;
		
		$username = $this->input->post("name");
		$useremail = $this->input->post("email");
		$subject = $this->input->post("subject");
		$body .= $this->input->post("tourname");
		$body .= "Personal identification number: ".$this->input->post("IDnumber");
		$body .= "Pnone : ".$this->input->post("phone");
		$body .= $this->input->post("comments");
		
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