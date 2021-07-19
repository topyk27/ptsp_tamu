<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Makassar');
/**
 * 
 */
class M_produk extends CI_Model
{
	
	private $table = "produk";
	public $id;
	public $nama;
	public $no_perkara;
	public $no_ac;
	public $pihak;
	public $no_hp;
	public $tanggal;
	public $foto;
	public $pengambilan;
	public $dibuat;

	public function rules()
	{
		return [
			['field' => 'nama',
			'label' => 'nama',
			'rules' => 'required|callback_validate_name'],

			// ['field' => 'no_perkara',
			// 'label' => 'no_perkara',
			// 'rules' => 'required'],
			['field' => "no_perkara",
			'label' => 'no_perkara',
			'rules' => 'required'],

			['field' => "no_perkara_tahun",
			'label' => 'no_perkara_tahun',
			'rules' => 'numeric',
			'errors' => array('numeric' => 'Masukkan hanya angka saja.'),],

			// ['field' => 'no_ac',
			// 'label' => 'no_ac',
			// 'rules' => 'required'],

			['field' => 'pihak',
			'label' => 'pihak',
			'rules' => 'required'],

			['field' => 'no_hp',
			'label' => 'no_hp',
			'rules' => 'numeric',
			'errors' => array('numeric' => 'Masukkan hanya angka saja.'),],

			['field' => 'tanggal',
			'label' => 'tanggal',
			'rules' => 'required'],

			// ['field' => 'foto',
			// 'label' => 'foto',
			// // 'rules' => 'callback_validate_image'],
			// 'rules' => 'required',
			// 'errors' => array('required' => "Silahkan pilih foto."),],
		];
	}

	private function _uploadImage($layanan)
	{
		$no_perkara_tanpa_slash = str_replace("/", "_", $this->no_perkara);
		$no_perkara_tanpa_titik = str_replace(".", "", $no_perkara_tanpa_slash);
		$config['upload_path']          = './upload/'.$layanan."/";
	    $config['allowed_types']        = 'jpg|png';
	    $config['file_name']            = $no_perkara_tanpa_titik."_".$this->pihak;
	    $config['overwrite']			= true;

	    $this->load->library('upload', $config);
	    if($this->upload->do_upload('foto'))
	    {
	    	// print_r(expression)
	    	return $this->upload->data('file_name');
	    }
	    // print_r($this->upload->display_errors());
	    // return "default.jpg";
	}

	private function _base64upload($layanan, $img, $update)
	{
		$i=1;
		$path = './upload/'.$layanan."/";
		// $img = $post['foto'];
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$no_perkara_tanpa_slash = str_replace("/", "_", $this->no_perkara);
		$no_perkara_tanpa_titik = str_replace(".", "", $no_perkara_tanpa_slash);
		$file_name = $no_perkara_tanpa_titik."_".$this->pihak;
		$file = $path.$file_name.'.png';

		if(file_exists($file) && !$update)
		{
			while (file_exists($file)) {
				$file = $path.$file_name.$i.'.png';
				$nama_file_db = $file_name.$i.'.png';
				$i++;
			}
		}
		else
		{
			$nama_file_db = $file_name.'.png';
		}
		file_put_contents($file,$data);
		// return $file_name.'.png';
		return $nama_file_db;
	}

	private function _deleteImage($layanan, $id)
	{
		$produk = $this->getById($id);
		if($produk->foto != "default.jpg")
		{
			$filename = explode(".", $produk->foto)[0];
			return array_map('unlink', glob(FCPATH."upload/".$layanan."/".$filename.".*"));
		}
	}

