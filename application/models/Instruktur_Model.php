<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instruktur_Model extends CI_Model
{

	public function cek_instruktur_by_idinstruktur($id_instruktur)
	{
		$id = "'".$id_instruktur."'";
		$query = "SELECT * FROM instruktur
			JOIN kota ON instruktur.id_kota = kota.id_kota
			JOIN provinsi ON kota.id_provinsi = provinsi.id_provinsi
			WHERE instruktur.id_instruktur = $id";
		return $this->db->query($query)->row_array();
	}


	public function get_provinsi()
	{
		$query = "SELECT * FROM provinsi"; 
		return $this->db->query($query)->result_array();
	}

	public function get_materi_instruktur_by_idinstruktur($id_instruktur)
	{
		$id = "'".$id_instruktur."'";
		$query = "SELECT * FROM materi WHERE id_instruktur = $id"; 
		return $this->db->query($query)->result_array();
	}

	public function get_acara_pembekalan_by_idinstruktur($id_instruktur)
	{
		$id = "'".$id_instruktur."'";
		$query = "SELECT * FROM pembekalan 
			JOIN event ON pembekalan.id_event = event.id_event
			WHERE pembekalan.id_instruktur = $id
			ORDER BY pembekalan.waktu_pelaksanaan DESC"; 
		return $this->db->query($query)->result_array();
	}

	public function get_acara_pembekalan_by_id_pembekelan($id_pembekalan)
	{
		$id = "'".$id_pembekalan."'";
		$query = "SELECT * FROM pembekalan 
			JOIN event ON pembekalan.id_event = event.id_event
			WHERE pembekalan.id_pembekalan = $id"; 
		return $this->db->query($query)->row_array();
	}

	public function cek_email_instruktur($email)
	{
		$id = "'".$email."'";
		$query = "SELECT * FROM instruktur WHERE email = $id"; 
		return $this->db->query($query)->num_rows();
	}


}