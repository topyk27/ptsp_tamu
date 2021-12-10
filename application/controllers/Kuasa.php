<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kuasa extends CI_Controller
{
    public function __construct()
	{
		parent:: __construct();
		$this->load->model("M_kuasa");
		$this->load->model("M_user");
		$this->load->library("form_validation");
		if(!$this->M_user->isLogin())
		{
			redirect('user/login');
		}
	}

    public function index()
	{
		$this->load->view("kuasa/index");
	}

    public function data_kuasa()
    {
        $data = $this->M_kuasa->getAll();
        echo json_encode($data);
    }

    public function tambah()
    {
        $this->load->view("kuasa/tambah");
    }
}

 ?>