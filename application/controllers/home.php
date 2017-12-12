<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('noticias_model');
		$this->load->model('imagens_model');
	}

	
	public function pagina_home(){
		$dados['noticias'] = $this->noticias_model->buscar_noticias();
		$dados['fotos'] = $this->imagens_model->buscar_imagens();
		$this->montaTela('Index', $dados);
	}

	public function enviar_mensagem(){
		
		$dadosdamensagem['nome']= $this->input->post('nome');
		$dadosdamensagem['email']= $this->input->post('email');
		$dadosdamensagem['mensagem']= $this->input->post('mensagem');
		$this->load->library('email');

			$this->email->from($dadosdamensagem['email'], $dadosdamensagem['nome']);
			$this->email->to('clubedexadrezmoc@gmail.com');

			$this->email->subject('Contato CXMOC');
			$this->email->message($dadosdamensagem['mensagem']);

			if($this->email->send()){
				echo 'TRUE';
			}


	}

}

