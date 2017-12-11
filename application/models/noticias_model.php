<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias_model extends CI_Model{
	public function __construct(){
		parent:: __construct();
	}

	public function buscar_noticias($id = null){
		$this->db->select('noticias.*');
		$this->db->from('noticias');
		$this->db->order_by('id', 'DESC');
		$this->db->limit(3);
		if($id){
			$this->db->where('id',$id);
			$query = $this->db->get();
			return $query->row();
		}else{
			$query = $this->db->get();
			return $query->result();
		}
	}

	public function buscar_mais_noticias(){
		$this->db->select('noticias.*');
		$this->db->from('noticias');

			$query = $this->db->get();
			return $query->result();
		
	}

}