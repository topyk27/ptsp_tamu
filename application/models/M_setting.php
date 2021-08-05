<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class M_setting extends CI_Model
{
	
	private $table = "setting";
	public $ketua;
	public $ketua_nip;
	public $panitera;
	public $panitera_nip;

	public function getAll()
	{
		$this->db->from($this->table);
		return $this->db->get()->row();
	}

	public function list_hakim()
	{
		$db_sipp = $this->load->database('sipp', TRUE);
		$statement = "SELECT nama_gelar, nip FROM hakim_pn WHERE aktif='Y' ORDER BY nama_gelar ASC";
		$query = $db_sipp->query($statement);
		return $query->result();
	}

	public function list_panitera()
	{
		$db_sipp = $this->load->database('sipp', TRUE);
		$statement = "SELECT nama_gelar, nip FROM panitera_pn WHERE aktif='Y' ORDER BY nama_gelar ASC";
		$query = $db_sipp->query($statement);
		return $query->result();
	}

	public function ketua_save()
	{
		$post = $this->input->post();
		$split = explode("#", $post['ketua']);
		$nama_gelar = $split[0];
		$nip = $split[1];
		$statement = "UPDATE setting set ketua='$nama_gelar', ketua_nip='$nip' ";
		$this->db->query($statement);
		$data['respon'] = $this->db->affected_rows();
		$data['nama'] = $nama_gelar;
		return $data;
	}

	public function panitera_save()
	{
		$post = $this->input->post();
		$split = explode("#", $post['panitera']);
		$nama_gelar = $split[0];
		$nip = $split[1];
		$statement = "UPDATE setting set panitera='$nama_gelar', panitera_nip='$nip' ";
		$this->db->query($statement);
		$data['respon'] = $this->db->affected_rows();
		$data['nama'] = $nama_gelar;
		return $data;
	}

	public function ttd()
	{
		$statement = "SELECT * FROM setting";
		$query = $this->db->query($statement);
		return $query->row();
	}

	public function savetoken()
	{
		$post = $this->input->post();
		$token = $post['token'];
		$nama_pa = $post['nama_pa'];
		$nama_pa_pendek = $post['nama_pa_pendek'];
		$this->db->truncate("setting");
		$statement = "INSERT INTO setting (token, nama_pa, nama_pa_pendek) VALUES ('$token', '$nama_pa', '$nama_pa_pendek') ";
		$this->db->query($statement);
		return $this->db->affected_rows();
	}
}
 ?>