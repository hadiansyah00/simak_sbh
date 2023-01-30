<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Profil Mahasiswa STIKES BOGOR';
		$data['judul'] = 'Profil Mahasiswa';
		//setting krs
		$data['setting'] = $this->db->get('mahasiswa')->row_array();
		//get data dari session
		$data['mhs'] = $this->KrsModel->getDataMhs();
		$this->load->view('mhs/templates/header', $data);
		$this->load->view('mhs/profil-mhs', $data);
		$this->load->view('mhs/templates/footer');
	}

	public function updateAksi()
	{
		$id 	= $this->input->post('id_mahasiswa');

		$data = array(
			'nama_mhs'			=> htmlspecialchars($this->input->post('nama_mhs')),
			'nama_kepanjangan'	=> htmlspecialchars($this->input->post('nama_kepanjangan')),
			'jk'				=> htmlspecialchars($this->input->post('jk')),
			'tempat_lahir'		=> htmlspecialchars($this->input->post('tempat_lahir')),
			'tgl_lahir'			=> htmlspecialchars($this->input->post('tgl_lahir')),
			'alamat'			=> htmlspecialchars($this->input->post('alamat')),
			'kota'				=> htmlspecialchars($this->input->post('kota')),
			'hp'				=> htmlspecialchars($this->input->post('hp')),
			'email'				=> htmlspecialchars($this->input->post('email')),
			'nama_ayah'			=> htmlspecialchars($this->input->post('nama_ayah')),
			'nama_ibu'			=> htmlspecialchars($this->input->post('nama_ibu')),
			'alamat_ortu'		=> htmlspecialchars($this->input->post('alamat_ortu')),
			'hp_ortu'			=> htmlspecialchars($this->input->post('hp_ortu')),
			'agama'			=> htmlspecialchars($this->input->post('agama')),
			'pendapatan_ortu'			=> htmlspecialchars($this->input->post('pendapatan_ortu')),
			'asal_sekolah'		=> htmlspecialchars($this->input->post('asal_sekolah')),
			'nisn'			=> htmlspecialchars($this->input->post('nisn')),
			'tahun_masuk'			=> htmlspecialchars($this->input->post('tahun_masuk')),

			// 'nama_dosen'			=> htmlspecialchars($this->input->post('hp_ortu')),
			//'status'			=> htmlspecialchars($this->input->post('status')),
			//'photo'				=> $photo,
			'tgl_update'		=> date('y-m-d')
		);

		$where = array('id_mahasiswa' => $id);
		//var_dump($data);
		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data 
				<strong class="green">
					Mahasiswa
				</strong>
				Berhasil di Update!
			</div>'
		);
		redirect('mhs/profil');
	}

	public function updatePhoto()
	{
		$id 	= $this->input->post('id_mahasiswa');

		$photo	= $_FILES['photo']['name'];
		if ($photo) {
			$config['upload_path']		= './assets/images/uploads';
			$config['allowed_types']	= 'jpeg|jpg|png|gif|tiff';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('photo')) {

				$photo = $this->upload->data('file_name');
				$this->db->set('photo', $photo);
			} else {
				echo "Gagal upload";
			}
		}
		$data = array(
			'photo' => $photo,
			'tgl_update' => date('y-m-d')
		);

		$where = array('id_mahasiswa' => $id);

		//timpah data 
		$item = $this->db->get_where('mahasiswa', $where)->row();

		if ($item->photo != null) {
			$target_file = './assets/images/uploads/' . $item->photo;
			unlink($target_file);
		}

		//var_dump($data);
		$this->db->update('mahasiswa', $data, $where);
		redirect('mhs/profil');
	}

	public function updateAksiSemester()
	{
		$id 	= $this->input->post('id_mahasiswa');

		$data = array(
			'semester'			=> htmlspecialchars($this->input->post('semester')),
			'tgl_update'		=> date('y-m-d')
		);

		$where = array('id_mahasiswa' => $id);
		//var_dump($data);
		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data 
				<strong class="green">
					Semester
				</strong>
				Berhasi di Update!
			</div>'
		);
		redirect('mhs/profil');
	}

	public function updatePass()
	{

		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[u_password]', [
			'matches' => 'Password tidak sama!',
			'min_length' => 'Password terlalu pendek!'
		]);
		$this->form_validation->set_rules('u_password', 'Password', 'required|trim|matches[password]');

		$id 	= $this->input->post('id_mahasiswa');

		$data = array(
			'password' => md5($this->input->post('password')),
			'tgl_update' => date('y-m-d')
		);

		$where = array('id_mahasiswa' => $id);
		//var_dump($data);
		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>
 
				<strong class="green">
					Password
				</strong>
				Berhasi di Update!
			</div>'
		);
		redirect('mhs/profil');
	}
}
