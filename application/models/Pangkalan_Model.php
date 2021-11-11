<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pangkalan_Model extends CI_Model
{

	public function cek_pangkalan_by_idPangkalan($id_pangkalan)
	{
		$id = "'".$id_pangkalan."'";
		$query = "SELECT * FROM komisariat WHERE id_komisariat = $id";
		return $this->db->query($query)->row_array();
	}

	public function cek_pangkalan_by_idPangkalan2($id_pangkalan)
	{
		$id = "'".$id_pangkalan."'";
		$query = "SELECT * FROM komisariat 
				JOIN kota ON komisariat.id_kota = kota.id_kota
				JOIN provinsi ON kota.id_provinsi = provinsi.id_provinsi
				WHERE komisariat.id_komisariat = $id";
		return $this->db->query($query)->row_array();
	} 


	public function get_pembimbing_pangkalan_by_id_pangkalan($id_pangkalan)
	{
		$id = "'".$id_pangkalan."'";
		$query = "SELECT * FROM pembimbing WHERE id_komisariat = $id and id_pembimbing != 'dummy'";
		return $this->db->query($query)->result_array();
	}

	public function get_pembimbing_pangkalan_by_id_pembimbing($id_pembimbing)
	{
		$id = "'".$id_pembimbing."'";
		$query = "SELECT * FROM pembimbing WHERE id_pembimbing = $id and id_pembimbing != 'dummy'";
		return $this->db->query($query)->row_array();
	}

	public function get_jml_pembimbing_pangkalan_by_id_pangkalan($id_pangkalan)
	{
		$id = "'".$id_pangkalan."'";
		$query = "SELECT * FROM pembimbing WHERE id_komisariat = $id and id_pembimbing != 'dummy'";
		return $this->db->query($query)->num_rows();
	}

	
	public function get_anggota_pangkalan_by_id_pangkalan($id_pangkalan)
	{
		$id = "'".$id_pangkalan."'";
		$query = "SELECT * FROM relawan WHERE komisariat = $id and is_active = '3'";
		return $this->db->query($query)->result_array();	
	}

	public function get_anggota_pangkalan_by_id_relawan($id_relawan)
	{
		$id = "'".$id_relawan."'";
		$query = "SELECT * FROM relawan WHERE id_relawan = $id";
		return $this->db->query($query)->row_array();
	}

	public function get_jml_anggota_pangkalan_by_id_pangkalan($id_pangkalan)
	{
		$id = "'".$id_pangkalan."'";
		$query = "SELECT * FROM relawan WHERE komisariat = $id and is_active = 3";
		return $this->db->query($query)->num_rows();	
	}

	public function get_jml_pengajuan_anggota_pangkalan_by_id_pangkalan($id_pangkalan)
	{
		$id = "'".$id_pangkalan."'";
		$query = "SELECT * FROM relawan WHERE komisariat = $id and is_active = 2";
		return $this->db->query($query)->num_rows();
	}

	public function get_data_pengajuan_anggota_pangkalan_by_id_pangkalan($id_pangkalan)
	{
		$id = "'".$id_pangkalan."'";
		$query = "SELECT * FROM relawan WHERE komisariat = $id and is_active = 2";
		return $this->db->query($query)->result_array();
	}

	public function get_alamat_by_id_kota($id_kota) 
	{
		$id = "'".$id_kota."'";
		$query = "SELECT * FROM kota
				JOIN provinsi ON kota.id_provinsi = provinsi.id_provinsi
				WHERE kota.id_kota = $id";
		return $this->db->query($query)->row_array();
	}

	public function  get_keahlian_anggota_by_id_anggota($id_relawan)
	{
		$id = "'".$id_relawan."'";
		$query = "SELECT keahlian.nama_keahlian FROM draf_keahlian_relawan
				JOIN keahlian ON  draf_keahlian_relawan.id_keahlian = keahlian.id_keahlian
				WHERE draf_keahlian_relawan.id_relawan = $id";
		return $this->db->query($query)->result_array();
	}

	public function get_jml_event_anggota_by_id_anggota($id_relawan)
	{
		$id = "'".$id_relawan."'";
		$query = "SELECT * FROM anggota_tim WHERE id_relawan = $id";
		return $this->db->query($query)->num_rows();
	}

	public function get_provinsi()
	{
		$query = "SELECT * FROM provinsi"; 
		return $this->db->query($query)->result_array();
	}

	public function get_distrik($id_provinsi)
	{
		$id = $id_provinsi;
		$query = "SELECT * FROM kota WHERE id_provinsi = $id ORDER BY type";
		return $this->db->query($query)->result_array();
	}

	public function get_data_tim_relawan_by_idPangkalan($id_pangkalan,$id_event)
	{
		$id = "'".$id_pangkalan."'";
		$id_ev = "'".$id_event."'";

		$query = "SELECT tim.id_tim,tim.nama_tim,tim.id_event,relawan.nama_lengkap,event.nama_event FROM tim 
				JOIN anggota_tim ON tim.id_tim = anggota_tim.id_tim
				JOIN relawan ON anggota_tim.id_relawan = relawan.id_relawan
				JOIN event ON tim.id_event = event.id_event
				WHERE relawan.komisariat = $id and anggota_tim.status_pengajuan = '4' and tim.id_event = $id_ev 
				ORDER BY tim.id_event and tim.nama_tim ASC";
		return $this->db->query($query)->result_array();	
	}

	public function get_jml_tim_relawan_by_idPangkalan($id_pangkalan,$id_event)
	{
		$id = "'".$id_pangkalan."'";
		$id_ev = "'".$id_event."'";
		$query = "SELECT tim.id_tim,tim.nama_tim,tim.id_event,relawan.nama_lengkap,event.nama_event FROM tim 
				JOIN anggota_tim ON tim.id_tim = anggota_tim.id_tim
				JOIN relawan ON anggota_tim.id_relawan = relawan.id_relawan
				JOIN event ON tim.id_event = event.id_event
				WHERE relawan.komisariat = $id and anggota_tim.status_pengajuan = '4' and tim.id_event = $id_ev
				ORDER BY tim.id_event ASC";
		return $this->db->query($query)->num_rows();	
	}

	public function get_mitra_by_id_tim($id_tim)
	{
		$id = "'".$id_tim."'";
		$query = "SELECT * FROM mitra 
				JOIN cluster ON mitra.id_cluster = cluster.id_cluster 
				JOIN kota ON mitra.id_kota = kota.id_kota
				JOIN provinsi ON kota.id_provinsi = provinsi.id_provinsi
				WHERE mitra.id_tim = $id";
		return $this->db->query($query)->row_array();
	}

	public function get_event_by_idPangkalan($id_pangkalan)
	{
		$id = "'".$id_pangkalan."'";
		$query = "SELECT DISTINCT event.id_event,event.nama_event,event.akhir_penilaian FROM tim 
				JOIN anggota_tim ON tim.id_tim = anggota_tim.id_tim
				JOIN relawan ON anggota_tim.id_relawan = relawan.id_relawan
				JOIN event ON tim.id_event = event.id_event
				WHERE relawan.komisariat = $id and anggota_tim.status_pengajuan = '4' 
				ORDER BY event.id_event DESC";
		return $this->db->query($query)->result_array();
	}

	public function get_data_pembimbing_by_id_event_id_pangkalan($id_pangkalan,$id_event)
	{
		$id 	= "'".$id_pangkalan."'";
		$id_ev 	= "'".$id_event."'";

		$query 	= "SELECT DISTINCT pembimbing.id_pembimbing,pembimbing.nama,pembimbing.image FROM pembimbing 
				JOIN tim ON pembimbing.id_pembimbing = tim.id_pembimbing
				WHERE pembimbing.id_komisariat = $id and tim.id_event = $id_ev 
				ORDER BY tim.id_event ASC";
		return $this->db->query($query)->result_array();	
	}

	public function get_jml_pembimbing_by_id_event_id_pangkalan($id_pangkalan,$id_event)
	{
		$id 	= "'".$id_pangkalan."'";
		$id_ev 	= "'".$id_event."'";

		$query 	= "SELECT DISTINCT pembimbing.nama,pembimbing.image FROM pembimbing 
				JOIN tim ON pembimbing.id_pembimbing = tim.id_pembimbing
				WHERE pembimbing.id_komisariat = $id and tim.id_event = $id_ev";
		return $this->db->query($query)->num_rows();	
	}

	public function get_jml_relawan_by_idPangkalan($id_pangkalan,$id_event)
	{
		$id 	= "'".$id_pangkalan."'";
		$id_ev 	= "'".$id_event."'";

		$query 	= "SELECT relawan.nama_lengkap FROM relawan 
				JOIN anggota_tim ON relawan.id_relawan = anggota_tim.id_relawan
				JOIN tim ON anggota_tim.id_tim = tim.id_tim
				WHERE relawan.komisariat = $id and tim.id_event = $id_ev ";
		return $this->db->query($query)->num_rows();
	}

	public function get_anggota_tim_by_id_tim($id_tim)
	{
		$id 	= "'".$id_tim."'";
		
		$query 	= "SELECT relawan.nama_lengkap,anggota_tim.status_pengajuan,relawan.image,komisariat.nama_komisariat FROM anggota_tim 
				JOIN relawan ON relawan.id_relawan = anggota_tim.id_relawan
				JOIN komisariat ON relawan.komisariat = komisariat.id_komisariat 
				WHERE anggota_tim.id_tim = $id and anggota_tim.status_pengajuan = '3'";
		return $this->db->query($query)->result_array();
	}


	public function get_ketua_tim_by_id_tim($id_tim)
	{
		$id 	= "'".$id_tim."'";
		
		$query 	= "SELECT relawan.nama_lengkap,anggota_tim.status_pengajuan,relawan.image,komisariat.nama_komisariat FROM anggota_tim 
				JOIN relawan ON relawan.id_relawan = anggota_tim.id_relawan
				JOIN komisariat ON relawan.komisariat = komisariat.id_komisariat 
				WHERE anggota_tim.id_tim = $id and anggota_tim.status_pengajuan = '4'";
		return $this->db->query($query)->result_array();
	}

	public function get_foto_by_id_image($image)
	{
		$id 	= "'".$image."'";
		
		$query 	= "SELECT image FROM relawan WHERE image = $id";
		return $this->db->query($query)->row_array();
	}


	public function get_jml_tim_pembimbing_by_id_pembimbing($id_pembimbing,$id_event)
	{
		$id 	= "'".$id_pembimbing."'";
		$id_ev 	= "'".$id_event."'";
		
		$query 	= "SELECT * FROM tim 
				WHERE id_pembimbing = $id and id_event = $id_ev";
		return $this->db->query($query)->num_rows();
	}

	public function get_jml_peserta_by_id_event_id_pangkalan($tahun,$id_pangkalan)
	{
		$id 	= "'".$id_pangkalan."'";
		$id_ev 	= "'".$tahun."'";
		
		// $query = "SELECT * FROM event WHERE date_created like '$tahun%'";
		$query 	= "SELECT * FROM anggota_tim
				JOIN tim ON anggota_tim.id_tim = tim.id_tim
				JOIN relawan ON anggota_tim.id_relawan = relawan.id_relawan
				JOIN event ON tim.id_event = event.id_event 
				WHERE event.date_created like '$tahun%' and relawan.komisariat = $id";
		return $this->db->query($query)->num_rows();
	}

	public function get_jenis_mitra_by_id_komisariat($id_pangkalan,$id_cluster)
	{
		$id 	= "'".$id_pangkalan."'";
		$id_cls = "'".$id_cluster."'";
		
		$query 	= "SELECT * FROM tim
				JOIN anggota_tim ON anggota_tim.id_tim = tim.id_tim
				JOIN mitra ON tim.id_tim = mitra.id_tim
				JOIN cluster ON mitra.id_cluster = cluster.id_cluster
				JOIN relawan ON anggota_tim.id_relawan = relawan.id_relawan
				WHERE relawan.komisariat = $id and mitra.id_cluster = $id_cls and anggota_tim.status_pengajuan = '4'";
		return $this->db->query($query)->num_rows();
	}

	public function get_jenis_mitra()
	{
		$query 	= "SELECT * FROM cluster WHERE id_cluster != '0'";
		return $this->db->query($query)->result_array();
	}

	public function get_jml_jenis_mitra()
	{
		$query 	= "SELECT * FROM cluster WHERE id_cluster != '0'";
		return $this->db->query($query)->num_rows();
	}

	public function get_jml_layanan_mitra_by_id_pangkalan($id_pangkalan,$layanan)
	{
		$id 	= "'".$id_pangkalan."'";
		$id_layanan = "'".$layanan."'";
		
		$query 	= "SELECT mitra.jenis_layanan FROM tim
				JOIN anggota_tim ON anggota_tim.id_tim = tim.id_tim
				JOIN mitra ON tim.id_tim = mitra.id_tim
				JOIN cluster ON mitra.id_cluster = cluster.id_cluster
				JOIN relawan ON anggota_tim.id_relawan = relawan.id_relawan
				WHERE relawan.komisariat = $id and mitra.jenis_layanan = $id_layanan and anggota_tim.status_pengajuan = '4'";
		return $this->db->query($query)->num_rows();
	}

	public function cek_email($email)
	{
		$id 	= "'".$email."'";
		$query 	= "SELECT * FROM komisariat WHERE email = $id";
		return $this->db->query($query)->num_rows();
	}

	public function get_Event_by_id_event($id_event)
	{
		$id 	= "'".$id_event."'";
		$query 	= "SELECT * FROM event WHERE id_event = $id";
		return $this->db->query($query)->row_array();

	}

	public function get_jumlah_peserta_by_id_event($id_event, $id_pangkalan)
	{
		$id 	= "'".$id_pangkalan."'";
		$id_ev 	= "'".$id_event."'";
		
		$query 	= "SELECT event.nama_event,relawan.nama_lengkap,tim.nama_tim FROM anggota_tim
				JOIN tim ON anggota_tim.id_tim = tim.id_tim
				JOIN relawan ON anggota_tim.id_relawan = relawan.id_relawan
				JOIN event ON tim.id_event = event.id_event 
				WHERE tim.id_event = $id_ev and relawan.komisariat = $id";
		return $this->db->query($query)->num_rows();
	}

	public function get_jumlah_pembimbing_by_id_event($id_event,$id_pangkalan)
	{
		$id 	= "'".$id_pangkalan."'";
		$id_ev 	= "'".$id_event."'";
		
		$query 	= "SELECT DISTINCT pembimbing.id_pembimbing,tim.id_event FROM  tim 
				JOIN pembimbing ON pembimbing.id_pembimbing = tim.id_pembimbing
				JOIN event ON tim.id_event = event.id_event 
				WHERE event.id_event = $id_ev and pembimbing.id_komisariat = $id";
		return $this->db->query($query)->num_rows();
	}

	public function get_berkas_tim_by_id_tim($id_tim)
	{
		$id	= "'".$id_tim."'";
		
		$query 	= "SELECT id_tim,nama_tim,surat_pengantar,survey_permintaan,surat_konfirmasi,artikel_miftek,presensi_pelayanan,berita_Acara,judul_laporan,laporan FROM tim WHERE id_tim = $id";
		return $this->db->query($query)->row_array();
	}

}