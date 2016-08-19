
	<footer>
		<div class="block darkblue-layer">
			<div data-velocity="-.1" style="background: url(<?php echo base_url(); ?>images/parallax3.jpg) repeat scroll 50% 0 transparent;" class="parallax"></div>
			<div class="container">
				<div class="footer-widgets">
					<div class="row">
						<div class="col-md-6">
							<div class="widget">
								<div class="about-widget">
									<a href="#"><img src="<?php echo base_url(); ?>images/resource/<?php echo $logo[0]->footerlogo; ?>" alt="" /></a>
									<?php if(isset($footerabout))
									{
										if( $language == 'en' )
										{
											$fttext = $footerabout[0]->texten;
										}
										else
										{
											$fttext = $footerabout[0]->textar;
										}
										echo $fttext;
									}
									?>
								</div>
							</div><!-- Widget -->
						</div>
						<div class="col-md-3">
							<div class="widget">
								<div class="widget-title">
									<h4><?php echo lang("recentnews");?></h4>
									<span><?php echo lang("news");?></span>
								</div>
								<div class="widget-news">
									<?php 
										
										if( isset($lastnews) && !empty($lastnews) )
										{
											foreach( $lastnews as $k=>$v )
											{
												$dt = explode(" ",$v->dt);
												$date = explode("-",$dt[0]);
												$monthNum = ltrim($date[1], '0');
												//get month name 
												$dateObj   = DateTime::createFromFormat('!m', $monthNum);
												$monthName = $dateObj->format('F');
												
												if( $language == 'en' )	$title = $v->titleen;
												else $title = $v->titlear;
												
												echo '<div class="recent-news">
													<span class="date">
														<i>'.$monthName.'</i><strong>'.$date[1].'</strong>
													</span>
													<a href="'.base_url("$language").'/news/detail/'.$v->id.'" title="">'.$title.'</a>
												</div>';
											}
										}
									?>
								</div><!-- News Widget -->
							</div>
						</div>
						<div class="col-md-3">
							<div class="widget">
								<div class="offers-widget">
								
									<?php									
										if( isset($footerrooms) && !empty($footerrooms) )
										{
											foreach($footerrooms as $t=>$y)
											{
												echo '<div class="offer">
													<img src="'.base_url().'images/resource/'.$y->footerimage.'" alt="" />
													<div class="offer-overlay">
														<span>'.lang("roomone").': '.$y->roomnumber.'</span>
														<a href="'.base_url("$language").'/rooms/detail/'.$y->id.'" title="">'.$y->type.'</a>
													</div>
												</div>';
											}
										}
									?>
								</div><!-- Offers Widget -->
							</div>
						</div>
					</div>
				</div><!-- Footer Widgets -->
			</div>
		</div>
	</footer><!-- footer -->

	<div class="bottom-footer">
		<div class="container">
			<div class="contact-bar">
			<?php  
			
				if( isset($address) && !empty($address) )
				{
					if( $language == 'en' )
					{
						$addr = $address[0]->addressen;
					}
					else
					{;
						$addr = $address[0]->addressar;
					}
					if(!empty($address[0]->fax))
						$fax = ', &nbsp;'.$address[0]->fax;
					else $fax = "";
					echo '<div class="col-md-4">
							<div class="contact-details">
								<span><i class="fa fa-map-marker"></i></span>
								<strong>'.lang("addrName").':</strong>
								<p>'.$addr.'</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="contact-details dark">
								<span><i class="fa fa-phone"></i></span>
								<strong>'.lang("callusnow").':</strong>
								<p>'.$address[0]->phone.''.$fax.'</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="contact-details">
								<span><i class="fa fa-envelope-square"></i></span>
								<strong>'.lang("emailaddress").':</strong>
								<p>'.$address[0]->email.'</p>
							</div>
						</div>';
				}
			?>
				
			</div><!-- contact-data -->		
			<p>&copy; 2016 <a href="#"><?php echo $copyright[0]->name;?></a> -<?php echo lang("copyright");?> <a href="https://itda.ge">ITDA</a></p>
		</div><!-- container -->
	</div><!-- after-footer -->

