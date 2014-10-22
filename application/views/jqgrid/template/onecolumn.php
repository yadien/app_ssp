<div class="container template_twocolumn" id="container-primary" >
	<!-- starting template one column 10 Grid with 1 left and 1 right 
		available for 
			desktop medium width >= 992px
			desktop / tablet small width >= 768px
	-->
		<div class="row">
			<div class="col-xs-12 col-md-12 col-sm-12 kolom1">
				<?php if (! empty($interface) &&  is_array( $interface )): ?>
				<?php foreach($interface as $isi): ?>
					<?php $this->load->view("interface/konten_".$isi); ?>
				<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
</div>