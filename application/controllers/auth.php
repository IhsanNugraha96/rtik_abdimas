<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth  extends CI_Controller 

{
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('id_relawan'))
		{	
			redirect('relawan');
		}
		else if($this->session->userdata('id_admin'))
		{	
			redirect('admin');
		}
		elseif($this->session->userdata('id_instruktur'))
		{	
			redirect('instruktur');
		}
		elseif($this->session->userdata('id_pangkalan'))
		{	
			redirect('pangkalan');
		}
		elseif($this->session->userdata('id_mitra'))
		{	
			redirect('mitra');
		}
		elseif($this->session->userdata('id_pembimbing'))
		{	
			redirect('pembimbing');
		}
		
	}

// fungsi untuk login relawan/peserta
	public function index()
	{
		$this->load->model('Authentikasi');
		
		$this->load->model('Relawan_Model');

		// aturan tambahan pada kolom input untuk validasi
		$this->form_validation->set_rules('username', 'Username/Email','required|trim', ['required' => 'Data belum di isi!']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Data belum di isi!']);

		$this->form_validation->set_rules('user', 'User', 'required|trim', ['required' => 'Data belum di isi!']);

		if ($this->form_validation->run() == false)
		{				
			$data['title'] = "Login Page";
			$this->load->view('auth/header', $data);
			$this->load->view('auth/login', $data);
			$this->load->view('auth/footer', $data);
		}
		else
		{	
			// echo base64_decode('Y0xocm1LcVQ='); die();
			// validasi success
			$user = $this->input->post('user');
			// echo "$user"; die();
			if ($user == 'Relawan/Peserta') 
			{
				$this->_loginrelawan(); 
			}
			else if ($user == 'Administrator') 
			{
				$this->_loginadmin(); 
			}
			else if ($user == 'Instruktur') 
			{
				$this->_loginInstruktur(); 
			}
			else if ($user == 'Pangkalan') 
			{
				$this->_loginPangkalan(); 
			}
			else if ($user == 'Pembimbing') 
			{
				$this->_loginPembimbing(); 
			}
			else if ($user == 'mitra') 
			{
				$this->_loginmitra(); 
			}

			
		}
	}

	private function _loginmitra()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// mencari data user pada database

		$data_user = $this->Authentikasi->cek_mitra_by_email($username);
			// print_r($email);
			// echo "string"; die();

			if($data_user)
			{
			// cek passwordnya
					if(base64_decode($data_user['password']) == $password)
					{
						$data = [
							'id_mitra' => $data_user['id_mitra']
						];
						
						$this->session->set_userdata($data);
						$this->session->set_flashdata('message','<div class="alert alert-success alert-success-style1 alert-st-bg alert-st-bg11 animated--grow-in show" style="background-color: white; margin-top: -10%;">
							<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
							<span class="icon-sc-cl" aria-hidden="true">&times;</span>
							</button>
							<i class="fa fa-check edu-checked-pro admin-check-pro admin-check-pro-clr admin-check-pro-clr11" aria-hidden="true"></i>
							<p><strong>Selamat Datang di Halaman Mitra Tim RTIKAbdimas!</strong></p>
							</div>');
						redirect('mitra');

					}
					else
					{
						$this->session->set_flashdata('message','<div class="alert alert-danger" style="margin-top:-10%;" role="alert">Password salah!</div>');
						redirect('auth');
					}
			}
			else
			{

				$this->session->set_flashdata('message','<div class="alert alert-danger" style="margin-top:-10%;" role="alert">Email belum terdaftar! </div>');
				redirect('auth');
			}
	}
	// akhir fungsi untuk login mitra

	// fungsi untuk login relawan
	private function _loginrelawan()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// mencari data user pada database

		$data_user = $this->Authentikasi->cek_relawan_by_username($username);
		// print_r($data_user); die();
		// jika user ada, maka:
		if($data_user){
			//jika usernya aktiv
			if($data_user['is_active'] == '3'){
				// cek passwordnya
				// $data_password =  base64_decode($data_user['password']);

				if( base64_decode($data_user['password']) == $password)
				{
					$data = [
						'email' => $data_user['email'],
						'id_relawan' => $data_user['id_relawan']
					];
					
					$this->session->set_userdata($data);

					$this->session->set_flashdata('message','<div class="alert alert-success alert-success-style1 alert-st-bg alert-st-bg11 animated--grow-in show" style="background-color: white; margin-top: -10%;">
						<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
						<span class="icon-sc-cl" aria-hidden="true">&times;</span>
						</button>
						<i class="fa fa-check edu-checked-pro admin-check-pro admin-check-pro-clr admin-check-pro-clr11" aria-hidden="true"></i>
						<p><strong>Selamat Datang di Halaman Dashboard Relawan!</strong></p>
						</div>');
					redirect('relawan');

				}
				else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" style="margin-top:-10%;" role="alert">Password salah!</div>');
					redirect('auth');
				}
			}
			elseif ($data_user['is_active'] == '2' || $data_user['is_active'] == '1') 
			{
				$this->session->set_flashdata('message','<div class="alert alert-danger" style="margin-top:-10%;" role="alert">Akun anda belum di aktivasi pangkalan!</div>');
				redirect('auth');
			}
			elseif ($data_user['is_active'] == '0')
			{
				$this->session->set_flashdata('message','<div class="alert alert-danger" style="margin-top:-10%;" role="alert">Email belum di aktivasi!</div>');
				redirect('auth');
			}
		}

		else{

			$data_user = $this->Authentikasi->cek_relawan_by_email($username);
			// print_r($email);
			// echo "string"; die();

			if($data_user){
			//jika usernya aktiv
				if($data_user['is_active'] == '3' ){
					// cek passwordnya
					if(base64_decode($data_user['password']) == $password){
						$data = [
							'email' => $data_user['email'],
							'id_relawan' => $data_user['id_relawan']
						];
						
						$this->session->set_userdata($data);
						$this->session->set_flashdata('message','<div class="alert alert-success alert-success-style1 alert-st-bg alert-st-bg11 animated--grow-in show" style="background-color: white; margin-top: -10%;">
							<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
							<span class="icon-sc-cl" aria-hidden="true">&times;</span>
							</button>
							<i class="fa fa-check edu-checked-pro admin-check-pro admin-check-pro-clr admin-check-pro-clr11" aria-hidden="true"></i>
							<p><strong>Selamat Datang di Halaman Dashboard Relawan!</strong></p>
							</div>');
						redirect('relawan');

					}
					else{
						$this->session->set_flashdata('message','<div class="alert alert-danger" style="margin-top:-10%;" role="alert">Password salah!</div>');
						redirect('auth');
					}
				}

				elseif ($data_user['is_active'] == '1' || $data_user['is_active'] == '2') 
				{
					$this->session->set_flashdata('message','<div class="alert alert-danger" style="margin-top:-10%;" role="alert">Akun anda belum di aktivasi pangkalan!</div>');
					redirect('auth');
				}
				elseif ($data_user['is_active'] == '0')
				{
					$this->session->set_flashdata('message','<div class="alert alert-danger" style="margin-top:-10%;" role="alert">Email belum di aktivasi!</div>');
					redirect('auth');
				}
			}

			$this->session->set_flashdata('message','<div class="alert alert-danger" style="margin-top:-10%;" role="alert">Username & Email belum terdaftar! </div>');
			redirect('auth');
		}
		
	}
	// akhir fungsi untuk login relawan

	

	private function _loginadmin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// mencari data user pada database

		$data_admin = $this->Authentikasi->cek_admin_by_username($username);

		// print_r($data_admin); die();
		// jika user ada, maka:

		if($data_admin){
			// cek passwordnya
			// $data_password =  base64_decode($data_user['password']);

			if( base64_decode($data_admin['password']) == $password)
			{
				$data = ['id_admin' => $data_admin['id_admin']];

				$this->session->set_userdata($data);

				$this->session->set_flashdata('message','<div class="alert alert-success alert-success-style1 alert-st-bg alert-st-bg11 animated--grow-in show" style="background-color: white; margin-top: -10%;">
					<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
					<span class="icon-sc-cl" aria-hidden="true">&times;</span>
					</button>
					<i class="fa fa-check edu-checked-pro admin-check-pro admin-check-pro-clr admin-check-pro-clr11" aria-hidden="true"></i>
					<p><strong>Selamat Datang di Halaman Dashboard administrator!</strong></p>
					</div>');
				redirect('admin');

			}
			else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" style="margin-top:-10%;" role="alert">Password salah!</div>');
				redirect('auth');
			}
		}

		else{

			$data_admin = $this->Authentikasi->cek_admin_by_email($username);
			// print_r($email);
			// echo "string"; die();

			if($data_admin){
				// cek passwordnya
				if(base64_decode($data_admin['password']) == $password){
					$data = [
						'id_admin' => $data_admin['id_admin']
					];

					$this->session->set_userdata($data);
					$this->session->set_flashdata('message','<div class="alert alert-success alert-success-style1 alert-st-bg alert-st-bg11 animated--grow-in show" style="background-color: white; margin-top: -10%;">
						<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
						<span class="icon-sc-cl" aria-hidden="true">&times;</span>
						</button>
						<i class="fa fa-check edu-checked-pro admin-check-pro admin-check-pro-clr admin-check-pro-clr11" aria-hidden="true"></i>
						<p><strong>Selamat Datang di Halaman Dashboard Administrator!</strong></p>
						</div>');
					redirect('admin');

				}
				else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" style="margin-top:-10%;" role="alert">Password salah!</div>');
					redirect('auth');
				}
			}

			$this->session->set_flashdata('message','<div class="alert alert-danger" style="margin-top:-10%;" role="alert">Username/Email belum terdaftar! </div>');
			redirect('auth');
		}

	}
	// akhir fungsi untuk login administrator

	private function _loginInstruktur()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// mencari data user pada database

		// jika user ada, maka:

		$data_instruktur = $this->Authentikasi->cek_instruktur_by_email($username);
			// echo "string"; die();

		if($data_instruktur){
			// cek role_id
			if ($data_instruktur['role_id'] == '1') 
			{
				// cek passwordnya
				if(base64_decode($data_instruktur['password']) == $password){
					$data = [
						'id_instruktur' => $data_instruktur['id_instruktur']
					];

					$this->session->set_userdata($data);
					$this->session->set_flashdata('message','<div class="alert alert-success alert-success-style1 alert-st-bg alert-st-bg11 animated--grow-in show" style="background-color: white; margin-top: -10%;">
						<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
						<span class="icon-sc-cl" aria-hidden="true">&times;</span>
						</button>
						<i class="fa fa-check edu-checked-pro admin-check-pro admin-check-pro-clr admin-check-pro-clr11" aria-hidden="true"></i>
						<p><strong>Selamat Datang di Halaman Instruktur!</strong></p>
						</div>');
					redirect('instruktur');

				}
				else
				{
					$this->session->set_flashdata('message','<div class="alert alert-warning" style="margin-top:-10%;" role="alert">Password salah!</div>');
					redirect('auth');
				}

			}
			elseif ($data_instruktur['role_id'] == '0') 
			{
					$this->session->set_flashdata('message','<div class="alert alert-warning" style="margin-top:-10%;" role="alert">Anda belum bisa login, pengajuan akun belum di terima!</div>');
					redirect('auth');
			}
		}
		// echo "email tidak ada"; die();

		$this->session->set_flashdata('message','<div class="alert alert-danger" style="margin-top:-10%;" role="alert">Email belum terdaftar! </div>');
		redirect('auth');

	}


	private function _loginPangkalan()
	{
		$email = $this->input->post('username');
		$password = $this->input->post('password');

		// mencari data user pada database

		// jika user ada, maka:

		$data_pangkalan = $this->Authentikasi->cek_pangkalan_by_email($email);
			// echo "string"; die();

		if($data_pangkalan){
			// cek role_id
			if ($data_pangkalan['role_id'] == '1') 
			{
				// cek passwordnya
				if(base64_decode($data_pangkalan['password']) == $password){
					$data = [
						'id_pangkalan' => $data_pangkalan['id_komisariat']
					];

					$this->session->set_userdata($data);
					$this->session->set_flashdata('message','<div class="alert alert-success alert-success-style1 alert-st-bg alert-st-bg11 animated--grow-in show" style="background-color: white; margin-top: -10%;">
						<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
						<span class="icon-sc-cl" aria-hidden="true">&times;</span>
						</button>
						<i class="fa fa-check edu-checked-pro admin-check-pro admin-check-pro-clr admin-check-pro-clr11" aria-hidden="true"></i>
						<p><strong>Selamat Datang di Halaman Pangkalan!</strong></p>
						</div>');
					redirect('pangkalan');

				}
				else
				{
					$this->session->set_flashdata('message','<div class="alert alert-warning" style="margin-top:-10%;" role="alert">Password salah!</div>');
					redirect('auth');
				}

			}
			elseif ($data_pangkalan['role_id'] == '0') 
			{
					$this->session->set_flashdata('message','<div class="alert alert-warning" style="margin-top:-10%;" role="alert">Anda belum bisa login, pengajuan akun belum di terima!</div>');
					redirect('auth');
			}
		}
		// echo "email tidak ada"; die();

		$this->session->set_flashdata('message','<div class="alert alert-danger" style="margin-top:-10%;" role="alert">Email belum terdaftar! </div>');
		redirect('auth');

	}

	public function _loginPembimbing()
	{
		$email = $this->input->post('username');
		$password = $this->input->post('password');

		// mencari data user pada database

		// jika user ada, maka:

		$data_pembimbing = $this->Authentikasi->cek_pembimbing_by_email($email);
		// print_r($data_pembimbing); die();

		if($data_pembimbing){
			// cek role_id
			if ($data_pembimbing['role_id'] >= '1') 
			{
				// cek passwordnya
				if(base64_decode($data_pembimbing['password']) == $password){
					$data = [
						'id_pembimbing' => $data_pembimbing['id_pembimbing']
					];

					$this->session->set_userdata($data);
					$this->session->set_flashdata('message','<div class="alert alert-success alert-success-style1 alert-st-bg alert-st-bg11 animated--grow-in show" style="background-color: white; margin-top: -10%;">
						<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
						<span class="icon-sc-cl" aria-hidden="true">&times;</span>
						</button>
						<i class="fa fa-check edu-checked-pro admin-check-pro admin-check-pro-clr admin-check-pro-clr11" aria-hidden="true"></i>
						<p><strong>Selamat Datang di Halaman Pembimbing!</strong></p>
						</div>');
					redirect('pembimbing');

				}
				else
				{
					$this->session->set_flashdata('message','<div class="alert alert-warning" style="margin-top:-10%;" role="alert">Password salah!</div>');
					redirect('auth');
				}

			}
			elseif ($data_pangkalan['role_id'] == '0') 
			{
					$this->session->set_flashdata('message','<div class="alert alert-warning" style="margin-top:-10%;" role="alert">Anda belum bisa login, email belum di aktivasi!</div>');
					redirect('auth');
			}
		}
		// echo "email tidak ada"; die();

		$this->session->set_flashdata('message','<div class="alert alert-danger" style="margin-top:-10%;" role="alert">Email belum terdaftar! </div>');
		redirect('auth');
	}

	

	private function _sendEmail($token, $tipe, $nama)
	{
		// echo "$nama"; die();
		$this->load->library('email');
		$config = [
			'protocol'	=> 'smtp',
			'smtp_host'	=> 'ssl://smtp.googlemail.com',
			'smtp_user'	=> 'nugrahaihsan96@gmail.com',
			'smtp_pass'	=> 'Garut15091996',
			'smtp_port' => 465,
			'mailtype'	=> 'html',
			'charset'	=> 'iso-8859-1',
			'newline'	=> "\r\n"
		];


		// $this->email->initialize($config);

		$this->email->initialize($config);
		$this->email->from('nugrahaihsan96@gmail.com', 'RTIK Abdimasyarakat');
		$this->email->to($this->input->post('email'));

//

		if ($tipe == 'verifikasi') {
			$this->email->subject('Verifikasi Akun RTIK Abdi Masyarakat');
			$this->email->message('Hai <b>'.$nama.'</b><br>Segera lakukan aktivasi akun dengan memverivikasi email.<br> Token aktivasi ini hanya berlaku 24 jam.<br> jika anda melakukan aktivasi melebihi dari batas waktu yang telah ditentukan, maka akun anda pada sistem akan otomatis terhapus. <br><br> '.'Klik pada link berikut untuk memferifikasi akun anda : <a href="'.base_url().'auth/verifikasi?email='. $this->input->post('email'). '&token='. urlencode($token) . '">aktivasi.</a>');
		}
		elseif ($tipe == 'akun_instruktur') 
		{
			$this->email->subject('Pengajuan Akun Instruktur RTIK Abdi Masyarakat');
			$this->email->message($token);
		}
		elseif ($tipe == 'akun_pangkalan') 
		{
			$this->email->subject('Pengajuan Akun Pangkalan RTIK Abdi Masyarakat');
			$this->email->message($token);
		}
		else{
			echo "untuk lupa password";
		}


		
		if ($this->email->send()){
			return true;
		} 
		else 
		{
			echo "gagal kirim email"."<br>";
			echo $this->email->print_debugger();

			die();
		}
	}
	// akhir fungsi pendaftaran relawan/volunter

	//fungsi verifikasi email akun 
	public function verifikasi()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		// cek apakah email ada di database
		$user = $this->db->get_where('relawan',['email' => $email])->row_array();

		if ($user) 
		{
			$user_token = $this->db->get_where('user_token',['email' => $email])->row_array();

			
			if ($user_token) 
			{
				if ((time() - $user_token['date_created']) < (60*60*24) ) 
				{
					// jika sudah di verifikasi, update is_active pada tabel relawan
					$this->db->set('is_active', 2);
					$this->db->where('email', $email);
					$this->db->update('relawan');	

					// kemudian hapus token pada tabel user_token
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Akun anda sudah berhasil di aktivasi. harap menunggu akun di konfirmasi oleh pangkalan! </div>');
					redirect('auth');
				}
				else
				{
					$this->db->delete('relawan', ['email' => $email]);
					$this->db->delete('draf_keahlian_relawan', ['id_relawan' => $user['id_relawan']]);
					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Akun sudah tidak terdaftar! proses verifikasi sudah melebihi batas waktu yang ditentukan.</div>');
					redirect('auth');
				}
			}
			else
			{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Akun gagal di aktivasi! Token tidak sesuai.</div>');
				redirect('auth');
			}
		}
		else
		{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Akun gagal di aktivasi! Email tidak terdaftar.</div>');
			redirect('auth');
		}
	}
	// akhir fungsi verifikasi email akun

	
	public function get_kota()
	{
		$this->load->model('Authentikasi');
		$id_provinsi_terpilih = $_POST['id_provinsi'];
		$data_distrik = $this->Authentikasi->get_distrik($id_provinsi_terpilih);


		echo "<option value=''>--Pilih Kabupaten/Kota--</option>";

		foreach ($data_distrik as $key => $distrik) 
		{                        
			echo "<option value='".$distrik['id_kota']."' id_kota='".$distrik['id_kota']."' type='".$distrik['type']."' nama_kota='".$distrik['nama_kota']."' id_provinsi='".$distrik['id_provinsi']."'>";
			if ($distrik['type'] == 'Kabupaten') 
			{
				echo "Kab".". ".$distrik['nama_kota'];
			} 
			else{
				echo $distrik['type'].". ".$distrik['nama_kota']; 
			}
			echo "</option>";
		}

	}

	public function get_provinsi()
	{
		$this->load->model('Authentikasi');
		$data_provinsi = $this->Authentikasi->get_provinsi();


		echo "<option value=''>--Pilih provinsi--</option>";

		foreach ($data_provinsi as $key => $provinsi) 
		{                        
			echo "<option value='".$provinsi['id_provinsi']."' id_provinsi='".$provinsi['id_provinsi']."'>";
			echo $provinsi['nama_provinsi'];
			echo "</option>";
		}
	}
	
	

	public function block()
	{
		$data['heading'] = 'Error';
		$data['message'] = 'error 404!';
		$this->load->view('errors/session_habis', $data);

	}




	public function referensi_kota()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=35",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: 58f3ac3f2fa20ed58abcc32dc1b4e6f1"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$array_response = json_decode($response,TRUE);
			$data_distrik = $array_response['rajaongkir']['results'];

		}

		foreach ($data_distrik as $data) {
			$id_kota =$data['city_id'];
			$type = $data['type'];
			$nama_kota = $data['city_name'];
			$id_provinsi =$data['province_id'];

			$data_input = [
				'id_kota' => $id_kota,
				'type' => $type,
				'nama_kota' => $nama_kota,
				'id_provinsi' => "35"
			];

			$this->db->insert('kota', $data_input);
			print_r($data_input); echo "<br>";
		}
		echo "selesai";
	}


	// fungsi untuk pendaftaran relawan/volunter 
	public function  form_daftar_relawan()
	{
		// syntax untuk membuata supaya user yang sudah login tidak bisa kembali ke halaman login melalui "ubah URL"
		if($this->session->userdata('id_relawan'))
		{	
			redirect('relawan');
		}
		
		// end
		else
		{	
			$this->load->model('Authentikasi');
			// $data['provinsi'] = $this->Authentikasi->get_provinsi();
			// $data['distrik'] = $this->Authentikasi->get_distrik();
			$data['keahlian'] = $this->Authentikasi->get_keahlian();
			$data['komisariat'] = $this->Authentikasi->get_komisariat();
			$data['title'] = "Form Pendaftaran (Relawan)";
			
			$this->load->view('auth/header2', $data);
			$this->load->view('auth/form_daftar_relawan');
			$this->load->view('auth/footer', $data);
			
		}
	} 

	public function formulir_relawan()
	{
		// syntax untuk membuata supaya user yang sudah login tidak bisa kembali ke halaman login melalui "ubah URL"
		if($this->session->userdata('id_relawan'))
		{	
			redirect('relawan');
		}
		// end
		else
		{	
			$this->load->model('Authentikasi');
			
			// aturan tambahan pada kolom input untuk validasi
			$this->form_validation->set_rules('email', 'Email', 'trim|is_unique[relawan.email]', ['is_unique' => 'Alamat email sudah terdaftar!']);
			$this->form_validation->set_rules('pangkalan', 'Pangkalan', 'trim');
			$this->form_validation->set_rules('namaDepan', 'Nama Depan','trim');
			$this->form_validation->set_rules('namaBelakang', 'Nama Belakang', 'trim');
			$this->form_validation->set_rules('nik', 'NIK', 'trim|is_unique[relawan.nik]', ['is_unique' => 'NIK sudah terdaftar/digunakan!']);
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin','trim');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir','trim');
			$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim');
			$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim');
			$this->form_validation->set_rules('kota', 'Kota', 'trim');
			$this->form_validation->set_rules('kec', 'Kecamatan', 'trim');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim');
			$this->form_validation->set_rules('hp', 'no. hp', 'trim|is_unique[relawan.no_hp]', ['is_unique' => 'no.hp sudah terdaftar/digunakan!']);
			$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim');
			$this->form_validation->set_rules('keahlian_tik', 'Keahlian TIK', 'trim');
			$this->form_validation->set_rules('level_komp', 'Level Kompetensi', 'trim');
			$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim');
			$this->form_validation->set_rules('username', 'Username', 'trim|is_unique[relawan.username]', [
				'is_unique' => 'Username sudah digunakan!']);
			$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|matches[password2]', ['matches' => 'Password tidak sama!']);
			$this->form_validation->set_rules('password2', 'Password2', 'required|trim|min_length[8]');
			

			$email = htmlspecialchars($this->input->post('email', true));  
			$komisariat = htmlspecialchars($this->input->post('pangkalan', true));  
			$namaDepan = htmlspecialchars($this->input->post('namaDepan', true));
			$namaBelakang = htmlspecialchars($this->input->post('namaBelakang', true)); 
			$nik = htmlspecialchars($this->input->post('nik', true));  
			$jk = htmlspecialchars($this->input->post('jenis_kelamin', true)); 
			$tempat_lahir = htmlspecialchars($this->input->post('tempat_lahir', true)); 
			$tgl_lahir = htmlspecialchars($this->input->post('tgl_lahir', true)); 
			$provinsi = htmlspecialchars($this->input->post('provinsi', true));  
			$kota = htmlspecialchars($this->input->post('kota', true)); 
			$kecamatan = htmlspecialchars($this->input->post('kec', true));  
			$alamat = htmlspecialchars($this->input->post('alamat', true));  
			$no = htmlspecialchars($this->input->post('hp', true));  
			$pendidikan = htmlspecialchars($this->input->post('pendidikan', true)); 
			$keahlian_tik = $this->input->post('keahlian_tik', true);  
			$keahlian_lain = htmlspecialchars($this->input->post('keahlian_lain', true));  
			$level_kompetensi = htmlspecialchars($this->input->post('level_komp', true));  
			$pekerjaan = htmlspecialchars($this->input->post('pekerjaan', true));  
			$username = htmlspecialchars($this->input->post('username', true));  
			$password = htmlspecialchars($this->input->post('password', true));  
			$password2 = htmlspecialchars($this->input->post('password2', true));  
			


			if ($this->form_validation->run() == false)
			{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Akun gagal di buat, harap mengisi data dengan benar! </div>');
				$this->load->model('Authentikasi');
				$data['keahlian'] = $this->Authentikasi->get_keahlian();
				$data['komisariat'] = $this->Authentikasi->get_komisariat();
				$data['title'] = "Form Pendaftaran (Relawan)";
				
				$this->load->view('auth/header2', $data);
				$this->load->view('auth/form_daftar_relawan');
				$this->load->view('auth/footer', $data);

			}
			else
			{	
				$tahun = date("Y");
				$id_provinsi = htmlspecialchars($this->input->post('provinsi', true));
				$id_kota = htmlspecialchars($this->input->post('kota', true));
				$index = date("mdGis");
				$id_relawan = $tahun.$id_provinsi.$id_kota.$komisariat.$index;
				$nama_lengkap = $namaDepan." ".$namaBelakang;

				$id_card = $_FILES['id_card']['name'];
				
				if($id_card)
				{
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['max_size']     = '2048';
					$config['upload_path'] = './assets/img/relawan/id_card/';
					

					$this->load->library('upload', $config);

					if($this->upload->do_upload('id_card'))
					{
						
						$id_berkas = $this->upload->data('file_name');
						
					}
					else
					{
						$id_berkas = 'default_id_card.jpg';
					}

				}
				

				
				$data = [
					'id_relawan' 	=> $id_relawan,
					'username' 		=> $username,
					'nama_lengkap' 	=> $nama_lengkap,
					'jenis_kelamin' => $jk,
					'tempat_lahir' 	=> $tempat_lahir,
					'tgl_lahir' 	=> $tgl_lahir,
					'provinsi' 		=> $provinsi,
					'kota' 			=> $kota,
					'kecamatan' 	=> $kecamatan,
					'komisariat' 	=> $komisariat,
					'registrasi' 	=> "none",
					'id_card'		=> $id_berkas,
					'alamat_lengkap'=> $alamat,
					'no_hp' 		=> $no,
					'email' 		=> $email,
					'keahlian_lain' => $keahlian_lain,
					'pekerjaan' 	=> $pekerjaan,
					'pendidikan_terakhir' => $pendidikan,
					'nik' 			=> $nik,
					'thn_anggota' 	=> "",
					'jabatan_di_rtik' => "belum di atur!",
					'image' 		=> "default_image.jpg",
					'password' 		=> base64_encode($password),
					'is_active' 	=> '0'
				];

				// siapkan token untuk aktivasi
				$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$kode = substr(str_shuffle($permitted_chars), 0, 16);
				$id = substr(str_shuffle($permitted_chars), 0, 6);
				$token = date('YmdHis').$kode;
				$user_token = [
					'id'	=> date('YmdHis').$id,
					'email'	=> $email,
					'token' => $token,
					'date_created' => time()
				];


				$this->db->insert('relawan', $data);
				$this->db->insert('user_token', $user_token);

				$akun = $this->Authentikasi->ambil_data_relawan($username,$password,$email,$no);
				
				$i = 0;
				foreach ($keahlian_tik as $k_tik) 
				{
					$data_keahlian_tik = [
						'id_draf' 		=> date('YmdGis').$i,
						'id_relawan' 	=> $akun['id_relawan'],
						'id_keahlian'	=> $k_tik,
						'level_kompetensi'=> $level_kompetensi
					];
					$this->db->insert('draf_keahlian_relawan', $data_keahlian_tik);
					$i++;
				}

				$this->_sendEmail($token, 'verifikasi', $nama_lengkap);

				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Akun anda sudah berhasil di buat. Silahkan lakukan verifikasi email! </div>');
				redirect('auth');
			}		
		}
	}


	public function form_daftar_instruktur()
	{
		// syntax untuk membuata supaya user yang sudah login tidak bisa kembali ke halaman login melalui "ubah URL"
		
		$this->load->model('Authentikasi');
			// $data['provinsi'] = $this->Authentikasi->get_provinsi();
			// $data['distrik'] = $this->Authentikasi->get_distrik();
		$data['title'] = "Form Pendaftaran (Instruktur)";

		$this->load->view('auth/header2', $data);
		$this->load->view('auth/form_daftar_instruktur');
		$this->load->view('auth/footer', $data);

	}

	public function formulir_instruktur()
	{
		// syntax untuk membuata supaya user yang sudah login tidak bisa kembali ke halaman login melalui "ubah URL"
		if($this->session->userdata('id_relawan'))
		{	
			redirect('relawan');
		}
		// end
		else
		{	
			$this->load->model('Authentikasi');
			
			// aturan tambahan pada kolom input untuk validasi
			$this->form_validation->set_rules('email', 'Email', 'trim|is_unique[instruktur.email]', ['is_unique' => 'Alamat email sudah terdaftar!']);
			$this->form_validation->set_rules('namaDepan', 'Nama Depan','trim');
			$this->form_validation->set_rules('namaBelakang', 'Nama Belakang', 'trim');
			
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin','trim');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir','trim');
			$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim');
			$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim');
			$this->form_validation->set_rules('kota', 'Kota', 'trim');
			$this->form_validation->set_rules('hp', 'no. hp', 'trim|is_unique[instruktur.no_hp]', ['is_unique' => 'no.hp sudah terdaftar/digunakan!']);

			$this->form_validation->set_rules('profesi', 'Profesi', 'trim');
			$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|matches[password2]', ['matches' => 'Password tidak sama!']);
			$this->form_validation->set_rules('password2', 'Password2', 'required|trim|min_length[8]');
			

			$email = htmlspecialchars($this->input->post('email', true));   
			$namaDepan = htmlspecialchars($this->input->post('namaDepan', true));
			$namaBelakang = htmlspecialchars($this->input->post('namaBelakang', true)); 
			$jk = htmlspecialchars($this->input->post('jenis_kelamin', true)); 
			$tempat_lahir = htmlspecialchars($this->input->post('tempat_lahir', true)); 
			$tgl_lahir = htmlspecialchars($this->input->post('tgl_lahir', true)); 
			$provinsi = htmlspecialchars($this->input->post('provinsi', true));  
			$kota = htmlspecialchars($this->input->post('kota', true)); 
			$no = htmlspecialchars($this->input->post('hp', true));  
			$profesi = htmlspecialchars($this->input->post('profesi', true));  
			$password = htmlspecialchars($this->input->post('password', true));  
			$password2 = htmlspecialchars($this->input->post('password2', true));  
			// echo $password.' - '.$password2;


			if ($this->form_validation->run() == false)
			{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Akun gagal di buat, harap mengisi data dengan benar! </div>');
				$this->load->model('Authentikasi');
				$data['title'] = "Form Pendaftaran (Relawan)";
				
				$this->load->view('auth/header2', $data);
				$this->load->view('auth/form_daftar_instruktur');
				$this->load->view('auth/footer', $data);

			}
			else
			{	
				$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$kode = substr(str_shuffle($permitted_chars), 0, 5);
				$tahun = date("Y");
				$id_provinsi = htmlspecialchars($this->input->post('provinsi', true));
				$id_kota = htmlspecialchars($this->input->post('kota', true));
				$index = date("mdGis");
				$id_instruktur = $tahun.$id_provinsi.$id_kota.$kode;
				$nama_lengkap = $namaDepan." ".$namaBelakang;

				

				
				$data = [
					'id_instruktur' => $id_instruktur,
					'nama' 			=> $nama_lengkap,
					'jenis_kelamin' => $jk,
					'no_hp' 		=> $no,
					'email' 		=> $email,
					'image' 		=> "default_image.jpg",
					'profesi' 		=> $profesi,
					'tempat_lahir' 	=> $tempat_lahir,
					'tgal_lahir' 	=> $tgl_lahir,
					'id_kota' 		=> $kota,
					'password' 		=> base64_encode($password),
					'role_id' 		=> '0'
				];

				// print_r($data); die();
				
				$this->db->insert('instruktur', $data);
				$pesan = "'Hai <b>'.$nama_lengkap.'</b><br>Akun anda telah diajukan.<br> Harap menunggu email pemberitahuan selanjutnya ketika akun sudah di konfirmasi administrator. <br></a>'";

				$this->_sendEmail($pesan, 'akun_instruktur', $nama_lengkap);

				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Akun anda sudah berhasil di buat. Silahkan cek email pemberitahuan di email anda! </div>');
				redirect('auth');
			}		
		}
	}


	public function form_daftar_pangkalan()
	{
		// syntax untuk membuata supaya user yang sudah login tidak bisa kembali ke halaman login melalui "ubah URL"
		
		$this->load->model('Authentikasi');
		$data['title'] = "Form Pendaftaran (Pangkalan)";
		$data['template'] = $this->Authentikasi->get_template_pangkalan();
		
		$this->load->view('auth/header2', $data);
		$this->load->view('auth/form_daftar_pangkalan');
		$this->load->view('auth/footer', $data);
	}

	public function formulir_pangkalan()
	{
		$this->load->model('Authentikasi');
			
			// aturan tambahan pada kolom input untuk validasi
			$this->form_validation->set_rules('nama', 'Nama ','trim');
			$this->form_validation->set_rules('kontak', 'Kontak', 'trim');
			$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim');
			$this->form_validation->set_rules('kota', 'Kota', 'trim');
			$this->form_validation->set_rules('srt_tugas', 'Surat tugas', 'trim');
			$this->form_validation->set_rules('srt_kesediaan', 'Surat Kesediaan', 'trim');
			
			$this->form_validation->set_rules('email', 'Email', 'trim|is_unique[komisariat.email]', ['is_unique' => 'Alamat email sudah terdaftar!']);
			$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|matches[password2]', ['matches' => 'Password tidak sama!']);
			$this->form_validation->set_rules('password2', 'Password2', 'required|trim|min_length[8]');
			

			$email = htmlspecialchars($this->input->post('email', true));   
			$nama = htmlspecialchars($this->input->post('nama', true));
			$kontak = htmlspecialchars($this->input->post('kontak', true)); 
			$provinsi = htmlspecialchars($this->input->post('provinsi', true));  
			$kota = htmlspecialchars($this->input->post('kota', true));   
			$srt_tugas = htmlspecialchars($this->input->post('srt_tugas', true));   
			$srt_kesediaan = htmlspecialchars($this->input->post('srt_kesediaan', true)); 
			$password = htmlspecialchars($this->input->post('password', true));  
			$password2 = htmlspecialchars($this->input->post('password2', true));  
			// echo $password.' - '.$password2;


			if ($this->form_validation->run() == false)
			{ echo "gagal"; die();
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Akun gagal di buat, harap mengisi data dengan benar! </div>');
				$this->load->model('Authentikasi');
				$data['title'] = "Form Pendaftaran (Pangkalan)";
				$data['template'] = $this->Authentikasi->get_template_pangkalan();
		
				$this->load->view('auth/header2', $data);
				$this->load->view('auth/form_daftar_pangkalan');
				$this->load->view('auth/footer', $data);

			}
			else
			{	
				$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$kode = substr(str_shuffle($permitted_chars), 0, 4);
				$tahun = date("Y");
				
				$logo = $_FILES['logo']['name'];	
		
				if ($logo) 
				{
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size']     = '2048';
					$config['upload_path'] = './assets/img/komisariat/';
					$this->load->library('upload',$config);
					if (!$this->upload->do_upload('logo')) 
					{
						// pesan 
						$logo = "default_logo.png";
					} 
					else 
					{
						$logo = $this->upload->data('file_name');
					}
				}
				
				$data = [
					'id_komisariat' 	=> date('YmdHis').$kode,
					'nama_komisariat' 	=> $nama,
					'logo' 				=> $logo,
					'email' 			=> $email,
					'kontak' 			=> $kontak,
					'surat_komitmen' 	=> $srt_kesediaan,
					'surat_tugas' 		=> $srt_tugas,
					'id_kota' 			=> $kota,
					'ketua' 			=> '-',
					'foto_ketua' 		=> 'default_image.jpg',
					'password' 			=> base64_encode($password),
					'role_id' 			=> '0'
				];

				// print_r($data); die();
				
				$this->db->insert('komisariat', $data);
				$pesan = "'Hai <b>'.$nama.'</b><br>Akun pangkalan telah diajukan.<br> Harap menunggu email pemberitahuan selanjutnya ketika pengajuan akun sudah di konfirmasi administrator. <br></a>'";

				$this->_sendEmail($pesan, 'akun_pangkalan', $nama);

				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Akun anda sudah berhasil di buat. Silahkan cek pemberitahuan di email anda! </div>');
				redirect('auth');
			}		
	}




	public function unduh_template($template_dokumen)
	{
		$file = urldecode($template_dokumen);
		// echo "$file"; die();

			force_download('./assets/file/berkas/'.$file,NULL);
	}

}

?>