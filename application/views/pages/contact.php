<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<div class="pagetop">
		<div class="container">
			<h1><?php echo strtoupper(lang("contactus"));?>CONTACT US</h1>
			<ul>
				<li><a title="" href="<?php echo base_url("$language");?>"><?php echo lang("home");?></a></li>
				<li><?php echo lang("contactus");?>Contact Us</li>
			</ul>		
		</div>
	</div><!-- Page Top -->


	<section>
		<div class="block gray">
			<div class="container">
				<div class="row">
					<div class="col-md-12 column">
						<div class="map">
							<?php if( isset($map) )
							{
								echo '<iframe src="'.$map[0]->src.'" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
							}
							?>
						</div>
						<div class="block-gap"></div>
						<div class="contact-content">
							<div class="row">
								<div class="col-md-6">
									<div class="address-sec">
										<!-- <span>Resort World Best Place</span> -->
										<?php 
											if( isset($contact) && !empty( $contact ) ) {
												if( $language == "en" ){
													$addr = "Address";
													$phn = "Phone";
													$fx = "Fax";
													$eml = "Email";
													$title = $contact[0]->titleen;
													$text = $contact[0]->texten;
													$address = $contact[0]->addressen;
												}
												else{
													$addr = "Address Arabian";
													$phn = "Phone Arabian";
													$fx = "Fax Arabian";
													$eml = "Email Arabian";
													$title = $contact[0]->titlear;
													$text = $contact[0]->textar;
													$address = $contact[0]->addressar;
												}
											echo '<h4>'.$title.'</h4>
												<p>'.$text.'</p>
												<ul>
													<li><span><i class="fa fa-home"></i></span> <strong>'.$addr.'</strong>'.$address.'</li>
													<li><span><i class="fa fa-phone"></i></span> <strong>'.$phn.'</strong>'.$contact[0]->phone.'</li>';
													if( isset( $contact[0]->fax ) && !empty( $contact[0]->fax ) ){														
														echo '<li><span><i class="fa fa-fax"></i></span> <strong>'.$fx.'</strong>'.$contact[0]->fax .'</li>';
													}
													echo '<li><span><i class="fa fa-envelope"></i></span> <strong>'.$eml.'</strong>'.$contact[0]->email.'</li>
												</ul>';
										}?>
									</div>
								</div>								
							</div>
						</div>			
						<div class="block-gap">
						
						</div>

						<div class="title">							
							<?php 
								if( $language = "en" )
								{
									$headertitle = "Send Us Message";
								}
								else
								{
									$headertitle = "Send Us Message";
								}
								echo '<h4>'.$headertitle.'</h4>';
							?>
						</div>
						<div class="comment-form center">
							<div id="message"></div>
							<form class="input-fields" method="post" action="<?php echo base_url("$language");?>/contact/sendMail" name="contactform" id="contactform">
								<div class="row">
									<?php 
									  if( $language == "en" ){
										  $plname = "Complete Name";
										  $plemail = "Email Address";
										  $plsubject = "subject";
										  $plmessage = "Enter Your Message";
										  $submit = "Submit Now";
									  }
									  else{
										  $plname = "Complete Name arabian";
										  $plemail = "Email Address arabian";
										  $plsubject = "subject arabian";
										  $plmessage = "Enter Your Message arabian";
										  $submit = "Submit Now arabian";
									  }
									echo '<div class="col-md-4"><input id="name" name="name" type="text" placeholder="'.$plname.' *" /></div>
										  <div class="col-md-4"><input id="email" name="email" type="email" placeholder="'.$plemail.' *" /></div>
										  <div class="col-md-4"><input id="subject" name="subject" type="text" placeholder="'.$plsubject.' *" /></div>
										  <div class="col-md-12"><textarea id="comments" name="comments" placeholder="'.$plmessage.'"></textarea></div>
										  <div class="col-md-12"><button id="submit" class="book-now submit" type="submit">'.$submit.'</button></div>';
									?>
								</div>												
							</form>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</section>
