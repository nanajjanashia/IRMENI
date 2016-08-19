
	<div class="pagetop">
		<div class="container">
			<h1><?php echo strtoupper(lang("aboutus"));?></h1>
			<ul>
				<li><a title="" href="<?php echo base_url("$language");?>"><?php echo lang("home");?></a></li>
				<li><?php echo lang("aboutus");?></li>
			</ul>		
		</div>
	</div><!-- Page Top -->	

	<section>
		<div class="block no-padding">
			<div class="row">
				<div class="col-md-12 column">
					<div class="property-information">
					
					<?php 	
						if( isset( $about ) && !empty( $about ) )
						{
							$foretext = "";
							if( $language == 'en' )
							{
								$text = $about[0]->texten;
							}
							else
							{
								$text = $about[0]->textar;
							}
							echo '
								<div class="property-detail">
									'.$text.'
								</div><!-- Property Details -->
								
								<div class="property-image">
									<img src='.base_url().'/images/resource/'.$about[0]->image.' alt="" />
								</div><!-- Property Image -->
								
							';
						}
					?>
						
					</div><!-- Property Information -->
				</div>
			</div>
		</div>
	</section>

	<script>
	
	$( document ).ready(function() {
		$(".property-detail ul li").append('<i class=\"fa fa-check\"></i>');
	});
	
	</script>	
