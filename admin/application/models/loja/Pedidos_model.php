<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedidos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar_pedido($dados, $id=NULL)
    {


        if($id){
            $this->db->where('id', $id);
            if($this->db->update('pedidos', $dados))
            {
                return $id;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('pedidos', $dados))
            {
                return $this->db->insert_id();
            }
            else
            {
                return false;
            }
        }
    }

    public function get_pedidos()
    {
        $this->db->select('pedidos.*');
        $this->db->from('pedidos');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function busca_pedido($idpedido){

        $this->db->select('pedidos.*');
        $this->db->from('pedidos'); 
        $this->db->where('id', $idpedido);
         $query = $this->db->get();
        if($query->num_rows() > 0){

            return $query->row();
        }else{
            return FALSE;
        }



    }
    public function get_pedido($idpedido)
    {
        $this->db->select('pedidos.*');
        $this->db->select('perfis.*');
        $this->db->select('produtos.titulo As produto' );
        $this->db->select('produtos.valor As valor' );
        $this->db->select('produtos.descricao As descricao_produto' );
        $this->db->select('produtos.valor As preco_prod' );
        $this->db->select('produtos.id As id_prod' );
        $this->db->select('produtos.valor As preco_prod' );
        $this->db->select('perfil_endereco.*');
        $this->db->select('estados.descricao As uf');
        $this->db->select('cidades.descricao As cidade');
        $this->db->from('pedidos'); 
        $this->db->join('perfis', 'perfis.id=pedidos.perfis_id');
        $this->db->join('produtos', 'pedidos.produtos_id=produtos.id');
        $this->db->join('perfil_endereco', 'perfil_endereco.perfis_id=perfis.id');
        $this->db->join('cidades', 'cidades.id=perfil_endereco.cidade_id');
        $this->db->join('estados', 'estados.id=perfil_endereco.uf_id');




        $this->db->where('pedidos.id', $idpedido);
        $query = $this->db->get();
        
        
        if($query->num_rows() > 0){

            return $query->row();
        }else{
            return FALSE;
        }
    }

    public function get_itens_pedidos($idpedido)
    {
        $this->db->select('produtos_pedido.valor, produtos_pedido.quantidade, produtos_pedido.produtos_id');
        $this->db->select('produtos.id, produtos.nome, produtos.nome_url, produtos.descricao_breve');
        $this->db->from('produtos_pedido');
        $this->db->join('produtos', 'produtos_pedido.produtos_id=produtos.id');
        $this->db->where('produtos_pedido.pedidos_id', $idpedido);

        $query = $this->db->get();
        if($query->num_rows() > 0){
            $data = $query->result();
            return $data;
        }else{
            return FALSE;
        }
    }


    public function get_perfis(){

        $this->db->select('perfis.*');
        $this->db->from('perfis');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }

    }


      public function get_produtos(){

        $this->db->select('produtos.*');
        $this->db->from('produtos');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }

    }

    public function alterar_qtd_produto($id){

        $this->db->select('pedidos.*');
        $this->db->from('pedidos');
        $this->db->where('id', $id);
        $query = $this->db->get();

        $this->db->set('estoque', 'estoque-'.$query->row('quantidade').'', false);

        $this->db->where('id',$query->row('produtos_id'));

        $this->db->update('produtos');

    }

}