
	<div class="pagetop">
		<div class="container">
			<h1><?php echo strtoupper(lang("tourbooking"));?></h1>
			<ul>
				<li><a title="" href="<?php echo base_url("$language");?>"><?php echo lang("home");?></a></li>
				<li><a title="" href="<?php echo base_url("$language");?>/tours"><?php echo lang("tours");?></a></li>
				<li><?php echo lang("tourbooking");?></li>
			</ul>		
		</div>
	</div><!-- Page Top -->



	

	<section>
		<div class="block remove-gap gray">
			<div class="container"><br><br><br>
				<div class="row">
					<div class="col-md-12">
						<div class="package-single-detail">
							
							<div class="title">
							<!--<span>Resort World Best Places</span>-->
							<?php 
								if( isset($tourtitle) && !empty($tourtitle) )
								{
									if( $language = "en" )
									{
										$title = $tourtitle[0]->titleen;
									}
									else
									{
										$title = $tourtitle[0]->titlear;
									}
									echo '<h4><span style="color:green;">'.lang("bookingfor").': </span>'.$title.'</h4>';
								}
							?>
							
						</div>
						
						<div class="comment-form center">
							<div id="message"></div>
							<form class="input-fields" method="post" action="<?php echo base_url("$language");?>/contact/tour_book" name="contactform" id="contactform">
								<div class="row">
									<?php 
									echo '<div><input id="tourname" name="tourname" type="hidden" value="'.$title.'" /></div>
									<div class="col-md-7"><input id="name" name="name" type="text" placeholder="'.lang("completename").' *" /></div>
										  <div class="col-md-7"><input id="email" name="email" type="email" placeholder="'.lang("emailaddress").' *" /></div>
										  <div class="col-md-7"><input id="subject" type="text" name="subject" placeholder="'.lang("subject").' *" /></div>
										  <div class="col-md-7"><input id="IDnumber" maxlength="11" name="private" type="text" placeholder="'.lang("persidentific").' *" /></div>
										  <div class="col-md-7"><input id="phone" name="phone" maxlength="16" type="text" placeholder="'.lang("phone").' *" /></div>										  
										  <div class="col-md-12"><textarea id="comments" name="comments" placeholder="'.lang("enteryourmassage").'"></textarea></div>
										  <div class="col-md-12"><button id="submit" class="book-now submit" type="submit">'.lang("submitnow").'</button></div>';
									?>
								</div>												
							</form>
						</div>
						
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

