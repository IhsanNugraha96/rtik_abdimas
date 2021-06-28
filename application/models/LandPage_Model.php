<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandPage_Model extends CI_Model
{
	public function get_logo_mitra()
	{
		$query = "SELECT * FROM template WHERE id_template = 'mitra'";
		return $this->db->query($query)->row_array();
	}

	public function get_jml_event()
	{
		$query = "SELECT * FROM event";
		return $this->db->query($query)->num_rows();
	}

	public function get_jml_komisariat()
	{
		$query = "SELECT * FROM komisariat";
		return $this->db->query($query)->num_rows();
	}

	public function get_jml_instruktur()
	{
		$query = "SELECT * FROM instruktur WHERE id_instruktur != '0'";
		return $this->db->query($query)->num_rows();
	}

	public function get_jml_pembimbing()
	{
		$query = "SELECT * FROM pembimbing WHERE id_pembimbing != 'dummy'";
		return $this->db->query($query)->num_rows();
	}

	public function get_jml_relawan()
	{
		$query = "SELECT * FROM relawan WHERE id_relawan != 'dummy'";
		return $this->db->query($query)->num_rows();
	}

	public function get_jml_mitra()
	{
		$query = "SELECT * FROM mitra";
		return $this->db->query($query)->num_rows();
	}

	public function get_jml_materi()
	{
		$query = "SELECT * FROM materi";
		return $this->db->query($query)->num_rows();
	}

	public function get_artikel_kegiatan()
	{
		$query = "SELECT event.date_created,event.nama_event,tim.id_tim,tim.nama_tim,tim.judul_laporan,tim.laporan FROM tim JOIN event ON tim.id_event = event.id_event WHERE tim.laporan != '-' and tim.judul_laporan != '-' ORDER BY RAND() LIMIT 1";
		return $this->db->query($query)->row_array();
	}

	public function get_all_artikel_kegiatan()
	{
		$query = "SELECT event.date_created,event.nama_event,tim.nama_tim,tim.judul_laporan,tim.laporan FROM tim JOIN event ON tim.id_event = event.id_event ORDER BY event.date_created";
		return $this->db->query($query)->result_array();
	}

	public function get_artikel_kegiatan_per_tahun($tahun)
	{
		$query = "SELECT event.date_created,event.nama_event,tim.id_tim,tim.nama_tim,tim.judul_laporan,tim.laporan FROM tim JOIN event ON tim.id_event = event.id_event WHERE event.date_created like '$tahun%' ORDER BY tim.nama_tim ASC";
		return $this->db->query($query)->result_array();
	}

	public function get_artikel_tim($tim)
	{
		$id = "'".$tim."'";
		$query = "SELECT event.nama_event,tim.nama_tim,tim.judul_laporan,tim.laporan FROM tim JOIN event ON tim.id_event = event.id_event WHERE tim.id_tim = $id";
		return $this->db->query($query)->row_array();
	}

	public function get_all_event()
	{
		$query = "SELECT * FROM event ORDER BY date_created";
		// return '';
		return $this->db->query($query)->result_array();
	}

}