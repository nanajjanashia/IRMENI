<?php 

class Admin extends MY_Controller 
{	
	function __constract()
	{
		parent::__constract();
	}
	
    function logged_in()
    {
      if ($this->session->userdata('level')==1){
        return true;
	}else {
		$this->load->view('admin/header');
		$this->load->view('admin/login');
		$this->load->view('admin/footer');	
		}
    }
	
	function index($category = null )	
	{
	  if (!$this->logged_in())return false;
	  
			$this->load->model('admin_model');
			$data['abouthotel'] = $this->admin_model->getHotlDisc();
			$data['abouthotelfooter'] = $this->admin_model->getHotlDiscFooter();
			$data['logo'] = $this->admin_model->getLogo();
			$data['copyright'] = $this->admin_model->getCopyright();
	  
			$this->load->view('admin/pages/header', $this->data);
			$this->load->view('admin/pages/sidebar', $this->data);
			$this->load->view('admin/pages/home', $data);
			$this->load->view('admin/pages/footer', $this->data);		
	}
	
	
	
	public function changeLogo()
	{
		if (!$this->logged_in())return false;
		$this->load->model('admin_model');
		$result = $this->admin_model->changeLogo( $_POST );
		
		if( $result ){
			echo 'Updated';
		}
		else 
			echo 'Failed';
	}
	
	public function updateCopyright()
	{
		if (!$this->logged_in())return false;
		$this->load->model('admin_model');
		$result = $this->admin_model->updateCopyright( $_POST );
		
		if( $result ){
			echo 'Updated';
		}
		else 
			echo 'Failed';
	}
	
	public function updatehtlDisc()
	{
		if (!$this->logged_in())return false;
			$this->load->model('admin_model');
			$result = $this->admin_model->updatehtlDisc( $_POST );
			
			if( $result ){
				echo 'Updated';
			}
			else 
				echo 'Failed';
		
	}
	
	public function updatehtlDiscFooter()
	{
		if (!$this->logged_in())return false;
			$this->load->model('admin_model');
			$result = $this->admin_model->updatehtlDiscFooter( $_POST );
			
			if( $result ){
				echo 'Updated';
			}
			else 
				echo 'Failed';
		
	}
	
	public function login()
	{			
	
		$rules = array(	"email" => array( "field" => "email", "label" => "email", "rules" => "required|trim" ),
						"password" => array( "field" => "password", "label" => "password", "rules" => "required" )	);
						
			$this->form_validation->set_message('required', 'ველის შევსება აუცილებელია');
			$this->form_validation->set_rules($rules);

			if( $this->form_validation->run() != true )
			{
				die(json_encode(array(	
					"code" => 0,
					"text" => "ყველა ველის შევსება სავალდებულოა"
			    )));
			} 
			else{

				$ip = $_SERVER["REMOTE_ADDR"];
				$input = $this->input->post("email");    
				
					
				$checking = $this->db->where('ip', $ip)->get('checklogin');
														
				if($checking->num_rows() == 0){
					$data = array(
					   'ip' => $ip,
					   'user' => mysql_real_escape_string(addslashes(strip_tags($input))),
					   'time' => date('Y-m-d H:i:s'),
					   'cda' => 0
					);
					$this->db->insert('checklogin', $data); 						
				}		

					$checking = $this->db->where('ip', $ip)->get('checklogin');
							
					$get = $checking->row_array();
					$sulCda = $get['cda'] + 1;
							
					$last = strtotime($get['time']);
					$now = strtotime(date('Y-m-d H:i:s', strtotime("-1 hours")));
							
					if($sulCda > 3 && ($now < $last)){
						   die(json_encode(array(
										"code" => 3,
										"text" => "3-ჯერ არასწორი პაროლი. თქვენ ვერ შეხვალთ 1 საათის განმავლობაში"
								   )));
					}
								
					$data = array(
					   'user' => mysql_real_escape_string(addslashes(strip_tags($input))),
					   'time' => date('Y-m-d H:i:s'),
					   'cda' => $sulCda
					);
								
					$this->db
							->where('id', $get['id'])
							->update('checklogin', $data); 	
						
					$password = md5($this->input->post("password")); 
					$this->load->helper("email");
					 $sql = "SELECT * FROM `users` WHERE `email` = '".mysql_real_escape_string(addslashes(strip_tags($input)))."' ";
					$sql = $this->db->query($sql) or die(mysql_error());

                    if( $sql->num_rows() > 0 )
                    {							
							foreach($sql->result() as $data)
							{
									$chemiid= $data->id;
									$db_password = $data->password;
									$db_email    = $data->email;
									$name        = $data->name;
									$level       = (int)$data->level;
							}
							if( $password == $db_password )
							{
									$this->session->set_userdata("logged_in", true);
									$this->session->set_userdata("userid", $chemiid);
									$this->session->set_userdata("email", $db_email);
									$this->session->set_userdata("level", $level);
									$this->session->set_userdata("name", $name);
									$this->session->set_flashdata("notification", "წარმატებული შესვლა $db_email");
							
							    $data = array( 'cda' => 0 );								
								$this->db->where('id', $get['id'])->update('checklogin', $data); 	
															
									   die(json_encode(array(
										"code" => 1,
										"text" => "წარმატებული შესვლა",
										"user" => $db_email
								   )));
								   											
							} else {
								   die(json_encode(array(
										"code" => 3,
										"text" => "პაროლი არასწორია"
								   )));
							}
						
                    } else {
						die(json_encode(array( "code" => 2, "text" => "მეილი არასწორია" )));
					}
			}		
	}
	
	
	public function signout()
	{
		if (!$this->logged_in())return false;
		$lang = $this->lang->lang();
		$this->session->unset_userdata('userid');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('name');
		
		Redirect(base_url()."/".$lang."/admin", false);
					
	}
	
