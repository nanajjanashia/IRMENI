
	<div class="pagetop">
		<div class="container">
			<h1><?php echo strtoupper(lang("tourdetail"));?></h1>
			<ul>
				<li><a title="" href="<?php echo base_url("$language");?>"><?php echo lang("home");?></a></li>
				<li><a title="" href="<?php echo base_url("$language");?>/tours"><?php echo lang("tours");?></a></li>
				<li><?php echo lang("tourdetail");?></li>
			</ul>		
		</div>
	</div><!-- Page Top -->



	
	
		<?php 
			if( isset($tour) && !empty($tour) )
			{
				if( $language == 'en' )
				{
					$dtitle = $tour[0]->dtitleen;
					$dtext = $tour[0]->dtexten;
					$dts = "Extra Details";
				}
				else
				{
					$dtitle = $tour[0]->dtitlear;
					$dtext = $tour[0]->dtextar;
					$dts = "Extra Details";
				}
				
				echo '<section><div class="block gray">
						<div class="container">
							<div class="row">
								<div class="col-md-12 column">
									<div class="room-gallery">
										<div class="tab-content">
											<img src="'.base_url().'images/resource/'.$tour[0]->mainimage.'" alt="" />
										</div>';
										
							if(!empty($tour[0]->dtitleen) && !empty($tour[0]->dtexten) && !empty($tour[0]->dtitlear) && !empty($tour[0]->dtextar))
							{
								echo '<div class="room-thumbs">
											<div class="container">
												<div class="room-specs">
													<h4>'.$dtitle.'<span>'.$dts.'</span></h4>
													'.$dtext.'
												</div>						
											</div>
										</div>';
							}
										
									echo '</div>
								</div>
							</div>
						</div>
					</div></section>';
				
			}
		?>
	
		
	

	<section>
		<div class="block remove-gap gray">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="package-single-detail">
							
					<?php if( isset($tour) && !empty($tour) )
						{
							if( $tour[0]->price == 0 )
							{
								$ptice = 0;
							}
							else
							{
								$price = $tour[0]->price/100;
							}
							if( $language == 'en' )
							{
								$title = $tour[0]->titleen;
								$text = $tour[0]->texten;
							}
							else
							{
								$title = $tour[0]->titlear;
								$text = $tour[0]->textar;
							}
										echo '<h3 class="package-name">'.$title.'</h3>
							<div class="package-price">
								<strong>'.lang("startfrom").'</strong>
								<i>$'.$price.'</i>
								<span>'.lang("person").'</span>
								<a class="book-now" href="'.base_url("$language").'/tours/book/'.$tour[0]->id.'" title="">'.lang("booknow").'</a>
							</div>'.$text.'';
						}?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

