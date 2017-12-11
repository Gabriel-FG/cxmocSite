<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Galeria_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function galeria(){

    	$this->db->select('fotos_clube.*');
		$this->db->from('fotos_clube');
		if($dados = $this->db->get()){
			return $dados->result();
		}
    }

    	public function salvar_img_db($dados){
    		if ($this->db->insert('fotos_clube', $dados)){
		 return TRUE;
		}else{
		 return FALSE;
		}
	}

	public function excluir_img($id){
		$this->db->where('id', $id);
		if($this->db->delete('fotos_clube'))
			return TRUE;
	}

}