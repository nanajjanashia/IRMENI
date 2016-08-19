
	<div class="pagetop">
		<div class="container">
			<h1><?php echo strtoupper(lang("tours"));?></h1>
			<ul>
				<li><a title="" href="<?php echo base_url("$language");?>"><?php echo lang("home");?></a></li>
				<li><?php echo lang("tours");?></li>
			</ul>		
		</div>
	</div><!-- Page Top -->



	<section>
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-md-12 column">
						<div class="special-offers">
							<div class="row">
							
								<?php 
									if( isset($tours) && !empty($tours) )
									{
										foreach( $tours as $k=>$v )
										{
											if( $language == 'en' )
											{
												if( $v->person == 1 ) $person = "Per Person";
												else $person = $v->person." Person";
												$ht = "Hotel";
												$dr = "Duration";
												$pr = "Person";
												$title = $v->titleen;
											}
											else
											{
												if( $v->person == 1 ) $person = "Per Person";
												else $person = $v->person." Person";
												$ht = "Hotel arabic";
												$dr = "Duration arabic";
												$pr = "Person arabic";
												$title = $v->titlear;
											}
										
											
										echo '<div class="col-md-4">
											<div class="sp-offer">
												<div class="offer-img">
													<img src="'.base_url("images/resource").'/'.$v->coverimage.'" alt="" />
													<ul>
														<li><i class="fa fa-bank"></i> '.$ht.': '.$v->hotel.'</li>
														<li><i class="fa fa-clock-o"></i> '.$dr.': '.$v->duration.'</li>
														<li><i class="fa fa-male"></i> '.$pr.': '.$v->person.'</li>
													</ul>
												</div>
												<div class="offer-detail">
													<h3><a href="'.base_url("$language").'/tours/detail/'.$v->id.'" title="">'.$title.'</a></h3>
													<div class="cost">FROM <strong>$'.($v->price/100).'</strong>/ '.$person.'</div>
												</div>
											</div><!-- Offer -->
										</div>';
										}
									}
								?>
							
							
							</div>
						</div><!-- Special Offers -->
					</div>
				</div>
			</div>
		</div>
	</section>