	public function gallery()
	{
		if (!$this->logged_in())return false;
		
			$this->load->model('admin_model');
			$data['galleries'] = $this->admin_model->getGalleries();
					
			$this->load->view('admin/pages/header',$this->data);
			$this->load->view('admin/pages/sidebar', $this->data);
			$this->load->view('admin/pages/gallery', $data);
			$this->load->view('admin/pages/footer', $this->data);	
	}
	
	public function topage()
	{
		if (!$this->logged_in())return false;
		
			$this->load->model('admin_model');
			$data['topimage'] = $this->admin_model->getTopImage();
					
			$this->load->view('admin/pages/header',$this->data);
			$this->load->view('admin/pages/sidebar', $this->data);
			$this->load->view('admin/pages/topImage', $data);
			$this->load->view('admin/pages/footer', $this->data);	
	}	
	
	public function help()
	{
		if (!$this->logged_in())return false;
		
			$this->load->model('admin_model');
			$data['topimage'] = $this->admin_model->getTopImage();
					
			$this->load->view('admin/pages/header',$this->data);
			$this->load->view('admin/pages/sidebar', $this->data);
			$this->load->view('admin/pages/help', $data);
			$this->load->view('admin/pages/footer', $this->data);	
	}
	
	public function updateTopPageImage( )
	{
		if (!$this->logged_in())return false;
			$this->load->model('admin_model');
			$result = $this->admin_model->updateTopPageImage( $_POST );
			
			if( $result ){
				echo 'success';
			}
			else 
				echo 'fail';
		
	}
	
	public function editGallery( $id = null )
	{
		if (!$this->logged_in())return false;
		
		if (!ctype_digit($id)) {
				echo "Invalid Argument Supplied";
			}
			
			$this->load->model('admin_model');
			$data['gallery'] = $this->admin_model->getGallery( $id );
			//print_r($data['gallery']);die;
			
			$this->load->view('admin/pages/header',$this->data);
			$this->load->view('admin/pages/sidebar', $this->data);
			$this->load->view('admin/pages/editGallery', $data);
			$this->load->view('admin/pages/footer', $this->data);
	}
	
	public function updateGallery()
	{
		if (!$this->logged_in())return false;
			$this->load->model('admin_model');
			$result = $this->admin_model->updateGallery( $_POST );
			
			if( $result ){
				echo '{ "success" : "true", "msg" : "ok" }';
			}
			else 
				echo '{ "Fail" : "true", "msg" : "error" }';
		
	}
	
	public function addFotoGallery()
	{
		if (!$this->logged_in())return false;
		
			$this->load->view('admin/pages/header', $this->data);
			$this->load->view('admin/pages/sidebar', $this->data);
			$this->load->view('admin/pages/addFotoGallery', $this->data);
			$this->load->view('admin/pages/footer', $this->data);
	}
	
	public function addVideoGallery()
	{
		if (!$this->logged_in())return false;
		
			$this->load->view('admin/pages/header', $this->data);
			$this->load->view('admin/pages/sidebar', $this->data);
			$this->load->view('admin/pages/addVideoGallery', $this->data);
			$this->load->view('admin/pages/footer', $this->data);
	}
	
