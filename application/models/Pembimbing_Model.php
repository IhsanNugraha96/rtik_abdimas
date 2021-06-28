<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembimbing_Model extends CI_Model
{

	public function cek_pembimbing_by_idPembimbing($id_pembimbing)
	{
		$id = "'".$id_pembimbing."'";
		$query = "SELECT pembimbing.id_pembimbing,pembimbing.email,pembimbing.id_komisariat,pembimbing.nik,pembimbing.nama,pembimbing.tgl_lahir,pembimbing.jenis_kelamin,pembimbing.alamat_rumah,pembimbing.kecamatan,pembimbing.id_kota,pembimbing.no_telp,pembimbing.sektor_pekerjaan,pembimbing.jabatan,pembimbing.image,pembimbing.password,komisariat.nama_komisariat,komisariat.logo 
			FROM pembimbing
			JOIN komisariat ON pembimbing.id_komisariat = komisariat.id_komisariat 
			WHERE pembimbing.id_pembimbing = $id";
		return $this->db->query($query)->row_array();
	}

	public function cek_pembimbing_by_idpembimbing2($id_pembimbing)
	{
		$id = "'".$id_pembimbing."'";
		$query = "SELECT * FROM pembimbing 
				JOIN kota ON pembimbing.id_kota = kota.id_kota
				JOIN provinsi ON kota.id_provinsi = provinsi.id_provinsi
				WHERE pembimbing.id_pembimbing = $id";
		return $this->db->query($query)->row_array();
	} 

	public function get_alamat_pembimbing_by_idKota($id_kota)
	{
		$id = "'".$id_kota."'";
		$query = "SELECT * FROM kota
		 		JOIN provinsi ON kota.id_provinsi = provinsi.id_provinsi
		 		WHERE kota.id_kota = $id";
		return $this->db->query($query)->row_array();
	}


	public function cek_status_pembimbing($id_pembimbing)
	{
		$id = "'".$id_pembimbing."'";
		$query = "SELECT role_id FROM pembimbing WHERE id_pembimbing = $id";
		return $this->db->query($query)->row_array();
	}

	public function cek_jml_pengajuan_pembimbing($id_pembimbing, $id_event)
	{
		$id = "'".$id_pembimbing."'";
		$id_ev = "'".$id_event."'";
		$query = "SELECT * FROM tim WHERE id_pembimbing = $id and id_event = $id_ev and status_pembimbing = '0'";
		return $this->db->query($query)->num_rows();
	}

	public function cek_pengajuan_pembimbing($id_pembimbing, $id_event)
	{
		$id = "'".$id_pembimbing."'";
		$id_ev = "'".$id_event."'";
		$query = "SELECT * FROM tim WHERE id_pembimbing = $id and id_event = $id_ev and status_pembimbing = '0'";
		return $this->db->query($query)->result_array();
	}

	public function cek_ketua_tim($id_tim, $id_event)
	{
		$id = "'".$id_tim."'";
		$id_ev = "'".$id_event."'";
		$query = "SELECT relawan.id_relawan,relawan.nama_lengkap,komisariat.nama_komisariat,tim.nama_tim,tim.id_tim FROM anggota_tim
			JOIN tim ON anggota_tim.id_tim = tim.id_tim
			JOIN relawan ON anggota_tim.id_relawan = relawan.id_relawan
			JOIN komisariat ON relawan.komisariat = komisariat.id_komisariat
			WHERE anggota_tim.id_tim = $id and tim.id_event = $id_ev and anggota_tim.status_pengajuan = '4'";
		return $this->db->query($query)->row_array();
	}

	public function get_jml_kegiatan_telah_diikuti($id_pembimbing)
	{
		$id_p = "'".$id_pembimbing."'";
		$query = "SELECT DISTINCT tim.id_pembimbing,tim.id_event,event.nama_event,event.date_created
			FROM anggota_tim JOIN tim
				JOIN event ON tim.id_event = event.id_event
				WHERE tim.id_pembimbing = $id_p and event.role_id = '3'and tim.status_pembimbing = '2'
				ORDER BY event.date_created ASC";
		return $this->db->query($query)->num_rows();
	}

	public function get_kegiatan_telah_diikuti($id_pembimbing)
	{
		$id_p = "'".$id_pembimbing."'";
		$query = "SELECT DISTINCT tim.id_pembimbing,tim.id_event,event.nama_event,event.date_created
			FROM anggota_tim JOIN tim
				JOIN event ON tim.id_event = event.id_event
				WHERE tim.id_pembimbing = $id_p and event.role_id = '3'and tim.status_pembimbing = '2'
				ORDER BY event.date_created ASC";
		return $this->db->query($query)->result_array();
	}

	public function get_tim_pembimbing($id_pembimbing, $id_event)
	{		
		$id = "'".$id_pembimbing."'";
		$id_ev = "'".$id_event."'";
		$query = "SELECT relawan.nama_lengkap,komisariat.nama_komisariat,tim.nama_tim,tim.id_tim,tim.surat_pengantar,tim.survey_permintaan,tim.surat_konfirmasi,tim.artikel_miftek,tim.presensi_pelayanan,tim.berita_Acara FROM anggota_tim
			JOIN tim ON anggota_tim.id_tim = tim.id_tim
			JOIN relawan ON anggota_tim.id_relawan = relawan.id_relawan
			JOIN komisariat ON relawan.komisariat = komisariat.id_komisariat
			WHERE id_pembimbing = $id and id_event = $id_ev and status_pembimbing = '2' and anggota_tim.status_pengajuan = '4'
			ORDER BY tim.nama_tim ASC";
		return $this->db->query($query)->result_array();
	}

	public function cek_tim_yang_telah_dibimbing($id_pembimbing, $id_event)
	{		
		$id = "'".$id_pembimbing."'";
		$id_ev = "'".$id_event."'";
		$query = "SELECT relawan.nama_lengkap,komisariat.nama_komisariat,tim.nama_tim,tim.id_tim,tim.surat_pengantar,tim.survey_permintaan,tim.surat_konfirmasi,tim.artikel_miftek,tim.presensi_pelayanan,tim.berita_Acara FROM anggota_tim
			JOIN tim ON anggota_tim.id_tim = tim.id_tim
			JOIN relawan ON anggota_tim.id_relawan = relawan.id_relawan
			JOIN komisariat ON relawan.komisariat = komisariat.id_komisariat
			WHERE id_pembimbing = $id and id_event = $id_ev and status_pembimbing = '2' and anggota_tim.status_pengajuan = '4'
			ORDER BY tim.nama_tim ASC";
		return $this->db->query($query)->result_array();
	}

	public function get_ketua_tim_pembimbing($id_tim)
	{
		$id = "'".$id_tim."'";
		$query = "SELECT * FROM anggota_tim 
				JOIN tim ON anggota_tim.id_tim = tim.id_tim
				JOIN relawan ON anggota_tim.id_relawan = relawan.id_relawan
				JOIN kota ON relawan.kota = kota.id_kota
				JOIN provinsi ON kota.id_provinsi = provinsi.id_provinsi
				JOIN komisariat ON relawan.komisariat = komisariat.id_komisariat
				WHERE anggota_tim.id_tim = $id and anggota_tim.status_pengajuan = '4'";
		return $this->db->query($query)->row_array();
	}

	public function get_anggota_tim_pembimbing($id_tim)
	{
		$id = "'".$id_tim."'";
		$query = "SELECT * FROM anggota_tim 
				JOIN tim ON anggota_tim.id_tim = tim.id_tim
				JOIN relawan ON anggota_tim.id_relawan = relawan.id_relawan
				JOIN kota ON relawan.kota = kota.id_kota
				JOIN provinsi ON kota.id_provinsi = provinsi.id_provinsi
				JOIN komisariat ON relawan.komisariat = komisariat.id_komisariat
				WHERE anggota_tim.id_tim = $id and anggota_tim.status_pengajuan = '3'";
		return $this->db->query($query)->result_array();
	}


	public function get_artikel_berita_tim($id_tim)
	{
		$id = "'".$id_tim."'";
		$query = "SELECT judul_laporan,laporan,nama_tim FROM tim WHERE id_tim = $id";
		return $this->db->query($query)->row_array();
	}

	 public function get_template_berkas_pelaporan()
	{
		$query = "SELECT * FROM template
			JOIN admin ON template.id_admin = admin.id_admin
			WHERE id_template != 'mitra' and id_template != 'pangkalan' 
			ORDER BY template.id_template";
		
		return $this->db->query($query)->result_array();
	}

	public function cek_email_pembimbing($email)
	{
		$id = "'".$email."'";
		$query = "SELECT * FROM pembimbing WHERE email = $id";
		
		return $this->db->query($query)->num_rows();
	}

	public function get_personel_tim_by_id_tim($id_tim)
	{
		$id = "'".$id_tim."'";
		$query = "SELECT anggota_tim.id_anggota,anggota_tim.id_tim,relawan.id_relawan,relawan.nama_lengkap FROM anggota_tim
			JOIN relawan ON anggota_tim.id_relawan = relawan.id_relawan 
			WHERE anggota_tim.id_tim = $id and anggota_tim.status_pengajuan >= '3'";
		
		return $this->db->query($query)->result_array();
	}

	public function get_status_penilaian_individu_by_pembimbing($id_pembimbing,$id_tim)
	{
		$id = "'".$id_tim."'";
		$id_p = "'".$id_pembimbing."'";
		$query = "SELECT nilai_individu.id_nilai_individu,nilai_individu.id_anggota_tim,nilai_individu.id_penilai,nilai_individu.nilai,anggota_tim.id_tim FROM nilai_individu
			JOIN anggota_tim ON anggota_tim.id_anggota = nilai_individu.id_anggota_tim 
			WHERE nilai_individu.id_penilai = $id_p 'P' and anggota_tim.id_tim = $id";
		
		return $this->db->query($query)->result_array();
	}

	public function get_indikator_penilaian_laporan()
	{
		$query = "SELECT * FROM indikator_penilaian WHERE id_kriteria = 'lpr'";
		
		return $this->db->query($query)->result_array();
	}

	public function get_jml_indikator_penilaian_laporan()
	{
		$query = "SELECT * FROM indikator_penilaian WHERE id_kriteria = 'lpr'";
		
		return $this->db->query($query)->num_rows();
	}

	public function get_indikator_penilaian_dokumen()
	{
		$query = "SELECT * FROM indikator_penilaian WHERE id_kriteria = 'dok'";
		
		return $this->db->query($query)->result_array();
	}

	public function get_jml_indikator_penilaian_dokumen()
	{
		$query = "SELECT * FROM indikator_penilaian WHERE id_kriteria = 'dok'";
		
		return $this->db->query($query)->num_rows();
	}

	public function get_tim_by_id_tim($id_tim)
	{
		$id = "'".$id_tim."'";
		$query = "SELECT * FROM tim WHERE id_tim = $id";
		return $this->db->query($query)->row_array();
	}

	public function cek_status_penilaian_laporan($id_tim)
	{
		$id = "'".$id_tim."'";
		$query = "SELECT * FROM nilai_kinerja_tim WHERE id_tim = $id";
		return $this->db->query($query)->row_array();
	}

	public function cek_status_penilaian_berkas_tim($id_tim)
	{
		$id = "'".$id_tim."'";
		$query = "SELECT * FROM nilai_kinerja_tim WHERE id_tim = $id";
		return $this->db->query($query)->row_array();
	}

	public function get_persentase_laporan($id_kriteria)
	{
		$id = "'".$id_kriteria."'";
		$query = "SELECT * FROM persentase_kriteria_penilaian WHERE kd_penilaian = $id";
		return $this->db->query($query)->row_array();
	}



	public function get_indikator_penilaian_individu()
	{
		$query = "SELECT * FROM indikator_penilaian WHERE id_kriteria = 'nid'";
		return $this->db->query($query)->result_array();
	}

	public function cek_jml_tim_yang_telah_dibimbing($id_pembimbing,$id_Event)
	{
		$id = "'".$id_pembimbing."'";
		$id_ev = "'".$id_Event."'";
		$query = "SELECT * FROM tim	WHERE id_pembimbing = $id and id_event = $id_ev and status_pembimbing = '2'";
		return $this->db->query($query)->num_rows();
	}

	public function get_Event_by_id_event($id_event)
	{
		$id_ev = "'".$id_event."'";
		$query = "SELECT * FROM event	WHERE id_event = $id_ev";
		return $this->db->query($query)->row_array();
	}
	
}