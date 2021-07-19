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
		$this->db->update($this->table, $this, ['id' => $id]);
		return $this->db->affected_rows();
		// return $this->telepon;
	}

	public function delete($id)
	{
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