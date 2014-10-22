<div class="container template_twocolumn">
	<!-- starting template two column kiri 4 kanan 8 
		available for 
			desktop medium width >= 992px
			desktop / tablet small width >= 768px
	-->
		<div class="row">
			
			<div class="col-md-2 col-sm-2 kolom1 bg-success">
				<?php if (! empty($menu) &&  is_array( $menu )): ?>
				<?php foreach($menu as $isi): ?>
					<?php $this->load->view("interface/menu_".$isi); ?>
				<?php endforeach; ?>
				<?php endif; ?>
			</div>
			
			<div class="col-md-10 col-sm-10 kolom2">
				<?php if (! empty($interface) &&  is_array( $interface )): ?>
				<?php foreach($interface as $isi): ?>
					<?php $this->load->view("interface/konten_".$isi); ?>
				<?php endforeach; ?>
				<?php endif; ?>
			</div>
			
		</div>
</div>