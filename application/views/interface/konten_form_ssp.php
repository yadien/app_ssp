    <fieldset><legend>form_ssp_post</legend>
    <?php
    $attributes = array('class' => 'form-horizontal', 'id' => '');
    echo form_open('ssp_post', $attributes); ?>
    <div class="control-group">
    <label for="bulan" class="control-label">Bulan <span class="required">*</span>
    </label>
    <div class="controls">
	<?php $options = array('' => 'Please Select','example_value1' => 'example option 1'); ?>
     
    <?php echo form_dropdown('bulan', $options, $this->input->post('bulan'))?>
    <?php echo form_error('bulan'); ?>
    </div>
    </div><div class="control-group">
    <label for="tahun" class="control-label">Tahun <span class="required">*</span></label>
    <div class='controls'>
    <input id="tahun" type="text" name="tahun" maxlength="4" value="<?php echo set_value('tahun'); ?>" />
    <?php echo form_error('tahun'); ?>
    </div>
    </div><div class="control-group">
    <label for="jenis_pajak" class="control-label">Jenis Pajak <span class="required">*</span>
    </label>
    <div class="controls"><?php $options = array('' => 'Please Select','example_value1' => 'example option 1'); ?>
     
    <?php echo form_dropdown('jenis_pajak', $options, $this->input->post('jenis_pajak'))?>
    <?php echo form_error('jenis_pajak'); ?>
    </div>
    </div><div class="control-group">
    <label for="jenis_setoran" class="control-label">Jenis Setoran <span class="required">*</span>
    </label>
    <div class="controls"><?php $options = array('' => 'Please Select','example_value1' => 'example option 1'); ?>
     
    <?php echo form_dropdown('jenis_setoran', $options, $this->input->post('jenis_setoran'))?>
    <?php echo form_error('jenis_setoran'); ?>
    </div>
    </div><div class="control-group">
    <label for="uraian" class="control-label">Uraian</label>
    <div class='controls'>
    <?php echo form_textarea( array( 'name' => 'uraian', 'rows' => '5', 'cols' => '80', 'value' => set_value('uraian') ) )?>
    <?php echo form_error('uraian'); ?>
    </div>
    </div>
    <div class="control-group">
    <label for="nilai" class="control-label">nilai <span class="required">*</span></label>
    <div class='controls'>
    <input id="nilai" type="text" name="nilai" value="<?php echo set_value('nilai'); ?>" />
    <?php echo form_error('nilai'); ?>
    </div>
    </div>
    <div class="control-group">
    <label></label>
    <div class='controls'>
    <?php echo form_submit( 'submit', 'Submit'); ?>
    </div>
    </div>
    <?php echo form_close(); ?></fieldset>