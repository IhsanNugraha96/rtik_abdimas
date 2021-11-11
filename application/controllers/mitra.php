<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mitra  extends CI_Controller 

{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id_mitra'))
		{	
			redirect('LandingPage');
		}
		$this->load->model('Relawan_Model');
		$this->load->model('Admin_Model');
		$this->load->model('Mitra_Model');
		$this->load->model('Authentikasi');


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


	public function index()
	{
		$this->load->model('Admin_Model');

		$data['title']   	= "Profil Mitra";
		$id_mitra 	 		= $this->session->userdata('id_mitra');
		$data['user'] 		= 'Mitra';
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['mitra'] 		= $this->Mitra_Model->cek_mitra_by_id_mitra($id_mitra);
		$data['komisariat'] = $this->Mitra_Model->get_komisariat($data['mitra']['id_komisariat']);
		$data['event'] = $this->Admin_Model->get_event();
// print_r($data['event']). die();
		$this->load->view('template/header', $data);
		$this->load->view('mitra/sidebar', $data);
		$this->load->view('mitra/topbar', $data);
		$this->load->view('mitra/profil', $data);
		$this->load->view('template/footer', $data);
		
	}


	public function edit_profil()
	{
		$this->load->model('Admin_Model');
		$data['title']   	= "Edit Profil Mitra";
		$id_mitra 	 		= $this->session->userdata('id_mitra');
		$data['user'] 		= 'Mitra';
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['mitra'] 		= $this->Mitra_Model->cek_mitra_by_id_mitra($id_mitra);
		$data['komisariat'] = $this->Mitra_Model->get_komisariat($data['mitra']['id_komisariat']);
		$data['id_kota'] 	= $data['mitra']['id_kota'];
		$data['distrik'] 	= $this->Authentikasi->get_distrik($data['mitra']['id_provinsi']);
		$data['event'] = $this->Admin_Model->get_event();

		$this->load->view('template/header', $data);
		$this->load->view('mitra/sidebar', $data);
		$this->load->view('mitra/topbar', $data);
		$this->load->view('mitra/edit_profil', $data);
		$this->load->view('template/footer', $data);
		
	}

	public function update_data($aksi,$id_mitra)
	{
		
		$data_mitra = $this->Mitra_Model->cek_mitra_by_id_mitra($id_mitra);
		
		if ($aksi == "akun") 
		{
			$this->form_validation->set_rules('email', 'Email', 'trim');
			
			$email = htmlspecialchars($this->input->post('email', true));  
			$cek_email = $this->Mitra_Model->cek_email($email);
			// echo "$cek_email"; die();
			
				if ($this->form_validation->run() == false)
				{
					$pesan = "Akun gagal di perbaharui, harap mengisi data dengan benar";
					$this->alert_gagal($pesan);
					redirect('Mitra/edit_profil');

				}
				else
				{	 
					$image = $_FILES['foto']['name'];	

					if($image)
					{
						
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$config['max_size']      = '2048';
						$config['upload_path']   = './assets/img/mitra/';

						

						$this->load->library('upload',$config);
						if ($this->upload->do_upload('foto')) 
						{
							$old_image = $data_mitra['logo'];

							if($old_image != 'default_logo.png')
							{ 
								unlink(FCPATH . 'assets/img/mitra/' . $old_image);
							}

							$new_image = $this->upload->data('file_name');
							$this->db->set('logo', $new_image);

						}

						else if ($_FILES['foto']['size'] >= '2048') 
						{
							$pesan = "Ukuran dokumen yang diunggah melebihi batas (2MB), dokumen gagal di upload";
							$this->alert_gagal($pesan);
							redirect('Mitra/edit_profil');
						}
						
						$where = array('id_mitra' => $id_mitra );
						$this->db->where($where);
						$this->db->update('mitra');

						$pesan = "Image sudah berhasil diperbaharui";
						$this->alert_ok($pesan);					
					}

					// jika tidak ada image yang di upload
					else
					{
						if ($cek_email == '0') 
						{

							$data = [
								'email_koordinator' 	=> $email
							];
							// print_r($data); die();
							$this->db->set($data);
							$this->db->where('id_mitra', $id_mitra);
							$this->db->update('mitra');
							$pesan = "Akun anda sudah berhasil diperbaharui";
							$this->alert_ok($pesan);
						}
						elseif ($email == $data_mitra['email_koordinator']) 
						{
							$data = [
								'email_koordinator' 	=> $email
							];
							// print_r($data); die();
							$this->db->set($data);
							$this->db->where('id_mitra', $data_mitra['id_mitra']);
							$this->db->update('mitra');
							
							$pesan = "Tidak ada yang diperbaharui!";
							$this->alert_info($pesan);
						}
						else
						{
							$pesan = "Alamat email sudah digunakan";
							$this->alert_gagal($pesan);
						}
								
					}
				}
			

			redirect('Mitra/edit_profil');
		}


		elseif ($aksi == 'hapus_foto')
		{

			$old_image = $data_mitra['logo'];
			if ($old_image != 'default_logo.png') 
			{
				unlink(FCPATH . 'assets/img/mitra/' . $old_image);
			}
			

			$this->db->set('logo', 'default_logo.png');
			$where = array('id_mitra' => $data_mitra['id_mitra'] );
			$this->db->where($where);
			$this->db->update('mitra');

			$pesan = "Foto Profil berhasil di hapus";
			$this->alert_ok($pesan);
			redirect('Mitra/edit_profil');
		}


		elseif ($aksi == "pimpinan") 
		{
			
			$this->form_validation->set_rules('nama', 'Nama', 'trim');
			$this->form_validation->set_rules('email_pimpinan', 'Email ', 'trim');
			$this->form_validation->set_rules('no_hp_pimpinan', 'No Hp', 'trim');
			$this->form_validation->set_rules('jabatan_pimpinan', 'Jabatan', 'trim');
			$this->form_validation->set_rules('nama_koordinator', 'Koordinator', 'trim');
			$this->form_validation->set_rules('email_koordinator', 'jabatan', 'trim');
			$this->form_validation->set_rules('no_hp_koordinator', 'kecamatan', 'trim');
			$this->form_validation->set_rules('jabatan_koordinator', 'alamat_rumah', 'trim');



			$nama_pimpinan 		= htmlspecialchars($this->input->post('nama', true));      
			$email_pimpinan 	= htmlspecialchars($this->input->post('email_pimpinan', true));    
			$no_hp_pimpinan 	= htmlspecialchars($this->input->post('no_hp_pimpinan', true));    
			$jabatan_pimpinan 	= htmlspecialchars($this->input->post('jabatan_pimpinan', true));    
			$nama_koordinator 	= htmlspecialchars($this->input->post('nama_koordinator', true));
			$email_koordinator 	= htmlspecialchars($this->input->post('email_koordinator', true));   
			$no_hp_koordinator 	= htmlspecialchars($this->input->post('no_hp_koordinator', true));   
			$jabatan_koordinator= htmlspecialchars($this->input->post('jabatan_koordinator', true));    
			

			if ($this->form_validation->run() == false)
			{
				$pesan = "Biodata gagal di perbaharui, harap mengisi data dengan benar";
				$this->alert_gagal($pesan);
				redirect('Mitra/edit_profil');

			}
			else
			{
				$data2 = [
					'pimpinan'			=> $nama_pimpinan,
					'email_pimpinan'	=> $email_pimpinan,
					'no_hp_pimpinan'	=> $no_hp_pimpinan,
					'jabatan_pimpinan'	=> $jabatan_pimpinan,
					'koordinator'		=> $nama_koordinator,
					'email_koordinator'	=> $email_koordinator,
					'no_hp_koordinator'	=> $no_hp_koordinator,
					'jabatan_koordinator'=> $jabatan_koordinator
				];

				// print_r($data2); die();
				$this->db->set($data2);
				$where = array('id_mitra' => $id_mitra );
				$this->db->where($where);
				$this->db->update('mitra');

				$pesan = "Profil Pimpinan dan Koordinator telah di perbaharui";
				$this->alert_ok($pesan);
				redirect('Mitra/edit_profil');
			}	 

		}



		elseif ($aksi == "biodata") 
		{
			
			$this->form_validation->set_rules('nama', 'Nama', 'trim');
			$this->form_validation->set_rules('titik_koordinat', 'Titik koordinat ', 'trim');
			$this->form_validation->set_rules('profil', 'Profil', 'trim');
			$this->form_validation->set_rules('situs_web', 'Situs web', 'trim');
			$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim');
			$this->form_validation->set_rules('kota', 'Kota', 'trim');
			$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim');
			$this->form_validation->set_rules('alamat', 'alamat rumah', 'trim');



			$nama_mitra 		= htmlspecialchars($this->input->post('nama', true));      
			$titik_koordinat 	= htmlspecialchars($this->input->post('titik_koordinat', true));    
			$profil 			= htmlspecialchars($this->input->post('profil', true));    
			$situs_web 			= htmlspecialchars($this->input->post('situs_web', true));    
			$provinsi 			= htmlspecialchars($this->input->post('provinsi', true));
			$kota 				= htmlspecialchars($this->input->post('kota', true));   
			$kecamatan 			= htmlspecialchars($this->input->post('kecamatan', true));   
			$alamat 			= htmlspecialchars($this->input->post('alamat', true));    
			

			if ($this->form_validation->run() == false)
			{
				$pesan = "Biodata gagal di perbaharui, harap mengisi data dengan benar";
				$this->alert_gagal($pesan);
				redirect('Mitra/edit_profil');

			}
			else
			{
				$data2 = [
					'nama_mitra'	=> $nama_mitra,
					'alamat'		=> $alamat,
					'kecamatan'		=> $kecamatan,
					'id_kota'		=> $kota,
					'titik_koordinat'=> $titik_koordinat,
					'situs_web'		=> $situs_web,
					'profil_ringkas'=> $profil
				];

				// print_r($data2); die();
				$this->db->set($data2);
				$where = array('id_mitra' => $id_mitra );
				$this->db->where($where);
				$this->db->update('mitra');

				$pesan = "Profil Mitra telah di perbaharui";
				$this->alert_ok($pesan);
				redirect('Mitra/edit_profil');
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
				redirect('Mitra/edit_profil');

			}
			else
			{	
				if ($passwordlama != base64_decode($data_mitra['password'])) {
					$pesan = "Password lama tidak sesuai";
					$this->alert_gagal($pesan);
					redirect('Mitra/edit_profil');
				}
				elseif ($passwordbaru != $passwordbaru2) {
					$pesan = "Password baru tidak sama, harap input password baru dengan benar";
					$this->alert_gagal($pesan);
					redirect('Mitra/edit_profil');
				}
				else{
					$password_baru3 = base64_encode($passwordbaru);

					$this->db->set('password',$password_baru3);
					$this->db->where('id_mitra', $id_mitra);
					$this->db->update('mitra');

					$pesan = "Password berhasil di perbaharui";
					$this->alert_ok($pesan);
					redirect('Mitra/edit_profil');
				}
				
			}
		}


	}

 	
 	public function survey()
 	{
 		$this->load->model('Admin_Model');

		$data['title']   	= "Survey Program";
		$id_mitra 	 		= $this->session->userdata('id_mitra');
		$data['user'] 		= 'Mitra';
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['mitra'] 		= $this->Mitra_Model->cek_mitra_by_id_mitra($id_mitra);
		$id_tim 			= $data['mitra']['id_tim'];
		$data['komisariat'] = $this->Mitra_Model->get_komisariat($data['mitra']['id_komisariat']);
		$data['indikator_penilaian'] = $this->Mitra_Model->get_indikator_penilaian_mitra();
		$data['status_penilaian'] = $this->Mitra_Model->get_status_penilaian_mitra($id_tim);
		$data['kegiatan_berlangsung']		= $this->Mitra_Model->get_event($id_tim);
		$data['now'] = date('Y-m-d G:i:s');
		$data['event'] = $this->Admin_Model->get_event();
		// print_r($data['kegiatan_berlangsung']); die();

		$this->load->view('template/header', $data);
		$this->load->view('mitra/sidebar', $data);
		$this->load->view('mitra/topbar', $data);
		$this->load->view('mitra/survey', $data);
		$this->load->view('template/footer', $data);
 	}

 	public function penilaian_mitra($id_tim)
 	{
 		$data['tim'] 			= $this->Mitra_Model->get_tim_by_id_tim($id_tim);
 		$indikator_penilaian 	= $this->Mitra_Model->get_indikator_penilaian_mitra();
 		$jml_indikator_mitra 	= $this->Mitra_Model->get_jml_indikator_penilaian_mitra();
 		$id_kriteria 			= $indikator_penilaian[0]['id_kriteria'];
 		$data_persentase 		= $this->Mitra_Model->get_persentase_penilaian_mitra($id_kriteria);
 		$persentase 			= $data_persentase['persentase'];
 		$status_penilaian 		= $this->Mitra_Model->get_status_penilaian_mitra($id_tim);
 		$data['event'] = $this->Admin_Model->get_event();
		
 		// print_r($status_penilaian); die();
		$i=0;
		foreach ($indikator_penilaian as $idk) 
		{
			$this->form_validation->set_rules($idk['id_indikator'], 'Nilai', 'trim');
			$nilai[$i] = htmlspecialchars($this->input->post($idk['id_indikator'], true));
			$i++;
		}
		// print_r($nilai); die();

		if ($this->form_validation->run() == false)
		{
			$pesan = "Gagal merekam penilaian, harap mengisi data dengan benar";
			$this->alert_gagal($pesan);
			redirect('Mitra/survey');
		}

		else
		{	
			$total  = array_sum($nilai) / $jml_indikator_mitra;
			$nilai_akhir = number_format((($total*$persentase)/100), 2, '.', '');


			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$kode = substr(str_shuffle($permitted_chars), 0, 3);
			$id = date('YmdGis').$kode;

			if (!$status_penilaian) 
			{
				$data1 = array(
					'id_nilai_kinerja_tim' 	=> $id,
					'id_tim'				=> $data['tim']['id_tim'],
					'nilai_dokumen'			=> '',
					'nilai_mitra'			=> $nilai_akhir,
					'nilai_laporan'			=> ''			
				);
				
				
				$this->db->insert('nilai_kinerja_tim',$data1);
				$pesan = "Terimakasih sudah memberikan penilaian, data penilaian laporan tim sudah berhasil direkam";
				$this->alert_ok($pesan);
			}
			else
			{
				if ($status_penilaian['nilai_mitra'] == '0') 
				{
					$data1 = array(
						'nilai_mitra' 	=> $nilai_akhir,
					);

					$this->db->set($data1);
					$where = array( 'id_tim' => $data['tim']['id_tim']);
					$this->db->where($where);
					$this->db->update('nilai_kinerja_tim');

					$pesan = "Terimakasih sudah memberikan penilaian, data penilaian laoran tim sudah berhasil direkam";
					$this->alert_ok($pesan);
				}
				else
				{

					$pesan = "Penilaian gagal direkam, Anda telah memberikan nilai laporan tim untuk tim ini";
					$this->alert_info($pesan);
				}
			}

			$i++;



			redirect('Mitra/survey');
		}

		// echo $persentase;

 		print_r($nilai);
 	}

 	public function sertifikat()
 	{
 		$id_mitra 	 		= $this->session->userdata('id_mitra');
		$data['mitra'] 		= $this->Mitra_Model->cek_mitra_by_id_mitra($id_mitra);
		$id_tim 			= $data['mitra']['id_tim'];
		$data['tim']		= $this->Mitra_Model->get_tim_by_id_tim($id_tim);
		$data['komisariat'] = $this->Mitra_Model->get_komisariat($data['mitra']['id_komisariat']);
		$data['template_sertifikat'] 	= $this->Relawan_Model->get_template_sertifikat_by_id_event($data['tim']['id_event']);
		$data['event']		= $this->Mitra_Model->get_Event_by_id_event($data['tim']['id_event']);
		
		// print_r($data['mitra']);
		$this->load->view('sertifikat/mitra', $data);
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







	public function get_kota()
	{
		$this->load->model('Authentikasi');
		$id_provinsi_terpilih = $_POST['id_provinsi'];
		$data_distrik = $this->Authentikasi->get_distrik($id_provinsi_terpilih);

		$this->load->model('Mitra_Model');
		$id_mitra 	 = $this->session->userdata('id_mitra');
		$data['user'] 	 = 'Mitra';
		$data['mitra'] = $this->Mitra_Model->cek_mitra_by_id_mitra($id_mitra);


		echo "<option value=''>--Pilih Kabupaten/Kota--</option>";

		foreach ($data_distrik as $key => $distrik) 
		{                        
			echo "<option value='".$distrik['id_kota']."' id_kota='".$distrik['id_kota']."' type='".$distrik['type']."' nama_kota='".$distrik['nama_kota']."' id_provinsi='".$distrik['id_provinsi']."' ";
			if ($data['mitra']['id_kota'] == $distrik['id_kota']) {
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

		$this->load->model('Relawan_Model');
		$id_mitra 	 = $this->session->userdata('id_mitra');
		$data['user'] 	 = 'Mitra';
		$data['mitra'] = $this->Mitra_Model->cek_mitra_by_id_mitra($id_mitra);
		
		echo "<option value=''>--Pilih provinsi--</option>";

		foreach ($data_provinsi as $key => $provinsi) 
		{                        
			echo "<option value='".$provinsi['id_provinsi']."' id_provinsi='".$provinsi['id_provinsi']."' ";
			if ($data['mitra']['id_provinsi'] == $provinsi['id_provinsi']) {
				echo "selected";
			}
			echo ">";
			echo $provinsi['nama_provinsi'];
			echo "</option>";
		}
	}

}