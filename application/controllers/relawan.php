<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class relawan  extends CI_Controller 

{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id_relawan'))
		{	
			redirect('landingPage');
		}


		$this->load->model('Relawan_Model');
		$this->load->model('Admin_Model');
		$this->load->model('Pembimbing_Model');
		$this->load->model('Mitra_Model');

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
		
		$this->session->set_flashdata('message','<div class="alert alert-success alert-success-style1 alert-st-bg alert-st-bg11 animated--grow-in show" style="background-color: white; margin-top: -10%;">
			<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
			<span class="icon-sc-cl" aria-hidden="true">&times;</span>
			</button>
			<i class="fa fa-check edu-checked-pro admin-check-pro admin-check-pro-clr admin-check-pro-clr11" aria-hidden="true"></i>
			<p><strong>Selamat Datang di Halaman Relawan!</strong></p>
			</div>');
		redirect('relawan/profil');

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


	public function unduh_template($template_dokumen)
	{
		$file = urldecode($template_dokumen);
		// echo "$file"; die();

		force_download('./assets/file/berkas/'.$file,NULL);
	}


	public function komisariat()
	{		
		$data['title']   = "Komisariat";
		$id_relawan 	 = $this->session->userdata('id_relawan');
		$data['user'] 	 = 'Relawan';
		$data['relawan'] = $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);
		$data['komisariat'] = $this->Relawan_Model->get_komisariat_relawan($data['relawan']['komisariat']);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();		
		$data['jml_pengumuman'] = $this->Relawan_Model->get_jml_pengumuman();
		$data['kegiatan_akan_datang'] = $this->Relawan_Model->get_kegiatan_akan_datang();
		$data['jml_kegiatan_akan_datang'] = $this->Relawan_Model->get_jml_kegiatan_akan_datang();
		$data['jml_kegiatan_telah_diikuti'] = $this->Relawan_Model->get_jml_kegiatan_telah_diikuti($id_relawan);
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_kepesertaan'] = $this->Relawan_Model->cek_status_peserta_di_event($id_relawan, $data['kegiatan_berlangsung']['id_event']);
		}
		
		// print_r($data['foto_ketua']); die();

		$this->load->view('template/header', $data);
		$this->load->view('relawan/sidebar', $data);
		$this->load->view('relawan/topbar', $data);
		$this->load->view('relawan/komisariat', $data);
		$this->load->view('template/footer', $data);

	}

	public function profil()
	{
		$data['title']   = "Profil";
		$id_relawan 	 = $this->session->userdata('id_relawan');
		$data['user'] 	 = 'Relawan';
		$data['relawan'] = $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);
		$data['komisariat'] = $this->Relawan_Model->get_komisariat_relawan($data['relawan']['komisariat']);
		$data['kota']	 = $this->Relawan_Model->get_kota($data['relawan']['kota']);
		$data['provinsi']= $this->Relawan_Model->get_provinsi($data['relawan']['provinsi']);
		$data['keahlian']= $this->Relawan_Model->get_keahlian_relawan($id_relawan);
		$data['jml_keahlian']= $this->Relawan_Model->get_jml_keahlian_relawan($id_relawan);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['jml_pengumuman'] = $this->Relawan_Model->get_jml_pengumuman();
		$data['kegiatan_akan_datang'] = $this->Relawan_Model->get_kegiatan_akan_datang();
		$data['jml_kegiatan_akan_datang'] = $this->Relawan_Model->get_jml_kegiatan_akan_datang();

		$data['jml_kegiatan_telah_diikuti'] = $this->Relawan_Model->get_jml_kegiatan_telah_diikuti($id_relawan);
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_kepesertaan'] = $this->Relawan_Model->cek_status_peserta_di_event($id_relawan, $data['kegiatan_berlangsung']['id_event']);

			$data['data_di_tim'] = $this->Relawan_Model->get_data_di_tim($id_relawan, $data['kegiatan_berlangsung']['id_event']);
		}
		else
		{
			$data['status_kepesertaan'] = "0";
		}
		// echo $data['jml_keahlian'];
		// print_r($data['keahlian']); die();
		$this->load->view('template/header', $data);
		$this->load->view('relawan/sidebar', $data);
		$this->load->view('relawan/topbar', $data);
		$this->load->view('relawan/profil', $data);
		$this->load->view('template/footer', $data);		
	}

	public function edit_profil()
	{		
		$data['title']   = "Edit Profil";
		$id_relawan 	 = $this->session->userdata('id_relawan');
		$data['user'] 	 = 'Relawan';
		$data['relawan'] = $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);

		$this->load->model('Authentikasi');
		$data['distrik'] = $this->Authentikasi->get_distrik($data['relawan']['provinsi']);
		$data['keahlian'] = $this->Authentikasi->get_keahlian();
		$data['keahlian_tik'] = $this->Relawan_Model->get_keahlian_relawan($id_relawan);
		$data['jml_keahlian_tik_relawan'] = $this->Relawan_Model->get_jml_keahlian_relawan($id_relawan);
		$data['jml_keahlian'] = $this->Relawan_Model->get_jml_keahlian();
		$data['all_komisariat'] = $this->Relawan_Model->get_all_komisariat();
		$data['komisariat'] = $this->Relawan_Model->get_data_komisariat_relawan($data['relawan']['komisariat']);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['jml_pengumuman'] = $this->Relawan_Model->get_jml_pengumuman();
		$data['kegiatan_akan_datang'] = $this->Relawan_Model->get_kegiatan_akan_datang();
		$data['jml_kegiatan_akan_datang'] = $this->Relawan_Model->get_jml_kegiatan_akan_datang();
		$data['jml_kegiatan_telah_diikuti'] = $this->Relawan_Model->get_jml_kegiatan_telah_diikuti($id_relawan);
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_kepesertaan'] = $this->Relawan_Model->cek_status_peserta_di_event($id_relawan, $data['kegiatan_berlangsung']['id_event']);

			$data['data_di_tim'] = $this->Relawan_Model->get_data_di_tim($id_relawan, $data['kegiatan_berlangsung']['id_event']);
		}
		else
		{
			$data['status_kepesertaan'] = "0";
		}

		
		// persiapan data untuk pengecekan data keahlian tik
		if ($data['jml_keahlian_tik_relawan'] > 0) 
		{
			for ($i=0; $i < $data['jml_keahlian_tik_relawan']; $i++) 
			{ 

				$data_baru = $data['keahlian_tik'][$i]['id_keahlian'];

				if ($i == 0) 
				{
					$data['data_keahlian'] = array( $data_baru );

				} 
				else
				{
					array_push( $data['data_keahlian'], $data_baru );
				}               
			}
		}
		else
		{
			$data['data_keahlian'] = '';
		}
		

		// print_r($data['data_keahlian']); die();

		$this->load->view('template/header', $data);
		$this->load->view('relawan/sidebar', $data);
		$this->load->view('relawan/topbar', $data);
		$this->load->view('relawan/editAkun', $data);
		$this->load->view('template/footer', $data);			
	}

	public function update_data($form,$id_relawan)
	{
		$data['relawan'] = $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);

		if ($form == "akun") 
		{

			$this->form_validation->set_rules('email', 'Email', 'trim');
			$this->form_validation->set_rules('Username', 'Username', 'trim');

			
			// echo $cek_username; die();

			$email = htmlspecialchars($this->input->post('email', true));  
			$Username = htmlspecialchars($this->input->post('Username', true)); 

			$cek_email = $this->Relawan_Model->cek_email($email);
			$cek_username = $this->Relawan_Model->cek_username($Username);


			if ($this->form_validation->run() == false)
			{
				$pesan = "Akun gagal di perbaharui, harap mengisi data dengan benar";
				$this->alert_gagal($pesan);
				redirect('relawan/edit_profil');

			}
			else
			{	 
				$image = $_FILES['foto']['name'];	

				if($image)
				{

					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size']      = '2048';
					$config['upload_path']   = './assets/img/relawan/image/';



					$this->load->library('upload',$config);
					if ($this->upload->do_upload('foto')) 
					{

						$old_image = $data['relawan']['image'];

						if($old_image != 'default_image.jpg')
						{
							unlink(FCPATH . 'assets/img/relawan/image/' . $old_image);

						}


						$new_image = $this->upload->data('file_name');
						$this->db->set('image', $new_image);

					}

					else if ($_FILES['foto']['size'] >= '2048') 
					{
						$pesan = "Ukuran dokumen yang diunggah melebihi batas (2MB), dokumen gagal di upload";
						$this->alert_gagal($pesan);
						redirect('relawan/edit_profil');
					}

					$where = array('id_relawan' => $id_relawan );
					$this->db->where($where);
					$this->db->update('relawan');

					$pesan = "Image sudah berhasil diperbaharui";
					$this->alert_ok($pesan);					
				}

					// jika tidak ada image yang di upload
				else
				{
					if ($cek_email == '0') 
					{
						if ($cek_username == '0') 
						{
							$data = [
								'username' 	=> $Username,
								'email' 	=> $email
							];

							$this->db->set($data);
							$this->db->where('id_relawan', $id_relawan);
							$this->db->update('relawan');

							$pesan = "Akun anda sudah berhasil diperbaharui";
							$this->alert_ok($pesan);
						}
						else
						{
							$pesan = "Username sudah digunakan";
							$this->alert_gagal($pesan);
						}

					}
					else
					{
						$pesan = "Alamat email sudah digunakan";
						$this->alert_gagal($pesan);				
					}	
				}
			}
			
			
			redirect('relawan/edit_profil');
		}



		elseif ($form == 'hapus_foto')
		{
			$old_image = $data['relawan']['image'];

			if ($old_image != 'default_image.jpg') 
			{
				unlink(FCPATH . 'assets/img/relawan/image/' . $old_image);
			}
			

			$this->db->set('image', 'default_image.jpg');
			$where = array('id_relawan' => $data['relawan']['id_relawan'] );
			$this->db->where($where);
			$this->db->update('relawan');

			$pesan = "Foto Profil berhasil di hapus";
			$this->alert_ok($pesan);
			redirect('relawan/edit_profil');
		}


		elseif ($form == 'hapus_id_card')
		{
			$old_image = $data['relawan']['id_card'];

			if ($old_image != 'default_id_card.jpg') 
			{
				unlink(FCPATH . 'assets/img/relawan/id_card/' . $old_image);
			}

			
			$this->db->set('id_card', 'default_id_card.jpg');
			$where = array('id_relawan' => $data['relawan']['id_relawan'] );
			$this->db->where($where);
			$this->db->update('relawan');

			$pesan = "Foto Profil berhasil di hapus";
			$this->alert_ok($pesan);
			redirect('relawan/edit_profil/#bio');
		}


		elseif ($form == "biodata") 
		{
			// print_r($data['id_card_relawan']); die();

			$this->form_validation->set_rules('nik', 'Nik', 'trim');
			$this->form_validation->set_rules('nama', 'Nama', 'trim');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim');
			$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim');
			$this->form_validation->set_rules('hp', 'Hp', 'trim');
			$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim');
			$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim');
			$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim');
			$this->form_validation->set_rules('kota', 'Kota', 'trim');
			$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim');



			$nik = htmlspecialchars($this->input->post('nik', true));  
			$nama = htmlspecialchars($this->input->post('nama', true));   
			$jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin', true));   
			$tempat_lahir = htmlspecialchars($this->input->post('tempat_lahir', true));   
			$tgl_lahir = htmlspecialchars($this->input->post('tgl_lahir', true));   
			$hp = htmlspecialchars($this->input->post('hp', true));
			$pendidikan = htmlspecialchars($this->input->post('pendidikan', true));
			$pekerjaan = htmlspecialchars($this->input->post('pekerjaan', true));
			$provinsi = htmlspecialchars($this->input->post('provinsi', true));
			$kota = htmlspecialchars($this->input->post('kota', true));
			$kecamatan = htmlspecialchars($this->input->post('kecamatan', true)); 
			$alamat = htmlspecialchars($this->input->post('alamat', true)); 


			if ($this->form_validation->run() == false)
			{
				$pesan = "Biodata gagal di perbaharui, harap mengisi data dengan benar";
				$this->alert_gagal($pesan);
				redirect('relawan/edit_profil/#bio');

			}
			else
			{
				$image = $_FILES['id_card']['name'];	

				if($image)
				{

					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size']      = '2048';
					$config['upload_path']   = './assets/img/relawan/id_card/';

					

					$this->load->library('upload',$config);
					if ($this->upload->do_upload('id_card')) 
					{
						
						$old_image = $data['relawan']['id_card'];

						if($old_image != 'default_id_card.jpg')
						{
							unlink(FCPATH . 'assets/img/relawan/id_card/' . $old_image);

						}


						$new_image = $this->upload->data('file_name');
						$this->db->set('id_card', $new_image);

					}

					else if ($_FILES['id_card']['size'] >= '2048') 
					{
						$pesan = "Ukuran dokumen yang diunggah melebihi batas (2MB), dokumen gagal di upload";
						$this->alert_gagal($pesan);
						redirect('relawan/edit_profil/#biodata');
					}
					
					$where = array('id_relawan' => $id_relawan );
					$this->db->where($where);
					$this->db->update('relawan');

					$pesan = "Id card berhasil diperbaharui";
					$this->alert_ok($pesan);
					redirect('relawan/edit_profil/#bio');
				}

				// jika tidak ada image yang di upload
				else
				{

					$data2 = [
						'nik' 			=> $nik,
						'nama_lengkap'	=> $nama,
						'jenis_kelamin'	=> $jenis_kelamin,
						'tempat_lahir'	=> $tempat_lahir,
						'tgl_lahir'		=> $tgl_lahir,
						'no_hp'			=> $hp,
						'pendidikan_terakhir'=> $pendidikan,
						'pekerjaan'		=> $pekerjaan,
						'provinsi'		=> $provinsi,
						'kota'			=> $kota,
						'kecamatan'		=> $kecamatan,
						'alamat_lengkap'=> $alamat
					];

					$this->db->set($data2);
					$where = array('id_relawan' => $id_relawan );
					$this->db->where($where);
					$this->db->update('relawan');

					$pesan = "Biodata telah di perbaharui";
					$this->alert_ok($pesan);
					redirect('relawan/edit_profil/#bio');
				}
			}	 

		}


		elseif ($form == "keahlian") 
		{
			$this->form_validation->set_rules('keahlian_lain', 'keahlian_lain', 'trim');
			$this->form_validation->set_rules('lvl_keahlian', 'level_keahlian', 'trim');


			$keahlian_lain = htmlspecialchars($this->input->post('keahlian_lain', true));  
			$level_kompetensi = htmlspecialchars($this->input->post('lvl_keahlian', true));
			$keahlian_tik = $this->input->post('keahlian_tik', true); 

			// print_r($keahlian_tik); die();
			if ($this->form_validation->run() == false)
			{
				$pesan = "Informasi gagal di perbaharui, harap mengisi data dengan benar";
				$this->alert_gagal($pesan);
				redirect('relawan/edit_profil');

			}
			else
			{
				// penggantian data
				$this->db->delete('draf_keahlian_relawan', array('id_relawan' => $id_relawan));

				$i = 0;
				foreach ($keahlian_tik as $k_tik) 
				{

					$data_keahlian_tik = [
						'id_draf' 		=> date('YmdGis').$i,
						'id_relawan' 	=> $id_relawan,
						'id_keahlian'	=> $k_tik,
						'level_kompetensi'=> $level_kompetensi
					];
					$this->db->insert('draf_keahlian_relawan', $data_keahlian_tik);
					$i++;
				}

				$this->db->set('keahlian_lain', $keahlian_lain);
				$this->db->where('id_relawan', $id_relawan);
				$this->db->update('relawan');

				$pesan = "Informasi keahlian telah di perbaharui";
				$this->alert_ok($pesan);
				redirect('relawan/edit_profil');
			}
		}


		elseif ($form == "komisariat") 
		{
			$this->form_validation->set_rules('thn_masuk', 'Tahun Masuk', 'trim');
			$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim');


			$thn_masuk = htmlspecialchars($this->input->post('thn_masuk', true));  
			$jabatan = htmlspecialchars($this->input->post('jabatan', true));
			if ($this->form_validation->run() == false)
			{
				$pesan = "Info Pangkalan gagal di perbaharui, harap mengisi data dengan benar";
				$this->alert_gagal($pesan);
				redirect('relawan/edit_profil');

			}
			else
			{

				$data = [
					'thn_anggota' 		=> $thn_masuk,
					'jabatan_di_rtik' 	=> $jabatan
				];

				$this->db->set($data);
				$this->db->where('id_relawan', $id_relawan);
				$this->db->update('relawan');

				$pesan = "Informasi Pangkalan telah di perbaharui";
				$this->alert_ok($pesan);
				redirect('relawan/edit_profil');
			}
		}



		elseif ($form == "ubah_komisariat") 
		{
			$this->form_validation->set_rules('pangkalan', 'Nama pangkalan', 'trim');

			$pangkalan = htmlspecialchars($this->input->post('pangkalan', true));  

			if ($this->form_validation->run() == false)
			{
				$pesan = "Pangkalan gagal di perbaharui, harap mengisi data dengan benar";
				$this->alert_gagal($pesan);
				redirect('relawan/edit_profil');

			}
			else
			{	
				$this->db->set('komisariat',$pangkalan);
				$this->db->where('id_relawan', $id_relawan);
				$this->db->update('relawan');

				$pesan = "Pangkalan berhasil di ubah, tunggu verifikasi dari pangkalan";
				$this->alert_ok($pesan);
				redirect('relawan/edit_profil');
			}

		}


		elseif ($form == "ubah_password") 
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
				redirect('relawan/edit_profil');

			}
			else
			{	
				if ($passwordlama != base64_decode($data['relawan']['password'])) {
					$pesan = "Password lama tidak sesuai";
					$this->alert_gagal($pesan);
					redirect('relawan/edit_profil');
				}
				elseif ($passwordbaru != $passwordbaru2) {
					$pesan = "Password baru tidak sama, harap input password baru dengan benar";
					$this->alert_gagal($pesan);
					redirect('relawan/edit_profil');
				}
				else{
					$password_baru3 = base64_encode($passwordbaru);

					$this->db->set('password',$password_baru3);
					$this->db->where('id_relawan', $id_relawan);
					$this->db->update('relawan');

					$pesan = "Password berhasil di perbaharui";
					$this->alert_ok($pesan);
					redirect('relawan/edit_profil');
				}
				
			}
		}



		elseif($form == "hapus_akun")
		{
			$data['relawan'] = $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);
			// print_r($data['relawan']); 	die();
			if ($data['relawan']['image'] != 'default_image.jpg') 
			{
				unlink(FCPATH . 'assets/img/relawan/image/' . $data['relawan']['image']);
			}


			if ($data['relawan']['id_card'] != 'default_id_card.jpg') 
			{
				unlink(FCPATH . 'assets/img/relawan/id_card/' . $data['relawan']['id_card']);
			}
			

			$this->db->delete('draf_keahlian_relawan', array('id_relawan' => $data['relawan']['id_relawan']));

			$this->db->set('id_relawan','dummy');
			$this->db->where('id_relawan', $id_relawan);
			$this->db->update('anggota_tim');


			$pesan = "Akun telah berhasil di hapus";
			$this->alert_ok($pesan);
			redirect('logout/hapus_akun');
		}
	}




	public function get_kota()
	{
		$this->load->model('Authentikasi');
		$id_provinsi_terpilih = $_POST['id_provinsi'];
		$data_distrik = $this->Authentikasi->get_distrik($id_provinsi_terpilih);

		$this->load->model('Relawan_Model');
		$id_relawan 	 = $this->session->userdata('id_relawan');
		$data['user'] 	 = 'Relawan';
		$data['relawan'] = $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);


		echo "<option value=''>--Pilih Kabupaten/Kota--</option>";

		foreach ($data_distrik as $key => $distrik) 
		{                        
			echo "<option value='".$distrik['id_kota']."' id_kota='".$distrik['id_kota']."' type='".$distrik['type']."' nama_kota='".$distrik['nama_kota']."' id_provinsi='".$distrik['id_provinsi']."' ";
			if ($data['relawan']['kota'] == $distrik['id_kota']) {
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
		$id_relawan 	 = $this->session->userdata('id_relawan');
		$data['user'] 	 = 'Relawan';
		$data['relawan'] = $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);
		
		echo "<option value=''>--Pilih provinsi--</option>";

		foreach ($data_provinsi as $key => $provinsi) 
		{                        
			echo "<option value='".$provinsi['id_provinsi']."' id_provinsi='".$provinsi['id_provinsi']."' ";
			if ($data['relawan']['provinsi'] == $provinsi['id_provinsi']) {
				echo "selected";
			}
			echo ">";
			echo $provinsi['nama_provinsi'];
			echo "</option>";
		}
	}

	public function get_kota2()
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

	public function get_provinsi2()
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

	public function kegiatan_akan_datang()
	{
		$data['title']   = "Kegiatan Akan Datang";
		$id_relawan 	 = $this->session->userdata('id_relawan');
		$data['user'] 	 = 'Relawan';
		$data['relawan'] = $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);
		$data['komisariat'] = $this->Relawan_Model->get_data_komisariat_relawan($data['relawan']['komisariat']);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['jml_pengumuman'] = $this->Relawan_Model->get_jml_pengumuman();
		$data['kegiatan_akan_datang'] = $this->Relawan_Model->get_kegiatan_akan_datang();
		$data['jml_kegiatan_akan_datang'] = $this->Relawan_Model->get_jml_kegiatan_akan_datang(); 
		$data['jml_kegiatan_telah_diikuti'] = $this->Relawan_Model->get_jml_kegiatan_telah_diikuti($id_relawan);
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_kepesertaan'] = $this->Relawan_Model->cek_status_peserta_di_event($id_relawan, $data['kegiatan_berlangsung']['id_event']);

			$data['data_di_tim'] = $this->Relawan_Model->get_data_di_tim($id_relawan, $data['kegiatan_berlangsung']['id_event']);
		}
		else
		{
			$data['status_kepesertaan'] = "0";
		}

