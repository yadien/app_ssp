<?php
class Ssp_post extends CI_Controller {
	private $custom_errors = array();
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('app_model');
	}	
	function index()
	{			
		$this->form_validation->set_rules('bulan', 'Bulan', 'required|max_length[255]');			
		$this->form_validation->set_rules('tahun', 'Tahun', 'required|is_numeric|max_length[4]');			
		$this->form_validation->set_rules('jenis_pajak', 'Jenis Pajak', 'required|is_numeric|max_length[6]');			
		$this->form_validation->set_rules('jenis_setoran', 'Jenis Setoran', 'required|is_numeric|max_length[3]');			
		$this->form_validation->set_rules('uraian', 'Uraian', '');			
		$this->form_validation->set_rules('nilai', 'nilai', 'required|is_numeric');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			// $this->load->view("komponen/beginheader");
			// $this->load->view('form_ssp_post');
			// $this->load->view("komponen/beginfooter");
			$game['template'] = 'newfromadin';								#--- pilihan template. anda bisa pilih twocolumn / onecolumn
		$game['komponen_top'] = array('beginheader');						#--- Tambahkan html komponen di bagian paling atas halaman / sebelum template
		$game['komponen_bottom'] = array('beginfooter');
		$game['interface'] = array('form_ssp');	
			$this->load->view('usetemplate',$game);
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'bulan' => @$this->input->post('bulan'),
					       	'tahun' => @$this->input->post('tahun'),
					       	'jenis_pajak' => @$this->input->post('jenis_pajak'),
					       	'jenis_setoran' => @$this->input->post('jenis_setoran'),
					       	'uraian' => @$this->input->post('uraian'),
					       	'nilai' => @$this->input->post('nilai')
						);
					
			// run insert model to write data to db
		
			if ($this->app_model->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('ssp_post/success');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}
	public  function check_file($field,$field_value)
	{
		if(isset($this->custom_errors[$field_value]))
		{
			$this->form_validation->set_message('check_file', $this->custom_errors[$field_value]);
			unset($this->custom_errors[$field_value]);
			return FALSE;
		}
		return TRUE;
	}
	function upload_file($config,$fieldname)
	{
		$this->load->library('upload');
		$this->upload->initialize($config);
		$this->upload->do_upload($fieldname);
		$error = $this->upload->display_errors();
		if(empty($error))
		{
			$data = $this->upload->data();
			$this->$fieldname = $data['file_name'];
		}
		else
		{
			$this->custom_errors[$fieldname] = $error;
		}
	}
	
	function success()
	{
		$this->load->view("komponen/beginheader");
		$this->load->view("interface/success");
		$this->load->view("komponen/beginfooter");
	}
}
?>