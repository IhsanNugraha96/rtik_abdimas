<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembimbing  extends CI_Controller 

{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id_pembimbing'))
		{	
			redirect('LandingPage');
		}

		
		$this->load->model('Authentikasi');
		$this->load->model('Relawan_Model');
		$this->load->model('Admin_Model');
		$this->load->model('Pangkalan_Model');
		$this->load->model('Pembimbing_Model');

		// pengaturan role id_pembimbing jika ada kegiatan berlasngsung
		$id_pembimbing 		= $this->session->userdata('id_pembimbing');

		$kegiatan_berlangsung = $this->Relawan_Model->get_kegiatan_berlangsung();
		
		if ($kegiatan_berlangsung) 
		{
			if ($kegiatan_berlangsung['role_id'] == '2') 
			{
				$data_tim_pembimbing = $this->Pembimbing_Model->get_tim_pembimbing($id_pembimbing, $kegiatan_berlangsung['id_event']);
				if ($data_tim_pembimbing) 
				{
					$data = ['role_id' 	=> '2'];
				}
				else
				{
					$data = ['role_id' 	=> '1'];
				}
				$this->db->set($data);
				$where = array('id_pembimbing' => $id_pembimbing);
				$this->db->where($where);
				$this->db->update('pembimbing');
			}
			
		}
		else
		{
			$data = ['role_id' 	=> '1'];

			$this->db->set($data);
			$where = array('id_pembimbing' => $id_pembimbing);
			$this->db->where($where);
			$this->db->update('pembimbing');
		}
		// akhir pengaturan role_id_pembimbing

		// print_r($data_tim_pembimbing); die();

		// awal pengaturan status kegiatan/event
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
		// akhir pengaturan status kegiatan/event
		
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
		$data['title']   	= "Profil Pembimbing";
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$id_pembimbing 		= $this->session->userdata('id_pembimbing');
		$data['user'] 		= 'Pembimbing';
		$data['pembimbing']	= $this->Pembimbing_Model->cek_pembimbing_by_idPembimbing($id_pembimbing);
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['kegiatan_akan_datang'] = $this->Relawan_Model->get_kegiatan_akan_datang();
		$data['jml_kegiatan_akan_datang'] = $this->Relawan_Model->get_jml_kegiatan_akan_datang();
		$data['jml_kegiatan_telah_diikuti'] = $this->Pembimbing_Model->get_jml_kegiatan_telah_diikuti($id_pembimbing);
		
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_pembimbing'] = $this->Pembimbing_Model->cek_status_pembimbing($id_pembimbing);
			if ($data['status_pembimbing']['role_id'] == '2') 
			{
				$data['jml_pengajuan_pembimbing'] = $this->Pembimbing_Model->cek_jml_pengajuan_pembimbing($id_pembimbing, $data['kegiatan_berlangsung']['id_event']); 
				$data['pengajuan_pembimbing'] = $this->Pembimbing_Model->cek_pengajuan_pembimbing($id_pembimbing, $data['kegiatan_berlangsung']['id_event']); 

				$i=0;
				foreach ($data['pengajuan_pembimbing'] as $pengajuan) 
				{
					$data['ketua_tim'][$i] =  $this->Pembimbing_Model->cek_ketua_tim($pengajuan['id_tim'], $data['kegiatan_berlangsung']['id_event']);
					$i++;
				}
				
			}
		}

		if ($data['pembimbing']['id_kota'] != '-') 
		{
			$data['alamat_pembimbing'] = $this->Pembimbing_Model->get_alamat_pembimbing_by_idKota($data['pembimbing']['id_kota']);
		}
		// print_r($data['kegiatan_berlangsung']); die();

		$this->load->view('template/header', $data);
		$this->load->view('pembimbing/sidebar', $data);
		$this->load->view('pembimbing/topbar', $data);
		$this->load->view('pembimbing/profil', $data);
		$this->load->view('template/footer', $data);
	}

	public function edit_profil()
	{
		$data['title']   	= "Edit Profil Pembimbing";
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$id_pembimbing 		= $this->session->userdata('id_pembimbing');
		$data['user'] 		= 'Pembimbing';
		$data['pembimbing']	= $this->Pembimbing_Model->cek_pembimbing_by_idPembimbing($id_pembimbing);
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['kegiatan_akan_datang'] = $this->Relawan_Model->get_kegiatan_akan_datang();
		$data['jml_kegiatan_akan_datang'] = $this->Relawan_Model->get_jml_kegiatan_akan_datang();
		$data['jml_kegiatan_telah_diikuti'] = $this->Pembimbing_Model->get_jml_kegiatan_telah_diikuti($id_pembimbing);
		
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_pembimbing'] = $this->Pembimbing_Model->cek_status_pembimbing($id_pembimbing);
			if ($data['status_pembimbing']['role_id'] == '2') 
			{
				$data['jml_pengajuan_pembimbing'] = $this->Pembimbing_Model->cek_jml_pengajuan_pembimbing($id_pembimbing, $data['kegiatan_berlangsung']['id_event']); 
				$data['pengajuan_pembimbing'] = $this->Pembimbing_Model->cek_pengajuan_pembimbing($id_pembimbing, $data['kegiatan_berlangsung']['id_event']); 

				$i=0;
				foreach ($data['pengajuan_pembimbing'] as $pengajuan) 
				{
					$data['ketua_tim'][$i] =  $this->Pembimbing_Model->cek_ketua_tim($pengajuan['id_tim'], $data['kegiatan_berlangsung']['id_event']);
					$i++;
				}
				
			}
		}

		
		if ($data['pembimbing']['id_kota'] != ''||$data['pembimbing']['id_kota'] != '=') 
		{
			$data['alamat_pembimbing'] = $this->Pembimbing_Model->get_alamat_pembimbing_by_idKota($data['pembimbing']['id_kota']);
			$data['distrik'] = $this->Pangkalan_Model->get_distrik($data['alamat_pembimbing']['id_provinsi']);
			$data['provinsi'] = $this->Pangkalan_Model->get_provinsi();
		}
		// print_r($data['distrik']); die();

		$this->load->view('template/header', $data);
		$this->load->view('pembimbing/sidebar', $data);
		$this->load->view('pembimbing/topbar', $data);
		$this->load->view('pembimbing/edit_profil', $data);
		$this->load->view('template/footer', $data);
	}

	public function update_data($aksi,$id_pembimbing)
	{
		
		$data_pembimbing = $this->Pembimbing_Model->cek_pembimbing_by_idpembimbing($id_pembimbing);
		if ($data_pembimbing['id_kota'] != '') 
		{
			$data_pembimbing = $this->Pembimbing_Model->cek_pembimbing_by_idpembimbing2($id_pembimbing);
		}
		
		if ($aksi == "akun") 
		{
			
			// print_r($data['image_pembimbing']); die();
			$this->form_validation->set_rules('email', 'Email', 'trim');
			
			$email = htmlspecialchars($this->input->post('email', true));  
			
			$cek_email = $this->Pembimbing_Model->cek_email_pembimbing($email);

			if ($this->form_validation->run() == false)
			{
				$pesan = "Akun gagal di perbaharui, harap mengisi data dengan benar";
				$this->alert_gagal($pesan);
				redirect('Pembimbing/edit_profil');

			}
			else
			{	 
				$image = $_FILES['foto']['name'];	

				if($image)
				{
					
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size']      = '2048';
					$config['upload_path']   = './assets/img/pembimbing/';

					

					$this->load->library('upload',$config);
					if ($this->upload->do_upload('foto')) 
					{
						$old_image = $data_pembimbing['image'];
						if($old_image != 'default_image.jpg')
						{
							unlink(FCPATH . 'assets/img/pembimbing/' . $old_image);

						}

						$new_image = $this->upload->data('file_name');
						$this->db->set('image', $new_image);
					}

					else if ($_FILES['foto']['size'] >= '2048') 
					{
						$pesan = "Ukuran dokumen yang diunggah melebihi batas (2MB), dokumen gagal di upload";
						$this->alert_gagal($pesan);
						redirect('Pembimbing/edit_profil');
					}
					
					$where = array('id_pembimbing' => $id_pembimbing );
					$this->db->where($where);
					$this->db->update('pembimbing');

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
						// print_r($data); die();
						$this->db->set($data);
						$this->db->where('id_pembimbing', $id_pembimbing);
						$this->db->update('pembimbing');

						$pesan = "Akun anda sudah berhasil diperbaharui";
						$this->alert_ok($pesan);
					}
					elseif ($email == $data_pembimbing['email']) 
					{
						$data = [
							'email' 	=> $email
						];
						// print_r($data); die();
						$this->db->set($data);
						$this->db->where('id_pembimbing', $id_pembimbing);
						$this->db->update('pembimbing');
						
						$pesan = "Tidak ada yang diperbaharui!";
						$this->alert_info($pesan);
					}
					else
					{
						$pesan = "Alamat email sudah digunakan";
						$this->alert_gagal($pesan);
					}
					
				}

				redirect('Pembimbing/edit_profil');
				
			}
		}

		elseif ($aksi == 'hapus_foto')
		{

			$old_image = $data_pembimbing['image'];
			// echo "$old_image"; die();
			if($old_image != 'default_image.jpg')
			{
				unlink(FCPATH . 'assets/img/pembimbing/' . $old_image);
			}

			$this->db->set('image', 'default_image.jpg');
			$where = array('id_pembimbing' => $data_pembimbing['id_pembimbing'] );
			$this->db->where($where);
			$this->db->update('pembimbing');

			$pesan = "Foto Profil berhasil di hapus";
			$this->alert_ok($pesan);
			redirect('Pembimbing/edit_profil');
		}


		elseif ($aksi == "biodata") 
		{
			
			$this->form_validation->set_rules('nama', 'Nama', 'trim');
			$this->form_validation->set_rules('tgal_lahir', 'tgal_lahir', 'trim');
			$this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'trim');
			$this->form_validation->set_rules('no_hp', 'no_hp', 'trim');
			$this->form_validation->set_rules('sektor', 'sektor', 'trim');
			$this->form_validation->set_rules('jabatan', 'jabatan', 'trim');
			$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim');
			$this->form_validation->set_rules('alamat_rumah', 'alamat_rumah', 'trim');
			$this->form_validation->set_rules('kota', 'kota', 'trim');
			$this->form_validation->set_rules('provinsi', 'provinsi', 'trim');



			$nama = htmlspecialchars($this->input->post('nama', true));      
			$tgal_lahir = htmlspecialchars($this->input->post('tgal_lahir', true));    
			$jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin', true));    
			$no_hp = htmlspecialchars($this->input->post('no_hp', true));    
			$jabatan = htmlspecialchars($this->input->post('jabatan', true));
			$sektor = htmlspecialchars($this->input->post('sektor', true));   
			$kecamatan = htmlspecialchars($this->input->post('kecamatan', true));   
			$alamat_rumah = htmlspecialchars($this->input->post('alamat_rumah', true));    
			$kota = htmlspecialchars($this->input->post('kota', true));    
			$provinsi = htmlspecialchars($this->input->post('provinsi', true)); 


			if ($this->form_validation->run() == false)
			{
				$pesan = "Biodata gagal di perbaharui, harap mengisi data dengan benar";
				$this->alert_gagal($pesan);
				redirect('Pembimbing/edit_profil');

			}
			else
			{
				$data2 = [
					'nama'			=> $nama,
					'jenis_kelamin'	=> $jenis_kelamin,
					'no_telp'		=> $no_hp,
					'sektor_pekerjaan'		=> $sektor,
					'jabatan'		=> $jabatan,
					'kecamatan'		=> $kecamatan,
					'alamat_rumah'	=> $alamat_rumah,
					'tgl_lahir'	=> $tgal_lahir,
					'id_kota'		=> $kota
				];

				// print_r($data2); die();
				$this->db->set($data2);
				$where = array('id_pembimbing' => $id_pembimbing );
				$this->db->where($where);
				$this->db->update('pembimbing');

				$pesan = "Biodata telah di perbaharui";
				$this->alert_ok($pesan);
				redirect('Pembimbing/edit_profil');
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
				redirect('Pembimbing/edit_profil');

			}
			else
			{	
				if ($passwordlama != base64_decode($data_pembimbing['password'])) {
					$pesan = "Password lama tidak sesuai";
					$this->alert_gagal($pesan);
					redirect('Pembimbing/edit_profil');
				}
				elseif ($passwordbaru != $passwordbaru2) {
					$pesan = "Password baru tidak sama, harap input password baru dengan benar";
					$this->alert_gagal($pesan);
					redirect('Pembimbing/edit_profil');
				}
				else{
					$password_baru3 = base64_encode($passwordbaru);

					$this->db->set('password',$password_baru3);
					$this->db->where('id_pembimbing', $id_pembimbing);
					$this->db->update('pembimbing');

					$pesan = "Password berhasil di perbaharui";
					$this->alert_ok($pesan);
					redirect('Pembimbing/edit_profil');
				}
				
			}
		}


		elseif ($aksi == "hapus_akun") 
		{

			$this->db->delete('pembimbing', array('id_pembimbing' => $id_pembimbing));
			
			if ($data['instruktur']['image'] != 'default_image.jpg') 
			{
				unlink(FCPATH . 'assets/img/pembimbing/' . $data_pembimbing['image']);
			}	


			$data = ['id_pembimbing' 	=> 'dummy'];

			$this->db->set($data);
			$where = array('id_pembimbing' => $id_pembimbing);
			$this->db->where($where);
			$this->db->update('tim');

			$pesan = "Akun pembimbing telah di hapus";
			$this->alert_ok($pesan);
			redirect('Logout/hapus_akun');
			

		}
	}


	public function pengajuan_pembimbing()
	{
		$data['title']   	= "Pengajuan Pembimbing Tim";
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$id_pembimbing 		= $this->session->userdata('id_pembimbing');
		$data['user'] 		= 'Pembimbing';
		$data['pembimbing']	= $this->Pembimbing_Model->cek_pembimbing_by_idPembimbing($id_pembimbing);
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		
		$data['kegiatan_akan_datang'] = $this->Relawan_Model->get_kegiatan_akan_datang();
		$data['jml_kegiatan_akan_datang'] = $this->Relawan_Model->get_jml_kegiatan_akan_datang();
		$data['jml_kegiatan_telah_diikuti'] = $this->Pembimbing_Model->get_jml_kegiatan_telah_diikuti($id_pembimbing);
		
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_pembimbing'] = $this->Pembimbing_Model->cek_status_pembimbing($id_pembimbing);
			if ($data['status_pembimbing']['role_id'] == '2') 
			{
				$data['jml_pengajuan_pembimbing'] = $this->Pembimbing_Model->cek_jml_pengajuan_pembimbing($id_pembimbing, $data['kegiatan_berlangsung']['id_event']); 
				$data['pengajuan_pembimbing'] = $this->Pembimbing_Model->cek_pengajuan_pembimbing($id_pembimbing, $data['kegiatan_berlangsung']['id_event']); 

				$i=0;
				foreach ($data['pengajuan_pembimbing'] as $pengajuan) 
				{
					$data['ketua_tim'][$i] =  $this->Pembimbing_Model->cek_ketua_tim($pengajuan['id_tim'], $data['kegiatan_berlangsung']['id_event']);
					$i++;
				}
				
			}
		}

		// print_r($data['jml_kegiatan_telah_diikuti']); die();

		$this->load->view('template/header_dataTable', $data);
		$this->load->view('relawan/sidebar2', $data);
		$this->load->view('pembimbing/topbar', $data);
		$this->load->view('pembimbing/pengajuan_pembimbing', $data);
		$this->load->view('template/footer_dataTable', $data);
	}

	public function aksi_pengajuan_pembimbing($aksi,$id_tim)
	{

		if ($aksi == 'acc_tim') 
		{
			$this->db->set('status_pembimbing', '2');
			$where = array('id_tim' => $id_tim);
			$this->db->where($where);
			$this->db->update('tim');

			$pesan = "Pengajuan pembimbing tim telah diterima";
			$this->alert_ok($pesan);
			redirect('Pembimbing/pengajuan_pembimbing');
		}

		if ($aksi == 'tolak_tim') 
		{
			$this->db->set('status_pembimbing', '1');
			$where = array('id_tim' => $id_tim);
			$this->db->where($where);
			$this->db->update('tim');

			$pesan = "Pengajuan pembimbing tim telah ditolak";
			$this->alert_ok($pesan);
			redirect('Pembimbing/pengajuan_pembimbing');
		}
	}

	public function kegiatan_akan_datang()
	{
		$data['title']   	= "Kegiatan Akan Datang";
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$id_pembimbing 		= $this->session->userdata('id_pembimbing');
		$data['user'] 		= 'Pembimbing';
		$data['pembimbing']	= $this->Pembimbing_Model->cek_pembimbing_by_idPembimbing($id_pembimbing);
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['kegiatan_akan_datang'] = $this->Relawan_Model->get_kegiatan_akan_datang();
		$data['jml_kegiatan_akan_datang'] = $this->Relawan_Model->get_jml_kegiatan_akan_datang();
		$data['jml_kegiatan_telah_diikuti'] = $this->Pembimbing_Model->get_jml_kegiatan_telah_diikuti($id_pembimbing);
		
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_pembimbing'] = $this->Pembimbing_Model->cek_status_pembimbing($id_pembimbing);
			if ($data['status_pembimbing']['role_id'] == '2') 
			{
				$data['jml_pengajuan_pembimbing'] = $this->Pembimbing_Model->cek_jml_pengajuan_pembimbing($id_pembimbing, $data['kegiatan_berlangsung']['id_event']); 
				$data['pengajuan_pembimbing'] = $this->Pembimbing_Model->cek_pengajuan_pembimbing($id_pembimbing, $data['kegiatan_berlangsung']['id_event']); 

				$i=0;
				foreach ($data['pengajuan_pembimbing'] as $pengajuan) 
				{
					$data['ketua_tim'][$i] =  $this->Pembimbing_Model->cek_ketua_tim($pengajuan['id_tim'], $data['kegiatan_berlangsung']['id_event']);
					$i++;
				}
				
			}
		}


		// print_r($data['distrik']); die();

		$this->load->view('template/header', $data);
		$this->load->view('pembimbing/sidebar', $data);
		$this->load->view('pembimbing/topbar', $data);
		$this->load->view('pembimbing/kegiatan_akan_datang', $data);
		$this->load->view('template/footer', $data);
	}


	public function aksi_event($aksi)
	{
		$kegiatan_berlangsung = $this->Relawan_Model->get_kegiatan_berlangsung();
		// print_r($kegiatan_berlangsung); die();
		$id_pembimbing 	 = $this->session->userdata('id_pembimbing');

		if ($aksi == 'ikuti_event') 
		{
			$this->db->set('role_id', '2');
			$where = array('id_pembimbing' => $id_pembimbing);
			$this->db->where($where);
			$this->db->update('pembimbing');

			$pesan = "Anda sedang mengikuti event";
			$this->alert_ok($pesan);
			redirect('Pembimbing/kegiatan_berlangsung');
		}

		if ($aksi == 'batal_ikuti_event') 
		{
			// set pembimbing tidak mengikuti event
			$this->db->set('role_id', '1');
			$where = array('id_pembimbing' => $id_pembimbing);
			$this->db->where($where);
			$this->db->update('pembimbing');

			// set status pembimbing tim yang sudah di acc menjadi di tolak pembimbing
			$this->db->set('status_pembimbing', '1');
			$where = array('id_event' => $kegiatan_berlangsung['id_event']);
			$this->db->where($where);
			$this->db->update('tim');

			$pesan = "Anda tidak sedang mengikuti event";
			
			$this->alert_ok($pesan);
			redirect('Pembimbing/kegiatan_akan_datang');
		}
	}


	public function kegiatan_berlangsung()
	{
		$data['title']   	= "Kegiatan Berlangsung";
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$id_pembimbing 		= $this->session->userdata('id_pembimbing');
		$data['user'] 		= 'Pembimbing';
		$data['pembimbing']	= $this->Pembimbing_Model->cek_pembimbing_by_idPembimbing($id_pembimbing);
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['kegiatan_akan_datang'] = $this->Relawan_Model->get_kegiatan_akan_datang();
		$data['jml_kegiatan_akan_datang'] = $this->Relawan_Model->get_jml_kegiatan_akan_datang();
		$data['jml_kegiatan_telah_diikuti'] = $this->Pembimbing_Model->get_jml_kegiatan_telah_diikuti($id_pembimbing);
		

		if ($data['kegiatan_berlangsung']) 
		{
			$cek_tim_pembimbing = $this->Pembimbing_Model->get_tim_pembimbing($id_pembimbing, $data['kegiatan_berlangsung']['id_event']);

			$data['status_pembimbing'] = $this->Pembimbing_Model->cek_status_pembimbing($id_pembimbing);
			if ($data['status_pembimbing']['role_id'] == '2') 
			{
				$data['jml_pengajuan_pembimbing'] = $this->Pembimbing_Model->cek_jml_pengajuan_pembimbing($id_pembimbing, $data['kegiatan_berlangsung']['id_event']); 
				$data['pengajuan_pembimbing'] = $this->Pembimbing_Model->cek_pengajuan_pembimbing($id_pembimbing, $data['kegiatan_berlangsung']['id_event']); 

				$data['tim_pembimbing'] = $this->Pembimbing_Model->get_tim_pembimbing($id_pembimbing, $data['kegiatan_berlangsung']['id_event']);

				$i=0;
				foreach ($data['pengajuan_pembimbing'] as $pengajuan) 
				{
					$data['ketua_tim'][$i] =  $this->Pembimbing_Model->cek_ketua_tim($pengajuan['id_tim'], $data['kegiatan_berlangsung']['id_event']);
					$i++;
				}
				
			}
		}
		else
		{
			// $data = ['role_id' 	=> '1'];

			// $this->db->set($data);
			// $where = array('id_komi' => $id_pkl);
			// $this->db->where($where);
			// $this->db->update('komis');

			$data['status_pembimbing']['role_id'] = '1';
		}

		// echo $id_pembimbing; die();
		// print_r($data['jml_kegiatan_telah_diikuti']); die();

		$this->load->view('template/header', $data);
		$this->load->view('pembimbing/sidebar', $data);
		$this->load->view('pembimbing/topbar', $data);
		$this->load->view('relawan/kegiatan_berlangsung', $data);
		$this->load->view('template/footer', $data);
	}



	public function tim_pembimbing()
	{
		$data['title']   	= "Tim Pembimbing";
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$id_pembimbing 		= $this->session->userdata('id_pembimbing');
		$data['user'] 		= 'Pembimbing';
		$data['pembimbing']	= $this->Pembimbing_Model->cek_pembimbing_by_idPembimbing($id_pembimbing);
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['kegiatan_akan_datang'] = $this->Relawan_Model->get_kegiatan_akan_datang();
		$data['jml_kegiatan_akan_datang'] = $this->Relawan_Model->get_jml_kegiatan_akan_datang();
		$data['jml_kegiatan_telah_diikuti'] = $this->Pembimbing_Model->get_jml_kegiatan_telah_diikuti($id_pembimbing);
		
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_pembimbing'] = $this->Pembimbing_Model->cek_status_pembimbing($id_pembimbing);
			if ($data['status_pembimbing']['role_id'] == '2') 
			{
				$data['jml_pengajuan_pembimbing'] = $this->Pembimbing_Model->cek_jml_pengajuan_pembimbing($id_pembimbing, $data['kegiatan_berlangsung']['id_event']); 
				$data['pengajuan_pembimbing'] = $this->Pembimbing_Model->cek_pengajuan_pembimbing($id_pembimbing, $data['kegiatan_berlangsung']['id_event']); 
				$data['tim_pembimbing'] = $this->Pembimbing_Model->get_tim_pembimbing($id_pembimbing, $data['kegiatan_berlangsung']['id_event']);

				$i=0;
				foreach ($data['pengajuan_pembimbing'] as $pengajuan) 
				{
					$data['ketua_tim'][$i] =  $this->Pembimbing_Model->cek_ketua_tim($pengajuan['id_tim'], $data['kegiatan_berlangsung']['id_event']);
					$i++;
				}
				
			}
		}
		else
		{
			redirect('Pembimbing/kegiatan_selesai');
		}

		if ($data['status_pembimbing']['role_id'] != '2') 
		{
			redirect('Pembimbing/kegiatan_berlangsung');
		}
		// print_r($data['tim_pembimbing']); die();

		$this->load->view('template/header_dataTable', $data);
		$this->load->view('relawan/sidebar2', $data);
		$this->load->view('pembimbing/topbar', $data);
		$this->load->view('pembimbing/tim_bimbingan', $data);
		$this->load->view('template/footer_dataTable', $data);
	}



	public function tim($id_tim)
	{
		$data['title']   	= "Detail Tim Pembimbing";
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$id_pembimbing 		= $this->session->userdata('id_pembimbing');
		$data['user'] 		= 'Pembimbing';
		$data['pembimbing']	= $this->Pembimbing_Model->cek_pembimbing_by_idPembimbing($id_pembimbing);
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['kegiatan_akan_datang'] = $this->Relawan_Model->get_kegiatan_akan_datang();
		$data['jml_kegiatan_akan_datang'] = $this->Relawan_Model->get_jml_kegiatan_akan_datang();
		$data['jml_kegiatan_telah_diikuti'] = $this->Pembimbing_Model->get_jml_kegiatan_telah_diikuti($id_pembimbing);
		
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_pembimbing'] = $this->Pembimbing_Model->cek_status_pembimbing($id_pembimbing);
			if ($data['status_pembimbing']['role_id'] == '2') 
			{
				$data['ketua_tim'] = $this->Pembimbing_Model->get_ketua_tim_pembimbing($id_tim);
				$data['anggota_tim'] = $this->Pembimbing_Model->get_anggota_tim_pembimbing($id_tim);
			}
		}
		else
		{
			$data['ketua_tim'] = $this->Pembimbing_Model->get_ketua_tim_pembimbing($id_tim);
			
			$data['anggota_tim'] = $this->Pembimbing_Model->get_anggota_tim_pembimbing($id_tim);
		}

		if ($data['status_pembimbing']['role_id'] != '2') 
		{
			redirect('Pembimbing/kegiatan_berlangsung');
		}
		// print_r($data['kegiatan_berlangsung']); die();

		$this->load->view('template/header_dataTable', $data);
		$this->load->view('relawan/sidebar2', $data);
		$this->load->view('pembimbing/topbar', $data);
		$this->load->view('relawan/detail_tim', $data);
		$this->load->view('template/footer_dataTable', $data);
	}

	public function tim2($id_tim)
	{
		$data['title']   	= "Detail Tim Pembimbing2";
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$id_pembimbing 		= $this->session->userdata('id_pembimbing');
		$data['user'] 		= 'Pembimbing';
		$data['pembimbing']	= $this->Pembimbing_Model->cek_pembimbing_by_idPembimbing($id_pembimbing);
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['kegiatan_akan_datang'] = $this->Relawan_Model->get_kegiatan_akan_datang();
		$data['jml_kegiatan_akan_datang'] = $this->Relawan_Model->get_jml_kegiatan_akan_datang();
		$data['jml_kegiatan_telah_diikuti'] = $this->Pembimbing_Model->get_jml_kegiatan_telah_diikuti($id_pembimbing);
		
		$data['status_pembimbing'] = $this->Pembimbing_Model->cek_status_pembimbing($id_pembimbing);
			$data['ketua_tim'] = $this->Pembimbing_Model->get_ketua_tim_pembimbing($id_tim);
				$data['anggota_tim'] = $this->Pembimbing_Model->get_anggota_tim_pembimbing($id_tim);
			
		

		
		// print_r($data['ketua_tim']); die();

		$this->load->view('template/header_dataTable', $data);
		$this->load->view('relawan/sidebar2', $data);
		$this->load->view('pembimbing/topbar', $data);
		$this->load->view('relawan/detail_tim', $data);
		$this->load->view('template/footer_dataTable', $data);
	}


	public function lihat_berkas($aksi,$id_tim)
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-mg-b alert-success-style4 alert-st-bg3 alert-st-bg14 animated--grow-in show" style="background-color: white;">
			<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
			<span class="icon-sc-cl" aria-hidden="true">&times;</span>
			</button>
			<i class="fa fa-times edu-danger-error admin-check-pro admin-check-pro-clr3 admin-check-pro-clr14" aria-hidden="true"></i>
			<p><strong>Maaf, belum ada berkas yang di unggah personel tim!</strong></p>
			</div>');
		if ($aksi == 'surat_izin_ortu') 
		{
			redirect('Pembimbing/tim/'.$id_tim);
		}
		else if ($aksi == 'surat_pengantar' || $aksi == 'survey_permintaan' || $aksi == 'surat_konfirmasi' || $aksi == 'artikel_miftek' || $aksi == 'presensi_pelayanan' || $aksi == 'berita_acara') 
		{
			redirect('Pembimbing/tim_pembimbing');
		}
		else if ($aksi == 'artikel_berita') 
		{
			redirect('Pembimbing/artikel_berita/'.$id_tim);
		}
		
	}

	public function artikel_berita($id_tim)
	{
		$data['title']   	= "Artikel Berita Tim";
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$id_pembimbing 		= $this->session->userdata('id_pembimbing');
		$data['user'] 		= 'Pembimbing';
		$data['pembimbing']	= $this->Pembimbing_Model->cek_pembimbing_by_idPembimbing($id_pembimbing);
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['kegiatan_akan_datang'] = $this->Relawan_Model->get_kegiatan_akan_datang();
		$data['jml_kegiatan_akan_datang'] = $this->Relawan_Model->get_jml_kegiatan_akan_datang();
		$data['jml_kegiatan_telah_diikuti'] = $this->Pembimbing_Model->get_jml_kegiatan_telah_diikuti($id_pembimbing);
		$data['tim'] = $this->Pembimbing_Model->get_artikel_berita_tim($id_tim);
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_pembimbing'] = $this->Pembimbing_Model->cek_status_pembimbing($id_pembimbing);
			if ($data['status_pembimbing']['role_id'] == '2') 
			{
				$data['ketua_tim'] = $this->Pembimbing_Model->get_ketua_tim_pembimbing($id_tim);
				$data['anggota_tim'] = $this->Pembimbing_Model->get_anggota_tim_pembimbing($id_tim);
			}
		}

		if ($data['status_pembimbing']['role_id'] != '2') 
		{
			redirect('Pembimbing/kegiatan_berlangsung');
		}
		// print_r($data['artikel']); die();

		$this->load->view('template/header', $data);
		$this->load->view('relawan/sidebar2', $data);
		$this->load->view('pembimbing/topbar', $data);
		$this->load->view('relawan/lihat_artikel', $data);
		$this->load->view('template/footer', $data);
	}

	public function template_berkas()
	{
		$data['title']   	= "Template Berkas";
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$id_pembimbing 		= $this->session->userdata('id_pembimbing');
		$data['user'] 		= 'Pembimbing';
		$data['pembimbing']	= $this->Pembimbing_Model->cek_pembimbing_by_idPembimbing($id_pembimbing);
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['kegiatan_akan_datang'] = $this->Relawan_Model->get_kegiatan_akan_datang();
		$data['jml_kegiatan_akan_datang'] = $this->Relawan_Model->get_jml_kegiatan_akan_datang();
		$data['jml_kegiatan_telah_diikuti'] = $this->Pembimbing_Model->get_jml_kegiatan_telah_diikuti($id_pembimbing);

		$data['template'] = $this->Pembimbing_Model->get_template_berkas_pelaporan();
		$data['nama_template'] = array('0' => 'Surat Izin', '1' => 'Survei Permintaan', '2' => 'Presensi Layanan', '3' => 'Berita Acara Layanan', '4' => 'Survei Program', '5' => 'Artikel Berita', '6' => 'Artikel MIFTEK');
		
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_pembimbing'] = $this->Pembimbing_Model->cek_status_pembimbing($id_pembimbing);
		}

		if ($data['status_pembimbing']['role_id'] != '2') 
		{
			redirect('Pembimbing/kegiatan_berlangsung');
		}
		
		// print_r($data['status_pembimbing']); die();
