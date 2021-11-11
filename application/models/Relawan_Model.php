<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relawan_Model extends CI_Model
{
	public function cek_relawan_by_idRelawan($id_relawan)
	{
		$id_r = "'".$id_relawan."'";
		$query = "SELECT * FROM relawan WHERE id_relawan = $id_r";
		return $this->db->query($query)->row_array();
	}

	public function get_komisariat_relawan($id_komisariat)
	{
		$id = "'".$id_komisariat."'";
		$query = "SELECT * FROM komisariat WHERE id_komisariat = $id";
		return $this->db->query($query)->row_array();
	}

	public function get_kota($id_kota)
	{
		$query = "SELECT * FROM kota WHERE id_kota = $id_kota";
		return $this->db->query($query)->row_array();
	}

	public function get_provinsi($id_provinsi)
	{
		$query = "SELECT * FROM provinsi WHERE id_provinsi = $id_provinsi";
		return $this->db->query($query)->row_array();
	}

	public function get_keahlian_relawan($id_relawan)
	{
		$id_r = "'".$id_relawan."'";
		$query = "SELECT keahlian.nama_keahlian,draf_keahlian_relawan.id_keahlian,draf_keahlian_relawan.level_kompetensi
				FROM draf_keahlian_relawan JOIN keahlian
				ON draf_keahlian_relawan.id_keahlian = keahlian.id_keahlian
				WHERE draf_keahlian_relawan.id_relawan = $id_r
				ORDER BY keahlian.id_keahlian ASC";
		return $this->db->query($query)->result_array();
	}

	public function get_jml_keahlian()
	{
		$query = "SELECT * FROM  keahlian";
		return $this->db->query($query)->num_rows();
	}

	public function get_jml_keahlian_relawan($id_relawan)
	{
		$id_r = "'".$id_relawan."'";
		$query = "SELECT keahlian.nama_keahlian,draf_keahlian_relawan.id_keahlian
				FROM draf_keahlian_relawan JOIN keahlian
				ON draf_keahlian_relawan.id_keahlian = keahlian.id_keahlian
				WHERE draf_keahlian_relawan.id_relawan = $id_r
				ORDER BY keahlian.id_keahlian ASC";
		return $this->db->query($query)->num_rows();
	}


	public function get_all_komisariat()
	{
		$query = "SELECT * FROM komisariat ORDER BY nama_komisariat ASC";
		return $this->db->query($query)->result_array();
	}


	public function get_data_komisariat_relawan($id_komisariat)
	{
		$id = "'".$id_komisariat."'";
		$query = "SELECT komisariat.nama_komisariat,komisariat.logo,komisariat.email
				FROM relawan JOIN komisariat
				ON relawan.komisariat = komisariat.id_komisariat
				WHERE relawan.komisariat = $id";
		return $this->db->query($query)->row_array();
	}

	public function get_jml_kegiatan_diikuti($id_relawan)
	{
		$id_r = "'".$id_relawan."'";
		$query = "SELECT * FROM anggota_tim JOIN tim 
			ON anggota_tim.id_tim = tim.id_tim
			JOIN event
			ON tim.id_event = event.id_event
			WHERE anggota_tim.id_relawan = $id_r and event.role_id <= 2";
		return $this->db->query($query)->num_rows();
	}

	public function get_kegiatan_telah_diikuti($id_relawan)
	{
		$id_r = "'".$id_relawan."'";
		$query = "SELECT *, pembimbing.image,relawan.image
			FROM anggota_tim JOIN tim
				ON anggota_tim.id_tim = tim.id_tim
				JOIN event ON tim.id_event = event.id_event
				JOIN pembimbing ON tim.id_pembimbing = pembimbing.id_pembimbing
				JOIN relawan ON anggota_tim.id_relawan = relawan.id_relawan
				WHERE anggota_tim.id_relawan = $id_r and event.role_id = 3
				ORDER BY event.date_created DESC";
		return $this->db->query($query)->result_array();	
	}

	public function get_jml_kegiatan_telah_diikuti($id_relawan)
	{
		$id_r = "'".$id_relawan."'";
		$query = "SELECT anggota_tim.id_relawan,anggota_tim.id_tim,tim.id_event,tim.nama_tim,event.nama_event,event.date_created
			FROM anggota_tim JOIN tim
				ON anggota_tim.id_tim = tim.id_tim
				JOIN event ON tim.id_event = event.id_event
				WHERE anggota_tim.id_relawan = $id_r and event.role_id = 3
				ORDER BY event.date_created ASC";
		return $this->db->query($query)->num_rows();	
	}

	public function get_kegiatan_telah_diikuti_by_id_tim($id_tim)
	{
		$id_t = "'".$id_tim."'";
		$query = "SELECT *
			FROM tim JOIN pembimbing
				ON tim.id_pembimbing = pembimbing.id_pembimbing
				JOIN event ON tim.id_event = event.id_event
				JOIN komisariat ON pembimbing.id_komisariat = komisariat.id_komisariat
				WHERE tim.id_tim = $id_t";
		return $this->db->query($query)->row_array();	
	}

	public function get_pengumuman()
	{
		$date = "'".date('Y-m-d G:i:s')."'";
		$query = "SELECT * FROM pengumuman WHERE batas_waktu >= $date ";
		return $this->db->query($query)->result_array();
	}

	public function get_jml_pengumuman()
	{
		$date = "'".date('Y-m-d G:i:s')."'";
		$query = "SELECT * FROM pengumuman WHERE batas_waktu >= $date ";
		return $this->db->query($query)->num_rows();
	}

	public function get_kegiatan_akan_datang()
	{
		$date = "'".date('Y-m-d G:i:s')."'";
		$query = "SELECT * FROM event WHERE role_id <= 1 and awal_registrasi != '0000-00-00 00:00:00' and akhir_registrasi != '0000-00-00 00:00:00' ";
		return $this->db->query($query)->row_array();
	}

	public function get_jml_kegiatan_akan_datang()
	{
		$date = "'".date('Y-m-d G:i:s')."'";
		$query = "SELECT * FROM event WHERE role_id <= 1 and awal_registrasi != '0000-00-00 00:00:00' and akhir_registrasi != '0000-00-00 00:00:00'";
		return $this->db->query($query)->num_rows();
	}

	public function get_kegiatan_berlangsung()
	{
		$query = "SELECT * FROM event WHERE role_id > 0 and role_id < 3";
		return $this->db->query($query)->row_array();
	}
	public function cek_jml_partisipan_event($id_event)
	{
		$query = "SELECT * FROM anggota_tim WHERE id_anggota like '$id_event%'";
		return $this->db->query($query)->num_rows();
	}

	public function cek_id_partisipan_event($id_event, $jml_partisipan)
	{
		$id = "'".$id_event. ++$jml_partisipan."'";
		$query = "SELECT * FROM anggota_tim WHERE id_anggota = $id";
		return $this->db->query($query)->num_rows();
	}

	public function get_data_event($id_event)
	{
		$id = "'".$id_event."'";
		$query = "SELECT * FROM event WHERE id_event = $id";
		return $this->db->query($query)->row_array();
	}

	public function cek_status_peserta_di_event($id_relawan,$id_event)
	{
		$id = "'".$id_relawan."'";
		$id_ev = "'".$id_event."'";
		$query = "SELECT * FROM anggota_tim WHERE id_relawan = $id and id_anggota like '$id_event%'";
		return $this->db->query($query)->num_rows();
	}

	public function cek_kepesertaan_peserta_di_event($id_relawan, $id_event)
	{
		$id_r = "'".$id_relawan."'";
		$query = "SELECT * FROM anggota_tim
			JOIN tim
			ON anggota_tim.id_tim = tim.id_tim 
			WHERE anggota_tim.id_anggota like'$id_event%' and anggota_tim.id_relawan = $id_r ";
		return $this->db->query($query)->row_array();
	}

	public function cek_kepesertaan_peserta($id_relawan, $id_event)
	{
		$id_r = "'".$id_relawan."'";
		$query = "SELECT DISTINCT * FROM anggota_tim
			WHERE id_anggota like'$id_event%' and id_relawan = $id_r " ;
		// $query = "SELECT * FROM anggota_tim	WHERE id_anggota like'$id_event%' and id_relawan = $id_relawan ";
		return $this->db->query($query)->row_array();
	}

	public function get_data_peserta_by_id_anggota($id_anggota)
	{
		$id = "'".$id_anggota."'";
		$query = "SELECT * FROM anggota_tim WHERE id_anggota = $id" ;
		return $this->db->query($query)->row_array();
	}


	public function get_data_di_tim($id_relawan,$id_event)
	{
		$id_r = "'".$id_relawan."'";
		$query = "SELECT * FROM anggota_tim
			JOIN tim
			ON anggota_tim.id_tim = tim.id_tim 
			WHERE id_anggota like'$id_event%' and id_relawan = $id_r " ;
		return $this->db->query($query)->row_array();
	}


	public function get_all_tim_di_event($id_event)
	{	
		$id = "'".$id_event."'";
		$query = "SELECT *	FROM tim WHERE id_event = $id ORDER BY nama_tim ASC";
		return $this->db->query($query)->result_array();
	}


	public function get_tim_by_id_tim($id_tim)
	{	
		$id = "'".$id_tim."'";
		$query = "SELECT *	FROM tim WHERE id_tim = $id";
		return $this->db->query($query)->row_array();
	}


	public function get_data_ketua_tim_by_id_tim($id_tim)
	{
		$id = "'".$id_tim."'";
		$query = "SELECT * FROM anggota_tim JOIN relawan 
				ON anggota_tim.id_relawan = relawan.id_relawan
				JOIN tim
				ON anggota_tim.id_tim = tim.id_tim
				JOIN komisariat ON relawan.komisariat = komisariat.id_komisariat
				WHERE anggota_tim.id_tim = $id and anggota_tim.status_pengajuan = '4' ";
		return $this->db->query($query)->row_array();
	}


	public function get_data_anggota_tim_by_id_tim($id_tim)
	{
		$id = "'".$id_tim."'";
		$query = "SELECT * FROM anggota_tim 
				JOIN relawan 
				ON anggota_tim.id_relawan = relawan.id_relawan
				JOIN komisariat ON relawan.komisariat = komisariat.id_komisariat
				WHERE anggota_tim.id_tim = $id and anggota_tim.status_pengajuan = 3 ";
		return $this->db->query($query)->result_array();
	}

	public function get_jml_anggota_pada_tim($id_tim)
	{
		$id = "'".$id_tim."'";
		$query = "SELECT * FROM anggota_tim WHERE id_tim = $id and status_pengajuan = '3' ";
		return $this->db->query($query)->num_rows();
	}

	public function cek_id_angota_terakhir($id_event)
	{
		$id = "'".$id_event."'";
		$query = "SELECT * FROM anggota_tim WHERE id_anggota like'$id_event%' ORDER BY id_anggota DESC";
		return $this->db->query($query)->row_array();
	}

	public function batal_ikuti_event($id_relawan,$id_event)
	{
		$id_r = "'".$id_relawan."'";
		$id_e = "'".$id_event."'";
		$query = "DELETE FROM anggota_tim WHERE id_anggota like'$id_event%' and id_relawan = $id_r ";
		return $this->db->query($query);
	}

	public function hapus_tim_by_id_ketua_tim($id_tim)
	{
		$id_t = "'".$id_tim."'";
		$query = "DELETE FROM tim WHERE id_tim = $id_t ";
		return $this->db->query($query);
	}

	public function cek_nama_tim_from_event($nama_tim,$id_event)
	{
		$nama = "'".$nama_tim."'";
		$id = "'".$id_event."'";

		$query = "SELECT * FROM tim WHERE id_event = $id and nama_tim = $nama ";
		return $this->db->query($query)->result_array();
	}

	public function update_data_di_anggota_tim($id_relawan, $data, $id_event)
	{
		$id_r = "'".$id_relawan."'";
		$id_e = "'".$id_event."'";

		$query = "UPDATE anggota_tim SET id_tim = '". $data['id_tim']."',"."status_pengajuan = 4"." WHERE id_relawan = $id_r and id_anggota like'$id_event%'; ";
		$this->db->query($query);
	}

	public function update_data_status_pengajuan_ditolak($id_tim)
	{
		$id_t = "'".$id_tim."'";
		$query = "UPDATE anggota_tim SET id_tim = '0', status_pengajuan = '0' WHERE id_tim = $id_t and status_pengajuan < '3' ";
		$this->db->query($query);
	}


    public function	get_data_pengajuan_menjadi_anggota($id_tim)
    {
    	$id = "'".$id_tim."'";
		$query = "SELECT * FROM anggota_tim JOIN relawan
				ON anggota_tim.id_relawan = relawan.id_relawan
				JOIN komisariat
				ON relawan.komisariat = komisariat.id_komisariat
				WHERE anggota_tim.id_tim = $id and anggota_tim.status_pengajuan = 1";
		return $this->db->query($query)->result_array();
    }

    public function batas_anggota_tim($id_tim)
    {
    	$id_t = "'".$id_tim."'";

		$query = "UPDATE anggota_tim SET status_pengajuan = '2' WHERE id_tim = $id_t and status_pengajuan = '1' ";
		$this->db->query($query);
    }

   
    public function get_data_pembimbing_aktif()
    {
    	$query = "SELECT * FROM pembimbing 
    		JOIN komisariat
    		ON pembimbing.id_komisariat = komisariat.id_komisariat
    		WHERE pembimbing.role_id = '2'
    		ORDER BY komisariat.nama_komisariat";
		return $this->db->query($query)->result_array();
    }

    public function get_data_pembimbing_by_Id($id_pembimbing)
    {
    	$id = "'".$id_pembimbing."'";
    	$query = "SELECT pembimbing.email,pembimbing.nik,pembimbing.nama,pembimbing.tgl_lahir,pembimbing.alamat_rumah,pembimbing.kecamatan,pembimbing.no_telp,pembimbing.sektor_pekerjaan,pembimbing.jabatan,pembimbing.image,pembimbing.jenis_kelamin,komisariat.nama_komisariat,kota.type,kota.nama_kota,provinsi.nama_provinsi
    	 	FROM pembimbing 
    	 	JOIN komisariat
    		ON pembimbing.id_komisariat = komisariat.id_komisariat
    		JOIN kota
    		ON pembimbing.id_kota = kota.id_kota
    		JOIN provinsi
    		ON kota.id_provinsi = provinsi.id_provinsi
    		WHERE pembimbing.id_pembimbing = $id";
		return $this->db->query($query)->row_array();
    }

    public function get_data_pembimbing_by_Id2($id_pembimbing)
    {
    	$id = "'".$id_pembimbing."'";
    	$query = "SELECT pembimbing.email,pembimbing.nik,pembimbing.nama,pembimbing.tgl_lahir,pembimbing.alamat_rumah,pembimbing.kecamatan,pembimbing.no_telp,pembimbing.sektor_pekerjaan,pembimbing.jabatan,pembimbing.jenis_kelamin,pembimbing.image,komisariat.nama_komisariat,kota.type,kota.nama_kota,provinsi.nama_provinsi
    	 	FROM pembimbing 
    	 	JOIN komisariat
    		ON pembimbing.id_komisariat = komisariat.id_komisariat
    		JOIN kota
    		ON pembimbing.id_kota = kota.id_kota
    		JOIN provinsi
    		ON kota.id_provinsi = provinsi.id_provinsi
    		WHERE pembimbing.id_pembimbing = $id";
		return $this->db->query($query)->row_array();
    }


    public function get_agenda_pembekalan_by_id_event($id_event)
    {
    	$id = "'".$id_event."'";
    	$query = "SELECT * 
    		FROM pembekalan	JOIN pengumuman
    		ON pembekalan.id_pengumuman = pengumuman.id_pengumuman
    		JOIN instruktur
    		ON pembekalan.id_instruktur = instruktur.id_instruktur
    		WHERE pembekalan.id_event = $id";

    	return $this->db->query($query)->result_array();
    }


    public function get_mitra_by_id_tim($id_tim)
    {
    	$id = "'".$id_tim."'";
    	$query = "SELECT * FROM mitra 
    			JOIN cluster ON mitra.id_cluster = cluster.id_cluster
    			JOIN kota ON mitra.id_kota = kota.id_kota
    			JOIN provinsi ON kota.id_provinsi = provinsi.id_provinsi
    		WHERE id_tim = $id";

    	return $this->db->query($query)->row_array();
    }
    

    public function get_all_cluster()
    {
    	$query = "SELECT * FROM cluster";

    	return $this->db->query($query)->result_array();	
    }

    public function get_all_jenis_lembaga()
    {
    	$query = "SELECT * FROM cluster";

    	return $this->db->query($query)->result_array();
    }

    public function get_alamat_mitra_by_id_mitra($id_mitra)
    {
    	$id = "'".$id_mitra."'";
    	$query = "SELECT kota.id_kota,provinsi.id_provinsi 
    		FROM mitra 
    		JOIN kota ON mitra.id_kota = kota.id_kota
    		JOIN provinsi ON kota.id_provinsi = provinsi.id_provinsi";

    	return $this->db->query($query)->row_array();

    }

    public function get_template_berkas_pelayanan()
	{
		$query = "SELECT * FROM template
			JOIN admin ON template.id_admin = admin.id_admin
			WHERE id_template != 'mitra' and id_template <= 3 and id_template != '0' and id_template != 'pangkalan'
			ORDER BY template.id_template";
		
		return $this->db->query($query)->result_array();
	}

	 public function get_template_berkas_pelaporan()
	{
		$query = "SELECT * FROM template
			JOIN admin ON template.id_admin = admin.id_admin
			WHERE id_template != 'mitra' and id_template > 3
			ORDER BY template.id_template";
		
		return $this->db->query($query)->result_array();
	}

	 public function get_template_berkas_surat_izin()
	{
		$query = "SELECT * FROM template
			JOIN admin ON template.id_admin = admin.id_admin
			WHERE id_template != 'mitra' and id_template = '0'
			ORDER BY template.id_template";
		
		return $this->db->query($query)->row_array();
	}


	public function cek_email($email)
	{
		$id = "'".$email."'";
		$query = "SELECT * FROM relawan WHERE email = $id";
		
		return $this->db->query($query)->num_rows();
	}

	public function cek_username($username)
	{
		$id = "'".$username."'";
		$query = "SELECT * FROM relawan WHERE username = $id";
		
		return $this->db->query($query)->num_rows();
	}

	public function get_data_tim_by_id_event($id_relawan,$id_event)
	{
		$id = "'".$id_relawan."'";
		$id_ev = "'".$id_event."'";
		$query = "SELECT tim.nama_tim,anggota_tim.id_anggota,tim.id_tim
				FROM anggota_tim JOIN tim  
				ON anggota_tim.id_tim = tim.id_tim
				WHERE anggota_tim.id_relawan = $id and tim.id_event = $id_ev";
		
		return $this->db->query($query)->row_array();
	}

	public function get_indikator_penilaian_anggota()
	{
		$query = "SELECT * FROM indikator_penilaian WHERE id_kriteria = 'krl'";
		
		return $this->db->query($query)->result_array();
	}

	public function get_anggota_tim_by_id_tim_without_user($id_tim,$id_relawan)
	{
		$id = "'".$id_tim."'";
		$id_r = "'".$id_relawan."'";

		$query = "SELECT * FROM anggota_tim 
				JOIN relawan ON anggota_tim.id_relawan = relawan.id_relawan 
				WHERE anggota_tim.id_tim = $id and anggota_tim.id_relawan != $id_r
				ORDER BY anggota_tim.status_pengajuan DESC";
		return $this->db->query($query)->result_array();
	}

	public function get_status_penilai_anggota($id_anggota)
	{
		$id = "'".$id_anggota."'";

		$query = "SELECT * FROM nilai_individu WHERE id_penilai = $id";
		return $this->db->query($query)->result_array();
	}

	public function get_template_sertifikat_by_id_event($id_event)
	{
		$id = "'".$id_event."'";

		$query = "SELECT * FROM template_sertifikat WHERE id_event = $id";
		return $this->db->query($query)->row_array();
	}

	public function get_nilai_individu_relawan($id_anggota)
	{
		$id = "'".$id_anggota."'";

		$query = "SELECT nilai FROM nilai_individu WHERE id_anggota_tim = $id";
		return $this->db->query($query)->result_array();
	}

	public function get_penilaian_sejawat_relawan($id_anggota)
	{
		$id = "'".$id_anggota."'";

		$query = "SELECT nilai FROM nilai_individu WHERE id_anggota_tim = $id and id_penilai NOT LIKE '%P'";
		return $this->db->query($query)->result_array();
	}
	
	public function get_jml_nilai_individu_relawan_masuk($id_anggota)
	{
		$id = "'".$id_anggota."'";

		$query = "SELECT nilai FROM nilai_individu WHERE id_anggota_tim = $id";
		return $this->db->query($query)->num_rows();
	}

	public function get_jumlah_penilai_nilai_individu_relawan($id_tim)
	{
		$id = "'".$id_tim."'";

		$query = "SELECT * FROM anggota_tim
			JOIN tim ON anggota_tim.id_tim = tim.id_tim 
			WHERE anggota_tim.id_tim = $id";
		return $this->db->query($query)->num_rows();
	}

	public function get_nilai_kinerja_tim($id_tim)
	{
		$id = "'".$id_tim."'";

		$query = "SELECT * FROM nilai_kinerja_tim
			WHERE id_tim = $id";
		return $this->db->query($query)->row_array();
	}

	public function cek_nilai_kinerja_relawan($id_anggota)
	{
		$id = "'".$id_anggota."'";

		$query = "SELECT * FROM nilai_kinerja_relawan
			WHERE id_anggota = $id";
		return $this->db->query($query)->row_array();
	}

	public function get_persentase_kinerja_relawan()
	{
		$query = "SELECT * FROM persentase_kriteria_penilaian WHERE kd_kriteria = 'KR'";
		return $this->db->query($query)->result_array();

	}

	public function get_nilai_kinerja_relawan($id_anggota)
	{
		$id = "'".$id_anggota."'";

		$query = "SELECT * FROM nilai_kinerja_relawan
			WHERE id_anggota = $id";
		return $this->db->query($query)->row_array();
	}

	public function keluarkan_dari_event($id_relawan,$id_event)
	{
		$id = "'".$id_relawan."'";
		$id_ev = "'".$id_event."'";

		$query = "DELETE FROM anggota_tim WHERE id_relawan = $id and id_anggota Like '$id_event%'";
		return $this->db->query($query);
	}
}
?>