</div>


	<script src="<?php echo base_url("js");?>/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url("js");?>/owl.carousel.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url("js");?>/enscroll-0.5.2.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url("js");?>/jquery.scrolly.js" type="text/javascript"></script>
	<script src="<?php echo base_url("js");?>/jquery.isotope.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url("js");?>/isotope-initialize.js" type="text/javascript"></script>
	<script src="<?php echo base_url("js");?>/userincr.js" type="text/javascript"></script>	
	<script src="<?php echo base_url("js");?>/jquery.simpleWeather.min.js"></script>
	<script src="<?php echo base_url("js");?>/script.js" type="text/javascript"></script>
	
  
  <script>
	var base_url = "<?php echo base_url();?>";
	var lang = "<?php echo $language;?>";
  </script>
  
	<script type="text/javascript">
	$(document).ready(function() {
        $('.redirect').click(function(){
			
		   var base_url = window.location.origin;
		   $('.poptrox-popup').css('display','none');
		   $('.poptrox-overlay').css('display','none');
		   // alert($(this).attr("albid"));
		   var id =  $(this).parent().children('input').attr('albid');
		  
		   document.location.href = base_url +'/'+lang+'/gallery/album/'+id;
           return false;
        });
});
		
	</script>
	

	
		
	<script>
		$('#book-now').on('click', function() {
			
			var base_url = window.location.origin;
			if ( isNaN($('#hmadults').val()) ) return false;
			if ( isNaN($('#hmkids').val()) ) return false;
			
			$.cookie('hmroomtype', $('#hmroomtype').val());
			$.cookie('hmadults', $('#hmadults').val());
			$.cookie('hmkids', $('#hmkids').val());
			window.location = base_url +'/'+lang+'/rooms/booking';
						
		});
		
		$('#checkavalbooking').on('click', function(e) {
			e.preventDefault();
			
			var D_in = $('.ckeckin').val();
			var D_out = $('.checkout').val();
			
			if( D_in == '' || D_out == '' )
			{
				alert("Select dates");
				return false;
			}	
			
			var dt_in = D_in.split("/");
			var dt_out = D_out.split("/");
			
			var tm_in = new Date(dt_in[2],dt_in[1],dt_in[0]);
			var tm_out = new Date(dt_out[2],dt_out[1],dt_out[0]);
			tm_in = tm_in.getTime();
			tm_out = tm_out.getTime();
			
			if( tm_in > tm_out )
			{
				alert("Select correct dates");
				return false;
			}
			
			var daults = $('#hmadults').val()*1;
			var dkids = $('#hmkids').val()*1;
			var dtype = $('#hmroomtype').val();
			if ( isNaN(daults) || daults < 1 || daults !== parseInt(daults) ) { alert("Adults is not valid!"); return false; }
			if ( isNaN(dkids)|| dkids !== parseInt(dkids) ) { alert("Kids is not valid!");return false; }
			
			
			if( dtype == "0" )
			{
				alert("Please, select room type!");
			}
			
			forrequestin = dt_in[0]+"-"+dt_in[1]+"-"+dt_in[2];
			forrequestout = dt_out[0]+"-"+dt_out[1]+"-"+dt_out[2];
			
			window.location = base_url +'/'+lang+'/rooms/booking/'+forrequestin+'/'+forrequestout+'/'+dtype+'/'+daults+'/'+$('#hmkids').val();
				
		});
		
	</script>
	
	<script src="<?php echo base_url("js");?>/jquery.poptrox.min.js" type="text/javascript"></script>
	
	<script type="text/javascript">

	$(window).load(function(){

		/*================== SERVICES CAROUSEL ======================*/
		$('.service-carousel').owlCarousel({
			autoplay:true,
			autoplayTimeout:30000,
			smartSpeed:2000,
			loop:true,
			dots:false,
			nav:true,
			margin:10,
			items:3,
			autoHeight:true,
			responsive:{
				0:{items:1},
				480:{items:2},
				767:{items:3},
				980:{items:3}
			}
		});


		/*================== CLIENTS CAROUSEL ======================*/
		$('.clients-carousel').owlCarousel({
			autoplay:true,
			autoplayTimeout:30000,
			smartSpeed:2000,
			loop:true,
			dots:false,
			nav:true,
			margin:10,
			items:5,
			autoHeight:true,
			responsive:{
				0:{items:1},
				480:{items:3},
				767:{items:4},
				980:{items:5}
			}
		});			
	});

	</script>
	
</body>
</html>