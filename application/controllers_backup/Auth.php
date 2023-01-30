<?php

class Auth extends CI_Controller
{

	public function index()
	{
		$this->load->view('login');
		// $this->load->view('login_baak');
	}

	public function getLogin()
	{

		$this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username wajib diisi']);
		$this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib diisi']);
		$this->form_validation->set_rules('level', 'Level', 'required', ['required' => 'Level wajib diisi']);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		} else {
			$level    = $this->input->post('level');
			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);

			//$level_admin = $this->db->get('users')->row_array();

			$pass = md5($password);

			if ($level == 'admin') {
				$cek_user = $this->UserModel->loginUser($username, $pass);
				if ($cek_user) {
					//jika data cocok dgn database
					$this->session->set_userdata('level', $level);
					$this->session->set_userdata('username', $cek_user->username);
					//$this->session->set_userdata('username', $cek_user->email);

					//login
					return redirect('admin/dashboard');
				} else {
					//jika gagal
					$this->session->set_flashdata(
						'pesan',
						'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-xmark red"></i>

				
				<strong class="red">
					Username Atau Password Salah !!
				</strong>
			</div>'
					);
					return redirect('auth');
				}
			} elseif ($level == 'mahasiswa') {
				//LOGIN MAHASISWA
				$cek_mhs = $this->UserModel->loginMhs($username, $pass);

				if ($cek_mhs) {
					//jika data cocok dgn database

					$this->session->set_userdata('level', $level);
					$this->session->set_userdata('username', $cek_mhs->nim);
					$this->session->set_userdata('sess_nama', $cek_mhs->nama_mhs);
					$this->session->set_userdata('sess_nama', $cek_mhs->photo);
					// $this->session->set_userdata('photo', $cek_mhs['photo']);
					//var_dump($c);die();
					//login

					return redirect('mhs/home');
				} else {
					//jika gagal
					$this->session->set_flashdata(
						'pesan',
						'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-xmark red"></i>

				
				<strong class="red">
					Username Atau Password Salah !!
				</strong>
			</div>'
					);
					return redirect('auth');
				}
			} elseif ($level == 'dosen') {
				//LOGIN DOSEN
				$cek_dosen = $this->UserModel->loginDosen($username, $pass);

				if ($cek_dosen) {
					//jika data cocok dgn database

					$this->session->set_userdata('level', $level);
					$this->session->set_userdata('username', $cek_dosen->kd_dosen);
					$this->session->set_userdata('sess_nama', $cek_dosen->nama_dosen);
					// $this->session->set_userdata('sess_nama', $cek_dosen->photo);
					// $this->session->set_userdata('photo', $cek_mhs['photo']);
					//var_dump($c);die();
					//login

					return redirect('dosen/home');
				} else {
					//jika gagal
					$this->session->set_flashdata(
						'pesan',
						'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-xmark red"></i>

				
				<strong class="red">
					Username Atau Password Salah !!
				</strong>
			</div>'
					);
					return redirect('auth');
				}
			}
		}
	}

	// else{
	//       $this->session->set_flashdata(
	//         'pesan',
	//         'Username Atau Password Anda Salah!'
	//       );
	//       redirect('auth');
	//     }

	public function admin()
	{
		$this->load->view('login_baak');
	}
	public function bauk()
	{
		$this->load->view('login_bauk');
	}


	// LOGIN Baak ADMIN
	public function baak()
	{

		$this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username wajib diisi']);
		$this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib diisi']);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		} else {
			$level = $this->input->post('level', TRUE);
			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);

			//$level_admin = $this->db->get('users')->row_array();

			$pass = md5($password);

			if ($level == 'admin_akademik') {
				$cek_user = $this->UserModel->loginSuper($username, $pass);
				if ($cek_user) {
					//jika data cocok dgn database
					$this->session->set_userdata('username', $cek_user->username);
					//$this->session->set_userdata('username', $cek_user->email);

					//login
					return redirect('admin/dashboard');
				} else {
					//jika gagal
					$this->session->set_flashdata(
						'pesan',
						'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-xmark red"></i>

				
				<strong class="red">
					Username Atau Password Salah !!
				</strong>
			</div>'
					);
					return redirect('auth/admin');
				}
			}
		}
	}
	// LOGIN Baak ADMIN
	public function bauk_login()
	{

		$this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username wajib diisi']);
		$this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib diisi']);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		} else {
			$level = $this->input->post('level', TRUE);
			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);

			//$level_admin = $this->db->get('users')->row_array();

			$pass = md5($password);

			if ($level == 'admin_keu') {
				$cek_user = $this->UserModel->loginBauk($username, $pass);
				if ($cek_user) {
					//jika data cocok dgn database
				 	$this->session->set_userdata('id_users', $cek_user->id);
					$this->session->set_userdata('username', $cek_user->username);
					//$this->session->set_userdata('username', $cek_user->email);

					//login
					return redirect('bauk/db988b75ef9e581094b3793d4e5da08db6f8df2a');
				} else {
					//jika gagal
					$this->session->set_flashdata(
						'pesan',
						'<div class="alert alert-block alert-danger">
					<button type="button" class="close" data-dismiss="alert">
						<i class="ace-icon fa fa-times"></i>
					</button>
	
					<i class="ace-icon fa fa-xmark red"></i>
	
					
					<strong class="red">
						Username Atau Password Salah !!
					</strong>
				</div>'
					);
					return redirect('auth/bauk');
				}
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>

	<i class="ace-icon fa fa-check red"></i>

	
	<strong class="red">
		Anda Berhasil Logout
	</strong>
</div>'
		);
	}
}
