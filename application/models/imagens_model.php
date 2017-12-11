<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imagens_model extends CI_Model{
	public function __construct(){
		parent:: __construct();
	}

	public function buscar_imagens(){
		$this->db->select('fotos_clube.*');
		$this->db->from('fotos_clube');
		$query = $this->db->get();
		return $query->result();
	}

}