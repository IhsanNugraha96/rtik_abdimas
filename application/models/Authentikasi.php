<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentikasi extends CI_Model
{
	public function get_provinsi()
	{
		$query = "SELECT * FROM provinsi ORDER BY nama_provinsi ASC";
		return $this->db->query($query)->result_array();
	}

	public function get_kota($id_provinsi)
	{
		$query = "SELECT * FROM kota WHERE id_provinsi = $id_provinsi ORDER BY nama_kota ASC";
		return $this->db->query($query)->result_array();
	}

	
	// fungsi untuk regiatrasi relawan/peserta
	public function get_keahlian()
	{
		$query = "SELECT * FROM keahlian ORDER BY nama_keahlian ASC";
		return $this->db->query($query)->result_array();
	}

	public function get_komisariat()
	{
		$query = "SELECT * FROM komisariat ORDER BY nama_komisariat ASC";
		return $this->db->query($query)->result_array();
	}

	public function get_distrik($id_provinsi)
	{
		$id = $id_provinsi;
		$query = "SELECT * FROM kota WHERE id_provinsi = $id ORDER BY type";
		return $this->db->query($query)->result_array();
	}

	public function ambil_data_relawan($username,$password,$email,$no)
	{
		$user = "'".$username."'";
		$pass = "'".base64_encode($password)."'";
		$mail = "'".$email."'";
		$hp = "'".$no."'";
		$query = "SELECT id_relawan FROM relawan WHERE username = $user && email = $mail && no_hp = $hp && password = $pass";
		return $this->db->query($query)->row_array();
	}
	// akhir fungsi untuk registrasi relawan/peserta


	// fungsi login relawan/peserta
	public function cek_relawan_by_username($username)
	{
		$id = "'".$username."'";
		$query = "SELECT * FROM relawan WHERE username = $id";
		return $this->db->query($query)->row_array();
	}

	public function cek_relawan_by_email($email)
	{
		$id = "'".$email."'";
		$query = "SELECT * FROM relawan WHERE email = $id";
		return $this->db->query($query)->row_array();
	}
	// akhir fungsi login relawan/peserta


	// fungsi login administrator
	public function cek_admin_by_username($username)
	{
		$id = "'".$username."'";
		$query = "SELECT * FROM admin WHERE username = $id";
		return $this->db->query($query)->row_array();
	}

	public function cek_admin_by_email($email)
	{
		$id = "'".$email."'";
		$query = "SELECT * FROM admin WHERE email = $id";
		return $this->db->query($query)->row_array();
	}
	// akhir fungsi login administrator

	// fungsi login instruktur
	public function cek_instruktur_by_email($email)
	{
		$id = "'".$email."'";
		$query = "SELECT * FROM instruktur WHERE email = $id";
		return $this->db->query($query)->row_array();
	}
	// akhir fungsi login instruktur

	public function get_template_pangkalan()
	{
		$query = "SELECT * FROM template
			JOIN admin ON template.id_admin = admin.id_admin
			WHERE id_template = 'pangkalan'
			ORDER BY template.id_template";
		
		return $this->db->query($query)->row_array();
	}

	public function cek_pangkalan_by_email($email)
	{
		$id = "'".$email."'";
		$query = "SELECT * FROM komisariat WHERE email = $id";
		return $this->db->query($query)->row_array();
	}

	public function cek_pembimbing_by_email($email)
	{
		$id = "'".$email."'";
		$query = "SELECT * FROM pembimbing WHERE email = $id";
		return $this->db->query($query)->row_array();
	}

	public function cek_mitra_by_email($email)
	{
		$id = "'".$email."'";
		$query = "SELECT * FROM mitra WHERE email_koordinator = $id";
		return $this->db->query($query)->row_array();
	}
}
?>