	public function getAll($layanan) //filter tiap bulan
	{
		$this->db->from($this->table);
		$this->db->where('pengambilan', $layanan);
		// kalo ini pakai filter per tahun
		// $this->db->where('MONTH(tanggal)', date('n'));
		// $this->db->where('YEAR(tanggal)', date('Y'));
		
		$this->db->order_by('tanggal','desc');
		return $this->db->get()->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->table, ["id" => $id])->row();
	}

	public function insert($layanan)
	{
		$this->config->load('ptsp_config',TRUE);
		$nama_pa_pendek = $this->config->item('nama_pa_pendek','ptsp_config');
		$post = $this->input->post();
		$this->nama = $post['nama'];
		// $replace0 = "/^0/";  // Regex
		// $this->no_perkara = preg_replace($replace0, "", $post['no_perkara']);
		$no_perkara = $post['no_perkara'];
		$tahun = $post['no_perkara_tahun'];
		if($layanan == "ac")
		{
			if($this->sudah_ambil_ac($no_perkara."/Pdt.G/".$tahun."/".$nama_pa_pendek,$post['pihak']))
			{
				return 0;
			}
			else
			{
				$this->no_perkara = $no_perkara."/Pdt.G/".$tahun."/".$nama_pa_pendek;
				// $this->no_ac = preg_replace($replace0, "", $post['no_ac']);
				$no_ac = $post['no_ac'];
				// $tahun_ac = $post['no_ac_tahun'];
				// $this->no_ac = $no_ac."/AC/".$tahun_ac."PA.Tgr";
				$this->no_ac = $no_ac;
			}
		}
		else if($layanan == "putusan")
		{
			$this->no_perkara = $no_perkara."/Pdt.G/".$tahun."/".$nama_pa_pendek;
		}
		else if($layanan == "penetapan")
		{
			$this->no_perkara = $no_perkara."/Pdt.P/".$tahun."/".$nama_pa_pendek;
		}
		
		// $this->no_perkara = $post['no_perkara'];
		// $this->no_ac = $post['no_ac'];
		$this->pihak = $post['pihak'];
		$this->no_hp = $post['no_hp'];
		$this->tanggal = $post['tanggal'];
		// if(!empty($_FILES['foto']['name'])) //kalo ada file nya ya diupload
		// {
		// 	$this->foto = $this->_uploadImage($layanan);
		// }		
		if($post['foto'] != "kosong")
		{
			
			$this->foto = $this->_base64upload($layanan,$post['foto'],false);

		}
		$this->pengambilan = $layanan;
		$this->db->insert($this->table, $this);
		return $this->db->affected_rows();
	}

	public function update($layanan, $id)
	{
		$post = $this->input->post();
		$this->id = $id;
		$this->nama = $post['nama'];
		$replace0 = "/^0/";  // Regex
		$this->no_perkara = preg_replace($replace0, "", $post['no_perkara']);
		if($layanan == "ac")
		{
			$this->no_ac = preg_replace($replace0, "", $post['no_ac']);
		}
		$this->pihak = $post['pihak'];
		$this->no_hp = $post['no_hp'];
		$this->tanggal = $post['tanggal'];
		// if(!empty($_FILES['foto']['name']))
		// {
		// 	// $this->_deleteImage($layanan, $id);
		// 	$this->foto = $this->_uploadImage($layanan);
		// }
		// else
		// {
		// 	$this->foto = $post['old_foto'];
		// }
		if($post['foto'] != "kosong")
		{
			
			$this->foto = $this->_base64upload($layanan,$post['foto'],true);

		}
		else
		{
			$this->foto = $post['old_foto'];
		}
		$this->pengambilan = $layanan;
		$this->db->update($this->table, $this, ['id' => $id]);
		return $this->db->affected_rows();
	}

	public function delete($layanan, $id)
	{
		$this->_deleteImage($layanan, $id);
		return $this->db->delete($this->table, ['id' => $id]);
	}

	public function cari_perkara($no_perkara) //ini autocomplete blm di tes
	{
		$this->db->like('nomor_perkara',$no_perkara,'after');
		$this->db->order_by('nomor_perkara','ASC');
		return $this->db->get('perkara')->result();
	}

	public function sudah_ambil_ac($no_perkara, $pihak)
	{
		$statement = "SELECT * FROM produk WHERE no_perkara = '$no_perkara' AND pihak = '$pihak' AND pengambilan = 'ac' ";
		$query = $this->db->query($statement);
		if ($query->num_rows()>0) //ada isinya berarti udah ambil
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function cek_data_perkara_gugatan_ac()
	{
		// $data_perkara = array();
		// $no_perkara = "695/Pdt.G/2020/PA.Tgr";
		$this->config->load('ptsp_config',TRUE);
		$nama_pa_pendek = $this->config->item('nama_pa_pendek','ptsp_config');
		$post = $this->input->post();
		$no_perkara = $post['no']."/Pdt.G/".$post['tahun']."/".$nama_pa_pendek;
		$db_sipp = $this->load->database('sipp', TRUE);
		// $statement = "SELECT perkara_id, pihak1_text AS P, pihak2_text AS T FROM perkara WHERE nomor_perkara = '$no_perkara'";
		$statement = "SELECT p.perkara_id, p.pihak1_text AS p, p.pihak2_text AS t, ac.nomor_akta_cerai FROM perkara AS p, perkara_akta_cerai AS ac WHERE p.perkara_id = ac.perkara_id AND p.nomor_perkara = '$no_perkara' ";
		$query = $db_sipp->query($statement);
		$result = $query->result();
		// return $query->result();
		$row = $query->row();
		if(!empty($result))
		{
			if(isset($row->nomor_akta_cerai))
			{
				return $result;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}

	}

	public function cek_data_perkara_gugatan_putusan()
	{
		$post = $this->input->post();
		// $no_perkara = "695/Pdt.G/2020/PA.Tgr";
		$this->config->load('ptsp_config',TRUE);
		$nama_pa_pendek = $this->config->item('nama_pa_pendek','ptsp_config');
		$no_perkara = $post['no']."/Pdt.G/".$post['tahun']."/".$nama_pa_pendek;
		$db_sipp = $this->load->database('sipp', TRUE);
		$statement = "SELECT pihak1_text AS p, pihak2_text AS t FROM perkara WHERE nomor_perkara = '$no_perkara' ";
		$query = $db_sipp->query($statement);
		$result = $query->result();
		return $result;
	}

	public function cek_data_perkara_penetapan()
	{
		$this->config->load('ptsp_config',TRUE);
		$nama_pa_pendek = $this->config->item('nama_pa_pendek','ptsp_config');
		$post = $this->input->post();
		$no_perkara = $post['no']."/Pdt.P/".$post['tahun']."/".$nama_pa_pendek;
		$db_sipp = $this->load->database('sipp', TRUE);
		$statement = "SELECT pihak1_text AS p FROM perkara WHERE nomor_perkara = '$no_perkara' ";
		$query = $db_sipp->query($statement);
		$result = $query->result();
		return $result;
	}

	public function data_laporan($pengambilan)
	{
		if($pengambilan=='ac')
		{
			$statement = "SELECT id, nama, no_perkara, no_ac, pihak, no_hp, tanggal FROM produk WHERE pengambilan = '$pengambilan' ORDER BY tanggal ASC";
		}
		else if($pengambilan=='putusan')
		{
			$statement = "SELECT id, nama, no_perkara, pihak, no_hp, tanggal FROM produk WHERE pengambilan = '$pengambilan' ORDER BY tanggal ASC";
		}
		else
		{
			$statement = "SELECT id, nama, no_perkara, no_hp, tanggal FROM produk WHERE pengambilan = '$pengambilan' ORDER BY tanggal ASC";
		}
		$query = $this->db->query($statement);
		return $query->result();
	}

	public function cetak($pengambilan,$bulan,$tahun)
	{
		$statement = "SELECT id, nama, no_perkara, no_ac, pihak, no_hp, tanggal FROM produk WHERE pengambilan = '$pengambilan' AND MONTH(tanggal)=$bulan AND YEAR(tanggal)=$tahun ORDER BY tanggal ASC";
		$query = $this->db->query($statement);
		return $query->result();
	}

	public function getByDate($pengambilan)
	{
		$post = $this->input->post();
		$bulan = $post['bulan'];
		$tahun = $post['tahun'];
		$statement = "SELECT id, nama, no_perkara, no_ac, pihak, no_hp, tanggal FROM produk WHERE pengambilan = '$pengambilan' AND MONTH(tanggal)=$bulan AND YEAR(tanggal)=$tahun ORDER BY tanggal ASC";
		$query = $this->db->query($statement);
		return $query->result();
	}

	public function getStatistik($pengambilan)
	{
		$bulan = date('n');
		$statement = "SELECT COUNT(id) as total, DATE_FORMAT(tanggal,'%e') AS tanggal FROM produk WHERE MONTH(tanggal) = '$bulan' AND pengambilan='$pengambilan' GROUP BY tanggal";
		$query = $this->db->query($statement);
		return $query->result();
	}

	public function random_name()
	{
		$length = rand(3,10);
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charLength = strlen($chars);
		$random = '';
		for($i=0;$i<$length;$i++)
		{
			$random .= $chars[rand(0,$charLength - 1)];
		}
		return $random;
	}

	public function random_pihak()
	{
		return rand(0,1) ? 'p' : 't';
	}

	public function random_tanggal()
	{
		$int= mt_rand(1625097600,1627689600);
		return date("Y-m-d H:i:s",$int);
	}

	public function random_pengambilan()
	{
		$a = rand(2,4);
		if($a==2)
		{
			$b = 'penetapan';
		}
		else if($a==3)
		{
			$b = 'putusan';
		}
		else
		{
			$b = 'ac';
		}
		return $b;
	}

	public function isi_sembarang()
	{
		$data = array();
		for($i=0;$i<100;$i++)
		{
			$isi = array(
				'nama' => $this->random_name(),
				'no_perkara' => $this->random_name(),
				'no_ac' => $this->random_name(),
				'pihak' => $this->random_pihak(),
				'no_hp' => $this->random_name(),
				'tanggal' => $this->random_tanggal(),
				'foto' => 'default.jpg',
				'pengambilan' => $this->random_pengambilan(),
			);
			array_push($data, $isi);
		}
		$this->db->insert_batch('produk',$data);
		return $this->db->affected_rows();
	}

}

 ?>