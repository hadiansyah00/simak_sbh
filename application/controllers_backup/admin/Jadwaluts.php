<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwaluts extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Jadwal Uts SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Jadwal Uts';

		$data['tahun'] = $this->TaModel->getAktif()->result();
		$data['jurusan'] = $this->JurusanModel->getData('jurusan')->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/jadwal_uts/jadwal_uts', $data);
		$this->load->view('admin/template/footer');
	}

public function index_jadwal($id)
	{
		$data['title'] = 'Jadwal UTS SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Jadwal UTS';

		$where = array('kd_jurusan' => $id);
		//$where = 'kd_jurusan';
		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		$data['detil'] = $this->JurusanModel->detilData('jurusan', $where)->result();
		$data['matkul'] = $this->JadwalutsModel->getMatkul($id)->result();
		$data['jadwal'] = $this->JadwalutsModel->getAll($id)->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/jadwal_uts/master_jadwal_uts', $data);
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
			'hari'				=> htmlspecialchars($this->input->post('hari')),
			'jam'				=> htmlspecialchars($this->input->post('jam')),
			'ruangan'			=> htmlspecialchars($this->input->post('ruangan')),
			'hari_uas'			=> htmlspecialchars($this->input->post('hari_uas')),
			'jam_uas'			=> htmlspecialchars($this->input->post('jam_uas')),
			'ruang_uas'		=> htmlspecialchars($this->input->post('ruang_uas')),
			'tgl_uas'			=> htmlspecialchars($this->input->post('tgl_uas')),
			'tgl_uts'			=>  htmlspecialchars($this->input->post('tgl_uts')),
			'tgl_insert'    	=> date('y-m-d'),
		);

		//var_dump($data);
		$this->JadwalutsModel->insertData('jadwal_uts', $data);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data
				<strong class="green">
					Jadwal Uts
				</strong>Berhasi di input!
			</div>'
		);
		redirect($_SERVER['HTTP_REFERER']);
	}


	public function update($id)
	{
		$data['title'] = 'Update Data Jawdal Uts SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Update Jadwal UTS';

		$where = array('id_jadwal' => $id);
		$data['jadwal'] = $this->db->get_where('jadwal_uts', $where)->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/jadwal_uts/update_uts', $data);
		$this->load->view('admin/template/footer');
	}

	public  function updateAksi()
	{
	    	$ta = $this->TaModel->getAktif()->result();
		foreach ($ta as $t) :
			$a = $t->id_ta;
		endforeach;
		$id = $this->input->post('id_jadwal');
		$data = array(
			'kd_jurusan'		=> htmlspecialchars($this->input->post('jurusan')),
			'id_ta'				=> $a,
			'kd_mk'				=> htmlspecialchars($this->input->post('matkul')),
			'hari'				=> htmlspecialchars($this->input->post('hari')),
			'jam'				=> htmlspecialchars($this->input->post('jam')),
			'ruangan'			=> htmlspecialchars($this->input->post('ruangan')),
			'tgl_uts'			=>  htmlspecialchars($this->input->post('tgl_uts')),
			'tgl_update'        =>date('y-m-d')
		);

		$where = array('id_jadwal' => $id);
		//var_dump($data);
		$this->db->update('jadwal_uts', $data, $where);
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
		redirect('admin/jadwal_uts');
	}

	public function delete($id)
	{
		$where = array('id_jadwal' => $id);

		$this->db->delete('jadwal_uts', $where);
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
