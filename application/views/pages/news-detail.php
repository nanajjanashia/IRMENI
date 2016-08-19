
	<div class="pagetop">
		<div class="container">
			<h1><?php echo strtoupper(lang("news") );?></h1>
			<ul>
				<li><a title="" href="<?php echo base_url("$language");?>"><?php echo lang("home");?></a></li>
				<li><a title="" href="<?php echo base_url("$language");?>/news"><?php echo lang("news");?></li>
				<li><?php echo lang("detail");?></li>
			</ul>		
		</div>
	</div><!-- Page Top -->

	<section>
		<div class="block gray">
			<div class="container">
				<div class="row">
					<div class="col-md-12 column">
					<?php if( isset($news_detail[0]) && !empty($news_detail[0]) ){ ?>
						<div class="blog-single">
							<div class="post-img">
								<img src="<?php echo base_url();?>images/resource/<?php echo $news_detail[0]->cntimage;?>" alt="" />
							</div>
							
							<div class="post-details">
							
								<h1 class="post-title"><?php echo $news_detail[0]->titleen ?></h1>
								<div class="share-this">
									<strong> &nbsp;&nbsp;<?php echo lang("sharethispost");?>:</strong>
									<ul>
									<li><a  title="" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url("$language");?>/news/detail/<?php echo $news_detail[0]->id;?>">share</i></a></a></li>
									
										<li><a href="#" title=""><i class="fa fa-twitter"></li>
										<li><a href="#" title=""><i class="fa fa-linkedin"></i></a></li>
										<li><a href="#" title=""><i class="fa fa-facebook"></i></a></li>
									</ul>
								</div>
								<?php echo $news_detail[0]->longtexten; ?>
							</div><!-- Post Details -->
						</div><!-- Blog Single -->
					<?php } ?>
					</div>					
				</div>
			</div>
		</div>
	</section>

