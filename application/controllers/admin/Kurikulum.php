<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kurikulum extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
		$this->load->model('KurikulumModel');
	}

	public function index()
	{
		$data['title'] = 'Modul Matakuliah SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Matakuliah ';

		$data['tahun'] = $this->TaModel->getAktif()->result();
		$data['jurusan'] = $this->JurusanModel->getData('jurusan')->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/kurikulum/kurikulum', $data);
		$this->load->view('admin/template/footer');
	}

	public function index_kurikulum($id)
	{
		$data['title'] = 'Modul Matakuliah SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Matakuliah';

		$where = array('kd_jurusan' => $id);
		//$where = 'kd_jurusan';
		$data['tahun'] 		= $this->TaModel->getAktif()->row_array();

		$data['detil'] 		= $this->JurusanModel->detilData('jurusan', $where)->result();
		$data['matkul'] 	= $this->KurikulumModel->getMatkul($id)->result();
		$data['kurikulum'] 	= $this->KurikulumModel->getAll($id)->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/kurikulum/master_kurikulum', $data);
		$this->load->view('admin/template/footer');
	}

	public function insert($kd_jurusan)
	{
		$ta = $this->TaModel->getAktif()->result();
		foreach ($ta as $t) :
			$a = $t->id_ta;
		endforeach;
		$data = array(
			'kd_jurusan'		=> $kd_jurusan,
			'id_ta'				=> $a,
			'kd_mk'				=> htmlspecialchars($this->input->post('matkul')),
			'id_dosen'			=> htmlspecialchars($this->input->post('nama_dosen')),
			'hari'				=> htmlspecialchars($this->input->post('hari')),
			'jam'				=> htmlspecialchars($this->input->post('jam')),
			'hari_2'			=> htmlspecialchars($this->input->post('hari_2')),
			'jam_2'				=> htmlspecialchars($this->input->post('jam_2')),
			'ruangan'			=> htmlspecialchars($this->input->post('ruangan')),
			'tgl_insert'		=> date('y-m-d')
		);

		//var_dump($data);
		$this->KurikulumModel->insertData('kurikulum', $data);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data
				<strong class="green">
					Jadwal
				</strong>Berhasi di input!
			</div>'
		);
		redirect('admin/Kurikulum/index_kurikulum/' . $kd_jurusan);
	}


	public function delete($id)
	{
		$where = array('id_kurikulum' => $id);

		$this->db->delete('kurikulum', $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check red"></i>

				Data Jadwal Berhasi di 
				<strong class="red">
					Hapus!
				</strong>
			</div>'
		);
		redirect($_SERVER['HTTP_REFERER']);
	}
}