<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends MY_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('noticias_model');
	}

	public function pagina_noticias(){
		$this->load->view('tela_noticias');
	}

	public function detalhes_noticia(){
		$idnoticia = $this->input->get('id');
		$dados['noticias'] = $this->noticias_model->buscar_noticias($idnoticia);
		$this->montaTela('tela_noticias', $dados);
	}

	public function pagina_mais_noticias(){
		$dados ['noticias'] = $this->noticias_model->buscar_mais_noticias();
		$this->montaTela('mais_noticias', $dados);
	}

}





