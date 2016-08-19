
<div class="pagetop">
		<div class="container">
			<h1><?php echo strtoupper(lang("rooms"));?></h1>
			<ul>
				<li><a title="" href="<?php echo base_url("$language");?>"><?php echo lang("home");?></a></li>
				<li><?php echo lang("rooms");?></li>
			</ul>		
		</div>
	</div><!-- Page Top -->
	


	<section>
		<div class="block gray">
			<div class="container">
				<div class="row">
					<div class="col-md-12 column">
						<div class="row">
						
							<div class="rooms-packages masonary">
							
							<?php 
							
								if( isset($rooms) && !empty($rooms) )
								{
									foreach($rooms as $k=>$v){
										echo '<div class="col-md-4">
											<div class="room-package">
												<div class="room-image">
													<img src="'.base_url().'images/resource/'.$v->coverimage.'" alt="" />
													<a class="book-now" href="'.base_url("$language").'/rooms/detail/'.$v->id.'" title="">'.lang("detail").'</a>
												</div>
												<div class="about-room">
													<div class="room-title">
														<span>'.$v->type.'</span>
														<h4><a title="" href="'.base_url("$language").'/rooms/detail/'.$v->id.'">'.lang("roomastitle").': '.$v->roomnumber.'</a></h4>
													</div>
													<div class="room-bottom">
														<span><strong>$'.$v->price.'</strong> / '.lang("night").'</span>
														<ul>';
														$icn = explode(",",$v->icons);
														foreach( $icn as $p=>$c )
														{
															echo '<li>'.$c.'</li>';
														}
														echo '</ul>	
													</div>
												</div>
											</div>
										</div>';
									}
								}
							
							?>
							
							</div>
						</div><!-- Rooms Packages -->						
					</div>
				</div>
			</div>
		</div>
	</section>