	public function createFotoGallery()
	{
		if (!$this->logged_in())return false;	
		
			/*
			$lang = $this->lang->lang();
			$url = base_url();
			$dirname = uniqid();
			$path = "$url$lang/images/$dirname";
			
			if(!is_dir($path))
			{
			  mkdir($path);
			  print_r('created in '.$path);
			} 
			else
			{
				print_r("Something went wrong... Try again!"); die;
			}
			*/		
			
				
			$this->load->model('admin_model');
			$result = $this->admin_model->createFotoGallery( $_POST );
			
			if( $result ){
				echo '{ "success" : "true", "msg" : "ok" }';
			}
			else 
				echo '{ "Fail" : "true", "msg" : "error" }';
	}
	
	public function createVideoGallery()
	{
		if (!$this->logged_in())return false;	
		
			$this->load->model('admin_model');
			$result = $this->admin_model->createVideoGallery( $_POST );
			
			if( $result ){
				echo '{ "success" : "true", "msg" : "ok" }';
			}
			else 
				echo '{ "Fail" : "true", "msg" : "error" }';
	}
	
	public function deleteGalerry( $id = null )
	{
		if (!$this->logged_in())return false;
		
			if (!ctype_digit($id)) {
				echo "Invalid Argument Supplied";
			}
			
			$lang = $this->lang->lang();
			
			$this->load->model('admin_model');
			$result = $this->admin_model->deleteGalerry( $id );
					
			if( $result ){				
				Redirect(base_url()."/".$lang."/admin/gallery", false);
			}
			else 
				echo '{ "Fail" : "true", "msg" : "error" }';				
		
	}
	
	public function news()
	{
		if (!$this->logged_in())return false;
		
			$this->load->model('admin_model');
			$data['allnews'] = $this->admin_model->getNews();
					
			$this->load->view('admin/pages/header',$this->data);
			$this->load->view('admin/pages/sidebar', $this->data);
			$this->load->view('admin/pages/news', $data);
			$this->load->view('admin/pages/footer', $this->data);	
		
	}
	

	public function addNews()
	{
		if (!$this->logged_in())return false;
		
			$this->load->view('admin/pages/header', $this->data);
			$this->load->view('admin/pages/sidebar', $this->data);
			$this->load->view('admin/pages/addnews', $this->data);
			$this->load->view('admin/pages/footer', $this->data);		
		
	}
	
	public function createNews()
	{
		if (!$this->logged_in())return false;	
						
			$this->load->model('admin_model');
			$result = $this->admin_model->insertNews( $_POST );
			
			if( $result ){
				echo '{ "success" : "true", "msg" : "ok" }';
			}
			else 
				echo '{ "Fail" : "true", "msg" : "error" }';		
		
	}
	
	public function editNews( $id = null )
	{
		if (!$this->logged_in())return false;
		
			if (!ctype_digit($id)) {
				echo "Invalid Argument Supplied";
			}
						
			$this->load->model('admin_model');
			$data['singlenews'] = $this->admin_model->getDetailNews( $id );
			$this->load->view('admin/pages/header',$this->data);
			$this->load->view('admin/pages/sidebar', $this->data);
			$this->load->view('admin/pages/editNews', $data);
			$this->load->view('admin/pages/footer', $this->data);	
		
	}
	
	public function updateNews( )
	{
		if (!$this->logged_in())return false;		
			
			$this->load->model('admin_model');
			$result = $this->admin_model->updateNews( $_POST );
			
			if( $result ){
				echo '{ "success" : "true", "msg" : "ok" }';
			}
			else 
				echo '{ "Fail" : "true", "msg" : "error" }';			
			
	}
	
	
	public function deleteNews( $id = null )
	{
		if (!$this->logged_in())return false;
		
			if (!ctype_digit($id)) {
				echo "Invalid Argument Supplied";
			}
			
			$lang = $this->lang->lang();
			
			$this->load->model('admin_model');
			$result = $this->admin_model->deleteNews( $id );
					
			if( $result ){
				//echo '{ "success" : "true", "msg" : "ok" }';
				Redirect(base_url()."/".$lang."/admin/news", false);
			}
			else 
				echo '{ "Fail" : "true", "msg" : "error" }';				
		
	}
	
	public function about()
	{
		if (!$this->logged_in())return false;
		
			$this->load->model('admin_model');
			$this->data['about'] = $this->admin_model->getAbout();
			$this->load->view('admin/pages/header',$this->data);
			$this->load->view('admin/pages/sidebar', $this->data);
			$this->load->view('admin/pages/about', $this->data);
			$this->load->view('admin/pages/footer', $this->data);	
		
	}
				
