<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		//Session login mahasiswa berdasarkan id login (ambil data KRS)
		$mhs = $this->KrsModel->getDataMhs();
		$ta = $this->TaModel->getAktif()->row_array();

		$data['title'] = 'Jadwal Kuliah';
		$data['judul'] = 'Jadwal Kuliah';
		//setting krs
		$data['setting'] = $this->db->get('mahasiswa')->row_array();

		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		//get data from session
		$data['mhs'] = $this->KrsModel->getDataMhs();
		//get Jadwal for mahasiswa
		//tampil data KRS berdasarkan sessi login mhs
		$data['viewKrs'] = $this->KrsModel->viewKrs($mhs['id_mahasiswa'], $ta['id_ta']);

		$this->load->view('mhs/templates/header', $data);
		$this->load->view('mhs/jadwal', $data);
		$this->load->view('mhs/templates/footer');
	}
}
