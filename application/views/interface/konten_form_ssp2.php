		<!-- BEGIN PAGE -->
		<div class="page-content">			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
						<?=$judul?>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="icon-home"></i>
							<?=anchor('', 'Home');?>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<?=$judul?>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class='col-md-12'>
					<div class='portlet box green'>
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-file"></i> Form Input SSP
							</div>
						</div>
						<div class='portlet-body form'>
							<div class="alert alert-danger" id='error' style='display: none;'>
								<strong>Warning!</strong>
								<ul id='error_text'></ul>
							</div>
							<div class="alert alert-success" id='success' style='display: none;'>
								<strong>Success!</strong>
								<p>Data Anda sudah diperbarui.</p>
							</div>
							
							<?php $form_attributes = array ('id' => 'frmUpdate', 'name' => 'frmUpdate', 'role' => "form", 'class' => 'form-horizontal'); ?>
								<div class="form-body">
				
    <?php
    $attributes = array('class' => 'form-horizontal', 'id' => '');
    echo form_open('ssp_post', $attributes); ?>

	<div class="control-group">
    <label for="npwp" class="control-label">NPWP Wajib Pajak <span class="required">*</span></label>
    <div class='controls'>
    <input id="npwp" type="text" name="npwp" maxlength="20" value="<?php echo set_value('npwp');echo $this->session->userdata('npwp_pilihan'); ?>" class="" required /> 
	<a href="<?=base_url()?>index.php/ssp_post/browse_npwp" onclick="javascript:void window.open('<?=base_url()?>index.php/ssp_post/browse_npwp','1415958925631','width=500,height=500,toolbar=0,menubar=0,location=0,status=0,scrollbars=1,resizable=1,left=0,top=0');return false;" class="btn btn-sm btn-warning">Pilih</a>
    <?php echo form_error('npwp'); ?>
    </div>
    </div>
    
	<div class="control-group">
    <label for="nama_wp" class="control-label">Nama Wajib Pajak <span class="required">*</span></label>
    <div class='controls'>
    <input id="nama_wp" type="text" name="nama_wp" maxlength="20" value="<?php echo set_value('nama_wp');echo $this->session->userdata('nama_pilihan'); ?>" class="" />
    <?php echo form_error('nama_wp'); ?>
    </div>
    </div>
	
	<div class="control-group">
    <label for="alamat" class="control-label">Alamat</label>
    <div class='controls'>
    <?php echo form_textarea( array( 'name' => 'alamat', 'rows' => '5', 'cols' => '80', 'value' => ((set_value('alamat')=='') ? $this->session->userdata('alamat_pilihan') : set_value('alamat') ), 'id' => 'alamat' ) )?>
    <?php echo form_error('alamat'); ?>
    </div>
    </div>
	
	<div class="control-group">
    <label for="bulan" class="control-label">Bulan <span class="required">*</span>
    </label>
    <div class="controls">
	<?php $options = array('' => 'Please Select','example_value1' => 'example option 1'); 
	$bulan=array(''=>'Pilih Bulan','01'=>'Januari','02'=>'Februari',
'03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni','07'=>'Juli',
'08'=>'Agustus','09'=>'September','10'=>'Oktober',
'11'=>'November','12'=>'Desember');
	?>
	
     
    <?php echo form_dropdown('bulan', $bulan, $this->input->post('bulan'))?>
    <?php echo form_error('bulan'); ?>
    </div>
    </div>
	<div class="control-group">
    <label for="tahun" class="control-label">Tahun <span class="required">*</span></label>
    <div class='controls'>
    <input id="tahun" type="text" name="tahun" maxlength="4" value="<?php echo set_value('tahun'); ?>" class="" data-provide="datepicker" data-date-autoclose="true" data-date="date(yyyy-mm-dd)" data-date-format="yyyy" data-date-min-view-mode="years" />
    <?php echo form_error('tahun'); ?>
    </div>
    </div>
	<div class="control-group">
    <label for="jenis_pajak" class="control-label">Jenis Pajak <span class="required">*</span>
    </label>
    <div class="controls">
	<?php 
	$jp = array();
	foreach ($kodeakun as $row => $kd_akun):
		$jp[]=array_values(get_object_vars($kd_akun));
	endforeach;
	$jpp = call_user_func_array('array_merge', $jp);
	$jppc = array_combine($jpp,$jpp);
	// print_r($jppc);
	$idjp = 'id="jenis_pajak"';
	?>
    <?php echo form_dropdown('jenis_pajak', $jppc, $this->input->post('jenis_pajak'),$idjp)?>
    <?php echo form_error('jenis_pajak'); ?>
    </div>
    </div><div class="control-group">
    <label for="jenis_setoran" class="control-label">Jenis Setoran <span class="required">*</span>
    </label>
    <div class="controls"><?php 
		// $options = array('' => 'Please Select','example_value1' => 'example option 1');
		$kj = array();
	foreach ($kodejenis as $row => $kd_jenis):
		$kj[]=array_values(get_object_vars($kd_jenis));
	endforeach;
	$kjj = call_user_func_array('array_merge', $kj);
	$kjjc = array_combine($kjj,$kjj);
	$idjs = 'id="jenis_setoran"';
	?>
    
    <?php echo form_dropdown('jenis_setoran', $kjjc, $this->input->post('jenis_setoran'), $idjs) ?>
    <?php echo form_error('jenis_setoran'); ?>
    </div>
    </div>
		<SCRIPT>
			$('#jenis_setoran').change(function(){
				var jenis_pajak = $('#jenis_pajak :selected').val();
				var jenis_setoran = $('#jenis_setoran :selected').val();
				$.ajax({
				type: "POST",
				url: "<?=base_url()?>index.php/ssp_post/getketpajak",
				data: { jenis_pajak: jenis_pajak, jenis_setoran: jenis_setoran }
				})
				.done(function( msg ) {
				if (msg=='Anda memilih pilihan yang salah') {
					alert( "" + msg );
				}else{
					$('#keterangan').val(msg);
				}
				// window.location.reload()
				});
			});
		</SCRIPT>
	<div class="control-group">
    <label for="uraian" class="control-label">Uraian</label>
    <div class='controls'>
    <?php echo form_textarea( array( 'name' => 'uraian', 'rows' => '5', 'cols' => '80', 'value' => set_value('uraian'), 'id' => 'keterangan' ) )?>
    <?php echo form_error('uraian'); ?>
    </div>
    </div>
	<script src="<?=base_url();?>assets/scripts/priceformat.js"></script>
	<script>
		$('#nilaipajak').priceFormat({
			prefix: 'Rp ',
			centsSeparator: ',',
			thousandsSeparator: '.'
		});
	</script>
    <div class="control-group">
    <label for="nilai" class="control-label">nilai <span class="required">*</span></label>
    <div class='controls'>
    <input id="nilaipajak" type="text" name="nilai" value="<?php echo set_value('nilai'); ?>" />
    <?php echo form_error('nilai'); ?>
    </div>
    </div>
    <div class="control-group">
    <label></label>
    <div class='controls'>
    
    </div>
    </div>
    </fieldset>

								</div>
								
								<div class="form-actions fluid">
									<div class="col-md-offset-3 col-md-9">
										<button type="submit" class="btn btn-success">Input Data</button>
										<?=anchor('', 'Kembali', array('class' => 'btn default'));?>
										<span id='loading' style='display: none;'>Memproses data, mohon tunggu...</span>
									</div>
								</div>
							<?=form_close();?>
							
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT--> 
		</div>
		<!-- END PAGE -->

		<script>
		jQuery(document).ready(function() {
			$('#nama_pengguna').focus();


			$('#frmUpdate').submit(function(){
				$('#loading').show();
				$('#error,#success').hide();
				$.post($(this).attr('action'), $(this).serialize(), function(rtn){
					$('#loading').hide();
					if (rtn.code == 0)
					{
						$('#success').show();
					}
					else
					{
						$('#error_text').html(rtn.message);
						$('#error').show();
					}
				}, 'json');				
				return false;
			});
		});
		</script>
