<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eventos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar_evento($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('eventos', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('eventos', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function get_eventos()
    {
        $this->db->select('*');
        $this->db->from('eventos');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_evento($id=null)
    {
        if($id){
            $this->db->select('*');
            $this->db->from('eventos');
            $this->db->where('id', $id);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->row();
            }else{
                return FALSE;
            }
        }
    }

    function excluir_evento($id){
        $this->db->where('id', $id);
        if($this->db->delete('eventos')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}