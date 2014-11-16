<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ssp_auto extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->authentication->protect();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('app_model');
	}
	
	public function index()
	{
		$game['judul'] = 'INPUT SSP';
		$game['kodeakun'] = $this->app_model->manualQuery('SELECT kd_akun FROM tbl_jp')->result();
		$game['kodejenis'] = $this->app_model->manualQuery('SELECT DISTINCT(kd_jenis) FROM tbl_jp')->result();
		$game['belanja'] = $this->app_model->getAllData('tbl_belanja')->result();
		$game['template'] = 'newfromadin';								#--- pilihan template. anda bisa pilih twocolumn / onecolumn
		$game['komponen_top'] = array('beginheader');						#--- Tambahkan html komponen di bagian paling atas halaman / sebelum template
		$game['komponen_bottom'] = array('beginfooter');
		$game['interface'] = array('form_ssp3');	
		$this->load->view('usetemplate',$game);
	}
	function cekpajak()
	{
		$belanjaid = $this->input->post('belanjaid');
		$nilai = $this->input->post('nilai');
		$npwp = $this->input->post('npwp');
		
		//BEGIN FUNGSI CEK PAJAK
		if ($npwp == ""):
			echo "NPWP tidak boleh kosong";
		elseif ($nilai == ""):
			echo "NILAI tidak boleh kosong";
		elseif ($belanjaid == ""):
			echo "Pilih jenis transaksi";
		else:
		
		$jpjoin = $this->app_model->manualQuery("
			SELECT * FROM tbl_jp jp
			INNER JOIN tbl_belanja b ON jp.jpid = b.jpid
			WHERE belanjaid = {$belanjaid}
		");
		$kode_akun = $jpjoin->row()->kd_akun;
		$kode_jenis = $jpjoin->row()->kd_jenis;
		$nama_jenis = $jpjoin->row()->nm_jenis;
		
		//CEK JENIS BELANJA
		if ($belanjaid == 1) //---> BELANJA BARANG
		{
			//CEK NILAI PAJAK
			if ($nilai < 1000000) 
			{
				$ppn = 0;
			}
			if ($nilai >= 1000000 && $nilai < 2000000) 
			{
				$ppn = 100/110 * $nilai * 0.1;
			}
			if ($nilai >= 2000000 ) 
			{
				$ppn = 100/110 * $nilai * 0.1;
				if($npwp == '20.025.203.9-411.000') // isi dengan NPWP dinas
				{
					$pph = $nilai * 0.03;
				}else{
					$pph = $nilai * 0.015;
				}
			}
			if($ppn>0) { echo "<a class='btn btn-info btn-sm'>PPN (411211-100)</a> "; }
			if(isset($pph)) { echo "<a class='btn btn-danger btn-sm'>PPh pasal 22 ({$kode_akun}-{$kode_jenis})</a>"; }
		}
		if ($belanjaid == 3) //---> JASA KONSTRUKSI
		{
			if ($nilai < 1000000) 
			{
				$ppn = 0;
			}
			if ($nilai >= 1000000) 
			{
				$ppn = 100/110 * $nilai * 0.1;
			}
			$pph = ($nilai - 0.1); // PPh 4 (2)
			if($ppn>0) { echo "<a class='btn btn-info btn-sm'>PPN (411211-100)</a> "; }
			if(isset($pph)) { echo "<a class='btn btn-danger btn-sm'>{$nama_jenis} ({$kode_akun}-{$kode_jenis})</a>"; }
		}
		if ($belanjaid == 4 || $belanjaid == 5) //---> JASA NON KONSTRUKSI
		{
			if ($nilai < 1000000) 
			{
				$ppn = 0;
			}
			if ($nilai >= 1000000) 
			{
				$ppn = 100/110 * $nilai * 0.1;
			}
			$pph = ($nilai - $ppn) * 0.02; // PPh 23
			if($ppn>0) { echo "<a class='btn btn-info btn-sm'>PPN (411211-100)</a> "; }
			if(isset($pph)) { echo "<a class='btn btn-danger btn-sm'>{$nama_jenis} ({$kode_akun}-{$kode_jenis})</a>"; }
		}
		/*if ($belanjaid == 5) //---> SEWA BARANG
		{
			ECHO "sedang dikerjakan";
		}*/	
		if ($belanjaid == 6) //---> SEWA GEDUNG / BANGUNAN
		{
			if ($nilai < 1000000) 
			{
				$ppn = 0;
			}
			if ($nilai >= 1000000) 
			{
				$ppn = 100/110 * $nilai * 0.1;
			}
			$pph = ($nilai - 0.1); // PPh 4 10%
			if($ppn>0) { echo "<a class='btn btn-info btn-sm'>PPN (411211-100)</a> "; }
			if(isset($pph)) { echo "<a class='btn btn-danger btn-sm'>{$nama_jenis} ({$kode_akun}-{$kode_jenis})</a>"; }
		}
		if ($belanjaid == 7) //---> JASA CATERING
		{
			$ppn =0;
			$pph = ($nilai - $ppn) * 0.02; // PPh 23
			if(isset($pph)) { echo "<a class='btn btn-danger btn-sm'>{$nama_jenis} ({$kode_akun}-{$kode_jenis})</a>"; }
		}
		if ($belanjaid == 8) //---> JASA RESTAURANT
		{
			$ppn =0;
			if ($nilai >= 2000000) 
			{
				$pph = ($nilai - $ppn) * 0.015; // PPh 23
			}
			if(isset($pph)) { echo "<a class='btn btn-danger btn-sm'>{$nama_jenis} ({$kode_akun}-{$kode_jenis})</a>"; }
		}
		
		endif;
	
	}
	
}
?>