// print_r($data['status_kepesertaan']); die();
		$this->load->view('template/header', $data);
		$this->load->view('relawan/sidebar', $data);
		$this->load->view('relawan/topbar', $data);
		$this->load->view('relawan/kegiatan_akan_datang', $data);
		$this->load->view('template/footer', $data);
	}

	public function kegiatan_berlangsung()
	{		
		$data['title']   = "Kegiatan Berlangsung";
		$id_relawan 	 = $this->session->userdata('id_relawan');
		$data['user'] 	 = 'Relawan';
		$data['relawan'] = $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);
		$data['komisariat'] = $this->Relawan_Model->get_data_komisariat_relawan($data['relawan']['komisariat']);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['jml_pengumuman'] = $this->Relawan_Model->get_jml_pengumuman();
		$data['kegiatan_akan_datang'] = $this->Relawan_Model->get_kegiatan_akan_datang();
		$data['jml_kegiatan_akan_datang'] = $this->Relawan_Model->get_jml_kegiatan_akan_datang();
		$data['jml_kegiatan_telah_diikuti'] = $this->Relawan_Model->get_jml_kegiatan_telah_diikuti($id_relawan);
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_kepesertaan'] = $this->Relawan_Model->cek_status_peserta_di_event($id_relawan, $data['kegiatan_berlangsung']['id_event']);
			$data['data_di_tim'] = $this->Relawan_Model->get_data_di_tim($id_relawan, $data['kegiatan_berlangsung']['id_event']);

			if ($data['kegiatan_berlangsung']['akhir_registrasi'] < date('YmdHis')) 
			{
				if ($data['data_di_tim']) 
				{
					if ($data['data_di_tim']['status_pengajuan'] < '3') 
					{
						$this->Relawan_Model->keluarkan_dari_event($id_relawan,$data['kegiatan_berlangsung']['id_event']);
					}
				}
				else
				{
					$this->Relawan_Model->keluarkan_dari_event($id_relawan,$data['kegiatan_berlangsung']['id_event']);
				}
			}
		}
		else
		{
			$data['status_kepesertaan'] = "0";
		}
		
		// print_r($data['data_di_tim']); die();

		$this->load->view('template/header', $data);
		$this->load->view('relawan/sidebar', $data);
		$this->load->view('relawan/topbar', $data);
		$this->load->view('relawan/kegiatan_berlangsung', $data);
		$this->load->view('template/footer', $data);
	}



	public function registrasi_tim()
	{
		$data['title']   = "Tim Relawan";
		$id_relawan 	 = $this->session->userdata('id_relawan');
		$data['user'] 	 = 'Relawan';
		$data['relawan'] = $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);
		$data['komisariat'] = $this->Relawan_Model->get_data_komisariat_relawan($data['relawan']['komisariat']);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['jml_pengumuman'] = $this->Relawan_Model->get_jml_pengumuman();
		$data['jml_kegiatan_telah_diikuti'] = $this->Relawan_Model->get_jml_kegiatan_telah_diikuti($id_relawan);

		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['status_kepesertaan'] = $this->Relawan_Model->cek_status_peserta_di_event($id_relawan, $data['kegiatan_berlangsung']['id_event']);
		$data['template'] = $this->Relawan_Model->get_template_berkas_surat_izin();
		// print_r($data['template']). die();
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_kepesertaan'] = $this->Relawan_Model->cek_status_peserta_di_event($id_relawan, $data['kegiatan_berlangsung']['id_event']);

			$data['data_di_tim'] = $this->Relawan_Model->get_data_di_tim($id_relawan, $data['kegiatan_berlangsung']['id_event']);
		}
		else
		{
			$data['status_kepesertaan'] = "0";
		}
		$data['data_kepesertaan'] = $this->Relawan_Model->cek_kepesertaan_peserta($id_relawan, $data['kegiatan_berlangsung']['id_event']);
		$data['tim'] = $this->Relawan_Model->get_all_tim_di_event($data['kegiatan_berlangsung']['id_event']);

		$data['data_di_tim'] = $this->Relawan_Model->get_data_di_tim($id_relawan, $data['kegiatan_berlangsung']['id_event']);



		if ($data['data_di_tim']) {
			$data['anggota_tim'] = $this->Relawan_Model->get_data_anggota_tim_by_id_tim($data['data_di_tim']['id_tim']);
			$data['jml_anggota_tim'] = $this->Relawan_Model->get_jml_anggota_pada_tim($data['data_di_tim']['id_tim']);
			$data['ketua_tim'] = $this->Relawan_Model->get_data_ketua_tim_by_id_tim($data['data_di_tim']['id_tim']);
			
			$data['pengajuan_anggota'] = $this->Relawan_Model->get_data_pengajuan_menjadi_anggota($data['data_di_tim']['id_tim']);

			// print_r( $data['ketua_tim']); die(); 

			$data['data_pembimbing'] = $this->Relawan_Model->get_data_pembimbing_aktif();	
		}
		// print_r($data['pengajuan_anggota']); die();
		// jika sudah melebihi jadwal registrasi
		if (strtotime($data['kegiatan_berlangsung']['akhir_registrasi']) <= strtotime(date('Y-m-d G:i:s'))) 
		{
			redirect('relawan/kegiatan_berlangsung');
		}
		
		// sesuaikan jumlah anggota tim dengan role_id tim
		foreach ($data['tim'] as $tm) 
		{
			$jml_anggota_tim = $this->Relawan_Model->get_jml_anggota_pada_tim($tm['id_tim']);
			// jika jml anggota tim kurang dari 4 orang
			if ($jml_anggota_tim < 4 ) 
			{
				$this->db->set('role_id', '0');
				$where = array('id_tim' => $tm['id_tim']);
				$this->db->where($where);
				$this->db->update('tim');
			}
			else if ($jml_anggota_tim = 4 ) 
			{
				$this->db->set('role_id', '1');
				$where = array('id_tim' => $tm['id_tim']);
				$this->db->where($where);
				$this->db->update('tim');
			}
		}
		// echo count(($data['anggota_tim'])); die();
		// print_r($data['tim']); die();


		if ($data['data_kepesertaan'] ) 
		{
			$this->load->view('template/header_dataTable',$data);
			$this->load->view('relawan/sidebar2', $data);
			$this->load->view('relawan/topbar', $data);
			$this->load->view('relawan/registrasi_tim', $data);
			$this->load->view('template/footer_dataTable', $data);			
		}
		else
		{
			redirect('relawan/kegiatan_berlangsung');
		}
		

	}

	private function _sendEmail($email, $password)
	{
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
		$this->email->subject('Akun Mitra RTIK Abdi Masyarakat');
		$this->email->message('Hai <b>'.$email.'</b><br>Segera login pada aplikasi RTIKAbdimas sebagai mitra dengan email <b>"'.$email.'"</b> serta password <b>"'.$password.'"</b>. Klik pada link berikut untuk mengunjungi aplikasi : <a href="'. base_url().'">Kunjungi Aplikasi.</a>');
		
		
		if ($this->email->send()){
			return true;
		} else {
			echo "gagal kirim email"."<br>";
			echo $this->email->print_debugger();

			die();
		}
	}

	private function _sendEmail2($email, $password)
	{
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
		$this->email->to($email);
		$this->email->subject('Akun Mitra RTIK Abdi Masyarakat');
		$this->email->message('Hai <b>'.$email.'</b><br>Password akun mitra telah di reset. Segera login pada aplikasi RTIKAbdimas sebagai mitra dengan email <b>"'.$email.'"</b> serta password <b>"'.$password.'"</b>. Klik pada link berikut untuk mengunjungi aplikasi : <a href="'. base_url().'">Kunjungi Aplikasi.</a>');
		
		
		if ($this->email->send()){
			return true;
		} else {
			echo "gagal kirim email"."<br>";
			echo $this->email->print_debugger();

			die();
		}
	}


	public function unggah_berkas($nama_berkas,$id)
	{
		$id = urldecode($id);
		// echo "$id"; die();

		if ($nama_berkas == 'akun_mitra') 
		{
			$this->form_validation->set_rules('email', 'Email', 'trim');
			$this->form_validation->set_rules('nama', 'Nama Mitra', 'trim');
			$this->form_validation->set_rules('jenis_mitra', 'Jenis Mitra', 'trim');
			$this->form_validation->set_rules('kota', 'Kota', 'trim');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim');
			$this->form_validation->set_rules('jenis_pelayanan', 'Jenis Layanan', 'trim');

			$email = htmlspecialchars($this->input->post('email', true)); 
			$nama = htmlspecialchars($this->input->post('nama', true));
			$jenis_mitra = htmlspecialchars($this->input->post('jenis_mitra', true)); 
			$id_kota = htmlspecialchars($this->input->post('kota', true)); 
			$alamat = htmlspecialchars($this->input->post('alamat', true));
			$jenis_layanan = htmlspecialchars($this->input->post('jenis_pelayanan', true));


			$cek_email = $this->Mitra_Model->cek_email($email);
			if ($cek_email == '0') 
			{
				if ($this->form_validation->run() == false)
				{
					$pesan = "Gagal menyimpan data";
					$this->alert_gagal($pesan);
					redirect('relawan/pelayanan');

				}
				else
				{
					$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$kode = substr(str_shuffle($permitted_chars), 0, 1);

					$password = substr(str_shuffle($permitted_chars), 0, 8);
					$id_mitra = date("YmdGis").$kode;

					$data = [
						'id_mitra'			=> $id_mitra,
						'nama_mitra'		=> $nama,
						'alamat'			=> $alamat,
						'kecamatan'			=> '-',
						'id_kota'			=> $id_kota,
						'titik_koordinat'	=> '-',
						'situs_web'			=> '-',
						'profil_ringkas'	=> '-',
						'koordinator'		=> '-',
						'jabatan_koordinator'=>'-',
						'no_hp_koordinator'	=> '-',
						'email_koordinator'	=> $email,
						'pimpinan'			=> '-',
						'jabatan_pimpinan'	=> '-',
						'no_hp_pimpinan'	=> '-',
						'email_pimpinan'	=> '-',
						'logo'				=> 'default_logo.png',
						'jenis_layanan'		=> $jenis_layanan,
						'password'			=> base64_encode($password),
						'id_tim'			=> $id,
						'id_cluster'		=> $jenis_mitra
					];
					
					$this->db->insert('mitra',$data);

					$this->_sendEmail($email, $password);

					$pesan = "Akun mitra berhasil dibuat, mitra akan menerima notifikasi akun melalui email yang di daftarkan";
					$this->alert_ok($pesan);
					
				}
			}
			else
			{
				$pesan = "Alamat email sudah terdaftar";
				$this->alert_gagal($pesan);
			}
			redirect('relawan/mitra');			
		}

		if ($nama_berkas == 'update_akun_mitra') 
		{
			$this->form_validation->set_rules('email', 'Email', 'trim');
			$this->form_validation->set_rules('nama', 'Nama Mitra', 'trim');
			$this->form_validation->set_rules('jenis_mitra', 'Jenis Mitra', 'trim');
			$this->form_validation->set_rules('kota', 'Kota', 'trim');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim');
			$this->form_validation->set_rules('jenis_pelayanan', 'Jenis Layanan', 'trim');

			$email = htmlspecialchars($this->input->post('email', true));
			$nama = htmlspecialchars($this->input->post('nama', true));
			$jenis_mitra = htmlspecialchars($this->input->post('jenis_mitra', true)); 
			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$password =  substr(str_shuffle($permitted_chars), 0, 8);
			$id_kota = htmlspecialchars($this->input->post('kota', true)); 
			$alamat = htmlspecialchars($this->input->post('alamat', true));
			$jenis_layanan = htmlspecialchars($this->input->post('jenis_pelayanan', true));

			if ($this->form_validation->run() == false)
			{
				$pesan = "Gagal menyimpan data";
				$this->alert_gagal($pesan);
				redirect('relawan/pelayanan');

			}
			else
			{
				$id_mitra =date("YmdGis");

				$data = [
					'nama_mitra'		=> $nama,
					'alamat'			=> $alamat,
					'id_kota'			=> $id_kota,
					'email_koordinator'	=> $email,
					'jenis_layanan'		=> $jenis_layanan,
					'id_cluster'		=> $jenis_mitra
				];
				
				$this->db->set($data);
				$where = array('id_mitra' => $id);
				$this->db->where($where);
				$this->db->update('mitra');


				$pesan = "Akun mitra berhasil diperbaharui";
				$this->alert_ok($pesan);
				redirect('relawan/mitra');
			}
		}

		elseif ($nama_berkas == 'reset_password') 
		{
			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$password = substr(str_shuffle($permitted_chars), 0, 8);
			$email = $id;
			// echo "$email"; die();
			$this->_sendEmail2($email,$password);

			$pesan = "Password akun mitra berhasil di reset, mitra akan menerima notifikasi pemberitahuan melalui email yang di daftarkan";
			$this->alert_ok($pesan);
			redirect('relawan/mitra');
		}


		else if ($nama_berkas == 'surat_izin') 
		{
			$this->form_validation->set_rules('link_surat_izin', 'Surat izin', 'trim');

			$link = htmlspecialchars($this->input->post('link_surat_izin', true));  

			if ($this->form_validation->run() == false)
			{
				$pesan = "Gagal menyimpan data";
				$this->alert_gagal($pesan);
				redirect('relawan/registrasi_tim');

			}
			else
			{
				$data = "'".$link."'";
				$this->db->set('file_surat_izin_ortu', $link);
				$where = array('id_anggota' => $id);
				$this->db->where($where);
				$this->db->update('anggota_tim');

			// echo $id_anggota.'<br>'.$link; die();

				$pesan = "Data berhasil di simpan";
				$this->alert_ok($pesan);
				redirect('relawan/registrasi_tim');
			}
		} 

		else if ($nama_berkas == 'surat_pengantar') 
		{
			$this->form_validation->set_rules('link_surat_pengantar', 'Surat pengantar', 'trim');

			$link = htmlspecialchars($this->input->post('link_surat_pengantar', true));  

			if ($this->form_validation->run() == false)
			{
				$pesan = "Gagal menyimpan data";
				$this->alert_gagal($pesan);
				redirect('relawan/pelaporan');

			}
			else
			{
				$data = "'".$link."'";
				$this->db->set('surat_pengantar', $link);
				$where = array('id_tim' => $id);
				$this->db->where($where);
				$this->db->update('tim');

			// echo $id_anggota.'<br>'.$link; die();

				$pesan = "Data berhasil di simpan";
				$this->alert_ok($pesan);
				redirect('relawan/pelaporan');
			}
		}

		else if ($nama_berkas == 'survey_permintaan') 
		{
			$this->form_validation->set_rules('link_survey_permintaan', 'survey permintaan', 'trim');

			$link = htmlspecialchars($this->input->post('link_survey_permintaan', true));  

			if ($this->form_validation->run() == false)
			{
				$pesan = "Gagal menyimpan data";
				$this->alert_gagal($pesan);
				redirect('relawan/pelaporan');

			}
			else
			{
				$data = "'".$link."'";
				$this->db->set('survey_permintaan', $link);
				$where = array('id_tim' => $id);
				$this->db->where($where);
				$this->db->update('tim');

			// echo $id_anggota.'<br>'.$link; die();

				$pesan = "Data berhasil di simpan";
				$this->alert_ok($pesan);
				redirect('relawan/pelaporan');
			}
		}


		else if ($nama_berkas == 'artikel_miftek') 
		{
			$this->form_validation->set_rules('link_artikel_miftek', 'buku kendali', 'trim');

			$link = htmlspecialchars($this->input->post('link_artikel_miftek', true));  

			if ($this->form_validation->run() == false)
			{
				$pesan = "Gagal menyimpan data";
				$this->alert_gagal($pesan);
				redirect('relawan/pelaporan');

			}
			else
			{
				$data = "'".$link."'";
				$this->db->set('artikel_miftek', $link);
				$where = array('id_tim' => $id);
				$this->db->where($where);
				$this->db->update('tim');

			// echo $id_anggota.'<br>'.$link; die();

				$pesan = "Data berhasil di simpan";
				$this->alert_ok($pesan);
				redirect('relawan/pelaporan');
			}
		}


		else if ($nama_berkas == 'surat_konfirmasi') 
		{
			$this->form_validation->set_rules('link_surat_konfirmasi', 'surat konfirmasi', 'trim');

			$link = htmlspecialchars($this->input->post('link_surat_konfirmasi', true));  

			if ($this->form_validation->run() == false)
			{
				$pesan = "Gagal menyimpan data";
				$this->alert_gagal($pesan);
				redirect('relawan/pelaporan');

			}
			else
			{
				$data = "'".$link."'";
				$this->db->set('surat_konfirmasi', $link);
				$where = array('id_tim' => $id);
				$this->db->where($where);
				$this->db->update('tim');

			// echo $id_anggota.'<br>'.$link; die();

				$pesan = "Data berhasil di simpan";
				$this->alert_ok($pesan);
				redirect('relawan/pelaporan');
			}
		}


		else if ($nama_berkas == 'presensi_pelayanan') 
		{
			$this->form_validation->set_rules('link_presensi_pelayanan', 'presensi pelayanan', 'trim');

			$link = htmlspecialchars($this->input->post('link_presensi_pelayanan', true));  

			if ($this->form_validation->run() == false)
			{
				$pesan = "Gagal menyimpan data";
				$this->alert_gagal($pesan);
				redirect('relawan/pelaporan');

			}
			else
			{
				$data = "'".$link."'";
				$this->db->set('presensi_pelayanan', $link);
				$where = array('id_tim' => $id);
				$this->db->where($where);
				$this->db->update('tim');

			// echo $id_anggota.'<br>'.$link; die();

				$pesan = "Data berhasil di simpan";
				$this->alert_ok($pesan);
				redirect('relawan/pelaporan');
			}
		}


		else if ($nama_berkas == 'berita_acara') 
		{
			$this->form_validation->set_rules('link_berita_acara', 'berita_acara', 'trim');

			$link = htmlspecialchars($this->input->post('link_berita_acara', true));  

			if ($this->form_validation->run() == false)
			{
				$pesan = "Gagal menyimpan data";
				$this->alert_gagal($pesan);
				redirect('relawan/pelaporan');

			}
			else
			{
				$data = "'".$link."'";
				$this->db->set('berita_Acara', $link);
				$where = array('id_tim' => $id);
				$this->db->where($where);
				$this->db->update('tim');

			// echo $id_anggota.'<br>'.$link; die();

				$pesan = "Data berhasil di simpan";
				$this->alert_ok($pesan);
				redirect('relawan/pelaporan');
			}
		}
		
	}


	public function tim_relawan()
	{
		$data['title']   = "Tim Relawan";
		$id_relawan 	 = $this->session->userdata('id_relawan');
		$data['user'] 	 = 'Relawan';
		$data['relawan'] = $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);
		$data['komisariat'] = $this->Relawan_Model->get_data_komisariat_relawan($data['relawan']['komisariat']);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['jml_pengumuman'] = $this->Relawan_Model->get_jml_pengumuman();
		$data['jml_kegiatan_telah_diikuti'] = $this->Relawan_Model->get_jml_kegiatan_telah_diikuti($id_relawan);
		

		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['status_kepesertaan'] = $this->Relawan_Model->cek_status_peserta_di_event($id_relawan, $data['kegiatan_berlangsung']['id_event']);

		
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_kepesertaan'] = $this->Relawan_Model->cek_status_peserta_di_event($id_relawan, $data['kegiatan_berlangsung']['id_event']);

			$data['data_di_tim'] = $this->Relawan_Model->get_data_di_tim($id_relawan, $data['kegiatan_berlangsung']['id_event']);
		}
		else
		{
			$data['status_kepesertaan'] = "0";
		}

		$data['tim'] = $this->Relawan_Model->get_all_tim_di_event($data['kegiatan_berlangsung']['id_event']);

		$data['data_di_tim'] = $this->Relawan_Model->get_data_di_tim($id_relawan, $data['kegiatan_berlangsung']['id_event']);
		$data['data_kepesertaan'] = $this->Relawan_Model->cek_kepesertaan_peserta($id_relawan, $data['kegiatan_berlangsung']['id_event']);

		

		if ($data['data_di_tim']) {
			$data['anggota_tim'] = $this->Relawan_Model->get_data_anggota_tim_by_id_tim($data['data_di_tim']['id_tim']);


			$data['ketua_tim'] = $this->Relawan_Model->get_data_ketua_tim_by_id_tim($data['data_di_tim']['id_tim']);
			
			$data['pengajuan_anggota'] = $this->Relawan_Model->get_data_pengajuan_menjadi_anggota($data['data_di_tim']['id_tim']);	
		}
		
		// print_r($data['image_ketua']); die();
		// sesuaikan jumlah anggota tim dengan role_id tim
		foreach ($data['tim'] as $tm) 
		{
			$jml_anggota_tim = $this->Relawan_Model->get_jml_anggota_pada_tim($tm['id_tim']);
			// jika jml anggota tim kurang dari 4 orang
			if ($jml_anggota_tim < 4 ) 
			{
				$this->db->set('role_id', '0');
				$where = array('id_tim' => $tm['id_tim']);
				$this->db->where($where);
				$this->db->update('tim');
			}
			else if ($jml_anggota_tim = 4 ) 
			{
				$this->db->set('role_id', '1');
				$where = array('id_tim' => $tm['id_tim']);
				$this->db->where($where);
				$this->db->update('tim');
			}
		}
		// echo count(($data['anggota_tim'])); die();
		// print_r($data['data_kepesertaan']); die();


		if ($data['data_kepesertaan'] ) 
		{
			$this->load->view('template/header_dataTable',$data);
			$this->load->view('relawan/sidebar2', $data);
			$this->load->view('relawan/topbar', $data);
			$this->load->view('relawan/detail_tim', $data);
			$this->load->view('template/footer_dataTable', $data);			
		}
		else
		{
			redirect('relawan/kegiatan_berlangsung');
		}
		

	}

	public function buat_tim_baru($id_relawan,$id_event)
	{
		$id_e = urldecode($id_event);
		$this->form_validation->set_rules('nama_tim', 'Nama Tim', 'trim');

		$nama_tim = htmlspecialchars($this->input->post('nama_tim', true));  

		if ($this->form_validation->run() == false)
		{
			$pesan = "Gagal membuat Tim baru";
			$this->alert_gagal($pesan);
			redirect('relawan/tim_relawan');

		}
		else
		{	
			$cek_tim = $this->Relawan_Model->cek_nama_tim_from_event($nama_tim,$id_e);

				// print_r($cek_tim); die();
			if ($cek_tim) {
				$pesan = "Gagal membuat tim baru, nama tim sudah dipakai";
				$this->alert_gagal($pesan);
				redirect('relawan/tim_relawan');
			}
			else{
				$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$kode = substr(str_shuffle($permitted_chars), 0, 4);
				$id_tim = date('YmdHis').$kode;
					// echo "$id_tim"; die();
				$data1 = [
					'id_tim'	=> $id_tim,
					'id_event'	=> $id_e,
					'nama_tim'	=> $nama_tim,
					'id_pembimbing' => '-',
					'status_pembimbing'	=> '-',
					'surat_pengantar'	=> '-',
					'survey_permintaan'	=> '-',
					'surat_konfirmasi'	=> '-',
					'artikel_miftek'	=> '-',
					'presensi_pelayanan'=> '-',
					'berita_Acara'		=> '-',
					'status_pelayanan'  => '0',
					'judul_laporan'		=> '-',
					'laporan'			=> '-',
					'role_id'			=> 0
				];


				$this->db->insert('tim', $data1);

				$data2 = [
					'id_tim' => $id_tim,
					'status_pengajuan' => '4'  
				];

				$update_data = $this->Relawan_Model->update_data_di_anggota_tim($id_relawan, $data2, $id_e);

				$pesan = "Anda berhasil membuat tim baru";
				$this->alert_ok($pesan);
				redirect('relawan/tim_relawan');
			}

		}
	}

	public function ajukan_anggota_tim($id_tim, $id_anggota)
	{ 
		$data = [
			'id_tim' 			=> urldecode($id_tim),
			'status_pengajuan' 	=> 1
		];

		$this->db->set($data);
		$where = array('id_anggota' => urldecode($id_anggota));
		$this->db->where($where);
		$this->db->update('anggota_tim');
		
		$pesan = "anda berhasil mengajukan permintaan menjadi anggota tim";
		$this->alert_ok($pesan);
		redirect('relawan/registrasi_tim');
	}


	public function ajukan_pembimbing($id_tim)
	{ 
		$this->form_validation->set_rules('pembimbing', 'Pembimbing', 'trim');

		$id_pembimbing = htmlspecialchars($this->input->post('pembimbing', true)); 

		if ($this->form_validation->run() == false)
		{
			$pesan = "Pengajuan pembimbing gagal diajukan, harap memilih pembimbing";
			$this->alert_gagal($pesan);
		}
		else
		{	 
			$data = [
				'id_pembimbing' 	=> $id_pembimbing,
				'status_pembimbing'	=> '0'
			];

			$this->db->set($data);
			$where = array('id_tim' => urldecode($id_tim));
			$this->db->where($where);
			$this->db->update('tim');
			
			$pesan = "anda berhasil mengajukan permintaan kepada pembimbing";
			$this->alert_ok($pesan);
		}

		redirect('relawan/registrasi_tim');
	}


	public  function konfirmasi_anggota_tim($konfirmasi, $id_anggota)
	{
		if ($konfirmasi == 'acc') 
		{
			$this->db->set('status_pengajuan', 3);
			$where = array('id_anggota' => urldecode($id_anggota ));
			$this->db->where($where);
			$this->db->update('anggota_tim');



			$id_anggota = urldecode($id_anggota );
			$data['user'] 	 = 'Relawan';
			
			$data_anggota = $this->Relawan_Model->get_data_peserta_by_id_anggota($id_anggota);
			$jml_anggota_tim = $this->Relawan_Model->get_jml_anggota_pada_tim($data_anggota['id_tim']);

			// jika jumlah personel sudah 5 orang, maka:
			if ($jml_anggota_tim == 4) 
			{
				// tolak semua sisa pengajuan anggota
				$this->Relawan_Model->batas_anggota_tim($data_anggota['id_tim']);

				// ubah role id tim
				$this->db->set('role_id', 1);
				$where = array('id_tim' => $data_anggota['id_tim']);
				$this->db->where($where);
				$this->db->update('tim');

			}

			// echo "$cek_jml_anggota_tim"; print_r($data_anggota); die();

			$pesan = "Anggota tim diperbaharui";
			$this->alert_ok($pesan);
			redirect('relawan/registrasi_tim');
		}
		elseif ($konfirmasi == 'tolak') 
		{
			$this->db->set('status_pengajuan', 2);
			$where = array('id_anggota' => urldecode($id_anggota ));
			$this->db->where($where);
			$this->db->update('anggota_tim');

			$pesan = "Anggota tim diperbaharui";
			$this->alert_ok($pesan);
			redirect('relawan/registrasi_tim');
		}
	}

	public function tutup_pengajuan_anggota_tim($id_tim)
	{
		$id_t = urldecode($id_tim );

		// tolak semua sisa pengajuan anggota
		$this->Relawan_Model->batas_anggota_tim($id_t);

		// ubah role id tim
		$this->db->set('role_id', 1);
		$where = array('id_tim' => $id_t);
		$this->db->where($where);
		$this->db->update('tim');

		
		// echo "$cek_jml_anggota_tim"; print_r($data_anggota); die();

		$pesan = "Pengajuan anggota tim telah berhasil ditutup";
		$this->alert_info($pesan);
		redirect('relawan/registrasi_tim');
	}


	public function detail_tim($id_tim)
	{
		$id_tim = urldecode($id_tim);
		$data['title']   = "Detail Tim";
		$id_relawan 	 = $this->session->userdata('id_relawan');
		$data['user'] 	 = 'Relawan';
		$data['relawan'] = $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);
		$data['komisariat'] = $this->Relawan_Model->get_data_komisariat_relawan($data['relawan']['komisariat']);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['jml_pengumuman'] = $this->Relawan_Model->get_jml_pengumuman();
		$data['jml_kegiatan_telah_diikuti'] = $this->Relawan_Model->get_jml_kegiatan_telah_diikuti($id_relawan);
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_kepesertaan'] = $this->Relawan_Model->cek_status_peserta_di_event($id_relawan, $data['kegiatan_berlangsung']['id_event']);

			$data['data_di_tim'] = $this->Relawan_Model->get_data_di_tim($id_relawan, $data['kegiatan_berlangsung']['id_event']);
		}
		else
		{
			$data['status_kepesertaan'] = "0";
		}

		$data['tim'] = $this->Relawan_Model->get_all_tim_di_event($data['kegiatan_berlangsung']['id_event']);

		$data['data_di_tim'] = $this->Relawan_Model->get_data_di_tim($id_relawan, $data['kegiatan_berlangsung']['id_event']);
		$data['anggota_tim'] = $this->Relawan_Model->get_data_anggota_tim_by_id_tim($id_tim);
		$data['ketua_tim'] = $this->Relawan_Model->get_data_ketua_tim_by_id_tim($id_tim);
		
		// print_r($data['anggota_tim']); die();
		// echo $id_tim;

		$this->load->view('template/header_dataTable',$data);
		$this->load->view('relawan/sidebar2', $data);
		$this->load->view('relawan/topbar', $data);
		$this->load->view('relawan/detail_tim', $data);
		$this->load->view('template/footer_dataTable', $data);
	}


	public function pembekalan()
	{
		$data['title']   = "Agenda Pembekalan";
		$id_relawan 	 = $this->session->userdata('id_relawan');
		$data['user'] 	 = 'Relawan';
		$data['relawan'] = $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);
		$data['komisariat'] = $this->Relawan_Model->get_data_komisariat_relawan($data['relawan']['komisariat']);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['jml_pengumuman'] = $this->Relawan_Model->get_jml_pengumuman();
		$data['jml_kegiatan_telah_diikuti'] = $this->Relawan_Model->get_jml_kegiatan_telah_diikuti($id_relawan);
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['data_kepesertaan'] = $this->Relawan_Model->cek_kepesertaan_peserta($id_relawan, $data['kegiatan_berlangsung']['id_event']);

		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_kepesertaan'] = $this->Relawan_Model->cek_status_peserta_di_event($id_relawan, $data['kegiatan_berlangsung']['id_event']);

			$data['data_di_tim'] = $this->Relawan_Model->get_data_di_tim($id_relawan, $data['kegiatan_berlangsung']['id_event']);
		}
		else
		{
			$data['status_kepesertaan'] = "0";
		}
		$id_event = $data['kegiatan_berlangsung']['id_event'];

		$data['agenda_pembekalan'] = $this->Relawan_Model->get_agenda_pembekalan_by_id_event($id_event);

		$i=0;
		if ($data['agenda_pembekalan']) 
		{	
			
		}

		// jika sudah melebihi jadwal pembekalan
		if (strtotime($data['kegiatan_berlangsung']['akhir_pembekalan']) <= strtotime(date('Y-m-d G:i:s'))) 
		{
			redirect('relawan/kegiatan_berlangsung');
		}

		$this->load->view('template/header_dataTable',$data);
		$this->load->view('relawan/sidebar2', $data);
		$this->load->view('relawan/topbar', $data);
		$this->load->view('relawan/agenda_pembekalan', $data);
		$this->load->view('template/footer_dataTable', $data);
	}


	public function pelayanan() 
	{
		$data['title']   = "Pelayanan";
		$id_relawan 	 = $this->session->userdata('id_relawan');
		$data['user'] 	 = 'Relawan';
		$data['relawan'] = $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);
		$data['komisariat'] = $this->Relawan_Model->get_data_komisariat_relawan($data['relawan']['komisariat']);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['jml_pengumuman'] = $this->Relawan_Model->get_jml_pengumuman();
		$data['jml_kegiatan_telah_diikuti'] = $this->Relawan_Model->get_jml_kegiatan_telah_diikuti($id_relawan);
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_kepesertaan'] = $this->Relawan_Model->cek_status_peserta_di_event($id_relawan, $data['kegiatan_berlangsung']['id_event']);

			$data['data_di_tim'] = $this->Relawan_Model->get_data_di_tim($id_relawan, $data['kegiatan_berlangsung']['id_event']);
		}
		else
		{
			$data['status_kepesertaan'] = "0";
		}
		$id_event = $data['kegiatan_berlangsung']['id_event'];

		$data['agenda_pembekalan'] = $this->Relawan_Model->get_agenda_pembekalan_by_id_event($id_event);
		$data['tim'] = $this->Relawan_Model->get_tim_by_id_tim($data['data_di_tim']['id_tim']);

		$data['mitra'] = $this->Relawan_Model->get_mitra_by_id_tim($data['data_di_tim']['id_tim']);
		$data['template'] = $this->Relawan_Model->get_template_berkas_pelayanan();
		$data['nama_template'] = array('0' => 'Survei Permintaan', '1' => 'Presensi Layanan', '2' => 'Berita Acara');

		// jika sudah melebihi jadwal pelayanan
		if (strtotime($data['kegiatan_berlangsung']['akhir_pelayanan']) <= strtotime(date('Y-m-d G:i:s'))) 
		{
			redirect('relawan/kegiatan_berlangsung');
		}

		$this->load->view('template/header_dataTable',$data);
		$this->load->view('relawan/sidebar2', $data);
		$this->load->view('relawan/topbar', $data);
		$this->load->view('relawan/pelayanan_relawan', $data);
		$this->load->view('template/footer_dataTable', $data);
	}

	public function mitra()
	{
		$data['title']   = "Mitra";
		$id_relawan 	 = $this->session->userdata('id_relawan');
		$data['user'] 	 = 'Relawan';
		$data['relawan'] = $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);
		$data['komisariat'] = $this->Relawan_Model->get_data_komisariat_relawan($data['relawan']['komisariat']);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['jml_pengumuman'] = $this->Relawan_Model->get_jml_pengumuman();
		$data['jml_kegiatan_telah_diikuti'] = $this->Relawan_Model->get_jml_kegiatan_telah_diikuti($id_relawan);

		$this->load->model('Authentikasi');
		$data['distrik'] = $this->Authentikasi->get_distrik($data['relawan']['provinsi']);
		

		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_kepesertaan'] = $this->Relawan_Model->cek_status_peserta_di_event($id_relawan, $data['kegiatan_berlangsung']['id_event']);

			$data['data_di_tim'] = $this->Relawan_Model->get_data_di_tim($id_relawan, $data['kegiatan_berlangsung']['id_event']);
		}
		else
		{
			$data['status_kepesertaan'] = "0";
			redirect('relawan/kegiatan_berlangsung');
		}
		$id_event = $data['kegiatan_berlangsung']['id_event'];

		$data['agenda_pembekalan'] = $this->Relawan_Model->get_agenda_pembekalan_by_id_event($id_event);
		$data['tim'] = $this->Relawan_Model->get_tim_by_id_tim($data['data_di_tim']['id_tim']);
		$data['mitra'] = $this->Relawan_Model->get_mitra_by_id_tim($data['data_di_tim']['id_tim']);
		$data['cluster'] = $this->Relawan_Model->get_all_cluster();



		// print_r($data['kegiatan_berlangsung']); die();
		

		$this->load->view('template/header',$data);
		$this->load->view('relawan/sidebar2', $data);
		$this->load->view('relawan/topbar', $data);
		$this->load->view('relawan/mitra', $data);
		$this->load->view('template/footer', $data);
	}

	public function pelaporan() 
	{ 
		$data['title']   = "Pelaporan";
		$id_relawan 	 = $this->session->userdata('id_relawan');
		$data['user'] 	 = 'Relawan';
		$data['relawan'] = $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);
		$data['jenis_lembaga'] = $this->Relawan_Model->get_all_jenis_lembaga(); 
		$data['komisariat'] = $this->Relawan_Model->get_data_komisariat_relawan($data['relawan']['komisariat']);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['jml_pengumuman'] = $this->Relawan_Model->get_jml_pengumuman();
		$data['jml_kegiatan_telah_diikuti'] = $this->Relawan_Model->get_jml_kegiatan_telah_diikuti($id_relawan);
		$data['template'] = $this->Relawan_Model->get_template_berkas_pelaporan();
		$data['nama_template'] = array('0' => 'Survey Program', '1' => 'Artikel Berita', '2' => 'Artikel MIFTEK');

		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_kepesertaan'] = $this->Relawan_Model->cek_status_peserta_di_event($id_relawan, $data['kegiatan_berlangsung']['id_event']);

			$data['data_di_tim'] = $this->Relawan_Model->get_data_di_tim($id_relawan, $data['kegiatan_berlangsung']['id_event']);
		}
		else
		{
			$data['status_kepesertaan'] = "0";
		}
		$id_event = $data['kegiatan_berlangsung']['id_event'];

		$data['agenda_pembekalan'] = $this->Relawan_Model->get_agenda_pembekalan_by_id_event($id_event);
		$data['tim'] = $this->Relawan_Model->get_tim_by_id_tim($data['data_di_tim']['id_tim']);

		// jika sudah melebihi jadwal pelayanan
		if (strtotime($data['kegiatan_berlangsung']['akhir_pelaporan']) <= strtotime(date('Y-m-d G:i:s'))) 
		{
			redirect('relawan/kegiatan_berlangsung');
		}

		$this->load->view('template/header_dataTable',$data);
		$this->load->view('relawan/sidebar2', $data);
		$this->load->view('relawan/topbar', $data);
		$this->load->view('relawan/pelaporan', $data);
		$this->load->view('template/footer_dataTable', $data);
	}

	// save artikel summernote
	public function save_artikel($id_tim)
	{	
		$id_tm = urldecode($id_tim);
		$title = htmlspecialchars($this->input->post('title',TRUE));
		$contents = $this->input->post('contents',FALSE);
		
		$data = array(
			'judul_laporan' => $title,
			'laporan' 		=> $contents
		);
		$this->db->set($data);
		$where = array('id_tim' => $id_tm);
		$this->db->where($where);
		$this->db->update('tim');

		// echo $contents;
		redirect('relawan/lihat_artikel/'.$id_tim);
	}


	public function lihat_artikel($id_tim)
	{
		$data['title']   = "Lihat_artikel";
		$id_relawan 	 = $this->session->userdata('id_relawan');
		$data['user'] 	 = 'Relawan';
		$data['relawan'] = $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);
		$data['komisariat'] = $this->Relawan_Model->get_data_komisariat_relawan($data['relawan']['komisariat']);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['jml_pengumuman'] = $this->Relawan_Model->get_jml_pengumuman();
		
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_kepesertaan'] = $this->Relawan_Model->cek_status_peserta_di_event($id_relawan, $data['kegiatan_berlangsung']['id_event']);

			$data['data_di_tim'] = $this->Relawan_Model->get_data_di_tim($id_relawan, $data['kegiatan_berlangsung']['id_event']);
		}
		else
		{
			$data['status_kepesertaan'] = "0";
		}
		$id_event = $data['kegiatan_berlangsung']['id_event'];

		$data['agenda_pembekalan'] = $this->Relawan_Model->get_agenda_pembekalan_by_id_event($id_event);
		$data['tim'] = $this->Relawan_Model->get_tim_by_id_tim($data['data_di_tim']['id_tim']);

		// jika sudah melebihi jadwal pelayanan
		if (strtotime($data['kegiatan_berlangsung']['akhir_pelaporan']) <= strtotime(date('Y-m-d G:i:s'))) 
		{
			redirect('relawan/kegiatan_berlangsung');
		}


		$this->load->view('template/header_dataTable',$data);
		$this->load->view('relawan/sidebar2', $data);
		$this->load->view('relawan/topbar', $data);
		$this->load->view('relawan/lihat_artikel', $data);
		$this->load->view('template/footer_dataTable', $data);
	}


	// Upload image summernote
	public function upload_image()
	{
		$this->load->library('upload');
		if(isset($_FILES["image"]["name"])){
			$config['upload_path'] = './assets/img/artikel/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('image')){
				$this->upload->display_errors();
				return FALSE;
			}else{
				$data = $this->upload->data();
		        //Compress Image
				$config['image_library']='gd2';
				$config['source_image']='./assets/img/artikel/'.$data['file_name'];
				$config['create_thumb']= FALSE;
				$config['maintain_ratio']= TRUE;
				$config['quality']= '60%';
				$config['width']= 800;
				$config['height']= 800;
				$config['new_image']= './assets/img/artikel/'.$data['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				echo base_url().'assets/img/artikel/'.$data['file_name'];
			}
		}
	}


	//Delete image summernote
	public function delete_image()
	{
		$src = $this->input->post('src');
		$file_name = str_replace(base_url(), '', $src);
		if(unlink($file_name)){
			echo 'File Delete Successfully';
		}
	}



	public function kegiatan_selesai()
	{		
		$data['title']   = "Kegiatan Selesai";
		$id_relawan 	 = $this->session->userdata('id_relawan');
		$data['user'] 	 = 'Relawan';
		$data['relawan'] = $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);
		$data['komisariat'] = $this->Relawan_Model->get_data_komisariat_relawan($data['relawan']['komisariat']);
		$data['jml_kegiatan_diikuti'] = $this->Relawan_Model->get_jml_kegiatan_diikuti($id_relawan);
		$data['kegiatan'] = $this->Relawan_Model->get_kegiatan_telah_diikuti($id_relawan);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['jml_pengumuman'] = $this->Relawan_Model->get_jml_pengumuman();
		$data['kegiatan_akan_datang'] = $this->Relawan_Model->get_kegiatan_akan_datang();
		$data['jml_kegiatan_akan_datang'] = $this->Relawan_Model->get_jml_kegiatan_akan_datang();

		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_kepesertaan'] = $this->Relawan_Model->cek_status_peserta_di_event($id_relawan, $data['kegiatan_berlangsung']['id_event']);

			$data['data_di_tim'] = $this->Relawan_Model->get_data_di_tim($id_relawan, $data['kegiatan_berlangsung']['id_event']);
		}
		else
		{
			$data['status_kepesertaan'] = "0";
		}

		$data['jml_kegiatan_telah_diikuti'] = $this->Relawan_Model->get_jml_kegiatan_telah_diikuti($id_relawan);
		// print_r($data['kegiatan']); die();

		$this->load->view('template/header_dataTable',$data);
		$this->load->view('relawan/sidebar', $data);
		$this->load->view('relawan/topbar', $data);
		$this->load->view('relawan/kegiatan_selesai', $data);
		$this->load->view('template/footer_dataTable', $data);
	}


	public function detail_kegiatan_selesai($id_tim)
	{
		$data['title']   = "Kegiatan Selesai";
		$id_relawan 	 = $this->session->userdata('id_relawan');
		$data['user'] 	 = 'Relawan';
		$data['relawan'] = $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);
		$data['komisariat'] = $this->Relawan_Model->get_data_komisariat_relawan($data['relawan']['komisariat']);
		$data['kegiatan'] = $this->Relawan_Model->get_kegiatan_telah_diikuti_by_id_tim(urldecode($id_tim));
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['jml_pengumuman'] = $this->Relawan_Model->get_jml_pengumuman();
		$data['anggota_tim'] = $this->Relawan_Model->get_data_anggota_tim_by_id_tim(urldecode($id_tim));
		$data['ketua_tim'] = $this->Relawan_Model->get_data_ketua_tim_by_id_tim(urldecode($id_tim));
		$data['jml_kegiatan_telah_diikuti'] = $this->Relawan_Model->get_jml_kegiatan_telah_diikuti($id_relawan);
		
		// print_r($data['anggota_tim']); die();

		$this->load->view('template/header_dataTable',$data);
		$this->load->view('relawan/sidebar2', $data);
		$this->load->view('relawan/topbar', $data);
		$this->load->view('relawan/detail_kegiatan_selesai', $data);
		$this->load->view('template/footer_dataTable', $data);
	}


	public function pengumuman()
	{
		$data['title']   = "Pengumuman";
		$id_relawan 	 = $this->session->userdata('id_relawan');
		$data['user'] 	 = 'Relawan';
		$data['relawan'] = $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);
		
		$data['jml_pengumuman'] = $this->Relawan_Model->get_jml_pengumuman();
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();

		$data['komisariat'] = $this->Relawan_Model->get_data_komisariat_relawan($data['relawan']['komisariat']);
		$data['jml_kegiatan_diikuti'] = $this->Relawan_Model->get_jml_kegiatan_diikuti($id_relawan);
		$data['jml_kegiatan_telah_diikuti'] = $this->Relawan_Model->get_jml_kegiatan_telah_diikuti($id_relawan);
		$data['kegiatan'] = $this->Relawan_Model->get_kegiatan_telah_diikuti($id_relawan);
		$data['kegiatan_akan_datang'] = $this->Relawan_Model->get_kegiatan_akan_datang();
		$data['jml_kegiatan_akan_datang'] = $this->Relawan_Model->get_jml_kegiatan_akan_datang();

		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_kepesertaan'] = $this->Relawan_Model->cek_status_peserta_di_event($id_relawan, $data['kegiatan_berlangsung']['id_event']);

			$data['data_di_tim'] = $this->Relawan_Model->get_data_di_tim($id_relawan, $data['kegiatan_berlangsung']['id_event']);
		}
		else
		{
			$data['status_kepesertaan'] = "0";
		}
		

		$this->load->view('template/header_dataTable',$data);
		$this->load->view('relawan/sidebar', $data);
		$this->load->view('relawan/topbar', $data);
		$this->load->view('relawan/pengumuman', $data);
		$this->load->view('template/footer_dataTable', $data);
	}

	public function event($id_event)
	{
		$data['title']   = "Dashboard";
		$id_relawan 	 = $this->session->userdata('id_relawan');
		$data['user'] 	 = 'Relawan';
		$data['relawan'] = $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);
		$data['komisariat'] = $this->Relawan_Model->get_data_komisariat_relawan($data['relawan']['komisariat']);
		$data['jml_kegiatan_diikuti'] = $this->Relawan_Model->get_jml_kegiatan_diikuti($id_relawan);
		$data['jml_kegiatan_telah_diikuti'] = $this->Relawan_Model->get_jml_kegiatan_telah_diikuti($id_relawan);
		$data['kegiatan'] = $this->Relawan_Model->get_kegiatan_telah_diikuti($id_relawan);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['jml_pengumuman'] = $this->Relawan_Model->get_jml_pengumuman();
		$data['kegiatan_akan_datang'] = $this->Relawan_Model->get_kegiatan_akan_datang();
		$data['jml_kegiatan_akan_datang'] = $this->Relawan_Model->get_jml_kegiatan_akan_datang();

		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_kepesertaan'] = $this->Relawan_Model->cek_status_peserta_di_event($id_relawan, $data['kegiatan_berlangsung']['id_event']);

			$data['data_di_tim'] = $this->Relawan_Model->get_data_di_tim($id_relawan, $data['kegiatan_berlangsung']['id_event']);
		}
		else
		{
			$data['status_kepesertaan'] = "0";
		}
		// print_r($data['kegiatan']); die();

		$this->load->view('template/header',$data);
		$this->load->view('relawan/sidebar2', $data);
		$this->load->view('relawan/topbar', $data);
		$this->load->view('relawan/event', $data);
		$this->load->view('template/footer', $data);
	}

	public function daftar_event($id_event)
	{
		$id = urldecode($id_event);
		$id_relawan 	 = $this->session->userdata('id_relawan');
		$data['user'] 	 = 'Relawan';
		$event 			 = $this->Relawan_Model->get_data_event($id);
		$data['relawan'] = $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);
		$jml_partisipan  = $this->Relawan_Model->cek_jml_partisipan_event($id);
		$anggota_terakhir = $this->Relawan_Model->cek_id_angota_terakhir($id);

		// ambil id_peserta terakhir
		$last_id = substr($anggota_terakhir['id_anggota'], strlen($id));

		// id_peserta event baru
		$id_anggota = $id.($last_id+1);

		

		$data = [
			'id_anggota' 		=> $id_anggota,
			'id_tim' 			=> 0,
			'id_relawan' 		=> $id_relawan,
			'status_pengajuan' 	=> 0,
			'file_surat_izin_ortu' 	=> 0,
			'status' 			=> 0
		];

		$this->db->insert('anggota_tim', $data);

		$pesan = "Anda sudah terdaftar di event <b>".$event['nama_event']."</b>";
		$this->alert_ok($pesan);
		redirect('relawan/kegiatan_berlangsung');

	}

	public function batal_event($id_event)
	{
		$id = urldecode($id_event);
		$event = $this->Relawan_Model->get_data_event($id);
		$id_relawan = $this->session->userdata('id_relawan');
		$data['user'] 	 = 'Relawan';

		$keanggotaan = $this->Relawan_Model->get_data_di_tim($id_relawan, $id);
		// echo $keanggotaan['id_tim']; die();

		// jika yang membatalkan adalah ketua tim
		if ($keanggotaan['status_pengajuan'] == '4') 
		{
			$id_tim = $keanggotaan['id_tim'];
			$jml_anggota_tim = $this->Relawan_Model->get_jml_anggota_pada_tim($keanggotaan['id_tim']);
			
			// jika ada anggota tim
			if ($jml_anggota_tim > '0') 
			{
				$pesan = "Gagal untuk keluar dari <i>event</i>, pastikan tidak terdapat anggota tim pada tim yang anda ketuai";
				$this->alert_gagal($pesan);
				redirect('relawan/kegiatan_berlangsung');
			}
			// jika tidak ada anggota
			else
			{	
				$this->Relawan_Model->update_data_status_pengajuan_ditolak($id_tim);
				$this->Relawan_Model->batal_ikuti_event($id_relawan,$id);
				$this->Relawan_Model->hapus_tim_by_id_ketua_tim($id_tim);
				
				$pesan = "Anda sudah tidak terdaftar pada event <b>".$event['nama_event']."</b>";
				$this->alert_gagal($pesan);
				redirect('relawan/kegiatan_akan_datang');
			}
		}
		else
		{
			$this->Relawan_Model->batal_ikuti_event($id_relawan,$id);
			$pesan = "Anda sudah tidak terdaftar di event <b>".$event['nama_event']."</b>";
			$this->alert_info($pesan);
			redirect('relawan/kegiatan_akan_datang');
		}


	}


	public function registrasi()
	{
		$data['title']   = "Registrasi";
		$id_relawan 	 = $this->session->userdata('id_relawan');
		$data['user'] 	 = 'Relawan';
		$data['relawan'] = $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);
		$data['komisariat'] = $this->Relawan_Model->get_data_komisariat_relawan($data['relawan']['komisariat']);
		$data['jml_kegiatan_diikuti'] = $this->Relawan_Model->get_jml_kegiatan_diikuti($id_relawan);
		$data['kegiatan'] = $this->Relawan_Model->get_kegiatan_telah_diikuti($id_relawan);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['jml_pengumuman'] = $this->Relawan_Model->get_jml_pengumuman();
		// print_r($data['kegiatan']); die();

		$this->load->view('template/header',$data);
		$this->load->view('relawan/sidebar2', $data);
		$this->load->view('relawan/topbar', $data);
		$this->load->view('relawan/registrasi', $data);
		$this->load->view('template/footer', $data);
	}


	public function pembimbing()
	{
		$data['title']   = "Pembimbing Tim";
		$id_relawan 	 = $this->session->userdata('id_relawan');
		$data['user'] 	 = 'Relawan';
		$data['relawan'] = $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);
		$data['komisariat'] = $this->Relawan_Model->get_data_komisariat_relawan($data['relawan']['komisariat']);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['jml_pengumuman'] = $this->Relawan_Model->get_jml_pengumuman();

		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['jml_kegiatan_telah_diikuti'] = $this->Relawan_Model->get_jml_kegiatan_telah_diikuti($id_relawan);
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_kepesertaan'] = $this->Relawan_Model->cek_status_peserta_di_event($id_relawan, $data['kegiatan_berlangsung']['id_event']);

			$data['data_di_tim'] = $this->Relawan_Model->get_data_di_tim($id_relawan, $data['kegiatan_berlangsung']['id_event']);
		}
		else
		{
			$data['status_kepesertaan'] = "0";
		}

		$data['data_kepesertaan'] = $this->Relawan_Model->cek_kepesertaan_peserta($id_relawan, $data['kegiatan_berlangsung']['id_event']);

		$data['tim'] = $this->Relawan_Model->get_all_tim_di_event($data['kegiatan_berlangsung']['id_event']);

		$data['data_di_tim'] = $this->Relawan_Model->get_data_di_tim($id_relawan, $data['kegiatan_berlangsung']['id_event']);
		// print_r($data['data_di_tim']); die();

		if ($data['data_di_tim']) {
			$data['anggota_tim'] = $this->Relawan_Model->get_data_anggota_tim_by_id_tim($data['data_di_tim']['id_tim']);
			$data['ketua_tim'] = $this->Relawan_Model->get_data_ketua_tim_by_id_tim($data['data_di_tim']['id_tim']);
			$data['pengajuan_anggota'] = $this->Relawan_Model->get_data_pengajuan_menjadi_anggota($data['data_di_tim']['id_tim']);

			if ($data['data_di_tim']['status_pembimbing'] >= '0') 
			{
				$data['pembimbing'] = $this->Relawan_Model->get_data_pembimbing_by_Id($data['data_di_tim']['id_pembimbing']);
				if (!$data['pembimbing']) 
				{		
					$data['pembimbing'] = $this->Relawan_Model->get_data_pembimbing_by_Id2($data['data_di_tim']['id_pembimbing']); 	
				} 
			}
			
		}
		

		// echo $data['data_di_tim']['id_pembimbing']; die();
		// print_r($data['pembimbing']); die();
		if ($data['data_kepesertaan']['status_pengajuan'] <= '2' ) 
		{
			redirect('relawan/kegiatan_berlangsung');
		}
		else
		{
			$this->load->view('template/header',$data);
			$this->load->view('relawan/sidebar2', $data);
			$this->load->view('relawan/topbar', $data);
			$this->load->view('relawan/pembimbing', $data);
			$this->load->view('template/footer', $data);
		}
	}


	public function penilaian()
	{
		$data['title']   = "Penilaian Relawan";
		$id_relawan 	 = $this->session->userdata('id_relawan');
		$data['user'] 	 = 'Relawan';
		$data['relawan'] = $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);
		$data['komisariat'] = $this->Relawan_Model->get_data_komisariat_relawan($data['relawan']['komisariat']);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['jml_pengumuman'] = $this->Relawan_Model->get_jml_pengumuman();

		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['jml_kegiatan_telah_diikuti'] = $this->Relawan_Model->get_jml_kegiatan_telah_diikuti($id_relawan);
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_kepesertaan'] = $this->Relawan_Model->cek_status_peserta_di_event($id_relawan, $data['kegiatan_berlangsung']['id_event']);

			$data['data_di_tim'] = $this->Relawan_Model->get_data_di_tim($id_relawan, $data['kegiatan_berlangsung']['id_event']);
		}
		else
		{
			$data['status_kepesertaan'] = "0";
		}

		$data['data_kepesertaan'] = $this->Relawan_Model->cek_kepesertaan_peserta($id_relawan, $data['kegiatan_berlangsung']['id_event']);

		$data['tim'] = $this->Relawan_Model->get_all_tim_di_event($data['kegiatan_berlangsung']['id_event']);

		$data['data_di_tim'] = $this->Relawan_Model->get_data_di_tim($id_relawan, $data['kegiatan_berlangsung']['id_event']);
		
		$data['indikator_penilaian'] = $this->Relawan_Model->get_indikator_penilaian_anggota();
		$id_tim = $data['data_di_tim']['id_tim'];
		$data['personel_tim'] = $this->Relawan_Model->get_anggota_tim_by_id_tim_without_user($id_tim,$id_relawan);

		$data['status_penilaian_anggota_tim'] = $this->Relawan_Model->get_status_penilai_anggota($data['data_di_tim']['id_anggota']);