// 
		$this->load->view('template/header', $data);
		$this->load->view('relawan/sidebar2', $data);
		$this->load->view('pembimbing/topbar', $data);
		$this->load->view('pembimbing/template', $data);
		$this->load->view('template/footer', $data);
	}

	public function unduh_template($nama_template)
	{
		$file = urldecode($nama_template);
		// echo "$file"; die();

		force_download('./assets/file/berkas/'.$file,NULL);
	}

	public function pembekalan()
	{
		$data['title']   	= "Agenda Pembekalan Event";
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$id_pembimbing 		= $this->session->userdata('id_pembimbing');
		$data['user'] 		= 'Pembimbing';
		$data['pembimbing']	= $this->Pembimbing_Model->cek_pembimbing_by_idPembimbing($id_pembimbing);
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['kegiatan_akan_datang'] = $this->Relawan_Model->get_kegiatan_akan_datang();
		$data['jml_kegiatan_akan_datang'] = $this->Relawan_Model->get_jml_kegiatan_akan_datang();
		$data['jml_kegiatan_telah_diikuti'] = $this->Pembimbing_Model->get_jml_kegiatan_telah_diikuti($id_pembimbing);
		
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_pembimbing'] = $this->Pembimbing_Model->cek_status_pembimbing($id_pembimbing);
			if ($data['status_pembimbing']['role_id'] == '2') 
			{
				$data['jml_pengajuan_pembimbing'] = $this->Pembimbing_Model->cek_jml_pengajuan_pembimbing($id_pembimbing, $data['kegiatan_berlangsung']['id_event']); 
				$data['agenda_pembekalan'] = $this->Relawan_Model->get_agenda_pembekalan_by_id_event($data['kegiatan_berlangsung']['id_event']);
				
			}
		}

		if ($data['status_pembimbing']['role_id'] != '2') 
		{
			redirect('Pembimbing/kegiatan_berlangsung');
		}
		// print_r($data['agenda_pembekalan']); die();

		$this->load->view('template/header_dataTable', $data);
		$this->load->view('relawan/sidebar2', $data);
		$this->load->view('pembimbing/topbar', $data);
		$this->load->view('relawan/agenda_pembekalan', $data);
		$this->load->view('template/footer_dataTable', $data);
	}

	
	public function penilaian()
	{
		$data['title']   	= "Penilaian Pembimbing";
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$id_pembimbing 		= $this->session->userdata('id_pembimbing');
		$data['user'] 		= 'Pembimbing';
		$data['pembimbing']	= $this->Pembimbing_Model->cek_pembimbing_by_idPembimbing($id_pembimbing);
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['kegiatan_akan_datang'] = $this->Relawan_Model->get_kegiatan_akan_datang();
		$data['jml_kegiatan_akan_datang'] = $this->Relawan_Model->get_jml_kegiatan_akan_datang();
		$data['jml_kegiatan_telah_diikuti'] = $this->Pembimbing_Model->get_jml_kegiatan_telah_diikuti($id_pembimbing);
		
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_pembimbing'] = $this->Pembimbing_Model->cek_status_pembimbing($id_pembimbing);
			if ($data['status_pembimbing']['role_id'] == '2') 
			{
				$data['jml_pengajuan_pembimbing'] = $this->Pembimbing_Model->cek_jml_pengajuan_pembimbing($id_pembimbing, $data['kegiatan_berlangsung']['id_event']); 
				$data['pengajuan_pembimbing'] = $this->Pembimbing_Model->cek_pengajuan_pembimbing($id_pembimbing, $data['kegiatan_berlangsung']['id_event']); 
				$data['tim_pembimbing'] = $this->Pembimbing_Model->get_tim_pembimbing($id_pembimbing, $data['kegiatan_berlangsung']['id_event']);
				$data['indikator_penilaian'] = $this->Relawan_Model->get_indikator_penilaian_anggota();
				$data['indikator_laporan'] = $this->Pembimbing_Model->get_indikator_penilaian_laporan();
				$data['indikator_penilaian_dokumen'] = $this->Pembimbing_Model->get_indikator_penilaian_dokumen();
				// array('0' => 'Presensi' ,'1' => 'Bukti Layanan Pengguna' ,'2' => 'Artikel Berita', '3' => 'Artikel Jurnal MIFTEK' );


				$i=0;
				foreach ($data['tim_pembimbing'] as $tim) 
				{
					$data['status_penilaian_anggota_tim'][$i] = $this->Pembimbing_Model->get_status_penilaian_individu_by_pembimbing($id_pembimbing,$tim['id_tim']);
					$data['anggota_tim'][$i]				  = $this->Pembimbing_Model->get_personel_tim_by_id_tim($tim['id_tim']);
					$data['status_penilaian_tim'][$i] 		  = $this->Pembimbing_Model->cek_status_penilaian_laporan($tim['id_tim']);
					$data['status_penilaian_berkas_tim'][$i]  = $this->Pembimbing_Model->cek_status_penilaian_berkas_tim($tim['id_tim']);
			
					$i++;
				}

				$i=0;
				foreach ($data['pengajuan_pembimbing'] as $pengajuan) 
				{
					$data['ketua_tim'][$i] =  $this->Pembimbing_Model->cek_ketua_tim($pengajuan['id_tim'], $data['kegiatan_berlangsung']['id_event']);
					$i++;
				}
				
			}
		}
		else
		{
			redirect('Pembimbing/kegiatan_selesai');
		}

		
		if ($data['status_pembimbing']['role_id'] != '2') 
		{
			redirect('Pembimbing/kegiatan_berlangsung');
		}
		// print_r($data['status_penilaian']); die();

		$this->load->view('template/header_dataTable', $data);
		$this->load->view('relawan/sidebar2', $data);
		$this->load->view('pembimbing/topbar', $data);
		$this->load->view('pembimbing/penilaian', $data);
		$this->load->view('template/footer_dataTable', $data);

	}

	public function penilaian_anggota($id_tim)
	{
		$id_pembimbing 					= $this->session->userdata('id_pembimbing');
		$data['kegiatan_berlangsung'] 	= $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['pembimbing']				= $this->Pembimbing_Model->cek_pembimbing_by_idPembimbing($id_pembimbing);
		$data['kegiatan_berlangsung'] 	= $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['personel_tim']			= $this->Pembimbing_Model->get_personel_tim_by_id_tim($id_tim);
		
		
		$i=0;
		foreach ($data['personel_tim'] as $pers) 
		{
			$this->form_validation->set_rules($pers['id_anggota'], 'Nilai', 'trim');
			$nilai[$i] = htmlspecialchars($this->input->post($pers['id_anggota'], true));
			$i++;
		}


		if ($this->form_validation->run() == false)
		{
			$pesan = "Gagal merekam penilaian, harap mengisi data dengan benar";
			$this->alert_gagal($pesan);
			redirect('Relawan/penilaian');
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
					'id_penilai'		=> $id_pembimbing.'P',
					'nilai'				=> $nilai[$i]					
				);

				// print_r($data); die();
				$this->db->insert('nilai_individu',$data);
				$i++;
			}


			$pesan = "Terimakasih sudah memberikan penilaian, data penilaian sudah berhasil direkam";
			$this->alert_ok($pesan);
			redirect('Pembimbing/penilaian');
		}
	}



	public function penilaian_tim($id_tim)
	{
		$id_pembimbing 					= $this->session->userdata('id_pembimbing');
		$data['kegiatan_berlangsung'] 	= $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['pembimbing']				= $this->Pembimbing_Model->cek_pembimbing_by_idPembimbing($id_pembimbing);
		$data['kegiatan_berlangsung'] 	= $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['tim']					= $this->Pembimbing_Model->get_tim_by_id_tim($id_tim);
		$data['indikator_laporan'] 		= $this->Pembimbing_Model->get_indikator_penilaian_laporan();
		$jml_indikator_laporan			= $this->Pembimbing_Model->get_jml_indikator_penilaian_laporan();
		$status_penilaian 				= $this->Pembimbing_Model->cek_status_penilaian_laporan($id_tim);
		$persentase						= $this->Pembimbing_Model->get_persentase_laporan($data['indikator_laporan'][0]['id_kriteria']);
		
		
		$i=0;
		foreach ($data['indikator_laporan'] as $idk) 
		{
			$this->form_validation->set_rules($idk['id_indikator'], 'Nilai', 'trim');
			$nilai[$i] = htmlspecialchars($this->input->post($idk['id_indikator'], true));
			$i++;
		}

		

		if ($this->form_validation->run() == false)
		{
			$pesan = "Gagal merekam penilaian, harap mengisi data dengan benar";
			$this->alert_gagal($pesan);
			redirect('Relawan/penilaian');
		}
		else
		{	
			$total  = array_sum($nilai) / $jml_indikator_laporan;
			$nilai_akhir = number_format((($total*$persentase['persentase'])/100), 2, '.', '');


			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$kode = substr(str_shuffle($permitted_chars), 0, 3);
			$id = date('YmdGis').$kode;

			if (!$status_penilaian) 
			{
				$data1 = array(
					'id_nilai_kinerja_tim' 	=> $id,
					'id_tim'				=> $data['tim']['id_tim'],
					'nilai_dokumen'			=> '',
					'nilai_mitra'			=> '',
					'nilai_laporan'			=> $nilai_akhir			
				);
				
				
				$this->db->insert('nilai_kinerja_tim',$data1);
				$pesan = "Terimakasih sudah memberikan penilaian, data penilaian laporan tim sudah berhasil direkam";
				$this->alert_ok($pesan);
			}
			else
			{
				if ($status_penilaian['nilai_laporan'] == '0') 
				{
					$data1 = array(
						'nilai_laporan' 	=> $nilai_akhir,
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



			redirect('Pembimbing/penilaian');
		}
		
	}


	public function penilaian_dokumen_tim($id_tim)
	{
		$id_pembimbing 					= $this->session->userdata('id_pembimbing');
		$data['kegiatan_berlangsung'] 	= $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['pembimbing']				= $this->Pembimbing_Model->cek_pembimbing_by_idPembimbing($id_pembimbing);
		$data['kegiatan_berlangsung'] 	= $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['tim']					= $this->Pembimbing_Model->get_tim_by_id_tim($id_tim);
		$indikator_penilaian_dokumen 	= $this->Pembimbing_Model->get_indikator_penilaian_dokumen();
		$jml_indikator_penilaian		= $this->Pembimbing_Model->get_jml_indikator_penilaian_dokumen();
		$status_penilaian 				= $this->Pembimbing_Model->cek_status_penilaian_laporan($id_tim);
		$persentase						= $this->Pembimbing_Model->get_persentase_laporan($indikator_penilaian_dokumen[0]['id_kriteria']);
		
		// print_r($status_penilaian); die();
		
		$i=0;
		foreach ($indikator_penilaian_dokumen as $idk) 
		{
			$this->form_validation->set_rules($idk['id_indikator'], 'Nilai', 'trim');
			$nilai[$i] = htmlspecialchars($this->input->post($idk['id_indikator'], true));
			$i++;
		}

		

		if ($this->form_validation->run() == false)
		{
			$pesan = "Gagal merekam penilaian, harap mengisi data dengan benar";
			$this->alert_gagal($pesan);
			redirect('Relawan/penilaian');
		}
		else
		{	
			$total  = array_sum($nilai) / $jml_indikator_penilaian;
			$nilai_akhir = number_format((($total*$persentase['persentase'])/100), 2, '.', '');

			// echo$nilai_akhir; die();
			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$kode = substr(str_shuffle($permitted_chars), 0, 3);
			$id = date('YmdGis').$kode;

			if (!$status_penilaian) 
			{
				$data1 = array(
					'id_nilai_kinerja_tim' 	=> $id,
					'id_tim'				=> $data['tim']['id_tim'],
					'nilai_dokumen'			=> $nilai_akhir	,
					'nilai_mitra'			=> '',
					'nilai_laporan'			=> ''		
				);
				
				
				$this->db->insert('nilai_kinerja_tim',$data1);
				$pesan = "Terimakasih sudah memberikan penilaian, data penilaian dokumen tim sudah berhasil direkam";
				$this->alert_ok($pesan);
			}
			else
			{
				if ($status_penilaian['nilai_dokumen'] == '0') 
				{
					$data1 = array(
						'nilai_dokumen' 	=> $nilai_akhir,
					);

					$this->db->set($data1);
					$where = array( 'id_tim' => $data['tim']['id_tim']);
					$this->db->where($where);
					$this->db->update('nilai_kinerja_tim');

					$pesan = "Terimakasih sudah memberikan penilaian, data penilaian dokumen tim sudah berhasil direkam";
					$this->alert_ok($pesan);
				}
				else
				{

					$pesan = "Penilaian gagal direkam, Anda telah memberikan nilai laporan tim untuk tim ini";
					$this->alert_info($pesan);
				}
			}

			$i++;



			redirect('Pembimbing/penilaian');
		}
	}



	public function kegiatan_selesai()
	{
		$data['title']   	= "Kegiatan Selesai";
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$id_pembimbing 		= $this->session->userdata('id_pembimbing');
		$data['user'] 		= 'Pembimbing';
		$data['pembimbing']	= $this->Pembimbing_Model->cek_pembimbing_by_idPembimbing($id_pembimbing);
		$data['kegiatan_berlangsung'] = $this->Relawan_Model->get_kegiatan_berlangsung();
		$data['kegiatan_akan_datang'] = $this->Relawan_Model->get_kegiatan_akan_datang();
		$data['jml_kegiatan_akan_datang'] = $this->Relawan_Model->get_jml_kegiatan_akan_datang();
		$data['jml_kegiatan_telah_diikuti'] = $this->Pembimbing_Model->get_jml_kegiatan_telah_diikuti($id_pembimbing);
		$data['kegiatan'] = $this->Pembimbing_Model->get_kegiatan_telah_diikuti($id_pembimbing);
		// print_r($data['kegiatan']); die();
		if ($data['kegiatan_berlangsung']) 
		{
			$data['status_pembimbing'] = $this->Pembimbing_Model->cek_status_pembimbing($id_pembimbing);
			if ($data['status_pembimbing']['role_id'] == '2') 
			{
				$data['jml_pengajuan_pembimbing'] = $this->Pembimbing_Model->cek_jml_pengajuan_pembimbing($id_pembimbing, $data['kegiatan_berlangsung']['id_event']); 
				$data['pengajuan_pembimbing'] = $this->Pembimbing_Model->cek_pengajuan_pembimbing($id_pembimbing, $data['kegiatan_berlangsung']['id_event']); 

				$i=0;
				foreach ($data['pengajuan_pembimbing'] as $pengajuan) 
				{
					$data['ketua_tim'][$i] =  $this->Pembimbing_Model->cek_ketua_tim($pengajuan['id_tim'], $data['kegiatan_berlangsung']['id_event']);
					$i++;
				}
				
			}
		}

		// jika ada kegiatan sudah diikuti
		if ($data['kegiatan']) 
		{	
			$i=0;
			foreach ($data['kegiatan'] as $tim) 
			{
				$data['tim_bimbingan'][$i] = $this->Pembimbing_Model->cek_tim_yang_telah_dibimbing($id_pembimbing, $tim['id_event']);
				$i++;
			}
		}

		
		if ($data['pembimbing']['id_kota'] != ''||$data['pembimbing']['id_kota'] != '=') 
		{
			$data['alamat_pembimbing'] = $this->Pembimbing_Model->get_alamat_pembimbing_by_idKota($data['pembimbing']['id_kota']);
			$data['distrik'] = $this->Pangkalan_Model->get_distrik($data['alamat_pembimbing']['id_provinsi']);
			$data['provinsi'] = $this->Pangkalan_Model->get_provinsi();
		}
		// print_r($data['kegiatan']); die();

		$this->load->view('template/header_dataTable', $data);
		$this->load->view('pembimbing/sidebar', $data);
		$this->load->view('pembimbing/topbar', $data);
		$this->load->view('relawan/kegiatan_selesai', $data);
		$this->load->view('template/footer_dataTable', $data);
	}


	public function sertifikat($id_pembimbing,$id_event)
	{
		$data['user'] 		= 'Pembimbing';
		$data['pembimbing']	= $this->Pembimbing_Model->cek_pembimbing_by_idPembimbing($id_pembimbing);
		$data['kegiatan'] 	= $this->Pembimbing_Model->get_kegiatan_telah_diikuti($id_pembimbing);
		$data['template_sertifikat'] 	= $this->Relawan_Model->get_template_sertifikat_by_id_event($id_event);
		$data['event']		= $this->Pembimbing_Model->get_Event_by_id_event($id_event);
		
		// jika ada kegiatan sudah diikuti
		if ($data['kegiatan']) 
		{	
			$data['tim_bimbingan'] = $this->Pembimbing_Model->cek_jml_tim_yang_telah_dibimbing($id_pembimbing, $id_event);
		}
		
		// print_r($data['tim_bimbingan']);
		$this->load->view('sertifikat/pembimbing', $data);
	}
	public function get_kota()
	{
		$this->load->model('Authentikasi');
		$id_provinsi_terpilih = $_POST['id_provinsi'];
		$data_distrik = $this->Authentikasi->get_distrik($id_provinsi_terpilih);
		$id_pembimbing 	 = $this->session->userdata('id_pembimbing');
		$data['user'] 	 = 'Pembimbing';
		$data['pembimbing'] = $this->Pembimbing_Model->cek_pembimbing_by_idpembimbing2($id_pembimbing);


		echo "<option value=''>--Pilih Kabupaten/Kota--</option>";

		foreach ($data_distrik as $key => $distrik) 
		{                        
			echo "<option value='".$distrik['id_kota']."' id_kota='".$distrik['id_kota']."' type='".$distrik['type']."' nama_kota='".$distrik['nama_kota']."' id_provinsi='".$distrik['id_provinsi']."' ";
			if ($data['pembimbing']['id_kota'] == $distrik['id_kota']) {
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

		$id_pembimbing 	 = $this->session->userdata('id_pembimbing');
		$data['user'] 	 = 'Pembimbing';
		$data['pembimbing'] = $this->Pembimbing_Model->cek_pembimbing_by_idpembimbing2($id_pembimbing);

		echo "<option value=''>--Pilih provinsi--</option>";

		foreach ($data_provinsi as $key => $provinsi) 
		{     
			echo "<option value='".$provinsi['id_provinsi']."' id_provinsi='".$provinsi['id_provinsi']."' ";
			if ($data['pembimbing']['id_provinsi'] == $provinsi['id_provinsi']) {
				echo "selected";
			}                
			echo ">";
			echo $provinsi['nama_provinsi'];
			echo "</option>";
		}
	}



}
?>