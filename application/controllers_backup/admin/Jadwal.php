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
		$data['title'] = 'Jadwal Kuliah SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Jadwal Kuliah';

		$data['tahun'] = $this->TaModel->getAktif()->result();
		$data['jurusan'] = $this->JurusanModel->getData('jurusan')->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/jadwal/jadwal', $data);
		$this->load->view('admin/template/footer');
	}

	public function index_jadwal($id)
	{
		$data['title'] = 'Jadwal Kuliah SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Jadwal Kuliah';

		$where = array('kd_jurusan' => $id);
		//$where = 'kd_jurusan';
		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		$data['detil'] = $this->JurusanModel->detilData('jurusan', $where)->result();
		$data['matkul'] = $this->JadwalutsModel->getMatkul($id)->result();
		$data['jadwal'] = $this->JadwalutsModel->getAll($id)->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/jadwal/master_jadwal', $data);
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
			'ruangan'			=> htmlspecialchars($this->input->post('ruangan')),
			'tgl_insert'		=> date('y-m-d')
		);

		//var_dump($data);
		$this->JadwalModel->insertData('jadwal', $data);
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
		redirect('admin/Jadwal/index_jadwal/' . $kd_jurusan);
	}


	public function update($id)
	{
		$data['title'] = 'Update Data Matakuliah SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Update Matakuliah';

		$where = array('kd_mk' => $id);
		$data['matakuliah'] = $this->db->get_where('matakuliah', $where)->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/matakuliah/update', $data);
		$this->load->view('admin/template/footer');
	}

	public  function updateAksi()
	{
		$id = $this->input->post('kd_mk');
		$data = array(
			'kd_jurusan'		=> htmlspecialchars($this->input->post('jurusan')),
			'matakuliah'		=> htmlspecialchars($this->input->post('matakuliah')),
			'sks'				=> htmlspecialchars($this->input->post('sks')),
			'semester'			=> htmlspecialchars($this->input->post('semester')),
			'id_dosen'			=> htmlspecialchars($this->input->post('nama_dosen')),
			'aktif'				=> htmlspecialchars($this->input->post('aktif')),
			'tgl_update'		=> date('y-m-d')
		);

		$where = array('kd_mk' => $id);
		//var_dump($data);
		$this->db->update('matakuliah', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data Matakuliah Berhasi di 
				<strong class="green">
					Update!
				</strong>
			</div>'
		);
		redirect('admin/Matakuliah');
	}

	public function delete($id)
	{
		$where = array('id_jadwal' => $id);

		$this->db->delete('jadwal', $where);
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
