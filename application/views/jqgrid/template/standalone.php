<div class="template_standalone">
	<!-- starting template one column 10 Grid with 1 left and 1 right 
		available for 
			desktop medium width >= 992px
			desktop / tablet small width >= 768px
	-->
				<?php if (! empty($interface) &&  is_array( $interface )): ?>
				<?php foreach($interface as $isi): ?>
					<?php $this->load->view("interface/konten_".$isi); ?>
				<?php endforeach; ?>
				<?php endif; ?>
</div>