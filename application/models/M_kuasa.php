<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_kuasa extends CI_Model
{
    private $table = "kuasa";
    public $id;
    public $no_urut;
    public $no_sk;
    public $tahun;
    public $tanggal;
    public $no_perkara;
    public $pihak;

    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->order_by("tanggal", "desc");
        return $this->db->get()->result();
    }
}

 ?>