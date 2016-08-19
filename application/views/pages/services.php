
	<div class="pagetop">
		<div class="container">
			<h1><?php echo strtoupper(lang("services"));?></h1>
			<ul>
				<li><a title="" href="<?php echo base_url("$language");?>"><?php echo lang("home");?></a></li>
				<li><?php echo lang("services");?></li>
			</ul>		
		</div>
	</div><!-- Page Top -->



	<section>
		<div class="block gray">
			<div class="container">
				<div class="row">
					<div class="col-md-12 column">
						<div class="services-page">
							<div class="row">
							
								<?php 
									
								if( isset($services) && !empty($services) ){
									
									/*
									foreach($servises as $serv)
									{
										$title = $serv["title$language"];
									}
									
									*/
									foreach( $services as $k=>$v )
									{
										if( $language == 'en' ){
											$title = 'titleen';
										}
										else
										{
											$title = 'titlear';
										}
									
									  echo '
										<div class="col-md-3">
											<div class="service-box">
												<img src="'.base_url("images/resource").'/'.$v->coverfoto.'" alt="" />
												<div class="service-name">
													<span><img src="'.base_url("images/resource").'/'.$v->icon.'" alt="" /></span>
													<h5><a href="'.base_url("$language").'/services/detail/'.$v->id.'" title="">'.$title.'</a></h5>
												</div>
											</div><!-- Service Box -->
										</div>';
									}
								} ?>
							
							</div>
						</div><!-- Services Page -->
					</div>
				</div>
			</div>
		</div>
	</section>