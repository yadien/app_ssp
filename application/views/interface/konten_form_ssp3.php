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
    <label for="nilai" class="control-label">Nilai belanja <span class="required">*</span></label>
    <div class='controls'>
    <input id="nilaitransaksi" type="text" name="nilai" value="<?php echo set_value('nilai'); ?>" />
    <?php echo form_error('nilai'); ?>
    </div>
    </div>
	
	<div class="control-group">
    <label for="bulan" class="control-label">Jenis Belanja <span class="required">*</span>
    </label>
    <div class="controls">
		<select name="belanja" id="belanja">
			<option>-pilih jenis belanja-</option>
			<?php foreach($belanja as $row): ?>
			<option value="<?=$row->belanjaid?>"><?=$row->belanja?></option>
			<?php endforeach; ?>
		</select>
    </div>
    </div>
	
    <div class="control-group">
    <label for="kenapajak" class="control-label">Kena Pajak <span class="required">*</span></label>
    <div class='controls' id="keterangan_pajak">
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
		$('#belanja').change(function(){
			var belanjaid = $('#belanja option:selected').val();
			var nilai = $('#nilaitransaksi').val();
			var npwp = $('#npwp').val();
			// alert(belanjaid);
			$.ajax({
				type: "POST",
				url: "<?=base_url()?>index.php/ssp_auto/cekpajak",
				data: { belanjaid: belanjaid, nilai: nilai, npwp: npwp }
				})
				.done(function( msg ) {
					$('#keterangan_pajak').html(msg);
				});
		});
	</script>