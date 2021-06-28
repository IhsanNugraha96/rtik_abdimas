<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class logout  extends CI_Controller 

{
		public function index()
	{
		// membersihkan session ('data email dan role_id')
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('id_relawan');
		$this->session->unset_userdata('id_admin');		
		$this->session->unset_userdata('id_instruktur');
		$this->session->unset_userdata('id_pembimbing');
		$this->session->unset_userdata('id_pangkalan');
		$this->session->unset_userdata('id_mitra');

		$this->session->set_flashdata('message','<div class="alert alert-success" style="margin-top:-10%;" role="alert">Anda berhasil keluar! </div>');
			redirect('auth');

	}

		public function hapus_akun()
	{
		// membersihkan session ('data email dan role_id')
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('id_relawan');
		$this->session->unset_userdata('id_admin');
		$this->session->unset_userdata('id_instruktur');
		$this->session->unset_userdata('id_mitra');
		$this->session->unset_userdata('id_pembimbing');
		$this->session->unset_userdata('id_pangkalan');

		$this->session->set_flashdata('message','<div class="alert alert-success" style="margin-top:-10%;" role="alert">Akun anda telah berhasil di hapus! </div>');
			redirect('landingPage');

	}

	public function keluar_detail_event()
	{
		$this->session->unset_userdata('id_event');
		redirect('admin/event');
	}

	public function keluar_detail_tim()
	{
		$this->session->unset_userdata('id_tim');
		redirect('admin/timRelawan_event');
	}

}

?>