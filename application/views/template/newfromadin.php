<div class="clearfix"></div>
	<!-- BEGIN CONTAINER -->   
	<div class="page-container" >
		<!-- BEGIN EMPTY PAGE SIDEBAR -->
		<div class="page-sidebar navbar-collapse collapse">
			<ul class="page-sidebar-menu visible-sm visible-xs">
				<li>
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<form class="sidebar-search" action="extra_search.html" method="POST">
						<div class="form-container">
							<div class="input-box">
								<a href="javascript:;" class="remove"></a>
								<input type="text" placeholder="Search..."/>
								<input type="button" class="submit" value=" "/>
							</div>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li>
					<a class="active" href="index.html">
					Dashboard                        
					</a>
				</li>
			</ul>
		</div>
		<!-- END EMPTY PAGE SIDEBAR -->
		<?php if (! empty($interface) &&  is_array( $interface )): ?>
				<?php foreach($interface as $isi): ?>
					<?php $this->load->view("interface/konten_".$isi); ?>
				<?php endforeach; ?>
				<?php endif; ?>
		
	</div>
	<!-- END CONTAINER -->