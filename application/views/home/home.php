		<section>
		<div class="block no-padding">
			<div class="row">
				<div class="col-md-12 column">
					<div class="rooms-list">
						<ul>
							
							
							<?php 
							if( isset($rooms) && !empty($rooms) )								
								{
									foreach( $rooms as $k=>$v )
									{
										if( $language == 'en' )
										{
											$text = $v->texten;
										}
										else
										{
											$text = $v->textar;
										}
										
										echo '<li><div class="room">
											<img src="'.base_url().'images/resource/'.$v->homeimage.'" alt="" />
											<div class="room-name"><h4>'.$v->type.'<span>ROOM</span></h4></div>
											<div class="room-detail">
												<div class="room-inner">
													<h3>'.lang('roomastitle').': '.$v->roomnumber.'</h3>
													<p>'.strip_tags($text).'</p>
													<strong>$'.$v->price.' <i>- '.lang("pernight").'</i></strong>
													<div class="room-features">';
													
													$icons = explode(",",$rooms[0]->icons);
														foreach( $icons as $p=>$c )
														{
															echo '<span>'.$c.'</span>';
														}
													echo '</div>
													<div class="view-more">
														<a href="'.base_url("$language").'/rooms/detail/'.$v->id.'" title="">'.lang('viewmoredetail').'<i class="fa fa-long-arrow-right"></i></a>
													</div>
												</div>
											</div>
										</div></li>';
									}
								}
							
							?>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section><!-- Rooms Section -->


	<section>
		<div class="block remove-gap gray-layer">
			<div class="parallax" data-velocity="-.1" style="background: rgba(0, 0, 0, 0) url(images/parallax1.jpg) no-repeat 50% 0;"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 column">
						<div class="big-tabs">
							<ul class="nav nav-tabs">
								<li>
									<a href="#about-hotel" data-toggle="tab">
										<div class="tab-name">
											<i class="fa fa-building"></i>
											<span><?php echo lang("whoweare");?><strong><?php echo lang("aboutirmeny");?></strong></span>
										</div>
									</a>
								</li>
								<li class="active">
									<a href="#find-hotel" data-toggle="tab">
										<div class="tab-name">
											<i class="fa fa-search"></i>
											<span><?php echo lang("enywherewoldwide");?> <strong><?php echo lang("findyouridealhotel");?></strong></span>
										</div>
									</a>
								</li>
							</ul>
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane fade" id="about-hotel">
									<div class="tab-data">
									
									<?php
											if( isset($abouthotel) && !empty($abouthotel) )
											{
												if( $language == 'en' )
												{
													$httext = $abouthotel[0]->texten;
												}
												else
												{
													$httext = $abouthotel[0]->textar;
												}
												echo $httext;
											}
										?>
									</div><!-- tabs-data -->
								</div>
								<div role="tabpanel" class="tab-pane fade in active" id="find-hotel">
									<div class="tab-form">
										<div class="tab-from-title">
											<span><?php echo lang("anytimeworldwide");?></span>
											<h4><?php echo lang("findyouridealhotel");?></h4>
										</div>
											<div class="row">
												<div class="col-md-2">
													<label><?php echo lang("checkin");?></label>
													<div class="field">	
														<input class="popupDatepicker" type="text" placeholder="Select Date">
														<img class="field-icon" src="<?php echo base_url();?>images/calendar.png" alt="" />
													</div>
												</div>
												<div class="col-md-2">
													<label><?php echo lang("checkout");?></label>
													<div class="field">	
														<input class="popupDatepicker" type="text" placeholder="<?php echo lang("selectdate");?>">
														<img class="field-icon" src="<?php echo base_url();?>images/calendar.png" alt="" />
													</div>
												</div>
											
											
												<div class="col-md-2">
													<label><?php echo lang("adults");?></label>
													<div class="field">
														<input id="hmadults" class="inc-dec" value="0" type="text" placeholder="">
													</div>
												</div>
												<div class="col-md-2">
													<label><?php echo lang("kids");?></label>
													<div class="field">	
														<input id="hmkids" class="inc-dec" value="0" type="text" placeholder="">
													</div>
												</div>
												
												<div class="col-md-3">
													<label><?php echo lang("rooms");?></label>
													<div class="field">
														<select id="hmroomtype" class="form-control" style="background:rgba(0, 0, 0, 0) none repeat scroll 0 0;  border-radius: 0 !important; height:38px; border:0;" >
															<option value="0"><?php echo lang("roomtype");?></option>
															<?php if( isset($roomtypes) && !empty($roomtypes) ) 
																	{
																		foreach( $roomtypes as $k=>$v )
																		echo '<option value="'.$v->id.'">'.$v->type.'</option>';
																	}?>
														</select>
													</div>
												</div>
												<div class="col-md-12">
													<button id ="book-now" class="book-now" type="submit"><?php echo lang("searchnow");?></button>
												</div>
											</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- container -->
		</div><!-- block -->
	</section><!-- Tabs Section -->

		<section>
		<div class="block gray darkblue-layer half-parallax">
			<div class="parallax" data-velocity="-.1" style="background: rgba(0, 0, 0, 0) url(<?php echo base_url();?>images/parallax2.jpg) no-repeat 50% 0;"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 column">
						<div class="service-area">
							<div class="row">
								<div class="col-md-4">
									<div class="service-title">
										<p><?php echo lang("letgoserrunder");?></p>
										<h3><?php echo lang("luxurious");?></h3>
										<span><?php echo lang("services");?></span>
									</div><!-- Service Title -->
								</div>
								<div class="col-md-8">
									<div class="service-carousel">
										<?php										
										if( isset($services) && !empty($services) )
										{
											foreach( $services as $k=>$v )
											{
												if( $language == 'en' )
												{
													$title = $v->titleen;
												}
												else
												{
													$title = $v->titlear;
												}
												echo '<div class="service-box">
													<img src="'.base_url().'images/resource/'.$v->coverfoto.'" alt="" />
													<div class="service-name">
														<span><img src="'.base_url().'images/resource/'.$v->icon.'" alt="" /></span>
														<h5><a href="'.base_url("$language").'/services/detail/'.$v->id.'" title="">'.$title.'</a></h5>
													</div>
												</div>';
											}
										}
										?>
										
									</div><!-- Service Carousel -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- Services Section -->

	<section>
		<div class="block remove-gap gray">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="title">
							<span><?php echo lang("resortworldbestplaces");?></span>
							<h4><?php echo lang("luxurytours");?></h4>
						</div><!-- Title -->
						<div class="row narrow">
							<div class="gallery masonary">
								<div class="col-md-2">
									<div class="gallery-box">
										<?php if( isset($tourprior1) && !empty($tourprior1) )
										{
											if( $langiage = "en" )
											{
												$title = $tourprior1[0]->titleen;
											}
											else
											{
												$title = $tourprior1[0]->titlear;
											}
											echo '<img src="'.base_url().'images/resource/'.$tourprior1[0]->tourbasic.'" alt="" />
													<div class="gallery-hover">
														<div class="gallery-inner">
															<span><strong class="amount">$'.$tourprior1[0]->price.' </strong>/'.$tourprior1[0]->person.' '.lang("person").'</span>
															<h5><a title="" href="'.base_url("$language").'/tours/detail/'.$tourprior1[0]->id.'">'.$title.'</a></h5>
															<a class="book-now" href="'.base_url("$language").'/tours/detail/'.$tourprior1[0]->id.'" title="">'.lang("viewdetail").'</a>
														</div>
													</div>';
										}  
										?>
										
										
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="gallery-box bottom">
									
									<?php if( isset($tourprior2) && !empty($tourprior2) )
										{
											if( $langiage = "en" )
											{
												$title = $tourprior2[0]->titleen;
												$dtl = "View Detail";
											}
											else
											{
												$title = $tourprior2[0]->titlear;
												$dtl = "View Detail";
											}
										echo '<img src="'.base_url().'images/resource/'.$tourprior2[0]->tourbasic.'" alt="" />
										<div class="gallery-hover">
											<div class="gallery-inner">
												<span><strong class="amount">'.$tourprior2[0]->price.' </strong>/'.$tourprior2[0]->person.' Person</span>
												<h5><a title="" href="'.base_url("$language").'/tours/detail/'.$tourprior2[0]->id.'">'.$title.'</a></h5>												
												<a class="book-now" href="'.base_url("$language").'/tours/detail/'.$tourprior2[0]->id.'" title="">'.$dtl.'</a>
											</div>
										</div>';
										}?>
									</div>
								</div>
								<div class="col-md-4">
									<div class="gallery-box">
										
									<?php if( isset($tourprior3) && !empty($tourprior3) )
										{
											if( $langiage = "en" )
											{
												$title = $tourprior3[0]->titleen;
												$dtl = "View Detail";
											}
											else
											{
												$title = $tourprior3[0]->titlear;
												$dtl = "View Detail";
											}
										echo '<img src="'.base_url().'images/resource/'.$tourprior3[0]->tourbasic.'" alt="" />
										<div class="gallery-hover">
											<div class="gallery-inner">
												<span><strong class="amount">$'.$tourprior3[0]->price.' </strong>/'.$tourprior3[0]->person.' Person</span>
												<h5><a title="" href="'.base_url("$language").'/tours/detail/'.$tourprior3[0]->id.'">'.$title.'</a></h5>												
												<a class="book-now" href="'.base_url("$language").'/tours/detail/'.$tourprior3[0]->id.'" title="">'.$dtl.'</a>
											</div>
										</div>';
										}?>
										
									</div>
								</div>
								<div class="col-md-12">
									<div class="gallery-box left">
										<?php if( isset($tourprior4) && !empty($tourprior4) )
										{
											if( $langiage = "en" )
											{
												$title = $tourprior4[0]->titleen;
												$dtl = "View Detail";
											}
											else
											{
												$title = $tourprior4[0]->titlear;
												$dtl = "View Detail";
											}
										echo '<img src="'.base_url().'images/resource/'.$tourprior4[0]->tourbasic.'" alt="" />
										<div class="gallery-hover">
											<div class="gallery-inner">
												<span><strong class="amount">$'.$tourprior4[0]->price.' </strong>/'.$tourprior4[0]->person.' Person</span>
												<h5><a title="" href="'.base_url("$language").'/tours/detail/'.$tourprior4[0]->id.'">'.$title.'</a></h5>
												<a class="book-now" href="'.base_url("$language").'/tours/detail/'.$tourprior4[0]->id.'" title="">'.$dtl.'</a>
											</div>
										</div>';
										}?>
									</div>
								</div>
							</div>
						</div><!-- Gallery -->
					</div>
				</div>
			</div>
		</div>
	</section>