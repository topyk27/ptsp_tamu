<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Makassar');
/**
 * 
 */
class M_informasi extends CI_Model
{
	private $table = "informasi";
	public $id;
	public $tanggal;
	public $nama;
	public $alamat;
	public $telepon;
	public $pekerjaan;
	public $informasi;
	public $keterangan;
	public $foto;
	public $diperbarui;

	public function rules()
	{
		return[
			['field' => 'tanggal',
			'label' => 'tanggal',
			'rules' => 'required'],

			['field' => 'nama',
			'label' => 'nama',
			'rules' => 'required'],

			['field' => 'alamat',
			'label' => 'alamat',
			'rules' => 'required'],

			['field' => 'telepon',
			'label' => 'telepon',
			'rules' => 'numeric',
			'errors' => array(
					'numeric' => 'Masukkan hanya angka saja.'),],

			['field' => 'pekerjaan',
			'label' => 'pekerjaan',
			'rules' => 'required'],

			['field' => 'informasi',
			'label' => 'informasi',
			'rules' => 'required'],

			['field' => 'keterangan',
			'label' => 'keterangan',
			'rules' => 'required']
		];
	}

	private function _base64upload($layanan, $img, $update)
	{
		$i=1;
		$path = './upload/'.$layanan."/";
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file_name = $this->nama;
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
		return $nama_file_db;
	}

	private function _deleteImage($layanan, $id)
	{
		$informasi = $this->getById($id);
		if($informasi->foto != "default.jpg")
		{
			$filename =  explode(".", $informasi->foto)[0];
			return array_map('unlink', glob(FCPATH."upload/".$layanan."/".$filename.".*"));
		}
	}

	public function getAll()
	{
		$this->db->from($this->table);
		$this->db->order_by("tanggal", "desc");
		// return $this->db->get()->result_array();
		return $this->db->get()->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->table, ["id" => $id])->row();
	}

	public function getByDate()
	{
		$post = $this->input->post();
		// $tanggal_awal =  $post['tanggal_awal'];
		// $tanggal_akhir = $post['tanggal_akhir'];
		// $statement = "SELECT * FROM informasi WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY tanggal ASC";
		$bulan = $post['bulan'];
		$tahun = $post['tahun'];
		$statement = "SELECT * FROM informasi WHERE MONTH(tanggal)=$bulan AND YEAR(tanggal)=$tahun ORDER BY tanggal ASC";
		$query = $this->db->query($statement);
		return $query->result();
	}

	public function cetak($bulan,$tahun)
	{
		$statement = "SELECT * FROM informasi WHERE MONTH(tanggal)=$bulan AND YEAR(tanggal)=$tahun ORDER BY tanggal ASC";
		$query = $this->db->query($statement);
		return $query->result();
	}

	// public function count_all()
	// {
	// 	return $this->db->count_all($this->table);
	// }
	
	public function insert()
	{
		// $this->load->helper('date');
		$post = $this->input->post();
		$this->tanggal = $post['tanggal'];
		$this->nama = $post['nama'];
		$this->alamat = $post['alamat'];
		$this->telepon = $post['telepon'];
		$this->pekerjaan = $post['pekerjaan'];
		$this->informasi = $post['informasi'];
		$this->keterangan = $post['keterangan'];
		if($post['foto'] != "kosong")
		{
			
			$this->foto = $this->_base64upload('informasi',$post['foto'],false);

		}
		$this->diperbarui = date('Y-m-d H:i:s');
		$this->db->insert($this->table, $this);
		return $this->db->affected_rows();
		// return $this->db->affected_rows();
	}

	public function update($id)
	{
		$post = $this->input->post();
		// $this->id = $post['id'];
		$this->tanggal = $post['tanggal'];
		$this->nama = $post['nama'];
		$this->alamat = $post['alamat'];
		$this->telepon = $post['telepon'];
		$this->pekerjaan = $post['pekerjaan'];
		$this->informasi = $post['informasi'];
		$this->keterangan = $post['keterangan'];
		if($post['foto'] != "kosong")
		{
			$this->foto = $this->_base64upload('informasi',$post['foto'],true);

		}
		else
		{
			$this->foto = $post['old_foto'];
		}
		$this->db->update($this->table, $this, ['id' => $id]);
		return $this->db->affected_rows();
		// return $this->telepon;
	}

	public function delete($id)
	{
		$this->_deleteImage('informasi', $id);
		return $this->db->delete($this->table, ["id" => $id]);
	}

	public function getStatistik()
	{
		$bulan = date('n');
		$statement = "SELECT COUNT(id) as total, DATE_FORMAT(tanggal,'%e') AS tanggal FROM informasi WHERE MONTH(tanggal) = '$bulan' GROUP BY tanggal";
		$query = $this->db->query($statement);
		return $query->result();
	}

}

 ?>