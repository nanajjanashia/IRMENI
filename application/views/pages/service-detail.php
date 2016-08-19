
	<div class="pagetop">
		<div class="container">
			<h1><?php echo strtoupper(lang("servicedetail"));?></h1>
			<ul>
				<li><a title="" href="<?php echo base_url("$language");?>"><?php echo lang("home");?></a></li>
				<li><a title="" href="<?php echo base_url("$language");?>/services"><?php echo lang("servicedetail");?></a></li>
				<li><?php echo lang("servicedetail");?></li>
			</ul>		
		</div>
	</div><!-- Page Top -->



	<section>
		<div class="block gray">
			<div class="container">
				<div class="row">
					<div class="col-md-12 column">
					
						<?php 
						
						if( isset($service) && !empty($service) ){ 
							
							$bigimgs = explode("&",$service[0]->bigimages);
							$smallimgs = explode("&",$service[0]->smallimages);
							if( $language == 'en' )
							{
								 $title = $service[0]->titleen;
								 $text = $service[0]->texten;
							}
							else
							{
								$title = $service[0]->titlear;
								$text = $service[0]->texten;
							}
							echo '
								<div class="service-detail">
								<div class="service-image-tabs">
								<h2><strong>'.$title.'</strong></h2>
									<div class="tab-content">';
									
									if( isset($bigimgs) && !empty($bigimgs) ){
									
										for($i=0;$i<count($bigimgs); $i++)
										{
											if($i == 0)
											{
												echo '<div role="tabpanel" class="tab-pane fade in active" id="service-image'.($i+1).'">
												<img src="'.base_url().'images/resource/'.$bigimgs[0].'" alt="" />
												</div>';
											}
											else
											{
												echo '<div role="tabpanel" class="tab-pane fade" id="service-image'.($i+1).'">
												<img src="'.base_url().'images/resource/'.$bigimgs[$i].'" alt="" />
												</div>';
											}											
										}
										
									}
									
								 echo '</div>
									</div>
								<ul class="nav nav-tabs">';
									
								if( isset($smallimgs) && !empty($smallimgs) ){
																		
									for($i=0; $i<count($smallimgs); $i++)
									{
										//print_r($smallimgs); die;
										if( $i == 0 )
										{
											echo '<li class="active">
												<a href="#service-image'.($i+1).'" data-toggle="tab"><img src="'.base_url().'images/resource/'.$smallimgs[0].'" alt="" /></a>
											</li>';
										}
										else
										{
											echo '<li>
												<a href="#service-image'.($i+1).'" data-toggle="tab"><img src="'.base_url().'images/resource/'.$smallimgs[$i].'" alt="" /></a>
											</li>';
										}
									}
								}
								
								echo  '</ul>
									</div>';
																				
						echo '<div class="servicetext">'.$text.'</div>';
					 }?>
					</div><!-- Service Details -->
				</div>
			</div>
		</div>
	</div>
</section>
