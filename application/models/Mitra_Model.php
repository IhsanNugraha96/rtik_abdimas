<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mitra_Model extends CI_Model
{
	public function cek_mitra_by_id_mitra($id_mitra)
	{
		$id = "'".$id_mitra."'";
		$query = "SELECT mitra.id_mitra,mitra.nama_mitra,mitra.alamat,mitra.kecamatan,mitra.id_kota,mitra.titik_koordinat,mitra.situs_web,mitra.profil_ringkas,mitra.koordinator,mitra.jabatan_koordinator,mitra.no_hp_koordinator,mitra.email_koordinator,mitra.pimpinan,mitra.jabatan_pimpinan,mitra.no_hp_pimpinan,mitra.email_pimpinan,mitra.logo,mitra.jenis_layanan,mitra.password,mitra.id_tim,tim.nama_tim,event.nama_event,event.id_event,event.date_created,komisariat.id_komisariat,komisariat.nama_komisariat,kota.id_kota,kota.type,kota.nama_kota,provinsi.id_provinsi,provinsi.nama_provinsi FROM mitra
				JOIN tim ON mitra.id_tim = tim.id_tim
				JOIN anggota_tim ON tim.id_tim = anggota_tim.id_tim
				JOIN event ON tim.id_event = tim.id_event
				JOIN relawan ON anggota_tim.id_relawan = relawan.id_relawan
				JOIN komisariat ON relawan.komisariat = komisariat.id_komisariat
				JOIN kota ON mitra.id_kota = kota.id_kota
				JOIN provinsi ON kota.id_provinsi = provinsi.id_provinsi
				WHERE mitra.id_mitra = $id 
				and anggota_tim.status_pengajuan = '4'
				";
		return $this->db->query($query)->row_array();
	}


	public function get_komisariat($id_komisariat)
	{
		$id = "'".$id_komisariat."'";
		$query = "SELECT logo FROM komisariat WHERE id_komisariat = $id ";
		return $this->db->query($query)->row_array();
	}

	public function cek_email($email)
	{
		$id = "'".$email."'";
		$query = "SELECT * FROM mitra WHERE email_koordinator = $id";
		
		return $this->db->query($query)->num_rows();
	}

	public function get_indikator_penilaian_mitra()
	{
		$query = "SELECT * FROM indikator_penilaian WHERE id_kriteria = 'mtr'";
		return $this->db->query($query)->result_array();
	}


	public function get_jml_indikator_penilaian_mitra()
	{
		$query = "SELECT * FROM indikator_penilaian WHERE id_kriteria = 'mtr'";
		return $this->db->query($query)->num_rows();
	}


	public function get_status_penilaian_mitra($id_tim)
	{
		$id = "'".$id_tim."'";
		$query = "SELECT * FROM nilai_kinerja_tim WHERE id_tim = $id";
		return $this->db->query($query)->row_array();
	}

	public function get_tim_by_id_tim($id_tim)
	{
		$id = "'".$id_tim."'";
		$query = "SELECT * FROM tim WHERE id_tim = $id";
		return $this->db->query($query)->row_array();
	}

	public function get_persentase_penilaian_mitra($id_kriteria)
	{
		$id = "'".$id_kriteria."'";
		$query = "SELECT * FROM persentase_kriteria_penilaian WHERE kd_penilaian = $id";
		return $this->db->query($query)->row_array();
	}

	public function get_event($id_tim)
	{
		$id = "'".$id_tim."'";
		$query = "SELECT event.id_event,event.nama_event,event.awal_penilaian,event.akhir_penilaian,event.role_id,event.akhir_pelaporan 
			FROM tim
			JOIN event ON tim.id_event = event.id_event
			WHERE tim.id_tim = $id";
		return $this->db->query($query)->row_array();
	}

	public function get_Event_by_id_event($id_event)
	{
		$id = "'".$id_event."'";
		$query = "SELECT * FROM event WHERE id_event = $id";
		return $this->db->query($query)->row_array();
	}

}