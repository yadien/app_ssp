<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>Aplikasi SSP</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<meta name="MobileOptimized" content="320">
	<!-- BEGIN GLOBAL MANDATORY STYLES -->        
	<link href="<?=base_url();?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?=base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?=base_url();?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>	
	<!-- END GLOBAL MANDATORY STYLES -->
	
	<!-- BEGIN THEME STYLES --> 
	<link href="<?=base_url();?>assets/css/chosen.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url();?>assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
	<link href="<?=base_url();?>assets/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="<?=base_url();?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="<?=base_url();?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="<?=base_url();?>assets/css/themes/blue.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css"/>	
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   
	<!--[if lt IE 9]>
	<script src="<?=base_url();?>assets/plugins/excanvas.min.js"></script>
	<script src="<?=base_url();?>assets/plugins/respond.min.js"></script>  
	<![endif]-->  
	<script src="<?=base_url();?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="<?=base_url();?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>    
	<script src="<?=base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?=base_url();?>assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<script src="<?=base_url();?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?=base_url();?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="<?=base_url();?>assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="<?=base_url();?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<script src="<?=base_url();?>assets/main.form.js"></script>
	<script src="<?=base_url();?>assets/plugins/chosen.jquery.js" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/plugins/bootstrap-toastr/toastr.min.css" />
	<script src="<?=base_url();?>assets/plugins/bootstrap-toastr/toastr.min.js"></script>
	<link href="<?=base_url();?>assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="<?=base_url();?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>

	<script src="<?=base_url();?>assets/scripts/app.js"></script>
	<script src="<?=base_url();?>assets/scripts/HH.js"></script>
	<script>
		jQuery(document).ready(function() {    
		   App.init();
		   HH.init();
		});
	</script>
	<!-- END JAVASCRIPTS -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-full-width">
	<!-- BEGIN HEADER -->   
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="header-inner">
			<!-- BEGIN LOGO -->
			<a class="navbar-brand" href="<?=base_url();?>">
				<div class="judulbaru" >DKPP - <font color="orange">APPLIKASI SSP</font></div>
				<!--<img src="<?=base_url();?>assets/img/logo_text_aplikasi.png" alt="logo" class="img-responsive" />-->
			</a>
			<!-- END LOGO -->
			<!-- BEGIN HORIZANTAL MENU -->
			<div class="hor-menu hidden-sm hidden-xs">
				<ul class="nav navbar-nav">
				
				<!-- menu here -->
				<?php if ($profile->level == 'ADMIN') { ?>
				<li <?=(isset ($navbar) AND $navbar == 'master') ? 'class=active':'';?>>
					<a data-hover="dropdown" data-close-others="true" class="dropdown-toggle" href="javascript:void();">
						<span class="selected"></span>Master
						<i class="icon-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li><?=anchor('master/skpd', 'Master Jenis Pajak');?></li>
						<li><?=anchor('master/Pejabat', 'Master Pengguna Anggaran');?></li>
						<li><?=anchor('master/account', 'Master Pemungut Pajak');?></li>
					</ul>
				</li>
				<?php } ?>
				
				</ul>					
			</div>
			<!-- END HORIZANTAL MENU -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<img src="<?=base_url();?>assets/img/menu-toggler.png" alt="" />
			</a>          
			<!-- END RESPONSIVE MENU TOGGLER-->     
			<!-- BEGIN TOP NAVIGATION MENU -->
			<ul class="nav navbar-nav pull-right">
							
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<li class="dropdown user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" src="<?=base_url();?>assets/img/avatar1_small.jpg"/>
					<span class="username"><?=$profile->nama_pengguna;?></span>
					<i class="icon-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?=site_url('profile');?>"><i class="icon-user"></i> Profil Saya</a></li>
						<li><a href="<?=site_url('profile/chpasswd');?>"><i class="icon-user"></i> Ubah Password</a></li>						
						<li class="divider"></li>
						<li><a href="javascript:;" id="trigger_fullscreen"><i class="icon-move"></i> Full Screen</a></li>
						<li><a href="<?=site_url('auth/logout');?>"><i class="icon-key"></i> Log Out</a></li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
			</ul>
			<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- END HEADER -->
	<div class="clearfix"></div>
	<!-- BEGIN CONTAINER -->   
	<div class="page-container" >
		<!-- BEGIN EMPTY PAGE SIDEBAR -->
		<div class="page-sidebar navbar-collapse collapse">
			<ul class="page-sidebar-menu visible-sm visible-xs">
				<li>
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<form class="sidebar-search" action="extra_search.html" method="POST">
						<div class="form-container">
							<div class="input-box">
								<a href="javascript:;" class="remove"></a>
								<input type="text" placeholder="Search..."/>
								<input type="button" class="submit" value=" "/>
							</div>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li>
					<a class="active" href="index.html">
					Dashboard                        
					</a>
				</li>
			</ul>
		</div>
		<!-- END EMPTY PAGE SIDEBAR -->
		<?=$body;?>
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="footer">
		<div class="footer-inner">
			<?=date('Y');?> &copy; Aplikasi SSP Kota Tangerang Selatan. Developed by <a href='mailto:adin_pai@yahoo.co.id'>Adinpai</a>
		</div>
		<div class="footer-tools">
			<span class="go-top">
			<i class="icon-angle-up"></i>
			</span>
		</div>
	</div>
	<!-- END FOOTER -->

</body>
<!-- END BODY -->
</html>