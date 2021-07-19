<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Produk extends CI_Controller
{
	
	public function __construct()
	{
		parent:: __construct();
		$this->load->model("M_produk");
		$this->load->model("M_informasi");
		$this->load->model("M_user");
		$this->load->library("form_validation");
		if(!$this->M_user->isLogin())
		{
			redirect('user/login');
		}
	}

	public function validate_image()
	{
		$check = TRUE;
		    if ((!isset($_FILES['foto'])) || $_FILES['foto']['size'] == 0) {
		        $this->form_validation->set_message('validate_image', 'The {field} field is required');
		        $check = FALSE;
		    }
		    else if (isset($_FILES['foto']) && $_FILES['foto']['size'] != 0) {
		        $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
		        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
		        $extension = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
		        $detectedType = exif_imagetype($_FILES['foto']['tmp_name']);
		        $type = $_FILES['foto']['type'];
		        if (!in_array($detectedType, $allowedTypes)) {
		            $this->form_validation->set_message('validate_image', 'Invalid Image Content!');
		            $check = FALSE;
		        }
		        if(filesize($_FILES['foto']['tmp_name']) > 2000000) {
		            $this->form_validation->set_message('validate_image', 'The Image file size shoud not exceed 20MB!');
		            $check = FALSE;
		        }
		        if(!in_array($extension, $allowedExts)) {
		            $this->form_validation->set_message('validate_image', "Invalid file extension {$extension}");
		            $check = FALSE;
		        }
		    }
		    return $check;
	}

	public function validate_name($str)
	{
		if (!preg_match("/^[a-zA-Z\sg\'\.]*$/", $str)) {
			$this->form_validation->set_message('validate_name', 'Silahkan isi baris %s dengan menggunakan huruf saja.');
            return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function ac()
	{
		$this->load->view("produk/ac/index");
	}

	public function data_ac()
	{
		$data = $this->M_produk->getAll("ac");
		echo json_encode($data);
	}

	public function ac_tambah()
	{
		$produk = $this->M_produk;
		$validation = $this->form_validation;
		$validation->set_rules($produk->rules());
		if($validation->run())
		{
			$respon = $produk->insert("ac");
			if($respon == 1)
			{
				redirect('produk/ac');
			}
			else
			{
				$this->session->set_flashdata('respon',"Akta cerai sudah pernah diambil");
			}
		}
		$this->load->view("produk/ac/tambah");
	}

	public function cek_data_perkara_gugatan_ac()
	{
		$data_perkara = $this->M_produk->cek_data_perkara_gugatan_ac();
		echo json_encode($data_perkara);
	}

	public function ac_ubah($id)
	{
		if(!isset($id))
		{
			redirect('produk/ac');
		}
		else
		{
			$produk = $this->M_produk;
			$validation = $this->form_validation;
			$validation->set_rules($produk->rules());
			if($validation->run())
			{
				$respon = $produk->update("ac", $id);
				if($respon == 1)
				{
					$this->session->set_flashdata('success', 'Data berhasil diubah');
				}
				else
				{
					$this->session->set_flashdata('success', 'Data gagal diubah');
				}
				redirect('produk/ac');
			}
			$data['data_ac'] = $produk->getById($id);
			if(!$data['data_ac'])
			{
				$this->session->set_flashdata('success', 'Data yang anda cari tidak ada');
				redirect("produk/ac");
			}
			else
			{
				$this->load->view("produk/ac/ubah", $data);
			}
		}
	}

	public function ac_hapus($id)
	{
		if($this->M_produk->delete("ac", $id))
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}

	public function putusan()
	{
		$this->load->view("produk/putusan/index");
	}

	public function data_putusan()
	{
		$data = $this->M_produk->getAll("putusan");
		echo json_encode($data);
	}

	public function putusan_tambah()
	{
		$produk = $this->M_produk;
		$validation = $this->form_validation;
		$validation->set_rules($produk->rules());
		if($validation->run())
		{
			$respon = $produk->insert("putusan");
			if($respon == 1)
			{
				redirect('produk/putusan');
			}
		}
		$this->load->view("produk/putusan/tambah");
	}

	public function cek_data_perkara_gugatan_putusan()
	{
		$data_perkara = $this->M_produk->cek_data_perkara_gugatan_putusan();
		echo json_encode($data_perkara);
	}

	public function putusan_ubah($id)
	{
		if(!isset($id))
		{
			redirect('produk/putusan');
		}
		else
		{
			$produk = $this->M_produk;
			$validation = $this->form_validation;
			$validation->set_rules($produk->rules());
			if($validation->run())
			{
				$respon = $produk->update("putusan", $id);
				if($respon == 1)
				{
					$this->session->set_flashdata('success', 'Data berhasil diubah');
				}
				else
				{
					$this->session->set_flashdata('success', 'Data gagal diubah');
				}
				redirect('produk/putusan');
			}
			$data['data_putusan'] = $produk->getById($id);
			if(!$data['data_putusan'])
			{
				$this->session->set_flashdata('success', 'Data yang anda cari tidak ada');
				redirect("produk/putusan");
			}
			else
			{
				$this->load->view("produk/putusan/ubah", $data);
			}
		}
	}

	public function putusan_hapus($id)
	{
		if($this->M_produk->delete("putusan", $id))
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}

	public function penetapan()
	{
		$this->load->view("produk/penetapan/index");
	}

	public function data_penetapan()
	{
		$data = $this->M_produk->getAll("penetapan");
		echo json_encode($data);
	}

	public function penetapan_tambah()
	{
		$produk = $this->M_produk;
		$validation = $this->form_validation;
		$validation->set_rules($produk->rules());
		if($validation->run())
		{
			$respon = $produk->insert("penetapan");
			if($respon == 1)
			{
				redirect('produk/penetapan');
			}
		}
		$this->load->view("produk/penetapan/tambah");
	}

	public function cek_data_perkara_penetapan()
	{
		$data_perkara = $this->M_produk->cek_data_perkara_penetapan();
		echo json_encode($data_perkara);
	}

	public function penetapan_ubah($id)
	{
		
		if(!isset($id))
		{
			redirect('produk/penetapan');
		}
		else
		{
			$produk = $this->M_produk;
			$validation = $this->form_validation;
			$validation->set_rules($produk->rules());
			if($validation->run())
			{
				$respon = $produk->update("penetapan", $id);
				if($respon == 1)
				{
					$this->session->set_flashdata('success', 'Data berhasil diubah');
				}
				else
				{
					$this->session->set_flashdata('success', 'Data gagal diubah');
				}
				redirect('produk/penetapan');
			}
			
			$data['data_penetapan'] = $produk->getById($id);
			if(!$data['data_penetapan'])
			{
				$this->session->set_flashdata('success', 'Data yang anda cari tidak ada');
				redirect("produk/penetapan");
			}
			else
			{
				$this->load->view("produk/penetapan/ubah", $data);
			}
		}
	}

	public function penetapan_hapus($id)
	{
		if($this->M_produk->delete("penetapan", $id))
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}

	public function statistik()
	{
		$data['informasi'] = $this->M_informasi->getStatistik();
		$data['ac'] = $this->M_produk->getStatistik('ac');
		$data['putusan'] = $this->M_produk->getStatistik('putusan');
		$data['penetapan'] = $this->M_produk->getStatistik('penetapan');
		echo json_encode($data);
	}

	public function isi_sembarang()
	{
		echo json_encode($this->M_produk->isi_sembarang());
	}

}

 ?>