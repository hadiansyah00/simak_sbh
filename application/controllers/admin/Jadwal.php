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
		$data['title'] = 'Jadwal  SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Jadwal';

		$data['tahun'] = $this->TaModel->getAktif()->result();
		$data['jurusan'] = $this->JurusanModel->getData('jurusan')->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/jadwal/jadwal', $data);
		$this->load->view('admin/template/footer');
	}

    public function index_jadwal($id)
	{
		$data['title'] = 'Jadwal ';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Jadwal ';

		$where = array('kd_jurusan' => $id);
		//$where = 'kd_jurusan';
		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		$data['detil'] = $this->JurusanModel->detilData('jurusan', $where)->result();
		$data['matkul'] = $this->JadwalModel->getMatkul($id)->result();
		$data['jd'] = $this->JadwalModel->getData($id)->result();
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
			'koordinator'		=> htmlspecialchars($this->input->post('koordinator')),
			'koordinator_2'		=> htmlspecialchars($this->input->post('koordinator_2')),
			'koordinator_3'		=> htmlspecialchars($this->input->post('koordinator_3')),
			'hari'				=> htmlspecialchars($this->input->post('hari')),
			'jam'				=> htmlspecialchars($this->input->post('jam')),
			'hari_2'			=> htmlspecialchars($this->input->post('hari_2')),
			'jam_2'				=> htmlspecialchars($this->input->post('jam_2')),
			'ruangan'			=> htmlspecialchars($this->input->post('ruangan')),
			'tgl_insert'    	=> date('y-m-d'),
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
		redirect($_SERVER['HTTP_REFERER']);
	}


	public function update($id)
	{
		$data['title'] = 'Update Data Jawdal UTS SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Update Jadwal UTS';
		
		$where = array('id_jadwal' => $id);
	
// 		$where = array('id_jadwal' => $id);
		$data['jadwal'] = $this->db->get_where('jadwal_uts', $where)->result();

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/jadwal_uts/update_uts', $data);
		$this->load->view('admin/template/footer');
	}

	public  function updateAksi()
	{
	    
		$id = $this->input->post('id_jadwal');
		$data = array(
// 	        'kd_jurusan'		=> $kd_jurusan,
// 			'kd_mk'				=> htmlspecialchars($this->input->post('matkul')),
// 			'hari_uas'			=> htmlspecialchars($this->input->post('hari_uas')),
			'jam_uts'			=> htmlspecialchars($this->input->post('jam_uts')),
			'ruang_uts'			=> htmlspecialchars($this->input->post('ruang_uts')),
			'tgl_uts'			=> htmlspecialchars($this->input->post('tgl_uts')),
			'tgl_update'        =>  date('y-m-d')
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

				Jadwal Berhasil 
				<strong class="green">
					di Update!
				</strong>
			</div>'
		);
	redirect($_SERVER['HTTP_REFERER']);
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