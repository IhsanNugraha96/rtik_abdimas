<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pangkalan  extends CI_Controller 

{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id_pangkalan'))
		{	
			redirect('landingPage');
		}

		
		$this->load->model('Relawan_Model');
		$this->load->model('Admin_Model');
		$this->load->model('Pangkalan_Model');

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
		$data['title']   	= "Dashboard Pangkalan";
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$id_pangkalan 		= $this->session->userdata('id_pangkalan');
		$data['user'] 		= 'Pangkalan';
		$data['pangkalan']	= $this->Pangkalan_Model->cek_pangkalan_by_idPangkalan($id_pangkalan);
		$data['event'] 		= $this->Admin_Model->get_all_event();
		$data['pembimbing']	= $this->Pangkalan_Model->get_pembimbing_pangkalan_by_id_pangkalan($id_pangkalan);
		$data['anggota']	= $this->Pangkalan_Model->get_anggota_pangkalan_by_id_pangkalan($id_pangkalan);
		$data['jml_pembimbing']	= $this->Pangkalan_Model->get_jml_pembimbing_pangkalan_by_id_pangkalan($id_pangkalan);
		$data['jml_anggota']	= $this->Pangkalan_Model->get_jml_anggota_pangkalan_by_id_pangkalan($id_pangkalan);
		$data['jml_pengajuan_anggota'] = $this->Pangkalan_Model->get_jml_pengajuan_anggota_pangkalan_by_id_pangkalan($id_pangkalan);
		$data['jenis_mitra'] = $this->Pangkalan_Model->get_jenis_mitra();
		$data['jml_jenis_mitra'] = $this->Pangkalan_Model->get_jml_jenis_mitra();
		$data['jml_pelayanan'][0] = $this->Pangkalan_Model->get_jml_layanan_mitra_by_id_pangkalan($id_pangkalan,'Layanan Pengguna');
		$data['jml_pelayanan'][1] = $this->Pangkalan_Model->get_jml_layanan_mitra_by_id_pangkalan($id_pangkalan,'Layanan Informasi');
		$data['jml_pelayanan'][2] = $this->Pangkalan_Model->get_jml_layanan_mitra_by_id_pangkalan($id_pangkalan,'Layanan Perangkat');
		$data['nilai_terbesar_jml_pelayanan'] = max($data['jml_pelayanan']);
			
		$j=0;
		if ($data['jenis_mitra']) 
		{
			foreach ($data['jenis_mitra'] as $mtr) 
			{
				$data['jml_mitra'][$j] = $this->Pangkalan_Model->get_jenis_mitra_by_id_komisariat($id_pangkalan,$mtr['id_cluster']);
				$j++;
			}

		}

		$j=9;
		for ($i=0; $i < 10; $i++) 
		{ 

			$data['tahun'][$i] = date('Y')-$j;
			$j--;
		}

		$i=0;
		foreach ($data['tahun'] as $thn) 
		{
			// echo $thn; die();
			$data['jml_peserta'][$i] = $this->Pangkalan_Model->get_jml_peserta_by_id_event_id_pangkalan($thn,$id_pangkalan);
			$i++;
		}

		// variabel warna
		$data['warna1'] = array('0'=>'#6609b8', '1'=>'#1cc88a', '2'=>'#36b9cc', '3'=>'#cc5636', '4'=>'#4dcf0c', '5'=>'#f4fc08', '6'=>'#f00707', '7'=>'#05fce8', '8'=>'#8607f5', '9'=>'#b87209', 
			'10'=>'#fa05dd', '11'=>'#4e73df', '12'=>'#1cc88a', '13'=>'#36b9cc', '14'=>'#b02e0b', '15'=>'#358f09', '16'=>'#b2b807', '17'=>'#2e838f', '18'=>'#98ebe4', '19'=>'#6609b8', 
			'20'=>'#915b0a', '21'=>'#ad079a', '22'=>'#949194', '23'=>'#4c65ad', '24'=>'#436630', '25'=>'#4e73df', '26'=>'#1cc88a', '27'=>'#36b9cc', '28'=>'#b02e0b', '29'=>'#358f09', 
			'30'=>'#b2b807', '31'=>'#bd0b0b', '32'=>'#0aa397', '33'=>'#6609b8', '34'=>'#915b0a', '35'=>'#ad079a', '36'=>'#2e4382', '37'=>'#17825c', '38'=>'#2e838f', '39'=>'#a14e38', 
			'40'=>'#5c9141', '41'=>'#9a9e31', '42'=>'#156570', '43'=>'#05fce8', '44'=>'#523769', '45'=>'#784c0a', '46'=>'#75146a', '47'=>'#666466', '48'=>'#3c518c', '49'=>'#324d23', 
			'50'=>'#4e73df', '51'=>'#1cc88a', '52'=>'#36b9cc', '53'=>'#cc5636', '54'=>'#4dcf0c', '55'=>'#f4fc08', '56'=>'#f00707', '57'=>'#05fce8', '58'=>'#8607f5', '59'=>'#b87209', 
			'60'=>'#fa05dd', '61'=>'#4e73df', '62'=>'#1cc88a', '63'=>'#36b9cc', '64'=>'#b02e0b', '65'=>'#358f09', '66'=>'#b2b807', '67'=>'#2e838f', '68'=>'#98ebe4', '69'=>'#324d23', 
			'70'=>'#915b0a', '71'=>'#ad079a', '72'=>'#949194', '73'=>'#4c65ad', '74'=>'#436630', '75'=>'#4e73df', '76'=>'#1cc88a', '77'=>'#36b9cc', '78'=>'#b02e0b', '79'=>'#358f09', 
			'80'=>'#b2b807', '81'=>'#bd0b0b', '82'=>'#0aa397', '83'=>'#6609b8', '84'=>'#915b0a', '85'=>'#ad079a', '86'=>'#2e4382', '87'=>'#17825c', '88'=>'#2e838f', '89'=>'#a14e38', 
			'90'=>'#5c9141', '91'=>'#9a9e31', '92'=>'#156570', '93'=>'#05fce8', '94'=>'#523769', '95'=>'#784c0a', '96'=>'#75146a', '97'=>'#666466', '98'=>'#3c518c', '99'=>'#4e73df');

		$data['warna2'] = array('0'=>'#523769', '1'=>'#1cc88a', '2'=>'#36b9cc', '3'=>'#b02e0b', '4'=>'#358f09', '5'=>'#b2b807', '6'=>'#bd0b0b', '7'=>'#0aa397', '8'=>'#6609b8', '9'=>'#915b0a', 
			'10'=>'#ad079a', '11'=>'#2e4382', '12'=>'#17825c', '13'=>'#2e838f', '14'=>'#a14e38', '15'=>'#5c9141', '16'=>'#9a9e31', '17'=>'#156570', '18'=>'#05fce8', '19'=>'#523769', 
			'20'=>'#784c0a', '21'=>'#75146a', '22'=>'#666466', '23'=>'#3c518c', '24'=>'#324d23', '25'=>'#4e73df', '26'=>'#1cc88a', '27'=>'#36b9cc', '28'=>'#cc5636', '29'=>'#4dcf0c', 
			'30'=>'#f4fc08', '31'=>'#f00707', '32'=>'#05fce8', '33'=>'#8607f5', '34'=>'#b87209', '35'=>'#fa05dd', '36'=>'#4e73df', '37'=>'#1cc88a', '38'=>'#36b9cc', '39'=>'#b02e0b', 
			'40'=>'#358f09', '41'=>'#b2b807', '42'=>'#2e838f', '43'=>'#98ebe4', '44'=>'#6609b8', '45'=>'#915b0a', '46'=>'#ad079a', '47'=>'#949194', '48'=>'#4c65ad', '49'=>'#436630', 
			'50'=>'#4e73df', '51'=>'#1cc88a', '52'=>'#36b9cc', '53'=>'#b02e0b', '54'=>'#358f09', '55'=>'#b2b807', '56'=>'#bd0b0b', '57'=>'#0aa397', '58'=>'#6609b8', '59'=>'#915b0a', 
			'60'=>'#ad079a', '61'=>'#2e4382', '62'=>'#17825c', '63'=>'#2e838f', '64'=>'#a14e38', '65'=>'#5c9141', '66'=>'#9a9e31', '67'=>'#156570', '68'=>'#05fce8', '69'=>'#436630', 
			'70'=>'#784c0a', '71'=>'#75146a', '72'=>'#666466', '73'=>'#3c518c', '74'=>'#324d23', '75'=>'#4e73df', '76'=>'#1cc88a', '77'=>'#36b9cc', '78'=>'#cc5636', '79'=>'#4dcf0c', 
			'80'=>'#f4fc08', '81'=>'#f00707', '82'=>'#05fce8', '83'=>'#8607f5', '34'=>'#b87209', '35'=>'#fa05dd', '36'=>'#4e73df', '87'=>'#1cc88a', '88'=>'#36b9cc', '89'=>'#b02e0b', 
			'90'=>'#358f09', '91'=>'#b2b807', '92'=>'#2e838f', '93'=>'#98ebe4', '94'=>'#6609b8', '95'=>'#915b0a', '96'=>'#ad079a', '97'=>'#949194', '98'=>'#4c65ad', '99'=>'#4e73df');
		// akhir_variabel warna	
		// echo $data['jml_pelayanan'][0]; die();
		// print_r($data['jml_pelayanan']); die();

		$this->load->view('template/header', $data);
		$this->load->view('pangkalan/sidebar', $data);
		$this->load->view('pangkalan/topbar', $data);
		$this->load->view('pangkalan/dashboard', $data);
		$this->load->view('template/footer', $data);
		$this->load->view('chart/chart_dashboard_pangkalan', $data);
	}

	public function pembimbing()
	{
		$data['title']   	= "Pembimbing Pangkalan";
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$id_pangkalan 		= $this->session->userdata('id_pangkalan');
		$data['user'] 		= 'Pangkalan';
		$data['pangkalan']	= $this->Pangkalan_Model->cek_pangkalan_by_idPangkalan($id_pangkalan);
		$data['event'] 		= $this->Admin_Model->get_all_event();
		$data['pembimbing']	= $this->Pangkalan_Model->get_pembimbing_pangkalan_by_id_pangkalan($id_pangkalan);
		$data['jml_pembimbing']	= $this->Pangkalan_Model->get_jml_pembimbing_pangkalan_by_id_pangkalan($id_pangkalan);
		$data['jml_pengajuan_anggota'] = $this->Pangkalan_Model->get_jml_pengajuan_anggota_pangkalan_by_id_pangkalan($id_pangkalan);

		$i=0;
		foreach ($data['pembimbing'] as $pembimbing) 
		{
			$data['alamat_pembimbing'][$i] = $this->Pangkalan_Model->get_alamat_by_id_kota($pembimbing['id_kota']);
			$i++;
		}

		// print_r($data['pembimbing']); die();

		$this->load->view('template/header_dataTable', $data);
		$this->load->view('pangkalan/sidebar', $data);
		$this->load->view('pangkalan/topbar', $data);
		$this->load->view('pangkalan/pembimbing', $data);
		$this->load->view('template/footer_dataTable', $data);
	}

	public function tambah_pembimbing()
	{

		$id_pangkalan 		= $this->session->userdata('id_pangkalan');
		$this->form_validation->set_rules('email', 'Email', 'trim|is_unique[pembimbing.email]');
		$this->form_validation->set_rules('nik', 'nik', 'trim|is_unique[pembimbing.nik]');
		$this->form_validation->set_rules('nama', 'Nama', 'trim');
		$this->form_validation->set_rules('kota', 'Kota', 'trim');
		$this->form_validation->set_rules('provinsi', 'provinsi', 'trim');


		$email = htmlspecialchars($this->input->post('email', true)); 
		$nama = htmlspecialchars($this->input->post('nama', true)); 
		$kota = htmlspecialchars($this->input->post('kota', true)); 
		$nik = htmlspecialchars($this->input->post('nik', true)); 

		if ($this->form_validation->run() == false)
		{
			$pesan = "Gagal menambah pembimbing, pastikan nik dan email belum digunakan oleh pembimbing lain";
			$this->alert_gagal($pesan);
			redirect('pangkalan/pembimbing');
		}
		else
		{	
			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$kode = substr(str_shuffle($permitted_chars), 0, 2);
			$password = substr(str_shuffle($permitted_chars), 0, 8);
			$id = date('YmdGis').$kode;

			$data = array(
				'id_pembimbing' => $id,
				'email'			=> $email,
				'id_komisariat'	=> $id_pangkalan,
				'nik'			=> $nik,
				'nama'			=> $nama,
				'tgl_lahir'		=> '',
				'jenis_kelamin'	=> '-',
				'alamat_rumah'	=> '-',
				'kecamatan'		=> '-',
				'id_kota'		=> $kota,
				'no_telp'		=> '-',
				'sektor_pekerjaan'	=> '-',
				'jabatan'		=> '-',
				'image'			=> 'default_image.jpg',
				'password'		=> base64_encode($password),
				'role_id'		=> '1'
				
			);

			$this->db->insert('pembimbing',$data);

			$this->_sendEmail($email,$password,'tambah_pembimbing');

			$pesan = "Pembimbing sudah berhasil ditambahkan, Pembimbing akan menerima pemberitahuan akun melalui email";
			$this->alert_ok($pesan);
			redirect('pangkalan/pembimbing');
		}
	}

	public function hapuspembimbing($id_pembimbing)
	{
		$data_pembimbing	= $this->Pangkalan_Model->get_pembimbing_pangkalan_by_id_pembimbing($id_pembimbing);
		// print_r($data_pembimbing); die();
		if ($data_pembimbing['image'] != 'default_image.jpg') 
		{
			unlink(FCPATH . 'assets/img/pembimbing/' . $data_pembimbing['image']);			
		}
		
		$data = ['id_pembimbing' 	=> 'dummy'];

		$this->db->set($data);
		$where = array('id_pembimbing' => $data_pembimbing['id_pembimbing']);
		$this->db->where($where);
		$this->db->update('tim');

		$pesan = "Akun pembimbing telah berhasil di hapus";
		$this->alert_ok($pesan);
		redirect('pangkalan/pembimbing');
	}

	public function reset_password_pembimbing($id_pembimbing)
	{
		$data_pembimbing	= $this->Pangkalan_Model->get_pembimbing_pangkalan_by_id_pembimbing($id_pembimbing);
		$email = $data_pembimbing['email'];
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$password = substr(str_shuffle($permitted_chars), 0, 8);
		$data = ['password' 	=> $password];

		$this->db->set($data);
		$where = array('id_pembimbing' => $data_pembimbing['id_pembimbing']);
		$this->db->where($where);
		$this->db->update('pembimbing');

		$this->_sendEmail($email,$password,'reset_password_pembimbing');

		$pesan = "Password Pembimbing sudah berhasil di reset, Pembimbing akan menerima pemberitahuan akun melalui email";
		$this->alert_ok($pesan);
		redirect('pangkalan/pembimbing');


	}

	public function anggota()
	{
		$data['title']   	= "Anggota";
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$id_pangkalan 		= $this->session->userdata('id_pangkalan');
		$data['user'] 		= 'Pangkalan';
		$data['pangkalan']	= $this->Pangkalan_Model->cek_pangkalan_by_idPangkalan($id_pangkalan);
		$data['event'] 		= $this->Admin_Model->get_all_event();
		$data['anggota']	= $this->Pangkalan_Model->get_anggota_pangkalan_by_id_pangkalan($id_pangkalan);
		$data['jml_anggota']= $this->Pangkalan_Model->get_jml_anggota_pangkalan_by_id_pangkalan($id_pangkalan);
		$data['jml_pengajuan_anggota'] = $this->Pangkalan_Model->get_jml_pengajuan_anggota_pangkalan_by_id_pangkalan($id_pangkalan);

		$i=0;
		foreach ($data['anggota'] as $anggota) 
		{
			$data['alamat_anggota'][$i] = $this->Pangkalan_Model->get_alamat_by_id_kota($anggota['kota']);
			$data['keahlian_anggota'][$i] = $this->Pangkalan_Model->get_keahlian_anggota_by_id_anggota($anggota['id_relawan']);
			$data['jml_ikut_event'][$i] = $this->Pangkalan_Model->get_jml_event_anggota_by_id_anggota($anggota['id_relawan']);
			$i++;
		}

		// print_r($data['jml_ikut_event']); die();

		$this->load->view('template/header_dataTable', $data);
		$this->load->view('pangkalan/sidebar', $data);
		$this->load->view('pangkalan/topbar', $data);
		$this->load->view('pangkalan/anggota', $data);
		$this->load->view('template/footer_dataTable', $data);
	}

	public function pengajuan_anggota()
	{

		$data['title']   	= "Pengajuan Anggota";
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$id_pangkalan 		= $this->session->userdata('id_pangkalan');
		$data['user'] 		= 'Pangkalan';
		$data['pangkalan']	= $this->Pangkalan_Model->cek_pangkalan_by_idPangkalan($id_pangkalan);
		$data['jml_pengajuan_anggota'] = $this->Pangkalan_Model->get_jml_pengajuan_anggota_pangkalan_by_id_pangkalan($id_pangkalan);
		$data['pengajuan_anggota'] =  $this->Pangkalan_Model->get_data_pengajuan_anggota_pangkalan_by_id_pangkalan($id_pangkalan);
		$i=0;
		foreach ($data['pengajuan_anggota'] as $anggota) 
		{
			$data['alamat_anggota'][$i] = $this->Pangkalan_Model->get_alamat_by_id_kota($anggota['kota']);
			$data['keahlian_anggota'][$i] = $this->Pangkalan_Model->get_keahlian_anggota_by_id_anggota($anggota['id_relawan']);
			
			$i++;
		}// print_r($data['jml_ikut_event']); die();

		$this->load->view('template/header_dataTable', $data);
		$this->load->view('relawan/sidebar2', $data);
		$this->load->view('pangkalan/topbar', $data);
		$this->load->view('pangkalan/pengajuan_anggota', $data);
		$this->load->view('template/footer_dataTable', $data);
	}

	public function reset_password_anggota($id_anggota)
	{
		$data_anggota	= $this->Pangkalan_Model->get_anggota_pangkalan_by_id_relawan(urldecode($id_anggota));
		$email = $data_anggota['email'];
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$password = substr(str_shuffle($permitted_chars), 0, 8);
		$data = ['password' 	=> $password];

		$this->db->set($data);
		$where = array('id_relawan' => $data_anggota['id_relawan']);
		$this->db->where($where);
		$this->db->update('relawan');

		$this->_sendEmail($email,$password,'reset_password_relawan');

		$pesan = "Password akun anggota Relawan sudah berhasil di reset, Anggota relawan akan menerima pemberitahuan akun melalui email";
		$this->alert_ok($pesan);
		redirect('pangkalan/anggota');


	}

	public function hapusanggota($id_anggota)
	{
		$data_anggota	= $this->Pangkalan_Model->get_anggota_pangkalan_by_id_relawan(urldecode($id_anggota));
		$email = $data_anggota['email'];
		$password = $data_anggota['password'];
		// echo $password; die();

		if ($data_anggota['image'] != 'default_image.jpg') 
		{
			unlink(FCPATH . 'assets/img/relawan/image/' . $data_anggota['image']);
		}
		
		if ($data_anggota['image'] != 'default_id_card.jpg') 
		{
			unlink(FCPATH . 'assets/img/relawan/id_card/' . $data_anggota['id_card']);
		}

		$this->db->delete('relawan', array('id_relawan' => $data_anggota['id_relawan']));

		$data = ['id_relawan' 	=> 'dummy'];

		$this->db->set($data);
		$where = array('id_relawan' => $data_anggota['id_relawan']);
		$this->db->where($where);
		$this->db->update('anggota_tim');		

		$this->_sendEmail($email,$password,'hapus_anggota');

		$pesan = "Akun anggota telah berhasil di hapus";
		$this->alert_ok($pesan);
		redirect('pangkalan/anggota');
	}


	public function aksi_pengajuan_anggota($aksi,$id_relawan)
	{	
		$data_anggota	= $this->Pangkalan_Model->get_anggota_pangkalan_by_id_relawan(urldecode($id_relawan));
		$email = $data_anggota['email'];
		$password = base64_decode($data_anggota['password']);
		// echo $password; die();
		if ($aksi == 'tolak') 
		{
			if ($data_anggota['image'] != 'default_image.jpg') 
			{
				unlink(FCPATH . 'assets/img/relawan/image/' . $data_anggota['image']);
			}
			
			if ($data_anggota['id_card'] != 'default_id_card.jpg') 
			{
				unlink(FCPATH . 'assets/img/relawan/id_card/' . $data_anggota['id_card']);
			}
			
			$this->db->delete('relawan', array('id_relawan' => $data_anggota['id_relawan']));			
			
			$this->_sendEmail($email,$password,'tolak_anggota');

			$pesan = "Pengajuan anggota telah berhasil di hapus";
			$this->alert_ok($pesan);
			redirect('pangkalan/anggota');
		}

		elseif ($aksi == 'acc') 
		{
			$data = ['is_active' 	=> '3'];

			$this->db->set($data);
			$where = array('id_relawan' => $data_anggota['id_relawan']);
			$this->db->where($where);
			$this->db->update('relawan');

			$this->_sendEmail($email,$password,'acc_anggota');
			
			

			$pesan = "Pengajuan akun telah di setujui";
			$this->alert_ok($pesan);
			redirect('pangkalan/anggota');
		}
		
	}

	private function _sendEmail($email, $password, $aksi)
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

		if ($aksi == 'tambah_pembimbing') 
		{
			$this->email->subject('Akun Pembimbing RTIK Abdi Masyarakat');
			$this->email->message('Hai <b>'.$email.'</b><br>Anda telah ditambahkan menjadi pembimbing pada salah satu pangkalan. <br>Segera login pada aplikasi RTIKAbdimas sebagai pembimbing dengan email <b>"'.$email.'"</b> serta password <b>"'.$password.'"</b>. <br>Klik pada link berikut untuk mengunjungi aplikasi : <a href="'. base_url().'">Kunjungi Aplikasi.</a>');
		}
		elseif ($aksi == 'reset_password_pembimbing') 
		{
			$this->email->subject('Akun Pembimbing RTIK Abdi Masyarakat');
			$this->email->message('Hai <b>'.$email.'</b><br>Password akun pembimbing Anda telah di reset. <br>Segera login pada aplikasi RTIKAbdimas sebagai pembimbing dengan email <b>"'.$email.'"</b> serta password <b>"'.$password.'"</b>.<br> Klik pada link berikut untuk mengunjungi aplikasi : <a href="'. base_url().'">Kunjungi Aplikasi.</a>');
		}
		elseif ($aksi == 'acc_anggota') 
		{
			$this->email->subject('Akun Relawan RTIK Abdi Masyarakat');
			$this->email->message('Hai <b>'.$email.'</b><br>Akun anda telah di konfirmasi pangkalan. <br>Segera login pada aplikasi RTIKAbdimas sebagai Relawan dengan email <b>"'.$email.'"</b> serta password <b>"'.$password.'"</b>. <br>Klik pada link berikut untuk mengunjungi aplikasi : <a href="'. base_url().'">Kunjungi Aplikasi.</a>');
		}
		elseif ($aksi == 'tolak_anggota') 
		{
			$this->email->subject('Akun Relawan RTIK Abdi Masyarakat');
			$this->email->message('Hai <b>'.$email.'</b><br>Mohon maaf, akun relawan anda kami hapus. karena pengajuan akun relawan yang telah di ajukan ditolak pangkalan.<br>Klik pada link berikut untuk mengunjungi aplikasi : <a href="'. base_url().'">Kunjungi Aplikasi.</a>');
		}
		elseif ($aksi == 'hapus_anggota') 
		{
			$this->email->subject('Akun Relawan RTIK Abdi Masyarakat');
			$this->email->message('Hai <b>'.$email.'</b><br>Mohon maaf, akun relawan anda tidak lagi terdaftar. <br>Klik pada link berikut untuk mengunjungi aplikasi : <a href="'. base_url().'">Kunjungi Aplikasi.</a>');
		}
		elseif ($aksi == 'reset_password_relawan') 
		{
			$this->email->subject('Akun Relawan RTIK Abdi Masyarakat');
			$this->email->message('Hai <b>'.$email.'</b><br>Password akun relawan Anda telah di reset. <br>Segera login pada aplikasi RTIKAbdimas sebagai relawan dengan email <b>"'.$email.'"</b> serta password <b>"'.$password.'"</b>.<br> Klik pada link berikut untuk mengunjungi aplikasi : <a href="'. base_url().'">Kunjungi Aplikasi.</a>');
		}
		


		if ($this->email->send()){
			return true;
		} else {
			echo "gagal kirim email"."<br>";
			echo $this->email->print_debugger();

			die();
		}
	}


	public function profil()
	{
		$data['title']   	= "Profil";
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$id_pangkalan 		= $this->session->userdata('id_pangkalan');
		$data['user'] 		= 'Pangkalan';
		$data['pangkalan']	= $this->Pangkalan_Model->cek_pangkalan_by_idPangkalan($id_pangkalan);
		
		// print_r($data['jml_ikut_event']); die();

		$this->load->view('template/header', $data);
		$this->load->view('pangkalan/sidebar', $data);
		$this->load->view('pangkalan/topbar', $data);
		$this->load->view('pangkalan/profil', $data);
		$this->load->view('template/footer', $data);
	}

	public function edit_profil()
	{
		$data['title']   	= "Edit Profil Pangkalan";
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$id_pangkalan 		= $this->session->userdata('id_pangkalan');
		$data['user'] 		= 'Pangkalan';
		$data['pangkalan']	= $this->Pangkalan_Model->cek_pangkalan_by_idPangkalan2($id_pangkalan);
		$data['distrik'] = $this->Pangkalan_Model->get_distrik($data['pangkalan']['id_provinsi']);
		$data['provinsi'] = $this->Pangkalan_Model->get_provinsi();
		
		// print_r($data['foto_ketua']); die();

		$this->load->view('template/header', $data);
		$this->load->view('pangkalan/sidebar', $data);
		$this->load->view('pangkalan/topbar', $data);
		$this->load->view('pangkalan/edit_profil', $data);
		$this->load->view('template/footer', $data);
	}

	public function update_data($aksi,$id_pangkalan)
	{
		
		$data_pangkalan = $this->Pangkalan_Model->cek_pangkalan_by_idPangkalan2($id_pangkalan);
		
		if ($aksi == 'akun') 
		{
			
			$this->form_validation->set_rules('email', 'Email', 'trim');
			
			$email = htmlspecialchars($this->input->post('email', true));  
			$cek_email = $this->Pangkalan_Model->cek_email($email);
			
			if ($this->form_validation->run() == false)
			{
				$pesan = "Akun gagal di perbaharui, harap mengisi data dengan benar";
				$this->alert_gagal($pesan);
				redirect('pangkalan/edit_profil');

			}
			else
			{	 
				
				$upload_image = $_FILES['foto'] ['name'];

				if($upload_image)
				{
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size']     = '2048';
					$config['upload_path'] = './assets/img/komisariat/';


					$this->load->library('upload', $config);

					if($this->upload->do_upload('foto'))
					{
						$old_image = $data_pangkalan['logo'];
						if($old_image != 'default_logo.png')
						{
							unlink(FCPATH . 'assets/img/komisariat/' . $old_image);

						}

						$new_image = $this->upload->data('file_name');
						$this->db->set('logo', $new_image);
					}
					else if ($_FILES['foto']['size'] >= '2048') 
					{
						$pesan = "Ukuran dokumen yang diunggah melebihi batas (2MB), dokumen gagal di upload";
						$this->alert_gagal($pesan);
						redirect('pangkalan/edit_profil');
					}
				
					$where = array('id_komisariat' => $id_pangkalan );
					$this->db->where($where);
					$this->db->update('komisariat');

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
						$this->db->where('id_komisariat', $id_pangkalan);
						$this->db->update('komisariat');

						$pesan = "Akun anda sudah berhasil diperbaharui";
						$this->alert_ok($pesan);
					}
					else
					{
						$pesan = "Alamat email sudah digunakan";
						$this->alert_gagal($pesan);
					}	
						
				}

				redirect('pangkalan/edit_profil');
			}
		}


		elseif ($aksi == 'hapus_foto') 
		{
			$old_image = $data_pangkalan['logo'];

			if ($old_image != 'default_logo.png') 
			{
				unlink(FCPATH . 'assets/img/komisariat/' . $old_image);
			}
			

			$this->db->set('logo', 'default_logo.png');
			$where = array('id_komisariat' => $data_pangkalan['id_komisariat'] );
			$this->db->where($where);
			$this->db->update('komisariat');

			$pesan = "Foto Profil berhasil di hapus";
			$this->alert_ok($pesan);
			redirect('pangkalan/edit_profil');
		}


		elseif ($aksi == 'biodata') 
		{
			$this->form_validation->set_rules('nama', 'Nama', 'trim');
			$this->form_validation->set_rules('kontak', 'kontak', 'trim');
			$this->form_validation->set_rules('srt_komitmen', 'surat komitmen', 'trim');
			$this->form_validation->set_rules('srt_tugas', 'surat tugas', 'trim');
			$this->form_validation->set_rules('kota', 'kota', 'trim');
			$this->form_validation->set_rules('provinsi', 'provinsi', 'trim');



			$nama = htmlspecialchars($this->input->post('nama', true));   
			$kontak = htmlspecialchars($this->input->post('kontak', true));    
			$srt_komitmen = htmlspecialchars($this->input->post('srt_komitmen', true));    
			$srt_tugas = htmlspecialchars($this->input->post('srt_tugas', true));    
			$kota = htmlspecialchars($this->input->post('kota', true));    
			$provinsi = htmlspecialchars($this->input->post('provinsi', true)); 


			if ($this->form_validation->run() == false)
			{
				$pesan = "Biodata gagal di perbaharui, harap mengisi data dengan benar";
				$this->alert_gagal($pesan);
				redirect('pangkalan/edit_profil/#bio');

			}
			else
			{
				$data2 = [
					'nama_komisariat'=> $nama,
					'kontak'		=> $kontak,
					'surat_komitmen'	=> $srt_komitmen,
					'surat_tugas'		=> $srt_tugas,
					'id_kota'		=> $kota
				];

				// print_r($data2); die();
				$this->db->set($data2);
				$where = array('id_komisariat' => $id_pangkalan );
				$this->db->where($where);
				$this->db->update('komisariat');

				$pesan = "Biodata telah di perbaharui";
				$this->alert_ok($pesan);
				redirect('pangkalan/edit_profil/#bio');
			}	 
		}


		if ($aksi == 'ketua') 
		{
			
			$this->form_validation->set_rules('ketua', 'Ketua', 'trim');
			
			$ketua = htmlspecialchars($this->input->post('ketua', true));  
			
			if ($this->form_validation->run() == false)
			{
				$pesan = "Akun gagal di perbaharui, harap mengisi data dengan benar";
				$this->alert_gagal($pesan);
				redirect('pangkalan/edit_profil/#ketua');

			}
			else
			{	 
				$image = $_FILES['foto_ketua']['name'];	

				if($image)
				{

					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size']      = '2048';
					$config['upload_path']   = './assets/img/komisariat/ketua';

					

					$this->load->library('upload',$config);
					if ($this->upload->do_upload('foto_ketua')) 
					{
						
						$old_image = $data_pangkalan['foto_ketua'];
						if($old_image != 'default_image.jpg')
						{
							unlink(FCPATH . 'assets/img/komisariat/ketua/' . $old_image);

						}

						$new_image = $this->upload->data('file_name');
						$this->db->set('foto_ketua', $new_image);

					}

					else if ($_FILES['foto_ketua']['size'] >= '2048') 
					{
						$pesan = "Ukuran dokumen yang diunggah melebihi batas (2MB), dokumen gagal di upload";
						$this->alert_gagal($pesan);
						redirect('pangkalan/edit_profil/#ketua');
					}
					
					$where = array('id_komisariat' => $id_pangkalan );
					$this->db->where($where);
					$this->db->update('komisariat');

					$pesan = "Image sudah berhasil diperbaharui";
					$this->alert_ok($pesan);					
				}

				// jika tidak ada image yang di upload
				else
				{

					$data = [
						'ketua' 	=> $ketua
					];

					$this->db->set($data);
					$this->db->where('id_komisariat', $id_pangkalan);
					$this->db->update('komisariat');

					$pesan = "Nama ketua berhasil diperbaharui";
					$this->alert_ok($pesan);	
				}

				redirect('pangkalan/edit_profil');
			}
		}

		elseif ($aksi == 'hapus_foto_ketua') 
		{
			$old_image = $data_pangkalan['foto_ketua'];

			if ($old_image != 'default_image.jpg') 
			{
				unlink(FCPATH . 'assets/img/komisariat/ketua/' . $old_image);
			}
			

			$this->db->set('foto_ketua', 'default_image.jpg');
			$where = array('id_komisariat' => $data_pangkalan['id_komisariat'] );
			$this->db->where($where);
			$this->db->update('komisariat');

			$pesan = "Foto ketua pangkalan berhasil di hapus";
			$this->alert_ok($pesan);
			redirect('pangkalan/edit_profil');
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
				redirect('pangkalan/edit_profil');

			}
			else
			{	
				if ($passwordlama != base64_decode($data_pangkalan['password'])) {
					$pesan = "Password lama tidak sesuai";
					$this->alert_gagal($pesan);
					redirect('pangkalan/edit_profil');
				}
				elseif ($passwordbaru != $passwordbaru2) {
					$pesan = "Password baru tidak sama, harap input password baru dengan benar";
					$this->alert_gagal($pesan);
					redirect('pangkalan/edit_profil');
				}
				else{
					$password_baru3 = base64_encode($passwordbaru);

					$this->db->set('password',$password_baru3);
					$this->db->where('id_komisariat', $id_pangkalan);
					$this->db->update('komisariat');

					$pesan = "Password berhasil di perbaharui";
					$this->alert_ok($pesan);
					redirect('Pangkalan/edit_profil');
				}
				
			}
		}


	}

	public function get_kota()
	{
		$this->load->model('Authentikasi');
		$id_provinsi_terpilih = $_POST['id_provinsi'];
		$data_distrik = $this->Authentikasi->get_distrik($id_provinsi_terpilih);

		$id_pangkalan 	 = $this->session->userdata('id_pangkalan');
		$data['user'] 	 = 'Pangkalan';
		$data['pangkalan'] = $this->Pangkalan_Model->cek_pangkalan_by_idPangkalan2($id_pangkalan);


		echo "<option value=''>--Pilih Kabupaten/Kota--</option>";

		foreach ($data_distrik as $key => $distrik) 
		{                        
			echo "<option value='".$distrik['id_kota']."' id_kota='".$distrik['id_kota']."' type='".$distrik['type']."' nama_kota='".$distrik['nama_kota']."' id_provinsi='".$distrik['id_provinsi']."' ";
			if ($data['pangkalan']['id_kota'] == $distrik['id_kota']) {
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

		$id_pangkalan 	 = $this->session->userdata('id_pangkalan');
		$data['user'] 	 = 'Pangkalan';
		$data['pangkalan'] = $this->Pangkalan_Model->cek_pangkalan_by_idPangkalan2($id_pangkalan);
		
		echo "<option value=''>--Pilih provinsi--</option>";

		foreach ($data_provinsi as $key => $provinsi) 
		{                        
			echo "<option value='".$provinsi['id_provinsi']."' id_provinsi='".$provinsi['id_provinsi']."' ";
			if ($data['pangkalan']['id_provinsi'] == $provinsi['id_provinsi']) {
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


	public function event()
	{
		$data['title']   	= "Event";
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$id_pangkalan 		= $this->session->userdata('id_pangkalan');
		$data['user'] 		= 'Pangkalan';
		$data['pangkalan']	= $this->Pangkalan_Model->cek_pangkalan_by_idPangkalan2($id_pangkalan);
		$data['event']		= $this->Pangkalan_Model->get_event_by_idPangkalan($id_pangkalan);
		
		

		$i=0;
		if ($data['event']) 
		{
			foreach ($data['event'] as $ev) 
			{
				$data['pembimbing'][$i] = $this->Pangkalan_Model->get_data_pembimbing_by_id_event_id_pangkalan($id_pangkalan,$ev['id_event']);
				$data['jml_pembimbing'][$i] = $this->Pangkalan_Model->get_jml_pembimbing_by_id_event_id_pangkalan($id_pangkalan,$ev['id_event']);
				$data['tim'][$i]		= $this->Pangkalan_Model->get_data_tim_relawan_by_idPangkalan($id_pangkalan,$ev['id_event']);
				$data['jml_tim'][$i]	= $this->Pangkalan_Model->get_jml_tim_relawan_by_idPangkalan($id_pangkalan,$ev['id_event']);
				$data['jml_relawan'][$i]	= $this->Pangkalan_Model->get_jml_relawan_by_idPangkalan($id_pangkalan,$ev['id_event']);
				
				$j=0;
				if ($data['tim'][$i]) 
				{
					foreach ($data['tim'][$i] as $tim) 
					{
						$data['mitra'][$j] = $this->Pangkalan_Model->get_mitra_by_id_tim($tim['id_tim']);
						$j++;
					}

				}


				$i++;
			}

		}

		$this->load->view('template/header_dataTable', $data);
		$this->load->view('pangkalan/sidebar', $data);
		$this->load->view('pangkalan/topbar', $data);
		$this->load->view('pangkalan/event', $data);
		$this->load->view('template/footer_dataTable', $data);
	}

	public function detail_event($id_event)
	{
		$data['title']   	= "Detail Event Pangkalan";
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$id_pangkalan 		= $this->session->userdata('id_pangkalan');
		$data['user'] 		= 'Pangkalan';
		$data['pangkalan']	= $this->Pangkalan_Model->cek_pangkalan_by_idPangkalan2($id_pangkalan);
		
		$data['pembimbing'] = $this->Pangkalan_Model->get_data_pembimbing_by_id_event_id_pangkalan($id_pangkalan,$id_event);
		$data['jml_pembimbing']= $this->Pangkalan_Model->get_jml_pembimbing_by_id_event_id_pangkalan($id_pangkalan,$id_event);
		$data['tim']		= $this->Pangkalan_Model->get_data_tim_relawan_by_idPangkalan($id_pangkalan,$id_event);
		$data['jml_tim']	= $this->Pangkalan_Model->get_jml_tim_relawan_by_idPangkalan($id_pangkalan,$id_event);
		$data['jml_relawan']= $this->Pangkalan_Model->get_jml_relawan_by_idPangkalan($id_pangkalan,$id_event);

		$j=0;
		if ($data['tim']) 
		{
			foreach ($data['tim'] as $tim) 
			{
				$data['mitra'][$j] = $this->Pangkalan_Model->get_mitra_by_id_tim($tim['id_tim']);
				$data['anggota_tim'][$j] = $this->Pangkalan_Model->get_anggota_tim_by_id_tim($tim['id_tim']);
				$data['ketua_tim'][$j] = $this->Pangkalan_Model->get_ketua_tim_by_id_tim($tim['id_tim']);
			
				$j++;
			}
		}


		// print_r($data['ketua_tim']); die();

		$this->load->view('template/header_dataTable', $data);
		$this->load->view('relawan/sidebar2', $data);
		$this->load->view('pangkalan/topbar', $data);
		$this->load->view('pangkalan/detail_event', $data);
		$this->load->view('template/footer_dataTable', $data);
	}

	public function detail_pembimbing_event($id_event)
	{
		$data['title']   	= "Detail Event Pangkalan";
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$id_pangkalan 		= $this->session->userdata('id_pangkalan');
		$data['user'] 		= 'Pangkalan';
		$data['pangkalan']	= $this->Pangkalan_Model->cek_pangkalan_by_idPangkalan2($id_pangkalan);
		
		$data['pembimbing'] = $this->Pangkalan_Model->get_data_pembimbing_by_id_event_id_pangkalan($id_pangkalan,$id_event);
		$data['jml_pembimbing']= $this->Pangkalan_Model->get_jml_pembimbing_by_id_event_id_pangkalan($id_pangkalan,$id_event);
		
		$i=0;
		foreach ($data['pembimbing'] as $pmb) 
		{
			$data['jml_tim'][$i] = $this->Pangkalan_Model->get_jml_tim_pembimbing_by_id_pembimbing($pmb['id_pembimbing'],$id_event);

			$i++;
		}

		// die();

		// print_r($data['jml_tim']); die();

		$this->load->view('template/header_dataTable', $data);
		$this->load->view('relawan/sidebar2', $data);
		$this->load->view('pangkalan/topbar', $data);
		$this->load->view('pangkalan/detail_pembimbing', $data);
		$this->load->view('template/footer_dataTable', $data);
	}

	public function sertifikat($id_event)
	{
		$id_pangkalan 		= $this->session->userdata('id_pangkalan');
		$data['user'] 		= 'Pangkalan';
		$data['pangkalan']	= $this->Pangkalan_Model->cek_pangkalan_by_idPangkalan2($id_pangkalan);
		$data['event']		= $this->Pangkalan_Model->get_Event_by_id_event($id_event);
		
		$data['template_sertifikat'] 	= $this->Relawan_Model->get_template_sertifikat_by_id_event($id_event);
		$data['jumlah_peserta']			= $this->Pangkalan_Model->get_jumlah_peserta_by_id_event($id_event,$id_pangkalan);
		$data['jumlah_pembimbing']		= $this->Pangkalan_Model->get_jumlah_pembimbing_by_id_event($id_event,$id_pangkalan);
		// print_r($data['jumlah_peserta']); die();

		$this->load->view('sertifikat/pangkalan', $data);
		
	}


}