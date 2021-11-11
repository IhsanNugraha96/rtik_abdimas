<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingPage  extends CI_Controller 

{
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('id_relawan'))
		{	
			redirect('Relawan');
		}
		else if($this->session->userdata('id_admin'))
		{	
			redirect('Admin');
		}
		else if($this->session->userdata('id_instruktur'))
		{	
			redirect('Instruktur');
		}
		else if($this->session->userdata('id_pangkalan'))
		{	
			redirect('Pangkalan');
		}
		else if($this->session->userdata('id_pembimbing'))
		{	
			redirect('Pembimbing');
		}
		else if($this->session->userdata('id_mitra'))
		{	
			redirect('Mitra');
		}

		$this->load->model('Relawan_Model');
		$this->load->model('Admin_Model');
		$this->load->model('LandPage_Model');

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
		$data['title'] 		= "Relawan TIK Abdimas";
		$data['jml_event'] 	= $this->LandPage_Model->get_jml_event();
		$data['partner'] 	= $this->LandPage_Model->get_logo_mitra();
		$data['jml_pangkalan'] 	= $this->LandPage_Model->get_jml_komisariat();
		$data['jml_instruktur'] = $this->LandPage_Model->get_jml_instruktur();
		$data['jml_pembimbing'] = $this->LandPage_Model->get_jml_pembimbing();
		$data['jml_mitra'] 	= $this->LandPage_Model->get_jml_mitra();
		$data['jml_relawan']= $this->LandPage_Model->get_jml_relawan();
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['jml_materi'] = $this->LandPage_Model->get_jml_materi();
		$data['event']		= $this->LandPage_Model->get_all_event();
		$data['artikel'] 	= $this->LandPage_Model->get_artikel_kegiatan();

		// $i=0;
		// foreach ($data['artikel'] as $art) 
		// {
		// 	$tahun[$i] = substr($art['date_created'], 0, 4);
		// 	$i++;
		// }

		// $data['tahun'] = array_unique($tahun);
		if ($data['jml_event'] < 10) 
		{
			$i=0;
			if ($data['event']) 
			{
				foreach ($data['event'] as $ev) 
				{
					$data['tahun'][$i] = substr($ev['date_created'], 0, 4);
					$i++;
				}
			}	
			else
			{
				$data['tahun'] = array('0' => date('Y'), );
			}		
		}
		else if($data['jml_event'] > 10)
		{

			$j=8;
			for ($i=0; $i < 9; $i++) 
			{ 
				
				$data['tahun'][$i] = date('Y')-$j;
				$j--;
			}
		}
		else if (!$data['jml_event']) 
		{
			$data['tahun'] = array('0' => date('Y'), );
		}
		
		// print_r ($data['artikel']); die();

		$this->load->view('landPage/header', $data);
		$this->load->view('landPage/navbar', $data);
		$this->load->view('landPage/index', $data);
		$this->load->view('landPage/footer', $data);
	}

	public function Artikel_laporan_kegiatan()
	{
		$data['title'] = "Artikel Laporan Kegiatan";
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		$data['jml_event'] 	= $this->LandPage_Model->get_jml_event();
		$data['event']		= $this->LandPage_Model->get_all_event();
		$data['artikel'] 	= $this->LandPage_Model->get_artikel_kegiatan();
		// $i=0;
		// foreach ($data['artikel'] as $art) 
		// {
		// 	$tahun[$i] = substr($art['date_created'], 0, 4);
		// 	$i++;
		// }

		$i=0;
			if ($data['event']) 
			{
				foreach ($data['event'] as $ev) 
				{
					$data['tahun'][$i] = substr($ev['date_created'], 0, 4);
					$i++;
				}
			}	
			else
			{
				$data['tahun'] = array('0' => date('Y'), );
			}		

		arsort($data['tahun']);
		// print_r($data['artikel']); die();
		$this->load->view('landPage/header', $data);
		$this->load->view('landPage/navbar', $data);
		$this->load->view('landPage/artikel', $data);
		$this->load->view('landPage/footer', $data);
	}

	public function artikel()
	{
		$data['artikel'] 	= $this->LandPage_Model->get_artikel_kegiatan();

	}

	public function artikel_tahun($tahun)
	{
		$data['artikel'] 	= $this->LandPage_Model->get_artikel_kegiatan_per_tahun($tahun);
		// print_r($data['artikel']);
		$this->load->view('landPage/daftar_artikel', $data);
		// echo "artikel tahun";
	}

	public function artikel_tim($tim)
	{
		$data['artikel'] 	= $this->LandPage_Model->get_artikel_tim($tim);
		// print_r($data['artikel']); die();
		$this->load->view('landPage/artikel_tim', $data);
	}

	public function kredit()
	{
		$data['title'] 		= "Kredit";
		$data['pengumuman'] = $this->Relawan_Model->get_pengumuman();
		
		$this->load->view('landPage/header', $data);
		$this->load->view('landPage/navbar', $data);
		$this->load->view('landPage/kredit');
		$this->load->view('landPage/footer');
	}

	
}

?>