	public function updateAbout()
	{
		if (!$this->logged_in())return false;
		
			$this->load->model('admin_model');
			$result = $this->admin_model->updateAbout( $_POST );
			
			if( $result ){
				echo '{ "success" : "true", "msg" : "ok" }';
			}
			else 
				echo '{ "Fail" : "true", "msg" : "error" }';
		
	}
	
	public function contact()
	{
		if (!$this->logged_in())return false;
		
			$this->load->model('admin_model');
			$data['contact'] = $this->admin_model->getContact();
			$data['map'] = $this->admin_model->getMap();
			$this->load->view('admin/pages/header',$this->data);
			$this->load->view('admin/pages/sidebar', $this->data);
			$this->load->view('admin/pages/contact', $data);
			$this->load->view('admin/pages/footer', $this->data);	
		
	}
	
	public function updateContact()
	{
		if (!$this->logged_in()) return false;
		
			$this->load->model('admin_model');
			$result = $this->admin_model->updateContact( $_POST );
			
			if( $result ){ echo 'success'; }
			else{ echo 'Fail'; }
	}
	
	public function updateMap()
	{
		if (!$this->logged_in()) return false;
		
			$this->load->model('admin_model');
			$result = $this->admin_model->updateMap( $_POST );
			
			if( $result ){ echo 'success'; }
			else echo 'Fail';		
	}
	
	
	public function services()
	{
		if (!$this->logged_in())return false;
		
			$this->load->model('admin_model');
			$data['services'] = $this->admin_model->getServices();
			
			$this->load->view('admin/pages/header',$this->data);
			$this->load->view('admin/pages/sidebar', $this->data);
			$this->load->view('admin/pages/services', $data);
			$this->load->view('admin/pages/footer', $this->data);	
	}
	
	
	public function rooms()
	{
		if (!$this->logged_in())return false;
		
			$this->load->model('admin_model');
			$this->data['rooms'] = $this->admin_model->getRooms();
			
			$this->load->view('admin/pages/header',$this->data);
			$this->load->view('admin/pages/sidebar', $this->data);
			$this->load->view('admin/pages/rooms', $this->data);
			$this->load->view('admin/pages/footer', $this->data);
	}
	
	public function addRoom()
	{
		if (!$this->logged_in())return false;
		
			$this->load->model('admin_model');
			$data['roomtypes'] = $this->admin_model->getRoomTypes();
			$data['icons'] = $this->admin_model->getIcons();
			
			$this->load->view('admin/pages/header', $this->data);
			$this->load->view('admin/pages/sidebar', $this->data);
			$this->load->view('admin/pages/addRoom', $data);
			$this->load->view('admin/pages/footer', $this->data);		
		
	}
	
	public function insertRoom()
	{
		if (!$this->logged_in())return false;	
				
		$this->load->model('admin_model');
		$result = $this->admin_model->insertRoom( $_POST );
		
		if( $result ){
			echo '{ "success" : "true", "msg" : "ok" }';
		}
		else 
			echo '{ "Fail" : "true", "msg" : "error" }';
	
	}
	
	public function editRoom( $id=null )
	{
		if (!$this->logged_in()) return false;
		if (!ctype_digit($id)) {
				echo "Invalid Argument Supplied";
			}
			
		$this->load->model('admin_model');
		$data['rooms'] = $this->admin_model->getRoom( $id );
		$data['roomtypes'] = $this->admin_model->getRoomTypes();
		$data['icons'] = $this->admin_model->getIcons();
		
		$this->load->view('admin/pages/header',$this->data);
		$this->load->view('admin/pages/sidebar', $this->data);
		$this->load->view('admin/pages/editRoom', $data);
		$this->load->view('admin/pages/footer', $this->data);
	
	}
	
	public function updateRoom()
	{
		if (!$this->logged_in()) return false;
			
			$this->load->model('admin_model');
			$result = $this->admin_model->updateRoom( $_POST );
			
			if( $result ){
				echo '{ "success" : "true", "msg" : "ok" }';
			}
			else 
				echo '{ "Fail" : "true", "msg" : "error" }';
		
	}
	
	
	public function deleteRoom( $id = null )
	{
		if (!$this->logged_in())return false;
		
			if (!ctype_digit($id)) {
				echo "Invalid Argument Supplied";
			}
			
			$lang = $this->lang->lang();
			
			$this->load->model('admin_model');
			$result = $this->admin_model->deleteRoom( $id );
					
			if( $result ){				
				Redirect(base_url()."/".$lang."/admin/rooms", false);
			}
			else 
				echo '{ "Fail" : "true", "msg" : "error" }';				
		
	}
	
