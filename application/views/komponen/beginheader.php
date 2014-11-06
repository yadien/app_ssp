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
				<?php //if ($profile->level == 'ADMIN') { ?>
				<?php if (1==1) { ?>
				<li <?=(isset ($navbar) AND $navbar == 'master') ? 'class=active':'';?>>
					<a data-hover="dropdown" data-close-others="true" class="dropdown-toggle" href="javascript:void();">
						<span class="selected"></span>Master
						<i class="icon-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li><?=anchor('master/skpd', 'Master Jenis Pajak');?></li>
						<li><?=anchor('master/Pejabat', 'Master Pengguna Anggaran');?></li>
						<li><?=anchor('master/account', 'Master Pemungut Pajak');?></li>
						<li><?=anchor('master/user', 'Master User');?></li>
					</ul>
				</li>
				<li <?=(isset ($navbar) AND $navbar == 'master') ? 'class=active':'';?>>
					<a data-hover="dropdown" data-close-others="true" class="dropdown-toggle" href="javascript:void();">
						<span class="selected"></span>Tools
						<i class="icon-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li><?=anchor('master/backup', 'Backup');?></li>
						<li><?=anchor('master/restore', 'Restore');?></li>
						<li><?=anchor('master/setting', 'Setting');?></li>
						<li><?=anchor('master/info', 'Kelola Informasi');?></li>
					</ul>
				</li>
				<li <?=(isset ($navbar) AND $navbar == 'master') ? 'class=active':'';?>>
					<a data-hover="dropdown" data-close-others="true" class="dropdown-toggle" href="javascript:void();">
						<span class="selected"></span>Transaksi
						<i class="icon-angle-down"></i>
					</a>					
				</li>
				<li <?=(isset ($navbar) AND $navbar == 'master') ? 'class=active':'';?>>
					<a data-hover="dropdown" data-close-others="true" class="dropdown-toggle" href="javascript:void();">
						<span class="selected"></span>Laporan
						<i class="icon-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<!--kosong -->
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
					<span class="username"><?php //=$profile->nama_pengguna;?></span>
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