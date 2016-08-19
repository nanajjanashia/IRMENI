    <div class="pagetop">
		<div class="container">
			<h1><?php echo strtoupper(lang("gallery"));?></h1>
			<ul>
				<li><a title="" href="<?php echo base_url("$language");?>"><?php echo lang("home");?></a></li>
				<li><?php echo lang("gallery");?></li>
			</ul>		
		</div>
	</div><!-- Page Top -->


	<section>
		<div class="block gray">
			<div class="container">
				<div class="row">
					<div class="col-md-12 column">
						<div class="gallery-data">
							<section id="options">
								<span><?php echo lang("selectcategory");?>:</span>
								<div class="option-isotop">
									<ul id="filter" class="option-set filters-nav" data-option-key="filter">
										<li><a href="" class="selected" data-option-value="*"><?php echo lang("all");?></a></li>
										<li><a href="" data-option-value=".fotogallery"><?php echo lang("fotogallery");?></a></li>
										<li><a href="" data-option-value=".videogallery"><?php echo lang("videogallery");?></a></li>
									</ul>
								</div>
							</section><!-- FILTER BUTTONS -->
							<div class="row">
								<div class="gallery gaps masonary lightbox">
							
									
									
									<?php if( isset($fotogallery) ){ 
									foreach( $fotogallery as $k=>$v )
									{
										if( $language == 'en') $v->title = $v->titleen;
										else $v->title = $v->titlear;
										
										echo '<div class="col-md-4 fotogallery">
											<div class="gallery-img">
												<img src="'.base_url().'images/'.$v->foldername.'/'.$v->coverfoto.'" alt="" />
												<div class="gallery-overlay">
													<h5>'.$v->title.'</h5>';												
											echo '<a class="redirect" href="'.base_url().'images/'.$v->foldername.'/'.$v->coverfoto.'">
													+</a>
													<input class="album_id" albid="'.$v->id.'" type="hidden" value="'.$v->id.'">';
																	
											echo '</div>
												<div class="gallery-name">
													<h3>'.$v->title.'</h3>
												</div>
											</div><!-- Gallery Image -->
										</div>';
									}
											
								}?>
								
								
								<?php if( isset($videogallery) ){ 
									
									foreach( $videogallery as $k=>$v )
									{
										if( $language == 'en') $v->title = $v->titleen;
										else $v->title = $v->titlear;
										
										echo '<div class="col-md-4 videogallery">
											<div class="gallery-img">
												<img src="'.base_url().'images/'.$v->foldername.'/'.$v->coverfoto.'" alt="" />
												<div class="gallery-overlay">
													<h5>'.$v->title.'</h5>';
												
												echo '<a href="'.$v->images_video.'" data-poptrox="youtube,600x400" ><img style="display:none;" src="#" alt="" title="'.$v->title.'" />+</a>';
												
											echo '</div>
												<div class="gallery-name">
													<h3>'.$v->title.'</h3>
												</div>
											</div><!-- Gallery Image -->
										</div>';
									}								
								}?>
									
									
								</div>
							</div>
						</div><!-- gallery-data -->	
					</div>
				</div>
			</div>
		</div>
	</section>