	public function updateService()
	{
		if (!$this->logged_in()) return false;
			
			$this->load->model('admin_model');
			$result = $this->admin_model->updateService( $this->input->post() );
			
			if( $result ){
				echo '{ "success" : "true", "msg" : "ok" }';
			}
			else 
				echo '{ "Fail" : "true", "msg" : "error" }';
		
	}
	
	public function editService( $id = null )
	{
		if (!$this->logged_in())return false;
		
			$this->load->model('admin_model');
			$data['service'] = $this->admin_model->getService( $id );
			
			$this->load->view('admin/pages/header',$this->data);
			$this->load->view('admin/pages/sidebar', $this->data);
			$this->load->view('admin/pages/editService', $data);
			$this->load->view('admin/pages/footer', $this->data);
	}
	
	public function addService()
	{
		if (!$this->logged_in())return false;
		
			$this->load->view('admin/pages/header', $this->data);
			$this->load->view('admin/pages/sidebar', $this->data);
			$this->load->view('admin/pages/addService', $this->data);
			$this->load->view('admin/pages/footer', $this->data);		
		
	}
	
	public function createService()
	{
		if (!$this->logged_in())return false;	
				
			$this->load->model('admin_model');
			$result = $this->admin_model->insertService( $_POST );
			
			if( $result ){
				echo '{ "success" : "true", "msg" : "ok" }';
			}
			else 
				echo '{ "Fail" : "true", "msg" : "error" }';		
		
	}
	
	public function deleteService( $id = null )
	{
		if (!$this->logged_in())return false;
		
			if (!ctype_digit($id)) {
				echo "Invalid Argument Supplied";
			}
			
			$lang = $this->lang->lang();
			
			$this->load->model('admin_model');
			$result = $this->admin_model->deleteService( $id );
					
			if( $result ){				
				Redirect(base_url()."/".$lang."/admin/services", false);
			}
			else 
				echo '{ "Fail" : "true", "msg" : "error" }';				
		
	}
	
	public function tours()
	{
		if (!$this->logged_in())return false;
		
			$this->load->model('admin_model');
			$data['tours'] = $this->admin_model->getTours();
					
			$this->load->view('admin/pages/header',$this->data);
			$this->load->view('admin/pages/sidebar', $this->data);
			$this->load->view('admin/pages/tours', $data);
			$this->load->view('admin/pages/footer', $this->data);	
		
	}
	
	public function addTour()
	{
		if (!$this->logged_in())return false;
		
			$this->load->view('admin/pages/header', $this->data);
			$this->load->view('admin/pages/sidebar', $this->data);
			$this->load->view('admin/pages/addTour', $this->data);
			$this->load->view('admin/pages/footer', $this->data);		
		
	}
	
	
	public function createTour()
	{
		if (!$this->logged_in())return false;	
				
			$this->load->model('admin_model');
			$result = $this->admin_model->insertTour( $_POST );
			
			if( $result ){
				echo '{ "success" : "true", "msg" : "ok" }';
			}
			else 
				echo '{ "Fail" : "true", "msg" : "error" }';		
		
	}
	
	public function editTour( $id = null )
	{
		if (!$this->logged_in())return false;
		
			$this->load->model('admin_model');
			$data['tour'] = $this->admin_model->getTour( $id );
			
			$this->load->view('admin/pages/header',$this->data);
			$this->load->view('admin/pages/sidebar', $this->data);
			$this->load->view('admin/pages/editTour', $data);
			$this->load->view('admin/pages/footer', $this->data);
	}
	
	public function updateTour()
	{
		if (!$this->logged_in()) return false;
			
			$this->load->model('admin_model');
			$result = $this->admin_model->updateTour( $this->input->post() );
			
			if( $result ){
				echo '{ "success" : "true", "msg" : "ok" }';
			}
			else 
				echo '{ "Fail" : "true", "msg" : "error" }';
		
	}
	
	public function deleteTour( $id = null )
	{
		if (!$this->logged_in())return false;
		
			if (!ctype_digit($id)) {
				echo "Invalid Argument Supplied";
			}
			
			$lang = $this->lang->lang();
			
			$this->load->model('admin_model');
			$result = $this->admin_model->deleteTour( $id );
					
			if( $result ){				
				Redirect(base_url()."/".$lang."/admin/services", false);
			}
			else 
				echo '{ "Fail" : "true", "msg" : "error" }';				
		
	}
}