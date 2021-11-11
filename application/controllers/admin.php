<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin  extends CI_Controller 

{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id_admin'))
		{	
			redirect('LandingPage');
		}
		$this->load->model('Relawan_Model');
		$this->load->model('Admin_Model');


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
		if ($this->session->userdata('id_event')) 
		{
			redirect('Admin/detail_Event');
		}
		elseif ($this->session->userdata('id_pangkalan'))
		{
			redirect('Admin/detail_pangkalan');
		}
		else
		{
			$this->load->model('Admin_Model');
			
			$data['title']   = "Dashboard Admin";
			$id_admin 	 = $this->session->userdata('id_admin');
			$data['user'] 	= 'Admin';
			$data['admin'] = $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
			$data['jml_event'] = $this->Admin_Model->get_jml_event();
			$data['jml_komisariat'] = $this->Admin_Model->get_jml_komisariat();
			$data['komisariat'] = $this->Admin_Model->get_komisariat();
			$data['jml_permintaan_instruktur'] = $this->Admin_Model->get_jml_permintaan_akun_instruktur();		
			$data['jml_permintaan'] = $this->Admin_Model->get_jml_permintaan_akun_komisariat();
			$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
			$data['event'] = $this->Admin_Model->get_all_event();
			$data['jenis_mitra'] = $this->Admin_Model->get_jenis_mitra2();			
			$data['jml_jenis_mitra'] = $this->Admin_Model->get_jml_jenis_mitra2();
			
			// konfigurasi bar chart
			$data['jml_pelayanan'][0] = $this->Admin_Model->get_jml_layanan_mitra('Layanan Pengguna');
			$data['jml_pelayanan'][1] = $this->Admin_Model->get_jml_layanan_mitra('Layanan Informasi');
			$data['jml_pelayanan'][2] = $this->Admin_Model->get_jml_layanan_mitra('Layanan Perangkat');
			$data['nilai_terbesar_jml_pelayanan'] = max($data['jml_pelayanan']);
			// akhir konfigurasi bar chart
			
			// variabel warna
			$data['warna1'] = array('0'=>'#4e73df', '1'=>'#1cc88a', '2'=>'#36b9cc', '3'=>'#cc5636', '4'=>'#4dcf0c', '5'=>'#f4fc08', '6'=>'#f00707', '7'=>'#05fce8', '8'=>'#8607f5', '9'=>'#b87209', 
				'10'=>'#fa05dd', '11'=>'#4e73df', '12'=>'#1cc88a', '13'=>'#36b9cc', '14'=>'#b02e0b', '15'=>'#358f09', '16'=>'#b2b807', '17'=>'#2e838f', '18'=>'#98ebe4', '19'=>'#6609b8', 
				'20'=>'#915b0a', '21'=>'#ad079a', '22'=>'#949194', '23'=>'#4c65ad', '24'=>'#436630', '25'=>'#4e73df', '26'=>'#1cc88a', '27'=>'#36b9cc', '28'=>'#b02e0b', '29'=>'#358f09', 
				'30'=>'#b2b807', '31'=>'#bd0b0b', '32'=>'#0aa397', '33'=>'#6609b8', '34'=>'#915b0a', '35'=>'#ad079a', '36'=>'#2e4382', '37'=>'#17825c', '38'=>'#2e838f', '39'=>'#a14e38', 
				'40'=>'#5c9141', '41'=>'#9a9e31', '42'=>'#156570', '43'=>'#05fce8', '44'=>'#523769', '45'=>'#784c0a', '46'=>'#75146a', '47'=>'#666466', '48'=>'#3c518c', '49'=>'#324d23', 
				'50'=>'#4e73df', '51'=>'#1cc88a', '52'=>'#36b9cc', '53'=>'#cc5636', '54'=>'#4dcf0c', '55'=>'#f4fc08', '56'=>'#f00707', '57'=>'#05fce8', '58'=>'#8607f5', '59'=>'#b87209', 
				'60'=>'#fa05dd', '61'=>'#4e73df', '62'=>'#1cc88a', '63'=>'#36b9cc', '64'=>'#b02e0b', '65'=>'#358f09', '66'=>'#b2b807', '67'=>'#2e838f', '68'=>'#98ebe4', '69'=>'#6609b8', 
				'70'=>'#915b0a', '71'=>'#ad079a', '72'=>'#949194', '73'=>'#4c65ad', '74'=>'#436630', '75'=>'#4e73df', '76'=>'#1cc88a', '77'=>'#36b9cc', '78'=>'#b02e0b', '79'=>'#358f09', 
				'80'=>'#b2b807', '81'=>'#bd0b0b', '82'=>'#0aa397', '83'=>'#6609b8', '84'=>'#915b0a', '85'=>'#ad079a', '86'=>'#2e4382', '87'=>'#17825c', '88'=>'#2e838f', '89'=>'#a14e38', 
				'90'=>'#5c9141', '91'=>'#9a9e31', '92'=>'#156570', '93'=>'#05fce8', '94'=>'#523769', '95'=>'#784c0a', '96'=>'#75146a', '97'=>'#666466', '98'=>'#3c518c', '99'=>'#324d23');

			$data['warna2'] = array('0'=>'#4e73df', '1'=>'#1cc88a', '2'=>'#36b9cc', '3'=>'#b02e0b', '4'=>'#358f09', '5'=>'#b2b807', '6'=>'#bd0b0b', '7'=>'#0aa397', '8'=>'#6609b8', '9'=>'#915b0a', 
				'10'=>'#ad079a', '11'=>'#2e4382', '12'=>'#17825c', '13'=>'#2e838f', '14'=>'#a14e38', '15'=>'#5c9141', '16'=>'#9a9e31', '17'=>'#156570', '18'=>'#05fce8', '19'=>'#523769', 
				'20'=>'#784c0a', '21'=>'#75146a', '22'=>'#666466', '23'=>'#3c518c', '24'=>'#324d23', '25'=>'#4e73df', '26'=>'#1cc88a', '27'=>'#36b9cc', '28'=>'#cc5636', '29'=>'#4dcf0c', 
				'30'=>'#f4fc08', '31'=>'#f00707', '32'=>'#05fce8', '33'=>'#8607f5', '34'=>'#b87209', '35'=>'#fa05dd', '36'=>'#4e73df', '37'=>'#1cc88a', '38'=>'#36b9cc', '39'=>'#b02e0b', 
				'40'=>'#358f09', '41'=>'#b2b807', '42'=>'#2e838f', '43'=>'#98ebe4', '44'=>'#6609b8', '45'=>'#915b0a', '46'=>'#ad079a', '47'=>'#949194', '48'=>'#4c65ad', '49'=>'#436630', 
				'50'=>'#4e73df', '51'=>'#1cc88a', '52'=>'#36b9cc', '53'=>'#b02e0b', '54'=>'#358f09', '55'=>'#b2b807', '56'=>'#bd0b0b', '57'=>'#0aa397', '58'=>'#6609b8', '59'=>'#915b0a', 
				'60'=>'#ad079a', '61'=>'#2e4382', '62'=>'#17825c', '63'=>'#2e838f', '64'=>'#a14e38', '65'=>'#5c9141', '66'=>'#9a9e31', '67'=>'#156570', '68'=>'#05fce8', '69'=>'#523769', 
				'70'=>'#784c0a', '71'=>'#75146a', '72'=>'#666466', '73'=>'#3c518c', '74'=>'#324d23', '75'=>'#4e73df', '76'=>'#1cc88a', '77'=>'#36b9cc', '78'=>'#cc5636', '79'=>'#4dcf0c', 
				'80'=>'#f4fc08', '81'=>'#f00707', '82'=>'#05fce8', '83'=>'#8607f5', '34'=>'#b87209', '35'=>'#fa05dd', '36'=>'#4e73df', '87'=>'#1cc88a', '88'=>'#36b9cc', '89'=>'#b02e0b', 
				'90'=>'#358f09', '91'=>'#b2b807', '92'=>'#2e838f', '93'=>'#98ebe4', '94'=>'#6609b8', '95'=>'#915b0a', '96'=>'#ad079a', '97'=>'#949194', '98'=>'#4c65ad', '99'=>'#436630');
		// akhir_variabel warna	

			// konfigurasi line chart 
			$j=9;
			for ($i=0; $i < 10; $i++) 
			{ 
				
				$data['tahun'][$i] = date('Y')-$j;
				$j--;
			}
			
			$i=0;
			foreach ($data['tahun'] as $thn) 
			{
				$data['event_per_tahun'][$i] = $this->Admin_Model->get_Event_by_tahun($thn);
				$i++;
			}

			$i=0;
			foreach ($data['event_per_tahun'] as $evn) 
			{
				if ($evn) 
				{
					$data['jml_peserta'][$i] = $this->Admin_Model->get_jml_peserta_byEvent($evn['id_event']);
				}
				else
				{
					$data['jml_peserta'][$i] = '0';
				}
				$i++;
			}
			// akhir konfigurasi line chart

			// konfigurasi pie chart
			$i=0;
			foreach ($data['jenis_mitra'] as $jenis_mitra) 
			{
				$data['jumlah_jenis_mitra'][$i] =  $this->Admin_Model->get_jml_jenis_mitra($jenis_mitra['id_cluster']);
				$i++;
			}

			$i=0;
			foreach ($data['komisariat'] as $kms) 
			{
				$data['jml_anggota_komisariat'][$i] = $this->Admin_Model->jml_anggota_komisariat($kms['id_komisariat']);
				$i++;
			}

			// akhir konfigurasi pie chart

			// print_r($data['jml_jenis_mitra']); die();

			$this->load->view('template/header', $data);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/topbar', $data);
			$this->load->view('admin/dashboard', $data);
			$this->load->view('template/footer', $data);
			$this->load->view('chart/chart_peserta_tiap_tahun', $data);
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


	public function event()
	{
		if ($this->session->userdata('id_event')) 
		{
			redirect('Admin/detail_Event');
		}
		elseif ($this->session->userdata('id_pangkalan'))
		{
			redirect('Admin/detail_pangkalan');
		}
		else
		{
			$this->load->model('Admin_Model');
			
			$data['title']  = "Event";
			$id_admin 	 	= $this->session->userdata('id_admin');
			$data['user'] 	= 'Admin';
			$data['admin'] 	= $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
			$data['jml_event'] = $this->Admin_Model->get_jml_event();
			$data['event'] 	= $this->Admin_Model->get_event();
			$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();

			// print_r($data['event']); die();
			// load view
			if ($data['jml_event'] == 0) {
				$this->load->view('template/header', $data);
			}
			else {
				$this->load->view('template/header_dataTable', $data);
			}
			 // print_r($data['pengumuman']); die();
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/topbar', $data);
			$this->load->view('admin/event', $data);
			
			if ($data['jml_event'] == 0) {
				$this->load->view('template/footer', $data);
			}
			else {
				$this->load->view('template/footer_dataTable', $data);
			}
			// akhir load view
		}
	}

	public function buat_event_baru($id_admin)
	{
		$kegiatan_berlangsung = $this->Relawan_Model->get_kegiatan_berlangsung();
		// print_r($kegiatan_berlangsung); die();
		if ($this->session->userdata('id_event')) 
		{
			redirect('Admin/detail_Event');
		}
		elseif ($this->session->userdata('id_pangkalan'))
		{
			redirect('Admin/detail_pangkalan');
		}
		else
		{
			$this->form_validation->set_rules('nama_event', 'Nama Event','required|trim', ['required' => 'Data belum di isi!']);
			
			$nama_event = htmlspecialchars($this->input->post('nama_event', true));
			
			if ($this->form_validation->run() == false)
			{
				$pesan = "Gagal membuat event RTIKAbdimas baru, Harap mengisi data dengan benar";
				$this->alert_gagal($pesan);
				redirect('Admin/event');
			}
			else
			{	
				$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				
				$id_event = substr(str_shuffle($permitted_chars), 0, 16);
				$date_created = date("Y-m-d G:i:s");

				$data = [
					'id_event' 			=> $id_event,
					'id_admin' 			=> $id_admin,
					'date_created' 		=> $date_created,
					'nama_event' 		=> $nama_event,
					'link_gdrive_default'=> '',
					'awal_registrasi' 	=> '',
					'akhir_registrasi' 	=> '',
					'awal_pembekalan' 	=> '',
					'akhir_pembekalan' 	=> '',
					'awal_pelayanan' 	=> '',
					'akhir_pelayanan' 	=> '',
					'awal_pelaporan' 	=> '',
					'akhir_pelaporan' 	=> '',
					'awal_penilaian' 	=> '',
					'akhir_penilaian' 	=> '',
					'role_id' 			=> '0'
				];

				if ($kegiatan_berlangsung) 
				{
					$pesan = "Gagal membuat event baru, masih ada event yang sedang berlangsung ";
					$this->alert_gagal($pesan);
				}
				else
				{
					$this->db->insert('event', $data);

					$pesan = "Event baru berhasil di buat";
					$this->alert_ok($pesan);
				}	

				redirect('Admin/event');
				
			}
		}
	}

	public function hapus_event($id_event)
	{
		$id_e = urldecode($id_event);
		$event = $this->Admin_Model->get_event_by_id_event($id_e);
		$pembekalan = $this->Admin_Model->get_data_pembekalan_byEvent($id_e);
		$tim = $this->Admin_Model->get_tim_byEvent($id_e);
		// print_r($event); die();

		// hapus data event di tb pemgumuman
		foreach ($pembekalan as $pmb) 
		{
			$this->db->delete('pengumuman', array('id_pengumuman' => $pmb['id_pengumuman']));
		}

		// hapus data event di tb pembekalan
		$this->db->delete('pembekalan', array('id_event' => $id_event));

		foreach ($tim as $tm) 
		{
			$data_mitra = $this->Admin_Model->get_data_mitra_by_id_tim($tm['id_tim']);
			// print_r($data_mitra); die();
			if ($data_mitra)
			{
				if ($data_mitra['logo'] != 'default_logo.png') 
				{
					unlink(FCPATH . 'assets/img/mitra/' . $data_mitra['logo']);
				}
			}
			
			

			$this->db->delete('mitra', array('id_tim' => $tm['id_tim']));
			
			$anggota_tim = $this->Admin_Model->get_anggota_tim_by_id_tim($tm['id_tim']);
			
			foreach ($anggota_tim as $agt) 
			{
				$this->db->delete('nilai_individu', array('id_anggota_tim' => $agt['id_anggota']));
				$this->db->delete('nilai_kinerja_relawan', array('id_anggota' => $agt['id_anggota']));
				$this->db->delete('anggota_tim', array('id_anggota' => $agt['id_anggota']));
			}

			$this->db->delete('tim', array('id_tim' => $tim['id_tim']));
			$this->db->delete('nilai_kinerja_tim', array('id_tim' => $tim['id_tim']));
		}

		$this->db->delete('template_sertifikat', array('id_event' => $id_e));
		$this->db->delete('pembekalan', array('id_event' => $id_e));
		$this->db->delete('event', array('id_event' => $id_e));

		// $this->db->delete('sertifikat', array('id_event' => $id_e));

		$pesan = "Event berhasil dihapus";
		$this->alert_ok($pesan);

		redirect('Admin/event');
	}

	public function detil_event($id_event)
	{
		$data = [
			'id_event' => urldecode($id_event)
		];

		$this->session->set_userdata($data);
		// $this->detail_event();
		redirect('Admin/detail_Event');
	}

	public function detail_Event()
	{
		if (!$this->session->userdata('id_event')) 
		{
			redirect('Admin/event');
		}
		elseif ($this->session->userdata('id_pangkalan'))
		{
			redirect('Admin/detail_pangkalan');
		}
		else
		{
			$this->load->model('Admin_Model');
			
			$data['title']  = "Detail Event";
			$id_admin 	 	= $this->session->userdata('id_admin');
			$data['user'] 	= 'Admin';
			$id_event 	 	= $this->session->userdata('id_event');
			$data['admin'] 	= $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
			$data['jml_komisariat'] = $this->Admin_Model->get_jml_komisariat_byEvent($id_event);
			$data['komisariat'] = $this->Admin_Model->get_komisariat_byEvent($id_event);
			$data['mitra'] = $this->Admin_Model->get_mitra_by_event($id_event);

			for ($i=0; $i < $data['jml_komisariat']; $i++) 
			{ 
				$data['jmlah_peserta_komisariat'][$i] = $this->Admin_Model->get_jml_peserta_komisariat_byEvent($id_event,urlencode($data['komisariat'][$i]['id_komisariat']));
			}

			$data['jml_pelayanan'][0] = $this->Admin_Model->get_jml_layanan_mitra_by_event($id_event,'Layanan Pengguna');
			$data['jml_pelayanan'][1] = $this->Admin_Model->get_jml_layanan_mitra_by_event($id_event,'Layanan Informasi');
			$data['jml_pelayanan'][2] = $this->Admin_Model->get_jml_layanan_mitra_by_event($id_event,'Layanan Perangkat');

			$data['jml_tim'] = $this->Admin_Model->get_jml_tim_byEvent($id_event);
			$data['jml_peserta'] = $this->Admin_Model->get_jml_peserta_byEvent($id_event);

			$data['event'] 	= $this->Admin_Model->get_event_by_id_event($id_event);
			$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
			$awal_registrasi = strtotime($data['event']['awal_registrasi']);
			$akhir_penilaian = strtotime($data['event']['akhir_penilaian']);
			$tanggal_sekarang = strtotime(date('Y-m-d H:i:s'));

			// print_r($data['jmlah_peserta_komisariat']); die();
			if ($tanggal_sekarang <= $awal_registrasi) 
			{
				$data['progress'] = '0';
			} 
			elseif ($tanggal_sekarang >= $akhir_penilaian) 
			{
				$data['progress'] = '100';
				$data['nilai_tim'] = $this->Admin_Model->get_tim_terbaik_by_event($id_event);
			}
			else
			{
				$data['progress'] = number_format((($tanggal_sekarang-$awal_registrasi)/($akhir_penilaian-$awal_registrasi))* 100,2);
			}


			// untuk mengurutkan nilai kinerja tim terbaik dari yang terbesar ke terkecil
			if ($tanggal_sekarang >= $akhir_penilaian)
			{
				if ($data['nilai_tim']) 
				{
					$i=0;
					foreach ($data['nilai_tim'] as $nilai) 
					{
						$nilai_dokumen 	= $nilai['nilai_dokumen'];
						$nilai_mitra 	= $nilai['nilai_mitra'];
						$nilai_laporan 	= $nilai['nilai_laporan'];
						$jumlah_nilai 	= $nilai_dokumen + $nilai_mitra + $nilai_laporan;

						array_push($data['nilai_tim'][$i], $jumlah_nilai);
						// $nilai_tertinggi[$i] = $jumlah_nilai;
						$i++;
					}
					$j='0';
					$keys = array_column($data['nilai_tim'], '0');
					array_multisort($keys, SORT_DESC, $data['nilai_tim']);
				}
				
			}
			else
			{
				$data['nilai_tim'][0] = [
					'nama_tim' 		  => 'Nama Tim',
					'nama_komisariat' => 'Nama Komisariat',
					'0'				  => '0'
				];
			}
			
			// print_r($data['nilai_tim']); die();
			// untuk mencari nilai mitra terbaik
			$data['nilai_dampak_terbaik'] = $this->Admin_Model->get_nilai_mitra_tim_terbaik($id_event);
			

	// 		print_r($data['nilai_dampak_terbaik']);
 // die();
			// variabel warna
			$data['warna1'] = array('0'=>'#4e73df', '1'=>'#1cc88a', '2'=>'#36b9cc', '3'=>'#cc5636', '4'=>'#4dcf0c', '5'=>'#f4fc08', '6'=>'#f00707', '7'=>'#05fce8', '8'=>'#8607f5', '9'=>'#b87209', 
				'10'=>'#fa05dd', '11'=>'#4e73df', '12'=>'#1cc88a', '13'=>'#36b9cc', '14'=>'#b02e0b', '15'=>'#358f09', '16'=>'#b2b807', '17'=>'#2e838f', '18'=>'#98ebe4', '19'=>'#6609b8', 
				'20'=>'#915b0a', '21'=>'#ad079a', '22'=>'#949194', '23'=>'#4c65ad', '24'=>'#436630', '25'=>'#4e73df', '26'=>'#1cc88a', '27'=>'#36b9cc', '28'=>'#b02e0b', '29'=>'#358f09', 
				'30'=>'#b2b807', '31'=>'#bd0b0b', '32'=>'#0aa397', '33'=>'#6609b8', '34'=>'#915b0a', '35'=>'#ad079a', '36'=>'#2e4382', '37'=>'#17825c', '38'=>'#2e838f', '39'=>'#a14e38', 
				'40'=>'#5c9141', '41'=>'#9a9e31', '42'=>'#156570', '43'=>'#05fce8', '44'=>'#523769', '45'=>'#784c0a', '46'=>'#75146a', '47'=>'#666466', '48'=>'#3c518c', '49'=>'#324d23', 
				'50'=>'#4e73df', '51'=>'#1cc88a', '52'=>'#36b9cc', '53'=>'#cc5636', '54'=>'#4dcf0c', '55'=>'#f4fc08', '56'=>'#f00707', '57'=>'#05fce8', '58'=>'#8607f5', '59'=>'#b87209', 
				'60'=>'#fa05dd', '61'=>'#4e73df', '62'=>'#1cc88a', '63'=>'#36b9cc', '64'=>'#b02e0b', '65'=>'#358f09', '66'=>'#b2b807', '67'=>'#2e838f', '68'=>'#98ebe4', '69'=>'#6609b8', 
				'70'=>'#915b0a', '71'=>'#ad079a', '72'=>'#949194', '73'=>'#4c65ad', '74'=>'#436630', '75'=>'#4e73df', '76'=>'#1cc88a', '77'=>'#36b9cc', '78'=>'#b02e0b', '79'=>'#358f09', 
				'80'=>'#b2b807', '81'=>'#bd0b0b', '82'=>'#0aa397', '83'=>'#6609b8', '84'=>'#915b0a', '85'=>'#ad079a', '86'=>'#2e4382', '87'=>'#17825c', '88'=>'#2e838f', '89'=>'#a14e38', 
				'90'=>'#5c9141', '91'=>'#9a9e31', '92'=>'#156570', '93'=>'#05fce8', '94'=>'#523769', '95'=>'#784c0a', '96'=>'#75146a', '97'=>'#666466', '98'=>'#3c518c', '99'=>'#324d23');

			$data['warna2'] = array('0'=>'#4e73df', '1'=>'#1cc88a', '2'=>'#36b9cc', '3'=>'#b02e0b', '4'=>'#358f09', '5'=>'#b2b807', '6'=>'#bd0b0b', '7'=>'#0aa397', '8'=>'#6609b8', '9'=>'#915b0a', 
				'10'=>'#ad079a', '11'=>'#2e4382', '12'=>'#17825c', '13'=>'#2e838f', '14'=>'#a14e38', '15'=>'#5c9141', '16'=>'#9a9e31', '17'=>'#156570', '18'=>'#05fce8', '19'=>'#523769', 
				'20'=>'#784c0a', '21'=>'#75146a', '22'=>'#666466', '23'=>'#3c518c', '24'=>'#324d23', '25'=>'#4e73df', '26'=>'#1cc88a', '27'=>'#36b9cc', '28'=>'#cc5636', '29'=>'#4dcf0c', 
				'30'=>'#f4fc08', '31'=>'#f00707', '32'=>'#05fce8', '33'=>'#8607f5', '34'=>'#b87209', '35'=>'#fa05dd', '36'=>'#4e73df', '37'=>'#1cc88a', '38'=>'#36b9cc', '39'=>'#b02e0b', 
				'40'=>'#358f09', '41'=>'#b2b807', '42'=>'#2e838f', '43'=>'#98ebe4', '44'=>'#6609b8', '45'=>'#915b0a', '46'=>'#ad079a', '47'=>'#949194', '48'=>'#4c65ad', '49'=>'#436630', 
				'50'=>'#4e73df', '51'=>'#1cc88a', '52'=>'#36b9cc', '53'=>'#b02e0b', '54'=>'#358f09', '55'=>'#b2b807', '56'=>'#bd0b0b', '57'=>'#0aa397', '58'=>'#6609b8', '59'=>'#915b0a', 
				'60'=>'#ad079a', '61'=>'#2e4382', '62'=>'#17825c', '63'=>'#2e838f', '64'=>'#a14e38', '65'=>'#5c9141', '66'=>'#9a9e31', '67'=>'#156570', '68'=>'#05fce8', '69'=>'#523769', 
				'70'=>'#784c0a', '71'=>'#75146a', '72'=>'#666466', '73'=>'#3c518c', '74'=>'#324d23', '75'=>'#4e73df', '76'=>'#1cc88a', '77'=>'#36b9cc', '78'=>'#cc5636', '79'=>'#4dcf0c', 
				'80'=>'#f4fc08', '81'=>'#f00707', '82'=>'#05fce8', '83'=>'#8607f5', '34'=>'#b87209', '35'=>'#fa05dd', '36'=>'#4e73df', '87'=>'#1cc88a', '88'=>'#36b9cc', '89'=>'#b02e0b', 
				'90'=>'#358f09', '91'=>'#b2b807', '92'=>'#2e838f', '93'=>'#98ebe4', '94'=>'#6609b8', '95'=>'#915b0a', '96'=>'#ad079a', '97'=>'#949194', '98'=>'#4c65ad', '99'=>'#436630');
		// akhir_variabel warna	

			$this->load->view('template/header', $data);
			$this->load->view('admin/sidebar_2', $data);
			$this->load->view('admin/topbar', $data);
			$this->load->view('admin/dashboard_event', $data);
			$this->load->view('template/footer', $data);
			$this->load->view('chart/chart_dashboard_detail_event', $data);
		}
	}

	public function komisariat_event()
	{
		if (!$this->session->userdata('id_event')) 
		{
			redirect('Admin/event');
		}
		elseif ($this->session->userdata('id_pangkalan'))
		{
			redirect('Admin/detail_pangkalan');
		}
		else
		{
			$this->load->model('Admin_Model');
			
			$data['title']  = "Komisariat";
			$id_admin 	 	= $this->session->userdata('id_admin');
			$data['user'] 	= 'Admin';
			$id_event 	 	= $this->session->userdata('id_event');
			$data['admin'] 	= $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
			$data['jml_komisariat'] = $this->Admin_Model->get_jml_komisariat_byEvent($id_event);
			$data['komisariat'] = $this->Admin_Model->get_komisariat_byEvent($id_event);
			$data['event'] 	= $this->Admin_Model->get_event();
			$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();


			$this->load->view('template/header_dataTable', $data);
			$this->load->view('admin/sidebar_2', $data);
			$this->load->view('admin/topbar', $data);
			$this->load->view('admin/komisariat_event', $data);
			$this->load->view('template/footer_dataTable', $data);
		}
	}

	public function timRelawan_event()
	{
		if (!$this->session->userdata('id_event')) 
		{
			redirect('Admin/event');
		}
		elseif ($this->session->userdata('id_pangkalan'))
		{
			redirect('Admin/detail_pangkalan');
		}
		else
		{
			$this->load->model('Admin_Model');
			
			$data['title']  = "Tim Relawan";
			$id_admin 	 	= $this->session->userdata('id_admin');
			$data['user'] 	= 'Admin';
			$id_event 	 	= $this->session->userdata('id_event');
			$data['admin'] 	= $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
			$data['jml_komisariat'] = $this->Admin_Model->get_jml_komisariat_byEvent($id_event);
			$data['event'] 	= $this->Admin_Model->get_event();
			$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
			$data['jml_tim'] = $this->Admin_Model->get_jml_tim_byEvent($id_event);
			$data['nama_tim'] = $this->Admin_Model->get_namatim_byEvent($id_event);
			// print_r($data['nama_tim']); die();
			$i=0;
			foreach ($data['nama_tim'] as $tim) 
			{
				$data['jml_anggota'][$i] = $this->Admin_Model->get_jml_anggotatim_id_tim($data['nama_tim'][$i]['id_tim']);
				$data['nama_ketua'][$i] = $this->Admin_Model->get_ketua_tim_by_id_tim($data['nama_tim'][$i]['id_tim']);
				$data['nama_anggota'][$i] = $this->Admin_Model->get_anggota_tim_by_id_tim($data['nama_tim'][$i]['id_tim']);

				$i++;
			}

			// print_r($data['nama_anggota']); die();

			$this->load->view('template/header_dataTable', $data);
			$this->load->view('admin/sidebar_2', $data);
			$this->load->view('admin/topbar', $data);
			$this->load->view('admin/tim_relawan_event', $data);
			$this->load->view('template/footer_dataTable', $data);
		}
	}



	public function lihat_detail_tim($id_team)
	{
		$id_tim = urldecode($id_team);

		if (!$this->session->userdata('id_event')) 
		{
			redirect('Admin/event');
		}
		elseif ($this->session->userdata('id_pangkalan'))
		{
			redirect('Admin/detail_pangkalan');
		}
		else
		{
			$data = [
				'id_tim' => $id_tim
			];

			$this->session->set_userdata($data);
			// $this->detail_event();
			redirect('Admin/detail_tim');
		}
	}

	public function detail_tim()
	{
		if (!$this->session->userdata('id_tim')) 
		{
			redirect('Admin/timRelawan_event');
		}
		elseif ($this->session->userdata('id_pangkalan'))
		{
			redirect('Admin/detail_pangkalan');
		}
		else
		{
			$this->load->model('Admin_Model');
			
			$data['title']  = "Detail Tim Relawan";
			$id_admin 	 	= $this->session->userdata('id_admin');
			$data['user'] 	= 'Admin';
			$id_event 	 	= $this->session->userdata('id_event');
			$id_tim	 	= $this->session->userdata('id_tim');
			$data['admin'] 	= $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
			$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
			$data['jml_tim'] = $this->Admin_Model->get_jml_tim_byEvent($id_event);
			$data['nama_tim'] = $this->Admin_Model->get_namatim_byEvent($id_event);
			
			
			$data['jml_anggota'] = $this->Admin_Model->get_jml_anggotatim_id_tim($id_tim);
			$data['ketua'] = $this->Admin_Model->get_ketua_tim_by_id_tim($id_tim);
			$data['anggota']= $this->Admin_Model->get_anggota_tim_by_id_tim($id_tim);

			$data['berkas'] = $this->Admin_Model->get_berkas_tim_id_tim($id_tim);
			$data['artikel'] = $this->Admin_Model->get_artikel_tim_id_tim($id_tim);
			// print_r($data['ketua']); die();

			$this->load->view('template/header', $data);
			$this->load->view('relawan/sidebar2', $data);
			$this->load->view('admin/topbar', $data);
			$this->load->view('admin/detail_tim_relawan_event', $data);
			$this->load->view('template/footer', $data);
		}
	}


	public function mitra_event()
	{
		if (!$this->session->userdata('id_event')) 
		{
			redirect('Admin/event');
		}
		elseif ($this->session->userdata('id_pangkalan'))
		{
			redirect('Admin/detail_pangkalan');
		}
		else
		{
			$this->load->model('Admin_Model');
			
			$data['title']  = "Mitra";
			$id_admin 	 	= $this->session->userdata('id_admin');
			$id_event 	 	= $this->session->userdata('id_event');
			$data['user'] 	= 'Admin';
			$data['admin'] 	= $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
			$data['jml_komisariat'] = $this->Admin_Model->get_jml_komisariat_byEvent($id_event);
			$data['event'] 	= $this->Admin_Model->get_event();
			$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
			$data['mitra'] = $this->Admin_Model->get_mitra_by_event($id_event);
			

			// print_r($data['mitra']); die();

			$this->load->view('template/header_dataTable', $data);
			$this->load->view('admin/sidebar_2', $data);
			$this->load->view('admin/topbar', $data);
			$this->load->view('admin/tim_mitra_event', $data);
			$this->load->view('template/footer_dataTable', $data);
		}
	}

	public function komisariat()
	{
		if ($this->session->userdata('id_event')) 
		{
			redirect('Admin/detail_Event');
		}
		elseif ($this->session->userdata('id_pangkalan'))
		{
			redirect('Admin/detail_pangkalan');
		}
		else
		{
			$this->load->model('Admin_Model');
			
			$data['title']  = "Komisariat";
			$id_admin 	 	= $this->session->userdata('id_admin');
			$data['user'] 	= 'Admin';
			$id_event 	 	= $this->session->userdata('id_event');
			$data['admin'] 	= $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
			$data['jml_komisariat'] = $this->Admin_Model->get_jml_komisariat();
			$data['jml_pengajuan_komisariat'] = $this->Admin_Model->get_jml_permintaan_akun_komisariat();
			$data['pengajuan_komisariat'] = $this->Admin_Model->get_pengajuan_komisariat();
			$data['komisariat'] = $this->Admin_Model->get_komisariat();
			
			$i=0;
			foreach ($data['komisariat'] as $kms) 
			{
				$data['jml_anggota_komisariat'][$i] = $this->Admin_Model->jml_anggota_komisariat(urlencode($kms['id_komisariat']));
				$data['jml_pembimbing_komisariat'][$i] = $this->Admin_Model->jml_pembimbing_komisariat(urlencode($kms['id_komisariat']));
				$i++;
			}
			$data['event'] 	= $this->Admin_Model->get_event();
			$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();


			$this->load->view('template/header_dataTable', $data);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/topbar', $data);
			$this->load->view('admin/komisariat', $data);
			$this->load->view('template/footer_dataTable', $data);
		}
	}

	public function pengajuan_komisariat()
	{
		if ($this->session->userdata('id_event')) 
		{
			redirect('Admin/detail_Event');
		}
		elseif ($this->session->userdata('id_pangkalan'))
		{
			redirect('Admin/detail_pangkalan');
		}
		else
		{
			$this->load->model('Admin_Model');
			
			$data['title']  = "Pengajuan Komisariat";
			$id_admin 	 	= $this->session->userdata('id_admin');
			$data['user'] 	= 'Admin';
			$id_event 	 	= $this->session->userdata('id_event');
			$data['admin'] 	= $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
			$data['jml_pengajuan_komisariat'] = $this->Admin_Model->get_jml_permintaan_akun_komisariat();
			$data['pengajuan_komisariat'] = $this->Admin_Model->get_pengajuan_komisariat();
			
			$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();

			$this->load->view('template/header_dataTable', $data);
			$this->load->view('relawan/sidebar2', $data);
			$this->load->view('admin/topbar', $data);
			$this->load->view('admin/pengajuan_komisariat', $data);
			$this->load->view('template/footer_dataTable', $data);
		}
	}


	public function pengajuan_pangkalan($keputusan,$id_pangkalan)
	{
		$id_pkl = urldecode($id_pangkalan);
		$pangkalan = $this->Admin_Model->get_pangkalan_by_id_pangkalan($id_pkl);
		// print_r($pangkalan); die();

		if ($keputusan == 'acc') 
		{
			$data = ['role_id' 	=> '1'];

			$this->db->set($data);
			$where = array('id_komisariat' => $id_pkl);
			$this->db->where($where);
			$this->db->update('komisariat');

			$this->_sendEmailPangkalan($pangkalan['email'], 'acc');
			$pesan = "Pangkalan baru telah di tambahkan";
			$this->alert_ok($pesan);
		}
		elseif ($keputusan == 'tolak') 
		{
			$this->db->delete('komisariat', array('id_komisariat' => $id_pkl));

			$this->_sendEmailPangkalan($pangkalan['email'], 'tolak');
			$pesan = "Pengajuan pangkalan baru telah di tolak";
			$this->alert_ok($pesan);
		}
		

		redirect('Admin/pengajuan_komisariat');		
	}

	public function detailPangkalan($id_pangkalan)
	{
		$id = urldecode($id_pangkalan);
		$data = [
			'id_pangkalan' => $id
		];

		$this->session->set_userdata($data);
		redirect('Admin/detail_pangkalan');
	}

	public function kembali_komisariat()
	{
		$this->session->unset_userdata('id_pangkalan');
		redirect('Admin/komisariat');
	}

	public function detail_pangkalan()
	{

		$id_pangkalan = $this->session->userdata('id_pangkalan');
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();

		if (!$this->session->userdata('id_pangkalan')) 
		{
			redirect('Admin/komisariat');
		}
		else
		{
			$data['title']  = "Detail Pangkalan";
			$id_admin 	 	= $this->session->userdata('id_admin');
			$data['user'] 	= 'Admin';
			$data['admin'] 	= $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
			$data['pangkalan'] = $this->Admin_Model->get_komisariat_by_id_komisariat($id_pangkalan);
			
			$data['anggota'] =  $this->Admin_Model->get_data_relawan_by_id_komisariat($id_pangkalan);
			$data['pembimbing'] =  $this->Admin_Model->get_data_pembimbing_by_id_komisariat($id_pangkalan);
			
			// print_r($data['pembimbing']);			die();


			$this->load->view('template/header_dataTable', $data);
			$this->load->view('relawan/sidebar2', $data);
			$this->load->view('admin/topbar', $data);
			$this->load->view('admin/detail_komisariat', $data);
			$this->load->view('template/footer_dataTable', $data);
		}

	}

	public function pengaturan_event()
	{
		if (!$this->session->userdata('id_event')) 
		{
			redirect('Admin/event');
		}
		elseif ($this->session->userdata('id_pangkalan'))
		{
			redirect('Admin/detail_pangkalan');
		}
		else
		{			
			$data['title']  = "Pengaturan";
			$id_admin 	 	= $this->session->userdata('id_admin');
			$data['user'] 	= 'Admin';
			$id_event 	 	= $this->session->userdata('id_event');
			$data['admin'] 	= $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
			$data['jml_komisariat'] = $this->Admin_Model->get_jml_komisariat_byEvent($id_event);
			$data['event'] 	= $this->Admin_Model->get_event_by_id_event($id_event);
			$data['Judul'] 	= ['','Awal Registrasi','Akhir Registrasi','Awal Pembekalan','Akhir Pembekalan','Awal Pelayanan','Akhir Pelayanan','Awal Pelaporan','Akhir Pelaporan','Awal Penilaian','Akhir Penilaian'];
			$data['nama_atribut'] 	= ['','awal_registrasi','akhir_registrasi','awal_pembekalan','akhir_pembekalan','awal_pelayanan','akhir_pelayanan','awal_pelaporan','akhir_pelaporan','awal_penilaian','akhir_penilaian']; 
			$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
			$data['pembekalan'] = $this->Admin_Model->get_data_pembekalan_byEvent($id_event);
			$data['jml_pembekalan'] = $this->Admin_Model->get_data_jml_pembekalan_byEvent($id_event);

			$data['instruktur'] = $this->Admin_Model->get_datainstruktur();
			$data['jml_instruktur'] = $this->Admin_Model->get_jml_datainstruktur();
			for ($i=0; $i < $data['jml_instruktur']; $i++) 
			{ 
				$data['materi_instruktur'][$i] = $this->Admin_Model->get_materi_instruktur();
			}

			$data['template_sertifikat'] =  $this->Admin_Model->get_template_Sertifikat($id_event);
			
// print_r($data['template_sertifikat']); die();
			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$kode = substr(str_shuffle($permitted_chars), 0, 16);


			$this->load->view('template/header', $data);
			$this->load->view('admin/sidebar_2', $data);
			$this->load->view('admin/topbar', $data);
			$this->load->view('admin/pengaturan_event', $data);
			$this->load->view('template/footer', $data);
		}
	}


	public function ubah_template_sertifikat($id_event)
	{
		$template_sertifikat =  $this->Admin_Model->get_template_Sertifikat($id_event);
			// print_r($data['template_sertifikat']);

		$this->form_validation->set_rules('kota', 'Kota', 'trim');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim');
		$this->form_validation->set_rules('nama_1', 'Nama', 'trim');
		$this->form_validation->set_rules('jabatan_1', 'Jabatan', 'trim');
		$this->form_validation->set_rules('nama_2', 'Nama', 'trim');
		$this->form_validation->set_rules('jabatan_2', 'Jabatan', 'trim');
		

		$kota 		= htmlspecialchars($this->input->post('kota', true)); 
		$tanggal 	= htmlspecialchars($this->input->post('tanggal', true)); 
		$nama_1 	= htmlspecialchars($this->input->post('nama_1', true)); 
		$jabatan_1 	= htmlspecialchars($this->input->post('jabatan_1', true)); 
		$nama_2 	= htmlspecialchars($this->input->post('nama_2', true)); 
		$jabatan_2 	= htmlspecialchars($this->input->post('jabatan_2', true)); 

		if ($this->form_validation->run() == false)
		{
			$pesan = "Gagal memperbaharui data, pastikan telah mengisi data dengan benar";
			$this->alert_gagal($pesan);
			redirect('Admin/pengaturan_event');
		}
		else
		{
			// jika upload tanda tangan 1
			$ttd_1 = $_FILES['ttd_1']['name'];	

			if($ttd_1)
			{

				$config['allowed_types'] = 'png';
				$config['max_size']      = '2048';
				$config['upload_path']   = './assets/img/sertifikat/tanda_tangan/';



				$this->load->library('upload',$config);
				if ($this->upload->do_upload('ttd_1')) 
				{
					if ($template_sertifikat) 
					{
						$old_ttd_1 = $template_sertifikat['ttd_1'];

						if($old_ttd_1 != 'default_ttd.png')
						{
							unlink(FCPATH . 'assets/img/sertifikat/tanda_tangan/' . $old_ttd_1);

						}
						$ttd_1 = $this->upload->data('file_name');
						$this->db->set('ttd_1', $ttd_1);

					}		
					else
					{
						$ttd_1 = $this->upload->data('file_name');
					}				

				}

				else if ($_FILES['ttd_1']['size'] >= '2048') 
				{
					$pesan = "Ukuran image ttd 1 yang diunggah melebihi batas (2MB), dokumen gagal di upload";
					$this->alert_gagal($pesan);
					redirect('Admin/pengaturan_event');
				}

			}
			else
			{
				if ($template_sertifikat) 
				{
					$ttd_1 = $template_sertifikat['ttd_1'];
				}		
				else
				{
					$ttd_1 = 'default_ttd.png';
				}		
			}


			// jika upload tanda tangan 2
			$ttd_2 = $_FILES['ttd_2']['name'];	

			if($ttd_2)
			{

				$config['allowed_types'] = 'png';
				$config['max_size']      = '2048';
				$config['upload_path']   = './assets/img/sertifikat/tanda_tangan/';



				$this->load->library('upload',$config);
				if ($this->upload->do_upload('ttd_2')) 
				{
					if ($template_sertifikat) 
					{
						$old_ttd_2 = $template_sertifikat['ttd_2'];

						if($old_ttd_2 != 'default_ttd.png')
						{
							unlink(FCPATH . 'assets/img/sertifikat/tanda_tangan/' . $old_ttd_2);

						}
						$ttd_2 = $this->upload->data('file_name');

					}		
					else
					{
						$ttd_2 = $this->upload->data('file_name');
					}				

				}

				else if ($_FILES['ttd_2']['size'] >= '2048') 
				{
					$pesan = "Ukuran image ttd 2 yang diunggah melebihi batas (2MB), dokumen gagal di upload";
					$this->alert_gagal($pesan);
					redirect('Admin/pengaturan_event');
				}

			}
			else
			{
				if ($template_sertifikat) 
				{
					$ttd_2 = $template_sertifikat['ttd_2'];
				}		
				else
				{
					$ttd_2 = 'default_ttd.png';
				}		
			}


			// jika upload stempel 1
			$cap_1 = $_FILES['cap_1']['name'];	

			if($cap_1)
			{

				$config['allowed_types'] = 'png';
				$config['max_size']      = '2048';
				$config['upload_path']   = './assets/img/sertifikat/stempel/';



				$this->load->library('upload',$config);
				if ($this->upload->do_upload('cap_1')) 
				{
					if ($template_sertifikat) 
					{
						$old_cap_1 = $template_sertifikat['stempel_1'];

						if($old_cap_1 != 'default_stempel.png')
						{
							unlink(FCPATH . 'assets/img/sertifikat/stempel/' . $old_cap_1);

						}
						$cap_1 = $this->upload->data('file_name');

					}		
					else
					{
						$cap_1 = $this->upload->data('file_name');
					}	
				}

				else if ($_FILES['cap_1']['size'] >= '2048') 
				{
					$pesan = "Ukuran image stempel 1 yang diunggah melebihi batas (2MB), dokumen gagal di upload";
					$this->alert_gagal($pesan);
					redirect('Admin/pengaturan_event');
				}

			}
			else
			{
				if ($template_sertifikat) 
				{
					$cap_1 = $template_sertifikat['stempel_2'];
				}		
				else
				{
					$cap_1 = 'default_stempel.png';
				}		
			}


			// jika upload stempel 2
			$cap_2 = $_FILES['cap_2']['name'];	

			if($cap_2)
			{

				$config['allowed_types'] = 'png';
				$config['max_size']      = '2048';
				$config['upload_path']   = './assets/img/sertifikat/stempel/';



				$this->load->library('upload',$config);
				if ($this->upload->do_upload('cap_2')) 
				{
					if ($template_sertifikat) 
					{
						$old_cap_2 = $template_sertifikat['stempel_2'];

						if($old_cap_2 != 'default_stempel.png')
						{
							unlink(FCPATH . 'assets/img/sertifikat/stempel/' . $old_cap_2);

						}
						$cap_2 = $this->upload->data('file_name');

					}		
					else
					{
						$cap_2 = $this->upload->data('file_name');
					}				
				}

				else if ($_FILES['cap_2']['size'] >= '2048') 
				{
					$pesan = "Ukuran image stempel 1 yang diunggah melebihi batas (2MB), dokumen gagal di upload";
					$this->alert_gagal($pesan);
					redirect('Admin/pengaturan_event');
				}

			}
			else
			{
				if ($template_sertifikat) 
				{
					$cap_2 = $template_sertifikat['stempel_2'];
				}		
				else
				{
					$cap_2 = 'default_stempel.png';
				}		
			}


			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$kode = substr(str_shuffle($permitted_chars), 0, 3);
			$id = date('YmdHis').$kode;
			$data = [
				'id_template' 		=> $id,
				'id_event' 			=> $id_event,
				'tempat_dikeluarkan'=> $kota,
				'tgal_dikeluarkan' 	=> $tanggal,
				'nama_1' 			=> $nama_1,
				'ttd_1' 			=> $ttd_1,
				'stempel_1' 		=> $cap_1,
				'jabatan_1' 		=> $jabatan_1,
				'nama_2' 			=> $nama_2,
				'ttd_2' 			=> $ttd_2,
				'stempel_2' 		=> $cap_2,
				'jabatan_2' 		=> $jabatan_2

			];


			$data2 = [
				'tempat_dikeluarkan'=> $kota,
				'tgal_dikeluarkan' 	=> $tanggal,
				'nama_1' 			=> $nama_1,
				'ttd_1' 			=> $ttd_1,
				'stempel_1' 		=> $cap_1,
				'jabatan_1' 		=> $jabatan_1,
				'nama_2' 			=> $nama_2,
				'ttd_2' 			=> $ttd_2,
				'stempel_2' 		=> $cap_2,
				'jabatan_2' 		=> $jabatan_2
				
			];

			// print_r($data2); die();
			if (!$template_sertifikat) 
			{
				$this->db->insert('template_sertifikat', $data);
			}
			else
			{
				$this->db->set($data2);
				$this->db->where('id_event', $id_event);
				$this->db->update('template_sertifikat');
			}

			$pesan = "Pegaturan sertifikat berhasil dierbaharui";
			$this->alert_ok($pesan);
			redirect('Admin/pengaturan_event');
		}
	}


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

	public function tambah_acara_pembekalan($id_event)
	{
		if (!$this->session->userdata('id_event')) 
		{
			redirect('Admin/event');
		}
		elseif ($this->session->userdata('id_pangkalan'))
		{
			redirect('Admin/detail_pangkalan');
		}
		else
		{			
			$data['title']  = "Form tambah pembekalan";
			$id_admin 	 	= $this->session->userdata('id_admin');
			$data['user'] 	= 'Admin';
			$id_event 	 	= $this->session->userdata('id_event');
			$data['admin'] 	= $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
			$data['jml_komisariat'] = $this->Admin_Model->get_jml_komisariat_byEvent($id_event);
			$data['event'] 	= $this->Admin_Model->get_event_by_id_event($id_event);
			$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
			$data['pembekalan'] = $this->Admin_Model->get_data_pembekalan_byEvent($id_event);
			$data['jml_pembekalan'] = $this->Admin_Model->get_data_jml_pembekalan_byEvent($id_event);
			$data['Judul'] 	= ['','Awal Registrasi','Akhir Registrasi','Awal Pembekalan','Akhir Pembekalan','Awal Pelayanan','Akhir Pelayanan','Awal Pelaporan','Akhir Pelaporan','Awal Penilaian','Akhir Penilaian'];
			$data['nama_atribut'] 	= ['','awal_registrasi','akhir_registrasi','awal_pembekalan','akhir_pembekalan','awal_pelayanan','akhir_pelayanan','awal_pelaporan','akhir_pelaporan','awal_penilaian','akhir_penilaian']; 
			
			$data['instruktur'] = $this->Admin_Model->get_datainstruktur();
			$data['jml_instruktur'] = $this->Admin_Model->get_jml_datainstruktur();

			for ($i=0; $i < $data['jml_instruktur']; $i++) 
			{ 
				$data['materi_instruktur'][$i] = $this->Admin_Model->get_materi_instruktur();
				$data['jml_materi_instruktur'][$i] = $this->Admin_Model->get_jml_materi_instruktur($data['instruktur'][$i]['id_instruktur']); 
			}

			// print_r($data['materi_instruktur']); die();

			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$kode = substr(str_shuffle($permitted_chars), 0, 16);


			$this->load->view('template/header_dataTable', $data);
			$this->load->view('admin/sidebar_2', $data);
			$this->load->view('admin/topbar', $data);
			$this->load->view('admin/form_tambah_pembekalan', $data);
			$this->load->view('template/footer_dataTable', $data);
		}
	}

	public function ubah_pembekalan($id_pembekalan)
	{
		if (!$this->session->userdata('id_event')) 
		{
			redirect('Admin/event');
		}
		elseif ($this->session->userdata('id_pangkalan'))
		{
			redirect('Admin/detail_pangkalan');
		}
		else
		{			
			$data['title']  = "Form ubah pembekalan";
			$id_admin 	 	= $this->session->userdata('id_admin');
			$data['user'] 	= 'Admin';
			$id_event 	 	= $this->session->userdata('id_event');
			$id_pembekalan	= urldecode($id_pembekalan);
			$data['admin'] 	= $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
			$data['jml_komisariat'] = $this->Admin_Model->get_jml_komisariat_byEvent($id_event);
			$data['event'] 	= $this->Admin_Model->get_event_by_id_event($id_event);
			$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
			$data['pembekalan'] = $this->Admin_Model->get_data_pembekalan_by_id_pembekalan($id_pembekalan);
			$data['jml_pembekalan'] = $this->Admin_Model->get_data_jml_pembekalan_byEvent($id_event);
			$data['Judul'] 	= ['','Awal Registrasi','Akhir Registrasi','Awal Pembekalan','Akhir Pembekalan','Awal Pelayanan','Akhir Pelayanan','Awal Pelaporan','Akhir Pelaporan','Awal Penilaian','Akhir Penilaian'];
			$data['nama_atribut'] 	= ['','awal_registrasi','akhir_registrasi','awal_pembekalan','akhir_pembekalan','awal_pelayanan','akhir_pelayanan','awal_pelaporan','akhir_pelaporan','awal_penilaian','akhir_penilaian']; 
			
			$data['instruktur'] = $this->Admin_Model->get_datainstruktur();
			$data['jml_instruktur'] = $this->Admin_Model->get_jml_datainstruktur();
			for ($i=0; $i < $data['jml_instruktur']; $i++) 
			{ 
				$data['materi_instruktur'][$i] = $this->Admin_Model->get_materi_instruktur();
				$data['jml_materi_instruktur'][$i] = $this->Admin_Model->get_jml_materi_instruktur($data['instruktur'][$i]['id_instruktur']);
			}

			// print_r($data['instruktur']); die();

			$this->load->view('template/header_dataTable', $data);
			$this->load->view('admin/sidebar_2', $data);
			$this->load->view('admin/topbar', $data);
			$this->load->view('admin/form_ubah_pembekalan', $data);
			$this->load->view('template/footer_dataTable', $data);
		}
	}


	public function ubah_event($judul,$id_event)
	{				
		$id_event = urldecode($id_event);
		$judul = urldecode($judul);
		$id_admin 	 	= $this->session->userdata('id_admin');
		$data_event	= $this->Admin_Model->get_event_by_id_event($id_event);


		if ($judul == 'nama_event') 
		{
			$this->form_validation->set_rules('nama', 'nama', 'trim');
			$nama_event = htmlspecialchars($this->input->post('nama', true)); 
			
			if ($this->form_validation->run() == false)
			{
				$pesan = "Nama event gagal diperbaharui";
				$this->alert_gagal($pesan);
				
				redirect('Admin/pengaturan_event');
			}
			else
			{	 
				$data = ['nama_event' => $nama_event];

				$this->db->set($data);
				$where = array('id_event' => $id_event);
				$this->db->where($where);
				$this->db->update('event');

				$pesan = "Nama event berhasil diperbaharui";
				$this->alert_ok($pesan);
				redirect('Admin/pengaturan_event');
			}
			
			
		}


		else if ($judul == 'link_event') 
		{
			$this->form_validation->set_rules('nama', 'nama', 'trim');
			$link = htmlspecialchars($this->input->post('link', true)); 

			if ($this->form_validation->run() == false)
			{
				$pesan = "Link default penyimpanan data event gagal diperbaharui";
				$this->alert_gagal($pesan);
				redirect('Admin/pengaturan_event');
			}
			else
			{	 
				$data = ['link_gdrive_default' 	=> $link];

				$this->db->set($data);
				$where = array('id_event' => $id_event);
				$this->db->where($where);
				$this->db->update('event');

				$pesan = "Link default penyimpanan data event berhasil diperbaharui";
				$this->alert_ok($pesan);
				redirect('Admin/pengaturan_event');
			}
		}

		elseif ($judul == 'tambah_acara_pembekalan') 
		{
			$this->form_validation->set_rules('pilihan_instruktur', 'instruktur', 'trim');
			// $this->form_validation->set_rules('materi', 'Materi', 'trim');
			$this->form_validation->set_rules('link_materi', 'Link Materi', 'trim');
			$this->form_validation->set_rules('link_meeting', 'Link Meeting', 'trim');
			$this->form_validation->set_rules('tgl', 'Tanggal', 'trim');
			$this->form_validation->set_rules('time', 'Waktu', 'trim');
			$this->form_validation->set_rules('pengumuman', 'Pengumuman', 'trim');


			$id_instruktur = htmlspecialchars($this->input->post('pilihan_instruktur', true)); 
			// $materi = htmlspecialchars($this->input->post('materi', true)); 
			$link_materi = htmlspecialchars($this->input->post('link_materi', true)); 
			$link_meeting = htmlspecialchars($this->input->post('link_meeting', true)); 
			$tgl = htmlspecialchars($this->input->post('tgl', true)); 
			$time = htmlspecialchars($this->input->post('time', true)); 
			$pengumuman = htmlspecialchars($this->input->post('pengumuman', true)); 
			$jadwal_acara = $tgl.' '.$time;

			// echo "$jadwal_acara"; die();

			if ($this->form_validation->run() == false)
			{
				$pesan = "Link default penyimpanan data event gagal diperbaharui";
				$this->alert_gagal($pesan);
				redirect('Admin/pengaturan_event');
			}
			else
			{	 
				if (strtotime($jadwal_acara) < strtotime($data_event['awal_pembekalan']) || strtotime($jadwal_acara) > strtotime($data_event['akhir_pembekalan'])) 
				{
					$pesan = "Acara gagal dibuat, waktu pelaksanaan berada diluar jadwal pembekalan";
					$this->alert_gagal($pesan);
					redirect('Admin/tambah_acara_pembekalan/'.urlencode($id_event));
				}
				else
				{
					$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$kode = substr(str_shuffle($permitted_chars), 0, 1);
					$tanggal = date('Y-m-d G:i:s');
					$id_pengumuman = date('YmdGis').$kode;

					$data_pengumuman = [
						'id_pengumuman' => $id_pengumuman,
						'id_pembuat' 	=> $id_admin,
						'date' 			=> $tanggal,
						'isi' 			=> $pengumuman,
						'batas_waktu' 	=> $jadwal_acara
					];

					$this->db->insert('pengumuman',$data_pengumuman);

					$data_pembekalan = [
						'id_pembekalan' 	=> $id_pengumuman,
						'id_event' 			=> $id_event,
						'id_instruktur' 	=> $id_instruktur,
						'id_pengumuman' 	=> $id_pengumuman,
						'waktu_pelaksanaan' => $jadwal_acara,
						'link' 				=> $link_meeting,
						'link_materi' 		=> $link_materi
					];

					$this->db->insert('pembekalan',$data_pembekalan);

					$pesan = "Acara pembekalan berhasil ditambahkan";
					$this->alert_ok($pesan);
					redirect('Admin/pengaturan_event');
				}
			}
		}

		elseif ($judul == 'ubah_acara_pembekalan') 
		{
			$this->form_validation->set_rules('pilihan_instruktur', 'instruktur', 'trim');
			$this->form_validation->set_rules('id_pembekalan', 'Id', 'trim');
			$this->form_validation->set_rules('link_materi', 'Link Materi', 'trim');
			$this->form_validation->set_rules('link_meeting', 'Link Meeting', 'trim');
			$this->form_validation->set_rules('tgl', 'Tanggal', 'trim');
			$this->form_validation->set_rules('time', 'Waktu', 'trim');
			$this->form_validation->set_rules('pengumuman', 'Pengumuman', 'trim');


			$id_instruktur = htmlspecialchars($this->input->post('pilihan_instruktur', true)); 
			$id_pembekalan = htmlspecialchars($this->input->post('id_pembekalan', true)); 
			$link_materi = htmlspecialchars($this->input->post('link_materi', true)); 
			$link_meeting = htmlspecialchars($this->input->post('link_meeting', true)); 
			$tgl = htmlspecialchars($this->input->post('tgl', true)); 
			$time = htmlspecialchars($this->input->post('time', true)); 
			$pengumuman = htmlspecialchars($this->input->post('pengumuman', true)); 
			$jadwal_acara = $tgl.' '.$time;

			// echo "$pilihan_instruktur"; die();

			if ($this->form_validation->run() == false)
			{
				$pesan = "Link default penyimpanan data event gagal diperbaharui";
				$this->alert_gagal($pesan);
				redirect('Admin/pengaturan_event');
			}
			else
			{	 
				if (strtotime($jadwal_acara) < strtotime($data_event['awal_pembekalan']) || strtotime($jadwal_acara) > strtotime($data_event['akhir_pembekalan'])) 
				{
					$pesan = "Acara gagal dibuat, waktu pelaksanaan berada diluar jadwal pembekalan";
					$this->alert_gagal($pesan);
					redirect('Admin/tambah_acara_pembekalan/'.urlencode($id_event));
				}
				else
				{
					$data_pengumuman = [
						'isi' 			=> $pengumuman,
						'batas_waktu' 	=> $jadwal_acara

					];

					$this->db->set($data_pengumuman);
					$where = array( 'id_pengumuman' => $id_pembekalan );
					$this->db->where($where);
					$this->db->update('pengumuman');
					
					$data_pembekalan = [
						'id_instruktur' 	=> $id_instruktur,
						'waktu_pelaksanaan' => $jadwal_acara,
						'link' 				=> $link_meeting,
						'link_materi' 		=> $link_materi
					];

					$this->db->set($data_pembekalan);
					$where = array( 'id_pembekalan' => $id_pembekalan );
					$this->db->where($where);
					$this->db->update('pembekalan');
					
					$pesan = "Acara pembekalan berhasil diperbaharui";
					$this->alert_ok($pesan);
					redirect('Admin/pengaturan_event');
				}
			}
		}

		elseif ($judul == 'hapus_acara_pembekalan') 
		{
			$pembekalan = $this->Admin_Model->get_data_pembekalan_by_id_pembekalan($id_event); 
			$id_pengumuman = $pembekalan['id_pengumuman'];
// print_r($pembekalan); die();
			$this->db->delete('pengumuman', array('id_pengumuman' => $id_pengumuman));
			$this->db->delete('pembekalan', array('id_pembekalan' => $id_pembekalan));

			$pesan = "Acara pembekalan berhasil di hapus";
			$this->alert_ok($pesan);
			redirect('Admin/pengaturan_event');

		}

		elseif ($judul == 'Awal Registrasi' || $judul == 'Akhir Registrasi' || $judul == 'Awal Pembekalan' || $judul == 'Akhir Pembekalan' || $judul == 'Awal Pelayanan' || $judul == 'Akhir Pelayanan' || $judul == 'Awal Pelaporan' || $judul == 'Akhir Pelaporan' || $judul == 'Awal Penilaian' || $judul == 'Akhir Penilaian') 
		{
			$this->form_validation->set_rules('tgl', 'Tanggal', 'trim');
			$this->form_validation->set_rules('time', 'Waktu', 'trim');
			$tanggal = htmlspecialchars($this->input->post('tgl', true));
			$time = htmlspecialchars($this->input->post('time', true));
			$jadwal = $tanggal.' '.$time;

			// echo "$jadwal"; die(); 

			if ($this->form_validation->run() == false)
			{
				$pesan = "Waktu ".$judul." gagal diperbaharui";
				$this->alert_gagal($pesan);
				redirect('Admin/pengaturan_event');
			}
			else
			{	 
				// atur waktu awal regstrasi
				if ($judul == 'Awal Registrasi')   		{ $data = [ 'awal_registrasi' => $jadwal];}

				// atur waktu akhir regstrasi
				elseif ($judul == 'Akhir Registrasi') 	
					{ if (strtotime($jadwal) < strtotime($data_event['awal_registrasi'])) 
				{
					$pesan = "Data gagal di perbaharui, Waktu akhir registrasi harus diatur setelah waktu awal registrasi";
					$this->alert_gagal($pesan);
					redirect('Admin/pengaturan_event');
				} 
				else 
				{ 
					$data = [ 'akhir_registrasi' => $jadwal];
				}
			} 

				// atur waktu awal pembekalan
			elseif ($judul == 'Awal Pembekalan') 	
			{
				if (strtotime($jadwal) < strtotime($data_event['akhir_registrasi'])) 
				{
					$pesan = "Data gagal di perbaharui, Waktu awal pembekalan harus diatur setelah waktu akhir registrasi";
					$this->alert_gagal($pesan);
					redirect('Admin/pengaturan_event');
				} 
				else 
				{ 
					$data = [ 'awal_pembekalan' => $jadwal];
				}
			}

				// atur waktu akhir pembekalan
			elseif ($judul == 'Akhir Pembekalan') 	
			{ 
				if (strtotime($jadwal) < strtotime($data_event['awal_pembekalan'])) 
				{
					$pesan = "Data gagal di perbaharui, Waktu akhir pembekalan harus diatur setelah waktu awal pembekalan";
					$this->alert_gagal($pesan);
					redirect('Admin/pengaturan_event');
				} 
				else 
				{ 
					$data = [ 'akhir_pembekalan' => $jadwal];
				}

			}

				// atur waktu awal pelayanan
			elseif ($judul == 'Awal Pelayanan') 	
			{ 
				if (strtotime($jadwal) < strtotime($data_event['akhir_pembekalan'])) 
				{
					$pesan = "Data gagal di perbaharui, Waktu awal pelayanan harus diatur setelah waktu akhir pembekalan";
					$this->alert_gagal($pesan);
					redirect('Admin/pengaturan_event');
				} 
				else 
				{ 
					$data = [ 'awal_pelayanan' => $jadwal];
				}
			}

				// atur waktu akhir pelayanan
			elseif ($judul == 'Akhir Pelayanan') 	
			{ 
				if (strtotime($jadwal) < strtotime($data_event['awal_pelayanan'])) 
				{
					$pesan = "Data gagal di perbaharui, Waktu akhir pelayanan harus diatur setelah waktu awal pelayanan";
					$this->alert_gagal($pesan);
					redirect('Admin/pengaturan_event');
				} 
				else 
				{ 
					$data = [ 'akhir_pelayanan' => $jadwal];
				}
			}

				// atur waktu awal pelaporan
			elseif ($judul == 'Awal Pelaporan') 	
			{ 	
				if (strtotime($jadwal) < strtotime($data_event['akhir_pelayanan'])) 
				{
					$pesan = "Data gagal di perbaharui, Waktu awal pelaporan harus diatur setelah waktu akhir pelayanan";
					$this->alert_gagal($pesan);
					redirect('Admin/pengaturan_event');
				} 
				else 
				{ 
					$data = [ 'awal_pelaporan' => $jadwal];
				}
			}

				// atur waktu akhir pelaporan
			elseif ($judul == 'Akhir Pelaporan') 	
			{ 
				if (strtotime($jadwal) < strtotime($data_event['awal_pelaporan'])) 
				{
					$pesan = "Data gagal di perbaharui, Waktu akhir pelaporan harus diatur setelah waktu awal pelaporan";
					$this->alert_gagal($pesan);
					redirect('Admin/pengaturan_event');
				} 
				else 
				{ 
					$data = [ 'akhir_pelaporan' => $jadwal];
				}
			}

				// atur waktu awal penilaian
			elseif ($judul == 'Awal Penilaian') 	
			{ 
				if (strtotime($jadwal) < strtotime($data_event['akhir_pelaporan'])) 
				{
					$pesan = "Data gagal di perbaharui, Waktu awal penilaian harus diatur setelah waktu akhir pelaporan";
					$this->alert_gagal($pesan);
					redirect('Admin/pengaturan_event');
				} 
				else 
				{ 
					$data = [ 'awal_penilaian' => $jadwal];
				}
			}
				// atur waktu akhir penilaian
			elseif ($judul == 'Akhir Penilaian') 	
			{ 
				if (strtotime($jadwal) < strtotime($data_event['awal_penilaian'])) 
				{
					$pesan = "Data gagal di perbaharui, Waktu akhir penilaian harus diatur setelah waktu awal penilaian";
					$this->alert_gagal($pesan);
					redirect('Admin/pengaturan_event');
				} 
				else 
				{ 
					$data = [ 'akhir_penilaian' => $jadwal];
				}
			}	



			$this->db->set($data);
			$where = array('id_event' => $id_event);
			$this->db->where($where);
			$this->db->update('event');

			$pesan = "Waktu ".$judul." berhasil diperbaharui";
			$this->alert_ok($pesan);
			redirect('Admin/pengaturan_event');
		}
	}

}



public function pengumuman_event()
{
	if (!$this->session->userdata('id_event')) 
	{
		redirect('Admin/event');
	}
	elseif ($this->session->userdata('id_pangkalan'))
	{
		redirect('Admin/detail_pangkalan');
	}
	else
	{
		$this->load->model('Admin_Model');

		$data['title']  = "Pengumuman";
		$id_admin 	 	= $this->session->userdata('id_admin');
		$data['user'] 	= 'Admin';
		$id_event 	 	= $this->session->userdata('id_event');
		$data['admin'] 	= $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
		$data['jml_komisariat'] = $this->Admin_Model->get_jml_komisariat_byEvent($id_event);
		$data['event'] 	= $this->Admin_Model->get_event();
		$data['Judul'] 	= ['','Awal Registrasi','Akhir Registrasi','Awal Pembekalan','Akhir Pembekalan','Awal Pelayanan','Akhir Pelayanan','Awal Pelaporan','Akhir Pelaporan','Awal Penilaian','Akhir Penilaian']; 
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();


		$this->load->view('template/header', $data);
		$this->load->view('admin/sidebar_2', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/pengumuman_event', $data);
		$this->load->view('template/footer', $data);
	}
}


public function template()
{
	if ($this->session->userdata('id_event')) 
	{
		redirect('Admin/event');
	}
	elseif ($this->session->userdata('id_pangkalan'))
	{
		redirect('Admin/detail_pangkalan');
	}
	else
	{
		$this->load->model('Admin_Model');

		$data['title']  = "Template";
		$id_admin 	 	= $this->session->userdata('id_admin');
		$data['user'] 	= 'Administrator';
		$id_event 	 	= $this->session->userdata('id_event');
		$data['admin'] 	= $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
		$data['event'] 	= $this->Admin_Model->get_event();
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['template'] = $this->Admin_Model->get_all_template_berkas();
		$data['nama_template'] = array('0' => 'Surat Izin', '1' =>'Survey Permintaan', '2' => 'Presensi Pelayanan', '3' => 'Berita Acara Penerapan Konten', '4' => 'Survey Program', '5' => 'Template Artikel Berita', '6' => 'Artikel MIFTEK', '7' => 'Surat Kesediaan Pangkalan', '8' => 'Berita Acara Penerapan konten');

				// print_r($data['template']); die();
		$this->load->view('template/header_dataTable', $data);
		$this->load->view('relawan/sidebar2', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/template', $data);
		$this->load->view('template/footer_dataTable', $data);
	}
}

public function ubah_template($id)
{

	$id_admin 	 	= $this->session->userdata('id_admin');
	$file = $_FILES['file']['name'];
	$template = $this->Admin_Model->get_template_by_id_template($id);
		// print_r($template); die();


	if($file)
	{
		$config['allowed_types'] = 'doc|docx|pdf';
		$config['max_size']     = '5048';
		$config['upload_path'] = './assets/file/berkas/';


		$this->load->library('upload', $config);

		if($this->upload->do_upload('file'))
		{

			$new_file = $this->upload->data('file_name');
			$old_berkas = $template['nama_template'];

			unlink(FCPATH . 'assets/file/berkas/' . $old_berkas);
			
			$data = array(
				'date' 			=> date('Y-m-d H:i:s'),
				'id_admin' 		=> $id_admin,
				'nama_template'	=> $new_file
			);

			$this->db->set($data);
			$where = array('id_template' => $id );

			$this->db->where($where);
			$this->db->update('template');

		}
		$pesan = "Berkas template telah berhasil di perbaharui";
		$this->alert_ok($pesan);
		redirect('Admin/template');

	}
	else
	{
		$pesan = "Gagal memperbaharui template, harap memilih berkas template";
		$this->alert_gagal($pesan);
		redirect('Admin/template');
	}
}


public function admin()
{
	if ($this->session->userdata('id_event')) 
	{
		redirect('Admin/detail_event');
	}
	elseif ($this->session->userdata('id_pangkalan'))
	{
		redirect('Admin/detail_pangkalan');
	}
	else
	{
		$this->load->model('Admin_Model');

		$data['title']  = "Admin";
		$id_admin 	 	= $this->session->userdata('id_admin');
		$data['user'] 	= 'Admin';
		$id_event 	 	= $this->session->userdata('id_event');
		$data['admin'] 	= $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
		
		$data['administrator'] = $this->Admin_Model->get_all_data_admin();

		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
				// print_r($data['administrator']); die();

		$this->load->view('template/header_dataTable', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/admin', $data);
		$this->load->view('template/footer_dataTable', $data);
	}	
}

public function tambah_admin()
{

	if ($this->session->userdata('id_event')) 
	{
		redirect('Admin/detail_event');
	}
	elseif ($this->session->userdata('id_pangkalan'))
	{
		redirect('Admin/detail_pangkalan');
	}
	else
	{
		$this->form_validation->set_rules('email', 'Email', 'trim');
		$email = htmlspecialchars($this->input->post('email', true));  

		$cek_email = $this->Admin_Model->cek_email($email);
		
		if ($cek_email == '0') 
		{
			if ($this->form_validation->run() == false)
			{
				$pesan = "Gagal menambahkan admin, harap mengisi email yang belum terdaftar sebagai admin";
				$this->alert_gagal($pesan);
				redirect('Admin/admin');

			}
			else
			{
				$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$kode = substr(str_shuffle($permitted_chars), 0, 1);
				$password = substr(str_shuffle($permitted_chars), 0, 8);
				$id = date('YmdGis').$kode;

				$data = array(
					'id_admin' 	=> $id,
					'nama' 		=> 'Admin RTIKAbdimas',
					'username'	=> '-',
					'no_induk'	=> '-',
					'jabatan'	=> '-',
					'email'		=> $email,
					'image'		=> 'default_image.jpg',
					'role_id'	=> '0',
					'password'	=> base64_encode($password)
				);

				$this->db->insert('admin',$data);

				$this->_sendEmail($email,$password);

				$pesan = "Admin sudah berhasil ditambahkan, Admin akan menerima pemberitahuan akun melalui email";
				$this->alert_ok($pesan);
			}
		}
		else
		{
			$pesan = "Alamat email sudah digunakan";
			$this->alert_gagal($pesan);
		}
		redirect('Admin/admin');
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


	$this->email->initialize($config);
	$this->email->from('nugrahaihsan96@gmail.com', 'RTIK Abdimasyarakat');
	$this->email->to($this->input->post('email'));
	$this->email->subject('Akun Admin RTIK Abdi Masyarakat');
	$this->email->message('Hai <b>'.$email.'</b><br>Segera login pada aplikasi RTIKAbdimas sebagai administrator dengan email <b>"'.$email.'"</b> serta password <b>"'.$password.'"</b>. Klik pada link berikut untuk mengunjungi aplikasi : <a href="'. base_url().'">Kunjungi Aplikasi.</a>');


	if ($this->email->send()){
		return true;
	} else {
		echo "gagal kirim email"."<br>";
		echo $this->email->print_debugger();

		die();
	}
}


public function reset_password($user,$email)
{
	$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$password = substr(str_shuffle($permitted_chars), 0, 8);
	$id = urldecode($email);

	$data = array(
		'email' 	=> $id,
		'password'	=> base64_encode($password)
	);

	$this->db->set($data);
	$where = array('email' => $id);
	$this->db->where($where);

	if ($user == 'admin') 
	{
		$this->db->update('admin');
	}
	elseif ($user == 'instruktur') 
	{
		$this->db->update('instruktur');
	}

	$this->sendEmail2(urlencode($id),$password);


	if ($user == 'admin') 
	{
		$pesan = "Password admin berhasil di reset, Admin akan menerima pemberitahuan akun melalui email";
		$this->alert_ok($pesan);
		redirect('Admin/admin');
	}
	elseif ($user == 'instruktur') 
	{
		$pesan = "Password admin berhasil di reset, Instruktur akan menerima pemberitahuan akun melalui email";
		$this->alert_ok($pesan);
		redirect('Admin/instruktur');
	}

}

public function sendEmail2($email, $password)
{
	$email = urldecode($email);
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


	$this->email->initialize($config);
	$this->email->from('nugrahaihsan96@gmail.com', 'RTIK Abdimasyarakat');
	$this->email->to($email);
	$this->email->subject('Akun Admin RTIK Abdi Masyarakat');
	$this->email->message('Hai <b>'.$email.'</b><br>Password akun anda telah berhasil di reset.<br>Segera login pada aplikasi RTIKAbdimas sebagai administrator dengan email <b>"'.$email.'"</b> serta password <b>"'.$password.'"</b>. Klik pada link berikut untuk mengunjungi aplikasi : <a href="'. base_url().'">Kunjungi Aplikasi.</a>');


	if ($this->email->send()){
		return true;
	} else {
		echo "gagal kirim email"."<br>";
		echo $this->email->print_debugger();

		die();
	}
}

public function hapus_akun($user,$id_user)
{

	$admin	= $this->Admin_Model->cek_relawan_by_idRelawan($id_user);
	
	if ($user == 'admin') {

		$this->db->delete('admin', array('id_admin' => $id_user));	
		if ($admin['image'] != 'default_image.jpg') 
		{			
			unlink(FCPATH . 'assets/img/admin/' . $admin['image']);
		}		
		
		$this->db->set('id_admin', 'dummy');
		$where = array('id_admin' => $admin['id_admin'] );
		$this->db->where($where);
		$this->db->update('event');

		$this->db->set('id_pembuat', 'dummy');
		$where = array('id_pembuat' => $admin['id_admin'] );
		$this->db->where($where);
		$this->db->update('pengumuman');

		$this->db->set('id_admin', 'dummy');
		$where = array('id_admin' => $admin['id_admin'] );
		$this->db->where($where);
		$this->db->update('template');

		$pesan = "Akun admin telah berhasil di hapus";
		$this->alert_ok($pesan);
		redirect('Admin/admin');
	}

	elseif ($user == 'admin2') 
	{
		$this->db->delete('admin', array('id_admin' => $id_user));	

		if ($admin['image'] != 'default_image.jpg') 
		{			
			unlink(FCPATH . 'assets/img/admin/' . $admin['image']);
		}		
		
		$this->db->set('id_admin', 'dummy');
		$where = array('id_admin' => $admin['id_admin'] );
		$this->db->where($where);
		$this->db->update('event');

		$this->db->set('id_pembuat', 'dummy');
		$where = array('id_pembuat' => $admin['id_admin'] );
		$this->db->where($where);
		$this->db->update('pengumuman');

		$this->db->set('id_admin', 'dummy');
		$where = array('id_admin' => $admin['id_admin'] );
		$this->db->where($where);
		$this->db->update('template');

		redirect('Logout/hapus_akun');
	}
	elseif ($user == 'insruktur') {
		$this->db->delete('instruktur', array('id_instruktur' => $id_user));

		$pesan = "Akun instruktur telah berhasil di hapus";
		$this->alert_ok($pesan);
		redirect('Admin/instruktur');
	}

}


public function instruktur()
{
	if ($this->session->userdata('id_event')) 
	{
		redirect('Admin/detail_event');
	}
	elseif ($this->session->userdata('id_pangkalan'))
	{
		redirect('Admin/detail_pangkalan');
	}
	else
	{
		$this->load->model('Admin_Model');

		$data['title']  = "Instruktur";
		$id_admin 	 	= $this->session->userdata('id_admin');
		$data['user'] 	= 'Admin';
		$id_event 	 	= $this->session->userdata('id_event');
		$data['admin'] 	= $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
		$data['instruktur'] = $this->Admin_Model->get_datainstruktur();
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();

		$data['jml_pengajuan_instruktur'] = $this->Admin_Model->get_jml_permintaan_akun_instruktur();
		$data['pengajuan_instruktur'] = $this->Admin_Model->get_pengajuan_instruktur();

		$i=0;
		foreach ($data['instruktur'] as $ins) 
		{
			$data['materi_instruktur'][$i] = $this->Admin_Model->get_materi_instruktur_by_id_instruktur($ins['id_instruktur']);

			$data['jml_materi_instruktur'][$i] = $this->Admin_Model->get_jml_materi_instruktur($ins['id_instruktur']);

			$i++;
		}


		$this->load->view('template/header_dataTable', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/instruktur', $data);
		$this->load->view('template/footer_dataTable', $data);
	}	
}

public function pengajuan_instruktur()
{
	if ($this->session->userdata('id_event')) 
	{
		redirect('Admin/detail_Event');
	}
	elseif ($this->session->userdata('id_pangkalan'))
	{
		redirect('Admin/detail_pangkalan');
	}
	else
	{
		$this->load->model('Admin_Model');

		$data['title']  = "Pengajuan Instruktur";
		$id_admin 	 	= $this->session->userdata('id_admin');
		$data['user'] 	= 'Admin';
		$data['admin'] 	= $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
		$data['jml_pengajuan_instruktur'] = $this->Admin_Model->get_jml_permintaan_akun_instruktur();
		$data['pengajuan_instruktur'] = $this->Admin_Model->get_pengajuan_instruktur();


		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();

		$this->load->view('template/header_dataTable', $data);
		$this->load->view('relawan/sidebar2', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/pengajuan_instruktur', $data);
		$this->load->view('template/footer_dataTable', $data);
	}
}

public function aksi_pengajuan_instruktur($keputusan,$email,$id_instruktur)
{
	$email = urldecode($email);
	$id_ins = urldecode($id_instruktur);
			// echo "$keputusan"; die();

	if ($keputusan == 'acc') 
	{
		$data = ['role_id' 	=> '1'];

		$this->db->set($data);
		$where = array('id_instruktur' => $id_ins);
		$this->db->where($where);
		$this->db->update('instruktur');


		$this->_sendEmailInstruktur($email,'acc');

		$pesan = "Instruktur baru telah berhasil di tambahkan";
		$this->alert_ok($pesan);
		redirect('Admin/pengajuan_instruktur');	
	}
	elseif ($keputusan == 'tolak') 
	{
		$this->db->delete('instruktur', array('id_instruktur' => $id_ins));


		$this->_sendEmailInstruktur($email,'tolak');
		$pesan = "Pengajuan instruktur telah di tolak";
		$this->alert_ok($pesan);
		redirect('Admin/pengajuan_instruktur');	
	}
	elseif ($keputusan == 'hapus') 
	{
		$data_instruktur = $this->Admin_Model->get_datainstruktur_by_id_instruktur($id_ins);
				// print_r($data_instruktur); die();
		$this->db->delete('instruktur', array('id_instruktur' => $id_ins));
		$this->db->delete('materi', array('id_instruktur' => $id_ins));		

		if ($data_instruktur['image'] != 'default_image.jpg') 
		{
			unlink(FCPATH . 'assets/img/instruktur/' . $data_instruktur['image']);
		}	


		$data = ['id_instruktur' 	=> '0'];

		$this->db->set($data);
		$where = array('id_instruktur' => $id_ins);
		$this->db->where($where);
		$this->db->update('pembekalan');

		$pesan = "Data instruktur telah di hapus";
		$this->alert_ok($pesan);
		redirect('Admin/instruktur');
	}



}

private function _sendEmailInstruktur($email,$aksi)
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


	$this->email->initialize($config);
	$this->email->from('nugrahaihsan96@gmail.com', 'RTIK Abdimasyarakat');
	$this->email->to($email);
	$this->email->subject('Akun Instruktur RTIK Abdi Masyarakat');

	if ($aksi == 'acc') 
	{
		$this->email->message('Hai <b>'.$email.'</b><br>Pengajuan Akun Instruktur RTIKAbdimas telah diterima, segera login pada aplikasi RTIKAbdimas sebagai instruktur dengan email <b>"'.$email.'"</b>. Klik pada link berikut untuk mengunjungi aplikasi : <a href="'. base_url().'">Kunjungi Aplikasi.</a>');
	}
	elseif ($aksi == 'tolak') 
	{
		$this->email->message('Hai <b>'.$email.'</b><br>Mohon maaf, Pengajuan Akun Instruktur RTIKAbdimas belum bisa diterima.</a>');
	}
	


	if ($this->email->send()){
		return true;
	} else {
		echo "gagal kirim email"."<br>";
		echo $this->email->print_debugger();

		die();
	}
}

private function _sendEmailPangkalan($email,$aksi)
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


	$this->email->initialize($config);
	$this->email->from('nugrahaihsan96@gmail.com', 'RTIK Abdimasyarakat');
	$this->email->to($email);
	$this->email->subject('Akun Pangkalan RTIK Abdi Masyarakat');

	if ($aksi == 'acc') 
	{
		$this->email->message('Hai <b>'.$email.'</b><br>Pengajuan Akun Pangkalan telah diterima, segera login pada aplikasi RTIKAbdimas sebagai pangkalan dengan email <b>"'.$email.'"</b>. Klik pada link berikut untuk mengunjungi aplikasi : <a href="'. base_url().'">Kunjungi Aplikasi.</a>');
	}
	elseif ($aksi == 'tolak') 
	{
		$this->email->message('Hai <b>'.$email.'</b><br>Mohon maaf, berdasarkan pertimbangan Administrator, Pengajuan Akun Pangkalan yang anda ajukan ditolak.</a>');
	}
	


	if ($this->email->send()){
		return true;
	} else {
		echo "gagal kirim email"."<br>";
		echo $this->email->print_debugger();

		die();
	}
}

public function pengumuman()
{
	if ($this->session->userdata('id_event')) 
	{
		redirect('Admin/detail_event');
	}
	elseif ($this->session->userdata('id_pangkalan'))
	{
		redirect('Admin/detail_pangkalan');
	}
	else
	{
		$this->load->model('Admin_Model');

		$data['title']  = "Pengumuman";
		$id_admin 	 	= $this->session->userdata('id_admin');
		$data['user'] 	= 'Admin';
		$id_event 	 	= $this->session->userdata('id_event');
		$data['admin'] 	= $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
		$data['jml_komisariat'] = $this->Admin_Model->get_jml_komisariat_byEvent($id_event);
		$data['event'] 	= $this->Admin_Model->get_event();
		$data['Judul'] 	= ['','Awal Registrasi','Akhir Registrasi','Awal Pembekalan','Akhir Pembekalan','Awal Pelayanan','Akhir Pelayanan','Awal Pelaporan','Akhir Pelaporan','Awal Penilaian','Akhir Penilaian']; 
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['data_pengumuman'] = $this->Admin_Model->get_data_pengumuman();

		$i=0;
		foreach ($data['data_pengumuman'] as $cek) 
		{
			$data['pengumuman_pembekalan'][$i] = $this->Admin_Model->get_id_pengumuman_pembekalan_by_id($cek['id_pengumuman']);
			$i++;
		}


	// print_r($data['pengumuman_event']); die();
		$this->load->view('template/header_dataTable', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/pengumuman_event', $data);
		$this->load->view('template/footer_dataTable', $data);
	}
}

public function tambah_pengumuman()
{
		// echo "masuk"; die();
	if ($this->session->userdata('id_event')) 
	{
		redirect('Admin/detail_Event');
	}
	elseif ($this->session->userdata('id_pangkalan'))
	{
		redirect('Admin/detail_pangkalan');
	}
	else
	{
		$this->form_validation->set_rules('isi', 'Isi','required|trim');
		$this->form_validation->set_rules('tgl', 'Tanggal','required|trim');
		$this->form_validation->set_rules('time', 'Waktu','required|trim');


		$isi = htmlspecialchars($this->input->post('isi', true));
		$tgl = htmlspecialchars($this->input->post('tgl', true));
		$time = htmlspecialchars($this->input->post('time', true));

		if ($this->form_validation->run() == false)
		{
			$pesan = "Gagal membuat pengumuman baru, Harap mengisi data dengan benar";
			$this->alert_gagal($pesan);
			redirect('Admin/pengumuman');
		}
		else
		{	
			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$kode = substr(str_shuffle($permitted_chars), 0, 1);
			$date = date('YmdGis');
			$id_admin 	 	= $this->session->userdata('id_admin');
			$date_created = date("Y-m-d G:i:s");

			$data = [
				'id_pengumuman'		=> $date.$kode,
				'id_pembuat'		=> $id_admin,
				'date'		 		=> $date_created,
				'isi'		 		=> $isi,
				'batas_waktu'		=> $tgl." ".$time
			];

			$this->db->insert('pengumuman', $data);

			$pesan = "Pengumuman baru berhasil di buat";
			$this->alert_ok($pesan);

			redirect('Admin/pengumuman');

		}
	}
}

public function aksi_pengumuman($aksi,$id_pengumuman)
{
	if ($this->session->userdata('id_event')) 
	{
		redirect('Admin/detail_Event');
	}
	elseif ($this->session->userdata('id_pangkalan'))
	{
		redirect('Admin/detail_pangkalan');
	}
	else
	{
		if ($aksi == 'edit') 
		{
			$this->form_validation->set_rules('isi', 'Isi','required|trim');
			$this->form_validation->set_rules('tgl', 'Tanggal','required|trim');
			$this->form_validation->set_rules('time', 'Waktu','required|trim');


			$isi = htmlspecialchars($this->input->post('isi', true));
			$tgl = htmlspecialchars($this->input->post('tgl', true));
			$time = htmlspecialchars($this->input->post('time', true));

			if ($this->form_validation->run() == false)
			{
				$pesan = "Gagal memperbaharui, Harap mengisi data dengan benar";
				$this->alert_gagal($pesan);
				redirect('Admin/pengumuman');
			}
			else
			{	
				$id_admin 	 	= $this->session->userdata('id_admin');

				$data = [
					'id_pembuat'		=> $id_admin,
					'isi'		 		=> $isi,
					'batas_waktu'		=> $tgl." ".$time
				];

				$this->db->set($data);
				$where = array('id_pengumuman' => $id_pengumuman);
				$this->db->where($where);
				$this->db->update('pengumuman');

				$pesan = "Pengumuman berhasil diperbaharui";
				$this->alert_ok($pesan);

				redirect('Admin/pengumuman');

			}
		}
		elseif ($aksi == 'hapus') 
		{
			$this->db->delete('pengumuman', array('id_pengumuman' => $id_pengumuman));

			$pesan = "Pengumuman berhasil dihapus";
			$this->alert_ok($pesan);

			redirect('Admin/pengumuman');
		}
		
	}
}


public function mitra()
{
	if ($this->session->userdata('id_event')) 
	{
		redirect('Admin/detail_event');
	}
	elseif ($this->session->userdata('id_pangkalan'))
	{
		redirect('Admin/detail_pangkalan');
	}
	else
	{
		$this->load->model('Admin_Model');

		$data['title']  = "Mitra";
		$id_admin 	 	= $this->session->userdata('id_admin');
		$data['user'] 	= 'Admin';
		$data['admin'] 	= $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['image'] = $this->Admin_Model->get_image_mitra_koordinator();

			// print_r($data['image']); die();
		$this->load->view('template/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/mitra_koordinator', $data);
		$this->load->view('template/footer', $data);
	}
}

public function ubah_mitra($id)
{

	$id_admin = $this->session->userdata('id_admin');
	$file = $_FILES['file']['name'];
	$template = $this->Admin_Model->get_template_by_id_template($id);
		// print_r($template); die();


	if($file)
	{
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size']     = '5048';
		$config['upload_path'] = './assets/img/mitra/';


		$this->load->library('upload', $config);

		if($this->upload->do_upload('file'))
		{

			unlink(FCPATH . 'assets/img/mitra/' . $template['nama_template']);
			$new_file = $this->upload->data('file_name');

			$data = array(
				'date' 			=> date('Y-m-d H:i:s'),
				'id_admin' 		=> $id_admin,
				'nama_template'	=> $new_file
			);

			$this->db->set($data);
			$where = array('id_template' => $id );

			$this->db->where($where);
			$this->db->update('template');

			$pesan = "Image telah berhasil di perbaharui";
			$this->alert_ok($pesan);
		}
		else
		{
			$pesan = "Image gagal di perbaharui";
			$this->alert_gagal($pesan);
		}
		
		redirect('Admin/mitra');

	}
	else
	{
		$pesan = "Gagal memperbaharui image, harap memilih image";
		$this->alert_gagal($pesan);
		redirect('Admin/mitra');
	}
}

public function keahlian()
{
	if ($this->session->userdata('id_event')) 
	{
		redirect('Admin/detail_event');
	}
	elseif ($this->session->userdata('id_pangkalan'))
	{
		redirect('Admin/detail_pangkalan');
	}
	else
	{
		$this->load->model('Admin_Model');

		$data['title']  = "Keahlian";
		$id_admin 	 	= $this->session->userdata('id_admin');
		$data['user'] 	= 'Admin';
		$data['admin'] 	= $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['keahlian'] = $this->Admin_Model->get_keahlian_Relawan();

			// print_r($data['keahlian']); die();
		$this->load->view('template/header_dataTable', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/keahlian_relawan', $data);
		$this->load->view('template/footer_dataTable', $data);
	}
}


public function pengajuan_keahlian($aksi,$id_keahlian)
{
	if ($aksi == 'hapus') 
	{			
		$this->db->delete('keahlian', array('id_keahlian' => $id_keahlian));
		$this->db->delete('draf_keahlian_relawan', array('id_keahlian' => $id_keahlian));

		$pesan = "Data keahlian berhasil dihapus";
		$this->alert_ok($pesan);
	}
	elseif ($aksi == 'tambah') 
	{			
		$this->form_validation->set_rules('keahlian', 'Keahlian','required|trim');

		$keahlian = htmlspecialchars($this->input->post('keahlian', true));

		if ($this->form_validation->run() == false)
		{
			$pesan = "Gagal menambah keahlian baru, Harap mengisi data dengan benar";
			$this->alert_gagal($pesan);
		}
		else
		{	
			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$kode = substr(str_shuffle($permitted_chars), 0, 15);


			$data = [
				'id_keahlian' 		=> $kode,
				'nama_keahlian'		=> $keahlian
			];
			$this->db->insert('keahlian', $data);
			$pesan = "Keahlian baru berhasil ditambahkan";
			$this->alert_ok($pesan);
		}

	}
	elseif ($aksi == 'ubah') 
	{
		$this->form_validation->set_rules('keahlian', 'Keahlian','required|trim');

		$keahlian = htmlspecialchars($this->input->post('keahlian', true));

		if ($this->form_validation->run() == false)
		{
			$pesan = "Gagal mengubah data keahlian, Harap mengisi data dengan benar";
			$this->alert_gagal($pesan);
		}
		else
		{	
			$data = ['nama_keahlian' => $keahlian];
			
			$this->db->set($data);
			$where = array('id_keahlian' => $id_keahlian);
			$this->db->where($where);
			$this->db->update('keahlian');

			$pesan = "Data keahlian berhasil diperbaharui";
			$this->alert_ok($pesan);
		}
	}
	redirect('Admin/keahlian');
}


public function jenis_mitra()
{
	if ($this->session->userdata('id_event')) 
	{
		redirect('Admin/detail_event');
	}
	elseif ($this->session->userdata('id_pangkalan'))
	{
		redirect('Admin/detail_pangkalan');
	}
	else
	{
		$this->load->model('Admin_Model');

		$data['title']  = "Jenis Mitra";
		$id_admin 	 	= $this->session->userdata('id_admin');
		$data['user'] 	= 'Admin';
		$data['admin'] 	= $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['jenis'] = $this->Admin_Model->get_jenis_mitra();

			// print_r($data['keahlian']); die();
		$this->load->view('template/header_dataTable', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/jenis_mitra', $data);
		$this->load->view('template/footer_dataTable', $data); 
	}
}


public function pengajuan_jenis_mitra($aksi,$id_cluster)
{
	if ($aksi == 'hapus') 
	{			
		$this->db->delete('cluster', array('id_cluster' => $id_cluster));
		
		$data = array('id_cluster' => '0' );
		$this->db->set($data);
		$where = array('id_cluster' => $id_cluster);
		$this->db->where($where);
		$this->db->update('mitra');

		$pesan = "Data cluster berhasil dihapus";
		$this->alert_ok($pesan);
	}
	elseif ($aksi == 'tambah') 
	{			
		$this->form_validation->set_rules('jenis', 'jenis','required|trim');

		$jenis = htmlspecialchars($this->input->post('jenis', true));

		if ($this->form_validation->run() == false)
		{
			$pesan = "Gagal menambah data jenis mitra baru, Harap mengisi data dengan benar";
			$this->alert_gagal($pesan);
		}
		else
		{	
			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$kode = substr(str_shuffle($permitted_chars), 0, 15);


			$data = [
				'id_cluster' 		=> $kode,
				'nama_cluster'		=> $jenis
			];
			$this->db->insert('cluster', $data);
			$pesan = "Data jenis mitra baru berhasil ditambahkan";
			$this->alert_ok($pesan);
		}

	}
	elseif ($aksi == 'ubah') 
	{
		$this->form_validation->set_rules('jenis', 'Jenis','required|trim');

		$jenis = htmlspecialchars($this->input->post('jenis', true));

		if ($this->form_validation->run() == false)
		{
			$pesan = "Gagal mengubah data jenis mitra, Harap mengisi data dengan benar";
			$this->alert_gagal($pesan);
		}
		else
		{	
			$data = ['nama_cluster' => $jenis];
			
			$this->db->set($data);
			$where = array('id_cluster' => $id_cluster);
			$this->db->where($where);
			$this->db->update('cluster');

			$pesan = "Data jenis mitra berhasil diperbaharui";
			$this->alert_ok($pesan);
		}
	}
	redirect('Admin/jenis_mitra');
}

public function profil()
{
	if ($this->session->userdata('id_event')) 
	{
		redirect('Admin/detail_event');
	}
	elseif ($this->session->userdata('id_pangkalan'))
	{
		redirect('Admin/detail_pangkalan');
	}
	else
	{
		$this->load->model('Admin_Model');

		$data['title']  = "Profil";
		$id_admin 	 	= $this->session->userdata('id_admin');
		$data['user'] 	= 'Admin';
		$data['admin'] 	= $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();

			// print_r($data['admin']); die();

		$this->load->view('template/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/profil_admin', $data);
		$this->load->view('template/footer', $data);
	}
}

public function edit_profil()
{
	if ($this->session->userdata('id_event')) 
	{
		redirect('Admin/detail_event');
	}
	elseif ($this->session->userdata('id_pangkalan'))
	{
		redirect('Admin/detail_pangkalan');
	}
	else
	{
		$this->load->model('Admin_Model');

		$data['title']  = "Edit Profil";
		$id_admin 	 	= $this->session->userdata('id_admin');
		$data['user'] 	= 'Admin';
		$data['admin'] 	= $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();

			// print_r($data['admin']); die();
		$this->load->view('template/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/edit_profil', $data);
		$this->load->view('template/footer', $data);
	}
}

public function update_data($aksi,$id_admin)
{
	$data['admin'] = $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
	
	if ($aksi == "akun") 
	{
		$this->form_validation->set_rules('email', 'Email', 'trim');
		$this->form_validation->set_rules('Username', 'Username', 'trim');

		$email = htmlspecialchars($this->input->post('email', true));  
		$Username = htmlspecialchars($this->input->post('Username', true));

		$cek_email = $this->Admin_Model->cek_email($email);
		$cek_username = $this->Admin_Model->cek_username($Username); 

		if ($this->form_validation->run() == false)
		{
			$pesan = "Akun gagal di perbaharui, harap mengisi data dengan benar";
			$this->alert_gagal($pesan);
			redirect('Admin/edit_profil');

		}
		else
		{	 
			$image = $_FILES['foto']['name'];	

			if($image)
			{

				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']      = '2048';
				$config['upload_path']   = './assets/img/admin/';

				

				$this->load->library('upload',$config);
				if ($this->upload->do_upload('foto')) 
				{
					$old_image = $data['admin']['image'];
					
					if($old_image != 'default_image.jpg')
					{
						unlink(FCPATH . 'assets/img/admin/' . $old_image);						
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);

				}

				else if ($_FILES['foto']['size'] >= '2048') 
				{
					$pesan = "Ukuran dokumen yang diunggah melebihi batas (2MB), dokumen gagal di upload";
					$this->alert_gagal($pesan);
					redirect('Admin/edit_profil');
				}
				
				$where = array('id_admin' => $id_admin );
				$this->db->where($where);
				$this->db->update('admin');

				$pesan = "Image sudah berhasil diperbaharui";
				$this->alert_ok($pesan);					
			}

				// jika tidak ada image yang di upload
			else
			{
				if ($cek_username == '0') 
				{
					if ($cek_email == '0') 
					{

						$data = [
							'username' 	=> $Username,
							'email' 	=> $email
						];

						$this->db->set($data);
						$this->db->where('id_admin', $id_admin);
						$this->db->update('admin');

						$pesan = "Akun anda sudah berhasil diperbaharui";
						$this->alert_ok($pesan);	
					}
					elseif ($email == $data['admin']['email']) 
					{
						$data = [
							'username' 	=> $Username,
							'email' 	=> $email
						];

						$this->db->set($data);
						$this->db->where('id_admin', $id_admin);
						$this->db->update('admin');

						$pesan = "Username sudah berhasil diperbaharui";
						$this->alert_ok($pesan);	
					}
					else
					{
						$pesan = "Email sudah digunakan";
						$this->alert_gagal($pesan);
					}
					
				}
				elseif ($Username == $data['admin']['username']) 
				{
					if ($cek_email == '0') 
					{
						$data = [
							'username' 	=> $Username,
							'email' 	=> $email
						];

						$this->db->set($data);
						$this->db->where('id_admin', $id_admin);
						$this->db->update('admin');

						$pesan = "Email anda sudah berhasil diperbaharui";
						$this->alert_ok($pesan);	
					}
					elseif ($email == $data['admin']['email']) 
					{
						$pesan = "Tidak ada yang diperbaharui";
						$this->alert_info($pesan);	
					}
					else
					{
						$pesan = "Email sudah digunakan";
						$this->alert_gagal($pesan);
					}

				}
				else
				{
					$pesan = "Username sudah digunakan";
					$this->alert_gagal($pesan);				
				}	
			}

			redirect('Admin/edit_profil');
		}
		
		
	}



	elseif ($aksi == 'hapus_foto')
	{
		$old_image = $data['admin']['image'];
		if ($old_image != 'default_image.jpg') 
		{
			unlink(FCPATH . 'assets/img/admin/' . $old_image);
		}
		

		$this->db->set('image', 'default_image.jpg');
		$where = array('id_admin' => $data['admin']['id_admin'] );
		$this->db->where($where);
		$this->db->update('admin');

		$pesan = "Foto Profil berhasil di hapus";
		$this->alert_ok($pesan);
		redirect('Admin/edit_profil');
	}


	elseif ($aksi == "biodata") 
	{
		
		$this->form_validation->set_rules('nik', 'Nik', 'trim');
		$this->form_validation->set_rules('nama', 'Nama', 'trim');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim');



		$nik = htmlspecialchars($this->input->post('nik', true));  
		$nama = htmlspecialchars($this->input->post('nama', true));   
		$jabatan = htmlspecialchars($this->input->post('jabatan', true)); 


		if ($this->form_validation->run() == false)
		{
			$pesan = "Biodata gagal di perbaharui, harap mengisi data dengan benar";
			$this->alert_gagal($pesan);
			redirect('Admin/edit_profil/#bio');

		}
		else
		{
			$data2 = [
				'no_induk' 		=> $nik,
				'nama'			=> $nama,
				'jabatan'		=> $jabatan
			];

			$this->db->set($data2);
			$where = array('id_admin' => $id_admin );
			$this->db->where($where);
			$this->db->update('admin');

			$pesan = "Biodata telah di perbaharui";
			$this->alert_ok($pesan);
			redirect('Admin/edit_profil/#bio');
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
			redirect('Admin/edit_profil');

		}
		else
		{	
			if ($passwordlama != base64_decode($data['admin']['password'])) {
				$pesan = "Password lama tidak sesuai";
				$this->alert_gagal($pesan);
				redirect('Admin/edit_profil');
			}
			elseif ($passwordbaru != $passwordbaru2) {
				$pesan = "Password baru tidak sama, harap input password baru dengan benar";
				$this->alert_gagal($pesan);
				redirect('Admin/edit_profil');
			}
			else{
				$password_baru3 = base64_encode($passwordbaru);

				$this->db->set('password',$password_baru3);
				$this->db->where('id_admin', $id_admin);
				$this->db->update('admin');

				$pesan = "Password berhasil di perbaharui";
				$this->alert_ok($pesan);
				redirect('Admin/edit_profil');
			}
			
		}
	}

}

public function penilaian()
{
	if ($this->session->userdata('id_event')) 
	{
		redirect('Admin/detail_event');
	}
	elseif ($this->session->userdata('id_pangkalan'))
	{
		redirect('Admin/detail_pangkalan');
	}
	else
	{
		$this->load->model('Admin_Model');

		$data['title']  = "Pengaturan Penilaian";
		$id_admin 	 	= $this->session->userdata('id_admin');
		$data['user'] 	= 'Admin';
		$data['admin'] 	= $this->Admin_Model->cek_relawan_by_idRelawan($id_admin);
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();

		$data['kinerja_tim'] = $this->Admin_Model->get_all_persentase_kinerja_tim();
		$data['nilai_individu'] = $this->Admin_Model->get_all_persentase_nilai_individu();
		$data['kinerja_relawan'] = $this->Admin_Model->get_all_persentase_kinerja_relawan();

		$data['all_indikator'] = $this->Admin_Model->get_all_indikator_penilaian();
		$data['indikator_penilaian_sejawat'] = $this->Admin_Model->get_indikator_penilaian_sejawat();
		$data['indikator_report'] = $this->Admin_Model->get_indikator_report();
		$data['indikator_survei_program'] = $this->Admin_Model->get_indikator_survei_program();
		$data['indikator_performa'] = $this->Admin_Model->get_indikator_performa();


			// print_r($data['indikator_report']); die();
		$this->load->view('template/header_dataTable', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/penilaian', $data);
		$this->load->view('template/footer_dataTable', $data);
	}
}

public function ubah_persentase_kinerja_tim()
{

	$data_kinerja_tim = $this->Admin_Model->get_all_persentase_kinerja_tim();
// print_r($data_kinerja_tim); die();
	$i=0;
	foreach ($data_kinerja_tim as $kinerja) 
	{
		$this->form_validation->set_rules($kinerja['kd_penilaian'], 'Penilaian', 'trim');

		$persentase[$i] = htmlspecialchars($this->input->post($kinerja['kd_penilaian'], true));

		$i++;
	}

	$jumlah = array_sum($persentase);
	 // echo $hasil; die();

	 // print_r($indikator); die();

	if ($this->form_validation->run() == false)
	{
		$pesan = "Gagal memerbaharui persentase penilaian, pastikan mengisi data dengan benar";
		$this->alert_gagal($pesan);
	}
	elseif ($jumlah != '100') 
	{
		$pesan = "Gagal memerbaharui persentase penilaian, pastikan jumlah total persentase kinerja tim 100%";
		$this->alert_gagal($pesan);
	}
	else
	{

		$i=0;
		foreach ($data_kinerja_tim as $idk) 
		{
			$data = ['persentase' 	=> $persentase[$i]];

			$this->db->set($data);
			$where = array('id' => $idk['id']);
			$this->db->where($where);
			$this->db->update('persentase_kriteria_penilaian');
			$i++;
		}


		$pesan = "Persentase penilaian Kinerja Tim berhasil diperbaharui";
		$this->alert_ok($pesan);
	}
	redirect('Admin/penilaian');
}


public function ubah_persentase_nilai_individu()
{
	$data_nilai_individu = $this->Admin_Model->get_all_persentase_nilai_individu();
// print_r($data_kinerja_tim); die();
	$i=0;
	foreach ($data_nilai_individu as $individu) 
	{
		$this->form_validation->set_rules($individu['kd_penilaian'], 'Penilaian', 'trim');

		$persentase[$i] = htmlspecialchars($this->input->post($individu['kd_penilaian'], true));

		$i++;
	}

	$jumlah = array_sum($persentase);
	 // echo $hasil; die();

	 // print_r($indikator); die();

	if ($this->form_validation->run() == false)
	{
		$pesan = "Gagal memerbaharui persentase penilaian, pastikan mengisi data dengan benar";
		$this->alert_gagal($pesan);
	}
	elseif ($jumlah > '100') 
	{
		$pesan = "Gagal memerbaharui persentase penilaian, pastikan jumlah total persentase nilai individu tidak melebihi 100%";
		$this->alert_gagal($pesan);
	}
	else
	{

		$i=0;
		foreach ($data_nilai_individu as $ni) 
		{
			$data = ['persentase' 	=> $persentase[$i]];

			$this->db->set($data);
			$where = array('id' => $ni['id']);
			$this->db->where($where);
			$this->db->update('persentase_kriteria_penilaian');
			$i++;
		}


		$pesan = "Persentase penilaian Nilai Individu berhasil diperbaharui";
		$this->alert_ok($pesan);
	}
	redirect('Admin/penilaian');
}


public function ubah_persentase_kinerja_relawan()
{

	$data_kinerja_relawan = $this->Admin_Model->get_all_persentase_kinerja_relawan();
// print_r($data_kinerja_tim); die();
	$i=0;
	foreach ($data_kinerja_relawan as $kinerja) 
	{
		$this->form_validation->set_rules($kinerja['kd_penilaian'], 'Penilaian', 'trim');

		$persentase[$i] = htmlspecialchars($this->input->post($kinerja['kd_penilaian'], true));

		$i++;
	}

	$jumlah = array_sum($persentase);
	 // echo $hasil; die();

	 // print_r($indikator); die();

	if ($this->form_validation->run() == false)
	{
		$pesan = "Gagal memerbaharui persentase penilaian, pastikan mengisi data dengan benar";
		$this->alert_gagal($pesan);
	}
	elseif ($jumlah != '100') 
	{
		$pesan = "Gagal memerbaharui persentase penilaian, pastikan jumlah total persentase kinerja relawan 100%";
		$this->alert_gagal($pesan);
	}
	else
	{

		$i=0;
		foreach ($data_kinerja_relawan as $idk) 
		{
			$data = ['persentase' 	=> $persentase[$i]];

			$this->db->set($data);
			$where = array('id' => $idk['id']);
			$this->db->where($where);
			$this->db->update('persentase_kriteria_penilaian');
			$i++;
		}


		$pesan = "Persentase penilaian Kinerja Relawan berhasil diperbaharui";
		$this->alert_ok($pesan);
	}
	redirect('Admin/penilaian');
}



public function aksi_kriteria_penilaian($aksi,$id_indikator)
{

	if ($aksi == 'tambah_indikator_mitra') 
	{
		$this->form_validation->set_rules('nama', 'nama', 'trim');

		$indikator = htmlspecialchars($this->input->post('nama', true)); 

		if ($this->form_validation->run() == false)
		{
			$pesan = "Gagal menambah indikator penilaian survei program, pastikan mengisi data dengan benar";
			$this->alert_gagal($pesan);
			redirect('Admin/penilaian');
		}
		else
		{	
			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$kode = substr(str_shuffle($permitted_chars), 0, 3);
			$id = date('YmdGis').$kode;

			$data = array('id_indikator' => $id,		
				'id_kriteria'  => 'mtr',
				'indikator'	 => $indikator
			);

			$this->db->insert('indikator_penilaian',$data);

			$pesan = "Indikator penilaian berhasil ditambahkan";
			$this->alert_ok($pesan);
		}

	}


	elseif ($aksi == 'tambah_indikator_laporan') 
	{
		$this->form_validation->set_rules('nama', 'nama', 'trim');

		$indikator = htmlspecialchars($this->input->post('nama', true)); 

		if ($this->form_validation->run() == false)
		{
			$pesan = "Gagal menambah indikator penilaian survei program, pastikan mengisi data dengan benar";
			$this->alert_gagal($pesan);
			redirect('Admin/penilaian');
		}
		else
		{	
			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$kode = substr(str_shuffle($permitted_chars), 0, 3);
			$id = date('YmdGis').$kode;

			$data = array('id_indikator' => $id,		
				'id_kriteria'  	=> 'dok',
				'indikator'		=> $indikator
			);

			$this->db->insert('indikator_penilaian',$data);

			$pesan = "Indikator penilaian berhasil ditambahkan";
			$this->alert_ok($pesan);
		}

	}



	elseif ($aksi == 'tambah_indikator_collaborative') 
	{
		$this->form_validation->set_rules('nama', 'nama', 'trim');

		$indikator = htmlspecialchars($this->input->post('nama', true)); 

		if ($this->form_validation->run() == false)
		{
			$pesan = "Gagal menambah indikator penilaian survei program, pastikan mengisi data dengan benar";
			$this->alert_gagal($pesan);
			redirect('Admin/penilaian');
		}
		else
		{	
			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$kode = substr(str_shuffle($permitted_chars), 0, 3);
			$id = date('YmdGis').$kode;

			$data = array('id_indikator' => $id,		
				'id_kriteria'  => 'krl',
				'indikator'	 => $indikator
			);

			$this->db->insert('indikator_penilaian',$data);

			$pesan = "Indikator penilaian berhasil ditambahkan";
			$this->alert_ok($pesan);
		}
	}



	elseif ($aksi == 'tambah_indikator_performa') 
	{
		$this->form_validation->set_rules('nama', 'nama', 'trim');

		$indikator = htmlspecialchars($this->input->post('nama', true)); 

		if ($this->form_validation->run() == false)
		{
			$pesan = "Gagal menambah indikator penilaian survei program, pastikan mengisi data dengan benar";
			$this->alert_gagal($pesan);
			redirect('Admin/penilaian');
		}
		else
		{	
			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$kode = substr(str_shuffle($permitted_chars), 0, 3);
			$id = date('YmdGis').$kode;

			$data = array('id_indikator' => $id,		
				'id_kriteria'  => 'lpr',
				'indikator'	 => $indikator
			);

			$this->db->insert('indikator_penilaian',$data);

			$pesan = "Indikator penilaian berhasil ditambahkan";
			$this->alert_ok($pesan);
		}
	}


	elseif ($aksi == 'ubah_indikator') 
	{
		$this->form_validation->set_rules('nama', 'nama', 'trim');

		$indikator = htmlspecialchars($this->input->post('nama', true)); 

		if ($this->form_validation->run() == false)
		{
			$pesan = "Gagal menambah indikator penilaian survei program, pastikan mengisi data dengan benar";
			$this->alert_gagal($pesan);
		}
		else
		{

			$data = ['indikator' 	=> $indikator];

			$this->db->set($data);
			$where = array('id_indikator' => $id_indikator);
			$this->db->where($where);
			$this->db->update('indikator_penilaian');

			$pesan = "Indikator penilaian berhasil diperbaharui";
			$this->alert_ok($pesan);
		}
	}


	elseif ($aksi == 'hapus_indikator') 
	{
		$this->db->delete('indikator_penilaian', array('id_indikator' => $id_indikator));

		$pesan = "Indikator penilaian berhasil dihapus";
		$this->alert_ok($pesan);
	}


	redirect('Admin/penilaian');
}






}

?>