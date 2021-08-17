<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class M_pendaftaran extends CI_Model
{
	
	private $table = "pendaftaran";
	public $id;
	public $tanggal_pendaftaran;
	public $jenis_perkara;
	public $no_perkara;
	public $penggugat;
	public $tergugat;
	public $foto;
	public $diperbarui;

	public function rules()
	{
		return [
			[
				'field' => 'tanggal',
				'label' => 'tanggal',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Mohon tanggal diisi'),
			],
			// [
			// 	'field' => 'jenis_perkara',
			// 	'label' => 'jenis_perkara',
			// 	'rules' => 'required',
			// 	'errors' => array(
			// 		'required' => 'Mohon jenis perkara diisi'),
			// ],
			[
				'field' => 'no_perkara',
				'label' => 'no_perkara',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Mohon nomor perkara diisi'),
			],
			// [
			// 	'field' => 'penggugat',
			// 	'label' => 'penggugat',
			// 	'rules' => 'required',
			// 	'errors' => array(
			// 		'required' => 'Mohon data penggugat diisi'),
			// ],
			// [
			// 	'field' => 'tergugat',
			// 	'label' => 'tergugat',
			// 	'rules' => 'required',
			// 	'errors' => array(
			// 		'required' => 'Mohon data tergugat diisi'),
			// ],
		];
	}

	public function update_rules()
	{
		return [
			[
				'field' => 'foto',
				'label' => 'foto',
				'rules' => 'required',
			]
		];
	}

	private function _base64upload($img,$jenis_perkara)
	{
		$i = 1;
		$jenis = ($jenis_perkara=="Pdt.G") ? "gugatan" : "permohonan";
		$path = './upload/pendaftaran/'.$jenis.'/';
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$no_perkara_tanpa_slash = str_replace("/", "_", $this->no_perkara);
		// $no_perkara_tanpa_titik = str_replace(".", "", $no_perkara_tanpa_slash);
		$file_name = $no_perkara_tanpa_slash;
		$file = $path.$file_name.'.png';
		$nama_file_db = $jenis."/".$file_name.'.png';
		file_put_contents($file,$data);
		return $nama_file_db;
	}

	private function _deleteImage($id)
	{
		$pendaftaran = $this->getById($id);
		// $jenis = (strpos($pendaftaran->no_perkara, "Pdt.G")) ? "gugatan" : "permohonan";
		if($pendaftaran->foto != "gugatan/default.png" && $pendaftaran->foto != "permohonan/default.png")
		{
			$filename =  explode(".", $pendaftaran->foto)[0];
			return array_map('unlink', glob(FCPATH."upload/pendaftaran/".$filename.".*"));
		}
	}

	public function getAll()
	{
		$this->db->from($this->table);
		$this->db->order_by("tanggal_pendaftaran", "desc");
		$this->db->order_by("no_perkara", "desc");
		return $this->db->get()->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->table, ["id" => $id])->row();
	}

	public function getByDate()
	{
		$post = $this->input->post();
		$bulan = $post['bulan'];
		$tahun = $post['tahun'];
		$statement = "SELECT * FROM pendaftaran WHERE MONTH(tanggal_pendaftaran)=$bulan AND YEAR(tanggal_pendaftaran)=$tahun ORDER BY tanggal_pendaftaran ASC, no_perkara ASC";
		$query = $this->db->query($statement);
		return $query->result();
	}

	public function isiRandom($min,$max,$jenis,$tahun)
	{
		$nama_pa_pendek = $this->session->userdata('nama_pa_pendek');
		$perkara = ($jenis=="g") ? "gugatan" : "permohonan";
		$jenis = ($jenis=="g") ? "Pdt.G" : "Pdt.P";
		for($i=$min;$i<=$max;$i++)
		{
			$db_sipp = $this->load->database('sipp', TRUE);
			$statement = "SELECT tanggal_pendaftaran, nomor_perkara FROM perkara WHERE nomor_perkara LIKE '$i/$jenis/$tahun/$nama_pa_pendek'";
			$query = $db_sipp->query($statement);
			$result = $query->result();
			foreach($result as $row)
			{
				$this->tanggal_pendaftaran = $row->tanggal_pendaftaran;
				$this->no_perkara = $row->nomor_perkara;
				$this->foto = $perkara."/default.png";
				$this->diperbarui = date('Y-m-d H:i:s');
				$this->db->insert($this->table, $this);
			}

		}
		
	}

	public function cetak($bulan,$tahun)
	{
		$statement = "SELECT * FROM pendaftaran WHERE MONTH(tanggal_pendaftaran)='$bulan' AND YEAR(tanggal_pendaftaran)='$tahun' ORDER BY tanggal_pendaftaran ASC ";
		$query = $this->db->query($statement);
		return $query->result();
	}

	public function insert()
	{
		$post = $this->input->post();
		$this->tanggal_pendaftaran = $post['tanggal'];
		// $jenis_perkara = $post['jenis_perkara'];
		$no = $post['no_perkara'];
		$jenis_perkara = $post['jenis_perkara'];
		$tahun = date("Y");
		$nama_pa_pendek = $this->session->userdata('nama_pa_pendek');
		$this->no_perkara = $no."/".$jenis_perkara."/".$tahun."/".$nama_pa_pendek;
		// $penggugat = $post['penggugat'];
		// $tergugat = $post['tergugat'];
		if($post['foto'] != "kosong")
		{
			$this->foto = $this->_base64upload($post['foto'],$jenis_perkara);
		}
		else
		{
			return false;
		}
		$this->diperbarui = date('Y-m-d H:i:s');
		$this->db->insert($this->table, $this);
		return $this->db->affected_rows();
	}

	public function cek_sudah_terdaftar($no_perkara)
	{
		$statement = "SELECT id FROM pendaftaran WHERE no_perkara LIKE '$no_perkara' LIMIT 1";
		$query = $this->db->query($statement);
		if($query->num_rows()>0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

	public function cek_data_perkara()
	{
		$post = $this->input->post();
		$no_perkara = $post['no_perkara'];
		// $no_perkara = "696/Pdt.G/2021/PA.Tgr";
		$db_sipp = $this->load->database('sipp', TRUE);
		$statement = "SELECT tanggal_pendaftaran FROM perkara WHERE nomor_perkara LIKE '$no_perkara'";
		$query = $db_sipp->query($statement);
		$result = $query->result();
		
		if($query->num_rows()==0)
		{
			return "gak ada";
		}
		else if($this->cek_sudah_terdaftar($no_perkara)==1)
		{
			return "terdaftar";
		}
		else
		{
			return $result;
		}
		
	}

	public function update($id)
	{
		$post = $this->input->post();
		$jenis_perkara = ($post['jenis_perkara']=="Gugatan") ? "Pdt.G" : "Pdt.P";
		$this->no_perkara = $post['no_perkara'];
		if($post['foto'] != "kosong")
		{
			$foto = $this->_base64upload($post['foto'],$jenis_perkara);
			// return "ok";
		}
		else
		{
			return "tidak ada foto";
		}
		
		$statement = "UPDATE pendaftaran SET foto = '$foto' WHERE id='$id'";
		$this->db->query($statement);
		return "ok";
	}

	public function delete($id)
	{
		$this->_deleteImage($id);
		return $this->db->delete($this->table, ['id' => $id]);
	}

	public function getDataPerkara($tahun,$bulan)
	{
		$this->config->load('ptsp_tamu_config',TRUE);
		$sipp = $this->config->item('sipp','ptsp_tamu_config');
		$ini = $this->config->item('ini','ptsp_tamu_config');
		$statement = "SELECT a.perkara_id, a.tanggal_pendaftaran, a.jenis_perkara_nama, a.nomor_perkara AS no_perkara, a.pihak1_text AS penggugat, a.pihak2_text AS tergugat, b.id FROM $sipp.perkara AS a, $ini.pendaftaran AS b WHERE a.nomor_perkara = b.no_perkara AND YEAR(a.tanggal_pendaftaran)='$tahun' ";
		($bulan!=0) ? $statement .= "AND MONTH(a.tanggal_pendaftaran)='$bulan' " : '';
		$query = $this->db->query($statement);
		return $query->result();
		
	}

	public function proses_sinkron()
	{
		$post = $this->input->post();
		$id = $post['id'];
		$tanggal_pendaftaran = $post['tanggal_pendaftaran'];
		$jenis_perkara = $post['jenis_perkara'];
		$no_perkara = $post['no_perkara'];
		$penggugat = $post['penggugat'];
		$tergugat = $post['tergugat'];
		// $statement = "UPDATE pendaftaran SET tanggal_pendaftaran='$tanggal_pendaftaran', jenis_perkara='$jenis_perkara', penggugat='$penggugat', tergugat='$tergugat' WHERE id='$id' ";
		$statement = "UPDATE pendaftaran SET tanggal_pendaftaran='$tanggal_pendaftaran', jenis_perkara='$jenis_perkara', penggugat=".$this->db->escape($penggugat).", tergugat=".$this->db->escape($tergugat)." WHERE id='$id' ";
		$this->db->query($statement);
		return "ok";
	}
}
 ?>