		<script>
			window.onunload = refreshParent;
			function refreshParent() {
				window.opener.location.reload();
				
			}
		</script>
		
		<table border=1 width="480" class="table table-condensed">
			<tr class="info">
				<td>NPWP</td>
				<td>Nama</td>
				<td>*</td>
			</tr>
			<tr>
			<?php if($browsenpwp->num_rows()==0): ?>
				<td colspan=3>Belum ada data</td>
			<?php else: ?>
			<?php foreach($browsenpwp->result() as $row): ?>
				<td><?=$row->npwp?></td>
				<td><?=$row->nama?></td>
				<td><a data-id="<?=$row->wpid?>" class="btn btn-sm btn-info pilih">pilih</a></td>
			<?php endforeach; ?>
			<?php endif; ?>
			</tr>
		</table>
		<link href="<?=base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<script src="<?=base_url();?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
		<script>
			$('.pilih').click(function(){
				var pilihan = $(this).data("id");
				$.ajax({
				type: "POST",
				url: "<?=base_url()?>index.php/ssp_post/pilih_npwp",
				data: { pilihan: pilihan }
				})
				.done(function( msg ) {
					window.close();
				});
			});
		</script>