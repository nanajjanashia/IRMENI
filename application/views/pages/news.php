

	<div class="pagetop">
		<div class="container">
			<h1><?php echo strtoupper(lang("news"));?></h1>
			<ul>
				<li><a title="" href="<?php echo base_url("$language");?>"><?php echo lang("home");?></a></li>
				<li><?php echo lang("news");?></li>
			</ul>		
		</div>
	</div><!-- Page Top -->

	<section>
		<div class="block gray">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="blog-posts masonary">
								
								<?php  
									if( isset( $news ) && !empty( $news ) )
									{
										foreach( $news as $k=>$v )
										{
											echo '<div class="col-md-4">									
													<div class="blog-post">
														<div class="post-img">
															<img src="'.base_url().'/images/resource/'.$v->imgsrc.'" alt="" />
															<a href="'.base_url("$language").'/news/detail/'.$v->id.'" title=""><img src="'.base_url().'/images/ln.png" alt="" /></a>
														</div>
														<h3><a href="'.base_url("$language").'/news/detail/'.$v->id.'" title="">'.$v->titleen.'</a></h3>
														<p>'.$v->shorttexten.'</p>
														
													</div><!-- Blog Post -->
												</div>';
										}
									}
								
								?>
								
							
								<!--<div class="col-md-4">									
									<div class="blog-post">
										<div class="post-img">
											<img src="<?php echo base_url("images/resource");?>/blog-grid6.jpg" alt="" />
											<a href="news-detail.html" title=""><img src="<?php echo base_url();?>images/ln.png" alt="" /></a>
										</div>
										<h3><a href="news-detail.html" title="">Winvian Named a Best Overall Restaurant, Expert’s Pick</a></h3>
										<p>Curabitur blandit tempus porttitor. Maecenas et non magna. Fusce dapibus, tellus ac cursi nibh, ut fermentum massa justo.</p>
										
									</div>
								</div> -->
								
							</div>
						</div><!-- Blog Posts -->
					</div>
				</div>
			</div>
		</div>
	</section>


