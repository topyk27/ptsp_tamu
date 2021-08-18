<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Pendaftaran extends CI_Controller
{
	
	public function __construct()
	{
		parent:: __construct();
		$this->load->model("M_pendaftaran");
		$this->load->model("M_user");
		$this->load->library("form_validation");
		if(!$this->M_user->isLogin())
		{
			redirect('user/login');
		}
	}

	public function isiRandom($min,$max,$jenis,$tahun)
	{
		$this->M_pendaftaran->isiRandom($min,$max,$jenis,$tahun);
		redirect("pendaftaran");
	}

	public function index()
	{
		$this->load->view("pendaftaran/index");
	}

	public function tambah()
	{
		$pendaftaran = $this->M_pendaftaran;
		$validation = $this->form_validation;
		$validation->set_rules($pendaftaran->rules());
		if($validation->run())
		{
			$respon = $pendaftaran->insert();
			if($respon == 1)
			{
				$this->session->set_flashdata('respon',"Data berhasil disimpan");
				redirect("pendaftaran");
			}
			else if($respon == false)
			{
				$this->session->set_flashdata('respon',"Mohon mengambil foto");
				redirect("pendaftaran/tambah");
			}
			else
			{
				$this->session->set_flashdata('respon',"Ada kesalahan, mohon periksa nomor perkara apakah sudah terdaftar atau belum");
				redirect("pendaftaran/tambah");
			}
		}
		$this->load->view("pendaftaran/tambah");
	}

	public function cek_data_perkara()
	{
		$data = $this->M_pendaftaran->cek_data_perkara();
		echo json_encode($data);
	}

	public function data_pendaftaran()
	{
		$data = $this->M_pendaftaran->getAll();
		echo json_encode($data);
	}

	public function ubah($id)
	{
		if(!isset($id))
		{
			redirect('pendaftaran');
		}
		else
		{
			$pendaftaran = $this->M_pendaftaran;
			$validation = $this->form_validation;
			$validation->set_rules($pendaftaran->update_rules());
			if($validation->run())
			{
				$respon = $pendaftaran->update($id);
				if($respon=="ok")
				{
					$this->session->set_flashdata('success', 'Data berhasil diubah');
					redirect("pendaftaran");
				}
				else if($respon=="tidak ada foto")
				{
					$this->session->set_flashdata('respon',"Mohon mengambil foto");
					redirect("pendaftaran/ubah/".$id);
				}
				else
				{
					$this->session->set_flashdata('success', 'Data gagal diubah');
					redirect("pendaftaran/ubah/".$id);
				}
			}
			$data['data_pendaftaran'] = $pendaftaran->getById($id);
			if(!$data['data_pendaftaran'])
			{
				$this->session->set_flashdata('success', 'Data yang anda cari tidak ada');
				redirect("pendaftaran");
			}
			else
			{
				$this->load->view("pendaftaran/ubah", $data);
			}
		}
	}

	public function hapus($id)
	{
		if($this->M_pendaftaran->delete($id))
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}

	public function sinkron()
	{
		$this->load->view("pendaftaran/sinkron");
	}

	public function data($tahun,$bulan)
	{
		$data['perkara'] = $this->M_pendaftaran->getDataPerkara($tahun,$bulan);
		$this->load->view("pendaftaran/proses_sinkron",$data);
	}

	public function proses_sinkron()
	{
		$respon = $this->M_pendaftaran->proses_sinkron();
		echo json_encode($respon);
	}
}
 ?>