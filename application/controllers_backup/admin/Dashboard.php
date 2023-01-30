<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{

		$data['title'] = 'Dashboard Admin SBH';
		$data['judul'] = 'Dashboard';
		$data['subJudul'] = '';

		//$data = $this->UserModel->getSession($this->session->userdata(['username']));
		// $data = array(
		// 	'username'	=> $data->username,
		// 	'level'		=> $data->level
		// );
		$data['status'] = $this->MahasiswaModel->jumlahMhs();
	
		$data['aktif'] = $this->MahasiswaModel->jumlahAktifMhs();
			$data['gizi'] = $this->MahasiswaModel->gizi();
				$data['bidan'] = $this->MahasiswaModel->bidan();
					$data['farmasi'] = $this->MahasiswaModel->farmasi();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/dashboard');
		$this->load->view('admin/template/footer');
	}
}
