<?php		
		$id = $_POST['id'];
		$nama_aset = $_POST['nama_aset'];
		$merek = $_POST['merek'];
		$model = $_POST['model'];
		$id_tipe = $_POST['id_tipe'];
			
		if($_POST['oper']=='add')
		 {			
			mysql_query("INSERT INTO aset_baku (nama_aset,merek,model,id_tipe) 
			VALUES ('$nama_aset','$merek','$model','$id_tipe')") OR DIE (mysql_error());
		 }
		else if($_POST['oper']=='edit')
		 {
			$update = "UPDATE `aset_baku` 
				SET  `nama_aset` = '$nama_aset',
					merek = '$merek',
					model = '$model',
					id_tipe = '$id_tipe'
			WHERE `id` = $id;";
			mysql_query($update);
		 }
		else if($_POST['oper']=='del')
		 {
			mysql_query("DELETE FROM aset_baku WHERE id = $id") or die (mysql_error());
		 }
?>