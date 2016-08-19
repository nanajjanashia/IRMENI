
	<div class="pagetop">
		<div class="container">
			<h1><?php echo strtoupper(lang("roomdetail"));?></h1>
			<ul>
				<li><a title="" href="<?php echo base_url("$language");?>"><?php echo lang("home");?></a></li>
				<li><a title="" href="<?php echo base_url("$language");?>/rooms"><?php echo lang("rooms");?></a></li>
				<li><?php echo lang("roomdetail");?></li>
			</ul>		
		</div>
	</div><!-- Page Top -->

	<section>
		<div class="block remove-gap gray">
			<div class="room-gallery">
			
			<?php 
			
				if( isset($room) && !empty($room) )
				{					
					$bigimgs = explode("&",$room[0]->bigimages);
					$smallimgs = explode("&",$room[0]->smallimages);
					if( $language == 'en' )
					{
						$text = $room[0]->texten;
						$dtext = $room[0]->dtexten;
					}
					else
					{
						$text = $room[0]->texten;
						$dtext = $room[0]->dtextar;
					}
			
					if( isset($bigimgs) && !empty($bigimgs) ){
							echo '<div class="tab-content">';	
							for($i=0;$i<count($bigimgs); $i++)
							{
								if($i == 0)
								{
									echo '<div role="tabpanel" class="tab-pane fade in active" id="room-image'.($i+1).'">
										<img src="'.base_url().'images/resource/'.$bigimgs[0].'" alt="" />
									</div>';
								}
								else
								{
									echo '<div role="tabpanel" class="tab-pane fade" id="room-image'.($i+1).'">
										<img src="'.base_url().'images/resource/'.$bigimgs[$i].'" alt="" />
									</div>';
								}											
							}
							echo '</div>';
						}
				}
			?>
			
				<div class="room-thumbs">
					<div class="container">
					
					<?php 
					
						if( isset($room) && !empty($room) )
						{
							$smallimgs = explode("&",$room[0]->smallimages);
							if( $language == 'en' )
							{
								$dtext = $room[0]->dtexten;
							}
							else
							{
								$dtext = $room[0]->dtextar;
							}
							
							if( !empty($room[0]->dtexten) && !empty($room[0]->dtextar) )
							{
								echo '<div class="room-specs">
										<h4>ROOM <span>SPECS</span></h4>
										'.$dtext.'	
									</div>';
							}
							
							echo '<ul class="nav nav-tabs">';
							if( isset($smallimgs) && !empty($smallimgs) ){
																		
								for($i=0; $i<count($smallimgs); $i++)
								{
									//print_r($smallimgs); die;
									if( $i == 0 )
									{
										echo '<li style="width:170px;" class="active">
											<a style="display:block; width:170px !important; height:152px !important;" href="#room-image'.($i+1).'" data-toggle="tab"><img style="width:170px !important; height:152px !important;" src="'.base_url().'images/resource/'.$smallimgs[0].'" alt="" /></a>
										</li>';
									}
									else
									{
										echo '<li style="width:170px; margin-left:20px;">
											<a style="display:block; width:170px !important; height:152px !important;" href="#room-image'.($i+1).'" data-toggle="tab"><img style="width:170px !important; height:152px !important;" src="'.base_url().'images/resource/'.$smallimgs[$i].'" alt="" /></a>
										</li>';
									}
								}
							}
							echo '</ul>';
							
						}
					
					?>
					
					</div>
				</div>
			</div><!-- Room Gallery -->
		</div>
	</section>
			
	<section>
		<div class="block gray" style="padding:5px 0 !important;">
			<div class="container">
				<div class="row">
					<div class="col-md-9 column">
						<div class="package-single-detail">
						
							<?php if( isset($room) && !empty($room) )
							{
								if( $language=='en' )
								{
									$text = $room[0]->texten;
								}
								else
								{
									$text = $room[0]->textar;
								}
								echo '<h3 class="package-name">'.lang("roomastitle").': '.$room[0]->roomnumber.'</h3>
									<div class="package-price">
										<strong>'.lang("startfrom").'</strong>
										<i>$'.$room[0]->price.'</i>
										<span>'.lang("perperson").'</span>
									</div>'.$text.'';
							}?>
						
						</div>
						
					</div>
					<aside class="col-md-3 column" style="margin-top:60px;">
						<div class="sidebar">
							<div class="widget">
								<form action="" class="col-md-12" style="float:right">
											<div class="row">
													<label><?php echo lang("checkin");?></label>
													<div class="field">	
													<input type="hidden" value="<?php if( isset($room[0]->roomnumber) )
													echo $room[0]->roomnumber; ?>">
														<input class="popupDatepicker ckeckin" type="text" placeholder="Select Date">
														<img class="field-icon" src="<?php echo base_url();?>images/calendar.png" alt="" />
													</div>
													
													<label><?php echo lang("checkout");?></label>
													<div class="field">	
														<input class="popupDatepicker checkout" type="text" placeholder="Select Date">
														<img class="field-icon" src="<?php echo base_url();?>images/calendar.png" alt="" />
													</div>
													<label><?php echo lang("adults");?></label>
													<div class="field">
														<input id="hmadults" class="inc-dec" value="0" type="text" placeholder="">
													</div>
													<label><?php echo lang("kids");?></label>
													<div class="field">	
														<input id="hmkids" class="inc-dec" value="0" type="text" placeholder="">
													</div>
													<div class="field">
														<select id="hmroomtype" class="form-control" style="background:rgba(0, 0, 0, 0) none repeat scroll 0 0;  border-radius: 0 !important; height:38px; border:0;" >
															<option value="0"><?php echo lang("roomtype");?></option>
															<?php if( isset($roomtypes) && !empty($roomtypes) ) 
																	{
																		foreach( $roomtypes as $k=>$v )
																		echo '<option value="'.$v->type.'">'.$v->type.'</option>';
																	}?>
														</select>
													</div>
													<button id="checkavalbooking" class="book-now" type="submit"><?php echo lang("checkavailable");?></button>
											</div>
										</form>
							</div><!-- Widget -->
							
					</aside>
				</div>
			</div>
			<br><br><br><br>
		</div>
	</section>



