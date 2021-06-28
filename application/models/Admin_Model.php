<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Model extends CI_Model
{
	public function cek_relawan_by_idRelawan($id_admin)
	{
		$id = "'".$id_admin."'";
		$query = "SELECT * FROM admin WHERE id_admin = $id";
		return $this->db->query($query)->row_array();
	}

	public function get_jml_event()
	{
		$query = "SELECT * FROM event";
		return $this->db->query($query)->num_rows();
	}

	public function get_jml_komisariat()
	{
		$query = "SELECT * FROM komisariat WHERE role_id = 1";
		return $this->db->query($query)->num_rows();
	}

	public function get_jml_mitra()
	{
		$query = "SELECT * FROM mitra";
		return $this->db->query($query)->num_rows();
	}

	public function get_jml_permintaan_akun_komisariat()
	{
		$query = "SELECT * FROM komisariat WHERE role_id = 0";
		return $this->db->query($query)->num_rows();
	}

	public function get_pengajuan_komisariat()
	{
		$query = "SELECT * FROM komisariat 		
		JOIN kota ON komisariat.id_kota = kota.id_kota
		JOIN provinsi ON kota.id_provinsi = provinsi.id_provinsi
		WHERE komisariat.role_id = 0";
		return $this->db->query($query)->result_array();
	} 

	public function get_komisariat()
	{
		$query = "SELECT * FROM komisariat 
		JOIN kota ON komisariat.id_kota = kota.id_kota
		JOIN provinsi ON kota.id_provinsi = provinsi.id_provinsi
		WHERE komisariat.role_id = 1";
		return $this->db->query($query)->result_array();
	}

	public function get_komisariat_by_id_komisariat($id_pangkalan)
	{
		$id = "'".$id_pangkalan."'";
		$query = "SELECT * FROM komisariat 
		JOIN kota ON komisariat.id_kota = kota.id_kota
		JOIN provinsi ON kota.id_provinsi = provinsi.id_provinsi
		WHERE komisariat.id_komisariat = $id";
		return $this->db->query($query)->row_array();
	}

	public function jml_anggota_komisariat($id_komisariat)
	{
		$id_k = "'".urldecode($id_komisariat)."'";
		$query = "SELECT * FROM relawan WHERE komisariat = $id_k and is_active = 3";
		return $this->db->query($query)->num_rows();
	}

	public function jml_pembimbing_komisariat($id_komisariat)
	{
		$id_k = "'".urldecode($id_komisariat)."'";
		$query = "SELECT * FROM pembimbing WHERE id_komisariat = $id_k and role_id >= 1";
		return $this->db->query($query)->num_rows();
	}

	public function get_event()
	{
		$query = "SELECT event.id_event,event.id_admin,event.date_created,event.nama_event,event.link_gdrive_default,event.awal_registrasi,event.akhir_registrasi,event.awal_pembekalan,event.akhir_pembekalan,event.awal_pelayanan,event.akhir_pelayanan,event.awal_pelaporan,event.akhir_pelaporan,event.awal_penilaian,event.akhir_penilaian,event.role_id,admin.nama
				FROM event JOIN admin
				ON event.id_admin = admin.id_admin
				ORDER BY event.date_created DESC";
		return $this->db->query($query)->result_array();
	}

	public function get_event_by_id_event($id_event)
	{
		$id = "'".$id_event."'";
		$query = "SELECT * FROM event WHERE id_event = $id";
		return $this->db->query($query)->row_array();
	}

	public function get_jml_komisariat_byEvent($id_event)
	{
		$id = "'".$id_event."'";
		$query = "SELECT DISTINCT komisariat.id_komisariat,komisariat.nama_komisariat 
				FROM komisariat 
				JOIN relawan ON komisariat.id_komisariat = relawan.komisariat
				JOIN anggota_tim ON relawan.id_relawan = anggota_tim.id_relawan
				JOIN tim ON anggota_tim.id_tim = anggota_tim.id_tim
				WHERE tim.id_event = $id";
		
		return $this->db->query($query)->num_rows();
	}

	public function get_all_event()
	{
		$query = "SELECT * FROM event";
		return $this->db->query($query)->result_array();
	}


	public function get_komisariat_byEvent($id_event)
	{
		$id = "'".$id_event."'";
		$query = "SELECT DISTINCT komisariat.id_komisariat,komisariat.nama_komisariat,komisariat.logo 
				FROM komisariat 
				JOIN relawan ON komisariat.id_komisariat = relawan.komisariat
				JOIN anggota_tim ON relawan.id_relawan = anggota_tim.id_relawan
				JOIN tim ON anggota_tim.id_tim = anggota_tim.id_tim
				WHERE tim.id_event = $id";
		
		return $this->db->query($query)->result_array();
	}

	

	public function get_jml_tim_byEvent($id_event)
	{
		$id = "'".$id_event."'";
		$query = "SELECT * FROM tim WHERE id_event = $id";
		
		return $this->db->query($query)->num_rows();
	}


	public function get_tim_byEvent($id_event)
	{
		$id = "'".$id_event."'";
		$query = "SELECT * FROM tim WHERE id_event = $id";
		
		return $this->db->query($query)->result_array();
	}

	public function get_namatim_byEvent($id_event)
	{
		$id = "'".$id_event."'";
		$query = "SELECT id_tim,nama_tim FROM tim WHERE id_event = $id ORDER BY id_tim ASC";
		
		return $this->db->query($query)->result_array();
	}

	public function get_tim_id_tim($id_tim)
	{
		$id = "'".$id_tim."'";
		$query = "SELECT * FROM tim WHERE id_tim = $id";
		
		return $this->db->query($query)->result_array();
	}

	public function get_berkas_tim_id_tim($id_tim)
	{
		$id = "'".$id_tim."'";
		$query = "SELECT surat_pengantar,survey_permintaan,surat_konfirmasi,artikel_miftek,presensi_pelayanan,berita_acara FROM tim WHERE id_tim = $id";
		
		return $this->db->query($query)->row_array();
	}

	public function get_artikel_tim_id_tim($id_tim)
	{
		$id = "'".$id_tim."'";
		$query = "SELECT judul_laporan,laporan FROM tim WHERE id_tim = $id";
		
		return $this->db->query($query)->row_array();
	}

	public function get_jml_anggotatim_id_tim($id_tim)
	{
		$id = "'".$id_tim."'";
		$query = "SELECT * FROM anggota_tim WHERE id_tim = $id and status_pengajuan >= 3";
		
		return $this->db->query($query)->num_rows();
	}

	public function get_anggota_tim_by_id_tim($id_tim)
	{
		$id = "'".$id_tim."'";
		$query = "SELECT relawan.id_relawan,relawan.nama_lengkap,relawan.jenis_kelamin,relawan.tempat_lahir,relawan.tgl_lahir,relawan.kecamatan,relawan.alamat_lengkap,relawan.no_hp,relawan.email,relawan.pendidikan_terakhir,relawan.nik,relawan.thn_anggota,relawan.image,relawan.jabatan_di_rtik,relawan.image,komisariat.nama_komisariat,kota.type,kota.nama_kota,provinsi.nama_provinsi FROM anggota_tim
			JOIN relawan ON anggota_tim.id_relawan = relawan.id_relawan
			JOIN kota ON relawan.kota = kota.id_kota
			JOIN provinsi ON kota.id_provinsi = provinsi.id_provinsi
			JOIN komisariat ON relawan.komisariat = komisariat.id_komisariat
			WHERE id_tim = $id and status_pengajuan = 3";
		
		return $this->db->query($query)->result_array();
	}


	public function get_jml_peserta_byEvent($id_event)
	{
		$id = "'".$id_event."'";
		$query = "SELECT * FROM anggota_tim 
			JOIN tim ON anggota_tim.id_tim = tim.id_tim
			WHERE tim.id_event = $id";
		
		return $this->db->query($query)->num_rows();
	}

	public function get_jml_peserta_komisariat_byEvent($id_event,$id_komisariat)
	{
		$id_e = "'".$id_event."'";
		$id_k = "'".urldecode($id_komisariat)."'";
		
		$query = "SELECT * FROM anggota_tim 
			JOIN tim ON anggota_tim.id_tim = tim.id_tim
			JOIN relawan ON anggota_tim.id_relawan = relawan.id_relawan
			WHERE tim.id_event = $id_e and relawan.komisariat = $id_k and anggota_tim.status_pengajuan > 2";
		
		return $this->db->query($query)->num_rows();
	}

	public function get_all_data_admin()
	{
		$query = "SELECT * FROM admin";
		return $this->db->query($query)->result_array();
	}

	public function get_progress_event($id_event)
	{
		$id = "'".$id_event."'";
		$query = "SELECT * FROM event WHERE id_event = $id";
		
		$event = $this->db->query($query)->row_array();	

		$awal_registrasi = strtotime($event['awal_registrasi']);
		$akhir_penilaian = strtotime($event['akhir_penilaian']);



		// if (strtotime($event['awal_registrasi']) <= strtotime(date('Y-m-d G:i:s'))) 
		// {
		// 	redirect('relawan/kegiatan_berlangsung');
		// }
	}

	// public function get_id_ketua_by_id_tim($id_tim)
	// {
	// 	$id = "'".$id_tim."'";
	// 	$query = "SELECT * FROM anggota_tim
	// 		JOIN relawan ON anggota_tim.id_relawan = relawan.id_relawan
	// 		WHERE anggota_tim.id_tim = $id and anggota_tim.status_pengajuan = 4";
		
	// 	return $this->db->query($query)->row_array();
	// }


	public function get_ketua_tim_by_id_tim($id_tim)
	{
		$id = "'".$id_tim."'";
		$query = "SELECT relawan.id_relawan,relawan.nama_lengkap,relawan.jenis_kelamin,relawan.tempat_lahir,relawan.tgl_lahir,relawan.kecamatan,relawan.alamat_lengkap,relawan.no_hp,relawan.email,relawan.pendidikan_terakhir,relawan.nik,relawan.thn_anggota,relawan.image,relawan.jabatan_di_rtik,relawan.image,komisariat.nama_komisariat,kota.type,kota.nama_kota,provinsi.nama_provinsi FROM anggota_tim
			JOIN relawan ON anggota_tim.id_relawan = relawan.id_relawan
			JOIN kota ON relawan.kota = kota.id_kota
			JOIN provinsi ON kota.id_provinsi = provinsi.id_provinsi
			JOIN komisariat ON relawan.komisariat = komisariat.id_komisariat
			WHERE anggota_tim.id_tim = $id and anggota_tim.status_pengajuan = 4";
		
		return $this->db->query($query)->row_array();
	}


	public function get_mitra_by_event($id_event)
	{
		$id = "'".$id_event."'";
		$query = "SELECT mitra.nama_mitra,cluster.nama_cluster,mitra.alamat,kota.type,kota.nama_kota,provinsi.nama_provinsi,mitra.titik_koordinat,mitra.situs_web,mitra.profil_ringkas,mitra.pimpinan,mitra.email_pimpinan,mitra.no_hp_pimpinan,mitra.koordinator,mitra.email_koordinator,mitra.no_hp_koordinator,mitra.logo,mitra.jenis_layanan 
			from mitra
			JOIN kota ON mitra.id_kota = kota.id_kota
			JOIN provinsi ON kota.id_provinsi = provinsi.id_provinsi
			JOIN cluster ON mitra.id_cluster = cluster.id_cluster 
			JOIN tim ON mitra.id_tim = tim.id_tim
			WHERE tim.id_event = $id";
		
		return $this->db->query($query)->result_array();
	}

	public function get_jml_layanan_mitra_by_event($id_event,$layanan)
	{
		$id = "'".$id_event."'";
		$lyn = "'".$layanan."'";
		$query = "SELECT mitra.nama_mitra,cluster.nama_cluster,mitra.alamat,kota.type,kota.nama_kota,provinsi.nama_provinsi,mitra.titik_koordinat,mitra.situs_web,mitra.profil_ringkas,mitra.pimpinan,mitra.email_pimpinan,mitra.no_hp_pimpinan,mitra.koordinator,mitra.email_koordinator,mitra.no_hp_koordinator,mitra.logo,mitra.jenis_layanan 
			from mitra
			JOIN kota ON mitra.id_kota = kota.id_kota
			JOIN provinsi ON kota.id_provinsi = provinsi.id_provinsi
			JOIN cluster ON mitra.id_cluster = cluster.id_cluster 
			JOIN tim ON mitra.id_tim = tim.id_tim
			WHERE tim.id_event = $id and mitra.jenis_layanan = $lyn";
		
		return $this->db->query($query)->num_rows();
	}

	public function get_data_pembekalan_byEvent($id_event)
	{
		$id = "'".$id_event."'";
		$query = "SELECT * 
			from pembekalan
			JOIN instruktur ON pembekalan.id_instruktur = instruktur.id_instruktur
			JOIN pengumuman ON pembekalan.id_pengumuman = pengumuman.id_pengumuman
			WHERE pembekalan.id_event = $id";
		
		return $this->db->query($query)->result_array();
	}

	public function get_data_pembekalan_by_id_pembekalan($id_pembekalan)
	{
		$id = "'".$id_pembekalan."'";
		$query = "SELECT * 
			from pembekalan
			JOIN instruktur ON pembekalan.id_instruktur = instruktur.id_instruktur
			JOIN pengumuman ON pembekalan.id_pengumuman = pengumuman.id_pengumuman
			WHERE pembekalan.id_pembekalan = $id";
		
		return $this->db->query($query)->row_array();
	}


	public function get_data_jml_pembekalan_byEvent($id_event)
	{
		$id = "'".$id_event."'";
		$query = "SELECT * 
			from pembekalan
			JOIN instruktur ON pembekalan.id_instruktur = instruktur.id_instruktur
			JOIN pengumuman ON pembekalan.id_pengumuman = pengumuman.id_pengumuman
			WHERE pembekalan.id_event = $id";
		
		return $this->db->query($query)->num_rows();
	}

	public function get_datainstruktur()
	{
		$query = "SELECT * from instruktur 
			JOIN kota ON instruktur.id_kota = kota.id_kota
			JOIN provinsi ON kota.id_provinsi = provinsi.id_provinsi
			WHERE instruktur.role_id = 1
			ORDER BY instruktur.nama ASC";
		
		return $this->db->query($query)->result_array();
	}

	public function get_datainstruktur_by_id_instruktur($id_instruktur)
	{
		$id = "'".$id_instruktur."'";
		$query = "SELECT * from instruktur WHERE id_instruktur = $id";
		
		return $this->db->query($query)->row_array();
	}

	public function get_jml_permintaan_akun_instruktur()
	{
		$query = "SELECT * 
			from instruktur
			WHERE role_id = 0";
		
		return $this->db->query($query)->num_rows();
	}

	public function get_pengajuan_instruktur()
	{
		$query = "SELECT * 
			from instruktur
			JOIN kota ON instruktur.id_kota = kota.id_kota
			JOIN provinsi ON kota.id_provinsi = provinsi.id_provinsi
			WHERE role_id = 0
			ORDER BY  nama";
		
		return $this->db->query($query)->result_array();
	}

	public function get_jml_datainstruktur()
	{
		$query = "SELECT * 
			from instruktur
			WHERE role_id = 1 and id_instruktur != '0'
			ORDER BY  nama";
		
		return $this->db->query($query)->num_rows();
	}

	public function get_materi_instruktur()
	{
		$query = "SELECT * 
			from instruktur
			JOIN materi ON materi.id_instruktur = instruktur.id_instruktur";
		
		return $this->db->query($query)->result_array();
	}

	public function get_jml_materi_instruktur($id_instruktur)
	{

		$id = "'".$id_instruktur."'";
		$query = "SELECT * from materi WHERE id_instruktur = $id";
		
		return $this->db->query($query)->num_rows();
	}

	public function get_materi_instruktur_by_id_instruktur($id_instruktur)
	{
		$id = "'".$id_instruktur."'";
		$query = "SELECT * from materi WHERE id_instruktur = $id";
		
		return $this->db->query($query)->result_array();
	}

	public function get_data_relawan_by_id_komisariat($id_komisariat)
	{
		$id = "'".$id_komisariat."'";
		$query = "SELECT * from relawan 
			JOIN kota ON relawan.kota = kota.id_kota
			JOIN provinsi ON kota.id_provinsi = provinsi.id_provinsi
			WHERE relawan.komisariat = $id";
		
		return $this->db->query($query)->result_array();
	}

	public function get_data_pembimbing_by_id_komisariat($id_pangkalan)
	{
		$id = "'".$id_pangkalan."'";
		$query = "SELECT * from pembimbing 
			JOIN kota ON pembimbing.id_kota = kota.id_kota
			JOIN provinsi ON kota.id_provinsi = provinsi.id_provinsi
			WHERE pembimbing.id_komisariat = $id
			ORDER BY pembimbing.nama";
		
		return $this->db->query($query)->result_array();
	}


	public function get_all_template_berkas()
	{
		$query = "SELECT * FROM template
			JOIN admin ON template.id_admin = admin.id_admin
			WHERE id_template != 'mitra' and id_template != 'pangkalan'";
		
		return $this->db->query($query)->result_array();
	}

	public function get_template_by_id_template($id_template)
	{
		$id = "'".$id_template."'";
		$query = "SELECT * FROM template WHERE id_template = $id";
		
		return $this->db->query($query)->row_array();
	}

	public function get_data_pengumuman()
	{
		$query = "SELECT * FROM pengumuman ORDER BY batas_waktu DESC";
		
		return $this->db->query($query)->result_array();
	}

	public function get_id_pengumuman_pembekalan_by_id($id_pengumuman)
	{
		$id = "'".$id_pengumuman."'";
		$query = "SELECT id_pengumuman FROM pembekalan WHERE id_pengumuman = $id";
		
		return $this->db->query($query)->row_array();
	}

	public function get_image_mitra_koordinator()
	{
		$query = "SELECT * FROM template WHERE id_template = 'mitra'";

		return $this->db->query($query)->row_array();
	}

	public function get_keahlian_Relawan()
	{
		$query = "SELECT * FROM keahlian";

		return $this->db->query($query)->result_array();
	}

	public function get_jenis_mitra()
	{
		$query = "SELECT * FROM cluster WHERE id_cluster != '0'";

		return $this->db->query($query)->result_array();
	}

	public function get_jenis_mitra2()
	{
		$query = "SELECT * FROM cluster";

		return $this->db->query($query)->result_array();
	}

	
	public function get_pangkalan_by_id_pangkalan($id_pangkalan)
	{
		$id = "'".$id_pangkalan."'";
		$query = "SELECT * FROM komisariat WHERE id_komisariat = $id";

		return $this->db->query($query)->row_array();
	}

	public function cek_email($email)
	{
		$id = "'".$email."'";
		$query = "SELECT * FROM admin WHERE email = $id";
		
		return $this->db->query($query)->num_rows();
	}

	public function cek_username($username)
	{
		$id = "'".$username."'";
		$query = "SELECT * FROM admin WHERE username = $id";
		
		return $this->db->query($query)->num_rows();
	}


	public function get_Event_by_tahun($thn)
	{
		$id = "'".$thn."'";
		$query = "SELECT * FROM event WHERE date_created like '$thn%'";
		
		return $this->db->query($query)->row_array();
	}

	public function get_jml_jenis_mitra($jenis_mitra)
	{
		$id = "'".$jenis_mitra."'";
		$query = "SELECT * FROM mitra WHERE id_cluster = $id";
		
		return $this->db->query($query)->num_rows();
	}

	public function get_jml_jenis_mitra2()
	{
		$query = "SELECT * FROM cluster";
		
		return $this->db->query($query)->num_rows();
	}

	public function get_jml_layanan_mitra($jenis)
	{
		$id = "'".$jenis."'";
		$query = "SELECT jenis_layanan FROM mitra WHERE jenis_layanan = $id";
		
		return $this->db->query($query)->num_rows();
	}

	public function get_data_mitra_by_id_tim($id_tim)
	{
		$id = "'".$id_tim."'";
		$query = "SELECT * FROM mitra WHERE id_tim = $id";
		
		return $this->db->query($query)->row_array();
	}

	public function get_all_persentase_kinerja_tim()
	{
		$query = "SELECT * FROM persentase_kriteria_penilaian WHERE kd_kriteria = 'KT'";
		
		return $this->db->query($query)->result_array();
	}

	public function get_all_persentase_nilai_individu()
	{
		$query = "SELECT * FROM persentase_kriteria_penilaian WHERE kd_kriteria = 'NI'";
		
		return $this->db->query($query)->result_array();
	}

	public function get_all_persentase_kinerja_relawan()
	{
		$query = "SELECT * FROM persentase_kriteria_penilaian WHERE kd_kriteria = 'KR'";
		
		return $this->db->query($query)->result_array();
	}

	public function get_all_indikator_penilaian()
	{
		$query = "SELECT * FROM indikator_penilaian";
		
		return $this->db->query($query)->result_array();
	}

	public function get_indikator_penilaian_sejawat()
	{
		$query = "SELECT * FROM indikator_penilaian WHERE id_kriteria = 'krl'";
		
		return $this->db->query($query)->result_array();
	}

	public function get_indikator_survei_program()
	{
		$query = "SELECT * FROM indikator_penilaian WHERE id_kriteria = 'mtr'";
		
		return $this->db->query($query)->result_array();
	}

	public function get_indikator_report()
	{
		$query = "SELECT * FROM indikator_penilaian WHERE id_kriteria = 'dok'";
		
		return $this->db->query($query)->result_array();
	}

	public function get_indikator_performa()
	{
		$query = "SELECT * FROM indikator_penilaian WHERE id_kriteria = 'lpr'";
		
		return $this->db->query($query)->result_array();
	}

	public function get_template_Sertifikat($id_event)
	{
		$id = "'".$id_event."'";

		$query = "SELECT * FROM template_sertifikat WHERE id_event = $id";		
		return $this->db->query($query)->row_array();
	}

	public function get_tim_terbaik_by_event($id_event)
	{
		$id = "'".$id_event."'";

		$query = "SELECT tim.nama_tim,komisariat.nama_komisariat,nilai_kinerja_tim.nilai_dokumen,nilai_kinerja_tim.nilai_mitra,nilai_kinerja_tim.nilai_laporan 
				FROM nilai_kinerja_tim 
				JOIN tim ON nilai_kinerja_tim.id_tim = tim.id_tim
				JOIN anggota_tim ON tim.id_tim = anggota_tim.id_tim
				JOIN relawan ON anggota_tim.id_relawan = relawan.id_relawan
				JOIN komisariat ON relawan.komisariat = komisariat.id_komisariat
				WHERE tim.id_event = $id and anggota_tim.status_pengajuan = '4'";		
		return $this->db->query($query)->result_array();
	}

	public function get_nilai_mitra_tim_terbaik($id_event)
	{
		$id = "'".$id_event."'";

		$query = "SELECT tim.nama_tim,komisariat.nama_komisariat,nilai_kinerja_tim.nilai_dokumen,nilai_kinerja_tim.nilai_mitra,nilai_kinerja_tim.nilai_laporan 
				FROM nilai_kinerja_tim 
				JOIN tim ON nilai_kinerja_tim.id_tim = tim.id_tim
				JOIN anggota_tim ON tim.id_tim = anggota_tim.id_tim
				JOIN relawan ON anggota_tim.id_relawan = relawan.id_relawan
				JOIN komisariat ON relawan.komisariat = komisariat.id_komisariat
				WHERE tim.id_event = $id and anggota_tim.status_pengajuan = '4'
				ORDER BY nilai_kinerja_tim.nilai_mitra DESC";		
		return $this->db->query($query)->result_array();
	}
}
?>