<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wajibpajak extends CI_Controller {

	public function index()
	{
		$mode = $this->uri->segment(3);
		$game['masterdata'] = '';											#--- ACTIVATE Navbar Class="active". Just declare it with no value. sesuai dengan menu
		$game['template'] = 'twocolumn';								#--- pilihan template. anda bisa pilih twocolumn / onecolumn
		// $game['komponen_top'] = array('forcelogin','navbar');						#--- Tambahkan html komponen di bagian paling atas halaman / sebelum template
		// $game['menu'] = array('masterdata');									#--- Tambahkan interface menu di sidebar
		
		#------------------------------------------------------------------------------------------------------------
		#	Ambil data tambahan jika dibutuhkan dari database 
		#------------------------------------------------------------------------------------------------------------
		
	//	$jamwajib = $this->core_model->getAllData('m_jamwajib')->result();
		
		#------------------------------------------------------------------------------------------------------------
		#	jQGrid variable dimulai dari sini 							KETERANGAN
		#------------------------------------------------------------------------------------------------------------
		
		$game['interface'] = array('grid','datepicker_jqui');								#--- Tambahkan interface grid di template kolom 2
		$game['jqgrid'] = 'table_interface_jqgrid';						#--- meload javascript jqgrid interface
		$game['table'] = 'tbl_wp';										#--- mendefinisikan nama table yang dipanggil ke jqgrid
		$game['kolom'] = $this->_getkolom($game['table']);				#--- memanggil private fungsi _getkolom. lihat fungsi _getkolom utk ket lebih lanjut
		$game['jqgrid_at_name'] = array(								#--- mendefinisikan nama kolom pada jqgrid
				$game['kolom'][1] => 'ID',								#    didefnikan  berdasarkan urutan kolom 
				$game['kolom'][2] => 'NAMA',						
				$game['kolom'][3] => 'THN MASUK',						#    misalkan kolom[1] namanya ID, kolom[2] namanya Nama, dst
				$game['kolom'][4] => 'JENKEL',						
									
		);																
		$game['jqgrid_at'] = array(										#--- mendefinisikan attribut kolom pada jqgrid
			$game['kolom'][1] => 'hidden:false,width:30',				#    didefnikan  berdasarkan urutan kolom 
			$game['kolom'][2] => 'editable:true,width:250',						#    misalkan kolom[1] attributnua hidden:false, kolom[2] attributnya width:100, dst
			$game['kolom'][4] => 'editable:true,width:50',
		);
		$game['jqgrid_at'][$game['kolom'][3]] = 'editable:true,width:100,';		#--- mendefinisikan attribut kolom diluar format array default
		$game['jqgrid_at'][$game['kolom'][3]] .= "editoptions: { dataInit: function (elem) { $(elem).datepicker({";
		$game['jqgrid_at'][$game['kolom'][3]] .= "dateFormat: 'yy-mm-01', changeMonth: true, changeYear: true, onClose: function() {";
        $game['jqgrid_at'][$game['kolom'][3]] .= "var iMonth = $('#ui-datepicker-div .ui-datepicker-month :selected').val();";
        $game['jqgrid_at'][$game['kolom'][3]] .= "var iYear = $('#ui-datepicker-div .ui-datepicker-year :selected').val();";
        $game['jqgrid_at'][$game['kolom'][3]] .= "$(this).datepicker('setDate', new Date(iYear, iMonth, 1));";
		$game['jqgrid_at'][$game['kolom'][3]] .= "}, showButtonPanel: true,beforeShow: function() {
		if ((selDate = $(this).val()).length > 0) 
		{
		iYear = selDate.substring(0,4);
		iMonth = selDate.substring(7,5)-1;
		$(this).datepicker('option', 'defaultDate', new Date(iYear, iMonth, 1));
		$(this).datepicker('setDate', new Date(iYear, iMonth, 1));
		}
		},";
		$game['jqgrid_at'][$game['kolom'][3]] .= "}); } }";
		
		/*
		$game['jqgrid_at'][$game['kolom'][8]] = 'editable:true,edittype:"select",width:80,';		#--- mendefinisikan attribut kolom diluar format array default
		$game['jqgrid_at'][$game['kolom'][8]] .= "editoptions: { value: '";				#	 berfungsi mendefinisikan attribut yang lebih kompleks seperti
			foreach($jamwajib as $rows) {												#	 option dropdown di dalam field jqgrid yang mengharuskan pengambilan 
		$game['jqgrid_at'][$game['kolom'][8]] .= $rows->idid .':'. $rows->jam_wajib .';';#	 data dari database
			}
		$game['jqgrid_at'][$game['kolom'][8]] .= "'},";
		*/
		
		$game['button_nav'] = array(									#--- Tambahkan tombol perintah di jqgrid
			'add' => true,												#    tersedia tombol add, reload, cari dan delete
			'reload' => true,											#    cara mengaktifkannya dengan memberi nilai TRUE pada key variabel array
			'delete' => true,
			'cari' => true,
		);
		$game['join'] = array(											  #--- mengaktifkan fungsi join table di jqgird
			'id_golongan'	=> array( 'm_golongan-idid'	=>	'golongan' ), #	contoh :
			'id_lembaga'	=> array( 'm_lembaga-idid'	=>	'lembaga' ),  #	'id_lembaga'	=> array( 'm_lembaga-idid'			=>	'desc' ),
			'id_status'		=> array( 'm_status-idid'	=>	'status' ),  #	'id_lembaga'	=> array( 'm_lembaga-idid'			=>	'desc' ),
			'id_jamwajib'	=> array( 'm_jamwajib-idid'	=>	'jam_wajib' ),  #	'id_lembaga'	=> array( 'm_lembaga-idid'			=>	'desc' ),
		);																  #	 ^ Sbg Foreign Key			^ Nama table-Primary Key	 ^ Kolom yg ingin diambil valuenya
		$game['gridsubgrid'] = array(
			//'table' => 'i_keluarga',
			//'kolom' => $this->_getkolom('i_keluarga'),
		);
		#----------------------------------------------------------------------------------------------------------------------------
		# load variabel into url untuk menghasilkan jqgird
		#----------------------------------------------------------------------------------------------------------------------------
		# ada tiga jenis load url :
		# 1. Dengan variabel $mode == ""
		# 	 memanggil file index yang di dalamnya terdapat script table_interface_jqgrid yang berada di view/jqgrid
		#	 menampilkan interface jqgrid
		# 2. Dengan variabel $mode == "load"
		#	 memanggil file table_load_jqgrid di view/jqgrid
		#	 fungsi : meload data jqgrid dari server
		# 3. Dengan variabel $mode == "update"
		#	 memanggil file table_update_jqgrid di view/jqgrid
		#	 fungsi : mengupdate data jqgrid ke server
		
		if ( empty ( $mode ) ):
			$this->load->view('usetemplate',$game);
		endif;
		if ( $mode == 'load' ):
			$this->load->view('jqgrid/table_load_jqgrid',$game);
		endif;
		if ( $mode == 'update' ):
			$this->load->view('jqgrid/table_update_jqgrid',$game);
		endif;
		if ( $mode == 'subgrid' ):
			$this->load->view('jqgrid/table_subgrid',$game);
		endif;
	}
	
	# Fungsi pRIVATE ambil nama kolom dari table
	private function _getkolom($table)
	{
		$i=0;
		$fields = $this->db->list_fields($table);
		foreach ($fields as $field){$i++;$kolom[$i] = $field;}
		return $game['kolom'] = $kolom;
	}
}

/* End of file dataguru.php */
/* Location: ./application/controllers/dataguru.php */