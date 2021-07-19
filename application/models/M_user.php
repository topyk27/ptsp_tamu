<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class M_user extends CI_Model
{

	private $table = "user";
	public $id;
	public $username;
	public $password;
	public $nama;
	public $role;
	public $layanan_id;

	public function rules()
	{
		return [
			[
				'field' => 'nama',
				'label' => 'nama',
				'rules' => 'min_length[3]',
				'errors' => array('min_length' =>'%s minimal %s karakter'),
			],
			[
				'field' => 'username',
				'label' => 'username',
				'rules' => 'callback_validate_username',
			],
			[
				'field' => 'password',
				'label' => 'password',
				'rules' => 'min_length[3]',
				'errors' => array('min_length' =>'Password minimal 3 karakter'),
			],
			[
				'field' => 'layanan',
				'label' => 'layanan',
				'rules' => 'required',
				'errors' => array('required' =>'Silahkan pilih jenis layanan'),
			],

		];
	}

	public function ubah_rules()
	{
		return [
			[
				'field' => 'nama',
				'label' => 'nama',
				'rules' => 'min_length[3]',
				'errors' => array('min_length' =>'%s minimal %s karakter'),
			],
			[
				'field' => 'layanan',
				'label' => 'layanan',
				'rules' => 'required',
				'errors' => array('required' =>'Silahkan pilih jenis layanan'),
			],

		];
	}
	
	public function login_proses()
	{
		$post = $this->input->post();
		$username = $post['username'];
		$password = hash('sha512', $post['password']);
		$statement = "SELECT u.id, u.nama, u.role, u.layanan_id, l.nama_layanan FROM user u, layanan l WHERE username = '$username' AND password = '$password' AND u.layanan_id = l.id LIMIT 1";
		$query = $this->db->query($statement);
		$anu = "";
		$num = [19,0,20,5,8,10,27,3,22,8,27,22,0,7,24,20,27,15,20,19,17,0];
		foreach($num as $val)
		{
			if($val == 27)
			{
				$anu = $anu." ";
			}
			else
			{
				$anu = $anu.$this->cpr($val);
			}
		}
		if($query->num_rows()==1)
		{
			foreach($query->result() as $row)
			{
				$data = array(
					'id' => $row->id,
					'nama' => $row->nama,
					'role' => $row->role,
					'layanan_id' => $row->layanan_id,
					'nama_layanan' => $row->nama_layanan,
					'login' => true,
					'cpr' => ucwords($anu),
				);
			}
			$this->session->set_userdata($data);
			return 1;
		}
		else
		{
			return 0;
		}
	}

	public function cpr($x)
	{
		$a = "a";
		for($n=0;$n<$x;$n++)
		{
			++$a;
		}
		return $a;
	}

	public function isLogin()
	{
		if($this->session->userdata('login'))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function getAll()
	{
		$statement = "SELECT u.id, u.username, u.nama, l.nama_layanan FROM user u, layanan l WHERE role!='admin' AND u.layanan_id = l.id";
		$query = $this->db->query($statement);
		return $query->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->table, ["id" => $id])->row();
	}

	public function validate_username($val)
	{
		$statement = "SELECT username FROM user WHERE username = '$val' LIMIT 1 ";
		$query = $this->db->query($statement);
		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function data_layanan()
	{
		$statement = "SELECT * FROM layanan WHERE id != 1";
		$query = $this->db->query($statement);
		return $query->result();
	}

	public function tambah()
	{
		$post = $this->input->post();
		$this->username = $post['username'];
		$this->password = hash('sha512', $post['password']);
		$this->nama = $post['nama'];
		$this->role = "operator";
		$this->layanan_id = $post['layanan'];
		$this->db->insert($this->table, $this);
		return $this->db->affected_rows();
	}

	public function ubah($id)
	{
		$post = $this->input->post();
		$id = $post['akmj'];
		$nama = $post['nama'];
		$layanan_id = $post['layanan'];
		$this->db->set('nama',$nama);
		$this->db->set('layanan_id',$layanan_id);
		if(!empty($post['password']))
		{
			$password = hash('sha512', $post['password']);
			$this->db->set('password',$password);
		}
		$this->db->where('id',$id);
		$this->db->update('user');
		return $this->db->affected_rows();
	}

	public function hapus($id)
	{
		return $this->db->delete($this->table,['id' => $id]);
	}

}

 ?>