// echo $data['cek_status_penilai'];
// print_r($data['cek_status_penilai']); 
// die();

		

		$this->load->view('template/header',$data);
		$this->load->view('relawan/sidebar2', $data);
		$this->load->view('relawan/topbar', $data);
		$this->load->view('relawan/penilaian', $data);
		$this->load->view('template/footer', $data);
	}


	public function penilaian_anggota($id_tim)
	{
		$id_relawan 	 				= $this->session->userdata('id_relawan');
		$data['kegiatan_berlangsung'] 	= $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['tim'] 					= $this->Relawan_Model->get_all_tim_di_event($data['kegiatan_berlangsung']['id_event']);
		$data['data_di_tim'] 			= $this->Relawan_Model->get_data_di_tim($id_relawan, $data['kegiatan_berlangsung']['id_event']);
		$id_anggota = $data['data_di_tim']['id_anggota'];	
		$data['indikator_penilaian'] 	= $this->Relawan_Model->get_indikator_penilaian_anggota();
		$id_tim 						= $data['data_di_tim']['id_tim'];
		$data['personel_tim']			= $this->Relawan_Model->get_anggota_tim_by_id_tim_without_user($id_tim,$id_relawan);
		
		$i=0;
		foreach ($data['personel_tim'] as $pers) 
		{
			$this->form_validation->set_rules($pers['id_anggota'], 'Nilai', 'trim');
			$nilai[$i] = htmlspecialchars($this->input->post($pers['id_anggota'], true));
			$i++;
		}

		// print_r($data['personel_tim']); die();
		if ($this->form_validation->run() == false)
		{
			$pesan = "Gagal merekam penilaian, harap mengisi data dengan benar";
			$this->alert_gagal($pesan);
			redirect('relawan/penilaian');
		}
		else
		{	
			$i=0;
			foreach ($data['personel_tim'] as $pers) 
			{
				$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$kode = substr(str_shuffle($permitted_chars), 0, 3);
				$id = date('YmdGis').$kode;

				$data = array(
					'id_nilai_individu' => $id,
					'id_anggota_tim'	=> $pers['id_anggota'],
					'id_penilai'		=> $id_anggota,
					'nilai'				=> $nilai[$i]					
				);

				$this->db->insert('nilai_individu',$data);
				$i++;
			}


			$pesan = "Terimakasih sudah memberikan penilaian, data penilaian sudah berhasil direkam";
			$this->alert_ok($pesan);
			redirect('relawan/penilaian');
		}
	}


	public function sertifikat($id_event)
	{
		$data['title'] 		= 'Sertifikat';		
		$id_relawan 	 	= $this->session->userdata('id_relawan');
		$data['relawan'] 	= $this->Relawan_Model->cek_relawan_by_idRelawan($id_relawan);
		$data['komisariat'] = $this->Relawan_Model->get_data_komisariat_relawan($data['relawan']['komisariat']);
		$data['event'] 		= $this->Relawan_Model->get_data_event($id_event);
		$data['tim']		= $this->Relawan_Model->get_data_tim_by_id_event($id_relawan,$id_event);
		$data['mitra'] 		= $this->Relawan_Model->get_mitra_by_id_tim($data['tim']['id_tim']);
		$data['template_sertifikat'] 	= $this->Relawan_Model->get_template_sertifikat_by_id_event($id_event);
		$nilai_individu_masuk		= $this->Relawan_Model->get_nilai_individu_relawan($data['tim']['id_anggota']);
		$jml_nilai_individu_masuk 		= $this->Relawan_Model->get_jml_nilai_individu_relawan_masuk($data['tim']['id_anggota']);
		$data['jml_penilai_nilai_individu'] = $this->Relawan_Model->get_jumlah_penilai_nilai_individu_relawan($data['tim']['id_tim']);
		$nilai_kinerja_tim 	= $this->Relawan_Model->get_nilai_kinerja_tim($data['tim']['id_tim']);	
		
		$nilai_penilaian_sejawat	= $this->Relawan_Model->get_penilaian_sejawat_relawan($data['tim']['id_anggota']);


		$i=0;
		if ($nilai_penilaian_sejawat) 
		{
			foreach ($nilai_penilaian_sejawat as $pen) 
			{
				$data['nilai_sejawat'][$i] = $pen['nilai'];
				$i++;
			}
			$data['nilai_sejawat_akhir'] = array_sum($data['nilai_sejawat'])/($data['jml_penilai_nilai_individu']-1);
		}
		else
		{
			$data['nilai_sejawat_akhir'] = 0;
		}
		



		if ($nilai_kinerja_tim) 
		{
			$data['nilai_kinerja_tim'] 		= 		($nilai_kinerja_tim['nilai_dokumen'] + $nilai_kinerja_tim['nilai_mitra'] + $nilai_kinerja_tim['nilai_laporan']);
		}
		else
		{
			$data['nilai_kinerja_tim'] 		= 0;
		}
		
		// print_r($data['mitra']); die();
		
		if (!$data['mitra']) 
		{
			$data['mitra'] =
			[
				'nama_mitra' => '   .....	',
				'alamat'	 =>	' 	.....	',
				'kecamatan'	 =>	' 	.....	',
				'type'	 	 =>	' 	Kabupaten',
				'nama_kota'	 =>	' 	.....	',
				'nama_provinsi'	 =>	' 	.....	',
			];
		}
		if (!$data['template_sertifikat']) 
		{
			$data['template_sertifikat'] = array(
				'tempat_dikeluarkan'=> 'Belum diatur', 
				'tgal_dikeluarkan' 	=> '0000-00-00', 
				'nama_1' 			=> 'Belum diatur',
				'ttd_1'				=> 'default_ttd.png',
				'stempel_1'			=> 'default_stempel.png',
				'jabatan_1'			=> 'Jabatan pemberi tanda tangan belum diatur',
				'nama_2' 			=> 'Belum diatur',
				'ttd_2'				=> 'default_ttd.png',
				'stempel_2'			=> 'default_stempel.png',
				'jabatan_2'			=> 'Jabatan pemberi tanda tangan belum diatur'
			);
		}

		for ($i=0; $i < $data['jml_penilai_nilai_individu']; $i++) 
		{ 
			if ($nilai_individu_masuk) 
			{
				if ($i < $jml_nilai_individu_masuk) 
				{
					$jumlah_nilai_individu[$i] = $nilai_individu_masuk[$i]['nilai'];
				}
				else 
				{
					$jumlah_nilai_individu[$i] = 0;
				}
			}
			else 
			{
				$jumlah_nilai_individu[$i] = 0;
			}			
			 
		}
		
		$data['nilai_individu_akhir'] = array_sum($jumlah_nilai_individu) / $data['jml_penilai_nilai_individu'];  

		
		$persentase_kinerja_relawan = $this->Relawan_Model->get_persentase_kinerja_relawan();		
		$cek_nilai_kinerja_relawan = $this->Relawan_Model->cek_nilai_kinerja_relawan($data['tim']['id_anggota']);


		$i=0;
		foreach ($persentase_kinerja_relawan as $prs) 
		{
			if ($prs['kd_penilaian'] == 'KT') 
			{
				$nilai_tim = ($data['nilai_kinerja_tim'] * $prs['persentase']) / 100;
			}
			elseif ($prs['kd_penilaian']  == 'NI') 
			{
				$nilai_individu = ($data['nilai_individu_akhir'] * $prs['persentase']) / 100;
			}
			$i++;
		}

		// jika belum ada nilai kinerja relawan
		if (!$cek_nilai_kinerja_relawan) 
		{
			
			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';				
			$id_nilai_kinerja_relawan = date('YmdGis').substr(str_shuffle($permitted_chars), 0, 3);

			$data2 = [
				'id_nilai_kinerja' 		=> $id_nilai_kinerja_relawan,
				'id_anggota'			=> $data['tim']['id_anggota'],
				'nilai_kinerja_relawan' => $nilai_tim + $nilai_individu
			];

			$this->db->insert('nilai_kinerja_relawan', $data2);
		}
		// jika databse sudah menyimpan row nilai kinerja relawan
		else
		{
			$data2 = ['nilai_kinerja_relawan' => ($nilai_tim + $nilai_individu)];

			$this->db->set($data2);
			$where = array('id_anggota' => $data['tim']['id_anggota']);
			$this->db->where($where);
			$this->db->update('nilai_kinerja_relawan');
		}

		$data['nilai_akhir_kinerja_relawan'] = $this->Relawan_Model->get_nilai_kinerja_relawan($data['tim']['id_anggota']);
		// print_r($data['nilai_akhir_kinerja_relawan']); 
		// echo $data['nilai_kinerja_tim'];
		// die();


		$this->load->view('sertifikat/relawan', $data);
	}


}

?>