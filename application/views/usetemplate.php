<!DOCTYPE html>
<html>
  <head>
    <title>Aplikasi Aset - PTDQM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Plugin css -->
    <link href="<?php echo $this->config->item('bootstrap_path'); ?>less/bootstrap.less" rel="stylesheet/less" media="screen">
    <link href="<?php echo $this->config->item('bootstrap_path'); ?>dist/css/bootstrap.css" rel="stylesheet" media="print">
	<link href="<?= base_url() ?>assets/jqueryui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->config->item('jqgrid_path'); ?>css/ui.jqgrid.css" rel="stylesheet" media="screen">
    <link href="<?php echo $this->config->item('jqgrid_path'); ?>css/pepper-grinder/jquery.ui.theme.css" rel="stylesheet" media="screen">
    <link href="<?php echo $this->config->item('datepicker_path'); ?>css/datepicker3.css" rel="stylesheet" media="screen">
    <!-- Self css -->
    <link href="<?php echo $this->config->item('css_path'); ?>style.css" rel="stylesheet" media="screen">
    <link href="<?php echo $this->config->item('css_path'); ?>style-print.css" rel="stylesheet" media="print">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<!-- jQuery + Less -->
    <script src="<?php echo $this->config->item('jquery'); ?>"></script>
    <script src="<?php echo $this->config->item('less'); ?>"></script>
    <!-- jQuery (jQuery plugins) -->
    <script src="<?php echo $this->config->item('datepicker_path'); ?>js/bootstrap-datepicker.js"></script>
    <script src="<?php echo $this->config->item('jqgrid_path'); ?>js/i18n/grid.locale-en.js"></script>
    <script src="<?php echo $this->config->item('jqgrid_path'); ?>js/jquery.jqGrid.min.js"></script>
    <script src="<?php echo $this->config->item('bootstrap_path'); ?>dist/js/bootstrap.min.js"></script>
	
	<?php ((isset($jqgrid)) ? $this->load->view("jqgrid/".$jqgrid) : ""); ?>
  </head>
  
  <body>
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