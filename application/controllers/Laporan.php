<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Laporan extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_informasi");
		$this->load->model("M_produk");
		$this->load->model("M_setting");
		$this->load->model("M_user");
		$this->load->library('form_validation');
		if(!$this->M_user->isLogin())
		{
			redirect('user/login');
		}
	}

	public function nama_bulan($bulan)
	{
		$bln;
		switch ($bulan) {
			case 01 :
			case 1 :
				$bln = 'Januari';
				break;
			case 02 :
			case 2 :
				$bln = 'Februari';
				break;
			case 03 :
			case 3 :
				$bln = 'Maret';
				break;
			case 04 :
			case 4 :
				$bln = 'April';
				break;
			case 05 :
			case 5 :
				$bln = 'Mei';
				break;
			case 06 :
			case 6 :
				$bln = 'Juni';
				break;
			case 07 :
			case 7 :
				$bln = 'Juli';
				break;
			case 08 :
			case 8 :
				$bln = 'Agustus';
				break;
			case 09 :
			case 9 :
				$bln = 'September';
				break;
			case 10:
				$bln = 'Oktober';
				break;
			case 11:
				$bln = 'November';
				break;
			case 12:
				$bln = 'Desember';
				break;
			default :
				$bln = 'Bodoh';
				break;
		}
		return $bln;
	}

	public function informasi()
	{
		
		$this->load->view('laporan/informasi');
	}

	public function data_laporan_informasi()
	{
		$data = $this->M_informasi->getAll();
		echo json_encode($data);
	}

	public function cetak_laporan_informasi($bulan,$tahun)
	{
		$data['laporan'] = $this->M_informasi->cetak($bulan,$tahun);
		$bln = $this->nama_bulan($bulan);
		$data['bulan'] = $bln;
		$data['tahun'] = $tahun;
		$data['now'] = date('d')." ".$this->nama_bulan(date('m'))." ".date('Y');
		$data['ttd'] = $this->M_setting->ttd();
		$this->load->view('laporan/informasi_cetak',$data);
	}

	public function data_laporan_filter_informasi()
	{
		$data = $this->M_informasi->getByDate();
		echo json_encode($data);
	}

	public function ac()
	{
		
		$this->load->view('laporan/akta');
	}

	public function putusan()
	{
		
		$this->load->view('laporan/putusan');
	}

	public function penetapan()
	{
		
		$this->load->view('laporan/penetapan');
	}

	public function data_laporan($pengambilan)
	{
		$data = $this->M_produk->data_laporan($pengambilan);
		echo json_encode($data);
	}

	public function cetak_laporan($pengambilan,$bulan,$tahun)
	{
		$data['laporan'] = $this->M_produk->cetak($pengambilan,$bulan,$tahun);
		$bln = $this->nama_bulan($bulan);
		$data['bulan'] = $bln;
		$data['tahun'] = $tahun;
		$data['now'] = date('d')." ".$this->nama_bulan(date('m'))." ".date('Y');
		$data['ttd'] = $this->M_setting->ttd();
		switch ($pengambilan) {
			case 'ac':
				$this->load->view('laporan/akta_cetak',$data);
				break;
			
			case 'putusan':
				$this->load->view('laporan/putusan_cetak',$data);
				break;
			case 'penetapan':
				$this->load->view('laporan/penetapan_cetak',$data);
				break;
		}
	}

	public function data_laporan_filter($pengambilan)
	{
		$data = $this->M_produk->getByDate($pengambilan);
		echo json_encode($data);
	}
}

 ?>