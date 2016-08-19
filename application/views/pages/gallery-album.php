    <div class="pagetop">
		<div class="container">
			<h1><?php echo strtoupper(lang("gallery"));?></h1>
			<ul>
				<li><a title="" href="<?php echo base_url("$language");?>"><?php echo lang("home");?></a></li>
				<li><?php echo lang("galleryalbum");?></li>
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
							<a href="<?php echo base_url("$language");?>/gallery" style="color: #ffffff; background: #71a865; padding: 15px 45px;"><?php echo lang("returnback");?></a>
							
							</section>
							<div class="row">
							
							<?php if( $language == 'en') $title = $album[0]->titleen;
										else $title = $album[0]->titlear;
										echo '<h4 style="margin-left:16px;"><span>'.$title.'</span></h4>';?>
							<br>
								<div class="gallery gaps masonary lightbox">
								<?php 
									//print_r($album); die;
									
								if( isset($album) && ($album[0]->type==1) ){ 
									
									
										
										$images = explode("&",$album[0]->images_video);
										//print_r($images); die;
										foreach( $images as $k=>$v )
										{
											echo '<div class="col-md-4 adventure">
											<div class="gallery-img">
												<img src="'.base_url().'images/'.$album[0]->foldername.'/'.$v.'" alt="" />
												<div class="gallery-overlay">													
													<a href="'.base_url().'images/'.$album[0]->foldername.'/'.$v.'"><img style="display:none;"  src="#" alt="" title="'.$title.'" />+</a>
												</div>
											</div>
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
