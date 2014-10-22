<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sample Invoice</title>

    <link href="<?php echo $this->config->item('bootstrap_path'); ?>dist/css/bootstrap.css" rel="stylesheet" >
    

	<style>
	@import url(http://fonts.googleapis.com/css?family=Bree+Serif);
	body, h1, h2, h3, h4, h5, h6{
		font-family: 'Bree Serif', serif;
	}
	</style>
</head>
<body>

	<div class="container">

		<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading"><h3 class="panel-title">Pilih Bulan</h3></div>

<input id="num_bulan" type="text" class="form-control" placeholder="Klik untuk pilih..." data-provide="datepicker" data-date-autoclose="true" data-date="date(yyyy-mm-dd)" data-date-format="MM || mm-yyyy" data-date-min-view-mode="months">
</div>
<?php 
$sessbulan = $this->session->userdata('id_i_gaji');
if (!EMPTY($sessbulan)): ?>
<div class="container">
<div class="row">
<div class="col-xs-4">
	<?php $this->load->view('interface/konten_printlayout_b','',FALSE); ?>
	</div>
<div class="col-xs-4">
	<?php $this->load->view('interface/konten_printlayout_b','',FALSE); ?>
	</div>
<div class="col-xs-4">
	<?php $this->load->view('interface/konten_printlayout_b','',FALSE); ?>
	</div>
</div>
</div>
<?PHP endif; ?>
<script>
$('.pop_jam').popover();
$("#num_bulan").datepicker().on('changeDate',function(){
	var date = $("#num_bulan").val().split(" || "),dateex = date[1].split("-");
	var fulldate = dateex[1]+"-"+dateex[0]+"-01";
	$.ajax({
		url: "<?=base_url()?>ajax/setid_gaji_sess/"+fulldate, cache: false,
		success: function(msg){
			alert(msg);
			location.reload();
		}
	});
});
</script>

	</div>

</body>
</html>