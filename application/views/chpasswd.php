		<!-- BEGIN PAGE -->
		<div class="page-content">			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
						UBAH PASSWORD
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="icon-home"></i>
							<?=anchor('', 'Home');?>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<?=anchor('profile', 'Profil Saya');?>
							<i class="icon-angle-right"></i>
						</li>						<li>
							Ubah Password
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
								<i class="icon-file"></i> Perubahan Kata Kunci
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
							<?=form_open('profile/chpasswd', $form_attributes);?>
								<div class="form-body">

									<div class="form-group">
										<label  class="col-md-3 control-label" for='password'>Password Sekarang</label>
										<div class="col-md-9">
											<?=form_input(array ('type' => 'password', 'class' => 'form-control', 'placeholder' => 'Password Sekarang', 'name' => 'password', 'id' => 'password'));?>
										</div>
									</div>
									<div class="form-group">
										<label  class="col-md-3 control-label" for='new_password'>Password Baru</label>
										<div class="col-md-9">
											<?=form_input(array ('type' => 'password', 'class' => 'form-control', 'placeholder' => 'Password Baru', 'name' => 'new_password', 'id' => 'new_password'));?>
										</div>
									</div>
									<div class="form-group">
										<label  class="col-md-3 control-label" for='conf_password'>Konfirmasi Password Baru</label>
										<div class="col-md-9">
											<?=form_input(array ('type' => 'password', 'class' => 'form-control', 'placeholder' => 'Konfirmasi Password Baru', 'name' => 'conf_password', 'id' => 'conf_password'));?>
										</div>
									</div>

								</div>
								
								<div class="form-actions fluid">
									<div class="col-md-offset-3 col-md-9">
										<button type="submit" class="btn green">Ubah Kata Kunci</button>
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
			$('#fullname').focus();


			$('#frmUpdate').submit(function(){
				$('#loading').show();
				$('#error, #success').hide();
				$.post($(this).attr('action'), $(this).serialize(), function(rtn){
					$('#loading').hide();
					if (rtn.code == 0)
					{
						$('#success').show();
						$("input[type='password']").val('');
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
