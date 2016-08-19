<div class="theme-layout">
	<div class="header-container">
		
		<div class="topbar">
			<div class="weather-wrapper">
				<div id="weather"></div>
				<?php 
				if( isset($weather) && !empty($weather) ){
					echo '
						<img  src="'.base_url().'images/weather/'.$weather['icon'].'.png">
						<div class="weather-detail">
						<div class="weather-city">'.$weather['city'].', '.$weather['country'].'</div>
						<span class="temprature"><i class="icon-"></i>'.$weather['temperature'].' &deg; 
						'.$weather['unit'].'</span></div>';
				}?>
			</div>
			<span style="margin-top:12px; font-size:14px" class="address">
			<?php
				if( isset($currency) && !empty($currency) )
				{ 
					echo '<span><b>1 USD = '.$currency,' GEL &nbsp; &nbsp; &nbsp;'; 
					echo '1 GEL = '.round((1/$currency),2),' USD</b></span>'; 					
				}
			?>
			</span>
			
			<div class="registration-buttons">
				<a id="register-btn" title="" href="#"><?php echo lang("langen");?></a>
				<a id="login-btn" title="" href="#"><?php echo lang("langar");?></a>
			</div>
			
		</div><!-- Topbar -->

		<header>
			<div class="container">
				<div class="logo-sec">
					<a href="<?php echo base_url("$language"); ?>"><img src="<?php echo base_url(); ?>images/resource/<?php echo $logo[0]->logo; ?>" alt="" /></a>  <!-- images/logo.png -->
				</div><!-- logo -->
				<nav>	
					<ul>
						<li class="menu-item-has-children"><a href="<?php echo base_url("$language");?>" title="">Home</a></li>
						<li class="menu-item-has-children"><a href="<?php echo base_url("$language/gallery");?>" title="">Gallery</a></li>
						<li class="menu-item-has-children"><a href="<?php echo base_url("$language/news");?>" title="">News</a>
						<li class="menu-item-has-children"><a href="<?php echo base_url("$language/services");?>" title="">Services</a></li>
						<li class="menu-item-has-children"><a href="<?php echo base_url("$language/tours");?>" title="">Tours</a></li>
						<li class="menu-item-has-children"><a href="<?php echo base_url("$language/rooms");?>" title="">Rooms</a></li>
						<li class="menu-item-has-children"><a href="<?php echo base_url("$language/about");?>" title="">About</a></li>
						<li class="menu-item-has-children"><a href="<?php echo base_url("$language/contact");?>" title="">Contact</a></li>
					</ul>
				</nav><!-- nav -->
				<span class="responsive-btn"><a href="#" title=""><i class="fa fa-align-center"></i></a></span>
			</div>
		</header><!-- Header -->

	<div class="responsive-menu">
			<ul>
				<li class="menu-item-has-children"><a href="<?php echo base_url("$language");?>" title="">Home</a> <i class="fa fa-angle-down"></i>
				</li>
				<li class="menu-item-has-children"><a href="<?php echo base_url("$language/gallery");?>" title="">Gallery</a> <i class="fa fa-angle-down"></i>
				</li>
				<li class="menu-item-has-children"><a href="<?php echo base_url("$language/news");?>" title="">News</a> <i class="fa fa-angle-down"></i>
				</li>
				<li class="menu-item-has-children"><a href="<?php echo base_url("$language/services");?>" title="">Services</a> <i class="fa fa-angle-down"></i>
				<li class="menu-item-has-children"><a href="<?php echo base_url("$language/tours");?>" title="">Tours</a> <i class="fa fa-angle-down"></i>
				</li>
				<li class="menu-item-has-children"><a href="<?php echo base_url("$language/rooms");?>" title="">Rooms</a> <i class="fa fa-angle-down"></i>
				</li>
				<li><a href="<?php echo base_url("$language/about");?>" title="">About</a> 
				</li>
				<li><a href="<?php echo base_url("$language/contact");?>" title="">Contact</a></li>
			</ul>
		</div>


	</div><!-- Header Container -->
