<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('ssp', $attributes); ?>

<p>
        <label for="tahun">tahun <span class="required">*</span></label>
        <?php echo form_error('tahun'); ?>
        <br /><input id="tahun" type="text" name="tahun" maxlength="4" value="<?php echo set_value('tahun'); ?>"  />
</p>

<p>
        <label for="bulan">bulan <span class="required">*</span></label>
        <?php echo form_error('bulan'); ?>
        
        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(
                                                  ''  => 'Please Select',
                                                  'example_value1'    => 'example option 1'
                                                ); ?>

        <br /><?php echo form_dropdown('bulan', $options, set_value('bulan'))?>
</p>                                             
                        
<p>
        <label for="jenispajak">jenispajak <span class="required">*</span></label>
        <?php echo form_error('jenispajak'); ?>
        
        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(
                                                  ''  => 'Please Select',
                                                  'example_value1'    => 'example option 1'
                                                ); ?>

        <br /><?php echo form_dropdown('jenispajak', $options, set_value('jenispajak'))?>
</p>                                             
                        
<p>
        <label for="jenissetoran">jenissetoran <span class="required">*</span></label>
        <?php echo form_error('jenissetoran'); ?>
        
        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(
                                                  ''  => 'Please Select',
                                                  'example_value1'    => 'example option 1'
                                                ); ?>

        <br /><?php echo form_dropdown('jenissetoran', $options, set_value('jenissetoran'))?>
</p>                                             
                        
<p>
        <label for="jumlah">jumlah <span class="required">*</span></label>
        <?php echo form_error('jumlah'); ?>
        <br /><input id="jumlah" type="text" name="jumlah" maxlength="255" value="<?php echo set_value('jumlah'); ?>"  />
</p>


<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>

<?php echo form_close(); ?>