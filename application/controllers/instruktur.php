<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class instruktur  extends CI_Controller 

{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id_instruktur'))
		{	
			redirect('landingPage');
		}
		$this->load->model('Authentikasi');
		$this->load->model('Relawan_Model');
		$this->load->model('Admin_Model');
		$this->load->model('Instruktur_Model');
		

		$semua_event = $this->Admin_Model->get_event();
		
		// print_r($semua_event); die();
		
		foreach ($semua_event as $event) 
		{
			// cek awal registrasi != default
			if ($event['awal_registrasi'] != '0000-00-00 00:00:00') 
			{
				if ($event['akhir_registrasi'] != '0000-00-00 00:00:00') 
				{
					if ($event['awal_pembekalan'] != '0000-00-00 00:00:00') 
					{					
						if ($event['akhir_penilaian'] != '0000-00-00 00:00:00') 
						{
							if (strtotime($event['awal_registrasi']) >= strtotime(date('Y-m-d G:i:s'))) 
							{
								$data = [ 'role_id' => '0' ];
							}

							elseif (strtotime($event['awal_registrasi']) < strtotime(date('Y-m-d G:i:s')) && strtotime($event['akhir_registrasi']) > strtotime(date('Y-m-d G:i:s'))) 
							{
								$data = [ 'role_id' => '1' ];
							}

							elseif (strtotime($event['akhir_registrasi']) < strtotime(date('Y-m-d G:i:s')) && strtotime($event['akhir_penilaian']) > strtotime(date('Y-m-d G:i:s'))) 
							{
								$data = [ 'role_id' => '2' ];
							}

							elseif (strtotime($event['akhir_penilaian']) < strtotime(date('Y-m-d G:i:s'))) 
							{
								$data = [ 'role_id' => '3' ];
							}
							
						}
						else
						{
							if (strtotime($event['awal_registrasi']) >= strtotime(date('Y-m-d G:i:s'))) 
							{
								$data = [ 'role_id' => '0' ];
							}

							elseif (strtotime($event['awal_registrasi']) < strtotime(date('Y-m-d G:i:s')) && strtotime($event['akhir_registrasi']) > strtotime(date('Y-m-d G:i:s'))) 
							{
								$data = [ 'role_id' => '1' ];
							}

							elseif (strtotime($event['akhir_registrasi']) < strtotime(date('Y-m-d G:i:s'))) 
							{
								$data = [ 'role_id' => '2' ];
							}
						}
					}
					else
					{
						if (strtotime($event['awal_registrasi']) >= strtotime(date('Y-m-d G:i:s'))) 
						{
							$data = [ 'role_id' => '0' ];
						}

						elseif (strtotime($event['awal_registrasi']) < strtotime(date('Y-m-d G:i:s')) && strtotime($event['akhir_registrasi']) > strtotime(date('Y-m-d G:i:s'))) 
						{
							$data = [ 'role_id' => '1' ];
						}

						elseif (strtotime($event['akhir_registrasi']) < strtotime(date('Y-m-d G:i:s'))) 
						{
							$data = [ 'role_id' => '2' ];
						}
					}
				}
				else
				{
					$data = [ 'role_id' => '0' ];
				}
			}
			else
			{
				$data = [ 'role_id' => '0' ];
			}

			
			$this->db->set($data);
			$where = array( 'id_event' => $event['id_event'] );
			$this->db->where($where);
			$this->db->update('event');
		}	
		
	}

	public function alert_gagal($pesan)
	{
		// echo "$pesan"; die();
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-mg-b alert-success-style4 alert-st-bg3 alert-st-bg14 animated--grow-in show" style="background-color: white;">
			<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
			<span class="icon-sc-cl" aria-hidden="true">&times;</span>
			</button>
			<i class="fa fa-times edu-danger-error admin-check-pro admin-check-pro-clr3 admin-check-pro-clr14" aria-hidden="true"></i>
			<p><strong>'.$pesan.'!</strong></p>
			</div>');
	}

	public function alert_ok($pesan)
	{
		// echo "$pesan"; die();
		$this->session->set_flashdata('message','<div class="alert alert-success alert-success-style1 alert-st-bg alert-st-bg11 animated--grow-in show" style="background-color: white;">
			<button type="button" class="close success-op" data-dismiss="alert" aria-label="Close">
			<span class="icon-sc-cl" aria-hidden="true">&times;</span>
			</button>
			<i class="fa fa-check edu-checked-pro admin-check-pro admin-check-pro-clr admin-check-pro-clr11" aria-hidden="true"></i>
			<p><strong>'.$pesan.'!</strong></p>
			</div>');
	}


	public function alert_warning($pesan)
	{
		// echo "$pesan"; die();
		$this->session->set_flashdata('message','<div class="alert alert-warning alert-success-style3 alert-st-bg2 alert-st-bg13 animated--grow-in show" style="background-color: white;">
			<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
			<span class="icon-sc-cl" aria-hidden="true">&times;</span>
			</button>
			<i class="fa fa-exclamation-triangle edu-warning-danger admin-check-pro admin-check-pro-clr2 admin-check-pro-clr13" aria-hidden="true"></i>
			<p><strong>'.$pesan.'!</strong></p>
			</div>');
	}

	public function alert_info($pesan)
	{
		// echo "$pesan"; die();
		$this->session->set_flashdata('message','<div class="alert alert-info alert-success-style2 alert-st-bg1 alert-st-bg12 animated--grow-in show" style="background-color: white;">
			<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
			<span class="icon-sc-cl" aria-hidden="true">&times;</span>
			</button>
			<i class="fa fa-info-circle edu-inform admin-check-pro admin-check-pro-clr1 admin-check-pro-clr12" aria-hidden="true"></i>
			<p><strong>'.$pesan.'!</strong></p>
			</div>');
	}


	public function index()
	{
		$data['title']   = "Profil Instruktur";
		$id_instruktur 	 = $this->session->userdata('id_instruktur');
		$data['user'] 	= 'Instruktur';
		$data['instruktur'] = $this->Instruktur_Model->cek_instruktur_by_idinstruktur($id_instruktur);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();

		$this->load->view('template/header', $data);
		$this->load->view('instruktur/sidebar', $data);
		$this->load->view('instruktur/topbar', $data);
		$this->load->view('instruktur/profil', $data);
		$this->load->view('template/footer', $data);

	}

	public function edit_profil()
	{
		$data['title']   = "Edit Profil Instruktur";
		$id_instruktur 	 = $this->session->userdata('id_instruktur');
		$data['user'] 	= 'Instruktur';
		$data['instruktur'] = $this->Instruktur_Model->cek_instruktur_by_idinstruktur($id_instruktur); 
		$data['distrik'] = $this->Authentikasi->get_distrik($data['instruktur']['id_provinsi']);
		$data['data_provinsi'] = $this->Instruktur_Model->get_provinsi();
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();

		$this->load->view('template/header', $data);
		$this->load->view('instruktur/sidebar', $data);
		$this->load->view('instruktur/topbar', $data);
		$this->load->view('instruktur/edit_profil', $data);
		$this->load->view('template/footer', $data);

	}

	public function update_data($aksi,$id_instruktur)
	{
		$data['instruktur'] = $this->Instruktur_Model->cek_instruktur_by_idinstruktur($id_instruktur);
		
		if ($aksi == "akun") 
		{
			$this->form_validation->set_rules('email', 'Email', 'trim');
			
			$email = htmlspecialchars($this->input->post('email', true));  
			$cek_email = $this->Instruktur_Model->cek_email_instruktur($email);
			
			if ($this->form_validation->run() == false)
			{
				$pesan = "Akun gagal di perbaharui, harap mengisi data dengan benar";
				$this->alert_gagal($pesan);
				redirect('instruktur/edit_profil');

			}
			else
			{	 
				$image = $_FILES['foto']['name'];	

				if($image)
				{

					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size']      = '2048';
					$config['upload_path']   = './assets/img/instruktur/';

					

					$this->load->library('upload',$config);
					if ($this->upload->do_upload('foto')) 
					{
						$old_image = $data['instruktur']['image'];
						// echo "$old_image"; die();
						
						if($old_image != 'default_image.jpg')
						{
							unlink(FCPATH . 'assets/img/instruktur/' . $old_image);
						}
						$new_image = $this->upload->data('file_name');
						$this->db->set('image', $new_image);

					}

					else if ($_FILES['foto']['size'] >= '2048') 
					{
						$pesan = "Ukuran dokumen yang diunggah melebihi batas (2MB), dokumen gagal di upload";
						$this->alert_gagal($pesan);
						redirect('instruktur/edit_profil');
					}
					
					$where = array('id_instruktur' => $id_instruktur );
					$this->db->where($where);
					$this->db->update('instruktur');

					$pesan = "Image sudah berhasil diperbaharui";
					$this->alert_ok($pesan);					
				}

				// jika tidak ada image yang di upload
				else
				{
					if ($cek_email == '0') 
					{
						$data = [
							'email' 	=> $email
						];

						$this->db->set($data);
						$this->db->where('id_instruktur', $id_instruktur);
						$this->db->update('instruktur');

						$pesan = "Akun anda sudah berhasil diperbaharui";
						$this->alert_ok($pesan);
					}
					else
					{
						$pesan = "Alamat email sudah digunakan";
						$this->alert_gagal($pesan);
					}

				}

				redirect('instruktur/edit_profil');
			}

			
		}



		elseif ($aksi == 'hapus_foto')
		{
			$old_image = $data['instruktur']['image'];
			
			if($old_image != 'default_image.jpg')
			{
				unlink(FCPATH . 'assets/img/instruktur/' . $old_image);
			}

			$this->db->set('image', 'default_image.jpg');
			$where = array('id_instruktur' => $data['instruktur']['id_instruktur'] );
			$this->db->where($where);
			$this->db->update('instruktur');

			$pesan = "Foto Profil berhasil di hapus";
			$this->alert_ok($pesan);
			redirect('instruktur/edit_profil');
		}


		elseif ($aksi == "biodata") 
		{
			
			$this->form_validation->set_rules('nama', 'Nama', 'trim');
			$this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'trim');
			$this->form_validation->set_rules('tgal_lahir', 'tgal_lahir', 'trim');
			$this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'trim');
			$this->form_validation->set_rules('no_hp', 'no_hp', 'trim');
			$this->form_validation->set_rules('profesi', 'profesi', 'trim');
			$this->form_validation->set_rules('kota', 'kota', 'trim');
			$this->form_validation->set_rules('provinsi', 'provinsi', 'trim');



			$nama = htmlspecialchars($this->input->post('nama', true));   
			$tempat_lahir = htmlspecialchars($this->input->post('tempat_lahir', true));    
			$tgal_lahir = htmlspecialchars($this->input->post('tgal_lahir', true));    
			$jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin', true));    
			$no_hp = htmlspecialchars($this->input->post('no_hp', true));    
			$profesi = htmlspecialchars($this->input->post('profesi', true));    
			$kota = htmlspecialchars($this->input->post('kota', true));    
			$provinsi = htmlspecialchars($this->input->post('provinsi', true)); 


			if ($this->form_validation->run() == false)
			{
				$pesan = "Biodata gagal di perbaharui, harap mengisi data dengan benar";
				$this->alert_gagal($pesan);
				redirect('instruktur/edit_profil/#bio');

			}
			else
			{
				$data2 = [
					'nama'			=> $nama,
					'jenis_kelamin'	=> $jenis_kelamin,
					'no_hp'			=> $no_hp,
					'profesi'		=> $profesi,
					'tempat_lahir'	=> $tempat_lahir,
					'tgal_lahir'	=> $tgal_lahir,
					'id_kota'		=> $kota
				];

				// print_r($data2); die();
				$this->db->set($data2);
				$where = array('id_instruktur' => $id_instruktur );
				$this->db->where($where);
				$this->db->update('instruktur');

				$pesan = "Biodata telah di perbaharui";
				$this->alert_ok($pesan);
				redirect('instruktur/edit_profil/#bio');
			}	 

		}
		
		elseif ($aksi == "ubah_password") 
		{
			$this->form_validation->set_rules('passwordlama', 'Password lama', 'trim');
			$this->form_validation->set_rules('passwordbaru', 'Password baru', 'trim');
			$this->form_validation->set_rules('passwordbaru2', 'Verifikasi Password', 'trim');


			$passwordlama = htmlspecialchars($this->input->post('passwordlama', true));  
			$passwordbaru = htmlspecialchars($this->input->post('passwordbaru', true));
			$passwordbaru2 = htmlspecialchars($this->input->post('passwordbaru2', true));

			if ($this->form_validation->run() == false)
			{
				$pesan = "Password gagal di perbaharui, harap mengisi data dengan benar";
				$this->alert_gagal($pesan);
				redirect('instruktur/edit_profil');

			}
			else
			{	
				if ($passwordlama != base64_decode($data['instruktur']['password'])) {
					$pesan = "Password lama tidak sesuai";
					$this->alert_gagal($pesan);
					redirect('instruktur/edit_profil');
				}
				elseif ($passwordbaru != $passwordbaru2) {
					$pesan = "Password baru tidak sama, harap input password baru dengan benar";
					$this->alert_gagal($pesan);
					redirect('instruktur/edit_profil');
				}
				else{
					$password_baru3 = base64_encode($passwordbaru);

					$this->db->set('password',$password_baru3);
					$this->db->where('id_instruktur', $id_instruktur);
					$this->db->update('instruktur');

					$pesan = "Password berhasil di perbaharui";
					$this->alert_ok($pesan);
					redirect('instruktur/edit_profil');
				}
				
			}
		}

		elseif ($aksi == "hapus_akun") 
		{

			$this->db->delete('instruktur', array('id_instruktur' => $id_instruktur));
			$this->db->delete('materi', array('id_instruktur' => $id_instruktur));		

			if ($data['instruktur']['image'] != 'default_image.jpg') 
			{
				$this->db->delete('berkas', array('id_berkas' => $data['instruktur']['image']));
			}	


			$data = ['id_instruktur' 	=> '0'];

			$this->db->set($data);
			$where = array('id_instruktur' => $id_instruktur);
			$this->db->where($where);
			$this->db->update('pembekalan');

			$pesan = "Data instruktur telah di hapus";
			$this->alert_ok($pesan);
			redirect('logout/hapus_akun');
			

		}
	}

	public function materi()
	{
		$data['title']   = "Data Materi";
		$id_instruktur 	 = $this->session->userdata('id_instruktur');
		$data['user'] 	= 'Instruktur';
		$data['instruktur'] = $this->Instruktur_Model->cek_instruktur_by_idinstruktur($id_instruktur);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['materi'] = $this->Instruktur_Model->get_materi_instruktur_by_idinstruktur($id_instruktur);

		// print_r($data['materi']); die();
		$this->load->view('template/header_dataTable', $data);
		$this->load->view('instruktur/sidebar', $data);
		$this->load->view('instruktur/topbar', $data);
		$this->load->view('instruktur/materi', $data);
		$this->load->view('template/footer_dataTable', $data);
	}

	public function aksi_materi($aksi,$id_materi)
	{
		// echo "$id_materi"; die();
		if ($aksi == 'tambah') 
		{
			$this->form_validation->set_rules('nama', 'nama', 'trim');
			$this->form_validation->set_rules('url', 'url', 'trim');
			
			$nama = htmlspecialchars($this->input->post('nama', true));   
			$url = htmlspecialchars($this->input->post('url', true));  


			if ($this->form_validation->run() == false)
			{
				$pesan = "Biodata gagal di perbaharui, harap mengisi data dengan benar";
				$this->alert_gagal($pesan);
				redirect('instruktur/materi');

			}
			else
			{
				$id_instruktur 	 = $this->session->userdata('id_instruktur');
				$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$date = date('YmdGis');
				$kode = substr(str_shuffle($permitted_chars), 0, 3);

				$data2 = [
					'id_materi'		=> $date.$kode,
					'id_instruktur'	=> $id_instruktur,
					'nama_materi'	=> $nama,
					'url_materi'	=> $url
				];

					// print_r($data2); die();
				$this->db->insert('materi', $data2);

				$pesan = "Materi baru berhasil di tambahkan";
				$this->alert_ok($pesan);
			}
			
		}

		elseif ($aksi == 'ubah') 
		{
			$this->form_validation->set_rules('nama', 'nama', 'trim');
			$this->form_validation->set_rules('url', 'url', 'trim');
			
			$nama = htmlspecialchars($this->input->post('nama', true));   
			$url = htmlspecialchars($this->input->post('url', true));  


			if ($this->form_validation->run() == false)
			{
				$pesan = "Biodata gagal di perbaharui, harap mengisi data dengan benar";
				$this->alert_gagal($pesan);
				redirect('instruktur/materi');

			}
			else
			{
				
				$data2 = [
					'nama_materi'	=> $nama,
					'url_materi'	=> $url
				];

				$this->db->set($data2);
				$where = array('id_materi' => $id_materi);
				$this->db->where($where);
				$this->db->update('materi');

				$pesan = "Data materi berhasil di perbaharui";
				$this->alert_ok($pesan);
			}
		}

		elseif ($aksi == 'hapus') 
		{			
			$this->db->delete('materi', array('id_materi' => $id_materi));
			$pesan = "Materi berhasil dihapus";
			$this->alert_ok($pesan);
		}
		
		redirect('instruktur/materi');
	}


	public function pembekalan()
	{
		$data['title']   = "Acara Pembekalan";
		$id_instruktur 	 = $this->session->userdata('id_instruktur');
		$data['user'] 	= 'Instruktur';
		$data['instruktur'] = $this->Instruktur_Model->cek_instruktur_by_idinstruktur($id_instruktur);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['pembekalan'] = $this->Instruktur_Model->get_acara_pembekalan_by_idinstruktur($id_instruktur);

		// print_r($data['pembekalan']); die();
		$this->load->view('template/header_dataTable', $data);
		$this->load->view('instruktur/sidebar', $data);
		$this->load->view('instruktur/topbar', $data);
		$this->load->view('instruktur/pembekalan', $data);
		$this->load->view('template/footer_dataTable', $data);
	}


	public function aksi_acara_pembekalan($aksi,$id)
	{
		if ($aksi == 'ubah') 
		{
			$this->form_validation->set_rules('link', 'link', 'trim');

			$link = htmlspecialchars($this->input->post('link', true));  


			if ($this->form_validation->run() == false)
			{
				$pesan = "link materi pembekalan gagal diperbaharui, harap mengisi data dengan benar";
				$this->alert_gagal($pesan);

			}
			else
			{
				
				$data2 = [
					'link_materi'	=> $link
				];

				$this->db->set($data2);
				$where = array('id_pembekalan' => $id);
				$this->db->where($where);
				$this->db->update('pembekalan');

				$pesan = "link materi pembekalan berhasil di perbaharui";
				$this->alert_ok($pesan);
			}
		}

		redirect('instruktur/pembekalan');
	}

	public function sertifikat($id_pembekalan)
	{
		$id_instruktur 	 	= $this->session->userdata('id_instruktur');
		$data['user'] 		= 'Instruktur';
		$data['instruktur'] = $this->Instruktur_Model->cek_instruktur_by_idinstruktur($id_instruktur);
		
		$data['pembekalan'] = $this->Instruktur_Model->get_acara_pembekalan_by_id_pembekelan($id_pembekalan);
		$data['template_sertifikat'] 	= $this->Relawan_Model->get_template_sertifikat_by_id_event($data['pembekalan']['id_event']);
		// print_r($data['template_sertifikat']); die();

		$this->load->view('sertifikat/instruktur', $data);
	}


	public function get_kota()
	{
		$this->load->model('Authentikasi');
		$id_provinsi_terpilih = $_POST['id_provinsi'];
		$data_distrik = $this->Authentikasi->get_distrik($id_provinsi_terpilih);

		$id_instruktur 	 = $this->session->userdata('id_instruktur');
		$data['user'] 	 = 'Instruktur';
		$data['instruktur'] = $this->Instruktur_Model->cek_instruktur_by_idinstruktur($id_instruktur);


		echo "<option value=''>--Pilih Kabupaten/Kota--</option>";

		foreach ($data_distrik as $key => $distrik) 
		{                        
			echo "<option value='".$distrik['id_kota']."' id_kota='".$distrik['id_kota']."' type='".$distrik['type']."' nama_kota='".$distrik['nama_kota']."' id_provinsi='".$distrik['id_provinsi']."' ";
			if ($data['instruktur']['id_kota'] == $distrik['id_kota']) {
				echo "selected";
			}
			echo ">";

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

		$id_instruktur 	 = $this->session->userdata('id_instruktur');
		$data['user'] 	 = 'Instruktur';
		$data['instruktur'] = $this->Instruktur_Model->cek_instruktur_by_idinstruktur($id_instruktur);

		echo "<option value=''>--Pilih provinsi--</option>";

		foreach ($data_provinsi as $key => $provinsi) 
		{                        
			echo "<option value='".$provinsi['id_provinsi']."' id_provinsi='".$provinsi['id_provinsi']."' ";
			if ($data['instruktur']['id_provinsi'] == $provinsi['id_provinsi']) {
				echo "selected";
			}
			echo ">";
			echo $provinsi['nama_provinsi'];
			echo "</option>";
		}
	}


}