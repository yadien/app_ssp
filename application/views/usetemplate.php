<!DOCTYPE html>
<html>
  <head>
    <title>Aplikasi SSP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->        
	<link href="<?=base_url();?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?=base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?=base_url();?>assets/bootstrap2/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?=base_url();?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>	
	<link href="<?php echo $this->config->item('jqgrid_path'); ?>css/ui.jqgrid.css" rel="stylesheet" media="screen">
    <link href="<?php echo $this->config->item('jqgrid_path'); ?>css/pepper-grinder/jquery.ui.theme.css" rel="stylesheet" media="screen">
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
	<script src="<?php echo $this->config->item('jqgrid_path'); ?>js/i18n/grid.locale-en.js"></script>
    <script src="<?php echo $this->config->item('jqgrid_path'); ?>js/jquery.jqGrid.min.js"></script>
	
	<script src="<?=base_url();?>assets/scripts/app.js"></script>
	<script src="<?=base_url();?>assets/scripts/HH.js"></script>
	<script>
		jQuery(document).ready(function() {    
		   App.init();
		   HH.init();
		});
	</script>
	<!-- END JAVASCRIPTS -->
	
	<?php ((isset($jqgrid)) ? $this->load->view("jqgrid/".$jqgrid) : ""); ?>
  </head>
  
  <body class="page-header-fixed page-full-width">
	<?php if ( ! empty( $komponen_top ) &&  is_array( $komponen_top )): ?>
		<?php foreach($komponen_top as $isi): ?>
			<?php $this->load->view("komponen/".$isi); ?>
		<?php endforeach; ?>
	<?php endif; ?>

    <?php ((isset($template)) ? $this->load->view("template/".$template) : ""); ?>
	
    <?php if (! empty( $komponen_bottom ) &&  is_array( $komponen_top )): ?>
		<?php foreach($komponen_bottom as $isi): ?>
			<?php $this->load->view("komponen/".$isi); ?>
		<?php endforeach; ?>
	<?php endif; ?>
	<script>
		$('#menuolahgaji').popover();
	</script>
  </body>
</html>