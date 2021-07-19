<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Informasi extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_informasi");
		$this->load->model("M_user");
		$this->load->library('form_validation');
		if(!$this->M_user->isLogin())
		{
			redirect('user/login');
		}
		// else if($this->session->userdata('layanan_id') != 1 OR $this->session->userdata('layanan_id') !=2)
		// {
		// 	redirect('error_cuy');
		// }
	}

	public function index()
	{
		// $data['data_informasi'] = $this->M_informasi->getAll();
		// $this->load->view("informasi/index", $data);
		$this->load->view("informasi/index");
	}

	public function data_informasi()
	{
		$data = $this->M_informasi->getAll();
		echo json_encode($data);
	}

	public function tambah()
	{
		$informasi = $this->M_informasi;
		$validation = $this->form_validation;
		$validation->set_rules($informasi->rules());
		if ($validation->run()) {
			$respon = $informasi->insert();
			if($respon == 1)
			{
				redirect("informasi");
			}
		}
		$this->load->view("informasi/tambah");
	}

	public function ubah($id)
	{
		if(!isset($id))
		{
			redirect('informasi');
		}
		else
		{
			$informasi = $this->M_informasi;
			$validation = $this->form_validation;
			$validation->set_rules($informasi->rules());
			if($validation->run())
			{
				$respon = $informasi->update($id);
				if($respon == 1)
				{
					$this->session->set_flashdata('success', 'Data berhasil diubah');
				}
				else
				{
					$this->session->set_flashdata('success', 'Data gagal diubah');
				}
				redirect('informasi');
			}
			$data['data_informasi'] = $informasi->getById($id);
			// if(empty($data['data_informasi']->tanggal))
			// {
			// 	echo "kosong";
			// }
			// else
			// {
			// 	echo "tidak kosong";
			// 	// echo $data['data_informasi']->;
			// }
			if(!$data['data_informasi'])
			{
				$this->session->set_flashdata('success', 'Data yang anda cari tidak ada');
				redirect("informasi");
			}
			else
			{
				$this->load->view("informasi/ubah", $data);
			}
		}
	}

	public function hapus($id)
	{
		if($this->M_informasi->delete($id))
		{
			// $this->session->set_flashdata('success','Data berhasil dihapus.');
			echo "1";
		}
		else
		{
			// $this->session->set_flashdata('success','Gagal menghapus data, silahkan coba lagi.');
			echo "0";
		}
	}
	
}

 ?>