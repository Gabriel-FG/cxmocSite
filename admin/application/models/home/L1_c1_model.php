<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class L1_c1_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar_l1_c1($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('home_colunas', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('home_colunas', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function get_l1_c1()
    {
        $this->db->select('*');
        $this->db->from('home_colunas');
        $this->db->where('posicao_coluna', 'l1-c1');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return FALSE;
        }
    }

    function excluir_l1_c1($id){
        $this->db->where('id', $id);
        if($this->db->delete('home_colunas')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}