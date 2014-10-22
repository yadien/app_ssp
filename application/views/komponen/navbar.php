<?php 
$akses = $this->core_model->getSelectedData('i_user',array('idid'=>$this->session->userdata('userid')))->row()->akses;
?>
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><code>{Penggajian.app}</code></a>
    </div>

    <!-- Collect the nav links, forms, other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <a class="btn <?php ((isset($landing)) ? print 'btn-success' : print 'btn-default') ?> navbar-btn" href="<?=base_url()?>landing.xhtml"><?=showicon('star')?> Landing</a>
	  <?php if ($akses == 'bendahara') : ?>
	  <a class="btn <?php ((isset($masterdata)) ? print 'btn-success' : print 'btn-default') ?> navbar-btn" href="<?=base_url()?>dataguru.xhtml"><?=showicon('briefcase')?> Master Data</a>
	  <a data-container="body" data-toggle="popover" data-placement="bottom" data-content="
	  <a class='btn btn-small btn-info' href='<?=base_url()?>olahgaji/index/_/2.xhtml'>Guru Putra</a>
	  <a class='btn btn-small btn-info' href='<?=base_url()?>olahgaji/index/_/3.xhtml'>Guru Putri</a>
	  <a class='btn btn-small btn-info' href='<?=base_url()?>olahgaji/index/_/1.xhtml'>Yayasan</a>
	  <a class='btn btn-small btn-info' href='<?=base_url()?>olahgaji/index/_/6.xhtml'>Dapur</a>
	  <a class='btn btn-small btn-info' href='<?=base_url()?>olahgaji/index/_/7.xhtml'>Cuci</a>
	  " data-html="true" class="btn <?php ((isset($olahgaji)) ? print 'btn-success' : print 'btn-default') ?> navbar-btn" id="menuolahgaji"><?=showicon('time')?> Olah Gaji</a>
	  <a class="btn btn-<?php ((isset($rekapgaji)) ? print 'success' : print 'default') ?> navbar-btn" href="<?=base_url()?>rekapgaji.xhtml"><?=showicon('list-alt')?> Rekap Gaji</a>
	  <a class="btn btn-<?php ((isset($printslip)) ? print 'success' : print 'default') ?> navbar-btn" href="<?=base_url()?>printslip.xhtml"><?=showicon('print')?> Print Slip</a>
	  
	  <?php endif; ?>
	  <?php if ($akses == 'guru') : ?>
	  <a class="btn btn-<?php ((isset($lihatslip)) ? print 'success' : print 'default') ?> navbar-btn" href="<?=base_url()?>lihatslip.xhtml"><?=showicon('zoom-in')?> Lihat Slip</a>
	  <?php endif; ?>
	  <?php if ($akses == 'admtu') : ?>
	  <a class="btn btn-<?php ((isset($inputabsen)) ? print 'success' : print 'default') ?> navbar-btn" href="<?=base_url()?>olahgaji/index/_/<?=$this->session->userdata('user_lembaga')?>.xhtml"><?=showicon('pencil')?> Input Absen</a>
	  <?php endif; ?>
	  <a class="btn btn-danger navbar-btn navbar-right" href="<?=base_url()?>landing/logout.xhtml"><?=showicon('off')?> Logout</a>
	  <span class="navbar-btn navbar-right">&nbsp;</span>
	  <a class="btn btn-warning navbar-btn navbar-right" data-toggle="modal" data-target="#change_password"><?=showicon('wrench')?> Change Password</a>
	  <span class="navbar-btn navbar-right">&nbsp;</span>
	  <?php if ($akses == 'bendahara') : ?>
	  <!--<a class="btn btn-warning navbar-btn navbar-right" href="<?=base_url()?>reg.xhtml"><?=showicon('user')?> Register</a>-->
	  <span class="navbar-btn navbar-right">&nbsp;</span>
	  <?php endif; ?>
	  <div class="navbar-btn navbar-right"><code>Sebagai
		<?=$this->core_model->getSelectedData('i_user',array('idid'=>$this->session->userdata('userid')))->row()->username?> (<?=$akses?>)
	  </code></div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Ganti Password</h4>
      </div>
      <div class="modal-body">
		  <div class="form-group">
			<label for="passwordlama">Password Lama </label>
			<input type="password" class="form-control" id="passwordlama" placeholder="Password Lama">
			<div id="msg_error"></div>
		  </div>
		  <div class="form-group" id="passwordbarugroup">
			<label for="passwordbaru">Password Baru </label>
			<input type="password" class="form-control" id="passwordbaru" placeholder="Password Baru">
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save_password_baru">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
	$( '#save_password_baru' ).hide();
	$( '#passwordbarugroup' ).hide();
	$( '#passwordlama' ).keyup(function(){
		var userid = <?=$this->session->userdata('userid')?>;
		var passwordlama = $( '#passwordlama' ).val();
		if (passwordlama != '') {
			$.ajax({
				url: '<?=base_url()?>ajax/cek_password/'+userid+'/'+passwordlama, cache: false,
				success: function(msg){
					// alert('sukses!');
					if (msg=='{}') {
						$('#msg_error').html("<span class='text-danger'>Password tidak cocok!</span>");
						$( '#passwordbarugroup' ).hide();
						$( '#save_password_baru' ).hide();
					}else{
						$( '#passwordbarugroup' ).show();
						$( '#save_password_baru' ).show();
						$('#msg_error').html("<span class='text-success'>OK! Masukkan password baru</span>");
					}
				}
			});
		}
	});
	$( '#save_password_baru' ).click(function(){
		var userid = <?=$this->session->userdata('userid')?>;
		var passwordbaru = $( '#passwordbaru' ).val();
		$.ajax({
			url:'<?=base_url()?>ajax/change_password/'+userid+'/'+passwordbaru,cache:false,
			success:function(msg){
				alert(msg);
				$( '#change_password' ).modal('hide');
			}
		})
	});
</script>