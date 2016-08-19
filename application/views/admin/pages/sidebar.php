  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>images/logoadmin.png" width="200px;" height="200px;" class="" alt="User Image"> <!-- images/logoadmin.png -->
        </div>
        <div class="pull-left info">
          <p><?php print_r($this->session->email) ;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
   
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li><br>
		<li><a href="<?php echo base_url("$language/admin/topage");?>"><i class="fa fa-picture-o"></i> <span>Page top background</span></a></li>
        <li><a href="<?php echo base_url("$language/admin/gallery");?>"><i class="fa fa-folder-o"></i> <span>Gallery</span></a></li>
        <li><a href="<?php echo base_url("$language/admin/news");?>"><i class="fa fa-newspaper-o"></i> <span>News</span></a></li>
        <li><a href="<?php echo base_url("$language/admin/services");?>"><i class="fa fa-retweet"></i> <span>Services</span></a></li>
        <li><a href="<?php echo base_url("$language/admin/tours");?>"><i class="fa fa-motorcycle"></i> <span>Tours</span></a></li>
        <li><a href="<?php echo base_url("$language/admin/rooms");?>"><i class="fa fa-bed"></i> <span>Rooms</span></a></li>
        <li><a href="<?php echo base_url("$language/admin/about");?>"><i class="fa fa-map-o"></i> <span>About</span></a></li>
        <li><a href="<?php echo base_url("$language/admin/contact");?>"><i class="fa fa-phone-square"></i> <span>Contact</span></a></li>
		<li><a href="<?php echo base_url("$language/admin/help");?>"><i class="fa fa-question"></i> <span>Help</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>